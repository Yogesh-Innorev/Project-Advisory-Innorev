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


/*--------------------------------------------------------------
# Blog Posts Section
--------------------------------------------------------------*/
.blog-posts article {
  background-color: var(--surface-color);
  box-shadow: 0px 2px 20px rgba(0, 0, 0, 0.1);
  transition: 0.3s;
}

.blog-posts .post-img img {
  transition: 0.5s;
}

.blog-posts .post-date {
  background-color: var(--accent-color);
  color: var(--contrast-color);
  position: absolute;
  right: 0;
  bottom: 0;
  text-transform: uppercase;
  font-size: 13px;
  padding: 6px 12px;
  font-weight: 500;
}

.blog-posts .post-content {
  padding: 30px;
}

.blog-posts .post-title {
  font-size: 20px;
  color: var(--heading-color);
  font-weight: 700;
  transition: 0.3s;
  margin-bottom: 15px;
}

.blog-posts .meta i {
  font-size: 16px;
  color: var(--accent-color);
}

.blog-posts .meta span {
  font-size: 15px;
  color: color-mix(in srgb, var(--default-color), transparent 40%);
}

.blog-posts p {
  margin-top: 20px;
}

.blog-posts hr {
  color: color-mix(in srgb, var(--default-color), transparent 60%);
  margin-bottom: 15px;
}

.blog-posts .readmore {
  display: flex;
  align-items: center;
  font-weight: 600;
  line-height: 1;
  transition: 0.3s;
  color: color-mix(in srgb, var(--heading-color), transparent 20%);
}

.blog-posts .readmore i {
  line-height: 0;
  margin-left: 6px;
  font-size: 16px;
}

.blog-posts article:hover .post-title,
.blog-posts article:hover .readmore {
  color: var(--accent-color);
}

.blog-posts article:hover .post-img img {
  transform: scale(1.1);
}

/*--------------------------------------------------------------
# Blog Pagination Section
--------------------------------------------------------------*/
.blog-pagination {
  padding-top: 0;
  color: color-mix(in srgb, var(--default-color), transparent 40%);
}

.blog-pagination ul {
  display: flex;
  padding: 0;
  margin: 0;
  list-style: none;
}

.blog-pagination li {
  margin: 0 5px;
  transition: 0.3s;
}

.blog-pagination li a {
  color: color-mix(in srgb, var(--default-color), transparent 40%);
  padding: 7px 16px;
  display: flex;
  align-items: center;
  justify-content: center;
}

.blog-pagination li a.active,
.blog-pagination li a:hover {
  background: var(--accent-color);
  color: var(--contrast-color);
}

.blog-pagination li a.active a,
.blog-pagination li a:hover a {
  color: var(--contrast-color);
}

/*--------------------------------------------------------------
# Blog Details Section
--------------------------------------------------------------*/
.blog-details {
  padding-bottom: 30px;
}

.blog-details .article {
  background-color: var(--surface-color);
  padding: 30px;
  box-shadow: 0 4px 16px rgba(0, 0, 0, 0.1);
}

.blog-details .post-img {
  margin: -30px -30px 20px -30px;
  overflow: hidden;
}

.blog-details .title {
  color: var(--heading-color);
  font-size: 28px;
  font-weight: 700;
  padding: 0;
  margin: 30px 0;
}

.blog-details .content {
  margin-top: 20px;
}

.blog-details .content h3 {
  font-size: 22px;
  margin-top: 30px;
  font-weight: bold;
}

.blog-details .content blockquote {
  overflow: hidden;
  background-color: color-mix(in srgb, var(--default-color), transparent 95%);
  padding: 60px;
  position: relative;
  text-align: center;
  margin: 20px 0;
}

.blog-details .content blockquote p {
  color: var(--default-color);
  line-height: 1.6;
  margin-bottom: 0;
  font-style: italic;
  font-weight: 500;
  font-size: 22px;
}

.blog-details .content blockquote:after {
  content: "";
  position: absolute;
  left: 0;
  top: 0;
  bottom: 0;
  width: 3px;
  background-color: var(--accent-color);
  margin-top: 20px;
  margin-bottom: 20px;
}

.blog-details .meta-top {
  margin-top: 20px;
  color: color-mix(in srgb, var(--default-color), transparent 40%);
}

.blog-details .meta-top ul {
  display: flex;
  flex-wrap: wrap;
  list-style: none;
  align-items: center;
  padding: 0;
  margin: 0;
}

.blog-details .meta-top ul li+li {
  padding-left: 20px;
}

.blog-details .meta-top i {
  font-size: 16px;
  margin-right: 8px;
  line-height: 0;
  color: color-mix(in srgb, var(--default-color), transparent 40%);
}

.blog-details .meta-top a {
  color: color-mix(in srgb, var(--default-color), transparent 40%);
  font-size: 14px;
  display: inline-block;
  line-height: 1;
}

.blog-details .meta-bottom {
  padding-top: 10px;
  border-top: 1px solid color-mix(in srgb, var(--default-color), transparent 90%);
}

.blog-details .meta-bottom i {
  color: color-mix(in srgb, var(--default-color), transparent 40%);
  display: inline;
}

.blog-details .meta-bottom a {
  color: color-mix(in srgb, var(--default-color), transparent 40%);
  transition: 0.3s;
}

.blog-details .meta-bottom a:hover {
  color: var(--accent-color);
}

.blog-details .meta-bottom .cats {
  list-style: none;
  display: inline;
  padding: 0 20px 0 0;
  font-size: 14px;
}

.blog-details .meta-bottom .cats li {
  display: inline-block;
}

.blog-details .meta-bottom .tags {
  list-style: none;
  display: inline;
  padding: 0;
  font-size: 14px;
}

.blog-details .meta-bottom .tags li {
  display: inline-block;
}

.blog-details .meta-bottom .tags li+li::before {
  padding-right: 6px;
  color: var(--default-color);
  content: ",";
}

.blog-details .meta-bottom .share {
  font-size: 16px;
}

.blog-details .meta-bottom .share i {
  padding-left: 5px;
}


</style>
</head>

<body>

  <main class="main">

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

    <div class="container">
      <div class="row">

        <div class="col-lg-12">

          <!-- Blog Details Section -->
          <section id="blog-details" class="blog-details section">
            <div class="container">
              <article class="article">

                <div class="post-img">
                  <img src="<?php echo base_url('uploads/blogs/'.$blog['image']); ?>" alt="Thumbnail" class="img-fluid" style="width: 100%;height: 400px;">
                </div>

                <h2 class="title"><?php echo $blog['title']; ?></h2>

                <div class="meta-top">
                  <ul>
                    <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="blog-details.html">R.K Advisory</a></li>
                    <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="blog-details.html"><time datetime="2020-01-01"><?php echo $blog['created_at']; ?></time></a></li>
                  </ul>
                </div><!-- End meta top -->

                <div class="content">
                  <?php echo $blog['description']; ?>
                </div><!-- End post content -->

                <div class="meta-bottom">
                  <i class="bi bi-folder"></i>
                  <ul class="cats">
                    <li><a href="#">Business</a></li>
                  </ul>

                  <i class="bi bi-tags"></i>
                  <ul class="tags">
                    <li><a href="#">Creative</a></li>
                    <li><a href="#">Tips</a></li>
                    <li><a href="#">Marketing</a></li>
                  </ul>
                </div><!-- End meta bottom -->

              </article>

            </div>
          </section><!-- /Blog Details Section -->


        </div>


      </div>
    </div>

  </main>

