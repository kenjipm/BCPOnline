<?php

class Account_List_View_Model extends CI_Model{
	
	public $tenants;
	public $customers;
	public $deliverers;
	// constructor
	public function __construct()
	{	
		parent::__construct();
	}
	
	public function get($tenants, $customers, $deliverers)
	{
		$i = 0;
		foreach($tenants as $tenant)
		{
			$this->tenants[$i] = new class{};
			
			$this->tenants[$i]->id 				= $tenant->id;
			$this->tenants[$i]->tenant_id 		= $tenant->tenant_id;
			$this->tenants[$i]->account_id 		= $tenant->account->id;
			$this->tenants[$i]->account_name 	= $tenant->account->name;
			$this->tenants[$i]->tenant_name 	= $tenant->tenant_name;
			$this->tenants[$i]->email 			= $tenant->account->email;
			$this->tenants[$i]->date_joined 	= $tenant->account->date_joined;
			
			$i++;
		}
		
		$i = 0;
		foreach($customers as $customer)
		{
			$this->customers[$i] = new class{};
			     
			$this->customers[$i]->id 			= $customer->id;
			$this->customers[$i]->customer_id 	= $customer->customer_id;
			$this->customers[$i]->account_id 	= $customer->account->id;
			$this->customers[$i]->account_name 	= $customer->account->name;
			$this->customers[$i]->status 		= $customer->account->status;
			$this->customers[$i]->email 		= $customer->account->email;
			$this->customers[$i]->date_joined 	= $customer->account->date_joined;
			
			$i++;
		}
		
		$i = 0;
		foreach($deliverers as $deliverer)
		{
			$this->deliverers[$i] = new class{};
			
			$this->deliverers[$i]->id 			= $deliverer->id;
			$this->deliverers[$i]->deliverer_id = $deliverer->deliverer_id;
			$this->deliverers[$i]->account_id 	= $deliverer->account->id;
			$this->deliverers[$i]->account_name = $deliverer->account->name;
			$this->deliverers[$i]->email 		= $deliverer->account->email;
			$this->deliverers[$i]->date_joined 	= $deliverer->account->date_joined;
			
			$i++;
		}
		
	}
	
	
}

?>