<div class="cb-txt-primary-1 cb-pl-5 cb-align-left cb-font-title">
	<h2><?=$title?></h2>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-txt-primary-1 cb-pull-left">
				<div class="cb-label"> Tanggal </div>
			</div>
			<div class="cb-pull-right">
				<div class="cb-txt-primary-1">
					<div class="cb-label"> : </div>
				</div>
			</div>
		</div>
		<div class="cb-col-fifth-2 cb-pl-3">
			<input type="text" class="cb-row cb-col-full cb-input-text" id="customer_id" name="customer_id" value="<?=$model->billing->date_created?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-txt-primary-1 cb-pull-left">
				<div class="cb-label"> Alamat </div>
			</div>
			<div class="cb-pull-right">
				<div class="cb-txt-primary-1">
					<div class="cb-label"> : </div>
				</div>
			</div>
		</div>
		<div class="cb-col-fifth-2 cb-pl-3">
			<input type="text" class="cb-row cb-col-full cb-input-text" id="customer_id" name="customer_id" value="<?=$model->billing->address?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-txt-primary-1 cb-pull-left">
				<div class="cb-label"> Rincian Order </div>
			</div>
			<div class="cb-pull-right">
				<div class="cb-txt-primary-1">
					<div class="cb-label"> : </div>
				</div>
			</div>
		</div>
		<div class="cb-col-fifth-4 cb-pl-3">
			<div class="cb-row cb-border-bottom">
				<div class="cb-col-half">
					<div class="cb-row cb-pb-3">
						<div class="cb-col-fourth-2">
							<div class="cb-label cb-align-center">Produk</div>
						</div>
						<div class="cb-col-fourth">
							<div class="cb-label cb-align-center">Jumlah</div>
						</div>
						<div class="cb-col-fourth">
							<div class="cb-label cb-align-right">Harga</div>
						</div>
					</div>
				</div>
				<div class="cb-col-half">
					<div class="cb-row">
						<div class="cb-col-fourth-2">
							<div class="cb-label cb-align-center">Status</div>
						</div>
					</div>
				</div>
			</div>
		<?php
		foreach($model->orders as $order)
		{
			?>
			<div class="cb-row cb-border-bottom cb-p-3">
				<div class="cb-col-half">
					<div class="cb-row">
						<div class="cb-col-fourth-2">
							<div class="cb-align-left"><?=$order->posted_item_variance->posted_item->posted_item_name?></div>
						</div>
						<div class="cb-col-fourth">
							<div class="cb-align-center"><?=$order->quantity?></div>
						</div>
						<div class="cb-col-fourth">
							<div class="cb-align-right"><?=$order->posted_item_variance->posted_item->price?></div>
						</div>
					</div>
				</div>
				<div class="cb-col-half">
					<div class="cb-row">
						<div class="cb-col-fourth-2">
							<div class="cb-align-center cb-pl-5" id="order_status-<?=$order->id?>">
								<?=$order->order_status?>
								<button data-toggle="collapse" data-target="#order_status_history-<?=$order->id?>" class="pull-right cb-mr-5" type="button">V</button>
							</div>
						</div>
						<div class="cb-col-fourth-2">
							<div class="cb-row cb-align-right cb-mr-5">
							<?php
								if ($order->is_received)
								{
									?>
									<button type="button" class="cb-button-form" id="btn-mark_order_finish-<?=$order->id?>" onclick="mark_order_finish(<?=$order->id?>, <?=$order->posted_item_variance->posted_item->tenant_id?>)">SELESAI</button>
									<?php
								}
							?>
							<?php
								if (!$order->is_done)
								{
									?>
									<button type="button" class="cb-button-form" id="btn-create_dispute-<?=$order->id?>" onclick="create_dispute(<?=$order->id?>)">KOMPLAIN</button>
									<form id="form-create_dispute-<?=$order->id?>" method="post" action="<?=site_url('customer/create_dispute')?>">
										<input type="hidden" name="order_detail_id" value="<?=$order->id?>"/>
										<input type="hidden" name="tenant_id" value="<?=$order->posted_item_variance->posted_item->tenant_id?>"/>
									</form>
									<?php
								}
								else
								{
									?>
									<button type="button" class="cb-button-form" id="btn-create_feedback-<?=$order->id?>" onclick="open_popup_feedback(<?=$order->id?>, <?=$order->posted_item_variance->posted_item->tenant_id?>)">ULASAN</button>
									<?php
								}
							?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row">
				<div id="order_status_history-<?=$order->id?>" class="collapse cb-col-full">
					<?php
						foreach($order->order_status_histories as $order_status_history)
						{
							?>
							<div class="cb-row cb-bg-secondary-3 cb-p-2">
								<i><?=$order_status_history->status?> (<?=$order_status_history->date_added?>)</i>
							</div>
							<?php
						}
					?>
				</div>
			</div>
			<?php
			}
		?>
			<div class="cb-row">
				<div class="cb-col-half">
					<div class="cb-row cb-p-5">
						<div class="cb-col-fourth-2">
							<div class="cb-align-left">Subtotal</div>
						</div>
						<div class="cb-col-fourth">
						</div>
						<div class="cb-col-fourth">
							<div class="cb-align-right"><?=$model->billing->total_payable?></div>
						</div>
					</div>
				</div>
				<div class="cb-col-half">
				</div>
			</div>
			<div class="cb-row">
				<div class="cb-col-half">
					<div class="cb-row cb-p-5">
						<div class="cb-col-fourth-2">
							<div class="cb-align-left">Ongkos Kirim</div>
						</div>
						<div class="cb-col-fourth">
						</div>
						<div class="cb-col-fourth">
							<div class="cb-align-right"><?=$model->billing->shipping_charge?></div>
						</div>
					</div>
				</div>
				<div class="cb-col-half">
				</div>
			</div>
			<div class="cb-row">
				<div class="cb-col-half">
					<div class="cb-row cb-p-5">
						<div class="cb-col-fourth-2">
							<div class="cb-align-left">Voucher</div>
						</div>
						<div class="cb-col-fourth">
						</div>
						<div class="cb-col-fourth">
							<div class="cb-align-right"><?=$model->billing->shipping_charge?></div>
						</div>
					</div>
				</div>
				<div class="cb-col-half">
				</div>
			</div>
			<div class="cb-row">
				<div class="cb-col-half">
					<div class="cb-row cb-p-5">
						<div class="cb-col-fourth-2">
							<div class="cb-label cb-align-left">Total Pembayaran</div>
						</div>
						<div class="cb-col-fourth-2">
							<div class="cb-label cb-align-right"><?=$model->billing->total_payable?></div>
						</div>
					</div>
				</div>
				<div class="cb-col-half">
				</div>
			</div>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-txt-primary-1 cb-pull-left">
				<div class="cb-label"> Pembayaran </div>
			</div>
			<div class="cb-pull-right">
				<div class="cb-txt-primary-1">
					<div class="cb-label"> : </div>
				</div>
			</div>
		</div>
		<div class="cb-col-fifth-4 cb-pl-3">
			<div class="cb-row cb-border-bottom">
				<div class="cb-col-full">
					<div class="cb-row cb-pb-3">
						<div class="cb-col-fifth">
							<div class="cb-label cb-align-center">Tanggal</div>
						</div>
						<div class="cb-col-fifth-2">
							<div class="cb-label cb-align-center">Metode Pembayaran</div>
						</div>
						<div class="cb-col-fifth-2">
							<div class="cb-label cb-align-center">Jumlah Pembayaran</div>
						</div>
					</div>
				</div>
			</div>
			<?php
				foreach($model->payments as $payment)
				{
					?>
					<div class="cb-row cb-border-bottom cb-p-5">
						<div class="cb-col-full">
							<div class="cb-row cb-pb-3">
								<div class="cb-col-fifth">
									<div class="cb-align-center"><?=$payment->payment_date?></div>
								</div>
								<div class="cb-col-fifth-2">
									<div class="cb-align-center"><?=$payment->payment_method?></div>
								</div>
								<div class="cb-col-fifth-2">
									<div class="cb-align-center"><?=$payment->paid_amount?></div>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			?>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-txt-primary-1 cb-pull-left">
				<div class="cb-label"> Total Belum Dibayar </div>
			</div>
			<div class="cb-pull-right">
				<div class="cb-txt-primary-1">
					<div class="cb-label"> : </div>
				</div>
			</div>
		</div>
		<div class="cb-col-fifth-2 cb-pl-3">
			<input type="text" class="cb-row cb-col-full cb-input-text cb-label" id="customer_id" name="customer_id" value="<?=$model->billing->total_not_paid?>" readonly/>
		</div>
		<div class="cb-col-fifth-2 cb-p-5">
			<?php if (!$payment->is_paid) { ?>
				<a class="cb-button-form" href="<?=site_url('billing/payment_dummy_bayar/'.$payment->id)?>">
					BAYAR (dummy)
				</a>
			<?php } ?>
		</div>
	</div>
</div>

<!--
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
													<!--button type="button" class="btn btn-default" onclick="toggle_order_status_history(<?=$order->id?>)">V</button--><!--
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
													</a></td-->	<!--
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
										<!--th>Keterangan</th--><!--
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
											<!--<td>
												<button data-toggle="collapse" data-target="#payment_description-<?=$payment->id?>" class="btn btn-default" type="button">?</button>
											</td>
											<!-- DUMMY PEMBAYARAN -->
											<?php if (!$payment->is_paid) { ?>
											<!--<td>
												<a class="btn btn-default" href="<?=site_url('billing/payment_dummy_bayar/'.$payment->id)?>">
													BAYAR (dummy)
												</a>
											</td>	
											<?php } ?>
											<!-- ---------------- -->
										<!--</tr>
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
-->
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