
<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">DAFTAR BILLING CUSTOMER</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Dibuat </div>
		</div>
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Customer </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Harga yang Belum Dibayar </div>
		</div>
	</div>
	<?php
	foreach($model->billings as $billing)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$billing->date_created?> </div>
			</div>
			<div class="cb-col-fifth-2">
				<div class="cb-align-center"> <?=$billing->customer?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$billing->total_payable?> </div>
			</div>
			<div class="cb-col-fifth">
				<a href="<?=site_url('billing/detail/'.$billing->id)?>">
					<button class="cb-button-form">LIHAT</button>
				</a>
			</div>
		</div>
		<?php
	}
	?>
</div>

<?php /*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Billing</h3>
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-3"> <label for="tanggal1">Dibuat</label>	</div>
				<div class="col-xs-3"> <label for="customer">Customer</label> </div>
				<div class="col-xs-2"> <label for="total_payable">Harga yang Belum Dibayar</label> </div>
			</div>
			<?php
			foreach($model->billings as $billing)
			{
				?>
				<div class="row list-group">
					<div class="col-xs-3 list-group-item">
						<?=$billing->date_created?> </div>
					<div class="col-xs-3 list-group-item">
						<?=$billing->customer?> </div>
					<div class="col-xs-2 list-group-item">
						<?=$billing->total_payable?> </div>
					<div class="col-xs-1">
						<a href="<?=site_url('billing/detail/'.$billing->id)?>">
							<button class="btn btn-default">Lihat</button>
						</a></div>	
						
				</div>
				<?php
			}
			?>
		</div>
	</div>
</div>

*/ ?>