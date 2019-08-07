<?php
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class UserAPI extends REST_Controller {
	    
    public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model("AuthKey_model");
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
		if(!$this->post('username')){
			$this->response(array('status' => 'username invalid'));
		}
		else if(!$this->post('password')){
			$this->response(array('status' => 'password invalid'));
		}
		else{
			$password = password_hash($this->post('password'),PASSWORD_DEFAULT);
			$create = array('username' => $this->post('username'), 'password' => $password);
			$result = $this->User_model->createUser($create);
			 
			if($result === false)
			{
				$this->response(array('status' => 'failed'));
			}
			 
			else
			{
				$this->response(array('status' => 'success'),201);
			}
		}
    }
    
    function authkey_post(){
		if(!$this->post('username')){
			$this->response(array('status' => 'username invalid'));
		}
		else if(!$this->post('password')){
			$this->response(array('status' => 'password invalid'));
		}
		else{
			$result = $this->User_model->getByUsername($this->post('username'));
			if(!$result == 0){
				$username = $result['username'];
				$passwordhash = $result['password'];
				$isvalid = password_verify($this->post('password'),$passwordhash);
				if(!$isvalid){
					$this->response(array('status' => 'password invalid'));
				}
				else{
					$date = date("Y-m-d");
					$current = date("Y-m-d",strtotime($date));
					$next = date("Y-m-d",strtotime($date."+1 month"));
					$randKey = $this->random_str(32);
					$createKey = array('owner' => $result['ID'],'keys' => $randKey,'datecreated' => $current,'dateexpired' => $next);
					if($this->AuthKey_model->createKey($createKey)){
						$this->response(array('key' => $randKey),201);
					}
					else{
						$this->response(array('status' => 'error when create keys'));
					}
				}
			}
			else{
				$this->response(array('status' => 'no such user'));
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
