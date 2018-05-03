<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">UBAH ATURAN POIN</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<form action="<?=site_url('reward/setting_reward')?>" class="form-horizontal" method="post" enctype="multipart/form-data">
	<input type="hidden" id="setting_reward_id" name="setting_reward_id" value="<?=$model->setting_reward->id?>"/>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Nama Event</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth-3">
				<input type="text" class="cb-input-text cb-col-full" name="event_name" value="<?=$model->setting_reward->event_name?>"/>
				<span class="text-danger"><?= form_error('event_name'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Base Percent</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth">
				<input type="text" class="cb-input-text cb-col-full" name="base_percent" value="<?=$model->setting_reward->base_percent?>"/>
				<span class="text-danger"><?= form_error('base_percent'); ?></span>
			</div>
			<div class="cb-row cb-col-tenth"></div>
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Ratio Percent</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth">
				<input type="text" class="cb-input-text cb-col-full" name="ratio_percent" value="<?=$model->setting_reward->ratio_percent?>"/>
				<span class="text-danger"><?= form_error('ratio_percent'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Harga Pembelanjaan</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth">
				<input type="text" class="cb-input-text cb-col-full" name="price_per_point" value="<?=$model->setting_reward->price_per_point?>"/>
				<span class="text-danger"><?= form_error('price_per_point'); ?></span>
			</div>
			<div class="cb-row cb-col-tenth">
			</div>
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Poin Didapat</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth">
				<input type="text" class="cb-input-text cb-col-full" name="point_get" value="<?=$model->setting_reward->point_get?>"/>
				<span class="text-danger"><?= form_error('point_get'); ?></span>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Berlaku Sejak</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth">
				<input type="text" class="cb-input-text cb-col-full datetimepicker" name="date_created" value="<?=$model->setting_reward->date_created?>" autocomplete="off"/>
				<span class="text-danger"><?= form_error('date_created'); ?></span>
			</div>
			<div class="cb-row cb-col-tenth">
			</div>
			<div class="cb-col-fifth">
				<div class="cb-row">
					<div class="cb-col-fifth-4">
						<div class="cb-txt-primary-1 cb-pull-left">
							<div class="cb-label"> Berlaku Hingga</div>
						</div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center">
							<div class="cb-txt-primary-1">
								<div class="cb-label"> : </div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="cb-row cb-col-fifth">
				<input type="text" class="cb-input-text cb-col-full datetimepicker" name="date_expired" value="<?=$model->setting_reward->date_expired?>" autocomplete="off"/>
				<span class="text-danger"><?= form_error('date_expired'); ?></span>
			</div>
			<div class="cb-row cb-col-tenth">
				<input type="checkbox" name="expire" value="forever" <?=$model->setting_reward->is_forever ? "checked" : ""?>>Selamanya
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-tenth-9">
			</div>
			<div class="cb-row cb-col-tenth">
				<button type="submit" class="cb-button-form">KIRIM</button></div>
				<?php
					if ($model->is_existed)
					{
						?>
						<button type="button" class="cb-button-form" onclick="popup.open('popup_approval')">Keputusan</button>
						<?php
						$this->load->view('admin/popup/approval');
					}
				?>
			</div>
		</div>
	</form>
</div>

<?php /*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Setting Reward</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('reward/setting_reward')?>" class="form-horizontal" method="post">
				<input type="hidden" id="setting_reward_id" name="setting_reward_id" value="<?=$model->setting_reward->id?>"/>
				<div class="form-group">
					<label class="control-label col-xs-2" for="event_name">Nama Event:</label>
					<div class="col-xs-10"><input type="text" class="form-control" name="event_name" value="<?=$model->setting_reward->event_name?>"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('event_name'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="base_percent">Base Percent:</label>
					<div class="col-xs-2"><input type="text" class="form-control" name="base_percent" value="<?=$model->setting_reward->base_percent?>"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('base_percent'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="ratio_percent">Ratio Percent:</label>
					<div class="col-xs-2"><input type="text" class="form-control" name="ratio_percent" value="<?=$model->setting_reward->ratio_percent?>"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('ratio_percent'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="price_per_point">Harga Poin:</label>
					<div class="col-xs-3"><input type="text" class="form-control" name="price_per_point" value="<?=$model->setting_reward->price_per_point?>"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('price_per_point'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="point_get">Poin Didapat:</label>
					<div class="col-xs-2"><input type="text" class="form-control" name="point_get" value="<?=$model->setting_reward->point_get?>"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('point_get'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="date_created">Berlaku Sejak:</label>
					<div class="col-xs-4"><input type="text" class="form-control datetimepicker" name="date_created" value="<?=$model->setting_reward->date_created?>" autocomplete="off"></div>
					<span class="col-xs-9 col-xs-offset-3 text-danger"><?= form_error('date_created'); ?></span>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-2" for="date_expired">Berlaku Hingga:</label>
					<div class="col-xs-4"><input type="text" class="form-control datetimepicker" name="date_expired" value="<?=$model->setting_reward->date_expired?>" autocomplete="off"/></div>
					<input type="checkbox" name="expire" value="forever" <?=$model->setting_reward->is_forever ? "checked" : ""?>>Selamanya
				</div>
				
				<div class="form-group">
					<div class="col-xs-offset-2 col-xs-1"><button type="submit" class="btn btn-default">Kirim</button></div>
					<?php
						if ($model->is_existed)
						{
							?>
							<div class="col-xs-1"><button type="button" class="btn btn-default" onclick="popup.open('popup_approval')">Keputusan</button></div>
							<?php
							$this->load->view('admin/popup/approval');
						}
					?>
				</div>
			</form>
		</div>
	</div>
</div>
*/ ?>