<?php
include 'db.php';
    session_start();
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }

    $produk = mysqli_query($conn, "SELECT * FROM tb_product WHERE product_id = '".$_GET['id']."' ");
    if(mysqli_num_rows($produk) == 0){
        echo '<script>window.location="data-produk.php"</script>';
    }
    $p = mysqli_fetch_object($produk);
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
      <h1>Edited Product</h1>
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
                                        <option value="<?php echo $r['category_id'] ?>" <?php echo($r['category_id'] == $p->category_id)?
                                            'selected':''; ?>><?php echo $r['category_name'] ?></option>
                                        <?php } ?>
                                </select>
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Nama Produk</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nama" class="form-control" 
                                        value="<?php echo $p->product_name?>" required>
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputText" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="text" name="harga" class="form-control"
                                        value="<?php echo $p->product_price?>" required>
                                </div>
                        </div>

                        <div class="row mb-3">
                            <label for="inputNumber" class="col-sm-2 col-form-label">Foto</label>
                                <div class="col-sm-10">
                                    <img src="produk/<?php echo $p->product_image ?>" width="200px">
                                    <input type="hidden" name="foto" value="<?php echo $p->product_image ?>">
                                    <br>
                                    <br>
                                    <input class="form-control" name="gambar" type="file" id="formFile">
                                </div>
                        </div>
                        <div class="row mb-3">
                            <label for="inputPassword" class="col-sm-2 col-form-label">Deskripsi</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" name="deskripsi" style="height: 100px">
                                        <?php echo $p->product_description?></textarea>
                                </div>
                        </div>

                        <div class="row mb-3">
                  <label class="col-sm-2 col-form-label">Status</label>
                  <div class="col-sm-10">
                    <select class="form-select" name="status" aria-label="Default select example">
                        <option value="">--Pilih--</option>
                        <option value="1" <?php echo($p->product_status == 1)? 'selected':''; ?>>Aktif</option>
                        <option value="0" <?php echo($p->product_status == 0)? 'selected':''; ?>>Tidak Aktif</option>
                    </select>
                  </div>
                </div>

                        <div class="modal-footer">
                        <button type="button" class="btn btn-secondary">Close</button>
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
                                        $foto      = $_POST['foto'];
        
                                    //menampung data file yang diupload
                                    $filename = $_FILES['gambar']['name'];
                                    $tmp_name = $_FILES['gambar']['tmp_name'];
        
                                   

                                    //jika admin ganti gambar
                                    if($filename != ''){

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

                                        unlink('./produk/'.$foto);
                                        move_uploaded_file($tmp_name, './produk/'.$newname);
                                        $namagambar = $newname;
                                    }

                            }else{
                                         //jika admin tidak ganti gambar
                                         $namagambar = $foto;
                            }
                                        //query update data produk
                                        $update = mysqli_query($conn, "UPDATE tb_product SET
                                        category_id = '".$kategori."',
                                        product_name = '".$nama."',
                                        product_price = '".$harga."',
                                        product_description = '".$deskripsi."',
                                        product_image = '".$namagambar."',
                                        product_status = '".$status."'
                                        WHERE product_id = '".$p->product_id."' ");
                                            if($update){
                                                echo '<script>alert("Edit Data Berhasil")</script>';
                                                echo '<script>window.location="data-produk.php"</script>';
                                            }else{
                                                echo 'gagal'.mysqli_error($conn);
                    }
                        }
                            ?>

                    </div>
                    </div>
                </div>
                </div>
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