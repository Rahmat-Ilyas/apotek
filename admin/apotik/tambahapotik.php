<?php 
session_start();

$_SESSION["judul"] = "Tambah Obat";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM apotik");

if (isset($_POST["submit"])){
  tambah_apotik($_POST);
}

require '../../template/header.php';

$kel = mysqli_query($conn, "SELECT * FROM supplier");
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Apotik Madani</a></li>
                <li class="breadcrumb-item"><a href="#">Data Obat</a></li>
                <li class="breadcrumb-item active">Tambah Obat</li>
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
                        <form class="form-horizontal" role="form" method="POST" autocomplete="off" enctype="multipart/form-data">
                           <div class="form-group row">
                            <label class="col-2 col-form-label">Kode Obat</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="kd_obat" >
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-2 col-form-label">Nama Obat</label>
                            <div class="col-10">
                                <input type="text" class="form-control" value="" name="nama_obat">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Stok</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="stok">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Harga</label>
                            <div class="col-10">
                                <input type="text" class="form-control" name="harga">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Expired</label>
                            <div class="col-10">
                                <input type="date" class="form-control" name="expired">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-2 col-form-label">Kategori</label>
                            <div class="col-10">
                               <select class="form-control" name="kategori">
                                <option value="">---Pilih---</option>
                                <option value="Strip" >Strip</option>
                                <option value="Botol" >Botol</option>
                                <option value="Box" >Box</option>
                              </select>
                           </div>
                       </div>

                       <div class="form-group row">
                        <label class="col-2 col-form-label">Perusahaan</label>
                        <div class="col-10">
                         <select class="form-control" name="suply">
                            <option>-----Pilih Supplier -----</option>
                            <?php foreach ($kel as $rtt) : ?>
                               <option><?= $rtt["perusahaan"];?></option>   
                           <?php endforeach; ?>  
                       </select>
                   </div>
               </div>

               <div class="form-group row">
                <label class="col-2 col-form-label">Gambar</label>
                <div class="col-10">
                    <input type="file" class="form-control" name="gambar">
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label">Kegunaan</label>
                <div class="col-10">
                    <textarea type="text" id="elm1" class="form-control" name="guna" ></textarea>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-2 col-form-label">Kandungan</label>
                <div class="col-10">
                    <textarea type="text" id="elm1" class="form-control" name="kandungan" ></textarea>
               </div>
           </div>


           <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

           <a href="dataapotik.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

       </form>
   </div>
</div>

</div>
<!-- end row -->

</div> <!-- end card-box -->
</div><!-- end col -->
</div>

<?php require '../../template/footer.php'; ?>