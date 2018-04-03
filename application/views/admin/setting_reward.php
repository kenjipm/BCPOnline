<?php
	// Model untuk Deliverer
	
	// dummy Deliverer id
	// $model->rewards = new class{};
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Setting Reward</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('reward/setting_reward')?>" class="form-horizontal" method="post">
				<input type="hidden" id="setting_reward_id" name="setting_reward_id" value="<?=$model->setting_reward->id?>"/>
				<div class="form-group">
					<label class="control-label col-xs-2" for="event_name">Nama Event:</label>
					<div class="col-xs-10"><input type="text" class="form-control" name="event_name" value="<?=$model->setting_reward->event_name?>"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('event_name'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="base_percent">Base Percent:</label>
					<div class="col-xs-2"><input type="text" class="form-control" name="base_percent" value="<?=$model->setting_reward->base_percent?>"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('base_percent'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="ratio_percent">Ratio Percent:</label>
					<div class="col-xs-2"><input type="text" class="form-control" name="ratio_percent" value="<?=$model->setting_reward->ratio_percent?>"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('ratio_percent'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="price_per_point">Harga Poin:</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="price_per_point" value="<?=$model->setting_reward->price_per_point?>"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('price_per_point'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="point_get">Poin Didapat:</label>
					<div class="col-xs-2"><input type="text" class="form-control" name="point_get" value="<?=$model->setting_reward->point_get?>"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('point_get'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="date_created">Berlaku Sejak:</label>
					<div class="col-xs-4"><input type="text" class="form-control datetimepicker" name="date_created" value="<?=$model->setting_reward->date_created?>" autocomplete="off"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('date_created'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="date_expired">Berlaku Hingga:</label>
					<div class="col-xs-4"><input type="text" class="form-control datetimepicker" name="date_expired" value="<?=$model->setting_reward->date_expired?>" autocomplete="off"/></div>
					<input type="checkbox" name="expire" value="forever">Selamanya
				</div>
				
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-1"><button type="submit" class="btn btn-default">Submit</button></div>
					<?php
						if ($model->is_existed)
						{
							?>
							<div class="col-xs-1"><button type="button" class="btn btn-default" onclick="popup.open('popup_approval')">Keputusan</button></div>
							<?php
							$this->load->view('admin/popup/approval');
						}
					?>
				</div>
			</form>
		</div>
	</div>
</div>
