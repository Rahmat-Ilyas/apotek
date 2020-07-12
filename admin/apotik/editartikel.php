<?php 
session_start();

$_SESSION["judul"] = "Edit Artikel";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}
require '../../koneksi/koneksi.php';
$data = mysqli_query($conn, "SELECT * FROM tb_artikel");
$id=$_GET["id"];

$result=mysqli_query($conn,"SELECT * from tb_artikel WHERE id=$id");

foreach ($result as $data) {
    $judul = $data["judul"];
    $gambar = $data["gambar"];
    $konten = $data["konten"];
    $tgl_buat = $data["tgl_buat"];
}

if (isset($_POST["submit"])) {
    $judul = $_POST["judul"];
    $gambarlama = $_POST["gambarlama"];
    if ($_FILES['gambar']['error']===4) {
        $gambar = $gambarlama;
    }else{
        $gambar = upload1();
    }
    $konten = $_POST["konten"];
    $tgl_buat = $_POST["tgl_buat"];

    $query= "UPDATE tb_artikel SET judul = '$judul', gambar = '$gambar', konten = '$konten', tgl_buat = '$tgl_buat' WHERE id =$id";

    mysqli_query($conn, $query);

    if (mysqli_affected_rows($conn)>0){
        echo "<script>
        alert('Data Artikel Berhasil Diedit!');
        document.location.href='dataartikel.php';
        </script>";
    }
    else {
        echo "<script>
        alert('Gagal diedit!');
        </script>";
        echo mysqli_error($conn);
    }
}

function upload1() {

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
?>

<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            
            <ol class="breadcrumb float-right">
                <li class="breadcrumb-item"><a href="#">Apotik Madani</a></li>
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
                                <label class="col-2 col-form-label">Judul</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" value="<?= $judul ?>" name="judul">
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
                                <label class="col-2 col-form-label">Konten</label>
                                <div class="col-10">
                                <textarea type="text" id="elm1" class="form-control" name="konten" ><?= $konten ?></textarea>
                                    <!-- <input type="text" class="form-control" name="konten" value="<?= $konten ?>"> -->
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-2 col-form-label">Tanggal Buat</label>
                                <div class="col-10">
                                    <input type="text" class="form-control" name="tgl_buat" value="<?= $tgl_buat ?>">
                                </div>
                            </div>

                            <button type="submit" name="submit" class="btn btn-gradient waves-light waves-effect w-md"><i class="fa fa-save"></i>&nbsp&nbspSimpan</button>

                            <a href="dataartikel.php" role="button" class="btn btn-danger waves-light waves-effect w-md"><i class="fa fa-times-circle"></i>&nbsp&nbsp Batal</a> <br> <br>

                        </form>
                    </div>
                </div>

            </div>
            <!-- end row -->

        </div> <!-- end card-box -->
    </div><!-- end col -->
</div>

<?php require '../../template/footer.php'; ?>