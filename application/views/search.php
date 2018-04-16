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
	<div class="col-md-2">
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
<div class="col-sm-10">
	<div class="panel-item-heading">
		<h3><?=$title?></h3>
	</div>
	<div class="panel-item-body">
		<div class="row">
			<?php
			foreach($model->promoted_items as $promoted_item)
			{
				?>
					<div class="col-md-3">
						<div class="panel panel-default">
							<a href="<?=site_url('item/'.$promoted_item->id)?>">
								<div class="panel-body">
									<img class="col-md-12" src="<?=$promoted_item->image_one_name?>" alt="<?=$promoted_item->posted_item_name?>"/>
								</div>
								<div class="panel-footer">
									<label class="control-label">*<?=$promoted_item->posted_item_name?></label><br/>
									<label class="control-label"><?=$promoted_item->price?></label><br/>
								</div>
							</a>
						</div>
					</div>
				<?php
			}
			foreach($model->search_items as $search_item)
			{
				?>
					<div class="col-md-3">
						<div class="panel panel-default">
							<a href="<?=site_url('item/'.$search_item->id)?>">
								<div class="panel-body">
									<img class="col-md-12" src="<?=$search_item->image_one_name?>" alt="<?=$search_item->posted_item_name?>"/>
								</div>
								<div class="panel-footer">
									<label class="control-label"><?=$search_item->posted_item_name?></label><br/>
									<label class="control-label"><?=$search_item->price?></label>
								</div>
							</a>
						</div>
					</div>
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
		</div>
	</div>
</div>