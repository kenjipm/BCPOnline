<?php
	$accounts[0]['username'] = 'vanji';
	$accounts[0]['address'] = 'sudirman';
	$accounts[1]['username'] = 'kenji';
	$accounts[1]['address'] = 'sudirman';
?>

<h1><?=$echo?></h1>
<div class="container">
	<div class="row">
		<div class="col-xs-2">Username</div>
		<div class="col-xs-2">Alamat</div>
	</div>
	<?php foreach($accounts as $account)
	{
		?>
		<div class="row">
			<div class="col-xs-2"><?=$account['username']?></div>
			<div class="col-xs-2"><?=$account['address']?></div>
		</div>
		<?php
	}
	?>
</div>