-- MySQL dump 10.13  Distrib 5.7.22, for Linux (i686)
--
-- Host: localhost    Database: dpfs
-- ------------------------------------------------------
-- Server version	5.7.22-0ubuntu0.16.04.1

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `customer`
--

DROP TABLE IF EXISTS `customer`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `customer` (
  `id_customer` int(11) NOT NULL AUTO_INCREMENT,
  `nama_customer` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  PRIMARY KEY (`id_customer`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `customer`
--

LOCK TABLES `customer` WRITE;
/*!40000 ALTER TABLE `customer` DISABLE KEYS */;
INSERT INTO `customer` VALUES (1,'Roni','Kp.Bandan Jalan Muara karang No.19 KEDOYA JAKARTA BARAT','083778282223'),(2,'Jumas','Jl.Ciwaringin No.87 Penjaringan Jakarta Utara','08381815221');
/*!40000 ALTER TABLE `customer` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_barcode_sementara`
--

DROP TABLE IF EXISTS `data_barcode_sementara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_barcode_sementara` (
  `id_data_barcode_sementara` int(11) NOT NULL AUTO_INCREMENT,
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
  `hasil_diskon` decimal(65,0) NOT NULL,
  PRIMARY KEY (`id_data_barcode_sementara`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_barcode_sementara`
--

LOCK TABLES `data_barcode_sementara` WRITE;
/*!40000 ALTER TABLE `data_barcode_sementara` DISABLE KEYS */;
INSERT INTO `data_barcode_sementara` VALUES (1,3,'Housing Filter Air Blue 10\" (In Out 3/8\" )(EGS1-10BL 3/8)(89921004004) /  Rp.25,000',25000,25000,1,0,0,0,0,0,25000,0);
/*!40000 ALTER TABLE `data_barcode_sementara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_customer_invoices`
--

DROP TABLE IF EXISTS `data_customer_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_customer_invoices` (
  `id_data_customer_invoices` int(11) NOT NULL AUTO_INCREMENT,
  `id_invoices_customer_data` varchar(100) NOT NULL,
  `nama_customer` varchar(100) NOT NULL,
  `telp` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `ship` varchar(100) NOT NULL,
  `catatan` text NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `cashier` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id_data_customer_invoices`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_customer_invoices`
--

LOCK TABLES `data_customer_invoices` WRITE;
/*!40000 ALTER TABLE `data_customer_invoices` DISABLE KEYS */;
INSERT INTO `data_customer_invoices` VALUES (1,'0','Roni','083778282223','Kp.Bandan Jalan Muara karang No.19 KEDOYA JAKARTA BARAT','JNE','OKE','2018-05-03 06:35:28','Dedy ibrahim','EDIT'),(2,'1','Jumas','08381815221','Jl.Ciwaringin No.87 Penjaringan Jakarta Utara','','','2018-05-03 06:35:28','Dedy ibrahim','EDIT'),(3,'2','Jumas','08381815221','Jl.Ciwaringin No.87 Penjaringan Jakarta Utara','JNE','oku','2018-05-03 06:35:27','Dedy ibrahim','EDIT');
/*!40000 ALTER TABLE `data_customer_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_customer_toko`
--

DROP TABLE IF EXISTS `data_customer_toko`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_customer_toko` (
  `id_customer_toko` int(11) NOT NULL AUTO_INCREMENT,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password1` varchar(100) NOT NULL,
  `konfirmasi_akun` varchar(20) NOT NULL,
  `nomor_kontak` varchar(100) NOT NULL,
  `provinsi_tujuan` varchar(100) NOT NULL,
  `kota_tujuan` varchar(100) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_customer_toko`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_customer_toko`
--

LOCK TABLES `data_customer_toko` WRITE;
/*!40000 ALTER TABLE `data_customer_toko` DISABLE KEYS */;
INSERT INTO `data_customer_toko` VALUES (1,'Niagara','Watermart','niagara.messaging@gmail.com','21232f297a57a5a743894a0e4a801fc3','terkonfirmasi','083818152213','9','78','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Bogor','Jawa Barat'),(2,'Dedy','Dedy','Dedy','e6e061838856bf47e1de730719fb2609','','','','','','',''),(3,'Dedy','Dedy','dedyibrahym23@gmail.com','e6e061838856bf47e1de730719fb2609','terkonfirmasi','081289903664','9','78','Kec.Tanah Sareal Kel.kayumanis Kota Bogor','Bogor','Jawa Barat');
/*!40000 ALTER TABLE `data_customer_toko` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_edit_produk_penjualan`
--

DROP TABLE IF EXISTS `data_edit_produk_penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_edit_produk_penjualan` (
  `id_data_edit_penjualan` int(11) NOT NULL AUTO_INCREMENT,
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
  `hasil_diskon` decimal(65,0) NOT NULL,
  PRIMARY KEY (`id_data_edit_penjualan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_edit_produk_penjualan`
--

LOCK TABLES `data_edit_produk_penjualan` WRITE;
/*!40000 ALTER TABLE `data_edit_produk_penjualan` DISABLE KEYS */;
/*!40000 ALTER TABLE `data_edit_produk_penjualan` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `penambahan_stok_toko` AFTER INSERT ON `data_edit_produk_penjualan` FOR EACH ROW BEGIN 
   UPDATE data_produk_ditoko SET stok_toko=stok_toko+NEW.qty_produk
   WHERE id_produk = NEW.id_produk;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `data_invoices`
--

DROP TABLE IF EXISTS `data_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_invoices` (
  `id_invoices` int(11) NOT NULL AUTO_INCREMENT,
  `invoices_record` decimal(65,0) NOT NULL,
  PRIMARY KEY (`id_invoices`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_invoices`
--

LOCK TABLES `data_invoices` WRITE;
/*!40000 ALTER TABLE `data_invoices` DISABLE KEYS */;
INSERT INTO `data_invoices` VALUES (1,0),(2,1),(3,2);
/*!40000 ALTER TABLE `data_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_jumlah_invoices`
--

DROP TABLE IF EXISTS `data_jumlah_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_jumlah_invoices` (
  `id_data_jumlah_invoices` int(11) NOT NULL AUTO_INCREMENT,
  `id_invoices_jumlah` decimal(65,0) NOT NULL,
  `total` decimal(65,0) NOT NULL,
  `kembalian` decimal(65,0) NOT NULL,
  PRIMARY KEY (`id_data_jumlah_invoices`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_jumlah_invoices`
--

LOCK TABLES `data_jumlah_invoices` WRITE;
/*!40000 ALTER TABLE `data_jumlah_invoices` DISABLE KEYS */;
INSERT INTO `data_jumlah_invoices` VALUES (1,0,859000,0),(2,1,75010,14990),(3,2,1684000,0);
/*!40000 ALTER TABLE `data_jumlah_invoices` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_produk`
--

DROP TABLE IF EXISTS `data_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_produk` (
  `id_data_produk` int(11) NOT NULL AUTO_INCREMENT,
  `record_data_produk` decimal(65,0) NOT NULL,
  PRIMARY KEY (`id_data_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=63 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_produk`
--

LOCK TABLES `data_produk` WRITE;
/*!40000 ALTER TABLE `data_produk` DISABLE KEYS */;
INSERT INTO `data_produk` VALUES (32,0),(33,1),(34,2),(35,3),(36,4),(37,5),(38,6),(39,7),(40,8),(41,9),(42,10),(43,11),(44,12),(45,13),(46,14),(47,15),(48,16),(49,17),(50,18),(51,19),(52,20),(53,21),(54,22),(55,23),(56,24),(57,25),(58,26),(59,27),(60,28),(61,29),(62,30);
/*!40000 ALTER TABLE `data_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_produk_dipabrik`
--

DROP TABLE IF EXISTS `data_produk_dipabrik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_produk_dipabrik` (
  `id_produk_pabrik` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` decimal(65,0) NOT NULL,
  `barcode` decimal(65,0) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` decimal(65,0) NOT NULL,
  `stok_pabrik` decimal(65,0) NOT NULL,
  `milik` varchar(65) NOT NULL,
  `status` varchar(65) NOT NULL,
  `gambar0` varchar(56) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `gambar3` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_produk_pabrik`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_produk_dipabrik`
--

LOCK TABLES `data_produk_dipabrik` WRITE;
/*!40000 ALTER TABLE `data_produk_dipabrik` DISABLE KEYS */;
INSERT INTO `data_produk_dipabrik` VALUES (32,0,899210040018,'Tabung Media Filter Transparan(XG-003C)(89921004001)',25000,32,'Online','Aktif','ac654142195edd10546d402fdc594fc3.jpg','526d768cd5c74862fff5d056898bf971.jpg','','','Filter','Tabung Media Filter Transparan(XG-003C)(89921004001)','130'),(33,1,899210040025,'Housing Filter Air 10\" White 1/4\" Model Ekonomis(EGS-10WW 1/4)(89921004002) / ',25000,35,'Online','Aktif','3bf9b3065da62f0c1055708b81cf4ee0.jpg','2b46b73270113a9bef7903c3640f810d.jpg','63a089b780b9934a8ae0e17d9703de6d.jpg','','','Housing Filter Air 10\" White 1/4\" Model Ekonomis(EGS-10WW 1/4)(89921004002) / ','130'),(34,2,899210040032,'Housing Filter Air Blue 10\" (In Out 1/4\" )(EGS-10BL 1/4)(89921004003) / ',25000,35,'Online','Aktif','f852b5d1abdea1465d1e30f3299e592a.jpg','521f833cac7a9bef02f32ed3a08e9c03.jpg','c358bacb5d32b3ec7f425d422ea0062e.jpg','0ba0bb0057a063a5e6654d46eac1e055.jpg','','Housing Filter Air Blue 10\" (In Out 1/4\" )(EGS-10BL 1/4)(89921004003) / ','130'),(35,3,899210040049,'Housing Filter Air Blue 10\" (In Out 3/8\" )(EGS1-10BL 3/8)(89921004004) / ',25000,35,'Online','Aktif','7a41bf1a03444c92ec64f9f0918cc15b.jpg','a9d31dfd7d82f5c2ac9b761b263b8c8d.jpg','10164793e5d7f3756b3727e79b6d70f1.jpg','45299d67b239e71853f08281713330b2.jpg','','Housing Filter Air Blue 10\" (In Out 3/8\" )(EGS1-10BL 3/8)(89921004004) / ','130'),(36,4,899210040063,'Housing Filter Air Transparant 10\" (In Out 1/4\" )(EGS1-10CB 1/4)(89921004005) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Air Transparant 10\" (In Out 1/4\" )(EGS1-10CB 1/4)(89921004005) / ','130'),(37,5,899210040063,'Housing Filter Air Transparant 10\" (In Out 3/8\" )(EGS1-10CB 3/8)(89921004005) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Air Transparant 10\" (In Out 3/8\" )(EGS1-10CB 3/8)(89921004005) / ','130'),(38,6,899210040070,'Housing Filter Big Blue 20\" (In Out 1 1/2\" )(YTB-20BL-14) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Big Blue 20\" (In Out 1 1/2\" )(YTB-20BL-14) / ','130'),(39,7,899210040087,'Housing Filter Big Blue 20\" (In Out 1 1/4\" ) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Big Blue 20\" (In Out 1 1/4\" ) / ','130'),(40,8,899210040094,'Housing Filter Big Blue 20\" (In Out 1\" )(YTB-20BL-1) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Big Blue 20\" (In Out 1\" )(YTB-20BL-1) / ','130'),(41,9,899210040100,'Housing Filter Biru 10\" ( 1/4\") / ',25000,35,'Online','Aktif','','','','','','Housing Filter Biru 10\" ( 1/4\") / ','130'),(42,10,899210040117,'Housing Filter Biru 20 \" ( In Out 1/2 \" )(EGS1-20BL 1/2) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Biru 20 \" ( In Out 1/2 \" )(EGS1-20BL 1/2) / ','130'),(43,11,899210040124,'Housing Filter Biru 20 \" ( In Out 1/4 \" )(EGS1-20BL 1/4) / 899210040124',25000,35,'Online','Aktif','','','','','','Housing Filter Biru 20 \" ( In Out 1/4 \" )(EGS1-20BL 1/4) / 899210040124','130'),(44,12,899210040131,'Housing Filter Biru 20 \" ( In Out 3/4 \" )(EGS1-20BL 3/4) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Biru 20 \" ( In Out 3/4 \" )(EGS1-20BL 3/4) / ','130'),(45,13,899210040148,'Housing Filter Biru 20 \" ( In Out 3/8 \" )(EGS1-20BL 3/8) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Biru 20 \" ( In Out 3/8 \" )(EGS1-20BL 3/8) / ','130'),(46,14,899210040155,'Housing Filter Transparant 10\" ( 1/4\") / ',25000,35,'Online','Aktif','','','','','','Housing Filter Transparant 10\" ( 1/4\") / ','130'),(47,15,899210040162,'Housing Filter Transparant 20 \" Big Clear (In Out 1 \" )(YTB-20CB-1) / 899210040162',25000,35,'Online','Aktif','','','','','','Housing Filter Transparant 20 \" Big Clear (In Out 1 \" )(YTB-20CB-1) / 899210040162','130'),(48,16,899210040179,'Housing Filter Transparant 20\" (In Out 1\" ) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Transparant 20\" (In Out 1\" ) / ','130'),(49,17,899210040186,'Housing Filter Transparant 20\" (In Out 1/2\" )(EGS1-20CB 1/2) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Transparant 20\" (In Out 1/2\" )(EGS1-20CB 1/2) / ','130'),(50,18,899210040193,'Housing Filter Transparant 20\" (In Out 1/4\" )(EGS1-20CB 1/4) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Transparant 20\" (In Out 1/4\" )(EGS1-20CB 1/4) / ','130'),(51,19,899210040209,'Housing Filter Transparant 20\" (In Out 3/4\" )(EGS1-20CB 3/4) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Transparant 20\" (In Out 3/4\" )(EGS1-20CB 3/4) / ','130'),(52,20,899210040216,'Housing Filter Transparant 20\" (In Out 3/8\" )(EGS1-20CB 3/8) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Transparant 20\" (In Out 3/8\" )(EGS1-20CB 3/8) / ','130'),(53,21,899210040223,'Housing Filter Transparan with Pressure Release ( in out 1/2\" ) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Transparan with Pressure Release ( in out 1/2\" ) / ','130'),(54,22,899210040230,'Housing Filter Transparan with Pressure Release ( in out 3/4\" ) / ',25000,35,'Online','Aktif','','','','','','Housing Filter Transparan with Pressure Release ( in out 3/4\" ) / ','130'),(55,23,899210040247,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ',25000,35,'Online','Aktif','d74daf87496bac775433e6be268117f3.jpg','1d0bb8a58b153810ada43f19e3d56e98.jpg','','','Multi Filter System','Housing Filter White with Pressure Release ( in out 1/2\" )(YT3-10WW-4) / ','130'),(56,24,899210040254,'Housing Filter White with Pressure Release ( in out 3/4\" )(YT3-10WW-6) / ',25000,35,'Online','Aktif','','','','','','Housing Filter White with Pressure Release ( in out 3/4\" )(YT3-10WW-6) / ','130'),(57,25,899210040261,'Housing RO - 400 Gpd / ',25000,35,'Online','Aktif','','','','','','Housing RO - 400 Gpd / ','130'),(58,26,899210040278,'Housing RO 50-75-100 GPD NSF Sertified / ',25000,35,'Online','Aktif','','','','','','Housing RO 50-75-100 GPD NSF Sertified / ','130'),(59,27,899210040285,'Housing RO membrane 50 GPD dengan quick connect(RO-Q0001W) / ',25000,35,'Online','Aktif','','','','','','Housing RO membrane 50 GPD dengan quick connect(RO-Q0001W) / ','130'),(60,28,899210040292,'Housing RO membrane 50 GPD(RO2-0001W) / ',25000,35,'Online','Aktif','f817aa757aa4b705df178faa10fab55b.jpg','eacb9addc9e4cfd06e369dc62b7ad62d.jpg','','','Multi Filter System','Housing RO membrane 50 GPD(RO2-0001W) / ','130'),(61,29,899210040308,'Housing RO membrane 50 GPD (Striped) / ',25000,35,'Online','Aktif','','','','','','Housing RO membrane 50 GPD (Striped) / ','130');
/*!40000 ALTER TABLE `data_produk_dipabrik` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_produk_ditoko`
--

DROP TABLE IF EXISTS `data_produk_ditoko`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_produk_ditoko` (
  `id_produk_toko` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` decimal(65,0) NOT NULL,
  `barcode` decimal(65,0) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` decimal(65,0) NOT NULL,
  `stok_toko` varchar(100) NOT NULL,
  `milik` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `gambar0` varchar(100) NOT NULL,
  `gambar1` varchar(100) NOT NULL,
  `gambar2` varchar(100) NOT NULL,
  `gambar3` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `berat` varchar(100) NOT NULL,
  PRIMARY KEY (`id_produk_toko`)
) ENGINE=InnoDB AUTO_INCREMENT=62 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_produk_ditoko`
--

LOCK TABLES `data_produk_ditoko` WRITE;
/*!40000 ALTER TABLE `data_produk_ditoko` DISABLE KEYS */;
INSERT INTO `data_produk_ditoko` VALUES (32,0,899210040018,'Tabung Media Filter Transparan(XG-003C)(89921004001)',25000,'25','Online','Aktif','ac654142195edd10546d402fdc594fc3.jpg','526d768cd5c74862fff5d056898bf971.jpg','','','Filter','Tabung Media Filter Transparan(XG-003C)(89921004001)','130'),(33,1,899210040025,'Housing Filter Air 10\" White 1/4\" Model Ekonomis(EGS-10WW 1/4)(89921004002) / ',25000,'22','Online','Aktif','3bf9b3065da62f0c1055708b81cf4ee0.jpg','2b46b73270113a9bef7903c3640f810d.jpg','63a089b780b9934a8ae0e17d9703de6d.jpg','','','Housing Filter Air 10\" White 1/4\" Model Ekonomis(EGS-10WW 1/4)(89921004002) / ','130'),(34,2,899210040032,'Housing Filter Air Blue 10\" (In Out 1/4\" )(EGS-10BL 1/4)(89921004003) / ',25000,'34','Online','Aktif','f852b5d1abdea1465d1e30f3299e592a.jpg','521f833cac7a9bef02f32ed3a08e9c03.jpg','c358bacb5d32b3ec7f425d422ea0062e.jpg','0ba0bb0057a063a5e6654d46eac1e055.jpg','','Housing Filter Air Blue 10\" (In Out 1/4\" )(EGS-10BL 1/4)(89921004003) / ','130'),(35,3,899210040049,'Housing Filter Air Blue 10\" (In Out 3/8\" )(EGS1-10BL 3/8)(89921004004) / ',25000,'33','Online','Aktif','7a41bf1a03444c92ec64f9f0918cc15b.jpg','a9d31dfd7d82f5c2ac9b761b263b8c8d.jpg','10164793e5d7f3756b3727e79b6d70f1.jpg','45299d67b239e71853f08281713330b2.jpg','','Housing Filter Air Blue 10\" (In Out 3/8\" )(EGS1-10BL 3/8)(89921004004) / ','130'),(36,4,899210040063,'Housing Filter Air Transparant 10\" (In Out 1/4\" )(EGS1-10CB 1/4)(89921004005) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Air Transparant 10\" (In Out 1/4\" )(EGS1-10CB 1/4)(89921004005) / ','130'),(37,5,899210040063,'Housing Filter Air Transparant 10\" (In Out 3/8\" )(EGS1-10CB 3/8)(89921004005) / ',25000,'34','Online','Aktif','','','','','','Housing Filter Air Transparant 10\" (In Out 3/8\" )(EGS1-10CB 3/8)(89921004005) / ','130'),(38,6,899210040070,'Housing Filter Big Blue 20\" (In Out 1 1/2\" )(YTB-20BL-14) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Big Blue 20\" (In Out 1 1/2\" )(YTB-20BL-14) / ','130'),(39,7,899210040087,'Housing Filter Big Blue 20\" (In Out 1 1/4\" ) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Big Blue 20\" (In Out 1 1/4\" ) / ','130'),(40,8,899210040094,'Housing Filter Big Blue 20\" (In Out 1\" )(YTB-20BL-1) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Big Blue 20\" (In Out 1\" )(YTB-20BL-1) / ','130'),(41,9,899210040100,'Housing Filter Biru 10\" ( 1/4\") / ',25000,'35','Online','Aktif','','','','','','Housing Filter Biru 10\" ( 1/4\") / ','130'),(42,10,899210040117,'Housing Filter Biru 20 \" ( In Out 1/2 \" )(EGS1-20BL 1/2) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Biru 20 \" ( In Out 1/2 \" )(EGS1-20BL 1/2) / ','130'),(43,11,899210040124,'Housing Filter Biru 20 \" ( In Out 1/4 \" )(EGS1-20BL 1/4) / 899210040124',25000,'35','Online','Aktif','','','','','','Housing Filter Biru 20 \" ( In Out 1/4 \" )(EGS1-20BL 1/4) / 899210040124','130'),(44,12,899210040131,'Housing Filter Biru 20 \" ( In Out 3/4 \" )(EGS1-20BL 3/4) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Biru 20 \" ( In Out 3/4 \" )(EGS1-20BL 3/4) / ','130'),(45,13,899210040148,'Housing Filter Biru 20 \" ( In Out 3/8 \" )(EGS1-20BL 3/8) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Biru 20 \" ( In Out 3/8 \" )(EGS1-20BL 3/8) / ','130'),(46,14,899210040155,'Housing Filter Transparant 10\" ( 1/4\") / ',25000,'34','Online','Aktif','','','','','','Housing Filter Transparant 10\" ( 1/4\") / ','130'),(47,15,899210040162,'Housing Filter Transparant 20 \" Big Clear (In Out 1 \" )(YTB-20CB-1) / 899210040162',25000,'35','Online','Aktif','','','','','','Housing Filter Transparant 20 \" Big Clear (In Out 1 \" )(YTB-20CB-1) / 899210040162','130'),(48,16,899210040179,'Housing Filter Transparant 20\" (In Out 1\" ) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Transparant 20\" (In Out 1\" ) / ','130'),(49,17,899210040186,'Housing Filter Transparant 20\" (In Out 1/2\" )(EGS1-20CB 1/2) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Transparant 20\" (In Out 1/2\" )(EGS1-20CB 1/2) / ','130'),(50,18,899210040193,'Housing Filter Transparant 20\" (In Out 1/4\" )(EGS1-20CB 1/4) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Transparant 20\" (In Out 1/4\" )(EGS1-20CB 1/4) / ','130'),(51,19,899210040209,'Housing Filter Transparant 20\" (In Out 3/4\" )(EGS1-20CB 3/4) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Transparant 20\" (In Out 3/4\" )(EGS1-20CB 3/4) / ','130'),(52,20,899210040216,'Housing Filter Transparant 20\" (In Out 3/8\" )(EGS1-20CB 3/8) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Transparant 20\" (In Out 3/8\" )(EGS1-20CB 3/8) / ','130'),(53,21,899210040223,'Housing Filter Transparan with Pressure Release ( in out 1/2\" ) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Transparan with Pressure Release ( in out 1/2\" ) / ','130'),(54,22,899210040230,'Housing Filter Transparan with Pressure Release ( in out 3/4\" ) / ',25000,'35','Online','Aktif','','','','','','Housing Filter Transparan with Pressure Release ( in out 3/4\" ) / ','130'),(55,23,899210040247,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ',25000,'35','Online','Aktif','d74daf87496bac775433e6be268117f3.jpg','1d0bb8a58b153810ada43f19e3d56e98.jpg','','','Multi Filter System','Housing Filter White with Pressure Release ( in out 1/2\" )(YT3-10WW-4) / ','130'),(56,24,899210040254,'Housing Filter White with Pressure Release ( in out 3/4\" )(YT3-10WW-6) / ',25000,'35','Online','Aktif','','','','','','Housing Filter White with Pressure Release ( in out 3/4\" )(YT3-10WW-6) / ','130'),(57,25,899210040261,'Housing RO - 400 Gpd / ',25000,'35','Online','Aktif','','','','','','Housing RO - 400 Gpd / ','130'),(58,26,899210040278,'Housing RO 50-75-100 GPD NSF Sertified / ',25000,'35','Online','Aktif','','','','','','Housing RO 50-75-100 GPD NSF Sertified / ','130'),(59,27,899210040285,'Housing RO membrane 50 GPD dengan quick connect(RO-Q0001W) / ',25000,'33','Online','Aktif','','','','','','Housing RO membrane 50 GPD dengan quick connect(RO-Q0001W) / ','130'),(60,28,899210040292,'Housing RO membrane 50 GPD(RO2-0001W) / ',25000,'33','Online','Aktif','f817aa757aa4b705df178faa10fab55b.jpg','eacb9addc9e4cfd06e369dc62b7ad62d.jpg','','','Multi Filter System','Housing RO membrane 50 GPD(RO2-0001W) / ','130'),(61,29,899210040308,'Housing RO membrane 50 GPD (Striped) / ',25000,'35','Online','Aktif','','','','','','Housing RO membrane 50 GPD (Striped) / ','130');
/*!40000 ALTER TABLE `data_produk_ditoko` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_produk_invoices`
--

DROP TABLE IF EXISTS `data_produk_invoices`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_produk_invoices` (
  `id_data_produk_invoices` int(11) NOT NULL AUTO_INCREMENT,
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
  `hasil_diskon` decimal(65,0) NOT NULL,
  `tanggal` varchar(100) NOT NULL,
  PRIMARY KEY (`id_data_produk_invoices`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_produk_invoices`
--

LOCK TABLES `data_produk_invoices` WRITE;
/*!40000 ALTER TABLE `data_produk_invoices` DISABLE KEYS */;
INSERT INTO `data_produk_invoices` VALUES (1,0,1,'Housing Filter Air 10\" White 1/4\" Model Ekonomis(EGS-10WW 1/4)(89921004002) /  Rp.25,000',25000,350000,14,0,0,9000,859000,0,850000,0,'04/26/2018'),(2,0,0,'Tabung Media Filter Transparan(XG-003C)(89921004001) Rp.25,000',25000,300000,12,0,0,9000,859000,0,850000,0,'04/26/2018'),(3,0,5,'Housing Filter Air Transparant 10\" (In Out 3/8\" )(EGS1-10CB 3/8)(89921004005) /  Rp.25,000',25000,25000,1,0,0,9000,859000,0,850000,0,'04/26/2018'),(4,0,28,'Housing RO membrane 50 GPD(RO2-0001W) /  Rp.25,000',25000,50000,2,0,0,9000,859000,0,850000,0,'04/26/2018'),(5,0,3,'Housing Filter Air Blue 10\" (In Out 3/8\" )(EGS1-10BL 3/8)(89921004004) /  Rp.25,000',25000,50000,2,0,0,9000,859000,0,850000,0,'04/26/2018'),(6,0,27,'Housing RO membrane 50 GPD dengan quick connect(RO-Q0001W) /  Rp.25,000',25000,50000,2,0,0,9000,859000,0,850000,0,'04/26/2018'),(7,0,14,'Housing Filter Transparant 10\" ( 1/4\") /  Rp.25,000',25000,25000,1,0,0,9000,859000,0,850000,0,'04/26/2018'),(8,1,27,'Housing RO membrane 50 GPD dengan quick connect(RO-Q0001W) /  Rp.25,000',25000,25000,1,10,10,10,90000,7500,67500,7500,'04/26/2018'),(9,1,0,'Tabung Media Filter Transparan(XG-003C)(89921004001) Rp.25,000',25000,25000,1,10,10,10,90000,7500,67500,7500,'04/26/2018'),(10,1,2,'Housing Filter Air Blue 10\" (In Out 1/4\" )(EGS-10BL 1/4)(89921004003) /  Rp.25,000',25000,25000,1,10,10,10,90000,7500,67500,7500,'04/26/2018');
/*!40000 ALTER TABLE `data_produk_invoices` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `pengurangan_stok_pos` AFTER INSERT ON `data_produk_invoices` FOR EACH ROW BEGIN 
   UPDATE data_produk_ditoko SET stok_toko=stok_toko-NEW.qty_produk
   WHERE id_produk = NEW.id_produk;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `data_toko`
--

DROP TABLE IF EXISTS `data_toko`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_toko` (
  `id_penjualan_toko` int(100) NOT NULL AUTO_INCREMENT,
  `records_penjualan` varchar(100) NOT NULL,
  PRIMARY KEY (`id_penjualan_toko`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_toko`
--

LOCK TABLES `data_toko` WRITE;
/*!40000 ALTER TABLE `data_toko` DISABLE KEYS */;
INSERT INTO `data_toko` VALUES (1,'0'),(2,'1'),(3,'2'),(4,'3'),(5,'4'),(6,'5'),(7,'6'),(8,'7'),(9,'8'),(10,'9'),(11,'10'),(12,'11'),(13,'12'),(14,'13'),(15,'14'),(16,'15'),(17,'16'),(18,'17'),(19,'18'),(20,'19'),(21,'20'),(22,'21'),(23,'22'),(24,'23'),(25,'24'),(26,'25');
/*!40000 ALTER TABLE `data_toko` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_toko_penjualan`
--

DROP TABLE IF EXISTS `data_toko_penjualan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_toko_penjualan` (
  `id_data_toko_penjualan` int(100) NOT NULL AUTO_INCREMENT,
  `no_invoices` varchar(100) NOT NULL,
  `id_customer_toko` varchar(100) NOT NULL,
  `metode_pembayaran` varchar(100) NOT NULL,
  `nomor_kontak` varchar(100) NOT NULL,
  `alamat_lengkap` varchar(100) NOT NULL,
  `status_penjualan` varchar(100) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `nama_provinsi` varchar(100) NOT NULL,
  `nama_kurir` varchar(100) NOT NULL,
  `jenis_service` varchar(100) NOT NULL,
  `ongkos_kirim` varchar(100) NOT NULL,
  `tanggal_ditambahkan` varchar(100) NOT NULL,
  `sub_total` varchar(100) NOT NULL,
  `kode_diskon` varchar(100) NOT NULL,
  `nilai_diskon` varchar(100) NOT NULL,
  `hasil_diskon` int(100) NOT NULL,
  `total` varchar(100) NOT NULL,
  `total_bayar` varchar(100) NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL,
  `gambar_pembayaran` varchar(100) NOT NULL,
  `jumlah_dibayarkan` varchar(100) NOT NULL,
  `waktu_transaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_data_toko_penjualan`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_toko_penjualan`
--

LOCK TABLES `data_toko_penjualan` WRITE;
/*!40000 ALTER TABLE `data_toko_penjualan` DISABLE KEYS */;
INSERT INTO `data_toko_penjualan` VALUES (1,'AD/NW/2018/04/27/0','1','Bank Transfer','083424234234','Tanah SAREAL','Dalam Proses','Bogor','Jawa Barat','Citra Van Titipan Kilat (TIKI)','TRC','25000','2018/04/27','25000','0','0',0,'25000','50000','Belum bayar','dc587d970e28525eaebfa5eb311af109.jpg','50000','2018-05-04 08:29:33'),(2,'AD/NW/2018/04/27/1','1','Bank Transfer','081289903664','Kec.Tanah Sareal Kel.Kayumanis Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/27','25000','0','0',0,'25000','43000','Belum bayar','89d04ce3547885086dbb5531472198d0.jpg','fgdfg','2018-05-04 08:29:33'),(3,'AD/NW/2018/04/27/2','1','Cash On Delivery','081289903664','Kec.Tanah Sareal Kel.Kayumanis Kota Bogor','Dalam Proses','Bogor','Jawa Barat','POS Indonesia (POS)','Express Next Day Barang','16500','2018/04/27','50000','0','0',0,'50000','66500','Belum bayar','17fc4320849454837edc22da8d58e859.jpg','asd','2018-05-04 08:29:33'),(4,'AD/NW/2018/04/28/3','1','Cash On Delivery','081289903664','Kec.Tanah Sareal Kel.Kayumanis Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','50000','0','0',0,'50000','68000','Belum bayar','fbf55a35280a436b434797030428aaae.jpg','68000','2018-05-04 08:29:33'),(5,'AD/NW/2018/04/28/4','1','Bank Transfer','081289903664','Kec.Tanah Sareal Kel.Kayumanis Kota Bogor','Dalam Proses','Bogor','Jawa Barat','POS Indonesia (POS)','Paketpos Valuable Goods','18000','2018/04/28','25000','0','0',0,'25000','43000','Belum bayar','471e9da8a54fdef798ea726d6baedc72.jpg','43000','2018-05-04 08:29:33'),(6,'AD/NW/2018/04/28/5','1','Bank Transfer','081289903664','Kec.Tanah Sareal Kel.Kayumanis Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','50000','0','0',0,'50000','68000','Belum bayar','ae8944c2674d72456cb185e4f4fa1e5d.jpg','68000','2018-05-04 08:29:33'),(7,'AD/NW/2018/04/28/6','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','25000','0','0',0,'25000','43000','Belum bayar','77039fdd8be98acbe5e29c7bafde72da.jpg','43000','2018-05-04 08:29:33'),(8,'AD/NW/2018/04/28/7','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','OKE','8000','2018/04/28','25000','0','0',0,'25000','33000','Belum bayar','def42465c49a61c0df74072ed413b8f2.jpg','33000','2018-05-04 08:29:33'),(9,'AD/NW/2018/04/28/8','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','REG','9000','2018/04/28','25000','0','0',0,'25000','34000','Belum bayar','ac5b3afe025d42396922eb42d6254496.jpg','34000','2018-05-04 08:29:33'),(10,'AD/NW/2018/04/28/9','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Citra Van Titipan Kilat (TIKI)','TRC','25000','2018/04/28','50000','0','0',0,'50000','75000','Belum bayar','82bf3218f45d6ba62159af1612db38ad.jpg','75000','2018-05-04 08:29:33'),(11,'AD/NW/2018/04/28/10','3','Bank Transfer','081289903664','Kec.Tanah Sareal Kel.kayumanis Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','50000','0','0',0,'50000','68000','Belum bayar','17a7e5962bd0ec4687167388540ffcfb.jpg','68000','2018-05-04 08:29:33'),(12,'AD/NW/2018/04/28/11','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','50000','0','0',0,'50000','68000','Belum bayar','2a89654789d05e46f4bb0c6942936963.jpg','68000','2018-05-04 08:29:33'),(13,'AD/NW/2018/04/28/12','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Citra Van Titipan Kilat (TIKI)','HDS','37000','2018/04/28','50000','0','0',0,'50000','87000','Belum bayar','5e80915c01dcf13f88f9e89c194795ef.jpg','87000','2018-05-04 08:29:33'),(14,'AD/NW/2018/04/28/13','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','50000','0','0',0,'50000','68000','Belum bayar','727bf2e769d42bab47dbf75aa3d81a40.jpg','68000','2018-05-04 08:29:33'),(15,'AD/NW/2018/04/28/14','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','25000','0','0',0,'25000','43000','Belum bayar','08f22a19d1940f40246b92efb6a04717.jpg','43000','2018-05-04 08:29:33'),(16,'AD/NW/2018/04/28/15','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Citra Van Titipan Kilat (TIKI)','ONS','15000','2018/04/28','25000','0','0',0,'25000','40000','Belum bayar','1a2ff96620721bac8264a28af52755a9.jpg','40000','2018-05-04 08:29:33'),(17,'AD/NW/2018/04/28/16','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','25000','0','0',0,'25000','43000','Belum bayar','6b0afa5ed9be5328eb3bd34269f662d5.jpg','43000','2018-05-04 08:29:33'),(18,'AD/NW/2018/04/28/17','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','50000','0','0',0,'50000','68000','Belum bayar','b1b0f29dc1894ee6d4fde01329499894.jpg','68000','2018-05-04 08:29:33'),(19,'AD/NW/2018/04/28/18','1','Cash On Delivery','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Citra Van Titipan Kilat (TIKI)','HDS','37000','2018/04/28','25000','0','0',0,'25000','62000','Belum bayar','3f84b8d8aa9299b6dac95b160b5ba78c.jpg','62000','2018-05-04 08:29:33'),(20,'AD/NW/2018/04/28/19','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','25000','0','0',0,'25000','43000','Belum bayar','e291ae4cc3a72388f28508eb0162cd36.jpg','43000','2018-05-04 08:29:33'),(21,'AD/NW/2018/04/28/20','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','50000','0','0',0,'50000','68000','Belum bayar','0d2f928165ae362743b5fa662ce42886.jpg','68000','2018-05-04 08:29:33'),(22,'AD/NW/2018/04/28/21','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/04/28','75000','0','0',0,'75000','93000','Belum bayar','128166c8efea2409d68e39c35f2370da.jpg','93000','2018-05-04 08:29:33'),(23,'AD/NW/2018/04/28/22','1','Cash On Delivery','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','OKE','8000','2018/04/28','25000','0','0',0,'25000','33000','Belum bayar','39e6ebae8a62615f8772bb57f5d29248.jpg','33000','2018-05-04 08:29:33'),(24,'AD/NW/2018/04/30/23','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Citra Van Titipan Kilat (TIKI)','TRC','25000','2018/04/30','50000','0','0',0,'50000','75000','Belum bayar','caa47b01d531e1043de19061aaabd8c4.jpg','75000','2018-05-04 08:29:33'),(25,'AD/NW/2018/05/02/24','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Citra Van Titipan Kilat (TIKI)','TRC','25000','2018/05/02','75000','angkasindo','5',3750,'71250','96250','Belum bayar','f81d8874220d84fe7160e0ccc4b9ff96.jpg','96250','2018-05-04 08:29:33'),(26,'AD/NW/2018/05/02/25','1','Bank Transfer','083818152213','Tanah Sareal Kel.Kayumanis Kec.Tanah Sareal Kota Bogor','Dalam Proses','Bogor','Jawa Barat','Jalur Nugraha Ekakurir (JNE)','YES','18000','2018/05/02','50000','0','0',0,'50000','68000','Belum bayar','','','2018-05-04 08:29:33');
/*!40000 ALTER TABLE `data_toko_penjualan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `data_toko_penjualan_produk`
--

DROP TABLE IF EXISTS `data_toko_penjualan_produk`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `data_toko_penjualan_produk` (
  `id_data_toko_penjualan_produk` int(11) NOT NULL AUTO_INCREMENT,
  `no_invoices` varchar(100) NOT NULL,
  `id_customer_penjualan_produk` int(100) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `berat` varchar(100) NOT NULL,
  `harga` varchar(100) NOT NULL,
  `harga_total` varchar(100) NOT NULL,
  PRIMARY KEY (`id_data_toko_penjualan_produk`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `data_toko_penjualan_produk`
--

LOCK TABLES `data_toko_penjualan_produk` WRITE;
/*!40000 ALTER TABLE `data_toko_penjualan_produk` DISABLE KEYS */;
INSERT INTO `data_toko_penjualan_produk` VALUES (1,'AD/NW/2018/04/27/0',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(2,'AD/NW/2018/04/27/1',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(3,'AD/NW/2018/04/27/2',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(4,'AD/NW/2018/04/27/2',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(5,'AD/NW/2018/04/28/3',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(6,'AD/NW/2018/04/28/3',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(7,'AD/NW/2018/04/28/4',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(8,'AD/NW/2018/04/28/5',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(9,'AD/NW/2018/04/28/5',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(10,'AD/NW/2018/04/28/6',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(11,'AD/NW/2018/04/28/7',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(12,'AD/NW/2018/04/28/8',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(13,'AD/NW/2018/04/28/9',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','2','130','25000','50000'),(14,'AD/NW/2018/04/28/10',3,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(15,'AD/NW/2018/04/28/10',3,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(16,'AD/NW/2018/04/28/11',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(17,'AD/NW/2018/04/28/11',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(18,'AD/NW/2018/04/28/12',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(19,'AD/NW/2018/04/28/12',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(20,'AD/NW/2018/04/28/13',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','2','130','25000','50000'),(21,'AD/NW/2018/04/28/14',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(22,'AD/NW/2018/04/28/15',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(23,'AD/NW/2018/04/28/16',1,'Housing Filter Air 10\" White 1/4\" Model Ekonomis(EGS-10WW 1/4)(89921004002) / ','1','130','25000','25000'),(24,'AD/NW/2018/04/28/17',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','2','130','25000','50000'),(25,'AD/NW/2018/04/28/18',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','1','130','25000','25000'),(26,'AD/NW/2018/04/28/19',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(27,'AD/NW/2018/04/28/20',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','2','130','25000','50000'),(28,'AD/NW/2018/04/28/21',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','3','130','25000','75000'),(29,'AD/NW/2018/04/28/22',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(30,'AD/NW/2018/04/30/23',1,'Tabung Media Filter Transparan(XG-003C)(89921004001)','1','130','25000','25000'),(31,'AD/NW/2018/04/30/23',1,'Housing Filter Air 10\" White 1/4\" Model Ekonomis(EGS-10WW 1/4)(89921004002) / ','1','130','25000','25000'),(32,'AD/NW/2018/05/02/24',1,'Housing Filter Air Blue 10\" (In Out 1/4\" )(EGS-10BL 1/4)(89921004003) / ','1','130','25000','25000'),(33,'AD/NW/2018/05/02/24',1,'Housing RO membrane 50 GPD(RO2-0001W) / ','1','130','25000','25000'),(34,'AD/NW/2018/05/02/24',1,'Housing Filter Air 10\" White 1/4\" Model Ekonomis(EGS-10WW 1/4)(89921004002) / ','1','130','25000','25000'),(35,'AD/NW/2018/05/02/25',1,'Housing Filter White with Pressure Release ( in out 1/2Housing Filter White with Pressure Release ( ','2','130','25000','50000');
/*!40000 ALTER TABLE `data_toko_penjualan_produk` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `kode_voucher`
--

DROP TABLE IF EXISTS `kode_voucher`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `kode_voucher` (
  `id_voucher` int(11) NOT NULL AUTO_INCREMENT,
  `kode_voucher` varchar(100) NOT NULL,
  `diskon_voucher` varchar(100) NOT NULL,
  PRIMARY KEY (`id_voucher`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `kode_voucher`
--

LOCK TABLES `kode_voucher` WRITE;
/*!40000 ALTER TABLE `kode_voucher` DISABLE KEYS */;
INSERT INTO `kode_voucher` VALUES (1,'angkasindo','5');
/*!40000 ALTER TABLE `kode_voucher` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout_home`
--

DROP TABLE IF EXISTS `layout_home`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layout_home` (
  `id_lyt_home` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` varchar(100) NOT NULL,
  PRIMARY KEY (`id_lyt_home`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout_home`
--

LOCK TABLES `layout_home` WRITE;
/*!40000 ALTER TABLE `layout_home` DISABLE KEYS */;
INSERT INTO `layout_home` VALUES (12,'0'),(13,'28'),(14,'23'),(15,'4'),(16,'2'),(17,'1');
/*!40000 ALTER TABLE `layout_home` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `layout_menu`
--

DROP TABLE IF EXISTS `layout_menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `layout_menu` (
  `id_layout_menu` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) NOT NULL,
  `urutan` decimal(65,0) NOT NULL,
  PRIMARY KEY (`id_layout_menu`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `layout_menu`
--

LOCK TABLES `layout_menu` WRITE;
/*!40000 ALTER TABLE `layout_menu` DISABLE KEYS */;
INSERT INTO `layout_menu` VALUES (1,'Home',0),(2,'Multi Filter System',0),(3,'Reverse Osmosis System',0),(4,'Housing',0),(5,'UV',0),(6,'Botol Air Minum',0),(7,'Sparepart',0),(8,'Other',0),(9,'Filter',0);
/*!40000 ALTER TABLE `layout_menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `mut_pabrik_toko`
--

DROP TABLE IF EXISTS `mut_pabrik_toko`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mut_pabrik_toko` (
  `id_mut_pabrik_toko` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` decimal(65,0) NOT NULL,
  `mut_stok_pabrik` decimal(65,0) NOT NULL,
  `waktu` varchar(100) NOT NULL,
  `status_konfirmasi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mut_pabrik_toko`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mut_pabrik_toko`
--

LOCK TABLES `mut_pabrik_toko` WRITE;
/*!40000 ALTER TABLE `mut_pabrik_toko` DISABLE KEYS */;
INSERT INTO `mut_pabrik_toko` VALUES (1,0,3,'04/26/2018','TERKONFIRMASI');
/*!40000 ALTER TABLE `mut_pabrik_toko` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `kurang_stok_pabrik` AFTER UPDATE ON `mut_pabrik_toko` FOR EACH ROW BEGIN 
   UPDATE data_produk_dipabrik SET  stok_pabrik=stok_pabrik-NEW.mut_stok_pabrik
   WHERE id_produk = NEW.id_produk;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tambah_stok_toko` AFTER UPDATE ON `mut_pabrik_toko` FOR EACH ROW BEGIN 
   UPDATE data_produk_ditoko SET stok_toko=stok_toko+NEW.mut_stok_pabrik
   WHERE id_produk = NEW.id_produk;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `mut_toko_pabrik`
--

DROP TABLE IF EXISTS `mut_toko_pabrik`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `mut_toko_pabrik` (
  `id_mut_toko_pabrik` int(11) NOT NULL AUTO_INCREMENT,
  `id_produk` decimal(65,0) NOT NULL,
  `mut_stok_toko` decimal(65,0) NOT NULL,
  `waktu` varchar(65) NOT NULL,
  `status_konfirmasi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_mut_toko_pabrik`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `mut_toko_pabrik`
--

LOCK TABLES `mut_toko_pabrik` WRITE;
/*!40000 ALTER TABLE `mut_toko_pabrik` DISABLE KEYS */;
/*!40000 ALTER TABLE `mut_toko_pabrik` ENABLE KEYS */;
UNLOCK TABLES;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `kurang_stok_toko` AFTER UPDATE ON `mut_toko_pabrik` FOR EACH ROW BEGIN 
   UPDATE data_produk_ditoko SET stok_toko=stok_toko-NEW.mut_stok_toko
   WHERE id_produk = NEW.id_produk;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;
/*!50003 SET @saved_cs_client      = @@character_set_client */ ;
/*!50003 SET @saved_cs_results     = @@character_set_results */ ;
/*!50003 SET @saved_col_connection = @@collation_connection */ ;
/*!50003 SET character_set_client  = utf8mb4 */ ;
/*!50003 SET character_set_results = utf8mb4 */ ;
/*!50003 SET collation_connection  = utf8mb4_general_ci */ ;
/*!50003 SET @saved_sql_mode       = @@sql_mode */ ;
/*!50003 SET sql_mode              = 'NO_AUTO_VALUE_ON_ZERO' */ ;
DELIMITER ;;
/*!50003 CREATE*/ /*!50017 DEFINER=`root`@`localhost`*/ /*!50003 TRIGGER `tambah_stok_pabrik` AFTER UPDATE ON `mut_toko_pabrik` FOR EACH ROW BEGIN UPDATE data_produk_dipabrik SET stok_pabrik=stok_pabrik+NEW.mut_stok_toko
   WHERE id_produk = NEW.id_produk;
END */;;
DELIMITER ;
/*!50003 SET sql_mode              = @saved_sql_mode */ ;
/*!50003 SET character_set_client  = @saved_cs_client */ ;
/*!50003 SET character_set_results = @saved_cs_results */ ;
/*!50003 SET collation_connection  = @saved_col_connection */ ;

--
-- Table structure for table `pengaturan_toko`
--

DROP TABLE IF EXISTS `pengaturan_toko`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `pengaturan_toko` (
  `id_pengaturan` int(11) NOT NULL AUTO_INCREMENT,
  `alamat` text NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact` varchar(100) NOT NULL,
  PRIMARY KEY (`id_pengaturan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `pengaturan_toko`
--

LOCK TABLES `pengaturan_toko` WRITE;
/*!40000 ALTER TABLE `pengaturan_toko` DISABLE KEYS */;
/*!40000 ALTER TABLE `pengaturan_toko` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `slider_atas`
--

DROP TABLE IF EXISTS `slider_atas`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `slider_atas` (
  `id_slider_atas` int(11) NOT NULL AUTO_INCREMENT,
  `gambar` varchar(100) NOT NULL,
  `teks` text NOT NULL,
  PRIMARY KEY (`id_slider_atas`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `slider_atas`
--

LOCK TABLES `slider_atas` WRITE;
/*!40000 ALTER TABLE `slider_atas` DISABLE KEYS */;
INSERT INTO `slider_atas` VALUES (1,'AA.jpg',''),(2,'mangan.jpg','');
/*!40000 ALTER TABLE `slider_atas` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id_user` int(100) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `tanggal_daftar` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'Dedy ibrahim','dedi_ibrahim@niagara.co.id','21232f297a57a5a743894a0e4a801fc3','aktif','super admin','Koala.jpg','2018-04-23 02:55:48');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-05-05 13:06:09
