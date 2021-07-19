-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 19, 2021 at 02:00 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ppdb20`
--

-- --------------------------------------------------------

--
-- Table structure for table `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` varchar(50) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_daftar` int(10) NOT NULL,
  `jumlah` double(20,0) NOT NULL,
  `tgl_bayar` date NOT NULL,
  `keterangan` text DEFAULT NULL,
  `bukti` varchar(255) DEFAULT NULL,
  `verifikasi` int(1) NOT NULL DEFAULT 0,
  `hapus` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `id_user`, `id_daftar`, `jumlah`, `tgl_bayar`, `keterangan`, `bukti`, `verifikasi`, `hapus`) VALUES
('202107040001', 0, 461, 1450000, '2021-07-04', NULL, 'bukti_transaksi/bukti_202107040001.jpg', 1, NULL),
('202107040002', 0, 459, 1450000, '2021-07-04', NULL, 'bukti_transaksi/bukti_202107040001.jpg', 0, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `biaya`
--

CREATE TABLE `biaya` (
  `id_biaya` varchar(50) NOT NULL,
  `nama_biaya` varchar(200) NOT NULL,
  `jumlah` int(10) NOT NULL,
  `status` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `biaya`
--

INSERT INTO `biaya` (`id_biaya`, `nama_biaya`, `jumlah`, `status`) VALUES
('LAINLAIN', 'LAIN LAIN', 500000, '1'),
('SERAGAM', 'SERAGAM', 450000, '1'),
('SPP', 'SPP', 500000, '1');

-- --------------------------------------------------------

--
-- Table structure for table `daftar`
--

CREATE TABLE `daftar` (
  `id_daftar` int(11) NOT NULL,
  `no_daftar` varchar(20) DEFAULT NULL,
  `jenis` varchar(50) DEFAULT NULL,
  `nis` varchar(30) DEFAULT NULL,
  `nik` varchar(30) DEFAULT NULL,
  `no_kk` varchar(30) DEFAULT NULL,
  `nisn` varchar(30) DEFAULT NULL,
  `nama` varchar(128) NOT NULL,
  `foto` varchar(128) NOT NULL,
  `jenkel` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(128) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `asal_sekolah` varchar(128) DEFAULT NULL,
  `npsn_asal` varchar(20) DEFAULT NULL,
  `kelas` varchar(11) DEFAULT NULL,
  `jurusan` varchar(11) DEFAULT '',
  `jenjang` varchar(11) DEFAULT NULL,
  `agama` varchar(50) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `rt` varchar(5) DEFAULT NULL,
  `rw` varchar(5) DEFAULT NULL,
  `desa` varchar(128) DEFAULT NULL,
  `kecamatan` varchar(128) DEFAULT NULL,
  `kota` varchar(128) DEFAULT NULL,
  `provinsi` varchar(128) DEFAULT NULL,
  `kode_pos` varchar(6) DEFAULT NULL,
  `transportasi` varchar(128) DEFAULT NULL,
  `no_hp` varchar(16) DEFAULT NULL,
  `email` varchar(128) DEFAULT NULL,
  `anak_ke` int(2) DEFAULT NULL,
  `saudara` int(11) DEFAULT NULL,
  `tinggi` int(3) DEFAULT NULL,
  `berat` int(3) DEFAULT NULL,
  `status_keluarga` varchar(50) DEFAULT NULL,
  `tinggal` varchar(128) DEFAULT NULL,
  `jarak` varchar(128) DEFAULT NULL,
  `waktu` varchar(128) DEFAULT NULL,
  `nik_ayah` varchar(16) DEFAULT NULL,
  `nama_ayah` varchar(128) DEFAULT NULL,
  `tempat_ayah` varchar(128) DEFAULT NULL,
  `tgl_lahir_ayah` date DEFAULT NULL,
  `status_ayah` varchar(128) DEFAULT NULL,
  `pendidikan_ayah` varchar(128) DEFAULT NULL,
  `pekerjaan_ayah` varchar(128) DEFAULT NULL,
  `penghasilan_ayah` varchar(128) DEFAULT NULL,
  `no_hp_ayah` varchar(16) DEFAULT NULL,
  `nik_ibu` varchar(16) DEFAULT NULL,
  `nama_ibu` varchar(128) DEFAULT NULL,
  `tempat_ibu` varchar(128) DEFAULT NULL,
  `tgl_lahir_ibu` date DEFAULT NULL,
  `status_ibu` varchar(128) DEFAULT NULL,
  `pendidikan_ibu` varchar(128) DEFAULT NULL,
  `pekerjaan_ibu` varchar(128) DEFAULT NULL,
  `penghasilan_ibu` varchar(128) DEFAULT NULL,
  `no_hp_ibu` varchar(16) DEFAULT NULL,
  `nik_wali` varchar(16) DEFAULT NULL,
  `nama_wali` varchar(128) DEFAULT NULL,
  `tempat_wali` varchar(128) DEFAULT NULL,
  `tgl_lahir_wali` date DEFAULT NULL,
  `pendidikan_wali` varchar(50) DEFAULT NULL,
  `pekerjaan_wali` varchar(50) DEFAULT NULL,
  `penghasilan_wali` varchar(50) DEFAULT NULL,
  `no_hp_wali` varchar(16) DEFAULT NULL,
  `no_ijazah` varchar(128) DEFAULT NULL,
  `no_shun` varchar(128) DEFAULT NULL,
  `no_ujian` varchar(128) DEFAULT NULL,
  `no_kip` varchar(30) DEFAULT NULL,
  `file_kip` varchar(256) DEFAULT NULL,
  `file_kk` varchar(256) DEFAULT NULL,
  `file_ijazah` varchar(256) DEFAULT NULL,
  `file_akte` varchar(256) DEFAULT NULL,
  `file_shun` varchar(256) DEFAULT NULL,
  `tgl_keluar` date DEFAULT NULL,
  `alasan_keluar` varchar(100) DEFAULT NULL,
  `surat_keluar` varchar(255) DEFAULT NULL,
  `level` varchar(10) DEFAULT NULL,
  `aktif` int(1) DEFAULT 0,
  `status` int(1) DEFAULT 0,
  `petugas_daftar` varchar(10) DEFAULT NULL,
  `petugas_konfirmasi` varchar(10) DEFAULT NULL,
  `tgl_daftar` date DEFAULT NULL,
  `tgl_konfirmasi` date DEFAULT NULL,
  `baju` varchar(10) DEFAULT NULL,
  `bayar` varchar(100) DEFAULT NULL,
  `online` int(1) DEFAULT 0,
  `password` text DEFAULT NULL,
  `file_foto` varchar(255) DEFAULT NULL,
  `prioritas` varchar(50) DEFAULT NULL,
  `asal_sekolah_lain` varchar(50) DEFAULT NULL,
  `agamasatu` varchar(30) DEFAULT NULL,
  `agamadua` varchar(30) DEFAULT NULL,
  `agamatiga` varchar(30) DEFAULT NULL,
  `agamaempat` varchar(30) DEFAULT NULL,
  `agamalima` varchar(30) DEFAULT NULL,
  `pknsatu` varchar(30) DEFAULT NULL,
  `pkndua` varchar(30) DEFAULT NULL,
  `pkntiga` varchar(30) DEFAULT NULL,
  `pknempat` varchar(30) DEFAULT NULL,
  `pknlima` varchar(30) DEFAULT NULL,
  `indsatu` varchar(30) DEFAULT NULL,
  `inddua` varchar(30) DEFAULT NULL,
  `indtiga` varchar(30) DEFAULT NULL,
  `indempat` varchar(30) DEFAULT NULL,
  `indlima` varchar(30) DEFAULT NULL,
  `ingsatu` varchar(30) DEFAULT NULL,
  `ingdua` varchar(30) DEFAULT NULL,
  `ingtiga` varchar(30) DEFAULT NULL,
  `ingempat` varchar(30) DEFAULT NULL,
  `inglima` varchar(30) DEFAULT NULL,
  `ipasatu` varchar(30) DEFAULT NULL,
  `ipadua` varchar(30) DEFAULT NULL,
  `ipatiga` varchar(30) DEFAULT NULL,
  `ipaempat` varchar(30) DEFAULT NULL,
  `ipalima` varchar(30) DEFAULT NULL,
  `ipssatu` varchar(30) DEFAULT NULL,
  `ipsdua` varchar(30) DEFAULT NULL,
  `ipstiga` varchar(30) DEFAULT NULL,
  `ipsempat` varchar(30) DEFAULT NULL,
  `ipslima` varchar(30) DEFAULT NULL,
  `mtksatu` varchar(10) DEFAULT NULL,
  `mtkdua` varchar(10) DEFAULT NULL,
  `mtktiga` varchar(10) DEFAULT NULL,
  `mtkempat` varchar(10) DEFAULT NULL,
  `mtklima` varchar(10) DEFAULT NULL,
  `wkt_daftar` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nilaius` varchar(10) DEFAULT NULL,
  `kota_asal_sekolah` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `daftar`
--

INSERT INTO `daftar` (`id_daftar`, `no_daftar`, `jenis`, `nis`, `nik`, `no_kk`, `nisn`, `nama`, `foto`, `jenkel`, `tempat_lahir`, `tgl_lahir`, `asal_sekolah`, `npsn_asal`, `kelas`, `jurusan`, `jenjang`, `agama`, `alamat`, `rt`, `rw`, `desa`, `kecamatan`, `kota`, `provinsi`, `kode_pos`, `transportasi`, `no_hp`, `email`, `anak_ke`, `saudara`, `tinggi`, `berat`, `status_keluarga`, `tinggal`, `jarak`, `waktu`, `nik_ayah`, `nama_ayah`, `tempat_ayah`, `tgl_lahir_ayah`, `status_ayah`, `pendidikan_ayah`, `pekerjaan_ayah`, `penghasilan_ayah`, `no_hp_ayah`, `nik_ibu`, `nama_ibu`, `tempat_ibu`, `tgl_lahir_ibu`, `status_ibu`, `pendidikan_ibu`, `pekerjaan_ibu`, `penghasilan_ibu`, `no_hp_ibu`, `nik_wali`, `nama_wali`, `tempat_wali`, `tgl_lahir_wali`, `pendidikan_wali`, `pekerjaan_wali`, `penghasilan_wali`, `no_hp_wali`, `no_ijazah`, `no_shun`, `no_ujian`, `no_kip`, `file_kip`, `file_kk`, `file_ijazah`, `file_akte`, `file_shun`, `tgl_keluar`, `alasan_keluar`, `surat_keluar`, `level`, `aktif`, `status`, `petugas_daftar`, `petugas_konfirmasi`, `tgl_daftar`, `tgl_konfirmasi`, `baju`, `bayar`, `online`, `password`, `file_foto`, `prioritas`, `asal_sekolah_lain`, `agamasatu`, `agamadua`, `agamatiga`, `agamaempat`, `agamalima`, `pknsatu`, `pkndua`, `pkntiga`, `pknempat`, `pknlima`, `indsatu`, `inddua`, `indtiga`, `indempat`, `indlima`, `ingsatu`, `ingdua`, `ingtiga`, `ingempat`, `inglima`, `ipasatu`, `ipadua`, `ipatiga`, `ipaempat`, `ipalima`, `ipssatu`, `ipsdua`, `ipstiga`, `ipsempat`, `ipslima`, `mtksatu`, `mtkdua`, `mtktiga`, `mtkempat`, `mtklima`, `wkt_daftar`, `nilaius`, `kota_asal_sekolah`) VALUES
(453, 'PPDB2020004', 'Jalur Zonasi', NULL, '123123', '123456789', '12345', 'Karianda', 'default.png', 'L', 'BATUPANJANG', '2020-05-05', 'SMPN 1 RUPAT', '124578', NULL, 'MIPA', NULL, 'Islam', 'JL.LEMBAGA', '01', '02', 'SEI ALAM', 'BKS', 'BKS', 'RIAU', '28712', 'Sepeda Motor', '085265583929', NULL, 5, 5, 170, 80, 'ANAK KANDUNG', 'Bersama Orang Tua', '1000', '15', '456789', 'USMAN', 'BKS', '2020-05-05', NULL, 'S1', 'Pedagang', 'Rp. 5 jt s/d Rp. 20 jt', '085265583929', '5648797', 'YW', 'ZUSSZUSSU', '2020-05-05', NULL, 'D3', 'Tidak Bekerja', 'Rp. 2jt s/d Rp. 4 jt', '9632588', '1213', 'AGAGAH', 'VSVSB', '2020-05-05', 'SMA Sederajat', 'Peternak', 'Rp. 5 jt s/d Rp. 20 jt', '09856764', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, '123', '1588679742-Albert_Einstein_w.jpg', NULL, NULL, '78.00', '89.00', '65.00', '65.00', '78.00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-07 05:50:45', '98.00', 'BATUPANJANG'),
(454, 'PPDB2020005', 'Jalur Zonasi', NULL, '123', '123', '12234', 'Wawan', 'default.png', 'L', 'Bengkalis', '2006-01-05', 'SMPN 1 BENGKALIS', '10400563', NULL, 'MIPA', NULL, 'Islam', 'JALAN ANTARA', '002', '001', 'KELAPAPATI', 'BENGKALIS', 'BENGKALIS', 'RIAU', '28751', 'Sepeda Motor', '085265907514', NULL, 2, 5, 156, 45, 'ANAK KANDUNG', 'Bersama Orang Tua', '1500', '15', '250', 'HAMDI', 'MEDAN', '1976-05-06', NULL, 'SMA Sederajat', 'Pedagang', 'Rp. 2jt s/d Rp. 4 jt', '085288567', '250', 'KAJOL', 'BANDUL', '1979-05-06', NULL, 'D3', 'PNS/TNI/POLRI', 'Rp. 5 jt s/d Rp. 20 jt', '5899', '', '', '', '2020-05-06', '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 2, NULL, NULL, NULL, NULL, NULL, NULL, 1, '12345', '1588715616-75328498_2725665177472133_386019947109908856_n.jpg', NULL, NULL, '65.78', '67.89', '76.90', '75.45', '76.87', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-07 02:09:38', '76.86', 'BENGKALIS'),
(455, 'PPDB2020006', 'Jalur Prestasi', NULL, '1403035010877417', '12345678901232', '1234567889', 'Jono Jawir', 'default.png', 'L', 'Jepang', '1990-06-05', 'SMPN 1 BENGKALIS', '10400089', NULL, 'MIPA', NULL, 'Islam', 'KANGKUNG', '1', '2', 'DAMON', 'BENGKALIS', 'BEGKALIS', 'RIAU', '28751', 'Sepeda Motor', '83465789871', NULL, 4, 5, 165, 44, 'ANAK KANDUNG', 'Bersama Orang Tua', '1000', '5', '1234567891234', 'JON', 'DAMON', '1990-05-06', NULL, 'SMA Sederajat', 'Pedagang', 'Rp. 1 jt s/d Rp 2jt', '081356789', '234567812309', 'INI', 'DEDAP', '1990-05-06', NULL, 'SMP Sederajat', 'Wirausaha', 'Rp. 500.000 s/d Rp. 999.000', '098712368', '', '', '', '2020-05-06', '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '12345', '1588737992-definisi-karya-ilmiah-adalah.jpg', NULL, NULL, '70,67', '70,65', '78,67', '78,56', '78,67', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '78,87', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-06 04:15:12', '89,67', 'BENKALIS'),
(456, 'PPDB2020007', 'Jalur Zonasi', NULL, NULL, NULL, '197502', 'Nurhadi', 'default.png', NULL, 'SUNGAI RAYA', '2006-02-22', 'SMPN 1 BENGKALIS', '10400001', NULL, 'MIPA', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08126878797', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'sungairaya', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-06 04:54:45', NULL, NULL),
(457, 'PPDB2020008', 'Jalur Perpindahan Tugas Orang Tua', NULL, '1403010301387507', '1403010301387507', '123456', 'Iman', 'default.png', 'L', 'Bengkalis', '2016-05-06', 'SMP 1 BKS', '123456', NULL, 'IPS', NULL, 'Islam', 'JL ANTARA', '03', '01', 'WONOSARI', 'BENGKALIS', 'BENGKALIS', 'RIAU', '28712', 'Sepeda Motor', '1234567891', NULL, 1, 3, 160, 45, 'ANAK KANDUNG', 'Bersama Orang Tua', '200', '5', '1403010301040103', 'MIZI ', 'BENGKALIS', '1985-05-06', NULL, 'SMA Sederajat', 'Karyawan Swasta', 'Rp. 2jt s/d Rp. 4 jt', '', '140301030130120', 'IDA', 'BENGKALIS', '1985-05-06', NULL, 'S1', 'Karyawan Swasta', 'Rp. 5 jt s/d Rp. 20 jt', '', '', '', '', '2020-05-06', '', '', '', '', NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 1, '123456', '1588743074-conan.jpg', NULL, NULL, '80', '80', '80', '80', '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '80', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-06 05:52:41', '80', 'BENGKALIS'),
(458, 'PPDB2020009', 'Jalur Zonasi', NULL, '1122334455444444', '2121212121', '110011', 'Senjacode', 'default.png', 'L', 'Sleman', '2020-05-10', 'SMP NEGERI 1', '12345', NULL, 'MIPA', NULL, 'Islam', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '081325220787', NULL, 1, 1, 170, 20, 'ANAK', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'senjacode', '1589096088-rahmat renaldi.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-05-10 07:39:10', NULL, 'SLEMAN'),
(459, 'PPDB2021010', 'Jalur Prestasi', NULL, '213123', '123123', '8213123123', 'Yusuf', 'default.png', 'L', 'Jakarta', '2021-06-28', 'GA ADA', '12312321', NULL, 'MIPA', NULL, 'Katholik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '08123123', NULL, 2, 32, 23, 324, 'SD', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '234234', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 1, 'admin123', '1624837244-arfanafis.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-06-27 23:40:44', NULL, 'ASDASD'),
(461, 'PPDB2021012', 'Jalur Zonasi', NULL, '12312', '213242', '', 'Alau', 'default.png', 'L', 'Jakarta', '2021-07-03', '', '', NULL, 'TKA', NULL, 'Islam', '32423', '234', '234', 'SDFSF', 'SDFS', 'SDFSD', 'SDFSF', '234', 'Jalan Kaki', '08123123', NULL, 234, 234, 213, 123123, '123', 'Bersama Wali', '234234', '23', '123', 'EWFWDF', 'ASDASD', '2021-07-03', NULL, 'SD Sederajat', 'Buruh', 'Rp. 500.000 s/d Rp. 999.000', '23123', '21312', 'ASDASD', 'ASDASD', '2021-07-03', NULL, 'SD Sederajat', 'Pedagang', 'Rp. 1 jt s/d Rp 2jt', '2324', '', '', '', '2021-07-03', '', '', '', '', NULL, NULL, NULL, '213', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0, 1, NULL, NULL, NULL, NULL, NULL, NULL, 0, 'admin123', '1625327151-arfanafis.jpg', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2021-07-04 10:02:45', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `dokumen`
--

CREATE TABLE `dokumen` (
  `id_dokumen` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `id_jenis_dokumen` int(11) NOT NULL,
  `file` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `dokumen`
--

INSERT INTO `dokumen` (`id_dokumen`, `id_daftar`, `id_jenis_dokumen`, `file`) VALUES
(60, 445, 1, '1588623455-oemardiyan.png'),
(61, 447, 1, '1588631228-187_Strassenbande_w.jpg'),
(62, 447, 2, '1588631263-187_Strassenbande_w.jpg'),
(63, 453, 1, '1588680158-Fadinha_by_NETINHO_w.jpg'),
(64, 453, 3, '1588680187-187_Strassenbande_w.jpg'),
(65, 454, 1, '1588715998-75291126_152751769343261_7245696118246030649_n.jpg'),
(66, 454, 3, '1588716058-1581652149_03_Siaran Pers_Pendaftaran SNMPTN.jpg'),
(67, 455, 1, '1588738374-41706125_266910497270426_242447029798699008_o.jpg'),
(68, 455, 3, '1588738417-Bukti pengisian SP2020 Online.pdf'),
(69, 457, 1, '1588744231-KTP Abdurrahman wahid.pdf'),
(70, 457, 2, '1588744291-KTP Abdurrahman wahid.pdf'),
(71, 457, 3, '1588744309-KTP Abdurrahman wahid.pdf'),
(72, 453, 2, '1588779364-lulus.png'),
(73, 453, 5, '1588779400-lulus.jpg'),
(75, 459, 1, '1624836684-arfanafis.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `histori`
--

CREATE TABLE `histori` (
  `id` int(11) NOT NULL,
  `id_permohonan` varchar(30) NOT NULL,
  `nik` int(30) NOT NULL,
  `status` int(1) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `histori`
--

INSERT INTO `histori` (`id`, `id_permohonan`, `nik`, `status`, `tanggal`, `keterangan`) VALUES
(1, '201907070001', 123, 1, '2019-07-07 15:57:31', 'Silahkan datang ke desa/kelurahan setempat untuk pengumpulan berkas persyaratan permohonan  dan konfirmasi'),
(2, '201907070001', 0, 2, '2019-07-07 22:26:33', 'pemberkasan sedang kami proses silahkan untuk menunggu'),
(4, '202004040001', 12, 1, '2020-04-04 18:25:29', 'Silahkan datang ke desa/kelurahan setempat untuk pengumpulan berkas persyaratan permohonan  dan konfirmasi'),
(5, '202004040002', 12, 1, '2020-04-04 18:25:55', 'Permohonan sudah berhasil masuk, mohon untuk menunggu proses pengecekan data');

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` varchar(50) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `nama_jenis`, `status`) VALUES
('JA', 'Jalur Afirmasi ( Kurang Mampu )', 1),
('JPI', 'Jalur Prestasi', 1),
('JPTO', 'Jalur Perpindahan Tugas Orang Tua', 1),
('JZ', 'Jalur Zonasi', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_dokumen`
--

CREATE TABLE `jenis_dokumen` (
  `id_jenis_dokumen` int(11) NOT NULL,
  `nama_dokumen` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_dokumen`
--

INSERT INTO `jenis_dokumen` (`id_jenis_dokumen`, `nama_dokumen`) VALUES
(1, 'Foto'),
(3, 'Kartu Keluarga (PDF)'),
(4, 'Kartu KIP/PKH (PDF)'),
(5, 'Sertifikat/Piagam Prestasi (PDF)');

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` varchar(5) NOT NULL,
  `nama_jenjang` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenjang`
--

INSERT INTO `jenjang` (`id_jenjang`, `nama_jenjang`, `status`) VALUES
('SMK', 'SMK', 1),
('SMP', 'SMP', 1);

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(50) NOT NULL,
  `nama_jurusan` varchar(100) DEFAULT NULL,
  `kuota` int(10) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `sisa_kuota` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jurusan`
--

INSERT INTO `jurusan` (`id_jurusan`, `nama_jurusan`, `kuota`, `status`, `sisa_kuota`) VALUES
('TKA', 'TK A', 300, 1, 299),
('TKB', 'TK B', 300, 1, 300);

-- --------------------------------------------------------

--
-- Table structure for table `kontak`
--

CREATE TABLE `kontak` (
  `id_kontak` int(11) NOT NULL,
  `nama_kontak` varchar(50) DEFAULT NULL,
  `no_kontak` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kontak`
--

INSERT INTO `kontak` (`id_kontak`, `nama_kontak`, `no_kontak`, `status`) VALUES
(1, 'Panitia', '085265907514', 1);

-- --------------------------------------------------------

--
-- Table structure for table `kuisioner`
--

CREATE TABLE `kuisioner` (
  `id_kuisioner` int(11) NOT NULL,
  `id_daftar` int(11) NOT NULL,
  `kuis_1` text DEFAULT NULL,
  `kuis_2` text DEFAULT NULL,
  `kuis_3` text DEFAULT NULL,
  `kuis_4` text DEFAULT NULL,
  `kuis_5` text DEFAULT NULL,
  `dt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kuisioner`
--

INSERT INTO `kuisioner` (`id_kuisioner`, `id_daftar`, `kuis_1`, `kuis_2`, `kuis_3`, `kuis_4`, `kuis_5`, `dt`) VALUES
(3, 461, 'Belum', 'hadasda\r\nkasdasd \r\nasdasdkjasd', 'asdasd\r\nasdasd\r\n', 'asdasdsd\r\nsadasd', 'asdasdasd', '2021-07-04 09:57:02');

-- --------------------------------------------------------

--
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id_pengumuman` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul` varchar(255) DEFAULT NULL,
  `pengumuman` text DEFAULT NULL,
  `tgl` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jenis` int(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id_pengumuman`, `id_user`, `judul`, `pengumuman`, `tgl`, `jenis`) VALUES
(6, 5, 'INFORMASI PENDAFTARAN SISWA BARU', '<p>PENDAFTARAN PESERTA DIDIK BARUÂ  SMAN 3 BENGKALIS DIBUKA PADA TANGGAL 11 MEI 2020</p>', '2020-05-06 04:40:39', 1),
(8, 5, 'INFORMASI PENDAFTARAN SISWA BARU', 'PENDAFTARAN PESERTA DIDIK BARUÂ  SMAN 3 BENGKALIS DIBUKA PADA TANGGAL 11 MEI 2020<br>', '2020-05-06 04:40:28', 2);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `npsn` varchar(16) NOT NULL,
  `nama_sekolah` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `status` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `id_setting` int(1) NOT NULL,
  `nama_sekolah` varchar(100) NOT NULL,
  `npsn` varchar(30) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `provinsi` varchar(30) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL,
  `favicon` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `no_telp` varchar(50) DEFAULT NULL,
  `klikchat` text DEFAULT NULL,
  `livechat` text DEFAULT NULL,
  `nolivechat` varchar(50) DEFAULT NULL,
  `infobayar` text DEFAULT NULL,
  `syarat` text DEFAULT NULL,
  `tgl_pembukaan` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`id_setting`, `nama_sekolah`, `npsn`, `alamat`, `kota`, `provinsi`, `logo`, `favicon`, `email`, `no_telp`, `klikchat`, `livechat`, `nolivechat`, `infobayar`, `syarat`, `tgl_pembukaan`) VALUES
(1, 'TK AISYIYAH BUSTANUL ATHFAL 1 JAKARTA', '10400848', 'Jl. Limau II, RT.3/RW.3, Kramat Pela, Kec. Kby. Baru, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12130', 'Jakarta Selatan', 'Jawa Barat', 'assets/img/logo/logo74.png', NULL, NULL, NULL, 'Assalamualaikum', 'Assalamualaikum...', '085265907514', '<p>Silahkan melakukan proses pembayaran melalui No Rekening dibawah ini :</p><p>0000000000000</p><p>A/N SMK HS AGUNG</p><p>BANK NASIONAL INDONESIA</p><p>Setelah melakukan proses pembayaran harap konfirmasikan pembayaran di menu tambah pembayaran.</p><p>setelah itu akan dilakukan pengechekan oleh Panitia PPDB SMK HS AGUNG.</p><p><br></p>', '<p>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SYARAT PENDAFTARAN</p><div align=\"left\"><ol><li>Silahkan mendaftar dengan mengisi form yang telah disediakan dengan sebenar benarnya data</li><li>Setelah mengisi formulir utama silahkan melengkapi data dengan login ke user masing masing menggunakan username yang telah diberitahu oleh&nbsp;&nbsp; sistem dan password yang anda buat.</li><li>Jangan lupa upload file SKL di form dokumen yang telah disediakan dengan format PDF maksimal 2MB</li></ol></div><p><br></p>', '2020-05-05 09:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama_user` varchar(128) NOT NULL,
  `level` varchar(128) NOT NULL,
  `username` varchar(128) NOT NULL,
  `password` text NOT NULL,
  `status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama_user`, `level`, `username`, `password`, `status`) VALUES
(5, 'Administrator', 'admin', 'admin', '$2y$10$Ac2agQ0ZRo0G2Qc2L5cW.eXUqujaqNWBiZcy.NpEWYq32fMJeIhZe', 1),
(7, 'adminku', 'admin', 'admindemo', '$2y$10$BkM/xQ4Zvc.Xex7JlMdWCOUC5WGP8K9zrjFoVfkq25ZYRPC0l9keW', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indexes for table `biaya`
--
ALTER TABLE `biaya`
  ADD PRIMARY KEY (`id_biaya`);

--
-- Indexes for table `daftar`
--
ALTER TABLE `daftar`
  ADD PRIMARY KEY (`id_daftar`),
  ADD UNIQUE KEY `no_daftar` (`no_daftar`);

--
-- Indexes for table `dokumen`
--
ALTER TABLE `dokumen`
  ADD PRIMARY KEY (`id_dokumen`);

--
-- Indexes for table `histori`
--
ALTER TABLE `histori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `jenis_dokumen`
--
ALTER TABLE `jenis_dokumen`
  ADD PRIMARY KEY (`id_jenis_dokumen`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`);

--
-- Indexes for table `kontak`
--
ALTER TABLE `kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indexes for table `kuisioner`
--
ALTER TABLE `kuisioner`
  ADD PRIMARY KEY (`id_kuisioner`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id_pengumuman`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`npsn`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`id_setting`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `daftar`
--
ALTER TABLE `daftar`
  MODIFY `id_daftar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT for table `dokumen`
--
ALTER TABLE `dokumen`
  MODIFY `id_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `histori`
--
ALTER TABLE `histori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jenis_dokumen`
--
ALTER TABLE `jenis_dokumen`
  MODIFY `id_jenis_dokumen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kontak`
--
ALTER TABLE `kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kuisioner`
--
ALTER TABLE `kuisioner`
  MODIFY `id_kuisioner` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id_pengumuman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
