<?php

class IndexPage extends WebPage {

	function __construct(){
		parent::__construct();

		$this->createAdd("register_link", "HTMLLink", array(
			"link" => SOY2PageController::createRelativeLink("detail")
		));

		$userLogic = SOY2Logic::createInstance("logic.UserLogic");
		$users = $userLogic->get();

		$this->createAdd("user_list", "UserListComponent", array(
			"list" => $users
		));
	}
}

class UserListComponent extends HTMLList {

	function populateItem($entity, $key, $index){
		$id = (is_numeric($entity->getId())) ? $entity->getId() : 0;

		$this->createAdd("detail_link", "HTMLLink", array(
			"link" => SOY2PageController::createRelativeLink("detail/".$id)
		));

		// URLにindex.phpがある場合
		// $this->createAdd("detail_link", "HTMLLink", array(
		// 	"link" => SOY2PageController::createLink("detail.".$id)
		// ));

		$this->createAdd("name", "HTMLLabel", array(
			"text" => $entity->getName()
		));

		// nameの値が自動生成されるアンカータグ
		$this->createAdd("detail_link_with_name", "HTMLLink", array(
			"link" => SOY2PageController::createRelativeLink("detail/".$id),
			"text" => $entity->getName()
		));
	}
}