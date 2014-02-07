<?php
/* @var $this ClientsController */
/* @var $model Clients */

$this->title_h3=$header;

$this->breadcrumbs=array(
	'Клиенты' => $this->createUrl('Clients/index'),
	$header
);

$this->menuActiveItems[ReferenceController::CLIENTS_MENU_ITEM] = 1;
?>
<div>

	<?php $form=$this->beginWidget('CActiveForm', array(
		'id'=>$model->formId,
		'enableAjaxValidation'=>true,
		'clientOptions'=>array(
			'validateOnSubmit'=>true,
			'validateOnChange'=>false,
			'errorCssClass'=>'error',
			'afterValidate'=>'js:contentAfterAjaxValidate',
		),
		'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('clients/index')),

	)); ?>
	
		<div class="control-group">
			<?php echo $form->label($model,'nik',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textField($model,'nik',array('class'=>'m-wrap large')); ?>
				<span class="help-inline"><?php echo $form->error($model,'nik'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'tel',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textArea($model,'tel',array('class'=>'m-wrap large')); ?>
				<span class="help-inline"><?php echo $form->error($model,'tel'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'email',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textArea($model,'email',array('class'=>'m-wrap large')); ?>
				<span class="help-inline"><?php echo $form->error($model,'email'); ?></span>
			</div>
		</div>
				
		<div class="form-actions large">
			<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
			<?php if (!empty($model->id)) : ?>
				<a href="/news/delete/<?php echo $model->id?>/" onclick="return confirmDelete()"><?php echo CHtml::htmlButton('<i class="icon-remove"></i> Удалить', array('class' => 'btn red', 'type' => 'button')); ?></a>
			<?php endif;?>
			<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
		</div>
		
		<?php echo $form->hiddenField($model,'id'); ?>

	<?php $this->endWidget(); ?>

</div>

<script type="text/javascript">
	$(document).ready(function() {
		if (jQuery().datepicker) {
			$('.date-picker').datepicker({
				rtl : App.isRTL(),
				format: "dd.mm.yyyy"
			});
		}
	})
</script>