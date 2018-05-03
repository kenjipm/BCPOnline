<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
	<div class="cb-row cb-pl-5 cb-pr-5">
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-center"> No </div>
		</div>
		<div class="cb-col-tenth-2">
			<div class="cb-label cb-font-title cb-align-center"> Tanggal </div>
		</div>
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-center"> Tipe </div>
		</div>
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-center"> Tenant </div>
		</div>
		<div class="cb-col-tenth-2">
			<div class="cb-label cb-font-title cb-align-left"> Produk </div>
		</div>
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-right"> Harga Promo </div>
		</div>
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-center"> Deskripsi </div>
		</div>
		<div class="cb-col-tenth">
			<div class="cb-label cb-font-title cb-align-right"> Pembayaran </div>
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
						<div class="cb-align-center"> <?=$transaction->payment_date?> </div>
					</div>
					<div class="cb-col-tenth">
						<div class="cb-align-center"> <?=$transaction->payment_type?> </div>
					</div>
					<div class="cb-col-tenth">
						<div class="cb-align-center"> <?=$transaction->tenant_name?> </div>
					</div>
					<div class="cb-col-tenth-2">
						<div class="cb-align-left"> <?=$transaction->posted_item_name?> </div>
					</div>
					<div class="cb-col-tenth">
						<div class="cb-align-right"> <?=$transaction->promo_price?> </div>
					</div>
					<div class="cb-col-tenth">
						<div class="cb-align-center"> <?=$transaction->promo_description?> </div>
					</div>
					<div class="cb-col-tenth">
						<div class="cb-align-right"> <?=$transaction->payment_value?> </div>
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
				<div class="cb-col-tenth">
					<div class="cb-align-center"></div>
				</div>
				<div class="cb-col-tenth">
					<div class="cb-align-center"></div>
				</div>
				<div class="cb-col-tenth-2">
					<div class="cb-align-left"></div>
				</div>
				<div class="cb-col-tenth">
					<div class="cb-align-right"></div>
				</div>
				<div class="cb-col-tenth">
					<div class="cb-align-center"></div>
				</div>
				<div class="cb-col-tenth">
					<div class="cb-align-right"> <b><?=$model->total_payment?></b> </div>
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