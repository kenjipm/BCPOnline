<div class="cb-panel">
	<div class="cb-panel-body">
		<div class="cb-row">
			<div class="cb-col-half">
				<div class="cb-row">
					<div class="cb-col-half">
						
					</div>
					<div class="cb-col-half">
						
					</div>
				</div>
			</div>
			<div class="cb-col-half">
				
			</div>
		</div>
	</div>
</div>









<?php
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
	
</div>

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