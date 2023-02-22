<?php
//include SOY2
define("WEBAPP_DIR", dirname(__FILE__) . "/webapp/");
if(!class_exists("SOY2")) include_once(WEBAPP_DIR . "lib/soy2_build.php");

//SQLiteのインメモリを使用
SOY2DAOConfig::Dsn("sqlite::memory:");

$dao = new SOY2DAO();
$sql = "CREATE TABLE soy2_sample (
			id integer primary key AUTOINCREMENT, 
			text TEXT
		);";
try{
	$dao->executeQuery($sql);
}catch(Exception $e){
	var_dump($e);
}

$sql = "INSERT INTO soy2_sample (text) VALUES('hoge');";
try{
	$dao->executeQuery($sql);
}catch(Exception $e){
	var_dump($e);
}

$sql = "SELECT * FROM soy2_sample;";
try{
	$results = $dao->executeQuery($sql);
	var_dump($results);
}catch(Exception $e){
	var_dump($e);
}

$sql = "UPDATE soy2_sample SET text = 'huga' WHERE id = 1";
try{
	$dao->executeUpdateQuery($sql);
}catch(Exception $e){
	var_dump($e);
}

$sql = "SELECT * FROM soy2_sample;";
try{
	$results = $dao->executeQuery($sql);
	var_dump($results);
}catch(Exception $e){
	var_dump($e);
}