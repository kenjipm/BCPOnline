<?php
	// // Model untuk Bill
	
	// // dummy billing list
	// $model->billings = array();
	
	// $model->billings[0] = new class{};
	// $model->billings[0]->id = 1;
	// $model->billings[0]->date_created = "03-12-2017";
	// $model->billings[0]->date_closed = "07-12-2017";
	// $model->billings[0]->address = "Jalan Perjuangan Raya 17";
	// $model->billings[0]->shipping_charge = "Rp 25.000,-";
	// $model->billings[0]->total_payable = "Rp 275.000,-";
	// $model->billings[1] = new class{};
	// $model->billings[1]->id = 2;
	// $model->billings[1]->date_created = "05-12-2017";
	// $model->billings[1]->date_closed = "08-12-2017";
	// $model->billings[1]->address = "Jalan Perjuangan Raya 17";
	// $model->billings[1]->shipping_charge = "Rp 15.000,-";
	// $model->billings[1]->total_payable = "Rp 165.000,-";
	// $model->billings[2] = new class{};
	// $model->billings[2]->id = 3;
	// $model->billings[2]->date_created = "08-12-2017";
	// $model->billings[2]->date_closed = "09-12-2017";
	// $model->billings[2]->address = "Jalan Perjuangan Raya 17";
	// $model->billings[2]->shipping_charge = "Rp 20.000,-";
	// $model->billings[2]->total_payable = "Rp 180.000,-";
	
?>
<div class="">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<td> <label for="tanggal">Tanggal</label>	</td>
						<td> <label for="address">Alamat</label> </td>
						<td> <label for="shipping_charge">Ongkos Kirim</label>	</td>
						<td> <label for="total_payable">Total Harga</label> </td>
						<td> </td>
					</thead>
					<tbody>
						<?php
						foreach($model->billings as $billing)
						{
							?>
							<tr>
								<td>
									<?=$billing->date_created?>
								</td>
								<td>
									<?=$billing->address?>
								</td>
								<td>
									<?=$billing->shipping_charge?>
								</td>
								<td>
									<?=$billing->total_payable?>
								</td>
								<td>
									<a href="<?=site_url('billing/status/'.$billing->id)?>">
										<button class="btn btn-default">Lihat</button>
									</a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<div class="form-group">
				<div class="col-xs-3 col-xs-offset-3">
					<button type="button" onclick="popup.open('popup_OTP')" class="form-control">Input Kode OTP</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="popup_OTP" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Input Kode OTP
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-3">
						<label>Kode OTP</label>
					</div>
					<div class="col-sm-9">
						<input class="form-control" placeholder="Masukkan Kode OTP..." />
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="button" class="btn btn-default">Kirim</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_OTP')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>