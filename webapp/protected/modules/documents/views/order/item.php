<?php
/* @var $this OrderController */

$this->title_h3='Просмотр заявки';

if ($new) {
	$this->breadcrumbs=array(
		'Заявки',
		'Новые' => $this->createUrl("order/new"),
		'Просмотр'
	);
	
	$this->menuActiveItems[DocumentsController::NEW_ORDER_MENU_ITEM] = 1;
} else {
	$this->breadcrumbs=array(
		'Заявки',
		'Активные' => $this->createUrl("order/active"),
		'Просмотр'
	);
	
	$this->menuActiveItems[DocumentsController::ACTIVE_ORDER_MENU_ITEM] = 1;	
}
?>


<div class="portlet box blue tabbable">
	<div class="portlet-title">
		<div class="caption"><i class="icon-reorder"></i>Заявка</div>
	</div>
	<div class="portlet-body form">
		<div class="tabbable portlet-tabs">
			<ul class="nav nav-tabs">
				<li><a href="#portlet_tab_2" data-toggle="tab">Табличная часть</a></li>
				<li class="active"><a href="#portlet_tab_1" data-toggle="tab">Шапка</a></li>
			</ul>
			<?php $form=$this->beginWidget('CActiveForm', array(
				'id'=>$model->formId,
				'enableAjaxValidation'=>true,
				'clientOptions'=>array(
					'validateOnSubmit'=>true,
					'validateOnChange'=>false,
					'errorCssClass'=>'error',
					'afterValidate'=>'js:contentAfterAjaxValidate',
				),
				'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('order/active')),
		
			)); ?>
				<div class="tab-content">
					<div class="tab-pane active" id="portlet_tab_1">
						<div class="span6 pull-right text-right">
							Заявка на склад № <b><?php echo $model->id?></b> от 
							<b>	
							<?php $timestamp = CDateTimeParser::parse($model->date,'yyyy-MM-dd hh:mm:ss');
									echo date("d.m.Y", $timestamp);?>
							</b>
						</div>
						<div class="clearfix"></div>
						
						<div class="row-fluid">
							<div>
								<div class="control-group">
									<?php echo $form->label($model,'comment',array('class'=>'control-label')); ?>
									<div class="controls">
										<?php echo $form->textField($model,'comment',array('class'=>'m-wrap span12')); ?>
										<span class="help-block"><?php echo $form->error($model,'comment'); ?></span>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="tab-pane" id="portlet_tab_2">
						<div class="span6 pull-right text-right">
							Заявка на склад № <b><?php echo $model->id?></b> от 
							<b>	
							<?php $timestamp = CDateTimeParser::parse($model->date,'yyyy-MM-dd hh:mm:ss');
									echo date("d.m.Y", $timestamp);?>
							</b>
						</div>
						<div class="clearfix"></div>
					</div>
					<div class="form-actions">
						<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Принять', array('class' => 'btn blue', 'type' => 'submit')); ?>
						<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
					</div>
					
					<?php echo $form->hiddenField($model,'id'); ?>
					
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>