
<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">DAFTAR LELANG CUSTOMER</div>
</div>
<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row">
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Nama </div>
		</div>
		<div class="cb-col-fifth-2">
			<div class="cb-label cb-font-title cb-align-center"> Waktu Bidding </div>
		</div>
		<div class="cb-col-fifth">
			<div class="cb-label cb-font-title cb-align-center"> Harga </div>
		</div>
	</div>
	<?php
	foreach($model->biddings as $bidding)
	{
		?>
		<input type="hidden" value="<?=$bidding->posted_item_id?>" name="posted_item_id"></input>
		<input type="hidden" value="<?=$bidding->bid_price?>" name="bid_price"></input>
		
		<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
			<div class="cb-col-fifth">
				<div class=" cb-align-center"> <?=$bidding->customer_name?> </div>
			</div>
			<div class="cb-col-fifth-2">
				<div class="cb-align-center"> <?=$bidding->bid_time?> </div>
			</div>
			<div class="cb-col-fifth">
				<div class="cb-align-center"> <?=$bidding->bid_price?> </div>
			</div>
			<div class="cb-col-fifth">
				<button class="cb-button-form" onclick="choose_winner(<?=$bidding->id?>)" type="button" class="button_winner" <?= $model->is_choosen ? "disabled" : ""?> >PEMENANG</button>
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
									<button class="btn btn-default" onclick="choose_winner(<?=$bidding->id?>)" type="button" class="button_winner" <?= $model->is_choosen ? "disabled" : ""?> >Pemenang</button></td>
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

*/ ?>