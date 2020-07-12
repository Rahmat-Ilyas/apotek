<?php 
session_start();

$_SESSION["judul"] = "Edit Alkes";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM alkes");
$id=$_GET["id"];

$result=mysqli_query($conn,"SELECT * from alkes WHERE id=$id");

foreach ($result as $data) {
    $kode = $data["kode"];
    $nama = $data["nama"];
    $stok = $data["stok"];
    $harga = $data["harga"];
    $gambar = $data["gambar"];
    $perusahaan = $data["perusahaan"];
}

if (isset($_POST["submit"])) {
    $kode = $_POST["kode"];
    $nama = $_POST["nama"];
    $stok = $_POST["stok"];
    $harga = $_POST["harga"];
    $gambarlama = $_POST["gambarlama"];
    if ($_FILES['gambar']['error']===4) {
        $gambar = $gambarlama;
    }else{
        $gambar = uploadalkes();
    }
    $perusahaan = $_POST["perusahaan"];

    $query= "UPDATE alkes SET kode = '$kode', nama = '$nama', stok = '$stok' , harga = '$harga', gambar = '$gambar' , perusahaan = '$perusahaan' WHERE kode =$kode";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data Alkes Berhasil Diedit!');
        document.location.href='dataalkes.php';
    </script>";
}
else {
    echo "<script>
    alert('Gagal diedit!');
</script>";
echo mysqli_error($conn);
}
}
function uploadalkes() {

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
                <li class="breadcrumb-item"><a href="#">Data Alkes</a></li>
                <li class="breadcrumb-item active">Edit Alkes</li>
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
                                <label class="col-2 col-form-label">Kode</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $kode ?>" name="kode">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Nama</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $nama ?>" name="nama">
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
                                <label class="col-2 col-form-label">Gambar</label>
                                <div class="col-10">
                                    <img src="../img/<?=$gambar?>" width="10%">
                                    <input type="file" class="form-control" name="gambar">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Perusahaan</label>
                                <div class="col-10">
                                   <select class="form-control" name="perusahaan" value="<?= $perusahaan ?>">
                                    <!-- <option>-----Pilih Kategori Perusahaan-----</option> -->
                                     <?php foreach ($kel as $rtt) : ?>
                                       <option <?php if ($rtt["perusahaan"]==$perusahaan)echo "selected"; ?>>
                                           <?= $rtt["perusahaan"];?></option>   
                                   <?php endforeach; ?>  
                             </select>
                         </div>
                     </div>

                     <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                     <a href="dataalkes.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                 </form>
             </div>
         </div>

     </div>
     <!-- end row -->

 </div> <!-- end card-box -->
</div><!-- end col -->
</div>

<?php require '../../template/footer.php'; ?>