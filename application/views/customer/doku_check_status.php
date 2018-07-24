<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type='text/javascript' src='<?=site_url('js/jquery-3.2.1.min.js')?>'></script>
		<script language="javascript" type="text/javascript">
			$(document).ready(function(){
				$('#form_check_status').submit();
			});
		</script>
	</head>
	<body>
		<form action="<?=$model->action_url?>" id="form_check_status" method="POST">
			<input type="hidden" name="MALLID" value="<?=$model->MALLID?>"/>
			<input type="hidden" name="CHAINMERCHANT" value="<?=$model->CHAINMERCHANT?>"/>
			<input type="hidden" name="TRANSIDMERCHANT" value="<?=$model->TRANSIDMERCHANT?>"/>
			<input type="hidden" name="SESSIONID" value="<?=$model->SESSIONID?>"/>
			<input type="hidden" name="WORDS" value="<?=$model->WORDS?>"/>
			
			<input type="hidden" name="CURRENCY" value="<?=$model->CURRENCY?>"/>
			<input type="hidden" name="PURCHASECURRENCY" value="<?=$model->PURCHASECURRENCY?>"/>
			<input type="hidden" name="PAYMENTTYPE" value="<?=$model->PAYMENTTYPE?>"/>
		</form>
	</body>
</html>