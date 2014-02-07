<?php

class DocumentsModule extends CWebModule
{
	/**
	* Initializes the "reference" module.
	*/
	public function init()
	{
		// Set required classes for import.
		$this->setImport(array(
			'documents.components.*',
			'documents.controllers.*',
			'documents.models.*',
		));
	}
}
