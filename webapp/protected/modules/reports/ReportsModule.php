<?php

class ReportsModule extends CWebModule
{
	/**
	* Initializes the "reference" module.
	*/
	public function init()
	{
		// Set required classes for import.
		$this->setImport(array(
			'reports.components.*',
			'reports.controllers.*',
			'reports.models.*',
		));
	}
}
