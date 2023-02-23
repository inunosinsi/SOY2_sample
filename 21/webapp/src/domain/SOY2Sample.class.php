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

	/**
	 * @column create_date
	 */
	private $createDate = 0;

	/**
	 * @column update_date
	 */
	private $updateDate = 0;

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

	function getCreateDate(){
		return $this->createDate;
	}
	function setCreateDate($createDate){
		$this->createDate = $createDate;
	}

	function getUpdateDate(){
		return $this->updateDate;
	}
	function setUpdateDate($updateDate){
		$this->updateDate = $updateDate;
	}
}