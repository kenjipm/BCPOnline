<?php

	// // Model Dummy Untuk Posted Item List
	// $model->fav_items = array();
	
	// $model->followed_tenants[0] = new class{};
	// $model->followed_tenants[0]->id = 1;
	// $model->followed_tenants[0]->name = "MegaComp";
	// $model->followed_tenants[0]->date_followed = "20 Nov 17";
	// $model->followed_tenants[0]->image_one_name = site_url("img/tenant.jpg");
	// $model->followed_tenants[1] = new class{};
	// $model->followed_tenants[1]->id = 2;
	// $model->followed_tenants[1]->name = "KLIKnKLIK";
	// $model->followed_tenants[1]->date_followed = "29 Nov 17";
	// $model->followed_tenants[1]->image_one_name = site_url("img/tenant.jpg");
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
			<div class="panel-body">
				<div class="row">
					<?php
					foreach($model->followed_tenants as $followed_tenant)
					{
						?>
							<div class="col-md-4">
								<div class="panel panel-default">
									<a href="<?=site_url('tenant/profile/'.$followed_tenant->tenant->id)?>">
										<div class="panel-body">
											<img class="col-md-12" src="<?=$followed_tenant->tenant->account->profile_pic?>" alt="<?=$followed_tenant->tenant->tenant_name?>"/>
										</div>
										<div class="panel-footer">
											<label class="control-label"><?=$followed_tenant->tenant->tenant_name?></label><br/>
											<label class="control-label">Diikuti sejak: <?=$followed_tenant->date_followed?></label>
										</div>
									</a>
								</div>
							</div>
						<?php
					}
					?>
				</div>
			</div>
	</div>
	
</div>