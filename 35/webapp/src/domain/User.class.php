<?php
/**
 * @table soy2_user
 */
class User {

	/**
	 * @id
	 */
	private $id;
	private $name;
	private $age;

	/**
	 * @column create_date
	 */
	private $createDate;

	/**
	 * @column update_date
	 */
	private $updateDate;

	function getId(){
		return $this->id;
	}
	function setId($id){
		$this->id = $id;
	}

	function getName(){
		return $this->name;
	}
	function setName($name){
		$this->name;
	}

	function getAge(){
		return $this->age;
	}
	function setAge($age){
		$this->age = $age;
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