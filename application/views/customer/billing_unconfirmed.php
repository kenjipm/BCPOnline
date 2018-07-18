<div class="cb-txt-primary-1 cb-font-title cb-ml-5">
	<h2><?=$title?></h2>
</div>
<form id="form-cart" action="<?=site_url('billing/confirm')?>" method="post">
	<input type="hidden" name="billing_id" value="<?=$model->billing_id?>"/>
	<div class="cb-row">
		<div class="cb-col-fourth-3 cb-p-5">
			<div class="cb-panel-body cb-bg-primary-3 cb-p-5">
				<?php
				foreach($model->items as $item)
				{
					?>
						<div class="cb-row cb-p-5 cb cb-border-bottom">
							<div class="cb-col-fourth cb-margin-auto">
								<a href="<?=site_url('item/'.$item->posted_item_id)?>">
									<img class="col-md-12" src="<?=$item->image_one_name?>" alt="<?=$item->posted_item_name?>"/>
								</a>
							</div>
							<div class="cb-col-fourth cb-margin-auto">
								<div class="cb-row">
									Produk
								</div>
								<div class="cb-row">
									<a href="<?=site_url('item/'.$item->posted_item_id)?>">
										<div class="cb-label"><?=$item->posted_item_name?></div>
									</a>
								</div>
								<div class="cb-row cb-pt-5">
									<?=$item->var_type?>
								</div>
								<div class="cb-row">
									<div class="cb-label"><?=$item->var_description?></div>
								</div>
								<div class="cb-row cb-pt-5">
									<div class="cb-font-title cb-label"><?=$item->price?></div>
								</div>
							</div>
							<div class="cb-col-fourth cb-margin-auto">
								<div class="cb-row">
									Jumlah
								</div>
								<div class="cb-row">
									<input type="text" value="<?=$item->quantity?>" class="cb-input-text cb-col-fifth-4 text-center" readonly="readonly" />
								</div>
							</div>
							<div class="cb-col-fourth cb-margin-auto cb-pl-5">
								<div class="cb-row">
									Total
								</div>
								<div class="cb-row">
									<div class="cb-col-fifth-4">
										<div class="cb-label"><?=$item->price_total?></div>
									</div>
								</div>
								
							</div>
						</div>
					<?php
				}
				if (count($model->items) <= 0)
				{
					?>
					<label>Keranjang Belanja Anda Kosong</label>
					<?php
				}
				?>
				<hr/>
				<div class="cb-row">
					<div class="cb-col-third-2">
					</div>
					<div class="cb-col-third pull-right cb-p-5">
						<div class="cb-row">
							<div class="cb-col-third">
								Total
							</div>
							<div class="cb-col-third-2 pull-right">
								<div class="cb-label cb-align-right"><?=$model->price_total?></div>
							</div>
						</div>
					</div>
				</div>
				<div class="cb-row">
					<div class="cb-col-full cb-p-5">
					<?php
						if (count($model->items) > 0)
						{
							?>
							<a href="#" class="cb-button-form pull-right" onclick="confirm_bill();">Pilih Metode Pembayaran</a>
							<?php
						}
						else
						{
							?>
							<a href="<?=site_url('')?>" class="cb-button-form pull-right">Lanjut Belanja</a>
							<?php
						}
					?>
					</div>
				</div>
			</div>
		</div>
		<div class="cb-col-fourth cb-pr-5 cb-pt-5">
			<div class="cb-panel-body cb-bg-primary-3 cb-pl-5">
				<div class="cb-txt-primary-1">
					<h3><div class="cb-label"> Alamat Kirim </div></h3>
				</div>
				<div class="cb-row cb-pb-5">
					<div class="cb-col-full cb-align-center">
						<?php
							if (count($model->shipping_addresses) > 0)
							{
								?>
								<select name="address_id" id="address_id" class="cb-form-control">
									<?php
										foreach ($model->shipping_addresses as $shipping_address)
										{
											?>
											<option value="<?=$shipping_address->id?>">
												<?=$shipping_address->full_address?>
											</option>
											<?php
										}
									?>
								</select>
								<br/>
								<?php
							}
							?>
							<button type="button" onclick="popup.open('popup_address'); initMap()" class="cb-button-form"><?=$model->btn_address_text?></button>
							<?php
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>

