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
    
</head>
<body>
<div id="overlay">

</div> <!-- div overlay -->
	<!-- NAVIGATION -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="<?=site_url('dashboard')?>"><?=COMPANY_NAME?></a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="<?=site_url('dashboard')?>">Home</a></li>
				<li><a href="<?=site_url('customer/followed_tenant')?>">Tenant</a></li>
				<li><a href="<?=site_url('item/favorite')?>">Favorit</a></li>
				<li><a href="<?=site_url('reward')?>">Reward</a></li>
			</ul>
			<form action="<?=site_url('search')?>" method="post" class="navbar-form navbar-left">
				<div class="input-group">
					<input name="search_keywords" type="text" class="form-control" placeholder="Search Items...">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
			<form class="navbar-form navbar-right">
				<a href="<?=site_url('login')?>" class="btn btn-default">Login</a>
			</form>
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?=site_url('customer/cart')?>">Cart</a></li>
				<li><a href="<?=site_url('billing')?>">Billing</a></li>
				<li><a href="<?=site_url('message')?>">Inbox</a></li> 
				<li><a href="<?=site_url('profile/1')?>">Profile</a></li>
			</ul>
		</div>
	</nav>
	
	<!-- BODY CONTAINER -->
    <div class="container">