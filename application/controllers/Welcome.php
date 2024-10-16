<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	public function Index()
	{
		$this->load->view('includes/header');
        $this->load->view('index');
        $this->load->view('includes/footer');
    }

    public function services()
    {
    	$this->load->view('includes/header');
        $this->load->view('services');
        $this->load->view('includes/footer');
    }
    public function aboutus()
    {
        $this->load->view('includes/header');
        $this->load->view('about_us');
        $this->load->view('includes/footer');
    }
    public function contact_us()
    {
        $this->load->view('includes/header');
        $this->load->view('contact_us');
        $this->load->view('includes/footer');
    }
    public function save_contact_us()
    {
            // print_r($this->input->post());die;
            $name       = trim($this->input->post('name'));
            $email      = trim($this->input->post('email'));
            $phone      = trim($this->input->post('phone'));
            $subject    = trim($this->input->post('subject'));
            $message    = trim($this->input->post('message'));

            $data = array(    'name'          => $name,
                                'email'         => $email,
                                'phone'         => $phone,
                                'subject'       => $subject,
                                'message'       => $message,
                            );

            if ($this->db->insert('contact_us', $data))
            {
                // success
                $this->session->set_flashdata('message','<div class="alert alert-success text-center">We received your message! Will get back to you shortly!!!</div>');
                redirect(base_url("Contact-Us"));
            }
            else
            {
                // error
                $this->session->set_flashdata('message','<div class="alert alert-danger text-center">Oops! Some Error.  Please try again later!!!</div>');
                redirect(base_url("Contact-Us"));
            }


    }
    public function save_enquiry()
    {
        // print_r($this->input->post());die;
            $name       = trim($this->input->post('name'));
            $email      = trim($this->input->post('email'));
            $phone      = trim($this->input->post('phone'));
            $service    = trim($this->input->post('service'));

            $data = array(    'name'          => $name,
                                'email'         => $email,
                                'phone'         => $phone,
                                'service'       => $service,
                            );

            if ($this->db->insert('tbl_enquiry_form', $data))
            {
                // success
                $this->session->set_flashdata('message','<div class="alert alert-success text-center">We received your message! Will get back to you shortly!!!</div>');
                redirect(base_url());
            }
            else
            {
                // error
                $this->session->set_flashdata('message','<div class="alert alert-danger text-center">Oops! Some Error.  Please try again later!!!</div>');
                redirect(base_url());
            }
    }
    public function blogs()
    {
        $this->load->view('includes/header');
        $this->load->view('blogs');
        $this->load->view('includes/footer');
    }
    public function privacypolicy()
    {
        $this->load->view('includes/header');
        $this->load->view('miscellaneous/privacypolicy');
        $this->load->view('includes/footer');
    }
    public function TermCondition()
    {
        $this->load->view('includes/header');
        $this->load->view('miscellaneous/disclaimer');
        $this->load->view('includes/footer');
    }
    public function disclaimer()
    {
        $this->load->view('includes/header');
        $this->load->view('miscellaneous/term_condition');
        $this->load->view('includes/footer');
    }
    

}