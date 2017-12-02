<?php

	// Model Dummy Untuk Posted Item List
	$model->fav_items = array();
	
	$model->fav_items[0] = new class{};
	$model->fav_items[0]->id = 1;
	$model->fav_items[0]->name = "Charger Samsung";
	$model->fav_items[0]->price = "Rp 250.000";
	$model->fav_items[0]->image_one_name = site_url("img/upload/user1/charger_samsung.jpg");
	$model->fav_items[1] = new class{};
	$model->fav_items[1]->id = 2;
	$model->fav_items[1]->name = "Charger Wireless";
	$model->fav_items[1]->price = "Rp 350.000";
	$model->fav_items[1]->image_one_name = site_url("img/upload/user1/wireless_samsung.jpg");
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
			<div class="panel-body">
				<div class="row">
					<?php
					foreach($model->fav_items as $fav_item)
					{
						?>
							<div class="col-md-4">
								<div class="panel panel-default">
									<a href="<?=site_url('item/'.$fav_item->id)?>">
										<div class="panel-body">
											<img class="col-md-12" src="<?=$fav_item->image_one_name?>" alt="<?=$fav_item->name?>"/>
										</div>
										<div class="panel-footer">
											<label class="control-label"><?=$fav_item->name?></label><br/>
											<label class="control-label"><?=$fav_item->price?></label>
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