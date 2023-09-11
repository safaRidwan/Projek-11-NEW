<?php
include 'db.php';
    session_start();
        if($_SESSION['status_login'] != true){
            echo '<script>window.location="login.php"</script>';
        }
        $kategori = mysqli_query($conn, "SELECT * FROM tb_category WHERE category_id = '".$_GET['id']."' ");
        if(mysqli_num_rows($kategori) == 0){
            echo '<script>window.location="data-kategori.php"</script>';
        }
        $k = mysqli_fetch_object($kategori);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - NiceAdmin Bootstrap Template</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
<?php 
require_once('layout/css.php');
require_once('layout/js.php');
?>

  <!-- =======================================================
  * Template Name: NiceAdmin
  * Updated: Mar 09 2023 with Bootstrap v5.2.3
  * Template URL: https://bootstrapmade.com/nice-admin-bootstrap-admin-html-template/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>


<?php 
require_once('layout/navbar.php'); 
require_once('layout/sidebar.php'); ?>

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Edited Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="dashboard.html">Home / Users</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->

            <!-- Sales Card -->
            <div class="">
              <div class="card info-card sales-card">


              <div class="card">
            <div class="card-body pt-3">
              <!-- Bordered Tabs -->
              <div class="tab-content pt-2">



                  <!-- Profile Edit Form -->
                  <form action="" method="POST" >

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Category</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" value="<?php echo $k->category_name ?>" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="submit" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form>

                  <?php 
                   if (isset($_POST['submit'])){

                    $nama = ucwords($_POST['nama']);

                    $update = mysqli_query($conn, "UPDATE tb_category SET
                                            category_name = '".$nama."'
                                            WHERE category_id = '".$k->category_id."'  ");
                    if($update){
                        echo '<script>alert("Edit Data Berhasil")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                    }else{
                        echo 'gagal'.mysqli_error($conn);
                    }
                   }
                   ?>
                  <!-- End Profile Edit Form -->

            </div>

        </div><!-- End Right side columns -->

      </div>
      </div>
    </section>
    

  </main><!-- End #main -->

<?php require_once('layout/footer.php') ?>
  
</body>

</html>