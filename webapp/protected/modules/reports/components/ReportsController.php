<?php

class ReportsController extends RController
{
	
	const DESKTOP_MENU_ITEM = "desktop";
	
	public function init() {
		$this->topMenuActiveItems[Controller::REPORTS_ITEM] = 1;
		return true;
	}
	
}
