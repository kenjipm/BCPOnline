<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row cb-pl-5 cb-pr-5">
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-center"> No </div>
		</div>
		<div class="cb-col-tenth-2">
			<div class="cb-label cb-font-title cb-align-center"> Kode </div>
		</div>
		<div class="cb-col-tenth-2">
			<div class="cb-label cb-font-title cb-align-center"> Tanggal Billing </div>
		</div>
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-right"> Total Billing</div>
		</div>
		<div class="cb-col-tenth-2">
			<div class="cb-label cb-font-title cb-align-right"> Total Transaksi Selesai</div>
		</div>
		<div class="cb-col-tenth-2">
			<div class="cb-label cb-font-title cb-align-right"> Sisa Cashback </div>
		</div>
	</div>
	<?php
		if (count($model->transactions) > 0)
		{
			$i=1;
			foreach($model->transactions as $transaction)
			{
				?>
				<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
					<div class="cb-col-tenth">
						<div class="cb-align-center"> <?=$i?> </div>
					</div>
					<div class="cb-col-tenth-2">
						<div class="cb-align-center"> <?=$transaction->natural_billing_id?> </div>
					</div>
					<div class="cb-col-tenth-2">
						<div class="cb-align-center"> <?=$transaction->date_bill_created?> </div>
					</div>
					<div class="cb-col-tenth">
						<div class="cb-align-right"> <?=$transaction->total_price?> </div>
					</div>
					<div class="cb-col-tenth-2">
						<div class="cb-align-right"> <?=$transaction->total_done_paid_price?> </div>
					</div>
					<div class="cb-col-tenth-2">
						<div class="cb-align-right"> <?=$transaction->total_admin_not_paid_price?> </div>
					</div>
				</div>
				<?php
				$i++;
			}
			?>
			<div class="cb-row cb-p-5 cb-border-top cb-bg-secondary-3">
				<div class="cb-col-tenth">
					<div class="cb-align-center"></div>
				</div>
				<div class="cb-col-tenth-2">
					<div class="cb-align-center"></div>
				</div>
				<div class="cb-col-tenth-2">
					<div class="cb-align-center"></div>
				</div>
				<div class="cb-col-tenth">
					<div class="cb-align-right"> <b><?=$model->total_price?></b> </div>
				</div>
				<div class="cb-col-tenth-2">
					<div class="cb-align-right"> <b><?=$model->total_done_paid_price?></b> </div>
				</div>
				<div class="cb-col-tenth-2">
					<div class="cb-align-right"> <b><?=$model->total_admin_not_paid_price?></b> </div>
				</div>
			</div>
			<?php
		}
		else
		{
			?>
			<div class="cb-row cb-p-5 cb-border-top cb-table-striped">
				<div class="cb-col-full">
					<div class="cb-align-center"> Tidak ditemukan data </div>
				</div>
			</div>
			<?php
		}
	?>
</div>