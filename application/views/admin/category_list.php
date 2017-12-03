<?php
	// Model untuk customer
	
	// dummy category list
	$model->categories = array();
	
	// Model dummy category
	$model->categories[0] = new class{};
	$model->categories[0]->id = 1;
	$model->categories[0]->category_name = "Tablet";
	$model->categories[0]->category_description = "Deskripsi category Tablet";
	$model->categories[1] = new class{};
	$model->categories[1]->id = 2;
	$model->categories[1]->category_name = "Laptop";
	$model->categories[1]->category_description = "Deskripsi category Laptop";
	$model->categories[2] = new class{};
	$model->categories[2]->id = 3;
	$model->categories[2]->category_name = "Hape";
	$model->categories[2]->category_description = "Deskripsi category Hape";
	
	
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar category</h3>
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-2"> <label for="category_name">Nama Kategori</label> </div>
				<div class="col-xs-8"> <label for="account_name">Deskripsi</label> </div>
			</div>
			<?php
			foreach($model->categories as $category)
			{
				?>
				<div class="row list-group">
					<a href="<?=site_url('category/category_detail/'.$category->id)?>">
						<div class="col-xs-2 list-group-item">
							<?=$category->category_name?> </div>
						<div class="col-xs-10 list-group-item">
							<?=$category->category_description?> </div>
					</a>
				</div>
				<?php
			}
			?>
			<a class="btn btn-default" href="<?=site_url('Category/create_category')?>">
				Buat Kategori
			</a>	
		</div>
	</div>
</div>
