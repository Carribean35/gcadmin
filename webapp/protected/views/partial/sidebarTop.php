<div class="navbar hor-menu hidden-phone hidden-tablet pull-right">
	<div class="navbar-inner">
		<ul class="nav">
			<li class="<?php if (!empty($this->topMenuActiveItems[Controller::REFERENCE_ITEM])) { echo 'active'; } ?>">
				<a href="/reference/">
				Справочники
				<span class="<?php if (!empty($this->topMenuActiveItems[Controller::REFERENCE_ITEM])) { echo 'selected'; } ?>"></span>
				</a>
			</li>
			<li class="<?php if (!empty($this->topMenuActiveItems[Controller::DOCUMENTS_ITEM])) { echo 'active'; } ?>">
				<a href="/documents/">
				Документы
				<span class="<?php if (!empty($this->topMenuActiveItems[Controller::DOCUMENTS_ITEM])) { echo 'selected'; } ?>"></span>
				</a>
			</li>
			<li class="<?php if (!empty($this->topMenuActiveItems[Controller::REPORTS_ITEM])) { echo 'active'; } ?>">
				<a href="/reports/">
				Отчеты
				<span class="<?php if (!empty($this->topMenuActiveItems[Controller::REPORTS_ITEM])) { echo 'selected'; } ?>"></span>
				</a>
			</li>
			<li class="<?php if (!empty($this->topMenuActiveItems[Controller::SETTINGS_ITEM])) { echo 'active'; } ?>">
				<a href="/settings/">
				Настройки
				<span class="<?php if (!empty($this->topMenuActiveItems[Controller::SETTINGS_ITEM])) { echo 'selected'; } ?>"></span>
				</a>
			</li>
		</ul>
	</div>
</div>