<?php
    error_reporting(0);
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

      <h1 class="logo me-auto me-lg-0"><a href="index.html">Gp<span>.</span></a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto me-lg-0"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      
        <!-- search -->
        <div class="search">
            <div class="container">
                <form action="produk.php">
                        <input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>">
                        <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
                        <input type="submit" name="cari" value="Cari">
                </form>
            </div>
        </div>

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto" href="index.php" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="index.php" href="#kategori">Category</a></li>
          <li><a class="nav-link scrollto " href="index.php" href="#new-produk">New product</a></li>
          </li>
          <li><a class="nav-link scrollto " href="#produk" href="produk.php">Product</a></li>
          </li>
          <li><a class="nav-link scrollto" href="index.php" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

    </div>
  </header><!-- End Header -->

<br>
<br>
<br>
  <main id="main">


    <!-- ======= Services Section ======= -->
    <section id="produk" class="produk">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
        <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
                <br>
          <h2>Check our product</h2>
          <p>Product</p>
        </div>
        <!-- new product -->
        <div class="section">
            <div class="row">
    
                    <?php
                    if($_GET['search'] != '' || $_GET['kat'] != ''){
                        $where = "AND product_name LIKE '%".$_GET['search']."%'
                            AND category_id LIKE '%".$_GET['kat']."%' ";
                    }
                    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_status = 1 $where
                        ORDER BY product_id DESC");
                    if(mysqli_num_rows($produk) > 0){
                        while($p = mysqli_fetch_array($produk)){
                    ?>
                    <a class="col-3" href="detail-produk.php?id=<?php echo $p['product_id'] ?>">
                        <div class="col-12">
                            <img src="produk/<?php echo $p['product_image'] ?>" width="300px">
                            <p class="nama"><?php echo $p['product_name'] ?></p>
                            <p class="harga">Rp. <?php echo number_format($p['product_price'])  ?></p>
                            <br>
                            <br>
                            <br>
                        </div>
                    </a>
                    <?php }}else{ ?>
                            <p>Produk Tidak Ada</p>
                    <?php } ?>
            </div>
        </div>
      </div>
    </section><!-- End Services Section -->

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