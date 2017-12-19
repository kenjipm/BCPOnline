<?php
	// Model untuk Post Item List
	
	// dummy posted item list
	/*
	$model->posted_item = array();
	
	$model->posted_item = new class{};
	$model->posted_item->name = "Djisamsung Galaksih";
	$model->posted_item->price = "Rp 4.500.000,-";
	$model->posted_item->type = "Order";
	$model->posted_item->quantity_avalaible = 3;
	$model->posted_item->unit_weight = "0.1 kg";
	$model->posted_item->description = "Handphone keluaran terbaru";
	$model->posted_item->category = "Handphone & Tablet";
	$model->posted_item->brand = "Djisamsung";
	$model->posted_item->tag = "Handphone, Henfon, Hape, HP";
	*/
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Lihat Item</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('item/post_item_detail/' . $model->posted_item->id)?>" class="form-horizontal" method="post">
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_name" 
						value="<?=$model->posted_item->posted_item_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="price">Harga:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="price" 
						value="<?=$model->posted_item->price?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="type">Tipe:</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="type" 
						value="<?=$model->posted_item->item_type?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="quantity_avalaible">Jumlah Stok:</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="quantity_avalaible" 
						value="<?=$model->posted_item->quantity_avalaible?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="unit_weight">Berat(kg):</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="unit_weight" 
						value="<?=$model->posted_item->unit_weight?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="description">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="description" 
						value="<?=$model->posted_item->posted_item_description?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="category" 
						value="<?=$model->posted_item->category->category_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="brand">Brand:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="brand" 
						value="<?=$model->posted_item->brand->brand_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="tag">Tag:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="tag" 
						value="<?=$model->posted_item->category->category_name?>" readonly></div>
				</div>
				<h4>Daftar Diskon Customer</h4>
				<div id="add_customer" style="display:none">
					<div class="form-group">
						<label class="control-label col-xs-3">Email Customer:</label>
						<div class="col-xs-9"><input type="text" class="form-control" name="customer_email_0"></div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">Harga Diskon:</label>
						<div class="col-xs-9"><input type="text" class="form-control" name="discounted_price_0"></div>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-3"><a class="btn btn-default" onclick="set_nego_price()">Tambah Customer</a></div>
					<div class="col-xs-3"><button type="submit" class="btn btn-default">Kirim</button></div>
				</div>
			</form>
		</div>
	</div>
</div>