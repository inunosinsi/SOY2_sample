<?php

class PageController extends SOY2PageController{

    function execute(){
		$builder = $this->getPathBuilder();
		$classPathBuilder = $this->getClassPathBuilder();

		$path = $builder->getPath();
		if(!strlen($path) || substr($path,strlen($path)-1,1) == "."){
			$path .= $this->getDefaultPath();	// pathがなければIndex
		}
		
 		$classPath = $classPathBuilder->getClassPath($path);
 		$classPath .= 'Page';

		// 指定のページのクラスファイルがあるか？ なければ404NotFound
		if(!SOY2HTMLFactory::pageExists($classPath)){
			self::onNotFound();
		}
		$page = SOY2HTMLFactory::createInstance($classPath);

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

	/**
	 * @final
	 */
	function &getPathBuilder(){
		$builder = parent::getPathBuilder();
		return $builder;
	}

	/**
	 * @final
	 */
	function &getClassPathBuilder(){
		$builder = parent::getClassPathBuilder();
		return $builder;
	}
}
