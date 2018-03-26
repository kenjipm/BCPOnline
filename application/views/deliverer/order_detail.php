<?php
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
	
?>