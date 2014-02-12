<?php
/* @var $this OrderController */

$this->title_h3='Активные заявки';

$this->breadcrumbs=array(
	'Заявки',
	'Активные'
);

$this->menuActiveItems[DocumentsController::ACTIVE_ORDER_MENU_ITEM] = 1;
?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
				'id'=>'client-grid',
				'dataProvider'=>$model->search(),
				'filter'=>null,
				'enableSorting'=>false,
				'htmlOptions'=>array('class'=>'portlet-body'),
				'itemsCssClass'=>'table table-striped table-hover',
				'summaryText'=>'',
				'loadingCssClass'=>'',
				'columns'=>array(
					array(
						'header'=>Yii::t('main','ID'),
						'name'=>'id',
					),
					array(
						'header'=>Yii::t('main','Client'),
						'name'=>'client',
					),
					array(
						'header'=>Yii::t('main','Date'),
						'value'=>function($data) {
							$timestamp = CDateTimeParser::parse($data['date'],'yyyy-MM-dd hh:mm:ss');
							return date("d.m.Y H:i:s", $timestamp);
						}
					),
					array(
						'header'=>Yii::t('main','Amount'),
						'value'=>function($data) {
							return $data->sum." руб.";
						}
					),
					array(
						'header'=>Yii::t('main','Actions'),
						'class'=>'CButtonColumn',
						'buttons'=>array(
							'view'=>array(
								'label'=>Yii::t('main','Show'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini blue-stripe'),
								'url'=>function($data) {
									return $this->createUrl('order/item', array('id'=>$data['id']));
								},
							),
							'add'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return $this->createUrl('order/delete', array('id'=>$data['id']));
								},
							),
						),
						'template'=>'{view} {add}',
					),
				),
			)); ?>