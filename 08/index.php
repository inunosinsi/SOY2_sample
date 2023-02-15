<?php
define("WEBAPP_DIR", dirname(__FILE__) . "/webapp/");

//include SOY2
if(!class_exists("SOY2")) include_once(WEBAPP_DIR . "lib/soy2_build.php");

// SOY2HTMLで出力するクラスファイルの格納場所を指定
SOY2HTMLConfig::PageDir(WEBAPP_DIR . "pages/");

// SOY2HTMLで出力したページのキャッシュファイルの格納場所を指定
SOY2HTMLConfig::CacheDir(WEBAPP_DIR . "cache/");

// SOY2HTMLConfig::PageDirで指定したディレクトリからページのクラスファイルを読み込む
$reqUri = (isset($_SERVER["REQUEST_URI"])) ? ltrim($_SERVER["REQUEST_URI"], "/") : "";
$dirs = explode("/", $reqUri);
$pageType = (isset($dirs[0]) && strlen($dirs[0])) ? $dirs[0] : "input";

// ucfirstで文字列の最初の文字を大文字にする
$page = SOY2HTMLFactory::createInstance(ucfirst($pageType)."Page");

ob_start();
$page->display();
$html = ob_get_contents();
ob_end_clean();

include(WEBAPP_DIR."layout/main.php");
exit;