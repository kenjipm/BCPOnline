<?php
	// Model untuk customer cart
	
	// dummy session
	// $model->items[0] = new class{};
	// $model->items[0]->id = 1;
	// $model->items[0]->name = "Charger Samsung";
	// $model->items[0]->quantity = 2;
	// $model->items[0]->price = "Rp 250.000";
	// $model->items[0]->price_total = "Rp 500.000";
	// $model->items[0]->image_one_name = site_url("img/upload/user1/charger_samsung.jpg");
	
	// $model->items[1] = new class{};
	// $model->items[1]->id = 2;
	// $model->items[1]->name = "Dompet Doraemon";
	// $model->items[1]->quantity = 1;
	// $model->items[1]->price = "Rp 40.000";
	// $model->items[1]->price_total = "Rp 40.000";
	// $model->items[1]->image_one_name = site_url("img/upload/user1/doraemon.jpg");
	
	// $model->price_subtotal = "Rp 540.000";
	// $model->shipping_charge = "Rp 11.000";
	// $model->address = "Jalan Perjuangan Raya 17, Marga Mulya, Bekasi Utara, Kota Bks, Jawa Barat 17143";
	// $model->price_total = "Rp 551.000";
?>

<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Shopping Cart</h3>
			</div>
			<div class="panel-body">
				<?php
				foreach($model->items as $item)
				{
					?>
						<div class="row">
							<div class="col-md-2">
								<a href="<?=site_url('item/'.$item->id)?>">
									<img class="col-md-12" src="<?=$item->image_one_name?>" alt="<?=$item->posted_item_name?>"/>
								</a>
							</div>
							<div class="col-md-6">
								<div class="row">
									<a href="<?=site_url('item/'.$item->id)?>">
										<label><?=$item->posted_item_name?></label>
									</a>
								</div>
								<div class="row">
									<?=$item->price?>
								</div>
							</div>
							<div class="col-md-2">
								<div class="input-group">
									<span class="input-group-btn">
										<form method="post" action="<?=site_url('customer/cart_sub_do')?>">
											<input type="hidden" name="item_id" value="<?=$item->id?>"/>
											<input type="hidden" name="quantity" value="1"/>
											<button class="btn btn-secondary" type="submit" onclick="">-</button>
										</form>
									</span>
									<input type="text" value="<?=$item->quantity?>" class="form-control text-center" readonly="readonly"/>
									<span class="input-group-btn">
										<form method="post" action="<?=site_url('customer/cart_add_do')?>">
											<input type="hidden" name="item_id" value="<?=$item->id?>"/>
											<input type="hidden" name="quantity" value="1"/>
											<button class="btn btn-secondary" type="submit" onclick="">+</button>
										</form>
									</span>
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
											if ($model->address != "")
											{
												?>
												<?=$model->address?>
												<?php
											}
											else
											{
												?>
												<button onclick="popup.open('popup_address'); initMap()" class="btn btn-default">Tambah Alamat Kirim</button>
												<?php
											}
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
								<a href="<?=site_url('billing/cart')?>" class="btn btn-default">Pilih Metode Pembayaran</a>
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
		</div>
	</div>
</div>

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
						<input type="text" name="address_detail" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-3">
						<label>Kota</label>
					</div>
					<div class="col-sm-6">
						<input type="text" name="city" class="form-control"/>
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
						<button type="submit" class="btn btn-default">Tambah</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_address')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>