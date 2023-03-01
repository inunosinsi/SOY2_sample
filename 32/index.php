<?php
include("config.php");

$dao = new SOY2DAO();

// init_sqlite.sqlに記載されている複数のテーブルスキーマを実行する仕組み
$sqls = preg_split('/CREATE TABLE/', file_get_contents(SOY2::RootDir() . "sql/init_sqlite.sql"), -1, PREG_SPLIT_NO_EMPTY) ;
foreach($sqls as $sql){
	try{
		$dao->executeQuery("CREATE TABLE " . trim($sql));
	}catch(Exception $e){
		//
	}
}

$dao = SOY2DAOFactory::create("SOY2SampleDAO");
$relDao = SOY2DAOFactory::create("SOY2RelationDAO");

// トランザクションの開始
$dao->begin();

$obj = new SOY2Sample();
$obj->setText("apple");

try{
	$id = $dao->insert($obj);
}catch(Exception $e){
	$isFailed = true;
}

if(!$isFailed){
	$rel = new SOY2Relation();
	$rel->setSampleId($id);
	$rel->setText("orange");
	try{
		$relDao->insert($rel);
	}catch(Exception $e){
		$isFailed = true;
	}	
}

// トランザクション終了
if($isFailed){
	// レコードの挿入で一度でも失敗があればロールバック
	$dao->rollback();
}else{
	// レコードの挿入で一度も失敗がない場合はコミット
	$dao->commit();
}

try{
	$sample = $dao->getById($id);
	$relation = $relDao->getBySampleId($sample->getId());
	var_dump($sample);
	var_dump($relation);
}catch(Exception $e){
	//
}