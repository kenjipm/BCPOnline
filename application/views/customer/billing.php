<div class="cb-txt-primary-1 cb-pl-5 cb-align-left cb-font-title">
	<h2><?=$title?></h2>
</div>
<form action="<?=site_url('billing/'.$model->billing->action)?>" method="post" class="form-horizontal" id="form_billing">
	<input type="hidden" name="billing_id" value="<?=$model->billing->id?>"/>
	<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-txt-primary-1 cb-pull-left">
					<div class="cb-label"> Tanggal </div>
				</div>
				<div class="cb-pull-right">
					<div class="cb-txt-primary-1">
						<div class="cb-label"> : </div>
					</div>
				</div>
			</div>
			<div class="cb-col-fifth-2 cb-pl-3">
				<input type="text" class="cb-row cb-col-full cb-input-text" id="customer_id" name="customer_id" value="<?=$model->billing->date_created?>" readonly/>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-txt-primary-1 cb-pull-left">
					<div class="cb-label"> Alamat </div>
				</div>
				<div class="cb-pull-right">
					<div class="cb-txt-primary-1">
						<div class="cb-label"> : </div>
					</div>
				</div>
			</div>
			<div class="cb-col-fifth-2 cb-pl-3">
				<input type="text" class="cb-row cb-col-full cb-input-text" id="customer_id" name="customer_id" value="<?=$model->billing->shipping_address->full_address?>" readonly/>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-txt-primary-1 cb-pull-left">
					<div class="cb-label"> Rincian Order </div>
				</div>
				<div class="cb-pull-right">
					<div class="cb-txt-primary-1">
						<div class="cb-label"> : </div>
					</div>
				</div>
			</div>
			<div class="cb-col-fifth-4">
				<div class="cb-row cb-border-bottom">
					<div class="cb-col-half">
						<div class="cb-row">
							<div class="cb-col-fourth-2">
								<div class="cb-label cb-align-center">Produk</div>
							</div>
							<div class="cb-col-fourth">
								<div class="cb-label cb-align-center">Jumlah</div>
							</div>
							<div class="cb-col-fourth">
								<div class="cb-label cb-align-right">Harga</div>
							</div>
						</div>
					</div>
					<div class="cb-col-half">
						<div class="cb-row">
							<div class="cb-col-fourth-2">
								<div class="cb-label cb-align-center">Status</div>
							</div>
						</div>
					</div>
				</div>
			<?php
			foreach($model->orders as $order)
			{
				?>
				<div class="cb-row cb-border-bottom cb-p-5">
					<div class="cb-col-half">
						<div class="cb-row">
							<div class="cb-col-fourth-2">
								<div class="cb-align-left"><?=$order->posted_item_variance->posted_item->name?></div>
							</div>
							<div class="cb-col-fourth">
								<div class="cb-align-center"><?=$order->quantity?></div>
							</div>
							<div class="cb-col-fourth">
								<div class="cb-align-center pull-right"><?=$order->posted_item_variance->posted_item->price?></div>
							</div>
						</div>
					</div>
					<div class="cb-col-half">
						<div class="cb-row">
							<div class="cb-col-fourth-2">
								<div class="cb-align-center cb-pl-5" id="order_status\">
									Menunggu Pembayaran
									<button type="button" data-toggle="collapse" data-target="#order_status_history-<?=$order->posted_item_variance->id?>" class="cb-button cb-button-operational pull-right"><div class="cb-arrow cb-arrow-white cb-arrow-down"></div></button>
								</div>
							</div>
							<div class="cb-col-fourth-2">
								<div class="cb-row cb-align-right cb-mr-5">
								
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="cb-row cb-p-5">
					<div id="order_status_history-<?=$order->posted_item_variance->id?>" class="collapse cb-col-full">
						<div class="cb-row cb-bg-secondary-3 cb-p-5">
							<i> Pesanan dibuat (<?=$model->billing->date_created?>)</i>
						</div>
					</div>
				</div>
				<?php
				}
			?>

				<div class="cb-row cb-p-5">
					<div class="cb-col-half">
						<div class="cb-row">
							<div class="cb-col-fourth-2">
								<div class="cb-label cb-align-left">Subtotal</div>
							</div>
							<div class="cb-col-fourth-2">
								<div class="cb-label cb-align-right"><?=$model->billing->total_payable?></div>
							</div>
						</div>
					</div>
					<div class="cb-col-half">
					</div>
				</div>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-txt-primary-1 cb-pull-left">
					<div class="cb-label"> Pembayaran </div>
				</div>
				<div class="cb-pull-right">
					<div class="cb-txt-primary-1">
						<div class="cb-label"> : </div>
					</div>
				</div>
			</div>
			<div class="cb-col-fifth-2 cb-pl-3">
				<?php
					$i = 0; $div_row_opened = false;
					foreach ($model->payment_methods as $payment_method)
					{
						if ($i % 3 == 0) { ?> <div class="cb-row"> <?php $div_row_opened = true; } 
						?>
						<div class="cb-col-third cb-p-5">
							<input type="radio" name="payment_method" id="payment_method-<?=$payment_method->name?>" value="<?=$payment_method->name /* hrsnya id, tp data nya ga disimpen?? */?>" <?=$payment_method->selected?"checked=\"checked\"":""?>/>
							<label><?=$payment_method->description?></label>
						</div>
						<?php
						if ($i % 3 == 2) { ?> </div> <?php $div_row_opened = false; }
						$i++;
					}
					if ($div_row_opened) { ?> </div> <?php }
				?>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-txt-primary-1 cb-pull-left">
					<div class="cb-label"> Kurir </div>
				</div>
				<div class="cb-pull-right">
					<div class="cb-txt-primary-1">
						<div class="cb-label"> : </div>
					</div>
				</div>
			</div>
			<div class="cb-col-fifth-2 cb-pl-3">
				<?php
					$i = 0; $div_row_opened = false;
					foreach ($model->delivery_methods as $delivery_method)
					{
						if ($i % 3 == 0) { ?> <div class="cb-row"> <?php $div_row_opened = true; } 
						?>
						<div class="cb-col-third cb-p-5">
							<input type="radio" name="delivery_method" id="delivery_method-<?=$delivery_method->name?>" value="<?=$delivery_method->name ?>" <?=$delivery_method->selected?"checked=\"checked\"":""?>/>
							<label><?=$delivery_method->description?></label>
						</div>
						<?php
						if ($i % 3 == 2) { ?> </div> <?php $div_row_opened = false; }
						$i++;
					}
					if ($div_row_opened) { ?> </div> <?php }
				?>
			</div>
		</div>
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth">
				<div class="cb-txt-primary-1 cb-pull-left">
					<div class="cb-label"> Voucher </div>
				</div>
				<div class="cb-pull-right">
					<div class="cb-txt-primary-1">
						<div class="cb-label"> : </div>
					</div>
				</div>
			</div>
			<div class="cb-col-fifth-2 cb-pl-3">
				<input type="text" class="cb-row cb-col-full cb-input-text" id="voucher_code" name="voucher_code" placeholder="Masukkan kode voucher"/>
				<span id="voucher_code_status"></span>
			</div>
			<div class="cb-col-fifth cb-pl-3">
				<button type="button" class="cb-button-form" onclick="cek_kode_voucher()">Cek Kode Voucher</button>
			</div>
		</div>
		<input type="hidden" name="date_created" value="<?=$model->billing->date_created?>"/>
		<input type="hidden" name="date_closed" value="<?=$model->billing->date_closed?>"/>
		<input type="hidden" name="customer_id" value="<?=$model->billing->customer_id?>"/>
		<input type="hidden" name="shipping_address_id" value="<?=$model->billing->shipping_address->id?>"/>
		
		<input type="hidden" name="fee_amount" value="<?=$model->billing->shipping_charge->fee_amount?>"/>
		
		<div class="cb-row cb-p-5">
			<div class="cb-col-fifth-4">
			</div>
			<div class="cb-col-fifth">
				<button type="button" class="cb-button-form pull-right" onclick="<?=$model->billing->is_voucher_available?'cek_kode_voucher(true)':'submit_form()'?>">
				<?=$model->billing->action_name?>
				</button>
			</div>
		</div>
	</div>
