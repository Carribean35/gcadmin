<?php
/* @var $this WorkerController */
/* @var $model Workre*/

$this->title_h3='Сотрудники';

$this->breadcrumbs=array(
	'Сотрудники'
);

$this->breadcrumbs_button = '<li class="pull-right no-text-shadow">
								<a class="btn blue dash-btn" href="'.$this->createUrl('worker/item').'"><i class="icon-plus"></i>Добавить запись</a>
							</li>';

$this->menuActiveItems[ReferenceController::WORKER_MENU_ITEM] = 1;
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
						'header'=>Yii::t('main','Email'),
						'name'=>'email',
					),
					array(
						'header'=>Yii::t('main','FIO'),
						'name'=>'fio',
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
									return $this->createUrl('worker/item', array('id'=>$data['id']));
								},
							),
							'add'=>array(
								'label'=>Yii::t('main','Delete'),
								'imageUrl'=>false,
								'options'=>array('class'=>'btn mini red-stripe'),
								'click'=>'confirmDelete',
								'url'=>function($data) {
									return $this->createUrl('worker/delete', array('id'=>$data['id']));
								},
							),
						),
						'template'=>'{view} {add}',
					),
				),
			)); ?>
</div>