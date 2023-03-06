<?php

class DetailPage extends WebPage {

	private $id;

	function doPost(){
		if(soy2_check_token()){
			// 下記の手続きでオブジェクトの更新に変わる
			if($this->id > 0){
				$_POST["User"]["id"] = $this->id;
			}

			// $_POST["User"]の配列をそのままUserLogic.class.phpのsaveメソッドに渡す
			$id = SOY2Logic::createInstance("logic.UserLogic")->save($_POST["User"]);
			if($id > 0){	// 登録成功
				SOY2PageController::redirect("detail/".$id);
				// URLにindex.phpを含む場合は下記
				//SOY2PageController::jump("detail.".$id);
			}else{			// 登録失敗
				SOY2PageController::redirect("detail?error");
				// URLにindex.phpを含む場合は下記
				//SOY2PageController::jump("detail?error");
			}
		}
	}

	function __construct($args){
		$this->id = (isset($args[0])) ? (int)$args[0] : 0;

		parent::__construct();

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
}