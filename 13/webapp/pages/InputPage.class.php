<?php

class InputPage extends WebPage {

	function __construct(){
		parent::__construct();

		$fruits = array(
			"apple",
			"orange",
			"peach",
			"lemon"
		);
		
		// 通常
		$this->createAdd("fruits", "HTMLSelect", array(
			"name" => "fruits",
			"options" => $fruits
		));

		// インデックス有り
		$this->createAdd("fruits_with_index", "HTMLSelect", array(
			"name" => "fruits",
			"options" => $fruits,
			"indexOrder" => true
		));

		// 初期値あり
		$this->createAdd("fruits_with_initial_value", "HTMLSelect", array(
			"name" => "fruits",
			"options" => $fruits
		));

		// each
		$this->createAdd("fruits_with_each", "HTMLSelect", array(
			"name" => "fruits",
			"options" => $fruits,
			"each" => array("onclick"=>"alert(this.value);")
		));

		//選択済み(通常)
		$this->createAdd("fruits_selected", "HTMLSelect", array(
			"name" => "fruits",
			"options" => $fruits,
			"selected" => "peach"
		));

		//選択済み(通常)
		$this->createAdd("fruits_with_index_selected", "HTMLSelect", array(
			"name" => "fruits",
			"options" => $fruits,
			"selected" => 2,
			"indexOrder" => true
		));


		// 連想配列
		$fruits = array(
			"apple" => "リンゴ",
			"orange" => "オレンジ",
			"peach" => "桃",
			"lemon" => "レモン"
		);

		$this->createAdd("fruits_associative_array", "HTMLSelect", array(
			"name" => "fruits",
			"options" => $fruits
		));

		$this->createAdd("fruits_associative_array_selected", "HTMLSelect", array(
			"name" => "fruits",
			"options" => $fruits,
			"selected" => "peach"
		));

		$this->createAdd("fruits_required", "HTMLSelect", array(
			"name" => "fruits",
			"options" => $fruits,
			"required" => true
		));
	}
}