<?php

class InputPage extends WebPage {

	function doPost(){
		if(soy2_check_token()){
			var_dump($_POST["name"]);exit;
		}
	}

	function __construct(){
		parent::__construct();

		$this->createAdd("form", "HTMLForm");

		$this->createAdd("name", "HTMLInput", array(
			"name" => "name"
		));
	}
}