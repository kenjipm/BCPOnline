<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title"><?=$title?></h3>
		</div>
	</div>
</div>

<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Tenant </div>
		</div>
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Jumlah </div>
		</div>
	</div>
	<?php
	foreach($model->tenants as $tenant)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth-2">
				<div class=" cb-align-center"> <?=$tenant->tenant_name?> </div>
			</div>
			<div class="cb-col-fifth-2">
				<div class="cb-align-center"> <?=$tenant->total_unpaid?> </div>
			</div>
			<div class="cb-col-fifth">
				<form action="<?=site_url('admin/tenant_to_pay_print_preview')?>" id="form_print-<?=$tenant->tenant_id?>" method="post" target="_blank">
					<input type="hidden" name="tenant_id" value="<?=$tenant->tenant_id?>"/>
					<input type="hidden" name="tnt_paid_receipt_id" id="tnt_paid_receipt_id-<?=$tenant->tenant_id?>" value=""/>
					<!--button type="submit" class="btn btn-default">Cetak Ulang</button-->
				</form>
					
				<input type="hidden" id="payment_period_start-<?=$tenant->tenant_id?>"		value="<?=$tenant->tenant_pay_receipt->payment_period_start?>"/>
				<input type="hidden" id="payment_period_end-<?=$tenant->tenant_id?>"		value="<?=$tenant->tenant_pay_receipt->payment_period_end?>"/>
				<input type="hidden" id="payment_purpose-<?=$tenant->tenant_id?>"			value="<?=$tenant->tenant_pay_receipt->payment_purpose?>"/>
					
				<button type="button" class="cb-button-form" onclick="create_tenant_pay_receipt(<?=$tenant->tenant_id?>)" id="btn-tnt_paid_receipt_id-<?=$tenant->tenant_id?>">Cetak Bukti Pembayaran</button>
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
			<h3><?=$title?></h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label>Nama</label></th>
							<th> <label>Jumlah</label></th>
							<th> <label></label></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->tenants as $tenant)
						{
							?>
							<tr>
								<td>
									<?=$tenant->tenant_name?>
								</td>
								<td>
									<?=$tenant->total_unpaid?>
								</td>
								<td>
									<form action="<?=site_url('admin/tenant_to_pay_print_preview')?>" id="form_print-<?=$tenant->tenant_id?>" method="post" target="_blank">
										<input type="hidden" name="tenant_id" value="<?=$tenant->tenant_id?>"/>
										<input type="hidden" name="tnt_paid_receipt_id" id="tnt_paid_receipt_id-<?=$tenant->tenant_id?>" value=""/>
										<!--button type="submit" class="btn btn-default">Cetak Ulang</button-->
									</form>
										
									<input type="hidden" id="payment_period_start-<?=$tenant->tenant_id?>"		value="<?=$tenant->tenant_pay_receipt->payment_period_start?>"/>
									<input type="hidden" id="payment_period_end-<?=$tenant->tenant_id?>"		value="<?=$tenant->tenant_pay_receipt->payment_period_end?>"/>
									<input type="hidden" id="payment_purpose-<?=$tenant->tenant_id?>"			value="<?=$tenant->tenant_pay_receipt->payment_purpose?>"/>
										
									<button type="button" class="cb-button-form" onclick="create_tenant_pay_receipt(<?=$tenant->tenant_id?>)">Cetak Bukti Pembayaran</button>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>

*/ ?>