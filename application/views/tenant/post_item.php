<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5" id="choose_type_button" style="display:block">
	<div class="cb-row">
		<div class="cb-col-half">
			<div class="cb-icon-post-item"></div>
		</div>
		<div class="cb-col-half">
			<div class="cb-icon-post-repair"></div>
		</div>
	</div>
	<div class="cb-row">
		<div class="cb-col-half cb-align-center">
			<button class="cb-button-form" onclick="input_order()" type="button" >TAMBAH BARANG</button>
		</div>
		<div class="cb-col-half cb-align-center">
			<button class="cb-button-form" onclick="input_repair()" type="button" >TAMBAH SERVIS</button>
		</div>
	</div>
</div>

<div id="choose_order" style="display:none">
	<div class="cb-col-full cb-txt-primary-1 cb-font-title">
		<div class="cb-align-center cb-font-size-lg">TAMBAH BARANG BARU</div>
	</div>
	<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
		<form action="<?=site_url('item/post_item')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
			<input type="hidden" name="item_type" value="ORDER"/>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Nama</div>
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
				<div class="cb-row cb-col-tenth-3">
					<input type="text" class="cb-input-text cb-col-full" name="posted_item_name" value="<?= set_value('posted_item_name'); ?>"/>
					<span class="text-danger"><?= form_error('posted_item_name'); ?></span>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Harga</div>
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
				<div class="cb-row cb-col-tenth-3">
					<input type="text" class="cb-input-text cb-col-full" name="price" value="<?= set_value('price'); ?>"/>
					<span class="text-danger"><?= form_error('price'); ?></span>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Berat</div>
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
				<div class="cb-row cb-col-tenth-3">
					<input type="text" class="cb-input-text cb-col-full" name="unit_weight" value="<?= set_value('unit_weight'); ?>"/>
					<span class="text-danger"><?= form_error('unit_weight'); ?></span>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Deskripsi</div>
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
				<div class="cb-row cb-col-tenth-9">
					<textarea class="cb-input-text cb-col-full" name="posted_item_description" value="<?= set_value('posted_item_description'); ?>" style="resize:none"></textarea>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Kategori</div>
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
				<div class="cb-row cb-col-tenth-3">
					<select class="cb-input-select cb-col-full" name="category_id">
					<?php
					foreach ($model->item_category as $category)
					{
						?>
						<option value="<?=$category->id?>"><?=$category->category_name?></option>			
						<?php
						$i++;
					}
					?>
					</select>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Brand</div>
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
				<div class="cb-row cb-col-tenth-3">
					<select class="cb-input-select cb-col-full" name="brand_id">
					<?php
					foreach ($model->item_brand as $brand)
					{
						?>
						<option value="<?=$brand->id?>"><?=$brand->brand_name?></option>			
						<?php
						$i++;
					}
					?>
					</select>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Varian</div>
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
				<div class="cb-row cb-col-tenth-3">
					<select class="cb-input-select cb-col-full" name="var_type">
					<?php
					foreach ($model->item_variance as $variance)
					{
						?>
						<option value="<?=$variance?>"><?=$variance?></option>			
						<?php
					}
					?>
					<option value="lainnya">Lainnya</option>
					</select>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
				</div>
				<div class="cb-row cb-col-tenth-3">
					<input type="text" class="cb-input-text cb-col-full" name="var_desc[]" value="<?= set_value('var_desc'); ?>"/>
					<span class="text-danger"><?= form_error('var_desc'); ?></span>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
				</div>
				<div class="cb-row cb-col-tenth">
					<div class="cb-label"> Stok :</div>
				</div>
				<div class="cb-row cb-col-tenth-2">
					<input type="text" class="cb-input-text cb-col-full" name="quantity_available[]" value="<?= set_value('quantity_available'); ?>"/>
					<span class="text-danger"><?= form_error('quantity_available'); ?></span>
				</div>
				<div class="cb-row cb-col-tenth">
					<input name='image_two_name[]' type='file' class="photo_upload_simple"/>
				</div>
				<div class="cb-row cb-col-tenth">
					<input name='image_three_name[]' type='file' class="photo_upload_simple"/>	
				</div>
				<div class="cb-row cb-col-tenth">
					<input name='image_four_name[]' type='file' class="photo_upload_simple"/>
				</div>
			</div>
			<div class="template" id="div_variance">
				<div class="cb-row cb-mb-5">
					<div class="cb-col-tenth">
					</div>
					<div class="cb-row cb-col-tenth-3">
						<input type="text" class="cb-input-text cb-col-full" name="var_desc[]" value="<?= set_value('var_desc'); ?>"/>
						<span class="text-danger"><?= form_error('var_desc'); ?></span>
					</div>
					
				</div>
				<div class="cb-row cb-mb-5">
					<div class="cb-col-tenth">
					</div>
					<div class="cb-row cb-col-tenth">
						<div class="cb-label"> Stok :</div>
					</div>
					<div class="cb-row cb-col-tenth-2">
						<input type="text" class="cb-input-text cb-col-full" name="quantity_available[]" value="<?= set_value('quantity_available'); ?>"/>
						<span class="text-danger"><?= form_error('quantity_available'); ?></span>
					</div>
				</div>
			</div>
			<div id="var_desc_list">
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
				</div>
				<div class="cb-col-tenth">
					<button type="button" onclick="add_variance()" class="cb-button-form">+ TAMBAH</button>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-full">
					<button type="submit" class="cb-button-form cb-pull-right">KIRIM</button>
				</div>
			</div>
			<div class="form-group">
				<div class="col-xs-2 col-xs-offset-10"></div>
			</div>
		</form>
	</div>
