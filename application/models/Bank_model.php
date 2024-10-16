<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all banks
    public function get_all_banks() {
        $query = $this->db->get('banks');
        return $query->result_array();
    }

    // Get a specific bank by id
    public function get_bank($id) {
        $query = $this->db->get_where('banks', array('id' => $id));
        return $query->row_array();
    }
    public function get_banks() {
        // Query the database
        $query = $this->db->get('banks');
        
        // Return result as an array of associative arrays
        return $query->result_array();
    }
    public function get_eligibility() {
        // Query the database
        $query = $this->db->get('banks');
        
        // Return result as an array of associative arrays
        return $query->result_array();
    }
    // Insert a new bank
    // public function insert_bank($data) {
    //     // Validate that required fields are not empty
    //     if (empty($data['bank_name'])) {
    //         return false; // Or handle this situation as needed
    //     }
    
    //     return $this->db->insert('banks', $data);
    // }

    // Update a bank
    // public function update_bank($id, $data) {
    //     $this->db->where('id', $id);
    //     return $this->db->update('banks', $data);
    // }

    // Delete a bank
    public function delete_bank($id) {
        return $this->db->delete('banks', array('id' => $id));
    }

    // Helper function to convert comma-separated IDs to arrays
    public function convert_to_array($csv) {
        return explode(',', $csv);
    }

    // Helper function to convert arrays to comma-separated strings
    public function convert_to_csv($array) {
        return implode(',', $array);
    }
    public function set_bank()
    {
        $this->load->helper('url');

        $data = array(
            'bank_name' => $this->input->post('bank_name'),
            'bank_type_id' => $this->input->post('bank_type_id'),
            'address' => $this->input->post('address'),
            'contact_number' => $this->input->post('contact_number')
        );

        return $this->db->insert('banks', $data);
    }
    public function insert_description($data) {
        return $this->db->insert('description', $data);
    }
    public function get_description() {
        // Query the database
        $query = $this->db->get('description');
        
        // Return result as an array of associative arrays
        return $query->result_array();
    }
    public function insert_product($data) {
        return $this->db->insert('products', $data);
    }
    public function get_products() {
        // Query the database
        $query = $this->db->get('products');
        
        // Return result as an array of associative arrays
        return $query->result_array();
    }
    public function insert_bank($data) {
        $this->db->insert('Banks', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }
    // Get loans by bank ID
    public function get_loans_by_bank($bank_id) {
        $this->db->where('bank_id', $bank_id);
        $query = $this->db->get('loan_groups_map');
        return $query->result();
    }
    // Method to get loan purpose by ID
    public function get_product_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('products'); // Assuming 'loan_purpose' is the name of your table
        return $query->row_array(); // Return a single row as an associative array
    }
    // Method to update loan purpose
    public function update_product($id, $product_name) {
        $this->db->where('id', $id);
        return $this->db->update('products', array('product_name' => $product_name)); // Update the record
    }
    // Method to get loan purpose by ID
    public function get_purpose_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('purpose'); // Assuming 'loan_purpose' is the name of your table
        return $query->row_array(); // Return a single row as an associative array
    }
    // Method to update loan purpose
    public function update_purpose($id, $loan_purpose) {
        $this->db->where('id', $id);
        return $this->db->update('purpose', array('loan_purpose' => $loan_purpose)); // Update the record
    }
    // Method to get loan purpose by ID
    public function get_bank_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('banks'); // Assuming 'loan_purpose' is the name of your table
        return $query->row_array(); // Return a single row as an associative array
    }
    // Method to update loan purpose
    public function update_bank($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('banks', $data); // Update the record
    }
    public function update_status($id, $status) {
        $this->db->where('id', $id);
        $this->db->update('banks', array('status' => $status));
    }

    //purpose status
    public function get_active_purpose() {
        $this->db->where('status', 1); // Fetch only active purpose
        $query = $this->db->get('purpose');
        return $query->result_array();
    }
    public function update_purpose_status($id, $status) {
        // Ensure status is either 0 or 1
        $status = ($status == 'inactive') ? 0 : 1;

        $this->db->where('id', $id);
        return $this->db->update('purpose', array('status' => $status));
    }
    public function update_bank_status($id, $status) {
        // Ensure status is either 0 or 1
        $status = ($status == 'inactive') ? 0 : 1;

        $this->db->where('id', $id);
        return $this->db->update('banks', array('status' => $status));
    }

    public function get_product_name($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        $result = $query->row_array();
        return $result ? $result['product_name'] : '';
    }

    public function get_bank_name($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('banks');
        $result = $query->row_array();
        return $result ? $result['bank_name'] : '';
    }
    // Fetch form data including selected options
    public function get_form_data($id) {
        $this->db->select('*');
        $this->db->from('product_groups'); // Replace with your actual table name
        $this->db->where('id', $id);
        $query = $this->db->get();

        if ($query->num_rows() == 0) {
            return [];
        }

        $form_data = $query->row_array();

        // Fetch related data
        $form_data['selected_products'] = $this->get_selected_products($id);
        $form_data['selected_banks'] = $this->get_selected_banks($id);
        $form_data['selected_loan_types'] = $this->get_selected_loan_types($id);

        return $form_data;
    }

    private function get_selected_products($id) {
        $this->db->select('product_id');
        $this->db->from('product_groups'); // Replace with your actual table name
        $this->db->where('id', $id);
        $query = $this->db->get();
        return array_column($query->result_array(), 'product_id');
    }

    private function get_selected_banks($id) {
        $this->db->select('bank_id');
        $this->db->from('product_groups'); // Replace with your actual table name
        $this->db->where('id', $id);
        $query = $this->db->get();
        return array_column($query->result_array(), 'bank_id');
    }

    private function get_selected_loan_types($id) {
        $this->db->select('loan_type_id');
        $this->db->from('product_groups'); // Replace with your actual table name
        $this->db->where('id', $id);
        $query = $this->db->get();
        return array_column($query->result_array(), 'loan_type_id');
    }
    public function get_product_id() {
        // Query the database
        $query = $this->db->get('product_groups');
        
        // Return result as an array of associative arrays
        return $query->result_array();
    }

}
