<?php
	$accounts[0]['username'] = 'vanji';
	$accounts[0]['address'] = 'sudirman';
	$accounts[1]['username'] = 'kenji';
	$accounts[1]['address'] = 'sudirman';
?>

<h1><?=$echo?></h1>
<form>
	<div class="form-group">
		<label for="name">Nama:</label>
		<input type="text" class="form-control" id="name">
	</div>
	<div class="form-group">
		<label for="price">Harga:</label>
		<input type="text" class="form-control" id="price">
	</div>
	<div class="form-group">
		<label for="type">Tipe:</label>
		<label>
			<input type="radio" name="type" id="type_order"> Order
		</label>
		<label>
			<input type="radio" name="type" id="type_repair"> Repair
		</label>
		<label>
			<input type="radio" name="type" id="type_bid"> Bid
		</label>
	</div>
	<div class="form-group">
		<label for="quantity_avalaible">Jumlah Stok:</label>
		<input type="text" class="form-control" id="quantity_avalaible">
	</div>
	<div class="form-group">
		<label for="unit_weight">Berat:</label>
		<input type="text" class="form-control" id="unit_weight">
	</div>
	<div class="form-group">
		<label for="description">Deskripsi:</label>
		<input type="text" class="form-control" id="description">
	</div>
	<div class="form-group">
		<label for="image">Unggah Gambar:</label>
		<input type="file" class="form-control" id="image_one_name">
	</div>
	<div class="form-group">
		<label for="category">Kategori:</label>
		<select class="form-control" id="category">
			<option>Kategori 1</option>
			<option>Kategori 2</option>
			<option>Kategori 3</option>
			<option>Kategori 4</option>
		</select>
	</div>
	<div class="form-group">
		<label for="brand">Brand:</label>
		<select class="form-control" id="brand">
			<option>Brand 1</option>
			<option>Brand 2</option>
			<option>Brand 3</option>
			<option>Brand 4</option>
		</select>
	</div>
	<div class="checkbox">
		<label><input type="checkbox"> Remember me</label>
	</div>
	
	<button type="submit" class="btn btn-default">Submit</button>
</form>