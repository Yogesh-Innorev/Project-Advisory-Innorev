<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{

  function __construct()
  {
    parent::__construct();
    $this->logged_in();
  }

  private function logged_in(){
    if (! $this->session->userdata('logged_in')) {
      redirect(base_url('login'));
    }
  }
  public function index()
  {
    $this->load->view('admin/include/header');
    $this->load->view('admin/dashboard_view');
    $this->load->view('admin/include/footer');
  }
}
