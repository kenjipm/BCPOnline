<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Order</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('order/order_list')?>" class="form-horizontal" method="post">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th></th>
								<th> <label for="posted_item">Barang</label> </th>
								<th> <label for="address">Alamat</label> </th>
								<th> <label for="delivery_method">Metode Pengiriman</label> </th>
								<th> <label for="total_payable">Pengirim</label> </th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($model->order_list as $order)
							{
								?>
								<div class="form-group" style="display:none">
									<input type="text" class="form-control" name="order_id[]" value="<?=$order->id?>" readonly/>
								</div>
								<div class="form-group" style="display:none">
									<input type="text" class="form-control" name="tenant_id[]" value="<?=$order->tenant_id?>" readonly/>
								</div>
								<div class="form-group" style="display:none">
									<input type="text" class="form-control" name="customer_id[]" value="<?=$order->customer_id?>" readonly/>
								</div>
								<div class="form-group" style="display:none">
									<input type="text" class="form-control" name="item_type[]" value="<?=$order->item_type?>" readonly/>
								</div>
								<tr>
									<td><?=$order->item_type?></td>
									<td><?=$order->posted_item?></td>
									<td><?=$order->address?></td>
									<td><?=$order->collection_method?></td>
									<td>
										<select class="form-control" name="deliverer_id[]">
										<?php
										foreach ($model->idle_deliverer as $deliverer)
										{
											?>
											<option value="<?=$deliverer->id?>"><?=$deliverer->name?></option>			
											<?php
											$i++;
										}
										?>
										</select>
									</td>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
				<div class="form-group">
					<div class="col-xs-2 col-xs-offset-10"><button type="submit" class="btn btn-default">Kirim</button></div>
				</div>
			</form>
		</div>
	</div>
</div>