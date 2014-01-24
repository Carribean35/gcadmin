<?php
/**
 *
 * OrdersController class
 *
 */
class OrdersController extends RController
{
	public function actionIndex()
	{
		$model = new Orders();
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать заявку';
			$model = $this->loadModel('Orders', $id);
		} else  
		{
			$header = 'Добавить заявку';
			$model = new Orders();
		}
		
		if(isset($_POST['Orders'])) {
			$model->attributes=$_POST['Orders'];
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
		$this->redirect($this->createUrl('orders/index'));
	}
}