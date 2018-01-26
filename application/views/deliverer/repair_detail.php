<?php
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
	
?>