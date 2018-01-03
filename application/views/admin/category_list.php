<?php
	// Model untuk customer
	
	// dummy category list
	// $model->categories = array();
	
	// // Model dummy category
	// $model->categories[0] = new class{};
	// $model->categories[0]->id = 1;
	// $model->categories[0]->category_name = "Tablet";
	// $model->categories[0]->category_description = "Deskripsi category Tablet";
	// $model->categories[1] = new class{};
	// $model->categories[1]->id = 2;
	// $model->categories[1]->category_name = "Laptop";
	// $model->categories[1]->category_description = "Deskripsi category Laptop";
	// $model->categories[2] = new class{};
	// $model->categories[2]->id = 3;
	// $model->categories[2]->category_name = "Hape";
	// $model->categories[2]->category_description = "Deskripsi category Hape";
	
	
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Kategori</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="category_name">Nama</label></th>
							<th> <label for="category_description">Deskripsi</label></th>
							<!--<th> </th>
							<th> </th> -->
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->categories as $category)
						{
							?>
							<tr>
								<td>
									<?=$category->category_name?> </td>
								<td>
									<?=$category->category_description?> </td>
								<!-- <td>
									<a href="<?=site_url('category/update_category/'.$category->id)?>">
										<button class="btn btn-default">Ubah</button>
									</a>
								</td>
								<td>
									<a href="<?=site_url('category/delete_category/'.$category->id)?>">
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
			<a class="btn btn-default" href="<?=site_url('Category/create_category')?>">
				Buat Kategori
			</a>	
		</div>
	</div>
</div>
