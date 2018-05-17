<div class="cb-row cb-p-5">
	<div class="cb-col-full cb-txt-primary-1 cb-align-left cb-font-title cb-font-size-xl">
		DETAIL PRODUK
	</div>
	<div class="cb-col-full cb-row cb-panel-body cb-bg-primary-3 cb-p-5">
		<?php
		if ($model->posted_item->item_type == "ORDER")
		{
			?>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Nama Barang</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="item_name" value="<?=$model->posted_item->posted_item_name?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Harga</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="price" value="<?=$model->posted_item->price?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Tipe</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="type" value="<?=$model->posted_item->item_type?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Berat(g)</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="unit_weight" value="<?=$model->posted_item->unit_weight?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Deskripsi</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<textarea class="cb-row cb-input-text cb-col-full" name="posted_item_description" rows="6" style="resize:none" readonly><?=$model->posted_item->posted_item_description?></textarea>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Gambar</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-pl-3">
					<div id="thumbnail-image_one_name" class="thumbnail">
						<img src="<?=$model->posted_item->image_one_name?>" alt="<?=$model->posted_item->posted_item_name?>">
					</div>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Kategori</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="category" value="<?=$model->posted_item->category->category_name?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Brand</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="collection_method" value="<?=$model->posted_item->brand->brand_name?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Varian</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="var_type" value="<?=$model->posted_item->var_type[0]?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<?php
					$i = 0;
					foreach ($model->posted_item->var_desc as $var_desc)
					{
						?>
						<div class="cb-row cb-mb-5">
							<div class="cb-col-fifth cb-row cb-mb-5">
							</div>
							<div class="cb-col-fifth-2 cb-mb-5">
								<div class="cb-col-full cb-row cb-mb-5">
									<div class="cb-col-fifth cb-pl-3 cb-label cb-txt-primary-1">
										<div class="cb-pull-left">Deskripsi</div>
										<div class="cb-pull-right">:</div>
									</div>
									<div class="cb-col-fifth-4 cb-pl-3">
										<input type="text" class="cb-row cb-col-full cb-input-text" value="<?=$model->posted_item->var_desc[$i]?>" readonly>
									</div>
								</div>
								<div class="cb-col-full cb-row cb-mb-5">
									<div class="cb-col-fifth cb-pl-3 cb-label cb-txt-primary-1">
										<div class="cb-pull-left">Stok</div>
										<div class="cb-pull-right">:</div>
									</div>
									<div class="cb-col-fifth-4 cb-pl-3">
										<input type="text" class="cb-row cb-col-full cb-input-text" value="<?=$model->posted_item->quantity_available[$i]?>" readonly>
									</div>
								</div>
								<div class="cb-col-full cb-row">
								</div>
							</div>
							<div class="cb-col-fifth-2 cb-row cb-mb-5">
								<div class="cb-col-fifth cb-row cb-p-1">
									<div id="thumbnail-image_two_name" class="thumbnail">
										<img src="<?=$model->posted_item->image_two_name[$i]?>" alt=""/>
									</div>
								</div>
								<div class="cb-col-fifth cb-p-1">
									<div id="thumbnail-image_three_name" class="thumbnail">
										<img src="<?=$model->posted_item->image_three_name[$i]?>" alt="" />
									</div>
								</div>
								<div class="cb-col-fifth cb-p-1">
									<div id="thumbnail-image_four_name" class="thumbnail">
										<img src="<?=$model->posted_item->image_four_name[$i]?>" alt="" />
									</div>
								</div>
							</div>
						</div>
						<?php
						$i++;
					}
				?>
			</div>
			<div class="cb-col-full cb-row">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
				</div>
				<?php
					if (!$model->posted_item->is_hot_item)
					{
						?>
							<a class="cb-button cb-button-form cb-ml-3" href="<?=site_url('Item/hot_item/'.$model->posted_item->id)?>">AJUKAN HOT ITEM</a>
						<?php
					}
					else if (!$model->posted_item->is_hot_item_confirmed)
					{
						?>
							<button type="button" class="cb-button cb-button-form cb-ml-3" disabled>Menunggu Konfirmasi Hot Item</button>
						<?php
					}
					else if (!$model->posted_item->is_hot_item_paid)
					{
						?>
							<div class="cb-col-full cb-row cb-mb-5">
								<div class="cb-col-fifth cb-label cb-txt-primary-1">
									<div class="cb-pull-left">Jumlah Tagihan</div>
									<div class="cb-pull-right">:</div>
								</div>
								<div class="cb-col-fifth-2 cb-pl-3">
									<input type="text" class="cb-row cb-col-full cb-input-text" id="var_type" value="<?=$model->posted_item->payment_value?>" readonly>
								</div>
							</div>
							<button type="button" class="cb-button cb-button-form cb-ml-3" disabled>Menunggu Pembayaran</button>
							<button type="button" class="cb-button cb-button-form cb-ml-3" onclick="bayar_hot_item_dummy(<?=$model->posted_item->hot_item_id?>)">Bayar (dummy)</button>
						<?php
					}
					else // if ($is_hot_item_paid)
					{
						?>
							<button type="button" class="cb-button cb-button-form cb-ml-3" disabled>Sudah Hot Item</button>
						<?php
					}
					if (!$model->posted_item->is_seo_item)
					{
						?>
							<a class="cb-button cb-button-form cb-ml-3" onclick="seo_item_do(<?=$model->posted_item->id?>)" href="#">AJUKAN PROMOTED</a>
						<?php
					}
					else if (!$model->posted_item->is_seo_item_confirmed)
					{
						?>
							<button type="button" class="cb-button cb-button-form cb-ml-3" disabled>Menunggu Konfirmasi Promoted</button>
						<?php
					}
					else if (!$model->posted_item->is_seo_item_paid)
					{
						?>
							<div class="cb-col-full cb-row cb-mb-5 cb-mt-5">
								<div class="cb-col-fifth cb-label cb-txt-primary-1">
									<div class="cb-pull-left">Jumlah Tagihan Promo</div>
									<div class="cb-pull-right">:</div>
								</div>
								<div class="cb-col-fifth-2 cb-pl-3">
									<input type="text" class="cb-row cb-col-full cb-input-text" id="var_type" value="<?=$model->posted_item->payment_value?>" readonly>
								</div>
							</div>
							<button type="button" class="cb-button cb-button-form cb-ml-3" disabled>Menunggu Pembayaran</button>
							<button type="button" class="cb-button cb-button-form cb-ml-3" onclick="bayar_seo_item_dummy(<?=$model->posted_item->id?>)">Bayar (dummy)</button>
						<?php
					}
					else // if ($is_seo_item_paid)
					{
						?>
							<button type="button" class="cb-button cb-button-form cb-ml-3" disabled>Sudah Promoted Item</button>
						<?php
					}
				?>
			</div>
			<?php
		}
		else if ($model->transaction_detail->item_type == "REPAIR")
		{
			?>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Nama</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="item_name" value="<?=$model->posted_item->posted_item_name?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Deskripsi</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="item_name" value="<?=$model->posted_item->posted_item_description?>" readonly>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Kategori</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="item_name" value="<?=$model->posted_item->category->category_name?>" readonly>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>

<?php
/*
	if ($model->posted_item->item_type == "ORDER")
	{
		$show_div_order = true;
		$show_div_repair = false;
	} else // REPAIR
	{
		$show_div_order = false;
		$show_div_repair = true;
	}
	
?>

<div class="">
	<!-- Order -->
	<div class="panel panel-default" <?php if ($show_div_order===false){?>style="display:none"<?php } ?>>
		<div class="panel-heading">
			<h3>Lihat Item</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_name" 
						value="<?=$model->posted_item->posted_item_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="price">Harga:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="price" 
						value="<?=$model->posted_item->price?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="type">Tipe:</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="type" 
						value="<?=$model->posted_item->item_type?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="unit_weight">Berat(g):</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="unit_weight" 
						value="<?=$model->posted_item->unit_weight?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="description">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="description" 
						value="<?=$model->posted_item->posted_item_description?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Gambar:</label>
					<div class="col-xs-3">
					
						<label for="image_one_name">
							<div id="thumbnail-image_one_name" class="thumbnail thumbnail-hover">
								<img src="<?=$model->posted_item->image_one_name?>" alt="<?=$model->posted_item->image_one_name?>" style="width:100%">
							</div>
						</label>
						<input id="image_one_name" name="image_one_name" value="<?=$model->posted_item->image_one_name?>" data-url="<?=site_url('customer/upload_profpic')?>" type="file" class="photo_upload_simple" style="display:none"/>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="category" 
						value="<?=$model->posted_item->category->category_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="brand">Brand:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="brand" 
						value="<?=$model->posted_item->brand->brand_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="brand">Varian:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="var_type" 
						value="<?=$model->posted_item->var_type[0]?>" readonly></div>
				</div>
				<?php
				$i = 0;
				foreach ($model->posted_item->var_desc as $var_desc)
				{
					?>
					<div class="form-group">
						<label class="control-label col-xs-2 col-xs-offset-3" for="var_desc">Deskripsi:</label>
						<div class="col-xs-7"><input type="text" class="form-control" name="var_desc" 
							value="<?=$model->posted_item->var_desc[$i]?>" readonly></div>
						<label class="control-label col-xs-2 col-xs-offset-3" for="quantity_available">Stok:</label>
						<div class="col-xs-7"><input type="text" class="form-control" name="quantity_available" value="<?=$model->posted_item->quantity_available[$i]?>" readonly></div>
						<label class="control-label col-xs-2 col-xs-offset-3" for="image_two_name">Gambar:</label>
						<div class="col-xs-7">
							<div id="thumbnail-image_two_name" class="thumbnail thumbnail-hover" style="width:30%">
								<img src="<?=$model->posted_item->image_two_name[$i]?>" alt="<?=$model->posted_item->image_two_name[$i]?>" />
							</div>
							<div id="thumbnail-image_three_name" class="thumbnail thumbnail-hover" style="width:30%">
								<img src="<?=$model->posted_item->image_three_name[$i]?>" alt="<?=$model->posted_item->image_three_name[$i]?>" />
							</div>
							<div id="thumbnail-image_four_name" class="thumbnail thumbnail-hover" style="width:30%">
								<img src="<?=$model->posted_item->image_four_name[$i]?>" alt="<?=$model->posted_item->image_four_name[$i]?>" />
							</div>
						</div>
					</div>
					<?php
					$i++;
				}
				?>
			</form>
			<?php
				if (!$model->posted_item->is_hot_item)
				{
					?>
						<a class="btn btn-default" href="<?=site_url('Item/hot_item/'.$model->posted_item->id)?>">Set as Hot Item</a>
					<?php
				}
				else if (!$model->posted_item->is_hot_item_confirmed)
				{
					?>
						<button type="button" class="btn btn-default" disabled>Menunggu Konfirmasi Admin</button>
					<?php
				}
				else if (!$model->posted_item->is_hot_item_paid)
				{
					?>
						<button type="button" class="btn btn-default" disabled>Menunggu Pembayaran</button>
						<button type="button" class="btn btn-default" onclick="bayar_hot_item_dummy(<?=$model->posted_item->hot_item_id?>)">Bayar (dummy)</button>
					<?php
				}
				else // if ($is_hot_item_paid)
				{
					?>
						<button type="button" class="btn btn-default" disabled>Sudah Hot Item</button>
					<?php
				}
				?>
				
			<?php
				if (!$model->posted_item->is_seo_item)
				{
					?>
						<a class="btn btn-default" href="<?=site_url('Item/seo_item_do/'.$model->posted_item->id)?>">Set as SEO</a>
					<?php
				}
				else if (!$model->posted_item->is_seo_item_confirmed)
				{
					?>
						<button type="button" class="btn btn-default" disabled>Menunggu Konfirmasi Admin</button>
					<?php
				}
				else if (!$model->posted_item->is_seo_item_paid)
				{
					?>
						<button type="button" class="btn btn-default" disabled>Menunggu Pembayaran</button>
						<button type="button" class="btn btn-default" onclick="bayar_seo_item_dummy(<?=$model->posted_item->id?>)">Bayar (dummy)</button>
					<?php
				}
				else // if ($is_seo_item_paid)
				{
					?>
						<button type="button" class="btn btn-default" disabled>Sudah SEO Item</button>
					<?php
				}
				?>
		</div>
	</div>
	
	<!-- Repair -->
	<div class="panel panel-default" <?php if ($show_div_repair===false){?>style="display:none"<?php } ?>>
		<div class="panel-heading">
			<h3>Lihat Item</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="description">Nama:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="name" 
						value="<?=$model->posted_item->posted_item_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="description">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="description" 
						value="<?=$model->posted_item->posted_item_description?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="category" 
						value="<?=$model->posted_item->category->category_name?>" readonly></div>
				</div>
			</form>
		</div>
	</div>
</div>
*/
?>