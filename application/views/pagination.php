
<div class="cb-row cb-align-center">
	<?php if ($paginator->pagination->first_page) { ?>
		<a href='<?=$paginator->base_url . '1' . $paginator->url_parameter?>'>
			<div class="cb-icon cb-icon-sm cb-icon-left-2"></div>
		</a>
	<?php } ?>
	<?php if ($paginator->pagination->prev_page) { ?>
		<a href='<?=$paginator->base_url . $paginator->pagination->prev_page . $paginator->url_parameter?>'>
			<div class="cb-icon cb-icon-sm cb-icon-left-1"></div>
		</a>
	<?php } ?>
	<?php if ($paginator->pagination->first_page_number) { ?>
		<a href='<?=$paginator->base_url . $paginator->pagination->first_page_number . $paginator->url_parameter?>'>
			<div class="<?=$paginator->pagination->current_page == 1 ? 'cb-txt-primary-2' : 'cb-txt-secondary-2'?> cb-font-size-lg">1 &nbsp;</div>
		</a>
	<?php } ?>
	<?php if ($paginator->pagination->is_prev_dots) { ?>
		<div class="cb-txt-secondary-2 cb-font-size-lg"> . . . &nbsp;</div>
	<?php } ?>
	<?php foreach ($paginator->pagination->pages as $page) { ?>
		<a href='<?=$paginator->base_url . $page . $paginator->url_parameter?>'>
			<div class="<?=$page == $paginator->pagination->current_page ? 'cb-txt-primary-2' : 'cb-txt-secondary-2'?> cb-font-size-lg"><?=$page?> &nbsp;</div>
		</a>
	<?php } ?>
	<?php if ($paginator->pagination->is_next_dots) { ?>
		<div class="cb-txt-secondary-2 cb-font-size-lg"> . . . &nbsp; </div>
	<?php } ?>
	<?php if ($paginator->pagination->last_page_number) { ?>
		<a href='<?=$paginator->base_url . $paginator->pagination->last_page_number . $paginator->url_parameter?>'>
			<div class="<?=$paginator->pagination->current_page == $paginator->pagination->last_page_number ? 'cb-txt-primary-2' : 'cb-txt-secondary-2'?> cb-font-size-lg"><?=$paginator->pagination->last_page_number?></div>
		</a>
	<?php } ?>
	<?php if ($paginator->pagination->next_page) { ?>
		<a href='<?=$paginator->base_url . $paginator->pagination->next_page . $paginator->url_parameter?>'>
			<div class="cb-icon cb-icon-sm cb-icon-right-1"></div>
		</a>
	<?php } ?>
	<?php if ($paginator->pagination->last_page) { ?>
		<a href='<?=$paginator->base_url . $paginator->pagination->last_page . $paginator->url_parameter?>'>
			<div class="cb-icon cb-icon-sm cb-icon-right-2"></div>
		</a>
	<?php } ?>
	
</div>