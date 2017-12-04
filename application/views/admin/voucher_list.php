<?php
	// Model untuk customer
	
	// dummy brand list
	$model->brands = array();
	
	// Model dummy brand
	$model->brands[0] = new class{};
	$model->brands[0]->id = 1;
	$model->brands[0]->brand_id = "17120377701";
	$model->brands[0]->brand_name = "Djisamsung";
	$model->brands[0]->brand_description = "Deskripsi Brand Djisamsung";
	$model->brands[1] = new class{};
	$model->brands[1]->id = 1;
	$model->brands[1]->brand_id = "17120377701";
	$model->brands[1]->brand_name = "Appa";
	$model->brands[1]->brand_description = "Deskripsi Brand Appa";
	$model->brands[2] = new class{};
	$model->brands[2]->id = 1;
	$model->brands[2]->brand_id = "17120377701";
	$model->brands[2]->brand_name = "Tos Ibak";
	$model->brands[2]->brand_description = "Deskripsi Brand Tos Ibak";
	
	
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Brand</h3>
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-2"> <label for="brand_id">ID</label>	</div>
				<div class="col-xs-2"> <label for="brand_name">Nama Brand</label> </div>
				<div class="col-xs-8"> <label for="account_name">Deskripsi</label> </div>
			</div>
			<?php
			foreach($model->brands as $brand)
			{
				?>
				<div class="row list-group">
					<a href="<?=site_url('Brand/brand_detail/'.$brand->id)?>">
						<div class="col-xs-2 list-group-item">
							<?=$brand->brand_id?> </div>
						<div class="col-xs-2 list-group-item">
							<?=$brand->brand_name?> </div>
						<div class="col-xs-8 list-group-item">
							<?=$brand->brand_description?> </div>
					</a>
				</div>
				<?php
			}
			?>
			<a class="btn btn-default" href="<?=site_url('Brand/create_brand')?>">
				Buat Brand
			</a>	
		</div>
	</div>
</div>
