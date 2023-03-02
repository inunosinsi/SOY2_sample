<?php

class SampleLogic extends SOY2LogicBase {

	private $name;

	function __construct(){}

	/**
	 * @return string
	 */
	function getName(){
		return $this->name;
	}

	/**
	 * @param string
	 */
	function setName(string $name){
		$this->name = $name;
	}
}