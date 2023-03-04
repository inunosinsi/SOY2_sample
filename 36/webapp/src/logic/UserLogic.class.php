<?php

class UserLogic extends SOY2LogicBase {

	private $order = "create_date DESC";
	private $limit = 5;
	private $offset = 0;

	/**
	 * @param array
	 * @return int
	 */
	function save(array $arr){
		$dao = SOY2DAOFactory::create("UserDAO");

		// SOY2::cast(クラス名 or クラス, 配列 or オブジェクト)で配列からUserオブジェクトを生成する
		if(isset($arr["id"])){ // 更新の手続き用
			$old = self::getById($arr["id"]);
			$user = SOY2::cast($old, $arr);
		}else{	// 新規登録の手続き用
			$user = SOY2::cast("User", $arr);
		}

		// $user->getId()がnull値の場合は新規登録　整数値である場合は更新
		if(is_null($user->getId())){
			try{
				$id = $dao->insert($user);
				return (int)$id;
			}catch(Exception $e){
				//
			}
		}else{
			try{
				$dao->update($user);
				return (int)$user->getId();
			}catch(Exception $e){
				//
			}
		}

		return 0;
	}

	/**
	 * @return array
	 */
	function get(){
		$dao = SOY2DAOFactory::create("UserDAO");
		
		// https://saitodev.co/soycms/soy2/tutorial/197
		$dao->setOrder($this->order);

		// https://saitodev.co/soycms/soy2/tutorial/198
		$dao->setLimit($this->limit);
		$dao->setOffset($this->offset);

		try{
			return $dao->get();
		}catch(Exception $e){
			return array();
		}
	}

	/**
	 * @param int
	 * @return User
	 */
	function getById(int $id){
		try{
			return SOY2DAOFactory::create("UserDAO")->getById($id);
		}catch(Exception $e){
			return new User();
		}
	}

	function setOrder(string $order){
		$this->order = $order;
	}
	function setLimit(int $limit){
		$this->limit = $limit;
	}
	function setOffset(int $offset){
		$this->offset = $offset;
	}
}