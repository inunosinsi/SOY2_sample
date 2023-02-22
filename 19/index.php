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

// INSERT INTO soy2_sample (text) VALUES(:text);を書き換える
$query = new SOY2DAO_Query();
$query->prefix = "insert";
$query->table = "soy2_sample";
$query->sql = "(text) values(:text)";

try{
	$dao->executeQuery($query, array(":text" => "hoge"));
}catch(Exception $e){
	var_dump($e);
}

// SELECT * FROM soy2_sample WHERE id = :id;を書き換える
$query = new SOY2DAO_Query();
$query->prefix = "select";
$query->table = "soy2_sample";
$query->sql = "id, text";	// *でも良い
$query->where = "id = :id";
try{
	$results = $dao->executeQuery($query, array(":id" => 1));
	var_dump($results);
}catch(Exception $e){
	var_dump($e);
}

// UPDATE soy2_sample SET text = :text WHERE id = :id
$query = new SOY2DAO_Query();
$query->prefix = "update";
$query->table = "soy2_sample";
$query->sql = "text = :text";	// updateの場合はsetはいらない
$query->where = "id = :id";

try{
	$dao->executeUpdateQuery($query, array(":id" => 1, ":text" => "hoge"));
}catch(Exception $e){
	var_dump($e);
}

// 値の確認用
try{
	$results = $dao->executeQuery("SELECT * FROM soy2_sample WHERE id = :id", array(":id" => 1));
	var_dump($results);
}catch(Exception $e){
	var_dump($e);
}