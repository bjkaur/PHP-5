<?php 

class Get_db extends CI_Model {
	function getAllValues(){
		//functions from library class 
		//alredy loaded the db 
		//$this->db->query("SELECT * FROM test");
		$query = $this->db->query("SELECT * FROM test");
		
		return $query->result();
	}
	
	//receives an array ($data)
	function insert1($data){
		$this->db->insert("test", $data);
	}
	
	/**
	 * insert2 to insert more than one rows
	 * */
	//receives an array ($data), in this array it will receive multiple objects (multi dimensional array)
	function insert2($data){
		$this->db->insert_batch("test", $data);
	}
	
	/**
	 * update1 to replace the existing row with the new row
	 * */
	//param1 name of the table which needs to be updated, param2 the row that will be subtituting e.g. for id=2
	function update1($data){
		$this->db->update("test", $data, "id = 2" );
	}
	
	/**
	 * update2 to update more than one field
	 * */
	function update2($data){
		$this->db->update_batch("test", $data, "id");
	}
	
	//receive two params; 1st param table name, 2nd data array full of specifiers
	function delete1($data){
		$this->db->delete("test", $data);
	}
	
	function empty1($table){
		$this->db->empty($table);
	}
	
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */