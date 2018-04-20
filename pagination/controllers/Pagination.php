<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pagination extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Pagination_model');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->employees();
	}

	public function employees()
	{

		// Initialize variables to use
		$data = array();
		$table = 'employees';
		$limit = 2;

		// Get the page based on the segment
		if($this->uri->segment(3)){
			$page = ($this->uri->segment(3)) ;
		}else{
			$page = 1;
		}

		// Results
		$results = $this->Pagination_model->get_records( 
			array(
				'table' => $table,
				'select' => array('id', 'name', 'age'),
				'where' => array(),
				'limit' => $limit,
				'offset' => ($page - 1) * $limit
			)
		);
		$data['results'] = $results['records'];

		// set the configuration
		$config = array();
		$config['base_url'] = base_url() . 'codeigniter/pagination/employees';
		$config['total_rows'] = $this->Pagination_model->record_count($table);
		$config['per_page'] = $limit;
		$config['use_page_numbers'] = TRUE;
		$config['num_links'] = $this->Pagination_model->record_count($table);
		$config['cur_tag_open'] = '&nbsp;<a class="current">';
		$config['cur_tag_close'] = '</a>';
		$config['next_link'] = 'Next';
		$config['prev_link'] = 'Previous';

		// Initialized pagination
		$this->pagination->initialize($config);

		$str_links = $this->pagination->create_links();
		$data["links"] = explode('&nbsp;',$str_links );
		$this->load->view('pagination', $data);

	}

}
