<?php
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->helper('form');
		$this->load->library('form_validation');
		$this->load->model('admin_model');
		$this->load->database();
		$this->load->library('session');
		// if ($this->session->userdata('logged_in') == TRUE) 
		// {
		//    redirect('dashboard');
		// }
	}

	public function index(){	
		$this->load->view('admin/login');
	}

	public function create(){
		$this->form_validation->set_rules('username','Username','trim|required|valid_email');
		$this->form_validation->set_rules('password','Password','required');

		if($this->form_validation->run() == FALSE){
			$this->index();
		}
		else {
			$data = [
				'username' => $this->input->post('username'),
				'password' => $this->input->post('password')
			];
				
			$user = new admin_model;
			$result = $user->validateLogin($data);
			if ($result != FALSE) {
				$newdata = array(
                   'username'  => $result->username,
                   'password'     => $result->password,
                   'logged_in' => TRUE
               );
				$this->session->set_userdata($newdata);
				redirect(base_url('dashboard'));
			}
			else{
				$this->session->set_flashdata('status', 'Invalid username and password.');
				redirect(base_url('login'));
			}

		}
	}
	public function logout(){
		$this->session->sess_destroy();
        redirect(base_url('login'));
	}

}
