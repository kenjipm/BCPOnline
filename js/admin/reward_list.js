function redeem_reward(redeem_reward_id)
{
	if (confirm("Redeem Reward ini?")){
		$.ajax ({
			type: 'post',
			url: base_url + "/Reward/confirm_redeem_reward",
			data:
			{
				redeem_reward_id : redeem_reward_id
			},
			success: function(data) {
				if (data == "-1"){
					alert("Reward Tidak Ditemukan");
				} else if (data == "1"){
					alert("Reward Berhasil Diambil");
					location.reload();
				} else {
					alert("Unknown Error");
				}
			}
		});
	}
}