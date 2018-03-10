<?php
	// Model untuk customer
	
	// // dummy bidding list
	// $model->biddings = array();
	
	// // Model dummy bidding
	// $model->biddings[0] = new class{};
	// $model->biddings[0]->id = 1;
	// $model->biddings[0]->bid_time = "08-12-2017";
	// $model->biddings[0]->posted_item = "Djisamsung";
	// $model->biddings[0]->bidding_price = "Rp 1.700.000,-";
	// $model->biddings[1] = new class{};
	// $model->biddings[1]->id = 2;
	// $model->biddings[1]->bid_time = "17-12-2017";
	// $model->biddings[1]->posted_item = "Appa";
	// $model->biddings[1]->bidding_price = "Rp 200.000,-";
	// $model->biddings[2] = new class{};
	// $model->biddings[2]->id = 3;
	// $model->biddings[2]->bid_time = "22-12-2017";
	// $model->biddings[2]->posted_item = "Tos Ibak";
	// $model->biddings[2]->bidding_price = "Rp 1.000.000,-";
	
	
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar bidding</h3>
		</div>
		<div class="panel-body">
			<?php
			$i = 0;
			foreach($model->items as $posted_item)
			{
				if ($i%3 == 0)
				{
				?>
				<div class="row">
				<?php
				}
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
				if ($i%3 == 2)
				{
				?>
				</div>
				<?php
				}
				$i++;
			}
			?>
			<a class="btn btn-default" href="<?=site_url('bidding/create_bidding')?>">
				Buat Bidding
			</a>
		</div>
	</div>
</div>
