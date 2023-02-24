<?php
/**
 * @table soy2_sample
 */
class SOY2Sample {

	const NO_OPEN = 0;
	const IS_OPEN = 1;

	/**
	 * @id
	 */
	private $id;

	private $text;

	/**
	 * @column is_open
	 */
	private $isOpen = self::NO_OPEN;

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

	function getIsOpen(){
		return $this->isOpen;
	}
	function setIsOpen($isOpen){
		$this->isOpen = $isOpen;
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