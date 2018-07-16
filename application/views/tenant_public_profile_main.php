<div class="cb-row cb-p-5">
	<div class="cb-col-full">
		<h3 class="cb-txt-primary-1 cb-font-title">PROFIL TENANT</h3>
	</div>
	<div class="cb-col-full cb-p-5 cb-border-round cb-bg-primary-3">
		<div class="cb-row">
			<div class="cb-col-fourth">
				<div id="thumbnail-profile_pic" class="thumbnail">
					<img src="<?=$model->tenant->account->profile_pic?>" alt="<?=$model->tenant->tenant_name?>" style="width:100%">
				</div>
			</div>
			<div class="cb-col-fourth-3 cb-pl-5">
				<div class="cb-row cb-mb-5">
					<div class="cb-col-full">
						<h3 class="cb-txt-primary-1 cb-font-title"><?=$model->tenant->tenant_name?></h3>
					</div>
				</div>
				<div class="cb-row cb-mb-5">
					<div class="cb-col-tenth cb-font-title cb-font-size-lg cb-txt-primary-1">Unit</div>
					<div class="cb-col-small cb-font-title cb-font-size-lg cb-txt-primary-1">:</div>
					<div class="cb-col-tenth-5">
						<input type="text" class="cb-input-text" value="<?=$model->tenant->unit_number?>" readonly/>
					</div>
				</div>
				<div class="cb-row cb-mb-5">
					<div class="cb-col-tenth cb-font-title cb-font-size-lg cb-txt-primary-1">Lantai</div>
					<div class="cb-col-small cb-font-title cb-font-size-lg cb-txt-primary-1">:</div>
					<div class="cb-col-tenth-5">
						<input type="text" class="cb-input-text" value="<?=$model->tenant->floor?>" readonly/>
					</div>
				</div>
				<div class="cb-row">
					<button type="button" class="cb-col-fourth cb-button cb-button-form <?= $model->tenant->btn_class ?>" id="btn-toggle_tenant_favorite" onclick="toggle_tenant_favorite(<?=$model->tenant->id?>)"><?= $model->tenant->btn_text ?></button>
					<form method="post" action="<?=site_url('message/open_detail_do')?>" class="cb-row cb-col-fourth">
						<input type="hidden" name="receiver_account_id" value="<?=$model->tenant->account_id?>"/>
						<button type="submit" class="cb-col-full cb-ml-5 cb-button cb-button-form" id="btn-send_message">KIRIMKAN PESAN</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<?php
	if (count($model->tenant->items) > 0)
	{
		?>
		<div class="cb-row cb-mb-5">
			<div class="cb-col-full">
				<div class="cb-panel">
					<div class="cb-panel-heading cb-align-center">
						<h3 class="cb-txt-primary-1 cb-font-title">PRODUK DARI TOKO INI</h3>
					</div>
					<div class="cb-panel-body cb-p-2">
						<div class="item-showcase cb-row">
							<?php
								foreach($model->tenant->items as $item)
								{
									if ($item->item_type == "ORDER")
									{
									?>
									<a href="<?=site_url('item/'.$item->id)?>" class="cb-col-fifth">
										<div class="item_thumbnail cb-border-round">
											<div class="item_heart">
												<div class="item_heart_icon cb-heart-red cb-heart">
													<div class="item_heart_count"><?=$item->favorite->favorite_count?></div>
												</div>
											</div>
											<div class="item_photo">
												<img src="<?=$item->image_one_name?>" alt="<?=$item->posted_item_name?>"/>
											</div>
											<div class="item_tenant_name">
											</div>
											<div class="item_name">
												<?=$item->posted_item_name?>
											</div>
											<div class="item_separator"></div>
											<div class="item_initial_price">
												<?= $item->is_hot_item ? $item->price : "&nbsp;" ?>
											</div>
											<div class="item_current_price">
												<?= $item->is_hot_item ? $item->hot_item->promo_price : $item->price ?>
											</div>
											<div class="item_rating cb-row cb-vertical-center cb-align-center">
												<span class="cb-star cb-star-<?=$item->rating->rating_average_round?>"></span>
												<span class="cb-ml-2">(<?= $item->rating->rating_count ?>)</span>
											</div>
										</div>
									</a>
									<?php
									}
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="cb-row cb-mb-5">
			<div class="cb-col-full">
				<div class="cb-panel">
					<div class="cb-panel-heading cb-align-center">
						<h3 class="cb-txt-primary-1 cb-font-title">JASA SERVIS DARI TOKO INI</h3>
					</div>
					<div class="cb-panel-body cb-p-2">
						<div class="item-showcase cb-row">
							<?php
								foreach($model->tenant->items as $item)
								{
									if ($item->item_type == "REPAIR")
									{
									?>
									<a href="<?=site_url('item/'.$item->id)?>" class="cb-col-fifth">
										<div class="item_thumbnail cb-border-round">
											<div class="item_heart">
												<div class="item_heart_icon cb-heart-red cb-heart">
													<div class="item_heart_count"><?=$item->favorite->favorite_count?></div>
												</div>
											</div>
											<div class="item_photo">
												<img src="<?=$item->image_one_name?>" alt="<?=$item->posted_item_name?>"/>
											</div>
											<div class="item_tenant_name">
											</div>
											<div class="item_name">
												<?=$item->posted_item_name?>
											</div>
											<div class="item_separator"></div>
											<div class="item_initial_price">
												<?= $item->is_hot_item ? $item->price : "&nbsp;" ?>
											</div>
											<div class="item_current_price">
												<?= $item->is_hot_item ? $item->hot_item->promo_price : $item->price ?>
											</div>
											<div class="item_rating cb-row cb-vertical-center cb-align-center">
												<span class="cb-star cb-star-<?=$item->rating->rating_average_round?>"></span>
												<span class="cb-ml-2">(<?= $item->rating->rating_count ?>)</span>
											</div>
										</div>
									</a>
									<?php
									}
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

<?php
/*
<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Profil</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-md-3">
						<div id="thumbnail-profile_pic" class="thumbnail">
							<img src="<?=$model->tenant->account->profile_pic?>" alt="<?=$model->tenant->tenant_name?>" style="width:100%">
						</div>
						<button type="button" class="btn btn-default col-md-12 <?= $model->tenant->btn_class ?>" id="btn-toggle_tenant_favorite" onclick="toggle_tenant_favorite(<?=$model->tenant->id?>)"><?= $model->tenant->btn_text ?></button>
						<form method="post" action="<?=site_url('message/open_detail_do')?>">
							<input type="hidden" name="receiver_account_id" value="<?=$model->tenant->account_id?>"/>
							<button type="submit" class="btn btn-default col-md-12" id="btn-send_message">Kirim Pesan</button>
						</form>
					</div>
					<div class="col-md-9">
						<div class="row"><?=$model->tenant->tenant_name?></div>
						<div class="row"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Items</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<?php
					foreach($model->tenant->items as $tenant_item)
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
	</div>
</div>
*/
?>