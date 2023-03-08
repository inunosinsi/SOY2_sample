<?php

class DetailPage extends WebPage {

	private $id;

	function doPost(){
		if(soy2_check_token()){
			$posts = $_POST["User"];
			if(self::_validate($posts)){
				// 下記の手続きでオブジェクトの更新に変わる
				if($this->id > 0){
					$posts["id"] = $this->id;
				}
				$id = SOY2Logic::createInstance("logic.UserLogic")->save($posts);
				if($id > 0){	// 登録成功
					SOY2PageController::redirect("detail/".$id."?success");
				}
			}

			// 登録失敗
			SOY2PageController::redirect("detail?error");
		}
	}

	/**
	 * エラーチェック
	 * @param array
	 * @return bool
	 */
	private function _validate(array $posts){
		$errors = array();

		// nameの値がなければエラー
		if(!isset($posts["name"]) || !is_string($posts["name"]) || !strlen(trim($posts["name"]))){
			$errors["name"] = "名前を入力してください。";
		}
		
		// エラーがある場合はエラー内容をセッションに入れておく
		if(count($errors)){
			$session = SOY2ActionSession::getUserSession();
			$session->setAttribute("errors", soy2_serialize($errors));
		}

		return (!count($errors));
	}

	function __construct($args){
		// PageControllerの方で渡したargumentsの値が$argsに格納されている
		$this->id = (isset($args[0])) ? (int)$args[0] : 0;

		parent::__construct();

		$errors = self::_getErrors();
		
		// エラーがある場合は囲った箇所を表示するsoy:id="is_error"を作成する
		$this->createAdd("is_error", "HTMLModel", array(
			"visible" => count($errors)
		));

		$this->createAdd("name_error", "HTMLLabel", array(
			"text" => (isset($errors["name"])) ? $errors["name"] : ""
		));

		$this->createAdd("top_link", "HTMLLink", array(
			"link" => SOY2PageController::createRelativeLink()
		));

		$user = SOY2Logic::createInstance("logic.UserLogic")->getById($this->id);
		
		$this->createAdd("form", "HTMLForm");

		$this->createAdd("name", "HTMLInput", array(
			"name" => "User[name]",
			"value" => $user->getName(),
			"placeholder" => "名前"
		));

		$this->createAdd("age", "HTMLInput", array(
			"name" => "User[age]",
			"value" => $user->getAge(),
			"placeholder" => "年齢"
		));
	}

	/**
	 * @return array
	 */
	private function _getErrors(){
		$session = SOY2ActionSession::getUserSession();
		$errors = $session->getAttribute("errors");
		if(!is_string($errors)) return array();

		// セッションからエラー内容を削除しておく
		$session->setAttribute("errors", null);

		return soy2_unserialize($errors);
	}
}