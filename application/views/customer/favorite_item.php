<?php

	// // Model Dummy Untuk Posted Item List
	// $model->favorite_items = array();
	
	// $model->favorite_items[0] = new class{};
	// $model->favorite_items[0]->id = 1;
	// $model->favorite_items[0]->name = "Charger Samsung";
	// $model->favorite_items[0]->price = "Rp 250.000";
	// $model->favorite_items[0]->image_one_name = site_url("img/upload/user1/charger_samsung.jpg");
	// $model->favorite_items[1] = new class{};
	// $model->favorite_items[1]->id = 2;
	// $model->favorite_items[1]->name = "Charger Wireless";
	// $model->favorite_items[1]->price = "Rp 350.000";
	// $model->favorite_items[1]->image_one_name = site_url("img/upload/user1/wireless_samsung.jpg");
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
			<div class="panel-body">
				<div class="row">
					<?php
					foreach($model->favorite_items as $favorite_item)
					{
						?>
							<div class="col-md-4">
								<div class="panel panel-default">
									<a href="<?=site_url('item/'.$favorite_item->posted_item->id)?>">
										<div class="panel-body">
											<img class="col-md-12" src="<?=$favorite_item->posted_item->image_one_name?>" alt="<?=$favorite_item->posted_item->posted_item_name?>"/>
										</div>
										<div class="panel-footer">
											<label class="control-label"><?=$favorite_item->posted_item->posted_item_name?></label><br/>
											<label class="control-label"><?=$favorite_item->posted_item->price?></label>
										</div>
									</a>
								</div>
							</div>
						<?php
					}
					if (count($model->favorite_items) <= 0)
					{
						?>
						<div class="col-md-4">
							<label>Belum ada barang yang difavoritkan</label>
						</div>
						<?php
					}
					?>
				</div>
			</div>
	</div>
	
</div>