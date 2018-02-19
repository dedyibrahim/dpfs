-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 19, 2018 at 08:14 AM
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
(13, 'Jumas', 'Ciwarigin Bogor Tanah sareal Bogor Utara', '08321232312'),
(14, 'irma', 'KP.bandan', '0384984923'),
(15, 'Dedy Londong', 'Jl.Muara Karang Blok L9 T No.8 Penjaringan Jakarta utara', '0216697706'),
(16, 'Wahyu', 'Bogor', '083234234'),
(17, 'sefrin', 'Kp.Bandan', '03478923983'),
(18, 'Januar Jaja', 'Kp.Sumur wangi kel.Kayumanis kec.Tanah Sareal Kota Bogor', '098898399888'),
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
(72, '1', 'Dedy Londong', '0216697706', 'Jl.Muara Karang Blok L9 T No.8 Penjaringan Jakarta utara', 'TIKI', 'oke', '2018-02-17 12:20:05', 'Dedy'),
(73, '2', 'Bapak Tukidjan', '0831231231', 'Jl.Muara Karang Blok L9 T no.8 penjaringan jakarta utara', 'WAHANA', 'oke', '2018-02-17 12:22:07', 'Dedy'),
(74, '3', 'Dedi ibrahim', '083818152213', 'Bogor Kec.Tanah sareal RT 01 RW 07 Kel.Kayumanis', 'MPX', 'oke', '2018-02-17 13:59:05', 'Dedy'),
(75, '4', 'Januar Jaja', '098898399888', 'Kp.Sumur wangi kel.Kayumanis kec.Tanah Sareal Kota Bogor', 'TIKI', 'oke', '2018-02-17 15:04:51', 'Dedy'),
(76, '5', 'Bapak Tukidjan', '0831231231', 'Jl.Muara Karang Blok L9 T no.8 penjaringan jakarta utara', 'TIKI', 'ok', '2018-02-18 00:47:01', 'Dedy'),
(77, '6', 'Dedy Londong', '0216697706', 'Jl.Muara Karang Blok L9 T No.8 Penjaringan Jakarta utara', 'WAHANA', 'oke', '2018-02-18 00:50:56', 'Dedy'),
(78, '7', 'Bapak Tukidjan', '0831231231', 'Jl.Muara Karang Blok L9 T no.8 penjaringan jakarta utara', 'TIKI', 'asd', '2018-02-18 01:08:18', 'Dedy'),
(79, '8', 'Dedi ibrahim', '083818152213', 'Bogor Kec.Tanah sareal RT 01 RW 07 Kel.Kayumanis', 'Ninja Xpress', 'oke', '2018-02-18 02:36:09', 'Dedy'),
(80, '9', 'Muhammad Noval', '086787782768', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sareal Kota Bogor', 'TIKI', 'OKE', '2018-02-18 03:26:03', 'Dedy'),
(81, '10', 'Muhammad Noval', '086787782768', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sareal Kota Bogor', 'JNE', 'oke', '2018-02-18 03:28:11', 'Dedy'),
(82, '11', 'Muhammad Noval', '086787782768', 'Kp.Sumurwangi Kel.Kayumanis Kec.Tanah Sareal Kota Bogor', '', 'oke', '2018-02-18 04:55:47', 'Dedy'),
(83, '12', 'Pak Khairul Umam', '082888928882', 'KP. Gang kelor Kelurahan Tanah tinggi jawa barat ', 'TIKI', 'oke', '2018-02-18 08:09:43', 'Dela'),
(84, '13', 'Lukman', '01283878838', 'Kp.Masjid kel.mekarwangi kec.Tanah sareal Kota Bogor', 'TIKI', 'oke', '2018-02-18 12:11:30', 'dela'),
(85, '14', 'Dedi ibrahim', '083818152213', 'Bogor Kec.Tanah sareal RT 01 RW 07 Kel.Kayumanis', 'GRABCELL', 'oke', '2018-02-18 12:13:06', 'dela'),
(86, '15', 'Bapak Tukidjan', '0831231231', 'Jl.Muara Karang Blok L9 T no.8 penjaringan jakarta utara', 'TIKI', 'oke', '2018-02-18 12:25:47', 'Dedy'),
(87, '16', 'Dedy Londong', '0216697706', 'Jl.Muara Karang Blok L9 T No.8 Penjaringan Jakarta utara', 'JNE', 'oke', '2018-02-18 12:55:07', 'Dedy');

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
(51, '0'),
(72, '1'),
(73, '2'),
(74, '3'),
(75, '4'),
(76, '5'),
(77, '6'),
(78, '7'),
(79, '8'),
(80, '9'),
(81, '10'),
(82, '11'),
(83, '12'),
(84, '13'),
(85, '14'),
(86, '15'),
(87, '16');

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
(50, '1', '430600', '400'),
(51, '2', '11550', '450'),
(52, '3', '1448975', '51025'),
(53, '4', '77500', '0'),
(54, '5', '68500', '1500'),
(55, '6', '659305', '100695'),
(56, '7', '139000', '1000'),
(57, '8', '274155', '25845'),
(58, '9', '604500', '0'),
(59, '10', '41500', '8500'),
(60, '11', '97510', '2490'),
(61, '12', '405000', '5000'),
(62, '13', '207500', '0'),
(63, '14', '122100', '7900'),
(64, '15', '259000', '1000'),
(65, '16', '130034', '4966');

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
(77, '1', '8', 'Sepeda Scoopy', '3500', '7000', '2', '10', '30', '9000', '431000', '52700', '368900', '158100'),
(78, '1', '9', 'Buku Jquery', '130000', '260000', '2', '10', '30', '9000', '431000', '52700', '368900', '158100'),
(79, '1', '10', 'Buku Jquery   Javascript', '65000', '260000', '4', '10', '30', '9000', '431000', '52700', '368900', '158100'),
(80, '2', '8', 'Sepeda Scoopy', '3500', '10500', '3', '10', '0', '0', '12000', '1050', '10500', '0'),
(81, '3', '8', 'Sepeda Scoopy', '3500', '3500', '1', '10', '25', '120000', '1500000', '156350', '1172625', '390875'),
(82, '3', '9', 'Buku Jquery', '130000', '1430000', '11', '10', '25', '120000', '1500000', '156350', '1172625', '390875'),
(83, '3', '10', 'Buku Jquery   Javascript', '65000', '130000', '2', '10', '25', '120000', '1500000', '156350', '1172625', '390875'),
(84, '4', '8', 'Sepeda Scoopy', '3500', '3500', '1', '0', '0', '9000', '77500', '0', '68500', '0'),
(85, '4', '10', 'Buku Jquery   Javascript', '65000', '65000', '1', '0', '0', '9000', '77500', '0', '68500', '0'),
(86, '5', '8', 'Sepeda Scoopy', '3500', '3500', '1', '0', '0', '0', '70000', '0', '68500', '0'),
(87, '5', '10', 'Buku Jquery   Javascript', '65000', '65000', '1', '0', '0', '0', '70000', '0', '68500', '0'),
(88, '6', '8', 'Sepeda Scoopy', '3500', '3500', '1', '10', '27', '9000', '760000', '78350', '571955', '211545'),
(89, '6', '10', 'Buku Jquery   Javascript', '65000', '780000', '12', '10', '27', '9000', '760000', '78350', '571955', '211545'),
(90, '7', '9', 'Buku Jquery', '130000', '130000', '1', '0', '0', '9000', '140000', '0', '130000', '0'),
(91, '8', '8', 'Sepeda Scoopy', '3500', '3500', '1', '10', '17', '150000', '300000', '13350', '110805', '22695'),
(92, '8', '10', 'Buku Jquery   Javascript', '65000', '130000', '2', '10', '17', '150000', '300000', '13350', '110805', '22695'),
(93, '9', '8', 'Sepeda Scoopy', '3500', '10500', '3', '0', '0', '9000', '604500', '0', '595500', '0'),
(94, '9', '9', 'Buku Jquery', '130000', '390000', '3', '0', '0', '9000', '604500', '0', '595500', '0'),
(95, '9', '10', 'Buku Jquery   Javascript', '65000', '195000', '3', '0', '0', '9000', '604500', '0', '595500', '0'),
(96, '10', '10', 'Buku Jquery   Javascript', '65000', '65000', '1', '0', '50', '9000', '50000', '0', '32500', '32500'),
(97, '11', '9', 'Buku Jquery', '130000', '130000', '1', '0', '50', '10', '100000', '0', '97500', '97500'),
(98, '11', '10', 'Buku Jquery   Javascript', '65000', '65000', '1', '0', '50', '10', '100000', '0', '97500', '97500'),
(99, '12', '9', 'Buku Jquery', '130000', '260000', '2', '0', '0', '15000', '410000', '0', '390000', '0'),
(100, '12', '10', 'Buku Jquery   Javascript', '65000', '130000', '2', '0', '0', '15000', '410000', '0', '390000', '0'),
(101, '13', '10', 'Buku Jquery + Javascript', '65000', '65000', '1', '0', '0', '9000', '207500', '0', '198500', '0'),
(102, '13', '9', 'Buku Jquery', '130000', '130000', '1', '0', '0', '9000', '207500', '0', '198500', '0'),
(103, '13', '8', 'Sepeda Scoopy', '3500', '3500', '1', '0', '0', '9000', '207500', '0', '198500', '0'),
(104, '14', '10', 'Buku Jquery + Javascript', '65000', '130000', '2', '0', '13', '9000', '130000', '0', '113100', '16900'),
(105, '15', '9', 'Buku Jquery', '130000', '130000', '1', '0', '35', '90000', '260000', '0', '169000', '91000'),
(106, '15', '10', 'Buku Jquery   Javascript', '65000', '130000', '2', '0', '35', '90000', '260000', '0', '169000', '91000'),
(107, '16', '9', 'Buku Jquery', '130000', '130000', '1', '0', '0', '34', '135000', '0', '130000', '0');

--
-- Triggers `data_produk_invoices`
--
DELIMITER $$
CREATE TRIGGER `potong-penjualan_stok` AFTER INSERT ON `data_produk_invoices` FOR EACH ROW BEGIN 
    UPDATE produk SET stok_produk = stok_produk-NEW.qty_produk
    WHERE id_produk = NEW.id_produk;
 END
$$
DELIMITER ;

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
(8, '898320993948', 'Sepeda Scoopy', '3500', '41', 'online', 'Aktif', 'Screenshot_from_2017-12-20_22-28-13.png'),
(9, '72364762834', 'Buku Jquery', '130000', '1', 'online', 'Aktif', 'Screenshot_from_2017-12-20_22-29-08.png'),
(10, '897726887378882', 'Buku Jquery + Javascript', '65000', '22', 'online', 'Aktif', 'Screenshot_from_2017-12-20_13-35-31.png');

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
(10, 'dela', 'dela@niagara.co.id', 'bb882dfee86cc46b21f9781d48439561', 'aktif', 'admin pos', 'Screenshot_from_2017-12-15_14-56-54.png', '2018-02-18 08:32:59'),
(11, 'vivi', 'vivi@niagara.co.id', '697247c757ed62ef3665f364602728c8', 'aktif', 'admin inventory', 'Screenshot_from_2017-12-20_22-29-16.png', '2018-02-18 08:34:44'),
(12, 'fredy', 'fredy@niagara.co.id', 'bb882dfee86cc46b21f9781d48439561', 'aktif', 'admin pos', 'Screenshot_from_2017-12-17_14-03-15.png', '2018-02-18 10:19:21'),
(13, 'yenny', 'yenny@niagara.co.id', '697247c757ed62ef3665f364602728c8', 'tidak', 'admin inventory', 'Screenshot_from_2017-12-20_22-29-39.png', '2018-02-18 10:28:52');

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
  MODIFY `id_data_customer_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `data_invoices`
--
ALTER TABLE `data_invoices`
  MODIFY `id_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `data_jumlah_invoices`
--
ALTER TABLE `data_jumlah_invoices`
  MODIFY `id_data_jumlah_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
--
-- AUTO_INCREMENT for table `data_produk_invoices`
--
ALTER TABLE `data_produk_invoices`
  MODIFY `id_data_produk_invoices` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=108;
--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
