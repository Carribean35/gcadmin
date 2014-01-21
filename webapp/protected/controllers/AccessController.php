<?php
/**
 *
 * AccessController class
 *
 */
class AccessController extends RController
{
	public function actionIndex()
	{
		$model = new Admins();
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать пользователя';
			$model = $this->loadModel('Admins', $id);
			unset($model->password);
		} else  
		{
			$header = 'Добавить пользователя';
			$model = new Admins();
		}
		
		if(isset($_POST['Admins'])) {
			$model->attributes=$_POST['Admins'];
			$this->performAjaxValidation($model);
			if (!empty($model->confirmPassword) || empty($model->id)) {
				$model->password = crypt($model->password, $model->getSoult($model->password));
				$model->confirmPassword = $model->password;
			}
			if(empty($model->password))
				unset($model->password);
			if($model->save()) {
				$err = false;
			} else {
				$err = true;
			}
			echo CJSON::encode(
				array(
					'error'=>$err,
				)
			);
			Yii::app()->end();
		}
		
		$this->render('item', array('header' => $header, 'model' => $model));
	}
	
	public function actionDelete($id) {
		Admins::model()->deleteByPk($id);
		$this->redirect($this->createUrl('access/index'));
	}
}
