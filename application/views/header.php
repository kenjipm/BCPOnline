<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='utf-8'>
    <title><?=COMPANY_NAME?></title>
	<link rel="icon" href="<?=base_url('img/favicon.gif');?>" type="image/gif">
    <!-- SET CSS -->
    <link rel='stylesheet' href='<?=site_url('css/bootstrap/css/bootstrap.min.css')?>' type='text/css' media='screen'/>
    <link rel='stylesheet' href='<?=site_url('css/jquery-ui-1.12.1.custom/jquery-ui.min.css')?>' type='text/css' media='screen'/>
    <link rel='stylesheet' href='<?=site_url('css/jquery-ui-1.12.1.custom/jquery-ui-timepicker-addon.css')?>' type='text/css' media='screen'/>
    <link rel='stylesheet' href='<?=site_url('css/default.css')?>' type='text/css' media='screen'/>
    
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
		
		if ($is_logged_in)
		{
			$user_type = $this->session->type;
			if ($this->session->profile_pic) $profile_pic = site_url($this->session->profile_pic);
		}
		
		$this->load->config('nav_menu');
		$top_menu_items = $this->config->item(TYPE['TOP_MENU'][$user_type]);
		
		$categories = $this->category_model->get_all();
	?>
	
</head>
<body>
<div id="overlay">

</div> <!-- div overlay -->

<div class="nav-cb">
	<div class="navbar-cb-top">
		<!-- logo -->
		<a class="navbar-cb-logo" href="<?=site_url('')?>"><img src="<?=site_url('img/Logo-header-03.png')?>" alt="Logo" class="logo-header" /></a>
		
		<!-- search -->
		<form action="<?=site_url('item/search')?>" method="get" class="navbar-cb-top-search">
			<div class="input-group">
				<input name="keywords" type="text" class="form-control navbar-cb-top-search-input" placeholder="Search Items...">
				<div class="input-group-btn">
					<button class="btn btn-default navbar-cb-top-search-input" type="submit">
						<i class="glyphicon glyphicon-search"></i>
					</button>
				</div>
			</div>
		</form>
		
		<!-- top menu -->
		<div class="navbar-cb-top-menu">
			<?php
				foreach ($top_menu_items['top'] as $menu_item)
				{
					?>
					<a href="<?=site_url($menu_item['url'])?>" class="navbar-cb-top-menu-text">
						<?=$menu_item['text']?>
					</a>
					<?php
				}
			?>
		</div>
		
		<!-- profile -->
		<div class="navbar-cb-top-profile">
			<img src="<?=$profile_pic?>" alt="Profile Picture" class="navbar-cb-top-profile-photo"/>
			<ul class="hover_menu navbar-cb-top-profile-menu">
				<?php
					foreach ($top_menu_items['profile'] as $menu_item)
					{
						?>
						<li><a href="<?=site_url($menu_item['url'])?>" class="hover_menu-text navbar-cb-top-profile-menu-text">
							<?=$menu_item['text']?>
						</a></li>
						<?php
					}
				?>
			</ul>
		</div>
	</div>

	<div class="navbar-cb navbar-cb-strip">
		<?php
			foreach ($top_menu_items['strip'] as $menu_name => $menu_item)
			{
				?>
				<a href="<?=site_url($menu_item['url'])?>" class="navbar-cb-strip-text" id="navbar-cb-strip-<?=$menu_name?>">
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
    <div class="container">