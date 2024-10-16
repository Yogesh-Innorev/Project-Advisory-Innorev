<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Get all products
    public function get_all_products() {
        $this->db->select('products.*, loan_types.type_name');
        $this->db->from('products');
        $this->db->join('loan_types', 'products.loan_type_id = loan_types.id', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Get products by loan type id
    public function get_products_by_loan_type($loan_type_id) {
        $this->db->where('loan_type_id', $loan_type_id);
        $query = $this->db->get('products');
        return $query->result_array();
    }

    // Get a specific product by id
    public function get_product($id) {
        $query = $this->db->get_where('products', array('id' => $id));
        return $query->row_array();
    }

    // Insert a new product
    public function insert_product($data) {
        return $this->db->insert('products', $data);
    }

    // Update a product
    public function update_product($id, $data) {
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    // Delete a product
    public function delete_product($id) {
        return $this->db->delete('products', array('id' => $id));
    }
    public function get_loan_with_description() {
        // Perform a join operation
        $this->db->select('loans.*, description.description_text');
        $this->db->from('loans');
        $this->db->join('description', 'loans.id = description.id');
        $query = $this->db->get();
        
        return $query->result_array(); // Return as an array
    }

    // to map data

    public function get_all_descriptions() {
        $query = $this->db->get('description');
        return $query->result_array();
    }

    public function get_loans_with_descriptions($description_ids) {
        $this->db->select('loan.*, description.description_text');
        $this->db->from('loan');
        $this->db->join('description', 'loan.description_id = description.description_id');
        if (!empty($description_ids)) {
            $this->db->where_in('loan.description_id', $description_ids);
        }
        $query = $this->db->get();
        return $query->result_array();
    }

    // Fetch all loans for the dropdown
    // Fetch all loans for the dropdown
    public function get_all_loans() {
        $this->db->select('id, loan');
        $query = $this->db->get('loans');
        return $query->result_array();
    }
    
    // Fetch all descriptions
    public function get_all_description() {
        $this->db->select('id, description_text');
        $query = $this->db->get('description');
        return $query->result_array();
    }
    // public function get_descriptions_by_loan($loan_id) {
    //     $this->db->select('id');
    //     $this->db->from('loans');
    //     $this->db->join('description', 'loans.description_id = description.id');
    //     $this->db->where('loan.id', $loan_id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }
    // Fetch descriptions for a specific loan
    public function get_descriptions_by_loan1($loan_id) {
        $this->db->select('description.id, description.description_text');
        $this->db->from('loans');
        $this->db->join('description', 'loans.id = description.id');
        $this->db->where('loans.id', $loan_id);
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_descriptions_by_loan($loan_id) {
        // $this->db->where('id', $loan_id);
        $query = $this->db->get('description');
        return $query->result_array();
    }
    
    // public function get_descriptions_by_loan($loan_id) {
    //     $this->db->select('id');
    //     $this->db->from('description'); // Assuming a junction table named `loan_description`
    //     // $this->db->where('id', $loan_id);
    //     $query = $this->db->get();
    //     return $query->result_array();
    // }

    // Method to delete existing mappings for a loan
    public function delete_mappings($loan_id) {
        $this->db->where('loan_id', $loan_id);
        $this->db->delete('loan_map');
    }

    // Method to add a new mapping
    public function add_mapping($loan_id, $description_id) {
        $data = array(
            'loan_id' => $loan_id,
            'description_id' => $description_id
        );
        return $this->db->insert('loan_map', $data);
    }
     // Get descriptions for a selected loan
     public function get_descriptions_by_loans($loan_id) {
        $this->db->select('description.id, description.description_text');
        $this->db->from('loan_map');
        $this->db->join('description', 'loan_map.description_id = description.id');
        $this->db->where('loan_map.loan_id', $loan_id);
        $query = $this->db->get();
        return $query->result_array();
    }

    // public function get_descriptions_by_loan($loan_id) {
    //     $this->db->select('description.id, description.description_text');
    //     $this->db->from('loan_map');
    //     $this->db->join('description', 'loan_map.description_id = description.id');
    //     $this->db->where('loan_map.loan_id', $loan_id);
    //     $query = $this->db->get();
        
    //     $result = $query->result_array();
        
    //     // Debugging
    //     log_message('debug', 'Descriptions result: ' . print_r($result, true));
        
    //     return $result;
    // }
    public function insert_loan_maps($data) {
        return $this->db->insert_batch('loan_map', $data);
    }
    public function insert_loan_map($data) {
        return $this->db->insert('loan_map', $data);
    }
    public function get_loan_descriptions($loan_id) {
        $this->db->where('loan_id', $loan_id);
        $query = $this->db->get('description');
        return $query->result_array();
    }
    public function get_description_ids_by_loan($loan_id) {
        $this->db->select('description_id');
        $this->db->where('loan_id', $loan_id);
        $query = $this->db->get('loan_map');
        $result = $query->result_array();
        return array_column($result, 'description_id'); // Return an array of description IDs
    }
    public function get_all_loan_maps() {
        $this->db->select('loan_map.*, loans.loan as loan_name, description.description_text');
        $this->db->from('loan_map');
        $this->db->join('loans', 'loans.id = loan_map.loan_id');
        $this->db->join('description', 'description.id = loan_map.description_id');
        $query = $this->db->get();
        return $query->result_array();
    }

    // Method to get description IDs for a specific loan ID
    public function get_description_ids($loan_id) {
        // Sanitize input
        $loan_id = intval($loan_id);

        // Get all description IDs for the given loan ID
        $this->db->select('description_id');
        $this->db->from('loan_map');
        $this->db->where('loan_id', $loan_id);
        $query = $this->db->get();

        // Extract description IDs and combine them into a single string
        $description_ids = array();
        foreach ($query->result_array() as $row) {
            $description_ids[] = $row['description_id'];
        }

        // Combine description IDs into a comma-separated string
        return implode(',', $description_ids);
    }

    //get data for product group
    public function insert_product_group() {
        return $this->db->get('product_groups');
    }

    // Fetch the names based on IDs
    public function get_names_from_ids($product_id, $bank_id, $loan_type_ids) {
        $this->load->model('Product_model');
        $this->load->model('Bank_model');
        $this->load->model('Loan_types_model');

        // Fetch names
        $product_name = $this->Product_model->get_product_name($product_id);
        $bank_name = $this->Bank_model->get_bank_name($bank_id);
        $loan_type_names = $this->Loan_types_model->get_loan_type_names($loan_type_ids);

        return [
            'product_name' => $product_name,
            'bank_name' => $bank_name,
            'loanType_name' => implode(', ', $loan_type_names)
        ];
    }
    public function get_product_name($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('products');
        $result = $query->row_array();
        return $result ? $result['product_name'] : '';
    }
    public function insert_product_groups($data) {
        return $this->db->insert_batch('product_groups', $data);
    }

    public function get_product_groups_with_banks() {
        // Select columns from product_group and join with banks table
        $this->db->select('pg.*, b.bank_name');
        $this->db->from('product_groups pg');
        $this->db->join('banks b', 'pg.bank_id = b.id', 'right'); // Assuming bank_name is the key
        $query = $this->db->get();
        
        // Return result as an array of associative arrays
        return $query->result_array();
    }

    public function get_product_group_with_names() {
        $this->db->select('pg.*, p.product_name AS product_name, b.bank_name AS bank_name, l.loanType_name AS loan_type_name');
        $this->db->from('product_groups pg');
        $this->db->join('products p', 'pg.product_name = p.product_name', 'left');
        $this->db->join('banks b', 'pg.bank_name = b.bank_name', 'left');
        $this->db->join('kind_of_loan_type l', 'pg.loanType_name = l.loanType_name', 'left');
        $query = $this->db->get();
        return $query->result_array();
    }
    public function get_product_groups() {
        $this->db->where('product_id');
        $query = $this->db->get('product_groups');
        $result = $query->row_array();
        return $result ? $result['product_id'] : '';
    }
    // Insert data into product_group table
    public function insert($data) {
        $this->db->insert('product_groups', $data);
    }

    // Fetch product_group data with associated names
    public function get_all_with_names() {
        $this->db->select('product_group.*, banks.bank_name as bank_name, kind_of_loan_type.loanType_name as loan_type_name');
        $this->db->from('product_groups');
        $this->db->join('banks', 'product_group.bank_id = banks.id');
        // $this->db->join('products', 'product_group.product_id = products.id');
        $this->db->join('kind_of_loan_type', 'product_group.loan_type_id = kind_of_loan_type.id');
        // $this->db->order_by('banks.bank_name', 'ASC');
        // $this->db->order_by('kind_of_loan_type.loanType_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
// to get group data for loan type
    public function get_all_with_names1() {
        $this->db->select('DISTINCT product_groups.*, banks.name as bank_name, products.name as product_name, loan_types.name as loan_type_name');
        $this->db->from('product_groups');
        $this->db->join('banks', 'product_group.bank_id = banks.id');
        $this->db->join('products', 'product_groups.product_id = products.id');
        $this->db->join('loan_types', 'product_groups.loan_type_id = loan_types.id');
        $this->db->order_by('banks.name', 'ASC');
        $this->db->order_by('loan_types.name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_loan_types_with_banks() {
        $this->db->select('kind_of_loan_type.loanType_name as loan_type_name, banks.bank_name as bank_name');
        $this->db->from('product_groups');
        $this->db->join('kind_of_loan_type', 'product_groups.loan_type_id = kind_of_loan_type.id');
        $this->db->join('banks', 'product_groups.bank_id = banks.id');
        $this->db->order_by('kind_of_loan_type.loanType_name', 'ASC');
        $this->db->order_by('banks.bank_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_loan_types_with_banks1() {
        $this->db->select('products.product_name as product_name, banks.bank_name as bank_name');
        $this->db->from('product_groups');
        $this->db->join('products', 'product_groups.product_id = products.id');
        $this->db->join('banks', 'product_groups.bank_id = banks.id');
        $this->db->join('products', 'product_groups.product_id = products.id'); // Join products table
        $this->db->order_by('products.product_name', 'ASC');
        $this->db->order_by('banks.bank_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_product_group($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('product_groups');
        return $query->row_array();
    }
    // Get selected banks for a product group
    public function get_selected_banks($product_group_id) {
        $this->db->select('bank_id');
        $this->db->where('id', $product_group_id);
        $query = $this->db->get('product_groups');
        $result = $query->row_array();
        return explode(',', $result['bank_id']); // Assuming comma-separated values
    }

     // Get selected loan types for a product group
     public function get_selected_loan_types($product_group_id) {
        $this->db->select('loan_type_id');
        $this->db->where('id', $product_group_id);
        $query = $this->db->get('product_groups');
        $result = $query->row_array();
        return explode(',', $result['loan_type_id']); // Assuming comma-separated values
    }
    //add eligibility
    public function insert_eligibility($data) {
        $this->db->insert('eligibility', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }

    //get eligibility
    public function get_all_eligibility() {
        $query = $this->db->get('eligibility');
        return $query->result_array();
    }
    //add quantum of loan
    public function insert_quantum_of_loan($data) {
        $this->db->insert('quantum_of_loan', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }

    //get eligibility
    public function get_all_quantum_of_loan() {
        $query = $this->db->get('quantum_of_loan');
        return $query->result_array();
    }
    //add quantum of contributor
    public function insert_contributor($data) {
        $this->db->insert('contribution', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }

    //get eligibility
    public function get_all_contributor() {
        $query = $this->db->get('contribution');
        return $query->result_array();
    }
    //add repayment period
    public function insert_repayment_period($data) {
        $this->db->insert('repayment_period', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }

    //get eligibility
    public function get_all_repayment_period() {
        $query = $this->db->get('repayment_period');
        return $query->result_array();
    }
    //add pricing
    public function insert_pricing($data) {
        $this->db->insert('pricing', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }

    //get eligibility
    public function get_all_pricing() {
        $query = $this->db->get('pricing');
        return $query->result_array();
    }
    //add processing fees
    public function insert_processing_fees($data) {
        $this->db->insert('processing_fees', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }

    //get eligibility
    public function get_all_processing_fees() {
        $query = $this->db->get('processing_fees');
        return $query->result_array();
    }
    //add primary security
    public function insert_primary_security($data) {
        $this->db->insert('primary_security', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }

    //get eligibility
    public function get_all_primary_security() {
        $query = $this->db->get('primary_security');
        return $query->result_array();
    }
    //add collectural security
    public function insert_collectural_security($data) {
        $this->db->insert('colletural_security', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }

    //get Collectural security
    public function get_all_collectural_security() {
        $query = $this->db->get('colletural_security');
        return $query->result_array();
    }
    public function get_all_colletural_security() {
        $query = $this->db->get('colletural_security');
        return $query->result_array();
    }
    //add gurantees
    public function insert_gurantees($data) {
        $this->db->insert('gurantees', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }

    //get eligibility
    public function get_all_gurantees() {
        $query = $this->db->get('gurantees');
        return $query->result_array();
    }
    //add T&C
    public function insert_terms_condition($data) {
        $this->db->insert('terms_conditions', $data);
        return $this->db->insert_id(); // Return the ID of the newly inserted bank
    }

    //get eligibility
    public function get_all_terms_condition() {
        $query = $this->db->get('terms_conditions');
        return $query->result_array();
    }
    public function get_eligibility_by_id($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('eligibility'); 
        return $query->row_array(); // Return a single row as an associative array
    }
    public function get_eligibility_options() {
        $query = $this->db->get('eligibility');
        return $query->result_array();
    }
    public function get_selected_eligibility($product_group_id) {
        $this->db->select('id');
        $this->db->where('id', $product_group_id);
        $query = $this->db->get('eligibility');
        $result = $query->row_array();
        return explode(',', $result['id']); // Assuming comma-separated values
    }
    
    public function get_all_terms_ids() {
        $this->db->select('id'); // Select only the 'id' column
        $query = $this->db->get('terms_conditions');
        return array_column($query->result_array(), 'id'); // Return an array of IDs
    }
    public function insertD($data) {
        if (is_array($data) && !empty($data)) {
            $this->db->insert('product_groups', $data);
        } else {
            // Handle unexpected data format
            log_message('error', 'Invalid data format for insertion into product_groups table.');
        }
    }
    public function get_eligibility_group() {
        $this->db->select('id'); // Select only the 'id' column
        $query = $this->db->get('eligibility');
        return array_column($query->result_array(), 'id'); // Return an array of IDs
    }

    public function update_product_group($id, $data) {
        $this->db->where('id', $id);
        $this->db->update('product_groups', $data);
    }
    public function update_selected_products($id, $selected_products) {
        // Remove old selections
        $this->db->where('product_id', $id);
        $this->db->delete('product_groups');
        
        // Insert new selections
        foreach ($selected_products as $product_id) {
            $this->db->insert('product_groups', array(
                'id' => $id,
                'product_id' => $product_id
            ));
        }
    }
    // Update methods for multi-select values
    public function update_selected_eligibility($id, $selected_eligibility) {
        $this->db->where('product_id', $id);
        $this->db->delete('eligibility');
        
        foreach ($selected_eligibility as $eligibility_id) {
            $this->db->insert('eligibility', array(
                'id' => $id,
                'id' => $eligibility_id
            ));
        }
    }
    public function gets_product_group($id) {
        $this->db->where('id', $id);
        $query = $this->db->get('product_groups');
        $result = $query->row_array();
        
        // Convert comma-separated string back to array
        $result['eligibility'] = explode(',', $result['eligibility']);
        
        return $result;
    }
    public function inserts_product_groups($data) {
        $this->db->insert('product_groups', $data);
        // return $this->db->insert_id(); // Return the ID of the newly inserted record
    }
    public function insertData($data) {
        $this->db->insert('product_groups', $data);
    }

    // Method to retrieve eligibility data (for example purpose)
    public function get_eligibility_groups() {
        // Retrieve and return eligibility data
        // This is just a placeholder. Adjust the query as needed.
        $query = $this->db->get('eligibility');
        return $query->result_array(); // Return data as an array
    }

    public function insert_batch($data) {
        return $this->db->insert_batch('product_groups', $data);
    }

    public function get_enquiry($id)
    {
        $this->db->select('*');
        $this->db->from('tbl_entries');
        $this->db->where('id', $id);
        $query = $this->db->get();
        return $query->row();
    }
    public function get_products_with_banks() {
        $this->db->select('products.product_name as product_name, product_id as product_id, banks.bank_name as bank_name');
        $this->db->from('product_groups');
        $this->db->join('products', 'product_groups.product_id = products.id');
        $this->db->join('banks', 'product_groups.bank_id = banks.id');
        $this->db->group_by('products.product_name', 'ASC');   //used group_by to remove duplicate entries
        $this->db->group_by('banks.bank_name', 'ASC');         //used group_by to remove duplicate entries
        $query = $this->db->get();
        return $query->result();
    }
    public function get_all_products_names() {
        $this->db->select('product_groups.*, products.product_name as product_name, banks.bank_name as bank_name, kind_of_loan_type.loanType_name as loan_type_name');
        $this->db->from('product_groups');
        $this->db->join('banks', 'product_groups.bank_id = banks.id');
        $this->db->join('products', 'product_groups.product_id = products.id');
        $this->db->join('kind_of_loan_type', 'product_groups.loan_type_id = kind_of_loan_type.id');
        // $this->db->order_by('banks.bank_name', 'ASC');
        // $this->db->order_by('kind_of_loan_type.loanType_name', 'ASC');
        $query = $this->db->get();
        return $query->result();
    }
    public function get_loanType_with_bank($product_id) {
        // Ensure that the product_id filter is applied
        $this->db->where('product_groups.product_id', $product_id);
    
        // Select relevant columns from each table
        $this->db->select('product_groups.product_id as product_id, 
                           product_groups.bank_id, 
                           banks.bank_name as bank_name, 
                           kind_of_loan_type.loanType_name as loanType_name, 
                           kind_of_loan_type.id as loan_type_id');
                           
        // Define the main table for the query
        $this->db->from('product_groups');
    
        // Join with banks table to get bank names
        $this->db->join('banks', 'product_groups.bank_id = banks.id');
    
        // Join with kind_of_loan_type to get loan type names
        $this->db->join('kind_of_loan_type', 'product_groups.loan_type_id = kind_of_loan_type.id');
    
        // Optionally group by id if needed to remove duplicates or for specific aggregations
        // If grouping isn't needed, you can omit this line
        // Use DISTINCT to ensure unique loanType_name entries
        $this->db->distinct();
        $this->db->group_by('product_groups.id, kind_of_loan_type.id');
    
        // Order the results by bank name for better readability
        $this->db->order_by('banks.bank_name', 'ASC');
    
        // Execute the query
        $query = $this->db->get();
    
        // Return the result as an array of objects
        return $query->result();
    }
    public function get_product_groups_by_product_and_bank($product_id, $bank_id) {
        $this->db->select('product_groups.id AS product_group_id, product_groups.loan_type_id, kind_of_loan_type.loanType_name');
        $this->db->from('product_groups');
        $this->db->join('kind_of_loan_type', 'product_groups.loan_type_id = kind_of_loan_type.id');
        $this->db->where('product_groups.product_id', $product_id);
        $this->db->where('product_groups.bank_id', $bank_id);
        $query = $this->db->get();
        return $query->result_array(); // Return array of records with 'product_group_id', 'loan_type_id', and 'loanType_name'
    }
    public function get_selected_eligibility_types($product_group_id) {
        $this->db->select('eligibility_id');
        $this->db->where('id', $product_group_id);
        $query = $this->db->get('product_groups');
        $result = $query->row_array();
        return explode(',', $result['eligibility_id']); // Assuming comma-separated values
    }
    public function get_selected_primary_security($product_group_id) {
        $this->db->select('primary_security');
        $this->db->where('id', $product_group_id);
        $query = $this->db->get('product_groups');
        $result = $query->row_array();
        return explode(',', $result['primary_security']); // Assuming comma-separated values
    }
    public function get_selected_colletural_security($product_group_id) {
        $this->db->select('colletural_security');
        $this->db->where('id', $product_group_id);
        $query = $this->db->get('product_groups');
        $result = $query->row_array();
        return explode(',', $result['colletural_security']); // Assuming comma-separated values
    }
    public function get_selected_gurantees($product_group_id) {
        $this->db->select('gurantees');
        $this->db->where('id', $product_group_id);
        $query = $this->db->get('product_groups');
        $result = $query->row_array();
        return explode(',', $result['gurantees']); // Assuming comma-separated values
    }
    public function get_selected_terms($product_group_id) {
        $this->db->select('title');
        $this->db->where('id', $product_group_id);
        $query = $this->db->get('product_groups');
        $result = $query->row_array();
        return explode(',', $result['title']); // Assuming comma-separated values
    }
    public function update($id, $data) {
        if (empty($id) || empty($data)) {
            return false;
        }
    
        $this->db->where('id', $id);
        return $this->db->update('product_groups', $data);
    }
    
}
