<?php
ini_set('display_errors', 1);
define("WEBAPP_DIR", dirname(__FILE__) . "/webapp/");

//include SOY2
if(!class_exists("SOY2")) include_once(WEBAPP_DIR . "lib/soy2_build.php");

// SOY2::importを使えるようにする
SOY2::RootDir(WEBAPP_DIR . "src/");

// init SOY2HTML
SOY2HTMLConfig::PageDir(WEBAPP_DIR . "pages/");
SOY2HTMLConfig::CacheDir(WEBAPP_DIR . "cache/");

// init SOY2DAO
$dbpath = WEBAPP_DIR . "db/sample.db";
SOY2DAOConfig::Dsn("sqlite:".$dbpath);
SOY2DAOConfig::DaoDir(SOY2::RootDir() . "domain/");
SOY2DAOConfig::EntityDir(SOY2DAOConfig::DaoDir());
SOY2DAOConfig::DaoCacheDir(WEBAPP_DIR . "cache/");

// init db file.
if(!file_exists($dbpath)){
	$dao = new SOY2DAO();
	
	// transaction https://saitodev.co/soycms/soy2/tutorial/203
	$dao->begin();
	$sqls = preg_split('/CREATE TABLE/', file_get_contents(SOY2::RootDir() . "sql/init_sqlite.sql"), -1, PREG_SPLIT_NO_EMPTY) ;
	foreach($sqls as $sql){
		try{
			$dao->executeQuery("CREATE TABLE " . trim($sql));
		}catch(Exception $e){
			//
		}
	}
    	
	$dao->commit();
	unset($dao);
	unset($dbpath);
}

// init controller
SOY2::import("base.PageController");
SOY2PageController::init("PageController");