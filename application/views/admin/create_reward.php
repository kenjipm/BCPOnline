<?php
	// Model untuk Deliverer
	
	// dummy Deliverer id
	$model->rewards = new class{};
	
	$model->rewards->reward_id = "17120577702"
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Reward Baru</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-2" for="id">ID Reward:</label>
					<div class="col-xs-2">
						<input type="text" value="<?=$model->rewards->reward_id?>" class="form-control" id="id" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="reward_description">Deskripsi Reward:</label>
					<div class="col-xs-10"><input type="text" class="form-control" id="reward_description"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="date_expired">Berlaku Hingga:</label>
					<div class="col-xs-3"><input type="date" class="form-control" id="date_expired"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="points_needed">Poin Dibutuhkan:</label>
					<div class="col-xs-2"><input type="text" class="form-control" id="points_needed"></div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-11"><button type="submit" class="btn btn-default">Submit</button></div>
				</div>
			</form>
		</div>
	</div>
</div>