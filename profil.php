<?php
include 'db.php';
session_start();
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
$query = mysqli_query($conn, "SELECT * FROM tb_admin WHERE admin_id = '".$_SESSION['id']."' ");
$d = mysqli_fetch_object($query);
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
      <h1>Profile</h1>
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
                <div class="tab-pane fade profile-edit pt-3 active show" id="profile-edit" role="tabpanel">



                <?php 
                   if(isset($_POST['ubah_profil'])){

                    $nama = ucwords($_POST['nama']);
                    $user = $_POST['user'];
                    $hp = $_POST['hp'];
                    $email = $_POST['email'];
                    $alamat = ucwords($_POST['alamat']);

                    $update = mysqli_query($conn, "UPDATE tb_admin SET 
                        admin_name = '".$nama."',
                        username = '".$user."',
                        admin_telp = '".$hp."',
                        admin_email = '".$email."',
                        admin_address = '".$alamat."'
                        WHERE admin_id = '".$d->admin_id."' ");
                    if($update){
                        echo '<script>alert("Ubah Data Berhasil")</script>';
                        echo '<script>window.location="profil.php"</script>';
                    }else{
                        echo 'gagal'.mysqli_error($conn);
                    }
                   }
                   ?>


            <?php 
                   if(isset($_POST['ubah_password'])){

                    $pass1 = $_POST['pass1'];
                    $pass2 = $_POST['pass2'];

                    if($pass2 != $pass1){
                        echo '<script>alert("Konfirmasi Password Baru Tidak Sesuai")</script>';
                    }else{
                        $u_pass = mysqli_query($conn, "UPDATE tb_admin SET 
                                password = '".MD5($pass1)."'
                                WHERE admin_id = '".$d->admin_id."' ");
                        if($u_pass){
                            echo '<script>alert("Ubah Password Berhasil")</script>';
                            echo '<script>window.location="profil.php"</script>';
                        }else{
                            echo 'gagal'.mysqli_error($conn);
                        }     
                    }
                }
            ?>



                  <!-- Profile Edit Form -->
                  <form action="" method="POST" >
                    <div class="row mb-3">
                      <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                      <div class="col-md-8 col-lg-9">
                        <img src="NiceAdmin/assets/img/profile-img.jpg" alt="Profile">
                        <div class="pt-2">
                          <a href="#" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                          <a href="#" class="btn btn-danger btn-sm" title="Remove my profile image"><i class="bi bi-trash"></i></a>
                        </div>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="nama" type="text" class="form-control" id="fullName" value="<?php echo $d->admin_name ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Country" class="col-md-4 col-lg-3 col-form-label">Username</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="user" type="text" class="form-control" id="Country" value="<?php echo $d->username ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="alamat" type="text" class="form-control" id="Address" value="<?php echo $d->admin_address ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="hp" type="text" class="form-control" id="Phone" value="<?php echo $d->admin_telp ?>" required>
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="email" type="email" class="form-control" id="Email" value="<?php echo $d->admin_email ?>" required>
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="ubah_profil" class="btn btn-primary">Save Changes</button>
                    </div>
                  </form><!-- End Profile Edit Form -->

            </div>
          </div><!-- End News & Updates -->
          <div class="card-body pt-3">
                <div class="tab-pane fade pt-3 active show" id="profile-change-password" role="tabpanel">

                  <!-- Change Password Form -->
                  <form method="post">
                    <div class="row mb-3">
                      <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pass1" type="password" class="form-control" id="newPassword">
                      </div>
                    </div>

                    <div class="row mb-3">
                      <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                      <div class="col-md-8 col-lg-9">
                        <input name="pass2" type="password" class="form-control" id="renewPassword">
                      </div>
                    </div>

                    <div class="text-center">
                      <button type="submit" name="ubah_password" class="btn btn-primary">Change Password</button>
                    </div>
                  </form><!-- End Change Password Form -->

                </div>

              </div><!-- End Bordered Tabs -->

        </div><!-- End Right side columns -->

      </div>
      </div>
    </section>
    

  </main><!-- End #main -->

<?php require_once('layout/footer.php') ?>
  
</body>

</html>