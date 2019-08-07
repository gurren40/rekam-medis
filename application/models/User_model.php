<?php

class User_model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}
	
	public function getByUsername($username){
		$this->db->select('*');
		$this->db->from('User');
		$this->db->where('username',$username);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row_array();
		}
		else{
			return 0;
		}
	}
	
	public function getAllUser(){
		$this->db->select('*');
		$this->db->from('User');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return 0;
		}
	}
	
	public function createUser($data){
		if($this->db->insert('User', $data)){
			return true;
		}
		else{
			return false;
		}
	}
}
