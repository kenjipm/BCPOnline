<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='utf-8'>
    <title><?=COMPANY_NAME?></title>
	<link rel="icon" href="<?=base_url('img/favicon.png');?>" type="image/png">
    <!-- SET CSS -->
    <link rel='stylesheet' href='<?=site_url('css/bootstrap/css/bootstrap.min.css')?>' type='text/css' media='screen'/>
    <link rel='stylesheet' href='<?=site_url('css/jquery-ui-1.12.1.custom/jquery-ui.min.css')?>' type='text/css' media='screen'/>
    <link rel='stylesheet' href='<?=site_url('css/jquery-ui-1.12.1.custom/jquery-ui-timepicker-addon.css')?>' type='text/css' media='screen'/>
    <link rel='stylesheet' href='<?=site_url('css/default.css')?>' type='text/css' media='screen'/>
	
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    
    <!-- SET JS -->
    <script type='text/javascript' src='<?=site_url('js/jquery-3.2.1.min.js')?>'></script>
    <script type='text/javascript' src='<?=site_url('js/jquery-ui-1.12.1.custom/jquery-ui.min.js')?>'></script>
    <script type='text/javascript' src='<?=site_url('js/jquery-ui-1.12.1.custom/jquery-ui-timepicker-addon.js')?>'></script>
    <script type='text/javascript' src='<?=site_url('js/bootstrap.min.js')?>'></script>
    <script type='text/javascript' src='<?=site_url('js/default.js')?>'></script>
	
    <?php
        //SET CUSTOM CSS
        if (isset($css_list)) { foreach ($css_list as $css) {
            ?><link rel='stylesheet' href='<?=site_url('css/'.$css.'.css')?>' type='text/css'/><?php } }
        
        //SET CUSTOM JS
        if (isset($js_list)) { foreach ($js_list as $js) {
            ?><script type='text/javascript' src='<?=site_url('js/'.$js.'.js')?>'></script><?php } }
    ?>
    
	<?php //pre-calculation
		$is_logged_in = $this->session->userdata('id') !== null;
		$user_type = "GUEST";
		$profile_pic = site_url('img/profpic.png');
		
		$this->load->config('nav_menu');
		$notifs = $this->config->item('notif');
		
		if ($is_logged_in)
		{
			$user_type = $this->session->type;
			if ($this->session->profile_pic) $profile_pic = site_url($this->session->profile_pic);
			
			// ambil notif
			if ($user_type == "CUSTOMER")
			{
				$notifs['customer_inbox'] = $this->message_inbox_model->count_unread_message_inbox_by_account();
				$notifs['customer_transaction'] = $this->billing_model->count_all_unread_billing_customer();
				$notifs['customer_cart'] = count($this->session->cart);
			}
			else if ($user_type == "TENANT")
			{
				$notifs['tenant_inbox'] = $this->message_inbox_model->count_unread_message_inbox_by_account();
				$notifs['tenant_transaction'] = $this->order_details_model->count_all_unread_order_tenant();
				$notifs['tenant_dispute'] = $this->dispute_model->count_unread_dispute_by_account();
			}
			else if ($user_type == "ADMIN")
			{
				// $notifs['admin_payment'] = $this->order_details_model->count_unpaid_tenant();
				// $notifs['admin_order'] = $this->order_details_model->count_queued_item();
				// $notifs['admin_reward'] = 1;
				// $notifs['admin_hot_item'] = 1;
				// $notifs['admin_promoted_item'] = $this->tenant_bill_model->count_registered_seo();
				// $notifs['admin_bidding'] = 1;
				
				// $dashboard_menu_admin = $this->config->item('dashboard_menu_admin');
			}
		}
		
		$top_menu_items = $this->config->item(TYPE['TOP_MENU'][$user_type]);
		
		$categories = $this->category_model->get_all();
	?>
	
</head>
<body>

<div id="overlay"></div> <!-- div overlay -->

