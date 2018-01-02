<?php
	// Model untuk Order List
	
	// dummy data order list
	// $model->orders = array();
	
	// $model->orders[0] = new class{};
	// $model->orders[0]->id = 1;
	// $model->orders[0]->quantity = 1;
	// $model->orders[0]->posted_item = new class{};
	// $model->orders[0]->posted_item->name = "Djisamsung Galaksih";
	// $model->orders[0]->posted_item->tenant = "TsamTsung Store";
	// $model->orders[1] = new class{};
	// $model->orders[1]->id = 2;
	// $model->orders[1]->quantity = 1;
	// $model->orders[1]->posted_item = new class{};
	// $model->orders[1]->posted_item->name = "Kesing Appa Kamera";
	// $model->orders[1]->posted_item->tenant = "Oppah Store";
	// $model->orders[2] = new class{};
	// $model->orders[2]->id = 3;
	// $model->orders[2]->quantity = 2;
	// $model->orders[2]->posted_item = new class{};
	// $model->orders[2]->posted_item->name = "Kesing Djisamsung";
	// $model->orders[2]->posted_item->tenant = "TsamTsung Store";
	
?>


<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Pengambilan Barang</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="tenant_name">Tenant</label> </th>
							<th> <label for="collection_code">Kode OTP</label> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($model->order_list)
						{
							foreach($model->order_list as $order)
							{
								?>
								<tr>
									<td><?=$order->tenant?></td>
									<td><?=$order->collection_code?></td>
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

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Pengiriman Barang</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="address">Alamat</label> </th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php
						if ($model->deliver_list)
						{
							foreach($model->deliver_list as $deliver)
							{
								?>
								<tr>
									<td><?=$deliver->address?></td>
									<td>
										<div id="otp">
											<button type="button" class="btn btn-default" onclick="popup.open('popup_otp')">Masukkan Kode OTP</button>
										</div>
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

<div id="popup_otp" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Kode OTP
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Masukkan Kode OTP:</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-4 col-sm-offset-4">
						<input type="text" class="form-control">
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-7 col-sm-offset-5">
						<button type="button" class="btn btn-default" onclick="popup.close('popup_otp')">Kirim</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>