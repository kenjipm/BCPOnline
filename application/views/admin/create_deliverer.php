<?php
	// Model untuk Deliverer
	
	// dummy Deliverer id
	$model->deliverers = new class{};
	
	$model->deliverers->deliverer_id = "17120455501"
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Deliverer Baru</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="id">ID Deliverer:</label>
					<div class="col-xs-3">
						<input type="text" value="<?=$model->deliverers->deliverer_id?>" class="form-control" id="id" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama Deliverer:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="name"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="license_plate">Nomor Plat:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="unit_number"></div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-11"><button type="submit" class="btn btn-default">Submit</button></div>
				</div>
			</form>
		</div>
	</div>
</div>