<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('Mauth');
    }
	
	public function index()
	{
		$this->load->view('formlogin');
	}

	function proses(){
		if(isset($_POST['username']) && isset($_POST['password'])){
			$username=$this->input->post('username');
			$password=sha1($this->input->post('password'));
			$data = array('password' => $password,'username' =>$username);
			$res=$this->Mauth->proseslogin($data);
			// echo $this->db->last_query();
			if($res=='true'){
				redirect('welcome');

			}else{
				redirect('auth');	
			}
		}else{
			// echo "asd";
			redirect('auth');
		}
	}

	function logout(){
		$this->session->sess_destroy();
		redirect('auth');
	}
}
