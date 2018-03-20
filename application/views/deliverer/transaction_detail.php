<?php
	// Model untuk Transaction Order Detail
	
	// dummy data order detail
	// $model->transaction_details = new class{};

	// $model->transaction_details->id = 1;
	// $model->transaction_details->quantity = 1;
	// $model->transaction_details->date_repr_decided = "3 Desember 2017";
	// $model->transaction_detail->sold_price = "Rp 175.000,-";
	// $model->transaction_detail->otp_deliverer_to_tenant = "171203001";
	// $model->transaction_detail->collection_method = "COD";
	// $model->transaction_detail->otp_customer_to_deliverer = "171203223";
	// $model->transaction_detail->item_name = "Djisamsung Galaksih";
	
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
						value="<?=$model->transaction_detail->item_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="quantity">Jumlah:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="quantity" 
						value="<?=$model->transaction_detail->quantity?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_repr_decided">Tanggal Order:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="date_repr_decided" 
						value="<?=$model->transaction_detail->date_repr_decided?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="otp_deliverer_to_tenant">Kode Pengiriman:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="otp_deliverer_to_tenant" 
						value="<?=$model->transaction_detail->otp_deliverer_to_tenant?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="collection_method">Cara Pengiriman:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="collection_method" 
						value="<?=$model->transaction_detail->collection_method?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="sold_price">Total Harga:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="sold_price" 
						value="<?=$model->transaction_detail->sold_price?>" readonly></div>
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
