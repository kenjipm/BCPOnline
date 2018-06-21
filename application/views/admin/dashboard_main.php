<?php
	
	$this->load->config('nav_menu');
	$notifs = $this->config->item('notif');
	
	$notifs['admin_payment'] = $this->order_details_model->count_unpaid_tenant();
	$notifs['admin_order'] = $this->order_details_model->count_queued_item();
	$notifs['admin_reward'] = 1;
	$notifs['admin_hot_item'] = 1;
	$notifs['admin_promoted_item'] = $this->tenant_bill_model->count_registered_seo();
	$notifs['admin_bidding'] = 1;
	
	$dashboard_menu_admin = $this->config->item('dashboard_menu_admin');
?>

<div class="cb-row">
	<?php
		foreach($dashboard_menu_admin as $menu_title => $menu_items)
		{
			?>
			<div class="cb-col-fourth">
				<div class="cb-p-5">
					<div class= "cb-txt-primary-1 cb-font-title cb-font-size-xl cb-align-center cb-pb-2"><?=$menu_title?></div>
					<div class="cb-border-round cb-bg-primary-1 cb-pl-5 cb-pr-5 cb-pb-5">
					<?php
					foreach($menu_items as $menu_item)
					{
						?>
						<div class="cb-row cb-border-bottom cb-border-white">
							<a href="<?=site_url($menu_item['url'])?>" class="category cb-col-full cb-font-primary-2" target="_blank">
								<div class="panel-body cb-txt-secondary-3">
									<?php if ($notifs[$menu_item['notif']] > 0) { ?> <span class="circle circle-sm cb-bg-primary-2"></span> <?php } ?>
									<b><?=$menu_item['text']?></b>
								</div>
							</a>
						</div>
						<?php
					}
					?>
					</div>
				</div>
			</div>
			<?php
		}
	?>
</div>