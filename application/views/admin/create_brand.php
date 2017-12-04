<?php
	// Model untuk Deliverer
	
	// dummy Deliverer id
	$model->brands = new class{};
	
	$model->brands->brand_id = "17120455501"
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Brand Baru</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-2" for="id">ID Brand:</label>
					<div class="col-xs-3">
						<input type="text" value="<?=$model->brands->brand_id?>" class="form-control" id="id" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="name">Nama Brand:</label>
					<div class="col-xs-10"><input type="text" class="form-control" id="name"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="license_plate">Deskripsi:</label>
					<div class="col-xs-10"><input type="text" class="form-control" id="unit_number"></div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-11"><button type="submit" class="btn btn-default">Submit</button></div>
				</div>
			</form>
		</div>
	</div>
</div>