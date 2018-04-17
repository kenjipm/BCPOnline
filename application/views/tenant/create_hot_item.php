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