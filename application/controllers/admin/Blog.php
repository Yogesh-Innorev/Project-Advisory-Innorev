<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller
{
  public function index()
  {
    $this->load->view('admin/include/header');
    $this->load->view('admin/manage_blog/blogs');
    $this->load->view('admin/include/footer');
  }
  public function add_blog()
  {
    $this->load->view('admin/include/header');
    $this->load->view('admin/manage_blog/add_blog');
    $this->load->view('admin/include/footer');
  }
  public function save_blog()
  {
    $data['title'] = $this->input->post('title');
    $data['description'] = $this->input->post('description');
    $data['category'] = $this->input->post('category');

    if(!empty($_FILES['image']['name'])) {
      $uploadPath = './uploads/blogs/';
                // $uploadPath = 'uploads/ckeditor/email_attachment/'.$pi_id.'';

      if(!file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, TRUE);
      }
              $config['upload_path'] = $uploadPath; 
               $config['allowed_types'] ='*';//'zip|application/x-zip-compressed'; 
               // $config['max_size'] = 1024 * 10;//'zip|application/x-zip-compressed'; 
               $config['file_name'] = $_FILES['image']['name'];
               // Load upload library 

               $this->load->library('upload',$config); 
               $this->upload->initialize($config);
               // File upload
               if($this->upload->do_upload('image'))
               { 
                    // Get data about the file
                $uploadData = $this->upload->data();
                $path=FCPATH.$uploadPath;
                    // $source_file= $uploadData['file_name'];
                $filename= $uploadData['file_name'];
                $destination_file= 'c_'.$uploadData['file_name'];
                $quality=60;
                $data['image']=$filename;
              }else{
                $error = array('error' => $this->upload->display_errors());
                echo "<pre>";print_r($error);exit();
              }
            }
            $query = $this->db->insert('tbl_blog',$data);

            if($query>0) {
            // values are saved in session to display the message.
              $this->session->set_flashdata('message','<div class="alert alert-success text-center">Added successfully.</div>');
            } 
            else {
              $this->session->set_flashdata('message', 'Some error occurred');
            }

            redirect(base_url('blog'));
  }
  public function edit_blog($id)
  {
    $this->load->model('Manage_feed_model');
    $data['records'] = $this->Manage_feed_model->getblogs($id);
    $this->load->view('admin/include/header');
    $this->load->view('admin/manage_blog/edit', $data);
    $this->load->view('admin/include/footer');
  }

  public function blog_update($id)
  {
    $data['title'] = $this->input->post('title');
    $data['description'] = $this->input->post('description');
    $data['category'] = $this->input->post('category');

    if(!empty($_FILES['image']['name'])) {
      $uploadPath = './uploads/blogs/';
                // $uploadPath = 'uploads/ckeditor/email_attachment/'.$pi_id.'';

      if(!file_exists($uploadPath)) {
        mkdir($uploadPath, 0777, TRUE);
      }
              $config['upload_path'] = $uploadPath; 
               $config['allowed_types'] ='*';//'zip|application/x-zip-compressed'; 
               // $config['max_size'] = 1024 * 10;//'zip|application/x-zip-compressed'; 
               $config['file_name'] = $_FILES['image']['name'];
               // Load upload library 

               $this->load->library('upload',$config); 
               $this->upload->initialize($config);
               // File upload
               if($this->upload->do_upload('image'))
               { 
                    // Get data about the file
                $uploadData = $this->upload->data();
                $path=FCPATH.$uploadPath;
                    // $source_file= $uploadData['file_name'];
                $filename= $uploadData['file_name'];
                $destination_file= 'c_'.$uploadData['file_name'];
                $quality=60;
                $data['image']=$filename;
              }else{
                $error = array('error' => $this->upload->display_errors());
                echo "<pre>";print_r($error);exit();
              }
            }
            $this->load->model('Manage_feed_model');
            $query = $this->Manage_feed_model->updateblog($id,$data);

            if($query>0) {
            // values are saved in session to display the message.
              $this->session->set_flashdata('message','<div class="alert alert-success text-center">Updated successfully.</div>');
            } 
            else {
              $this->session->set_flashdata('message', 'Some error occurred');
            }

            redirect(base_url('blog'));
  }

  public function delete_blog($id)
  {
    $query = $this->db->delete('tbl_blog', ['id' => $id]);
      
        if($query>0) {
          $this->session->set_flashdata('message','<div class="alert alert-success text-center">Deleted successfully.</div>');
        } 

        else {
          $this->session->set_flashdata('message', 'Some error occurred');
        }

        redirect(base_url('blog'));
  }
  public function blog_detail_view($id)
  {
        $this->load->model('Manage_feed_model');
        $data['blog'] = $this->Manage_feed_model->get_blogs($id);

        if (empty($data['blog'])) {
            show_404();
        }
        $this->load->view('includes/header');
        $this->load->view('blog_detail', $data);
        $this->load->view('includes/footer');
  }

  public function home_query_form()
  {
    $this->load->view('admin/include/header');
    $this->load->view('admin/miscellaneous/home_query_form/manage');
    $this->load->view('admin/include/footer');    
  }
  public function edit_home_query($id)
  {
    $this->load->model('Manage_feed_model');
    $data['records'] = $this->Manage_feed_model->getHome_query($id);
    $this->load->view('admin/include/header');
    $this->load->view('admin/miscellaneous/home_query_form/edit', $data);
    $this->load->view('admin/include/footer');
  }
  public function delete_home_query($id)
  {
     $query = $this->db->delete('tbl_enquiry_form', ['id' => $id]);
      
        if($query>0) {
          $this->session->set_flashdata('message','<div class="alert alert-success text-center">Deleted successfully.</div>');
        } 

        else {
          $this->session->set_flashdata('message', 'Some error occurred');
        }

        redirect(base_url('home_query_form'));
  }
  public function contact_us()
  {
    $this->load->view('admin/include/header');
    $this->load->view('admin/miscellaneous/contact_us/manage');
    $this->load->view('admin/include/footer');
  }
  public function delete_contact_us($id)
  {
    $query = $this->db->delete('contact_us', ['id' => $id]);
      
        if($query>0) {
          $this->session->set_flashdata('message','<div class="alert alert-success text-center">Deleted successfully.</div>');
        } 

        else {
          $this->session->set_flashdata('message', 'Some error occurred');
        }

        redirect(base_url('contact_us'));
  }
  public function edit_contact_us($id)
  {
    $this->load->model('Manage_feed_model');
    $data['records'] = $this->Manage_feed_model->get_ContactUs($id);
    $this->load->view('admin/include/header');
    $this->load->view('admin/miscellaneous/contact_us/edit', $data);
    $this->load->view('admin/include/footer');
  }

  public function privacy_policy()
  {
    $this->load->view('admin/include/header');
    $this->load->view('admin/miscellaneous/privacy_policy');
    $this->load->view('admin/include/footer');
  }
  public function addprivacy_policy()
  {
    $data = array(
        'body' => $this->input->post('body_add'),
    );

    $query = $this->db->insert('privacy_policy', $data);

        if($query>0) {
            // values are saved in session to display the message.
            $this->session->set_flashdata('message','<div class="alert alert-success text-center">Data Inserted successfully.</div>');
          } 
          else {
            $this->session->set_flashdata('message', 'Some error occurred');
          }
    redirect(base_url('privacy_policy'));
  }
  public function update_privacy_policy()
  {
    $data = array(
        'body' => $this->input->post('body'),
    );

    $query = $this->db->update('privacy_policy', $data);

        if($query>0) {
            // values are saved in session to display the message.
            $this->session->set_flashdata('message','<div class="alert alert-success text-center">Data Updated successfully.</div>');
          } 
          else {
            $this->session->set_flashdata('message', 'Some error occurred');
          }
    redirect(base_url('privacy_policy'));

  }

  public function privacy_policy_delete($id)
  {
    $query = $this->db->delete('privacy_policy', ['id' => $id]);
    
    if($query>0) {
      $this->session->set_flashdata('message','<div class="alert alert-success text-center">Deleted successfully.</div>');
    } 

    else {
      $this->session->set_flashdata('message', 'Some error occurred');
    }

    redirect(base_url('privacy_policy'));
  }

  public function disclaimer()
  {
    $this->load->view('admin/include/header');
    $this->load->view('admin/miscellaneous/disclaimer');
    $this->load->view('admin/include/footer');
  }
  public function adddisclaimer()
  {
    $data = array(
        'body' => $this->input->post('body_add'),
    );

    $query = $this->db->insert('disclaimer', $data);

        if($query>0) {
            // values are saved in session to display the message.
            $this->session->set_flashdata('message','<div class="alert alert-success text-center">Data Inserted successfully.</div>');
          } 
          else {
            $this->session->set_flashdata('message', 'Some error occurred');
          }
    redirect(base_url('disclaimer'));
  }
  public function update_disclaimer()
  {
    $data = array(
        'body' => $this->input->post('body'),
    );

    $query = $this->db->update('disclaimer', $data);

        if($query>0) {
            // values are saved in session to display the message.
            $this->session->set_flashdata('message','<div class="alert alert-success text-center">Data Updated successfully.</div>');
          } 
          else {
            $this->session->set_flashdata('message', 'Some error occurred');
          }
    redirect(base_url('disclaimer'));

  }

  public function disclaimer_delete($id)
  {
    $query = $this->db->delete('disclaimer', ['id' => $id]);
    
    if($query>0) {
      $this->session->set_flashdata('message','<div class="alert alert-success text-center">Deleted successfully.</div>');
    } 

    else {
      $this->session->set_flashdata('message', 'Some error occurred');
    }

    redirect(base_url('disclaimer'));
  }
  public function term_condition()
  {
    $this->load->view('admin/include/header');
    $this->load->view('admin/miscellaneous/term_condition');
    $this->load->view('admin/include/footer');
  }
  public function addterm_condition()
  {
    $data = array(
        'body' => $this->input->post('body_add'),
    );

    $query = $this->db->insert('tbl_term_condition', $data);

        if($query>0) {
            // values are saved in session to display the message.
            $this->session->set_flashdata('message','<div class="alert alert-success text-center">Data Inserted successfully.</div>');
          } 
          else {
            $this->session->set_flashdata('message', 'Some error occurred');
          }
    redirect(base_url('term_condition'));
  }
  public function update_term_condition()
  {
    $data = array(
        'body' => $this->input->post('body'),
    );

    $query = $this->db->update('tbl_term_condition', $data);

        if($query>0) {
            // values are saved in session to display the message.
            $this->session->set_flashdata('message','<div class="alert alert-success text-center">Data Updated successfully.</div>');
          } 
          else {
            $this->session->set_flashdata('message', 'Some error occurred');
          }
    redirect(base_url('term_condition'));

  }

  public function term_condition_delete($id)
  {
    $query = $this->db->delete('tbl_term_condition', ['id' => $id]);
    
    if($query>0) {
      $this->session->set_flashdata('message','<div class="alert alert-success text-center">Deleted successfully.</div>');
    } 

    else {
      $this->session->set_flashdata('message', 'Some error occurred');
    }

    redirect(base_url('term_condition'));
  }

}
