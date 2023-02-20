<?php

class ClassPathBuilder extends SOY2_DefaultClassPathBuilder{

	/**
	 * @param string
	 * @return string
	 */
	function getClassPath(string $path){
		if(is_bool(strpos($path, "."))) return $path;
		$arr = explode(".", $path);
		$arr[count($arr)-1] = ucfirst($arr[count($arr)-1]);	// 配列内の最後の値の頭文字を大文字にする
		return implode(".", $arr);
	}
}