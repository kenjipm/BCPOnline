<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">DETIL BILLING</h3>
		</div>
		<?php /*
		<div class="cb-col-half cb-p-5">
			<a href="<?=site_url('billing')?>" class="cb-button-form pull-right">KEMBALI</a>
		</div> */ ?>
	</div>
</div>

<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-txt-primary-1 cb-pull-left">
				<div class="cb-label"> No Invoice </div>
			</div>
			<div class="cb-pull-right">
				<div class="cb-txt-primary-1">
					<div class="cb-label"> : </div>
				</div>
			</div>
		</div>
		<div class="cb-col-fifth-2 cb-pl-3">
			<input type="text" class="cb-row cb-col-full cb-input-text" id="bill_id" name="bill_id" value="<?=$model->billing_detail->bill_id?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-p-5 cb-mb-5">
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
			<input type="text" class="cb-row cb-col-full cb-input-text" id="customer_id" name="customer_id" value="<?=$model->billing_detail->date_created?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-p-5">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Nama </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Harga </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Jumlah </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-right"> Total </div>
		</div>
	</div>
	<?php
	foreach($model->order_list as $order)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$order->posted_item?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$order->sold_price?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$order->quantity?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-right"> <?=$order->total_price?> </div>
			</div>
		</div>
		<?php
	}
	?>
	<div class="cb-row cb-p-5 cb-border-top">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Ongkos Kirim </div>
		</div>
		<div class="cb-col-fifth-2">
		</div>
		<div class="cb-col-fifth">
			<div class="cb-align-right"> <?=$model->billing_detail->fee_amount?> </div>
		</div>
	</div>
	<div class="cb-row cb-p-5 cb-border-top">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Voucher </div>
		</div>
		<div class="cb-col-fifth-2">
		</div>
		<div class="cb-col-fifth">
			<div class="cb-align-right"> <?=$model->billing_detail->voucher_cut_price?> </div>
		</div>
	</div>
	<div class="cb-row cb-p-5 cb-border-top">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Total Harga </div>
		</div>
		<div class="cb-col-fifth-2">
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-font-size-lg cb-align-right"> <?=$model->billing_detail->total_payable?> </div>
		</div>
	</div>
</div>
