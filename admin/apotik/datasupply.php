<?php 
session_start();

$_SESSION["judul"] = "Data Supplier";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM supplier");

require '../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Data Supplier</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Supplier</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <a href="tambahsupply.php" role="button" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-plus-square"></i>&nbsp Tambah Supplier</a><br><br>

            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>Kode Supplier</th>
                        <th>Nama</th>
                        <th>Alamat</th>
                        <th>No Telp</th>
                        <th>Perusahaan</th>
                        <th>Proses</th>
                    </tr>
                </thead>


                <tbody>
                    <?php foreach ($data as $dta) : ?>
                        <tr>
                            <td><?= $dta["kode_supplier"]?></td>
                            <td><?= $dta["nama"]?></td>
                            <td><?= $dta["alamat"]?></td>
                            <td><?= $dta["no_telp"]?></td>
                            <td><?= $dta["perusahaan"]?></td>
                            <td class="text-center" style="min-width: 100px;">
                                <a href="editsupply.php?id=<?= $dta["id"] ?>" class="btn btn-gradient waves-light waves-effect"><i class="fa fa-fw fa-edit"></i></a>
                                <a href="hapussupply.php?id=<?= $dta["id"] ?>" class="btn btn-danger waves-light waves-effect"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../../template/footer.php'; ?>