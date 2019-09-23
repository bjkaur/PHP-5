<?php 

class Model_login extends CI_Model {
	
	/**
	 * function to check if user exits in the database or not
	 * , takes in two params 
	 * @param username
	 * @param user password
	 */
	public function login($name, $pass){
		$this->db->select('name, password');
		$this->db->from('members');
		$this->db->where('name', $name);
		$this->db->where('password', $pass);
		
	
		 //get data from the db
		$query =  $this->db->get();
		
		//if one row found with the name and password in the data base
		//return 'user exists' otherwise false 
		if($query->num_rows() == 1){
			return true;
		}
		else{
			return false;
		}
	}
	
}

/* End of file model_login.php */
/* Location: ./application/models/model_login.php */