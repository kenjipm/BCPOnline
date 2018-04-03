
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Lihat Bidding</h3>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?=site_url('Bidding_live/choose_winner')?>" method="post">
				<div class="table-responsive">
					<table class="table table-striped table-bordered">
						<thead>
							<label class="control-label col-xs-3" for="title">Daftar Bidding Customer</label>
							<tr>
								<th> ID Customer </th>
								<th> Waktu Bidding </th>
								<th> Harga </th>
								<th> </th>
							</tr>
						</thead>
						<tbody>
						<?php
						foreach($model->biddings as $bidding)
						{
							?>
							<input type="hidden" value="<?=$bidding->posted_item_id?>" name="posted_item_id"></input>
							<input type="hidden" value="<?=$bidding->bid_price?>" name="bid_price"></input>
							<tr>
								<td>
									<?=$bidding->customer_name?></td>
								<td>
									<?=$bidding->bid_time?> </td>
								<td>
									<?=$bidding->bid_price?> </td>
								<td>
									<button class="btn btn-default" onclick="choose_winner(<?=$bidding->id?>)" type="button" class="button_winner">Pemenang</button></td>
							</tr>
							<?php
						}
						?>
						</tbody>
					</table>
				</div>
			</form>
		</div>
	</div>
</div>