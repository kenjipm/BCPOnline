<?php
	// Model untuk Page Redeem Reward
	
	// dummy data redeem
	$model->redeem_rewards = array();
	
	$model->redeem_rewards[0] = new class{};
	$model->redeem_rewards[0]->id = 2;
	$model->redeem_rewards[0]->redeem_id = "FA98-02R3";
	$model->redeem_rewards[0]->date_redeemed = "2 Dec 2017";
	$model->redeem_rewards[0]->status = "Belum Diambil";
	$model->redeem_rewards[0]->reward = new class{};
	$model->redeem_rewards[0]->reward->name = "Voucher Tri 10GB";
	$model->redeem_rewards[0]->reward->date_added = "1 Dec 2017";
	$model->redeem_rewards[0]->reward->points_needed = "250";
	$model->redeem_rewards[0]->reward->reward_description = "Voucher internet Tri 10GB (Kuota Reguler)";
	
	$model->redeem_rewards[1] = new class{};
	$model->redeem_rewards[1]->id = 1;
	$model->redeem_rewards[1]->redeem_id = "QRC9-M8PP";
	$model->redeem_rewards[1]->date_redeemed = "1 Dec 2017";
	$model->redeem_rewards[1]->status = "Sudah Diambil";
	$model->redeem_rewards[1]->reward = new class{};
	$model->redeem_rewards[1]->reward->name = "Power Bank Sony";
	$model->redeem_rewards[1]->reward->date_added = "1 Dec 2017";
	$model->redeem_rewards[1]->reward->points_needed = "2.000";
	$model->redeem_rewards[1]->reward->reward_description = "Power Bank Sony 5000mAh (1.5A)";
	
	// dummy data reward point customer
	$model->reward_points = "1.700";
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
		<div class="panel-body">
			<h4>Poin kamu saat ini: <?=$model->reward_points?></h4>
			<?php
			foreach($model->redeem_rewards as $redeem_reward)
			{
				?>
					<div class="panel panel-default">
						<div class="panel-body">
							<div class="col-md-7">
								<div class="row">
									<label><?=$redeem_reward->reward->name?></label>
								</div>
								<div class="row">
									<?=$redeem_reward->reward->reward_description?>
								</div>
							</div>
							<div class="col-md-2">
								<?=$redeem_reward->reward->points_needed?> Poin
							</div>
							<div class="col-md-3">
								<div class="panel panel-default">
									<div class="panel-body">
										<div class="row">
											<div class="col-xs-12">
												<label><?=$redeem_reward->status?></label>
											</div>
											<div class="col-xs-12">
												Kode: <?=$redeem_reward->redeem_id?>
											</div>
											<div class="col-xs-12">
												<?=$redeem_reward->date_redeemed?>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<?php
			}
			?>
		</div>
	</div>
</div>
