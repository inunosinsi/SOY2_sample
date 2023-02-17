<?php

class InputPage extends WebPage {

	function __construct(){
		parent::__construct();
		
		$this->createAdd("form", "HTMLForm");

		$this->createAdd("content", "HTMLTextArea", array(
			"name" => "name",
			"value" => ""
		));
	}
}