<?php
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class Admin extends CI_Controller {
	    
    public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model("AuthKey_model");
	}
	
    function index(){
		$this->response(array('status' => 'nothing'));
	}
	
    function create(){
		if(!$this->post('NIK')){
			$this->response(array('status' => 'NIK invalid'));
		}
		else if(!$this->post('password')){
			$this->response(array('status' => 'password invalid'));
		}
		else{
			$userID = $this->AuthKey_model->verifyKey($this->post('key'));
			if(!$this->User_model->amIadmin($userID)){
				$this->response(array('status' => 'you are not admin or something wrong happend'));
			}
			else{
				$password = password_hash($this->post('password'),PASSWORD_DEFAULT);
				$create = array('NIK' => $this->post('NIK'),
								'password' => $password,
								'Nama' => $this->post('Nama'),
								'Umur' => $this->post('Umur'),
								'JK' => $this->post('JK'),
								'Alamat' => $this->post('Alamat'),
								'Role' => 1
						  );
				$result = $this->User_model->createUser($create);
				 
				if($result === false){
					$this->response(array('status' => 'failed'));
				}
				else{
					$this->response(array('status' => 'success'),201);
				}
			}
		}
    }
    
    function authkey(){
		if(!$this->post('NIK')){
			$this->response(array('status' => 'NIK invalid'));
		}
		else if(!$this->post('password')){
			$this->response(array('status' => 'password invalid'));
		}
		else{
			$result = $this->User_model->getByNIK($this->post('NIK'));
			if(!$result == 0){
				if(!$this->User_model->amIadmin($result['ID'])){
					$this->response(array('status' => 'you are not admin or something wrong happend'));
				}
				else{
					$NIK = $result['NIK'];
					$passwordhash = $result['password'];
					$isvalid = password_verify($this->post('password'),$passwordhash);
					if(!$isvalid){
						$this->response(array('status' => 'password invalid'));
					}
					else{
						$date = date("Y-m-d");
						$current = date("Y-m-d",strtotime($date));
						$next = date("Y-m-d",strtotime($date."+1 month"));
						$randKey = $this->random_str();
						$createKey = array('owner' => $result['ID'],'keyss' => $randKey,'datecreated' => $current,'dateexpired' => $next);
						if($this->AuthKey_model->createKey($createKey)){
							$this->response(array('key' => $randKey),201);
						}
						else{
							$this->response(array('status' => 'error when create key'));
						}
					}
				}
			}
			else{
				$this->response(array('status' => 'no such user'));
			}
		}
	}
	
	function get(){
		if(!$this->post('key')){
			$this->response(array('status' => 'key is not posted'));
		}
		else{
			$userID = $this->AuthKey_model->verifyKey($this->post('key'));
			if($userID > 0){
				if(!$this->User_model->amIadmin($userID)){
					$this->response(array('status' => 'you are not admin or something wrong happend'));
				}
				else{
					$result = $this->User_model->getByID($userID);
					if(!($result == 0)){
						$toSend = array('Nama' => $result['Nama'],'Umur' => $result['Umur'],'JK' => $result['JK'],'Alamat' => $result['Alamat']);
						$this->response($toSend);
					}
					else{
						$this->response(array('status' => 'error when get rekam medis data'));
					}
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
