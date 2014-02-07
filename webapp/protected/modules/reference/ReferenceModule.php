<?php

class ReferenceModule extends CWebModule
{
	/**
	* Initializes the "reference" module.
	*/
	public function init()
	{
		// Set required classes for import.
		$this->setImport(array(
			'reference.components.*',
			'reference.controllers.*',
			'reference.models.*',
		));
	}
}
