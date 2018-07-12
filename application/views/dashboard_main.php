<div class="ad_boxes">
	<?php
		foreach ($model->ad_boxes as $ad_box)
		{
			?>
			<div class="ad_box <?=$ad_box['class']?>">
				<?php
					if ($ad_box['type'] == 'slider')
					{
						?>
						<div class="cb-col-full cb-slider">
							<!-- Previous button -->
							<div class="cb-col-tenth cb-row cb-vertical-center cb-position-left cb-slider-arrow-container">
								<a class="slider-prev" onclick="plusSlides(-1)">&#10094;</a>
							</div>
							<div class="cb-col-full slider-compact">
								<?php
									foreach($ad_box['images'] as $image)
									{
										?>
										<div class="cb-col-full slider-slide ad_box-slider fadeout">
											<a href="<?=site_url($image['url'])?>">
												<img src="<?=site_url($image['path'])?>" alt=""/>
											</a>
										</div>
										<?php
									}
								?>
							</div>
							<!-- Next button -->
							<div class="cb-col-tenth cb-row cb-vertical-center cb-position-right cb-slider-arrow-container">
								<a class="slider-next" onclick="plusSlides(1)">&#10095;</a>
							</div>
							<div class="cb-col-full cb-row slider-dot cb-align-center" style="text-align:center">
								<?php
									for ($i = 1; $i <= count($ad_box); $i++)
									{
										?>
										<span class="dot" onclick="currentSlide(<?=$i?>)"></span> 
										<?php
									}
								?>
							</div>
						</div>
						<?php
					}
					else //if ($ad_box['type'] == 'image')
					{
						$image = (count($ad_box['images']) > 0) ? $ad_box['images'][0] : '';
						?>
						<a href="<?=site_url($image['url'])?>">
							<img class="ad_box-image" src="<?=site_url($image['path'])?>" alt=""/>
						</a>
						<?php
					}
				?>
			</div>
			<?php
		}
	?>
</div>

