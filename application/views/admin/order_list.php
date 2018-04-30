<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">DAFTAR ORDER</div>
</div>
<form action="<?=site_url('order/order_list')?>" class="form-horizontal" method="post">
	<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
		<?php 
		if(count($model->order_list) > 0)
		{
		?>
		<div class="cb-row">
			<div class="cb-col-tenth">
			</div>
			<div class="cb-col-fifth">
				<div class="cb-label cb-font-title cb-align-center"> Barang </div>
			</div>
			<div class="cb-col-tenth-3">
				<div class="cb-label cb-font-title cb-align-center"> Alamat </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-label cb-font-title cb-align-center"> Metode Pengiriman </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-label cb-font-title cb-align-center"> Pengirim </div>
			</div>
		</div>
		<?php
			foreach($model->order_list as $order)
			{
				?>
				<input type="hidden" name="order_id[]" value="<?=$order->id?>" readonly/>
				<input type="hidden" name="tenant_id[]" value="<?=$order->tenant_id?>" readonly/>
				<input type="hidden" name="customer_id[]" value="<?=$order->customer_id?>" readonly/>
				<input type="hidden" name="item_type[]" value="<?=$order->item_type?>" readonly/>
				
				<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
					<div class="cb-col-tenth">
						<div class=" cb-align-center"><?=$order->item_type?> </div>
					</div>
					<div class="cb-col-fifth">
						<div class=" cb-align-center"> <?=$order->posted_item?> </div>
					</div>
					<div class="cb-col-tenth-3">
						<div class="cb-align-center"> <?=$order->address?> </div>
					</div>
					<div class="cb-col-fifth">
						<div class="cb-align-center"> <?=$order->collection_method?> </div>
					</div>
					<div class="cb-col-fifth">
						<select class="cb-input-select cb-row cb-col-full" name="deliverer_id[]">
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
					</div>
				</div>
				<?php
			}
			?>
		<div class="cb-row">
			<div class="cb-col-tenth-9">
			</div>
			<div class="cb-col-tenth">
				<button type="submit" class="cb-button-form">KIRIM</button>
			</div>
		</div>
		<?php 
		} else {
		?>
		<div class="cb-row cb-col-full">
			<div class="cb-label cb-font-title cb-align-center"> Tidak ada barang untuk dikirim </div>
		</div>
		<?php
		}
		?>
		
	</div>
</form>

<?php /*
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
*/ ?>