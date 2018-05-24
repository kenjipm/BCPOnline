<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">DAFTAR VOUCHER</h3>
		</div>
	</div>
</div>

<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Kode Voucher </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Stok </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Deskripsi </div>
		</div>
	</div>
	<?php
	foreach($model->vouchers as $voucher)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth-2">
				<div class=" cb-align-center"> <?=$voucher->voucher_code?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$voucher->voucher_stock?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$voucher->voucher_description?> </div>
			</div>
			<div class="cb-col-fifth">
				<button class="cb-button-form" onclick="popup.open('popup_voucher_detail')">LIHAT</button>
			</div>
			<div id="popup_voucher_detail" class="popup popup-md">
				<div class="panel panel-default">
					<div class="panel-heading">
						Detil Voucher
					</div>
					<div class="panel-body">
						<form class="form-horizontal">
							<div class="form-group">
								<div class="col-sm-4">
									<label>Deskripsi:</label>
								</div>
								<div class="col-sm-8">
									<input type="text" value="<?=$voucher->voucher_description?>" class="form-control" id="voucher_description" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<label>Nilai Voucher:</label>
								</div>
								<div class="col-sm-8">
									<input type="text" value="<?=$voucher->voucher_worth?>" class="form-control" id="voucher_worth" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<label>Jumlah Stok:</label>
								</div>
								<div class="col-sm-8">
									<input type="text" value="<?=$voucher->voucher_stock?>" class="form-control" name="voucher_stock" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<label>Kode Voucher:</label>
								</div>
								<div class="col-sm-8">
									<input type="text" value="<?=$voucher->voucher_code?>" class="form-control" name="voucher_code" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<label>Minimal Order:</label>
								</div>
								<div class="col-sm-8">
									<input type="text" value="<?=$voucher->min_order_price?>" class="form-control" name="min_order_price" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-4">
									<label>Pemakaian per Hari:</label>
								</div>
								<div class="col-sm-8">
									<input type="text" value="<?=$voucher->use_per_day?>" class="form-control" name="use_per_day" readonly>
								</div>
							</div>
							<div class="form-group">
								<div class="col-sm-7 col-sm-offset-4">
									<button type="button" class="cb-button-form" onclick="popup.close('popup_voucher_detail')">Tutup</button>
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
</div>


<?php /*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Voucher</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="voucher_code">Kode Voucher</label></th>
							<th> <label for="voucher_stock">Stok</label></th>
							<th> <label for="voucher_description">Deskripsi</label></th>
							<th> </th>
							<!--<th> </th>
							<th> </th> -->
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->vouchers as $voucher)
						{
							?>
							<tr>
								<td>
									<?=$voucher->voucher_code?></td>
								<td>
									<?=$voucher->voucher_stock?></td>
								<td>
									<?=$voucher->voucher_description?> </td>
								<td>
									<button class="btn btn-default" onclick="popup.open('popup_voucher_detail')">Lihat</button>
									</td>
								
								<div id="popup_voucher_detail" class="popup popup-md">
									<div class="panel panel-default">
										<div class="panel-heading">
											Detil Voucher
										</div>
										<div class="panel-body">
											<form class="form-horizontal">
												<div class="form-group">
													<div class="col-sm-4">
														<label>Deskripsi:</label>
													</div>
													<div class="col-sm-8">
														<input type="text" value="<?=$model->vouchers[0]->voucher_description?>" class="form-control" id="voucher_description" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4">
														<label>Nilai Voucher:</label>
													</div>
													<div class="col-sm-8">
														<input type="text" value="<?=$model->vouchers[0]->voucher_worth?>" class="form-control" id="voucher_worth" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4">
														<label>Tanggal Dibuat:</label>
													</div>
													<div class="col-sm-8">
														<input type="text" value="<?=$model->vouchers[0]->date_added?>" class="form-control" id="date_added" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4">
														<label>Jumlah Stok:</label>
													</div>
													<div class="col-sm-8">
														<input type="text" value="<?=$model->vouchers[0]->voucher_stock?>" class="form-control" name="voucher_stock" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4">
														<label>Kode Voucher:</label>
													</div>
													<div class="col-sm-8">
														<input type="text" value="<?=$model->vouchers[0]->voucher_code?>" class="form-control" name="voucher_code" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4">
														<label>Minimal Order:</label>
													</div>
													<div class="col-sm-8">
														<input type="text" value="<?=$model->vouchers[0]->min_order_price?>" class="form-control" name="min_order_price" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-4">
														<label>Pemakaian per Hari:</label>
													</div>
													<div class="col-sm-8">
														<input type="text" value="<?=$model->vouchers[0]->use_per_day?>" class="form-control" name="use_per_day" readonly>
													</div>
												</div>
												<div class="form-group">
													<div class="col-sm-7 col-sm-offset-4">
														<button type="button" class="btn btn-default" onclick="popup.close('popup_voucher_detail')">Tutup</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
								<!-- <td>
									<a href="<?=site_url('voucher/update_voucher/'.$voucher->id)?>">
										<button class="btn btn-default">Ubah</button>
									</a>
								</td>
								<td>
									<a href="<?=site_url('voucher/delete_voucher/'.$voucher->id)?>">
										<button class="btn btn-default">Hapus</button>
									</a>
								</td> -->
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<a class="btn btn-default" href="<?=site_url('voucher/create_voucher')?>">
				Buat voucher
			</a>		
		</div>
	</div>
</div>

*/ ?>