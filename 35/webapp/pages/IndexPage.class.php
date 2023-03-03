<?php

class IndexPage extends WebPage {

	function __construct(){
		parent::__construct();

		$this->createAdd("register_link", "HTMLLink", array(
			"link" => SOY2PageController::createRelativeLink("detail"),
			"target" => "_blank",
			"rel" => "noopener"
		));
	}
}