</div>

<div id="choose_repair" style="display:none">
	<div class="cb-col-full cb-txt-primary-1 cb-font-title">
		<div class="cb-align-center cb-font-size-lg">TAMBAH SERVIS BARU</div>
	</div>
	<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
		<form action="<?=site_url('item/post_item')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
			<input type="hidden" name="item_type" value="REPAIR"/>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Nama</div>
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
				<div class="cb-row cb-col-tenth-3">
					<input type="text" class="cb-input-text cb-col-full" name="posted_item_name" value="<?= set_value('posted_item_name'); ?>"/>
					<span class="text-danger"><?= form_error('posted_item_name'); ?></span>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Deskripsi</div>
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
				<div class="cb-row cb-col-tenth-9">
					<textarea class="cb-input-text cb-col-full" name="posted_item_description" value="<?= set_value('posted_item_description'); ?>" style="resize:none"></textarea>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Kategori</div>
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
				<div class="cb-row cb-col-tenth-3">
					<select class="cb-input-select cb-col-full" name="category_id">
					<?php
					foreach ($model->item_category as $category)
					{
						?>
						<option value="<?=$category->id?>"><?=$category->category_name?></option>			
						<?php
						$i++;
					}
					?>
					</select>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-tenth">
					<div class="cb-row">
						<div class="cb-col-fifth-4">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Brand</div>
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
				<div class="cb-row cb-col-tenth-3">
					<select class="cb-input-select cb-col-full" name="brand_id">
					<?php
					foreach ($model->item_brand as $brand)
					{
						?>
						<option value="<?=$brand->id?>"><?=$brand->brand_name?></option>			
						<?php
						$i++;
					}
					?>
					</select>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-full"><button type="submit" class="cb-button-form cb-pull-right">KIRIM</button></div>
			</div>
		</form>
	</div>
</div>

