<?php
/**
 *
 * NewsController class
 *
 */
class NewsController extends RController
{
	public function actionIndex()
	{
		$model = new News();
		$this->render('index', array('model' => $model));
	}
	
	public function actionItem($id = false) 
	{
		if ($id !== false) 
		{
			$header = 'Редактировать новость';
			$model = $this->loadModel('News', $id);
			
			$timestamp = CDateTimeParser::parse($model->createDate,'yyyy-MM-dd');
			$model->createDate = date("d.m.Y", $timestamp);
		} else  
		{
			$header = 'Добавить новость';
			$model = new News();
		}
		
		if(isset($_POST['News'])) {
			$model->attributes=$_POST['News'];
			
			$timestamp = CDateTimeParser::parse($model->createDate,'dd.MM.yyyy');
			$model->createDate = date("Y-m-d", $timestamp);

			if($model->save()) {
				if (!empty($_FILES['News']['tmp_name']['image'])) {
					Yii::app()->ih
					->load($_FILES['News']['tmp_name']['image'])
					->resize(200,140)
					->save($model->imagesPath.$model->id);
				} else if (!$model->existImage()){
					$model->visible = 0;
					$model->save();
				}
				
				$this->redirect($this->createUrl('news/index'));
			}
		}
		
		$this->render('item', array('header' => $header, 'model' => $model));
	}
	
	public function actionDelete($id) {
		$news = $this->loadModel('News', $id);
		$news->deleteFull();
		$this->redirect($this->createUrl('news/index'));
	}
}