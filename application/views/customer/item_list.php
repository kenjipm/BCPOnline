<?php
	// Model untuk Item
	
	// dummy item
	$model->items = array();
	
	$model->items[0] = new class{};
	$model->items[0]->item_id = 1;
	$model->items[0]->item_name = "Handphone";
	$model->items[0]->item_type = "Order";
	$model->items[1] = new class{};
	$model->items[1]->item_id = 2;
	$model->items[1]->item_name = "Laptop";
	$model->items[1]->item_type = "Repair";
	
	
?>

<h1><?=$echo?></h1>
<div class="container">
	<div class="row">
	<?php
	foreach($model->items as $item)
	{
		?>
		<div class="col-xs-4">
			<div class="thumbnail">
				<a href="<?=site_url('item/'.$item->item_id)?>">
					<img src="<?=site_url('img/favicon.gif')?>" alt="Image1" style="width:50%">
					<div class="caption text-center">
						<p><?=$item->item_name?></p>
						<p><?=$item->item_type?></p>
					</div>
				</a>
			</div>
		</div>
		<?php
	}
	?>
	</div>
	
</div>