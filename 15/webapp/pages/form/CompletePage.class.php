<?php

class CompletePage extends WebPage {

	function __construct(){
		parent::__construct();
		
		// セッションに保持している内容を削除する
		$session = SOY2ActionSession::getUserSession();
		$session->clearAttributes();
	}
}