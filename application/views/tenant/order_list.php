<form action="<?=site_url('order/order_list')?>" method="post">
	<div class="cb-row cb-p-5">
		<div class="cb-col-full cb-row cb-border-round cb-bg-primary-2 cb-pl-5 cb-pr-5 cb-pb-5 cb-pt-2 cb-align-center">
			<div class="cb-font-title cb-txt-primary-3 cb-font-size-xl">MASUKKAN OTP</div>
			<div class="cb-col-full cb-row cb-border-round cb-bg-primary-3 cb-p-5">
				<div class="cb-col-full cb-row cb-mb-5">
					<input type="text" class="cb-input-text cb-col-full cb-align-center" name="otp"/>
				</div>
				<div class="cb-col-full cb-row cb-align-center">
					<button class="cb-button cb-button-form cb-col-fifth" type="submit">KIRIM</button>
				</div>
			</div>
		</div>
	</div>
</form>

<div class="cb-row cb-p-5">
	<div class="cb-col-full cb-row cb-align-center">
		<div class="cb-font-title cb-txt-primary-1 cb-font-size-xl">HISTORI TRANSAKSI</div>
	</div>
	<div class="cb-col-full cb-row cb-panel-body cb-bg-primary-3 cb-p-5">
		<div class="cb-col-full cb-row">
			<div class="cb-col-tenth-3">
				<div class="cb-label cb-font-title cb-align-center"> Tanggal </div>
			</div>
			<!--div class="cb-col-tenth-6">
				<div class="cb-label cb-font-title cb-align-center"> Alamat </div>
			</div-->
			<div class="cb-col-tenth-3">
				<div class="cb-label cb-font-title cb-align-center"> Status </div>
			</div>
			<div class="cb-col-tenth-2">
				<div class="cb-label cb-font-title cb-align-center"> Total Harga </div>
			</div>
			<div class="cb-col-tenth">
				<div class="cb-label cb-font-title cb-align-center">  </div>
			</div>
			<div class="cb-col-tenth">
				<div class="cb-label cb-font-title cb-align-center">  </div>
			</div>
		</div>
		<?php
		foreach($model->orders as $order)
		{
			?>
			<div class="cb-col-full cb-row cb-p-5 cb-border-top cb-table-striped">
				<div class="cb-col-tenth-3">
					<div class=" cb-align-center"> <?=$order->date_created?> </div>
				</div>
				<!--div class="cb-col-tenth-6">
					<div class="cb-align-center"> <?=$redeem_reward->reward->reward_description?> </div>
				</div-->
				<div class="cb-col-tenth-3">
					<div class="cb-align-center"> <?=$order->order_status?> </div>
				</div>
				<div class="cb-col-tenth-2">
					<div class="cb-align-center"> <?=$order->sold_price?> </div>
				</div>
				<div class="cb-col-tenth cb-row cb-pl-2 cb-pr-2">
					<a href="<?=site_url('order/transaction_detail/'.$order->id)?>" class="cb-button-sm cb-button-form cb-col-full cb-align-center">
						<?php if ($order->count_unread_order_status > 0) { ?> <span class="circle circle-sm cb-bg-primary-2"></span> <?php } ?>
						LIHAT
					</a>
				</div>
				<div class="cb-col-tenth cb-row cb-pl-2 cb-pr-2">
					<a target="_blank" href="<?=site_url('order/transaction_detail_print/'.$order->id)?>" class="cb-button-sm cb-button-form cb-col-full cb-align-center">
						CETAK
					</a>
				</div>
			</div>
			<?php
		}
		?>
	</div>
</div>


<?php
/*
<div class="">
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

<div class="">
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

*/
?>