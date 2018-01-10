<?php
	// // Model untuk message_detail
	
	// // dummy posted items
	// $model->message_inbox = new class{};
	// $model->message_inbox->other_party_name = "Budi";
	
	// $model->message_texts = array();
	
	// $model->message_texts[0] = new class{};
	// $model->message_texts[0]->id = 1;
	// $model->message_texts[0]->date_sent = "27 Nov 17";
	// $model->message_texts[0]->text = "gan hp samsung galaxy J nya ready?";
	// $model->message_texts[0]->sender = new class{};
	// $model->message_texts[0]->sender->id = 1;
	// $model->message_texts[0]->sender->name = "Kamu";
	
	// $model->message_texts[1] = new class{};
	// $model->message_texts[1]->id = 2;
	// $model->message_texts[1]->date_sent = "27 Nov 17";
	// $model->message_texts[1]->text = "ready gan. mau warna apa? ada putih sama hitam. yang warna silver habis.";
	// $model->message_texts[1]->sender = new class{};
	// $model->message_texts[1]->sender->id = 2;
	// $model->message_texts[1]->sender->name = "Budi";
?>

<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-1">
						<a href="<?=site_url('message')?>" class="btn btn-default">Kembali</a>
					</div>
					<div class="col-md-11">
						<h3><?=$title?> <?=$model->message_inbox->other_party_name?></h3>
					</div>
				</div>
			</div>
			<div id="message_text_area" class="panel-body">
				<?php
				foreach($model->message_texts as $message_text)
				{
					?>
					<div class="panel panel-default">
						<div class="panel-body row">
							<div class="col-sm-10">
								<b><?=$message_text->sender->name?></b><?=$message_text->text?>
							</div>
						</div>
					</div>
					<?php
				}
				?>
			</div>
			<div class="panel-footer">
				<div class="row">
					<div class="col-md-11">
						<input id="message_input" type="text" class="form-control"/>
						<input id="message_inbox_id" type="hidden" value="<?=$model->message_inbox->id?>"/>
					</div>
					<div class="col-md-1">
						<button onclick="send_message()" class="btn btn-default" id="btn-message_send">Kirim</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<div id="message_template" class="template">
	<div class="panel panel-default">
		<div class="panel-body row">
			<div class="col-sm-10">
				<b><span class="message_sender_name"></span></b><span class="message_content"></span>
			</div>
		</div>
	</div>
</div>