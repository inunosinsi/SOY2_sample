<?php
define("WEBAPP_DIR", dirname(__FILE__) . "/webapp/");

//include SOY2
if(!class_exists("SOY2")) include_once(WEBAPP_DIR . "lib/soy2_build.php");

// SOY2HTMLで出力するクラスファイルの格納場所を指定
SOY2HTMLConfig::PageDir(WEBAPP_DIR . "pages/");

// SOY2HTMLで出力したページのキャッシュファイルの格納場所を指定
SOY2HTMLConfig::CacheDir(WEBAPP_DIR . "cache/");

// SOY2HTMLConfig::PageDirで指定したディレクトリからページのクラスファイルを読み込む
$page = SOY2HTMLFactory::createInstance("TopPage");

// TopPage.class.php + TopPage.htmlから出力用のHTMLを組み立てる
ob_start();
$page->display();
$html = ob_get_contents();
ob_end_clean();

echo $html;