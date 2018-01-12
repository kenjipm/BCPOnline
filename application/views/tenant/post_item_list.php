<?php

	// Model Dummy Untuk Posted Item List
	/*$model->posted_items = array();
	
	$model->posted_items[0] = new class{};
	$model->posted_items[0]->id = 1;
	$model->posted_items[0]->name = "Djisamsung Galaksih";
	$model->posted_items[0]->type = "Order";
	$model->posted_items[1] = new class{};
	$model->posted_items[1]->id = 2;
	$model->posted_items[1]->name = "Si Yaoming Handphone";
	$model->posted_items[1]->type = "Repair";
	$model->posted_items[2] = new class{};
	$model->posted_items[2]->id = 3;
	$model->posted_items[2]->name = "Snsv Laptop";
	$model->posted_items[2]->type = "Bid";
	$model->posted_items[3] = new class{};
	$model->posted_items[3]->id = 4;
	$model->posted_items[3]->name = "Tos Ibak TV";
	$model->posted_items[3]->type = "Order";
	*/
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Item</h3>
		</div>
		<div class="panel-body">
			<?php
			foreach($model->posted_items as $posted_item)
			{
				?>
				<div class="col-xs-4">
					<div class="thumbnail">
						<a href="<?=site_url('Item/post_item_detail/'.$posted_item->id)?>">
							<img src="<?=$posted_item->image_one_name?>" alt="<?=$posted_item->posted_item_name?>" style="width:50%">
							<div class="caption text-center">
								<p><?=$posted_item->posted_item_name?></p>
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