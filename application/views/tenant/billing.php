<?php
	// Model untuk Bill
	
	// dummy data billing
	$model->billings = array();
	
	$model->billings[0] = new class{};
	$model->billings[0]->id = 1;
	$model->billings[0]->date_created = "03-12-2017";
	$model->billings[0]->date_closed = "07-12-2017";
	$model->billings[0]->customer = "Billy";
	$model->billings[0]->address = "Jalan Moh. Toha no 194";
	$model->billings[0]->add_fee = "Rp 25.000,-";
	$model->billings[0]->total_payable = "Rp 275.000,-";
	
	// dummy data order list
	$model->orders = array();
	
	$model->orders[0] = new class{};
	$model->orders[0]->id = 1;
	$model->orders[0]->quantity = 1;
	$model->orders[0]->posted_item = new class{};
	$model->orders[0]->posted_item->name = "Djisamsung Galaksih";
	$model->orders[0]->posted_item->price = "Rp 175.000,-";
	$model->orders[0]->posted_item->type = "Order";
	$model->orders[1] = new class{};
	$model->orders[1]->id = 2;
	$model->orders[1]->quantity = 1;
	$model->orders[1]->posted_item = new class{};
	$model->orders[1]->posted_item->name = "Appa Kamera";
	$model->orders[1]->posted_item->price = "Rp 25.000,-";
	$model->orders[1]->posted_item->type = "Repair";
	$model->orders[1]->posted_item->order_status = "Repairing";
	$model->orders[2] = new class{};
	$model->orders[2]->id = 3;
	$model->orders[2]->quantity = 2;
	$model->orders[2]->posted_item = new class{};
	$model->orders[2]->posted_item->name = "Djisamsung Galaksih";
	$model->orders[2]->posted_item->price = "Rp 50.000,-";
	$model->orders[2]->posted_item->type = "Repair";
	$model->orders[2]->posted_item->order_status = "Tenant Received";
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Billing Detail</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_created">Tanggal:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="date_created" 
						value="<?=$model->billings[0]->date_created?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="customer">Nama Customer:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="customer" 
						value="<?=$model->billings[0]->customer?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="address">Alamat:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="address" 
						value="<?=$model->billings[0]->address?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="orders">Order List:</label>
					<div class="col-xs-9 pull-right">
						<div class="row list-group">
							<div class="col-xs-4">Nama </div>
							<div class="col-xs-1">Jml </div>
							<div class="col-xs-4">Harga </div>
						</div>
					</div>
					<div class="row">
					<?php
					foreach($model->orders as $order)
					{
						?>
						<div class="col-xs-9 pull-right">
							<div class="row list-group">
								<div class="col-xs-4 list-group-item">
									<?=$order->posted_item->name?> </div>
								<div class="col-xs-1 list-group-item">
									<?=$order->quantity?> </div>
								<div class="col-xs-3 list-group-item">
									<?=$order->posted_item->price?> </div>
								<div class="col-xs-1">
									<a class="btn btn-default" href="<?=site_url('Order/transaction_detail/'.$order->id)?>">
										Lihat
									</a></div>	
								<?php
									if ($order->posted_item->type != "Repair"){
										$show_div_repair_status = false;
										$show_div_repair_cost = false;
									} else {
										if ($order->posted_item->order_status == "Tenant Received"){
											$show_div_repair_status = false;
											$show_div_repair_cost = true;
										} else if($order->posted_item->order_status == "Repairing") {
											$show_div_repair_status = true;
											$show_div_repair_cost = false;
										} else {
											$show_div_repair_status = false;
											$show_div_repair_cost = false;
										}
									}
								?>
								<div class="col-xs-2" id="repair_status" <?php if ($show_div_repair_status ==false){?> style="display:none"<?php } ?>>
									<input type="checkbox" name="repair" value="repair_finished">Selesai
								</div>
								<div class="col-xs-2" id="repair_cost" <?php if ($show_div_repair_cost ==false){?> style="display:none"<?php } ?>>
									<button type="button" class="btn btn-default" onclick="popup.open('popup_repair_cost')">Masukkan Biaya</button>
								</div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="add_fee">Ongkos Kirim:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="add_fee" 
						value="<?=$model->billings[0]->add_fee?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="total_payable">Total Harga:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="total_payable" 
						value="<?=$model->billings[0]->total_payable?>" readonly></div>
					<div class="col-xs-2">
						<a class="btn btn-default" href="">
							Masukkan OTP
						</a>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-2 col-xs-offset-10">
						<button type="button" class="btn btn-default" onclick="popup.open('popup_repair_finished')">Servis Selesai</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup_repair_finished" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Konfirmasi Selesai Servis
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Kirim notifikasi bahwa servis sudah selesai?</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="button" class="btn btn-default">Kirim</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_repair_finished')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup_repair_cost" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Masukkan Biaya Servis
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-4">
						<label>Biaya Servis:</label>
					</div>
					<div class="col-sm-8">
						<input type="text" class="form-control" id="repair_cost_price"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="button" class="btn btn-default">Kirim</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_repair_cost')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>