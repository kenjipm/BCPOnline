<div class="cb-row cb-p-5">
	<div class="cb-col-full cb-txt-primary-1 cb-align-left cb-font-title cb-font-size-xl">
		DAFTAR BARANG
	</div>
	<div class="cb-col-full cb-row cb-panel-body cb-bg-primary-3 cb-p-5">
	<?php
	if ($model->transaction_detail->item_type == "ORDER")
	{
		?>
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Nama Barang</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-pl-3">
				<input type="text" class="cb-row cb-col-full cb-input-text" id="item_name" value="<?=$model->repair_list[0]->otp?>" readonly>
			</div>
		</div>
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Deliverer</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-pl-3">
				<input type="text" class="cb-row cb-col-full cb-input-text" id="deliverer_name" value="<?=$model->repair_list[0]->deliverer_name?>" readonly>
			</div>
		</div>
		<?php
		foreach($model->repair_list as $repair)
		{
			?>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth-4 cb-pl-3">
					<?=$repair->posted_item_description?> </div>
				<div class="cb-col-fifth cb-pl-3">
					<a class="cb-button-form" href="<?=site_url('Order/transaction_detail/'.$repair->id)?>">
						Lihat
					</a>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>

<?php /*
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

*/ ?>
