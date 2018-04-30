<form class="form-horizontal" id="form-hot_item" action="<?=site_url('item/hot_item/'. $model->posted_item->id)?>" method="post">
	<div class="cb-row cb-p-5">
		<div class="cb-col-full cb-txt-primary-1 cb-align-left cb-font-title cb-font-size-xl">
			AJUKAN HOT ITEM
		</div>
		<div class="cb-col-full cb-row cb-panel-body cb-bg-primary-3 cb-p-5">
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Nama Barang</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="item_name" value="<?=$model->posted_item->posted_item_name?>" readonly/>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Kategori</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="category" value="<?=$model->posted_item->category->category_name?>" readonly/>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Brand</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="collection_method" value="<?=$model->posted_item->brand->brand_name?>" readonly/>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Harga Awal</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" id="price" value="<?=$model->posted_item->price?>" readonly/>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Harga Promo</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" name="promo_price" value="0"/>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth cb-label cb-txt-primary-1">
					<div class="cb-pull-left">Deskripsi Promo</div>
					<div class="cb-pull-right">:</div>
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<input type="text" class="cb-row cb-col-full cb-input-text" name="promo_description" value=""/>
				</div>
			</div>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth">
				</div>
				<div class="cb-col-fifth-2 cb-pl-3">
					<button class="cb-button cb-button-form cb-ml-3" type="button" onclick="hot_item_do()" >AJUKAN</button>
				</div>
			</div>
		</div>
	</div>
</form>

<?php
/*
<div class="">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Hot Item</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?=site_url('item/hot_item/'. $model->posted_item->id)?>" class="form-horizontal" method="post">
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="posted_item_name" 
						value="<?=$model->posted_item->posted_item_name?>" readonly></div>
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
					<label class="control-label col-xs-3" for="price">Harga Awal:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="price" 
						value="<?=$model->posted_item->price?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="promo_price">Harga Promo:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="promo_price"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="promo_description">Deskripsi Promo:</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="promo_description"></div>
				</div>
				<div class="form-group">
					<button class="btn btn-default" type="submit">Set as Hot Item</button>
				</div>
			</form>
		</div>
	</div>
</div>
*/
?>