-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2018 at 12:49 PM
-- Server version: 5.7.21-0ubuntu0.16.04.1
-- PHP Version: 7.0.22-0ubuntu0.16.04.1

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
(10, 'Noval', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sarel Kota Bogor', '083818251322'),
(19, 'Muhammad Noval', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sareal Kota Bogor', '086787782768'),
(20, 'Pak Khairul Umam', 'KP. Gang kelor Kelurahan Tanah tinggi jawa barat ', '082888928882'),
(21, 'Lukman', 'Kp.Masjid kel.mekarwangi kec.Tanah sareal Kota Bogor', '01283878838');

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
(9, '4', 'Muhammad Noval', '086787782768', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sareal Kota Bogor', 'TIKI', 'oke', '2018-02-21 03:42:13', 'Dedy');

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
(9, '4');

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
(9, '4', '260800', '39200');

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
(2, '1');

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
(7, '0', '899210070268', 'Buku Java +Jquery', '250000', '500', 'Online', 'Aktif', 'Screenshot_from_2017-12-20_22-29-16.png'),
(8, '1', '8787593784', 'Buku Ajax', '900', '1000', 'Online', 'Aktif', 'Screenshot_from_2017-12-20_22-29-08.png');

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
(9, '0', '899210070268', 'Buku Java +Jquery', '250000', '898', 'Online', 'Aktif', 'Screenshot_from_2017-12-20_22-29-16.png'),
(10, '1', '8787593784', 'Buku Ajax', '900', '898', 'Online', 'Aktif', 'Screenshot_from_2017-12-20_22-29-08.png');

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
(13, '4', '0', 'Buku Java  Jquery', '250000', '250000', '1', '0', '0', '9000', '300000', '0', '251800', '0');

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
(3, 'Dedy', 'dedyibrahym23@gmail.com', '17c4520f6cfd1ab53d8745e84681eb49', 'aktif', 'super admin', 'IMG_0642.JPG', '2018-02-18 08:26:58'),
(26, 'vivi', 'vivi@niagara.co.id', '697247c757ed62ef3665f364602728c8', 'aktif', 'admin inventory', 'Screenshot_from_2017-12-20_13-35-31.png', '2018-02-20 04:41:36'),
(27, 'dela', 'dela@niagara.co.id', 'bb882dfee86cc46b21f9781d48439561', 'aktif', 'admin pos', 'Screenshot_from_2017-12-20_22-29-08.png', '2018-02-20 04:42:02'),
(28, 'fredy', 'fredy@niagara.co.id', 'bb882dfee86cc46b21f9781d48439561', 'aktif', 'admin pos', 'Screenshot_from_2017-12-20_22-29-081.png', '2018-02-20 04:47:55');

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `data_barcode_sementara`
--
ALTER TABLE `data_barcode_sementara`
  MODIFY `id_data_barcode_sementara` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_customer_invoices`
--
ALTER TABLE `data_customer_invoices`
  MODIFY `id_data_customer_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_invoices`
--
ALTER TABLE `data_invoices`
  MODIFY `id_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_jumlah_invoices`
--
ALTER TABLE `data_jumlah_invoices`
  MODIFY `id_data_jumlah_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `data_produk`
--
ALTER TABLE `data_produk`
  MODIFY `id_data_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `data_produk_dipabrik`
--
ALTER TABLE `data_produk_dipabrik`
  MODIFY `id_produk_pabrik` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `data_produk_ditoko`
--
ALTER TABLE `data_produk_ditoko`
  MODIFY `id_produk_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `data_produk_invoices`
--
ALTER TABLE `data_produk_invoices`
  MODIFY `id_data_produk_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
