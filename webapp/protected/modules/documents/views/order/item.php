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
		<div class="caption">&nbsp;</div>
	</div>
	<div class="portlet-body form">
		<div class="tabbable portlet-tabs">
			<ul class="nav nav-tabs nav-tabs-left">
				<li class="active"><a href="#portlet_tab_1" data-toggle="tab">Шапка</a></li>
				<li><a href="#portlet_tab_2" data-toggle="tab">Табличная часть</a></li>
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
							<div class="span6 ">
								<button class="btn blue" type="button">
									Операция
								</button>
								<button class="btn green" type="button">
									Основание
								</button>
							</div>
							<div class="span6 ">
							
								<h4 class="form-section">Резервирование</h4>
								<div class="control-group no-margin">
									<div class="controls no-left-margin">
										<label class="checkbox">
											<div class="checker">
												<span>
													<input type="checkbox" value="">
												</span>
											</div> 
											Резервировать
										</label>                                                
										<label class="radio">
											<input type="radio" name="optionsRadios2" value="option1" />
											По фирме
										</label>
										<label class="radio">
											<input type="radio" name="optionsRadios2" value="option2" checked />
											На складе
										</label>  
									</div>
								</div>
							</div>
						</div>
						
						<div class="row-fluid">
							<div class="span6 ">
								<h4 class="form-section">Поставщик</h4>
								<div class="control-group">
									<label class="control-label">Фирма</label>
									<div class="controls">
										<input type="text" placeholder="Волгашина ТСЦ4 БН" class="m-wrap span12">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Склад</label>
									<div class="controls">
										<input type="text" placeholder="Баныкина" class="m-wrap span12">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<div class="span6 ">
								<h4 class="form-section">&nbsp;</h4>
								<div class="control-group">
									<label class="control-label">Фирма создатель</label>
									<div class="controls">
										<input type="text" placeholder="Волгашина ТСЦ4 БН" class="m-wrap span12">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Р/счет</label>
									<div class="controls">
										<input type="text" placeholder="АОСБ 8213" class="m-wrap span12">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="control-group no-margin">
									<label class="control-label">Проект</label>
									<div class="controls">
										<input type="text" placeholder="Честная торговля" class="m-wrap span12">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
					
						<div class="row-fluid">
							<h4 class="form-section">Покупатель</h4>
							<div class="span6 no-left-margin">
								<div class="control-group">
									<label class="control-label">Контрагент</label>
									<div class="controls">
										<input type="text" placeholder="" class="m-wrap span12" value="<?php echo $model->cliient->nik;?>">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Договор</label>
									<div class="controls">
										<input type="text" placeholder="Основной договор" class="m-wrap span12">
										<span class="help-block"></span>
									</div>
								</div>
								<div class="span6 no-left-margin">
									<div class="control-group">
										<label class="control-label">Отгрузка с</label>
										<div class="controls">
											<div class="input-append date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
												<input class="m-wrap m-ctrl-medium date-picker span12" readonly size="10" type="text" value="" />
												<span class="add-on">
													<i class="icon-calendar"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
								<div class="span5 ">
									<div class="control-group">
										<label class="control-label">Оплата до</label>
										<div class="controls">
											<div class="input-append date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
												<input class="m-wrap m-ctrl-medium date-picker span12" readonly size="10" type="text" value="" />
												<span class="add-on">
													<i class="icon-calendar"></i>
												</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="span6">
								<div class="control-group">
									<label class="control-label">Валюта договора</label>
									<div class="controls">
										<span class="text bold">руб.</span>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="control-group">
									<button class="btn blue" type="button">
										Долг контрагента
									</button>
								</div>
								<div class="control-group">
									<label class="control-label">Сумма по документу</label>
									<div class="controls">
										<span class="text bold"><?php echo $sum?> руб.</span>
									</div>
								</div>
							</div>
							
						</div>
						
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
						
						<div class="row-fluid">
							<div class="span4">
								<div class="control-group">
									<label class="control-label">Всего(руб.)</label>
									<div class="controls">
										<span class="text bold"><?php echo $sum?></span>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="control-group">
									<label class="control-label">НДС(руб.)</label>
									<div class="controls">
										<span class="text bold">0.00</span>
									</div>
								</div>
							</div>
							<div class="span3">
								<div class="control-group">
									<label class="control-label">НП(руб.)</label>
									<div class="controls">
										<span class="text bold">0.00</span>
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
						
						
						
						<div class="row-fluid">
							<button class="btn blue" type="button">
								Операция
							</button>
						</div>
						
						<div class="row-fluid">
							<div class="span6 ">
								<div class="control-group no-margin">
									<label class="control-label">Поставщик</label>
									<div class="controls">
										<span class="text ">Волгашина ТСЦ4 БН</span>
										<span class="help-block"></span>
									</div>
								</div>
								<div class="control-group no-margin">
									<label class="control-label">Покупатель</label>
									<div class="controls">
										<span class="text ">ИП Мельников К.А.</span>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
							<div class="span6 ">
								<div class="control-group no-margin">
									<label class="control-label">Договор</label>
									<div class="controls">
										<span class="text ">Основной договор(руб.)</span>
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row-fluid">
							<div class="span6 ">
								<div class="control-group no-margin">
									<div class="controls">
										<button class="btn blue" type="button">Заполнить</button>
										<button class="btn blue" type="button">Подбор</button>
										<button class="btn blue" type="button">Цены...</button>
									</div>
								</div>
								
							</div>
							<div class="span6 ">
								<div class="control-group no-margin">
									<label class="control-label">Сканер ШК (клавиатурный)</label>
									<div class="controls">
										<input type="text" placeholder="" class="m-wrap span12">
										<span class="help-block"></span>
									</div>
								</div>
							</div>
						</div>
						
						<div class="row-fluid">
							<div class="control-group">
								<label class="control-label">Дисконт</label>
								<div class="controls">
									<button class="btn blue" type="button">Найти по № / Новая</button>
								</div>
							</div>
						</div>
						<div class="row-fluid no-more-tables">
							<div class="control-group">
								<table class="table-bordered table-striped table-condensed cf">
									<thead class="cf">
										<tr>
											<th>N</th>
											<th>Номенкулатура</th>
											<th class="numeric">Кол-во</th>
											<th class="numeric">Ед.</th>
											<th class="numeric">Цена</th>
											<th class="numeric">% Скидки</th>
											<th class="numeric">Сумма</th>
										</tr>
									</thead>
									<tbody>
										<?php foreach ($nomens AS $key => $val) :?>
											<tr>
												<td data-title=""><?php echo $key+1?></td>
												<td data-title=""><?php echo $val['nomen']['nam_for_booker']?></td>
												<td data-title="" class="numeric"><?php echo $val['kol']?></td>
												<td data-title="" class="numeric">шт.</td>
												<td data-title="" class="numeric"><?php echo number_format($val['cen'], 2, ',', ' ');?></td>
												<td data-title="" class="numeric"></td>
												<td data-title="" class="numeric"><?php echo number_format($val['cen'] * $val['kol'], 2, ',', ' ');?></td>
											</tr>
										<?php endforeach;?>
									</tbody>
								</table>
							</div>
						</div>
						
						<div class="row-fluid">
							<div class="span4">
								<div class="control-group">
									<label class="control-label">Всего(руб.)</label>
									<div class="controls">
										<span class="text bold"><?php echo $sum?></span>
									</div>
								</div>
							</div>
							<div class="span4">
								<div class="control-group">
									<label class="control-label">НДС(руб.)</label>
									<div class="controls">
										<span class="text bold">0.00</span>
									</div>
								</div>
							</div>
							<div class="span3">
								<div class="control-group">
									<label class="control-label">НП(руб.)</label>
									<div class="controls">
										<span class="text bold">0.00</span>
									</div>
								</div>
							</div>
						</div>
						
					</div>
					<div class="form-actions">
						<?php echo CHtml::htmlButton('<i class="icon-ok"></i> Принять', array('class' => 'btn blue', 'type' => 'submit')); ?>
						<?php echo CHtml::htmlButton('Отменить', array('class' => 'btn', 'type' => 'reset')); ?>
						<button class="btn blue" type="button">Записать</button>
						<button class="btn blue" type="button">Провести</button>
						<button class="btn blue" type="button">Печать</button>
						<button class="btn blue" type="button">ОК</button>
						<button class="btn blue" type="button">Закрыть</button>
						<button class="btn blue" type="button">Действия</button>
					</div>
					
					<?php echo $form->hiddenField($model,'id'); ?>
					
				<?php $this->endWidget(); ?>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		if (jQuery().datepicker) {
			$('.date-picker').datepicker({
				rtl : App.isRTL()
			});
		} 
	})
</script>