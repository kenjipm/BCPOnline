<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset='utf-8'>
    <title><?=COMPANY_NAME?></title>
	<link rel="icon" href="<?=base_url('img/favicon.gif');?>" type="image/gif">
    <!-- SET CSS -->
    <link rel='stylesheet' href='css/bootstrap/css/bootstrap.min.css' type='text/css' media='screen'/>
    <link rel='stylesheet' href='css/default.css' type='text/css' media='screen'/>
    
    <!-- SET JS -->
    <script type='text/javascript' src='js/jquery-3.2.1.min.js'></script>
    <script type='text/javascript' src='js/bootstrap.min.js'></script>
    <script type='text/javascript' src='js/default.js'></script>

    <?php
        //SET CUSTOM CSS
        if (isset($css_list)) { foreach ($css_list as $css) {
            ?><link rel='stylesheet' href='css/<?=$css?>.css' type='text/css'/><?php } }
        
        //SET CUSTOM JS
        if (isset($js_list)) { foreach ($js_list as $js) {
            ?><script type='text/javascript' src='js/<?=$js?>.js'></script><?php } }
    ?>
    
</head>
<body>

	<!-- NAVIGATION -->
	<nav class="navbar navbar-default">
		<div class="container-fluid">
			<div class="navbar-header">
				<a class="navbar-brand" href="#"><?=COMPANY_NAME?></a>
			</div>
			<ul class="nav navbar-nav">
				<li><a href="#">Home</a></li>
				<li><a href="#">Page 1</a></li>
				<li><a href="#">Page 2</a></li> 
				<li><a href="#">Page 3</a></li>
				<li><a href="#">Page 4</a></li>
			</ul>
			<form class="navbar-form navbar-left">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search Items...">
					<div class="input-group-btn">
						<button class="btn btn-default" type="submit">
							<i class="glyphicon glyphicon-search"></i>
						</button>
					</div>
				</div>
			</form>
			<form class="navbar-form navbar-right">
				<a href="#" class="btn btn-default">Login</a>
			</form>
		</div>
	</nav>
	
	<!-- BODY CONTAINER -->
    <div class="container">