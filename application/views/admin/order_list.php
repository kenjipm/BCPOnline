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
						<div class="cb-align-center"> <?=$order->delivery_method?> </div>
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
		<?php
			if ($model->idle_deliverer)
			{
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
			<div class="cb-row">
				<div class="cb-col-tenth-9">
				</div>
				<div class="cb-col-tenth">
					<button type="submit" class="cb-button-form" disabled>KIRIM</button>
				</div>
			</div>
		<?php 
			}
		?>
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
