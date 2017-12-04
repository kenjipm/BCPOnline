<?php
	// Model untuk Bill
	
	// dummy data billing
	$model->billing = new class{};
	$model->billing->id = 1;
	$model->billing->date_created = "03-12-2017";
	$model->billing->date_closed = "07-12-2017";
	$model->billing->address = "Jalan Moh. Toha no 194";
	$model->billing->add_fee = "Rp 25.000,-";
	$model->billing->total_payable = "Rp 275.000,-";
	
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
	
	$model->billing->action = "create"; //create (kalau dari cart) or edit (kalau dari billing list)
	$model->billing->action_name = "Bayar"; //Bayar (kalau dari cart) or Ubah (kalau dari billing list)
	$model->billing->is_paid = false;
	
	$model->payment_methods = array();
	$model->payment_methods[0] = new class{};
	$model->payment_methods[0]->id = 1;
	$model->payment_methods[0]->name = "Cash on Delivery";
	$model->payment_methods[0]->selected = true;
	$model->payment_methods[1] = new class{};
	$model->payment_methods[1]->id = 2;
	$model->payment_methods[1]->name = "KlikBCA";
	$model->payment_methods[1]->selected = false;
	$model->payment_methods[2] = new class{};
	$model->payment_methods[2]->id = 3;
	$model->payment_methods[2]->name = "BCA KlikPay";
	$model->payment_methods[2]->selected = false;
	$model->payment_methods[3] = new class{};
	$model->payment_methods[3]->id = 4;
	$model->payment_methods[3]->name = "BNI e-Banking";
	$model->payment_methods[3]->selected = false;
	
?>

<div class="col-sm-10 col-sm-offset-1">
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
			</form>
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
							<div class="panel-body hoverdiv hoverdiv-white" onclick="select_payment_method(<?=$payment_method->id?>)">
								<input type="radio" name="payment_method" id="payment_method-<?=$payment_method->id?>" value="<?=$payment_method->id?>" <?=$payment_method->selected?"checked=\"checked\"":""?>/>
								<label><?=$payment_method->name?></label>
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
			<a href="<?=site_url('billing/'.$model->billing->action)?>" class="btn btn-default">
				<?=$model->billing->action_name?>
			</a>
		</div>
	</div>
</div>