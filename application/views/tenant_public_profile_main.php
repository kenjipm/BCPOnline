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