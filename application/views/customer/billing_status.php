<?php
	// // Model untuk billing_status
	
	// // dummy data billing
	// $model->billing = new class{};
	// $model->billing->id = 1;
	// $model->billing->date_created = "03-12-2017";
	// $model->billing->date_closed = "07-12-2017";
	// $model->billing->address = "Jalan Moh. Toha no 194";
	// $model->billing->shipping_charge = "Rp 25.000,-";
	// $model->billing->total_payable = "Rp 275.000,-";
	// $model->billing->total_not_paid = "Rp 250.000,-";
	
	// // dummy data order list
	// $model->orders = array();
	
	// $model->orders[0] = new class{};
	// $model->orders[0]->id = 1;
	// $model->orders[0]->quantity = 1;
	// $model->orders[0]->posted_item_variance = new class{};
	// $model->orders[0]->posted_item_variance->posted_item = new class{};
	// $model->orders[0]->posted_item_variance->posted_item->name = "Djisamsung Galaksih";
	// $model->orders[0]->posted_item_variance->posted_item->price = "Rp 175.000,-";
	// $model->orders[0]->posted_item_variance->posted_item->order_status = "Queued";
	// $model->orders[1] = new class{};
	// $model->orders[1]->id = 2;
	// $model->orders[1]->quantity = 1;
	// $model->orders[1]->posted_item_variance = new class{};
	// $model->orders[1]->posted_item_variance->posted_item = new class{};
	// $model->orders[1]->posted_item_variance->posted_item->name = "Repair HP Xiaomi";
	// $model->orders[1]->posted_item_variance->posted_item->price = "Rp 25.000,-";
	// $model->orders[1]->posted_item_variance->posted_item->order_status = "Queued";
	// $model->orders[2] = new class{};
	// $model->orders[2]->id = 3;
	// $model->orders[2]->quantity = 2;
	// $model->orders[2]->posted_item_variance = new class{};
	// $model->orders[2]->posted_item_variance->posted_item = new class{};
	// $model->orders[2]->posted_item_variance->posted_item->name = "Kesing Djisamsung";
	// $model->orders[2]->posted_item_variance->posted_item->price = "Rp 50.000,-";
	// $model->orders[2]->posted_item_variance->posted_item->order_status = "Queued";
	
	// $model->billing->is_paid = false;
	
	// $model->payments = array();
	
	// $model->payments[0] = new class{};
	// $model->payments[0]->id = 1;
	// $model->payments[0]->paid = true;
	// $model->payments[0]->payment_method = "KlikBCA";
	// $model->payments[0]->payment_method_description = "<b>KlikBCA: </b>Pembayaran dilakukan melalui www.klikbca.com";
	// $model->payments[0]->payment_date = "2 Dec 17";
	// $model->payments[0]->paid_amount = "Rp 25.000,-";
	// $model->payments[0]->description = "Lunas"; // informasi credit card dll
	
	// $model->payments[1] = new class{};
	// $model->payments[1]->id = 2;
	// $model->payments[1]->paid = false;
	// $model->payments[1]->payment_method = "CoD";
	// $model->payments[1]->payment_method_description = "<b>Cash on Delivery: </b>Pembayaran dilakukan setelah barang tiba di tujuan";
	// $model->payments[1]->payment_date = "-";
	// $model->payments[1]->paid_amount = "-";
	// $model->payments[1]->description = "Menunggu Pembayaran"; // informasi credit card dll
	
	// $model->otps = array();
	// $model->otps[0] = "AF08-EJW3";
	// $model->otps[1] = "AF08-EJW4";
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
						<div class="table-responsive col-xs-9">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Nama </th>
										<th>Jml </th>
										<th>Harga </th>
										<th>Status </th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($model->orders as $order)
									{
										?>
											<tr>
												<td>
													<?=$order->posted_item_variance->posted_item->posted_item_name?> </td>
												<td>
													<?=$order->quantity?> </td>
												<td>
													<?=$order->posted_item_variance->posted_item->price?> </td>
												<td>
													<?=$order->order_status?> </td>
												<!--td class="col-xs-1">
													<a class="btn btn-default" href="<?=site_url('order/transaction_detail/'.$order->id)?>">
														Lihat
													</a></td-->	
											</tr>
										<?php
									}
									?>
								</tbody>
							</table>
						</div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="delivery_method">Kurir:</label>
						<div class="col-xs-3"><input type="text" class="form-control" id="delivery_method" 
							value="<?=$model->billing->delivery_method?>" readonly></div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="shipping_charge">Ongkos Kirim:</label>
						<div class="col-xs-3"><input type="text" class="form-control" id="shipping_charge" 
							value="<?=$model->billing->shipping_charge?>" readonly></div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" for="total_payable">Total Harga:</label>
						<div class="col-xs-3"><input type="text" class="form-control" id="total_payable" 
							value="<?=$model->billing->total_payable?>" readonly></div>
					</div>
					<div class="form-group">
						<label class="control-label col-xs-3" >Pembayaran:</label>
						<div class="table-responsive col-xs-9">
							<table class="table table-bordered table-striped">
								<thead>
									<tr>
										<th>Tanggal</th>
										<th>Pembayaran</th>
										<th>Jumlah</th>
										<!--th>Keterangan</th-->
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($model->payments as $payment)
									{
										?>
										<tr>
											<td><?=$payment->payment_date?></td>
											<td><?=$payment->payment_method?></td>
											<td><?=$payment->paid_amount?></td>
											<!--<td><?=$payment->description?></td>-->
											<td>
												<button data-toggle="collapse" data-target="#payment_description-<?=$payment->id?>" class="btn btn-default" type="button">?</button>
											</td>
											<!-- DUMMY PEMBAYARAN -->
											<?php if (!$payment->is_paid) { ?>
											<td>
												<a class="btn btn-default" href="<?=site_url('billing/payment_dummy_bayar/'.$payment->id)?>">
													BAYAR (dummy)
												</a>
											</td>	
											<?php } ?>
											<!-- ---------------- -->
										</tr>
										<tr id="payment_description-<?=$payment->id?>" class="collapse">
											<td colspan=4>
												<div class="panel panel-default">
													<div class="panel-body">
														<?=$payment->payment_method_description?>
													</div>
												</div>
											</td>
										</tr>
										<?php
									}
								?>
								</tbody>
							</table>
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