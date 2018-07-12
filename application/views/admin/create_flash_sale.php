<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-lg">TAMBAH BARANG FLASH SALE</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<form action="<?=site_url('admin/create_flash_sale')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
		<input type="hidden" name="item_type" value="FLASH"/>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<label for="image_one_name" class="thumbnail hoverable cb-m-5 cb-icon-xl cb-align-center cb-vertical-center cb-row label_upload_file">
					<div class="cb-icon cb-icon-lg cb-icon-add-item"></div>
				</label>
				<input id='image_one_name' name='image_one_name' class="input_file_upload" type='file' style="display:none;"/>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
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
			<div class="cb-row cb-col-fifth-2">
				<input type="text" class="cb-input-text cb-col-full" name="posted_item_name" value="<?= set_value('posted_item_name'); ?>"/>
				<span class="text-danger"><?= form_error('posted_item_name'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Harga Awal (Rp)</div>
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
			<div class="cb-row cb-col-fifth-2">
				<input type="text" class="cb-input-text cb-col-full input_thousand_separator" realid="price" value="<?= set_value('price'); ?>"/>
				<input type="hidden" id="price" name="price" value="<?= set_value('price'); ?>"/>
				<span class="text-danger"><?= form_error('price'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Harga Promo (Rp)</div>
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
			<div class="cb-row cb-col-fifth-2">
				<input type="text" class="cb-input-text cb-col-full input_thousand_separator" realid="promo_price" value="<?= set_value('promo_price'); ?>"/>
				<input type="hidden" id="promo_price" name="promo_price" value="<?= set_value('promo_price'); ?>"/>
				<span class="text-danger"><?= form_error('promo_price'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Berat (g)</div>
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
			<div class="cb-row cb-col-fifth-2">
				<input type="text" class="cb-input-text cb-col-full input_number" name="unit_weight" value="<?= set_value('unit_weight'); ?>"/>
				<span class="text-danger"><?= form_error('unit_weight'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
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
			<div class="cb-row cb-col-fifth-4">
				<textarea class="cb-input-text cb-col-full" name="posted_item_description" value="<?= set_value('posted_item_description'); ?>" rows="6" style="resize:none"></textarea>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Berlaku Hingga</div>
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
			<div class="cb-row cb-col-fifth-2">
				<input type="text" class="cb-input-text cb-col-full datetimepicker" name="date_expired" value="<?=set_value('date_expired') ?>"/>
				<span class="text-danger"><?= form_error('date_expired'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
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
			<div class="cb-row cb-col-fifth-2">
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
			<div class="cb-col-fifth">
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
			<div class="cb-row cb-col-fifth-2">
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
			<div class="cb-col-fifth">
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
			<div class="cb-row cb-col-fifth-2">
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
			<div class="cb-col-fifth cb-row cb-mb-5">
			</div>
			<div class="cb-col-fifth-2 cb-row cb-mb-5">
				<div class="cb-col-full cb-row cb-mb-5">
					<div class="cb-row cb-col-fifth cb-label">
						<div class="pull-left">Deskripsi</div>
						<div class="pull-right">:</div>
					</div>
					<div class="cb-row cb-col-fifth-4">
						<input type="text" class="cb-input-text cb-col-full" name="var_desc[]" value="<?= set_value('var_desc'); ?>"/>
						<span class="text-danger"><?= form_error('var_desc'); ?></span>
					</div>
				</div>
				<div class="cb-col-full cb-row cb-mb-5">
					<div class="cb-row cb-col-fifth cb-label">
						<div class="pull-left">Stok</div>
						<div class="pull-right">:</div>
					</div>
					<div class="cb-row cb-col-fifth-4">
						<input type="text" class="cb-input-text cb-col-full input_number" name="quantity_available[]" value="<?= set_value('quantity_available'); ?>"/>
						<span class="text-danger"><?= form_error('quantity_available'); ?></span>
					</div>
				</div>
			</div>
			<div class="cb-col-fifth-2 cb-row cb-mb-5">
				<div class="cb-col-fifth cb-p-1">
					<label for="image_two_name" class="thumbnail hoverable cb-m-5 cb-icon-lg cb-align-center cb-vertical-center cb-row label_upload_file">
						<div class="cb-icon cb-icon-md cb-icon-add-item"></div>
					</label>
					<input id='image_two_name' name='image_two_name[]' class="input_file_upload" type='file' style="display:none;"/>
				</div>
				<div class="cb-col-fifth cb-p-1">
					<label for="image_three_name" class="thumbnail hoverable cb-m-5 cb-icon-lg cb-align-center cb-vertical-center cb-row label_upload_file">
						<div class="cb-icon cb-icon-md cb-icon-add-item"></div>
					</label>
					<input id='image_three_name' name='image_three_name[]' class="input_file_upload" type='file' style="display:none;"/>
				</div>
				<div class="cb-col-fifth cb-p-1">
					<label for="image_four_name" class="thumbnail hoverable cb-m-5 cb-icon-lg cb-align-center cb-vertical-center cb-row label_upload_file">
						<div class="cb-icon cb-icon-md cb-icon-add-item"></div>
					</label>
					<input id='image_four_name' name='image_four_name[]' class="input_file_upload" type='file' style="display:none;"/>
				</div>
			</div>
		</div>
		<div id="var_desc_list">
		</div>
		
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
			</div>
			<div class="cb-col-fifth cb-row">
				<button type="button" onclick="add_variance()" class="cb-button-form cb-col-full">+ TAMBAH VARIAN</button>
			</div>
		</div>
		<div class="cb-row cb-mb-5 cb-align-right">
			<div class="cb-col-fifth cb-row">
				<button type="submit" class="cb-button-form cb-col-full">KIRIM</button>
			</div>
		</div>
	</form>
</div>
