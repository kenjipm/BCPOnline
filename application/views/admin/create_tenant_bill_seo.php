<?php

?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Tagihan Tenant</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('admin/create_tenant_bill_seo/'. $model->tenant_bill->id)?>" class="form-horizontal" method="post">	
				<div class="form-group">
					<label class="control-label col-sm-3">Tenant:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="tenant_name" value="<?=$model->tenant_bill->tenant_name?>" readonly/>
						<input type="hidden" name="tenant_id" value="<?=$model->tenant_bill->tenant_id?>" readonly/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Barang:</label>
					<div class="col-sm-9">
						<input type="text" class="form-control" name="posted_item_name" value="<?=$model->tenant_bill->posted_item_name?>" readonly/>
						<input type="hidden" name="posted_item_id" value="<?=$model->tenant_bill->posted_item_id?>" readonly/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Harga:</label>
					<div class="col-sm-3">
						<input type="text" class="form-control" name="payment_value">
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('payment_value'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-3">Berlaku Hingga:</label>
					<div class="col-sm-4">
						<input type="date" class="form-control" name="payment_expiration">
					</div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('payment_expiration'); ?></span>
				</div>
				<div class="form-group">
					<div class="col-sm-7">
						<button type="submit" class="btn btn-default">Kirim</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>