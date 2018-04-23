<div class="cb-row cb-p-5">
	<div class="cb-col-fourth">
		<div class="cb-txt-primary-1 cb-font-title cb-align-center cb-font-size-xxl">DAFTAR PESAN</div>
		<div class="cb-border-round cb-bg-primary-3 cb-pt-5 cb-pb-5 cb-panel-vertical">
			<?php
				foreach($model->message_inboxes as $message_inbox)
				{
					?>
					<a href="<?=site_url('message/detail/'.$message_inbox->id)?>" class="cb-col-full cb-row <?=($message_inbox->id == $model->message_inbox->id) ? 'cb-bg-primary-2' : ''?>">
						<div class="cb-col-full cb-row cb-p-5 cb-font-title <?=($message_inbox->id == $model->message_inbox->id) ? 'cb-txt-primary-3' : 'cb-txt-primary-1'?>">
							<div class="cb-pl-5">
								<h4><?=$message_inbox->other_party_name?></h4>
							</div>
						</div>
						<div class="cb-col-full cb-row cb-pl-5 cb-pr-5">
							<span class="cb-border-bottom cb-col-full"></span>
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
	<?php
		if ($model->message_inbox->id != 0)
		{
			?>
			<div class="cb-col-fourth-3 cb-pl-5">
				<div class="cb-font-title cb-font-size-xxl">&nbsp;	</div>
				<div id="message_panel" class="cb-border-round cb-bg-primary-3 cb-p-5 cb-panel-vertical cb-height-500 cb-panel-group-top">
					<div id="message_text_area">
						<?php
							foreach($model->message_texts as $message_text)
							{
								?>
								<div class="cb-row cb-mb-5">
									<div class="cb-col-tenth">
									
									</div>
									<div class="cb-col-tenth-8 cb-row">
										<div class="cb-col-full">
											<span class="cb-txt-primary-1 cb-font-title cb-font-size-lg <?=$message_text->sender->is_you ? 'cb-pull-right' : ''?>"><?=$message_text->sender->name?></span>
											<span class="cb-ml-5 cb-mr-5 <?=$message_text->sender->is_you ? 'cb-pull-right' : ''?>"><?=$message_text->date_sent?></span>
										</div>
										<div class="cb-col-full cb-border-round cb-bg-secondary-3 cb-p-5 <?=$message_text->sender->is_you ? 'cb-align-right cb-pull-right' : ''?>">
											<?=$message_text->text?>
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
						<input id="message_inbox_id" type="hidden" value="<?=$model->message_inbox->id?>"/>
						<input id="message_input" type="text" placeholder="Kirim Pesan..." class="cb-col-tenth-9 cb-input-text cb-border-round cb-bg-secondary-3 cb-p-5"/>
						<button onclick="send_message()" class="cb-col-tenth cb-button cb-button-form" id="btn-message_send">KIRIM</button>
					</div>
				</div>
			</div>
			<?php
		}
	?>
</div>

<div id="message_template" class="template">
	<div class="cb-row cb-mb-5">
		<div class="cb-col-tenth">
		
		</div>
		<div class="cb-col-tenth-8 cb-row">
			<div class="cb-col-full">
				<span class="message_sender_name cb-txt-primary-1 cb-font-title cb-font-size-lg"><?=$message_text->sender->name?></span>
				<span class="message_date_sent cb-ml-5 cb-mr-5"><?=$message_text->date_sent?></span>
			</div>
			<div class="message_content cb-col-full cb-border-round cb-bg-secondary-3 cb-p-5">
				<?=$message_text->text?>
			</div>
		</div>
	</div>
</div>

<?php
/*
<div class="row">

	<div class="col-md-3">
		<div class="panel panel-default">
			<div class="panel-heading">
				<h3>DAFTAR PESAN</h3>
			</div>
			<div class="panel-body">
				<?php
				foreach($model->message_inboxes as $message_inbox)
				{
					?>
					<a href="<?=site_url('message/detail/'.$message_inbox->id)?>" class="">
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

	<?php
		if ($model->message_inbox->id != 0)
		{
			?>
			<div class="col-md-9">
				<div class="panel panel-default">
					<div class="panel-heading">
						<div class="row">
							<div class="col-md-1">
								<a href="<?=site_url('message')?>" class="btn btn-default">Kembali</a>
							</div>
							<div class="col-md-11">
								<h3><?=$model->message_inbox->other_party_name?></h3>
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
			<?php
		}
	?>
</div>

<div id="message_template" class="template">
	<div class="panel panel-default">
		<div class="panel-body row">
			<div class="col-sm-10">
				<b><span class="message_sender_name"></span></b><span class="message_content"></span>
			</div>
		</div>
	</div>
</div>*/
?>