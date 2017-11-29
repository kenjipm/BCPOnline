<?php
	// Model untuk dashboard_main
	
	// dummy posted items
	$model->item = new class{};
	$model->item->id = 1;
	$model->item->name = "Charger Samsung";
	$model->item->price = "Rp 250.000";
	$model->item->description = "Charger Samsung Original - Fast Charging (1.5 - 2.0 A)";
	$model->item->image_one_name = site_url("img/upload/user1/charger_samsung.jpg");
?>

<div class="row">

	<div class="col-md-9">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><?=$model->item->name?></h3>
			</div>
			<div class="panel-body">
				<div class="col-md-4">
					<img src="<?=$model->item->image_one_name?>" alt="<?=$model->item->name?>"/>
				</div>
				<div class="col-md-8">
					<h4>Deskripsi Produk</h4>
					<?=$model->item->description?>
				</div>
				<h4></h4>
			</div>
		</div>
	</div>
	
	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-body text-center">
				<h3><?=$model->item->price?></h3>
				<a href="#" class="btn btn-default col-md-12">Beli</a>
				<a href="#" class="btn btn-default col-md-12">Tambah Ke Favorit</a>
			</div>
		</div>
	</div>
	
</div>