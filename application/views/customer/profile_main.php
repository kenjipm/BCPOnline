<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Profile</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('customer/profile')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?=$this->session->id?>"/>
			
				<div class="form-group">
					<label class="control-label col-xs-3" for="profile_pic">Foto Profil:</label>
					<div class="col-xs-3">
					
						<label for="profile_pic">
							<div id="thumbnail-profile_pic" class="thumbnail">
								<img src="<?=$model->account->profile_pic?>" alt="<?=$model->account->name?>" style="width:100%">
							</div>
						</label>
						<input id="profile_pic" name="profile_pic" value="<?=$model->account->profile_pic?>" data-url="<?=site_url('customer/upload_profpic')?>" type="file" style="display:none"/>
						
						<!--div class="thumbnail">
							<img src="<?=$model->account->profile_pic?>" alt="<?=$model->account->name?>" style="width:100%">
						</div>
						<input type="file" id="profile_pic" name="profile_pic" value="<?=$model->account->profile_pic?>" class="form-control" style="display:none">
						<label for="profile_pic" class="btn btn-default">Ubah Foto Profil</label-->
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="customer_id">Customer ID:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="customer_id" name="customer_id" value="<?=$model->account->customer_id?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="name">Nama:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="name" name="name" value="<?=$model->account->name?>" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="address">Alamat:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="address" name="address" value="<?=$model->account->address?>" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_of_birth">Tanggal Lahir:</label>
					<div class="col-xs-6"><input type="text" class="form-control" id="date_of_birth" name="date_of_birth" value="<?=$model->account->date_of_birth?>" ></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="phone_number">No. HP:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="phone_number" name="phone_number" value="<?=$model->account->phone_number?>"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="email">Email:</label>
					<div class="col-xs-4"><input type="text" class="form-control" id="email" name="email" value="<?=$model->account->email?>" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_joined">Terdaftar Sejak:</label>
					<div class="col-xs-4"><input type="text" class="form-control" id="date_joined" name="date_joined" value="<?=$model->account->date_joined?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="identification_pic">Foto Kartu ID:</label>
					<div class="col-xs-3">
					
						<label for="identification_pic">
							<div id="thumbnail-identification_pic" class="thumbnail">
								<img src="<?=$model->account->identification_pic?>" alt="<?=$model->account->identification_no?>" style="width:100%">
							</div>
						</label>
						<input id="identification_pic" name="identification_pic" value="<?=$model->account->identification_pic?>" data-url="<?=site_url('customer/upload_idpic')?>" type="file" style="display:none"/>
						
						<!--div class="thumbnail">
							<img src="<?=$model->account->identification_pic?>" alt="<?=$model->account->identification_no?>" style="width:100%">
						</div>
						<input type="file" id="identification_pic" name="identification_pic" value="<?=$model->account->identification_pic?>" class="form-control" style="display:none">
						<label for="identification_pic" class="btn btn-default">Ubah Foto Kartu ID</label-->
					</div>
				</div>
				<div class="form-group">
					<div class="col-xs-9 col-xs-offset-3 text-danger"><?= $error ?? "" ?></div>
					<div class="col-xs-offset-3 col-xs-4"><button type="submit" class="btn btn-default">Simpan</button></div>
				</div>
			</form>
		</div>
	</div>
</div>