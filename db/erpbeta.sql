-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 05:21 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.0.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `erpbeta`
--

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `divisi_id` int(11) NOT NULL,
  `divisi_judul` varchar(220) NOT NULL,
  `divisi_judul_seo` varchar(220) NOT NULL,
  `divisi_desk` text NOT NULL,
  `divisi_keyword` varchar(220) NOT NULL,
  `divisi_meta_desk` varchar(200) NOT NULL,
  `divisi_gambar` text NOT NULL,
  `divisi_post_oleh` varchar(200) NOT NULL,
  `divisi_post_hari` varchar(20) NOT NULL,
  `divisi_post_tanggal` date NOT NULL,
  `divisi_post_jam` time NOT NULL,
  `divisi_update_oleh` varchar(200) NOT NULL,
  `divisi_update_hari` varchar(20) NOT NULL,
  `divisi_update_tanggal` date NOT NULL,
  `divisi_update_jam` time NOT NULL,
  `divisi_dibaca` int(50) NOT NULL,
  `divisi_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`divisi_id`, `divisi_judul`, `divisi_judul_seo`, `divisi_desk`, `divisi_keyword`, `divisi_meta_desk`, `divisi_gambar`, `divisi_post_oleh`, `divisi_post_hari`, `divisi_post_tanggal`, `divisi_post_jam`, `divisi_update_oleh`, `divisi_update_hari`, `divisi_update_tanggal`, `divisi_update_jam`, `divisi_dibaca`, `divisi_status`) VALUES
(12, 'Informasi teknologi', 'informasi-teknologi', '<p>deskripsi IT</p>', '', 'IT', '', 'dhawy', 'Senin', '2020-12-07', '18:19:07', 'dhawy', 'Jumat', '2020-12-18', '07:17:24', 0, 'publish'),
(13, 'Human Capital Department', 'human-capital-department', '<p>isi&nbsp;Human Capital Department</p>', '', 'HCD', '', 'dhawy', 'Minggu', '2020-12-27', '10:26:58', 'dhawy', 'Rabu', '2022-01-19', '09:51:09', 0, 'publish'),
(15, 'Finance & Accounting', 'finance--accounting', '<p>Isi Finance &amp; Accounting</p><p><br></p>', '', 'FIN & ACCOUNT', '', 'dhawy', 'Minggu', '2020-12-27', '10:28:48', 'dhawy', 'Rabu', '2022-01-19', '09:48:23', 0, 'publish'),
(18, 'Member', 'member', '<p>Member<br></p>', '', 'MM', '', 'dhawy', 'Rabu', '2021-05-05', '10:22:05', 'dhawy', 'Rabu', '2022-01-19', '09:52:11', 0, 'publish'),
(19, 'General Affair', 'general-affair', '<p>General Affair<br></p>', '', 'GA', '', 'dhawy', 'Rabu', '2021-05-05', '10:38:02', 'dhawy', 'Rabu', '2022-01-19', '09:48:45', 0, 'publish'),
(20, 'VIP Member', 'vip-member', '<p>VIP Member</p>', '', 'VIP', '', 'dhawy', 'Rabu', '2021-05-05', '10:39:12', 'dhawy', 'Rabu', '2021-05-05', '10:40:43', 0, 'delete'),
(21, 'Marketing', 'marketing', '<p>Marketing</p>', '', 'MKT', '', 'dhawy', 'Rabu', '2022-01-19', '09:50:06', '', '', '0000-00-00', '00:00:00', 0, 'publish'),
(22, 'PRODUCTION', 'production', '<p>isi production</p>', '', 'PROD', '', 'dhawy', 'Rabu', '2022-01-19', '09:51:46', '', '', '0000-00-00', '00:00:00', 0, 'publish'),
(23, 'PURCHASING', 'purchasing', '<p>isi&nbsp;PURCHASING&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</p>', '', 'PURCS', '', 'dhawy', 'Rabu', '2022-01-19', '09:52:46', '', '', '0000-00-00', '00:00:00', 0, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `identitas`
--

CREATE TABLE `identitas` (
  `id_identitas` int(11) NOT NULL,
  `nama_website` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `url` varchar(100) DEFAULT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `whatsapp` text,
  `youtube` varchar(100) DEFAULT NULL,
  `no_telp` varchar(12) DEFAULT NULL,
  `meta_deskripsi` varchar(250) DEFAULT NULL,
  `meta_keyword` varchar(250) DEFAULT NULL,
  `favicon` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `mini_logo` varchar(200) NOT NULL,
  `seo` text,
  `analytics` varchar(100) NOT NULL,
  `pixel` varchar(150) NOT NULL,
  `maps` text,
  `slogan` varchar(255) DEFAULT NULL,
  `alamat` text,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `identitas`
--

INSERT INTO `identitas` (`id_identitas`, `nama_website`, `email`, `url`, `facebook`, `instagram`, `whatsapp`, `youtube`, `no_telp`, `meta_deskripsi`, `meta_keyword`, `favicon`, `logo`, `mini_logo`, `seo`, `analytics`, `pixel`, `maps`, `slogan`, `alamat`, `foto`) VALUES
(1, 'ERP Beta', 'info@erpbeta.com', 'https://erpbeta.com/', 'https://www.facebook.com/', 'https://www.instagram.com/', '62888888888', 'https://www.youtube.com/', '888888888', '', '', 'logo_2021-03.png', 'logo.jpg', '', 'uggZWt61ufwlrt29-IEusMQmCsQ87q8xTON7p_MJbMo', 'G-Y47SKRX3TV', '', '', '', 'Jakarta, Indonesia', '');

-- --------------------------------------------------------

--
-- Table structure for table `log_activity`
--

CREATE TABLE `log_activity` (
  `log_activity_id` int(200) NOT NULL,
  `log_activity_modul` varchar(200) NOT NULL,
  `log_activity_user_id` int(200) NOT NULL,
  `log_activity_status` varchar(200) NOT NULL,
  `log_activity_waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `log_activity_platform` varchar(200) NOT NULL,
  `log_activity_ip` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `log_activity`
