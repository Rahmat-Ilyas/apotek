<?php
session_start();

$_SESSION["Judul"] = "Hapus Artikel";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}   

    require '../../koneksi/koneksi.php';

    $id = $_GET["id"];

    
    if(!hapusartikel($id) > 0)
    {
        echo "<script>
        alert('Data berhasil di hapus!');
        document.location.href = 'dataartikel.php';
        </script>";
    }

    else {
            echo "<script>
            alert('Data gagal di hapus!');
            document.location.href = 'dataartikel.php';
            </script>";
        }

?>