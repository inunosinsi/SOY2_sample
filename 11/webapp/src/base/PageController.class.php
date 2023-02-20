<?php

class PageController extends SOY2PageController{

    function execute(){
		// SOY2HTMLConfig::PageDirで指定したディレクトリからページのクラスファイルを読み込む
		$reqUri = (isset($_SERVER["REQUEST_URI"])) ? ltrim($_SERVER["REQUEST_URI"], "/") : "";
		$dirs = explode("/", $reqUri);
		$pageType = (isset($dirs[0]) && strlen($dirs[0])) ? ucfirst($dirs[0]) : "Input";

		// 指定のページのクラスファイルがあるか？ なければ404NotFound
		if(!SOY2HTMLFactory::pageExists($pageType."Page")){
			self::onNotFound();
		}
		$page = SOY2HTMLFactory::createInstance($pageType."Page");

		ob_start();
		$page->display();
		$html = ob_get_contents();
		ob_end_clean();

		include(WEBAPP_DIR."layout/main.php");
		exit;
    }

	function onNotFound(string $path="", array $args=array(), string $classPath=""){
		header("HTTP/1.1 404 Not Found");
		header("Content-Type: text/html; charset=utf-8");

		$page = SOY2HTMLFactory::createInstance("ErrorPage");

		ob_start();
		$page->display();
		$html = ob_get_contents();
		ob_end_clean();

		include(WEBAPP_DIR."layout/main.php");
		exit;
	}
}
