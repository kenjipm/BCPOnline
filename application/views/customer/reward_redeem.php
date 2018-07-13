
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
