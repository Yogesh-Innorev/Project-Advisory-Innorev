<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MY_Controller extends CI_Controller 
{

	public function __construct()
    {
        parent::__construct();
        $row=$this->session->userdata('isAdmin');
        is_login();
        $this->adminId=$row->id;
        $this->type=$row->type;
        $this->companyID=$row->company_id;
    }

    public function uploadFile($files,$paths)
    {
        $paths='uploads/'.$paths;
        if(!file_exists($paths)) 
        {
            mkdir($paths, 0777, true);
        }
        $config['upload_path']=$paths;
        $config['allowed_types']='*';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload($files))
        { 
            $data['error']=true;
            $data['file']=  $this->upload->display_errors();
        }else{
            $file = $this->upload->data();
            $data['error']=false;
            $data['file'] =  $file['file_name'];
            $data['full_path'] =  $file['full_path'];
        }
        // echo "<pre>";print_r($data);exit();
        return $data;
    }
    

    public function removeFile($paths)
    {
        $paths=FCPATH.'uploads/'.$paths;
        if(file_exists($paths)) 
        {
            @unlink($paths);
        }
    }
}

class User_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $row=$this->session->userdata('isUser');
        is_user_login();
        $this->userID=$row->id;
        // $userSessionData=$row;
    }

    public function uploadFile($files,$paths)
    {
        $paths='uploads/'.$paths;
        if(!file_exists($paths)) 
        {
            mkdir($paths, 0777, true);
        }
        $config['upload_path']=$paths;
        $config['allowed_types']='*';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload($files))
        { 
            $data['error']=true;
            $data['file']=  $this->upload->display_errors();
        }else{
            $file = $this->upload->data();
            $data['error']=false;
            $data['file'] =  $file['file_name'];
            $data['full_path'] =  $file['full_path'];
        }
        // echo "<pre>";print_r($data);exit();
        return $data;
    }
    

    public function removeFile($paths)
    {
        $paths=FCPATH.'uploads/'.$paths;
        if(file_exists($paths)) 
        {
            @unlink($paths);
        }
    }

}

class Web_Controller extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
    }

    public function uploadFile($files,$paths)
    {
        $paths='uploads/'.$paths;
        if(!file_exists($paths)) 
        {
            mkdir($paths, 0777, true);
        }
        $config['upload_path']=$paths;
        $config['allowed_types']='*';
        $config['encrypt_name'] = TRUE;
        
        $this->load->library('upload', $config);
        if(!$this->upload->do_upload($files))
        { 
            $data['error']=true;
            $data['file']=  $this->upload->display_errors();
        }else{
            $file = $this->upload->data();
            $data['error']=false;
            $data['file'] =  $file['file_name'];
            $data['full_path'] =  $file['full_path'];
        }
        // echo "<pre>";print_r($data);exit();
        return $data;
    }
    

    public function removeFile($paths)
    {
        $paths=FCPATH.'uploads/'.$paths;
        if(file_exists($paths)) 
        {
            @unlink($paths);
        }
    }

}

?>