<?php

class report_print_preview_view_model extends CI_Model {
	
	public $print_title;
	
	public $report_description;
	public $tenant_name;
	public $category_name;
	public $brand_name;
	public $keywords;
	public $start_date;
	public $end_date;
	public $report_html;
	
	// constructor
	public function __construct()
	{
		parent::__construct();
		
		$this->transactions = array();
		$this->print_title			= null;
		$this->report_description	= "";
		$this->tenant_name			= "";
		$this->category_name		= "";
		$this->brand_name			= "";
		$this->keywords				= "";
		$this->start_date			= "";
		$this->end_date				= "";
		$this->report_html			= "";
	}
	
	public function get($report_type, $tenant, $category, $brand, $keywords, $start_date, $end_date, $report_html)
	{
		$this->report_description	= REPORT_TYPES[$report_type]['description'];
		
		if (REPORT_TYPES[$report_type]['tenant_opt']) // kalau tenant termasuk filter
			if (isset($tenant->tenant_name)) $this->tenant_name = $tenant->tenant_name;
			else $this->tenant_name = "Semua";
		else $this->tenant_name = "";
		
		if (REPORT_TYPES[$report_type]['category_opt']) // kalau category termasuk filter
			if (isset($category->category_name)) $this->category_name = $category->category_name;
			else $this->category_name = "Semua";
		else $this->category_name = "";
		
		if (REPORT_TYPES[$report_type]['brand_opt']) // kalau brand termasuk filter
			if (isset($brand->brand_name)) $this->brand_name = $brand->brand_name;
			else $this->brand_name = "Semua";
		else $this->brand_name = "";
		
		if (REPORT_TYPES[$report_type]['keywords_opt']) $this->keywords = $keywords;
		else $this->keywords = "";
		
		$this->start_date	= date("d M Y", strtotime($start_date));
		$this->end_date		= date("d M Y", strtotime($end_date));
		$this->report_html	= $report_html;
		
		$this->print_title =
			REPORT_TYPES[$report_type]['description'] .
			($this->tenant_name ? " - Tenant " . $this->tenant_name : "") .
			($this->category_name ? " - Kategori " . $this->category_name : "") .
			($this->brand_name ? " - Brand " . $this->brand_name : "") .
			($this->keywords ? " - Keyword " . $this->keywords : "") .
			" (" . $this->start_date . " - ". $this->end_date .")";
	}
}
?>