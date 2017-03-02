<?php

class Model
{
	public static $sqlDatabaseHost = 'localhost';
	public static $sqlDatabaseName = 'budlinia';
	public static $sqlDatabaseUser = 'root';
	public static $sqlDatabasePassword = '';
	public static $pdo;



	public function pdoConnect() {
		try {
			$dsn = 'mysql:host='.self::$sqlDatabaseHost.';dbname='.self::$sqlDatabaseName.';charset=utf8';
			$opt = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC);
			self::$pdo = new PDO($dsn, self::$sqlDatabaseUser, self::$sqlDatabasePassword, $opt);
			self::$pdo->exec("SET NAMES 'utf8'");
			self::$pdo->exec("SET CHARACTER SET utf8");
			session_start();
		} catch (PDOException $e) {
			echo 'db error';
			exit;
		}
	}


	public static function sqlQuery($sql, $data = false, $minimal = false, $type = false) {
		if ($minimal && $data) {  // готовим текст запроса
			foreach ($data as $key => $val) {
				if ( $key != 'where' ) {
					$sql = $sql.' '.$key.' = :'.$key.',';  // переносим массив в строку
				}
			}
			if (substr($sql, -1) == ',') {
				$sql = substr($sql, 0, -1); // WTFuck*!  убераем последнею запятую. костыль, но пока так
			}

			if (isset($data['where'])) {     // проверочка введеного массива на условие
				$i = 0;
				foreach ($data['where'] as $key => $value) {
					if ($i == 0) {
						$sql .= ' WHERE '.$key.' = :'.$key.'';
					} else if ($key != 'etc') {
						$sql .= ' AND '.$key.' = :'.$key.'';
					}
					$i++;
				}
				if (isset($data['where']['etc'])) {
					$sql .= ' '.$data['where']['etc'];
				}
			}
		}

		try {
			//var_dump($sql); exit;
			$query = Model::$pdo->prepare($sql);   // готовим запрос. текст запроса в условии выше
			if ($data) {
				foreach ($data as $key => $val) {
					if ( $key == 'where' ) {
						foreach ($data['where'] as $k => $v) {
							if ($k != 'etc') {
								$query->bindParam(":$k", $data['where'][$k], PDO::PARAM_STR);
							}
						}
					} else {
						$query->bindParam(":$key", $data[$key], PDO::PARAM_STR);
					}
				}
			}

			try {
				$query->execute();

				if ($type == 'fetchObject') {

					return $query->fetchObject();
				} else if ($type == 'fetchColumn') {

				} else if ($type == 'fetchAll') {
					$var = $query->fetchAll();
					return !empty($var) ? $var : [false];
				} else {
					return ['lastInsertId' => Model::$pdo->lastInsertId()];
				}
			} catch (Exception $e) {
				//self::saveError($e, 'sqlQuery', false);
				print_r($e);
				return false;
			}


		} catch (Exception $e) {
			//self::saveError($e, 'sqlQuery', false);
			return false;
		}
	}
	// красивый вывод массивов
	public static function goodLook ($array)
	{
		echo "<pre>";
		print_r($array);
		echo "</pre>";
	}

	// вытягивает запрос и обрабатывает в массив
	public static function fatchArray($query)
	{
		$result = Model::$pdo->prepare($query);
		$result->execute();
		$rs = $result->fetchAll(PDO::FETCH_ASSOC);
		return $rs;
	}

	public static function addToDB_CSV_Table ()
	{
		if (!empty($_FILES))
		{

			$csv_lines = file("db/" . $_FILES['userfile']['name']);  // путь к таблице CSV. она передается в виде асоц массива

			//вытягиваем имя таблицы
			$DBName = substr($_FILES['userfile']['name'],0,-4);


			// проверяем таблицу на косяки
			if (is_array($csv_lines)) {
				$cnt = count($csv_lines);       // количество линий массива
				$skip_char = false;
				$column = '';
				for ($i = 0; $i < $cnt; $i++) {
					$line = $csv_lines[$i];
					$line = trim($line); // удаляет пробелы в начале и конце строки

					$first_char = true;//указатель на то, что через цикл проходит первый символ столбца
					$col_num = 0;//номер столбца
					$length = strlen($line);

					for ($b = 0; $b < $length; $b++) {
						//переменная $skip_char определяет обрабатывать ли данный символ
						if ($skip_char != true) {
							//определяет обрабатывать/не обрабатывать строку
							///print $line[$b];
							$process = true;
							//определяем маркер окончания столбца по первому символу
							if ($first_char == true) {
								if ($line[$b] == '"') {
									$terminator = '";';
									$process = false;
								} else
									$terminator = ';';
								$first_char = false;
							}

							//просматриваем парные кавычки, опредляем их природу
							if ($line[$b] == '"') {
								$next_char = $line[$b + 1];
								//удвоенные кавычки
								if ($next_char == '"')
									$skip_char = true;
								//маркер конца столбца
								elseif ($next_char == ';') {
									if ($terminator == '";') {
										$first_char = true;
										$process = false;
										$skip_char = true;
									}
								}
							}

							//определяем природу точки с запятой
							if ($process == true) {
								if ($line[$b] == ';') {
									if ($terminator == ';') {

										$first_char = true;
										$process = false;
									}
								}
							}

							if ($process == true)
								$column .= $line[$b];

							if ($b == ($length - 1)) {
								$first_char = true;
							}

							if ($first_char == true) {

								$values[$i][$col_num] = $column;
								$column = '';
								$col_num++;
							}
						} else
							$skip_char = false;
					}
				}
			}

			// убераем пробелы перед строкой и после
			$cnt = count($csv_lines);
			for ($i = 0; $i < $cnt; $i++) {

				$csv_lines[$i] = explode(';', $csv_lines[$i]);   // разбиваем строку на массив
				$count = count($csv_lines[$i]);
				for ($j = 0; $j < $count; $j++) {
					$csv_lines[$i][$j] = trim($csv_lines[$i][$j]," \t\n\r\0\x0B" ); //убераем пробелы
				}

				//$csv_lines[$i][11] = substr($csv_lines[$i][11], 0, -1); // удаляем перенос строки
			}

			$query = "SHOW COLUMNS FROM ".$DBName;
			$rs = self::fatchArray($query);

			if ($rs[2]['Field'] == $csv_lines[0][2])
			{
				$delete = array_shift($csv_lines);
			}

			function addToDB($DBTable, $table, $DBName)
			{
				Model::sqlQuery("DELETE FROM ".$DBName." ", array(), false);
				for ($i = 0; $i < (count($table)); $i++) // переименовуем ключи таблицы
				{
					foreach ($table[$i] as $key => $val) {
						$new_key = $DBTable[$key]['Field'];
						$table[$i][$new_key] = $table[$i][$key];
						unset($table[$i][$key]);
					}
				}
				//добавляем в БД знания
				foreach ($table as $value)
				{
					Model::sqlQuery("INSERT INTO ".$DBName." SET", $value, true);
				}
			}
			addToDB($rs,$csv_lines,$DBName);
			header("Refresh:0");


		} else
		{
			echo 'Что то пошло не так. Поробуй еще раз.';

		}

	}

	public static function full_list ($array1, $array2, $dir, $num) // num - количество категорий
	{
		for ($i =0;$i < $num; $i++)
		{
			echo'<div class="img_category"><img src="img/'.$dir.'/'.$array1[$i].'.jpg" height="60px" width="60px"></div>';
			?><div class="list_category"><ul><?php
				foreach ($array2[$i] as $key => $value)
				{
					echo '<li><a href="/'.$key.'">'.$value.'</a></li>';
				}
				?></ul></div><?php
		}
	}


	// метод выборки данных
	public function get_data()
	{
		// todo
	}

	public static function displayGoods ($pageName, $DBName, $params)
	{
		Model::goodLook($_SESSION['Quantity']);
		if (!isset($_SESSION['Quantity'])) $_SESSION['Quantity'] = 20;

		//$query = "SELECT * FROM ".$DBName." WHERE page = '".$pageName."'";LIMIT '.$shift.', '.$count.'
		if (!empty($_GET["page"]))
		{
			$shift = $_GET["page"];// начиная с позиции shift+1
		} else {
			$shift = 1;
		}// начиная с позиции shift+1
		$count = $_SESSION['Quantity']; // количество выводимых товаров+

		/******         выбераем фидьтр страницы ******/
		if ($params['pageFilter'] == 'none')
		{
			$pageFilter = '';
		} else {
			$pageFilter = "`category_group` = '".$params['pageFilter']."' AND ";
		}
		$query = "SELECT * FROM ".$DBName." WHERE ".$pageFilter."page = '".$pageName."' LIMIT ".($shift-1)*$count.", ".$count;// Делаем выборку $count записей, начиная с $shift + 1.
		$rs = Model::fatchArray($query);
		/*Model::goodLook($rs);*/
		$dataDB = $rs;
		echo "<div class='dispGoods'>";
		foreach ($dataDB as $value)
		{
			?>
			<div class="dataDB">
				<img src="<?php print_r($value['picture'])?>">
				<p align="center">
					<?php
					print_r($value['name']);
					?>
				</p>
				<br>
				<p>
					Код товара: <?php print_r($value['id']); ?>
				</p>
				<p>
					<?php print_r($value['price']); ?> <?php print_r($value['currency']); ?>
				</p>
				<br>
				<form>
					<input type="button" name="backet" value="Заказать">
				</form>
			</div>
			<?php
		}
		echo '</div>';
		?>
			<div align="center"  class="pageNavigation">   <!--навигация по страницам-->
				<p>
					<form action="<?php echo $_SERVER['REQUEST_URI'];?>" method="get">
						<select onchange="location=value" size="1" name="count">
							<?php
								if (!isset($_SESSION['Quantity'])) {
									?><option value="<?php echo $_SERVER['REQUEST_URI'];?>">20</option><?php
								} else {
									?><option value="<?php echo $_SERVER['REQUEST_URI'];?>"><?php echo $_SESSION['Quantity']; ?></option><?php
								}
							?>
							<option value="
							<?php
									echo $_SERVER['REQUEST_URI'];
							?>&Quantity=20">20</option>
							<option value="
							<?php
							echo $_SERVER['REQUEST_URI'];

							?>&Quantity=50">50</option><option value="
							<?php
							echo $_SERVER['REQUEST_URI'];

							?>&Quantity=100">100</option>
						</select>
					</form>
					Страница:
					<?php

						$page = explode('&',$_SERVER['REQUEST_URI']);
						if (!empty($_GET['page']))
						{
							$pageNum = $_GET['page'];
						} else {
							$pageNum = 1;
						}

						$query = "SELECT COUNT(*) FROM ".$DBName." WHERE ".$pageFilter."page = '".$pageName."'";  //считае количество записей для подсчета страниц
						$rs = Model::fatchArray($query);
						$timeVar = $rs [0]['COUNT(*)'];
						$timeVar = ceil($timeVar/$_SESSION['Quantity']); // общее количество страниц
						for ($i = 1; $i<=$timeVar; $i++)
						{
							if ($i == $timeVar) {
								$nummberOfPage = '<a href= .'. $page[0].'&page='. ($i) .' class="pageNavigation">'. ($i) .'</a>';
							} else {
								$nummberOfPage = '<a  href= .'. $page[0].'&page='. ($i) .' class="pageNavigation">'. ($i) .'</a> | ';
							}

							if ($pageNum == $i)
							{
								echo '<b>'.$nummberOfPage.'</b>';
							} else {
								echo $nummberOfPage;
							}



						}
						$_GET['page'] = '';
					?>
				</p>
			</div>
		<?php

	}

	public static function pageParam () {

		$pageParam = explode('/', $_SERVER['REQUEST_URI']);

		$pageParam = array_pop($pageParam);
		$pageParam = explode('?', $pageParam);

		$pageParam = explode('&', $pageParam[1]);

		for ($i = 0; $i<=(count($pageParam)-1); $i++)
		{
			$Quantity = substr(strstr ($pageParam[$i], 'Quantity='),9);
			if ($Quantity>'') {
				$_SESSION['Quantity'] = $Quantity;

				$reconect = str_replace('&'.$pageParam[$i], "", $_SERVER['REQUEST_URI']);
				header('Location: '.$reconect);
			}

		}
		echo 'echo $Quantity:'.$Quantity.'<br>';
		echo "echo $_SESSION[Quantity]:".$_SESSION['Quantity']."<br>!!!";
		$pageFilter = $pageParam[0];
		return array('pageFilter'=>$pageFilter);
	}
}