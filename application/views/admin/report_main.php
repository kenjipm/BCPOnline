<div class="cb-col-full cb-p-5">
	<div class="cb-font-title cb-txt-primary-1 cb-font-size-xl">LAPORAN</div>
	<div class="cb-bg-primary-3 cb-border-round cb-p-5">
	
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Jenis Laporan</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-row cb-pl-3">
				<select class="cb-input-select cb-col-tenth-9" id="report_type">
					<?php
						foreach (REPORT_TYPES as $report_type => $report)
						{
							?>
							<option value="<?=$report_type?>"><?=$report['description']?></option>
							<?php
						}
					?>
				</select>
				<?php
					foreach (REPORT_TYPES as $report_type => $report)
					{
						?>
						<input type="hidden" id="tenant_opt-<?=$report_type?>" value="<?=$report['tenant_opt']?>"/>
						<input type="hidden" id="category_opt-<?=$report_type?>" value="<?=$report['category_opt']?>"/>
						<input type="hidden" id="brand_opt-<?=$report_type?>" value="<?=$report['brand_opt']?>"/>
						<input type="hidden" id="keywords_opt-<?=$report_type?>" value="<?=$report['keywords_opt']?>"/>
						<?php
					}
				?>
			</div>
		</div>
		<div class="cb-col-full cb-row cb-mb-5" id="tenant_opt" style="display: none">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Tenant</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-row cb-pl-3">
				<select class="cb-input-select cb-col-tenth-9" id="tenant_id">
					<option value="-1">Semua</option>	
					<?php
						foreach ($model->tenants as $tenant)
						{
							?>
							<option value="<?=$tenant->id?>"><?=$tenant->tenant_name?></option>			
							<?php
						}
					?>
				</select>
			</div>
		</div>
		<div class="cb-col-full cb-row cb-mb-5" id="category_opt" style="display: none">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Kategori</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-row cb-pl-3">
				<select class="cb-input-select cb-col-tenth-9" id="category_id">
					<option value="-1">Semua</option>	
					<?php
						foreach ($model->categories as $category)
						{
							?>
							<option value="<?=$category->id?>"><?=$category->category_name?></option>			
							<?php
						}
					?>
				</select>
			</div>
		</div>
		<div class="cb-col-full cb-row cb-mb-5" id="brand_opt" style="display: none">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Brand</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-row cb-pl-3">
				<select class="cb-input-select cb-col-tenth-9" id="brand_id">
					<option value="-1">Semua</option>	
					<?php
						foreach ($model->brands as $brand)
						{
							?>
							<option value="<?=$brand->id?>"><?=$brand->brand_name?></option>			
							<?php
						}
					?>
				</select>
			</div>
		</div>
		<div class="cb-col-full cb-row cb-mb-5" id="keywords_opt" style="display: none">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Nama Produk</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-row cb-pl-3">
				<input type="text" class="cb-col-tenth-9 cb-input-text" id="keywords" value=""/>
			</div>
		</div>
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Periode</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-row cb-pl-3 cb-vertical-center">
				<input type="text" class="cb-col-tenth-4 cb-input-text datepicker" id="start_date" value="<?=date("Y-m-d")?>"/>
				<div class="cb-col-tenth cb-align-center cb-row">s/d</div>
				<input type="text" class="cb-col-tenth-4 cb-input-text datepicker" id="end_date" value="<?=date("Y-m-d")?>"/>
			</div>
		</div>
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth">
			</div>
			<div class="cb-col-fifth cb-pl-3">
				<button type="button" class="cb-button cb-button-form" onclick="view_report()">LIHAT</button>
				<button type="button" class="cb-button cb-button-form" id="button_print" onclick="print_report()" style="display: none">CETAK</button>
			</div>
		</div>
		
		<form action="<?=site_url('admin/report_print_preview')?>" target="_blank" method="post" id="form_print">
			<input type="hidden" id="cur_report_type"	name="cur_report_type"	value="" />
			<input type="hidden" id="cur_tenant_id"	 	name="cur_tenant_id"	value="" />
			<input type="hidden" id="cur_category_id"	name="cur_category_id"	value="" />
			<input type="hidden" id="cur_brand_id"	 	name="cur_brand_id"	 	value="" />
			<input type="hidden" id="cur_keywords"	 	name="cur_keywords"	 	value="" />
			<input type="hidden" id="cur_start_date"	name="cur_start_date"	value="" />
			<input type="hidden" id="cur_end_date"	 	name="cur_end_date"	 	value="" />
			<input type="hidden" id="report_html"		name="report_html"		value="" />
		</form>
		
		<div class="cb-row cb-col-full" id="report_area"></div>
	
	</div>
</div>