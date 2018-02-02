<?php
	// Model untuk Bill
	
	// dummy data billing
	// $model->billings = array();
	
	// $model->billings[0] = new class{};
	// $model->billings[0]->id = 1;
	// $model->billings[0]->date_created = "03-12-2017";
	// $model->billings[0]->date_closed = "07-12-2017";
	// $model->billings[0]->customer = "Billy";
	// $model->billings[0]->address = "Jalan Moh. Toha no 194";
	// $model->billings[0]->shipping_charge = "Rp 25.000,-";
	// $model->billings[0]->total_payable = "Rp 275.000,-";
	
	// // dummy data order list
	// $model->orders = array();
	
	// $model->orders[0] = new class{};
	// $model->orders[0]->id = 1;
	// $model->orders[0]->quantity = 1;
	// $model->orders[0]->posted_item = new class{};
	// $model->orders[0]->posted_item->name = "Djisamsung Galaksih";
	// $model->orders[0]->posted_item->price = "Rp 175.000,-";
	// $model->orders[0]->posted_item->type = "Order";
	// $model->orders[1] = new class{};
	// $model->orders[1]->id = 2;
	// $model->orders[1]->quantity = 1;
	// $model->orders[1]->posted_item = new class{};
	// $model->orders[1]->posted_item->name = "Appa Kamera";
	// $model->orders[1]->posted_item->price = "Rp 25.000,-";
	// $model->orders[1]->posted_item->type = "Repair";
	// $model->orders[1]->posted_item->order_status = "Repairing";
	// $model->orders[2] = new class{};
	// $model->orders[2]->id = 3;
	// $model->orders[2]->quantity = 2;
	// $model->orders[2]->posted_item = new class{};
	// $model->orders[2]->posted_item->name = "Djisamsung Galaksih";
	// $model->orders[2]->posted_item->price = "Rp 50.000,-";
	// $model->orders[2]->posted_item->type = "Repair";
	// $model->orders[2]->posted_item->order_status = "Tenant Received";
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Barang untuk Dikirim</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="otp">OTP:</label>
					<div class="col-xs-9"><input type="text" class="form-control" 
						value="<?=$model->repair_list[0]->otp?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="deliverer_name">Deliverer:</label>
					<div class="col-xs-9"><input type="text" class="form-control" 
						value="<?=$model->repair_list[0]->deliverer_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="orders">Repair List:</label>
					<div class="col-xs-9 pull-right">
						<div class="row list-group">
							<div class="col-xs-4">Nama </div>
						</div>
					</div>
					<div class="row">
					<?php
					foreach($model->repair_list as $repair)
					{
						?>
						<div class="col-xs-9 pull-right">
							<div class="row list-group">
								<div class="col-xs-4 list-group-item">
									<?=$repair->posted_item_description?> </div>
								<div class="col-xs-1">
									<a class="btn btn-default" href="<?=site_url('Order/transaction_detail/'.$repair->id)?>">
										Lihat
									</a></div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
