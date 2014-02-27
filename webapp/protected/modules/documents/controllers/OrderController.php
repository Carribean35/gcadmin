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
				$model->client = $newOrder->id_client;
			}
			$new = true;
		}
		
		$connection=Yii::app()->db_vsht;
		
		$command=$connection->createCommand("SELECT * FROM  `web_zakaz_tabl` WHERE id_zakaza = ".(int)$model->id);
		$rows=$command->queryAll();
		
		$sum = 0;
		foreach($rows AS $key => $val) {
			$command=$connection->createCommand("SELECT DISTINCT n.*, c.cen as price,n.id as n_id, p1.nam as p1_nam,p2.nam as p2_nam,p3.nam as p3_nam,p4.nam as p4_nam, p5.nam as p5_nam, p6.nam as p6_nam, p7.nam as p7_nam, p8.nam as p8_nam, p9.nam as p9_nam, p10.nam as p10_nam, p11.nam as p11_nam, p12.nam as p12_nam, kn.zakaz as zakaz 
													FROM nomen n 
													LEFT JOIN kol_nom kn ON n.id = kn.id_nom 
													LEFT JOIN tip_tovara tt ON tt.id = n.tip_tovaraid 
													LEFT JOIN param1 p1 ON p1.id = n.param1id AND p1.tip_tovaraid = tt.id 
													LEFT JOIN param2 p2 ON p2.id = n.param2id AND p2.tip_tovaraid = tt.id 
													LEFT JOIN param3 p3 ON p3.id = n.param3id AND p3.tip_tovaraid = tt.id 
													LEFT JOIN param4 p4 ON p4.id = n.param4id AND p4.tip_tovaraid = tt.id 
													LEFT JOIN param5 p5 ON p5.id = n.param5id AND p5.tip_tovaraid = tt.id 
													LEFT JOIN param6 p6 ON p6.id = n.param6id AND p6.tip_tovaraid = tt.id 
													LEFT JOIN param7 p7 ON p7.id = n.param7id AND p7.tip_tovaraid = tt.id 
													LEFT JOIN param8 p8 ON p8.id = n.param8id AND p8.tip_tovaraid = tt.id 
													LEFT JOIN param9 p9 ON p9.id = n.param9id AND p9.tip_tovaraid = tt.id 
													LEFT JOIN param10 p10 ON p10.id = n.param10id AND p10.tip_tovaraid = tt.id 
													LEFT JOIN param11 p11 ON p11.id = n.param11id AND p11.tip_tovaraid = tt.id 
													LEFT JOIN param12 p12 ON p12.id = n.param12id AND p12.tip_tovaraid = tt.id 
													LEFT JOIN cens c ON n.id = c.id_nomen 
													WHERE n.idd1c = ".(int)$val['id_nom']);
			$val['nomen'] = $command->queryRow();
			$sum += $val['kol']*$val['cen'];
		}
		$sum = number_format($sum, 2, ',', ' ');
		
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
		
		$this->render('item', array('model' => $model, 'new' => $new, 'nomens' => $rows, 'sum' => $sum));
	}
}
