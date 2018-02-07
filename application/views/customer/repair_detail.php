<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Barang untuk Dikirim</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<label class="control-label col-xs-3" for="otp">OTP:</label>
					<div class="col-xs-9"><input type="text" class="form-control" 
						value="<?=$model->repair_list[0]->otp?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="deliverer_name">Deliverer:</label>
					<div class="col-xs-9"><input type="text" class="form-control" 
						value="<?=$model->repair_list[0]->deliverer_name?>" readonly></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3" for="orders">Repair List:</label>
					<div class="col-xs-9 pull-right">
						<div class="row list-group">
							<div class="col-xs-4">Nama </div>
						</div>
					</div>
					<div class="row">
					<?php
					foreach($model->repair_list as $repair)
					{
						?>
						<div class="col-xs-9 pull-right">
							<div class="row list-group">
								<div class="col-xs-4 list-group-item">
									<?=$repair->posted_item_description?> </div>
								<div class="col-xs-1">
									<a class="btn btn-default" href="<?=site_url('Order/transaction_detail/'.$repair->id)?>">
										Lihat
									</a></div>
							</div>
						</div>
						<?php
					}
					?>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>