<div class="cb-row">
	<?php
		if (count($model->hot_items) > 0)
		{
			?>
			<div class="<?=($model->bidding_item != null)?'cb-col-half':'cb-col-full'?> cb-p-2">
				<div class="cb-panel">
					<div class="cb-panel-heading cb-row">
						<div class="cb-icon cb-icon-sm cb-icon-flag cb-mr-2"></div>
						<div class="cb-txt-primary-1 cb-font-title cb-font-size-xl">HOT ITEMS</div>
						<!--<a class="pull-right">Lihat Selebihnya</a>-->
					</div>
					<div class="cb-panel-body cb-bg-primary-3 cb-p-2">
						<div class="item-gallery-container">
							<div class="item-gallery">
								<?php
									foreach($model->hot_items as $hot_item)
									{
										?>
										<a href="<?=site_url('item/'.$hot_item->id)?>">
											<div class="item_thumbnail">
												<div class="item_heart">
													<div class="item_heart_icon cb-heart-red cb-heart">
														<div class="item_heart_count"><?=$hot_item->favorite->favorite_count?></div>
													</div>
												</div>
												<div class="item_photo">
													<img src="<?=$hot_item->image_one_name?>" alt="<?=$hot_item->posted_item_name?>"/>
												</div>
												<div class="item_tenant_name">
													<?=$hot_item->tenant->tenant_name?>
												</div>
												<div class="item_name">
													<?=$hot_item->posted_item_name?>
												</div>
												<div class="item_separator"></div>
												<div class="item_initial_price">
													<?=$hot_item->initial_price?>
												</div>
												<div class="item_current_price">
													<?=$hot_item->promo_price?>
												</div>
												<div class="item_rating cb-row cb-vertical-center cb-align-center">
													<span class="cb-star cb-star-<?=$hot_item->rating->rating_average_round?>"></span>
													<span class="cb-ml-2">(<?= $hot_item->rating->rating_count ?>)</span>
												</div>
											</div>
										</a>
										<?php
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		if ($model->bidding_item != null)
		{
			?>
			<input type="hidden" id="bidding_next_price" value="<?=$model->bidding_item->start_bid_price?>"/>
			<input type="hidden" id="bidding_item_id" value="<?=$model->bidding_item->id?>"/>
			<input type="hidden" id="bidding_cur_price" value="<?=$model->bidding_item->price?>"/>
			<input type="hidden" id="bidding_step" value="<?=$model->bidding_item->bidding_step?>"/>
			
			<div class="cb-col-half cb-p-2">
				<div class="cb-panel cb-bg-primary-2 cb-border-round cb-p-2">
					<div class="cb-panel-heading cb-row">
						<div class="cb-icon cb-icon-sm cb-icon-speaker cb-mr-2"></div>
						<div class="cb-txt-primary-1 cb-font-title cb-font-size-xl">LELANG</div>
						<div id="bid_time_left_live" class="cb-txt-primary-3 cb-font-title cb-font-size-xl cb-pl-5"></div>
						<!--<a class="cb-pull-right cb-txt-primary-1" href="<?=site_url('bidding')?>">Lihat Selebihnya</a>-->
					</div>
					<div class="cb-panel-body cb-bg-primary-3 cb-p-5 cb-panel-flex cb-vertical-center">
						<div class="cb-row">
							<div class="cb-col-half">
								<div class="item_photo">
									<img src="<?=$model->bidding_item->image_one_name?>" alt="<?=$model->bidding_item->posted_item_name?>"/>
								</div>
							</div>
							<div class="cb-col-half">
								<div class="cb-col-full cb-row">
									<div class="cb-row cb-col-full cb-mb-2 item_name">
										<?=$model->bidding_item->posted_item_name?>
									</div>
									<div class="cb-row cb-col-full" >
										<div class="sub_label">Harga sekarang</div>
									</div>
									<div class="cb-row cb-col-full cb-mb-2" >
										<div class="item_current_price" id="bidding_cur_price_str"><?=$model->bidding_item->price_str?></div>
									</div>
									<div class="cb-row cb-col-full cb-mb-2">
									</div>
									<div class="cb-row cb-col-full cb-mb-2">
										<input type="text" class="cb-input-text cb-align-right cb-col-tenth-8" id="bidding_next_price_str" value="<?=$model->bidding_item->start_bid_price?>" readonly/>
										<button type="button" class="cb-button-operational cb-button-group-left cb-col-tenth" id="btn-bid_add" onclick="bid_add_do()"><div class="cb-arrow cb-arrow-white cb-arrow-up"></div></button>
										<button type="button" class="cb-button-operational cb-button-group-right cb-col-tenth" id="btn-bid_sub" onclick="bid_sub_do()"><div class="cb-arrow cb-arrow-white cb-arrow-down"></div></button>
									</div>
									<div class="cb-row cb-col-full cb-mb-2">
									</div>
									<div class="cb-row cb-col-full cb-mb-2">
										<button type="button" class="cb-button-form cb-table-cell" onclick="submit_bid()" id="btn-submit_bid">PASANG</button>
									</div>
									<div class="" id="bidding_status"></div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
		else if (count($model->flash_items) > 0)
		{
			?>
			<div class="cb-col-half cb-p-2">
				<div class="cb-panel cb-bg-primary-2 cb-border-round cb-p-2">
					<div class="cb-panel-heading cb-row">
						<div class="cb-icon cb-icon-sm cb-icon-speaker cb-mr-2"></div>
						<div class="cb-txt-primary-1 cb-font-title cb-font-size-xl">FLASH SALE</div>
						<div id="flash_time_left" class="cb-txt-primary-3 cb-font-title cb-font-size-xl cb-pl-5"></div>
						<!--<a class="pull-right">Lihat Selebihnya</a>-->
					</div>
					<div class="cb-panel-body cb-bg-primary-3 cb-p-2">
						<div class="item-gallery-container">
							<div class="item-gallery">
								<?php
									foreach($model->flash_items as $flash_item)
									{
										?>
										<a href="<?=site_url('item/'.$flash_item->id)?>">
											<div class="item_thumbnail">
												<div class="item_heart">
													<div class="item_heart_icon cb-heart-red cb-heart">
														<div class="item_heart_count"><?=$flash_item->favorite->favorite_count?></div>
													</div>
												</div>
												<div class="item_photo">
													<img src="<?=$flash_item->image_one_name?>" alt="<?=$flash_item->posted_item_name?>"/>
												</div>
												<div class="item_tenant_name">
												</div>
												<div class="item_name">
													<?=$flash_item->posted_item_name?>
												</div>
												<div class="item_separator"></div>
												<div class="item_initial_price">
													<?=$flash_item->initial_price?>
												</div>
												<div class="item_current_price">
													<?=$flash_item->promo_price?>
												</div>
												<div class="item_rating cb-row cb-vertical-center cb-align-center">
													<span class="cb-star cb-star-<?=$flash_item->rating->rating_average_round?>"></span>
													<span class="cb-ml-2">(<?= $flash_item->rating->rating_count ?>)</span>
												</div>
											</div>
										</a>
										<?php
									}
								?>
							</div>
						</div>
					</div>
				</div>
			</div>
			<?php
		}
	?>
</div>

<?php
	if (count($model->tenant_items) > 0)
	{
		?>
		<div class="cb-row">
			<div class="cb-col-full">
				<div class="cb-panel">
					<div class="cb-panel-heading cb-align-center">
						<h3 class="cb-txt-primary-1 cb-font-title">NEW ITEMS</h3>
					</div>
					<div class="cb-panel-body cb-p-2">
						<div class="item-showcase cb-row">
							<?php
								foreach($model->tenant_items as $tenant_item)
								{
									?>
									<a href="<?=site_url('item/'.$tenant_item->id)?>" class="cb-col-fifth">
										<div class="item_thumbnail cb-border-round">
											<div class="item_heart">
												<div class="item_heart_icon cb-heart-red cb-heart">
													<div class="item_heart_count"><?=$tenant_item->favorite->favorite_count?></div>
												</div>
											</div>
											<div class="item_photo">
												<img src="<?=$tenant_item->image_one_name?>" alt="<?=$tenant_item->posted_item_name?>"/>
											</div>
											<div class="item_tenant_name">
												<?=$tenant_item->tenant->tenant_name?>
											</div>
											<div class="item_name">
												<?=$tenant_item->posted_item_name?>
											</div>
											<div class="item_separator"></div>
											<div class="item_initial_price">
												<?= $tenant_item->is_hot_item ? $tenant_item->price : "&nbsp;" ?>
											</div>
											<div class="item_current_price">
												<?= $tenant_item->is_hot_item ? $tenant_item->hot_item->promo_price : $tenant_item->price ?>
											</div>
											<div class="item_rating cb-row cb-vertical-center cb-align-center">
												<span class="cb-star cb-star-<?=$tenant_item->rating->rating_average_round?>"></span>
												<span class="cb-ml-2">(<?= $tenant_item->rating->rating_count ?>)</span>
											</div>
										</div>
									</a>
									<?php
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<?php
	}
?>

<!-- POPUP BID SUCCESS -->
<div id="popup_bid_success" class="popup popup-md">
	<div class="panel panel-default cb-row">
		<div class="cb-col-full cb-row cb-bg-image cb-bg-image-popup_bidding cb-txt-primary-3 cb-font-title cb-align-center cb-border-round">
			<div class="cb-col-full cb-row cb-font-size-dhuar cb-align-center cb-mt-xl">SELAMAT</div>
			<div class="cb-col-full cb-row cb-font-size-xxl cb-align-center cb-pb-5">Anda pemasang harga tertinggi</div>
			<div class="cb-col-fifth"></div>
			<div class="cb-col-fifth-3 cb-row cb-bg-primary-2 cb-mb-5 cb-border-round">
				<div class="cb-col-full cb-font-size-xxl"><span id="bid_win_price"></span></div>
				<div class="cb-col-full cb-font-size-lg">waktu tersisa</div>
				<div class="cb-col-full cb-font-size-lg"><span id="bid_time_left"></span></div>
			</div>
			<div class="cb-col-fifth"></div>
			<div class="cb-col-fifth cb-row cb-mb-5">
				<button type="button" class="cb-button cb-button-alternative cb-col-full" onclick="popup.close('popup_bid_success')">OK</button>
			</div>
		</div>
	</div>
</div>

<!-- POPUP BID DEPOSIT -->

<div id="popup_bid_deposit" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Deposit Lelang
		</div>
		<div class="panel-body">
			<form>
				<div class="form-group">
					<div class="col-sm-12">
						Untuk dapat mengikuti lelang, harap melakukan deposit dulu melalui transfer ke rekening 123456789 BCA a/n PT SAMP sejumlah <b>Rp 100.000</b>
						<button type="button" onclick="dummy_deposit_done()" class="btn btn-default">Deposit (dummy)</button>
					</div>
					<div class="col-sm-12">
						<a class="btn btn-default" href="<?=site_url('about/bidding')?>">Pelajari Lebih Lanjut</a>
						<button type="button" class="btn btn-default cb-pull-right" onclick="popup.close('popup_bid_deposit')">TUTUP</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<?php
/*
<!-- POPUP BID SUCCESS -->
<div id="popup_bid_success" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Harga Tertinggi!
		</div>
		<div class="panel-body">
			<form>
				<div class="form-group">
					<div class="col-sm-12">
						<h4>Selamat! Harga yang Anda ajukan adalah harga tertinggi!</h4>
						Lelang masih terbuka untuk <span id="bid_time_left"></span>
						<br/>
						<br/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-12">
						<button type="button" class="btn btn-default" onclick="popup.close('popup_bid_success')">OK</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div class="">
	
	<div class="col-md-10">
	
		<!-------- BIDDING LIVE -------->
		<?php
			/*if ($model->bidding_item != null)
			{
				?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Lelang</h3>
					</div>
					<div class="panel-body">
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
										<input type="hidden" id="bidding_next_price" value="<?=$model->bidding_item->start_bid_price?>"/>
										<input type="text" class="form-control" id="bidding_next_price_str" value="<?=$model->bidding_item->start_bid_price?>" readonly/>
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
					</div>
				</div>
				<?php
			}
		?>
		
		<!-------- BIDDING -------->
		<?php
			/*if ($model->bidding_item != null)
			{
				?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Lelang</h3>
					</div>
					<div class="panel-body">
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
									<div class="col-md-12">
										<?=$model->bidding_item->price_str?>
									</div>
								</div>
								<div class="row">
									<div class="col-md-6">
										<input type="text" class="form-control" id="bidding_next_price" value="<?=$model->bidding_item->start_bid_price?>" readonly />
									</div>
									<div class="col-md-6">
										<input type="hidden" id="bidding_item_id" value="<?=$model->bidding_item->id?>"/>
										<input type="hidden" id="bidding_cur_price" value="<?=$model->bidding_item->price?>"/>
										<input type="hidden" id="bidding_max_range" value="<?=$model->bidding_item->bidding_max_range?>"/>
										<div class="btn-group">
											<button type="button" class="btn btn-default" id="btn-bid_sub" onclick="bid_sub_do()" <?=$model->bidding_item->can_bid?'':'disabled'?>>-</button>
											<button type="button" class="btn btn-default" id="btn-bid_add" onclick="bid_add_do()" <?=$model->bidding_item->can_bid?'':'disabled'?>>+</button>
										</div>
									</div>
								</div>
								<div class="row">
									<div class="col-md-2">
										<button type="button" class="btn btn-default" onclick="submit_bid()" id="btn-submit_bid" <?=$model->bidding_item->can_bid?'':'disabled'?>>Pasang</button>
									</div>
									<div class="col-md-10" id="bidding_status"></div>
								</div>
								
							</div>
						</div>
					</div>
				</div>
				<?php
			}
		?>
	
		<!-------- FOLLOWING TENANT NEW ITEMS -------->
		<?php
			/*if (count($model->tenant_items) > 0)
			{
				?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>New Items</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<?php
							foreach($model->tenant_items as $tenant_item)
							{
								?>
									<div class="col-md-4">
										<div class="panel panel-default">
											<a href="<?=site_url('item/'.$tenant_item->id)?>">
												<div class="panel-body">
													<img class="col-md-12" src="<?=$tenant_item->image_one_name?>" alt="<?=$tenant_item->posted_item_name?>"/>
												</div>
												<div class="panel-footer">
													<label class="control-label"><?=$tenant_item->posted_item_name?></label><br/>
													<label class="control-label"><?=$tenant_item->price?></label>
												</div>
											</a>
										</div>
									</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<?php
			}
		?>
		
		<!-------- SEARCH INPUT -------->
		<!--<div class="panel panel-default">
			<div class="panel-body">
				<div class="col-md-6">
					<div class="row">
						<form action="<?=site_url('item/search')?>" method="get" class="navbar-form navbar-left">
							<div class="input-group">
								<input name="keywords" type="text" class="form-control" placeholder="Search Items...">
								<div class="input-group-btn">
									<button class="btn btn-default" type="submit">
										Search
									</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>-->
			
		<!-------- HOT ITEM -------->
		
		<?php
			/*if (count($model->hot_items) > 0)
			{
				?>
				<div class="panel panel-default">
					<div class="panel-heading">
						<h3>Hot Items</h3>
					</div>
					<div class="panel-body">
						<div class="row">
							<?php
							foreach($model->hot_items as $hot_item)
							{
								?>
									<div class="col-md-4">
										<div class="panel panel-default">
											<a href="<?=site_url('item/'.$hot_item->id)?>">
												<div class="panel-body">
													<img class="col-md-12" src="<?=$hot_item->image_one_name?>" alt="<?=$hot_item->posted_item_name?>"/>
												</div>
												<div class="panel-footer">
													<label class="control-label"><?=$hot_item->posted_item_name?></label><br/>
													<label class="control-label"><?=$hot_item->initial_price . " >>> " . $hot_item->promo_price?></label>
												</div>
											</a>
										</div>
									</div>
								<?php
							}
							?>
						</div>
					</div>
				</div>
				<?php
			}
		?>
	</div>
	
</div>
*/

?>