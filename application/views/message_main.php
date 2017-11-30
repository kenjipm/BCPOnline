<?php
	// Model untuk dashboard_main
	
	// dummy posted items
	$model->message_inbox = array();
	$model->message_inbox[0] = new class{};
	$model->message_inbox[0]->id = 1;
	$model->message_inbox[0]->date_created = "27 Nov 17";
	$model->message_inbox[0]->other_party_name = "Budi";
	$model->message_inbox[0]->msg_preview_name = "Budi";
	$model->message_inbox[0]->msg_preview_text = "ready gan. mau warna apa? ada putih sama...";
	$model->message_inbox[1] = new class{};
	$model->message_inbox[1]->id = 2;
	$model->message_inbox[1]->date_created = "28 Nov 17";
	$model->message_inbox[1]->other_party_name = "Cecep";
	$model->message_inbox[1]->msg_preview_name = "Agus";
	$model->message_inbox[1]->msg_preview_text = "barang dah sampe mas, makasih";
?>

<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>Inbox</h3>
			</div>
			<div class="panel-body">
				<?php
				foreach($model->message_inbox as $message_inbox)
				{
					?>
					<a href="message/detail/<?=$message_inbox->id?>" class="">
						<div class="panel panel-default">
							<div class="panel-heading">
								<h4>Percakapan dengan <?=$message_inbox->other_party_name?> (<?=$message_inbox->date_created?>)</h4>
							</div>
							<div class="panel-body row">
								<div class="col-sm-10">
									<b><?=$message_inbox->msg_preview_name?>: </b><?=$message_inbox->msg_preview_text?>
								</div>
							</div>
						</div>
					</a>
					<?php
				}
				?>
			</div>
		</div>
	</div>
	
</div>