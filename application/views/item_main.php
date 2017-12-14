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
				<div class="col-md-4">
					<img src="<?=$model->item->image_one_name?>" alt="<?=$model->item->posted_item_name?>"/>
				</div>
				<div class="col-md-8">
					<h4>Deskripsi Produk</h4>
					<?=$model->item->posted_item_description?>
				</div>
				<h4></h4>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h3><?=$model->item->price?></h3>
				<button type="button" class="btn btn-default col-md-12" onclick="popup.open('popup_buy')">Beli</button>
				<a href="#" class="btn btn-default col-md-12">Tambah Ke Favorit</a>
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
						<label>Jumlah</label>
					</div>
					<div class="col-sm-9">
						<input type="text" name="quantity" value="1" class="form-control"/>
						<input type="hidden" name="item_id" value="<?=$model->item->id?>"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<input type="hidden" name="return_url" value="customer/cart"/>
						<button type="submit" class="btn btn-default">Beli</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_buy')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>