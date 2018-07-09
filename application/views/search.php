
<!-- left bar buat category -->
<div class="cb-row">
	<div class="cb-col-fifth">
		<div class="cb-p-5">
			<div class= "cb-txt-primary-1 cb-font-title cb-font-size-xl cb-align-center cb-pb-2">KATEGORI</div>
			<div class="cb-border-round cb-bg-primary-1 cb-pl-5 cb-pr-5 cb-pb-5">
			<?php
			foreach($model->categories as $category)
			{
				?>
				<div class="cb-row cb-border-bottom cb-border-white">
					<a href="<?=site_url('item/category/'.$category->id)?>" class="category cb-col-full cb-font-primary-2">
						<div class="panel-body">
							<?=$category->category_name?>
						</div>
					</a>
				</div>
				<?php
			}
			?>
			</div>
		</div>
	</div>
	<div class="cb-col-fifth-4">
		<div class="cb-p-5">
			<div class="cb-txt-primary-1 cb-font-title cb-font-size-xl cb-align-center">PRODUK</div>
		
			<div class="item-showcase cb-row">
				<?php
					foreach($model->promoted_items as $promoted_item)
					{
						?>
						<a href="<?=site_url('item/'.$promoted_item->id)?>" class="cb-col-fourth cb-pb-3">
							<div class="item_thumbnail cb-border-round">
								<div class="item_heart">
									<div class="item_heart_icon cb-heart-red cb-heart">
										<div class="item_heart_count"><?=$promoted_item->favorite->favorite_count?></div>
									</div>
								</div>
								<div class="item_photo">
									<img src="<?=$promoted_item->image_one_name?>" alt="<?=$promoted_item->posted_item_name?>"/>
								</div>
								<div class="item_tenant_name">
									<?=$promoted_item->tenant->tenant_name?>
								</div>
								<div class="item_name">
									*<?=$promoted_item->posted_item_name?>
								</div>
								<div class="item_separator"></div>
								<div class="item_initial_price">
									<?= $promoted_item->is_hot_item ? $promoted_item->price : "&nbsp;" ?>
								</div>
								<div class="item_current_price">
									<?= $promoted_item->is_hot_item ? $promoted_item->hot_item->promo_price : $promoted_item->price ?>
								</div>
								<div class="item_rating cb-row cb-vertical-center cb-align-center">
									<span class="cb-star cb-star-<?=$promoted_item->rating->rating_average_round?>"></span>
									<span class="cb-ml-2">(<?= $promoted_item->rating->rating_count ?>)</span>
								</div>
							</div>
						</a>
						<?php
					}
				?>
				<?php
					foreach($model->search_items as $search_item)
					{
						?>
						<a href="<?=site_url('item/'.$search_item->id)?>" class="cb-col-fourth cb-pb-3">
							<div class="item_thumbnail cb-border-round">
								<div class="item_heart">
									<div class="item_heart_icon cb-heart-red cb-heart">
										<div class="item_heart_count"><?=$search_item->favorite->favorite_count?></div>
									</div>
								</div>
								<div class="item_photo">
									<img src="<?=$search_item->image_one_name?>" alt="<?=$search_item->posted_item_name?>"/>
								</div>
								<div class="item_tenant_name">
									<?=$search_item->tenant->tenant_name?>
								</div>
								<div class="item_name">
									<?=$search_item->posted_item_name?>
								</div>
								<div class="item_separator"></div>
								<div class="item_initial_price">
									<?= $search_item->is_hot_item ? $search_item->price : "&nbsp;" ?>
								</div>
								<div class="item_current_price">
									<?= $search_item->is_hot_item ? $search_item->hot_item->promo_price : $search_item->price ?>
								</div>
								<div class="item_rating cb-row cb-vertical-center cb-align-center">
									<span class="cb-star cb-star-<?=$search_item->rating->rating_average_round?>"></span>
									<span class="cb-ml-2">(<?= $search_item->rating->rating_count ?>)</span>
								</div>
							</div>
						</a>
						<?php
					}
					if (count($model->search_items) <= 0)
					{
						?>
						<div class="cb-panel-body cb-bg-primary-3 cb-p-5 cb-mt-2">
							<div class="cb-row">
								<div class="cb-label">Hasil pencarian tidak ditemukan</div>
							</div>
						</div>
						<?php
					}
					?>
				?>
			</div>
		</div>
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

