<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">DAFTAR REWARD</h3>
		</div>
		<div class="cb-col-half cb-p-5">
			<a href="<?=site_url('reward/create_reward')?>" class="cb-button-form pull-right">+ TAMBAH REWARD</a>
		</div>
	</div>
</div>

<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Reward </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Poin Dibutuhkan </div>
		</div>
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Tanggal Berlaku </div>
		</div>
	</div>
	<?php
	foreach($model->rewards as $reward)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth-2">
				<div class=" cb-align-center"> <?=$reward->reward_description?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$reward->points_needed?> </div>
			</div>
			<div class="cb-col-fifth-2">
				<div class="cb-align-center"> <?=$reward->date_added?> s/d <?=$reward->date_expired?> </div>
			</div>
			<div id="popup_reward_detail" class="popup popup-md">
				<div class="panel panel-default">
					<div class="panel-heading">
						Detil Reward
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-4">
									<label>Deskripsi:</label>
								</div>
								<div class="col-sm-8">
									<input type="text" value="<?=$reward->reward_description?>" class="form-control" id="voucher_description" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<label>Nilai Voucher:</label>
								</div>
								<div class="col-sm-8">
									<input type="text" value="<?=$reward->points_needed?>" class="form-control" id="voucher_worth" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<label>Jumlah Stok:</label>
								</div>
								<div class="col-sm-8">
									<input type="text" value="<?=$reward->date_added?> s/d <?=$reward->date_expired?>" class="form-control" name="voucher_stock" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-7 col-sm-offset-4">
									<button type="button" class="cb-button-form" onclick="popup.close('popup_reward_detail')">Tutup</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
	?>
	<div class="cb-row cb-p-5">
		<a class="cb-button-form" onclick="popup.open('popup_setting_reward')">
			SETTING REWARD
		</a>
	</div>
</div>



<div id="popup_setting_reward" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Setting Reward
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-2">
						<label>Event:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->setting_reward->event_name?>" class="form-control" id="event_name" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Base / Ratio Percent:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->setting_reward->base_percent?> / <?=$model->setting_reward->ratio_percent?>" class="form-control" id="percent" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Setting Poin:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->setting_reward->price_per_point?> rupiah per <?=$model->setting_reward->point_get?> poin" class="form-control" id="points_needed" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-2">
						<label>Berlaku:</label>
					</div>
					<div class="col-sm-10">
						<input type="text" value="<?=$model->setting_reward->date_created?> s/d <?=$model->setting_reward->date_expired?>" class="form-control" id="points_needed" readonly>
					</div>
				</div>
				<div class="form-group">
					<div class="cb-row">
						<div class="cb-col-fifth cb-p-5">
							<a href="<?=site_url('reward/setting_reward')?>">
								<button type="button" class="cb-button-form">UBAH</button>
							</a>
						</div>
						<div class="cb-col-fifth-3">
						</div>
						<div class="cb-col-fifth cb-p-5">
							<button type="button" class="cb-button-form" onclick="popup.close('popup_setting_reward')">TUTUP</button>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>


<?php /*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Reward</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="reward_description">Reward</label></th>
							<th> <label for="points_needed">Poin Dibutuhkan</label></th>
							<th> <label for="reward_date">Tanggal Berlaku</label></th>	
							<th> </th>	
							<!--<th> </th>
							<th> </th> -->
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->rewards as $reward)
						{
							?>
							<tr>
								<td>
									<?=$reward->reward_description?> </td>
								<td>
									<?=$reward->points_needed?> </td>
								<td>
									<?=$reward->date_added?> s/d <?=$reward->date_expired?></td>
								<td>
									<button class="btn btn-default" onclick="popup.open('popup_reward_detail')">Lihat</button>
									</td>
								</a>
							</tr>
														
							<div id="popup_reward_detail" class="popup popup-md">
								<div class="panel panel-default">
									<div class="panel-heading">
										Detil Reward
									</div>
									<div class="panel-body">
										<form class="form-horizontal">
											<div class="form-group">
												<div class="col-sm-4">
													<label>Reward:</label>
												</div>
												<div class="col-sm-8">
													<input type="text" value="<?=$reward->reward_description?>" class="form-control" id="reward_description" readonly>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-4">
													<label>Tanggal Berlaku:</label>
												</div>
												<div class="col-sm-8">
													<input type="text" value="<?=$reward->date_added?> s/d <?=$reward->date_expired?>" class="form-control" id="date" readonly>
												</div>
											</div>
											<div class="form-group">
												<div class="col-sm-4">
													<label>Poin Dibutuhkan:</label>
												</div>
												<div class="col-sm-8">
													<input type="text" value="<?=$reward->points_needed?>" class="form-control" id="points_needed" readonly>
												</div>
											</div>
										</form>
										<div class="form-group">
										<div class="col-sm-7 col-sm-offset-4">
											<button type="button" class="btn btn-default" onclick="popup.close('popup_reward_detail')">Tutup</button>
										</div>
									</div>
								</div>
							</div>
							<?php
						}
						?>	
					</tbody>
				</table>
				<a class="btn btn-default" href="<?=site_url('reward/create_reward')?>">
					Buat Reward
				</a>
				<a class="btn btn-default" href="<?=site_url('reward/setting_reward')?>">
					Setting Reward
				</a>
				<a class="btn btn-default" onclick="popup.open('popup_setting_reward')">
					Lihat Setting Reward
				</a>
			</div>
		</div>
	</div>
</div>
*/ ?>