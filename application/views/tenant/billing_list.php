<?php
	// Model untuk Bill
	
	// dummy billing list
	// $model->bills = array();
	
	// $model->bills[0] = new class{};
	// $model->bills[0]->id = 1;
	// $model->bills[0]->date_created = "03-12-2017";
	// $model->bills[0]->date_closed = "07-12-2017";
	// $model->bills[0]->customer = "Billy";
	// $model->bills[0]->address = "Jalan Moh. Toha no 194";
	// $model->bills[0]->shipping_charge = "Rp 25.000,-";
	// $model->bills[0]->total_payable = "Rp 275.000,-";
	// $model->bills[1] = new class{};
	// $model->bills[1]->id = 2;
	// $model->bills[1]->date_created = "05-12-2017";
	// $model->bills[1]->date_closed = "08-12-2017";
	// $model->bills[1]->customer = "Willy";
	// $model->bills[1]->address = "Jalan Soekarno Hatta no 22";
	// $model->bills[1]->shipping_charge = "Rp 15.000,-";
	// $model->bills[1]->total_payable = "Rp 165.000,-";
	// $model->bills[2] = new class{};
	// $model->bills[2]->id = 3;
	// $model->bills[2]->date_created = "08-12-2017";
	// $model->bills[2]->date_closed = "09-12-2017";
	// $model->bills[2]->customer = "Christo";
	// $model->bills[2]->address = "Jalan Pajajaran no 14";
	// $model->bills[2]->shipping_charge = "Rp 20.000,-";
	// $model->bills[2]->total_payable = "Rp 180.000,-";
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Billing</h3>
		</div>
		<div class="panel-body">
			<table>
				<thead>
					<th> <label for="tanggal">Tanggal</label>	</th>
					<th> <label for="customer">Customer</label> </th>
					<th> <label for="address">Alamat</label> </th>
					<th> <label for="total_payable">Total Harga</label> </th>
				</thead>
				<tbody>
					<?php
					foreach($model->billings as $bill)
					{
						?>
						<tr class="row list-group">
							<td>
								<?=$bill->date_created?> </td>
							<td>
								<?=$bill->customer?> </td>
							<td>
								<?=$bill->address?> </td>
							<td>
								<?=$bill->sold_price?> </td>
							<td>
								<a href="<?=site_url('billing/detail/'.$bill->id)?>">
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