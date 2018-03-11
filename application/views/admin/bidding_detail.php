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
			<form class="form-horizontal">
				<h4>Daftar Bidding Customer</h4>
				<div class="row list-group">
					<div class="col-sm-2 col-sm-offset-1"> <label for="customer_id">ID Customer</label> </div>
					<div class="col-sm-3"> <label for="bidding_time">Waktu Bidding</label> </div>
					<div class="col-sm-3"> <label for="bidding_price">Harga</label> </div>
				</div>
				<?php
				foreach($model->biddings as $bidding)
				{
					?>
					<div class="row list-group">
						<div class="col-sm-2  col-sm-offset-1 list-group-item">
							<?=$bidding->customer_name?> </div>
						<div class="col-sm-3 list-group-item">
							<?=$bidding->bid_time?> </div>
						<div class="col-sm-3 list-group-item">
							<?=$bidding->bid_price?> </div>
						<div class="col-sm-1">
							<a class="btn btn-default">Pemenang</a></div>
					</div>
					<?php
				}
				?>
			</form>
		</div>
	</div>
</div>