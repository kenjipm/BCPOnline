<div class="cb-row cb-p-5">
	<div class="cb-col-fourth">
		<div class="cb-txt-primary-1 cb-font-title cb-align-center cb-font-size-xxl">DAFTAR KOMPLAIN</div>
		<div class="cb-border-round cb-bg-primary-3 cb-pt-5 cb-pb-5 cb-panel-vertical cb-height-500">
			<?php
				foreach($model->disputes as $dispute)
				{
					?>
					<a href="<?=site_url('dispute/detail/'.$dispute->id)?>" class="cb-col-full cb-row <?=($dispute->id == $model->dispute->id) ? 'cb-bg-primary-2' : ''?>">
						<div class="cb-col-full cb-row cb-p-5 cb-font-title <?=($dispute->id == $model->dispute->id) ? 'cb-txt-primary-3' : 'cb-txt-primary-1'?>">
							<div class="cb-pl-5">
								<div class="cb-txt-primary-1 cb-font-size-lg">
									<?php if ($dispute->unread_dispute_count > 0) { ?> <span class="circle circle-sm cb-bg-primary-2"></span> <?php } ?>
									<?=$dispute->other_party_name?> | <?= $dispute->natural_billing_id ?>
								</div>
								<div class="cb-txt-secondary-2 cb-font-size-sm"><?= $dispute->msg_preview_date ?></div>
							</div>
						</div>
						<div class="cb-col-full cb-row cb-pl-5 cb-pr-5">
							<span class="cb-border-bottom cb-col-full"></span>
						</div>
					</a>
					<?php
				}
				if (count($model->disputes) <= 0)
				{
					?>
					<h4 class="cb-txt-secondary-1 cb-font-title cb-pl-5 cb-pr-5">Tidak ada komplain</h4>
					<?php
				}
				?>
		</div>
	</div>
	<?php
		if ($model->dispute->id != 0)
		{
			?>
			<div class="cb-col-fourth-3 cb-pl-5">
				<div class="cb-font-title cb-font-size-xxl">&nbsp;</div>
				<div class="cb-border-round cb-panel-group-top cb-bg-primary-3 cb-p-5 cb-panel-vertical cb-border-bottom">
					<span class="cb-txt-primary-1 cb-font-title cb-font-size-lg">Atas Pembelian:</span>
					<a class="cb-txt-primary-1 cb-txt-primary-2-hover cb-font-size-lg cb-ml-3" href="<?=$model->dispute->detail_link?>">
						<?=$model->dispute->order_detail->posted_item_variance->posted_item->posted_item_name?> (<?=$model->dispute->order_detail->posted_item_variance->var_description?>)
					</a>
				</div>
				<div id="dispute_panel" class="cb-panel-group-mid cb-bg-primary-3 cb-p-5 cb-panel-vertical cb-height-500">
					<div id="dispute_text_area">
						<?php
							foreach($model->dispute_texts as $dispute_text)
							{
								?>
								<div class="cb-row cb-mb-5">
									<div class="cb-col-tenth">
									
									</div>
									<div class="cb-col-tenth-8 cb-row <?=$dispute_text->sender->is_you ? 'cb-align-right cb-pull-right' : ''?>">
										<div class="cb-col-full">
											<span class="cb-txt-primary-1 cb-font-title cb-font-size-lg"></span><?=$dispute_text->sender->name?></span>
											<span class="cb-ml-5 cb-mr-5"><?=$dispute_text->date_sent?></span>
										</div>
										<div class="dispute_content cb-border-round cb-bg-secondary-3 cb-p-5 <?=$dispute_text->sender->is_you ? 'cb-align-right cb-pull-right' : ''?>">
											<?=$dispute_text->text?>
										</div>
									</div>
								</div>
								<?php
							}
						?>
					</div>
					<div id="anchor"></div>
				</div>
				<div class="cb-mt-5 cb-border-round cb-bg-primary-3 cb-p-5 cb-panel-vertical cb-panel-group-bottom">
					<div class="cb-row cb-mt-5">
						<form method="POST" class="cb-col-full cb-row" id="form_dispute" enctype="multipart/form-data">
							<input id="dispute_id" name="dispute_id" type="hidden" value="<?=$model->dispute->id?>"/>
							<input id='image_name' name='image_name' class="input_file_upload_move" type='file' style="display:none;"/>
							<div for='image_name' class="cb-col-full" id="image_name_display" ></div>
							<label for="image_name" class="cb-col-tenth cb-button cb-bg-secondary-2 cb-icon cb-icon-camera hoverable label_upload_file cb-vertical-center cb-row">
								<div class="cb-icon cb-icon-sm cb-icon-add-item"></div>
							</label>
							<input id="dispute_input" type="text" name="text" placeholder="Kirim Pesan..." class="cb-col-tenth-8 cb-input-text cb-border-round cb-bg-secondary-3 cb-p-5"/>
							<button onclick="send_dispute()" class="cb-col-tenth cb-button cb-button-form" id="btn-dispute_send">KIRIM</button>
						</form>
					</div>
				</div>
			</div>
			<?php
		}
	?>
</div>

<div id="dispute_template" class="template">
	<div class="cb-row cb-mb-5">
		<div class="cb-col-tenth">
		</div>
		<div class="cb-col-tenth-8 cb-row dispute_container">
			<div class="cb-col-full">
				<span class="dispute_sender_name cb-txt-primary-1 cb-font-title cb-font-size-lg"></span>
				<span class="dispute_date_sent cb-ml-5 cb-mr-5"></span>
			</div>
			<div class="dispute_content cb-border-round cb-bg-secondary-3 cb-p-5">
			</div>
			<div class="cb-row dispute_image_container">
				<div class="cb-col-half cb-border-round cb-bg-secondary-3 cb-p-5">
					<img class="dispute_image" src=""/>
				</div>
			</div>
		</div>
	</div>
</div>






<?php
/*
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
*/
?>