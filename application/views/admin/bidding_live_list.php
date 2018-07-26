<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">LELANG TERAKHIR</h3>
		</div>
		<div class="cb-col-half cb-p-5">
			<?php if ($model->active_flash) { ?>
			<button class="cb-button-form pull-right" disabled>
				Flash Sale sedang berlangsung
			</button>
			<?php } else if ($model->active_bid) { ?>
			<button class="cb-button-form pull-right" disabled>
				Lelang sedang berlangsung
			</button>
			<?php } else { ?>
			<a class="cb-button-form pull-right" href="<?=site_url('Bidding_live/create_bidding_live')?>">
				+ Tambah Barang Lelang
			</a>
			<?php } ?>
		</div>
	</div>
</div>

<div class="cb-panel-body cb-p-5">
	<div class="item-showcase cb-row">
		<?php
			foreach($model->items as $posted_item)
			{
			?>
			<a href="<?=site_url('Bidding_live/bidding_live_detail/'.$posted_item->id)?>" class="cb-col-fifth cb-pb-3">
				<div class="item_thumbnail cb-border-round">
					<div class="item_photo">
						<img src="<?=$posted_item->image_one_name?>" alt="<?=$posted_item->posted_item_name?>"/>
					</div>
					<div class="item_tenant_name">
					</div>
					<div class="item_name">
						<?=$posted_item->posted_item_name?>
					</div>
				</div>
			</a>
			<?php
			}
			if (count($model->items) <= 0)
			{
				?>
				<div class="col-md-4">
					<label>Tidak ada Barang Lelang</label>
				</div>
				<?php
			}
			?>
		?>
	</div>
</div>
