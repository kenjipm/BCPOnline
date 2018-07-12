<div class="cb-row cb-p-5">
	<div class="cb-col-full cb-txt-primary-1 cb-align-left cb-font-title cb-font-size-xl">
		DETAIL PRODUK
	</div>
	<div class="cb-col-full cb-row cb-panel-body cb-bg-primary-3 cb-p-5">
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
									<img src="<?=$model->posted_item->image_two_name[$i]?>" alt="<?=$model->posted_item->image_two_name[$i]?>"/>
								</div>
							</div>
							<div class="cb-col-fifth cb-p-1">
								<div id="thumbnail-image_three_name" class="thumbnail">
									<img src="<?=$model->posted_item->image_three_name[$i]?>" alt="<?=$model->posted_item->image_three_name[$i]?>" />
								</div>
							</div>
							<div class="cb-col-fifth cb-p-1">
								<div id="thumbnail-image_four_name" class="thumbnail">
									<img src="<?=$model->posted_item->image_four_name[$i]?>" alt="<?=$model->posted_item->image_four_name[$i]?>" />
								</div>
							</div>
						</div>
					</div>
					<?php
					$i++;
				}
			?>
		</div>
	</div>
</div>
