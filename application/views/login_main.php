<div class="cb-col-full cb-txt-primary-1 cb-font-title">
	<div class="cb-align-center cb-font-size-xl">LOGIN</div>
</div>
<div class="cb-row">
	<div class="cb-col-fourth">
	</div>
	<div class="cb-row cb-col-half">
		<div class="cb-panel-body cb-bg-primary-3 cb-m-5 cb-p-5">
			<form action="<?=site_url('login/validate')?>" class="form-horizontal" method="post">
				<div class="cb-row cb-p-5">
					<div class="cb-col-fifth">
						<div class="cb-row">
							<div class="cb-col-fifth-4">
								<div class="cb-txt-primary-1 cb-pull-left">
									<div class="cb-label">Email</div>
								</div>
							</div>
							<div class="cb-col-fifth">
								<div class="cb-align-center">
									<div class="cb-txt-primary-1">
										<div class="cb-label"> : </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="cb-row cb-col-fifth-4">
						<input type="text" class="cb-input-text cb-col-full" name="email"/>
					</div>
				</div>
				<div class="cb-row cb-p-5">
					<div class="cb-col-fifth">
						<div class="cb-row">
							<div class="cb-col-fifth-4">
								<div class="cb-txt-primary-1 cb-pull-left">
									<div class="cb-label"> Password</div>
								</div>
							</div>
							<div class="cb-col-fifth">
								<div class="cb-align-center">
									<div class="cb-txt-primary-1">
										<div class="cb-label"> : </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="cb-row cb-col-fifth-4">
						<input type="password" class="cb-input-text cb-col-full" name="password"/>
					</div>
				</div>
				<div class="cb-row cb-p-5">
					<div class="cb-col-tenth-4"></div>
					<div class="cb-col-tenth-6">
						<button type="submit" class="cb-button-form">MASUK</button>
						<a href="<?=site_url('account/signup')?>">
							<button class="cb-button-form">DAFTAR</button>
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>		
	<div class="cb-row cb-col-fourth">
	</div>	
</div>

<?php /*
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

*/ ?>