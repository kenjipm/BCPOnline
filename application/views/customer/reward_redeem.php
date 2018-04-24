
<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<h2 class="cb-align-center">HISTORI PENUKARAN POIN</h2>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Tanggal </div>
		</div>
		<div class="cb-col-fifth-3">
			<div class="cb-label cb-font-title cb-align-center"> Reward </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Poin yang Ditukarkan </div>
		</div>
	</div>
	<?php
	foreach($model->redeem_rewards as $redeem_reward)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top">
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$redeem_reward->date_redeemed?> </div>
			</div>
			<div class="cb-col-fifth-3">
				<div class="cb-align-center"> <?=$redeem_reward->reward->reward_description?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$redeem_reward->reward->points_needed?> </div>
			</div>
		</div>
		<?php
	}
	?>
</div>

<!--
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
							<div class="col-md-2">
								<div class="row">
									<label><?=$redeem_reward->date_redeemed?></label>
								</div>
							</div>
							<div class="col-md-5">
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
												<?=$redeem_reward->reward->date_expired?>
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
-->