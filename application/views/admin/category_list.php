<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">DAFTAR KATEGORI</h3>
		</div>
		<div class="cb-col-half cb-p-5">
			<a href="<?=site_url('category/create_category')?>" class="cb-button-form pull-right">+ TAMBAH KATEGORI</a>
		</div>
	</div>
</div>

<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth">
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Nama </div>
		</div>
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Deskripsi </div>
		</div>
	</div>
	<?php
	foreach($model->categories as $category)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth">
			</div>
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$category->category_name?> </div>
			</div>
			<div class="cb-col-fifth-2">
				<div class="cb-align-center"> <?=$category->category_description?> </div>
			</div>
			
		</div>
		<?php
	}
	?>
</div>

<?php /*
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
*/ ?>