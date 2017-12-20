-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 17, 2017 at 11:50 PM
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
(8, 'PT MASWANDI', 'JL SUDIRMAN NO.87 KAV.JAKARTA', '023478383', '123', 'Bapak Wanfdi', '021284902');

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
(69, '6', '1'),
(70, '7', '2'),
(71, '8', '4');

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
  `tgl_sampling` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jenis_sample`
--

INSERT INTO `jenis_sample` (`id_jenis_sample`, `record_number_sample`, `data_sample`, `jumlah_sample`, `bentuk`, `tgl_penerimaan`, `deskripsi_sample`, `berat_isi`, `tgl_sampling`) VALUES
(64, '1', 'Ikan Manila', '1', 'cairan', '12/17/2017 7:04 PM', 'siap sample', '10 kg', ''),
(65, '2', 'Ikan Dori', '2', 'cairan', '12/17/2017 11:16 PM', 'siap sample', '10 kg', '12/17/2017 11:16 PM'),
(66, '4', 'Daging Sapi', '2', 'Padat', '12/17/2017 11:22 PM', 'Siap', '10 kg', '12/17/2017 11:22 PM');

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
  `kesesuaian_metode` varchar(100) NOT NULL,
  `kesesuaian_biaya` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kaji_ulang_permintaan`
--

INSERT INTO `kaji_ulang_permintaan` (`id_kaji_ulang_permintaan`, `record_number_kaji_ulang`, `kesiapan_personel`, `kondisi_akomodasi`, `beban_pekerjaan`, `kondisi_peralatan`, `kesesuaian_metode`, `kesesuaian_biaya`) VALUES
(58, '1', 'Mampu', 'Tidak Mampu', 'Mampu', 'Tidak Mampu', 'Tidak Mampu', 'Mampu'),
(59, '2', 'Tidak Mampu', 'Mampu', 'Tidak Mampu', 'Mampu', 'Tidak Mampu', 'Mampu'),
(60, '4', 'Tidak Mampu', 'Tidak Mampu', 'Tidak Mampu', 'Tidak Mampu', 'Tidak Mampu', 'Tidak Mampu');

-- --------------------------------------------------------

--
-- Table structure for table `parameter_penyakit`
--

CREATE TABLE `parameter_penyakit` (
  `id_paramater` int(11) NOT NULL,
  `record_number_parameter_penyakit` varchar(100) NOT NULL,
  `jenis_penyakit` varchar(100) NOT NULL,
  `bakteri` varchar(100) NOT NULL,
  `identikasi` varchar(100) NOT NULL,
  `logam` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `parameter_penyakit`
--

INSERT INTO `parameter_penyakit` (`id_paramater`, `record_number_parameter_penyakit`, `jenis_penyakit`, `bakteri`, `identikasi`, `logam`) VALUES
(0, '', 'Wsspv', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', 'Klinis', '', '', ''),
(0, '', 'TSV', '', '', ''),
(0, '', 'IMNV', '', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', 'KHV', '', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', 'KHV', '', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', 'KHV', '', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', '', 'Salmonelia', '', ''),
(0, '', '', 'TPC', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', 'KHV', '', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', '', 'Salmonelia', '', ''),
(0, '', '', 'TPC', '', ''),
(0, '', 'KHV', '', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', '', 'Salmonelia', '', ''),
(0, '', '', 'TPC', '', ''),
(0, '', 'IMNV', '', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', 'Wsspv', '', '', ''),
(0, '', 'IMNV', '', '', ''),
(0, '', 'VNN', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', 'Wsspv', '', '', ''),
(0, '', 'IMNV', '', '', ''),
(0, '', 'KHV', '', '', ''),
(0, '', 'Wsspv', '', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', '', 'TPC', '', ''),
(0, '', 'IMNV', '', '', ''),
(0, '', 'KHV', '', '', ''),
(0, '', 'Wsspv', '', '', ''),
(0, '', 'IMNV', '', '', ''),
(0, '', 'KHV', '', '', ''),
(0, '', 'Wsspv', '', '', ''),
(0, '', '', 'E.Coli', '', ''),
(0, '', '', 'TPC', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', 'Wsspv', '', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', 'Wsspv', '', '', ''),
(0, '', 'Iridoviru', '', '', ''),
(0, '', 'Megalocity', '', '', ''),
(0, '', 'Wsspv', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `penguji_subkontrak`
--

CREATE TABLE `penguji_subkontrak` (
  `id_penguji_subkontrak` int(11) NOT NULL,
  `record_number_penguji_subkontrak` varchar(100) NOT NULL,
  `nama_lab_subkontrak` varchar(100) NOT NULL,
  `kesimpulan` varchar(100) NOT NULL,
  `parameter_penyakit_ikan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `penguji_subkontrak`
--

INSERT INTO `penguji_subkontrak` (`id_penguji_subkontrak`, `record_number_penguji_subkontrak`, `nama_lab_subkontrak`, `kesimpulan`, `parameter_penyakit_ikan`) VALUES
(6, '1', 'Lab mandiri', 'siap', 'bakteri'),
(7, '2', 'siap pakai', 'siap', 'tidak ada'),
(8, '4', 'Lab PDAM', 'BAGUS', 'SIAP PAKAI');

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
(3, '1', 'Bapak Jani', 'Bapak sandi'),
(4, '2', 'Bapak sukoco', 'Bapak sandi'),
(5, '4', 'Bapak sukoco', 'IBU INEM');

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
(69, '1'),
(70, '2'),
(72, '4');

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
-- Indexes for table `penguji_subkontrak`
--
ALTER TABLE `penguji_subkontrak`
  ADD PRIMARY KEY (`id_penguji_subkontrak`);

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `customer_fpps`
--
ALTER TABLE `customer_fpps`
  MODIFY `id_customer_fpps` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;
--
-- AUTO_INCREMENT for table `jenis_sample`
--
ALTER TABLE `jenis_sample`
  MODIFY `id_jenis_sample` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;
--
-- AUTO_INCREMENT for table `kaji_ulang_permintaan`
--
ALTER TABLE `kaji_ulang_permintaan`
  MODIFY `id_kaji_ulang_permintaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT for table `penguji_subkontrak`
--
ALTER TABLE `penguji_subkontrak`
  MODIFY `id_penguji_subkontrak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `penjelasan_penerimaan_fpps`
--
ALTER TABLE `penjelasan_penerimaan_fpps`
  MODIFY `id_penjelasan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `record_number`
--
ALTER TABLE `record_number`
  MODIFY `record_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