<!--
<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default">
			<form id="form-cart" action="<?=site_url('billing/confirm')?>" method="post">
				<div class="panel-heading">
					<h3><?=$title?></h3>
				</div>
				<div class="panel-body">
					<input type="hidden" name="billing_id" value="<?=$model->billing_id?>"/>
					<?php
					foreach($model->items as $item)
					{
						?>
							<div class="row">
								<div class="col-md-2">
									<a href="<?=site_url('item/'.$item->posted_item_id)?>">
										<img class="col-md-12" src="<?=$item->image_one_name?>" alt="<?=$item->posted_item_name?>"/>
									</a>
								</div>
								<div class="col-md-5">
									<div class="row">
										<a href="<?=site_url('item/'.$item->posted_item_id)?>">
											<label><?=$item->posted_item_name?></label><br/>
											<?=$item->var_type?>: <?=$item->var_description?>
										</a>
									</div>
									<div class="row">
										<?=$item->price?>
									</div>
								</div>
								<div class="col-md-2">
									<div class="input-group">
										<input type="text" value="<?=$item->quantity?>" class="form-control text-center" readonly="readonly"/>
									</div>
								</div>
								<div class="col-md-2">
									<?=$item->price_total?>
								</div>
							</div>
						<?php
					}
					if (count($model->items) <= 0)
					{
						?>
						<label>Keranjang Belanja Anda Kosong</label>
						<?php
					}
					?>
					<hr/>
					<div class="row">
						<div class="col-md-8">
							<div class="panel panel-default">
								<div class="panel-body">
									<div class="row">
										<div class="col-md-12">
											<label>Alamat Kirim</label>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<?php
												if (count($model->shipping_addresses) > 0)
												{
													?>
													<select name="address_id" id="address_id" class="form-control">
														<?php
															foreach ($model->shipping_addresses as $shipping_address)
															{
																?>
																<option value="<?=$shipping_address->id?>">
																	<?=$shipping_address->full_address?>
																</option>
																<?php
															}
														?>
													</select>
													<br/>
													<?php
												}
												?>
												<button type="button" onclick="popup.open('popup_address'); initMap()" class="btn btn-default"><?=$model->btn_address_text?></button>
												<?php
											?>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="col-md-2">
							<label>Ongkos Kirim</label>
						</div>
						<div class="col-md-2">
							<?=$model->shipping_charge?>
						</div>
					</div>
					<hr/>
					<div class="row">
						<div class="col-md-2">
						</div>
						<div class="col-md-6">
						</div>
						<div class="col-md-2">
							<label>Total</label>
						</div>
						<div class="col-md-2">
							<b><?=$model->price_total?></b>
						</div>
					</div>
				</div>
				<div class="panel-footer">
					<div class="row">
						<div class="col-md-3 col-md-offset-9">
							<?php
								if (count($model->items) > 0)
								{
									?>
									<a href="#" class="btn btn-default" onclick="confirm_bill();">Pilih Metode Pembayaran</a>
									<?php
								}
								else
								{
									?>
									<a href="<?=site_url('')?>" class="btn btn-default">Lanjut Belanja</a>
									<?php
								}
							?>
						</div>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
-->

<!---------------- POP UP TAMBAH ALAMAT --------------------->
<div id="popup_address" class="popup popup-lg">
	<div class="panel panel-default">
		<div class="panel-heading">
			Tambah Alamat
		</div>
		<div class="panel-body">
			<form class="form-horizontal" method="post" action="<?=site_url('customer/address_add_do')?>">
				<div class="form-group">
					<div class="col-sm-3">
						<label>Alamat</label>
					</div>
					<div class="col-sm-9">
						<input type="text" name="address_detail" id="address_detail" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label>Provinsi</label>
					</div>
					<div class="col-sm-6">
						<select id="ro_province_id" name="ro_province_id" class="form-control">
						</select>
						<input type="hidden" id="province" name="province"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label>Kota</label>
					</div>
					<div class="col-sm-6">
						<select id="ro_city_id" name="ro_city_id" class="form-control">
						</select>
						<input type="hidden" id="city" name="city"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label>Kecamatan</label>
					</div>
					<div class="col-sm-6">
						<input type="text" name="kecamatan" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label>Kelurahan</label>
					</div>
					<div class="col-sm-6">
						<input type="text" name="kelurahan" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label>Kode Pos</label>
					</div>
					<div class="col-sm-3">
						<input type="text" name="postal_code" class="form-control"/>
					</div>
				</div>
				<?php /* <div class="form-group">
					<div class="col-sm-3">
						<label>Peta</label>
					</div>
					<div class="col-sm-9">
						<div class="panel panel-default">
							<div class="panel-body" style="height: 400px; width: auto">
								<?php $this->load->view('googlemaps'); ?>
							</div>
						</div>
					</div>
				</div> */ ?>
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-default" id="btn-address_add" >Tambah</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_address')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>