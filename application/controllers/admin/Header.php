<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Header extends CI_Controller {

    public function __construct() {
        parent::__construct();
        // Load necessary libraries and models
        $this->load->library('form_validation');
        $this->load->helper('form', 'url');
        $this->load->model('Manage_feed_model');
        $this->load->model('Bank_model');
        $this->load->model('Loan_types_model');
        $this->load->model('Product_model');
        $this->load->database(); 
    }

    public function index() {
        // Display initial form (Step 1)
        $this->load->view('layout');
        // $this->load->view('modalForm');
    }
    public function project() {
        // Display initial form (Step 1)
        $this->load->view('rk_project');
        // $this->load->view('modalForm');
    }

    //to show front-end on new URL
    public function page() {
        // Fetch business natures
        $data['business_natures'] = $this->Manage_feed_model->get_business_natures();
        $data['sectors'] = $this->Manage_feed_model->get_sectors();
        $data['turnover_options'] = $this->Manage_feed_model->get_turnover();
        $data['funding_purposes'] = $this->Manage_feed_model->get_funding_purposes();
        $data['loan_types'] = $this->Manage_feed_model->get_loan_types();
        
        // Load the view and pass the data
        $this->load->view('includes/header');
        $this->load->view('template', $data);
        $this->load->view('includes/footer');
    }
    
    public function save_form() {
        $this->load->library('form_validation');
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('c_name', 'Company Name', 'required');
        $this->form_validation->set_rules('nature_of_business', 'Nature of Business', 'required');
        $this->form_validation->set_rules('sector', 'Sector', 'required');
        $this->form_validation->set_rules('estimatedTurnover', 'Estimated Turnover', 'required');
        $this->form_validation->set_rules('fundingPurpose', 'Funding Purpose', 'required');
        $this->form_validation->set_rules('loanType', 'Loan Type', 'required');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('pnumber', 'Phone Number', 'required');
        $this->form_validation->set_rules('advisory_needed', 'Advisory Needed', 'required');

        $loan_type_id = $this->input->post('loanType');
        
        if ($this->form_validation->run() == FALSE) {
            // Validation failed
            $data['message'] = 'Form submission failed. Please check your input.';
            $this->load->view('template', $data);
        } else {
            // Validation succeeded
            // Fetch names for dropdown IDs
            $nature_name = $this->Manage_feed_model->get_name_by_id('business_natures', $this->input->post('nature_of_business'));
            $sector_name = $this->Manage_feed_model->get_name_by_id('sectors', $this->input->post('sector'));
            $turnover_name = $this->Manage_feed_model->get_name_by_id('turnover_options', $this->input->post('estimatedTurnover'));
            $funding_purpose_name = $this->Manage_feed_model->get_name_by_id('funding_purposes', $this->input->post('fundingPurpose'));
            $loan_type_name = $this->Manage_feed_model->get_loanType_by_id('kind_of_loan_type', $this->input->post('loanType'));
            
            // Prepare data for insertion
            $data = array(
                'name' => $this->input->post('name'),
                'c_name' => $this->input->post('c_name'),
                'nature_of_business' => $nature_name, // Use name instead of ID
                'sector' => $sector_name,             // Use name instead of ID
                'estimatedTurnover' => $turnover_name, // Use name instead of ID
                'fundingPurpose' => $funding_purpose_name, // Use name instead of ID
                'loanType' => $loan_type_name,          // Use name instead of ID
                'email' => $this->input->post('email'),
                'pnumber' => $this->input->post('pnumber'),
                'advisory_needed' => $this->input->post('advisory_needed')
            );
            
            $query = $this->db->insert('tbl_entries', $data);
            if ($loan_type_id) {
                // Generate the redirect URL based on the loan_type_id
                $redirect_url = base_url('admin/header/show_products_by_loan_type/' . $loan_type_id);
                
                // Return JSON response
                echo json_encode(['redirect_url' => $redirect_url]);
            } else {
                // Handle case where loan_type_id is missing
                echo json_encode(['error' => 'Loan Type ID not found']);
            }
        }
    }

    public function show_products_by_loan_type($loan_type_id) {
        $this->load->model('Manage_feed_model');
        $products = $this->Manage_feed_model->get_product_by_loan_type($loan_type_id);
    
        $data['products'] = $products;
        $data['loanType'] = $loan_type_id; // Optional: pass the loan type to the view
        // echo '<pre>';
        // print_r($data['loanType']);die('12');
       
        $this->load->view('includes/header');
        // $this->load->view('view_product_by_loan_type', $data);
        $this->load->view('view_product_group_by_loan_type', $data);
        $this->load->view('includes/footer');
    }
    
    public function add_user($username, $password) {
        $data = array(
            'username' => $username,
            'password' => password_hash($password, PASSWORD_BCRYPT) // Hashing the password
        );
        return $this->db->insert('users', $data);
    }
    

    public function viewBank() {
        $data['banks'] = $this->Bank_model->get_banks();
        $this->load->view('admin/include/header');
        $this->load->view('admin/Manage_bank/bankdetails', $data);
        $this->load->view('admin/include/footer');

    }

    //to add bank for admin

    public function addBanks() {
        $this->load->view('admin/include/header');
        $this->load->view('admin/Manage_bank/bankform');
        $this->load->view('admin/include/footer');
    }
    public function store() {
            // Load the model
        $this->load->model('Bank_model');
        
            // Collect the form data
        $data = array(
            'bank_name'    => $this->input->post('bank_name'),
            'bank_url'    => $this->input->post('bank_url'),
        );
        
            // Check if 'name' is empty
        if (empty($data['bank_name'])) {
                // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Bank Name cannot be empty');
            redirect('admin/header/create');
            return;
        }
        
            // Insert the data into the database
        $query = $this->Bank_model->insert_bank($data);
              if($query>0) {
                // values are saved in session to display the message.
                $this->session->set_flashdata('message','<div class="alert alert-success text-center">Data Inserted successfully.</div>');
              } 
              else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Some error occurred.</div>');
              }
        
            // Redirect to the list page
        redirect('admin/header/viewBank');
    }
    public function editBank($id) {
        $data['bank'] = $this->Bank_model->get_bank_by_id($id);
        $this->load->view('admin/include/header');
        $this->load->view('admin/Manage_bank/edit_bank', $data);
        $this->load->view('admin/include/footer');
    }
    public function update_Bank($id) {
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');
        $this->form_validation->set_rules('bank_url', 'Bank URL', 'required');

        if ($this->form_validation->run() == FALSE) {
            // $id = $this->input->post('id');
            $data['bank_name'] = $this->Bank_model->get_bank_by_id($id);
            $this->load->view('admin/Manage_bank/edit_bank', $data);
        } else {
            // $id = $this->input->post('id');
            $data['bank_name'] = $this->input->post('bank_name');
            $data['bank_url'] = $this->input->post('bank_url');

            if ($this->Bank_model->update_bank($id, $data)) {
                $this->session->set_flashdata('message', 'Bank name updated successfully.');
            } else {
                $this->session->set_flashdata('message', 'Failed to update Bank name.');
            }
            $query = $this->Bank_model->update_bank($id, $data);

              if($query>0) {
                // values are saved in session to display the message.
                $this->session->set_flashdata('message','<div class="alert alert-success text-center">Data Updated successfully.</div>');
              } 
              else {
                $this->session->set_flashdata('message', '<div class="alert alert-danger text-center">Some error occurred.</div>');
              }
            redirect('admin/header/viewBank');
        }
    }
    //change bank status
    public function change_bank_status($id, $status) {
        // Ensure the status is either 'inactive' or 'active'
        $status = ($status == 'inactive') ? 'inactive' : 'active';

        $success = $this->Bank_model->update_bank_status($id, $status);
        if ($success) {
            $this->session->set_flashdata('message', 'Status updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update status.');
        }

        redirect('admin/header/viewBank'); // Redirect to the list of banks
    }
    
    //to add description for admin

    public function addLoanType() 
    {
        $this->load->view('admin/include/header');
        $this->load->view('admin/loan_type/addLoantype');
        $this->load->view('admin/include/footer');
    }

    public function editLoanType($id) {
        $data['loanType'] = $this->Loan_types_model->get_loanType_by_id($id);
        $this->load->view('admin/include/header');
        $this->load->view('admin/loan_type/edit_loan_type', $data);
        $this->load->view('admin/include/footer');
    }

    public function storeLoanType() {
            // Load the model
        $this->load->model('Loan_types_model');
        
            // Collect the form data
        $data = array(
            'loanType_name' => $this->input->post('loanType_name'),
        );
        
            // Check if 'name' is empty
        if (empty($data['loanType_name'])) {
                // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'LoanType  cannot be empty');
            redirect('header/createLoanType');
            return;
        }
        
            // Insert the data into the database
        $this->Loan_types_model->insert_loan_type($data);
        
            // Redirect to the list page
        redirect('header/loanTypeData');
    }
    public function loanTypeData() {
        $data['loanType'] = $this->Loan_types_model->get_all_loan_types();
            // echo"<pre>";print_r($data);die('12');
            // $this->load->view('loan_type/loan_type_view', $data);
            // $this->load->view('menu_sidebar\materialDashboard\examples\tables\loan_type_view', $data);
            // $this->load->view('menu_sidebar\materialDashboard\examples\header');

        $this->load->view('admin/include/header');
        $this->load->view('admin/loan_type/loan_type_view', $data);
        $this->load->view('admin/include/footer');
    }

        //to add description for admin

    public function addDescription() {
            // $this->load->view('bank/desc_form');
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_description');
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function storeDescription() {
            // Load the model
        $this->load->model('Bank_model');
        
            // Collect the form data
        $data = array(
            'description_text'=> $this->input->post('description_text'),
        );
        
            // Check if 'name' is empty
        if (empty($data['description_text'])) {
                // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Description  cannot be empty');
            redirect('header/addDescription');
            return;
        }
        
            // Insert the data into the database
        $this->Bank_model->insert_description($data);
        
            // Redirect to the list page
        redirect('header/viewDescription');
    }
    public function viewDescription() {
        $data['description'] = $this->Bank_model->get_description();
            // echo"<pre>";print_r($data);die('12');
            // $this->load->view('bank/description', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\description_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }

        //to add products
    public function addProduct() {
        $this->load->view('admin/include/header');
        $this->load->view('admin/product//add_product');
        $this->load->view('admin/include/footer');
    }

    public function storeProduct() {
            // Load the model
        $this->load->model('Bank_model');
        
            // Collect the form data
        $data = array(
            'product_name'=> $this->input->post('product_name'),
        );
        
            // Check if 'name' is empty
        if (empty($data['product_name'])) {
                // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Product  cannot be empty');
            redirect('admin/header/addProduct');
            return;
        }
        
            // Insert the data into the database
        $this->Bank_model->insert_product($data);
        
            // Redirect to the list page
        redirect('admin/header/viewProduct');
    }

    public function viewProduct() {
        $data['product'] = $this->Bank_model->get_products();
        $this->load->view('admin/include/header');
        $this->load->view('admin/product/product_view', $data);
        $this->load->view('admin/include/footer');
    }
    public function editProduct($id) {
        $data['product'] = $this->Bank_model->get_product_by_id($id);
        $this->load->view('admin/include/header');
        $this->load->view('admin/product/edit_product', $data);
        $this->load->view('admin/include/footer');
    }
    public function updateProduct() {
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            $data['product_name'] = $this->Bank_model->get_product_by_id($id);
            $this->load->view('edit_product', $data);
        } else {
            $id = $this->input->post('id');
            $product_name = $this->input->post('product_name');

            if ($this->Bank_model->update_product($id, $product_name)) {
                $this->session->set_flashdata('success', 'Product name updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update Product name.');
            }
            redirect('admin/header/viewProduct');
        }
    }

        //add loan
    public function addLoan() {
            // $this->load->view('loan_type/addLoanForm');
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_loan');
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }

    public function updateLoanType() {
        $this->form_validation->set_rules('loanType_name', 'Loan Type', 'required');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            $data['loanType_name'] = $this->Loan_types_model->get_loanType_by_id($id);
            $this->load->view('edit_loanType', $data);
        } else {
            $id = $this->input->post('id');
            $loanType_name = $this->input->post('loanType_name');

            if ($this->Loan_types_model->update_loanType($id, $loanType_name)) {
                $this->session->set_flashdata('success', 'Bank name updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update Bank name.');
            }
            redirect('admin/header/loanTypeData');
        }
    }
    //change loan type status
    public function change_loanType_status($id, $status) {
        // Ensure the status is either 'inactive' or 'active'
        $status = ($status == 'inactive') ? 'inactive' : 'active';

        $success = $this->Loan_types_model->update_loanType_status($id, $status);
        if ($success) {
            $this->session->set_flashdata('message', 'Status updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update status.');
        }

        redirect('admin/header/loanTypeData'); // Redirect to the list of banks
    }
    public function storeLoan() {
            // Load the model
        $this->load->model('Loan_types_model');
        
            // Collect the form data
        $data = array(
            'loan'            => $this->input->post('loan'),
        );
            // print_r($data);die('11');
        
            // Check if 'loan' is empty
        if (empty($data['loan'])) {
                // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Loan cannot be empty');
            redirect('header/addLoan');
            return;
        }
        
            // Insert the data into the database
        $this->Loan_types_model->insert_loan($data);
        
            // Redirect to the list page
        redirect('header/viewLoan');
    }
    public function viewLoan() {
        $data['loan'] = $this->Loan_types_model->get_loans();
            // echo"<pre>";print_r($data);die('12');
            // $this->load->view('loan_type/loans', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\loan_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }

    public function addPurpose() {
        $this->load->view('admin/include/header');
        $this->load->view('admin/purpose/add_purpose',);
        $this->load->view('admin/include/footer');
    }

    public function storePurpose() {
            // Load the model
        $this->load->model('Loan_types_model');
        
            // Collect the form data
        $data = array(
            'loan_purpose'=> $this->input->post('loan_purpose'),
        );
        
            // Check if 'name' is empty
        if (empty($data['loan_purpose'])) {
                // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Purpose  cannot be empty');
            redirect('admin/header/addPurpose');
            return;
        }
        
            // Insert the data into the database
        $this->Loan_types_model->insert_purpose($data);
        
            // Redirect to the list page
        redirect('admin/header/viewPurpose');
    }

    public function viewPurpose() {
        $data['loan_purpose'] = $this->Loan_types_model->get_loan_purpose();
        $this->load->view('admin/include/header');
        $this->load->view('admin/purpose/purpose_view', $data);
        $this->load->view('admin/include/footer');
    }

    public function editPurpose($id) {
        $data['purpose'] = $this->Bank_model->get_purpose_by_id($id);
        $this->load->view('admin/include/header');
        $this->load->view('admin/purpose/edit_purpose', $data);
        $this->load->view('admin/include/footer');
    }
    public function updatePurpose() {
        $this->form_validation->set_rules('loan_purpose', 'Loan Purpose', 'required');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            $data['loan_purpose'] = $this->Bank_model->get_purpose_by_id($id);
            $this->load->view('admin/purpose/edit_purpose', $data);
        } else {
            $id = $this->input->post('id');
            $loan_purpose = $this->input->post('loan_purpose');

            if ($this->Bank_model->update_purpose($id, $loan_purpose)) {
                $this->session->set_flashdata('success', 'Purpose name updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update Purpose name.');
            }
            redirect('admin/header/viewPurpose');
        }
    }
    //change status
    public function change_purpose_status($id, $status) {
        // Ensure the status is either 'inactive' or 'active'
        $status = ($status == 'inactive') ? 'inactive' : 'active';

        $success = $this->Bank_model->update_purpose_status($id, $status);
        if ($success) {
            $this->session->set_flashdata('message', 'Status updated successfully!');
        } else {
            $this->session->set_flashdata('error', 'Failed to update status.');
        }

        redirect('admin/header/viewPurpose'); // Redirect to the list of loan types
    }
    
    public function get_loan_types() {
        $bank_id = $this->input->post('id');
        $loan_types = $this->Loan_types_model->get_loan_types_by_bank($bank_id);
        echo json_encode($loan_types);
    }
    public function get_loan_groups() {
        $bank_id = $this->input->post('bank_id');
        $loan_groups = $this->Loan_type_model->get_loan_groups_by_bank($bank_id);
        echo json_encode($loan_groups);
    }
    public function submitBanks() {
        $this->form_validation->set_rules('loan_id', 'Loan ID', 'required');
        $this->form_validation->set_rules('description_ids[]', 'Description IDs', 'required');

        if ($this->form_validation->run() == FALSE) {
            $this->index();
        } else {
            $loan_id = $this->input->post('loan_id');
            $description_ids = $this->input->post('description_ids');
            $data = array();
            foreach ($description_ids as $description_id) {
                $data[] = array(
                    'loan_id' => $loan_id,
                    'description_id' => $description_id,
                );
            }
            if ($this->Product_model->insert_loan_maps($data)) {
                $this->session->set_flashdata('success', 'Loan details submitted successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to submit loan details.');
            }
            redirect('header/mapData');
        }
    }

    public function update_Bankstatus($id, $status) {
        $new_status = $status === 'active' ? 'inactive' : 'active';
        $this->Bank_model->update_status($id, $new_status);
        redirect('header/viewBank');
    }
    
    public function manage_product_group() {

        $data['loanType'] = $this->Loan_types_model->get_all_loan_types();
        $loanTypes = $this->db->select('*')->from('kind_of_loan_type')->get()->result_array();
        // echo"<pre>";print_r($loanTypes);die('12');
        // $data['product_groups'] = $this->Product_model->get_all_with_names();
        $data['loan_types_with_banks'] = $this->Product_model->get_loan_types_with_banks();
        $data['products_with_banks'] = $this->Product_model->get_products_with_banks();
        // $data['product_group'] = $this->Product_model->insert_product_group();
        $data['product_groups'] = $this->Product_model->get_product_groups();
        $data['product'] = $this->Bank_model->get_product_id();
        $data['map_product'] = $this->Product_model->get_all_products_names();
        // echo"<pre>";print_r($data['products_with_banks']);die('12');

        $this->load->view('admin/include/header');
        $this->load->view('admin/manage_product_group/manage_product_group', $data);
        $this->load->view('admin/include/footer');
        // $this->load->view('map_data', $data);
    }

    public function add_product_group() {
        
        $data['product'] = $this->Bank_model->get_products();
        $data['banks'] = $this->Bank_model->get_banks();
        $data['loanType'] = $this->Loan_types_model->get_all_loan_types();
        $data['eligibility'] = $this->Product_model->get_all_eligibility();
        $data['primary_security'] = $this->Product_model->get_all_primary_security();
        $data['colletural_security'] = $this->Product_model->get_all_colletural_security();
        $data['gurantees'] = $this->Product_model->get_all_gurantees();
        $data['title'] = $this->Product_model->get_all_terms_condition();
        // echo"<pre>";print_r($data['eligibility']);die('12');
        $data['selected_terms'] = $this->Product_model->get_all_terms_ids();

        $this->load->view('admin/manage_product_group/product_group', $data);
    }
    public function submit_product_group() {
        // Load form helper
        $this->load->helper('url');
    
        // Retrieve form data
        $bank_id = $this->input->post('bank_name');
        $product_id = $this->input->post('product_name');
        $loan_type_ids = $this->input->post('loanType_name'); // Array of loan type IDs
        $eligibility_ids = $this->input->post('eligibility'); // Array of eligibility IDs
        $primary_security_ids = $this->input->post('primary_security'); // Array of primary security IDs
        $colletural_security_ids = $this->input->post('colletural_security'); // Array of colletural security IDs
        $gurantees_ids = $this->input->post('gurantees'); // Array of guarantees IDs
        $terms_ids = $this->input->post('title'); // Array of terms IDs
    
        // Retrieve and convert quantum_of_loan values
        $min_amount = $this->input->post('min_amount');
        $min_unit = $this->input->post('min_unit');
        $max_amount = $this->input->post('max_amount');
        $max_unit = $this->input->post('max_unit');
    
        // Create JSON object for quantum_of_loan
        $quantum_of_loan = json_encode([
            'min' => [
                'amount' => $min_amount,
                'unit' => $min_unit
            ],
            'max' => [
                'amount' => $max_amount,
                'unit' => $max_unit
            ]
        ]);
    
        // Retrieve and process repayment_period values
        $repayment_periods = $this->input->post('repayment_period'); // This should be an array if you are allowing multiple periods
        // $repayment_periods = json_decode($product_group_data['repayment_period'], true);
        // Validate form data
        if (empty($loan_type_ids) || empty($eligibility_ids) || empty($primary_security_ids) ||
            empty($colletural_security_ids) || empty($gurantees_ids) || empty($terms_ids) || empty($repayment_periods)) {
            $this->session->set_flashdata('error', 'All required fields must be filled out.');
            redirect('admin/header/add_product_group');
        }
    
        // Convert arrays to comma-separated strings
        $eligibility_ids_str = implode(',', $eligibility_ids);
        $loan_type_ids_str = implode(',', $loan_type_ids);
        $primary_security_ids_str = implode(',', $primary_security_ids);
        $colletural_security_ids_str = implode(',', $colletural_security_ids);
        $gurantees_ids_str = implode(',', $gurantees_ids);
        $terms_ids_str = implode(',', $terms_ids);
    
        // Prepare data to be inserted
        $data = array(
            'bank_id' => $bank_id,
            'product_id' => $product_id,
            'loan_type_id' => $loan_type_ids_str,
            'eligibility_id' => $eligibility_ids_str, // Store comma-separated values
            'quantum_of_loan' => $quantum_of_loan,
            'borrower_margin' => $this->input->post('borrower_margin'),
            'repayment_period' => json_encode($repayment_periods), // Store repayment periods as JSON
            'roi_pricing' => $this->input->post('roi_pricing'),
            'processing_fees' => $this->input->post('processing_fees'),
            'primary_security' => $primary_security_ids_str,
            'colletural_security' => $colletural_security_ids_str,
            'gurantees' => $gurantees_ids_str,
            'title' => $terms_ids_str
        );
        // echo"<pre>";print_r($data);die('12');
    
        // Insert into database
        $insert_id = $this->Product_model->insert($data);
    
        // Redirect or load a view
        $this->session->set_flashdata('success', 'Product group has been successfully added!');
        redirect('admin/header/manage_product_group');
    }
    
    public function edit_product_group($id) {
        // Load the product group data from the model
        $product_group = $this->Product_model->get_product_group($id);
    
        // Check if product group data exists
        if (empty($product_group)) {
            show_error('No product group found.');
            return;
        }
    
        // Convert repayment_period 
        $product_group['repayment_period'] = json_decode($product_group['repayment_period'], true);
        // Decode the JSON string from quantum_of_loan
        $quantum_of_loan = json_decode($product_group['quantum_of_loan'], true);

        // Convert values for display
            $min_amount_display = $this->convert_from_rupees($quantum_of_loan['min']['amount'], $quantum_of_loan['min']['unit']);
            $max_amount_display = $this->convert_from_rupees($quantum_of_loan['max']['amount'], $quantum_of_loan['max']['unit']);
            // print_r($max_amount_display);die('12');

            
                // Prepare data for view
            $data['product_group'] = $product_group;
            $data['min_amount_display'] = $min_amount_display;
            $data['min_unit'] = $quantum_of_loan['min']['unit'];
            $data['max_amount_display'] = $max_amount_display;
            $data['max_unit'] = $quantum_of_loan['max']['unit'];
    
        // Ensure repayment_period is an array
        if (!isset($data['product_group']['repayment_period']) || !is_array($data['product_group']['repayment_period'])) {
            $data['product_group']['repayment_period'] = [];
        }
    
        // Load dropdown values
        $data['products'] = $this->Bank_model->get_products();
        $data['banks'] = $this->Bank_model->get_banks();
        $data['loan_types'] = $this->Loan_types_model->get_all_loan_types();
        $data['eligibility'] = $this->Product_model->get_all_eligibility();
        $data['primary_security'] = $this->Product_model->get_all_primary_security();
        $data['colletural_security'] = $this->Product_model->get_all_colletural_security();
        $data['gurantees'] = $this->Product_model->get_all_gurantees();
        $data['title'] = $this->Product_model->get_all_terms_condition();
    
        // Fetch selected values
        $data['selected_banks'] = $this->Product_model->get_selected_banks($id);
        $data['selected_loan_types'] = $this->Product_model->get_selected_loan_types($id);
        $data['selected_eligibility'] = $this->Product_model->get_selected_eligibility_types($id);
        $data['selected_primary_security'] = $this->Product_model->get_selected_primary_security($id);
        $data['selected_colletural_security'] = $this->Product_model->get_selected_colletural_security($id);
        $data['selected_gurantees'] = $this->Product_model->get_selected_gurantees($id);
        $data['selected_terms'] = $this->Product_model->get_selected_terms($id);
    
        // Load the edit view with the data
        $this->load->view('admin/manage_product_group/edit_product_group', $data);
    }

    public function convert_from_rupees($amount, $unit) {
        // Convert amount to float
        $amount = (float)$amount;
    
        // Handle cases where the amount is very small or very large
        if ($amount < 1) {
            // For very small amounts, avoid scientific notation
            $formatted_amount = number_format($amount, 6); // Adjust the number of decimal places as needed
        } else {
            // For normal amounts, format with commas
            $formatted_amount = number_format($amount, 0, '.', ','); // No decimal places if not needed
        }
    
        // Append the unit (e.g., 'lakh', 'crore') if needed
        // return $formatted_amount . ' ' . $unit;
        return $formatted_amount;
    }
    public function update_product_group() {
        // Load form helper
        $this->load->helper('url');
    
        // Retrieve form data
        $product_group_id = $this->input->post('id');
        $bank_id = $this->input->post('bank_name');
        $product_id = $this->input->post('product_name');
        $min_amount = $this->input->post('min_amount');
        $min_unit = $this->input->post('min_unit');
        $max_amount = $this->input->post('max_amount');
        $max_unit = $this->input->post('max_unit');
        $loan_type_ids = $this->input->post('loanType_name'); // Array
        $eligibility_ids = $this->input->post('eligibility');
        $primary_security_ids = $this->input->post('primary_security');
        $colletural_security_ids = $this->input->post('colletural_security');
        $gurantees_ids = $this->input->post('gurantees');
        $terms_ids = $this->input->post('title');
    
        // Convert quantum_of_loan values
        $min_amount_in_rupees = $this->convert_from_rupees($min_amount, $min_unit);
        $max_amount_in_rupees = $this->convert_from_rupees($max_amount, $max_unit);
        
    
        // Create JSON object for quantum_of_loan
        $quantum_of_loan = json_encode([
            'min' => ['amount' => $min_amount_in_rupees, 'unit' => $min_unit],
            'max' => ['amount' => $max_amount_in_rupees, 'unit' => $max_unit]
        ]);
    
        // Retrieve and process repayment_period values
        $repayment_periods = $this->input->post('repayment_period'); // This should be an array if you are allowing multiple periods
        $repayment_period_str = is_array($repayment_periods) ? json_encode($repayment_periods) : json_encode([$repayment_periods]);
    
        // Check if data is valid
        if (empty($loan_type_ids) || empty($eligibility_ids) || empty($primary_security_ids) || empty($colletural_security_ids) || empty($gurantees_ids) || empty($terms_ids)) {
            $this->session->set_flashdata('error', 'Incomplete data.');
            redirect('admin/header/edit_product_group/' . $product_group_id);
        }
    
        $eligibility_ids_str = implode(',', $eligibility_ids);
        $loan_type_ids_str = implode(',', $loan_type_ids);
        $primary_security_ids_str = implode(',', $primary_security_ids);
        $colletural_security_ids_str = implode(',', $colletural_security_ids);
        $gurantees_ids_str = implode(',', $gurantees_ids);
        $terms_ids_str = implode(',', $terms_ids);
    
        // Prepare data for updating
        $data = array(
            'bank_id' => $bank_id,
            'product_id' => $product_id,
            'loan_type_id' => $loan_type_ids_str,
            'eligibility_id' => $eligibility_ids_str,
            'quantum_of_loan' => $quantum_of_loan,
            'borrower_margin' => $this->input->post('borrower_margin'),
            'repayment_period' => $repayment_period_str,
            'roi_pricing' => $this->input->post('roi_pricing'),
            'processing_fees' => $this->input->post('processing_fees'),
            'primary_security' => $primary_security_ids_str,
            'colletural_security' => $colletural_security_ids_str,
            'gurantees' => $gurantees_ids_str,
            'title' => $terms_ids_str
        );
    
        // Update the product group
        $this->Product_model->update($product_group_id, $data);
    
        redirect('admin/header/manage_product_group'); // Redirect to the product group list
    }
    
    public function get_bank_loan_types($product_id) {
        $data['loanType'] = $this->Loan_types_model->get_all_loan_types();
        $loanTypes = $this->db->select('*')->from('kind_of_loan_type')->get()->result_array();
        // echo"<pre>";print_r($loanTypes);die('12');
        // $data['product_groups'] = $this->Product_model->get_all_with_names();
        $data['loan_types_with_banks'] = $this->Product_model->get_loan_types_with_banks();
        $data['products_with_banks'] = $this->Product_model->get_products_with_banks();
        $data['banks_with_loan_types'] = $this->Product_model->get_loanType_with_bank($product_id);
        // $data['product_group'] = $this->Product_model->insert_product_group();
        $data['product_groups'] = $this->Product_model->get_product_groups();
        $data['product'] = $this->Bank_model->get_product_id();
        $data['map_product'] = $this->Product_model->get_all_products_names();
        // echo"<pre>";print_r($data['banks_with_loan_types']);die('12');

        $this->load->view('admin/include/header');
        $this->load->view('admin/manage_product_group/bank_loan_type', $data);
        $this->load->view('admin/include/footer');
        // $this->load->view('map_data', $data);
    }

    public function getLoanTypeData($product_id, $bank_id) {
        $this->load->model('Product_model');
        
        // Fetch product groups based on the product and bank
        $data['product_groups'] = $this->Product_model->get_product_groups_by_product_and_bank($product_id, $bank_id);
        
        $data['product_id'] = $product_id;
        $data['bank_id'] = $bank_id;
    
        $this->load->view('admin/include/header');
        $this->load->view('admin/manage_product_group/loan_type_details', $data);
        $this->load->view('admin/include/footer');
    }

    public function submit_form() {
        // Retrieve posted data
        $loan_type_id = $this->input->post('loan_type');
        $bank_id = $this->input->post('bank');

        // Process the data as required
        // For example, save to database or perform some action

        // Redirect or load a view to show success message
        $this->load->view('form_success');
    }
    
    public function view_enquiry()
    {
        $this->load->view('admin/include/header');
        $this->load->view('admin/enquiry/view_enquiry');
        $this->load->view('admin/include/footer');
    }
    public function edit_enquiry($id)
    {
        $this->load->model('Product_model');
        $data['record'] = $this->Product_model->get_enquiry($id);
        $this->load->view('admin/include/header');
        $this->load->view('admin/enquiry/edit_enquiry', $data);
        $this->load->view('admin/include/footer');
    }
 
}

