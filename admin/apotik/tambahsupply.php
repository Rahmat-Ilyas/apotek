<?php 
session_start();

$_SESSION["judul"] = "Tambah Supplier";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM supplier");

if (isset($_POST["submit"])){
  tambah_supplier($_POST);
}

require '../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Abstack</a></li>
                <li class="breadcrumb-item"><a href="#">Supplier Barang</a></li>
                <li class="breadcrumb-item active">Tambah Supplier</li>
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
                        <form class="form-horizontal" role="form" method="POST">
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Kode Supplier</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="" name="kode_supplier">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="nama">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Alamat</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="alamat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">No Telephone</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="no_telp">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Perusahaan</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="perusahaan">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="datasupply.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../template/footer.php'; ?>