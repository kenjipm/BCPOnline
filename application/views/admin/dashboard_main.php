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
			<a href="<?=site_url('category/category_list')?>">
				<button class="btn btn-default">Lihat Semua</button>
			</a>
		</div>
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Brand</h3>
			</div>
			<?php
			foreach($model->brands as $brand)
			{
				?>
				<a href="<?=site_url('item/brand/'.$brand->id)?>">
					<div class="panel-footer">
						<?=$brand->brand_name?>
					</div>
				</a>
				<?php
			}
			?>
			<a href="<?=site_url('brand/brand_list')?>">
				<button class="btn btn-default">Lihat Semua</button>
			</a>
		</div>
	</div>
	
	<div class="col-md-10">
			
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
											<label class="control-label"><?=$hot_item->price?></label>
										</div>
									</a>
								</div>
							</div>
						<?php
					}
					?>
				</div>
				<a href="<?=site_url('item/post_item_list')?>">
					<button class="btn btn-default">Lihat Semua Item</button>
				</a>
				<a href="<?=site_url('bidding/create_bidding')?>">
					<button class="btn btn-default">Tambah Item Lelang</button>
				</a>
			</div>
		</div>
	</div>
	
</div>