<div class="col-sm-4 col-sm-offset-4">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h4>Login</h4>
		</div>
		<div class="panel-body">
			<form class="form-horizontal" action="<?=site_url('login/validate')?>" method="post">
				<div class="form-group">
					<label class="control-label col-xs-3">Email</label>
					<div class="col-xs-9"><input name="email" type="text" class="form-control"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-xs-3">Password</label>
					<div class="col-xs-9"><input name="password" type="password" class="form-control"/></div>
				</div>
				<div class="form-group">
					<div class="col-xs-offset-3">
						<button type="submit" class="btn btn-default">Login</button>
						<a href="<?=site_url('account/signup')?>" class="btn btn-default">Sign Up</a>
					</div>
				</div>
				<span><?=$message?></span>
				<input type="hidden" id="return_url" name="return_url" value="<?=$return_url?>"/>
			</form>
		</div>
	</div>
</div>