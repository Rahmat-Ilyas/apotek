-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2019 pada 16.04
-- Versi server: 10.1.39-MariaDB
-- Versi PHP: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `madani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id` int(11) NOT NULL,
  `id_akun` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id`, `id_akun`, `username`, `password`) VALUES
(1, 1, 'admin', '$2y$10$Ox5esXmqfdfjX/DZlDHERunGJQqYaXcWdMX7RdS4m41ejcHt28iWK'),
(2, 2, 'staff', 'D4zYwJjwGEsg2'),
(3, 3, 'pimpinan', '$2y$10$8vtsZzZVZQbwu3aRBiCT5O4sAfi5LVoI0uRMFnKPkpdjE21v15m5y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `alkes`
--

CREATE TABLE `alkes` (
  `id` int(11) NOT NULL,
  `kode` varchar(25) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `perusahaan` varchar(25) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `alkes`
--

INSERT INTO `alkes` (`id`, `kode`, `nama`, `stok`, `harga`, `perusahaan`, `gambar`) VALUES
(8, '0001', 'Stetoskop', 52, 150000, 'PT.Maju Terus', '5d676380f31fc.jpg'),
(9, '0002', 'Alat Suntik', 30, 50000, 'PT.MSS', '5d67639374850.jpg'),
(10, '0003', 'Tensimeter ', 10, 200000, 'PT.MSS', '5d6794918ab37.jpg'),
(11, '0004', 'Termometer', 25, 50000, 'PT.Maju Terus', '5d6795468853c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `apotik`
--

CREATE TABLE `apotik` (
  `id` int(11) NOT NULL,
  `kd_obat` varchar(25) NOT NULL,
  `nama_obat` varchar(25) NOT NULL,
  `stok` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `expired` date NOT NULL,
  `kategori` varchar(25) NOT NULL,
  `perusahaan` varchar(25) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `guna` varchar(300) NOT NULL,
  `kandungan` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `apotik`
--

INSERT INTO `apotik` (`id`, `kd_obat`, `nama_obat`, `stok`, `harga`, `expired`, `kategori`, `perusahaan`, `gambar`, `guna`, `kandungan`) VALUES
(21, '0006', 'Amlodipin 5mg', 275, 15000, '2019-12-31', 'Box', 'PT.MSS', '5d634b0bd00e3.jpg', '<p>Amlodipine adalah obat untuk mengatasi hipertensi atau tekanan darah tinggi. Obat ini juga bisa digunakan untuk membantu mengatasi serangan angina pectoris atau angin duduk.</p>', '<p>Amiodarone, atazanavir, ceritinib, clarithromycin, clopidogrel, conivaptan, cyclosporine, dantrolene, digoxin, domperidone, droperidol, eliglustat, idelalisib, lacosamide, piperaquine, simvastatin, tacrolimus, tegafur, dan telaprevir.</p>'),
(22, '0007', 'Paracetamol', 315, 12000, '2019-12-31', 'Botol', 'PT.MSS', '5d54d3f49339c.jpg', '<p>Paracetamol mengurangi rasa sakit dengan cara menurunkan produksi zat dalam tubuh yang disebut prostaglandin.</p>', '<p>Prostaglandin adalah unsur yang dilepaskan tubuh sebagai reaksi terhadap kerusakan jaringan atau infeksi, yang memicu terjadinya peradangan, demam, dan rasa nyeri. Paracetamol menghalangi produksi prostaglandin, sehingga rasa sakit dan demam berkurang.</p>'),
(25, '0008', 'Paramex', 15, 15000, '2019-08-18', 'Strip', 'PT.Maju Terus', '5d634b23c8fcc.jpg', '<p>Paramex adalah obat untuk mengobati sakit kepala dan demam.</p>', '<p>Paramex mengandung kafein, dexchlorpheniramine maleate, paracetamol dan propyphenazone.</p>'),
(27, '0009', 'Bodrex', 295, 7000, '2019-12-31', 'Strip', 'PT.Kimia', '5d63521fae387.jpg', '<p>Umumnya, di dalam tiap kaplet bodrex terdapat kandungan Paracetamol, Phenylephrine HCl, dan Dextromethorphan.</p>', '<p>Bodrex adalah obat analgesik untuk mengobati sakit kepala, demam, dan flu.Selain itu, bodrex adalah obat yang biasanya digunakan untuk mengobati rasa sakit ringan hingga sedang, mulai dari sakit kepala, nyeri haid, sakit gigi, nyeri sendi, dan nyeri yang dirasakan selama flu, demam dan sakit kepa'),
(28, '0010', 'Decolsin', 120, 21000, '2020-01-31', 'Botol', 'PT.Maju Terus', '5d7f912739067.jpg', '<div>\r\n<div class=\"property-container col-lg-12 col-md-12\">\r\n<div class=\"drug-detail col-md-12 mb-lg-4\">\r\n<div>Obat ini dapat menyebabkan kantuk. Jangan mengendarai kendaraan bermotor atau menjalankan mesin.</div>\r\n</div>\r\n</div>\r\n</div>\r\n<div>&nbsp;</div>', '<p>DECOLSIN SIRUP mengandung zat aktif Paracetamol, Guaiphenesin, Phenylpropanolamine, Ethylephedrine, Chlorpheniramine maleat, dan Dextromethorphan HBr. Obat ini digunakan untuk mengatasi gejala flu seperti demam, sakit kepala, bersin-bersin dan hidung tersumbat yang disertai batuk.</p>');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_obat`
--

