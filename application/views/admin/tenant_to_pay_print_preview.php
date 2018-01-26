<!--div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
		<div class="panel-body"-->
			<div class="row">
				<div class="col-xs-3"><label>Nama</label></div>
				<div class="col-xs-9">: <?=$model->tenant->tenant_name?></div>
			</div>
			<div class="row">
				<div class="col-xs-3"><label>No Unit</label></div>
				<div class="col-xs-9">: <?=$model->tenant->unit_number?></div>
			</div>
			<div class="row">
				<div class="col-xs-3"><label>Lantai</label></div>
				<div class="col-xs-9">: <?=$model->tenant->floor?></div>
			</div>
		
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label>Nama</label></th>
							<th> <label>Jumlah</label></th>
							<th> <label>Harga Jual</label></th>
							<th> <label>Potongan Voucher</label></th>
							<th> <label>Total</label></th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->order_details as $order_detail)
						{
							?>
							<tr>
								<td>
									<?=$order_detail->posted_item_name?>
								</td>
								<td>
									<?=$order_detail->quantity?>
								</td>
								<td>
									<?=$order_detail->sold_price?>
								</td>
								<td>
									<?=$order_detail->voucher_cut_price?>
								</td>
								<td>
									<?=$order_detail->total_unpaid?>
								</td>
							</tr>
							<?php
						}
						?>
						
					</tbody>
				</table>
			</div>
			
			<div class="pull-right">
				<h4>Total: <?=$model->tenant->total_unpaid?></h4>
			</div>
		<!--/div>
	</div>
</div-->