<?php

class Data_user_model extends CI_Model{
	
	public function __construct(){
		$this->load->database();
	}
	
	public function getByEmail($email){
		$this->db->select('*');
		$this->db->from('Data-User');
		$this->db->where('email',$email);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row_array();
		}
		else{
			return 0;
		}
	}
	
	public function getByID($id){
		$this->db->select('*');
		$this->db->from('Data-User');
		$this->db->where('ID',$id);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row_array();
		}
		else{
			return 0;
		}
	}
	
	public function amIadmin($id){
		$this->db->select('Role');
		$this->db->from('User');
		$this->db->where('ID',$id);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			$result = $query->row_array();
			if($result['Role'] == 1) return true;
			else return false;
		}
		else{
			return false;
		}
	}
	
	public function getAllUser(){
		$this->db->select('ID, NIK, Nama, Umur, JK, Alamat');
		$this->db->from('User');
		$this->db->where('Role',0);
		$this->db->order_by('Nama','asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return 0;
		}
	}
	
	public function createUser($data){
		if($this->db->insert('Data-User', $data)){
			return true;
		}
		else{
			return false;
		}
	}
}
