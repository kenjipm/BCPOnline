<?php
	if ($model->posted_item->item_type == "ORDER")
	{
		$show_div_order = true;
		$show_div_repair = false;
	} else // REPAIR
	{
		$show_div_order = false;
		$show_div_repair = true;
	}
	
?>

<div class="col-sm-10 col-sm-offset-1">
	<!-- Order -->
	<div class="panel panel-default" <?php if ($show_div_order===false){?>style="display:none"<?php } ?>>
		<div class="panel-heading">
			<h3>Lihat Item</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_name" 
						value="<?=$model->posted_item->posted_item_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="price">Harga:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="price" 
						value="<?=$model->posted_item->price?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="type">Tipe:</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="type" 
						value="<?=$model->posted_item->item_type?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="unit_weight">Berat(kg):</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="unit_weight" 
						value="<?=$model->posted_item->unit_weight?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="description">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="description" 
						value="<?=$model->posted_item->posted_item_description?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Gambar:</label>
					<div class="col-xs-3">
					
						<label for="image_one_name">
							<div id="thumbnail-image_one_name" class="thumbnail thumbnail-hover">
								<img src="<?=$model->posted_item->image_one_name?>" alt="<?=$model->posted_item->image_one_name?>" style="width:100%">
							</div>
						</label>
						<input id="image_one_name" name="image_one_name" value="<?=$model->posted_item->image_one_name?>" data-url="<?=site_url('customer/upload_profpic')?>" type="file" class="photo_upload_simple" style="display:none"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="category" 
						value="<?=$model->posted_item->category->category_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="brand">Brand:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="brand" 
						value="<?=$model->posted_item->brand->brand_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="brand">Varian:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="var_type" 
						value="<?=$model->posted_item->var_type[0]?>" readonly></div>
				</div>
				<?php
				$i = 0;
				foreach ($model->posted_item->var_desc as $var_desc)
				{
					?>
					<div class="form-group">
						<label class="control-label col-xs-2 col-xs-offset-3" for="var_desc">Deskripsi:</label>
						<div class="col-xs-7"><input type="text" class="form-control" name="var_desc" 
							value="<?=$model->posted_item->var_desc[$i]?>" readonly></div>
						<label class="control-label col-xs-2 col-xs-offset-3" for="quantity_available">Stok:</label>
						<div class="col-xs-7"><input type="text" class="form-control" name="quantity_available" value="<?=$model->posted_item->quantity_available[$i]?>" readonly></div>
						<label class="control-label col-xs-2 col-xs-offset-3" for="image_two_name">Gambar:</label>
						<div class="col-xs-7">
							<div id="thumbnail-image_two_name" class="thumbnail thumbnail-hover" style="width:30%">
								<img src="<?=$model->posted_item->image_two_name[$i]?>" alt="<?=$model->posted_item->image_two_name[$i]?>" />
							</div>
							<div id="thumbnail-image_three_name" class="thumbnail thumbnail-hover" style="width:30%">
								<img src="<?=$model->posted_item->image_three_name[$i]?>" alt="<?=$model->posted_item->image_three_name[$i]?>" />
							</div>
							<div id="thumbnail-image_four_name" class="thumbnail thumbnail-hover" style="width:30%">
								<img src="<?=$model->posted_item->image_four_name[$i]?>" alt="<?=$model->posted_item->image_four_name[$i]?>" />
							</div>
						</div>
					</div>
					<?php
					$i++;
				}
				?>
			</form>
		</div>
	</div>
	
	<!-- Repair -->
	<div class="panel panel-default" <?php if ($show_div_repair===false){?>style="display:none"<?php } ?>>
		<div class="panel-heading">
			<h3>Lihat Item</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="description">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="description" 
						value="<?=$model->posted_item->posted_item_description?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="category" 
						value="<?=$model->posted_item->category->category_name?>" readonly></div>
				</div>
			</form>
		</div>
	</div>
</div>