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

    <style>
      /*custom font*/
      body {
          font-family: "Open Sans", sans-serif;
          background-color: #015fc9 !important;
      }
      #signUpForm {
          max-width: 500px;
          background-color: #ffffff;
          margin: 40px auto;
          padding: 40px;
          box-shadow: 0px 6px 18px rgb(0 0 0 / 9%);
          border-radius: 12px;
      }
      #signUpForm .form-header {
          gap: 5px;
          text-align: center;
          font-size: 0.9em;
      }
      #signUpForm .form-header .stepIndicator {
          position: relative;
          flex: 1;
          padding-bottom: 30px;
      }
      #signUpForm .form-header .stepIndicator.active {
          font-weight: 600;
      }
      #signUpForm .form-header .stepIndicator.finish {
          font-weight: 600;
          color: #0468BF;
      }
      #signUpForm .form-header .stepIndicator::before {
          content: "";
          position: absolute;
          left: 50%;
          bottom: 0;
          transform: translateX(-50%);
          z-index: 9;
          width: 20px;
          height: 20px;
          background-color: #d5efed;
          border-radius: 50%;
          border: 3px solid #ecf5f4;
      }
      #signUpForm .form-header .stepIndicator.active::before {
          background-color: #0468BF;
          border: 1px solid #d5f9f6;
      }
      #signUpForm .form-header .stepIndicator.finish::before {
          background-color: #8b97db;
          border: 1px solid #b7e1dd;
      }
      #signUpForm .form-header .stepIndicator::after {
          content: "";
          position: absolute;
          left: 50%;
          bottom: 8px;
          width: 100%;
          height: 3px;
          background-color: #f3f3f3;
      }
      #signUpForm .form-header .stepIndicator.active::after {
          background-color: #0468BF;
      }
      #signUpForm .form-header .stepIndicator.finish::after {
          background-color: #8b97db;
      }
      #signUpForm .form-header .stepIndicator:last-child:after {
          display: none;
      }
      #signUpForm input {
        padding: 9px 10px;
          width: 100%;
          font-size: 1em;
/*          border: 1px solid #e3e3e3;*/
          border-radius: 5px;
          margin-bottom: 10px;
      }
      #signUpForm input:focus {
          border: 1px solid #009688;
          outline: 0;
      }
      #signUpForm input.invalid {
          border: 1px solid #ffaba5;
      }
      #signUpForm select:focus {
          border: 1px solid #009688;
          outline: 0;
      }
      #signUpForm select.invalid {
          border: 1px solid #ffaba5;
      }
      #signUpForm .step {
          display: none;
      }
      #signUpForm .form-footer {
          overflow: auto;
          gap: 20px;
      }
      #signUpForm .form-footer button {
          background-color: #0468BF;
          border: 1px solid #0468BF !important;
          color: #ffffff;
          border: none;
          padding: 13px 30px;
          font-size: 1em;
          cursor: pointer;
          border-radius: 5px;
          flex: 1;
          margin-top: 5px;
      }
      #signUpForm .form-footer button:hover {
          opacity: 0.8;
      }
      #signUpForm .form-footer #prevBtn {
          background-color: #fff;
          color: #009688;
      }


      

       #sector {
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            width: 100%;
            margin-bottom: 15px;
            font-size: 16px;
            color: #2C3E50;
            background-color: #fff;
            box-sizing: border-box;
        }

        h1{
            color: darkblue;
            /* background-color:darkblue; */
            font-size: 40px;
            /* display: inline; */
            /* text-shadow: 2px 2px; */

        }
        h3{
            color: blue;
            font-size:12px;
            /* background-color:blue; */
        }
        .input-row {
            display: flex;
            justify-content: space-between; /* Adjust alignment as needed */
            margin-bottom: 15px;
        }

        .input-box {
            flex: 1; /* This will make each input-box take up equal space */
            margin-right: 10px; /* Adjust spacing between columns */
        }

        .input-box label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-box input[type="text"] {
            width: 100%;
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .input-box input[type="text"]:focus {
            border: 2px solid skyblue;
            outline: none;
        }
        fieldset {
            border: none;
            margin: 0;
            padding: 0;
        }

        .form-card {
            width: 80%;
            margin: 0 auto;
        }

        .input-row {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-between;
        }

        .input-box {
            flex: 1;
            margin-bottom: 15px; /* Adjust spacing between input boxes */
        }

        .input-box label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .input-box select,
        .input-box input[type="text"] {
            width: calc(100% - 20px); /* Adjust input width with margin */
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .input-box select:focus,
        .input-box input[type="text"]:focus {
            border: 2px solid skyblue;
            outline: none;
        }

        .action-button-previous,
        .action-button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            border-radius: 4px;
            margin-right: 10px;
        }

        .action-button-previous:hover,
        .action-button:hover {
            background-color: #0056b3;
        }
        .card {
            background-color: white; /* Background color for the card */
            padding: 20px; /* Adjust padding as needed */
            margin: 20px auto; /* Adjust margin as needed */
            width: 90%; /* Adjust width as needed */
            max-width: 900px; /* Maximum width if necessary */
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1); /* Optional: Add a box shadow for depth */
            height: auto; /* Adjust height as needed */
            padding: 10px; /* Adjust padding as needed */
            margin: 10px auto; /* Adjust margin as needed */
            width: 80%; /* Adjust the width as needed */
            /* max-width: 600px; Set a maximum width if needed   */
            /* box-shadow: 0 0 5px rgba(0, 0, 0, 0.1); Reduce shadow size  */
        }

        .container-fluid {
            /* padding: 0 20px; Adjust padding as needed */
        }
       
        .social-media a {
            color: white;
            text-decoration: none;
            margin: 0 10px;
            font-size: 1.2em;
            transition: color 0.3s ease;
        }

        .social-media a:hover {
            color: #007BFF;
        }
        label {
            display: inline-block;
            margin-bottom: 7px;
        }


    </style>
