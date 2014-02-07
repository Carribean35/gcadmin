<?php

class OrderController extends DocumentsController
{
	
	public function actionNew() {
		$this->render('orderNew');
		
	}
	
	public function actionActive() {
		$this->render('orderActive');
	}
}
