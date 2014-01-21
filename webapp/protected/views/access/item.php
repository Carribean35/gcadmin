<?php
/* @var $this AccessController */
/* @var $model Admins */

$this->title_h3=$header;

$this->breadcrumbs=array(
	'Права доступа' => $this->createUrl('access/index'),
	$header
);

$this->menuActiveItems[Controller::ACCESS_MENU_ITEM] = 1;
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
		'htmlOptions'=>array('class'=>'form-horizontal', 'rel' => $this->createUrl('access/index')),

	)); ?>

		<div class="control-group">
			<?php echo $form->label($model,'email',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->textField($model,'email',array('class'=>'m-wrap medium')); ?>
				<span class="help-inline"><?php echo $form->error($model,'email'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'password',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->passwordField($model,'password',array('class'=>'m-wrap medium')); ?>
				<span class="help-inline"><?php echo $form->error($model,'password'); ?></span>
			</div>
		</div>
		
		<div class="control-group">
			<?php echo $form->label($model,'confirmPassword',array('class'=>'control-label')); ?>
			<div class="controls">
				<?php echo $form->passwordField($model,'confirmPassword',array('class'=>'m-wrap medium')); ?>
				<span class="help-inline"><?php echo $form->error($model,'confirmPassword'); ?></span>
			</div>
		</div>
		
		<div class="form-actions large">
			<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Сохранить', array('class' => 'btn blue', 'type' => 'submit')); ?>
			<?php if (!empty($model->id)) : ?>
				<a href="/access/delete/<?php echo $model->id?>/" onclick="return confirmDelete()"><?php echo CHtml::htmlButton('<i class="icon-remove"></i> Удалить', array('class' => 'btn red', 'type' => 'button')); ?></a>
			<?php endif;?>
			<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
		</div>
		
		<?php echo $form->hiddenField($model,'id'); ?>

	<?php $this->endWidget(); ?>

</div>