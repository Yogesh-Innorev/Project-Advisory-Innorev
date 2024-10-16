<!DOCTYPE html>
<html lang="en">

    
<!-- Mirrored from themewagon.github.io/WaterLand/ by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2024 06:26:55 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=utf-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8">
    <title>R.K Advisory</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com/">
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&amp;family=Open+Sans:ital,wdth,wght@0,75..100,300..800;1,75..100,300..800&amp;display=swap" rel="stylesheet"> 

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/navbar/use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="<?php echo base_url(); ?>assets/navbar/cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="<?php echo base_url(); ?>assets/navbar/lib/animate/animate.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/navbar/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>assets/navbar/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <!-- <link href="<?php echo base_url(); ?>assets/navbar/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- Template Stylesheet -->
    <!-- <link href="<?php echo base_url(); ?>assets/navbar/css/style.css" rel="stylesheet"> -->
    <style>

.nav-bar {
    background: var(--bs-white);
    box-shadow: rgba(50, 50, 93, 0.25) 0px 6px 12px -2px, rgba(0, 0, 0, 0.3) 0px 3px 7px -3px;
}

.sticky-top {
    transition: 1s;
}

.navbar-light .navbar-nav .nav-link {
    position: relative;
    margin-right: 25px;
    padding: 35px 0;
    letter-spacing: 1px;
    color: var(--bs-dark);
    font-size: 17px;
    font-weight: 500;
    outline: none;
    transition: .5s;
}

.sticky-top .navbar-light .navbar-nav .nav-link {
    padding: 20px 0;
/*    color: var(--bs-dark);*/
    color: #015fc9;
    font-weight: 700;
}

.navbar-light .navbar-nav .nav-link:hover,
.navbar-light .navbar-nav .nav-link.active {
/*    color: var(--bs-primary);*/
    color: #015fc9 !important;
}

.navbar-light .navbar-brand img {
    max-height: 60px;
    transition: .5s;
}

.sticky-top .navbar-light .navbar-brand img {
    max-height: 50px;
}

.navbar .dropdown-toggle::after {
    border: none;
    content: "\f107";
    font-family: "Font Awesome 5 Free";
    font-weight: 600;
    vertical-align: middle;
    margin-left: 8px;
}

.dropdown .dropdown-menu a:hover {
    background: var(--bs-primary);
    color: var(--bs-white);
}

.navbar .nav-item:hover .dropdown-menu {
    transform: rotateX(0deg);
    visibility: visible;
    margin-top: 8px !important;
    background: var(--bs-light);
    transition: .5s;
    opacity: 1;
}

@media (min-width: 992px) {
    .navbar .nav-item .dropdown-menu {
    display: block;
    visibility: hidden;
    top: 100%;
    transform: rotateX(-75deg);
    transform-origin: 0% 0%;
    border: 0;
    border-radius: 10px;
    margin-top: 8px !important;
    transition: .5s;
    opacity: 0;
    }
}

@media (max-width: 991px) {
    .navbar.navbar-expand-lg .navbar-toggler {
        padding: 8px 15px;
        border: 1px solid var(--bs-primary);
        color: var(--bs-primary);
    }

    .sticky-top .navbar-light .navbar-nav .nav-link {
        padding: 12px 0;
    }
}
/*** Navbar End ***/
        </style>
    </head>
    <body>
            <!-- Spinner Start -->
        <!-- <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div> -->
        <!-- Spinner End -->

        <!-- Navbar & Hero Start -->
        <div class="container-fluid nav-bar sticky-top px-4 py-2 py-lg-0">
            <nav class="navbar navbar-expand-lg navbar-light">
                <a href="#" class="navbar-brand p-0">
                    <h1 class="display-6 text-dark" style="color: #015fc9 !important;"><i class="text-primary me-3"></i>R.K Advisory</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav py-0" style="margin-left: auto !important;">
                        <a href="<?php echo base_url(); ?>" class="nav-item nav-link active">Home</a>
                        <a href="<?php echo base_url(); ?>About-Us" class="nav-item nav-link">About</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Our Services</a>
                            <div class="dropdown-menu m-0">
                                <a href="feature.html" class="dropdown-item">Project Engineering Advisory</a>
                                <a href="gallery.html" class="dropdown-item">Project Techno-Financial due diligence </a>
                                <a href="<?php echo base_url(); ?>Project-Funding" class="dropdown-item">Project Funding (Dasboard)</a>
                                <a href="package.html" class="dropdown-item">Govt. Incentives</a>
                                <a href="team.html" class="dropdown-item">Ease-of-doing business</a>
                                <a href="testimonial.html" class="dropdown-item">Project Approvals</a>
                                <a href="404.html" class="dropdown-item">Project Application flow</a>
                            </div>
                        </div>
                        <!-- <a href="<?php echo base_url() ?>Our-Services" class="nav-item nav-link">Service</a> -->
                        <a href="<?php echo base_url() ?>welcome/blogs" class="nav-item nav-link">Blog</a>
                        
                        
                        <a href="<?php echo base_url(); ?>Contact-Us" class="nav-item nav-link">Contact</a>
                    </div>
                    <!-- <div class="team-icon d-none d-xl-flex justify-content-center me-3">
                        <a class="btn btn-square btn-light rounded-circle mx-1" href="#"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-square btn-light rounded-circle mx-1" href="#"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-square btn-light rounded-circle mx-1" href="#"><i class="fab fa-instagram"></i></a>
                        <a class="btn btn-square btn-light rounded-circle mx-1" href="#"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <a href="#" class="btn btn-primary rounded-pill py-2 px-4 flex-shrink-0">Get Started</a> -->
                </div>
            </nav>
        </div>
        <!-- Navbar & Hero End -->
    </body>