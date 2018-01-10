<?php
	// // Model untuk dashboard_main
	
	// // dummy posted items
	// $model->message_inboxes = array();
	// $model->message_inboxes[0] = new class{};
	// $model->message_inboxes[0]->id = 1;
	// $model->message_inboxes[0]->date_created = "27 Nov 17";
	// $model->message_inboxes[0]->other_party_name = "Budi";
	// $model->message_inboxes[0]->msg_preview_name = "Budi";
	// $model->message_inboxes[0]->msg_preview_text = "ready gan. mau warna apa? ada putih sama...";
	// $model->message_inboxes[1] = new class{};
	// $model->message_inboxes[1]->id = 2;
	// $model->message_inboxes[1]->date_created = "28 Nov 17";
	// $model->message_inboxes[1]->other_party_name = "Cecep";
	// $model->message_inboxes[1]->msg_preview_date = "29 Nov 17";
	// $model->message_inboxes[1]->msg_preview_name = "Agus";
	// $model->message_inboxes[1]->msg_preview_text = "barang dah sampe mas, makasih";
?>

<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3><?=$title?></h3>
			</div>
			<div class="panel-body">
				<?php
				foreach($model->message_inboxes as $message_inbox)
				{
					?>
					<a href="message/detail/<?=$message_inbox->id?>" class="">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>Percakapan dengan <?=$message_inbox->other_party_name?> (<?=$message_inbox->date_created?>)</h4>
							</div>
							<div class="panel-body row">
								<div class="col-sm-10">
									<b><?=$message_inbox->msg_preview_name?></b><?=$message_inbox->msg_preview_text?><i><?=$message_inbox->msg_preview_date?></i>
								</div>
							</div>
						</div>
					</a>
					<?php
				}
				if (count($model->message_inboxes) <= 0)
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