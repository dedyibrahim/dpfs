-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 24, 2018 at 10:44 AM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.2.2-3+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dpfs`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_customer`, `nama_customer`, `alamat`, `telp`) VALUES
(23, 'Pak Khairul Umams', 'Jl.Muara Angke Gang Ambalat No.178977 Penjaringan Jakarta Utara', '021-66839889'),
(24, 'Khairul Tanjung', 'JL.Babakan Madang No.34 Penjaringan Jakarta Utara', '09789409949'),
(25, 'Wahyu', 'Jl.Tanggerang Jakarta Barat Kel.Penjaringana', '084873288778');

-- --------------------------------------------------------

--
-- Table structure for table `data_barcode_sementara`
--

CREATE TABLE `data_barcode_sementara` (
  `id_data_barcode_sementara` int(11) NOT NULL,
  `id_produk` decimal(65,0) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` decimal(65,0) NOT NULL,
  `hasil_jml` decimal(65,0) NOT NULL,
  `qty_produk` decimal(65,0) NOT NULL,
  `ppn` decimal(65,0) NOT NULL,
  `diskon` decimal(65,0) NOT NULL,
  `freight` decimal(65,0) NOT NULL,
  `uang` decimal(65,0) NOT NULL,
  `hasil_ppn` decimal(65,0) NOT NULL,
  `hasil_total` decimal(65,0) NOT NULL,
  `hasil_diskon` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_customer_invoices`
--

CREATE TABLE `data_customer_invoices` (
  `id_data_customer_invoices` int(11) NOT NULL,
  `id_invoices_customer_data` varchar(100) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `ship` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cashier` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_customer_invoices`
--

INSERT INTO `data_customer_invoices` (`id_data_customer_invoices`, `id_invoices_customer_data`, `nama_customer`, `telp`, `alamat`, `ship`, `catatan`, `waktu`, `cashier`) VALUES
(5, '0', 'Muhammad Noval', '086787782768', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sareal Kota Bogor', 'TIKI', 'oke', '2018-02-20 15:16:29', 'Dedy'),
(6, '1', 'Lukman', '01283878838', 'Kp.Masjid kel.mekarwangi kec.Tanah sareal Kota Bogor', 'TIKI', 'oke', '2018-02-20 15:22:12', 'Dedy'),
(7, '2', 'Pak Khairul Umam', '082888928882', 'KP. Gang kelor Kelurahan Tanah tinggi jawa barat ', 'JNE', 'oke', '2018-02-20 15:24:20', 'Dedy'),
(8, '3', 'Muhammad Noval', '086787782768', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sareal Kota Bogor', 'TIKI', 'sad', '2018-02-21 02:49:14', 'Dedy'),
(9, '4', 'Muhammad Noval', '086787782768', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sareal Kota Bogor', 'TIKI', 'oke', '2018-02-21 03:42:13', 'Dedy'),
(10, '5', 'Tya', '08837838748', 'Lampung', 'TIKI', 'oke', '2018-02-22 02:28:48', 'Dedy'),
(11, '6', 'Muhammad Noval', '086787782768', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sareal Kota Bogor', 'TIKI', 'oke', '2018-02-22 08:37:25', 'Dedy'),
(12, '7', 'Lukman', '01283878838', 'Kp.Masjid kel.mekarwangi kec.Tanah sareal Kota Bogor', 'TIKI', 'oke', '2018-02-22 08:39:03', 'Dedy'),
(13, '8', 'Wahyu', '084873288778', 'Jl.Tanggerang Jakarta Barat Kel.Penjaringana', 'TIKI', 'oke', '2018-02-23 08:12:53', 'Dedy'),
(14, '9', 'Wahyu', '084873288778', 'Jl.Tanggerang Jakarta Barat Kel.Penjaringana', 'WAHANA', 'oke', '2018-02-23 08:58:36', 'Dedy');

-- --------------------------------------------------------

--
-- Table structure for table `data_invoices`
--

CREATE TABLE `data_invoices` (
  `id_invoices` int(11) NOT NULL,
  `invoices_record` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_invoices`
--

INSERT INTO `data_invoices` (`id_invoices`, `invoices_record`) VALUES
(5, '0'),
(6, '1'),
(7, '2'),
(8, '3'),
(9, '4'),
(10, '5'),
(11, '6'),
(12, '7'),
(13, '8'),
(14, '9');

-- --------------------------------------------------------

--
-- Table structure for table `data_jumlah_invoices`
--

CREATE TABLE `data_jumlah_invoices` (
  `id_data_jumlah_invoices` int(11) NOT NULL,
  `id_invoices_jumlah` decimal(65,0) NOT NULL,
  `total` decimal(65,0) NOT NULL,
  `kembalian` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_jumlah_invoices`
--

INSERT INTO `data_jumlah_invoices` (`id_data_jumlah_invoices`, `id_invoices_jumlah`, `total`, `kembalian`) VALUES
(5, '0', '309000', '2701000'),
(6, '1', '50000900', '-50000800'),
(7, '2', '5135000', '65000'),
(8, '3', '250900', '-250899'),
(9, '4', '260800', '39200'),
(10, '5', '509000', '0'),
(11, '6', '224005000', '0'),
(12, '7', '1708200', '0'),
(13, '8', '226500', '3500'),
(14, '9', '345700', '4300');

-- --------------------------------------------------------

--
-- Table structure for table `data_produk`
--

CREATE TABLE `data_produk` (
  `id_data_produk` int(11) NOT NULL,
  `record_data_produk` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_produk`
--

INSERT INTO `data_produk` (`id_data_produk`, `record_data_produk`) VALUES
(1, '0'),
(2, '1'),
(3, '2');

-- --------------------------------------------------------

--
-- Table structure for table `data_produk_dipabrik`
--

CREATE TABLE `data_produk_dipabrik` (
  `id_produk_pabrik` int(11) NOT NULL,
  `id_produk` decimal(65,0) NOT NULL,
  `barcode` decimal(65,0) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` decimal(65,0) NOT NULL,
  `stok_pabrik` decimal(65,0) NOT NULL,
  `milik` varchar(65) NOT NULL,
  `status` varchar(65) NOT NULL,
  `gambar` varchar(56) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_produk_dipabrik`
--

INSERT INTO `data_produk_dipabrik` (`id_produk_pabrik`, `id_produk`, `barcode`, `nama_produk`, `harga_produk`, `stok_pabrik`, `milik`, `status`, `gambar`) VALUES
(7, '0', '899210070268', 'Buku Java +Jquery', '250000', '331', 'Online', 'Aktif', 'Screenshot_from_2017-12-20_22-29-16.png'),
(8, '1', '8787593784', 'Buku Ajax', '900', '400', 'Online', 'Aktif', 'Screenshot_from_2017-12-20_22-29-08.png'),
(9, '2', '98493849939', 'Laptop Acer', '300000', '90', 'Online', 'Aktif', 'Tulips.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_produk_ditoko`
--

CREATE TABLE `data_produk_ditoko` (
  `id_produk_toko` int(11) NOT NULL,
  `id_produk` decimal(65,0) NOT NULL,
  `barcode` decimal(65,0) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` decimal(65,0) NOT NULL,
  `stok_toko` varchar(100) NOT NULL,
  `milik` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_produk_ditoko`
--

INSERT INTO `data_produk_ditoko` (`id_produk_toko`, `id_produk`, `barcode`, `nama_produk`, `harga_produk`, `stok_toko`, `milik`, `status`, `gambar`) VALUES
(9, '0', '899210070268', 'Buku Java +Jquery', '250000', '166', 'Online', 'Aktif', 'Screenshot_from_2017-12-20_22-29-16.png'),
(10, '1', '899210070817', 'Buku Ajax', '900', '480', 'Online', 'Aktif', 'Screenshot_from_2017-12-20_22-29-08.png'),
(11, '2', '98493849939', 'Laptop Acer', '300000', '910', 'Online', 'Aktif', 'Tulips.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `data_produk_invoices`
--

CREATE TABLE `data_produk_invoices` (
  `id_data_produk_invoices` int(11) NOT NULL,
  `id_invoices_produk` decimal(65,0) NOT NULL,
  `id_produk` decimal(65,0) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` decimal(65,0) NOT NULL,
  `hasil_jml` decimal(65,0) NOT NULL,
  `qty_produk` decimal(65,0) NOT NULL,
  `ppn` decimal(65,0) NOT NULL,
  `diskon` decimal(65,0) NOT NULL,
  `freight` decimal(65,0) NOT NULL,
  `uang` decimal(65,0) NOT NULL,
  `hasil_ppn` decimal(65,0) NOT NULL,
  `hasil_total` decimal(65,0) NOT NULL,
  `hasil_diskon` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_produk_invoices`
--

INSERT INTO `data_produk_invoices` (`id_data_produk_invoices`, `id_invoices_produk`, `id_produk`, `nama_produk`, `harga_produk`, `hasil_jml`, `qty_produk`, `ppn`, `diskon`, `freight`, `uang`, `hasil_ppn`, `hasil_total`, `hasil_diskon`) VALUES
(7, '0', '0', 'Buku Java +Jquery', '250000', '500000', '2', '10', '50', '9000', '3010000', '50000', '250000', '250000'),
(8, '1', '0', 'Buku Java +Jquery', '250000', '50000000', '200', '0', '0', '900', '100', '0', '50000000', '0'),
(9, '2', '0', 'Buku Java  Jquery', '250000', '25000000', '100', '0', '80', '9000', '5200000', '0', '5126000', '20504000'),
(10, '2', '1', 'Buku Ajax', '900', '630000', '700', '0', '80', '9000', '5200000', '0', '5126000', '20504000'),
(11, '3', '0', 'Buku Java  Jquery', '250000', '250000', '1', '0', '0', '900', '1', '0', '250000', '0'),
(12, '4', '1', 'Buku Ajax', '900', '1800', '2', '0', '0', '9000', '300000', '0', '251800', '0'),
(13, '4', '0', 'Buku Java  Jquery', '250000', '250000', '1', '0', '0', '9000', '300000', '0', '251800', '0'),
(14, '5', '0', 'Buku Java +Jquery', '250000', '250000', '1', '0', '0', '9000', '509000', '0', '500000', '0'),
(15, '5', '0', 'b', '0', '250000', '1', '0', '0', '9000', '509000', '0', '500000', '0'),
(16, '6', '0', 'Buku Java +Jquery', '250000', '224000000', '896', '0', '0', '5000', '224005000', '0', '224000000', '0'),
(17, '7', '1', 'Buku Ajax', '900', '808200', '898', '0', '0', '900000', '1708200', '0', '808200', '0'),
(18, '8', '0', 'Buku Java +Jquery', '250000', '250000', '1', '0', '13', '9000', '230000', '0', '217500', '32500'),
(19, '9', '0', 'Buku Java +Jquery', '250000', '500000', '2', '0', '35', '9000', '350000', '0', '336700', '181300'),
(20, '9', '1', 'Buku Ajax', '900', '18000', '20', '0', '35', '9000', '350000', '0', '336700', '181300');

--
-- Triggers `data_produk_invoices`
--
DELIMITER $$
CREATE TRIGGER `pengurangan_stok_pos` AFTER INSERT ON `data_produk_invoices` FOR EACH ROW BEGIN 
   UPDATE data_produk_ditoko SET stok_toko=stok_toko-NEW.qty_produk
   WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mut_pabrik_toko`
--

CREATE TABLE `mut_pabrik_toko` (
  `id_mut_pabrik_toko` int(11) NOT NULL,
  `id_produk` decimal(65,0) NOT NULL,
  `mut_stok_pabrik` decimal(65,0) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mut_pabrik_toko`
--

INSERT INTO `mut_pabrik_toko` (`id_mut_pabrik_toko`, `id_produk`, `mut_stok_pabrik`, `waktu`, `status`) VALUES
(58, '1', '100', '2018-02-24 02:55:28', '<span class="label label-info">PENDING</span>'),
(59, '0', '100', '2018-02-24 03:01:31', '<span class="label label-info">PENDING</span>'),
(60, '2', '900', '2018-02-24 03:01:50', '<span class="label label-info">PENDING</span>'),
(61, '2', '15', '2018-02-24 03:21:16', '<span class="label label-info">PENDING</span>'),
(62, '0', '50', '2018-02-24 03:27:05', '<span class="label label-info">PENDING</span>'),
(63, '0', '13', '2018-02-24 03:31:24', '<span class="label label-info">PENDING</span>'),
(64, '0', '3', '2018-02-24 03:39:32', '<span class="label label-info">PENDING</span>');

--
-- Triggers `mut_pabrik_toko`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok_pabrik` AFTER INSERT ON `mut_pabrik_toko` FOR EACH ROW BEGIN 
   UPDATE data_produk_dipabrik SET stok_pabrik=stok_pabrik-NEW.mut_stok_pabrik
   WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok_toko` AFTER INSERT ON `mut_pabrik_toko` FOR EACH ROW BEGIN 
   UPDATE data_produk_ditoko SET stok_toko=stok_toko+NEW.mut_stok_pabrik
   WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `mut_toko_pabrik`
--

CREATE TABLE `mut_toko_pabrik` (
  `id_mut_toko_pabrik` int(11) NOT NULL,
  `id_produk` decimal(65,0) NOT NULL,
  `mut_stok_toko` decimal(65,0) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mut_toko_pabrik`
--

INSERT INTO `mut_toko_pabrik` (`id_mut_toko_pabrik`, `id_produk`, `mut_stok_toko`, `waktu`, `status`) VALUES
(23, '0', '497', '2018-02-24 02:57:41', '<span class="label label-info">PENDING</span>'),
(24, '2', '1000', '2018-02-24 02:57:58', '<span class="label label-info">PENDING</span>'),
(25, '2', '5', '2018-02-24 03:43:34', '<span class="label label-info">PENDING</span>');

--
-- Triggers `mut_toko_pabrik`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok_toko` AFTER INSERT ON `mut_toko_pabrik` FOR EACH ROW BEGIN 
   UPDATE data_produk_ditoko SET stok_toko=stok_toko-NEW.mut_stok_toko
   WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah_stok_pabrik` AFTER INSERT ON `mut_toko_pabrik` FOR EACH ROW BEGIN UPDATE data_produk_dipabrik SET stok_pabrik=stok_pabrik+NEW.mut_stok_toko
   WHERE id_produk = NEW.id_produk;
END
$$
DELIMITER ;

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
(3, 'Dedy', 'dedyibrahym23@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', 'super admin', 'Desert.jpg', '2018-02-23 04:09:34'),
(29, 'Dela', 'dela@niagara.co.id', '21232f297a57a5a743894a0e4a801fc3', 'aktif', 'admin pos', 'Penguins.jpg', '2018-02-22 02:33:19');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_customer`);

--
-- Indexes for table `data_barcode_sementara`
--
ALTER TABLE `data_barcode_sementara`
  ADD PRIMARY KEY (`id_data_barcode_sementara`);

--
-- Indexes for table `data_customer_invoices`
--
ALTER TABLE `data_customer_invoices`
  ADD PRIMARY KEY (`id_data_customer_invoices`);

--
-- Indexes for table `data_invoices`
--
ALTER TABLE `data_invoices`
  ADD PRIMARY KEY (`id_invoices`);

--
-- Indexes for table `data_jumlah_invoices`
--
ALTER TABLE `data_jumlah_invoices`
  ADD PRIMARY KEY (`id_data_jumlah_invoices`);

--
-- Indexes for table `data_produk`
--
ALTER TABLE `data_produk`
  ADD PRIMARY KEY (`id_data_produk`);

--
-- Indexes for table `data_produk_dipabrik`
--
ALTER TABLE `data_produk_dipabrik`
  ADD PRIMARY KEY (`id_produk_pabrik`);

--
-- Indexes for table `data_produk_ditoko`
--
ALTER TABLE `data_produk_ditoko`
  ADD PRIMARY KEY (`id_produk_toko`);

--
-- Indexes for table `data_produk_invoices`
--
ALTER TABLE `data_produk_invoices`
  ADD PRIMARY KEY (`id_data_produk_invoices`);

--
-- Indexes for table `mut_pabrik_toko`
--
ALTER TABLE `mut_pabrik_toko`
  ADD PRIMARY KEY (`id_mut_pabrik_toko`);

--
-- Indexes for table `mut_toko_pabrik`
--
ALTER TABLE `mut_toko_pabrik`
  ADD PRIMARY KEY (`id_mut_toko_pabrik`);

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `data_barcode_sementara`
--
ALTER TABLE `data_barcode_sementara`
  MODIFY `id_data_barcode_sementara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_customer_invoices`
--
ALTER TABLE `data_customer_invoices`
  MODIFY `id_data_customer_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `data_invoices`
--
ALTER TABLE `data_invoices`
  MODIFY `id_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `data_jumlah_invoices`
--
ALTER TABLE `data_jumlah_invoices`
  MODIFY `id_data_jumlah_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id_data_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `data_produk_dipabrik`
--
ALTER TABLE `data_produk_dipabrik`
  MODIFY `id_produk_pabrik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_produk_ditoko`
--
ALTER TABLE `data_produk_ditoko`
  MODIFY `id_produk_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `data_produk_invoices`
--
ALTER TABLE `data_produk_invoices`
  MODIFY `id_data_produk_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `mut_pabrik_toko`
--
ALTER TABLE `mut_pabrik_toko`
  MODIFY `id_mut_pabrik_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `mut_toko_pabrik`
--
ALTER TABLE `mut_toko_pabrik`
  MODIFY `id_mut_toko_pabrik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
