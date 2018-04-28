
<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar bidding</h3>
		</div>
		<div class="panel-body">
			<?php
			$i = 0;
			foreach($model->items as $posted_item)
			{
				if ($i%3 == 0)
				{
				?>
				<div class="row">
				<?php
				}
				?>
				<div class="col-xs-4">
					<div class="thumbnail">
						<a href="<?=site_url('Bidding/bidding_detail/'.$posted_item->id)?>">
							<img src="<?=$posted_item->image_one_name?>" alt="<?=$posted_item->posted_item_name?>" style="width:50%">
							<div class="caption text-center">
								<p><?=$posted_item->posted_item_name?></p>
							</div>
						</a>
					</div>
				</div>
				<?php
				if ($i%3 == 2)
				{
				?>
				</div>
				<?php
				}
				$i++;
			}
			?>
			<a class="btn btn-default" href="<?=site_url('bidding/create_bidding')?>">
				Buat Bidding
			</a>
		</div>
	</div>
</div>
