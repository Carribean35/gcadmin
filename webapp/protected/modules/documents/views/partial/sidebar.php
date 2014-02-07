<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->        
	<ul class="page-sidebar-menu">
		<li>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		</li>
		<li class="start <?php if (!empty($this->menuActiveItems[DocumentsController::DESKTOP_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="/documents/">
			<i class="icon-home"></i> 
			<span class="title">Рабочий стол</span>
			<span class="selected"></span>
			<?php if (!empty($this->menuActiveItems[DocumentsController::DESKTOP_MENU_ITEM])) { echo '<span class="arrow "></span>'; } ?>
			</a>
		</li>
		<?php if(Yii::app()->user->checkAccess('Order.*')): ?>
		<li class="start <?php if (!empty($this->menuActiveItems[DocumentsController::NEW_ORDER_MENU_ITEM])
											|| !empty($this->menuActiveItems[DocumentsController::ACTIVE_ORDER_MENU_ITEM])
									) { echo 'active'; } ?>">
			<a href="javascript: ;">
				<i class="icon-flag"></i>
				<span class="title">Заявки</span>
				<span class="selected"></span>
				<span class="arrow <?php if (!empty($this->menuActiveItems[DocumentsController::NEW_ORDER_MENU_ITEM])
											|| !empty($this->menuActiveItems[DocumentsController::ACTIVE_ORDER_MENU_ITEM])
									) { echo 'open'; } ?>"></span>
			</a>
			<ul class="sub-menu" <?php if (empty($this->menuActiveItems[DocumentsController::NEW_ORDER_MENU_ITEM])
											&& empty($this->menuActiveItems[DocumentsController::ACTIVE_ORDER_MENU_ITEM])
									) { echo 'style="display:none;"'; } ?>>
				<li class="<?php if (!empty($this->menuActiveItems[DocumentsController::NEW_ORDER_MENU_ITEM])) { echo 'active'; } ?>">
					<a href="<?php echo $this->createUrl('order/new') ?>">Новые</a>
				</li>
				<li  class="<?php if (!empty($this->menuActiveItems[DocumentsController::ACTIVE_ORDER_MENU_ITEM])) { echo 'active'; } ?>">
					<a href="<?php echo $this->createUrl('order/active') ?>">Активные</a>
				</li>
			</ul>
		</li>
		<?php endif;?>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>