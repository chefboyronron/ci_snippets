<?php 

Class Pagination_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
	}

	public function record_count($table_name) 
	{
		return $this->db->count_all($table_name);
	}

	public function get_records( $params = array() )
	{

		if( is_array( $params ) && count($params) != 0 ) {

			$response = array('count'=>0, 'records' => array());

			// Select statement
			if( isset( $params['select'] ) ) {
				$select = implode(',', $params['select'] );
				$this->db->select($select);
			}else{
				$this->db->select('*');
			}

			// From statement
			if( isset( $params['table'] ) ){
				$this->db->from($params['table']);
			} else {
				die( 'Error: params must have "table" => "table_name" ' );
			}

			// Where statement
			if( isset( $params['where'] ) ) {
				$where = $params['where'];
				if( is_array( $where ) ){
					foreach( $where as $filter ) {
						foreach( $filter as $key => $val ) {
							$this->db->or_like($key, $val);
						}
					}
				}
			}
			if( isset($params['limit']) ) {
				$this->db->limit($params['limit'], $params['offset']);
			}

			$query = $this->db->get();

			$response['count'] = $query->num_rows();
			$response['records'] = $query->result();
			return $response;

		}

	}

}

?>