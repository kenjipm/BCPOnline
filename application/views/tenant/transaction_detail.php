<?php
	// Model untuk Transaction Order Detail
	
	// dummy data order detail
	// $model->transaction_detail = new class{};

	// $model->transaction_detail->id = 1;
	// $model->transaction_detail->quantity = 1;
	// $model->transaction_detail->date_repr_decided = "3 Desember 2017";
	// $model->transaction_detail->offered_price = "Rp 190.000,-";
	// $model->transaction_detail->sold_price = "Rp 175.000,-";
	// $model->transaction_detail->order_status = "Pembayaran";
	// $model->transaction_detail->otp_deliverer_to_tenant = "171203001";
	// $model->transaction_detail->collection_method = "COD";
	// $model->transaction_detail->otp_customer_to_deliverer = "171203223";
	// $model->transaction_detail->item_name = "Djisamsung Galaksih";
	// $model->transaction_detail->deliverer_name = "Dori";
	// $model->transaction_detail->voucher_cut_price = "Rp 15.000,-";
	// $model->transaction_detail->feedback = "Bagus lah mantep pokonya recommended banget :)";
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Detail Transaksi</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="item_name">Nama Barang:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="item_name" 
						value="<?=$model->transaction_detail->posted_item_name ." (".$model->transaction_detail->var_type .": ".$model->transaction_detail->var_description .")"?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="quantity">Jumlah:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="quantity" 
						value="<?=$model->transaction_detail->quantity?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="order_status">Status:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="order_status" 
						value="<?=$model->transaction_detail->order_status?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_repr_decided">Tanggal Order:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="date_repr_decided" 
						value="<?=$model->transaction_detail->date_created?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="deliverer_name">Nama Pengirim:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="deliverer_name" 
						value="<?=$model->transaction_detail->deliverer?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="collection_method">Cara Pengiriman:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="collection_method" 
						value="<?=$model->transaction_detail->collection_method?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="offered_price">Harga Awal:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="offered_price" 
						value="<?=$model->transaction_detail->offered_price?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="voucher_cut_price">Potongan Voucher:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="voucher_cut_price" 
						value="<?=$model->transaction_detail->voucher_cut_price?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="sold_price">Total Harga:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="sold_price" 
						value="<?=$model->transaction_detail->sold_price?>" readonly></div>
				</div>
				<div class="form-group">
					<div class="col-xs-9 col-xs-offset-3">
						<button type="button" class="btn btn-default" onclick="popup.open('popup_review')">Lihat Ulasan</button>
					</div>
				</div>
				<a href="">
					<button class="btn btn-default">Masukkan Harga Servis</button>
				</a>
				<a href="<?=site_url('dispute/'.$model->transaction_detail->id)?>">
					<button class="btn btn-default">Komplain</button>
				</a>
				<a href="<?=site_url('message/'.$model->transaction_detail->id)?>">
					<button class="btn btn-default">Kirim Pesan</button>
				</a>
				<a href="<?=site_url('customer/profile/'.$model->transaction_detail->id)?>">
					<button class="btn btn-default">Lihat Customer</button>
				</a>
			</form>
		</div>
	</div>
</div>

<div id="popup_review" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Ulas Barang
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-2">
						<label>Rating</label>
					</div>
					<div class="col-sm-10">
					<?php
						for($i=0; $i<$model->transaction_detail->rating; $i++)
						{
						?>
							<div class="col-xs-1">*</div>
						<?php	
						}
					?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Ulasan</label>
					</div>
					<div class="col-sm-10">
						<textarea class="form-control" placeholder="<?=$model->transaction_detail->feedback?>" readonly></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Balas Ulasan</label>
					</div>
					<div class="col-sm-10">
						<textarea class="form-control" placeholder="Tulis balasan..."></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<button type="button" class="btn btn-default">Kirim</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_review')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
