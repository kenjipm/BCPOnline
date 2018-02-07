<?php
	// // Model untuk dispute_detail
	
	// // dummy posted items
	// $model->dispute = new class{};
	// $model->dispute->other_party_name = "Budi";
	
	// $model->dispute_texts = array();
	
	// $model->dispute_texts[0] = new class{};
	// $model->dispute_texts[0]->id = 1;
	// $model->dispute_texts[0]->date_sent = "27 Nov 17";
	// $model->dispute_texts[0]->text = "gan hp samsung galaxy J nya ready?";
	// $model->dispute_texts[0]->sender = new class{};
	// $model->dispute_texts[0]->sender->id = 1;
	// $model->dispute_texts[0]->sender->name = "Kamu";
	
	// $model->dispute_texts[1] = new class{};
	// $model->dispute_texts[1]->id = 2;
	// $model->dispute_texts[1]->date_sent = "27 Nov 17";
	// $model->dispute_texts[1]->text = "ready gan. mau warna apa? ada putih sama hitam. yang warna silver habis.";
	// $model->dispute_texts[1]->sender = new class{};
	// $model->dispute_texts[1]->sender->id = 2;
	// $model->dispute_texts[1]->sender->name = "Budi";
?>

<div class="row">

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading">
				<div class="row">
					<div class="col-md-1">
						<a href="<?=site_url('dispute')?>" class="btn btn-default">Kembali</a>
					</div>
					<div class="col-md-11">
						<h3><?=$title?> <?=$model->dispute->other_party_name?></h3>
					</div>
				</div>
			</div>
			<div class="panel panel-default">
				<div class="panel-body">
					Atas Pembelian: <a href="<?=site_url('order/transaction_detail/'.$model->dispute->order_detail->id)?>"><?=$model->dispute->order_detail->posted_item_variance->posted_item->posted_item_name?> (<?=$model->dispute->order_detail->posted_item_variance->var_description?>)</a>
				</div>
			</div>
			<div id="dispute_text_area" class="panel-body">
				<?php
				foreach($model->dispute_texts as $dispute_text)
				{
					?>
					<div class="panel panel-default">
						<div class="panel-body row">
							<div class="col-sm-10">
								<b><?=$dispute_text->sender->name?></b><?=$dispute_text->text?>
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
						<input id="dispute_input" type="text" class="form-control"/>
						<input id="dispute_id" type="hidden" value="<?=$model->dispute->id?>"/>
					</div>
					<div class="col-md-1">
						<button onclick="send_dispute()" class="btn btn-default" id="btn-dispute_send">Kirim</button>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</div>

<div id="dispute_template" class="template">
	<div class="panel panel-default">
		<div class="panel-body row">
			<div class="col-sm-10">
				<b><span class="dispute_sender_name"></span></b><span class="dispute_content"></span>
			</div>
		</div>
	</div>
</div>