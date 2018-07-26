<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title"><?=$title?></h3>
		</div>
		<div class="cb-col-half cb-p-5">
			<?php if (($model->active_flash) || (!$model->active_bid)) { ?>
			<a class="cb-button-form pull-right" href="<?=site_url('Admin/create_flash_sale')?>">
				+ Tambah Barang Flash Sale
			</a>
			<?php } else { ?>
			<button class="cb-button-form pull-right" disabled>
				Lelang sedang berlangsung
			</button>
			<?php } ?>
		</div>
	</div>
</div>

<div class="cb-panel-body cb-p-5">
	<div class="item-showcase cb-row">
		<?php
			foreach($model->items as $flash_sale)
			{
			?>
			<a href="<?=site_url('Admin/flash_sale_detail/'.$flash_sale->id)?>" class="cb-col-fifth cb-pb-3">
				<div class="item_thumbnail cb-border-round">
					<div class="item_photo">
						<img src="<?=$flash_sale->image_one_name?>" alt="<?=$flash_sale->posted_item_name?>"/>
					</div>
					<div class="item_tenant_name">
					</div>
					<div class="item_name">
						<?=$flash_sale->posted_item_name?>
					</div>
				</div>
			</a>
			<?php
			}
			if (count($model->items) <= 0)
			{
				?>
				<div class="col-md-4">
					<label>Tidak ada Barang Flash Sale</label>
				</div>
				<?php
			}
			?>
		?>
	</div>
</div>