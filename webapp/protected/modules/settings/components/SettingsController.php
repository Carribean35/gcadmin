<?php

class SettingsController extends RController
{
	
	const DESKTOP_MENU_ITEM = "desktop";
	
	public function init() {
		$this->topMenuActiveItems[Controller::SETTINGS_ITEM] = 1;
		return true;
	}
	
}
