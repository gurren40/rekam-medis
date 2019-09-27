<?php

class RekamMedis_model extends CI_Model{
	public function __construct(){
		$this->load->database();
	}
	
	public function createRM($data){
		if($this->db->insert('RekamMedis', $data)){
			return true;
		}
		else{
			return false;
		}
	}
	
	public function getByRMID($id,$userID){
		$this->db->select('*');
		$this->db->from('RekamMedis');
		$this->db->where('userID',$userID);
		$this->db->where('ID',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->row_array();
		}
		else{
			return 0;
		}
	}
	
	public function getByPureRMID($id){
		$this->db->select('*');
		$this->db->from('RekamMedis');
		$this->db->where('ID',$id);
		$query = $this->db->get();
		if($query->num_rows() > 0){
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
		$this->db->order_by('Nama','asc');
		$query = $this->db->get();
		if($query->num_rows() > 0){
			return $query->result_array();
		}
		else{
			return 0;
		}
	}
}
