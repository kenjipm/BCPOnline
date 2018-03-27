<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Barang untuk Dikirim</h3>
		</div>
		<div class="panel-body">
			<form action="<?=site_url('order/order_list')?>" class="form-horizontal" method="post">
				<div class="form-group">
					<div class="col-sm-2">
						<label>Masukkan OTP:</label>
					</div>
					<div class="col-sm-4">
						<input type="text" class="form-control" name="otp"/>
					</div>
					<div class="col-sm-2">
						<button class="btn btn-default" type="submit" class="btn btn-default">Kirim</button>
					</div>
				</div>
			</form>	
		</div>
	</div>
</div>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Histori Transaksi</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="tanggal1">Dibuat</label>	</th>
							<th> <label for="status">Status</label> </th>
							<th> <label for="total_payable">Total Harga</label> </th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if($model->orders)
						{
							foreach($model->orders as $order)
							{
								?>
								<tr>
									<td>
										<?=$order->date_created?> </td>
									<td>
										<?=$order->order_status?> </td>
									<td>
										<?=$order->sold_price?> </td>
									<td>
										<a href="<?=site_url('order/transaction_detail/'.$order->id)?>">
											<button class="btn btn-default">Lihat</button>
										</a>
									</td>
								</tr>
								<?php
							}
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>