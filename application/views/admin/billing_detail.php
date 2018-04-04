
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>
				<?=$title?>
				<div class="pull-right"><a href="<?=site_url('customer/cart')?>" class="btn btn-default">Kembali</a></div>
			</h3>
		</div>
		<div class="panel-body">
			<form method="post" class="form-horizontal" id="form_billing">
				<input type="hidden" name="billing_id" value="<?=$model->billing_detail->id?>"/>
				<div class="form-group">
					<label class="control-label col-xs-3" for="date_created">Tanggal:</label>
					<div class="col-xs-9"><input type="text" class="form-control" id="date_created" 
						value="<?=$model->billing_detail->date_created?>" readonly/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-6" for="orders">Order List:</label>
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th>Nama</th>
								<th>Harga</th>
								<th>Jumlah</th>
								<th>Total</th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($model->order_list as $order)
							{
								?>
								<tr>
									<td><?=$order->posted_item?></td>
									<td><?=$order->sold_price?></td>
									<td><?=$order->quantity?></td>
									<td><?=$order->total_price?></td>
								</tr>
							<?php
							}
							?>
							<tr>
								<td>Total Harga</td>
								<td></td>
								<td></td>
								<td><?=$model->billing_detail->total_payable?></td>
							</tr>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>
