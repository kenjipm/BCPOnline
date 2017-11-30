<?php
	// Model untuk Bill
	
	// dummy billing list
	$model->bills = array();
	
	$model->bills[0] = new class{};
	$model->bills[0]->id = 1;
	$model->bills[0]->date_created = "03-12-2017";
	$model->bills[0]->date_closed = "07-12-2017";
	$model->bills[0]->customer = "Billy";
	$model->bills[0]->address = "Jalan Moh. Toha no 194";
	$model->bills[1] = new class{};
	$model->bills[1]->id = 2;
	$model->bills[1]->date_created = "05-12-2017";
	$model->bills[1]->date_closed = "08-12-2017";
	$model->bills[1]->customer = "Willy";
	$model->bills[1]->address = "Jalan Soekarno Hatta no 22";
	$model->bills[2] = new class{};
	$model->bills[2]->id = 3;
	$model->bills[2]->date_created = "08-12-2017";
	$model->bills[2]->date_closed = "09-12-2017";
	$model->bills[2]->customer = "Christo";
	$model->bills[2]->address = "Jalan Pajajaran no 14";
	
?>

<h1><?=$echo?></h1>
<div class="container">
	<div class="row list-group">
		<div class="col-xs-2"> <label for="tanggal">Tanggal</label>	</div>
		<div class="col-xs-3"> <label for="customer">Customer</label> </div>
		<div class="col-xs-4"> <label for="address">Alamat</label> </div>	
	</div>
	<?php
	foreach($model->bills as $bill)
	{
		?>
		<div class="row list-group">
			<div class="col-xs-2 list-group-item">
				<label for="tanggal"><?=$bill->date_created?></label> </div>
			<div class="col-xs-3 list-group-item">
				<label for="customer"><?=$bill->customer?></label> </div>
			<div class="col-xs-4 list-group-item">
				<label for="address"><?=$bill->address?></label> </div>
			<div class="col-xs-3">
				<a href="<?=site_url('billing/'.$bill->id)?>">
					<button class="btn btn-default">Lihat</button>
				</a></div>	
				
		</div>
		<?php
	}
	?>
	
</div>