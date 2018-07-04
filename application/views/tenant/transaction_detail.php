<div class="cb-row cb-p-5">
	<div class="cb-col-full cb-txt-primary-1 cb-align-left cb-font-title cb-font-size-xl">
		DETAIL TRANSAKSI
	</div>
	<div class="cb-col-full cb-row cb-panel-body cb-bg-primary-3 cb-p-5">
		<?php
		if ($model->transaction_detail->item_type == "ORDER")
		{
			?>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Nama Barang</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="item_name" value="<?=$model->transaction_detail->posted_item_name ." (".$model->transaction_detail->var_type .": ".$model->transaction_detail->var_description .")"?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Jumlah</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="quantity" value="<?=$model->transaction_detail->quantity?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Deskripsi</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="desc" value="<?=$model->transaction_detail->posted_item_description?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Status</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="order_status" value="<?=$model->transaction_detail->order_status_desc?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Tanggal Order</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="date_repr_decided" value="<?=$model->transaction_detail->date_created?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Nama Pengirim</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="deliverer_name" value="<?=$model->transaction_detail->deliverer?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Cara Pengiriman</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="collection_method" value="<?=$model->transaction_detail->collection_method?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Total Harga</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="sold_price" value="<?=$model->transaction_detail->sold_price?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
				</div>
				<div class="cb-pl-3">
					<button type="button" class="cb-button cb-button-form" onclick="popup.open('popup_review')" >Lihat Ulasan</button>
				</div>
			</div>
			<?php
		}
		else if ($model->transaction_detail->item_type == "REPAIR")
		{
			?>
			<form action="<?=site_url('order/transaction_detail/' . $model->transaction_detail->id)?>" class="cb-row cb-col-full" method="post">
			<input type="hidden" value="<?=$model->transaction_detail->billing_id?>" name="billing_id" />
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Deskripsi</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="item_name" value="<?=$model->transaction_detail->posted_item_description?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Status</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="order_status" value="<?=$model->transaction_detail->order_status_desc?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Tanggal Order</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="date_repr_decided" value="<?=$model->transaction_detail->date_created?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Nama Pengirim</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="deliverer_name" value="<?=$model->transaction_detail->deliverer?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Cara Pengiriman</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="collection_method" value="<?=$model->transaction_detail->collection_method?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Total Harga</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="sold_price" value="<?=$model->transaction_detail->sold_price?>" readonly>
				</div>
			</div>
			<div id="add_customer" class="cb-col-full cb-row col-mb-5" style="display:none">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Harga Servis</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="discounted_price" name="discounted_price" />
				</div>
				<div class="cb-col-fifth cb-pl-3">
					<button type="submit" class="cb-button cb-button-form">Kirim</button>
				</div>
			</div>
			<div class="cb-col-full cb-row">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
				</div>
				<div class="cb-pl-3">
					<button type="button" class="cb-button cb-button-form" onclick="popup.open('popup_review')" <?php if ($model->transaction_detail->order_status !== "DONE"){?> style="display:none"<?php } ?> >Lihat Ulasan</button>
					<button type="button" class="cb-button cb-button-form" onclick="popup.open('popup_cancel_repair')" <?php if ($model->transaction_detail->order_status !== "TENANT_RECEIVED"){?> style="display:none"<?php } ?>>PERBAIKAN BATAL</button>
				</div>
				<div class="cb-pl-3">
					<button type="button" class="cb-col-full cb-ml-5 cb-button cb-button-form" id="btn-send_message" onclick="$('#form-message').submit();">KIRIMKAN PESAN</button>
				</div>
				<div class="cb-pl-3">
					<button class="cb-button cb-button-form" type="button" onclick="popup.open('popup_notify_finished')"  <?php if ($model->transaction_detail->order_status !== "REPAIRING"){?> style="display:none"<?php } ?>>PERBAIKAN SELESAI</button>
				</div>
				<div class="cb-pl-3 cb-pt-3">
					<a class="cb-button cb-button-form" onclick="set_nego_price()" <?php if ($model->transaction_detail->order_status !== "TENANT_RECEIVED"){?> style="display:none"<?php } ?>>MASUKKAN HARGA SERVIS</a>
				</div>
			</div>
			</form>
			<?php
		}
		?>
	</div>
</div>

<form id="form-message" method="post" action="<?=site_url('message/open_detail_do')?>" class="cb-row cb-col-full">
	<input type="hidden" name="receiver_account_id" value="<?=$model->transaction_detail->account_id?>"/>
