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
			foreach($model->favorite_items as $favorite_item)
			{
				?>
				<a href="<?=site_url('item/'.$favorite_item->posted_item->id)?>" class="cb-col-fifth cb-pb-3">
					<div class="item_thumbnail cb-border-round">
						<div class="item_heart">
							<div class="item_heart_icon cb-heart-red cb-heart">
								<div class="item_heart_count"><?=$favorite_item->favorite->favorite_count?></div>
							</div>
						</div>
						<div class="item_photo">
							<img src="<?=$favorite_item->posted_item->image_one_name?>" alt="<?=$favorite_item->posted_item->image_one_name?>"/>
						</div>
						<div class="item_tenant_name">
							<?=$favorite_item->tenant->tenant_name?>
						</div>
						<div class="item_name">
							<?=$favorite_item->posted_item->posted_item_name?>
						</div>
						<div class="item_separator"></div>
						<div class="item_initial_price">
							<?= $favorite_item->is_hot_item ? $favorite_item->posted_item->price : "&nbsp;" ?>
						</div>
						<div class="item_current_price">
							<?= $favorite_item->is_hot_item ? $favorite_item->hot_item->promo_price : $favorite_item->posted_item->price ?>
						</div>
						<div class="item_rating cb-row cb-vertical-center cb-align-center">
							<span class="cb-star cb-star-<?=$favorite_item->rating->rating_average_round?>"></span>
							<span class="cb-ml-2">(<?= $favorite_item->rating->rating_count ?>)</span>
						</div>
					</div>
				</a>
				<?php
			}
			if (count($model->favorite_items) <= 0)
			{
				?>
				<h4 class="cb-txt-secondary-1 cb-font-title cb-pl-5 cb-pr-5">Belum ada barang yang difavoritkan</h4>
				<?php
			}
			?>
		?>
	</div>
</div>

<!--
<div class="">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
			<div class="panel-body">
				<div class="row">
					<?php
					foreach($model->favorite_items as $favorite_item)
					{
						?>
							<div class="col-md-4">
								<div class="panel panel-default">
									<a href="<?=site_url('item/'.$favorite_item->posted_item->id)?>">
										<div class="panel-body">
											<img class="col-md-12" src="<?=$favorite_item->posted_item->image_one_name?>" alt="<?=$favorite_item->posted_item->posted_item_name?>"/>
										</div>
										<div class="panel-footer">
											<label class="control-label"><?=$favorite_item->posted_item->posted_item_name?></label><br/>
											<label class="control-label"><?=$favorite_item->posted_item->price?></label>
										</div>
									</a>
								</div>
							</div>
						<?php
					}
					if (count($model->favorite_items) <= 0)
					{
						?>
						<div class="col-md-4">
							<label>Belum ada barang yang difavoritkan</label>
						</div>
						<?php
					}
					?>
				</div>
			</div>
	</div>
	
</div>
-->