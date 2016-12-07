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

	public static function full_list ($array1, $array2, $dir, $num)
	{
		for ($i =0;$i < $num; $i++)
		{
			echo'<div class="img_category"><img src="img/'.$dir.'/'.$array1[$i].'.jpg" height="60px" width="60px"></div>';
			?><div class="list_category"><ul><?php
				foreach ($array2[$i] as $key => $value)
				{
					echo '<li><a href="/.$key.">'.$value.'</a></li>';
				}
				?></ul></div><?php
		}
	}


	// метод выборки данных
	public function get_data()
	{
		// todo
	}
}