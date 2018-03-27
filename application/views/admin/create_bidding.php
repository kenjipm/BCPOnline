<?php
	// Model untuk Deliverer
	
	// dummy Deliverer id
	// $model->biddings = new class{};
	
	// $model->biddings->bidding_id = "BD00012";
	
	// //dummy List of Avalaible Brand
	// $model->brands = array();
	
	// $model->brands[0] = "Brand 1";
	// $model->brands[1] = "Brand 2";
	// $model->brands[2] = "Brand 3";
	// $model->brands[3] = "Brand 4";
	// $model->brands[4] = "Brand 5";
	
	// //dummy List of Avalaible Category
	// $model->categories = array();
	
	// $model->categories[0] = "Category 1";
	// $model->categories[1] = "Category 2";
	// $model->categories[2] = "Category 3";
	// $model->categories[3] = "Category 4";
	// $model->categories[4] = "Category 5";
	
	// //dummy List of Avalaible Item
	// $model->items = array();
	
	// $model->items[0] = "Item 1";
	// $model->items[1] = "Item 2";
	// $model->items[2] = "Item 3";
	// $model->items[3] = "Item 4";
	// $model->items[4] = "Item 5";
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan bidding Baru</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('item/post_item')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
				<input type="hidden" name="item_type" value="BID"/>
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_name" value="<?= set_value('posted_item_name'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('posted_item_name'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="price">Harga:</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="price" value="<?= set_value('price'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('price'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="unit_weight">Berat(g):</label>
					<div class="col-xs-2"><input type="text" class="form-control" name="unit_weight" value="<?= set_value('unit_weight'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('unit_weight'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="posted_item_description">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_description" value="<?= set_value('posted_item_description'); ?>"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="image1">Unggah Gambar:</label>
					<div class="col-xs-9">
						<label for="image_one_name">
						</label>
						<input id="image_one_name" name="image_one_name" type="file" class="photo_upload_simple"/>
						
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-6">
						<select class="form-control" name="category_id">
						<?php
						foreach ($model->bidding_category as $category)
						{
							?>
							<option value="<?=$category->id?>"><?=$category->category_name?></option>			
							<?php
						}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="brand">Brand:</label>
					<div class="col-xs-6">
						<select class="form-control" name="brand_id">
						<?php
						foreach ($model->bidding_brand as $brand)
						{
							?>
							<option value="<?=$brand->id?>"><?=$brand->brand_name?></option>			
							<?php
						}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="posted_item_variance_name">Varian:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_variance_name" value="<?= set_value('posted_item_variance_name'); ?>"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="posted_item_variance_description">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_variance_description" value="<?= set_value('posted_item_variance_description'); ?>"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="bidding_max_range">Kenaikan Harga:</label>
					<div class="col-xs-4"><input type="text" class="form-control" name="bidding_max_range" value="<?= set_value('bidding_max_range'); ?>"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_expired">Berlaku Hingga:</label>
					<div class="col-xs-4"><input type="datetime-local" class="form-control" name="date_expired" value="<?= set_value('date_expired'); ?>"/></div>
				</div>
				<div class="form-group">
					<div class="col-xs-2 col-xs-offset-10"><button type="submit" class="btn btn-default">Kirim</button></div>
				</div>
			</form>
		</div>
	</div>
</div>