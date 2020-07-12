<?php 
session_start();

$_SESSION["judul"] = "Data Resep";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_resep ORDER BY id DESC");

require '../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Data Resep</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Resep</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">

            <table id="datatable" class="table table-bordered" autocomplete="on">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Foto Resep</th>
                        <th>Status</th>
                        <th>Proses</th>
                    </tr>
                </thead>


                <tbody>
                <?php $i=1;?>
                    <?php foreach ($data as $dta) : ?>
                        <tr>
                            <td><?=$i?></td>
                            <td><img src="../img/resep/<?= $dta["foto"]?>" style="width:20%"></td>
                            <td><?= $dta["status"]?></td>
                            <td class="text-center" style="min-width: 100px;">
                                <a href="dataresep.php?id=<?= $dta["id"] ?>" class="btn btn-gradient waves-light waves-effect"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        <?php $i++;?>
                    <?php endforeach; ?>
                </tbody>
            </table>
            </table>
        </div>
    </div>
</div>

<?php require '../../template/footer.php'; ?>