</form>
<!--
<div class="">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>
				<?=$title?>
				<div class="pull-right"><a href="<?=site_url('customer/cart')?>" class="btn btn-default">Kembali</a></div>
			</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('billing/'.$model->billing->action)?>" method="post" class="form-horizontal" id="form_billing">
				<input type="hidden" name="billing_id" value="<?=$model->billing->id?>"/>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_created">Tanggal:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="date_created" 
						value="<?=$model->billing->date_created?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="address">Alamat:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="address" 
						value="<?=$model->billing->shipping_address->full_address?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="orders">Order List:</label>
					<div class="col-xs-9 pull-right">
						<div class="row list-group">
							<div class="col-xs-3">Nama </div>
							<div class="col-xs-2">Varian </div>
							<div class="col-xs-1">Jml </div>
							<div class="col-xs-2">Harga </div>
							<div class="col-xs-2">Total </div>
						</div>
					</div>
					<div class="row">
					<?php
					foreach($model->orders as $order)
					{
						?>
						<div class="col-xs-9 col-xs-offset-3">
							<div class="row list-group">
								<div class="col-xs-3 list-group-item">
									<?=$order->posted_item_variance->posted_item->name?> </div>
								<div class="col-xs-2 list-group-item">
									<?=$order->posted_item_variance->var_description?> </div>
								<div class="col-xs-1 list-group-item">
									<?=$order->quantity?> </div>
								<div class="col-xs-2 list-group-item">
									<?=$order->posted_item_variance->posted_item->price?> </div>
								<div class="col-xs-2 list-group-item">
									<?=$order->price_total?> </div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="shipping_charge">Ongkos Kirim:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="shipping_charge" 
						value="<?=$model->billing->shipping_charge->fee_amount?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="total_payable">Total Harga:</label>
					<div class="col-xs-3"><input type="text" class="form-control" id="total_payable" 
						value="<?=$model->billing->total_payable?>" readonly></div>
				</div>
				<?php
					if ($model->billing->is_voucher_available)
					{
						?>
						<div class="form-group">
							<label class="control-label col-xs-3" for="total_payable">Kode Voucher:</label>
							<div class="col-xs-3"><input type="text" class="form-control" id="voucher_code" name="voucher_code" 
								value=""></div>
							<div class="col-xs-1">
								<button type="button" class="btn btn-default" onclick="cek_kode_voucher()">Cek</button>
							</div>
							<div class="col-xs-2">
								<span id="voucher_code_status"></span>
							</div>
						</div>
						<?php
					}
				?>
				<hr/>
				<h3>Pembayaran</h3>
				<?php
					$i = 0; $div_row_opened = false;
					foreach ($model->payment_methods as $payment_method)
					{
						if ($i % 3 == 0) { ?> <div class="row"> <?php $div_row_opened = true; } 
						?>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-body hoverdiv hoverdiv-white" onclick="select_payment_method('<?=$payment_method->name?>')">
									<input type="radio" name="payment_method" id="payment_method-<?=$payment_method->name?>" value="<?=$payment_method->name /* hrsnya id, tp data nya ga disimpen?? */?>" <?=$payment_method->selected?"checked=\"checked\"":""?>/>
									<label><?=$payment_method->description?></label>
								</div>
							</div>
						</div>
						<?php
						if ($i % 3 == 2) { ?> </div> <?php $div_row_opened = false; }
						$i++;
					}
					if ($div_row_opened) { ?> </div> <?php }
				?>
				<hr/>
				<h3>Pengiriman</h3>
				<?php
					$i = 0; $div_row_opened = false;
					foreach ($model->delivery_methods as $delivery_method)
					{
						if ($i % 3 == 0) { ?> <div class="row"> <?php $div_row_opened = true; } 
						?>
						<div class="col-md-4">
							<div class="panel panel-default">
								<div class="panel-body hoverdiv hoverdiv-white" onclick="select_delivery_method('<?=$delivery_method->name?>')">
									<input type="radio" name="delivery_method" id="delivery_method-<?=$delivery_method->name?>" value="<?=$delivery_method->name ?>" <?=$delivery_method->selected?"checked=\"checked\"":""?>/>
									<label><?=$delivery_method->description?></label>
								</div>
							</div>
						</div>
						<?php
						if ($i % 3 == 2) { ?> </div> <?php $div_row_opened = false; }
						$i++;
					}
					if ($div_row_opened) { ?> </div> <?php }
				?>
				<hr/>
				<input type="hidden" name="date_created" value="<?=$model->billing->date_created?>"/>
				<input type="hidden" name="date_closed" value="<?=$model->billing->date_closed?>"/>
				<input type="hidden" name="customer_id" value="<?=$model->billing->customer_id?>"/>
				<input type="hidden" name="shipping_address_id" value="<?=$model->billing->shipping_address->id?>"/>
				
				<input type="hidden" name="fee_amount" value="<?=$model->billing->shipping_charge->fee_amount?>"/>
			
				<button type="button" class="btn btn-default" onclick="<?=$model->billing->is_voucher_available?'cek_kode_voucher(true)':'submit_form()'?>">
					<?=$model->billing->action_name?>
				</button>
			</form>
		</div>
	</div>
</div>
-->