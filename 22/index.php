<?php
include("config.php");

$dao = new SOY2DAO();

// テーブルスキーマが記述されているファイルを取得する
$sql = file_get_contents(SOY2::RootDir() . "sql/init_sqlite.sql");
$dao->executeQuery($sql);

// データベースにisOpenがSOY2Sample::IS_OPENとSOY2Sample::NO_OPENのレコードを交互に挿入する
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

	if($idx % 2 === 0){
		$obj->setIsOpen(SOY2Sample::IS_OPEN);
	} else {
		$obj->setIsOpen(SOY2Sample::NO_OPEN);
	}

	try{
		$id = $dao->insert($obj);
	}catch(Exception $e){
		//
	}
}

// SOY2Sample::IS_OPENのレコードのみ取得
try{
	$results = $dao->getByIsOpen(SOY2Sample::IS_OPEN);
}catch(Exception $e){
	//
	var_dump($e);
}

var_dump($results);