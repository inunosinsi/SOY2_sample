<?php

class PathInfoBuilder extends SOY2_PathInfoPathBuilder {
	
	var $path;
 	var $arguments;

	function __construct(){
		// $_SERVER["PHP_INFO"]から$_SERVER["REQUEST_URI"]に変更
		$pathInfo = (isset($_SERVER['REQUEST_URI'])) ? $_SERVER['REQUEST_URI'] : "";
		if(preg_match('/^((\/[a-zA-Z]*)*)(\/-)?((\/[0-9a-zA-Z_\.]*)*)$/',$pathInfo,$tmp)){
 			$path = preg_replace('/^\/|\/$/',"",$tmp[1]);
 			$path = str_replace("/",".",$path);
 			$arguments = preg_replace("/^\//","",$tmp[4]);
 			$arguments = explode("/",$arguments);
 			foreach($arguments as $key => $value){
 				if(!strlen($value)){
 					$arguments[$key] = null;
 					unset($arguments[$key]);
 				}
 			}
 			$this->path = $path;
 			$this->arguments = $arguments;
 		}
	}
}