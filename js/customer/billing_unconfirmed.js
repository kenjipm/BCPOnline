function confirm_bill()
{
	if ($("#address_id").val() == undefined)
	{
		alert("Harap isi alamat kirim terlebih dahulu");
	}
	else
	{
		$("#form-cart").submit();
	}
}