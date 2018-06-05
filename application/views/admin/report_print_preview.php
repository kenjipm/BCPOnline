<input type="hidden" id="print_title" value="<?= $model->print_title ?? "Untitled" ?>"/>

<div class="cb-col-full cb-p-5 cb-scale-80">
	<div class="cb-font-title cb-txt-primary-1 cb-font-size-xl"><?=$title?></div>
	<div class="cb-bg-primary-3 cb-border-round cb-p-5">
	
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Jenis Laporan</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-row cb-pl-3">
				<input type="text" class="cb-col-tenth-9 cb-input-text" value="<?=$model->report_description?>" readonly="readonly"/>
			</div>
		</div>
	
		<?php
			if ($model->tenant_name != "")
			{
				?>
				<div class="cb-col-full cb-row cb-mb-5">
					<div class="cb-col-fifth cb-label cb-txt-primary-1">
						<div class="cb-pull-left">Nama Tenant</div>
						<div class="cb-pull-right">:</div>
					</div>
					<div class="cb-col-fifth-2 cb-row cb-pl-3">
						<input type="text" class="cb-col-tenth-9 cb-input-text" value="<?=$model->tenant_name?>" readonly="readonly"/>
					</div>
				</div>
				<?php
			}
		?>
	
		<?php
			if ($model->category_name != "")
			{
				?>
				<div class="cb-col-full cb-row cb-mb-5">
					<div class="cb-col-fifth cb-label cb-txt-primary-1">
						<div class="cb-pull-left">Kategori</div>
						<div class="cb-pull-right">:</div>
					</div>
					<div class="cb-col-fifth-2 cb-row cb-pl-3">
						<input type="text" class="cb-col-tenth-9 cb-input-text" value="<?=$model->category_name?>" readonly="readonly"/>
					</div>
				</div>
				<?php
			}
		?>
	
		<?php
			if ($model->brand_name != "")
			{
				?>
				<div class="cb-col-full cb-row cb-mb-5">
					<div class="cb-col-fifth cb-label cb-txt-primary-1">
						<div class="cb-pull-left">Brand</div>
						<div class="cb-pull-right">:</div>
					</div>
					<div class="cb-col-fifth-2 cb-row cb-pl-3">
						<input type="text" class="cb-col-tenth-9 cb-input-text" value="<?=$model->brand_name?>" readonly="readonly"/>
					</div>
				</div>
				<?php
			}
		?>
	
		<?php
			if ($model->keywords != "")
			{
				?>
				<div class="cb-col-full cb-row cb-mb-5">
					<div class="cb-col-fifth cb-label cb-txt-primary-1">
						<div class="cb-pull-left">Nama Produk</div>
						<div class="cb-pull-right">:</div>
					</div>
					<div class="cb-col-fifth-2 cb-row cb-pl-3">
						<input type="text" class="cb-col-tenth-9 cb-input-text" value="<?=$model->keywords?>" readonly="readonly"/>
					</div>
				</div>
				<?php
			}
		?>
		
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Periode</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-row cb-pl-3">
				<input type="text" class="cb-col-tenth-4 cb-input-text" value="<?=$model->start_date?>" readonly="readonly"/>
				<div class="cb-col-tenth cb-align-center cb-vertical-center cb-row">s/d</div>
				<input type="text" class="cb-col-tenth-4 cb-input-text" value="<?=$model->end_date?>" readonly="readonly"/>
			</div>
		</div>
		
		<div class="cb-row cb-col-full"><?=$model->report_html?></div>
	
	</div>
</div>