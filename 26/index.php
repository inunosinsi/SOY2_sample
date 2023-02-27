<?php
include("config.php");

$dao = new SOY2DAO();

// テーブルスキーマが記述されているファイルを取得する
$sql = file_get_contents(SOY2::RootDir() . "sql/init_sqlite.sql");
$dao->executeQuery($sql);

$fruits = array(
	"apple",
	"orange",
	"melon",
	"peach",
	"grape"
);

$dao = SOY2DAOFactory::create("SOY2SampleDAO");
foreach($fruits as $idx => $f){
	$obj = new SOY2Sample();
	$obj->setText($f);

	try{
		$id = $dao->insert($obj);
	}catch(Exception $e){
		//
	}
}

// LIMIT句とOFFSET句を使う
$limit = 2;
$offset = 1;
$dao->setLimit($limit);
$dao->setOffset($offset);

try{
	$results = $dao->get();
}catch(Exception $e){
	//
	var_dump($e);
}

// IDのみ出力する
foreach($results as $obj){
	var_dump($obj->getId());
}