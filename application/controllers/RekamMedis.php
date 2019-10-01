<?php
require (APPPATH.'/libraries/REST_Controller.php');
use Restserver\Libraries\REST_Controller;

class RekamMedis extends CI_Controller {
	    
    public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model("AuthKey_model");
		$this->load->model("RekamMedis_model");
	}
	
	function index(){
		$this->response(array('status' => 'nothing'));
	}
	
    function create(){
		$config['allowed_types'] = 'jpg';
		$this->load->library('upload', $config);
		if(!$this->input->input_stream('key')){
			$data['error'] = "Key is invalid";
			$this->load->view('errorhandler',$data);
		}
		else {
			$userID = $this->AuthKey_model->verifyKey($this->input->input_stream('key'));
			if($userID > 0){
				$image = '';
				$imageName = $this->random_str().'.'.'jpg';
				$imagePath = 'rmimage'.'/'.$imageName;
				$newRM = array('userID' => $userID,
								'Nama' => $this->input->input_stream('Nama'),
								'Tegangan' => $this->input->input_stream('Tegangan'),
								'mAs' => $this->input->input_stream('mAs'),
								'mGy' => $this->input->input_stream('mGy'),
								'OutputRadiasi' => $this->input->input_stream('OutputRadiasi'),
								'Esak' => $this->input->input_stream('Esak'),
								'DAP' => $this->input->input_stream('DAP'),
								'imageName' => $imageName,
								'datecreated' => date("Y-m-d")
						 );
				if($this->RekamMedis_model->createRM($newRM)){
					file_put_contents($imagePath,$this->upload->data());
					$data['error'] = "Upload Success!!!";
					$this->load->view('errorhandler',$data);
				}
				else{
					$data['error'] = "Upload failed.";
					$this->load->view('errorhandler',$data);
				}
			}
			else if($userID < 0){
				$data['error'] = "Key is expired";
				$this->load->view('errorhandler',$data);
			}
			else{
				$data['error'] = "Key is invalid";
				$this->load->view('errorhandler',$data);
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
