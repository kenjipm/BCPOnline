<div class="row">
	<!-- left bar buat category -->
	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Kategori</h3>
			</div>
			<?php
			foreach($model->categories as $category)
			{
				?>
				<a href="<?=site_url('item/category/'.$category->id)?>">
					<div class="panel-footer">
						<?=$category->category_name?>
					</div>
				</a>
				<?php
			}
			?>
		</div>
	</div>
	
	<div class="col-md-10">
	
		<!-------- FOLLOWING TENANT NEW ITEMS -------->
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
		
		<!-------- SEARCH INPUT -------->
		<div class="panel panel-default">
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
		</div>
			
		<!-------- HOT ITEM -------->
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
	</div>
	
</div>