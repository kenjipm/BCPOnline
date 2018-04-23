<?php

	// Model Dummy Untuk Search Item List
	// $model->search_items = array();
	
	// $model->search_items[0] = new class{};
	// $model->search_items[0]->id = 1;
	// $model->search_items[0]->name = "Charger Samsung";
	// $model->search_items[0]->price = "Rp 250.000";
	// $model->search_items[0]->image_one_name = site_url("img/upload/user1/charger_samsung.jpg");
	// $model->search_items[1] = new class{};
	// $model->search_items[1]->id = 2;
	// $model->search_items[1]->name = "Charger Wireless";
	// $model->search_items[1]->price = "Rp 350.000";
	// $model->search_items[1]->image_one_name = site_url("img/upload/user1/wireless_samsung.jpg");

	?>
<!-- left bar buat category -->
<div class="cb-row">
	<div class="cb-col-fifth">
		<div class="panel-category">
			<h3>KATEGORI</h3>
			<div class="panel-category-heading">
			<?php
			foreach($model->categories as $category)
			{
				?>
				<a href="<?=site_url('item/category/'.$category->id)?>" class="category">
					<div class="panel-category-body">
						<?=$category->category_name?>
					</div>
				</a>
				<?php
			}
			?>
			</div>
		</div>
	</div>
	<div class="cb-col-fifth-4">
		<div class="cb-panel">
			<div class="cb-panel-heading cb-align-center">
				<h3 class="cb-txt-primary-1 cb-font-title">PRODUK LAINNYA</h3>
			</div>
			<div class="cb-panel-body cb-p-2">
				<div class="item-showcase cb-row">
					<?php
						foreach($model->promoted_items as $promoted_item)
						{
							?>
							<a href="<?=site_url('item/'.$promoted_item->id)?>" class="cb-col-fourth">
								<div class="item_thumbnail cb-border-round">
									<div class="item_photo">
										<img src="<?=$promoted_item->image_one_name?>" alt="<?=$promoted_item->posted_item_name?>"/>
									</div>
									<div class="item_tenant_name">
									</div>
									<div class="item_name">
										<?=$promoted_item->posted_item_name?>
									</div>
									<div class="item_initial_price">
										
									</div>
									<div class="item_current_price">
										<?=$promoted_item->price?>
									</div>
									<div class="item_rating">
									</div>
								</div>
							</a>
							<?php
						}
					?>
					<?php
						foreach($model->search_items as $search_item)
						{
							?>
							<a href="<?=site_url('item/'.$search_item->id)?>" class="cb-col-fourth">
								<div class="item_thumbnail cb-border-round">
									<div class="item_photo">
										<img src="<?=$search_item->image_one_name?>" alt="<?=$search_item->posted_item_name?>"/>
									</div>
									<div class="item_tenant_name">
									</div>
									<div class="item_name">
										<?=$search_item->posted_item_name?>
									</div>
									<div class="item_initial_price">
										
									</div>
									<div class="item_current_price">
										<?=$search_item->price?>
									</div>
									<div class="item_rating">
									</div>
								</div>
							</a>
							<?php
						}
						if (count($model->search_items) <= 0)
						{
							?>
							<div class="col-md-4">
								<label>Hasil pencarian tidak ditemukan</label>
							</div>
							<?php
						}
						?>
					?>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="cb-row">
	<?php ?>
	<a href="<?=site_url('item/category/' .$model->category->id)?>">
		1
	</a>
</div>