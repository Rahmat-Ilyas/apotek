<?php
session_start();
if (isset($_SESSION['keranjang'])) {
    $data = $_SESSION['keranjang'];
    if (isset($_GET['hapus'])) {
        unset($_SESSION['keranjang']);
        unset($_SESSION['transaksi']);
        header('location: index.php');
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Abstack - Responsive Web App Kit</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!-- App favicon -->
    <link rel="shortcut icon" href="/medik_rev/asset/images/reski.png">

    <!-- App css -->
    <link href="asset/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="asset/css/icons.css" rel="stylesheet" type="text/css" />
    <link href="asset/css/metismenu.min.css" rel="stylesheet" type="text/css" />
    <link href="asset/css/style.css" rel="stylesheet" type="text/css" />

    <script src="asset/js/modernizr.min.js"></script>

</head>


<body id="content">

    <!-- Begin page -->
    <div id="wrapper">
      <div class="content-page">
          <!--   <div class="content"> -->
              <div class="container-fluid">
                <div class="row mt-5">
                    <div class="col-md-10">
                        <div class="card-box">
                            <div class="clearfix">
                                <div class="pull-left">
                                    <img src="assetFront/images/reski.png" alt="" height="80px">
                                </div>
                                <div class="pull-right">
                                    <h4 class="m-0 d-print-none">Invoice</h4>
                                </div>
                            </div>

                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="pull-left mt-3">
                                      <address>
                                          <strong>Apotik Madani Farma</strong><br>
                                          Jl. Bontotangnga No.50, Paccinongang <br>
                                          Kec. Somba Opu, Kabupaten Gowa <br>
                                          Sulawesi Selatan, 90245, Indonesia<br>
                                          <abbr title="Phone">P:</abbr> (0411) 582582
                                      </address>

                                  </div>

                              </div>
                              <div class="col-4 offset-2">
                                <div class="mt-3 pull-right">
                                    <p class="m-b-10"><strong>Tanggal : </strong><?=date('d-m-Y')?></p>
                                    <p class="m-b-10"><strong>Kode Transaksi: </strong> <span class="badge badge-success"><?= $_SESSION['transaksi']["kode_tr"]?></span></p>
                                </div>
                            </div>
                        </div>


                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table class="table mt-4">
                                        <thead>
                                            <tr><th>#</th>
                                                <th>Kode Transaksi</th>
                                                <th>Nama</th>
                                                <th>Jumlah</th>
                                                <th>Harga</th>
                                                <th>Total</th>
                                            </tr></thead>
                                            <tbody>
                                                <?php $i=1;?>
                                                <?php foreach ($data as $dta) : 

                                                    $total = $dta['jumlah'] * $dta['harga'];
                                                    $count[] = $total;

                                                    $biaya_admin = 0;
                                                    if (isset($dta['biaya_admin'])) {
                                                        $biaya_admin = $dta['biaya_admin'];
                                                    }
                                                    ?>

                                                    <tr>
                                                        <td><?=$i?></td>
                                                        <td><?= $_SESSION['transaksi']["kode_tr"]?></td>
                                                        <td><?= $dta["nama"]?></td>
                                                        <td><?= $dta["jumlah"]?></td>
                                                        <td><?= $dta["harga"]?></td>
                                                        <td><?= $total?></td>
                                                    </tr>
                                                    <?php $i++;?>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="clearfix pt-2">
                                        <h5 class="text-muted">Info!!:</h5>

                                        <small><b>
                                            1.Halaman Struk ini dapat anda print / foto , sebagai bukti order 
                                            dan perlihatkan ketika anda ingin mengambil obat di apotik kami.
                                        </b><br>
                                        2.Transaksi akan dibatalkan secara otomatis setelah <b>1x24 jam</b>
                                    </small>
                                    <!-- <small>Transaksi Akan dibatalkan secara otomatis,setelah <b>1x24 jam<b></small> -->
                                    </div>

                                </div>
                                <div class="col-6 text-right">
                                    <div class="row">
                                        <div class="col-md-8">Sub Total :</div>
                                        <div class="col-md-4">Rp. <?= array_sum($count) ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">Biaya Admin :</div>
                                        <div class="col-md-4">Rp. <?= $biaya_admin ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-8">Total Bayar :</div>
                                        <div class="col-md-4"><b style="font-size: 20px;">Rp.<?= array_sum($count) + $biaya_admin ?></b></div>
                                    </div>
                                </div>
                            </div>

                            <div class="hidden-print mt-4 mb-4">
                                <div class="text-right">
                                    <a href="laporan.php?hapus=true" class="btn btn-info waves-effect waves-light">Kembali</a>
                                    <a href="javascript:window.print()" class="btn btn-primary waves-effect waves-light"><i class="fa fa-print m-r-5"></i> Print</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div> <!-- container -->
        </div> <!-- content -->
    </div>
    <!--   </div> -->
    <!-- END wrapper -->



    <!-- jQuery  -->
    <script src="asset/js/jquery.min.js"></script>
    <script src="asset/js/popper.min.js"></script>
    <script src="asset/js/bootstrap.min.js"></script>
    <script src="asset/js/metisMenu.min.js"></script>
    <script src="asset/js/waves.js"></script>
    <script src="asset/js/jquery.slimscroll.js"></script>

    <!-- App js -->
    <script src="asset/js/jquery.core.js"></script>
    <script src="asset/js/jquery.app.js"></script>

</body>
</html>