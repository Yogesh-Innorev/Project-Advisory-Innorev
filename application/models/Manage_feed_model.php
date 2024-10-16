<?php
defined('BASEPATH') OR exit('No direct script access allowed');

Class Manage_feed_model extends CI_Model
{
	public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    public function get_business_natures() {
        $query = $this->db->get('business_natures');
        return $query->result_array();
    }

    public function get_sectors() {
        $query = $this->db->get('sectors');
        return $query->result_array();
    }
    public function get_turnover() {
        $query = $this->db->get('turnover_options');
        return $query->result_array();
    }
    public function get_funding_purposes() {
        $query = $this->db->get('funding_purposes');
        return $query->result_array();
    }
    public function get_loan_types() {
        $query = $this->db->get('kind_of_loan_type');
        return $query->result_array();
    }

    public function get_data($data) {
        // $this->db->insert('insert_data', $data);
        return $this->db->insert('tbl_entries', $data);
    }

    public function get_all_user_details() {
        $query = $this->db->get('tbl_entries');
        return $query->result_array();
    }
    function getPaginatedData($page = 1, $rowsPerPage = 10) {
      $this->db->select('*');
      $this->db->from('tbl_entries');
      $this->db->limit($rowsPerPage, ($page - 1) * $rowsPerPage);
      $q = $this->db->get();
      return $q->result_array();
    }

    public function getEnquiryById($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('tbl_entries');
        return $query->row_array(); // Use row_array() for a single record
    }

    public function add_user($username, $password) {
		// Query to check if the username and password match
      $this->db->where('username', $username);
		$this->db->where('password', $password); // Use hashed password comparison if applicable
		$query = $this->db->get('admin'); // 'users' is the table name
		
		if ($query->num_rows() == 1) {
			return true;
		} else {
			return false;
		}
	}
	
	

    // Method to check if username exists
    public function username_exists($username) {
        $this->db->where('username', $username);
        $query = $this->db->get('admin');
        return $query->num_rows() > 0; // Return true if username exists
    }

    // Method to verify user credentials
    public function verify_user($username, $password) {
        $this->db->where('username', $username);
        $query = $this->db->get('admin');

        if ($query->num_rows() == 1) {
            $user = $query->row();
            return password_verify($password, $user->password);
        } else {
            return false;
        }
    }

    // Update user status
    // public function update_user_status($username, $status) {
    //     $this->db->where('username', $username);
    //     $this->db->update('admin', array('status' => $status));
    // }
    public function get_name_by_id($table, $id) {
        $this->db->select('name'); // Adjust 'name' to your actual column name for the name
        $this->db->from($table);
        $this->db->where('id', $id); // Adjust 'id' to your actual column name for the ID
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->name; // Adjust 'name' to your actual column name for the name
        }
        return null;
    }

    public function get_loanType_by_id($table, $id) {
        $this->db->select('loanType_name'); // Adjust 'name' to your actual column name for the name
        $this->db->from($table);
        $this->db->where('id', $id); // Adjust 'id' to your actual column name for the ID
        $query = $this->db->get();

        if ($query->num_rows() > 0) {
            return $query->row()->loanType_name; // Adjust 'name' to your actual column name for the name
        }
        return null;
    }

    public function validateLogin($data){
    	$this->db->select('*');
    	$this->db->where('username', $username['username']);
    	$this->db->where('password', $password['password']);
    	$this->db->from('admin');
    	$this->db->limit(1);
    	$query = $this->db->get();
    	if ($query->num_rows() == 1) {
    		return $query->row();
    	}
    	else{
    		return false;
    	}
    }

    public function get_product_by_loan_type($loan_type_id) {
    $this->db->select('*');
    $this->db->from('product_groups');
    $this->db->where("FIND_IN_SET('$loan_type_id', loan_type_id) >", 0);
    $query = $this->db->get();

    $products = $query->result_array();

    // Process eligibility_id to explode comma-separated values
    foreach ($products as &$product) {
        if (!empty($product['eligibility_id'])) {
            $product['eligibility_ids'] = explode(',', $product['eligibility_id']);
        } else {
            $product['eligibility_ids'] = [];
        }

        // Process additional fields if they exist
        if (!empty($product['primary_security'])) {
            $primary_security_ids = explode(',', $product['primary_security']);
            $product['primary_security_data'] = $this->db->where_in('id', $primary_security_ids)->get('primary_security')->result_array();
        } else {
            $product['primary_security_data'] = [];
        }

        if (!empty($product['colletural_security'])) {
            $colletural_security_ids = explode(',', $product['colletural_security']);
            $product['colletural_security_data'] = $this->db->where_in('id', $colletural_security_ids)->get('colletural_security')->result_array();
        } else {
            $product['colletural_security_data'] = [];
        }

        if (!empty($product['gurantees'])) {
            $gurantees_ids = explode(',', $product['gurantees']);
            $product['gurantees_data'] = $this->db->where_in('id', $gurantees_ids)->get('gurantees')->result_array();
        } else {
            $product['gurantees_data'] = [];
        }

        if (!empty($product['title'])) {
            $title_ids = explode(',', $product['title']);
            $product['title_data'] = $this->db->where_in('id', $title_ids)->get('terms_conditions')->result_array();
        } else {
            $product['title_data'] = [];
        }
    }

    return $products;
}

    public function getblogs($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_blog');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function get_blogs($id = FALSE) {
        if ($id === FALSE) {
            $query = $this->db->get('tbl_blog');
            return $query->result_array();
        }

        $query = $this->db->get_where('tbl_blog', array('id' => $id));
        return $query->row_array();
    }
    public function updateblog($id, $data)
    {
        $this->db->where('id', $id);
        $query = $this->db->update('tbl_blog', $data);

        if($query)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public function getHome_query($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_enquiry_form');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row(); 
    }
    public function get_ContactUs($id)
    {
        $this->db->select('*');
        $this->db->from('contact_us');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }


}