<?php /*
<div class="">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Tambah Item Baru</h3>
		</div>
		
		<!-- CHOOSE TYPE FIRST -->
		<div class="panel-body" id="choose_type_button" style="display:block">
			<div class="form-group">
				<div class="col-xs-6"><button class="btn btn-default" onclick="input_order()" type="button" >Barang</button></div>
				<div class="col-xs-6"><button class="btn btn-default" onclick="input_repair()" type="button" >Servis</button></div>
			</div>
		</div>
		
		
		<!-- ORDER -->
		<div class="panel-body" id="choose_order" style="display:none">
			<form action="<?=site_url('item/post_item')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
				<input type="hidden" name="item_type" value="ORDER"/>
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
					<div class="col-xs-9"><textarea class="form-control" name="posted_item_description" value="<?= set_value('posted_item_description'); ?>"></textarea></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="image1">Unggah Gambar:</label>
					<div class="col-xs-9">
						<label for="image_one_name">
							<!--<div id="thumbnail-image_one_name" class="thumbnail thumbnail-hover">
								<img src="<?=$model->account->profile_pic?>" alt="<?=$model->account->name?>" style="width:100%">
							</div>-->
						</label>
						<input id="image_one_name" name="image_one_name" type="file" class="photo_upload_simple"/>
						
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-6">
						<select class="form-control" name="category_id">
						<?php
						foreach ($model->item_category as $category)
						{
							?>
							<option value="<?=$category->id?>"><?=$category->category_name?></option>			
							<?php
							$i++;
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
						foreach ($model->item_brand as $brand)
						{
							?>
							<option value="<?=$brand->id?>"><?=$brand->brand_name?></option>			
							<?php
							$i++;
						}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="var_type">Varian:</label>
					<div class="col-xs-6">
						<select class="form-control" name="var_type">
						<?php
						foreach ($model->item_variance as $variance)
						{
							?>
							<option value="<?=$variance?>"><?=$variance?></option>			
							<?php
						}
						?>
						<option value="lainnya">Lainnya</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="control-label col-xs-3"><label>Deskripsi:</label></div>
					<div id="var_desc_list">
					</div>
					<div class="col-sm-2">
						<button type="button" onclick="popup.open('popup_add_variance')" class="btn btn-default">Tambah</button>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-2 col-xs-offset-10"><button type="submit" class="btn btn-default">Kirim</button></div>
				</div>
			</form>
			<div class="template" id="div_variance">
				<div class='col-xs-9 col-xs-offset-3'>
					<input name='var_desc[]' type='text' class='form-control' readonly/>
					<input name='quantity_available[]' type='text' class="form-control" readonly/>
				</div>
				<div class='col-xs-9 col-xs-offset-3'>
					<input name='image_two_name[]' type='file' class="photo_upload_simple"/>			
					<input name='image_three_name[]' type='file' class="photo_upload_simple"/>	
					<input name='image_four_name[]' type='file' class="photo_upload_simple"/>
				</div>
			</div>
		</div>
		
		<!-- REPAIR -->
		<div class="panel-body" id="choose_repair" style="display:none">
			<form action="<?=site_url('item/post_item')?>" class="form-horizontal" method="post">
				<input type="hidden" name="item_type" value="REPAIR"/>
				<div class="form-group">
					<label class="control-label col-xs-3" for="posted_item_description">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_description" value="<?= set_value('posted_item_description'); ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('posted_item_description'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-6">
						<select class="form-control" name="category_id">
						<?php
						foreach ($model->item_category as $category)
						{
							?>
							<option value="<?=$category->id?>"><?=$category->category_name?></option>			
							<?php
							$i++;
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
						foreach ($model->item_brand as $brand)
						{
							?>
							<option value="<?=$brand->id?>"><?=$brand->brand_name?></option>			
							<?php
							$i++;
						}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-2 col-xs-offset-10"><button type="submit" class="btn btn-default">Kirim</button></div>
				</div>
			</form>
		</div>
	</div>
</div>


<div id="popup_add_variance" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Tambah Varian
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-2">
						<label>Deskripsi Varian:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="var_desc">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Jumlah Stok:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" class="form-control" id="quantity_available">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="button" class="btn btn-default" onclick="add_variance(); popup.close('popup_add_variance')">Simpan</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_add_variance')">Tutup</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

*/ ?>