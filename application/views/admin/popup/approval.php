<script type='text/javascript'>
	$("#popup-password").keypress(function(e) {
		if(e.which == 13) {
			$("#popup-btn_approve").click();
		}
	});
</script>

<div id="popup_approval" class="popup popup-md">
	<div class="panel panel-default">
		<div class="panel-heading">
			Masukkan Password
		</div>
		<div class="panel-body">
			<div class="form-horizontal" method="post" id="popup-form_approval">
				<div class="form-group">
					<div class="col-sm-3">
						<label>Password</label>
					</div>
					<div class="col-sm-9">
						<input type="password" name="password" id="popup-password" value="" class="form-control"/>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-9 col-sm-offset-3">
						<button type="button" class="btn btn-default" id="popup-btn_approve">Terima</button>
						<button type="button" class="btn btn-default" id="popup-btn_decline">Tolak</button>
						<button type="button" class="btn btn-default" onclick="popup.close('popup_approval')">Batal</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>