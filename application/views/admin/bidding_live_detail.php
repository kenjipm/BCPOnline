<?php

	// // Model untuk Bidding List
	// // dummy Bidding list
	// $model->biddings = new class{};
	// $model->biddings->name = "Djisamsung Galaksih";
	// $model->biddings->category = "Handphone & Tablet";
	// $model->biddings->brand = "Djisamsung";
	// $model->biddings->date_expired = "25-12-2017";
	
	// // Model untuk Daftar Customer
	// $model->customers = array();
	
	// // dummy Customer list
	// $model->customers[0] = new class{};
	// $model->customers[0]->customer_id = "CUS00004";
	// $model->customers[0]->bidding_time = "08-12-2017 17:33:01";
	// $model->customers[0]->bidding_price = "Rp 1.700.000,-";
	// $model->customers[1] = new class{};
	// $model->customers[1]->customer_id = "CUS00007";
	// $model->customers[1]->bidding_time = "07-12-2017 10:22:09";
	// $model->customers[1]->bidding_price = "Rp 1.600.000,-";
	// $model->customers[2] = new class{};
	// $model->customers[2]->customer_id = "CUS00014";
	// $model->customers[2]->bidding_time = "05-12-2017 22:42:51";
	// $model->customers[2]->bidding_price = "Rp 1.200.000,-";
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Lihat Bidding</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?=site_url('Bidding_live/choose_winner')?>" method="post">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<label class="control-label col-xs-3" for="title">Daftar Bidding Customer</label>
							<tr>
								<th> ID Customer </th>
								<th> Waktu Bidding </th>
								<th> Harga </th>
								<th> </th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach($model->biddings as $bidding)
						{
							?>
							<input type="hidden" value="<?=$bidding->posted_item_id?>" name="posted_item_id"></input>
							<input type="hidden" value="<?=$bidding->bid_price?>" name="bid_price"></input>
							<tr>
								<td>
									<?=$bidding->customer_name?></td>
								<td>
									<?=$bidding->bid_time?> </td>
								<td>
									<?=$bidding->bid_price?> </td>
								<td>
									<?php if ($bidding->bid_price == $model->max_price) { 
										$show_button_winner = true;
										} else {
										$show_button_winner = false;
										}
									?>
									<button class="btn btn-default" onclick="choose_winner(<?=$bidding->id?>)" type="button" class="button_winner"  <?php if ($show_button_winner == false){ ?> style="display:none" <?php } ?>>Pemenang</button></td>
							</tr>
							<?php
						}
						?>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>