<?php 
session_start();

$_SESSION["judul"] = "Tambah Artikel";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_artikel");

if (isset($_POST["submit"])){
  tambah_artikel($_POST);
}

require '../../template/header.php';


?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Apotik Madani</a></li>
                <li class="breadcrumb-item"><a href="#">Data Artikel</a></li>
                <li class="breadcrumb-item active">Tambah Artikel</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->


<div class="row">
    <div class="col-12"> 
        <div class="card-box">
            <div class="row">
                <div class="col-12">
                    <div class="p-20">
                    <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data" >

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Judul Artikel</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="judul">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Gambar</label>
                                <div class="col-10">
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-2 col-form-label">Konten</label>
                                <div class="col-10">
                                    <textarea id="elm1" name="konten"></textarea>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label class="col-2 col-form-label">Tanggal Buat</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" name="tgl_buat">
                                </div>
                            </div>
                        
                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="dataartikel.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../template/footer.php'; ?>