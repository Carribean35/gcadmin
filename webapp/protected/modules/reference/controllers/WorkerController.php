<?php
/**
 *
 * WorkerController class
 *
 */
class WorkerController extends ReferenceController
{
	public function actionIndex()
	{
		$model = new Worker();
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать сотрудника';
			$model = $this->loadModel('Worker', $id);
			unset($model->password);
		} else  
		{
			$header = 'Добавить сотрудника';
			$model = new Worker();
		}
		
		if(isset($_POST['Worker'])) {
			$model->attributes=$_POST['Worker'];
			$this->performAjaxValidation($model);
			if (!empty($model->confirmPassword) || empty($model->id)) {
				$model->password = crypt($model->password, $model->getSoult($model->password));
				$model->confirmPassword = $model->password;
			}
			if(empty($model->password))
				unset($model->password);
			if($model->save()) {
				if (empty($_POST['Worker']['id'])) {
					$connection = Yii::app()->db;
					$command = $connection->createCommand("INSERT INTO AuthAssignment (itemname, userid, bizrule, data) VALUES ('Admin', ".$model->id.", NULL, 'N;')");
					$command->execute();
				}				
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
		Worker::model()->deleteByPk($id);
		$this->redirect($this->createUrl('worker/index'));
	}
}
