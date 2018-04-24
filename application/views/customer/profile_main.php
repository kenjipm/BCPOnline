<div class="cb-txt-primary-1">
	<h2>Profil Saya</h2>
</div>
<form action="<?=site_url('customer/profile')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
<div class="cb-row">
	<div class="cb-col-fifth">
		<div class="panel-profile-pic-header">
			<div id="thumbnail-profile_pic" class="profile-thumbnail">
				<img src="<?=$model->account->profile_pic?>" alt="<?=$model->account->name?>" style="width:100%">
				<input id="profile_pic" name="profile_pic" value="<?=$model->account->profile_pic?>" data-url="<?=site_url('customer/upload_profpic')?>" type="file" class="photo_upload_simple" style="display:none"/>
				<div class="panel-profile-pic-footer">
					<div class="cb-txt-secondary-1">
						<h4>Bergabung sejak</br>
						<?=$model->account->date_joined?>
						</h4>
					</div>
				</div>
				<div class="cb-txt-primary-2">
					<h3>Poin saya: <?=$model_reward->reward_points?></h3>
				</div>
				<div class="cb-row cb-p-5">
					<a href="reward" class="cb-button-form cb-margin-auto"> TUKARKAN POIN </a>
				</div>
			</div>
		</div>
	</div>
	<div class="cb-panel-body cb-bg-primary-3">
			<div class="cb-row cb-p-5">
				<div class="cb-col-half cb-pl-5 cb-border-right">
					<div class="cb-row cb-mb-5 cb-mt-5">
						<div class="cb-col-third">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Customer ID </div>
							</div>
							<div class="cb-pull-right">
								<div class="cb-txt-primary-1">
									<div class="cb-label"> : </div>
								</div>
							</div>
						</div>
						<div class="cb-col-third-2">
							<input type="text" class="cb-input-text" id="customer_id" name="customer_id" value="<?=$model->account->customer_id?>" readonly/>
						</div>
					</div>
					<div class="cb-row cb-mb-5">
						<div class="cb-col-third">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Nama</div>
							</div>
							<div class="cb-pull-right">
								<div class="cb-txt-primary-1">
									<div class="cb-label"> : </div>
								</div>
							</div>
						</div>
						<div class="cb-col-third-2">
							<input type="text" class="cb-input-text" id="name" name="name" value="<?=$model->account->name?>">
						</div>
					</div>
					<div class="cb-row cb-mb-5">
						<div class="cb-col-third">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Alamat</div>
							</div>
							<div class="cb-pull-right">
								<div class="cb-txt-primary-1">
									<div class="cb-label"> : </div>
								</div>
							</div>
						</div>
						<div class="cb-col-third-2">
							<textarea class="cb-input-text" name="posted_item_description" placeholder="<?=$model->account->address; ?>" style="resize:none" readonly/></textarea>
						</div>
					</div>
					<div class="cb-row cb-mb-5">
						<div class="cb-col-third">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Tanggal Lahir </div>
							</div>
							<div class="cb-pull-right">
								<div class="cb-txt-primary-1">
									<div class="cb-label"> : </div>
								</div>
							</div>
						</div>
						<div class="cb-col-third-2">
							<input type="text" class="cb-input-text" id="date_of_birth" name="date_of_birth" value="<?=$model->account->date_of_birth?>">
						</div>
					</div>
					<div class="cb-row cb-mb-5">
						<div class="cb-col-third">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> No. HP</div>
							</div>
							<div class="cb-pull-right">
								<div class="cb-txt-primary-1">
									<div class="cb-label"> : </div>
								</div>
							</div>
						</div>
						<div class="cb-col-third-2">
							<input type="text" class="cb-input-text" id="phone_number" name="phone_number" value="<?=$model->account->phone_number?>">
						</div>
					</div>
					<div class="cb-row cb-mb-5">
						<div class="cb-col-third">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Email </div>
							</div>
							<div class="cb-pull-right">
								<div class="cb-txt-primary-1">
									<div class="cb-label"> : </div>
								</div>
							</div>
						</div>
						<div class="cb-col-third-2">
							<input type="text" class="cb-input-text" id="email" name="email" value="<?=$model->account->email?>">
						</div>
					</div>
				</div>
				<div class="cb-col-half cb-pl-5">
					<div class="cb-row cb-mb-5 cb-mt-5">
						<div class="cb-col-third">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Foto Kartu ID </div>
							</div>
							<div class="cb-pull-right">
								<div class="cb-txt-primary-1">
									<div class="cb-label"> : </div>
								</div>
							</div>
						</div>
						<div class="cb-col-third-2">
							<div class="panel-profile-pic-header">
								<div id="thumbnail-identification_pic" class="thumbnail thumbnail-hover">
									<img src="<?=$model->account->identification_pic?>" alt="<?=$model->account->identification_no?>" style="width:100%">
								</div>
							</div>
						</div>
					</div>
					<div class="cb-row cb-mb-5">
						<div class="cb-col-third">
							<div class="cb-txt-primary-1 cb-pull-left">
								<div class="cb-label"> Link Referral</div>
							</div>
							<div class="cb-pull-right">
								<div class="cb-txt-primary-1">
									<div class="cb-label"> : </div>
								</div>
							</div>
						</div>
						<div class="cb-col-third-2">
							<input type="text" class="cb-input-text" id="referral_link" name="referral_link" value="<?=$model->account->referral_link?>">
							<button type="button" onclick="$('#referral_link').select();document.execCommand('Copy');" class="btn btn-default">Copy</button>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-p-5">
				<button type="submit" class="cb-button-form cb-margin-auto">SIMPAN</button>
			</div>
		
	</div>
