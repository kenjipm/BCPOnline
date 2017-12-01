<?php

	// Model Dummy Untuk Posted Item List
	$model->fav_items = array();
	
	$model->fav_items[0] = new class{};
	$model->fav_items[0]->id = 1;
	$model->fav_items[0]->name = "Djisamsung Galaksih";
	$model->fav_items[0]->type = "Order";
	$model->fav_items[1] = new class{};
	$model->fav_items[1]->id = 2;
	$model->fav_items[1]->name = "Si Yaoming Handphone";
	$model->fav_items[1]->type = "Bid";
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Item Favorit</h3>
		</div>
		<div class="panel-body">
			<?php
			foreach($model->fav_items as $fav_item)
			{
				?>
				<div class="col-xs-4">
					<div class="thumbnail">
						<a href="<?=site_url('Item/post_item_detail/'.$fav_item->id)?>">
							<img src="<?=site_url('img/favicon.gif')?>" alt="Image" style="width:50%">
							<div class="caption text-center">
								<p><?=$fav_item->name?></p>
								<p><?=$fav_item->type?></p>
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