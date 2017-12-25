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
    <link rel='stylesheet' href='<?=site_url('css/default.css')?>' type='text/css' media='screen'/>
    
    <!-- SET JS -->
    <script type='text/javascript' src='<?=site_url('js/jquery-3.2.1.min.js')?>'></script>
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
		if ($is_logged_in)
		{
			$user_type = $this->session->type;
			$this->load->config('nav_menu');
			
			$top_menu_items = $this->config->item(TYPE['TOP_MENU'][$user_type]);
		}
	?>
	
</head>
<body>
<div id="overlay">

</div> <!-- div overlay -->
	<!-- NAVIGATION -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?=site_url('')?>"><?=COMPANY_NAME?></a>
			</div>
			<ul class="nav navbar-nav">
				<?php if ($is_logged_in) { foreach ($top_menu_items['left'] as $menu_item) { ?> <li><a href="<?=site_url($menu_item['url'])?>"><?=$menu_item['text']?></a></li> <?php } } ?>
			</ul>
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
			<form class="navbar-form navbar-right">
				<?php if (!$is_logged_in) { ?><a href="<?=site_url('login')?>" class="btn btn-default">Login</a> <?php }
									 else { ?><a href="<?=site_url('login/logout')?>" class="btn btn-default">Logout</a> <?php } ?>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<?php if ($is_logged_in) { foreach ($top_menu_items['right'] as $menu_item) { ?> <li><a href="<?=site_url($menu_item['url'])?>"><?=$menu_item['text']?></a></li> <?php } } ?>
			</ul>
		</div>
	</nav>
	
	<!-- BODY CONTAINER -->
    <div class="container">