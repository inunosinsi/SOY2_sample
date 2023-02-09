<?php

class TopPage extends WebPage {

	function __construct(){
		parent::__construct();

		// soy:id="now"を使えるようにする
		$this->createAdd("now", "HTMLLabel", array(
			"text" => date("Y-m-d H:i:s")
		));

		// cms:id="now"を使えるようにする
		// $this->createAdd("now", "HTMLLabel", array(
		// 	"soy2prefix" => "cms",
		// 	"text" => date("Y-m-d H:i:s")
		// ));
	}
}