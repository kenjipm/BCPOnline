<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Barang untuk Dikirim</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="otp">OTP:</label>
					<div class="col-xs-9"><input type="text" class="form-control" 
						value="<?=$model->order_list[0]->otp?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="deliverer_name">Deliverer:</label>
					<div class="col-xs-9"><input type="text" class="form-control" 
						value="<?=$model->order_list[0]->deliverer_name?>" readonly></div>
				</div>
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<label class="control-label col-xs-3" for="orders">Order List:</label>
							<tr>
								<th> Nama </th>
								<th> Deskripsi </th>
								<th> Jml </th>
								<th> Harga </th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach($model->order_list as $order)
						{
							?>
							<tr>
								<td> <?=$order->posted_item_name . " (" . $order->var_type . ": " . $order->var_description . ")"?> </td>
								<td> <?=$order->posted_item_description?> </td>
								<td> <?=$order->quantity?> </td>
								<td> <?=$order->sold_price?> </td>
								<td>
									<a class="btn btn-default" href="<?=site_url('Order/transaction_detail/'.$order->id)?>">
										Lihat
									</a>
								</td>
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
