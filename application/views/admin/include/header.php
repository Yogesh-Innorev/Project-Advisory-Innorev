
<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="<?php echo base_url(); ?>assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/favicon.png">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>Admin Dashboard</title>
  <meta content="width=device-width, initial-scale=1.0, shrink-to-fit=no" name="viewport" />

  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/other/maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link href="<?php echo base_url(); ?>assets/css/material-dashboard.min6c54.css?v=2.2.2" rel="stylesheet" />

  <link href="<?php echo base_url(); ?>assets/demo/demo.css" rel="stylesheet" />
  <style>
    .nav-item.active > a.nav-link {
        background-color: #e91e63;
      box-shadow: 0 4px 20px 0 rgba(0, 0, 0, .14), 0 7px 10px -5px rgba(233, 30, 99, .4);
      color: #ffffff;
      }

      .nav-item.active .nav-link {
        color: #ffffff;
      }

      .nav-item .collapse.show {
        display: block; /* Ensure the dropdown stays open */
      }


  </style>

  <script>
    (function (w, d, s, l, i) {
      w[l] = w[l] || [];
      w[l].push({
        'gtm.start': new Date().getTime(),
        event: 'gtm.js'
      });
      var f = d.getElementsByTagName(s)[0],
        j = d.createElement(s),
        dl = l != 'dataLayer' ? '&l=' + l : '';
      j.async = true;
      j.src =
        '<?php echo base_url(); ?>assets/other/www.googletagmanager.com/gtm5445.html?id=' + i + dl;
      f.parentNode.insertBefore(j, f);
    })(window, document, 'script', 'dataLayer', 'GTM-NKDMSK6');
  </script>

</head>

