<?php
	// Model untuk redeem
	
	// dummy reward list
	$model->rewards = array();
	
	// Model dummy reward
	$model->rewards[0] = new class{};
	$model->rewards[0]->id = 1;
	$model->rewards[0]->reward_id = "17120377701";
	$model->rewards[0]->date_added = "03-12-2017";
	$model->rewards[0]->date_expired = "04-01-2018";
	$model->rewards[0]->points_needed = "20";
	$model->rewards[0]->reward_description = "Mouse Lojiteq";
	$model->rewards[1] = new class{};
	$model->rewards[1]->id = 2;
	$model->rewards[1]->reward_id = "17120877702";
	$model->rewards[1]->date_added = "08-12-2017";
	$model->rewards[1]->date_expired = "01-01-2018";
	$model->rewards[1]->points_needed = "100";
	$model->rewards[1]->reward_description = "Keyboard Rejer";
	$model->rewards[2] = new class{};
	$model->rewards[2]->id = 3;
	$model->rewards[2]->reward_id = "17120577709";
	$model->rewards[2]->date_added = "05-12-2017";
	$model->rewards[2]->date_expired = "04-02-2018";
	$model->rewards[2]->points_needed = "200";
	$model->rewards[2]->reward_description = "Handphone Pipo";
	
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
			<div class="row list-group">
				<div class="col-xs-2"> <label for="reward_id">ID</label>	</div>
				<div class="col-xs-5"> <label for="reward_description">Deskripsi</label>	</div>
				<div class="col-xs-3"> <label for="reward_date">Tanggal Berlaku</label> </div>
				<div class="col-xs-2"> <label for="points_needed">Poin Dibutuhkan</label> </div>
			</div>
			<?php
			foreach($model->rewards as $reward)
			{
				?>
				<div class="row list-group">
					<a onclick="popup.open('popup_reward_detail')">
						<div class="col-xs-2 list-group-item">
							<?=$reward->reward_id?> </div>
						<div class="col-xs-5 list-group-item">
							<?=$reward->reward_description?> </div>
						<div class="col-xs-3 list-group-item">
							<?=$reward->date_added?> s/d <?=$reward->date_expired?></div>
						<div class="col-xs-2 list-group-item">
							<?=$reward->points_needed?> </div>
					</a>
				</div>
				<?php
			}
			?>
			<a class="btn btn-default" href="<?=site_url('reward/create_reward')?>">
				Buat Reward
			</a>	
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
						<label>ID Reward:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->rewards[0]->reward_id?>" class="form-control" id="id" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Deskripsi:</label>
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