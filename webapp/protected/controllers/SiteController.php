<?php

class SiteController extends RController
{
	
	public function actionIndex() {
		
		$this->render('index');
	}
	
	public function actionError()
	{
		$this->layout = '//layouts/error';
		if($error=Yii::app()->errorHandler->error)
			$this->render('error', $error);
	}
	
	public function actionLogin() {
		
		$this->layout = '//layouts/login';
		$model = new LoginForm();
		
		/**
		 * @var CWebUser $user
		*/
		$user = Yii::app()->user;
		if (!$user->isGuest) {
			$this->redirect(Yii::app()->user->returnUrl);
		}
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
		
			if($model->validate() && $model->login()) {
				$this->redirect('/');
			}
		}
		
		$this->render('login',array(
			'model'=>$model,
		));
		
	}
}