<body class>


  <noscript><iframe src="<?php echo base_url(); ?>assets/other/https://www.googletagmanager.com/ns.html?id=GTM-NKDMSK6" height="0" width="0"
      style="display:none;visibility:hidden"></iframe></noscript>

  <div class="wrapper ">
    <div class="sidebar" data-color="rose" data-background-color="black" data-image="<?php echo base_url(); ?>assets/img/sidebar-1.jpg">

      <div class="logo"><a href="http://www.creative-tim.com/" class="simple-text logo-mini">
          RKA
        </a>
        <a href="http://www.creative-tim.com/" class="simple-text logo-normal">
          R.K Advisory
        </a>
      </div>
      <div class="sidebar-wrapper">
       <!--  <div class="user">
          <div class="photo">
            <img src="<?php echo base_url(); ?>assets/img/faces/marc.jpg" />
          </div>
          <div class="user-info">
            <a data-toggle="collapse" href="#collapseExample" class="username">
              <span>
                Admin
                <b class="caret"></b>
              </span>
            </a>
            <div class="collapse" id="collapseExample">
              <ul class="nav">
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> MP </span>
                    <span class="sidebar-normal"> My Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> EP </span>
                    <span class="sidebar-normal"> Edit Profile </span>
                  </a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="#">
                    <span class="sidebar-mini"> S </span>
                    <span class="sidebar-normal"> Settings </span>
                  </a>
                </li>
              </ul>
            </div>
          </div>
        </div> -->
        <ul class="nav">
          <li class="nav-item" id="dashboardMenu">
            <a class="nav-link" href="<?php echo base_url(); ?>dashboard">
              <i class="material-icons">dashboard</i>
              <p> Dashboard </p>
            </a>
          </li>
          <li class="nav-item" id="productGroupDropdown">
            <a class="nav-link" data-toggle="collapse" href="#pagesExamples">
              <i class="material-icons">image</i>
              <p> Product Group Details
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="pagesExamples">
              <ul class="nav">
                <li class="nav-item" id="viewEligibilityMenu">
                  <a class="nav-link" href="<?php echo base_url();?>admin/products/viewEligibility">
                    <span class="sidebar-mini"> E </span>
                    <span class="sidebar-normal"> Eligibility </span>
                  </a>
                </li>
                <li class="nav-item" id="viewPrimarySecurityMenu">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/products/viewPrimarySecurity">
                    <span class="sidebar-mini"> PS </span>
                    <span class="sidebar-normal"> Primary Security </span>
                  </a>
                </li>
                <li class="nav-item" id="viewCollecturalSecurity">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/products/viewCollecturalSecurity">
                    <span class="sidebar-mini"> CS </span>
                    <span class="sidebar-normal"> Collectural Security </span>
                  </a>
                </li>
                <li class="nav-item" id="viewGurantees">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/products/viewGurantees">
                    <span class="sidebar-mini"> G </span>
                    <span class="sidebar-normal"> Guarantees </span>
                  </a>
                </li>
                <li class="nav-item" id="viewTerm_conditions">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/products/viewTerm_conditions">
                    <span class="sidebar-mini"> OTC </span>
                    <span class="sidebar-normal"> Other Term & Condition </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item" id="productmenu">
            <a class="nav-link" data-toggle="collapse" href="#componentsExamples">
              <i class="material-icons">category</i>
              <p> Products
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="componentsExamples">
              <ul class="nav">
                <li class="nav-item" id="viewProduct">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/header/viewProduct">
                    <span class="sidebar-mini"> VP </span>
                    <span class="sidebar-normal"> View Product </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item" id="enquirymenu">
            <a class="nav-link" data-toggle="collapse" href="#formsExamples">
              <i class="material-icons">content_paste</i>
              <p> Enquiry
                <b class="caret"></b>
              </p>
            </a>
            <div class="collapse" id="formsExamples">
              <ul class="nav">
                <li class="nav-item" id="view_enquiry">
                  <a class="nav-link" href="<?php echo base_url(); ?>admin/header/view_enquiry">
                    <span class="sidebar-mini"> VT </span>
                    <span class="sidebar-normal"> View Table </span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
          <li class="nav-item" id="viewBank">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/header/viewBank">
              <i class="material-icons">widgets</i>
              <p> Manage Bank </p>
            </a>
          </li>
          <li class="nav-item" id="loanTypeData">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/header/loanTypeData">
              <i class="material-icons">timeline</i>
              <p> Add Loan Type </p>
            </a>
          </li>
          <li class="nav-item" id="viewPurpose">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/header/viewPurpose">
              <i class="material-icons">date_range</i>
              <p> Purpose </p>
            </a>
          </li>
          <li class="nav-item" id="manage_product_group">
            <a class="nav-link" href="<?php echo base_url(); ?>admin/header/manage_product_group">
              <i class="material-icons">widgets</i>
              <p> Manage Product Group </p>
            </a>
          </li>
          <li class="nav-item" id="blog">
            <a class="nav-link" href="<?php echo base_url(); ?>blog">
              <i class="material-icons">manage_accounts</i>
              <p> Manage Blog</p>
            </a>
          </li>
          <li class="nav-item" id="Miscellaneous">
            <a class="nav-link" data-toggle="collapse" href="#formsExamples_1">
              <i class="material-icons">content_paste</i>
              <p>Miscellaneous<b class="caret"></b></p>
            </a>
            <div class="collapse" id="formsExamples_1">
              <ul class="nav">
                <li class="nav-item" id="home_query_form">
                  <a class="nav-link" href="<?php echo base_url(); ?>home_query_form">
                    <span class="sidebar-mini"> HQF </span>
                    <span class="sidebar-normal"> Home Query Form </span>
                  </a>
                </li>
                <li class="nav-item" id="contact_us">
                  <a class="nav-link" href="<?php echo base_url(); ?>contact_us">
                    <span class="sidebar-mini"> CU </span>
                    <span class="sidebar-normal"> Contact Us </span>
                  </a>
                </li>
                <li class="nav-item" id="privacy_policy">
                  <a class="nav-link" href="<?php echo base_url(); ?>privacy_policy">
                    <span class="sidebar-mini"> PP </span>
                    <span class="sidebar-normal"> Privacy Policy </span>
                  </a>
                </li>
                <li class="nav-item" id="term_condition">
                  <a class="nav-link" href="<?php echo base_url(); ?>term_condition">
                    <span class="sidebar-mini"> TC </span>
                    <span class="sidebar-normal"> Terms & Condition </span>
                  </a>
                </li>
                <li class="nav-item" id="disclaimer">
                  <a class="nav-link" href="<?php echo base_url(); ?>disclaimer">
                    <span class="sidebar-mini"> DC </span>
                    <span class="sidebar-normal"> Disclaimer</span>
                  </a>
                </li>
              </ul>
            </div>
          </li>
        </ul>
      </div>
      <div class="sidebar-background"></div>
    </div>
    <div class="main-panel">

      <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-minimize">
              <button id="minimizeSidebar" class="btn btn-just-icon btn-white btn-fab btn-round">
                <i class="material-icons text_align-center visible-on-sidebar-regular">more_vert</i>
                <i class="material-icons design_bullet-list-67 visible-on-sidebar-mini">view_list</i>
              </button>
            </div>
            <!-- <a class="navbar-brand" href="javascript:;">Dashboard</a> -->
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="sr-only">Toggle navigation</span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
            <span class="navbar-toggler-icon icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end">
            <!-- <form class="navbar-form">
              <div class="input-group no-border">
                <input type="text" value class="form-control" placeholder="Search...">
                <button type="submit" class="btn btn-white btn-round btn-just-icon">
                  <i class="material-icons">search</i>
                  <div class="ripple-container"></div>
                </button>
              </div>
            </form> -->
            <ul class="navbar-nav">
              <!-- <li class="nav-item">
                <a class="nav-link" href="javascript:;">
                  <i class="material-icons">dashboard</i>
                  <p class="d-lg-none d-md-block">
                    Stats
                  </p>
                </a>
              </li> -->
              <li class="nav-item dropdown">
                <a class="nav-link" href="http://example.com/" id="navbarDropdownMenuLink" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">notifications</i>
                  <span class="notification">5</span>
                  <p class="d-lg-none d-md-block">
                    Some Actions
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                  <a class="dropdown-item" href="#">Mike John responded to your email</a>
                  <a class="dropdown-item" href="#">You have 5 new tasks</a>
                  <a class="dropdown-item" href="#">You're now friend with Andrew</a>
                  <a class="dropdown-item" href="#">Another Notification</a>
                  <a class="dropdown-item" href="#">Another One</a>
                </div>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link" href="javascript:;" id="navbarDropdownProfile" data-toggle="dropdown"
                  aria-haspopup="true" aria-expanded="false">
                  <i class="material-icons">person</i>
                  <p class="d-lg-none d-md-block">
                    Account
                  </p>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                  <!-- <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Settings</a>
                  <div class="dropdown-divider"></div> -->
                  <a class="dropdown-item" href="<?php echo base_url(); ?>admin/login/logout">Log out</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>

