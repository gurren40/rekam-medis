<?php
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class RekamMedisAPI extends REST_Controller {
	    
    public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model("AuthKey_model");
		$this->load->model("RekamMedis_model");
	}
	
    function index_get(){
		$this->response(array('status' => 'nothing'));
	}
	function index_post(){
		$this->response(array('status' => 'nothing'));
	}
	function index_put(){
		$this->response(array('status' => 'nothing'));
	}
	function index_delete(){
		$this->response(array('status' => 'nothing'));
	}
	
    function create_post(){
		if(!$this->post('keys')){
			$this->response(array('status' => 'key is not posted'));
		}
		else {
			$userID = $this->AuthKey_model->verifyKey($this->post('keys'));
			if($userID > 0){
				$image = '';
				$imageName = '';
				if(!$this->post('imageFile')){
					$imageName = 'none';
				}
				else{
					//file_put_contents('rmimage'.'/'.'base64qt.txt',$this->post('imageFile'));
					$image = hex2bin($this->post('imageFile'));
					$imageName = $this->random_str(32).'.'.'jpg';
				}
				$imagePath = 'rmimage'.'/'.$imageName;
				$newRM = array('userID' => $userID,'Nama' => $this->post('Nama'),'NIK' => $this->post('NIK'),'Umur' => $this->post('Umur'),'JK' => $this->post('JK'),'Alamat' => $this->post('Alamat'),'Tegangan' => $this->post('Tegangan'),'mAs' => $this->post('mAs'),'mGy' => $this->post('mGy'),'OutputRadiasi' => $this->post('OutputRadiasi'),'Esak' => $this->post('Esak'),'DAP' => $this->post('DAP'),'imageName' => $imageName);
				if($this->RekamMedis_model->createRM($newRM)){
					if($this->post('imageFile')){
						file_put_contents($imagePath,$image);
					}
					$this->response(array('status' => 'success'));
				}
				else{
					$this->response(array('status' => 'error when create rekam medis'));
				}
			}
			else if($userID < 0){
				$this->response(array('status' => 'expired'));
			}
			else{
				$this->response(array('status' => 'key is invalid'));
			}
		}
    }
    
    function get_post($RMID){
		if(!$this->post('keys')){
			$this->response(array('status' => 'key is not posted'));
		}
		else {
			$userID = $this->AuthKey_model->verifyKey($this->post('keys'));
			if($userID > 0){
				$result = $this->RekamMedis_model->getByRMID($RMID,$userID);
				if(!($result == 0)){
					$this->response($result);
				}
				else{
					$this->response(array('status' => 'error when get rekam medis data'));
				}
			}
			else if($userID < 0){
				$this->response(array('status' => 'expired'));
			}
			else{
				$this->response(array('status' => 'key is invalid'));
			}
		}
	}
	
	function getAll_post(){
		if(!$this->post('keys')){
			$this->response(array('status' => 'key is not posted'));
		}
		else {
			$userID = $this->AuthKey_model->verifyKey($this->post('keys'));
			if($userID > 0){
				$result = $this->RekamMedis_model->getByUserID($userID);
				if(!($result == 0)){
					$this->response($result);
				}
				else{
					$this->response(array('status' => 'error when get rekam medis data'));
				}
			}
			else if($userID < 0){
				$this->response(array('status' => 'expired'));
			}
			else{
				$this->response(array('status' => 'key is invalid'));
			}
		}
	}
	
	function random_str(int $length = 64): string {
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
			$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
	}
}
