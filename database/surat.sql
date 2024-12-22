-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 20, 2024 at 12:59 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surat`
--

-- --------------------------------------------------------

--
-- Table structure for table `instansi`
--

CREATE TABLE `instansi` (
  `id_instansi` int(11) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `instansi`
--

INSERT INTO `instansi` (`id_instansi`, `nama_instansi`, `alamat`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, 'Kementrian Keuangan Republik Indonesia', 'Jalan Dr. Wahidin Raya No. 1 Jakarta Pusat\r\nIndonesia', 1, '2023-02-25 16:21:44', NULL, NULL),
(2, 'Kementerian Agama', 'Jalan Lapangan Banteng Barat No. 3-4, Jakarta 10710', 1, '2023-02-25 16:22:48', NULL, NULL),
(3, 'Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi', 'Kompleks Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi, Jalan Jenderal Sudirman, Senayan, Jakarta Pusat 10270', 1, '2023-02-25 16:24:04', NULL, NULL),
(4, 'Kementerian Pertahanan Republik Indonesia', 'Jl. Medan Merdeka Barat, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta', 1, '2023-02-25 16:24:51', NULL, NULL),
(5, 'Lembaga Kebijakan Pengadaan Barang/Jasa Pemerintah Republik Indonesia', 'Jln. Epicentrum Tengah Lot 11 B, Jakarta Selatan 12940', 1, '2024-12-03 10:18:16', 1, '2024-12-08 16:22:25'),
(6, 'Pemerintah Kabupaten Bekasi Dinas Perumahan Rakyat, Kawasan Permukiman dan Pertanahan', 'Komplek Perkantoran Pemda Kabupaten Bekasi Desa Sukamahi Kecamatan Cikarang', 1, '2024-12-03 10:25:30', NULL, NULL),
(7, 'Bank BJB', 'Jl.Naripan No. 12-14, Bandung - 40111', 1, '2024-12-03 10:38:12', NULL, NULL),
(8, 'Individu', 'Sesuai dengan alamat masing-masing pengirim surat yang terdapat didalam surat', 1, '2024-12-08 09:49:09', NULL, NULL),
(9, 'Artos.id Business and Tax', '-', 1, '2024-12-08 09:58:32', NULL, NULL),
(10, 'Industri Dagang', 'Dsn.Sukanyiru Rt. 05 Rw. 06,\r\nDs.Sukajadi, Kec. Wado,\r\nKab.Sumedang, Prov.JawaBarat', 1, '2024-12-08 10:02:03', NULL, NULL),
(11, 'BIDIK PROJECT â€“ FINANCIAL BUSINESS', 'Jl. Cikutra Barat No 09, Kota Bandung, Jawabarat', 1, '2024-12-08 10:06:15', NULL, NULL),
(12, 'PT. SUKSES MOTOR SEJAHTERA', 'JI. KH. Muchtar Tabrani Kaliabang Nangka No. 1 Rt. 002 Rw. 006 Kel. Perwira Kec. Bekasi Utara - Bekasi 17125', 1, '2024-12-08 10:09:28', NULL, NULL),
(13, 'TRIMITRA SEJAHTERA MOBILINDO', 'Jl. Jend. Sudirman KM 32 No. 72\r\nBekasi Selatan', 1, '2024-12-08 10:12:35', NULL, NULL),
(14, 'CV. Sumringah Niaga Utama', 'Jalan Alani No. 8B/34B, Sumur Bandung, Kota Bandung, Jawa Barat 40112', 1, '2024-12-08 10:16:34', NULL, NULL),
(15, 'CV. Sarana Motor Industri Karoseri', 'JL. Raya Sapan No. 55 A, Desa Tegalluar, Kec. Bojongsoang, Bandung - Indonesia', 1, '2024-12-08 10:20:09', NULL, NULL),
(16, 'PT. PANCA ARMADA ANDALAN', 'Jl Raya Narogong Km 12.5 Kel. Cikiwul Rt 03/01 Bantar Gebang Bekasi', 1, '2024-12-08 10:24:12', NULL, NULL),
(17, 'PT. Qurban Juara Indonesia', '-', 1, '2024-12-12 16:06:12', NULL, NULL);

--
-- Triggers `instansi`
--
DELIMITER $$
CREATE TRIGGER `instansi_insert` AFTER INSERT ON `instansi` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.created_user,'Insert',CONCAT('<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>',NEW.id_instansi,'<b>][Nama Instansi : </b>',NEW.nama_instansi,'<b>][Alamat : </b>',NEW.alamat,'<b>]</b>' ));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `instansi_update` AFTER UPDATE ON `instansi` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.updated_user,'Update',CONCAT('<b>Update</b> data instansi pada tabel <b>instansi</b>.<br><b>Data Lama = [ID Instansi : </b>',OLD.id_instansi,'<b>][Nama Instansi : </b>',OLD.nama_instansi,'<b>][Alamat : </b>',OLD.alamat,'<b>],<br> Data Baru = [ID Instansi : </b>',NEW.id_instansi,'<b>][Nama Instansi : </b>',NEW.nama_instansi,'<b>][Alamat : </b>',NEW.alamat,'<b>]</b>' ));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `nama_jenis` varchar(100) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, 'Surat Tugas', 1, '2024-12-07 09:37:03', NULL, NULL),
(2, 'Surat Penawaran', 1, '2024-12-07 09:51:32', NULL, NULL),
(3, 'Surat Kuasa', 1, '2024-12-07 09:52:02', NULL, NULL),
(4, 'Surat Undangan', 1, '2024-12-07 09:52:12', NULL, NULL),
(5, 'Surat Keterangan', 1, '2024-12-07 09:52:25', NULL, NULL),
(6, 'Surat Pernyataan', 1, '2024-12-07 09:52:37', NULL, NULL),
(7, 'Berita Acara', 1, '2024-12-07 09:52:49', NULL, NULL),
(8, 'Surat Perjanjian Kerjasama Pinjam Bendera', 1, '2024-12-07 09:53:01', NULL, NULL),
(9, 'Surat Permohonan', 1, '2024-12-07 09:53:11', NULL, NULL),
(10, 'Surat Pemberitahuan', 1, '2024-12-07 09:53:21', NULL, NULL),
(11, 'Surat Kontrak Kerja (Kontrak)', 1, '2024-12-07 09:53:31', NULL, NULL),
(12, 'Surat Kontrak Kerja (Tetap)', 1, '2024-12-07 09:53:41', NULL, NULL),
(13, 'Surat Kontrak Kerja (Freelance)', 1, '2024-12-07 09:53:51', NULL, NULL),
(14, 'NDA', 1, '2024-12-07 09:54:00', NULL, NULL),
(15, 'Tanda Terima Peminjaman Inventaris Kantor', 1, '2024-12-07 09:54:10', NULL, NULL),
(16, 'BAST', 1, '2024-12-07 09:54:20', NULL, NULL),
(17, 'Surat Dukungan', 1, '2024-12-08 10:18:24', NULL, NULL),
(18, 'Surat Cinta', 1, '2024-12-12 16:09:24', NULL, NULL);

--
-- Triggers `jenis`
--
DELIMITER $$
CREATE TRIGGER `jenis_insert` AFTER INSERT ON `jenis` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.created_user,'Insert',CONCAT('<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>',NEW.id_jenis,'<b>][Nama jenis : </b>',NEW.nama_jenis,'<b>]</b>' ));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `jenis_update` AFTER UPDATE ON `jenis` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.updated_user,'Update',CONCAT('<b>Update</b> data jenis pada tabel <b>jenis</b>.<br><b>Data Lama = [ID jenis : </b>',OLD.id_jenis,'<b>][Nama jenis : </b>',OLD.nama_jenis,'<b>],<br> Data Baru = [ID jenis : </b>',NEW.id_jenis,'<b>][Nama jenis : </b>',NEW.nama_jenis,'<b>]</b>' ));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `surat_keluar`
--

CREATE TABLE `surat_keluar` (
  `id_surat_keluar` bigint(20) NOT NULL,
  `jenis` int(20) NOT NULL,
  `tanggal_register` date NOT NULL,
  `tujuan_surat` int(11) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `arsip` varchar(255) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_keluar`