<script>
document.addEventListener('DOMContentLoaded', function() {
  // Get the current URL path
  var currentPath = window.location.pathname;

  // Define menu items and their corresponding paths
  var menuItems = [
    { id: 'dashboardMenu', path: '/dashboard' },
    { id: 'viewEligibilityMenu', path: '/admin/products/viewEligibility', parentId: 'productGroupDropdown' },
    { id: 'viewPrimarySecurityMenu', path: '/admin/products/viewPrimarySecurity', parentId: 'productGroupDropdown' },
    { id: 'viewCollecturalSecurity', path: '/admin/products/viewCollecturalSecurity', parentId: 'productGroupDropdown' },
    { id: 'viewGurantees', path: '/admin/products/viewGurantees', parentId: 'productGroupDropdown' },
    { id: 'viewTerm_conditions', path: '/admin/products/viewTerm_conditions', parentId: 'productGroupDropdown' },

    { id: 'viewProduct', path: '/admin/header/viewProduct', parentId: 'productmenu' },
    { id: 'view_enquiry', path: '/admin/header/view_enquiry', parentId: 'enquirymenu' },
    { id: 'viewBank', path: '/admin/header/viewBank'},
    { id: 'loanTypeData', path: '/admin/header/loanTypeData'},
    { id: 'viewPurpose', path: '/admin/header/viewPurpose'},
    { id: 'manage_product_group', path: '/admin/header/manage_product_group'},
    { id: 'blog', path: '/blog'},

    { id: 'home_query_form', path: '/home_query_form', parentId: 'Miscellaneous' },
    { id: 'contact_us', path: '/contact_us', parentId: 'Miscellaneous' },
    { id: 'privacy_policy', path: '/privacy_policy', parentId: 'Miscellaneous' },
    { id: 'term_condition', path: '/term_condition', parentId: 'Miscellaneous' },
    { id: 'disclaimer', path: '/disclaimer', parentId: 'Miscellaneous' },

    // Add other menu items and dropdowns here
  ];

  // Iterate through menu items to find the matching path
  menuItems.forEach(function(item) {
    if (currentPath.includes(item.path)) {
      // Add 'active' class to the matching menu item
      document.getElementById(item.id).classList.add('active');

      // If the menu item belongs to a dropdown, also open the dropdown
      if (item.parentId) {
        var parentElement = document.getElementById(item.parentId);
        if (parentElement) {
          parentElement.classList.add('active');
          var collapseElement = parentElement.querySelector('.collapse');
          if (collapseElement) {
            collapseElement.classList.add('show'); // Open the dropdown
          }
        }
      }
    }
  });
});

</script>
      
