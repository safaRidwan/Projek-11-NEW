<?php 
    include 'db.php';
    $kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin
    WHERE admin_id = 1");
    $a = mysqli_fetch_object($kontak);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Gp Bootstrap Template - Index</title>
  <meta content="" name="description">
  <meta content="" name="keywords">


  <!-- Favicons -->
  <link href="Gp/assets/img/favicon.png" rel="icon">
  <link href="Gp/assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="Gp/assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="Gp/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="Gp/assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="Gp/assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="Gp/assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="Gp/assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="Gp/assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  

  <!-- Template Main CSS File -->
  <link href="Gp/assets/css/style.css" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Gp
  * Updated: Mar 10 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top ">
    <div class="container d-flex align-items-center justify-content-lg-between">

      <h1 class="logo me-auto me-lg-0"><a href="index.php">Gp<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      
        <!-- search -->
        <div class="search">
            <div class="container">
                <form action="produk.php">
                        <input type="text" name="search" placeholder="Cari Produk">
                        <input type="submit" name="cari" value="Cari">
                </form>
            </div>
        </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto " href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#kategori">Category</a></li>
          <li><a class="nav-link scrollto " href="#new-produk">New product</a></li>
          </li>
          <li><a class="nav-link scrollto " href="produk.php">Product</a></li>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center justify-content-center">
    <div class="container" data-aos="fade-up">

      <div class="row justify-content-center" data-aos="fade-up" data-aos-delay="150">
        <div class="col-xl-6 col-lg-8">
          <h1>ZwanStore<span>.</span></h1>
          <h2>We are a one-stop shop and serve wholeheartedly</h2>

        </div>
      </div>

    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients">
      <div class="container" data-aos="zoom-in">

        <div class="clients-slider swiper">
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><img src="Gp/assets/img/clients/client-1.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="Gp/assets/img/clients/client-2.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="Gp/assets/img/clients/client-3.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="Gp/assets/img/clients/client-4.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="Gp/assets/img/clients/client-5.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="Gp/assets/img/clients/client-6.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="Gp/assets/img/clients/client-7.png" class="img-fluid" alt=""></div>
            <div class="swiper-slide"><img src="Gp/assets/img/clients/client-8.png" class="img-fluid" alt=""></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>
    </section><!-- End Clients Section -->


    <!-- ======= Services Section ======= -->
    <section id="kategori" class="section">
    <div class="container" data-aos="fade-up">
    <div class="section-title">
          <h2>Category</h2>
          <p>Check our category</p>
        </div>
        <div class="row">
                    <?php 
                    $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY
                            category_id DESC");
                            if(mysqli_num_rows($kategori) > 0){
                                while($k = mysqli_fetch_array($kategori)){
                    ?>
                    <a class="col-2" href="produk.php?kat=<?php echo $k['category_id'] ?>">
                        <div class="col-12">
                            <img src="img/icon-kategori.png" width="50px">
                            <p> <?php echo $k['category_name'] ?> </p>
                        </div>
                    </a>
                    <?php }}else{ ?>
                        <p>Kategori tidak ada moas</p>
                    <?php } ?>
                </div>
            </div>
    </section><!-- End Services Section -->










 <!-- ======= Portfolio Section ======= -->
 <section id="new-produk" class="portfolio">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>New Product</h2>
          <p>Check our New Product</p>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <div class="row">
        <?php 
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1
                     ORDER BY product_id DESC LIMIT 9");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                    ?>
          <div class="col-lg-4 col-md-6 portfolio-item filter-app">
            <div class="portfolio-wrap">
              <img src="produk/<?php echo $p['product_image'] ?>" class="img-fluid" alt="">

              <div class="portfolio-info">
                <h4 class="nama"><?php echo $p['product_name'] ?></h4>

                <p class="harga">Rp. <?php echo number_format($p['product_price']) ?></p>
                
                <div class="portfolio-links">
                  <a href="produk/<?php echo $p['product_image'] ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" 
                  title="<?php echo $p['product_name'] ?>"><i class="bx bx-plus"></i></a>
                  
                  <a href="detail-produk.php?id=<?php echo $p['product_id'] ?>" title="More Details"><i class="bx bx-link"></i></a>
                  </a>
                </div>
              </div>
            </div>
          </div>
          
          <?php }}else{ ?>
                            <p>Produk Tidak Ada</p>
                    <?php } ?>
          </div>
        </div>
      </div>

    <br>
    </section><!-- End Portfolio Section -->
   

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">

        <div class="" data-aos="fade-up" data-aos-delay="100">
          <div class="">

            <div class="">
              <div class="testimonial-item">
                <img src="img/owner.jpeg" class="testimonial-img" alt="">
                <h3>Musafa Ridwan</h3>
                <h4>Ceo &amp; Founder</h4>
                <p>
                  <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                  Intinya jangan lupa mengaji.
                  <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                </p>
              </div>
            </div><!-- End testimonial item -->
          </div>
          
        </div>

      </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Location</h2>
          <p>Store Location</p>
        </div>

        <div>
          <iframe style="border:0; width: 100%; height: 270px;" src="https://www.google.com/maps/place/Toko+Wandi+dan+Sewa+Molen/@-7.5463592,111.0074762,16.65z/data=!4m6!3m5!1s0x2e7a1f162b887c5d:0x74ef26eea386c079!8m2!3d-7.5444402!4d111.0048787!16s%2Fg%2F11n0j66c0b?entry=ttu" frameborder="0" allowfullscreen></iframe>
        </div>

      </div>
    </section><!-- End Contact Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">
        <center>
          <div class="col-lg-3 col-md-6">
            <div class="footer-info">
              <h3>Nz<span>.</span></h3>
              <p>
                Mojogedanganz <br>
                Karanganyar, INA<br><br>
                <strong>Phone:</strong> +62 81228991969<br>
                <strong>Email:</strong> ridwangituu1@gmail.com<br>
              </p>
              
              <div class="social-links mt-3">
                <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://instagram.com/musaa.nz/" class="instagram"><i class="bx bxl-instagram"></i></a>
                <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
                <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
              </div>
              
            </div>
          </div>
          </center>
        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong><span>Nz</span></strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/gp-free-multipurpose-html-bootstrap-template/ -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="Gp/assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="Gp/assets/vendor/aos/aos.js"></script>
  <script src="Gp/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="Gp/assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="Gp/assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="Gp/assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="Gp/assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="Gp/assets/js/main.js"></script>

</body>

</html>