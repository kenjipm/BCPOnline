<?php
	// Model untuk Transaction Order Detail
	
	// dummy data order detail
	$model->order_details = new class{};

	$model->order_details->id = 1;
	$model->order_details->quantity = 1;
	$model->order_details->date_repr_decided = "3 Desember 2017";
	$model->order_details->sold_price = "Rp 175.000,-";
	$model->order_details->collection_code = "171203001";
	$model->order_details->collection_method = "COD";
	$model->order_details->cust_rec_code = "171203223";
	$model->order_details->item_name = "Djisamsung Galaksih";
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="item_name">Nama Barang:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="item_name" 
						value="<?=$model->order_details->item_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="quantity">Jumlah:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="quantity" 
						value="<?=$model->order_details->quantity?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_repr_decided">Tanggal Order:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="date_repr_decided" 
						value="<?=$model->order_details->date_repr_decided?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="collection_code">Kode Pengiriman:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="collection_code" 
						value="<?=$model->order_details->collection_code?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="collection_method">Cara Pengiriman:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="collection_method" 
						value="<?=$model->order_details->collection_method?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="sold_price">Total Harga:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="sold_price" 
						value="<?=$model->order_details->sold_price?>" readonly></div>
				</div>
				<div class="form-group">
					<div class="col-xs-9 col-xs-offset-3">
						<button type="button" class="btn btn-default" onclick="">Antar Barang</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
