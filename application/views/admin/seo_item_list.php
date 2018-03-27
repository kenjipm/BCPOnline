<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>SEO Item Request</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label>Nama Tenant</label></th>
							<th> <label>Barang</label></th>
							<th> <label>Harga</label></th>
							<th> <label></label></th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach($model->tenant_bill_list as $tenant_bill)
						{
							?>
							<!-- <div class="form-group" style="display:none">
								<input type="text" class="form-control" name="order_id[]" value="<?=$order->id?>" readonly/>
							</div>
							<div class="form-group" style="display:none">
								<input type="text" class="form-control" name="tenant_id[]" value="<?=$order->tenant_id?>" readonly/>
							</div>
							<div class="form-group" style="display:none">
								<input type="text" class="form-control" name="customer_id[]" value="<?=$order->customer_id?>" readonly/>
							</div>
							<div class="form-group" style="display:none">
								<input type="text" class="form-control" name="item_type[]" value="<?=$order->item_type?>" readonly/>
							</div>
							-->
							<tr>
								<td><?=$tenant_bill->tenant_name?></td>
								<td><?=$tenant_bill->posted_item_name?></td>
								<td><?=$tenant_bill->payment_value?></td>
								<td><a href="<?=site_url('Admin/create_tenant_bill_seo/'.$tenant_bill->id)?>" class="btn btn-default">Buat Billing Tenant</a> </td>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>