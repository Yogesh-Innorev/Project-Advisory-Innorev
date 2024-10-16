<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_types_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all loan types
    public function get_all_loan_types() {
        $query = $this->db->get('kind_of_loan_type');
        return $query->result_array();
    }

    // Get a specific loan type by id
    public function get_loan_type($id) {
        $query = $this->db->get_where('kind_of_loan_type', array('id' => $id));
        return $query->row_array();
    }

    // Insert a new loan type
    public function insert_loan_type($data) {
        return $this->db->insert('kind_of_loan_type', $data);
    }

    // Update a loan type
    public function update_loan_type($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('kind_of_loan_type', $data);
    }

    // Delete a loan type
    public function delete_loan_type($id) {
        return $this->db->delete('kind_of_loan_type', array('id' => $id));
    }

    //add loan
    public function insert_loan($data) {
        return $this->db->insert('loans', $data);
    }
    // get data from loans table
    public function get_loans() {
        $query = $this->db->get('loans');
        return $query->result_array();
    }

    public function insert_purpose($data) {
        return $this->db->insert('purpose', $data);
    }

    public function get_loan_purpose() {
        $query = $this->db->get('purpose');
        return $query->result_array();
    }
    // public function get_loan_types_by_bank($bank_id) {
    //     $this->db->select('kind_of_loan_type.id, kind_of_loan_type.loanType_name');
    //     $this->db->from('kind_of_loan_type');
    //     $this->db->join('bank_loan_type blt', 'lt.id = blt.loan_type_id');
    //     $this->db->where('blt.bank_id', $bank_id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    public function get_loan_groups_by_bank($bank_id) {
        $this->db->select('loan_map.id as loan_id, loan_map.loan_type as loan_group, b.name as bank_name');
        $this->db->from('loan_map');
        $this->db->join('bank_loan_type blt', 'loan_map.id = blt.loan_type_id');
        $this->db->join('banks b', 'blt.bank_id = b.id');
        $this->db->where('b.id', $bank_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_loanType_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('kind_of_loan_type'); // Assuming 'loan_purpose' is the name of your table
        return $query->row_array(); // Return a single row as an associative array
    }
    // Method to update loan purpose
    public function update_loanType($id, $loanType_name) {
        $this->db->where('id', $id);
        return $this->db->update('kind_of_loan_type', array('loanType_name' => $loanType_name)); // Update the record
    }
    public function get_active_loan_types() {
        $this->db->where('status', 'active');
        $query = $this->db->get('kind_of_loan_type');
        return $query->result_array();
    }
    public function update_loanType_status($id, $status) {
        // Ensure status is either 0 or 1
        $status = ($status == 'inactive') ? 0 : 1;

        $this->db->where('id', $id);
        return $this->db->update('kind_of_loan_type', array('status' => $status));
    }

    public function get_loan_type_names($ids) {
        $ids_array = explode(',', $ids);
        $this->db->where_in('id', $ids_array);
        $query = $this->db->get('kind_of_loan_type');
        $loan_types = $query->result_array();
        $names = [];
        foreach ($loan_types as $loan_type) {
            $names[] = $loan_type['loanType_name']; // Adjust based on your column name
        }
        return $names;
    }
    public function get_loan_types() {
        $query = $this->db->get('kind_of_loan_type'); // Fetch loan types from the 'loan_types' table
        return $query->result(); // Return the result as an array of objects
    }

    public function get_banks() {
        $query = $this->db->get('banks'); // Fetch banks from the 'banks' table
        return $query->result(); // Return the result as an array of objects
    }
}
