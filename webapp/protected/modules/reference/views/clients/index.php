<?php
/* @var $this ClientsController */
/* @var $model Clients*/

$this->title_h3='Клиенты';

$this->breadcrumbs=array(
	'Клиенты'
);

$this->breadcrumbs_button = '<li class="pull-right no-text-shadow">
								<a class="btn blue dash-btn" href="'.$this->createUrl('clients/item').'"><i class="icon-plus"></i>Добавить запись</a>
							</li>';

$this->menuActiveItems[ReferenceController::CLIENTS_MENU_ITEM] = 1;
?>
<div>
	
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
						'header'=>Yii::t('main','Nic'),
						'name'=>'nik',
					),
					array(
						'header'=>Yii::t('main','Phone'),
						'name'=>'tel',
					),
					array(
						'header'=>Yii::t('main','Email'),
						'name'=>'email',
					),
					array(
						'header'=>Yii::t('main','Discount Card'),
						'name'=>'discounts_cart.nomer',
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
									return $this->createUrl('clients/item', array('id'=>$data['id']));
								},
							),
							'add'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return $this->createUrl('clients/delete', array('id'=>$data['id']));
								},
							),
						),
						'template'=>'{view} {add}',
					),
				),
			)); ?>
</div>