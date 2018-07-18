<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type='text/javascript' src='<?=site_url('js/jquery-3.2.1.min.js')?>'></script>
		<script language="javascript" type="text/javascript">
			$(document).ready(function(){
				$('#form_payment_request').submit();
			});
		</script>
	</head>
	<body>
		<form action="<?=$model->action_url?>" id="form_payment_request" method="POST">
			<input type="hidden" name="BASKET" value="<?=$model->BASKET?>"/>
			<input type="hidden" name="MALLID" value="<?=$model->MALLID?>"/>
			<input type="hidden" name="CHAINMERCHANT" value="<?=$model->CHAINMERCHANT?>"/>
			<input type="hidden" name="AMOUNT" value="<?=$model->AMOUNT?>"/>
			<input type="hidden" name="PURCHASEAMOUNT" value="<?=$model->PURCHASEAMOUNT?>"/>
			<input type="hidden" name="TRANSIDMERCHANT" value="<?=$model->TRANSIDMERCHANT?>"/>
			<input type="hidden" name="PAYMENTTYPE" value="<?=$model->PAYMENTTYPE?>"/>
			<input type="hidden" name="WORDS" value="<?=$model->WORDS?>"/>
			<input type="hidden" name="REQUESTDATETIME" value="<?=$model->REQUESTDATETIME?>"/>
			<input type="hidden" name="CURRENCY" value="<?=$model->CURRENCY?>"/>
			<input type="hidden" name="PURCHASECURRENCY" value="<?=$model->PURCHASECURRENCY?>"/>
			<input type="hidden" name="SESSIONID" value="<?=$model->SESSIONID?>"/>
			<input type="hidden" name="NAME" value="<?=$model->NAME?>"/>
			<input type="hidden" name="EMAIL" value="<?=$model->EMAIL?>"/>
			<input type="hidden" name="PAYMENTCHANNEL" value="<?=$model->PAYMENTCHANNEL?>"/>
			<input type="hidden" name="ADDRESS" value="<?=$model->ADDRESS?>"/>
			<input type="hidden" name="COUNTRY" value="<?=$model->COUNTRY?>"/>
			<input type="hidden" name="STATE" value="<?=$model->STATE?>"/>
			<input type="hidden" name="CITY" value="<?=$model->CITY?>"/>
			<input type="hidden" name="PROVINCE" value="<?=$model->PROVINCE?>"/>
			<input type="hidden" name="ZIPCODE" value="<?=$model->ZIPCODE?>"/>
			<input type="hidden" name="HOMEPHONE" value="<?=$model->HOMEPHONE?>"/>
			<input type="hidden" name="MOBILEPHONE" value="<?=$model->MOBILEPHONE?>"/>
			<input type="hidden" name="WORKPHONE" value="<?=$model->WORKPHONE?>"/>
			<input type="hidden" name="BIRTHDATE" value="<?=$model->BIRTHDATE?>"/>
		</form>
	</body>
</html>