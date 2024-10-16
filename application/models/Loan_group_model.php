<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Loan_group_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all loan groups
    public function get_all_loan_groups() {
        $query = $this->db->get('loan_groups_master');
        return $query->result_array();
    }

    // Get loan group by id
    public function get_loan_group($id) {
        $query = $this->db->get_where('loan_groups_master', array('id' => $id));
        return $query->row_array();
    }

    // Insert a new loan group
    public function insert_loan_group($data) {
        return $this->db->insert('loan_groups_master', $data);
    }

    // Update a loan group
    public function update_loan_group($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('loan_groups_master', $data);
    }

    // Delete a loan group
    public function delete_loan_group($id) {
        return $this->db->delete('loan_groups_master', array('id' => $id));
    }
}
