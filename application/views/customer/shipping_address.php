<div class="cb-panel-heading cb-pl-5 cb-pr-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<div class="cb-txt-primary-1 cb-font-title cb-font-size-xl">DAFTAR ALAMAT KIRIM</div>
		</div>
		<div class="cb-col-half">
			<a class="cb-button-form pull-right" onclick="popup.open('popup_address'); initMap();">
				+ TAMBAH ALAMAT
			</a>
		</div>
	</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-tenth cb-align-center">
			<div class="cb-label cb-font-title"> Utama </div>
		</div>
		<div class="cb-col-tenth-9">
			<div class="cb-label cb-font-title cb-align-center"> Alamat </div>
		</div>
		<?php /*<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center">  </div>
		</div>*/ ?>
	</div>
	<?php
	foreach($model->shipping_addresses as $shipping_address)
	{
		?>
		<div class="cb-row cb-pt-5 cb-pb-5 cb-border-top">
			<div class="cb-col-tenth cb-align-center">
				<input type="radio" name="is_primary" <?=$shipping_address->is_primary_attr?> onclick="shipping_address_set_primary(<?=$shipping_address->id?>)"/>
			</div>
			<div class="cb-col-tenth-7">
				<div class="cb-align-center"> <?=$shipping_address->full_address?> </div>
			</div>
			<div class="cb-col-tenth-2">
				<div class="cb-align-center">
					<button class="cb-button cb-button-form" type="button" onclick="shipping_address_delete(<?=$shipping_address->id?>)"> Hapus </button>
				</div>
			</div>
		</div>
		<?php
	}
	?>
</div>

<!---------------- POP UP TAMBAH ALAMAT --------------------->
<div id="popup_address" class="popup popup-lg">
	<div class="panel panel-default">
		<div class="panel-heading">
			Tambah Alamat Kirim
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
				<div class="form-group">
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
				</div>
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="submit" class="btn btn-default" id="btn-address_add">Tambah</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_address')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
/*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
		<div class="panel-body">
		<div>
			<button type="button" onclick="popup.open('popup_address'); initMap()" class="btn btn-default">Tambah</button>
		</div>
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<td> <label class="control-label">Utama</label></td>
						<td> <label class="control-label">Alamat</label></td>
						<td> </td>
					</thead>
					<tbody>
						<?php
						foreach($model->shipping_addresses as $shipping_address)
						{
							?>
							<tr>
								<td>
									<input type="radio" name="is_primary" <?=$shipping_address->is_primary_attr?> onclick="shipping_address_set_primary(<?=$shipping_address->id?>)"/>
								</td>
								<td>
									<?=$shipping_address->full_address?>
								</td>
								<td>
									<a onclick="shipping_address_delete(<?=$shipping_address->id?>)">
										<button class="btn btn-default">Hapus</button>
									</a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
*/
?>
