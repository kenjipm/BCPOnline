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
						<div class="item_photo">
							<img src="<?=$item->image_one_name?>" alt="<?=$item->posted_item_name?>"/>
						</div>
						<div class="item_tenant_name">
						</div>
						<div class="item_name">
							<?=$item->posted_item_name?>
						</div>
						<div class="item_initial_price">
							
						</div>
						<div class="item_current_price">
							<?=$item->price?>
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
		?>
	</div>
</div>