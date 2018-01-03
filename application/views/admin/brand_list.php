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
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="brand_name">Nama</label></th>
							<th> <label for="brand_description">Deskripsi</label></th>
							<!--<th> </th>
							<th> </th> -->
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->brands as $brand)
						{
							?>
							<tr>
								<td>
									<?=$brand->brand_name?> </td>
								<td>
									<?=$brand->brand_description?> </td>
								<!-- <td>
									<a href="<?=site_url('brand/update_brand/'.$brand->id)?>">
										<button class="btn btn-default">Ubah</button>
									</a>
								</td>
								<td>
									<a href="<?=site_url('brand/delete_brand/'.$brand->id)?>">
										<button class="btn btn-default">Hapus</button>
									</a>
								</td>
								-->
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<a class="btn btn-default" href="<?=site_url('Brand/create_brand')?>">
				Buat Brand
			</a>	
		</div>
	</div>
</div>
