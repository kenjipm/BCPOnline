<?php

	// Model Dummy Untuk Posted Item List
	// $model->rewards = array();
	
	// $model->rewards[0] = new class{};
	// $model->rewards[0]->id = 1;
	// $model->rewards[0]->name = "Voucher Tri 10GB";
	// $model->rewards[0]->date_added = "1 Dec 2017";
	// $model->rewards[0]->points_needed = "250";
	// $model->rewards[0]->reward_description = "Voucher internet Tri 10GB (Kuota Reguler)";
	// $model->rewards[0]->is_claimable = true;
	// $model->rewards[1] = new class{};
	// $model->rewards[1]->id = 2;
	// $model->rewards[1]->name = "Power Bank Sony";
	// $model->rewards[1]->date_added = "1 Dec 2017";
	// $model->rewards[1]->points_needed = "2.000";
	// $model->rewards[1]->reward_description = "Power Bank Sony 5000mAh (1.5A)";
	// $model->rewards[1]->is_claimable = false;
	// $model->rewards[2] = new class{};
	// $model->rewards[2]->id = 3;
	// $model->rewards[2]->name = "Samsung Galaxy J7";
	// $model->rewards[2]->date_added = "2 Dec 2017";
	// $model->rewards[2]->points_needed = "19.000";
	// $model->rewards[2]->reward_description = "Handphone Samsung Galaxy J7 2017";
	// $model->rewards[2]->is_claimable = false;
	
	// // dummy data reward point customer
	// $model->reward_points = "1.950";
?>

<div class="col-sm-12">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
		<div class="panel-body">
			<h4>Poin kamu saat ini: <?=$model->reward_points?></h4>
			<a class="btn btn-default" href="redeem_reward">Lihat Reward yang Sudah Diklaim</a>
			<?php
			foreach($model->rewards as $reward)
			{
				?>
					<form id="reward-<?=$reward->id?>" method="post" action="<?=site_url('customer/redeem_reward_do')?>">
						<input type="hidden" name="reward_id" value="<?=$reward->id?>"/>
						<div class="panel panel-default">
							<div class="panel-body">
								<div class="col-md-9">
									<div class="row">
										<label><?=$reward->name?></label>
									</div>
									<div class="row">
										<?=$reward->reward_description?>
									</div>
								</div>
								<div class="col-md-2">
									<?=$reward->points_needed?> Poin
								</div>
								<div class="col-md-1">
									<button type="button" class="btn btn-default" <?=$reward->is_claimable?"":"disabled='disabled'"?> onclick="redeem_reward(<?=$reward->id?>, <?=$reward->points_needed?>)">Redeem</button>
								</div>
							</div>
						</div>
					</form>
				<?php
			}
			?>
		</div>
	</div>
</div>