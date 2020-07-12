<?php 
session_start();

$_SESSION["judul"] = "Edit Apotik";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM apotik");
$id=$_GET["id"];

$result=mysqli_query($conn,"SELECT * from apotik WHERE id=$id");

foreach ($result as $data) {
    $kd_obat = $data["kd_obat"];
    $nama_obat = $data["nama_obat"];
    $stok = $data["stok"];
    $harga = $data["harga"];
    $expired = $data["expired"];
    $kategori = $data["kategori"];
    $perusahaan = $data["perusahaan"];
    $gambar = $data["gambar"];
    $guna = $data["guna"];
    $kandungan = $data["kandungan"];
}

if (isset($_POST["submit"])) {
    $kd_obat = $_POST["kd_obat"];
    $nama_obat = $_POST["nama_obat"];
    $stok = $_POST["stok"];
    $harga = $_POST["harga"];
    $expired = $_POST["expired"];
    $kategori = $_POST["kategori"];
    $perusahaan = $_POST["perusahaan"];
    $gambarlama = $_POST["gambarlama"];
    if ($_FILES['gambar']['error']===4) {
        $gambar = $gambarlama;
    }else{
        $gambar = uploadobat();
    }
    $guna = $_POST["guna"];
    $kandungan = $_POST["kandungan"];

    $query= "UPDATE apotik SET kd_obat = '$kd_obat', nama_obat = '$nama_obat', stok = '$stok' , harga = '$harga' , expired = '$expired' , kategori = '$kategori', perusahaan = '$perusahaan',gambar = '$gambar', guna = '$guna', kandungan = '$kandungan' WHERE kd_obat =$kd_obat";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data Obat Berhasil Diedit!');
        document.location.href='dataapotik.php';
    </script>";
}
else {
    echo "<script>
    alert('Gagal diedit!');
</script>";
echo mysqli_error($conn);
}
}
function uploadobat() {

    $namaFile = $_FILES['gambar']['name'];
    $ukuranFIle = $_FILES['gambar']['size'];
    $error = $_FILES['gambar']['error'];
    $tmpName = $_FILES['gambar']['tmp_name'];

    //Cek Gambar

    if ($error === 4) {
        echo "<script>
        alert('Pilih Gambar Terlebih Dahulu!!');
    </script>";
    return false;
}
// cek file 
$ekstensiGambarValid = ['jpg','jpeg','png'];
$ekstensiGambar = explode('.', $namaFile);
$ekstensiGambar = strtolower(end($ekstensiGambar));
if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
    echo "<script>
    alert('File Bukan Gambar!!');
</script>";
return false;
}

    //cek Ukuran

if ($ukuranFIle>100000) {
    echo "<script>
    alert('Ukuran File Terlalu Besar!!');
</script>";
return false;
}
    //Nama File Sama
$namaFileBaru = uniqid();
$namaFileBaru .= '.';
$namaFileBaru .= $ekstensiGambar;
    //Upload File

$lokasi = "../img/";

move_uploaded_file($tmpName, $lokasi.$namaFileBaru);
return $namaFileBaru;

}

require '../../template/header.php';

$kel = mysqli_query($conn, "SELECT * FROM supplier");
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">

            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Abstack</a></li>
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
                        <form class="form-horizontal" role="form" method="POST" enctype="multipart/form-data">
                            <input type="hidden" value="<?= $gambar ?>" name="gambarlama">

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Kode Obat</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $kd_obat ?>" name="kd_obat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama Obat</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $nama_obat ?>" name="nama_obat">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Stok</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="stok" value="<?= $stok ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Harga</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="harga" value="<?= $harga ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Expired</label>
                                <div class="col-10">
                                    <input type="date" class="form-control" name="expired" value="<?= $expired ?>">
                                </div>
                            </div>

                            <div class="form-group row">
                            <label class="col-2 col-form-label">Kategori</label>
                            <div class="col-10">
                               <select class="form-control" name="kategori" value="<?= $kategori ?>">
                                    <?php
           
                                    if ($kategori == "Strip") echo "<option value='Strip' selected>Strip</option>";
                                   else echo "<option value='Strip'>Strip</option>";
                                
                                   if ($kategori == "Botol") echo "<option value='Botol' selected>Botol</option>";
                                   else echo "<option value='Botol'>Botol</option>";
                         
                                   if ($kategori == "Box") echo "<option value='Box' selected>Box</option>";
                                   else echo "<option value='Box'>Box</option>";   
                                   ?>
                              </select>
                           </div>
                       </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Perusahaan</label>
                                <div class="col-10">
                                 <select class="form-control" name="perusahaan" value="<?= $perusahaan ?>">
                                     <!--  <option>-----Pilih Kategori Perusahaan-----</option> -->
                                     <?php foreach ($kel as $rtt) : ?>
                                       <option <?php if ($rtt["perusahaan"]==$perusahaan)echo "selected"; ?>>
                                           <?= $rtt["perusahaan"];?></option>   
                                   <?php endforeach; ?>  
                               </select>
                           </div>
                       </div>

                       <div class="form-group row">
                        <label class="col-2 col-form-label">Gambar</label>
                        <div class="col-10">
                            <img src="../img/<?=$gambar?>" width="10%">
                            <input type="file" class="form-control" name="gambar">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Kegunaan</label>
                        <div class="col-10">
                            <textarea type="text" id="elm1" class="form-control" name="guna" ><?= $guna ?></textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-2 col-form-label">Kandungan</label>
                        <div class="col-10">
                            <textarea type="text" id="elm1" class="form-control" name="kandungan" ><?= $kandungan ?></textarea>
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