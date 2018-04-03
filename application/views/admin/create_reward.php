<?php
	// Model untuk Deliverer
	
	// dummy Deliverer id
	$model->rewards = new class{};
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Reward Baru</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('reward/create_reward')?>" class="form-horizontal" method="post">
				<div class="form-group">
					<label class="control-label col-xs-2" for="reward_description">Deskripsi Reward:</label>
					<div class="col-xs-10"><input type="text" class="form-control" name="reward_description"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('reward_description'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="date_expired">Berlaku Hingga:</label>
					<div class="col-xs-3"><input type="text" class="form-control datepicker" name="date_expired"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('date_expired'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="points_needed">Poin Dibutuhkan:</label>
					<div class="col-xs-2"><input type="text" class="form-control" name="points_needed"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('points_needed'); ?></span>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-11"><button type="submit" class="btn btn-default">Submit</button></div>
				</div>
			</form>
		</div>
	</div>
</div>