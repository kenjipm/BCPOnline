
<div class="col-sm-8 col-sm-offset-2">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftarkan Deliverer Baru</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<h4>Data Kendaraan</h4>
				<div class="form-group">
					<label class="control-label col-xs-3" for="license_plate">Nomor Plat</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="license_plate"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="vehicle_desc">Deskripsi Kendaraan</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="vehicle_desc"></div>
				</div>
				
				<h4>Data Pengirim</h4>
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="name"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="address">Alamat</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="address"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_of_birth">Tanggal Lahir</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="date_of_birth"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="phone_number">No. HP</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="phone_number"></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="identification_no">No. ID</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="identification_no"></div>
				</div>
					
				<h4>Account</h4>
				<div class="form-group">
					<label class="control-label col-xs-3" for="email">Email</label>
					<div class="col-xs-9"><input type="text" class="form-control" name="email"></div>
				</div>
				<div class="form-group">
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= $error ?? "" ?></div>
					<div class="col-xs-offset-10">
						<button type="submit" class="btn btn-default">Buat Akun</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>