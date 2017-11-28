<?php
	// Model untuk dashboard_main
	
	// dummy kategoris
	$model->kategoris = array();
	
	$model->kategoris[0] = new class{};
	$model->kategoris[0]->category_name = "Handphone & Tablet";
	$model->kategoris[1] = new class{};
	$model->kategoris[1]->category_name = "Laptop & Aksesoris";
	$model->kategoris[2] = new class{};
	$model->kategoris[2]->category_name = "Komputer & Aksesoris";
	$model->kategoris[3] = new class{};
	$model->kategoris[3]->category_name = "Elektronik";
	$model->kategoris[4] = new class{};
	$model->kategoris[4]->category_name = "Kamera";
	$model->kategoris[5] = new class{};
	$model->kategoris[5]->category_name = "Gaming";
	$model->kategoris[6] = new class{};
	$model->kategoris[6]->category_name = "Reparasi";
	
	// dummy posted items
	$model->top_pick_items = array();
	
	$model->top_pick_items[0] = new class{};
	$model->top_pick_items[0]->name = "Charger Samsung";
	$model->top_pick_items[0]->price = "Rp 250.000";
	$model->top_pick_items[0]->image_one_name = site_url("img/upload/user1/charger_samsung.jpg");
	
	$model->top_pick_items[1] = new class{};
	$model->top_pick_items[1]->name = "Charger Wireless";
	$model->top_pick_items[1]->price = "Rp 350.000";
	$model->top_pick_items[1]->image_one_name = site_url("img/upload/user1/wireless_samsung.jpg");
	
	$model->top_pick_items[2] = new class{};
	$model->top_pick_items[2]->name = "Dompet Doraemon";
	$model->top_pick_items[2]->price = "Rp 40.000";
	$model->top_pick_items[2]->image_one_name = site_url("img/upload/user1/doraemon.jpg");
?>

<div class="row">

	<!-- left bar buat kategori -->
	<div class="col-md-2">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Kategori</h3>
			</div>
			<?php
			foreach($model->kategoris as $kategori)
			{
				?>
				<a href="#">
					<div class="panel-footer">
						<?=$kategori->category_name?>
					</div>
				</a>
				<?php
			}
			?>
		</div>
	</div>
	
	<div class="col-md-10">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Top Picks</h3>
			</div>
			<div class="panel-body">
				<div class="row">
					<?php
					foreach($model->top_pick_items as $top_pick_item)
					{
						?>
							<div class="col-md-4">
								<div class="panel panel-default">
									<a href="<?=site_url('item')?>">
										<div class="panel-body">
											<img class="col-md-12" src="<?=$top_pick_item->image_one_name?>" alt="<?=$top_pick_item->name?>"/>
										</div>
										<div class="panel-footer">
											<label class="control-label"><?=$top_pick_item->name?></label><br/>
											<label class="control-label"><?=$top_pick_item->price?></label>
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