</div>
</form>

<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<h2 class="cb-align-center">HISTORI PENUKARAN POIN</h2>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Tanggal </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Nama Reward </div>
		</div>
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Deskripsi </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Poin yang Ditukarkan </div>
		</div>
	</div>
	<?php
	foreach($model_reward_redeem->redeem_rewards as $redeem_reward)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top">
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$redeem_reward->date_redeemed?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$redeem_reward->reward->name?> </div>
			</div>
			<div class="cb-col-fifth-2">
				<div class="cb-align-center"> <?=$redeem_reward->reward->reward_description?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$redeem_reward->reward->points_needed?> </div>
			</div>
		</div>
		<?php
	}
	?>
</div>


<!--
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Profile</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('customer/profile')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
				<input type="hidden" name="id" value="<?=$this->session->id?>"/>
		
				<div class="form-group">
					<label class="control-label col-xs-3">Foto Profil:</label>
					<div class="col-xs-3">
					
						<label for="profile_pic">
							<div id="thumbnail-profile_pic" class="thumbnail thumbnail-hover">
								<img src="<?=$model->account->profile_pic?>" alt="<?=$model->account->name?>" style="width:100%">
							</div>
						</label>
						<input id="profile_pic" name="profile_pic" value="<?=$model->account->profile_pic?>" data-url="<?=site_url('customer/upload_profpic')?>" type="file" class="photo_upload_simple" style="display:none"/>
						
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
					<label class="control-label col-xs-3" for="address">Alamat Kirim:</label>
					<div class="col-xs-9"><a href="<?=site_url('customer/shipping_address')?>" class="btn btn-default">Lihat</a></div>
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
					<label class="control-label col-xs-3" for="referral_link">Referral Link:</label>
					<div class="col-xs-4"><input type="text" class="form-control" id="referral_link" name="referral_link" value="<?=$model->account->referral_link?>" readonly/></div>
					<div class="col-xs-1"><button type="button" onclick="$('#referral_link').select();document.execCommand('Copy');" class="btn btn-default">Copy</button></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Foto Kartu ID:</label>
					<div class="col-xs-3">
					
						<label for="identification_pic">
							<div id="thumbnail-identification_pic" class="thumbnail thumbnail-hover">
								<img src="<?=$model->account->identification_pic?>" alt="<?=$model->account->identification_no?>" style="width:100%">
							</div>
						</label>
						<input id="identification_pic" name="identification_pic" value="<?=$model->account->identification_pic?>" data-url="<?=site_url('customer/upload_idpic')?>" type="file" class="photo_upload_simple" style="display:none"/>
						
						<!--div class="thumbnail">
							<img src="<?=$model->account->identification_pic?>" alt="<?=$model->account->identification_no?>" style="width:100%">
						</div>
						<input type="file" id="identification_pic" name="identification_pic" value="<?=$model->account->identification_pic?>" class="form-control" style="display:none">
						<label for="identification_pic" class="btn btn-default">Ubah Foto Kartu ID</label
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
-->