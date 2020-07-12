<?php 
session_start();

$_SESSION["judul"] = "Edit Supplier";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM supplier");
$id=$_GET["id"];

$result=mysqli_query($conn,"SELECT * from supplier WHERE id=$id");

foreach ($result as $data) {
    $kode_supplier = $data["kode_supplier"];
    $nama = $data["nama"];
    $alamat = $data["alamat"];
    $no_telp = $data["no_telp"];
    $perusahaan = $data["perusahaan"];
}

if (isset($_POST["submit"])) {
    $kode_supplier = $_POST["kode_supplier"];
    $nama = $_POST["nama"];
    $alamat = $_POST["alamat"];
    $no_telp = $_POST["no_telp"];
    $perusahaan = $_POST["perusahaan"];

    $query= "UPDATE supplier SET kode_supplier = '$kode_supplier', nama = '$nama', alamat = '$alamat', no_telp = '$no_telp', perusahaan = '$perusahaan' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data Supplier Berhasil Diedit!');
        document.location.href='datasupply.php';
        </script>";
    }
    else {
        echo "<script>
        alert('Gagal diedit!');
        </script>";
        echo mysqli_error($conn);
    }
}

require '../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Apotik Madani</a></li>
                <li class="breadcrumb-item"><a href="#">Data Supplier</a></li>
                <li class="breadcrumb-item active">Edit Supplier</li>
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
                                    <input type="text" class="form-control" value="<?= $kode_supplier ?>" name="kode_supplier">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="nama" value="<?= $nama ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Alamat</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="alamat" value="<?= $alamat ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">No Telp</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="no_telp" value="<?= $no_telp ?>">
                                </div>
                            </div>

                           
                            <div class="form-group row">
                                <label class="col-2 col-form-label">Perusahaan</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="perusahaan" value="<?= $perusahaan ?>">
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