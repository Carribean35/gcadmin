<?php

class SettingsModule extends CWebModule
{
	/**
	* Initializes the "reference" module.
	*/
	public function init()
	{
		// Set required classes for import.
		$this->setImport(array(
			'settings.components.*',
			'settings.controllers.*',
			'settings.models.*',
		));
	}
}
