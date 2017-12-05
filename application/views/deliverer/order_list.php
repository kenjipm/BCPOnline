<?php
	// Model untuk Order List
	
	// dummy data order list
	$model->orders = array();
	
	$model->orders[0] = new class{};
	$model->orders[0]->id = 1;
	$model->orders[0]->quantity = 1;
	$model->orders[0]->posted_item = new class{};
	$model->orders[0]->posted_item->name = "Djisamsung Galaksih";
	$model->orders[0]->posted_item->tenant = "TsamTsung Store";
	$model->orders[1] = new class{};
	$model->orders[1]->id = 2;
	$model->orders[1]->quantity = 1;
	$model->orders[1]->posted_item = new class{};
	$model->orders[1]->posted_item->name = "Kesing Appa Kamera";
	$model->orders[1]->posted_item->tenant = "Oppah Store";
	$model->orders[2] = new class{};
	$model->orders[2]->id = 3;
	$model->orders[2]->quantity = 2;
	$model->orders[2]->posted_item = new class{};
	$model->orders[2]->posted_item->name = "Kesing Djisamsung";
	$model->orders[2]->posted_item->tenant = "TsamTsung Store";
	
?>


<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3><?=$title?></h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-xs-9 pull-right">
						<div class="row list-group">
							<div class="col-xs-4">Nama </div>
							<div class="col-xs-1">Jml </div>
							<div class="col-xs-4">Tenant </div>
						</div>
					</div>
					<div class="row">
					<?php
					foreach($model->orders as $order)
					{
						?>
						<a href="<?=site_url('Order/transaction_detail/'.$order->id)?>">
							<div class="col-xs-9 pull-right">
								<div class="row list-group">
									<div class="col-xs-4 list-group-item">
										<?=$order->posted_item->name?> </div>
									<div class="col-xs-1 list-group-item">
										<?=$order->quantity?> </div>
									<div class="col-xs-3 list-group-item">
										<?=$order->posted_item->tenant?> </div>
									<div class="col-xs-2">
										<a class="btn btn-default" onclick="">
											OTP
										</a>
									</div>
								</div>
							</div>
						</a>
						<?php
					}
					?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
