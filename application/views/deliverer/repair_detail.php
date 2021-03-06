<?php
if ($model->repair_list){
?>

<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">DAFTAR REPAIR</h3>
		</div>
	</div>
</div>

<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row cb-mb-5">
		<div class="cb-col-fifth">
			<div class="cb-row">
				<div class="cb-col-fifth-4">
					<div class="cb-txt-primary-1 cb-pull-left">
						<div class="cb-label"> OTP</div>
					</div>
				</div>
				<div class="cb-col-fifth">
					<div class="cb-align-center">
						<div class="cb-txt-primary-1">
							<div class="cb-label"> : </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="cb-row cb-col-fifth-2">
			<input type="text" class="cb-input-text cb-col-full" name="otp" value="<?=$model->repair_list[0]->otp?>" readonly/>
		</div>
	</div>
	<div class="cb-row cb-mb-5">
		<div class="cb-col-fifth">
			<div class="cb-row">
				<div class="cb-col-fifth-4">
					<div class="cb-txt-primary-1 cb-pull-left">
						<div class="cb-label"> Customer</div>
					</div>
				</div>
				<div class="cb-col-fifth">
					<div class="cb-align-center">
						<div class="cb-txt-primary-1">
							<div class="cb-label"> : </div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="cb-row cb-col-fifth-2">
			<input type="text" class="cb-input-text cb-col-full" name="tenant_name" value="<?=$model->repair_list[0]->tenant_name?>" readonly/>
		</div>
	</div>
	
	<div class="cb-row">
		<div class="cb-col-full">
			<div class="cb-label cb-font-title cb-align-center"> Deskripsi </div>
		</div>
	</div>
	<?php
	foreach($model->repair_list as $repair)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-full">
				<div class=" cb-align-center"><?=$repair->description?> </div>
			</div>
		</div>
		<?php
	}
	?>
</div>	
<?php
}
	
?>


<?php /*
if ($model->repair_list){
?>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Repair</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="otp">OTP:</label>
					<div class="col-xs-9"><input type="text" class="form-control" 
						value="<?=$model->repair_list[0]->otp?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="deliverer_name">Tenant:</label>
					<div class="col-xs-9"><input type="text" class="form-control" 
						value="<?=$model->repair_list[0]->tenant_name?>" readonly></div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th> <label for="address">Deskripsi</label> </th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($model->repair_list as $repair)
							{
								?>
								<tr>
									<td><?=$repair->description?></td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
}
*/	
?>