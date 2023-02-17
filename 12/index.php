<?php
define("WEBAPP_DIR", dirname(__FILE__) . "/webapp/");

//include SOY2
if(!class_exists("SOY2")) include_once(WEBAPP_DIR . "lib/soy2_build.php");

SOY2HTMLConfig::PageDir(WEBAPP_DIR . "pages/");
SOY2HTMLConfig::CacheDir(WEBAPP_DIR . "cache/");

$page = SOY2HTMLFactory::createInstance("InputPage");

ob_start();
$page->display();
$html = ob_get_contents();
ob_end_clean();

include(WEBAPP_DIR."layout/main.php");
exit;