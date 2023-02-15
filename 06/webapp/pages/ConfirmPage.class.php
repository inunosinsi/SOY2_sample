<?php

class ConfirmPage extends WebPage {

	function doPost(){
		if(soy2_check_token()){
			if(isset($_POST["back"])){
				$session = SOY2ActionSession::getUserSession();
				$session->setAttribute("page", "Input");

				SOY2PageController::redirect();
			}				
		}
	}

	function __construct(){
		parent::__construct();
		
		$session = SOY2ActionSession::getUserSession();
		$value = $session->getAttribute("soy2_sample");
		
		$this->createAdd("form", "HTMLForm");

		$this->createAdd("name_text", "HTMLLabel", array(
			"text" => $value
		));
	}
}