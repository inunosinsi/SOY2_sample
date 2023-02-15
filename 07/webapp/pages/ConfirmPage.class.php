<?php

class ConfirmPage extends WebPage {

	function doPost(){
		if(soy2_check_token()){
			if(isset($_POST["back"])){
				$session = SOY2ActionSession::getUserSession();
				$session->setAttribute("page", "Input");
			}
			
			if(isset($_POST["next"])){
				$session = SOY2ActionSession::getUserSession();
				$session->setAttribute("page", "Complete");
			}

			SOY2PageController::jump();
		}
	}

	function __construct(){
		parent::__construct();
		
		$this->createAdd("form", "HTMLForm");

		$this->createAdd("name_text", "HTMLLabel", array(
			"text" => $value
		));
	}
}