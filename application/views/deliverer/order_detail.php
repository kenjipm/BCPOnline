<?php if ($model->order_list){ ?>

<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">DAFTAR BARANG</h3>
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
			<input type="text" class="cb-input-text cb-col-full" name="otp" value="<?=$model->order_list[0]->otp?>" readonly/>
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
			<input type="text" class="cb-input-text cb-col-full" name="customer_name" value="<?=$model->order_list[0]->customer_name?>" readonly/>
		</div>
	</div>
	
	<div class="cb-row">
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Nama </div>
		</div>
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Deskripsi </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Jumlah </div>
		</div>
	</div>
	<?php
	foreach($model->order_list as $order)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth-2">
				<?php if ($order->posted_item_name){ ?>
				<div class=" cb-align-center"><?=$order->posted_item_name . " (" . $order->var_type . ": " . $order->var_description . ")"?> </div>
				<?php } else { ?>
				<div class=" cb-align-center">Servis</div>
				<?php } ?>
			</div>
			<div class="cb-col-fifth-2">
				<div class=" cb-align-center"><?=$order->posted_item_description?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class=" cb-align-center"><?=$order->quantity?> </div>
			</div>
		</div>
	<?php
	}
	?>
</div>	
<?php } ?>

<?php if ((!$model->order_list) && (!$model->repair_list)) { ?>

<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row cb-mb-5">
		<div class="cb-col-fifth-4">
			<div class="cb-txt-primary-1 cb-pull-left">
				<div class="cb-label"> KODE OTP SALAH </div>
			</div>
		</div>
	</div>
</div>

<?php } ?>

<?php /*
if ($model->order_list){
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Barang</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('order/order_list')?>" class="form-horizontal" method="post">
				<div class="form-group">
					<label class="control-label col-xs-3" for="otp">OTP:</label>
					<div class="col-xs-9"><input type="text" class="form-control" 
						value="<?=$model->order_list[0]->otp?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="deliverer_name">Customer:</label>
					<div class="col-xs-9"><input type="text" class="form-control" 
						value="<?=$model->order_list[0]->customer_name?>" readonly></div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th> <label for="name">Nama</label> </th>
								<th> <label for="desc">Deskripsi</label> </th>
								<th> <label for="quantity">Jumlah</label> </th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($model->order_list as $order)
							{
								?>
								<tr>
									<td><?=$order->posted_item_name . " (" . $order->var_type . ": " . $order->var_description . ")"?></td>
									<td><?=$order->posted_item_description?></td>
									<td><?=$order->quantity?></td>
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