<?php

class IndexPage extends WebPage {

	function __construct(){
		parent::__construct();

		$this->createAdd("register_link", "HTMLLink", array(
			"link" => SOY2PageController::createRelativeLink("detail")
		));

		$userLogic = SOY2Logic::createInstance("logic.UserLogic");
		$users = $userLogic->get();

		// pagesディレクトリより下層をドット区切りでクラスファイルを指定する
		$this->createAdd("user_list", "_common.UserListComponent", array(
			"list" => $users
		));
	}
}