<?php 
session_start();

$_SESSION["judul"] = "Data Konfirmasi";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE status = 'waiting'");

foreach ($data as $dta) {
    $nama = $dta["nama"];
    $get_jumlah = $dta["jumlah"];


    if (isset($_GET['proses'])) {
        if ($_GET['proses']=="konfirmasi") {
           $id = $_GET['id'];
           $status = "acc";
           $status_batal = "cancel";


           mysqli_query($conn, "UPDATE tb_transaksi SET status='$status' WHERE id=$id");
           header("location: konfirmasi.php"); 
       }
       if ($_GET['proses']=="batal") {
        $id = $_GET['id'];
        $status_batal = "cancel";
        mysqli_query($conn, "UPDATE tb_transaksi SET status='$status_batal' WHERE id=$id");
        $data_apotik = mysqli_query($conn, "SELECT * FROM apotik WHERE nama_obat = '$nama' ");
        if (mysqli_num_rows($data_apotik) == 1){
            $datax = mysqli_fetch_assoc($data_apotik);
            $id = $datax["id"];
            $stok = $datax["stok"];
            $stok_fix = $get_jumlah + $stok;

            mysqli_query($conn, "UPDATE apotik SET stok = '$stok_fix' WHERE id=$id");
            header("location: konfirmasi.php"); 
        }

        $data_alkes = mysqli_query($conn, "SELECT * FROM alkes WHERE nama = '$nama' ");
        if (mysqli_num_rows($data_alkes) == 1){
            $datay = mysqli_fetch_assoc($data_alkes);
            $id = $datay["id"];
            $stok = $datay["stok"];
            $stok_fix = $get_jumlah + $stok;
            
            mysqli_query($conn, "UPDATE alkes SET stok = '$stok_fix' WHERE id=$id");
            header("location: konfirmasi.php"); 
        }
    }
}
}



require '../../template/header.php';
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Data Konfirmasi</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Konfirmasi</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <form method="POST" role="form">
                <table id="datatable" class="table table-bordered" autocomplete="on">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Kode Transaksi</th>
                            <th>Nama Obat / Alkes</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Status</th>
                            <th>Proses</th>
                        </tr>
                    </thead>


                    <tbody>
                        <?php $i=1;?>
                        <?php foreach ($data as $dta) : ?>
                            <tr>
                                <td><?=$i?></td>
                                <td><?= date('d M Y', strtotime($dta['tgl_tr'])) ?></td>
                                <td><?= $dta["kode_tr"]?></td>
                                <td><?= $dta["nama"]?></td>
                                <td><?= $dta["harga"]?></td>
                                <td><?= $dta["jumlah"]?></td>
                                <td><b><?= $dta["total"]?></b></td>
                                <td><?= $dta["status"]?></td>
                                <td class="text-center" style="min-width: 100px;">
                                    <a href="konfirmasi.php?id=<?= $dta["id"] ?>&proses=konfirmasi" class="btn btn-gradient waves-light waves-effect"><i class="fa  fa-paper-plane"></i></a>
                                    <a href="konfirmasi.php?id=<?= $dta["id"] ?>&proses=batal " class="btn btn-danger waves-light waves-effect"><i class="fa fa-times-circle"></i></a>
                                </td>
                            </tr>
                            <?php $i++;?>
                        <?php endforeach; ?>
                    </tbody>
                </form>
            </table>
        </div>
    </div>
</div>

<?php require '../../template/footer.php'; ?>