<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Lihat Item</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="name" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="price">Harga:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="price" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="type">Tipe:</label>
					<div class="col-xs-9">
						<label class="control-label">
							<input type="radio" name="type" id="type_order" readonly disabled="disabled"> Order
						</label>
						<label class="control-label">
							<input type="radio" name="type" id="type_repair" readonly disabled="disabled"> Repair
						</label>
						<label class="control-label">
							<input type="radio" name="type" id="type_bid" readonly checked="checked"> Bid
						</label>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="quantity_avalaible">Jumlah Stok:</label>
					<div class="col-xs-2"><input type="text" class="form-control" id="quantity_avalaible" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="unit_weight">Berat(kg):</label>
					<div class="col-xs-2"><input type="text" class="form-control" id="unit_weight" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="description">Deskripsi:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="description" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="image">Gambar:</label>
					<div class="col-xs-9"><img src="img/favicon.gif" alt="Image3" style="width:50%"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="category">Kategori:</label>
					<div class="col-xs-6">
						<select class="form-control" id="category" disabled>
							<option>Kategori 1</option>
							<option>Kategori 2</option>
							<option>Kategori 3</option>
							<option>Kategori 4</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="brand">Brand:</label>
					<div class="col-xs-6">
						<select class="form-control" id="brand" disabled>
							<option>Brand 1</option>
							<option>Brand 2</option>
							<option>Brand 3</option>
							<option>Brand 4</option>
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-11"><button type="submit" class="btn btn-default">Edit</button></div>
				</div>
			</form>
		</div>
	</div>
</div>