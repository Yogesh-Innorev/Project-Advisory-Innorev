<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from themewagon.github.io/LifeSure/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 27 Aug 2024 06:28:59 GMT -->
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
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Toastr CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    <!-- Toastr JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <style>
    .ticket-form {
        background: rgba(255, 255, 255, 0.4);
        border-radius: 10px;
        width: 430px !important;
    }
    #main_heading{
        text-align: center !important;
        position: relative;
        top: -37px;
        font-size: 35px;
    }
    </style>
</head>

<body>
<!-- Carousel Start -->
<div id="mydivs">
    <?php  echo $this->session->flashdata('message');  ?>
</div>
        <div class="header-carousel owl-carousel">
            <div class="header-carousel-item bg-primary">
                <div class="carousel-caption">
                    <div class="container">
                    <h4 class="text-white text-uppercase fw-bold mb-4" id="main_heading">Welcome To R.K Advisory</h4>
                        <div class="row g-4 align-items-center">
                            <div class="col-lg-7 animated fadeInLeft">
                                <div class="text-sm-center text-md-start">
                                    
                                    <h1 class="display-1 text-white mb-4">Life Insurance Makes You Happy</h1>
                                    <p class="mb-5 fs-5">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy... 
                                    </p>
                                    <div class="d-flex justify-content-center justify-content-md-start flex-shrink-0 mb-4">
                                        <a class="btn btn-light rounded-pill py-3 px-4 px-md-5 me-2" href="#"><i class="fas fa-play-circle me-2"></i> Watch Video</a>
                                        <a class="btn btn-dark rounded-pill py-3 px-4 px-md-5 ms-2" href="#">Learn More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-5 animated fadeInRight">
                                <div class="col-xl-5 fadeInRight animated" data-animation="fadeInRight" data-delay="1s" style="animation-delay: 1s;">
                                    <div class="ticket-form p-5">
                                        
                                        <h2 class="text-dark text-uppercase mb-4" style="color:#fff !important;">Send your Query</h2>
                                        <form id="query_form" action="<?php echo base_url('welcome/save_enquiry'); ?>" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                                            <div class="row g-4">
                                                <div class="col-12">
                                                    <input type="text" class="form-control border-0 py-2" id="name" name="name" placeholder="Your Name" required>
                                                </div>
                                                <div class="col-12 col-xl-6">
                                                    <input type="email" class="form-control border-0 py-2" id="email" name="email" placeholder="Your Email" required>
                                                </div>
                                                <div class="col-12 col-xl-6">
                                                    <input type="phone" class="form-control border-0 py-2" id="phone" name="phone" placeholder="Phone" required>
                                                </div>
                                                <div class="col-12">
                                                    <select class="form-select border-0 py-2" name="service" aria-label="Default select example" required>
                                                        <option value="">Select Our Service</option>
                                                        <option >Project Engineering Advisory</option>
                                                        <option >Project Techno-Financial due diligence</option>
                                                        <option >Project Funding (Dasboard)</option>
                                                        <option >Govt. Incentives</option>
                                                        <option >Ease-of-doing business</option>
                                                        <option >Project Approvals</option>
                                                        <option >Project Application flow</option>
                                                    </select>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" id="query_form_submit" class="btn btn-primary w-100 py-2 px-5">Send Now</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>  
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Carousel End -->
        <!-- About Start -->
        <div class="container-fluid bg-light about pb-5">
            <div class="container pb-5">
                <div class="row g-5">
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="about-item-content bg-white rounded p-5 h-100">
                            <h4 class="text-primary">About Our Company</h4>
                            <h1 class="display-4 mb-4">High Range of Exploring Protection</h1>
                            <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sunt debitis sint tempora. Corporis consequatur illo blanditiis voluptates aperiam quos aliquam totam aliquid rem explicabo,
                            </p>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae praesentium recusandae eligendi modi hic
                            </p>
                            <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>We can save your money.</p>
                            <p class="text-dark"><i class="fa fa-check text-primary me-3"></i>Production or trading of good</p>
                            <p class="text-dark mb-4"><i class="fa fa-check text-primary me-3"></i>Our life insurance is flexible</p>
                            <a class="btn btn-primary rounded-pill py-3 px-5" href="#">More Information</a>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.2s">
                        <div class="bg-white rounded p-5 h-100">
                            <div class="row g-4 justify-content-center">
                                <div class="col-12">
                                    <div class="rounded bg-light">
                                        <img src="<?php echo base_url() ?>assets/index/img/about-1.png" class="img-fluid rounded w-100" alt="">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="counter-item bg-light rounded p-3 h-100">
                                        <div class="counter-counting">
                                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">129</span>
                                            <span class="h1 fw-bold text-primary">+</span>
                                        </div>
                                        <h4 class="mb-0 text-dark">Insurance Policies</h4>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="counter-item bg-light rounded p-3 h-100">
                                        <div class="counter-counting">
                                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">99</span>
                                            <span class="h1 fw-bold text-primary">+</span>
                                        </div>
                                        <h4 class="mb-0 text-dark">Awards WON</h4>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="counter-item bg-light rounded p-3 h-100">
                                        <div class="counter-counting">
                                            <span class="text-primary fs-2 fw-bold" data-toggle="counter-up">556</span>
                                            <span class="h1 fw-bold text-primary">+</span>
                                        </div>
                                        <h4 class="mb-0 text-dark">Skilled Agents</h4>
                                    </div>
                                </div>
                                <div class="col-sm-6">
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
        <!-- About End -->
        <!-- Service Start -->
        <div class="container-fluid service py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Services</h4>
                    <h1 class="display-4 mb-4">We Provide Best Services</h1>
                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                    </p>
                </div>
                <div class="row g-4 justify-content-center">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="<?php echo base_url() ?>assets/index/img/blog-1.png" class="img-fluid rounded-top w-100" alt="">
                                <div class="service-icon p-3">
                                    <i class="fa fa-users fa-2x"></i>
                                </div>
                            </div>
                            <div class="service-content p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="d-inline-block h4 mb-4">Project Engineering Advisory</a>
                                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="<?php echo base_url() ?>assets/index/img/blog-2.png" class="img-fluid rounded-top w-100" alt="">
                                <div class="service-icon p-3">
                                    <i class="fa fa-hospital fa-2x"></i>
                                </div>
                            </div>
                            <div class="service-content p-4">
                                <div class="service-content-inner">
                                    <a href="<?php echo base_url(); ?>Project-Funding" class="d-inline-block h4 mb-4">Project Funding (Dasboard)</a>
                                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="<?php echo base_url(); ?>Project-Funding">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="<?php echo base_url() ?>assets/index/img/blog-3.png" class="img-fluid rounded-top w-100" alt="">
                                <div class="service-icon p-3">
                                    <i class="fa fa-car fa-2x"></i>
                                </div>
                            </div>
                            <div class="service-content p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="d-inline-block h4 mb-4">Ease-of-doing business</a>
                                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="service-item">
                            <div class="service-img">
                                <img src="<?php echo base_url() ?>assets/index/img/blog-4.png" class="img-fluid rounded-top w-100" alt="">
                                <div class="service-icon p-3">
                                    <i class="fa fa-home fa-2x"></i>
                                </div>
                            </div>
                            <div class="service-content p-4">
                                <div class="service-content-inner">
                                    <a href="#" class="d-inline-block h4 mb-4">Project Techno-Financial due diligence </a>
                                    <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Perspiciatis, eum!</p>
                                    <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="<?php echo base_url() ?>Our-Services">More Services</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Service End -->

        <!-- Feature Start -->
        <div class="container-fluid feature bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Our Features</h4>
                    <h1 class="display-4 mb-4">Insurance Provide you a Better Future</h1>
                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                    </p>
                </div>
                <div class="row g-4">
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="feature-item p-4 pt-0">
                            <div class="feature-icon p-4 mb-4">
                                <i class="far fa-handshake fa-3x"></i>
                            </div>
                            <h4 class="mb-4">Trusted Company</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.4s">
                        <div class="feature-item p-4 pt-0">
                            <div class="feature-icon p-4 mb-4">
                                <i class="fa fa-dollar-sign fa-3x"></i>
                            </div>
                            <h4 class="mb-4">Anytime Money Back</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.6s">
                        <div class="feature-item p-4 pt-0">
                            <div class="feature-icon p-4 mb-4">
                                <i class="fa fa-bullseye fa-3x"></i>
                            </div>
                            <h4 class="mb-4">Flexible Plans</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-6 col-xl-3 wow fadeInUp" data-wow-delay="0.8s">
                        <div class="feature-item p-4 pt-0">
                            <div class="feature-icon p-4 mb-4">
                                <i class="fa fa-headphones fa-3x"></i>
                            </div>
                            <h4 class="mb-4">24/7 Fast Support</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ea hic laborum odit pariatur...
                            </p>
                            <a class="btn btn-primary rounded-pill py-2 px-4" href="#">Learn More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Feature End -->
        
        <!-- Blog Start -->
        <div class="container-fluid blog py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">From Blog</h4>
                    <h1 class="display-4 mb-4">News And Updates</h1>
                    <p class="mb-0">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Tenetur adipisci facilis cupiditate recusandae aperiam temporibus corporis itaque quis facere, numquam, ad culpa deserunt sint dolorem autem obcaecati, ipsam mollitia hic.
                    </p>
                </div>
                <div class="row g-4 justify-content-center">
                    <?php 
                    $this->db->select('*');
                    $this->db->from('tbl_blog');
                    $q = $this->db->get();
                    $data = $q->result_array();
                    foreach ($data as $value){
                    ?>
                    <div class="col-lg-6 col-xl-4 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="<?php echo base_url('uploads/blogs/'.$value['image']); ?>" class="img-fluid rounded-top w-100" alt="">
                                <div class="blog-categiry py-2 px-4">
                                    <span>Business</span>
                                </div>
                            </div>
                            <div class="blog-content p-4">
                                <div class="blog-comment d-flex justify-content-between mb-3">
                                    <div class="small"><span class="fa fa-user text-primary"></span> R.K Advisory</div>
                                    <div class="small"><span class="fa fa-calendar text-primary"></span><?php echo $value['created_at'] ?></div>
                                </div>
                                <a href="<?php echo base_url ('blog_detail/'.$value['id']); ?>" class="h4 d-inline-block mb-3"><?php echo $value['title'] ?></a>
                                <p class="mb-3"><?php echo $value['description']; ?></p>
                                <!-- <a href="#" class="btn p-0">Read More  <i class="fa fa-arrow-right"></i></a> -->
                                <a href="<?php echo base_url ('blog_detail/'.$value['id']); ?>" class="btn p-0">Read More  <i class="fa fa-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    <div class="col-12 text-center wow fadeInUp" data-wow-delay="0.2s">
                        <a class="btn btn-primary rounded-pill py-3 px-5" href="<?php echo base_url() ?>welcome/blogs">More Blogs</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Blog End -->

<script> 
    setTimeout(function() {
        $('#mydivs').hide('slow');
    }, 2000);
</script>
