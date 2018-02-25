<?php
	// Model dummy redeem Redeem Reward
	$model->redeems = array();
	
	// Model dummy reward
	$model->redeems[0] = new class{};
	$model->redeems[0]->id = 1;
	$model->redeems[0]->customer_id = "CU-0005";
	$model->redeems[0]->date_redeemed = "03-12-2017";
	$model->redeems[0]->status = "Not Taken";
	$model->redeems[1] = new class{};
	$model->redeems[1]->id = 2;
	$model->redeems[1]->customer_id = "CU-0012";
	$model->redeems[1]->date_redeemed = "01-12-2017";
	$model->redeems[1]->status = "Taken";
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Reward</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="reward_description">Reward</label></th>
							<th> <label for="points_needed">Poin Dibutuhkan</label></th>
							<th> <label for="reward_date">Tanggal Berlaku</label></th>	
							<th> </th>	
							<!--<th> </th>
							<th> </th> -->
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->rewards as $reward)
						{
							?>
							<tr>
								<td>
									<?=$reward->reward_description?> </td>
								<td>
									<?=$reward->points_needed?> </td>
								<td>
									<?=$reward->date_added?> s/d <?=$reward->date_expired?></td>
								<td>
									<button class="btn btn-default" onclick="popup.open('popup_reward_detail')">Lihat</button>
									</td>
								</a>
							</tr>
							<?php
						}
						?>	
					</tbody>
				</table>
				<a class="btn btn-default" href="<?=site_url('reward/create_reward')?>">
					Buat Reward
				</a>
				<a class="btn btn-default" href="<?=site_url('reward/setting_reward')?>">
					Setting Reward
				</a>
				<a class="btn btn-default" onclick="popup.open('popup_setting_reward')">
					Lihat Setting Reward
				</a>
			</div>
		</div>
	</div>
</div>

<div id="popup_setting_reward" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Setting Reward
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-2">
						<label>Event:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->setting_reward->event_name?>" class="form-control" id="event_name" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Base / Ratio Percent:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->setting_reward->base_percent?> / <?=$model->setting_reward->ratio_percent?>" class="form-control" id="percent" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Setting Poin:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->setting_reward->price_per_point?> rupiah per <?=$model->setting_reward->point_get?> poin" class="form-control" id="points_needed" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Berlaku:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->setting_reward->date_created?> s/d <?=$model->setting_reward->date_expired?>" class="form-control" id="points_needed" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-7 col-sm-offset-5">
						<button type="button" class="btn btn-default" onclick="popup.close('popup_setting_reward')">Tutup</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup_reward_detail" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Detil Reward
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-2">
						<label>Reward:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->rewards[0]->reward_description?>" class="form-control" id="reward_description" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Tanggal Berlaku:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->rewards[0]->date_added?> s/d <?=$model->rewards[0]->date_expired?>" class="form-control" id="date" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Poin Dibutuhkan:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->rewards[0]->points_needed?>" class="form-control" id="points_needed" readonly>
					</div>
				</div>
			</form>
		</div>
		
		<div class="panel-heading">
			Daftar Customer Redeem
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-3"> <label for="redeem_id">ID</label> </div>
				<div class="col-xs-6"> <label for="date_redeemed">Tanggal Redeem</label> </div>
			</div>
			<?php
			foreach($model->redeems as $redeem)
			{
				?>
				<div class="row list-group">
					<div class="col-xs-3 list-group-item">
						<?=$redeem->customer_id?> </div>
					<div class="col-xs-6 list-group-item">
						<?=$redeem->date_redeemed?> </div>
					<?php
						if ($redeem->status == "Taken"){
							$show_div_redeem = false;
							$show_div_redeemed = true;
						} else {
							$show_div_redeem = true;
							$show_div_redeemed = false;
						}
					?>
					<div class="col-xs-3" id="verify" <?php if ($show_div_redeem == false){?> style="display:none"<?php } ?>>
						<button type="button" class="btn btn-default">Beri Reward</button>
					</div>	
					<div class="col-xs-3" id="verify" <?php if ($show_div_redeemed == false){?> style="display:none"<?php } ?>>
						<button type="button" class="btn btn-default" disabled="disabled">Sudah Diberi</button>
					</div>	
				</div>
				<?php
			}
			?>
			<div class="form-group">
				<div class="col-sm-7 col-sm-offset-5">
					<button type="button" class="btn btn-default" onclick="popup.close('popup_reward_detail')">Tutup</button>
				</div>
			</div>
		</div>
	</div>
</div>