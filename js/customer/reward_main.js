function redeem_reward(id, points_needed) {
	if (confirm("Tukar reward ini dengan " + points_needed + " poin?")) $("#reward-"+id).submit();
}