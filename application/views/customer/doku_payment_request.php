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
		<form action="<?=$action_url?>" id="form_payment_request" method="POST">
			<input type="hidden" name="BASKET" value="<?=$BASKET?>"/>
			<input type="hidden" name="MALLID" value="<?=$MALLID?>"/>
			<input type="hidden" name="CHAINMERCHANT" value="<?=$CHAINMERCHANT?>"/>
			<input type="hidden" name="AMOUNT" value="<?=$AMOUNT?>"/>
			<input type="hidden" name="PURCHASEAMOUNT" value="<?=$PURCHASEAMOUNT?>"/>
			<input type="hidden" name="TRANSIDMERCHANT" value="<?=$TRANSIDMERCHANT?>"/>
			<!--input type="hidden" name="PAYMENTTYPE" value="<?=$PAYMENTTYPE?>"/-->
			<input type="hidden" name="WORDS" value="<?=$WORDS?>"/>
			<input type="hidden" name="REQUESTDATETIME" value="<?=$REQUESTDATETIME?>"/>
			<input type="hidden" name="CURRENCY" value="<?=$CURRENCY?>"/>
			<input type="hidden" name="PURCHASECURRENCY" value="<?=$PURCHASECURRENCY?>"/>
			<input type="hidden" name="SESSIONID" value="<?=$SESSIONID?>"/>
			<input type="hidden" name="NAME" value="<?=$NAME?>"/>
			<input type="hidden" name="EMAIL" value="<?=$EMAIL?>"/>
			<input type="hidden" name="PAYMENTCHANNEL" value="<?=$PAYMENTCHANNEL?>"/>
			<input type="hidden" name="ADDRESS" value=""/>
			<input type="hidden" name="COUNTRY" value=""/>
			<input type="hidden" name="STATE" value=""/>
			<input type="hidden" name="CITY" value=""/>
			<input type="hidden" name="PROVINCE" value=""/>
			<input type="hidden" name="ZIPCODE" value=""/>
			<input type="hidden" name="HOMEPHONE" value=""/>
			<input type="hidden" name="MOBILEPHONE" value=""/>
			<input type="hidden" name="WORKPHONE" value=""/>
			<input type="hidden" name="BIRTHDATE" value=""/>
		</form>
	</body>
</html>