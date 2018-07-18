<?php

class Doku_model extends CI_Model {
	
	private $table_doku = 'doku';
	
	// table attribute
	public $id;
	public $transidmerchant;
	public $totalamount;
	public $words;
	public $statustype;
	public $response_code;
	public $approvalcode;
	public $trxstatus;
	public $payment_channel;
	public $paymentcode;
	public $session_id;
	public $bank_issuer;
	public $creditcard;
	public $payment_date_time;
	public $verifyid;
	public $verifyscore;
	public $verifystatus;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->id					= 0;
		$this->transidmerchant		= "";
		
		$this->totalamount			= 0;
		$this->words				= "";
		$this->statustype			= "";
		$this->response_code		= "";
		$this->approvalcode			= "";
		
		$this->trxstatus			= "Requested";
		$this->payment_channel		= 0;
		$this->paymentcode			= 0;
		$this->session_id			= "";
		$this->bank_issuer			= "";
		
		$this->creditcard			= "";
		$this->payment_date_time	= "0000-00-00 00:00:00";
		$this->verifyid				= "";
		$this->verifyscore			= 0;
		$this->verifystatus			= "";
	}
	
	// constructor from database object
	public function get_stub_from_db($db_item)
	{
		$this->id					= $db_item->id;
		$this->transidmerchant		= $db_item->transidmerchant;
		$this->totalamount			= $db_item->totalamount;
		$this->words				= $db_item->words;
		$this->statustype			= $db_item->statustype;
		$this->response_code		= $db_item->response_code;
		$this->approvalcode			= $db_item->approvalcode;	
		$this->trxstatus			= $db_item->trxstatus;
		$this->payment_channel		= $db_item->payment_channel;
		$this->paymentcode			= $db_item->paymentcode;
		$this->session_id			= $db_item->session_id;
		$this->bank_issuer			= $db_item->bank_issuer;
		$this->creditcard			= $db_item->creditcard;
		$this->payment_date_time	= $db_item->payment_date_time;
		$this->verifyid				= $db_item->verifyid;	
		$this->verifyscore			= $db_item->verifyscore;
		$this->verifystatus			= $db_item->verifystatus;
		
		return $this;
	}
	
	// get db from this model
	public function get_db_from_stub()
	{
		$db_item = new class{};
		
		$db_item->id				= $this->id;
		$db_item->transidmerchant	= $this->transidmerchant;
		$db_item->totalamount		= $this->totalamount;
		$db_item->words				= $this->words;
		$db_item->statustype		= $this->statustype;
		$db_item->response_code		= $this->response_code;
		$db_item->approvalcode		= $this->approvalcode;	
		$db_item->trxstatus			= $this->trxstatus;
		$db_item->payment_channel	= $this->payment_channel;
		$db_item->paymentcode		= $this->paymentcode;
		$db_item->session_id		= $this->session_id;
		$db_item->bank_issuer		= $this->bank_issuer;
		$db_item->creditcard		= $this->creditcard;
		$db_item->payment_date_time	= $this->payment_date_time;
		$db_item->verifyid			= $this->verifyid;	
		$db_item->verifyscore		= $this->verifyscore;
		$db_item->verifystatus		= $this->verifystatus;	
		
		return $db_item;
	}
	
	// new stub object from database object
	public function get_new_stub_from_db($db_item)
	{
		$stub = new Doku_model();
		
		$stub->id					= $db_item->id;
		$stub->transidmerchant		= $db_item->transidmerchant;
		$stub->totalamount			= $db_item->totalamount;
		$stub->words				= $db_item->words;
		$stub->statustype			= $db_item->statustype;
		$stub->response_code		= $db_item->response_code;
		$stub->approvalcode			= $db_item->approvalcode;	
		$stub->trxstatus			= $db_item->trxstatus;
		$stub->payment_channel		= $db_item->payment_channel;
		$stub->paymentcode			= $db_item->paymentcode;
		$stub->session_id			= $db_item->session_id;
		$stub->bank_issuer			= $db_item->bank_issuer;
		$stub->creditcard			= $db_item->creditcard;
		$stub->payment_date_time	= $db_item->payment_date_time;
		$stub->verifyid				= $db_item->verifyid;	
		$stub->verifyscore			= $db_item->verifyscore;
		$stub->verifystatus			= $db_item->verifystatus;
		
		return $stub;
	}
	
	public function map_list($items)
	{
		$result = array();
		foreach ($items as $item)
		{
			$result[] = $this->get_new_stub_from_db($item);
		}
		return $result;
	}
	
	public function get_from_id($id)
	{
		$where['id'] = $id;
		
		$this->db->where($where);
		$query = $this->db->get($this->table_doku, 1);
		$doku = $query->row();
		
		return ($doku !== null) ? $this->get_stub_from_db($doku) : null;
	}
	
	public function get_all()
	{
		$query = $this->db->get($this->table_doku);
		$items = $query->result();
		
		return ($items !== null) ? $this->map_list($items) : array();
	}
	
	public function insert()
	{
		$db_item = $this->get_db_from_stub(); // ambil database object dari model ini
		if ($this->db->insert($this->table_doku, $db_item))
		{
			$this->id = $this->db->insert_id();
		}
	}
	
	public function update_from_notify()
	{
		$transidmerchant = $this->input->post('TRANSIDMERCHANT');
		$this->db->where('transidmerchant', $transidmerchant);
		$query = $this->db->get($this->table_doku, 1);
		$result = $query->row();
		$this->id = $result->id;
		
		$status = $this->input->post('RESULTMSG');
		
        $this->transidmerchant 		= $this->input->post('TRANSIDMERCHANT');
		$this->totalamount 			= $this->input->post('AMOUNT');
		$this->words    			= $this->input->post('WORDS');
		$this->statustype 			= $this->input->post('STATUSTYPE');
		$this->response_code 		= $this->input->post('RESPONSECODE');
		
		$this->approvalcode			= $this->input->post('APPROVALCODE');
		$this->payment_channel		= $this->input->post('PAYMENTCHANNEL');
		$this->paymentcode			= $this->input->post('PAYMENTCODE');
		$this->session_id			= $this->input->post('SESSIONID');
		$this->bank_issuer			= $this->input->post('BANK');
		
		$this->cardnumber			= $this->input->post('MCN');
		$this->payment_date_time 	= $this->input->post('PAYMENTDATETIME');
		$this->verifyid 			= $this->input->post('VERIFYID');
		$this->verifyscore 			= $this->input->post('VERIFYSCORE');
		$this->verifystatus 		= $this->input->post('VERIFYSTATUS');
		
		$this->trxstatus			= ($status=="SUCCESS") ? 'Success' : 'Failed';
		
		$db_item = $this->get_db_from_stub(); // ambil database object dari model ini
		$where['transidmerchant'] = $this->transidmerchant;
		$this->db->where($where);
		$this->db->update($this->table_doku, $db_item);
		
		return $this->db->affected_rows();
		
		/*
		$transidmerchant = $this->input->post('TRANSIDMERCHANT');
		$this->db->where('transidmerchant', $transidmerchant);
		$query = $this->db->get($this->table_doku, 1);
		$result = $query->row();
		
		if ($result !== null)
		{
			$status = $this->input->post('RESULTMSG');
			
			$this->db->set('transidmerchant',	$this->input->post('TRANSIDMERCHANT'));
			$this->db->set('totalamount',		$this->input->post('AMOUNT'));
			$this->db->set('words',				$this->input->post('WORDS'));
			$this->db->set('statustype',		$this->input->post('STATUSTYPE'));
			$this->db->set('response_code',		$this->input->post('RESPONSECODE'));
			
			$this->db->set('approvalcod',		$this->input->post('APPROVALCODE'));
			$this->db->set('payment_channel',	$this->input->post('PAYMENTCHANNEL'));
			$this->db->set('paymentcode',		$this->input->post('PAYMENTCODE'));
			$this->db->set('session_id',		$this->input->post('SESSIONID'));
			$this->db->set('bank_issuer',		$this->input->post('BANK'));
			
			$this->db->set('cardnumber',		$this->input->post('MCN'));
			$this->db->set('payment_date_time',	$this->input->post('PAYMENTDATETIME'));
			$this->db->set('verifyid',			$this->input->post('VERIFYID'));
			$this->db->set('verifyscore',		$this->input->post('VERIFYSCORE'));
			$this->db->set('verifystatus',		$this->input->post('VERIFYSTATUS'));
			
			$this->db->set('trxstatus',			($status=="SUCCESS") ? 'Success' : 'Failed');
			
			// $db_item = $this->get_db_from_stub(); // ambil database object dari model ini
			// $where['id'] = $doku->id;
			$this->db->where('id', $result->id);
			$this->db->update($this->table_doku);
			
			return $this->db->affected_rows();
		}
		return 0;
		*/
	}
	
	public function get_from_redirect()
	{
		$status_code 	= $this->input->post('STATUSCODE');
		
		if ($status_code=="0000") // 0000 = Success
		{
			$this->transidmerchant 	= $this->input->post('TRANSIDMERCHANT');
			$this->totalamount 		= $this->input->post('AMOUNT');
			$this->words 			= $this->input->post('WORDS');
			$this->payment_channel	= $this->input->post('PAYMENTCHANNEL');
			$this->session_id		= $this->input->post('SESSIONID');
			$this->paymentcode		= $this->input->post('PAYMENTCODE');
			
			$db_item = $this->get_db_from_stub(); // ambil database object dari model ini
			$this->db->where('transidmerchant', $db_item->transidmerchant);
			$query = $this->db->get($this->table_doku, 1);
			$doku = $query->row();
			
			return ($doku !== null) ? $this->get_stub_from_db($doku) : null;
		}
		else
		{
			
		}
			
	}
}

?>