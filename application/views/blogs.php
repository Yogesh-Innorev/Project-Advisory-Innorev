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
                <h4 class="text-white display-4 mb-4 wow fadeInDown" data-wow-delay="0.1s">Blogs</h4>
                <ol class="breadcrumb d-flex justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
                    <li style="margin: 0 10px;"><a href="<?php echo base_url(); ?>" style="color: #fff;">Home</a></li>
                    <li class="breadcrumb-item active text-primary">Blogs</li>
                </ol>   
            </div>
        </div>
        <!-- Header End -->

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
                </div>
            </div>
        </div>
        <!-- Blog End -->


<script> 
    setTimeout(function() {
        $('#mydivs').hide('slow');
    }, 4000);
</script>

        