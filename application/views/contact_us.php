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
    <link rel="stylesheet" href="../../use.fontawesome.com/releases/v5.15.4/css/all.css"/>
    <link href="../../cdn.jsdelivr.net/npm/bootstrap-icons%401.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/index/lib/animate/animate.min.css"/>
    <link href="<?php echo base_url() ?>assets/index/lib/lightbox/css/lightbox.min.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/index/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="<?php echo base_url() ?>assets/index/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="<?php echo base_url() ?>assets/index/css/style.css" rel="stylesheet">
    <style>
    .ticket-form {
        background: rgba(255, 255, 255, 0.4);
        border-radius: 10px;
        width: 430px !important;
    }
    </style>
</head>

<body>


        <!-- Header Start -->
        <div class="container-fluid bg-breadcrumb">
            <div class="container text-center py-5" style="max-width: 900px;">
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Contact Us</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li style="margin: 0 10px;"><a href="<?php echo base_url(); ?>" style="color: #fff;">Home</a></li>
                    <li class="breadcrumb-item active text-primary">Contact Us</li>
                </ol>   
            </div>
        </div>
        <!-- Header End -->


        <!-- Contact Start -->
        <div id="mydivs">
            <?php  echo $this->session->flashdata('message');  ?>
        </div>
        <div class="container-fluid contact bg-light py-5">
            <div class="container py-5">
                <div class="text-center mx-auto pb-5 wow fadeInUp" data-wow-delay="0.2s" style="max-width: 800px;">
                    <h4 class="text-primary">Contact Us</h4>
                    <h1 class="display-4 mb-4">If you have any doubts,<br>please let us know</h1>
                </div>
                <div class="row g-5">
                    <div class="col-xl-6 wow fadeInLeft" data-wow-delay="0.2s">
                        <div class="contact-img d-flex justify-content-center" >
                            <div class="contact-img-inner">
                                <img src="<?php echo base_url(); ?>assets/index/img/contact-img.png" class="img-fluid w-100"  alt="Image">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 wow fadeInRight" data-wow-delay="0.4s">
                        <div>
                            <h4 class="text-primary">Send Your Message</h4>
                            <form action="<?php echo base_url(); ?>welcome/save_contact_us" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="400">
                                <div class="row g-3">
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="name" id="name" placeholder="Your Name" required>
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12 col-xl-6">
                                        <div class="form-floating">
                                            <input type="email" class="form-control border-0" name="email" id="email" placeholder="Your Email" required>
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="form-floating">
                                            <input type="number" class="form-control border-0" name="phone" id="phone" placeholder="Phone" required>
                                            <label for="phone">Your Phone</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control border-0" name="subject" id="subject" placeholder="Subject" required>
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control border-0" name="message" placeholder="Leave a message here" id="message" style="height: 120px" required></textarea>
                                            <label for="message">Message</label>
                                        </div>

                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-12">
                        <div>
                            <div class="row g-4">
                                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.2s">
                                    <div class="contact-add-item">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fas fa-map-marker-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Address</h4>
                                            <p class="mb-0">D-39, 2nd Floor, Sector-2, Noida, Uttar Pradesh -201301</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.4s">
                                    <div class="contact-add-item">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fas fa-envelope fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Mail Us</h4>
                                            <p class="mb-0">valuers@rkassociates.org</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-lg-3 wow fadeInUp" data-wow-delay="0.6s">
                                    <div class="contact-add-item">
                                        <div class="contact-icon text-primary mb-4">
                                            <i class="fa fa-phone-alt fa-2x"></i>
                                        </div>
                                        <div>
                                            <h4>Telephone</h4>
                                            <p class="mb-0">(0120) 4110117, 4324647, +91-9958632707</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 wow fadeInUp" data-wow-delay="0.2s">
                        <div class="rounded">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3503.582157647686!2d77.31265317457083!3d28.582307386361435!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390cfb501e42dadd%3A0x75c19e90dbb35427!2sR.K%20Associates%20Valuers%20%26%20Techno%20Engineering%20Consultants%20Pvt.%20Ltd.!5e0!3m2!1sen!2sin!4v1724759596552!5m2!1sen!2sin" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


<script> 
    setTimeout(function() {
        $('#mydivs').hide('slow');
    }, 4000);
</script>

        