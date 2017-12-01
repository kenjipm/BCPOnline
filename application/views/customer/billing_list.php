<?php
	// Model untuk Bill
	
	// dummy billing list
	$model->bills = array();
	
	$model->bills[0] = new class{};
	$model->bills[0]->id = 1;
	$model->bills[0]->date_created = "03-12-2017";
	$model->bills[0]->date_closed = "07-12-2017";
	$model->bills[0]->address = "Jalan Moh. Toha no 194";
	$model->bills[0]->add_fee = "Rp 25.000,-";
	$model->bills[0]->total_payable = "Rp 275.000,-";
	$model->bills[1] = new class{};
	$model->bills[1]->id = 2;
	$model->bills[1]->date_created = "05-12-2017";
	$model->bills[1]->date_closed = "08-12-2017";
	$model->bills[1]->address = "Jalan Soekarno Hatta no 22";
	$model->bills[1]->add_fee = "Rp 15.000,-";
	$model->bills[1]->total_payable = "Rp 165.000,-";
	$model->bills[2] = new class{};
	$model->bills[2]->id = 3;
	$model->bills[2]->date_created = "08-12-2017";
	$model->bills[2]->date_closed = "09-12-2017";
	$model->bills[2]->address = "Jalan Pajajaran no 14";
	$model->bills[2]->add_fee = "Rp 20.000,-";
	$model->bills[2]->total_payable = "Rp 180.000,-";
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Billing</h3>
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-2"> <label for="tanggal">Tanggal</label>	</div>
				<div class="col-xs-4"> <label for="address">Alamat</label> </div>
				<div class="col-xs-2"> <label for="add_fee">Ongkos Kirim</label>	</div>
				<div class="col-xs-3"> <label for="total_payable">Total Harga</label> </div>
			</div>
			<?php
			foreach($model->bills as $bill)
			{
				?>
				<div class="row list-group">
					<div class="col-xs-2 list-group-item">
						<?=$bill->date_created?> </div>
					<div class="col-xs-4 list-group-item">
						<?=$bill->address?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$bill->add_fee?> </div>
					<div class="col-xs-3 list-group-item">
						<?=$bill->total_payable?> </div>
					<div class="col-xs-1">
						<a href="<?=site_url('billing/detail/'.$bill->id)?>">
							<button class="btn btn-default">Lihat</button>
						</a></div>	
						
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>