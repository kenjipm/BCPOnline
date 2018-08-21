<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<div class="cb-txt-primary-1 cb-font-title cb-font-size-xl"><?=$title?></div>
		</div>
	</div>
</div>

<div class="cb-panel-body cb-p-5">
	<div class="item-showcase cb-row">
		<?php
			foreach($model->items as $item)
			{
				?>
				<a href="<?=site_url('item/'.$item->id)?>" class="cb-col-fifth cb-pb-3">
					<div class="item_thumbnail cb-border-round">
						<div class="item_heart">
							<div class="item_heart_icon cb-heart-red cb-heart">
								<div class="item_heart_count"><?=$item->favorite->favorite_count?></div>
							</div>
						</div>
						<div class="item_photo">
							<img src="<?=$item->image_one_name?>" alt="<?=$item->posted_item_name?>"/>
						</div>
						<div class="item_tenant_name">
							<?=$item->tenant->tenant_name?>
						</div>
						<div class="item_name">
							<?=$item->posted_item_name?>
						</div>
						<div class="item_separator"></div>
						<div class="item_initial_price">
							<?= $item->is_hot_item ? $item->price : "" ?>
						</div>
						<div class="item_current_price">
							<?= $item->is_hot_item ? $item->hot_item->promo_price : $item->price ?>
						</div>
						<div class="item_rating cb-row cb-vertical-center cb-align-center">
							<span class="cb-star cb-star-<?=$item->rating->rating_average_round?>"></span>
							<span class="cb-ml-2">(<?= $item->rating->rating_count ?>)</span>
						</div>
					</div>
				</a>
				<?php
			}
			if (count($model->items) <= 0)
			{
				?>
				<h4 class="cb-txt-secondary-1 cb-font-title cb-pl-5 cb-pr-5">Hasil pencarian tidak ditemukan</h4>
				<?php
			}
		?>
	</div>
</div>

<div class="cb-row cb-align-center">
	<?php if ($model->pagination->first_page) { ?>
		<a href='<?=$model->base_url . '1' . $model->url_parameter?>'>
			<div class="cb-icon cb-icon-sm cb-icon-left-2"></div>
		</a>
	<?php } ?>
	<?php if ($model->pagination->prev_page) { ?>
		<a href='<?=$model->base_url . $model->pagination->prev_page . $model->url_parameter?>'>
			<div class="cb-icon cb-icon-sm cb-icon-left-1"></div>
		</a>
	<?php } ?>
	<?php if ($model->pagination->first_page_number) { ?>
		<a href='<?=$model->base_url . $model->pagination->first_page_number . $model->url_parameter?>'>
			<div class="<?=$model->pagination->current_page == 1 ? 'cb-txt-primary-2' : 'cb-txt-secondary-2'?> cb-font-size-lg">1 &nbsp;</div>
		</a>
	<?php } ?>
	<?php if ($model->pagination->is_prev_dots) { ?>
		<div class="cb-txt-secondary-2 cb-font-size-lg"> . . . &nbsp;</div>
	<?php } ?>
	<?php foreach ($model->pagination->pages as $page) { ?>
		<a href='<?=$model->base_url . $page . $model->url_parameter?>'>
			<div class="<?=$page == $model->pagination->current_page ? 'cb-txt-primary-2' : 'cb-txt-secondary-2'?> cb-font-size-lg"><?=$page?> &nbsp;</div>
		</a>
	<?php } ?>
	<?php if ($model->pagination->is_next_dots) { ?>
		<div class="cb-txt-secondary-2 cb-font-size-lg"> . . . &nbsp; </div>
	<?php } ?>
	<?php if ($model->pagination->last_page_number) { ?>
		<a href='<?=$model->base_url . $model->pagination->last_page_number . $model->url_parameter?>'>
			<div class="<?=$model->pagination->current_page == $model->pagination->last_page_number ? 'cb-txt-primary-2' : 'cb-txt-secondary-2'?> cb-font-size-lg"><?=$model->pagination->last_page_number?></div>
		</a>
	<?php } ?>
	<?php if ($model->pagination->next_page) { ?>
		<a href='<?=$model->base_url . $model->pagination->next_page . $model->url_parameter?>'>
			<div class="cb-icon cb-icon-sm cb-icon-right-1"></div>
		</a>
	<?php } ?>
	<?php if ($model->pagination->last_page) { ?>
		<a href='<?=$model->base_url . $model->pagination->last_page . $model->url_parameter?>'>
			<div class="cb-icon cb-icon-sm cb-icon-right-2"></div>
		</a>
	<?php } ?>
	
</div>