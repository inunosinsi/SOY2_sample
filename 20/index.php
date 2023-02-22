<?php
include("config.php");

$dao = new SOY2DAO();

// テーブルスキーマが記述されているファイルを取得する
$sql = file_get_contents(SOY2::RootDir() . "sql/init_sqlite.sql");
$dao->executeQuery($sql);

// INSERT INTO soy2_sample (text) VALUES(:text);と同じ処理をSOY2DAOで書き換える

// domainディレクトリ以下をドット区切りでDAOのファイルを指定する
$dao = SOY2DAOFactory::create("SOY2SampleDAO");
$obj = new SOY2Sample();
$obj->setText("hoge");
try{
	$id = $dao->insert($obj);
}catch(Exception $e){
	var_dump($e);
}

// SELECT * FROM soy2_sample WHERE id = :id;と同じ処理をSOY2DAOで書き換える
try{
	$obj = $dao->getById($id);
}catch(Exception $e){
	var_dump($e);
	//$obj = new SOY2Sample();
}
var_dump($obj);

// UPDATE soy2_sample SET text = :text WHERE id = :idと同じ処理をSOY2DAOで書き換える
$obj->setId($id);
$obj->setText("huga");
try{
	$dao->update($obj);
}catch(Exception $e){
	var_dump($e);
}
// 値の確認用
try{
	$obj = $dao->getById($id);
}catch(Exception $e){
	var_dump($e);
	//$obj = new SOY2Sample();
}
var_dump($obj);