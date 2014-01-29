<?php
/* @var $this OrdersController */
/* @var $model Orders*/

$this->title_h3='Заявки на сайте';

$this->breadcrumbs=array(
	'Заявки на сайте'
);

$this->menuActiveItems[Controller::ORDERS_MENU_ITEM] = 1;
?>
<div>
	
	<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'client-grid',
				'dataProvider'=>$model->search(),
				'filter'=>$model,
				'enableSorting'=>false,
				'htmlOptions'=>array('class'=>'portlet-body'),
				'itemsCssClass'=>'table table-striped table-hover',
				'summaryText'=>'',
				'loadingCssClass'=>'',
				'columns'=>array(
					array(
						'header'=>Yii::t('main','ID'),
						'name'=>'id',
						'filter'=> false,
					),
					array(
						'header'=>Yii::t('main','Client'),
						'name'=>'client.nik',
						'filter'=> CHtml::activeTextField($model, 'client',array('value'=>(!empty($_GET['Orders']['client']) ? $_GET['Orders']['client'] : ''))),
					),
					array(
						'header'=>Yii::t('main','Date'),
						'name'=>'dat_tim',
						'filter'=> CHtml::activeTextField($model, 'dat_tim', array('value'=>(!empty($_GET['Orders']['dat_tim']) ? $_GET['Orders']['dat_tim'] : ''))),
					),
					array(
						'header'=>Yii::t('main','User'),
						'name'=>'admin.fio',
						'filter'=> CHtml::activeTextField($model, 'admin', array('value'=>(!empty($_GET['Orders']['admin']) ? $_GET['Orders']['admin'] : ''))),
					),
					array(
						'header'=>Yii::t('main','Status'),
						'name'=>'status',
						'filter'=> CHtml::activeTextField($model, 'status', array('value'=>(!empty($_GET['Orders']['status']) ? $_GET['Orders']['status'] : ''))),
					),
					
					array(
						'header'=>Yii::t('main','Actions'),
						'class'=>'CButtonColumn',
						'buttons'=>array(
							'view'=>array(
								'label'=>Yii::t('main','Edit'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini blue-stripe'),
								'url'=>function($data) {
									return $this->createUrl('orders/item', array('id'=>$data['id']));
								},
							),
							'add'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return $this->createUrl('orders/delete', array('id'=>$data['id']));
								},
							),
						),
						'template'=>'{view} {add}',
					),
				),
			)); ?>
</div>