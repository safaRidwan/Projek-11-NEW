<?php
session_start();
include 'db.php';
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
      <h1>Category</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="data-kategori.php">Type</a></li>
          <li class="breadcrumb-item active">Category</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="">
          <div class="row">

          <div class="card">
            <div class="card-body">



<br>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah Kategori</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="POST">
                        <div class="mb-3">
                            <label for="recipient-name" class="col-form-label">nama kategori</label>
                            <input type="text" name="nama" class="form-control" id="recipient-name">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                        </form>

                        <?php 
                   if (isset($_POST['submit'])){

                    $nama = ucwords($_POST['nama']);

                    $insert = mysqli_query($conn, "INSERT INTO tb_category VALUES (       
                                        null,
                                        '".$nama."' )");
                    if($insert){
                        echo '<script>alert("Tambah Data Berhasil")</script>';
                        echo '<script>window.location="data-kategori.php"</script>';
                    }else{
                        echo 'gagal'.mysqli_error($conn);
                    }
                   }
                   ?>

                    </div>
                    </div>
                </div>
                </div>
<br>
<br>
              <!-- Primary Color Bordered Table -->
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th width="60px" scope="col">No</th>
                    <th scope="col">kategori</th>
                    <th width="150px" scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php 
                            $no = 1;
                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                            if(mysqli_num_rows($kategori) > 0){
                            while($row = mysqli_fetch_array($kategori)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['category_name'] ?></td>
                                <td>
                                    <a class="btn btn-warning" href="edit-kategori.php?id=<?php echo $row['category_id'] ?>">Edited</a> 
                                    
                                    <a class="btn btn-danger" href="proses-hapus.php?idk=<?php echo $row['category_id'] ?>"
                                        onclick="return confirm('Yakin Ingin Dihapus?')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <?php } }else{?>
                                <tr>
                                    <td colspan="3">Tidak ada data</td>
                                </tr>
                                <?php } ?>
                </tbody>
              </table>
              <!-- End Primary Color Bordered Table -->

            </div>
          </div>


        </div><!-- End Right side columns -->

      </div>
      </div>
    </section>

  </main><!-- End #main -->

<?php require_once('layout/footer.php') ?>
  
</body>

</html>