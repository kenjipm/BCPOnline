
<!-- left bar buat category -->
<div class="cb-row">
	<div class="cb-col-fifth">
		<div class="cb-p-5">
			<div class= "cb-txt-primary-1 cb-font-title cb-font-size-xl cb-align-center cb-pb-2">KATEGORI</div>
			<div class="cb-border-round cb-bg-primary-1 cb-pl-5 cb-pr-5 cb-pb-5">
			<?php
			foreach($model->categories as $category)
			{
				?>
				<div class="cb-row cb-border-bottom cb-border-white">
					<a href="<?=site_url('item/category/'.$category->id)?>" class="category cb-col-full cb-font-primary-2">
						<div class="panel-body">
							<?=$category->category_name?>
						</div>
					</a>
				</div>
				<?php
			}
			?>
			</div>
		</div>
	</div>
	<div class="cb-col-fifth-4">
		<div class="cb-p-5">
			<div class="cb-txt-primary-1 cb-font-title cb-font-size-xl cb-align-center">PRODUK</div>
		
			<div class="item-showcase cb-row">
				<?php
					foreach($model->promoted_items as $promoted_item)
					{
						?>
						<a href="<?=site_url('item/'.$promoted_item->id)?>" class="cb-col-fourth cb-pb-3">
							<div class="item_thumbnail cb-border-round">
								<div class="item_photo">
									<img src="<?=$promoted_item->image_one_name?>" alt="<?=$promoted_item->posted_item_name?>"/>
								</div>
								<div class="item_tenant_name">
								</div>
								<div class="item_name">
									*<?=$promoted_item->posted_item_name?>
								</div>
								<div class="item_initial_price">
									
								</div>
								<div class="item_current_price">
									<?=$promoted_item->price?>
								</div>
								<div class="item_rating cb-row cb-vertical-center cb-align-center">
									<span class="cb-star cb-star-<?=$promoted_item->rating->rating_average_round?>"></span>
									<span class="cb-ml-2">(<?= $promoted_item->rating->rating_count ?>)</span>
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
						<a href="<?=site_url('item/'.$search_item->id)?>" class="cb-col-fourth cb-pb-3">
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
								<div class="item_rating cb-row cb-vertical-center cb-align-center">
									<span class="cb-star cb-star-<?=$search_item->rating->rating_average_round?>"></span>
									<span class="cb-ml-2">(<?= $search_item->rating->rating_count ?>)</span>
								</div>
							</div>
						</a>
						<?php
					}
					if (count($model->search_items) <= 0)
					{
						?>
						<div class="cb-panel-body cb-bg-primary-3 cb-p-5 cb-mt-2">
							<div class="cb-row">
								<div class="cb-label">Hasil pencarian tidak ditemukan</div>
							</div>
						</div>
						<?php
					}
					?>
				?>
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