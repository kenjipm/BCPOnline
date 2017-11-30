<?php
	// Model untuk message_detail
	
	// dummy posted items
	$model->message_inbox = new class{};
	$model->message_inbox->other_party_name = "Budi";
	
	$model->message_text = array();
	
	$model->message_text[0] = new class{};
	$model->message_text[0]->id = 1;
	$model->message_text[0]->date_sent = "27 Nov 17";
	$model->message_text[0]->text = "gan hp samsung galaxy J nya ready?";
	$model->message_text[0]->sender = new class{};
	$model->message_text[0]->sender->id = 1;
	$model->message_text[0]->sender->name = "Kamu";
	
	$model->message_text[1] = new class{};
	$model->message_text[1]->id = 2;
	$model->message_text[1]->date_sent = "27 Nov 17";
	$model->message_text[1]->text = "ready gan. mau warna apa? ada putih sama hitam. yang warna silver habis.";
	$model->message_text[1]->sender = new class{};
	$model->message_text[1]->sender->id = 2;
	$model->message_text[1]->sender->name = "Budi";
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
						<h3>Percakapan dengan <?=$model->message_inbox->other_party_name?></h3>
					</div>
				</div>
			</div>
			<div id="message_text_area" class="panel-body">
				<?php
				foreach($model->message_text as $message_text)
				{
					?>
					<div class="panel panel-default">
						<div class="panel-body row">
							<div class="col-sm-10">
								<b><?=$message_text->sender->name?>: </b><?=$message_text->text?>
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
					</div>
					<div class="col-md-1">
						<button onclick="send_message()" class="btn btn-default">Kirim</button>
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
				<b><span>Kamu</span>: </b><span class="message_content"></span>
			</div>
		</div>
	</div>
</div>