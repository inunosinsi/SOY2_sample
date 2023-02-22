<?php
//include SOY2
define("WEBAPP_DIR", dirname(__FILE__) . "/webapp/");
if(!class_exists("SOY2")) include_once(WEBAPP_DIR . "lib/soy2_build.php");

//SQLiteのインメモリを使用
SOY2DAOConfig::Dsn("sqlite::memory:");
SOY2DAOConfig::DaoCacheDir(WEBAPP_DIR . "/cache/");

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

$sql = "INSERT INTO soy2_sample (text) VALUES(:text);";
try{
	$dao->executeQuery($sql, array(":text" => "hoge"));
}catch(Exception $e){
	var_dump($e);
}

$sql = "SELECT * FROM soy2_sample WHERE id = :id;";
try{
	$results = $dao->executeQuery($sql, array(":id" => 1));
	var_dump($results);
}catch(Exception $e){
	var_dump($e);
}

$sql = "UPDATE soy2_sample SET text = :text WHERE id = :id";
try{
	$dao->executeUpdateQuery($sql, array(":text" => "huga", ":id" => 1));
}catch(Exception $e){
	var_dump($e);
}

$sql = "SELECT * FROM soy2_sample WHERE id = :id;";
try{
	$results = $dao->executeQuery($sql, array(":id" => 1));
	var_dump($results);
}catch(Exception $e){
	var_dump($e);
}