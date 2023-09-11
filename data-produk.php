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
  <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>
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
      <h1>Product</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="data-kategori.php">Barang</a></li>
          <li class="breadcrumb-item active">Komoditas</li>
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

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tambah Produk</button>

                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">New Product</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <form method="POST" enctype="multipart/form-data">
                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-10">
                                <select class="form-select" name="kategori" aria-label="Default select example">
                                    <option selected="">-- pilih --</option>
                                        <?php 
                                            $kategori = mysqli_query($conn, "SELECT * FROM tb_category ORDER BY category_id DESC");
                                            while($r = mysqli_fetch_array($kategori)){
                                        ?>
                                        <option value="<?php echo $r['category_id'] ?>"><?php echo $r['category_name'] ?></option>
                                        <?php } ?>
                                </select>
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" required>
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="text" name="harga" class="form-control" required>
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <input class="form-control" name="gambar" type="file" id="formFile" required>
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="deskripsi" style="height: 100px"></textarea>
                                </div>
                        </div>

                        <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="status" aria-label="Default select example">
                      <option selected="">-- pilih --</option>
                      <option value="1">Aktif</option>
                      <option value="0">Tidak Aktif</option>
                    </select>
                  </div>
                </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" name="submit" class="btn btn-primary">Save</button>
                    </div>
                        </form>

                        <?php 
                            if (isset($_POST['submit'])){

                            // print_r($_FILES['gambar]);
                            //menampung inputan dari form
                                $kategori    = $_POST['kategori'];
                                $nama        = $_POST['nama'];
                                $harga       = $_POST['harga'];
                                $deskripsi   = $_POST['deskripsi'];
                                $status      = $_POST['status'];

                            //menampung data file yang diupload
                            $filename = $_FILES['gambar']['name'];
                            $tmp_name = $_FILES['gambar']['tmp_name'];

                            $type1 = explode('.',$filename);
                            $type2 = $type1[1];

                            $newname = 'produk'.time().'.'.$type2;

                            //menampung data format fil yang diizinkan
                            $tipe_diizinkan = array('jpg','jpeg','png','gif');

                            //validasi format file
                            if(!in_array($type2, $tipe_diizinkan)){
                                //jika format file tidak ada didalam tipe diizinkan
                                echo '<script>("Format File tidak diizinkan")</script>';

                            }else{
                                //jika format file sesuai dengan yang ada didalam array tipe diizinkan
                                //proses upload file sekaligus insert ke database
                                move_uploaded_file($tmp_name, './produk/'.$newname);

                                $insert = mysqli_query($conn, "INSERT INTO tb_product VALUES (
                                null,
                                '".$kategori."', 
                                '".$nama."',
                                '".$harga."',  
                                '".$deskripsi."',  
                                '".$newname."',  
                                '".$status."',
                                null   
                                )");

                                if($insert){
                                    echo '<script>alert("Tambah Data Berhasil")</script>';
                                    echo '<script>window.location="data-produk.php"</script>';
                                }else{
                                    echo 'gagal'.mysqli_error($conn);
                                }
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
                    <th width="50px" scope="col">No</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Status</th>
                    <th width="150px" scope="col">Aksi</th>
                  </tr>
                </thead>
                <tbody>

                <?php 
                            $no = 1;
                            $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id)
                                ORDER BY product_id DESC");
                            if(mysqli_num_rows($produk) > 0){
                            while($row = mysqli_fetch_array($produk)){
                            ?>
                            <tr>
                                <td><?php echo $no++ ?></td>
                                <td><?php echo $row['category_name'] ?></td>
                                <td><?php echo $row['product_name'] ?></td>
                                <td>Rp. <?php echo number_format($row['product_price']) ?></td>

                                <td> <a href="produk/<?php echo $row['product_image'] ?>" target="_blank"> 
                                <img src="produk/<?php echo $row['product_image'] ?>" width="90px"></a></td>

                                <td><?php echo ($row['product_status'] == 0)? 'Tidak Aktif':'Aktif'; ?></td>
                                <td>
                                    <a class="btn btn-warning" href="edit-produk.php?id=<?php echo $row['product_id'] ?>">Edited</a> 
                                     
                                    <a class="btn btn-danger" href="proses-hapus.php?idp=<?php echo $row['product_id'] ?>"
                                        onclick="return confirm('Yakin Ingin Dihapus?')"><i class="bi bi-trash"></i></a>
                                </td>
                            </tr>
                            <?php }}else{ ?>
                                    <tr>
                                        <td colspan="7">Tidak Ada Data</td>
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
    <script>
        CKEDITOR.replace( 'deskripsi' );
    </script>

<?php require_once('layout/footer.php') ?>
  
</body>

</html>