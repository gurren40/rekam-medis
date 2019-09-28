<?php
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class User extends CI_Controller {
	    
    public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model("AuthKey_model");
		$this->load->helper('url');
	}
	
    function login(){
		if($this->session->has_userdata('key')){
			$data['error'] = "You have logged in. go to home or logout";
			$this->load->view('errorhandler',$data);
		}
		else{
			$this->load->view('login');
		}
	}
	
	function index(){
		if(!$this->session->has_userdata('key')){
			redirect('user/login','refresh');
		}
		$userID = $this->AuthKey_model->verifyKey($this->session->key);
		if($userID<1){
			$data['error'] = "Key is invalid";
			$this->load->view('errorhandler',$data);
		}
		else{
			$isadmin = 0;
			if($this->User_model->amIadmin($userID)){
				$isadmin = 1;
			}
			$data['key'] = $this->session->key;
			$data['isadmin'] = $isadmin;
			$this->load->view('rmlist',$data);
		}
	}
	
    function create(){
		if(!$this->input->post('NIK')){
			$this->response(array('status' => 'NIK invalid'));
		}
		else if(!$this->input->post('password')){
			$this->response(array('status' => 'password invalid'));
		}
		else{
			$password = password_hash($this->input->post('password'),PASSWORD_DEFAULT);
			$create = array('NIK' => $this->input->post('NIK'),
							'password' => $password,
							'Nama' => $this->input->post('Nama'),
							'Umur' => $this->input->post('Umur'),
							'JK' => $this->input->post('JK'),
							'Alamat' => $this->input->post('Alamat')
					  );
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
    
    function authkey(){
		if($this->session->has_userdata('key')){
			$data['error'] = "You have logged in. go to home or logout";
			$this->load->view('errorhandler',$data);
		}
		else if(!$this->input->post('NIK')){
			$data['error'] = "NIP is Invalid";
			$this->load->view('errorhandler',$data);
		}
		else if(!$this->input->post('password')){
			$data['error'] = "Password is Invalid";
			$this->load->view('errorhandler',$data);
		}
		else{
			$result = $this->User_model->getByNIK($this->input->post('NIK'));
			if(!$result == 0){
				if(!$this->User_model->amIadmin($result['ID'])){
					$NIK = $result['NIK'];
					$passwordhash = $result['password'];
					$isvalid = password_verify($this->input->post('password'),$passwordhash);
					if(!$isvalid){
						$data['error'] = "Password is invalid";
						$this->load->view('errorhandler',$data);
					}
					else{
						$date = date("Y-m-d");
						$current = date("Y-m-d",strtotime($date));
						$next = date("Y-m-d",strtotime($date."+1 month"));
						$randKey = $this->random_str();
						$createKey = array('owner' => $result['ID'],'keyss' => $randKey,'datecreated' => $current,'dateexpired' => $next);
						if($this->AuthKey_model->createKey($createKey)){
							$this->session->set_userdata('key', $randKey);
							redirect('/','refresh');
						}
						else{
							$data['error'] = "Error when create key. try again";
							$this->load->view('errorhandler',$data);
						}
					}
				}
				else{
					$data['error'] = "Do not login as admin";
					$this->load->view('errorhandler',$data);
				}
			}
			else{
				$data['error'] = "No such user";
				$this->load->view('errorhandler',$data);
			}
		}
	}
	
	function get(){
		if(!$this->input->post('key')){
			$this->response(array('status' => 'key is not posted'));
		}
		else{
			$userID = $this->AuthKey_model->verifyKey($this->input->post('key'));
			if($userID > 0){
				$result = $this->User_model->getByID($userID);
				if(!($result == 0)){
					$toSend = array('Nama' => $result['Nama'],'Umur' => $result['Umur'],'JK' => $result['JK'],'Alamat' => $result['Alamat']);
					$this->response($toSend);
				}
				else{
					$this->response(array('status' => 'error when get user data'));
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
	
	function getAll(){
		if(!$this->input->post('key')){
			$this->response(array('status' => 'key is not posted'));
		}
		else{
			$userID = $this->AuthKey_model->verifyKey($this->input->post('key'));
			if($userID > 0){
				if(!$this->User_model->amIadmin($userID)){
					$this->response(array('status' => 'you are not admin or something wrong happend'));
				}
				else{
					$result = $this->User_model->getAllUser();
					if(!($result == 0)){
						$this->response($result);
					}
					else{
						$this->response(array('status' => 'error when get All User data'));
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
	
	function logout(){
		$this->session->unset_userdata('key');
		redirect('/','refresh');
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
