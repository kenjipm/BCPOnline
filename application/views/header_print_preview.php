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
    <link rel='stylesheet' href='<?=site_url('css/default.css')?>' type='text/css' media='screen'/>
	<link href="https://fonts.googleapis.com/css?family=Lato:300,400" rel="stylesheet">
    
    <!-- SET JS -->
    <script type='text/javascript' src='<?=site_url('js/jquery-3.2.1.min.js')?>'></script>
    <script type='text/javascript' src='<?=site_url('js/bootstrap.min.js')?>'></script>
    <script type='text/javascript' src='<?=site_url('js/default_print_preview.js')?>'></script>
	
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
	<!-- NAVIGATION -->
	
	<!-- BODY CONTAINER -->
    <div class="container">
		<div class="panel panel-default">
			<div class="panel-body">
				<div id="container_print">