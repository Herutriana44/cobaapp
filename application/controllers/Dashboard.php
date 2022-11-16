<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {
	
	public function index()
	{
		// panggil library "session"
		$this->load->library("session");
		// panggil helper "url"
		$this->load->helper('url');

		if($this->session->userdata('ka-19') == "")
		{
			redirect("Login");
		}
		else
		{
			$this->load->view('dashboard');
		}		
	}

	function setSession()
	{
		// panggil library "session"
		$this->load->library("session");
		// panggil helper "url"
		$this->load->helper('url');

		// ambil data json
		$json = file_get_contents("php://input");
		$data = json_decode($json);
		$username = $data->username;

		// buat session
		$this->session->set_userdata('ka-19',$username);

		// kirim keterangan ke gotoDashboard(JS)
		echo json_encode(array("hasil" => 1));
	}
}
