<?php 
session_start();

$_SESSION["judul"] = "Data Alkes";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM alkes");

require '../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Data Alkes</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Alkes</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <a href="tambahalkes.php" role="button" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-plus-square"></i>&nbsp Tambah Alkes</a><br><br>

            <table id="datatable" class="table table-bordered" autocomplete="on">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Alkes</th>
                        <th>Nama Alkes</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Perusahaan</th>
                        <th>Proses</th>
                    </tr>
                </thead>


                <tbody>
                <?php $i=1;?>
                    <?php foreach ($data as $dta) : ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?= $dta["kode"]?></td>
                            <td><?= $dta["nama"]?></td>
                            <td><?= $dta["stok"]?></td>
                            <td><?= $dta["harga"]?></td>
                            <td><?= $dta["perusahaan"]?></td>
                            <td class="text-center" style="min-width: 100px;">
                                <a href="editalkes.php?id=<?= $dta["id"] ?>" class="btn btn-gradient waves-light waves-effect"><i class="fa fa-fw fa-edit"></i></a>
                                <a href="hapusalkes.php?id=<?= $dta["id"] ?>" class="btn btn-danger waves-light waves-effect"><i class="mdi mdi-delete"></i></a>
                            </td>
                        </tr>
                        <?php $i++;?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php require '../../template/footer.php'; ?>