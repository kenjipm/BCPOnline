<div class="cb-row">
	<div class="cb-row cb-col-full">
		<div class="cb-col-fifth">
			<img src="<?=site_url('img/Logo_Print_Package.png')?>" alt="Logo" class="logo-header" />
		</div>
		<div class="cb-col-fifth">
			<?=$model->delivery_information->bill_id?>
		</div>
		<div class="cb-col-fifth">
			<?=$model->delivery_information->delivery_method?> (<?=$model->delivery_information->delivery_type?>)
		</div>
	</div>

	<div class="cb-row">
		<div class="cb-col-fifth">Dari: </div>
		<div class="cb-col-fifth-2"><?=$model->delivery_information->tenant_name?></div>
	</div>

	<div class="cb-row">
		<div class="cb-col-fifth">Untuk: </div>
		<div class="cb-col-fifth-2"><?=$model->delivery_information->customer_name?></div>
	</div>

	<div class="cb-row">
		<div class="cb-col-fifth">Alamat: </div>
		<div class="cb-col-fifth-2"><?=$model->delivery_information->full_address?></div>
	</div>

	<div class="cb-row">
		<div class="cb-col-fifth">No HP: </div>
		<div class="cb-col-fifth-2"><?=$model->delivery_information->phone_number?></div>
	</div>

	<div class="cb-row">
		<div class="cb-col-fifth">Barang: </div>
		<div class="cb-col-fifth-2"><?=$model->delivery_information->quantity?> X <?=$model->delivery_information->posted_item_name?></div>
	</div>
</div>