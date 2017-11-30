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
					<label class="control-label col-xs-3" for="add_fee">Ongkos Kirim:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="add_fee" 
						value="<?=$model->billings[0]->add_fee?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="total_payable">Total Harga:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="total_payable" 
						value="<?=$model->billings[0]->total_payable?>" readonly></div>
				</div>
				<div class="form-group">
					<div class="col-xs-2 col-xs-offset-3">
						<a href="<?=site_url('order_detail/'.$model->billings[0]->id)?>">
							<button class="btn btn-default">Lihat Order</button>
						</a>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
