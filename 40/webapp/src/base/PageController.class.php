<?php

class PageController extends SOY2PageController{

    function execute(){
		$builder = $this->getPathBuilder();
		$classPathBuilder = $this->getClassPathBuilder();

		$path = $builder->getPath();
		$args = $builder->getArguments();
		if(!strlen($path) || substr($path,strlen($path)-1,1) == "."){
			$path .= $this->getDefaultPath();	// pathがなければIndex
		}
		
 		$classPath = $classPathBuilder->getClassPath($path)."Page";
		
		// 指定のページのクラスファイルがあるか？
		if(!SOY2HTMLFactory::pageExists($classPath)){
			// なければ$path.IndexPageの方を調べる。なければ404
			$classPath = $path.".IndexPage";
			if(!SOY2HTMLFactory::pageExists($classPath)){
				self::onNotFound();
			}
		}
		$page = SOY2HTMLFactory::createInstance($classPath, array(
			"arguments" => $args
		));

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
		SOY2::import("base.PathInfoBuilder");
		$builder = new PathInfoBuilder();
		return $builder;
	}

	/**
	 * @final
	 */
	function &getClassPathBuilder(){
		SOY2::import("base.ClassPathBuilder");
		$builder = new ClassPathBuilder();
		return $builder;
	}
}
