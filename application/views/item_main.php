<div class="cb-panel cb-pl-2 cb-pr-2">
	<div class="cb-panel-body">
		<div class="cb-row">
			<div class="cb-col-fourth-3 cb-pr-4">
				<div class="cb-row cb-border-round cb-bg-primary-3 cb-p-5">
					<div class="cb-col-half">
						<div class="cb-row">
							<div class="cb-col-fourth cb-p-2">
								<div class="cb-row item_gallery-vertical">
									<div class="cb-col-full">
										<?php if ($model->item->image_one_name != "") { ?> <img src="<?=$model->item->image_one_name?>" alt="<?=$model->item->posted_item_name?>" class="item_thumbnail-lg cb-border cb-border-round"/> <?php } ?>
										<?php if ($model->item->image_two_name != "") { ?> <img src="<?=$model->item->image_two_name?>" alt="<?=$model->item->posted_item_name?>" class="item_thumbnail-lg cb-border cb-border-round"/> <?php } ?>
										<?php if ($model->item->image_three_name != "") { ?> <img src="<?=$model->item->image_three_name?>" alt="<?=$model->item->posted_item_name?>" class="item_thumbnail-lg cb-border cb-border-round"/> <?php } ?>
										<?php if ($model->item->image_four_name != "") { ?> <img src="<?=$model->item->image_four_name?>" alt="<?=$model->item->posted_item_name?>" class="item_thumbnail-lg cb-border cb-border-round"/> <?php } ?>
									</div>
									<?php
										/*foreach ($model->item_variances as $item_variance)
										{
											?>
											<div class="cb-col-full">
												<img src="<?=$item_variance->image_two_name?>" alt="<?=$item_variance->var_description?>" class="item_thumbnail-sm cb-border cb-border-round hoverable cb-square" />
											</div>
											<?php
										}*/
									?>
								</div>
							</div>
							<div class="cb-col-fourth-3 cb-p-2">
								<img src="<?=$model->item->image_one_name?>" alt="<?=$model->item->posted_item_name?>" class="item_thumbnail-lg cb-border cb-border-round"/>
							</div>
						</div>
					</div>
					<div class="cb-col-half">
						<div class="<?= $model->item->btn_class ?> cb-heart cb-pull-right" id="btn-toggle_item_favorite" onclick="toggle_item_favorite(<?=$model->item->id?>)"></div>
						<h3 class="cb-font-title cb-txt-primary-1"><?=$model->item->posted_item_name?></h3>
						<div class="cb-row cb-vertical-center">
							<?php
								for ($i = 0; $i < 5; $i++)
								{
									$cur_value = $model->item->rating->rating_average - $i;
									if ($cur_value < 0.25) { $star_class = "empty"; }
									else if ($cur_value < 0.75) { $star_class = "half"; }
									else { $star_class = "full"; }
									
									?>
									<span class="cb-star cb-star-<?=$star_class?>"></span>
									<?php
								}
							?>
							<span class="cb-ml-2">dari <?= $model->item->rating->rating_count ?> ulasan</span>
						</div>
						<h3 class="cb-font-title cb-txt-primary-1"><?=$model->item->price?></h3>
						<br/>
						<h3 class="cb-font-title cb-txt-primary-1">Pilihan Warna</h3>
						<div class="cb-row">
							<?php
								foreach ($model->item_variances as $item_variance)
								{
									?>
									<button type="button" class="cb-button-secondary cb-mr-4"><?=$item_variance->var_description?></button>
									<?php
								}
							?>
						</div>
						<div class="cb-row cb-mt-5">
							<button type="button" class="cb-button-form cb-col-fourth" onclick="popup.open('popup_buy')">Beli</button>
						</div>
					</div>
					<div class="cb-col-full cb-mt-5 cb-border-top">
						<h3 class="cb-font-title cb-txt-primary-1">Deskripsi Produk</h3>
						<?=$model->item->posted_item_description?>
					</div>
				</div>
			</div>
			<div class="cb-col-fourth cb-bg-primary-3 cb-border-round cb-align-center item_tenant_panel">
				<h4>
					<a class="cb-font-title cb-txt-primary-1" href="<?=site_url('tenant/profile/'.$model->item->tenant->id)?>">
						<?=$model->item->tenant->tenant_name?>
					</a>
				</h4>
				<div class="cb-row cb-align-center">
					<button type="button" class="<?= $model->item->tenant->btn_class ?> cb-button cb-col-fourth-3" id="btn-toggle_tenant_favorite" onclick="toggle_tenant_favorite(<?=$model->item->tenant->id?>)"><?= $model->item->tenant->btn_text ?></button>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	if (count($model->other_items) > 0)
	{
		?>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-full">
				<div class="cb-panel">
					<div class="cb-panel-heading cb-align-center">
						<h3 class="cb-txt-primary-1 cb-font-title">PRODUK LAINNYA</h3>
					</div>
					<div class="cb-panel-body cb-p-2">
						<div class="item-showcase cb-row">
							<?php
								foreach($model->other_items as $other_item)
								{
									?>
									<a href="<?=site_url('item/'.$other_item->id)?>" class="cb-col-fifth">
										<div class="item_thumbnail cb-border-round">
											<div class="item_photo">
												<img src="<?=$other_item->image_one_name?>" alt="<?=$other_item->posted_item_name?>"/>
											</div>
											<div class="item_tenant_name">
											</div>
											<div class="item_name">
												<?=$other_item->posted_item_name?>
											</div>
											<div class="item_initial_price">
												
											</div>
											<div class="item_current_price">
												<?=$other_item->price?>
											</div>
											<div class="item_rating">
											</div>
										</div>
									</a>
									<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
?>









<?php /*
	// Model untuk dashboard_main
	
	// dummy posted items
	// $model->item = new class{};
	// $model->item->id = 1;
	// $model->item->name = "Charger Samsung";
	// $model->item->price = "Rp 250.000";
	// $model->item->description = "Charger Samsung Original - Fast Charging (1.5 - 2.0 A)";
	// $model->item->image_one_name = site_url("img/upload/user1/charger_samsung.jpg");
?>

<div class="row">
	
	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><?=$model->item->posted_item_name?></h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-4">
						<img src="<?=$model->item->image_one_name?>" alt="<?=$model->item->posted_item_name?>" class="thumbnail" style="width:100%"/>
					</div>
					<div class="col-md-8">
						<h4>Pilihan <?=$model->item_variances[0]->var_type?></h4>
						<div class="row">
							<?php
								foreach ($model->item_variances as $item_variance)
								{
									?>
									<div class="col-md-2">
										<!--<div class="panel panel-default">
											<div class="panel-body">-->
												<img src="<?=$item_variance->image_two_name?>" alt="<?=$item_variance->var_description?>" style="width:100%"/>
											<!--</div>
										</div>-->
									</div>
									<?php
								}
							?>
						</div>
						<h4>Deskripsi Produk</h4>
						<?=$model->item->posted_item_description?>
					</div>
					<h4></h4>
				</div>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h3><?=$model->item->price?></h3>
				<button type="button" class="btn btn-default col-md-12" onclick="popup.open('popup_buy')">Beli</button>
				<button type="button" class="btn btn-default col-md-12 <?= $model->item->btn_class ?>" id="btn-toggle_item_favorite" onclick="toggle_item_favorite(<?=$model->item->id?>)"><?= $model->item->btn_text ?></button>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h4>Tenant</h4>
			</div>
			<div class="panel-body text-center">
				<a href="<?=site_url('tenant/profile/'.$model->item->tenant->id)?>">
					<?=$model->item->tenant->tenant_name?>
				</a>
				<button type="button" class="btn btn-default col-md-12 <?= $model->item->tenant->btn_class ?>" id="btn-toggle_tenant_favorite" onclick="toggle_tenant_favorite(<?=$model->item->tenant->id?>)"><?= $model->item->tenant->btn_text ?></button>
			</div>
		</div>
	</div>
	
</div>*/?>

<div id="popup_buy" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Tambah ke Keranjang
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="<?=site_url('customer/cart_add_do')?>">
				<div class="form-group">
					<div class="col-sm-3">
						<label><?=$model->item_variances[0]->var_type?></label>
					</div>
					<div class="col-sm-9">
						<select name="posted_item_variance_id" id="posted_item_variance_id" class="form-control">
							<?php
								foreach ($model->item_variances as $item_variance)
								{
									?>
									<option value="<?=$item_variance->id?>"><?=$item_variance->var_description ? $item_variance->var_description : "-"?></option>
									<?php
								}
							?>
						</select>
					</div>
					<div class="col-sm-3">
						<label>Jumlah</label>
					</div>
					<div class="col-sm-9">
						<input type="text" name="quantity" id="quantity" value="1" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<input type="hidden" name="return_url" value="item/<?=$model->item->id?>"/>
						<button type="button" class="btn btn-default" onclick="cart_add_do()">Beli</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_buy')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup_buy_success" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Tambah ke Keranjang
		</div>
		<div class="panel-body">
			<form>
				<div class="form-group">
					<div class="col-sm-12">
						<h4>Barang berhasil ditambahkan ke Keranjang!</h4>
						<br/>
						<br/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<a class="btn btn-default" href="<?=site_url('customer/cart')?>">Lanjut ke Keranjang</a>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_buy_success')">Lanjut Belanja</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>