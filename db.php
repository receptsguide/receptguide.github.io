<?php
	require "libs/rb.php";
	
	R::setup('mysql:host=localhost;dbname=komment', 'root', '');
		
	$sdd_db_host='localhost'; // ваш хост
	$sdd_db_name='komment'; // ваша бд
	$sdd_db_user='root'; // пользователь бд
	$sdd_db_pass=''; // пароль к бд
	
	// коннект с сервером бд
	$conn = mysql_connect($sdd_db_host,$sdd_db_user,$sdd_db_pass); 
	if(!$conn){
		throw new Exception('Не удалось подключиться к базе данных! Проверьте параметры подключения');
	}
	
	// выбор бд
	if(!mysql_select_db($sdd_db_name, $conn)){ 	
		throw new Exception("Не удалось выбрать базу данных {$ssd_db_name}!");
	}
	
	mysql_set_charset('utf8');
	
	session_start();
?>