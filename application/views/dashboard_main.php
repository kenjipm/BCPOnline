<?php
	// Model untuk dashboard_main
	
	// dummy categories
	// $model->categories = array();
	
	// $model->categories[0] = new class{};
	// $model->categories[0]->category_name = "Handphone & Tablet";
	// $model->categories[1] = new class{};
	// $model->categories[1]->category_name = "Laptop & Aksesoris";
	// $model->categories[2] = new class{};
	// $model->categories[2]->category_name = "Komputer & Aksesoris";
	// $model->categories[3] = new class{};
	// $model->categories[3]->category_name = "Elektronik";
	// $model->categories[4] = new class{};
	// $model->categories[4]->category_name = "Kamera";
	// $model->categories[5] = new class{};
	// $model->categories[5]->category_name = "Gaming";
	// $model->categories[6] = new class{};
	// $model->categories[6]->category_name = "Reparasi";
	
	// dummy posted items
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

<div class="row">

	<!-- left bar buat category -->
	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Kategori</h3>
			</div>
			<?php
			foreach($model->categories as $category)
			{
				?>
				<a href="<?=site_url('item/category/'.$category->id)?>">
					<div class="panel-footer">
						<?=$category->category_name?>
					</div>
				</a>
				<?php
			}
			?>
		</div>
	</div>
	
	<div class="col-md-10">
	
		<!-------- FOLLOWING TENANT NEW ITEMS -------->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>New Items</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<?php
					foreach($model->tenant_items as $tenant_item)
					{
						?>
							<div class="col-md-4">
								<div class="panel panel-default">
									<a href="<?=site_url('item/'.$tenant_item->id)?>">
										<div class="panel-body">
											<img class="col-md-12" src="<?=$tenant_item->image_one_name?>" alt="<?=$tenant_item->posted_item_name?>"/>
										</div>
										<div class="panel-footer">
											<label class="control-label"><?=$tenant_item->posted_item_name?></label><br/>
											<label class="control-label"><?=$tenant_item->price?></label>
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
		
		<!-------- SEARCH INPUT -------->
		<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-6">
					<div class="row">
						<form action="<?=site_url('item/search')?>" method="get" class="navbar-form navbar-left">
							<div class="input-group">
								<input name="keywords" type="text" class="form-control" placeholder="Search Items...">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit">
										Search
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
			
		<!-------- HOT ITEM -------->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Hot Items</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<?php
					foreach($model->hot_items as $hot_item)
					{
						?>
							<div class="col-md-4">
								<div class="panel panel-default">
									<a href="<?=site_url('item/'.$hot_item->id)?>">
										<div class="panel-body">
											<img class="col-md-12" src="<?=$hot_item->image_one_name?>" alt="<?=$hot_item->posted_item_name?>"/>
										</div>
										<div class="panel-footer">
											<label class="control-label"><?=$hot_item->posted_item_name?></label><br/>
											<label class="control-label"><?=$hot_item->price?></label>
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
	
</div>