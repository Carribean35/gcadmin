<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->        
	<ul class="page-sidebar-menu">
		<li>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		</li>
		<li class="start <?php if (!empty($this->menuActiveItems[ReferenceController::DESKTOP_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="/reference/">
			<i class="icon-home"></i> 
			<span class="title">Рабочий стол</span>
			<span class="selected"></span>
			<?php if (!empty($this->menuActiveItems[ReferenceController::DESKTOP_MENU_ITEM])) { echo '<span class="arrow "></span>'; } ?>
			</a>
		</li>
		<?php if(Yii::app()->user->checkAccess('Worker.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[ReferenceController::WORKER_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('worker/index') ?>">
			<i class="icon-user"></i> 
			<span class="title">Сотрудники</span>
			<span class="selected"></span>
			<?php if (!empty($this->menuActiveItems[ReferenceController::WORKER_MENU_ITEM])) { echo '<span class="arrow "></span>'; } ?>
			</a>
		</li>
		<?php endif;?>
		<?php if(Yii::app()->user->checkAccess('Clients.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[ReferenceController::CLIENTS_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="<?php echo $this->createUrl('clients/index') ?>">
			<i class="icon-coffee"></i> 
			<span class="title">Клиенты</span>
			<span class="selected"></span>
			<?php if (!empty($this->menuActiveItems[ReferenceController::CLIENTS_MENU_ITEM])) { echo '<span class="arrow "></span>'; } ?>
			</a>
		</li>
		<?php endif;?>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>