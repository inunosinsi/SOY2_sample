<?php
/**
 * @table soy2_sample
 */
class SOY2Sample {

	/**
	 * @id
	 */
	private $id;

	private $text;

	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id = $id;
	}

	function getText(){
		return $this->text;
	}
	function setText($text){
		$this->text = $text;
	}
}