<?php
	if (!isset($no_loading_overlay)) { ?> <div id="loading"> <img src="<?=site_url('img/loading.png')?>" id="loading_image"/> </div> <?php }
?>

<?php
	////////////// CONFIG ///////////////
	/* kalau mau ada ad-sidebar, kasih 2 slash di awal baris ini. kalau ga ada, hapus 2 slash di awal baris ini.
	if (($user_type == "CUSTOMER") || ($user_type == "GUEST"))
	{
		?>
		<div id="ad-sidebar" class="cb-row">
			<div class="cb-row cb-col-full">
				<div id="ad-sidebar-handle" class="cb-row cb-col-tenth cb-border-round cb-txt-primary-3 cb-p-5" onclick="toggle_ad_sidebar()">
					<div id="ad-sidebar-toggle" class="">
						<div id="ad-sidebar-toggle-button" class="cb-arrow cb-arrow-right">
						</div>
					</div>
					<span id="ad-sidebar-text"></span>
				</div>
				<div id="ad-sidebar-content" class="cb-row cb-col-tenth-9 cb-border-round cb-txt-primary-3">
					<div class="cb-p-5 cb-col-full">
						<img src="<?=site_url('img/ad_box/ad-sidebar.gif')?>" alt="" class="cb-m-5"/>
					</div>
				</div>
			</div>
		</div> <!-- div ad-sidebar -->
		<?php
	}
	// */
?>

<div class="nav-cb">
	<div class="navbar-cb-top cb-row cb-vertical-center">
		<div class="cb-row cb-col-tenth-9 cb-vertical-center">
			<!-- logo -->
			<a class="navbar-cb-logo cb-col-tenth-2 cb-p-5" href="<?=site_url('')?>"><img src="<?=site_url('img/Logo-header-03.png')?>" alt="Logo" class="logo-header" /></a>
			
			<!-- search -->
			<form action="<?=site_url('item/search')?>" method="get" class="navbar-cb-top-search cb-col-tenth-4 cb-p-5">
				<?php
					if (($this->session->type != "TENANT") && ($this->session->type != "ADMIN") && ($this->session->type != "DELIVERER"))
					{
						?>
							<div class="input-group">
								<input name="keywords" type="text" class="form-control navbar-cb-top-search-input" placeholder="Search Items...">
								<div class="input-group-btn">
									<button class="btn btn-default navbar-cb-top-search-input" type="submit">
										<i class="glyphicon glyphicon-search"></i>
									</button>
								</div>
							</div>
						<?php
					}
				?>
			</form>
			
			<!-- top menu -->
			<div class="navbar-cb-top-menu cb-col-fill cb-row cb-align-right cb-p-5">
				<?php
					foreach ($top_menu_items['top'] as $menu_item)
					{
						?>
						<a href="<?= ($menu_item['url'] != "") ? site_url($menu_item['url']) : "#" ?>" class="navbar-cb-top-menu-text cb-col-third cb-row">
							<span class="cb-icon cb-icon-sm cb-icon-p-sm cb-icon-<?=$menu_item['icon']?> cb-vertical-center"></span>
							<?=$menu_item['text']?>
							<?php if ($notifs[$menu_item['notif']] > 0) { ?> <span class="circle circle-sm cb-bg-primary-2"></span> <?php } ?>
						</a>
						<?php
					}
				?>
			</div>
		</div>
		
		<div class="cb-row cb-col-tenth cb-align-right">
			<!-- profile -->
			<div class="navbar-cb-top-profile cb-align-right cb-pb-5 cb-pt-5">
				<img src="<?=$profile_pic?>" alt="Profile Picture" class="navbar-cb-top-profile-photo cb-border-round cb-bg-secondary-3"/>
				<div class="hover_menu navbar-cb-top-profile-menu cb-row cb-col-full">
					<?php
						if (isset($this->session->name))
						{
							?>
							<div class="cb-col-full cb-align-left cb-p-3">
								<b>Halo, <?=$this->session->name?></b>
							</div>
							<?php
						}
					?>
					<?php
						foreach ($top_menu_items['profile'] as $menu_item)
						{
							?>
							<div class="cb-col-full cb-align-left cb-p-3"><a href="<?=($menu_item['url'] != "") ? site_url($menu_item['url']) : "#" ?>" class="hover_menu-text navbar-cb-top-profile-menu-text">
								<?=$menu_item['text']?>
								<?php if ($notifs[$menu_item['notif']] > 0) { ?> <span class="circle circle-sm cb-bg-primary-2"></span> <?php } ?>
							</a></div>
							<?php
						}
					?>
				</div>
			</div>
		</div>
	</div>

	<div class="navbar-cb navbar-cb-strip">
		<?php
			foreach ($top_menu_items['strip'] as $menu_name => $menu_item)
			{
				?>
				<a href="<?=($menu_item['url'] != "") ? site_url($menu_item['url']) : "#"?>" class="navbar-cb-strip-text" id="navbar-cb-strip-<?=$menu_name?>">
					<?php if ($notifs[$menu_item['notif']] > 0) { ?> <span class="circle circle-sm cb-bg-primary-2"></span> <?php } ?>
					<?=$menu_item['text']?>
				</a>
				<?php
				// if ($menu_name == "PRODUCT")
				// {
				// }
			}
		?>
		<div></div>
	</div>
	<ul class="hover_menu navbar-cb-strip-product">
		<?php
			foreach ($categories as $category)
			{
				?>
				<li><a href="<?=site_url('item/category/'.$category->id)?>" class="hover_menu-text navbar-cb-strip-product-text">
					<?=$category->category_name?>
				</a></li>
				<?php
			}
		?>
	</ul>
	
