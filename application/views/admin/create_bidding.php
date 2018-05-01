<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-lg">TAMBAH BARANG LELANG</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<form action="<?=site_url('item/post_item')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
		<input type="hidden" name="item_type" value="BID"/>
		<input type="hidden" id="posted_item_id" name="posted_item_id" value="<?=$model->bidding_item->id?>"/>
		<input type="hidden" id="quantity_available" name="quantity_available" value="1"/>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<label for="image_one_name" class="thumbnail hoverable cb-m-5 cb-icon-xl cb-align-center cb-vertical-center cb-row label_upload_file">
					<?php
						if ($model->bidding_item->image_one_name != "")
						{
							?>
							<div>
								<img src="<?=$model->bidding_item->image_one_name?>" alt="">
							</div>
							<?php
						}
						else
						{
							?>
							<div class="cb-icon cb-icon-lg cb-icon-add-item"></div>
							<?php
						}
					?>
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
				<input type="text" class="cb-input-text cb-col-full" name="posted_item_name" value="<?= (set_value('posted_item_name') == "") ? $model->bidding_item->posted_item_name : ""?>"/>
				<span class="text-danger"><?= form_error('posted_item_name'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
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
			<div class="cb-row cb-col-fifth-2">
				<input type="text" class="cb-input-text cb-col-full" name="price" value="<?= (set_value('price') == "") ? $model->bidding_item->price : "" ?>"/>
				<span class="text-danger"><?= form_error('price'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Berat (g) </div>
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
				<input type="text" class="cb-input-text cb-col-full" name="unit_weight" value="<?= (set_value('unit_weight') == "") ? $model->bidding_item->unit_weight : "" ?>"/>
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
				<textarea class="cb-input-text cb-col-full" name="posted_item_description" value="<?= (set_value('posted_item_description') == "") ? $model->bidding_item->posted_item_description : "" ?>" rows="6" style="resize:none"><?= (set_value('posted_item_description') == "") ? $model->bidding_item->posted_item_description : "" ?></textarea>
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
				foreach ($model->bidding_category as $category)
				{
					?>
					<option value="<?=$category->id?>" <?=($category->id == $model->bidding_item->category_id) ? "selected" : "" ?>><?=$category->category_name?></option>			
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
				foreach ($model->bidding_brand as $brand)
				{
					?>
					<option value="<?=$brand->id?>" <?=($brand->id == $model->bidding_item->brand_id) ? "selected" : "" ?>><?=$brand->brand_name?></option>			
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
				<select class="cb-input-select cb-col-full" name="posted_item_variance_name">
				<?php
				foreach ($model->bidding_variance as $variance)
				{
					?>
					<option value="<?=$variance?>" <?=($variance == $model->bidding_item->var_type) ? "selected" : "" ?>><?=$variance?></option>			
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
					<div class="cb-row cb-col-full">
						<input type="text" class="cb-input-text cb-col-full" name="posted_item_variance_description" value="<?= (set_value('posted_item_variance_description') == "") ? $model->bidding_item->var_description : "" ?>"/>
						<span class="text-danger"><?= form_error('var_desc'); ?></span>
					</div>
				</div>
			</div>
		</div>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Kenaikan Harga</div>
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
				<input type="text" class="cb-input-text cb-col-full" name="bidding_max_range" value="<?= (set_value('bidding_max_range') == "") ? $model->bidding_item->bidding_max_range : "" ?>"/>
				<span class="text-danger"><?= form_error('bidding_max_range'); ?></span>
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
				<input type="text" class="cb-input-text cb-col-full datetimepicker" name="date_expired" value="<?= (set_value('date_expired') == "") ? $model->bidding_item->date_expired : "" ?>"/>
				<span class="text-danger"><?= form_error('date_expired'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-mb-5 cb-align-right">
			<div class="cb-col-fifth cb-row">
				<button type="submit" class="cb-button-form cb-col-full">KIRIM</button>
			</div>
			<?php
				if ($model->is_existed)
				{
					?>
					<div class="cb-col-fifth cb-row cb-pl-5">
						<button type="button" class="cb-button-form cb-col-full" onclick="popup.open('popup_approval')">KEPUTUSAN</button>
					</div>
					<?php
					$this->load->view('admin/popup/approval');
				}
			?>
		</div>
	</form>
</div>

<?php /*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan bidding Baru</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('item/post_item')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
				<input type="hidden" name="item_type" value="BID"/>
				<input type="hidden" id="posted_item_id" name="posted_item_id" value="<?=$model->bidding_item->id?>"/>
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_name" value="<?= (set_value('posted_item_name') == "") ? $model->bidding_item->posted_item_name : ""?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('posted_item_name'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="price">Harga:</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="price" value="<?= (set_value('price') == "") ? $model->bidding_item->price : "" ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('price'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="unit_weight">Berat(g):</label>
					<div class="col-xs-2"><input type="text" class="form-control" name="unit_weight" value="<?= (set_value('unit_weight') == "") ? $model->bidding_item->unit_weight : "" ?>"/></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('unit_weight'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="posted_item_description">Deskripsi:</label>
					<div class="col-xs-9"><textarea class="form-control" name="posted_item_description" value="<?= (set_value('posted_item_description') == "") ? $model->bidding_item->posted_item_description : "" ?>"></textarea>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="image1">Unggah Gambar:</label>
					<div class="col-xs-9">
						<label for="image_one_name">
						<?php
							if ($model->bidding_item->image_one_name != "")
							{
								?>
								<div class="thumbnail thumbnail-hover">
									<img src="<?=$model->bidding_item->image_one_name?>" alt="" style="width:100%">
								</div>
								<?php
							}
						?>
						</label>
						<input id="image_one_name" name="image_one_name" type="file" class="photo_upload_simple"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-6">
						<select class="form-control" name="category_id">
						<?php
						foreach ($model->bidding_category as $category)
						{
							?>
							<option value="<?=$category->id?>" <?=($category->id == $model->bidding_item->category_id) ? "selected" : "" ?>><?=$category->category_name?></option>			
							<?php
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
						foreach ($model->bidding_brand as $brand)
						{
							?>
							<option value="<?=$brand->id?>" <?=($brand->id == $model->bidding_item->brand_id) ? "selected" : "" ?>><?=$brand->brand_name?></option>			
							<?php
						}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="posted_item_variance_name">Varian:</label>
					<div class="col-xs-6">
						<select class="form-control" name="posted_item_variance_name">
						<?php
						foreach ($model->bidding_variance as $variance)
						{
							?>
							<option value="<?=$variance?>" <?=($variance == $model->bidding_item->var_type) ? "selected" : "" ?>><?=$variance?></option>			
							<?php
						}
						?>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="posted_item_variance_description">Deskripsi Varian:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_variance_description" value="<?= (set_value('posted_item_variance_description') == "") ? $model->bidding_item->var_description : "" ?>"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="bidding_max_range">Kenaikan Harga:</label>
					<div class="col-xs-4"><input type="text" class="form-control" name="bidding_max_range" value="<?= (set_value('bidding_max_range') == "") ? $model->bidding_item->bidding_max_range : "" ?>"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_expired">Berlaku Hingga:</label>
					<div class="col-xs-4"><input type="text" class="form-control datetimepicker" name="date_expired" value="<?= (set_value('date_expired') == "") ? $model->bidding_item->date_expired : "" ?>"/></div>
				</div>
				<div class="form-group">
					<div class="col-xs-1 col-xs-offset-3"><button type="submit" class="btn btn-default">Kirim</button></div>
					<?php
						if ($model->is_existed)
						{
							?>
							<div class="col-xs-1"><button type="button" class="btn btn-default" onclick="popup.open('popup_approval')">Keputusan</button></div>
							<?php
							$this->load->view('admin/popup/approval');
						}
					?>
				</div>
			</form>
		</div>
	</div>
</div>

*/ ?>