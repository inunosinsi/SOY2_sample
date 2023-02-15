<?php

class InputPage extends WebPage {

	function doPost(){
		if(soy2_check_token()){
			$session = SOY2ActionSession::getUserSession();
			$session->setAttribute("soy2_sample", $_POST["name"]);
			$session->setAttribute("page", "Confirm");

			SOY2PageController::jump("");
		}
	}

	function __construct(){
		parent::__construct();
		
		$session = SOY2ActionSession::getUserSession();
		$value = $session->getAttribute("soy2_sample");
		
		$this->createAdd("form", "HTMLForm");

		$this->createAdd("name", "HTMLInput", array(
			"name" => "name",
			"value" => $value
		));
	}
}