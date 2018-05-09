<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">DAFTAR BRAND</h3>
		</div>
		<div class="cb-col-half cb-p-5">
			<a href="<?=site_url('brand/create_brand')?>" class="cb-button-form pull-right">+ TAMBAH BRAND</a>
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
	foreach($model->brands as $brand)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth">
			</div>
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$brand->brand_name?> </div>
			</div>
			<div class="cb-col-fifth-2">
				<div class="cb-align-center"> <?=$brand->brand_description?> </div>
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
*/?>