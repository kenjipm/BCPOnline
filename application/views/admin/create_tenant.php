<?php
	// Model untuk Tenant
	
	// dummy tenant id
	$model->tenants = new class{};
	
	$model->tenants->tenant_id = "17120488801"
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Tenant Baru</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama Tenant:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="name"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="unit_number">Nomor Unit:</label>
					<div class="col-xs-2"><input type="text" class="form-control" id="unit_number"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="floor">Lantai:</label>
					<div class="col-xs-1"><input type="text" class="form-control" id="floor"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="selling_category">Kategori Penjualan:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="selling_category"></div>
				</div>
				
				<div class="form-group">
					<div class="col-xs-offset-11"><button type="submit" class="btn btn-default">Submit</button></div>
				</div>
			</form>
		</div>
	</div>
</div>