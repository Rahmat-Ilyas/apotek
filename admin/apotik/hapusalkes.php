<?php
session_start();

$_SESSION["Judul"] = "Hapus Alkes";

if (!isset($_SESSION["login_admin"]))
{
    header("location: ../../login.php");
    exit();
}   

    require '../../koneksi/koneksi.php';

    $id = $_GET["id"];

    
    if(!hapusalkes($id) > 0)
    {
        echo "<script>
        alert('Data berhasil di hapus!');
        document.location.href = 'dataalkes.php';
        </script>";
    }

    else {
            echo "<script>
            alert('Data gagal di hapus!');
            document.location.href = 'datasupply.php';
            </script>";
        }

?>