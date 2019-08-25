<?php

class AuthKey_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function createKey($data){
		if($this->db->insert('AuthKey', $data)){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function getByID($id){
		$this->db->select('*');
		$this->db->from('AuthKey');
		$this->db->where('ID',$id);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row_array();
		}
		else{
			return 0;
		}
	}
	
	public function verifyKey($key) : int{
		$this->db->select('*');
		$this->db->from('AuthKey');
		$this->db->where('keyss',$key);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			$result = $query->row_array();
			if(time() > strtotime($result['dateexpired'])){
				return -1;
			}
			else{
				return $result['owner'];
			}
		}
		else{
			return 0;
		}
	}
	
	public function getByOwnerID($id){
		$this->db->select('*');
		$this->db->from('AuthKey');
		$this->db->where('owner',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return 0;
		}
	}
	
	public function getAllKeys(){
		$this->db->select('*');
		$this->db->from('AuthKey');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return 0;
		}
	}
}
