<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paginator {

	public $pagination;
	public $base_url;
	public $url_parameter;
	public $item_per_page;
	
	// constructor
	public function __construct()
	{
		$this->pagination = new class{};
		$this->base_url = "";
		$this->url_parameter = "";
		$this->item_per_page = 0;
	}
	
    public function calculate($item_count, $item_per_page, $current_page)
	{
		$this->item_per_page = $item_per_page;
		
        $last_page_number = ceil($item_count / $this->item_per_page);
		
		$this->pagination->pages = array();
		$this->pagination->is_prev_dots = false;
		$this->pagination->is_next_dots = false;
		$this->pagination->prev_page = false;
		$this->pagination->next_page = false;
		$this->pagination->first_page = false;
		$this->pagination->last_page = false;
		$this->pagination->first_page_number = false;
		$this->pagination->last_page_number = false;
		$this->pagination->current_page = $current_page;
		
		if ($current_page > 1)
		{
			$this->pagination->first_page = 1;
			$this->pagination->prev_page = $current_page - 1;
		}
		if ($current_page < $last_page_number)
		{
			$this->pagination->last_page = $last_page_number;
			$this->pagination->next_page = $current_page + 1;
		}
		if ($last_page_number > 1)
		{
			$this->pagination->first_page_number = 1;
			$this->pagination->last_page_number = $last_page_number;
			
			for ($i=2; $i<$last_page_number; $i++)
			{
				if ($i < ($current_page-2))
				{
					$this->pagination->is_prev_dots = true;
					$i = $current_page-2;
				}
				if ($i > ($current_page+2))
				{
					$this->pagination->is_next_dots = true;
					break;
				}
				$this->pagination->pages[] = $i;
			}
		}
	}
}