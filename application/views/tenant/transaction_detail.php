<?php
if ($model->transaction_detail->item_type == "ORDER")
{
	
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
					<label class="control-label col-xs-3" for="desc">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="desc" 
						value="<?=$model->transaction_detail->posted_item_description?>" readonly></div>
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
<?php
}
else if ($model->transaction_detail->item_type == "REPAIR")
{
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Detail Transaksi</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('order/transaction_detail/' . $model->transaction_detail->id)?>" class="form-horizontal" method="post">
				<div class="form-group">
					<label class="control-label col-xs-3" for="desc">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="desc" 
						value="<?=$model->transaction_detail->posted_item_description?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="order_status">Status:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="order_status" 
						value="<?=$model->transaction_detail->order_status_desc?>" readonly></div>
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
					<label class="control-label col-xs-3" for="sold_price">Total Harga:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="sold_price" 
						value="<?=$model->transaction_detail->sold_price?>" readonly></div>
				</div>
				<div class="form-group">
					<div class="col-xs-9 col-xs-offset-3">
						<button type="button" class="btn btn-default" onclick="popup.open('popup_review')">Lihat Ulasan</button>
					</div>
				</div>
				<div id="add_customer" style="display:none">
					<div class="form-group">
						<label class="control-label col-xs-3">Harga Diskon:</label>
						<div class="col-xs-9"><input type="text" class="form-control" name="discounted_price"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-3"><button type="submit" class="btn btn-default">Kirim</button></div>
					</div>
				</div>
				<div class="form-group" id="add_price">
					<div class="col-xs-3"><a class="btn btn-default" onclick="set_nego_price()" <?php if ($model->transaction_detail->order_status !== "TENANT_RECEIVED"){?> style="display:none"<?php } ?>>Masukkan Harga Servis</a></div>
				</div>
				
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

<?php
}
	
?>
<div id="popup_review" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Ulasan Barang
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
