<div class="cb-panel-heading cb-pl-5">
	<div class="cb-row">
		<div class="cb-col-half">
			<h3 class="cb-txt-primary-1 cb-font-title">PERMINTAAN HOT ITEM</h3>
		</div>
	</div>
</div>

<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-center"> Tenant </div>
		</div>
		<div class="cb-col-tenth-3">
			<div class="cb-label cb-font-title cb-align-center"> Barang </div>
		</div>
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-center"> Harga Awal </div>
		</div>
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-center"> Harga Promo </div>
		</div>
		<div class="cb-col-tenth-3">
			<div class="cb-label cb-font-title cb-align-center"> Pesan </div>
		</div>
	</div>
	<?php
	foreach($model->hot_item_list as $hot_item)
	{
		?>
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-tenth">
				<div class=" cb-align-center"> <?=$hot_item->tenant_name?> </div>
			</div>
			<div class="cb-col-tenth-3">
				<div class="cb-align-center"> <?=$hot_item->posted_item_name?> </div>
			</div>
			<div class="cb-col-tenth">
				<div class="cb-align-center"> <?=$hot_item->price?></div>
			</div>
			<div class="cb-col-tenth">
				<div class="cb-align-center"> <?=$hot_item->promo_price?></div>
			</div>
			<div class="cb-col-tenth-3">
				<div class="cb-align-center"> <?=$hot_item->promo_description?></div>
			</div>
			<div class="cb-col-tenth">
				<a href="<?=site_url('Item/hot_item_detail/'.$hot_item->id)?>" class="cb-button-form">LIHAT BARANG</a>
			</div>
		</div>
		<?php
	}
	?>
</div>

<?php /*
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Hot Item Request</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label>Nama Tenant</label></th>
							<th> <label>Barang</label></th>
							<th> <label>Harga</label></th>
							<th> <label></label></th>
						</tr>
					</thead>
					<tbody>
					<?php
						foreach($model->hot_item_list as $hot_items)
						{
							?>
							<!-- <div class="form-group" style="display:none">
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
							-->
							<tr>
								<td><?=$hot_items->tenant_name?></td>
								<td><?=$hot_items->posted_item_name?></td>
								<td><?=$hot_items->promo_price?></td>
								<td><a href="<?=site_url('Item/hot_item_detail/'.$hot_items->id)?>" class="btn btn-default">Lihat Item</a> </td>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
*/ ?>