--

INSERT INTO `log_activity` (`log_activity_id`, `log_activity_modul`, `log_activity_user_id`, `log_activity_status`, `log_activity_waktu`, `log_activity_platform`, `log_activity_ip`) VALUES
(1, 'login', 6, 'login', '2022-01-19 06:08:09', 'Desktop Chrome 97.0.4692.71', '::1'),
(2, 'login', 6, 'login', '2022-01-19 06:18:57', 'Desktop Chrome 97.0.4692.71', '::1'),
(3, 'login', 6, 'login', '2022-01-19 06:21:20', 'Desktop Chrome 97.0.4692.71', '::1'),
(4, 'login', 6, 'login', '2022-01-19 06:27:58', 'Desktop Chrome 97.0.4692.71', '::1'),
(5, 'login', 6, 'login', '2022-01-19 08:01:03', 'Desktop Chrome 97.0.4692.71', '::1'),
(6, 'login', 30, 'login', '2022-01-19 08:01:19', 'Desktop Chrome 97.0.4692.71', '::1'),
(7, 'login', 6, 'login', '2022-01-26 09:28:36', 'Desktop Chrome 97.0.4692.99', '::1'),
(8, 'login', 6, 'login', '2022-02-02 04:08:09', 'Desktop Chrome 97.0.4692.99', '::1'),
(9, 'login', 6, 'login', '2022-02-15 07:58:23', 'Desktop Chrome 98.0.4758.82', '::1'),
(10, 'Tambahkan', 6, 'Tambah Perusahaan', '2022-02-15 09:36:35', 'Desktop Chrome 98.0.4758.82', '::1'),
(11, 'Tambahkan', 6, 'Tambah Perusahaan', '2022-02-15 10:02:11', 'Desktop Chrome 98.0.4758.82', '::1'),
(12, 'login', 6, 'login', '2022-02-16 06:44:09', 'Desktop Chrome 98.0.4758.82', '::1'),
(13, 'Tambah Perusahaan', 6, 'TambahWMPP', '2022-02-16 06:50:42', 'Desktop Chrome 98.0.4758.82', '::1'),
(14, 'login', 6, 'login', '2022-02-16 09:20:16', 'Desktop Chrome 98.0.4758.82', '::1'),
(15, 'login', 6, 'login', '2022-02-17 07:05:18', 'Desktop Chrome 98.0.4758.102', '::1'),
(16, 'Update Perusahaan', 6, 'Update AAA234', '2022-02-17 07:29:44', 'Desktop Chrome 98.0.4758.102', '::1'),
(17, 'Update Perusahaan', 6, 'Update AAA234', '2022-02-17 07:31:16', 'Desktop Chrome 98.0.4758.102', '::1'),
(18, 'Tambah Perusahaan', 6, 'Tambah 1', '2022-02-17 07:40:29', 'Desktop Chrome 98.0.4758.102', '::1'),
(19, 'Tambah Perusahaan', 6, 'Tambah 1', '2022-02-17 07:41:39', 'Desktop Chrome 98.0.4758.102', '::1'),
(20, 'Tambah Perusahaan', 6, 'Tambah 2', '2022-02-17 08:02:51', 'Desktop Chrome 98.0.4758.102', '::1'),
(21, 'Hapus Perusahaan', 6, 'Hapus widodo-makmur-', '2022-02-17 08:21:21', 'Desktop Chrome 98.0.4758.102', '::1'),
(22, 'Kembalikan Perusahaan', 6, 'Kembalikan widodo-ma', '2022-02-17 08:22:11', 'Desktop Chrome 98.0.4758.102', '::1'),
(23, 'Hapus Perusahaan', 6, 'Hapus widodo-makmur-', '2022-02-17 08:22:18', 'Desktop Chrome 98.0.4758.102', '::1'),
(24, 'Kembalikan Perusahaan', 6, 'Kembalikan widodo-makmur-perkasa', '2022-02-17 08:24:15', 'Desktop Chrome 98.0.4758.102', '::1'),
(25, 'Update Perusahaan', 6, 'Update 1', '2022-02-17 08:38:27', 'Desktop Chrome 98.0.4758.102', '::1'),
(26, 'Update Perusahaan', 6, 'Update 2', '2022-02-17 08:38:37', 'Desktop Chrome 98.0.4758.102', '::1'),
(27, 'Update Perusahaan', 6, 'Update 2', '2022-02-17 09:33:47', 'Desktop Chrome 98.0.4758.102', '::1'),
(28, 'login', 6, 'login', '2022-03-01 04:06:32', 'Desktop Chrome 98.0.4758.102', '::1'),
(29, 'Update Perusahaan', 6, 'Update 2', '2022-03-01 04:08:03', 'Desktop Chrome 98.0.4758.102', '::1'),
(30, 'Update Perusahaan', 6, 'Update 2', '2022-03-01 04:08:40', 'Desktop Chrome 98.0.4758.102', '::1'),
(31, 'Hapus Perusahaan', 6, 'Hapus widodo-makmur-perkasa', '2022-03-01 07:19:10', 'Desktop Chrome 98.0.4758.102', '::1'),
(32, 'Hapus Perusahaan', 6, 'Hapus widodo-makmur-sejahtera', '2022-03-01 07:19:12', 'Desktop Chrome 98.0.4758.102', '::1'),
(33, 'Kembalikan Perusahaan', 6, 'Kembalikan widodo-makmur-perkasa', '2022-03-01 07:22:30', 'Desktop Chrome 98.0.4758.102', '::1'),
(34, 'Update Perusahaan', 6, 'Update 1', '2022-03-01 07:22:45', 'Desktop Chrome 98.0.4758.102', '::1'),
(35, 'Update Perusahaan', 6, 'Update 1', '2022-03-01 08:23:45', 'Desktop Chrome 98.0.4758.102', '::1'),
(36, 'Tambah Perusahaan', 6, 'Tambah ', '2022-03-01 09:13:33', 'Desktop Chrome 98.0.4758.102', '::1'),
(37, 'login', 6, 'login', '2022-03-02 06:28:26', 'Desktop Chrome 98.0.4758.102', '::1'),
(38, 'Update Perusahaan', 6, 'Update 12', '2022-03-02 06:29:55', 'Desktop Chrome 98.0.4758.102', '::1'),
(39, 'Update Perusahaan', 6, 'Update 1', '2022-03-02 06:30:00', 'Desktop Chrome 98.0.4758.102', '::1'),
(40, 'Update Perusahaan', 6, 'Update 11', '2022-03-02 06:32:16', 'Desktop Chrome 98.0.4758.102', '::1'),
(41, 'Tambah Perusahaan', 6, 'Tambah 111', '2022-03-02 06:33:56', 'Desktop Chrome 98.0.4758.102', '::1'),
(42, 'Tambah Perusahaan', 6, 'Tambah 112', '2022-03-02 06:34:28', 'Desktop Chrome 98.0.4758.102', '::1'),
(43, 'Tambah Perusahaan', 6, 'Tambah 12', '2022-03-02 06:35:08', 'Desktop Chrome 98.0.4758.102', '::1'),
(44, 'Tambah Perusahaan', 6, 'Tambah 121', '2022-03-02 06:35:55', 'Desktop Chrome 98.0.4758.102', '::1'),
(45, 'Tambah Perusahaan', 6, 'Tambah 122', '2022-03-02 06:36:24', 'Desktop Chrome 98.0.4758.102', '::1'),
(46, 'login', 6, 'login', '2022-03-07 05:05:19', 'Desktop Chrome 98.0.4758.102', '::1'),
(47, 'login', 33, 'login', '2022-03-07 05:12:16', 'Desktop Chrome 98.0.4758.102', '::1'),
(48, 'login', 6, 'login', '2022-03-07 08:34:00', 'Desktop Chrome 98.0.4758.102', '::1'),
(49, 'login', 30, 'login', '2022-03-07 09:11:50', 'Desktop Chrome 98.0.4758.102', '::1'),
(50, 'Tambah Perusahaan', 30, 'Tambah 1223131', '2022-03-07 09:33:28', 'Desktop Chrome 98.0.4758.102', '::1'),
(51, 'Hapus Perusahaan', 30, 'Hapus tesss', '2022-03-07 09:37:04', 'Desktop Chrome 98.0.4758.102', '::1'),
(52, 'Kembalikan Perusahaan', 30, 'Kembalikan tesss', '2022-03-07 09:43:45', 'Desktop Chrome 98.0.4758.102', '::1'),
(53, 'Blok Perusahaan', 30, 'Blok tesss', '2022-03-07 09:45:27', 'Desktop Chrome 98.0.4758.102', '::1'),
(54, 'login', 6, 'login', '2022-03-08 03:51:28', 'Desktop Chrome 98.0.4758.102', '::1'),
(55, 'Tambah Perusahaan', 6, 'Tambah 123', '2022-03-08 04:21:25', 'Desktop Chrome 98.0.4758.102', '::1'),
(56, 'Tambah Perusahaan', 6, 'Tambah 13', '2022-03-08 04:22:25', 'Desktop Chrome 98.0.4758.102', '::1'),
(57, 'Tambah Perusahaan', 6, 'Tambah 131', '2022-03-08 04:23:36', 'Desktop Chrome 98.0.4758.102', '::1'),
(58, 'Update Perusahaan', 6, 'Update 131', '2022-03-08 04:23:51', 'Desktop Chrome 98.0.4758.102', '::1'),
(59, 'Update Perusahaan', 6, 'Update 131', '2022-03-08 04:24:03', 'Desktop Chrome 98.0.4758.102', '::1'),
(60, 'Tambah Perusahaan', 6, 'Tambah 132', '2022-03-08 04:24:45', 'Desktop Chrome 98.0.4758.102', '::1'),
(61, 'login', 30, 'login', '2022-03-08 04:39:34', 'Desktop Chrome 98.0.4758.102', '::1'),
(62, 'Update Perusahaan', 6, 'Update 11', '2022-03-08 08:54:29', 'Desktop Chrome 98.0.4758.102', '::1'),
(63, 'login', 6, 'login', '2022-03-09 04:15:04', 'Desktop Chrome 98.0.4758.102', '::1'),
(64, 'Tambah User', 6, 'Tambah admin', '2022-03-09 04:21:07', 'Desktop Chrome 98.0.4758.102', '::1');

