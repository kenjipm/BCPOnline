<?php
	// Model untuk customer
	
	// dummy bidding list
	$model->biddings = array();
	
	// Model dummy bidding
	$model->biddings[0] = new class{};
	$model->biddings[0]->id = 1;
	$model->biddings[0]->bid_time = "08-12-2017";
	$model->biddings[0]->posted_item = "Djisamsung";
	$model->biddings[0]->bidding_price = "Rp 1.700.000,-";
	$model->biddings[1] = new class{};
	$model->biddings[1]->id = 2;
	$model->biddings[1]->bid_time = "17-12-2017";
	$model->biddings[1]->posted_item = "Appa";
	$model->biddings[1]->bidding_price = "Rp 200.000,-";
	$model->biddings[2] = new class{};
	$model->biddings[2]->id = 3;
	$model->biddings[2]->bid_time = "22-12-2017";
	$model->biddings[2]->posted_item = "Tos Ibak";
	$model->biddings[2]->bidding_price = "Rp 1.000.000,-";
	
	
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar bidding</h3>
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-2"> <label for="bid_time">Tanggal Bid</label> </div>
				<div class="col-xs-4"> <label for="posted_item">Nama Item</label> </div>
				<div class="col-xs-4"> <label for="bidding_price">Harga</label> </div>
			</div>
			<?php
			foreach($model->biddings as $bidding)
			{
				?>
				<div class="row list-group">
					<a href="<?=site_url('bidding/bidding_detail/'.$bidding->id)?>">
						<div class="col-xs-2 list-group-item">
							<?=$bidding->bid_time?> </div>
						<div class="col-xs-4 list-group-item">
							<?=$bidding->posted_item?> </div>
						<div class="col-xs-4 list-group-item">
							<?=$bidding->bidding_price?> </div>
					</a>
				</div>
				<?php
			}
			?>
			<a class="btn btn-default" href="<?=site_url('bidding/create_bidding')?>">
				Buat Bidding
			</a>	
		</div>
	</div>
</div>
