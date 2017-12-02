<?php
	// Model untuk billing_status
	
	// dummy data billing
	$model->billing = new class{};
	$model->billing->id = 1;
	$model->billing->date_created = "03-12-2017";
	$model->billing->date_closed = "07-12-2017";
	$model->billing->address = "Jalan Moh. Toha no 194";
	$model->billing->add_fee = "Rp 25.000,-";
	$model->billing->total_payable = "Rp 275.000,-";
	$model->billing->total_not_paid = "Rp 250.000,-";
	
	// dummy data order list
	$model->orders = array();
	
	$model->orders[0] = new class{};
	$model->orders[0]->id = 1;
	$model->orders[0]->quantity = 1;
	$model->orders[0]->posted_item = array();
	$model->orders[0]->posted_item[0] = new class{};
	$model->orders[0]->posted_item[0]->name = "Djisamsung Galaksih";
	$model->orders[0]->posted_item[0]->price = "Rp 175.000,-";
	$model->orders[1] = new class{};
	$model->orders[1]->id = 2;
	$model->orders[1]->quantity = 1;
	$model->orders[1]->posted_item = array();
	$model->orders[1]->posted_item[0] = new class{};
	$model->orders[1]->posted_item[0]->name = "Kesing Appa Kamera";
	$model->orders[1]->posted_item[0]->price = "Rp 25.000,-";
	$model->orders[2] = new class{};
	$model->orders[2]->id = 3;
	$model->orders[2]->quantity = 2;
	$model->orders[2]->posted_item = array();
	$model->orders[2]->posted_item[0] = new class{};
	$model->orders[2]->posted_item[0]->name = "Kesing Djisamsung";
	$model->orders[2]->posted_item[0]->price = "Rp 50.000,-";
	
	$model->billing->is_paid = false;
	
	$model->payments = array();
	
	$model->payments[0] = new class{};
	$model->payments[0]->id = 1;
	$model->payments[0]->paid = true;
	$model->payments[0]->payment_method = "KlikBCA";
	$model->payments[0]->payment_date = "2 Dec 17";
	$model->payments[0]->paid_amount = "Rp 25.000,-";
	$model->payments[0]->keterangan = "-"; // informasi credit card dll
	
	$model->payments[1] = new class{};
	$model->payments[1]->id = 2;
	$model->payments[1]->paid = false;
	$model->payments[1]->payment_method = "CoD";
	$model->payments[1]->payment_date = "-";
	$model->payments[1]->paid_amount = "-";
	$model->payments[1]->keterangan = "Menunggu Pembayaran"; // informasi credit card dll
?>

<div class="row">
	<div class="col-md-10 col-md-offset-1">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><?=$title?></h3>
			</div>
			<div class="panel-body">
				<form class="form-horizontal">
					<div class="form-group">
						<label class="control-label col-xs-3" for="date_created">Tanggal:</label>
						<div class="col-xs-9"><input type="text" class="form-control" id="date_created" 
							value="<?=$model->billing->date_created?>" readonly></div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="address">Alamat:</label>
						<div class="col-xs-3"><input type="text" class="form-control" id="address" 
							value="<?=$model->billing->address?>" readonly></div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="orders">Order List:</label>
						<div class="col-xs-9 pull-right">
							<div class="row list-group">
								<div class="col-xs-5">Nama </div>
								<div class="col-xs-1">Jml </div>
								<div class="col-xs-4">Harga </div>
							</div>
						</div>
						<div class="row">
							<?php
							foreach($model->orders as $order)
							{
								?>
								<div class="col-xs-9 col-xs-offset-3">
									<div class="row list-group">
										<div class="col-xs-5 list-group-item">
											<?=$order->posted_item[0]->name?> </div>
										<div class="col-xs-1 list-group-item">
											<?=$order->quantity?> </div>
										<div class="col-xs-4 list-group-item">
											<?=$order->posted_item[0]->price?> </div>
										<div class="col-xs-1">
											<a class="btn btn-default" href="<?=site_url('order/transaction_detail/'.$order->id)?>">
												Lihat
											</a></div>	
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
							value="<?=$model->billing->add_fee?>" readonly></div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="total_payable">Total Harga:</label>
						<div class="col-xs-3"><input type="text" class="form-control" id="total_payable" 
							value="<?=$model->billing->total_payable?>" readonly></div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" >Pembayaran:</label>
						<div class="col-xs-9 pull-right">
							<div class="row list-group">
								<div class="col-xs-2">Tanggal</div>
								<div class="col-xs-2">Pembayaran</div>
								<div class="col-xs-3">Harga</div>
								<div class="col-xs-3">Keterangan</div>
							</div>
						</div>
						<div class="row">
							<?php
							foreach($model->payments as $payment)
							{
								?>
								<div class="col-xs-9 col-xs-offset-3">
									<div class="row list-group">
										<div class="col-xs-2 list-group-item"><?=$payment->payment_date?></div>
										<div class="col-xs-2 list-group-item"><?=$payment->payment_method?></div>
										<div class="col-xs-3 list-group-item"><?=$payment->paid_amount?></div>
										<div class="col-xs-3 list-group-item"><?=$payment->keterangan?></div>
									</div>
								</div>
								<?php
							}
							?>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3">Total Belum Dibayar:</label>
						<div class="col-xs-3"><input type="text" class="form-control" id="total_payable" 
							value="<?=$model->billing->total_not_paid?>" readonly></div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>