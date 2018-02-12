<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Customer</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="customer_id">ID</label></th>
							<th> <label for="customer_name">Nama</label></th>
							<th> <label for="email">E-mail</label></th>
							<th> <label for="date_joined">Tanggal Daftar</label></th>
							<th> </th>
							<th> </th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->customers as $customer)
						{
							?>
							<tr>
								<td>
									<?=$customer->customer_id?> </td>
								<td>
									<?=$customer->account_name?> </td>
								<td>
									<?=$customer->email?> </td>
								<td>
									<?=$customer->date_joined?> </td>
								<td>
									<a href="<?=site_url('account/account_detail/'.$customer->account_id)?>">
										<button class="btn btn-default">Lihat Akun</button>
									</a>
								</td>
								<td>
									<a href="<?=site_url('customer/profile/'.$customer->id)?>">
										<button class="btn btn-default">Lihat Profil</button>
									</a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>


<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Tenant</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th><label for="tenant_id">ID</label></th>
							<th><label for="tenant_name">Tenant</label></th>
							<th><label for="account_name">PIC</label></th>
							<th><label for="email">E-mail</label></th>
							<th><label for="date_joined">Tanggal Daftar</label></th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->tenants as $tenant)
						{
							?>
							<tr>
								<td>
									<?=$tenant->tenant_id?> </td>
								<td>
									<?=$tenant->tenant_name?> </td>
								<td>
									<?=$tenant->account_name?> </td>
								<td>
									<?=$tenant->email?> </td>
								<td>
									<?=$tenant->date_joined?> </td>
								<td>
									<a href="<?=site_url('account/account_detail/'.$tenant->account_id)?>">
										<button class="btn btn-default">Lihat</button>
									</a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
			
			<a class="btn btn-default" href="<?=site_url('account/create_tenant')?>">
				Buat Akun
			</a>	
		</div>
	</div>
</div>

<div class="col-sm-10 col-sm-offset-1">
	<div class="panel panel-default">
		<div class="panel-heading">
			<h3>Daftar Deliverer</h3>
		</div>
		<div class="panel-body">
			<div class="table-responsive">
				<table class="table table-striped table-bordered">
					<thead>
						<tr>
							<th> <label for="deliverer_id">ID</label></th>
							<th> <label for="deliverer_name">Nama</label></th>
							<th> <label for="email">E-mail</label></th>
							<th> <label for="date_joined">Tanggal Daftar</label></th>
							<th> </th>
						</tr>
					</thead>
					<tbody>
						<?php
						foreach($model->deliverers as $deliverer)
						{
							?>
							<tr>
								<td>
									<?=$deliverer->deliverer_id?> </td>
								<td>
									<?=$deliverer->account_name?> </td>
								<td>
									<?=$deliverer->email?> </td>
								<td>
									<?=$deliverer->date_joined?> </td>
								<td>
									<a href="<?=site_url('account/account_detail/'.$deliverer->account_id)?>">
										<button class="btn btn-default">Lihat</button>
									</a>
								</td>
							</tr>
							<?php
						}
						?>
					</tbody>
				</table>
			</div>
			<a class="btn btn-default" href="<?=site_url('account/create_deliverer')?>">
				Buat Akun
			</a>	
		</div>
	</div>
</div>


<div id="popup_verify" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Verifikasi Akun
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Verifikasi akun ini?</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="button" class="btn btn-default">Ya</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_verify')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>

<div id="popup_block" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Blokir Akun
		</div>
		<div class="panel-body">
			<form class="form-horizontal">
				<div class="form-group">
					<div class="col-sm-12">
						<label>Apakah Anda yakin untuk memblokir akun ini?</label>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-8 col-sm-offset-4">
						<button type="button" class="btn btn-default">Ya</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_block')">Batal</button>
					</div>
				</div>
			</form>
		</div>
	</div>
</div>