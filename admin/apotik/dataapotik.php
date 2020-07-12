<?php 
session_start();

$_SESSION["judul"] = "Data Apotik";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM apotik");

require '../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Data Apotik</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Apotik</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <a href="tambahapotik.php" role="button" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-plus-square"></i>&nbsp Tambah Obat</a><br><br>

            <table id="datatable" class="table table-bordered" autocomplete="on">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode Obat</th>
                        <th>Nama Obat</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Expired</th>
                        <th>Kategori Obat</th>
                        <th>Perusahaan</th>
                        <th>Proses</th>
                    </tr>
                </thead>


                <tbody>
                <?php $i=1;?>
                    <?php foreach ($data as $dta) : ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?= $dta["kd_obat"]?></td>
                            <td><?= $dta["nama_obat"]?></td>
                            <td><?= $dta["stok"]?></td>
                            <td><?= $dta["harga"]?></td>
                            <td><?= $dta["expired"]?></td>
                            <td><?= $dta["kategori"]?></td>
                            <td><?= $dta["perusahaan"]?></td>
                            <td class="text-center" style="min-width: 100px;">
                                <a href="editapotik.php?id=<?= $dta["id"] ?>" class="btn btn-gradient waves-light waves-effect"><i class="fa fa-fw fa-edit"></i></a>
                                <a href="hapusapotik.php?id=<?= $dta["id"] ?>" class="btn btn-danger waves-light waves-effect"><i class="mdi mdi-delete"></i></a>
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