-- --------------------------------------------------------

--
-- Table structure for table `templates`
--

CREATE TABLE `templates` (
  `templates_id` int(11) NOT NULL,
  `templates_judul` varchar(220) NOT NULL,
  `templates_judul_seo` varchar(220) NOT NULL,
  `templates_desk` text NOT NULL,
  `templates_keyword` varchar(220) NOT NULL,
  `templates_meta_desk` varchar(200) NOT NULL,
  `templates_harga` int(50) NOT NULL,
  `templates_harga_diskon` int(20) DEFAULT NULL,
  `templates_url` text NOT NULL,
  `templates_url_tokped` text NOT NULL,
  `templates_gambar` text NOT NULL,
  `templates_post_oleh` varchar(200) NOT NULL,
  `templates_post_hari` varchar(20) NOT NULL,
  `templates_post_tanggal` date NOT NULL,
  `templates_post_jam` time NOT NULL,
  `templates_update_oleh` varchar(200) NOT NULL,
  `templates_update_hari` varchar(20) NOT NULL,
  `templates_update_tanggal` date NOT NULL,
  `templates_update_jam` time NOT NULL,
  `templates_dibaca` int(50) NOT NULL,
  `templates_status` varchar(20) NOT NULL,
  `templates_cat_id` int(11) NOT NULL,
  `templates_dibeli` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates`
--

INSERT INTO `templates` (`templates_id`, `templates_judul`, `templates_judul_seo`, `templates_desk`, `templates_keyword`, `templates_meta_desk`, `templates_harga`, `templates_harga_diskon`, `templates_url`, `templates_url_tokped`, `templates_gambar`, `templates_post_oleh`, `templates_post_hari`, `templates_post_tanggal`, `templates_post_jam`, `templates_update_oleh`, `templates_update_hari`, `templates_update_tanggal`, `templates_update_jam`, `templates_dibaca`, `templates_status`, `templates_cat_id`, `templates_dibeli`) VALUES
(4, 'haahaha', 'haahaha', '<p>asdasdasd</p>', 'asdasd asdasda', 'asdsad', 0, NULL, 'adad', '', '', 'dhawy', 'Senin', '2021-10-18', '11:11:52', 'dhawy', 'Senin', '2021-10-18', '15:56:06', 0, 'delete', 7, 0),
(5, 'Produk 1', 'produk-1', '<p>deskripsi</p>', 'kata kunci produk1', 'meta deskripsi', 1000, 10, 'shopee.id', '', 'k1.jpg', 'dhawy', 'Rabu', '2021-10-27', '16:56:07', '', '', '0000-00-00', '00:00:00', 1, 'publish', 7, 0),
(6, 'Produk 2', 'produk-2', '<p>deskripsi 2</p>', '', 'meta deskripsi 2', 1230000, 0, 'shopee2.id', '', 'k2_1.jpg', 'dhawy', 'Rabu', '2021-10-27', '17:04:39', 'dhawy', 'Senin', '2021-11-01', '00:37:36', 6, 'publish', 8, 0);

-- --------------------------------------------------------

--
-- Table structure for table `templates_category`
--

CREATE TABLE `templates_category` (
  `templates_cat_id` int(11) NOT NULL,
  `templates_cat_judul` varchar(220) NOT NULL,
  `templates_cat_judul_seo` varchar(220) NOT NULL,
  `templates_cat_desk` text NOT NULL,
  `templates_cat_keyword` varchar(220) NOT NULL,
  `templates_cat_meta_desk` varchar(200) NOT NULL,
  `templates_cat_gambar` text NOT NULL,
  `templates_cat_post_oleh` varchar(200) NOT NULL,
  `templates_cat_post_hari` varchar(20) NOT NULL,
  `templates_cat_post_tanggal` date NOT NULL,
  `templates_cat_post_jam` time NOT NULL,
  `templates_cat_update_oleh` varchar(200) NOT NULL,
  `templates_cat_update_hari` varchar(20) NOT NULL,
  `templates_cat_update_tanggal` date NOT NULL,
  `templates_cat_update_jam` time NOT NULL,
  `templates_cat_dibaca` int(50) NOT NULL,
  `templates_cat_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `templates_category`
--

INSERT INTO `templates_category` (`templates_cat_id`, `templates_cat_judul`, `templates_cat_judul_seo`, `templates_cat_desk`, `templates_cat_keyword`, `templates_cat_meta_desk`, `templates_cat_gambar`, `templates_cat_post_oleh`, `templates_cat_post_hari`, `templates_cat_post_tanggal`, `templates_cat_post_jam`, `templates_cat_update_oleh`, `templates_cat_update_hari`, `templates_cat_update_tanggal`, `templates_cat_update_jam`, `templates_cat_dibaca`, `templates_cat_status`) VALUES
(7, 'Hukum', 'hukum', '<p>Hukum deskripsi</p>', '', '', '', 'dhawy', 'Jumat', '2021-05-07', '16:28:05', '', '', '0000-00-00', '00:00:00', 0, 'Publish'),
(8, 'Kategori 2', 'kategori-2', '<p>Kategori 2<br></p>', '', '', '', 'dhawy', 'Rabu', '2021-10-27', '17:04:05', '', '', '0000-00-00', '00:00:00', 0, 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `level` varchar(20) NOT NULL,
  `id_session` varchar(255) NOT NULL,
  `user_post_hari` varchar(20) NOT NULL,
  `user_post_tanggal` date NOT NULL,
  `user_post_jam` time NOT NULL,
  `user_update_hari` varchar(20) NOT NULL,
  `user_update_tanggal` date NOT NULL,
  `user_update_jam` time NOT NULL,
  `user_gambar` text NOT NULL,
  `user_status` varchar(20) NOT NULL,
  `user_login_tanggal` date NOT NULL,
  `user_login_jam` time NOT NULL,
  `user_login_status` varchar(20) NOT NULL,
  `user_stat` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `email`, `password`, `level`, `id_session`, `user_post_hari`, `user_post_tanggal`, `user_post_jam`, `user_update_hari`, `user_update_tanggal`, `user_update_jam`, `user_gambar`, `user_status`, `user_login_tanggal`, `user_login_jam`, `user_login_status`, `user_stat`) VALUES
(6, 'dhawy', 'dhawy arkan', 'dhawy@gmail.com', '21d564edcc5b55c0af9b3684ef7df4d38b36c224', '1', '1d3ee28b20064eb055ea2315493770bf-20220308155504', 'Kamis', '2020-06-25', '15:14:48', 'Selasa', '2022-03-08', '15:55:04', 'user-profile-avatar-job-social-businessman-profession-user-profile-png-512_512.png', '1', '2022-03-09', '11:15:04', 'online', 'Publish'),
(30, 'jiung', 'jiung', 'adjiesans@gmail.com', 'fb77c78426323aa6f4e7d9589a5656651a3ef135', '2', '1d00fc6c047a79e4473a253bbb47d62e-20220307161140', 'Kamis', '2021-04-22', '10:52:42', 'Senin', '2022-03-07', '16:11:40', 'luffy.jpg', '1', '2022-03-08', '11:39:34', 'online', 'publish'),
(33, 'karyo', 'Karyo', 'dhawy@gmail.com', 'fb77c78426323aa6f4e7d9589a5656651a3ef135', '4', '1d3ee28b20064eb055ea2315493770bf-20220308141142', 'Kamis', '2022-02-17', '14:54:36', 'Selasa', '2022-03-08', '14:11:42', '', '1', '2022-03-07', '12:12:16', 'offline', 'publish'),
(37, 'koja', 'Koja', 'koja@gmail.com', '8d264dd99e492b505706a9e2792a0feb4754cabc', '5', 'caecfe0fb0c52f39065d742bf407259a-20220302171226', 'Kamis', '2022-02-17', '16:00:04', 'Rabu', '2022-03-02', '17:12:26', '', '1', '0000-00-00', '00:00:00', '', 'publish'),
(38, 'sadsad', 'sadsad', 'asd@gmail.com', 'd164b39e9ec43f65376629da9ccf41780775f656', '4', '699c8f0489033dcb85f2efbcd2148993-20220302135446', 'Kamis', '2022-02-17', '16:01:24', 'Rabu', '2022-03-02', '13:54:46', '', '1', '0000-00-00', '00:00:00', '', 'publish'),
(39, 'admin', 'Admin', 'admin@erp.com', '7c222fb2927d828af22f592134e8932480637c0d', '2', '56bd74f71fb8d67449b3c7149b8b51e4-20220309112118', 'Rabu', '2022-03-09', '11:21:07', 'Rabu', '2022-03-09', '11:21:18', '', '1', '0000-00-00', '00:00:00', '', 'publish');

-- --------------------------------------------------------

--
-- Table structure for table `user_agama`
--

CREATE TABLE `user_agama` (
  `user_agama_id` int(2) NOT NULL,
  `user_agama_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_agama`
--

INSERT INTO `user_agama` (`user_agama_id`, `user_agama_nama`) VALUES
(1, ''),
(2, 'Islam'),
(3, 'Kristen'),
(4, 'Katolik'),
(5, 'Hindu'),
(6, 'Buddha'),
(7, 'Konghucu');

-- --------------------------------------------------------

--
-- Table structure for table `user_company`
--

CREATE TABLE `user_company` (
  `user_company_id` int(200) NOT NULL,
  `user_company_account` varchar(20) NOT NULL,
  `user_company_judul` varchar(200) NOT NULL,
  `user_company_judul_seo` varchar(200) NOT NULL,
  `user_company_nama` varchar(220) NOT NULL,
  `user_company_kategori` varchar(220) NOT NULL,
  `user_company_warna` varchar(200) NOT NULL,
  `user_company_logo` text NOT NULL,
  `user_company_post_oleh` varchar(50) NOT NULL,
  `user_company_post_hari` varchar(20) NOT NULL,
  `user_company_post_tanggal` date NOT NULL,
  `user_company_post_jam` time NOT NULL,
  `user_company_status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_company`
--

INSERT INTO `user_company` (`user_company_id`, `user_company_account`, `user_company_judul`, `user_company_judul_seo`, `user_company_nama`, `user_company_kategori`, `user_company_warna`, `user_company_logo`, `user_company_post_oleh`, `user_company_post_hari`, `user_company_post_tanggal`, `user_company_post_jam`, `user_company_status`) VALUES
(2, '1', 'WMP', 'wmp', 'PT. Widodo Makmur Perkasa', '1', '#ED0D18', 'wmpnews.png', '6', 'Rabu', '2022-03-02', '13:30:00', '1'),
(4, '11', 'PASTE', 'paste', 'PT Pasir Tengah', '2', '#BEB138', '', '6', 'Selasa', '2022-03-08', '15:54:29', '1'),
(5, '111', 'WMP', 'wmp', 'PT Widodo Makmur Perkasa', '3', '', '', '6', 'Rabu', '2022-03-02', '13:33:56', '1'),
(6, '112', 'PASTE', 'paste', 'PT Pasir Tengah', '3', '', '', '6', 'Rabu', '2022-03-02', '13:34:28', '1'),
(7, '12', 'CAM', 'cam', 'PT Cianjur Arta Makmur', '2', '', '', '6', 'Rabu', '2022-03-02', '13:35:08', '1'),
(8, '121', 'CAM', 'cam', 'PT Cianjur Arta Makmur', '3', '', '', '6', 'Rabu', '2022-03-02', '13:35:55', '1'),
(9, '122', 'PWM', 'pwm', 'PT Prima Widodo Makmur', '3', '', '', '6', 'Rabu', '2022-03-02', '13:36:24', '1'),
(10, '123', 'GMP', 'gmp', 'PT Garut Makmur Perkasa', '3', '#104ABC', '', '6', 'Selasa', '2022-03-08', '11:21:25', '1'),
(11, '13', 'WMS', 'wms', 'PT Widodo Makmur Sejahtera', '2', '#5C9C35', '', '6', 'Selasa', '2022-03-08', '11:22:25', '1'),
(12, '131', 'WMS', 'wms', 'PT Widodo Makmur Sejahtera', '3', '#508E5C', '', '6', 'Selasa', '2022-03-08', '11:24:03', '1'),
(13, '132', 'PMP', 'pmp', 'PT Pangan Makmur Perkasa', '3', '#1B42E5', '', '6', 'Selasa', '2022-03-08', '11:24:45', '1');

-- --------------------------------------------------------

--
-- Table structure for table `user_company_level`
--

CREATE TABLE `user_company_level` (
  `user_company_level_id` int(2) NOT NULL,
  `user_company_level_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_company_level`
--

INSERT INTO `user_company_level` (`user_company_level_id`, `user_company_level_nama`) VALUES
(1, 'Holding'),
(2, 'Sub Holding'),
(3, 'Induk');

-- --------------------------------------------------------

--
-- Table structure for table `user_detail`
--

CREATE TABLE `user_detail` (
  `user_detail_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `user_detail_no_telp` varchar(20) NOT NULL,
  `user_detail_jekel` varchar(20) NOT NULL,
  `user_detail_agama` varchar(50) NOT NULL,
  `user_detail_tempatlahir` varchar(50) NOT NULL,
  `user_detail_tgllahir` date NOT NULL,
  `user_detail_perkawinan` varchar(100) NOT NULL,
  `user_detail_pendidikan` varchar(100) NOT NULL,
  `user_detail_divisi` int(3) NOT NULL,
  `user_detail_company` varchar(20) NOT NULL,
  `user_detail_ktp` varchar(50) NOT NULL,
  `user_detail_tempattinggal` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_detail`
--

INSERT INTO `user_detail` (`user_detail_id`, `id_user`, `user_detail_no_telp`, `user_detail_jekel`, `user_detail_agama`, `user_detail_tempatlahir`, `user_detail_tgllahir`, `user_detail_perkawinan`, `user_detail_pendidikan`, `user_detail_divisi`, `user_detail_company`, `user_detail_ktp`, `user_detail_tempattinggal`) VALUES
(25, 6, '1231312313', 'Pria', 'Islam', 'jakarta', '2021-01-29', 'Lajang', 's1', 12, '2', '12312313123', 'bogor'),
(39, 30, '01231312312', 'Pria', 'Islam', 'Jakarta', '1945-12-08', 'Menikah', 'S3', 12, '2', '088888888', 'Jakarta'),
(41, 33, '232131232', 'Pria', 'Islam', 'bogor', '2022-02-02', 'Belum jelas', 's3', 23, '4', '1111', 'Jakarta'),
(43, 37, '2', 'Wanita', 'Kristen', 'Zimbabwe', '2022-02-08', 'Lajang', 's3', 23, '8', '123', 'sdsad'),
(44, 38, '', '', '', '23123', '2022-02-08', ' ', '', 20, '6', '', ''),
(45, 39, '', 'Pria', 'Islam', 'Zimbabwe', '2022-03-07', 'Menikah', 's3', 12, '2', '1233', 'Jakarta');

-- --------------------------------------------------------

--
-- Table structure for table `user_jabatan`
--

CREATE TABLE `user_jabatan` (
  `user_jabatan_id` int(2) NOT NULL,
  `user_jabatan_nama` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_jabatan`
--

INSERT INTO `user_jabatan` (`user_jabatan_id`, `user_jabatan_nama`) VALUES
(1, 'Onboarding'),
(2, 'Training'),
(3, 'Tetap');

-- --------------------------------------------------------

--
-- Table structure for table `user_jam`
--

CREATE TABLE `user_jam` (
  `user_jam_id` tinyint(1) NOT NULL,
  `user_jam_judul` varchar(220) NOT NULL,
  `user_jam_judul_seo` varchar(220) NOT NULL,
  `user_jam_mulai` time NOT NULL,
  `user_jam_selesai` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_jam`
--

INSERT INTO `user_jam` (`user_jam_id`, `user_jam_judul`, `user_jam_judul_seo`, `user_jam_mulai`, `user_jam_selesai`) VALUES
(7, 'Lembur', 'lembur', '19:01:00', '21:00:00'),
(8, 'Pulang', 'pulang', '17:00:00', '19:00:00'),
(9, 'Masuk', 'masuk', '06:00:00', '08:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user_kelamin`
--

CREATE TABLE `user_kelamin` (
  `user_kelamin_id` int(2) NOT NULL,
  `user_kelamin_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_kelamin`
--

INSERT INTO `user_kelamin` (`user_kelamin_id`, `user_kelamin_nama`) VALUES
(1, 'Pria'),
(2, 'Wanita'),
(3, '');

-- --------------------------------------------------------

--
-- Table structure for table `user_level`
--

CREATE TABLE `user_level` (
  `user_level_id` int(11) NOT NULL,
  `user_level_nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_level`
--

INSERT INTO `user_level` (`user_level_id`, `user_level_nama`) VALUES
(1, 'Developer'),
(2, 'Administrator'),
(3, 'Staff'),
(4, 'Manager'),
(5, 'BOD\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user_perkawinan`
--

CREATE TABLE `user_perkawinan` (
  `user_perkawinan_id` int(2) NOT NULL,
  `user_perkawinan_nama` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_perkawinan`
--

INSERT INTO `user_perkawinan` (`user_perkawinan_id`, `user_perkawinan_nama`) VALUES
(1, ' '),
(2, 'Lajang'),
(3, 'Menikah'),
(4, 'Cerai'),
(5, 'Belum jelas');

-- --------------------------------------------------------

--
-- Table structure for table `user_status`
--

CREATE TABLE `user_status` (
  `user_status_id` int(11) NOT NULL,
  `user_status_nama` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_status`
--

INSERT INTO `user_status` (`user_status_id`, `user_status_nama`) VALUES
(1, 'Active'),
(2, 'Suspend');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`divisi_id`);

--
-- Indexes for table `identitas`
--
ALTER TABLE `identitas`
  ADD PRIMARY KEY (`id_identitas`);

--
-- Indexes for table `log_activity`
--
ALTER TABLE `log_activity`
  ADD PRIMARY KEY (`log_activity_id`);

--
-- Indexes for table `templates`
--
ALTER TABLE `templates`
  ADD PRIMARY KEY (`templates_id`);

--
-- Indexes for table `templates_category`
--
ALTER TABLE `templates_category`
  ADD PRIMARY KEY (`templates_cat_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_agama`
--
ALTER TABLE `user_agama`
  ADD PRIMARY KEY (`user_agama_id`);

--
-- Indexes for table `user_company`
--
ALTER TABLE `user_company`
  ADD PRIMARY KEY (`user_company_id`);

--
-- Indexes for table `user_company_level`
--
ALTER TABLE `user_company_level`
  ADD PRIMARY KEY (`user_company_level_id`);

--
-- Indexes for table `user_detail`
--
ALTER TABLE `user_detail`
  ADD PRIMARY KEY (`user_detail_id`);

--
-- Indexes for table `user_jabatan`
--
ALTER TABLE `user_jabatan`
  ADD PRIMARY KEY (`user_jabatan_id`);

--
-- Indexes for table `user_jam`
--
ALTER TABLE `user_jam`
  ADD PRIMARY KEY (`user_jam_id`);

--
-- Indexes for table `user_kelamin`
--
ALTER TABLE `user_kelamin`
  ADD PRIMARY KEY (`user_kelamin_id`);

--
-- Indexes for table `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`user_level_id`);

--
-- Indexes for table `user_perkawinan`
--
ALTER TABLE `user_perkawinan`
  ADD PRIMARY KEY (`user_perkawinan_id`);

--
-- Indexes for table `user_status`
--
ALTER TABLE `user_status`
  ADD PRIMARY KEY (`user_status_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `divisi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `identitas`
--
ALTER TABLE `identitas`
  MODIFY `id_identitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `log_activity`
--
ALTER TABLE `log_activity`
  MODIFY `log_activity_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `templates`
--
ALTER TABLE `templates`
  MODIFY `templates_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `templates_category`
--
ALTER TABLE `templates_category`
  MODIFY `templates_cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `user_agama`
--
ALTER TABLE `user_agama`
  MODIFY `user_agama_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `user_company`
--
ALTER TABLE `user_company`
  MODIFY `user_company_id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `user_company_level`
--
ALTER TABLE `user_company_level`
  MODIFY `user_company_level_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_detail`
--
ALTER TABLE `user_detail`
  MODIFY `user_detail_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `user_jabatan`
--
ALTER TABLE `user_jabatan`
  MODIFY `user_jabatan_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_jam`
--
ALTER TABLE `user_jam`
  MODIFY `user_jam_id` tinyint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_kelamin`
--
ALTER TABLE `user_kelamin`
  MODIFY `user_kelamin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `user_perkawinan`
--
ALTER TABLE `user_perkawinan`
  MODIFY `user_perkawinan_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_status`
--
ALTER TABLE `user_status`
  MODIFY `user_status_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
