<div class="page-sidebar nav-collapse collapse">
	<!-- BEGIN SIDEBAR MENU -->        
	<ul class="page-sidebar-menu">
		<li>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
			<div class="sidebar-toggler hidden-phone"></div>
			<!-- BEGIN SIDEBAR TOGGLER BUTTON -->
		</li>
		<li class="start <?php if (!empty($this->menuActiveItems[SettingsController::DESKTOP_MENU_ITEM])) { echo 'active'; } ?>">
			<a href="/settings/">
			<i class="icon-home"></i> 
			<span class="title">Рабочий стол</span>
			<span class="selected"></span>
			<?php if (!empty($this->menuActiveItems[SettingsController::DESKTOP_MENU_ITEM])) { echo '<span class="arrow "></span>'; } ?>
			</a>
		</li>
	</ul>
	<!-- END SIDEBAR MENU -->
</div>