</div>

<?php
	/*
	if ($user_type == "ADMIN")
	{
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
		<?php
	}
	*/
?>
<?php /* 
	<!-- NAVIGATION -->
	<nav class="navbar-cb navbar-default-cb">
		<div class="container-fluid">
			<div class="navbar-header-cb">
				<a class="navbar-brand-cb" href="<?=site_url('')?>"><img src="<?=site_url('img/Logo-header-03.png')?>" alt="Logo" class="logo-header" /></a>
			</div>
			<form action="<?=site_url('item/search')?>" method="get" class="navbar-form navbar-left">
				<div class="input-group">
					<input name="keywords" type="text" class="form-control" placeholder="Search Items...">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
			<ul class="nav-cb navbar-nav-cb navbar-top-cb">
				<?php
					foreach ($top_menu_items['top'] as $menu_item)
					{
						?>
						<li><a href="<?=site_url($menu_item['url'])?>"><?=$menu_item['text']?></a></li>
						<?php
					}
				?>
			</ul>
			<ul class="nav-cb navbar-nav-cb navbar-profile-cb">
				<?php
					foreach ($top_menu_items['profile'] as $menu_item)
					{
						?>
						<li><a href="<?=site_url($menu_item['url'])?>"><?=$menu_item['text']?></a></li>
						<?php
					}
				?>
			</ul>
			<?php /*<form class="navbar-form navbar-right">
				<?php if (!$is_logged_in) { ?><a href="<?=site_url('login')?>" class="btn btn-default">Login</a> <?php }
									 else { ?><a href="<?=site_url('login/logout')?>" class="btn btn-default">Logout</a> <?php } ?>
			</form> ?>
			<ul class="nav-cb navbar-nav-cb navbar-strip-cb">
				<?php
					foreach ($top_menu_items['strip'] as $menu_item)
					{
						?>
						<li><a href="<?=site_url($menu_item['url'])?>"><?=$menu_item['text']?></a></li>
						<?php
					}
				?>
			</ul>
		</div>
	</nav>
*/ ?>
	<!-- BODY CONTAINER -->
    <div class="cb-container">