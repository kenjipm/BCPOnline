<?php
	// Model untuk Deliverer
	
	// dummy Deliverer id
	$model->biddings = new class{};
	
	$model->biddings->bidding_id = "BD00012";
	
	//dummy List of Avalaible Brand
	$model->brands = array();
	
	$model->brands[0] = "Brand 1";
	$model->brands[1] = "Brand 2";
	$model->brands[2] = "Brand 3";
	$model->brands[3] = "Brand 4";
	$model->brands[4] = "Brand 5";
	
	//dummy List of Avalaible Category
	$model->categories = array();
	
	$model->categories[0] = "Category 1";
	$model->categories[1] = "Category 2";
	$model->categories[2] = "Category 3";
	$model->categories[3] = "Category 4";
	$model->categories[4] = "Category 5";
	
	//dummy List of Avalaible Item
	$model->items = array();
	
	$model->items[0] = "Item 1";
	$model->items[1] = "Item 2";
	$model->items[2] = "Item 3";
	$model->items[3] = "Item 4";
	$model->items[4] = "Item 5";
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan bidding Baru</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-2" for="id">ID bidding:</label>
					<div class="col-xs-2">
						<input type="text" value="<?=$model->biddings->bidding_id?>" class="form-control" id="id" readonly>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="brand">Brand:</label>
					<div class="col-xs-4">
						<select class="form-control" name="brand">
						<?php
						foreach($model->brands as $brand)
						{
							?>
								<option value="<?=$brand?>"><?=$brand?></option>
							<?php
						}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="category">Kategori:</label>
					<div class="col-xs-4">
						<select class="form-control" name="category">
						<?php
						foreach($model->categories as $category)
						{
							?>
								<option value="<?=$category?>"><?=$category?></option>
							<?php
						}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="item">Item:</label>
					<div class="col-xs-4">
						<select class="form-control" name="item">
						<?php
						foreach($model->items as $item)
						{
							?>
								<option value="<?=$item?>"><?=$item?></option>
							<?php
						}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="bidding_price">Harga Awal:</label>
					<div class="col-xs-4"><input type="text" class="form-control" id="bidding_price"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="bidding_time">Batas Waktu:</label>
					<div class="col-xs-3"><input type="datetime-local" class="form-control" id="bidding_time"></div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-11"><button type="submit" class="btn btn-default">Submit</button></div>
				</div>
			</form>
		</div>
	</div>
</div>