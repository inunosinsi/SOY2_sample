<?php

class DetailPage extends WebPage {

	function doPost(){
		if(soy2_check_token()){
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

	function __construct(){
		parent::__construct();

		$this->createAdd("top_link", "HTMLLink", array(
			"link" => SOY2PageController::createRelativeLink()
		));

		$this->createAdd("form", "HTMLForm");

		$this->createAdd("name", "HTMLInput", array(
			"name" => "User[name]",
			"value" => "",
			"placeholder" => "名前"
		));

		$this->createAdd("age", "HTMLInput", array(
			"name" => "User[age]",
			"value" => "",
			"placeholder" => "年齢"
		));
	}
}