<?php
	// Model untuk Post Item List
	
	// dummy posted item list
	$model->posted_items = array();
	
	$model->posted_items[0] = new class{};
	$model->posted_items[0]->name = "Djisamsung Galaksih";
	$model->posted_items[0]->price = "Rp 4.500.000,-";
	$model->posted_items[0]->type = "Order";
	$model->posted_items[0]->quantity_avalaible = 3;
	$model->posted_items[0]->unit_weight = "0.1 kg";
	$model->posted_items[0]->description = "Handphone keluaran terbaru";
	$model->posted_items[0]->category = "Handphone & Tablet";
	$model->posted_items[0]->brand = "Djisamsung";
	$model->posted_items[0]->tag = "Handphone, Henfon, Hape, HP";
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Lihat Item</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="name" 
						value="<?=$model->posted_items[0]->name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="price">Harga:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="price" 
						value="<?=$model->posted_items[0]->price?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="type">Tipe:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="type" 
						value="<?=$model->posted_items[0]->type?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="quantity_avalaible">Jumlah Stok:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="quantity_avalaible" 
						value="<?=$model->posted_items[0]->quantity_avalaible?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="unit_weight">Berat(kg):</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="unit_weight" 
						value="<?=$model->posted_items[0]->unit_weight?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="description">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="description" 
						value="<?=$model->posted_items[0]->description?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="category" 
						value="<?=$model->posted_items[0]->category?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="brand">Brand:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="brand" 
						value="<?=$model->posted_items[0]->brand?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="tag">Tag:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="tag" 
						value="<?=$model->posted_items[0]->tag?>" readonly></div>
				</div>
				<div class="form-group">
					<div class="pull-right"><button class="btn btn-default" onclick="setNegoPrice()">Tambah Customer</button></div>
				</div>
			</form>
		</div>
	</div>
</div>