</form>

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
					<input type="hidden" id="feedback-order_detail_id" value="<?=$model->transaction_detail->id?>" />
					<div class="col-sm-10">
						<textarea class="form-control" placeholder="<?=$model->transaction_detail->feedback?>" readonly></textarea>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Balas Ulasan</label>
					</div>
					<div class="col-sm-10">
						<?php if ($model->transaction_detail->feedback_reply){?>
							<textarea class="form-control" placeholder="<?=$model->transaction_detail->feedback_reply?>" readonly></textarea>
						<?php } else { ?>
							<textarea class="form-control" id="feedback-reply_feedback_text"></textarea>
						<?php }	?>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<?php if (!$model->transaction_detail->feedback_reply){?>
						<button type="button" class="cb-button-form" onclick="reply_feedback()" id="btn-reply_feedback">Kirim</button>
						<button type="button" class="cb-button-form" onclick="popup.close('popup_review')">Batal</button>
						<?php } else { ?>
						<button type="button" class="cb-button-form" onclick="popup.close('popup_review')">Tutup</button>
						<?php }	?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup_cancel_repair" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Konfirmasi Pembatalan Perbaikan
		</div>
		<div class="panel-body">
			<form action="<?=site_url('order/cancel_repair/' . $model->transaction_detail->id)?>" class="form-horizontal" method="post">
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<label>Batalkan perbaikan?</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="submit" class="btn btn-default" onclick="popup.close('popup_cancel_repair')">Ya</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_cancel_repair')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup_notify_finished" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Konfirmasi Perbaikan Selesai
		</div>
		<div class="panel-body">
			<form action="<?=site_url('order/notify_repair_finished/' . $model->transaction_detail->id)?>" class="form-horizontal" method="post">
				<div class="form-group">
					<div class="col-sm-10 col-sm-offset-2">
						<label>Beri tahu barang sudah selesai diservis?</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="submit" class="btn btn-default" onclick="popup.close('popup_notify_finished')">Ya</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_notify_finished')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup_review_success" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Balasan Review
		</div>
		<div class="panel-body">
			<form>
				<div class="form-group">
					<div class="col-sm-12">
						<h4>Balasan berhasil dikirim</h4>
						<br/>
						<br/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<button type="button" class="btn btn-default" onclick="popup.close('popup_review_success')">OK</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<?php
/*
if ($model->transaction_detail->item_type == "ORDER")
{
	
?>

<div class="">
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
					<label class="control-label col-xs-3" for="sold_price">Total Harga:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="sold_price" 
						value="<?=$model->transaction_detail->sold_price?>" readonly></div>
				</div>
				<div class="form-group">
					<div class="col-xs-9 col-xs-offset-3">
						<button type="button" class="btn btn-default" onclick="popup.open('popup_review')" >Lihat Ulasan</button>
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
						<label class="control-label col-xs-3">Harga Servis:</label>
						<div class="col-xs-9"><input type="text" class="form-control" name="discounted_price"></div>
					</div>
					<div class="form-group">
						<div class="col-xs-3"><button type="submit" class="btn btn-default">Kirim</button></div>
					</div>
				</div>
				<div class="form-group" id="add_price">
					<div class="col-xs-3"><a class="btn btn-default" onclick="set_nego_price()" <?php if ($model->transaction_detail->order_status !== "TENANT_RECEIVED"){?> style="display:none"<?php } ?>>Masukkan Harga Servis</a></div>
				</div>
			</form>
			<button class="btn btn-default" onclick="popup.open('popup_notify_finished')"  <?php if ($model->transaction_detail->order_status !== "REPAIRING"){?> style="display:none"<?php } ?>>Notify Repair Finish</button>
			
			<!--<button class="btn btn-default" onclick="popup.open('popup_notify_failed')"  <?php if ($model->transaction_detail->order_status !== "REPAIRING"){?> style="display:none"<?php } ?>>Notify Repair Failed</button>
			-->
			
			<a href="<?=site_url('message/'.$model->transaction_detail->id)?>">
				<button class="btn btn-default">Kirim Pesan</button>
			</a>
			<a href="<?=site_url('customer/profile/'.$model->transaction_detail->id)?>">
				<button class="btn btn-default">Lihat Customer</button>
			</a>
		</div>
	</div>
</div>

<?php
}
	
?>
*/
?>