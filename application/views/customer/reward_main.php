
<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<h2 class="cb-align-center">Informasi Poin</h2>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<h4 class="cb-txt-primary-1 cb-font-title cb-p-5">Poin kamu saat ini: <?=$model->reward_points?></h4>
	</div>
	<div class="cb-row cb-pb-5">
		<a class="cb-button-form" href="redeem_reward">Lihat Reward yang Sudah Diklaim</a>
	</div>
</div>

<div class="cb-row cb-pb-5">
	<h2 class="cb-col-full cb-txt-primary-1 cb-font-title cb-p-5 cb-align-center">Daftar Reward</h2></a>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">	
	<div class="cb-row cb-pt-5">
		<div class="cb-col-fifth-3">
			<div class="cb-label cb-font-title cb-align-center"> Reward </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Poin yang Dibutuhkan </div>
		</div>
	</div>
	<?php
	foreach($model->rewards as $reward)
	{
		?>
			<form id="reward-<?=$reward->id?>" method="post" action="<?=site_url('customer/redeem_reward_do')?>">
				<input type="hidden" name="reward_id" value="<?=$reward->id?>"/>
				<div class="cb-row cb-border-top cb-p-5">
					<div class="cb-col-fifth-3">
						<div class="cb-align-center"> <?=$reward->reward_description?> </div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center"> <?=$reward->points_needed?> </div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center"> 
							<button type="button" class="cb-button-form" <?=$reward->is_claimable?"":"disabled='disabled'"?> onclick="redeem_reward(<?=$reward->id?>, '<?=$reward->points_needed?>')">Redeem</button>
						</div>
					</div>
				</div>
			</form>
		<?php
	}
	?>
</div>
