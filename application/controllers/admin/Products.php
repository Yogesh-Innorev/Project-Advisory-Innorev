<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

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

    public function addEligibility() {
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/eligibility/add_eligibility');
        $this->load->view('admin/include/footer');
    }
    public function storeEligibility() {
            // Load the model
        $this->load->model('Product_model');
        
            // Collect the form data
        $data = array(
            'eligibility'            => $this->input->post('eligibility'),
        );
        
            // Check if 'name' is empty
        if (empty($data['eligibility'])) {
                // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Eligibility Name cannot be empty');
            redirect('products/addEligibility');
            return;
        }
        
            // Insert the data into the database
        $this->Product_model->insert_eligibility($data);
        
            // Redirect to the list page
        redirect('admin/products/viewEligibility');
    }

    public function viewEligibility() {
        $data['eligibility'] = $this->Product_model->get_all_eligibility();
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/eligibility/eligibility_view', $data);
        $this->load->view('admin/include/footer');
    }

    public function editEligibility($id) {
        $data['eligibility'] = $this->Product_model->get_eligibility_by_id($id);
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/eligibility/edit_eligibility', $data);
        $this->load->view('admin/include/footer');
    }
    public function updateEligibility() {
        $this->form_validation->set_rules('product_name', 'Product Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            $data['product_name'] = $this->Product_model->get_product_by_id($id);
            $this->load->view('edit_product', $data);
        } else {
            $id = $this->input->post('id');
            $product_name = $this->input->post('product_name');

            if ($this->Product_model->update_product($id, $product_name)) {
                $this->session->set_flashdata('success', 'Product name updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update Product name.');
            }
            redirect('header/viewEligibility');
        }
    }

        //add quantum of loan

    public function addQOL() {
            // $this->load->view('bank/bank_form');
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_quantum_of_loan');

        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function storeQOL() {
                // Load the model
        $this->load->model('Product_model');

                // Collect the form data
        $data = array(
            'quantum_of_loan'            => $this->input->post('quantum_of_loan'),
        );

                // Check if 'name' is empty
        if (empty($data['quantum_of_loan'])) {
                    // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Quantum of loan cannot be empty');
            redirect('products/addQOL');
            return;
        }

                // Insert the data into the database
        $this->Product_model->insert_quantum_of_loan($data);

                // Redirect to the list page
        redirect('products/viewQOL');
    }
    
    public function viewQOL() {
        $data['quantum_of_loan'] = $this->Product_model->get_all_quantum_of_loan();
                // echo"<pre>";print_r($data);die('12');
                // $this->load->view('loan_type/loan_type_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\quantum_of_loan_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function addContributor() {
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_contributor');

        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function storeContibutor() {
                // Load the model
        $this->load->model('Product_model');

                // Collect the form data
        $data = array(
            'borrower_margin'            => $this->input->post('borrower_margin'),
        );

                // Check if 'name' is empty
        if (empty($data['borrower_margin'])) {
                    // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'contributor cannot be empty');
            redirect('products/addContributor');
            return;
        }

                // Insert the data into the database
        $this->Product_model->insert_contributor($data);

                // Redirect to the list page
        redirect('products/viewContributor');
    }
    
    public function viewContributor() {
        $data['borrower_margin'] = $this->Product_model->get_all_contributor();
                // echo"<pre>";print_r($data);die('12');
                // $this->load->view('loan_type/loan_type_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\contributor_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function addRepaymentPeriod() {
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_repayment');

        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function storeRepaymentPeriod() {
                // Load the model
        $this->load->model('Product_model');

                // Collect the form data
        $data = array(
            'repayment_period'            => $this->input->post('repayment_period'),
        );

                // Check if 'name' is empty
        if (empty($data['repayment_period'])) {
                    // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Repayment cannot be empty');
            redirect('products/addRepaymentPeriod');
            return;
        }

                // Insert the data into the database
        $this->Product_model->insert_repayment_period($data);

                // Redirect to the list page
        redirect('products/viewRepaymentPeriod');
    }
    
    public function viewRepaymentPeriod() {
        $data['repayment_period'] = $this->Product_model->get_all_repayment_period();
                // echo"<pre>";print_r($data);die('12');
                // $this->load->view('loan_type/loan_type_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\repayment_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function addROI_Pricing() {
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_pricing');

        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function storeROI_Pricing() {
                // Load the model
        $this->load->model('Product_model');

                // Collect the form data
        $data = array(
            'roi_pricing'            => $this->input->post('roi_pricing'),
        );

                // Check if 'name' is empty
        if (empty($data['roi_pricing'])) {
                    // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Pricing cannot be empty');
            redirect('products/addROI_Pricing');
            return;
        }

                // Insert the data into the database
        $this->Product_model->insert_pricing($data);

                // Redirect to the list page
        redirect('products/viewROI_Pricing');
    }
    
    public function viewROI_Pricing() {
        $data['roi_pricing'] = $this->Product_model->get_all_pricing();
                // echo"<pre>";print_r($data);die('12');
                // $this->load->view('loan_type/loan_type_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\roi_pricing_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function addProcessingFees() {
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_processing_fees');

        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function storeProcessingFees() {
                // Load the model
        $this->load->model('Product_model');

                // Collect the form data
        $data = array(
            'processing_fees'            => $this->input->post('processing_fees'),
        );

                // Check if 'name' is empty
        if (empty($data['processing_fees'])) {
                    // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Processing Fees cannot be empty');
            redirect('products/addProcessingFees');
            return;
        }

                // Insert the data into the database
        $this->Product_model->insert_processing_fees($data);

                // Redirect to the list page
        redirect('products/viewProcessingFees');
    }
    
    public function viewProcessingFees() {
        $data['processing_fees'] = $this->Product_model->get_all_processing_fees();
                // echo"<pre>";print_r($data);die('12');
                // $this->load->view('loan_type/loan_type_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\processing_fees_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function addPrimarySecurity() {
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/primary_security/add_primary_security');
        $this->load->view('admin/include/footer');
    }
    public function storePrimarySecurity() {
                // Load the model
        $this->load->model('Product_model');

                // Collect the form data
        $data = array(
            'primary_security'            => $this->input->post('primary_security'),
        );

                // Check if 'name' is empty
        if (empty($data['primary_security'])) {
                    // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Primary Security cannot be empty');
            redirect('products/addPrimarySecurity');
            return;
        }

                // Insert the data into the database
        $this->Product_model->insert_primary_security($data);

                // Redirect to the list page
        redirect('admin/products/viewPrimarySecurity');
    }
    
    public function viewPrimarySecurity() {
        $data['primary_security'] = $this->Product_model->get_all_primary_security();
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/primary_security/primary_security_view', $data);
        $this->load->view('admin/include/footer');
    }
    public function addCollecturalSecurity() {
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/collectural_security/add_collectural_security');
        $this->load->view('admin/include/footer');
    }
    public function storeCollecturalSecurity() {
                // Load the model
        $this->load->model('Product_model');

                // Collect the form data
        $data = array(
            'collectural_security'            => $this->input->post('collectural_security'),
        );

                // Check if 'name' is empty
        if (empty($data['collectural_security'])) {
                    // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Collectural Security cannot be empty');
            redirect('admin/products/addCollecturalSecurity');
            return;
        }

                // Insert the data into the database
        $this->Product_model->insert_collectural_security($data);

                // Redirect to the list page
        redirect('admin/products/viewCollecturalSecurity');
    }
    
    public function viewCollecturalSecurity() {
        $data['colletural_security'] = $this->Product_model->get_all_collectural_security();
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/collectural_security/collectural_security_view', $data);
        $this->load->view('admin/include/footer');
    }
    public function addGurantees() {
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/guarantee/add_gurantees');
        $this->load->view('admin/include/footer');
    }
    public function storeGurantees() {
                // Load the model
        $this->load->model('Product_model');

                // Collect the form data
        $data = array(
            'gurantees'            => $this->input->post('gurantees'),
        );

                // Check if 'name' is empty
        if (empty($data['gurantees'])) {
                    // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Gurantees cannot be empty');
            redirect('admin/products/addGurantees');
            return;
        }

                // Insert the data into the database
        $this->Product_model->insert_gurantees($data);

                // Redirect to the list page
        redirect('admin/products/viewGurantees');
    }
    
    public function viewGurantees() {
        $data['gurantees'] = $this->Product_model->get_all_gurantees();
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/guarantee/gurantees_view', $data);
        $this->load->view('admin/include/footer');
    }
    public function addTerm_conditions() {
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/term_condition/add_term_condition');
        $this->load->view('admin/include/footer');
    }
    public function storeTerm_conditions() {
                // Load the model
        $this->load->model('Product_model');

                // Collect the form data
        $data = array(
            'title'            => $this->input->post('title'),
        );

                // Check if 'name' is empty
        if (empty($data['title'])) {
                    // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Other T&C cannot be empty');
            redirect('admin/products/addTerm_conditions');
            return;
        }

                // Insert the data into the database
        $this->Product_model->insert_terms_condition($data);

                // Redirect to the list page
        redirect('admin/products/viewTerm_conditions');
    }
    
    public function viewTerm_conditions() {
        $data['title'] = $this->Product_model->get_all_terms_condition();
        $this->load->view('admin/include/header');
        $this->load->view('admin/product_group_details/term_condition/term_condition_view', $data);
        $this->load->view('admin/include/footer');
    }
    
        //to add description for admin

    public function addLoanType() {
            // $this->load->view('loan_type/form');
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\addLoantype');
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
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
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\loan_type_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
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
        // $this->load->view('bank/product_form');
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_product');
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
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
            redirect('header/addProduct');
            return;
        }
        
            // Insert the data into the database
        $this->Bank_model->insert_product($data);
        
            // Redirect to the list page
        redirect('header/viewProduct');
    }

    public function viewProduct() {
        $data['product'] = $this->Bank_model->get_products();
            // echo"<pre>";print_r($data);die('12');
            // $this->load->view('bank/product', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\product_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }

        //add loan
    public function addLoan() {
            // $this->load->view('loan_type/addLoanForm');
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_loan');
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
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
            // $this->load->view('loan_type/addPurposeForm');
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_purpose');
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
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
            redirect('header/addPurpose');
            return;
        }
        
            // Insert the data into the database
        $this->Loan_types_model->insert_purpose($data);
        
            // Redirect to the list page
        redirect('header/viewPurpose');
    }

    public function viewPurpose() {
        $data['loan_purpose'] = $this->Loan_types_model->get_loan_purpose();
            // echo"<pre>";print_r($data);die('12');
            // $this->load->view('loan_type/loan_purpose', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\purpose_view', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }

        //add banks from masters
    public function addBanksM() {
        $this->load->view('bank/bankM_form');
    }
    public function storeBankM() {
            // Load the model
        $this->load->model('Bank_model');
        
            // Collect the form data
        $data = array(
            'bank_name'            => $this->input->post('bank_name'),
        );
        
            // Check if 'name' is empty
        if (empty($data['bank_name'])) {
                // Handle the error (e.g., redirect with an error message)
            $this->session->set_flashdata('error', 'Bank Name cannot be empty');
            redirect('header/create');
            return;
        }
        
            // Insert the data into the database
        $this->Bank_model->insert_bank($data);
        
            // Redirect to the list page
        redirect('header/viewBank');
    }
    public function viewTest() {
            // $data['banks'] = $this->Bank_model->get_banks();
            // echo"<pre>";print_r($data);die('12');
        $this->load->view('test', $data);
    }
    public function mapData() {
        $data['map'] = $this->Product_model->get_loan_with_description();
            // $data['loans'] = $this->Product_model->get_all_loans();
        $data['loans'] = $this->Product_model->get_all_loans();
            $data['descriptions'] = $this->Product_model->get_all_descriptions(); // Fetch all descriptions
            
            // echo"<pre>";print_r($data);die('12');

            $data['selected_descriptions'] = array(); // Initialize as empty

            // Check if a loan is selected
            $selected_loan_id = $this->input->post('id');
            if ($selected_loan_id) {
                $data['selected_descriptions'] = $this->Product_model->get_description_ids_by_loan($selected_loan_id);
            }
            // Fetch the entries from loan_map table
            $data['loan_maps'] = $this->Product_model->get_all_loan_maps();

            $this->load->view('menu_sidebar\materialDashboard\examples\tables\map_data', $data);
            $this->load->view('menu_sidebar\materialDashboard\examples\header');
            // $this->load->view('map_data', $data);
        }

        public function loan() {
            $data['loans'] = $this->Product_model->get_all_loans();
            $data['descriptions'] = $this->Product_model->get_all_descriptions();
            $this->load->view('select_descriptions_view', $data);
        }
        
        public function fetch_loans() {
            $description_ids = $this->input->post('description_ids');
            $data['loans'] = $this->Loan_model->get_loans_with_descriptions($description_ids);
            $this->load->view('loans_view', $data);
        }
        
        public function fetch_descriptions() {
            $loan_id = $this->input->post('id');
            if ($loan_id) {
                $descriptions = $this->Product_model->get_all_description();
                $associated_descriptions = $this->Product_model->get_descriptions_by_loan($loan_id);
                $associated_description_ids = array_column($associated_descriptions, 'id');
                
                $result = [];
                foreach ($descriptions as $description) {
                    $result[] = [
                        'id' => $description['id'],
                        'description_text' => $description['description_text'],
                        'checked' => in_array($description['id'], $associated_description_ids) ? 'checked' : ''
                    ];
                }
                
                echo json_encode($result);
            } else {
                echo json_encode([]);
            }
        }
         // Handle form submission
        public function save_descriptions() {
            $loan_id = $this->input->post('id');
        // print_r($loan_id);die('12');
        $description_ids = $this->input->post('id'); // Array of selected description IDs
        // print_r($description_ids);die('12');
        if ($loan_id && $description_ids) {
            // Delete existing mappings for the loan
            $this->Product_model->delete_mappings($loan_id);

            // Insert new mappings
            foreach ($description_ids as $description_id) {
                $this->Product_model->add_mapping($loan_id, $description_id);
            }

            $this->session->set_flashdata('success', 'Descriptions saved successfully.');
        } else {
            $this->session->set_flashdata('error', 'Please select a loan and descriptions.');
        }
    }
    public function get_descriptions() {
        $loan_id = $this->input->post('id');
        // $descriptions = $this->Product_model->get_descriptions_by_loan($loan_id);
        $descriptions = $this->Product_model->get_all_descriptions(); // Fetch all descriptions regardless of loan_id
        echo json_encode($descriptions);
    }
    public function submit() {
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
    public function mapBank() {

        $data['banks'] = $this->Bank_model->get_all_banks();
        $data['loans'] = $this->Product_model->get_all_loans();

        // Fetch combined description IDs for the specified loan ID
        // $data['description_ids'] = $this->Product_model->get_description_ids($loan_id);
        // echo "<pre>";print_r( $data['description_ids']);die('12');
        // $data['loan_types'] = $this->Loan_types_model->get_all_loan_types(); // Fetch all loan_types
        
        // $data['selected_descriptions'] = array(); // Initialize as empty

        // Check if a loan is selected
        // $selected_loan_id = $this->input->post('id');
        // if ($selected_loan_id) {
            // $data['selected_descriptions'] = $this->Bank_model->get_description_ids_by_loan($selected_loan_id);
        // }
        // Fetch the entries from loan_map table
        // $data['loan_maps'] = $this->Bank_model->get_all_loan_maps();

        $this->load->view('menu_sidebar\materialDashboard\examples\tables\map_bank', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
        // $this->load->view('map_data', $data);
    }

    // Fetch loans based on selected bank
    public function fetch_loan() {
        $bank_id = $this->input->post('bank_id');
        $loans = $this->Bank_model->get_loans_by_bank($bank_id);
        echo json_encode($loans);
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

    public function editProduct($id) {
        $data['product'] = $this->Bank_model->get_product_by_id($id);
        // $this->load->view('edit_product', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\edit_product', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
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
            redirect('header/viewProduct');
        }
    }
    public function editPurpose($id) {
        $data['purpose'] = $this->Bank_model->get_purpose_by_id($id);
        // $this->load->view('edit_product', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\edit_purpose', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function updatePurpose() {
        $this->form_validation->set_rules('loan_purpose', 'Loan Purpose', 'required');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            $data['loan_purpose'] = $this->Bank_model->get_purpose_by_id($id);
            $this->load->view('edit_purpose', $data);
        } else {
            $id = $this->input->post('id');
            $loan_purpose = $this->input->post('loan_purpose');

            if ($this->Bank_model->update_purpose($id, $loan_purpose)) {
                $this->session->set_flashdata('success', 'Purpose name updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update Purpose name.');
            }
            redirect('header/viewPurpose');
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

        redirect('header/viewPurpose'); // Redirect to the list of loan types
    }
    public function editBank($id) {
        $data['bank'] = $this->Bank_model->get_bank_by_id($id);
        // $this->load->view('edit_product', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\edit_bank', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
    }
    public function updateBank() {
        $this->form_validation->set_rules('bank_name', 'Bank Name', 'required');

        if ($this->form_validation->run() == FALSE) {
            $id = $this->input->post('id');
            $data['bank_name'] = $this->Bank_model->get_bank_by_id($id);
            $this->load->view('edit_bank', $data);
        } else {
            $id = $this->input->post('id');
            $bank_name = $this->input->post('bank_name');

            if ($this->Bank_model->update_bank($id, $bank_name)) {
                $this->session->set_flashdata('success', 'Bank name updated successfully.');
            } else {
                $this->session->set_flashdata('error', 'Failed to update Bank name.');
            }
            redirect('header/viewBank');
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

        redirect('header/viewBank'); // Redirect to the list of banks
    }
    public function update_Bankstatus($id, $status) {
        $new_status = $status === 'active' ? 'inactive' : 'active';
        $this->Bank_model->update_status($id, $new_status);
        redirect('header/viewBank');
    }
    public function editLoanType($id) {
        $data['loanType'] = $this->Loan_types_model->get_loanType_by_id($id);
        // $this->load->view('edit_product', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\tables\edit_loan_type', $data);
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
            redirect('header/loanTypeData');
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

        redirect('header/loanTypeData'); // Redirect to the list of banks
    }

    public function add_product_group() {

        $data['product'] = $this->Bank_model->get_products();
        $data['banks'] = $this->Bank_model->get_banks();
        $data['loanType'] = $this->Loan_types_model->get_all_loan_types();
        // echo"<pre>";print_r($data['loanType']);die('12');

        $this->load->view('menu_sidebar\materialDashboard\examples\tables\product_group', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
        // $this->load->view('map_data', $data);
    }

    // Method to handle form submission (optional)
    // public function submit_product_group() {
    //     $product_id = $this->input->post('product_name');
    //     $bank_id = $this->input->post('bank');
    //     $loan_types = $this->input->post('loan_type'); // This will be an array

    //     // Prepare data for insertion
    //     $data = array(
    //         'product_id' => $product_id,
    //         'bank_id' => $bank_id,
    //         'loan_types' => implode(',', $loan_types) // Store as comma-separated values
    //     );

    //     // Process the form data as needed

    //     // Redirect or load a view to show results
    // }
    // public function submit_product_group() {
    //     // Get form data
    //     $product_id = $this->input->post('product_name');
    //     // echo"<pre>";print_r($product_id);die('12');
    //     $bank_id = $this->input->post('bank_name');
    //     $loan_type_ids = $this->input->post('loanType_name'); // This will be an array

    //     // Check if loan type_ids is an array
    //     if (!is_array($loan_type_ids) || empty($loan_type_ids)) {
    //         $this->session->set_flashdata('error', 'No loan types selected.');
    //         redirect('product_group');
    //     }

    //     // Prepare data for insertion
    //     $data = [];
    //     foreach ($loan_type_ids as $loan_type_id) {
    //         $data[] = [
    //             'product_id' => $product_id,
    //             'bank_id' => $bank_id,
    //             'loan_type_id' => $loan_type_id,
    //             // 'bank_name' => $bank_id
    //         ];
    //     }

    //     // Insert data into the product_group table
    //     // $success = $this->Product_model->insert_product_groups($data);
    //     // $data['product_groups'] = $this->ProductGroup_model->get_product_groups_with_banks();
    //     $success = $this->Product_model->get_product_groups_with_banks();
    //     // echo"<pre>";print_r($success);die('12');

    //     // Redirect or load a view to show a success message
    //     if ($success) {
    //         $this->session->set_flashdata('message', 'Data successfully saved!');
    //         redirect('header/manage_product_group');
    //     } else {
    //         $this->session->set_flashdata('error', 'Failed to save data.');
    //         redirect('header/add_product_group');
    //     }
    // }

    public function submit1() {
        // Get form data
        $product_id = $this->input->post('product_name');
        $bank_id = $this->input->post('bank_name');
        $loan_type_ids = $this->input->post('loanType_name'); // This will be an array

        if (!is_array($loan_type_ids) || empty($loan_type_ids)) {
            $this->session->set_flashdata('error', 'No loan types selected.');
            redirect('product_group');
        }

        // Fetch names from respective tables
        $product_name = $this->Bank_model->get_product_name($product_id);
        $bank_name = $this->Bank_model->get_bank_name($bank_id);
        $loan_type_names = $this->Loan_types_model->get_loan_type_names($loan_type_ids);

        // Prepare data for insertion
        $data = array(
            'product_name' => $product_name,
            'bank_name' => $bank_name,
            'loanType_name' => implode(', ', $loan_type_names)
        );

        // Insert data into the product_group table
        $success = $this->Product_model->insert_product_group($data);

        if ($success) {
            $this->session->set_flashdata('message', 'Data successfully saved!');
        } else {
            $this->session->set_flashdata('error', 'Failed to save data.');
        }

        redirect('header/add_product_group');
    }
    //10-08-2024

    public function manage_product_group() {

        //get data reference by vis

        // $loanTypes = $this->db->select('*')->from('kind_of_loan_type')->where('status !=', 3)->get()->result_array();
        $data['loanType'] = $this->Loan_types_model->get_all_loan_types();
        $loanTypes = $this->db->select('*')->from('kind_of_loan_type')->get()->result_array();
        // echo"<pre>";print_r($loanTypes);die('12');
        // $data['product_groups'] = $this->Product_model->get_all_with_names();
        $data['loan_types_with_banks'] = $this->Product_model->get_loan_types_with_banks();
        // $data['product_group'] = $this->Product_model->insert_product_group();
        $data['product_groups'] = $this->Product_model->get_product_groups();
        // echo"<pre>";print_r($data['product_groups']);die('12');

        $this->load->view('menu_sidebar\materialDashboard\examples\tables\manage_product_group', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
        // $this->load->view('map_data', $data);
    }
    public function submit_product_group() {
        // Load form helper
        $this->load->helper('url');

        // Retrieve form data
        $bank_id = $this->input->post('bank_name');
        $product_id = $this->input->post('product_name');
        // $loan_types = $this->input->post('loanType_name'); // This will be an array of loan type IDs
        $loan_type_ids = $this->input->post('loanType_name');
        // echo"<pre>";print_r($loan_type_ids);die('12');
        // Insert data into product_group table
        foreach ($loan_type_ids as $loan_type_id) {
            $data = array(
                'bank_id' => $bank_id,
                'product_id' => $product_id,
                'loan_type_id' => $loan_type_id
            );
            // echo"<pre>";print_r($data);die('123');
        // Check if loan type_ids is an array
            if (!is_array($loan_type_ids) || empty($loan_type_ids)) {
                $this->session->set_flashdata('error', 'No loan types selected.');
                redirect('header/add_product_group');
            }
            $this->Product_model->insert($data);
        }
        // echo"<pre>";print_r($data);die('12');
        // Redirect or load a view
        redirect('header/manage_product_group');
    }


    public function viewGroupDoc() {

        $groups = $this->db->select('*')->from('manage_group_documents')->where('status !=', 3)->get()->result_array();

        $data = array();
        $data['res'] = array();
        foreach ($groups as $key => $value) {
            //print_r($value);
            $docs = $this->db->select('dd.document_id, docs.name')
            ->from('manage_group_document_data as dd')
            ->join('document_service as docs', 'dd.document_id = docs.id')
            ->where(array(
                'dd.group_id' 	=> $value['id'],
                'dd.status' 	=> 1,
                'docs.status' 	=> 1
            ))->get()->result_array();
            $data['res'][$key]['id'] = $value['id'];
            $data['res'][$key]['status'] = $value['status'];
            $data['res'][$key]['grp_name'] = $value['group_name'];
            $data['res'][$key]['grp_docs'] = $docs;
        }

        $data['title'] = 'VIS | Manage Group Documents';
        $this->load->view('admin/include/header', $data);
        $this->load->view('admin/document_service/view_grp_doc', $data);
        $this->load->view('admin/include/footer');
    }
    //get details data
    public function add_details() {

        $data['product'] = $this->Bank_model->get_products();
        $data['banks'] = $this->Bank_model->get_banks();
        $data['loanType'] = $this->Loan_types_model->get_all_loan_types();
        // echo"<pre>";print_r($data['loanType']);die('12');

        $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_details', $data);
        $this->load->view('menu_sidebar\materialDashboard\examples\header');
        // $this->load->view('map_data', $data);
    }

    public function create_form() {
        $g_id = base64_decode($this->uri->segment(4, 0));

        if ($this->input->post()) {
            $product 	= trim($this->input->post('product_name'));
            $banks 	= trim($this->input->post('bank_name'));
            $loanType 	= $this->input->post('loanType_name');

            $date_time = date('Y-m-d H:i:s');
            $save_name = array(
              'product_name'	=> $product,
              'status'		=> $status,
              'updated_at'	=> $date_time
          );

            $this->db->where(array('id' => $g_id))->update('product_group', $save_name);

            $last_id = $g_id;

            $save_name11 = array(
              'status'		=> 3,
              'updated_at'	=> $date_time
          );

            $this->db->where(array('status != ' => 3, 'group_id' => $g_id))->update('product_group', $save_name11);

            foreach ($documents as $key => $value) {
             $save_name = array(
               'group_id'		=> $last_id,
               'document_id'	=> $value,
               'status'		=> 1,
               'created_at'	=> $date_time,
               'updated_at'	=> $date_time
           );
             $this->db->insert('product_group', $save_name);
         }
         $message = '<div class="success_msg" id="secc_msg"><div class="col-xs-12 set_div_msg">Group has been successfully updated.<span class="set_cross pull-right"><i class="fa fa-times" aria-hidden="true"></i></span></div></div>';
         $this->session->set_flashdata('message', $message);
         redirect(site_url('admin/docuM/viewGroupDoc'), 'refresh');
     }


			// $groups = $this->db->select('*')->from('product_group')->where(array('status !=' => 3, 'id' => $g_id))->get()->row_array();

     $data = array();

     $docs = $this->db->select('dd.product_id')
     ->from('product_group as dd')
     ->where(array(
											// 'dd.group_id' 	=> $groups['id'],
											// 'dd.status' 	=> 1
     ))->get()->result_array();

     $get_docs = array();
     if (!empty($docs)) {
        foreach ($docs as $key => $value) {
         $get_docs[$key] = $value['product_id'];
     }
 }

			// $data['docs'] = $this->db
		    // 						->select('*')
		    // 						->from('document_service')
		    // 						->order_by('name', 'asc')
		    // 						->where('status', 1)
		    // 						->get()
		    // 						->result_array();
			// $data['docs_ids'] = $get_docs;
			// $data['group'] = $groups;

 $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_details', $data);
 $this->load->view('menu_sidebar\materialDashboard\examples\header');
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
public function edit($id) {
        // Fetch the data for the given ID
        // Fetch product group data
    $data['product_group'] = $this->Product_model->get_product_group($id);

        // Fetch dropdown options
    $data['products'] = $this->Bank_model->get_products();
    $data['banks'] = $this->Bank_model->get_banks();
    $data['loan_types'] = $this->Loan_types_model->get_all_loan_types();

        // echo"<pre>";print_r($data['products']);die('12');

        // Fetch selected values
    $data['selected_banks'] = $this->Product_model->get_selected_banks($id);
    $data['selected_loan_types'] = $this->Product_model->get_selected_loan_types($id);

        // Load the view with the data
    $this->load->view('menu_sidebar\materialDashboard\examples\tables\add_details', $data);
        // $this->load->view('menu_sidebar\materialDashboard\examples\header');
}
public function getDetails() {
        // Fetch the data for the given ID
        // Fetch product group data
        // $data['product_group'] = $this->Product_model->get_product_group($id);

        // Fetch dropdown options
    $data['products'] = $this->Bank_model->get_products();
    $data['banks'] = $this->Bank_model->get_banks();
    $data['loan_types'] = $this->Loan_types_model->get_all_loan_types();

        // Fetch selected values
        // $data['selected_banks'] = $this->Product_model->get_selected_banks($id);
        // $data['selected_loan_types'] = $this->Product_model->get_selected_loan_types($id);

        // Load the view with the data
    $this->load->view('menu_sidebar\materialDashboard\examples\tables\product_details', $data);
        // $this->load->view('menu_sidebar\materialDashboard\examples\header');
}

}

