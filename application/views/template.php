<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/css/select2.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- jQuery (Required by Toastr) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&amp;family=Inter:slnt,wght@-10..0,100..900&amp;display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/navbar/use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="<?php echo base_url() ?>assets/navbar/cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/index/lib/animate/animate.min.css"/>
    <link href="<?php echo base_url() ?>assets/index/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/index/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url() ?>assets/index/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url() ?>assets/index/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/index/css/template.css" rel="stylesheet">

    <style>
      
      .background-container {
            width: 100%; /* Full viewport width */
            height: 40vh; /* Full viewport height */
            background-image: url('<?php echo base_url('assets/img/login.jpg') ?>'); 
            background-size: cover; 
            background-position: center; 
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: white; /* White text for contrast */
            text-align: center;
            font-family: 'Arial', sans-serif;
        }

        /* Style for the quote text */
        .quote {
            font-size: 1.5rem;
            background-color: rgba(0, 0, 0, 0.5); /* Dark transparent background for readability */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body>
    <div class="background-container">
        <div class="quote wow fadeInDown" data-wow-delay="0.2s">
            "A good financial plan is a road map that shows us exactly how the choices we make today will affect our future." – Alexa Von Tobel
        </div>
    </div>
    <!-- MultiStep Form -->
    <!-- <h1 class="text-center fs-4" style="margin-top: 10px;color: #fff;">Project Funding (Dasboard)</h1> -->
    <form id="signUpForm" action="<?php echo base_url('admin/header/save_form'); ?>" method="POST" autocomplete="off">
          <div class="form-header d-flex mb-4 wow fadeInRight" data-wow-delay="0.2s"> 
            <span class="stepIndicator">Basic Details</span> 
            <span class="stepIndicator">Funding Details</span> 
            <span class="stepIndicator">Communication Details</span> 
          </div>
          <!-- end step indicators --> 
          <!-- step one -->
          <div class="step">
            <p class="text-center mb-4 wow fadeInUp" data-wow-delay="0.3s">Give us some information to get you started on the bank's dashboard</p>
            <div class="row wow fadeInLeft" data-wow-delay="0.4s">
              <div class="col-3">
                <label for="sector"><strong>Name</strong></label> 
                <input type="text" class="form-control" name="name" placeholder="Full name"  required>
              </div>
              <div class="col-3">
                <label for="sector"><strong>Company Name</strong></label>
                <input type="text" class="form-control" name="c_name" placeholder="Company name"  required>
              </div>
              <div class="col-3">
                <label for="sector"><strong>Nature of Business</strong></label>
                <select id="sector" name="nature_of_business" class="js-example-basic-single" style="width: 100%;" required>
                    <option value="">Select Nature of Business</option>
                    <?php foreach ($business_natures as $nature): ?>
                    <option value="<?php echo htmlspecialchars($nature['id']); ?>"><?php echo htmlspecialchars($nature['name']); ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="col-3">
                <label for="sector"><strong>Sector</strong></label>
                <select id="sector" name="sector" class="js-example-basic-single" style="width: 100%;" required>
                    <option value="">Select Sector</option>
                    <?php foreach ($sectors as $sector): ?>
                    <option value="<?php echo htmlspecialchars($sector['id']); ?>"><?php echo htmlspecialchars($sector['name']); ?></option>
                    <?php endforeach; ?>
                </select>
              </div> 
            </div>
            
          </div> 
          <!-- step two -->
          <div class="step">
            <div class="row">
              <div class="col-4">
                <label for="estimatedTurnover"><strong>Estimated Turnover</strong></label>
                <select id="sector" name="estimatedTurnover" class="js-example-basic-single" style="width: 100%;" required>
                    <option value="">Select Estimated Turnover</option>
                    <?php foreach ($turnover_options as $turnover): ?>
                    <option value="<?php echo htmlspecialchars($turnover['id']); ?>"><?php echo htmlspecialchars($turnover['name']); ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="col-4">
                <label for="fundingPurpose"><strong>Funding Purpose</strong></label>
                <select id="sector" name="fundingPurpose" class="js-example-basic-single" style="width: 100%;" required>
                    <option value="">Select Funding Purpose</option>
                    <?php foreach ($funding_purposes as $purpose): ?>
                    <option value="<?php echo htmlspecialchars($purpose['id']); ?>"><?php echo htmlspecialchars($purpose['name']); ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="col-4">
                <label for="loanType"><strong>Loan Type Required</strong></label>
                <select id="sector" name="loanType" class="js-example-basic-single" style="width: 100%;" required>
                    <option value="">Select Loan Type</option>
                    <?php foreach ($loan_types as $loan_type): ?>
                    <option value="<?php echo htmlspecialchars($loan_type['id']); ?>"><?php echo htmlspecialchars($loan_type['loanType_name']); ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
            </div>
          </div> 
          <!-- step three -->
          <div class="step">
            <div class="row">
              <div class="col-6">
                <label for="estimatedTurnover"><strong>Email</strong></label>
                <input type="text" placeholder="Email"  name="email" required> 
              </div>
              <div class="col-6">
                <label for="estimatedTurnover"><strong>Phone Number</strong></label>
                <input type="text" placeholder="Phone Number"  name="pnumber" required> 
              </div>
            </div>           
          </div> <!-- start previous / next buttons -->
          <br>
          <div class="form-footer d-flex wow fadeInUp" data-wow-delay="0.6s"> 
            <button type="button" id="prevBtn" onclick="nextPrev(-1)">Previous</button> 
            <button type="button" id="nextBtn" onclick="nextPrev(1)">Next</button> 
          </div> <!-- end previous / next buttons -->
    </form>
    <!-- /.MultiStep Form -->

    <!-- Modal -->
    <div class="modal fade" id="advisoryModal" tabindex="-1" role="dialog" aria-labelledby="advisoryModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="advisoryModalLabel">Advisory Needed</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p>Do you need advisory in project funding to help you choose the right bank and product for you with competitive pricing?</p>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="advisory_needed_modal" id="modalYes" value="Yes" checked>
              <label class="form-check-label" for="modalYes">Yes</label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="advisory_needed_modal" id="modalNo" value="No">
              <label class="form-check-label" for="modalNo">No</label>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="button" class="btn btn-primary" onclick="submitFormWithModal()">Submit</button>
          </div>
        </div>
      </div>
    </div>

    <!-- product section -->
    <div class="prodcut_section">
        <div class="cards-container">
            <div class="card wow fadeInUp" data-wow-delay="0.2s">
                <div class="icon"><img src="icons/personal-loan-icon.png" alt="Personal Loan"></div>
                <h3>Personal Loan</h3>
                <p>Quick and easy finances at competitive interest rates.</p>
                <div class="btns">
                    <a href="#" class="apply-btn">Apply Now <i class="bi bi-chevron-right"></i></a>
                    <a href="#" class="learn-btn">Learn More <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>

            <div class="card wow fadeInUp" data-wow-delay="0.4s">
                <div class="icon"><img src="icons/pre-approved-icon.png" alt="Pre Approved Offers"></div>
                <h3>Pre Approved Offers</h3>
                <p>Explore special pre-approved offers.</p>
                <div class="btns">
                    <a href="#" class="apply-btn">Apply Now <i class="bi bi-chevron-right"></i></a>
                    <a href="#" class="learn-btn">Learn More <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>

            <div class="card wow fadeInUp" data-wow-delay="0.6s">
                <div class="icon"><img src="icons/used-car-loan-icon.png" alt="Used Car Loan"></div>
                <h3>Used Car Loan</h3>
                <p>Get up to 95% of your car value and book your dream car.</p>
                <div class="btns">
                    <a href="#" class="apply-btn">Apply Now <i class="bi bi-chevron-right"></i></a>
                    <a href="#" class="learn-btn">Learn More <i class="bi bi-chevron-right"></i></a>
                </div>
            </div>
        </div>
    </div>

    <!-- happy customers Start -->
        <div class="container-fluid bg-light about pb-5">
            <div class="container pb-5">
              <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Happy Clients</h4>
                    <h1 class="display-4 mb-4">We Provide Best Services</h1>
                    <p class="mb-0">We are committed to guiding businesses through the complexities of project planning, funding, and approvals. With years of experience in engineering, financial analysis, and government incentives.
                    </p>
                </div>
                <div class="row g-5">
                    <div class="col-xl-12 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="bg-white rounded p-5 h-100" style="background-color: #221f1f !important;">
                            <div class="row g-4 justify-content-center">
                                <div class="col-sm-3">
                                    <div class="counter-item bg-light rounded p-3 h-100">
                                        <div class="counter-counting">
                                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">129</span>
                                            <span class="h1 fw-bold text-primary">+</span>
                                        </div>
                                        <h4 class="mb-0 text-dark">Insurance Policies</h4>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="counter-item bg-light rounded p-3 h-100">
                                        <div class="counter-counting">
                                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">99</span>
                                            <span class="h1 fw-bold text-primary">+</span>
                                        </div>
                                        <h4 class="mb-0 text-dark">Awards WON</h4>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="counter-item bg-light rounded p-3 h-100">
                                        <div class="counter-counting">
                                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">556</span>
                                            <span class="h1 fw-bold text-primary">+</span>
                                        </div>
                                        <h4 class="mb-0 text-dark">Skilled Agents</h4>
                                    </div>
                                </div>
                                <div class="col-sm-3">
                                    <div class="counter-item bg-light rounded p-3 h-100">
                                        <div class="counter-counting">
                                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">967</span>
                                            <span class="h1 fw-bold text-primary">+</span>
                                        </div>
                                        <h4 class="mb-0 text-dark">Team Members</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <!-- happy customers End -->
    <div class="background wow fadeInUp" data-wow-delay="0.2s">
      <div class="container">
        <div class="screen">
          <div class="screen-body">
            <div class="screen-body-item left wow fadeInLeft" data-wow-delay="0.6s">
              <div class="app-title">
                <h1 class="display-1 text-white mb-4">Empowering Projects, Streamlining Success.</h1>
                <p class="mb-5 fs-5" style="font-style: italic;">Opt our consultancy services, we are the best as customers says.</p>
              </div>
            </div>
            <div class="screen-body-item wow fadeInRight" data-wow-delay="0.6s">
              <div class="app-form">
                <div class="app-form-group">
                  <input class="app-form-control" placeholder="NAME">
                </div>
                <div class="app-form-group">
                  <input class="app-form-control" placeholder="EMAIL">
                </div>
                <div class="app-form-group">
                  <input class="app-form-control" placeholder="CONTACT NO">
                </div>
                <div class="app-form-group message">
                  <input class="app-form-control" placeholder="MESSAGE">
                </div>
                <div class="app-form-group buttons">
                  <button class="app-form-button">CANCEL</button>
                  <button class="app-form-button">SEND</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- Include jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js"></script>

<!-- multistep form starts here -->

<script>
    var currentTab = 0;
    showTab(currentTab);

    function showTab(n) {
          // This function will display the specified tab of the form...
      var x = document.getElementsByClassName("step");
      x[n].style.display = "block";
          //... and fix the Previous/Next buttons:
      if (n == 0) {
        document.getElementById("prevBtn").style.display = "none";
    } else {
        document.getElementById("prevBtn").style.display = "inline";
    }
    if (n == (x.length - 1)) {
        document.getElementById("nextBtn").innerHTML = "Submit";
    } else {
        document.getElementById("nextBtn").innerHTML = "Next";
    }
          //... and run a function that will display the correct step indicator:
    fixStepIndicator(n)
}

function nextPrev(n) {
          // This function will figure out which tab to display
  var x = document.getElementsByClassName("step");
          // Exit the function if any field in the current tab is invalid:
  if (n == 1 && !validateForm()) return false;
          // Hide the current tab:
  x[currentTab].style.display = "none";
          // Increase or decrease the current tab by 1:
  currentTab = currentTab + n;
          // if you have reached the end of the form...
  if (currentTab >= x.length) {
            // ... the form gets submitted:
    document.getElementById("signUpForm").submit();
    return false;
}
          // Otherwise, display the correct tab:
showTab(currentTab);
}

function validateForm() {
          // This function deals with validation of the form fields
  var x, y, i, valid = true;
  x = document.getElementsByClassName("step");
  y = x[currentTab].getElementsByTagName("input");
  z = x[currentTab].getElementsByTagName("select");
          // A loop that checks every input field in the current tab:
  for (i = 0; i < y.length; i++) {
            // If a field is empty...
    if (y[i].value == "") {
              // add an "invalid" class to the field:
      y[i].className += " invalid";
              // and set the current valid status to false
      valid = false;
    }
  }
  for (i = 0; i < z.length; i++) {
            // If a field is empty...
    if (z[i].value == "") {
              // add an "invalid" class to the field:
      z[i].className += " invalid";
              // and set the current valid status to false
      valid = false;
    }
  }
          // If the valid status is true, mark the step as finished and valid:
if (valid) {
    document.getElementsByClassName("stepIndicator")[currentTab].className += " finish";
}
    return valid; // return the valid status
}

      function fixStepIndicator(n) {
          // This function removes the "active" class of all steps...
          var i, x = document.getElementsByClassName("stepIndicator");
          for (i = 0; i < x.length; i++) {
            x[i].className = x[i].className.replace(" active", "");
        }
          //... and adds the "active" class on the current step:
        x[n].className += " active";
    }

  function nextPrev(n) {
    var x = document.getElementsByClassName("step");
    if (n == 1 && !validateForm()) return false;
    x[currentTab].style.display = "none";
    currentTab = currentTab + n;

    // Check if the user has reached the last step
    if (currentTab >= x.length) {
        // Show the modal instead of submitting the form directly
        $('#advisoryModal').modal('show');
        return false;
    }

    showTab(currentTab);
}

function submitFormWithModal() {
    // Get the selected radio button value
    var advisoryNeeded = document.querySelector('input[name="advisory_needed_modal"]:checked').value;

    // Add the radio button value to the form data
    var formData = $('#signUpForm').serialize() + '&advisory_needed=' + advisoryNeeded;

    $.ajax({
        url: "<?php echo base_url('admin/header/save_form'); ?>",
        type: "POST",
        data: formData,
        // dataType: 'json',
        success: function(response) {
          var parsedResponse = typeof response === "string" ? JSON.parse(response) : response;
          // console.log(response);  // Log the full response for debugging

            if (parsedResponse.redirect_url) {
                // Redirect to the specified URL
                window.location.href = parsedResponse.redirect_url;
            } else {
                console.error("Redirect URL not found in response.");
            }
        },
        error: function(xhr, status, error) {
            console.error("Error submitting form: ", error);
        }
    });
}

</script>
