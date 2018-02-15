-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 14, 2018 at 11:26 PM
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
(1, 'asd', 'asd', 'asd'),
(2, 'vxcv', 'zxcxcvxcv', 'xcv'),
(3, 'sdf', 'sdf', 'sdf'),
(4, 'Bapak Tukidjan', 'Jl.Muara Karang Blok L9 T no.8 penjaringan jakarta utara', '0831231231'),
(5, 'mnb', 'nbnm', 'nbn'),
(6, 'Dedi ibrahim', 'Bogor Kec.Tanah sareal RT 01 RW 07 Kel.Kayumanis', '083818152213'),
(8, 's', 's', 'sdf'),
(9, 'KOMAR', 'Perumahan Bukit kayumanis', '083818251322'),
(10, 'Noval', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sarel Kota Bogor', '083818251322'),
(11, 'rosa', 'Kp.Bandan', '984939'),
(12, 'Roni', 'Perumahan bukit kencana Blok Dr.No.10', '0873828738883'),
(13, 'Jumas', 'Ciwarigin Bogor Tanah sareal Bogor Utara', '08321232312');

-- --------------------------------------------------------

--
-- Table structure for table `data_barcode_sementara`
--

CREATE TABLE `data_barcode_sementara` (
  `id_data_barcode_sementara` int(11) NOT NULL,
  `id_produk` decimal(65,0) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` decimal(65,0) NOT NULL,
  `qty_produk` decimal(65,0) NOT NULL,
  `ppn` decimal(65,0) NOT NULL,
  `diskon` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_customer_invoices`
--

CREATE TABLE `data_customer_invoices` (
  `id_data_customer_invoices` int(11) NOT NULL,
  `id_invoices_customer_data` varchar(100) NOT NULL,
  `id_customer_data_customer_invoices` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_invoices`
--

CREATE TABLE `data_invoices` (
  `id_invoices` decimal(65,0) NOT NULL,
  `invoices_record` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_jumlah_invoices`
--

CREATE TABLE `data_jumlah_invoices` (
  `id_data_jumlah_invoices` int(11) NOT NULL,
  `id_invoices_jumlah` decimal(65,0) NOT NULL,
  `diskon` decimal(65,0) NOT NULL,
  `ppn` decimal(65,0) NOT NULL,
  `total` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `data_produk_invoices`
--

CREATE TABLE `data_produk_invoices` (
  `id_data_produk_invoices` int(11) NOT NULL,
  `id_invoices_produk` decimal(65,0) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` decimal(65,0) NOT NULL,
  `qty_produk` decimal(65,0) NOT NULL,
  `jumlah` decimal(65,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `barcode` varchar(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` decimal(65,0) NOT NULL,
  `stok_produk` varchar(100) NOT NULL,
  `milik` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `barcode`, `nama_produk`, `harga_produk`, `stok_produk`, `milik`, `status`, `gambar`) VALUES
(8, '898320993948', 'Sepeda Scoopy', '27501', '1', 'online', 'Aktif', 'Screenshot_from_2017-12-20_22-28-13.png'),
(9, '72364762834', 'Buku Jquery', '130000', '10', 'online', 'Aktif', 'Screenshot_from_2017-12-20_22-29-08.png');

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
(3, 'Dedy', 'dedyibrahym23@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 'aktif', 'admin', 'IMG_0642.JPG', '2018-01-06 15:08:55');

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
-- Indexes for table `data_jumlah_invoices`
--
ALTER TABLE `data_jumlah_invoices`
  ADD PRIMARY KEY (`id_data_jumlah_invoices`);

--
-- Indexes for table `data_produk_invoices`
--
ALTER TABLE `data_produk_invoices`
  ADD PRIMARY KEY (`id_data_produk_invoices`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

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
  MODIFY `id_customer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `data_barcode_sementara`
--
ALTER TABLE `data_barcode_sementara`
  MODIFY `id_data_barcode_sementara` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `data_customer_invoices`
--
ALTER TABLE `data_customer_invoices`
  MODIFY `id_data_customer_invoices` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_jumlah_invoices`
--
ALTER TABLE `data_jumlah_invoices`
  MODIFY `id_data_jumlah_invoices` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `data_produk_invoices`
--
ALTER TABLE `data_produk_invoices`
  MODIFY `id_data_produk_invoices` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
