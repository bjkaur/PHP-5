<?php 

class Model_get extends CI_Model {
	function getData($page){
		//query object
		//pagedata: table in db, associative array where page is the row in the table and $page is the variable declared above
		$query = $this->db->get_where("pagedata", array("page" => $page));
		return $query->result();
		
	}
	
	function getFlightData(){
		
		$this->db->select('airline');
		$this->db->from('flights');
		$query = $this->db->get();
		return $result = $query->result();
		$this->load->view('content_flight_search', $result);
			}
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */