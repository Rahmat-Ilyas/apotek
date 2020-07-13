<?php

$conn = mysqli_connect("db4free.net", "rahmatilyas", "14-02-1998", "db_apotek");

$datareset = mysqli_query($conn, "SELECT * FROM tb_resep WHERE status='Belum Acc'");
$notif=[];
foreach ($datareset as $dta) {
	$notif[] = $dta['id'];

}

$notifikasi = $_SESSION['count'] = count($notif);

//Tambah data supplier
function tambah_supplier($data)
{
	global $conn;
	$kode_supplier = $data["kode_supplier"];
	$nama = $data["nama"];
	$alamat = $data["alamat"];
	$no_telp = $data["no_telp"];
	$perusahaan = $data["perusahaan"];

	$query = "INSERT INTO supplier VALUES ('', '$kode_supplier', '$nama', '$alamat', '$no_telp', '$perusahaan')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Data Supplier Berhasil ditambahkan!');
		document.location.href = 'datasupply.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

function hapussup($id)
{
	global $conn;

	$query = "DELETE FROM supplier Where id = $id";

	mysqli_query($conn, $query);
}

//Tambah data Apotik
function tambah_apotik($data)
{
	global $conn;
	$kd_obat = $data["kd_obat"];
	$nama_obat = $data["nama_obat"];
	$stok = $data["stok"];
	$harga = $data["harga"];
	$expired = $data["expired"];
	$kategori = $data["kategori"];
	$suply = $data["suply"];
	$gambar = upload();
	if (!$gambar) {
		return false; 
	}
	$guna = $data["guna"];
	$kandungan = $data["kandungan"];

	$query = "INSERT INTO apotik VALUES ('', '$kd_obat', '$nama_obat', '$stok', '$harga', '$expired', '$kategori', '$suply','$gambar','$guna','$kandungan')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Data Obat Berhasil ditambahkan!');
		document.location.href = 'dataapotik.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

function hapusapotik($id)
{
	global $conn;

	$query = "DELETE FROM apotik Where id = $id";

	mysqli_query($conn, $query);
}

//Tambah data Alkes
function tambah_alkes($data)
{
	global $conn;
	$kode = $data["kode"];
	$nama = $data["nama"];
	$stok = $data["stok"];
	$harga = $data["harga"];
	$suply = $data["suply"];
	$gambar = upload();
	if (!$gambar) {
		return false; 
	}
	


	$query = "INSERT INTO alkes VALUES ('', '$kode', '$nama', '$stok', '$harga','$suply', '$gambar' )";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Data Alkes Berhasil ditambahkan!');
		document.location.href = 'dataalkes.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

function hapusalkes($id)
{
	global $conn; 

	$query = "DELETE FROM alkes Where id = $id";

	mysqli_query($conn, $query);
}

//Tambah data supplier
function tambah_artikel($data)
{
	global $conn;
	$judul = $data["judul"];
	$gambar = upload();
	if (!$gambar) {
		return false; 
	}
	$konten = $data["konten"];
	$tgl_buat = $data["tgl_buat"];

	$query = "INSERT INTO tb_artikel VALUES ('', '$judul', '$gambar', '$konten', '$tgl_buat')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Data Artikel Berhasil ditambahkan!');
		document.location.href = 'dataartikel.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

function hapusartikel($id)
{
	global $conn;

	$query = "DELETE FROM tb_artikel Where id = $id";

	mysqli_query($conn, $query);
}

// UPload
function upload() {

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

//Tambah data supply
function tambah_supply($data)
{
	global $conn;
	$kode_supplier = $data["kode_supplier"];
	$nama = $data["nama"];
	$alamat = $data["alamat"];
	$no_telp = $data["no_telp"];
	$perusahaan = $data["perusahaan"];

	$query = "INSERT INTO supplier VALUES ('', '$kode_supplier', '$nama', '$alamat', '$no_telp', '$perusahaan')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Data Supplier Berhasil ditambahkan!');
		document.location.href = 'datasupply.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

function hapussupply($id)
{
	global $conn;

	$query = "DELETE FROM suply Where id = $id";

	mysqli_query($conn, $query);
}


//Transaksi
function tambah_transaksi($data)
{
	global $conn;
	$tgl_tr = $data["tgl_tr"];
	$kode_tr = $data["kode_tr"];
	$nama = $data["nama"];
	$harga = $data["harga"];
	$jumlah = $data["jumlah"];
	$total = $data["total"];

	$query = "INSERT INTO tb_transaksi VALUES ('','$tgl_tr', '$kode_tr', '$nama', '$harga', '$jumlah', '$total')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Anda Berhasil Melakukan Transaksi!');

		document.location.href = 'laporan.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

//Kritik Dan Sran
function tambah_ks($data)
{
	global $conn;
	$nama = $data["nama"];
	$email = $data["email"];
	$subjek = $data["subjek"];
	$pesan = $data["pesan"];

	$query = "INSERT INTO tb_ks VALUES ('', '$nama', '$email', '$subjek', '$pesan')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Terima Kasih Kritik / Saran Terhadap Apotik Kami!');

		document.location.href = 'contact.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}
//Resep
function tambah_resep($data)
{
	global $conn;
		$foto = uploadresep();
	if (!$foto) {
		return false; 
	}
	$status = "Belum Acc";

	$query = "INSERT INTO tb_resep VALUES ('', '$foto', '$status','','')";

	mysqli_query($conn, $query);

	if (mysqli_affected_rows($conn) > 0){
		echo "<script>
		alert('Resep Anda Berhasil Dikirim.Silahkan Tunggu Konfirmasi!');

		document.location.href = 'upload.php';
		</script>";
	}
	else {
		echo "<script>
		alert('Gagal ditambahkan!');
		</script>";
		echo mysqli_error($conn);
	}
}

function uploadresep() {

	$namaFile = $_FILES['foto']['name'];
	$ukuranFIle = $_FILES['foto']['size'];
	$error = $_FILES['foto']['error'];
	$tmpName = $_FILES['foto']['tmp_name'];

	//Cek Gambar

	if ($error === 4) {
		echo "<script>
				alert('Masukkan Foto Resep Terlebih Dahulu!!');
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

	$lokasi = "admin/img/resep/";
	
	move_uploaded_file($tmpName, $lokasi.$namaFileBaru);
	return $namaFileBaru;

}
?>
