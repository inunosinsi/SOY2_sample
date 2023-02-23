<?php
//include SOY2
define("WEBAPP_DIR", dirname(__FILE__) . "/webapp/");
if(!class_exists("SOY2")) include_once(WEBAPP_DIR . "lib/soy2_build.php");

SOY2::RootDir(WEBAPP_DIR . "src/");

// SOY2DAOの設定　SQLiteのインメモリを使用
SOY2DAOConfig::Dsn("sqlite::memory:");
SOY2DAOConfig::DaoDir(SOY2::RootDir() . "domain/");
SOY2DAOConfig::EntityDir(SOY2DAOConfig::DaoDir());
SOY2DAOConfig::DaoCacheDir(WEBAPP_DIR . "/cache/");