--

INSERT INTO `surat_keluar` (`id_surat_keluar`, `jenis`, `tanggal_register`, `tujuan_surat`, `nomor_surat`, `tanggal_surat`, `perihal`, `keterangan`, `arsip`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, 9, '2024-12-07', 1, '1234567890', '2024-12-07', 'sdfkghugytucrxsdfcgjvhbkjniuyrt', 'dcfvgbhnjmijuhytcfghbjniuhyg7tfcfvghbj', '1_Surat Penawaran Dana Pensiun BJB.pdf', 1, '2024-12-07 12:15:00', NULL, NULL),
(2, 15, '2024-12-07', 6, '19192837465', '2024-12-07', 'Minjem Barang', 'Minjem Barang ke Pemerintah', '2_Undangan Penyedia 21 Maret 2024.pdf', 1, '2024-12-07 12:41:31', 1, '2024-12-07 19:43:34'),
(3, 5, '2024-12-07', 4, '12354678909876543567890', '2024-12-07', 'rjthjf,g,hnke cye,cvjelncoewj', '.aksucgaebpucbepicubpudc', '3_1. Surat Kuasa Isuzu Craine D-MAX.pdf', 1, '2024-12-07 12:50:52', NULL, NULL),
(4, 9, '2024-12-07', 6, '1230984756', '2024-12-07', 'Minjem Barang', 'Pinjam Barang ke Bekasi', '4_Undangan Penyedia 21 Maret 2024.pdf', 1, '2024-12-07 13:36:10', NULL, NULL),
(5, 2, '2023-12-17', 7, '008/SPER/III/2023', '2023-12-17', 'Penawaran', 'Penawaran Pengadaan Aplikasi Mobile Android Dapen Bank BJB', '5_Surat Penawaran Dana Pensiun BJB.pdf', 1, '2024-12-12 15:33:41', NULL, NULL),
(6, 2, '2023-12-18', 17, '012/SPER/IV/2023', '2023-12-18', 'Surat Penawaran', 'Surat Penawaran untuk membuat aplikasi qurban', '6_surat penawaran.pdf', 1, '2024-12-12 16:07:46', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `surat_masuk`
--

CREATE TABLE `surat_masuk` (
  `id_surat_masuk` bigint(20) NOT NULL,
  `jenis` int(20) NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `asal_surat` int(11) NOT NULL,
  `nomor_surat` varchar(50) NOT NULL,
  `tanggal_surat` date NOT NULL,
  `sifat_surat` enum('Rahasia','Penting','Biasa') NOT NULL,
  `perihal` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `arsip` varchar(255) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `surat_masuk`
--

INSERT INTO `surat_masuk` (`id_surat_masuk`, `jenis`, `tanggal_diterima`, `asal_surat`, `nomor_surat`, `tanggal_surat`, `sifat_surat`, `perihal`, `keterangan`, `arsip`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(2, 4, '2024-03-21', 5, '*generate oleh sistem setelah ditandatangani', '2024-03-21', 'Penting', 'Undangan', 'Rapat Pemberian Penjelasan SP-1', '2_Undangan Penyedia 21 Maret 2024.pdf', 1, '2024-12-08 09:35:29', NULL, NULL),
(3, 3, '2024-03-05', 6, 'PG.02.02 / 412 / Umpeg-Disperkimtan / III / 2024', '2024-03-05', 'Biasa', 'Kuasa', 'APV SGX', '3_4. Surat Kuasa APV SGX.pdf', 1, '2024-12-08 09:38:23', 1, '2024-12-08 17:30:25'),
(4, 3, '2024-03-05', 6, 'PG.02.02 / 411 / Umpeg-Disperkimtan / III / 2024', '2024-03-05', 'Biasa', 'Kuasa', 'HINO DUTRO', '4_3. Surat Kuasa HINO DUTRO.pdf', 1, '2024-12-08 09:41:20', 1, '2024-12-08 17:30:05'),
(5, 3, '2024-03-05', 6, 'PG.02.02 / 410 / Umpeg-Disperkimtan / III / 2024', '2024-03-05', 'Biasa', 'Kuasa', 'Isuzu NMR 5.8', '5_2. Surat Kuasa Isuzu NMR 5.8.pdf', 1, '2024-12-08 09:43:45', 1, '2024-12-08 17:29:45'),
(6, 3, '2024-03-05', 6, 'PG.02.02 / 409 / Umpeg-Disperkimtan / III / 2024', '2024-03-05', 'Biasa', 'Kuasa', 'Isuzu Craine D-MAX', '6_1. Surat Kuasa Isuzu Craine D-MAX.pdf', 1, '2024-12-08 09:45:16', 1, '2024-12-08 17:28:26'),
(7, 6, '2024-02-03', 8, '-', '2024-02-03', 'Rahasia', 'Pernyataan', 'Perlindungan Kerahasiaan Informasi, Ananda Putri Nur Amalina', '7_SURAT PERNYATAAN (1).pdf', 1, '2024-12-08 09:48:15', 1, '2024-12-08 16:55:35'),
(8, 6, '2024-03-19', 8, '-', '2024-03-19', 'Rahasia', 'Pernyataan', 'Pengunduran Diri Rifky Mohamad Ramdani, S.H.', '8_Surat Pernyataan Pengunduran Diri_Rifky Mohamad Ramdani.pdf', 1, '2024-12-08 09:52:05', 1, '2024-12-08 16:52:44'),
(9, 6, '2024-01-10', 8, '-', '2024-01-10', 'Rahasia', 'Pernyataan', 'Perlindungan Kerahasiaan Informasi, Astri Yulia Br Gultom', '9_surat pernyataan astri yulia br gultom.pdf', 1, '2024-12-08 09:55:06', NULL, NULL),
(10, 2, '2024-01-22', 9, '01 / MKT / HRG / I / 2024', '2024-01-22', 'Biasa', 'Penawaran', 'Penawaran Harga Jasa Perpajakan', '10_Proposal Penawaran artos.id.pdf', 1, '2024-12-08 09:58:03', 1, '2024-12-08 16:59:01'),
(11, 2, '2023-10-30', 9, '02 / MKT / HRG / X / 2023', '2023-10-30', 'Biasa', 'Penawaran', 'Penawaran Harga Jasa Perpajakan', '11_Proposal Penawaran artos.id (1).pdf', 1, '2024-12-08 10:01:05', NULL, NULL),
(12, 2, '2024-01-08', 11, 'PH2401-001', '2024-01-08', 'Penting', 'Penawaran', 'Penawaran Harga', '12_Penawaran Harga - PH2401-001.pdf', 1, '2024-12-08 10:07:47', NULL, NULL),
(13, 2, '2023-12-27', 12, '500/SMS-XII/PH/2023', '2023-12-27', 'Biasa', 'Penawaran', 'spesifikasi Karoseri Skylift\r\nTelescopic untuk kendaraan Isuzu Traga.', '13_PENAWARAN 500 - BPK. RIZKI - SKYLIFT TELESCOPIC 8 METER - ISUZU TRAGA.pdf', 1, '2024-12-08 10:11:19', NULL, NULL),
(14, 2, '2023-12-29', 13, '002/MKT/R4/TSM/BKS/XII/2023', '2023-12-29', 'Biasa', 'Penawaran', 'Penawaran Kendaraan', '14_CS PDF 2023-12-29 16.11.36.pdf', 1, '2024-12-08 10:15:41', NULL, NULL),
(15, 2, '2024-12-26', 14, '028/SPHK-SNU/II/2024', '2024-12-26', 'Biasa', 'Penawaran', 'Penawaran Harga Karoseri Mobil Jenazah', '15_01.SURAT PENAWARAN HARGA - AMBULANCE JENAZAH - PT Langgeng Inovasi Tekhnologi.pdf', 1, '2024-12-08 10:17:48', 1, '2024-12-08 17:29:14'),
(16, 17, '2023-12-23', 15, '072/SR-1/SD/1/2023', '2023-12-23', 'Biasa', 'Dukungan', 'Jaminan purna jual', '16_Surat Dukungan PT. Langgeng Inovasi Teknologi (Ambulance).pdf', 1, '2024-12-08 10:22:49', NULL, NULL),
(17, 17, '2023-12-23', 16, '-', '2023-12-23', 'Biasa', 'Dukungan', 'Jaminan purna jual', '17_Surat Dukungan PT Langgeng Inovasi Tekhnologi.pdf', 1, '2024-12-08 10:25:57', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sys_audit_trail`
--

CREATE TABLE `sys_audit_trail` (
  `ID` bigint(20) NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `username` varchar(30) NOT NULL,
  `action` enum('Insert','Update','Delete') NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_audit_trail`
--

INSERT INTO `sys_audit_trail` (`ID`, `datetime`, `username`, `action`, `description`) VALUES
(1, '2018-05-18 01:08:20', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Indra Styawantoro<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Indra Styawantoro<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(2, '2023-02-25 15:50:45', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Indra Styawantoro<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Indra Styawantoro<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(3, '2023-02-25 15:54:56', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Indra Styawantoro<b>][Username : </b>admin<b>][Password : </b>0937afa17f4dc08f3c0e5dc908158370ce64df86<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(4, '2023-02-25 15:55:18', '1', 'Insert', '<b>Insert</b> data user baru pada tabel <b>sys_users</b>.<br><b>[ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>'),
(5, '2023-02-25 15:56:29', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>SMK NUSANTARA<b>][Alamat : </b>Jalan Teuku Umar No 100, Kedaton, Bandar Lampung, Lampung<b>][Telepon : </b>081377783334<b>][Fax : </b>081377783334<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo.png<b>],<br> Data Baru = [Nama Instansi : </b>SMK NUSANTARA<b>][Alamat : </b>Jalan Teuku Umar No 100, Kedaton, Bandar Lampung, Lampung<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo.png<b>]</b>'),
(6, '2023-02-25 15:57:11', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>SMK NUSANTARA<b>][Alamat : </b>Jalan Teuku Umar No 100, Kedaton, Bandar Lampung, Lampung<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo.png<b>],<br> Data Baru = [Nama Instansi : </b>SMK NUSANTARA<b>][Alamat : </b>Jalan Veteran, no. 17, Jakarta Pusat, Indonesia<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo.png<b>]</b>'),
(7, '2023-02-25 15:58:35', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>SMK NUSANTARA<b>][Alamat : </b>Jalan Veteran, no. 17, Jakarta Pusat, Indonesia<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo.png<b>],<br> Data Baru = [Nama Instansi : </b>SMK NUSANTARA<b>][Alamat : </b>Jalan Veteran, no. 17, Jakarta Pusat, Indonesia<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo-garuda-hd-34015.png<b>]</b>'),
(8, '2023-02-25 15:58:54', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(9, '2023-02-25 16:15:51', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(10, '2023-02-25 16:21:44', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>1<b>][Nama Instansi : </b>Kementrian Keuangan Republik Indonesia<b>][Alamat : </b>Jalan Dr. Wahidin Raya No. 1 Jakarta Pusat\r\nIndonesia<b>]</b>'),
(11, '2023-02-25 16:22:48', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>2<b>][Nama Instansi : </b>Kementerian Agama<b>][Alamat : </b>Jalan Lapangan Banteng Barat No. 3-4, Jakarta 10710<b>]</b>'),
(12, '2023-02-25 16:24:04', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>3<b>][Nama Instansi : </b>Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi<b>][Alamat : </b>Kompleks Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi, Jalan Jenderal Sudirman, Senayan, Jakarta Pusat 10270<b>]</b>'),
(13, '2023-02-25 16:24:51', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>4<b>][Nama Instansi : </b>Kementerian Pertahanan Republik Indonesia<b>][Alamat : </b>Jl. Medan Merdeka Barat, RT.2/RW.3, Gambir, Kecamatan Gambir, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta<b>]</b>'),
(14, '2023-02-25 16:27:19', '1', 'Insert', '<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>1<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2023-02-25<b>][ID Instansi : </b>1<b>][Nomor Surat : </b>IKN/02/RI/1452<b>][Tanggal Surat : </b>2023-02-24<b>][Sifat Surat : </b>Rahasia<b>][Perihal : </b>Undangan<b>][Keterangan : </b>Rapat kerja bulan maret<b>][Arsip : </b>1_LAPORAN-PENJUALAN-PER-PERIODE-01-02-2023-sd-25-02-2023.pdf<b>]</b>'),
(15, '2023-02-25 16:29:40', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>SMK NUSANTARA<b>][Alamat : </b>Jalan Veteran, no. 17, Jakarta Pusat, Indonesia<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo-garuda-hd-34015.png<b>],<br> Data Baru = [Nama Instansi : </b>KEMENTERIAN SEKRETARIAT NEGARA<b>][Alamat : </b>Jalan Veteran, no. 17, Jakarta Pusat, Indonesia<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo-garuda-hd-34015.png<b>]</b>'),
(16, '2023-02-25 16:42:11', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>KEMENTERIAN SEKRETARIAT NEGARA<b>][Alamat : </b>Jalan Veteran, no. 17, Jakarta Pusat, Indonesia<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo-garuda-hd-34015.png<b>],<br> Data Baru = [Nama Instansi : </b>Ibu Kota Nusantara<b>][Alamat : </b>Jalan Veteran, no. 17, Jakarta Pusat, Indonesia<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo-garuda-hd-34015.png<b>]</b>'),
(17, '2023-02-25 16:43:34', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(18, '2023-02-25 16:44:19', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>Ibu Kota Nusantara<b>][Alamat : </b>Jalan Veteran, no. 17, Jakarta Pusat, Indonesia<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>smknusantara@gmail.com<b>][Website : </b>www.smknusantara.sch.id<b>][Logo : </b>logo-garuda-hd-34015.png<b>],<br> Data Baru = [Nama Instansi : </b>Ibu Kota Nusantara<b>][Alamat : </b>Jalan Veteran, no. 17, Jakarta Pusat, Indonesia<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>ikn@gmail.com<b>][Website : </b>www.ikn.go.id<b>][Logo : </b>logo-garuda-hd-34015.png<b>]</b>'),
(19, '2023-02-25 16:50:18', '1', 'Insert', '<b>Insert</b> data surat keluar pada tabel <b>surat keluar</b>.<br><b>[ID Surat Keluar : </b>1<b>][Nomor Agenda : </b>1<b>][Tanggal Register : </b>2023-02-25<b>][ID Instansi : </b>1<b>][Nomor Surat : </b>INK/01/RI-2668<b>][Tanggal Surat : </b>2023-02-25<b>][Perihal : </b>Undangan<b>][Keterangan : </b>Pembahasan G50<b>][Arsip : </b>1_Laporan_Surat_Masuk_Tanggal_01-02-2023_sd_02-02-2023_2.pdf<b>]</b>'),
(20, '2023-02-25 16:57:04', '2', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>'),
(21, '2023-02-25 17:12:10', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(22, '2023-02-26 15:07:29', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(23, '2023-03-11 14:48:24', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(24, '2023-03-11 14:52:09', '2', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>'),
(25, '2023-03-11 14:53:14', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(26, '2023-03-11 15:26:15', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(27, '2024-12-03 08:57:56', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(28, '2024-12-03 08:59:25', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>Ibu Kota Nusantara<b>][Alamat : </b>Jalan Veteran, no. 17, Jakarta Pusat, Indonesia<b>][Telepon : </b>08123456789<b>][Fax : </b>08123456789<b>][Email : </b>ikn@gmail.com<b>][Website : </b>www.ikn.go.id<b>][Logo : </b>logo-garuda-hd-34015.png<b>],<br> Data Baru = [Nama Instansi : </b>PT. Langgeng Inovasi Teknologi<b>][Alamat : </b>Jl. Buah Batu No. 161 RT 007 RW 006 Kel. Turangga Kec. Lengkong Kota Bandung Jawa Barat 40264<b>][Telepon : </b>085871102008<b>][Fax : </b>085871102008<b>][Email : </b>langgenginovasi@gmail.com<b>][Website : </b>langgenginovasiteknologi.com<b>][Logo : </b>logo3.jpg<b>]</b>'),
(29, '2024-12-03 09:16:00', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(30, '2024-12-03 09:52:04', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(31, '2024-12-03 09:55:59', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(32, '2024-12-03 10:02:04', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(33, '2024-12-03 10:13:30', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(34, '2024-12-03 10:18:16', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>5<b>][Nama Instansi : </b>LEMBAGA KEBIJAKAN PENGEMBANGAN BARANG/JASA PEMERINTAH REPUBLIK INDONESIA<b>][Alamat : </b>Jln. Epicentrum Tengah Lot 11 B, Jakarta Selatan 12940<b>]</b>'),
(35, '2024-12-03 10:18:58', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>instansi</b>.<br><b>Data Lama = [ID Instansi : </b>5<b>][Nama Instansi : </b>LEMBAGA KEBIJAKAN PENGEMBANGAN BARANG/JASA PEMERINTAH REPUBLIK INDONESIA<b>][Alamat : </b>Jln. Epicentrum Tengah Lot 11 B, Jakarta Selatan 12940<b>],<br> Data Baru = [ID Instansi : </b>5<b>][Nama Instansi : </b>Lembaga Kebijakan Pengembangan Barang/Jasa Pemerintah Republik Indonesia<b>][Alamat : </b>Jln. Epicentrum Tengah Lot 11 B, Jakarta Selatan 12940<b>]</b>'),
(36, '2024-12-03 10:21:40', '1', 'Insert', '<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>2<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2024-03-21<b>][ID Instansi : </b>5<b>][Nomor Surat : </b>*generate oleh sistem setelah ditandatangani<b>][Tanggal Surat : </b>2024-03-21<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>Rapat Pemberian Penjelasan SP-1<b>][Keterangan : </b>Sehubungan dengan rapat pemberian penjelasan terkait pengenaan sanksi berupa Surat\r\nPeringatan Pertama sebagai tindak lanjut atas surat permohonan penjelasan yang disampaikan\r\noleh Penyedia Katalog Elektronik (Daftar Penyedia Terlampir).<b>][Arsip : </b>2_Undangan Penyedia 21 Maret 2024.pdf<b>]</b>'),
(37, '2024-12-03 10:22:19', '1', 'Update', '<b>Update</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>Data Lama = [ID Surat Masuk : </b>2<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2024-03-21<b>][ID Instansi : </b>5<b>][Nomor Surat : </b>*generate oleh sistem setelah ditandatangani<b>][Tanggal Surat : </b>2024-03-21<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>Rapat Pemberian Penjelasan SP-1<b>][Keterangan : </b>Sehubungan dengan rapat pemberian penjelasan terkait pengenaan sanksi berupa Surat\r\nPeringatan Pertama sebagai tindak lanjut atas surat permohonan penjelasan yang disampaikan\r\noleh Penyedia Katalog Elektronik (Daftar Penyedia Terlampir).<b>][Arsip : </b>2_Undangan Penyedia 21 Maret 2024.pdf<b>],<br> Data Baru = [ID Surat Masuk : </b>2<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2024-03-21<b>][ID Instansi : </b>5<b>][Nomor Surat : </b>*generate oleh sistem setelah ditandatangani<b>][Tanggal Surat : </b>2024-03-21<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>Rapat Pemberian Penjelasan SP-1<b>][Keterangan : </b>Undangan Rapat Pemberian Penjelasan SP-1<b>][Arsip : </b>2_Undangan Penyedia 21 Maret 2024.pdf<b>]</b>'),
(38, '2024-12-03 10:25:30', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>6<b>][Nama Instansi : </b>Pemerintah Kabupaten Bekasi Dinas Perumahan Rakyat, Kawasan Permukiman dan Pertanahan<b>][Alamat : </b>Komplek Perkantoran Pemda Kabupaten Bekasi Desa Sukamahi Kecamatan Cikarang<b>]</b>'),
(39, '2024-12-03 10:30:21', '1', 'Insert', '<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>3<b>][Nomor Agenda : </b>1<b>][Tanggal Diterima : </b>2024-03-05<b>][ID Instansi : </b>6<b>][Nomor Surat : </b>PG.02.02/409/Umpeg-Disperkimtan/III/2024<b>][Tanggal Surat : </b>2024-03-05<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>Surat Kuasa<b>][Keterangan : </b>Produk Craine Isuzu D-MAX<b>][Arsip : </b>3_1. Surat Kuasa Isuzu Craine D-MAX.pdf<b>]</b>'),
(40, '2024-12-03 10:32:22', '1', 'Delete', '<b>Delete</b> data surat masuk pada tabel <b>surat masuk</b>. <br> <b>[ID Surat Masuk : </b>2<b>][Asal Surat : </b>Lembaga Kebijakan Pengembangan Barang/Jasa Pemerintah Republik Indonesia<b>][Nomor Surat : </b>*generate oleh sistem setelah ditandatangani<b>][Tanggal Surat : </b>2024-03-21<b>]'),
(41, '2024-12-03 10:33:10', '1', 'Insert', '<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>4<b>][Nomor Agenda : </b>2<b>][Tanggal Diterima : </b>2024-03-21<b>][ID Instansi : </b>5<b>][Nomor Surat : </b>*generate oleh sistem setelah ditandatangani<b>][Tanggal Surat : </b>2024-03-21<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>Rapat Pemberian Penjelasan SP-1<b>][Keterangan : </b>Rapat Pemberian Penjelasan SP-1<b>][Arsip : </b>4_Undangan Penyedia 21 Maret 2024.pdf<b>]</b>'),
(42, '2024-12-03 10:38:12', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>7<b>][Nama Instansi : </b>Bank BJB<b>][Alamat : </b>Jl.Naripan No. 12-14, Bandung - 40111<b>]</b>'),
(43, '2024-12-03 10:39:50', '1', 'Insert', '<b>Insert</b> data surat keluar pada tabel <b>surat keluar</b>.<br><b>[ID Surat Keluar : </b>2<b>][Nomor Agenda : </b>1<b>][Tanggal Register : </b>2023-12-17<b>][ID Instansi : </b>7<b>][Nomor Surat : </b>008/SPER/III/2023<b>][Tanggal Surat : </b>2023-12-17<b>][Perihal : </b>Surat Penawaran<b>][Keterangan : </b>Bank BJB Dana Pensiun<b>][Arsip : </b>2_Surat Penawaran Dana Pensiun BJB.pdf<b>]</b>'),
(44, '2024-12-03 10:40:55', '1', 'Insert', '<b>Insert</b> data backup database pada tabel <b>sys_database</b>.<br><b>[ID : </b>1<b>][Nama File : </b>20241203_174055_database.sql.gz<b>][Ukuran File : </b>4 KB<b>]</b>'),
(45, '2024-12-03 10:41:21', '1', 'Delete', '<b>Delete</b> data backup database pada tabel <b>sys_database</b>. <br> <b>[ID : </b>1<b>][Nama File : </b>20241203_174055_database.sql.gz<b>]'),
(46, '2024-12-03 10:51:09', '2', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>'),
(47, '2024-12-03 10:51:51', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(48, '2024-12-03 10:53:52', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(49, '2024-12-03 11:06:14', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(50, '2024-12-03 11:07:35', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(51, '2024-12-03 11:08:25', '2', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>'),
(52, '2024-12-03 11:11:44', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(53, '2024-12-04 15:37:59', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(54, '2024-12-04 15:45:12', '2', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>'),
(55, '2024-12-06 12:08:24', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(56, '2024-12-06 12:13:52', '2', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>'),
(57, '2024-12-06 12:14:14', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(58, '2024-12-06 12:18:51', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(59, '2024-12-06 12:26:16', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(60, '2024-12-06 12:29:12', '1', 'Insert', '<b>Insert</b> data surat masuk pada tabel <b>surat masuk</b>.<br><b>[ID Surat Masuk : </b>5<b>][Nomor Agenda : </b>3<b>][Tanggal Diterima : </b>2024-12-06<b>][ID Instansi : </b>2<b>][Nomor Surat : </b>12345678<b>][Tanggal Surat : </b>2024-12-06<b>][Sifat Surat : </b>Penting<b>][Perihal : </b>TEST<b>][Keterangan : </b>TEST<b>][Arsip : </b>5_Surat Penawaran Dana Pensiun BJB.pdf<b>]</b>'),
(61, '2024-12-06 12:33:17', '1', 'Insert', '<b>Insert</b> data surat keluar pada tabel <b>surat keluar</b>.<br><b>[ID Surat Keluar : </b>3<b>][Nomor Agenda : </b>1<b>][Tanggal Register : </b>2024-12-06<b>][ID Instansi : </b>2<b>][Nomor Surat : </b>101927t384<b>][Tanggal Surat : </b>2024-12-06<b>][Perihal : </b>TEST<b>][Keterangan : </b>TEST<b>][Arsip : </b>3_1. Surat Kuasa Isuzu Craine D-MAX.pdf<b>]</b>'),
(62, '2024-12-06 12:36:45', '1', 'Insert', '<b>Insert</b> data backup database pada tabel <b>sys_database</b>.<br><b>[ID : </b>1<b>][Nama File : </b>20241206_193645_database.sql.gz<b>][Ukuran File : </b>5 KB<b>]</b>'),
(63, '2024-12-06 12:38:08', '2', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>'),
(64, '2024-12-06 12:43:12', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(65, '2024-12-07 08:26:58', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(66, '2024-12-07 09:37:03', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>1<b>][Nama jenis : </b>Surat Tugas<b>]</b>'),
(67, '2024-12-07 09:51:32', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>2<b>][Nama jenis : </b>Surat Penawaran<b>]</b>'),
(68, '2024-12-07 09:52:02', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>3<b>][Nama jenis : </b>Surat Kuasa<b>]</b>'),
(69, '2024-12-07 09:52:12', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>4<b>][Nama jenis : </b>Surat Undangan<b>]</b>'),
(70, '2024-12-07 09:52:25', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>5<b>][Nama jenis : </b>Surat Keterangan<b>]</b>'),
(71, '2024-12-07 09:52:37', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>6<b>][Nama jenis : </b>Surat Pernyataan<b>]</b>'),
(72, '2024-12-07 09:52:49', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>7<b>][Nama jenis : </b>Berita Acara<b>]</b>'),
(73, '2024-12-07 09:53:01', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>8<b>][Nama jenis : </b>Surat Perjanjian Kerjasama Pinjam Bendera<b>]</b>'),
(74, '2024-12-07 09:53:11', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>9<b>][Nama jenis : </b>Surat Permohonan<b>]</b>'),
(75, '2024-12-07 09:53:21', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>10<b>][Nama jenis : </b>Surat Pemberitahuan<b>]</b>'),
(76, '2024-12-07 09:53:31', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>11<b>][Nama jenis : </b>Surat Kontrak Kerja (Kontrak)<b>]</b>'),
(77, '2024-12-07 09:53:41', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>12<b>][Nama jenis : </b>Surat Kontrak Kerja (Tetap)<b>]</b>'),
(78, '2024-12-07 09:53:51', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>13<b>][Nama jenis : </b>Surat Kontrak Kerja (Freelance)<b>]</b>'),
(79, '2024-12-07 09:54:00', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>14<b>][Nama jenis : </b>NDA<b>]</b>'),
(80, '2024-12-07 09:54:10', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>15<b>][Nama jenis : </b>Tanda Terima Peminjaman Inventaris Kantor<b>]</b>'),
(81, '2024-12-07 09:54:20', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>16<b>][Nama jenis : </b>BAST<b>]</b>'),
(82, '2024-12-07 13:40:23', '1', 'Delete', '<b>Delete</b> data backup database pada tabel <b>sys_database</b>. <br> <b>[ID : </b>1<b>][Nama File : </b>20241206_193645_database.sql.gz<b>]'),
(83, '2024-12-08 07:41:37', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(84, '2024-12-08 08:51:59', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>PT. Langgeng Inovasi Teknologi<b>][Alamat : </b>Jl. Buah Batu No. 161 RT 007 RW 006 Kel. Turangga Kec. Lengkong Kota Bandung Jawa Barat 40264<b>][Telepon : </b>085871102008<b>][Fax : </b>085871102008<b>][Email : </b>langgenginovasi@gmail.com<b>][Website : </b>langgenginovasiteknologi.com<b>][Logo : </b>logo3.jpg<b>],<br> Data Baru = [Nama Instansi : </b>PT. Langgeng Inovasi Teknologi<b>][Alamat : </b>Jl. Buah Batu No. 161 RT 007 RW 006 Kel. Turangga Kec. Lengkong\r\nKota Bandung Jawa Barat 40264<b>][Telepon : </b>085871102008<b>][Fax : </b>085871102008<b>][Email : </b>langgenginovasi@gmail.com<b>][Website : </b>langgenginovasiteknologi.com<b>][Logo : </b>logo3.jpg<b>]</b>'),
(85, '2024-12-08 09:22:25', '1', 'Update', '<b>Update</b> data instansi pada tabel <b>instansi</b>.<br><b>Data Lama = [ID Instansi : </b>5<b>][Nama Instansi : </b>Lembaga Kebijakan Pengembangan Barang/Jasa Pemerintah Republik Indonesia<b>][Alamat : </b>Jln. Epicentrum Tengah Lot 11 B, Jakarta Selatan 12940<b>],<br> Data Baru = [ID Instansi : </b>5<b>][Nama Instansi : </b>Lembaga Kebijakan Pengadaan Barang/Jasa Pemerintah Republik Indonesia<b>][Alamat : </b>Jln. Epicentrum Tengah Lot 11 B, Jakarta Selatan 12940<b>]</b>'),
(86, '2024-12-08 09:36:02', '1', 'Delete', '<b>Delete</b> data surat masuk pada tabel <b>surat masuk</b>. <br> <b>[ID Surat Masuk : </b>1<b>][Asal Surat : </b>Kementerian Pendidikan, Kebudayaan, Riset, dan Teknologi<b>][Nomor Surat : </b>101010292929383838<b>][Tanggal Surat : </b>2024-12-07<b>]'),
(87, '2024-12-08 09:49:09', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>8<b>][Nama Instansi : </b>Individu<b>][Alamat : </b>Sesuai dengan alamat masing-masing pengirim surat yang terdapat didalam surat<b>]</b>'),
(88, '2024-12-08 09:58:32', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>9<b>][Nama Instansi : </b>Artos.id Business and Tax<b>][Alamat : </b>-<b>]</b>'),
(89, '2024-12-08 10:02:03', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>10<b>][Nama Instansi : </b>Industri Dagang<b>][Alamat : </b>Dsn.Sukanyiru Rt. 05 Rw. 06,\r\nDs.Sukajadi, Kec. Wado,\r\nKab.Sumedang, Prov.JawaBarat<b>]</b>'),
(90, '2024-12-08 10:06:15', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>11<b>][Nama Instansi : </b>BIDIK PROJECT â€“ FINANCIAL BUSINESS<b>][Alamat : </b>Jl. Cikutra Barat No 09, Kota Bandung, Jawabarat<b>]</b>'),
(91, '2024-12-08 10:09:28', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>12<b>][Nama Instansi : </b>PT. SUKSES MOTOR SEJAHTERA<b>][Alamat : </b>JI. KH. Muchtar Tabrani Kaliabang Nangka No. 1 Rt. 002 Rw. 006 Kel. Perwira Kec. Bekasi Utara - Bekasi 17125<b>]</b>'),
(92, '2024-12-08 10:12:35', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>13<b>][Nama Instansi : </b>TRIMITRA SEJAHTERA MOBILINDO<b>][Alamat : </b>Jl. Jend. Sudirman KM 32 No. 72\r\nBekasi Selatan<b>]</b>'),
(93, '2024-12-08 10:16:34', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>14<b>][Nama Instansi : </b>CV. Sumringah Niaga Utama<b>][Alamat : </b>Jalan Alani No. 8B/34B, Sumur Bandung, Kota Bandung, Jawa Barat 40112<b>]</b>'),
(94, '2024-12-08 10:18:24', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>17<b>][Nama jenis : </b>Surat Dukungan<b>]</b>'),
(95, '2024-12-08 10:20:09', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>15<b>][Nama Instansi : </b>CV. Sarana Motor Industri Karoseri<b>][Alamat : </b>JL. Raya Sapan No. 55 A, Desa Tegalluar, Kec. Bojongsoang, Bandung - Indonesia<b>]</b>'),
(96, '2024-12-08 10:24:12', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>16<b>][Nama Instansi : </b>PT. PANCA ARMADA ANDALAN<b>][Alamat : </b>Jl Raya Narogong Km 12.5 Kel. Cikiwul Rt 03/01 Bantar Gebang Bekasi<b>]</b>'),
(97, '2024-12-08 10:36:14', '1', 'Insert', '<b>Insert</b> data backup database pada tabel <b>sys_database</b>.<br><b>[ID : </b>1<b>][Nama File : </b>20241208_173614_database.sql.gz<b>][Ukuran File : </b>8 KB<b>]</b>'),
(98, '2024-12-08 10:36:59', '2', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>2<b>][Nama User : </b>Operator<b>][Username : </b>operator<b>][Password : </b>e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e<b>][Hak Akses : </b>Operator<b>][Blokir : </b>Tidak<b>]</b>'),
(99, '2024-12-12 15:27:47', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(100, '2024-12-12 16:04:52', '1', 'Update', '<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>],<br> Data Baru = [ID User : </b>1<b>][Nama User : </b>Admin<b>][Username : </b>admin<b>][Password : </b>90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad<b>][Hak Akses : </b>Administrator<b>][Blokir : </b>Tidak<b>]</b>'),
(101, '2024-12-12 16:06:12', '1', 'Insert', '<b>Insert</b> data instansi pada tabel <b>instansi</b>.<br><b>[ID Instansi : </b>17<b>][Nama Instansi : </b>PT. Qurban Juara Indonesia<b>][Alamat : </b>-<b>]</b>'),
(102, '2024-12-12 16:08:42', '1', 'Delete', '<b>Delete</b> data jenis pada tabel <b>jenis</b>. <br> <b>[ID jenis : </b>undefined<b>][Nama jenis : </b><b>]'),
(103, '2024-12-12 16:09:24', '1', 'Insert', '<b>Insert</b> data jenis pada tabel <b>jenis</b>.<br><b>[ID jenis : </b>18<b>][Nama jenis : </b>Surat Cinta<b>]</b>');

-- --------------------------------------------------------

--
-- Table structure for table `sys_config`
--

CREATE TABLE `sys_config` (
  `configID` tinyint(1) NOT NULL,
  `nama_instansi` varchar(100) NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `fax` varchar(13) NOT NULL,
  `email` varchar(50) NOT NULL,
  `website` varchar(50) NOT NULL,
  `logo` varchar(50) NOT NULL,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_config`
--

INSERT INTO `sys_config` (`configID`, `nama_instansi`, `alamat`, `telepon`, `fax`, `email`, `website`, `logo`, `updated_user`, `updated_date`) VALUES
(1, 'PT. Langgeng Inovasi Teknologi', 'Jl. Buah Batu No. 161 RT 007 RW 006 Kel. Turangga Kec. Lengkong\r\nKota Bandung Jawa Barat 40264', '085871102008', '085871102008', 'langgenginovasi@gmail.com', 'langgenginovasiteknologi.com', 'logo3.jpg', 1, '2024-12-08 15:51:59');

--
-- Triggers `sys_config`
--
DELIMITER $$
CREATE TRIGGER `config_update` AFTER UPDATE ON `sys_config` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.updated_user,'Update',CONCAT('<b>Update</b> data instansi pada tabel <b>sys_config</b>.<br><b>Data Lama = [Nama Instansi : </b>',OLD.nama_instansi,'<b>][Alamat : </b>',OLD.alamat,'<b>][Telepon : </b>',OLD.telepon,'<b>][Fax : </b>',OLD.fax,'<b>][Email : </b>',OLD.email,'<b>][Website : </b>',OLD.website,'<b>][Logo : </b>',OLD.logo,'<b>],<br> Data Baru = [Nama Instansi : </b>',NEW.nama_instansi,'<b>][Alamat : </b>',NEW.alamat,'<b>][Telepon : </b>',NEW.telepon,'<b>][Fax : </b>',NEW.fax,'<b>][Email : </b>',NEW.email,'<b>][Website : </b>',NEW.website,'<b>][Logo : </b>',NEW.logo,'<b>]</b>' ));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sys_database`
--

CREATE TABLE `sys_database` (
  `dbID` int(11) NOT NULL,
  `file_name` varchar(50) NOT NULL,
  `file_size` varchar(10) NOT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sys_database`
--

INSERT INTO `sys_database` (`dbID`, `file_name`, `file_size`, `created_user`, `created_date`) VALUES
(1, '20241208_173614_database.sql.gz', '8 KB', 1, '2024-12-08 10:36:14');

--
-- Triggers `sys_database`
--
DELIMITER $$
CREATE TRIGGER `database_insert` AFTER INSERT ON `sys_database` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.created_user,'Insert',CONCAT('<b>Insert</b> data backup database pada tabel <b>sys_database</b>.<br><b>[ID : </b>',NEW.dbID,'<b>][Nama File : </b>',NEW.file_name,'<b>][Ukuran File : </b>',NEW.file_size,'<b>]</b>' ));
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `sys_users`
--

CREATE TABLE `sys_users` (
  `userID` int(11) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `user_account_name` varchar(30) NOT NULL,
  `user_account_password` varchar(45) NOT NULL,
  `user_permissions` enum('Administrator','Operator') NOT NULL,
  `block_users` enum('Ya','Tidak') NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `created_user` int(11) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_user` int(11) DEFAULT NULL,
  `updated_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data for table `sys_users`
--

INSERT INTO `sys_users` (`userID`, `fullname`, `user_account_name`, `user_account_password`, `user_permissions`, `block_users`, `last_login`, `created_user`, `created_date`, `updated_user`, `updated_date`) VALUES
(1, 'Admin', 'admin', '90b9aa7e25f80cf4f64e990b78a9fc5ebd6cecad', 'Administrator', 'Tidak', '2024-12-12 23:04:52', 1, '2018-03-31 18:01:01', 1, '2024-12-12 23:04:52'),
(2, 'Operator', 'operator', 'e1eb39623dfa23bcf8c7b6fee2a17b85bc53da3e', 'Operator', 'Tidak', '2024-12-08 17:36:59', 1, '2023-02-25 15:55:18', 2, '2024-12-08 17:36:59');

--
-- Triggers `sys_users`
--
DELIMITER $$
CREATE TRIGGER `users_insert` AFTER INSERT ON `sys_users` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.created_user,'Insert',CONCAT('<b>Insert</b> data user baru pada tabel <b>sys_users</b>.<br><b>[ID User : </b>',NEW.userID,'<b>][Nama User : </b>',NEW.fullname,'<b>][Username : </b>',NEW.user_account_name,'<b>][Password : </b>',NEW.user_account_password,'<b>][Hak Akses : </b>',NEW.user_permissions,'<b>][Blokir : </b>',NEW.block_users,'<b>]</b>' ));
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `users_update` AFTER UPDATE ON `sys_users` FOR EACH ROW BEGIN
INSERT INTO sys_audit_trail (username,action,description) VALUES (NEW.updated_user,'Update',CONCAT('<b>Update</b> data user pada tabel <b>sys_users</b>.<br><b>Data Lama = [ID User : </b>',OLD.userID,'<b>][Nama User : </b>',OLD.fullname,'<b>][Username : </b>',OLD.user_account_name,'<b>][Password : </b>',OLD.user_account_password,'<b>][Hak Akses : </b>',OLD.user_permissions,'<b>][Blokir : </b>',OLD.block_users,'<b>],<br> Data Baru = [ID User : </b>',NEW.userID,'<b>][Nama User : </b>',NEW.fullname,'<b>][Username : </b>',NEW.user_account_name,'<b>][Password : </b>',NEW.user_account_password,'<b>][Hak Akses : </b>',NEW.user_permissions,'<b>][Blokir : </b>',NEW.block_users,'<b>]</b>' ));
END
$$
DELIMITER ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_instansi`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `surat_keluar`
--
ALTER TABLE `surat_keluar`
  ADD PRIMARY KEY (`id_surat_keluar`);

--
-- Indexes for table `surat_masuk`
--
ALTER TABLE `surat_masuk`
  ADD PRIMARY KEY (`id_surat_masuk`);

--
-- Indexes for table `sys_audit_trail`
--
ALTER TABLE `sys_audit_trail`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `sys_config`
--
ALTER TABLE `sys_config`
  ADD PRIMARY KEY (`configID`);

--
-- Indexes for table `sys_database`
--
ALTER TABLE `sys_database`
  ADD PRIMARY KEY (`dbID`);

--
-- Indexes for table `sys_users`
--
ALTER TABLE `sys_users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sys_audit_trail`
--
ALTER TABLE `sys_audit_trail`
  MODIFY `ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
