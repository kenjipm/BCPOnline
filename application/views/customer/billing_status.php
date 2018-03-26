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
				<div class="form-horizontal">
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
										<th></th>
									</tr>
								</thead>
								<tbody>
									<?php
									foreach($model->orders as $order)
									{
										?>
											<tr>
												<td>
													<?=$order->posted_item_variance->posted_item->posted_item_name?>
												</td>
												<td>
													<?=$order->quantity?>
												</td>
												<td>
													<?=$order->posted_item_variance->posted_item->price?>
												</td>
												<td id="order_status-<?=$order->id?>" >
													<?=$order->order_status?>
													<!--button type="button" class="btn btn-default" onclick="toggle_order_status_history(<?=$order->id?>)">V</button-->
													<button data-toggle="collapse" data-target="#order_status_history-<?=$order->id?>" class="btn btn-default" type="button">V</button>
												</td>
												<td id="order_action-<?=$order->id?>" >
												<?php
													if ($order->is_received)
													{
														?>
														<button type="button" class="btn btn-default" id="btn-mark_order_finish-<?=$order->id?>" onclick="mark_order_finish(<?=$order->id?>, <?=$order->posted_item_variance->posted_item->tenant_id?>)">Selesai</button>
														<?php
													}
												?>
												<?php
													if (!$order->is_done)
													{
														?>
														<button type="button" class="btn btn-default" id="btn-create_dispute-<?=$order->id?>" onclick="create_dispute(<?=$order->id?>)">Komplain</button>
														<form id="form-create_dispute-<?=$order->id?>" method="post" action="<?=site_url('customer/create_dispute')?>">
															<input type="hidden" name="order_detail_id" value="<?=$order->id?>"/>
															<input type="hidden" name="tenant_id" value="<?=$order->posted_item_variance->posted_item->tenant_id?>"/>
														</form>
														<?php
													}
													else
													{
														?>
														<button type="button" class="btn btn-default" id="btn-create_feedback-<?=$order->id?>" onclick="open_popup_feedback(<?=$order->id?>, <?=$order->posted_item_variance->posted_item->tenant_id?>)">Review</button>
														<?php
													}
												?>
												</td>
												<!--td class="col-xs-1">
													<a class="btn btn-default" href="<?=site_url('order/transaction_detail/'.$order->id)?>">
														Lihat
													</a></td-->	
											</tr>
											<tr id="order_status_history-<?=$order->id?>" class="collapse">
												<td colspan="5">
													<?php
														foreach($order->order_status_histories as $order_status_history)
														{
															?>
															<div class="row">
																<div class="col-md-12">
																	<?=$order_status_history->status?> (<?=$order_status_history->date_added?>)
																</div>
															</div>
															<?php
														}
													?>
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
				</div>
			</div>
		</div>
	</div>
</div>

<div id="popup_feedback" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Review
		</div>
		<div class="panel-body">
			<input type="hidden" id="feedback-order_detail_id" value="" />
			<input type="hidden" id="feedback-tenant_id" value="" />
			<div class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3">Rating:</label>
					<div class="col-xs-9">
						<select class="form-control" id="feedback-rating">
							<?php
								for($i=1; $i<=5; $i++) { ?> <option value="<?=$i?>"><?=$i?></option> <?php }
							?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Pesan:</label>
					<div class="col-xs-9">
						<textarea class="form-control" id="feedback-feedback_text"></textarea>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3"></label>
					<div class="col-xs-9">
						<button type="button" class="btn btn-default" onclick="create_feedback()" id="btn-create_feedback">Kirim</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_feedback')">Batal</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="popup_feedback_success" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Review
		</div>
		<div class="panel-body">
			<form>
				<div class="form-group">
					<div class="col-sm-12">
						<h4>Terima kasih atas review nya!</h4>
						<br/>
						<br/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<button type="button" class="btn btn-default" onclick="popup.close('popup_feedback_success')">Sama Sama</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>