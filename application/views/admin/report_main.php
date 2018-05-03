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
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth cb-label cb-txt-primary-1">
				<div class="cb-pull-left">Periode</div>
				<div class="cb-pull-right">:</div>
			</div>
			<div class="cb-col-fifth-2 cb-row cb-pl-3 cb-vertical-center">
				<input type="text" class="cb-col-tenth-4 cb-input-text datepicker" id="start_date" value="<?=date("Y-m-d")?>"/>
				<div class="cb-col-tenth cb-align-center">s/d</div>
				<input type="text" class="cb-col-tenth-4 cb-input-text datepicker" id="end_date" value="<?=date("Y-m-d")?>"/>
			</div>
		</div>
		<div class="cb-col-full cb-row cb-mb-5">
			<div class="cb-col-fifth">
			</div>
			<div class="cb-col-fifth cb-pl-3">
				<button type="button" class="cb-button cb-button-form" onclick="view_report()">LIHAT</button>
			</div>
		</div>
		
		<div class="cb-row cb-col-full" id="report_area"></div>
	
	</div>
</div>