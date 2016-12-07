<?php

class Model
{

	public static function full_list ($array1, $array2, $dir, $num) {
		for ($i =0;$i < $num; $i++) {
			echo'<div class="img_category"><img src="img/'.$dir.'/'.$array1[$i].'.jpg" height="60px" width="60px"></div>';
			?><div class="list_category"><ul><?php
				foreach ($array2[$i] as $key => $value){
					echo '<li><a href="/.$key.">'.$value.'</a></li>';
				}
				?></ul></div><?php
		}
	}
	/*
		Модель обычно включает методы выборки данных, это могут быть:
			> методы нативных библиотек pgsql или mysql;
			> методы библиотек, реализующих абстракицю данных. Например, методы библиотеки PEAR MDB2;
			> методы ORM;
			> методы для работы с NoSQL;
			> и др.
	*/

	// метод выборки данных
	public function get_data()
	{
		// todo
	}
}