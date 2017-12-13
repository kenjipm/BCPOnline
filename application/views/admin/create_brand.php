<?php
	// Model untuk Deliverer
	
	// dummy Deliverer id
	$model->brands = new class{};
	
	$model->brands->brand_id = "17120455501";
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Brand Baru</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('brand/create_brand')?>" class="form-horizontal" method="post">
				<div class="form-group">
					<label class="control-label col-xs-2" for="name">Nama Brand:</label>
					<div class="col-xs-10"><input type="text" class="form-control" name="brand_name"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('brand_name'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="license_plate">Deskripsi:</label>
					<div class="col-xs-10"><input type="text" class="form-control" name="brand_description"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('brand_description'); ?></span>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-11"><button type="submit" class="btn btn-default">Submit</button></div>
				</div>
			</form>
		</div>
	</div>
</div>