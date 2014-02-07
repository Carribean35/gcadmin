<?php

class ReferenceController extends RController
{
	
	const DESKTOP_MENU_ITEM = "desktop";
	const WORKER_MENU_ITEM = "worker";
	const CLIENTS_MENU_ITEM = "news";
	const ORDERS_MENU_ITEM = "orders";
	
	public function init() {
		$this->topMenuActiveItems[Controller::REFERENCE_ITEM] = 1;
		return true;
	}
	
}
