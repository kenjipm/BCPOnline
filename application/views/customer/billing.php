<?php
	// // Model untuk Bill
	
	// // dummy data billing
	// $model->billing = new class{};
	// $model->billing->id = 1;
	// $model->billing->date_created = "03-12-2017";
	// $model->billing->date_closed = "07-12-2017";
	// $model->billing->shipping_charge = new class{};
	// $model->billing->address = "Jalan Moh. Toha no 194";
	// $model->billing->shipping_charge->fee_amount = "Rp 25.000,-";
	// $model->billing->total_payable = "Rp 275.000,-";
	
	// $model->billing->action = "create"; //create (kalau dari cart) or edit (kalau dari billing list)
	// $model->billing->action_name = "Bayar"; //Bayar (kalau dari cart) or Ubah (kalau dari billing list)
	// $model->billing->is_paid = false;
	
	// // dummy data order list
	// $model->orders = array();
	
	// $model->orders[0] = new class{};
	// $model->orders[0]->id = 1;
	// $model->orders[0]->quantity = 1;
	// $model->orders[0]->posted_item = new class{};
	// $model->orders[0]->posted_item->name = "Djisamsung Galaksih";
	// $model->orders[0]->posted_item->price = "Rp 175.000,-";
	// $model->orders[1] = new class{};
	// $model->orders[1]->id = 2;
	// $model->orders[1]->quantity = 1;
	// $model->orders[1]->posted_item = new class{};
	// $model->orders[1]->posted_item->name = "Kesing Appa Kamera";
	// $model->orders[1]->posted_item->price = "Rp 25.000,-";
	// $model->orders[2] = new class{};
	// $model->orders[2]->id = 3;
	// $model->orders[2]->quantity = 2;
	// $model->orders[2]->posted_item = new class{};
	// $model->orders[2]->posted_item->name = "Kesing Djisamsung";
	// $model->orders[2]->posted_item->price = "Rp 50.000,-";
	
	// $model->payment_methods = array();
	// $model->payment_methods[0] = new class{};
	// $model->payment_methods[0]->id = 1;
	// $model->payment_methods[0]->name = "Cash on Delivery";
	// $model->payment_methods[0]->selected = true;
	// $model->payment_methods[1] = new class{};
	// $model->payment_methods[1]->id = 2;
	// $model->payment_methods[1]->name = "KlikBCA";
	// $model->payment_methods[1]->selected = false;
	// $model->payment_methods[2] = new class{};
	// $model->payment_methods[2]->id = 3;
	// $model->payment_methods[2]->name = "BCA KlikPay";
	// $model->payment_methods[2]->selected = false;
	// $model->payment_methods[3] = new class{};
	// $model->payment_methods[3]->id = 4;
	// $model->payment_methods[3]->name = "BNI e-Banking";
	// $model->payment_methods[3]->selected = false;
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>
				<?=$title?>
				<div class="pull-right"><a href="<?=site_url('customer/cart')?>" class="btn btn-default">Kembali</a></div>
			</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('billing/'.$model->billing->action)?>" method="post" class="form-horizontal" id="form_billing">
				<input type="hidden" name="billing_id" value="<?=$model->billing->id?>"/>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_created">Tanggal:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="date_created" 
						value="<?=$model->billing->date_created?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="address">Alamat:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="address" 
						value="<?=$model->billing->shipping_address->full_address?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="orders">Order List:</label>
					<div class="col-xs-9 pull-right">
						<div class="row list-group">
							<div class="col-xs-3">Nama </div>
							<div class="col-xs-2">Varian </div>
							<div class="col-xs-1">Jml </div>
							<div class="col-xs-2">Harga </div>
							<div class="col-xs-2">Total </div>
						</div>
					</div>
					<div class="row">
					<?php
					foreach($model->orders as $order)
					{
						?>
						<div class="col-xs-9 col-xs-offset-3">
							<div class="row list-group">
								<div class="col-xs-3 list-group-item">
									<?=$order->posted_item_variance->posted_item->name?> </div>
								<div class="col-xs-2 list-group-item">
									<?=$order->posted_item_variance->var_description?> </div>
								<div class="col-xs-1 list-group-item">
									<?=$order->quantity?> </div>
								<div class="col-xs-2 list-group-item">
									<?=$order->posted_item_variance->posted_item->price?> </div>
								<div class="col-xs-2 list-group-item">
									<?=$order->price_total?> </div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="shipping_charge">Ongkos Kirim:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="shipping_charge" 
						value="<?=$model->billing->shipping_charge->fee_amount?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="total_payable">Total Harga:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="total_payable" 
						value="<?=$model->billing->total_payable?>" readonly></div>
				</div>
				<?php
					if ($model->billing->is_voucher_available)
					{
						?>
						<div class="form-group">
							<label class="control-label col-xs-3" for="total_payable">Kode Voucher:</label>
							<div class="col-xs-3"><input type="text" class="form-control" id="voucher_code" name="voucher_code" 
								value=""></div>
							<div class="col-xs-1">
								<button type="button" class="btn btn-default" onclick="cek_kode_voucher()">Cek</button>
							</div>
							<div class="col-xs-2">
								<span id="voucher_code_status"></span>
							</div>
						</div>
						<?php
					}
				?>
				<hr/>
				<h3>Pembayaran</h3>
				<?php
					$i = 0; $div_row_opened = false;
					foreach ($model->payment_methods as $payment_method)
					{
						if ($i % 3 == 0) { ?> <div class="row"> <?php $div_row_opened = true; } 
						?>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-body hoverdiv hoverdiv-white" onclick="select_payment_method('<?=$payment_method->name?>')">
									<input type="radio" name="payment_method" id="payment_method-<?=$payment_method->name?>" value="<?=$payment_method->name /* hrsnya id, tp data nya ga disimpen?? */?>" <?=$payment_method->selected?"checked=\"checked\"":""?>/>
									<label><?=$payment_method->description?></label>
								</div>
							</div>
						</div>
						<?php
						if ($i % 3 == 2) { ?> </div> <?php $div_row_opened = false; }
						$i++;
					}
					if ($div_row_opened) { ?> </div> <?php }
				?>
				<hr/>
				<h3>Pengiriman</h3>
				<?php
					$i = 0; $div_row_opened = false;
					foreach ($model->delivery_methods as $delivery_method)
					{
						if ($i % 3 == 0) { ?> <div class="row"> <?php $div_row_opened = true; } 
						?>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-body hoverdiv hoverdiv-white" onclick="select_delivery_method('<?=$delivery_method->name?>')">
									<input type="radio" name="delivery_method" id="delivery_method-<?=$delivery_method->name?>" value="<?=$delivery_method->name ?>" <?=$delivery_method->selected?"checked=\"checked\"":""?>/>
									<label><?=$delivery_method->description?></label>
								</div>
							</div>
						</div>
						<?php
						if ($i % 3 == 2) { ?> </div> <?php $div_row_opened = false; }
						$i++;
					}
					if ($div_row_opened) { ?> </div> <?php }
				?>
				<hr/>
				<input type="hidden" name="date_created" value="<?=$model->billing->date_created?>"/>
				<input type="hidden" name="date_closed" value="<?=$model->billing->date_closed?>"/>
				<input type="hidden" name="customer_id" value="<?=$model->billing->customer_id?>"/>
				<input type="hidden" name="shipping_address_id" value="<?=$model->billing->shipping_address->id?>"/>
				
				<input type="hidden" name="fee_amount" value="<?=$model->billing->shipping_charge->fee_amount?>"/>
			
				<button type="button" class="btn btn-default" onclick="<?=$model->billing->is_voucher_available?'cek_kode_voucher(true)':'submit_form()'?>">
					<?=$model->billing->action_name?>
				</button>
			</form>
		</div>
	</div>
</div>
