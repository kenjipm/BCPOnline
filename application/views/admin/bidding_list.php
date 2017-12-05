<?php
	// Model untuk customer
	
	// dummy bidding list
	$model->biddings = array();
	
	// Model dummy bidding
	$model->biddings[0] = new class{};
	$model->biddings[0]->id = 1;
	$model->biddings[0]->bidding_id = "17120377701";
	$model->biddings[0]->bidding_name = "Djisamsung";
	$model->biddings[0]->bidding_description = "Deskripsi bidding Djisamsung";
	$model->biddings[1] = new class{};
	$model->biddings[1]->id = 1;
	$model->biddings[1]->bidding_id = "17120377701";
	$model->biddings[1]->bidding_name = "Appa";
	$model->biddings[1]->bidding_description = "Deskripsi bidding Appa";
	$model->biddings[2] = new class{};
	$model->biddings[2]->id = 1;
	$model->biddings[2]->bidding_id = "17120377701";
	$model->biddings[2]->bidding_name = "Tos Ibak";
	$model->biddings[2]->bidding_description = "Deskripsi bidding Tos Ibak";
	
	
	
?>
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar bidding</h3>
		</div>
		<div class="panel-body">
			<div class="row list-group">
				<div class="col-xs-2"> <label for="bidding_id">ID</label>	</div>
				<div class="col-xs-2"> <label for="bidding_name">Nama bidding</label> </div>
				<div class="col-xs-8"> <label for="account_name">Deskripsi</label> </div>
			</div>
			<?php
			foreach($model->biddings as $bidding)
			{
				?>
				<div class="row list-group">
					<a href="<?=site_url('bidding/bidding_detail/'.$bidding->id)?>">
						<div class="col-xs-2 list-group-item">
							<?=$bidding->bidding_id?> </div>
						<div class="col-xs-2 list-group-item">
							<?=$bidding->bidding_name?> </div>
						<div class="col-xs-8 list-group-item">
							<?=$bidding->bidding_description?> </div>
					</a>
				</div>
				<?php
			}
			?>
			<a class="btn btn-default" href="<?=site_url('bidding/create_bidding')?>">
				Buat Bidding
			</a>	
		</div>
	</div>
</div>
