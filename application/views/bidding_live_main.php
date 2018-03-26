<div class="row">
	<div class="col-md-12">
	
	<?php
		if (!$model->is_deposit)
		{
			?>
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3>Keterangan</h3>
				</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12">
							Untuk dapat mengikuti lelang, harap melakukan deposit dulu melalui transfer ke rekening 123456789 BCA a/n PT SAMP sejumlah <b>Rp 100.000</b>
						</div>
						<div class="col-md-12">
							<button type="button" onclick="dummy_deposit_done()" class="btn btn-default">Deposit (dummy)</button>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	?>
		
		<!-------- BIDDING LIVE -------->
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Lelang</h3>
			</div>
			<div class="panel-body">
				<?php
					if ($model->bidding_item != null)
					{
						?>
						<div class="row">
							<div class="col-md-4">
								<div class="panel panel-default">
									<!--<a href="<?=site_url('item/'.$model->bidding_item->id)?>">-->
										<div class="panel-body">
											<img class="col-md-12" src="<?=$model->bidding_item->image_one_name?>" alt="<?=$model->bidding_item->posted_item_name?>"/>
										</div>
										<div class="panel-footer">
											<label class="control-label"><?=$model->bidding_item->posted_item_name?></label>
										</div>
									<!--</a>-->
								</div>
							</div>
							<div class="col-md-8">
								<div class="row">
									<div class="col-md-12">
										<label class="control-label">Harga sekarang</label>
									</div>
								</div>
								<div class="row">
									<div class="col-md-12" id="bidding_cur_price_str">
										<?=$model->bidding_item->price_str?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<input type="text" class="form-control" id="bidding_next_price" value="<?=$model->bidding_item->start_bid_price?>" />
									</div>
									<div class="col-md-6">
										<input type="hidden" id="bidding_item_id" value="<?=$model->bidding_item->id?>"/>
										<input type="hidden" id="bidding_cur_price" value="<?=$model->bidding_item->price?>"/>
										<input type="hidden" id="bidding_step" value="<?=$model->bidding_item->bidding_step?>"/>
										<div class="btn-group">
											<button type="button" class="btn btn-default" id="btn-bid_sub" onclick="bid_sub_do()">-</button>
											<button type="button" class="btn btn-default" id="btn-bid_add" onclick="bid_add_do()">+</button>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<button type="button" class="btn btn-default" onclick="submit_bid()" id="btn-submit_bid">Pasang</button>
									</div>
									<div class="col-md-10" id="bidding_status"></div>
								</div>
								
							</div>
						</div>
						<?php
					}
					else
					{
						?>
						Tidak ada barang sedang dilelang
						<?php
					}
				?>
			</div>
		</div>
		
	</div>
</div>