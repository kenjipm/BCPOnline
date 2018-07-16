<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">DAFTAR BARANG</h3>
		</div>
		<div class="cb-col-half cb-p-5">
			<a class="cb-button-form pull-right" href="<?=site_url('Item/post_item')?>">
				+ Tambah Barang
			</a>
		</div>
	</div>
</div>

<div class="cb-panel-body cb-p-5">
	<div class="item-showcase cb-row">
		<?php
			foreach($model->posted_items as $posted_item)
			{
				if ($posted_item->item_type == "ORDER")
				{
				?>
				<a href="<?=site_url('item/'.$posted_item->id)?>" class="cb-col-fifth cb-pb-3">
					<div class="item_thumbnail cb-border-round">
						<div class="item_photo">
							<img src="<?=$posted_item->image_one_name?>" alt="<?=$posted_item->posted_item_name?>"/>
						</div>
						<div class="item_tenant_name">
						</div>
						<div class="item_name">
							<?=$posted_item->posted_item_name?>
						</div>
						<div class="item_separator"></div>
						<div class="item_initial_price">
							
						</div>
						<div class="item_current_price">
							<?=$posted_item->price?>
						</div>
						<div class="item_rating cb-row cb-vertical-center cb-align-center">
							<span class="cb-star cb-star-<?=$posted_item->rating->rating_average_round?>"></span>
							<span class="cb-ml-2">(<?= $posted_item->rating->rating_count ?>)</span>
						</div>
					</div>
				</a>
				<?php
				}
			}
			if (count($model->posted_items) <= 0)
			{
				?>
				<div class="col-md-4">
					<label>Tidak ada barang</label>
				</div>
				<?php
			}
			?>
		?>
	</div>
</div>
