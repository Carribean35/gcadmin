<?php
/**
 *
 * ClientsController class
 *
 */
class ClientsController extends ReferenceController
{
	public function actionIndex()
	{
		$model = new Clients();
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать клиента';
			$model = $this->loadModel('Clients', $id);
		} else  
		{
			$header = 'Добавить клиента';
			$model = new Clients();
		}
		
		if(isset($_POST['Clients'])) {
			$model->attributes=$_POST['Clients'];
			$this->performAjaxValidation($model);

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
		Clients::model()->deleteByPk($id);
		$this->redirect($this->createUrl('clients/index'));
	}
}