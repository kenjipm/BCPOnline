<div class="cb-row cb-p-5">
	<div class="cb-col-full cb-txt-primary-1 cb-align-left cb-font-title cb-font-size-xl">
		DAFTAR BARANG
	</div>
	<div class="cb-col-full cb-row cb-panel-body cb-bg-primary-3 cb-p-5">
	<?php
	if ($model->transaction_detail->item_type == "REPAIR")
	{
		?>
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Nama Barang</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-pl-3">
				<input type="text" class="cb-row cb-col-full cb-input-text" id="item_name" value="<?=$model->repair_list[0]->otp?>" readonly>
			</div>
		</div>
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Deliverer</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-pl-3">
				<input type="text" class="cb-row cb-col-full cb-input-text" id="deliverer_name" value="<?=$model->repair_list[0]->deliverer_name?>" readonly>
			</div>
		</div>
		<?php
		foreach($model->repair_list as $repair)
		{
			?>
			<div class="cb-col-full cb-row cb-mb-5">
				<div class="cb-col-fifth-4 cb-pl-3">
					<?=$repair->posted_item_description?> </div>
				<div class="cb-col-fifth cb-pl-3">
					<a class="cb-button-form" href="<?=site_url('Order/transaction_detail/'.$repair->id)?>">
						Lihat
					</a>
				</div>
			</div>
			<?php
		}
	}
	?>
	</div>
</div>
