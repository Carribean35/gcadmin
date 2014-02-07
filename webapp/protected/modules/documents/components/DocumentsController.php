<?php

class DocumentsController extends RController
{
	
	const DESKTOP_MENU_ITEM = "desktop";
	const ACTIVE_ORDER_MENU_ITEM = "activeOrder";
	const NEW_ORDER_MENU_ITEM = "newOrder";
	
	public function init() {
		$this->topMenuActiveItems[Controller::DOCUMENTS_ITEM] = 1;
		return true;
	}
	
}
