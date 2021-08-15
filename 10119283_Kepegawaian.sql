-- MariaDB dump 10.19  Distrib 10.4.18-MariaDB, for Win64 (AMD64)
--
-- Host: localhost    Database: 10119283_kepegawaian
-- ------------------------------------------------------
-- Server version	10.4.18-MariaDB

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `detail_gaji`
--

DROP TABLE IF EXISTS `detail_gaji`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `detail_gaji` (
  `id_pegawai` int(10) NOT NULL,
  `tanggal_gaji` date NOT NULL,
  `jumlah_gaji` int(20) NOT NULL,
  `id_gaji` int(10) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_gaji`),
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `detail_gaji_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `detail_gaji`
--

LOCK TABLES `detail_gaji` WRITE;
/*!40000 ALTER TABLE `detail_gaji` DISABLE KEYS */;
INSERT INTO `detail_gaji` VALUES (10101006,'2021-08-14',10000000,1),(10101001,'2021-08-14',50000000,4);
/*!40000 ALTER TABLE `detail_gaji` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_absen`
--

DROP TABLE IF EXISTS `tabel_absen`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_absen` (
  `id_pegawai` int(10) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` enum('Hadir','Izin','Tidak Hadir') NOT NULL,
  `id_absen` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`id_absen`),
  KEY `id_pegawai` (`id_pegawai`),
  CONSTRAINT `tabel_absen_ibfk_1` FOREIGN KEY (`id_pegawai`) REFERENCES `tabel_pegawai` (`id_pegawai`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_absen`
--

LOCK TABLES `tabel_absen` WRITE;
/*!40000 ALTER TABLE `tabel_absen` DISABLE KEYS */;
INSERT INTO `tabel_absen` VALUES (10101001,'2021-08-14','Hadir',3);
/*!40000 ALTER TABLE `tabel_absen` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_jabatan`
--

DROP TABLE IF EXISTS `tabel_jabatan`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_jabatan` (
  `kd_jabatan` int(5) NOT NULL,
  `nama_jabatan` varchar(20) NOT NULL,
  `gaji` int(20) NOT NULL,
  PRIMARY KEY (`kd_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_jabatan`
--

LOCK TABLES `tabel_jabatan` WRITE;
/*!40000 ALTER TABLE `tabel_jabatan` DISABLE KEYS */;
INSERT INTO `tabel_jabatan` VALUES (10001,'Manajer',50000000),(10002,'Wakil Manajer',30000000),(20001,'Sekretaris',20000000),(20002,'Wakil Sekretaris',15000000),(30001,'Pegawai',10000000),(40001,'Bendahara',20000000),(40002,'Wakil Bendahara',15000000);
/*!40000 ALTER TABLE `tabel_jabatan` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tabel_pegawai`
--

DROP TABLE IF EXISTS `tabel_pegawai`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tabel_pegawai` (
  `id_pegawai` int(10) NOT NULL,
  `nama_pegawai` varchar(20) NOT NULL,
  `kd_jabatan` int(5) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `gmail` text NOT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan') NOT NULL,
  `password` varchar(10) NOT NULL,
  PRIMARY KEY (`id_pegawai`),
  KEY `k_jabatan` (`kd_jabatan`),
  CONSTRAINT `tabel_pegawai_ibfk_1` FOREIGN KEY (`kd_jabatan`) REFERENCES `tabel_jabatan` (`kd_jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tabel_pegawai`
--

LOCK TABLES `tabel_pegawai` WRITE;
/*!40000 ALTER TABLE `tabel_pegawai` DISABLE KEYS */;
INSERT INTO `tabel_pegawai` VALUES (10101001,'zuhair',10001,'jl.Dago pakar','082364666665','1999-04-07','zul@Gmail.com','Laki-Laki','zulzul001'),(10101002,'Indra',20002,'JL.Peratun','084748354454','2001-01-02','indra@gmail.com','Laki-Laki','wsekre'),(10101004,'Putri',20001,'JL.Perumnas Mandala','084748334898','2001-02-02','putri@gmail.com','Perempuan','sekre'),(10101006,'aya',30001,'jl.Dago atas','082364506666','1999-04-07','aya@Gmail.com','Perempuan','ay001');
/*!40000 ALTER TABLE `tabel_pegawai` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-08-14 21:15:19
