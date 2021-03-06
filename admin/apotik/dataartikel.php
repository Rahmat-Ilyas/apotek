<?php 
session_start();

$_SESSION["judul"] = "Data Artikel";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_artikel");

require '../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Data Artikel</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Artikel</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <a href="tambahartikel.php" role="button" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-plus-square"></i>&nbsp Tambah Artikel</a><br><br>

            <table id="datatable" class="table table-bordered">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Judul Artikel</th>
                        <th>Gambar</th>
                        <th>Konten</th>
                        <th>Tanggal</th>
                        <th>Proses</th>
                    </tr>
                </thead>


                <tbody>
                   <?php $i=1;?>
                    <?php foreach ($data as $dta) : ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><?= $dta["judul"]?></td>
                            <td><?= $dta["gambar"]?></td>
                            <td><?= $dta["konten"]?></td>
                            <td><?= $dta["tgl_buat"]?></td>
                            <td class="text-center" style="min-width: 100px;">
                                <a href="editartikel.php?id=<?= $dta["id"] ?>" class="btn btn-gradient waves-light waves-effect"><i class="fa fa-fw fa-edit"></i></a>
                                <a href="hapusartikel.php?id=<?= $dta["id"] ?>" class="btn btn-danger waves-light waves-effect"><i class="mdi mdi-delete"></i></a>
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