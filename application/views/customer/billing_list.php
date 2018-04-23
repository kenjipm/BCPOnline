<div class="cb-txt-primary-1 cb-pl-5 cb-align-center cb-font-title">
	<h2><?=$title?></h2>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<div class="cb-row cb-pb-3">
				<div class="cb-col-fifth">
					<div class="cb-label cb-align-center">Tanggal</div>
				</div>
				<div class="cb-col-fifth-4">
					<div class="cb-label cb-align-center">Alamat</div>
				</div>
			</div>
		</div>
		<div class="cb-col-half">
			<div class="cb-row">
				<div class="cb-col-fifth-2">
					<div class="cb-label cb-align-center">Ongkos Kirim</div>
				</div>
				<div class="cb-col-fifth-2">
					<div class="cb-label cb-align-center">Total Harga</div>
				</div>
				<div class="cb-col-fifth">
					
				</div>
			</div>
		</div>
	</div>
	<?php
	foreach($model->billings as $billing)
	{
		?>
		<div class="cb-row cb-border-top cb-p-3 cb-table-striped">
			<div class="cb-col-half">
				<div class="cb-row">
					<div class="cb-col-fifth">
						<div class="cb-align-center"><?=$billing->date_created?></div>
					</div>
					<div class="cb-col-fifth-4">
						<div class="cb-align-center"><?=$billing->address?></div>
					</div>
				</div>
			</div>
			<div class="cb-col-half">
				<div class="cb-row">
					<div class="cb-col-fifth-2">
						<div class="cb-align-center"><?=$billing->shipping_charge?></div>
					</div>
					<div class="cb-col-fifth-2">
						<div class="cb-align-center"><?=$billing->total_payable?></div>
					</div>
					<div class="cb-col-fifth">
						<a href="<?=site_url('billing/status/'.$billing->id)?>" class="cb-row cb-col-full">
							<button class="cb-button-form cb-col-full">LIHAT</button>
						</a>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>
<!--
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
-->

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