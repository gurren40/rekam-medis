<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Daftar extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->model("User_model");
		$this->load->model("AuthKey_model");
		$this->load->model("Data_user_model");
	}
	
	public function index()
	{
		$this->load->view('daftar');
	}
	public function ctscan()
	{
		$this->load->view('tambahan/ctscan');
	}
	
	public function irfluoroskopi()
	{
		$this->load->view('tambahan/irfluoroskopi');
	}
	
	public function simpan()
	{
		$id = uniqid();
		$data = array(
			'id' => $id,
			'nama-institusi' => $this->input->post('nama-institusi'),
			'nama-sub-institusi' => $this->input->post('nama-sub-institusi'),
			'kode-rumah-sakit' => $this->input->post('kode-rumah-sakit'),
			'jenis-institusi' => $this->input->post('jenis-institusi'),
			'alamat' => $this->input->post('alamat'),
			'kota-kabupaten' => $this->input->post('kota-kabupaten'),
			'provinsi' => $this->input->post('provinsi'),
			'kode-pos' => $this->input->post('kode-pos'),
			'gelar' => $this->input->post('gelar'),
			'gelar-lainnya' => $this->input->post('gelar-lainnya'),
			'nama-awal' => $this->input->post('nama-awal'),
			'nama-akhir' => $this->input->post('nama-akhir'),
			'telpon-kantor' => $this->input->post('telpon-kantor'),
			'no-hp' => $this->input->post('no-hp'),
			'fax' => $this->input->post('fax'),
			'email' => $this->input->post('email'),
			'gelar-akun' => $this->input->post('gelar-akun'),
			'gelar-lainnya-akun' => $this->input->post('gelar-lainnya-akun'),
			'nama-awal-akun' => $this->input->post('nama-awal-akun'),
			'nama-akhir-akun' => $this->input->post('nama-akhir-akun'),
			'jabatan-akun' => $this->input->post('jabatan-akun'),
			'telpon-kantor-akun' => $this->input->post('telpon-kantor-akun'),
			'no-hp-akun' => $this->input->post('no-hp-akun'),
			'fax-akun' => $this->input->post('fax-akun'),
			'email-akun' => $this->input->post('email-akun')
		);
		$this->Data_user_model->createUser($data);
		header('Location: /');
	}
	
	public function ctscansimpan()
	{
		$id = uniqid();
		$data = array(
			'id' => $id,
			'nama-institusi' => $this->input->post('nama-institusi'),
			'nama-sub-institusi' => $this->input->post('nama-sub-institusi'),
			'kode-rumah-sakit' => $this->input->post('kode-rumah-sakit'),
			'jenis-institusi' => $this->input->post('jenis-institusi'),
			'alamat' => $this->input->post('alamat'),
			'kota-kabupaten' => $this->input->post('kota-kabupaten'),
			'provinsi' => $this->input->post('provinsi'),
			'kode-pos' => $this->input->post('kode-pos'),
			'gelar' => $this->input->post('gelar'),
			'gelar-lainnya' => $this->input->post('gelar-lainnya'),
			'nama-awal' => $this->input->post('nama-awal'),
			'nama-akhir' => $this->input->post('nama-akhir'),
			'telpon-kantor' => $this->input->post('telpon-kantor'),
			'no-hp' => $this->input->post('no-hp'),
			'fax' => $this->input->post('fax'),
			'email' => $this->input->post('email'),
			'gelar-akun' => $this->input->post('gelar-akun'),
			'gelar-lainnya-akun' => $this->input->post('gelar-lainnya-akun'),
			'nama-awal-akun' => $this->input->post('nama-awal-akun'),
			'nama-akhir-akun' => $this->input->post('nama-akhir-akun'),
			'jabatan-akun' => $this->input->post('jabatan-akun'),
			'telpon-kantor-akun' => $this->input->post('telpon-kantor-akun'),
			'no-hp-akun' => $this->input->post('no-hp-akun'),
			'fax-akun' => $this->input->post('fax-akun'),
			'email-akun' => $this->input->post('email-akun')
		);
		$this->Data_user_model->createUser($data);
		header('Location: /');
	}
	
}
