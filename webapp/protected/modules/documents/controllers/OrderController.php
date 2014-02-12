<?php

class OrderController extends DocumentsController
{
	
	public function actionNew() {
		$model = new NewOrder();
		$model->status = 1;
		
		$this->render('orderNew', array('model' => $model));
	}
	
	public function actionActive() {
		$model = new Order();
		
		$this->render('orderActive', array('model' => $model));
	}
	
	public function actionItem($id) {
		
		$model = Order::model()->findByPk($id);
		$new = false;
		if (empty($model)) {
			$model = new Order();
			
			if(!isset($_POST['Order'])) {
				$newOrder = NewOrder::model()->findByPk($id);
				$model->id = $newOrder->id;
				$model->date = $newOrder->dat_tim;
			}
			$new = true;
		}

		if(isset($_POST['Order'])) {
			$model->attributes=$_POST['Order'];
			$this->performAjaxValidation($model);
			
			$newOrder = NewOrder::model()->findByPk($id);

			$model->date = $newOrder->dat_tim;
			$model->workerId = Yii::app()->user->id;
			$model->sum = $newOrder->getOrderAmount();
			if (!empty($newOrder->client))
				$model->client = $newOrder->client->nik;

			if($model->save()) {
				if ($new)
					$newOrder->status = 2;
					$newOrder->save();
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
		
		$this->render('item', array('model' => $model, 'new' => $new));
	}
}
