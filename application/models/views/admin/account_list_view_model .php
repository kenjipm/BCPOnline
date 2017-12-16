<?php

class Account_List_View_Model {
	
	public $accounts;
	// constructor
	public function __construct()
	{	
	}
	
	public function get($accounts)
	{
		$i = 0;
		foreach($accounts as $account)
		{
			$this->accounts[$i] = new class{};
			
			$this->accounts[$i]->account_id 	= $account->account_id;
			$this->accounts[$i]->account_name 	= $account->account_name;
			$this->accounts[$i]->email 			= $account->email;
			$this->accounts[$i]->date_joined 	= $account->date_joined;
			
			$i++;
		}
		
	}
	
	
}

?>