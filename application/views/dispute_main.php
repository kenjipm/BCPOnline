<?php
	// // Model untuk dashboard_main
	
	// // dummy posted items
	// $model->disputes = array();
	// $model->disputes[0] = new class{};
	// $model->disputes[0]->id = 1;
	// $model->disputes[0]->date_created = "27 Nov 17";
	// $model->disputes[0]->other_party_name = "Budi";
	// $model->disputes[0]->msg_preview_name = "Budi";
	// $model->disputes[0]->msg_preview_text = "ready gan. mau warna apa? ada putih sama...";
	// $model->disputes[1] = new class{};
	// $model->disputes[1]->id = 2;
	// $model->disputes[1]->date_created = "28 Nov 17";
	// $model->disputes[1]->other_party_name = "Cecep";
	// $model->disputes[1]->msg_preview_date = "29 Nov 17";
	// $model->disputes[1]->msg_preview_name = "Agus";
	// $model->disputes[1]->msg_preview_text = "barang dah sampe mas, makasih";
?>

<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><?=$title?></h3>
			</div>
			<div class="panel-body">
				<?php
				foreach($model->disputes as $dispute)
				{
					?>
					<a href="dispute/detail/<?=$dispute->id?>" class="">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>Percakapan dengan <?=$dispute->other_party_name?> (<?=$dispute->date_created?>)</h4>
							</div>
							<div class="panel-body row">
								<div class="col-sm-10">
									<b><?=$dispute->msg_preview_name?></b><?=$dispute->msg_preview_text?><i><?=$dispute->msg_preview_date?></i>
								</div>
							</div>
						</div>
					</a>
					<?php
				}
				if (count($model->disputes) <= 0)
				{
					?>
					<h4>Tidak ada pesan di kotak masuk</h4>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	
</div>