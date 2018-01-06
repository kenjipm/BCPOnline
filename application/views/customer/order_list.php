<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
		<div class="panel-body">
			<?php
				foreach ($model->order_otps_lists as $order_otps_list)
				{
					?>
					<h4><?=$order_otps_list->order_status_str?></h4>
					<?php
						foreach ($order_otps_list->order_otps as $order_otp)
						{
							?>
							<b>OTP: <?= $order_otp->otp ?></b>
							<div class="table-responsive">
								<table class="table table-striped table-bordered">
									<thead>
										<td> <label for="tanggal">Tanggal</label>	</td>
										<td> <label for="address">Alamat</label> </td>
										<td> <label for="name">Nama</label> </td>
										<td> <label for="variance">Tipe</label> </td>
										<td> <label for="quantity">Jumlah</label> </td>
										<td> <label for="price">Harga</label> </td>
									</thead>
									<tbody>
										<?php
										foreach($order_otp->orders as $order)
										{
											?>
											<tr>
												<td>
													<?=$order->billing->date_created_str?>
												</td>
												<td>
													<?=$order->billing->shipping_address->full_address?>
												</td>
												<td>
													<?=$order->posted_item_variance->posted_item->posted_item_name?>
												</td>
												<td>
													<?=$order->posted_item_variance->var_description?>
												</td>
												<td>
													<?=$order->quantity?>
												</td>
												<td>
													<?=$order->sold_price_str?>
												</td>
											</tr>
											<?php
										}
										?>
									</tbody>
								</table>
							</div>
							<?php
						}
					?>
					<hr/>
					<?php
				}
			?>
		</div>
	</div>
</div>