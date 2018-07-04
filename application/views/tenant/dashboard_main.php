<div class="cb-row cb-p-5">
	<div class="cb-col-full cb-bg-primary-3 cb-border-round cb-row cb-p-5">
		<div class="cb-col-fourth">
			<label for="profile_pic" class="cb-border cb-border-round">
				<div id="thumbnail-profile_pic">
					<img src="<?=$model->tenant->account->profile_pic?>" alt="<?=$model->tenant->tenant_name?>" class="cb-border-round">
				</div>
			</label>
			<input id="profile_pic" name="profile_pic" value="<?=$model->tenant->account->profile_pic?>" data-url="<?=site_url('tenant/upload_profpic')?>" type="file" class="photo_upload_simple" style="display:none"/>
		</div>
		<div class="cb-pl-5 cb-col-fourth-2">
			<div class="cb-row cb-mb-5">
				<div class="cb-col-fourth cb-font-title cb-font-size-xl cb-txt-primary-1">Nama</div>
				<div class="cb-col-small cb-font-title cb-font-size-xl cb-txt-primary-1">:</div>
				<div class="cb-col-fourth-2">
					<input type="text" class="cb-input-text" value="<?=$model->tenant->tenant_name?>" readonly/>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-fourth cb-font-title cb-font-size-xl cb-txt-primary-1">Unit</div>
				<div class="cb-col-small cb-font-title cb-font-size-xl cb-txt-primary-1">:</div>
				<div class="cb-col-fourth-2">
					<input type="text" class="cb-input-text" value="<?=$model->tenant->unit_number?>" readonly/>
				</div>
			</div>
			<div class="cb-row cb-mb-5">
				<div class="cb-col-fourth cb-font-title cb-font-size-xl cb-txt-primary-1">Lantai</div>
				<div class="cb-col-small cb-font-title cb-font-size-xl cb-txt-primary-1">:</div>
				<div class="cb-col-fourth-2">
					<input type="text" class="cb-input-text" value="<?=$model->tenant->floor?>" readonly/>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	// Model untuk dashboard_main
	
	// dummy tenant profile
	// $model->tenant = new class{};
	// $model->tenant->id = 1;
	// $model->tenant->tenant_name = "Djisamsung";
	// $model->tenant->unit_number = "344S";
	// $model->tenant->floor = "LG";
	
	// $model->tenant->account = new class{};
	// $model->tenant->account->profile_pic = site_url("img/favicon.gif");
	
	// $model->posted_item = array();
	// $model->posted_item[0] = new class{};
	// $model->posted_item[0]->id = 1;
	// $model->posted_item[0]->posted_item_name = "Handphone Djisamsung";
	// $model->posted_item[0]->price = "Rp 3.450.000";
	// $model->posted_item[1] = new class{};
	// $model->posted_item[1]->id = 2;
	// $model->posted_item[1]->posted_item_name = "Tablet Djisamsung";
	// $model->posted_item[1]->price = "Rp 1.250.000";
	
	/*
	$model->categories = array();
	
	$model->categories[0] = new class{};
	$model->categories[0]->category_name = "Handphone & Tablet";
	$model->categories[1] = new class{};
	$model->categories[1]->category_name = "Laptop & Aksesoris";
	$model->categories[2] = new class{};
	$model->categories[2]->category_name = "Komputer & Aksesoris";
	$model->categories[3] = new class{};
	$model->categories[3]->category_name = "Elektronik";
	$model->categories[4] = new class{};
	$model->categories[4]->category_name = "Kamera";
	$model->categories[5] = new class{};
	$model->categories[5]->category_name = "Gaming";
	$model->categories[6] = new class{};
	$model->categories[6]->category_name = "Reparasi";

	$show_posted_item_div = false;

<div class="">
	<div class="panel panel-default">
		<div class="panel panel-body">
			<div class="col-md-4">
				<div class="thumbnail">
					<a href="<?=site_url('Tenant/profile/'.$model->tenant->id )?>">
						<img src="" alt="Image" style="width:50%">
					</a>
				</div>
			</div>
			<div class="col-md-8">
				<div class="row">
					<div class="col-md-2"><label for="name">Nama: </label></div>
					<div class="col-md-4">
						<input class="form-control" type="text" value=<?=$model->tenant->tenant_name?> readonly>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2"><label for="unit">Unit: </label></div>
					<div class="col-md-2">
						<input class="form-control" type="text" value=<?=$model->tenant->unit_number?> readonly>
					</div>
				</div>
				<div class="row">
					<div class="col-md-2"><label for="floor">Lantai: </label></div>
					<div class="col-md-2">
						<input class="form-control" type="text" value=<?=$model->tenant->floor?> readonly>
					</div>
				</div>
			</div>
		</div>
		<div class="panel panel-body">
			<div class="col-md-12">
				<a class="btn btn-default" onclick="show_posted_item_div()">Posted Item</a>
				<a class="btn btn-default" href="<?=site_url('Order/Order_list')?>">Transaksi</a>
				<a class="btn btn-default" href="<?=site_url('Dispute')?>">Dispute</a>
				<a class="btn btn-default" href="<?=site_url('Item/post_item_list')?>">Produk Terjual</a>
			</div>
		</div>
		
		<div class="panel panel-default" id="posted_item" style="display:none">
			<div class="panel-heading">
				<h3>Daftar Posted Item</h3>
			</div>
			<div class="panel-body">
				<?php
				$i = 0;
				foreach($model->posted_items as $posted_item)
				{
					if ($i%3 == 0)
					{
					?>
					<div class="row">
					<?php
					}
					?>
						<div class="col-xs-4">
							<div class="thumbnail">
								<a href="<?=site_url('Item/post_item_detail/'.$posted_item->id)?>">
									<img src="<?=$posted_item->image_one_name?>" alt="<?=$posted_item->posted_item_name?>" style="width:50%">
									<div class="caption text-center">
										<?php 
										if ($posted_item->item_type == "ORDER")
										{
										?>
										<p><?=$posted_item->posted_item_name?></p>
										<?php
										}
										else
										{
										?>
										<p><?=$posted_item->posted_item_description?></p>
										<?php
										}
										?>
									</div>
								</a>
							</div>
						</div>
					<?php
					if ($i%3 == 2)
					{
					?>
					</div>
					<?php
					}
					$i++;
				}
				?>
				<div class="col-sm-3 col-sm-offset-9">
					<a href="<?=site_url('Item/post_item_list')?>" class="btn btn-default">Lihat Semua</a>
					<a href="<?=site_url('Item/post_item')?>" class="btn btn-default">Tambah</a>
				</div>
			</div>
		</div>
		
		<div class="panel panel-default" id="transaction" style="display:none">
			<div class="panel-heading">
				<h3>Daftar Transaksi</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th> <label for="tanggal1">Dibuat</label>	</th>
								<th> <label for="tanggal2">Lunas</label> </th>
								<th> <label for="status">Status</label> </th>
								<th> <label for="total_payable">Total Harga</label> </th>
								<th> </th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($model->orders as $order)
							{
								?>
								<tr>
									<td>
										<?=$order->date_created?> </td>
									<td>
										<?=$order->date_closed?> </td>
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
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
		<div class="panel panel-default" id="dispute" style="display:none">
			<div class="panel-heading">
				<h3>Dispute</h3>
			</div>
			<div class="panel-body">
				<?php
				foreach($model->posted_items as $posted_item)
				{
					?>
					<div class="col-xs-4">
						<div class="thumbnail">
							<a href="<?=site_url('Item/post_item_detail/'.$posted_item->id)?>">
								<img src="<?=site_url('img/favicon.gif')?>" alt="Image" style="width:50%">
								<div class="caption text-center">
									<p><?=$posted_item->posted_item_name?></p>
									<p><?=$posted_item->price?></p>
								</div>
							</a>
						</div>
					</div>
					<?php
				}
				?>
			</div>
		</div>
		
		<div class="panel panel-default" id="sold_item" style="display:none">
			<div class="panel-heading">
				<h3>Daftar Sold Item</h3>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<tr>
								<th> <label for="date">Tanggal</label></th>
								<th> <label for="item">Barang</label></th>
								<th> <label for="price">Harga</label> </th>
								<th> <label for="variance">Keterangan</label> </th>
								<th> </th>
							</tr>
						</thead>
						<tbody>
							<?php
							foreach($model->sold_items as $sold_item)
							{
								?>
								<tr>
									<td>
										<?=$sold_item->date_closed?> </td>
									<td>
										<?=$sold_item->name?> </td>
									<td>
										<?=$sold_item->sold_price?> </td>
									<td>
										<?=$sold_item->var_type .": ". $sold_item->var_description?> </td>
								</tr>
								<?php
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
*/
?>