<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">TAMBAH KATEGORI</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<form action="<?=site_url('category/create_category')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Nama Kategori</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<input type="text" class="cb-input-text cb-col-full" name="category_name"/>
				<span class="text-danger"><?= form_error('category_name'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Deskripsi Kategori</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<input type="text" class="cb-input-text cb-col-full" name="category_description"/>
				<span class="text-danger"><?= form_error('category_description'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth-4">
			</div>
			<div class="cb-row cb-col-fifth">
				<button type="submit" class="cb-button-form">KIRIM</button>
			</div>
		</div>
	</form>
</div>

<?php /*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Kategori Baru</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('category/create_category')?>" class="form-horizontal" method="post">
				<div class="form-group">
					<label class="control-label col-xs-2" for="name">Nama Kategori:</label>
					<div class="col-xs-10"><input type="text" class="form-control" name="category_name"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('category_name'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="license_plate">Deskripsi:</label>
					<div class="col-xs-10"><input type="text" class="form-control" name="category_description"></div>		
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('category_description'); ?></span>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-11"><button type="submit" class="btn btn-default">Submit</button></div>
				</div>
			</form>
		</div>
	</div>
</div>
*/ ?>