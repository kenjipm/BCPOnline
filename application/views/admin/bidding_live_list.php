<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">LELANG TERAKHIR</h3>
		</div>
		<div class="cb-col-half cb-p-5">
			<a class="cb-button-form pull-right" href="<?=site_url('Bidding_live/create_bidding_live')?>">
				+ Tambah Barang Lelang
			</a>
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

<?php /*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar bidding</h3>
		</div>
		<div class="panel-body">
			<?php
			$i = 0;
			foreach($model->items as $posted_item)
			{
				if ($i%3 == 0)
				{
				?>
				<div class="row">
				<?php
				}
				?>
				<div class="col-xs-4">
					<div class="thumbnail">
						<a href="<?=site_url('Bidding_live/bidding_live_detail/'.$posted_item->id)?>">
							<img src="<?=$posted_item->image_one_name?>" alt="<?=$posted_item->posted_item_name?>" style="width:50%">
							<div class="caption text-center">
								<p><?=$posted_item->posted_item_name?></p>
							</div>
						</a>
					</div>
				</div>
				<?php
				if ($i%3 == 2)
				{
				?>
				</div>
				<?php
				}
				$i++;
			}
			?>
			<a class="btn btn-default" href="<?=site_url('Bidding_live/create_bidding_live')?>">
				Buat Bidding
			</a>
		</div>
	</div>
</div>

*/ ?>