</head>
<body>
    <!-- MultiStep Form -->
    <h1 class="text-center fs-4" style="margin-top: 10px;color: #fff;">Project Funding (Dasboard)</h1>
    <form id="signUpForm" action="<?php echo base_url('admin/header/save_form'); ?>" method="POST" autocomplete="off">
          <div class="form-header d-flex mb-4"> 
            <span class="stepIndicator">Basic Details</span> 
            <span class="stepIndicator">Funding Details</span> 
            <span class="stepIndicator">Communication Details</span> 
          </div>
          <!-- end step indicators --> 
          <!-- step one -->
          <div class="step">
            <p class="text-center mb-4">Give us some information to get you started on the bank's dashboard</p>
            <div class="row">
              <div class="col">
                <label for="sector"><strong>Name</strong></label> 
                <input type="text" class="form-control" name="name" placeholder="Full name"  required>
              </div>
              <div class="col">
                <label for="sector"><strong>Company Name</strong></label>
                <input type="text" class="form-control" name="c_name" placeholder="Company name"  required>
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col">
                <label for="sector"><strong>Nature of Business</strong></label>
                <select id="sector" name="nature_of_business" class="js-example-basic-single" style="width: 100%;" required>
                    <option value="">Select Nature of Business</option>
                    <?php foreach ($business_natures as $nature): ?>
                    <option value="<?php echo htmlspecialchars($nature['id']); ?>"><?php echo htmlspecialchars($nature['name']); ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
              <div class="col">
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
              <div class="col">
                <label for="estimatedTurnover"><strong>Estimated Turnover</strong></label>
                <select id="sector" name="estimatedTurnover" class="js-example-basic-single" style="width: 100%;" required>
                    <option value="">Select Estimated Turnover</option>
                    <?php foreach ($turnover_options as $turnover): ?>
                    <option value="<?php echo htmlspecialchars($turnover['id']); ?>"><?php echo htmlspecialchars($turnover['name']); ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="fundingPurpose"><strong>Funding Purpose</strong></label>
                <select id="sector" name="fundingPurpose" class="js-example-basic-single" style="width: 100%;" required>
                    <option value="">Select Funding Purpose</option>
                    <?php foreach ($funding_purposes as $purpose): ?>
                    <option value="<?php echo htmlspecialchars($purpose['id']); ?>"><?php echo htmlspecialchars($purpose['name']); ?></option>
                    <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="row">
              <div class="col">
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
              <div class="col">
                <label for="estimatedTurnover"><strong>Email</strong></label>
                <input type="text" placeholder="Email"  name="email" required> 
              </div>
            </div>
            <div class="row">
              <div class="col">
                <label for="estimatedTurnover"><strong>Phone Number</strong></label>
                <input type="text" placeholder="Phone Number"  name="pnumber" required> 
              </div>
            </div>
            <!-- <div class="col-lg-12" style="margin-top:10px">
                <label for="estimatedTurnover"><strong>Do You Need Advisory in Project Funding to help you choose right bank and product for you with competitive pricing?</strong></label>
                <div class="d-flex align-items-center px-0 checkbox-input">
                    <div class="form-check">
                        <label class="form-check-label" for="profile_req_gender_male">Yes</label>
                        <input class="form-check-input" type="radio" name="advisory_needed" id="yes" value="Yes" checked style="width:20px;border-radius: 50%;">
                    </div>
                    <div class="form-check" style="margin-left: 24px;">
                        <input class="form-check-input" type="radio" name="advisory_needed" id="no" value="No" style="width:20px;border-radius: 50%;">
                        <label class="form-check-label" for="profile_req_gender_female">No</label>
                    </div>
                </div>
            </div> -->            
          </div> <!-- start previous / next buttons -->
          <br>
          <div class="form-footer d-flex"> 
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
