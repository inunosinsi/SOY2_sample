<?php

class InputPage extends WebPage {

	function __construct(){
		parent::__construct();

		$this->createAdd("form", "HTMLForm");

		$this->createAdd("item", "HTMLCheckBox", array(
			"name" => "item",
			"value" => 1
		));

		$this->createAdd("item_checked", "HTMLCheckBox", array(
			"name" => "item",
			"value" => 1,
			"selected" => true
		));

		$this->createAdd("item_with_label", "HTMLCheckBox", array(
			"name" => "item",
			"value" => 1,
			"label" => "項目"
		));

		$this->createAdd("item_id_manual_set", "HTMLCheckBox", array(
			"name" => "item",
			"value" => 1,
			"elementId" => "manual_set"
		));

		$this->createAdd("item_with_hidden_value", "HTMLCheckBox", array(
			"name" => "item",
			"value" => 1,
			"isBoolean" => true
		));
	}
}