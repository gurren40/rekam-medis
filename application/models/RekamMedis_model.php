<?php

class RekamMedis_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function create($data){
		if($this->db->insert('RekamMedis', $data)){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function getByID($id){
		$this->db->select('*');
		$this->db->from('RekamMedis');
		$this->db->where('ID',$id);
		$query = $this->db->get();
		if($query->num_rows() == 1){
			return $query->row_array();
		}
		else{
			return 0;
		}
	}
	
	public function getByUserID($id){
		$this->db->select('*');
		$this->db->from('RekamMedis');
		$this->db->where('userID',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return 0;
		}
	}
	
	public function getAllRekamMedis(){
		$this->db->select('*');
		$this->db->from('RekamMedis');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return 0;
		}
	}
}
