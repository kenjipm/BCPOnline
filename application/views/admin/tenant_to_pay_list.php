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
										
									<button type="button" class="btn btn-default" onclick="create_tenant_pay_receipt(<?=$tenant->tenant_id?>)">Cetak Bukti Pembayaran</button>
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