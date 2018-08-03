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
		<?php foreach ($model->items as $item) 
		{
		?>
		<a href="<?=site_url('Bidding_live/bidding_live_detail/'.$item->id)?>" class="cb-col-fifth cb-pb-3">
			<div class="item_thumbnail cb-border-round <?= (!$item->is_expired && $item->is_confirmed) ? "cb-border cb-border-boldest cb-border-primary-2" : "" ?>">
				<div class="item_photo">
					<img src="<?=$item->image_one_name?>" alt="<?=$item->posted_item_name?>"/>
				</div>
				<div class="item_tenant_name">
				</div>
				<div class="item_name">
					<?=$item->posted_item_name?>
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
	</div>
</div>
