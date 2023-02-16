<?php

class ConfirmPage extends WebPage {

	function doPost(){
		if(soy2_check_token()){
			if(isset($_POST["back"])){
				SOY2PageController::redirect();
			}
			
			if(isset($_POST["next"])){
				SOY2PageController::redirect("complete");
			}
		}
	}

	function __construct(){
		$session = SOY2ActionSession::getUserSession();
		$value = $session->getAttribute("soy2_sample");

		// 値が無い時は確認画面を表示しない
		if(is_null($value)) {
			$session->setAttribute("page", "Input");
			SOY2PageController::redirect();
		}

		parent::__construct();

		$this->createAdd("form", "HTMLForm");

		$this->createAdd("name_text", "HTMLLabel", array(
			"text" => $value
		));
	}
}