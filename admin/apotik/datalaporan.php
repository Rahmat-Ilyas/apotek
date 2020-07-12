<?php 
session_start();

$_SESSION["judul"] = "Data Laporan";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';

// $data = mysqli_query($conn, "SELECT * FROM tb_transaksi");

$all = ''; $day = ''; $mon = '';
if (isset($_GET['value'])) {
  $value = $_GET['value'];
  $data = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE status ='acc' AND tgl_tr LIKE '%$value%'");

  if (strlen($value) > 3) {
    $day = "selected";
}
else if (strlen($value) == 3) {
    $mon = "selected";
}

}
else {
  $data = mysqli_query($conn, "SELECT * FROM tb_transaksi WHERE status ='acc' ");
}
require '../../template/header.php';
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <h4 class="page-title float-left">Data Laporan</h4>

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Master Data</a></li>
                <li class="breadcrumb-item active">Data Laporan</li>
            </ol>

            <div class="clearfix"></div>
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-12">
        <div class="card-box table-responsive">
            <form class="form-horizontal" role="form" method="">
                <div class="row">
                  <div class="col-sm-4 ">
                    <div class="form-group">
                      <label class="col-sm-6 control-label">Jenis Laporan</label>
                      <div class="col-sm-6">
                        <select class="form-control" id="pilihan">
                          <option <?= $all ?> value="all">Semua Data</option>
                          <option <?= $day ?> value="day">Data Harian</option>
                          <option <?= $mon ?> value="mon">Data Bulanan</option>
                      </select>
                  </div>
              </div>
          </div>

          <div hidden id="day" class="col-sm-4">
            <div class="form-group">
              <label class="col-sm-6 control-label">Tanggal</label>
              <div class="col-sm-6">
                <input type="date" class="form-control" id="tanggal" value="" required>
            </div>
        </div>
    </div>

    <div hidden id="mon" class="col-sm-4">
        <div class="form-group">
          <label class="col-sm-6 control-label">Bulan</label>
          <div class="col-sm-6">
            <select class="form-control" id="bulan">
              <option value="">---Pilih Bulan---</option>
              <option value="01">Januari</option>
              <option value="02">Februari</option>
              <option value="03">Maret</option>
              <option value="04">April</option>
              <option value="05">Mei</option>
              <option value="06">Juni</option>
              <option value="07">Juli</option>
              <option value="08">Agustus</option>
              <option value="09">September</option>
              <option value="10">Oktober</option>
              <option value="11">November</option>
              <option value="12">Desember</option>
          </select>
      </div>
  </div>
</div>
</div>
</form>


<table id="datatable-buttons" class="table table-bordered" autocomplete="on">
    <thead>
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Kode Transaksi</th>
            <th>Nama Obat / Alkes</th>
            <th>Harga</th>
            <th>Jumlah</th>
            <th>Total</th>
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
                <td><?= $dta["total"]?></td>
            </tr>
            <?php $i++;?>
        <?php endforeach; ?>
    </tbody>
</table>
</div>
</div>
</div>


<?php require '../../template/footer.php'; ?>
