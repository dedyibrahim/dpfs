-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 26, 2017 at 12:53 PM
-- Server version: 5.7.20-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `silabkarimutu`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `project_id` varchar(100) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `telp_fax` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `telp`, `project_id`, `contact_person`, `telp_fax`) VALUES
(2, 'PT BLA BLA', 'Kp. bala', '0212312', '123', 'Bapak ROni', '0216697706'),
(3, 'saya', 'ok', 'sd', 'dasd', 'asd', 'asd'),
(4, 'siap', 'siap', 'siap', 'siap', 'siap', 'siap'),
(5, 'PT ANGKASINDO DUNIA', 'JL.MUARA KARANG BLOK L9 T NO.8 PENJARINGAN JAKARTA UTARA', '0216697706', '1', 'Bapak Dedi', '083818152213'),
(6, 'PT PILOT PEN INDONESIA', 'JL. INDUSTRI KARAWANG JAWABARAT INDONESIA', '0218894898', '12', 'Bapak Kohar', '09839793989'),
(7, 'PT INDORAMA MULTI PACKAGING', 'KAWASAN INDUSTKRI BEKASI JL.JABABEKA BARAT', '0398098', '12', 'Bapak Sukoco', '03287992'),
(8, 'PT MASWANDI', 'JL SUDIRMAN NO.87 KAV.JAKARTA', '023478383', '123', 'Bapak Wanfdi', '021284902'),
(9, 'PT FORISA', 'JL.BEKASI', '0998789', '', 'RONI', 'OK'),
(10, 'PT MANTAP', 'HGKJH', 'JKKJHK', 'JHGJG', 'JHGJH', 'JKNK'),
(11, 'PT ECART WEB PORTAL INDONESIA', 'Jl.muara karang Blok L9 T .NO,8', '0216697706', '10', '0216697707', '0287327'),
(12, 'PT SN CARGO', 'Jl.muara karang Blok L9 T .NO,8', '0216697706', '03', '0216697707', '223'),
(13, 'PT DEDI IBRAHIM', 'JL.MUARA KARANG BLOK L9 T NO.8 PENJARINGAN JAKARTA UTARA', '0398849287', '10', 'Bapak Sukoco', '021284902'),
(14, 'asd', 'asd', 'asd', 'asd', 'asd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `customer_fpps`
--

CREATE TABLE `customer_fpps` (
  `id_customer_fpps` int(11) NOT NULL,
  `id_customer_fpps_customer` varchar(100) NOT NULL,
  `record_number_customer` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_fpps`
--

INSERT INTO `customer_fpps` (`id_customer_fpps`, `id_customer_fpps_customer`, `record_number_customer`) VALUES
(234, '5', '0');

-- --------------------------------------------------------

--
-- Table structure for table `data_nekropsi`
--

CREATE TABLE `data_nekropsi` (
  `id_nekropsi` int(11) NOT NULL,
  `record_number_nekropsi` varchar(100) NOT NULL,
  `panjang` varchar(100) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `analis_nekropsi` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nekropsi`
--

INSERT INTO `data_nekropsi` (`id_nekropsi`, `record_number_nekropsi`, `panjang`, `berat`, `analis_nekropsi`) VALUES
(9, '0', 'sad', 'assd', 'asd');

-- --------------------------------------------------------

--
-- Table structure for table `data_nekropsi_bakteri`
--

CREATE TABLE `data_nekropsi_bakteri` (
  `id_nekropsi_bakteri` int(11) NOT NULL,
  `record_number_bakteri` varchar(100) NOT NULL,
  `nekropsi_bakteri` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nekropsi_bakteri`
--

INSERT INTO `data_nekropsi_bakteri` (`id_nekropsi_bakteri`, `record_number_bakteri`, `nekropsi_bakteri`) VALUES
(3, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_nekropsi_jamur`
--

CREATE TABLE `data_nekropsi_jamur` (
  `id_nekropsi_jamur` int(11) NOT NULL,
  `record_number_jamur` varchar(100) NOT NULL,
  `nekropsi_jamur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nekropsi_jamur`
--

INSERT INTO `data_nekropsi_jamur` (`id_nekropsi_jamur`, `record_number_jamur`, `nekropsi_jamur`) VALUES
(7, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_nekropsi_parasit`
--

CREATE TABLE `data_nekropsi_parasit` (
  `id_nekropsi_parasit` int(11) NOT NULL,
  `record_number_parasit` varchar(100) NOT NULL,
  `nekropsi_parasit` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nekropsi_parasit`
--

INSERT INTO `data_nekropsi_parasit` (`id_nekropsi_parasit`, `record_number_parasit`, `nekropsi_parasit`) VALUES
(3, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_nekropsi_virus`
--

CREATE TABLE `data_nekropsi_virus` (
  `id_nekropsi_virus` int(11) NOT NULL,
  `record_number_virus` varchar(100) NOT NULL,
  `nekropsi_virus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_nekropsi_virus`
--

INSERT INTO `data_nekropsi_virus` (`id_nekropsi_virus`, `record_number_virus`, `nekropsi_virus`) VALUES
(7, '0', '');

-- --------------------------------------------------------

--
-- Table structure for table `data_penerimaan_sample`
--

CREATE TABLE `data_penerimaan_sample` (
  `id_data_penerimaan_sample` int(11) NOT NULL,
  `record_number_penerimaan_sample` varchar(100) NOT NULL,
  `kegiatan` varchar(100) NOT NULL,
  `lokasi_sampling` varchar(100) NOT NULL,
  `asal_sample` varchar(100) NOT NULL,
  `kode_sample` varchar(100) NOT NULL,
  `gejala_klinis` varchar(100) NOT NULL,
  `keterangan_lain_lain` text NOT NULL,
  `pelaksana1` varchar(100) NOT NULL,
  `pelaksana2` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_penerimaan_sample`
--

INSERT INTO `data_penerimaan_sample` (`id_data_penerimaan_sample`, `record_number_penerimaan_sample`, `kegiatan`, `lokasi_sampling`, `asal_sample`, `kode_sample`, `gejala_klinis`, `keterangan_lain_lain`, `pelaksana1`, `pelaksana2`) VALUES
(7, '0', 'PELAKASNANN SAMPLING IKAN NEMO', 'JAWA BARAT', 'Budidaya', '001', 'Siap pakai', 'OK', 'LARAS', 'SANDI');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_sample`
--

CREATE TABLE `jenis_sample` (
  `id_jenis_sample` int(11) NOT NULL,
  `record_number_sample` varchar(100) NOT NULL,
  `data_sample` varchar(100) NOT NULL,
  `jumlah_sample` varchar(100) NOT NULL,
  `bentuk` varchar(100) NOT NULL,
  `tgl_penerimaan` varchar(100) NOT NULL,
  `deskripsi_sample` varchar(100) NOT NULL,
  `berat_isi` varchar(100) NOT NULL,
  `tgl_sampling` varchar(100) NOT NULL,
  `wadah` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_sample`
--

INSERT INTO `jenis_sample` (`id_jenis_sample`, `record_number_sample`, `data_sample`, `jumlah_sample`, `bentuk`, `tgl_penerimaan`, `deskripsi_sample`, `berat_isi`, `tgl_sampling`, `wadah`) VALUES
(229, '0', 'IKAN NEMO', '10', 'Kering', '12/26/2017 9:40 AM', 'SIAP SAMLE', '10 kg', '12/26/2017 9:41 AM', 'MANGKOK');

-- --------------------------------------------------------

--
-- Table structure for table `kaji_ulang_permintaan`
--

CREATE TABLE `kaji_ulang_permintaan` (
  `id_kaji_ulang_permintaan` int(11) NOT NULL,
  `record_number_kaji_ulang` varchar(100) NOT NULL,
  `kesiapan_personel` varchar(100) NOT NULL,
  `kondisi_akomodasi` varchar(100) NOT NULL,
  `beban_pekerjaan` varchar(100) NOT NULL,
  `kondisi_peralatan` varchar(100) NOT NULL,
  `kesesuaian_metode` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kaji_ulang_permintaan`
--

INSERT INTO `kaji_ulang_permintaan` (`id_kaji_ulang_permintaan`, `record_number_kaji_ulang`, `kesiapan_personel`, `kondisi_akomodasi`, `beban_pekerjaan`, `kondisi_peralatan`, `kesesuaian_metode`) VALUES
(223, '0', 'Mampu', 'Mampu', 'Mampu', 'Mampu', 'Mampu');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_penyakit`
--

CREATE TABLE `parameter_penyakit` (
  `id_parameter` int(11) NOT NULL,
  `record_number_parameter` varchar(100) NOT NULL,
  `identifikasi_virus` varchar(100) NOT NULL,
  `identifikasi_bakteri` varchar(100) NOT NULL,
  `identifikasi_parasit` varchar(100) NOT NULL,
  `identifikasi_jamur` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameter_penyakit`
--

INSERT INTO `parameter_penyakit` (`id_parameter`, `record_number_parameter`, `identifikasi_virus`, `identifikasi_bakteri`, `identifikasi_parasit`, `identifikasi_jamur`) VALUES
(212, '0', 'Virus', '&nbsp;', '&nbsp;', '&nbsp;');

-- --------------------------------------------------------

--
-- Table structure for table `penjelasan_penerimaan_fpps`
--

CREATE TABLE `penjelasan_penerimaan_fpps` (
  `id_penjelasan` int(11) NOT NULL,
  `record_number_penjelasan` varchar(100) NOT NULL,
  `diberikan_oleh` varchar(100) NOT NULL,
  `diterima_oleh` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penjelasan_penerimaan_fpps`
--

INSERT INTO `penjelasan_penerimaan_fpps` (`id_penjelasan`, `record_number_penjelasan`, `diberikan_oleh`, `diterima_oleh`) VALUES
(166, '0', 'JUMAS', 'RONI');

-- --------------------------------------------------------

--
-- Table structure for table `record_number`
--

CREATE TABLE `record_number` (
  `record_number` int(11) NOT NULL,
  `project_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `record_number`
--

INSERT INTO `record_number` (`record_number`, `project_id`) VALUES
(235, '0');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `password`, `status`, `level`, `gambar`, `tanggal_daftar`) VALUES
(60, 'Dedy ibrahym', 'dedyibrahym23@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', 'admin', 'IMG_20160201_142218.jpg', '2017-12-16 12:17:43'),
(61, 'user', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', 'aktif', 'user', 'IMG_20160131_100913.jpg', '2017-12-16 12:53:02');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `customer_fpps`
--
ALTER TABLE `customer_fpps`
  ADD PRIMARY KEY (`id_customer_fpps`);

--
-- Indexes for table `data_nekropsi`
--
ALTER TABLE `data_nekropsi`
  ADD PRIMARY KEY (`id_nekropsi`);

--
-- Indexes for table `data_nekropsi_bakteri`
--
ALTER TABLE `data_nekropsi_bakteri`
  ADD PRIMARY KEY (`id_nekropsi_bakteri`);

--
-- Indexes for table `data_nekropsi_jamur`
--
ALTER TABLE `data_nekropsi_jamur`
  ADD PRIMARY KEY (`id_nekropsi_jamur`);

--
-- Indexes for table `data_nekropsi_parasit`
--
ALTER TABLE `data_nekropsi_parasit`
  ADD PRIMARY KEY (`id_nekropsi_parasit`);

--
-- Indexes for table `data_nekropsi_virus`
--
ALTER TABLE `data_nekropsi_virus`
  ADD PRIMARY KEY (`id_nekropsi_virus`);

--
-- Indexes for table `data_penerimaan_sample`
--
ALTER TABLE `data_penerimaan_sample`
  ADD PRIMARY KEY (`id_data_penerimaan_sample`);

--
-- Indexes for table `jenis_sample`
--
ALTER TABLE `jenis_sample`
  ADD PRIMARY KEY (`id_jenis_sample`);

--
-- Indexes for table `kaji_ulang_permintaan`
--
ALTER TABLE `kaji_ulang_permintaan`
  ADD PRIMARY KEY (`id_kaji_ulang_permintaan`);

--
-- Indexes for table `parameter_penyakit`
--
ALTER TABLE `parameter_penyakit`
  ADD PRIMARY KEY (`id_parameter`);

--
-- Indexes for table `penjelasan_penerimaan_fpps`
--
ALTER TABLE `penjelasan_penerimaan_fpps`
  ADD PRIMARY KEY (`id_penjelasan`);

--
-- Indexes for table `record_number`
--
ALTER TABLE `record_number`
  ADD PRIMARY KEY (`record_number`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `customer_fpps`
--
ALTER TABLE `customer_fpps`
  MODIFY `id_customer_fpps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;
--
-- AUTO_INCREMENT for table `data_nekropsi`
--
ALTER TABLE `data_nekropsi`
  MODIFY `id_nekropsi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_nekropsi_bakteri`
--
ALTER TABLE `data_nekropsi_bakteri`
  MODIFY `id_nekropsi_bakteri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_nekropsi_jamur`
--
ALTER TABLE `data_nekropsi_jamur`
  MODIFY `id_nekropsi_jamur` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data_nekropsi_parasit`
--
ALTER TABLE `data_nekropsi_parasit`
  MODIFY `id_nekropsi_parasit` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_nekropsi_virus`
--
ALTER TABLE `data_nekropsi_virus`
  MODIFY `id_nekropsi_virus` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `data_penerimaan_sample`
--
ALTER TABLE `data_penerimaan_sample`
  MODIFY `id_data_penerimaan_sample` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `jenis_sample`
--
ALTER TABLE `jenis_sample`
  MODIFY `id_jenis_sample` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=230;
--
-- AUTO_INCREMENT for table `kaji_ulang_permintaan`
--
ALTER TABLE `kaji_ulang_permintaan`
  MODIFY `id_kaji_ulang_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=224;
--
-- AUTO_INCREMENT for table `parameter_penyakit`
--
ALTER TABLE `parameter_penyakit`
  MODIFY `id_parameter` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=213;
--
-- AUTO_INCREMENT for table `penjelasan_penerimaan_fpps`
--
ALTER TABLE `penjelasan_penerimaan_fpps`
  MODIFY `id_penjelasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=167;
--
-- AUTO_INCREMENT for table `record_number`
--
ALTER TABLE `record_number`
  MODIFY `record_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=236;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