CREATE TABLE `kategori_obat` (
  `id` int(11) NOT NULL,
  `kategori` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_obat`
--

INSERT INTO `kategori_obat` (`id`, `kategori`) VALUES
(1, 'sirup'),
(2, 'tablet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id` int(11) NOT NULL,
  `kode_supplier` varchar(5) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(30) NOT NULL,
  `no_telp` varchar(15) NOT NULL,
  `perusahaan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id`, `kode_supplier`, `nama`, `alamat`, `no_telp`, `perusahaan`) VALUES
(1, '001', 'Madani', 'Jalan Bontaz', '08912345678', 'PT.Maju Terus'),
(2, '002', 'Reski', 'Jalan Abdesir', '089123456789', 'PT.MSS'),
(4, '003', 'Ahmad', 'Makassar', '081354558087', 'PT.Kimia');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_artikel`
--

CREATE TABLE `tb_artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `konten` varchar(9000) NOT NULL,
  `tgl_buat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_artikel`
--

INSERT INTO `tb_artikel` (`id`, `judul`, `gambar`, `konten`, `tgl_buat`) VALUES
(23, 'Kesehatan Mata Manusia', '5d63480977e97.jpg', '<p><strong>Mata</strong>&nbsp;adalah panca indera manusia yang sangat penting/esensial. Dapat dibayangkan jika kita mengalami kerusakan mata atau kebutaan, kita tidak dapat menikmati dan merasakan betapa indahnya alam semesta ini.</p>\r\n<p>Kenyataannya kita sering lupa untuk melakukan&nbsp;<em>perawatan mata</em>, padahal seperti halnya bagian tubuh yang lain, mata mungkin saja terkena gangguan atau masalah kesehatan. Gangguan-ganguan tersebut bisa disebabkan oleh udara yang tidak bersih atau terpolusi, radiasi sinar matahari, radiasi akibat terlalu lama di depan komputer, dan gangguan-gangguan lainnya.</p>\r\n<p>Studi yang dilakukan oleh Eye Disease Prevalence Research Group (2004) memperkirakan bahwa pada tahun 2020 jumlah penderita penyakit mata dan kebutaan di dunia akan mencapai 55 juta jiwa. Studi ini menyebutkan juga bahwa penyakit mata dan kebutaan akan meningkat terutama bagi mereka yang telah berumur diatas 65 tahun. Seseorang yang berumur 80 tahun ke atas yang merupakan 8% dari total penduduk, mengalami kebutaan sebanyak 69%.</p>\r\n<p>Gangguan kesehatan mata yang umum terjadi adalah penurunan fungsi penglihatan, gejala mata merah tanpa ada penurunan fungsi penglihatan, dan mata merah dengan fungsi penglihatan turun. Sampai saat ini, penyakit mata yang banyak diderita adalah katarak, glukoma, dan infeksi.</p>\r\n<p>Sampai saat ini aktivitas antioksidan dari senyawa lutein, zeaxanthin, dan astaxanthin memberi jawaban mekanisme terjadinya peningkatan kesehatan mata. Radikal bebas yang berasal dari sinar UV atau cemaran udara, masuk ke mata mengakibatkan terjadinya reaksi oksidasi molekul-molekul rentan pada lensa mata.</p>', '2019-08-19'),
(24, 'Artikel kesehatan gigi dan mulut untuk segala usia', '5d60baff7f6d9.jpg', '<p>Gigi dan gusi merupakan bagian tubuh yang memiliki peranan yang penting dalam berjanya organ tubuh kita karena konsumsi makanan melalui mulut diproses dengan cara mengunyah, dan gigi merupakan bagian tubuh pertama kali yang berfungsi untuk menghancurkan makanan sebelum mauk ke proses pencernaan. Dalam postingan ini kami akan menyajikan&nbsp;<strong>artikel kesehatan gigi</strong>, yang mencakup perawatan gigi dan menjaga kebersihan gigi dan gusi serta mencakup kesehatan mulut.</p>\r\n<p>Poster kesehatan gigi</p>\r\n<p>Apakah kebersihan mulut baik ?</p>\r\n<p>Kebersihan mulut sangat baik karena dari sinilah makanan masuk kedalam tubuh kita, kebersihan mulut dapat terlihat dari dalam mulut serta bau yang sehat. Ini berarti bahwa :</p>\r\n<p>Gigi Anda bersih dan tidak ada sampah makanan<br />Gusi memiliki warna merah muda dan tidak sakit atau tidak berdarah saat Anda menyikat atau flossing.</p>\r\n<p>Bau mulut bukanlah masalah konstan</p>\r\n<p>Jika gusi Anda terluka atau berdarah saat Anda menyikat atau flossing, atau Anda mengalami bau mulut persisten , segeralah pergi ke dokter gigi untuk melakukan pemeriksaan karena setiap dari infeksi dari gigi dan gusi menunjukkan adanya masalah .</p>\r\n<p>Dokter gigi atau ahli kesehatan akan membantu dalam mengembangkan teknik kebersihan mulut yang baik dan mengajarkan pada Anda untuk mengidentifikasi daerah yang membutuhkan perhatian ekstra selama menyikat gigi dan flossing .</p>', '2019-08-24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_ks`
--

CREATE TABLE `tb_ks` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subjek` varchar(100) NOT NULL,
  `pesan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_ks`
--

INSERT INTO `tb_ks` (`id`, `nama`, `email`, `subjek`, `pesan`) VALUES
(6, 'Ahmad', 'ahmad@gmail.com', 'Kritik', 'Lebih FAst Respon');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_resep`
--

CREATE TABLE `tb_resep` (
  `id` int(11) NOT NULL,
  `foto` varchar(50) NOT NULL,
  `status` varchar(100) NOT NULL,
  `konfirmasi` varchar(25) NOT NULL,
  `jumlah` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_resep`
--

INSERT INTO `tb_resep` (`id`, `foto`, `status`, `konfirmasi`, `jumlah`) VALUES
(80, '5d6cfc8cee6aa.jpg', 'Acc', '22,27', ',5,5'),
(81, '5d6cfccd0adf0.jpg', 'Acc', '21,25', '5,5,'),
(83, '5d70a8a890236.jpg', 'Acc', '21,27', '5,,5'),
(84, '5d70a8db05a4c.jpg', 'Acc', '22,27', ',5,5'),
(85, '5d70a9302efcd.jpg', 'Acc', '21,25', '5,5,'),
(86, '5d70ce82486a2.jpg', 'Acc', '22,25', ',5,5,'),
(87, '5d70f88eaf90b.jpg', 'Acc', '22,27', ',5,5'),
(88, '5d70fafda06da.jpg', 'Acc', '21,27', '5,10'),
(89, '5d70fc338c78c.jpg', 'Acc', '22,27', '10,5'),
(90, '5d70fc91787b3.jpg', 'Acc', '22,27', '10,5'),
(91, '5d70fcd2e1f05.jpg', 'Acc', '22,27', '4,3'),
(92, '5d70fd18933d7.jpg', 'Acc', '22,27', '5,5'),
(93, '5d7bb18240ba6.jpg', 'Acc', '21,27', '4,5'),
(94, '5d7bb1cb46c3e.jpg', 'Acc', '21,27', '4,5'),
(95, '5d7bb7783e4bc.jpg', 'Acc', '21', '1'),
(96, '5d7bbb583365f.jpg', 'Acc', '', ''),
(97, '5d7bbc61939b5.jpg', 'Acc', '', ''),
(98, '5d7bbe4666014.jpg', 'Acc', '25', '20'),
(99, '5d7f69469ddf2.png', 'Acc', '', ''),
(100, '5d7f696f3e770.jpg', 'Acc', '', ''),
(101, '5d7f9b5d404d3.jpg', 'Acc', '21,22', '3,5'),
(102, '5d7fa022e1541.jpg', 'Acc', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_transaksi`
--

CREATE TABLE `tb_transaksi` (
  `id` int(11) NOT NULL,
  `tgl_tr` date NOT NULL,
  `kode_tr` varchar(30) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_transaksi`
--

INSERT INTO `tb_transaksi` (`id`, `tgl_tr`, `kode_tr`, `nama`, `harga`, `jumlah`, `total`, `status`) VALUES
(1, '2019-09-14', 'MDN-00001', 'Paracatemol', 1000, 1, 1000, 'acc'),
(93, '2019-09-13', 'MDN-00090', 'Amlodipin 5mg', 10000, 1, 10000, 'acc'),
(94, '2019-10-11', 'MDN-00094', 'Amlodipin 5mg', 15000, 3, 45000, 'cancel'),
(95, '2019-10-10', 'MDN-00095', 'Amlodipin 5mg', 15000, 2, 30000, 'cancel'),
(96, '2019-10-11', 'MDN-00096', 'Amlodipin 5mg', 15000, 1, 15000, 'cancel'),
(97, '2019-10-08', 'MDN-00097', 'Paracetamol', 12000, 5, 60000, 'cancel'),
(98, '2019-10-09', 'MDN-00098', 'Amlodipin 5mg', 15000, 3, 45000, 'cancel'),
(99, '2019-10-10', 'MDN-00099', 'Amlodipin 5mg', 15000, 5, 75000, 'acc'),
(100, '2019-10-11', 'MDN-00099', 'Amlodipin 5mg', 15000, 5, 75000, 'acc'),
(101, '2019-10-09', 'MDN-00101', 'Amlodipin 5mg', 15000, 6, 90000, 'cancel'),
(102, '2019-10-09', 'MDN-00102', 'Stetoskop', 150000, 5, 750000, 'cancel'),
(103, '2019-10-09', 'MDN-00103', 'Stetoskop', 150000, 2, 300000, 'cancel'),
(104, '2019-10-09', 'MDN-00104', 'Stetoskop', 150000, 3, 450000, 'cancel'),
(105, '2019-10-09', 'MDN-00105', 'Amlodipin 5mg', 15000, 3, 45000, 'cancel'),
(106, '2019-10-09', 'MDN-00106', 'Amlodipin 5mg', 15000, 3, 45000, 'cancel'),
(107, '2019-10-10', 'MDN-00107', 'Stetoskop', 150000, 3, 450000, 'waiting'),
(108, '2019-10-10', 'MDN-00108', 'Bodrex', 7000, 5, 35000, 'waiting'),
(109, '2019-10-10', 'MDN-00108', 'Amlodipin 5mg', 15000, 3, 45000, 'waiting');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `alkes`
--
ALTER TABLE `alkes`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `apotik`
--
ALTER TABLE `apotik`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_ks`
--
ALTER TABLE `tb_ks`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_resep`
--
ALTER TABLE `tb_resep`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `alkes`
--
ALTER TABLE `alkes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `apotik`
--
ALTER TABLE `apotik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `kategori_obat`
--
ALTER TABLE `kategori_obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_artikel`
--
ALTER TABLE `tb_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `tb_ks`
--
ALTER TABLE `tb_ks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_resep`
--
ALTER TABLE `tb_resep`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT untuk tabel `tb_transaksi`
--
ALTER TABLE `tb_transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
