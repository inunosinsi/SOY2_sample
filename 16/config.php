<?php
ini_set('display_errors', 1);
define("WEBAPP_DIR", dirname(__FILE__) . "/webapp/");

//include SOY2
if(!class_exists("SOY2")) include_once(WEBAPP_DIR . "lib/soy2_build.php");

// SOY2::importを使えるようにする
SOY2::RootDir(WEBAPP_DIR . "src/");

SOY2HTMLConfig::PageDir(WEBAPP_DIR . "pages/");
SOY2HTMLConfig::CacheDir(WEBAPP_DIR . "cache/");

// init controller
SOY2::import("base.PageController");
SOY2PageController::init("PageController");