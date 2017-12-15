<?php
	// Model untuk dashboard_main
	
	// dummy tenant profile
	$model->tenant = new class{};
	$model->tenant->id = 1;
	$model->tenant->tenant_name = "Djisamsung";
	$model->tenant->unit_number = "344S";
	$model->tenant->floor = "LG";
	
	$model->tenant->account = new class{};
	$model->tenant->account->profile_pic = site_url("img/favicon.gif");
	
	$model->posted_item = array();
	$model->posted_item[0] = new class{};
	$model->posted_item[0]->id = 1;
	$model->posted_item[0]->posted_item_name = "Handphone Djisamsung";
	$model->posted_item[0]->price = "Rp 3.450.000";
	$model->posted_item[1] = new class{};
	$model->posted_item[1]->id = 2;
	$model->posted_item[1]->posted_item_name = "Tablet Djisamsung";
	$model->posted_item[1]->price = "Rp 1.250.000";
	
	$model->categories = array();
	
	$model->categories[0] = new class{};
	$model->categories[0]->category_name = "Handphone & Tablet";
	$model->categories[1] = new class{};
	$model->categories[1]->category_name = "Laptop & Aksesoris";
	$model->categories[2] = new class{};
	$model->categories[2]->category_name = "Komputer & Aksesoris";
	$model->categories[3] = new class{};
	$model->categories[3]->category_name = "Elektronik";
	$model->categories[4] = new class{};
	$model->categories[4]->category_name = "Kamera";
	$model->categories[5] = new class{};
	$model->categories[5]->category_name = "Gaming";
	$model->categories[6] = new class{};
	$model->categories[6]->category_name = "Reparasi";
	
	// // dummy posted items
	$model->hot_items = array();
	
	$model->hot_items[0] = new class{};
	$model->hot_items[0]->id = 1;
	$model->hot_items[0]->posted_item_name = "Charger Samsung";
	$model->hot_items[0]->price = "Rp 250.000";
	$model->hot_items[0]->image_one_name = site_url("img/upload/user1/charger_samsung.jpg");
	
	$model->hot_items[1] = new class{};
	$model->hot_items[1]->id = 2;
	$model->hot_items[1]->posted_item_name = "Charger Wireless";
	$model->hot_items[1]->price = "Rp 350.000";
	$model->hot_items[1]->image_one_name = site_url("img/upload/user1/wireless_samsung.jpg");
	
	$model->hot_items[2] = new class{};
	$model->hot_items[2]->id = 3;
	$model->hot_items[2]->posted_item_name = "Dompet Doraemon";
	$model->hot_items[2]->price = "Rp 40.000";
	$model->hot_items[2]->image_one_name = site_url("img/upload/user1/doraemon.jpg");
	
	$model->tenant_items = $model->hot_items;
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel panel-body">
			<div class="col-md-4">
				<div class="thumbnail">
					<a href="<?=site_url('Tenant/profile/'.$model->tenant->id )?>">
						<img src="<?=$model->tenant->account->profile_pic?>" alt="Image" style="width:50%">
					</a>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-2"><label for="name">Nama: </label></div>
					<div class="col-md-4">
						<input class="form-control" type="text" value=<?=$model->tenant->tenant_name?> readonly>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2"><label for="unit">Unit: </label></div>
					<div class="col-md-2">
						<input class="form-control" type="text" value=<?=$model->tenant->unit_number?> readonly>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2"><label for="floor">Lantai: </label></div>
					<div class="col-md-2">
						<input class="form-control" type="text" value=<?=$model->tenant->floor?> readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-body">
			<div class="col-md-12">
				<a class="btn btn-default">Posted Item</a>
				<a class="btn btn-default">Transaksi</a>
				<a class="btn btn-default">Dispute</a>
				<a class="btn btn-default">Produk Terjual</a>
			</div>
		</div>
		
		<div class="panel panel-default" style="display:show">
			<div class="panel-heading">
				<h3>Daftar Posted Item</h3>
			</div>
			<div class="panel-body">
				<?php
				foreach($model->posted_item as $posted_item)
				{
					?>
					<div class="col-xs-4">
						<div class="thumbnail">
							<a href="<?=site_url('Item/post_item_detail/'.$posted_item->id)?>">
								<img src="<?=site_url('img/favicon.gif')?>" alt="Image" style="width:50%">
								<div class="caption text-center">
									<p><?=$posted_item->posted_item_name?></p>
									<p><?=$posted_item->price?></p>
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
</div>
