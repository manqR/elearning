-- MySQL dump 10.13  Distrib 5.7.30, for Linux (x86_64)
--
-- Host: localhost    Database: elearning
-- ------------------------------------------------------
-- Server version	5.7.30-0ubuntu0.16.04.1

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
-- Table structure for table `course`
--

DROP TABLE IF EXISTS `course`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `course` (
  `courseID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryID` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `img` varchar(50) DEFAULT NULL,
  `materi` varchar(50) DEFAULT NULL,
  `author` varchar(50) NOT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`courseID`),
  KEY `FK__coursecategory` (`categoryID`),
  CONSTRAINT `FK__coursecategory` FOREIGN KEY (`categoryID`) REFERENCES `coursecategory` (`categoryID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `course`
--

LOCK TABLES `course` WRITE;
/*!40000 ALTER TABLE `course` DISABLE KEYS */;
INSERT INTO `course` VALUES (15,5,'Modul 1 - Permintaan Tenaga Kerja','<p>Permasalahan ketenagakerjaan merupakan masalah kompleks yang terjadi dalam suatu perekonomian. Keberhasilan suatu perekonomian akan terlihat saat mampu menghasilkan output yang tinggi dengan kualitas yang bagus. Tentu saja hal ini akan terkait dengan kualitas faktor produksi yang digunakan, termasuk sumber daya manusia yang digunakan. Produktivitas yang tinggi serta upah yang layak sering dikaitkan dengan penggunaan kualitas sumber daya manusia dan itu sering memunculkan banyak persoalan yang antara tenaga kerja dengan industri.<br></p>','c07a9e321a8e8e726f95258242334cf5de15dcac.jpg','4d81409f026ad9e3737dbc8abb7648e61836d982.pdf','admin','2020-05-07 05:02:44'),(16,5,'Modul 2 - Penawaran dan Keseimbangan Pasar Tenaga Kerja','<p>Dinamika kependudukan merupakan permasalah yang dihadapi oleh semua negara. Pergerakan secara berkala yang terjadi dapat mengakibatkan perubahan di pasar tenaga kerja&nbsp; terutama ketersediaan angkatan kerja dan yang paling penting adalah penetapan upah yang terjadi karena interakasinya dengan permintaan di pasar tenaga kerja . Penawaran tenaga kerja (labor supply) merupakan sejumlah tenaga kerja yang mau dan mampu bekerja di perusahaan atau industry pada tingkat upah tertentu.<br></p>','1f5ddc3134d13eb02a71f6193ae59ac82129f877.jpg','8f6d3681a4e87f0e00ef766e8d02fac909093211.pdf','admin','2020-05-07 05:03:44'),(17,5,'Modul 3 - Elastisitas Tenaga Kerja','<p>Jika pemerintah menaikkan tingkat upah minimum, akankah kebijakan tersebut akan dapat menurunkan jumlah kesempatan kerja? Jika iya, berapa banyak kesempatan kerja yang hilang? Melalui pembelajaran elastisitas, maka akan diketahui secara tepat, berapa perubahan kesempatan kerja itu sangat responsif terhadap perubahan upah serta kebijakan yang terkait upah.<br></p>','57478f093c5658c247d8292e69a7e5325a24d3b2.png','63d292813279b375e915f4981e583f4209ce62ff.pdf','admin','2020-05-07 05:06:13'),(18,5,'Modul 4 - Mobilitas Tenaga Kerja','<p>Mobilitas tenaga kerja merupakan arus pergerakan tenaga kerja yang terjadi karena adanya perbedaan pertumbuhan ekonomi dan kesenjangan fasilitas serta ketidakmerataan hasil pembangunan antara satu daerah dengan daerah yang lain. Berbagai teori telah berkembang yang mengamati pola pergerakan mobilitas serta migrasi ini, mulai dari tujuan, alasan, motivasi serta keputusan mengapa para migran melakukan perpindahan. Selain itu, tinjauan multidisiplin banyak dilakukan.<br></p>','1f3f9d8b74d60a2bf297078347920fc2b6f3243f.jpg','c0f11189002b4e26904b84da54e1fc518c0fec3b.pdf','admin','2020-05-07 05:08:07'),(19,5,'Modul 5 - Perencanaan Tenaga Kerja','<p>Menurut Savvides (2009), Sumber Daya Manusia menjadi sumber daya ekonomi yang handal karena merupakan the key engine of economic growth. Atau menjadi mesin pertumbuhan bagi pertumbuhan ekonomi suatu negara. Seperti diketahui bahwa modal manusia tidak dapat dipisahkan dari proses produksi. Sementara kementerian Ketenagakerjaan Republik Indonesia menyatakan bahwa inti proses pembangunan perekonomian suatu bangsa karena Sumber Daya Manusia (SDM) merupakan kekayaan sesungguhnya dari suatu bangsa dan jumlahnya melimpah.<br></p>','f7c958ec265d0c4d900c7f0be5138a99c3ec2587.jpg','ec5c036ddf8706f45c20aa735e748e667c450262.pdf','admin','2020-05-07 05:09:39'),(20,5,'Modul 6 - Konsep dan Peran Sumber Daya Alam dalam Pembangunan Ekonomi','<p>Sumber daya itu diartikan sebagai sumber persediaan, baik cadangan maupun yang baru. Secara ekonomi, sumber daya adalah suatu input dalam suatu produksi. Sumber daya alam yang dapat diperbaharui (renewable). Disebut terbarukan karena dapat melakukan reproduksi dan memiliki daya regenerasi (pulih kembali). Sumber daya alam yang tidak dapat diperbaharui (non-renewable). Sumber daya alam yang tidak habis, misalnya udara, matahari, energi pasang surut.<br></p>','c6d56b295834d0bc0d991eecd900359c7bcba43e.jpg','32676e183343bb5447268a02875a7f84ff14b129.pdf','admin','2020-05-07 05:11:27'),(21,5,'Modul 7 - Nilai Ekonomi Sumber Daya Alam','<p>Ekonomi lingkungan&nbsp;atau&nbsp;ilmu ekonomi lingkungan&nbsp;adalah ilmu yang mempelajari perilaku atau kegiatan manusia dalam memanfaatkan Sumber Daya Alam (SDA) dan lingkungannya yang terbatas sehingga fungsi atau peranan SDA dan lingkungan tersebut dapat dipertahankan dan bahkan penggunaannya dapat ditingkatkan dalam jangka panjang atau berkelanjutan.<br></p>','689bffbc2d4e3ce30cf31a421d5c76e13e4c022b.png','b1126994af2d79f8474d13b9c527ac0dad409da7.pdf','admin','2020-05-07 05:12:53'),(22,5,'Modul 8 - Optimalisasi Pengelolaan Sumber Daya Alam','<p>Pertambahan jumlah penduduk memerlukan pertambahan dalam hal lain seperti perlu adanya pertambahan bahan pangan, papan dan sandang demi dapat memenuhi kebutuhan seluruh penduduk dan menghindari kelangkaan. Untuk mewujudkan pemenuhan kebutuhan dan meningkatkan kesejahteraan, dilakukan pembangunan di segala sektor.<br></p>','3a88abe0afb2e24b0028c26336d7855614364bac.jpg','05ba3acbb1774140337d7ffb0d681958410aeadc.pdf','admin','2020-05-07 05:15:12'),(23,5,'Modul 9 - Analisis Mengenai Dampak Lingkungan','<p>Masalah lingkungan bagi para ahli sudah sejak lama menjadi perhatian. Masalah lingkungan yang sekarang dihadapi oleh seluruh bangsa adalah masalah yang berkaitan dengan kepentingan hidup manusia. Suatu masalah dapat diartikan sebagai sesuatu yang menghalangi keinginan atau harapan manusia.<br></p>','5905eec28babf968990228f0b907e70fb23d7ce6.jpg','95cbb8083a515eefa071e42b3a4d9d19c9f01103.pdf','admin','2020-05-07 05:16:33');
/*!40000 ALTER TABLE `course` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `coursecategory`
--

DROP TABLE IF EXISTS `coursecategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `coursecategory` (
  `categoryID` int(11) NOT NULL AUTO_INCREMENT,
  `categoryName` char(50) NOT NULL,
  `flag` int(11) NOT NULL,
  PRIMARY KEY (`categoryID`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `coursecategory`
--

LOCK TABLES `coursecategory` WRITE;
/*!40000 ALTER TABLE `coursecategory` DISABLE KEYS */;
INSERT INTO `coursecategory` VALUES (5,'Ekonomi Sumber Daya Manusia dan Alam',1);
/*!40000 ALTER TABLE `coursecategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dtlcourse`
--

DROP TABLE IF EXISTS `dtlcourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtlcourse` (
  `iddetailcourse` int(11) NOT NULL AUTO_INCREMENT,
  `courseID` int(11) NOT NULL DEFAULT '0',
  `detailID` int(11) NOT NULL DEFAULT '0',
  `title` varchar(50) NOT NULL DEFAULT '0',
  `description` text NOT NULL,
  `correctAnswer` int(11) NOT NULL DEFAULT '0',
  `poin` int(11) NOT NULL DEFAULT '0',
  `hint` text NOT NULL,
  PRIMARY KEY (`iddetailcourse`),
  KEY `FK_dtlcourse_course` (`courseID`),
  KEY `FK_dtlcourse_dtlcoursecategory` (`detailID`),
  CONSTRAINT `FK_dtlcourse_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dtlcourse_dtlcoursecategory` FOREIGN KEY (`detailID`) REFERENCES `dtlcoursecategory` (`detailID`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtlcourse`
--

LOCK TABLES `dtlcourse` WRITE;
/*!40000 ALTER TABLE `dtlcourse` DISABLE KEYS */;
INSERT INTO `dtlcourse` VALUES (15,15,1,'Tes Formatif 1','<p>Pada pasar tenaga kerja (input market), siapakah yang memiliki fungsi permintaan?<br></p>',2,10,''),(16,15,1,'Tes Formatif 1','<p>Total Produksi akan mencapai maksimum, saat produk marginal tenaga kerjanya (MPL) nilainya sama dengan ….<br></p>',4,10,''),(17,15,1,'Tes Formatif 1','<p>Faktor yang dapat menyebabkan perubahan tenaga kerja yang diminta?<br></p>',4,10,''),(18,15,1,'Tes Formatif 1','<p>Faktor yang bukan menjadi penyebab pergeseran kurva permintaan?<br></p>',2,10,''),(19,15,1,'Tes Formatif 1','<p>Produk Marginal dari tenaga kerja (MPL) adalah …<br></p>',3,10,''),(20,15,1,'Tes Formatif 1','<p>Kembalian marginal yang semakin menurun (diminishing marginal returns) terjadi karena ....<br></p>',3,10,''),(21,15,1,'Tes Formatif 1','<p>Kurva permintaan tenaga kerja berslope negatif karena terjadinya efek ....<br></p>',4,10,''),(22,15,1,'Tes Formatif 1','<p>Apabila terjadi kenaikan upah, maka perusahaan akan menurunkan produksinya. Efek ini disebut ....<br></p>',2,10,''),(23,15,1,'Tes Formatif 1','<p>Apabila harga mesin produksi turun, maka kurva permintaan tenaga kerja akan ....<br></p>',2,10,''),(24,15,1,'Tes Formatif 1','<p>Dalam produksi, jika penggunaan salah satu input dikurangi, maka input yang lain juga akan berkurang. Hal ini terjadi apabila kedua input tersebut bersifat ....<br></p>',3,10,''),(25,15,2,'Latihan 1','<p>Sebutkan faktor- faktor penentu permintaan tenaga kerja?<br></p>',0,0,'Untuk menjawab soal latihan ini, silahkan klik tombol Materi lalu tekan (ctrl+F) lalu cari di halaman 1.19 dengan ketik \"1.19\" pada text pencarian'),(26,15,2,'Latihan 1','<p>Diketahui fungsi permintaan operator mesin sebagai berikut DL = L = 12 - 3/4W :&nbsp; a. Gambarkan kurva permintaan operator mesin tersebut!; b. Jika upah operator mesin mengalami kenaikan, apa yang terjadi dengan kurva permintaannya?<br></p>',0,0,'Untuk menjawab soal latihan ini, silahkan klik tombol Materi lalu tekan (ctrl+F) lalu cari di halaman 1.20 dengan ketik \"1.20\" pada text pencarian'),(27,15,2,'Latihan 1','<p>Faktor apa saja yang dapat mengakibatkan pergeseran kurva permintaan tenaga kerja?<br></p>',0,0,'Untuk menjawab soal latihan ini, silahkan klik tombol Materi lalu tekan (ctrl+F) lalu cari di halaman 1.21 dengan ketik \"1.21\" pada text pencarian'),(28,15,2,'Latihan 1','<p>Jelaskan mengapa kurva permintaan tenaga kerja berslope negatif!<br></p>',0,0,'Untuk menjawab soal latihan ini, silahkan klik tombol Materi lalu tekan (ctrl+F) lalu cari di halaman 1.21 dengan ketik \"1.21\" pada text pencarian'),(29,15,2,'Latihan 1','<p>Hasil akhir terjadinya efek Substitusi (substitution effect) dan efek skala (scale effect) akibat kenaikan upah adalah terjadinya pemutusan hubungan kerja (PHK) oleh perusahaan. Jelaskan mengapa hal itu bisa terjadi?<br></p>',0,0,'Untuk menjawab soal latihan ini, silahkan klik tombol Materi lalu tekan (ctrl+F) lalu cari di halaman 1.21 dengan ketik \"1.21\" pada text pencarian');
/*!40000 ALTER TABLE `dtlcourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dtlcoursecategory`
--

DROP TABLE IF EXISTS `dtlcoursecategory`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtlcoursecategory` (
  `detailID` int(11) NOT NULL AUTO_INCREMENT,
  `dtlCatCourseName` varchar(50) NOT NULL,
  `group` int(11) DEFAULT NULL,
  PRIMARY KEY (`detailID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtlcoursecategory`
--

LOCK TABLES `dtlcoursecategory` WRITE;
/*!40000 ALTER TABLE `dtlcoursecategory` DISABLE KEYS */;
INSERT INTO `dtlcoursecategory` VALUES (1,'Tes Formatif 1',1),(2,'Latihan 1',2),(3,'Tes Formatif 2',1),(4,'Latihan 2',2);
/*!40000 ALTER TABLE `dtlcoursecategory` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `dtlcourseopt`
--

DROP TABLE IF EXISTS `dtlcourseopt`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `dtlcourseopt` (
  `iddtlcourse` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `optID` int(11) NOT NULL,
  `optional` varchar(50) NOT NULL,
  `iscorrect` int(11) NOT NULL,
  `urutan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`urutan`),
  KEY `FK_dtlcourseopt_course` (`courseID`),
  KEY `FK_dtlcourseopt_dtlcourse` (`iddtlcourse`),
  KEY `FK_dtlcourseopt_tbloption` (`optID`),
  CONSTRAINT `FK_dtlcourseopt_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dtlcourseopt_dtlcourse` FOREIGN KEY (`iddtlcourse`) REFERENCES `dtlcourse` (`iddetailcourse`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_dtlcourseopt_tbloption` FOREIGN KEY (`optID`) REFERENCES `tbloption` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=109 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `dtlcourseopt`
--

LOCK TABLES `dtlcourseopt` WRITE;
/*!40000 ALTER TABLE `dtlcourseopt` DISABLE KEYS */;
INSERT INTO `dtlcourseopt` VALUES (15,15,1,'Pemerintah',0,72),(15,15,2,'Perusahaan',1,73),(15,15,3,'Produsen',0,74),(15,15,4,'Rumah Tangga',0,75),(16,15,1,'satu',0,76),(16,15,2,'APL',0,77),(16,15,3,'tak terhingga',0,78),(16,15,4,'nol',1,79),(17,15,1,'Ada perubahan permintaan produk',0,80),(17,15,2,'Harga input lain naik',0,81),(17,15,3,'Harga input lain turun',0,82),(17,15,4,'Upah tenaga kerja tersebut mengalami perubahan',1,83),(18,15,1,'Ada perubahan permintaan produk',0,84),(18,15,2,'Upah tenaga kerja tersebut mengalami perubahan',1,85),(18,15,3,'Harga input lain turun',0,86),(18,15,4,'Harga input lain naik',0,87),(20,15,1,'mempekerjakan sedikit tenaga kerja',0,89),(21,15,1,'komplementer',0,90),(21,15,2,'pendapatan',0,91),(21,15,3,'produksi',0,92),(21,15,4,'skala',1,93),(22,15,1,'efek pendapatan',0,94),(22,15,2,'efek skala',1,95),(22,15,3,'efek komplementer',0,96),(22,15,4,'efek produksi',0,97),(23,15,1,'bergeser ke kanan',0,98),(23,15,2,'bergeser ke kiri',1,99),(23,15,3,'berpindah ke kanan di sepanjang kurva permintaan',0,100),(23,15,4,'bergeser ke atas',0,101),(24,15,1,'saling menggantikan',0,102),(24,15,2,'substitusi',0,103),(24,15,3,'saling melengkapi',1,104),(24,15,4,'superior',0,105),(19,15,1,'Tenaga kerja yang paling produktif',0,107),(19,15,2,'Upah tenaga kerja tersebut mengalami perubahan',0,108);
/*!40000 ALTER TABLE `dtlcourseopt` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menu`
--

DROP TABLE IF EXISTS `menu`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `menu` (
  `idmenu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_menu` varchar(50) NOT NULL,
  `icon` varchar(50) NOT NULL,
  `color` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  `alias` varchar(25) NOT NULL,
  PRIMARY KEY (`idmenu`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menu`
--

LOCK TABLES `menu` WRITE;
/*!40000 ALTER TABLE `menu` DISABLE KEYS */;
INSERT INTO `menu` VALUES (1,'Modul','rocket','','course/index',1,'Course'),(2,'Hak Akses','menu-alt','','role/index',1,'Role'),(3,'Users','settings','-','user/index',1,'Users'),(10,'Riwayat Modul','bookmark',' -','mycourse/index',1,'My Course'),(11,'Profil','user','-','profile/index',1,'Profile');
/*!40000 ALTER TABLE `menu` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migration`
--

DROP TABLE IF EXISTS `migration`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migration`
--

LOCK TABLES `migration` WRITE;
/*!40000 ALTER TABLE `migration` DISABLE KEYS */;
INSERT INTO `migration` VALUES ('m000000_000000_base',1578931047),('m130524_201442_init',1578931052),('m190124_110200_add_verification_token_column_to_user_table',1578931053);
/*!40000 ALTER TABLE `migration` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `resultcourse`
--

DROP TABLE IF EXISTS `resultcourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `resultcourse` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `urutan` int(11) NOT NULL,
  `answer` int(11) NOT NULL,
  `iddetailcourse` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_resultcourse_usercourse` (`urutan`),
  KEY `FK_resultcourse_dtlcourse` (`iddetailcourse`),
  CONSTRAINT `FK_resultcourse_dtlcourse` FOREIGN KEY (`iddetailcourse`) REFERENCES `dtlcourse` (`iddetailcourse`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_resultcourse_usercourse` FOREIGN KEY (`urutan`) REFERENCES `usercourse` (`urutan`)
) ENGINE=InnoDB AUTO_INCREMENT=242 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `resultcourse`
--

LOCK TABLES `resultcourse` WRITE;
/*!40000 ALTER TABLE `resultcourse` DISABLE KEYS */;
INSERT INTO `resultcourse` VALUES (230,93,2,15),(231,93,4,16),(232,93,4,17),(233,93,2,18),(234,93,1,19),(235,93,1,20),(236,93,4,21),(237,93,2,22),(238,93,2,23),(239,93,1,24),(240,94,1,25),(241,95,1,25);
/*!40000 ALTER TABLE `resultcourse` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role`
--

DROP TABLE IF EXISTS `role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role` (
  `idrole` int(11) NOT NULL AUTO_INCREMENT,
  `role_name` varchar(50) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role`
--

LOCK TABLES `role` WRITE;
/*!40000 ALTER TABLE `role` DISABLE KEYS */;
INSERT INTO `role` VALUES (1,'Administrator',1),(2,'Student',1);
/*!40000 ALTER TABLE `role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_privillage`
--

DROP TABLE IF EXISTS `role_privillage`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `role_privillage` (
  `idrole` int(11) NOT NULL,
  `description` varchar(50) NOT NULL,
  `menu_name` varchar(50) NOT NULL,
  `flag` int(11) NOT NULL,
  `urutan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`urutan`),
  KEY `FK_role_privillage_role` (`idrole`),
  CONSTRAINT `FK_role_privillage_role` FOREIGN KEY (`idrole`) REFERENCES `role` (`idrole`)
) ENGINE=InnoDB AUTO_INCREMENT=564 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_privillage`
--

LOCK TABLES `role_privillage` WRITE;
/*!40000 ALTER TABLE `role_privillage` DISABLE KEYS */;
INSERT INTO `role_privillage` VALUES (1,'HEAD','Course',1,544),(1,'HEAD','Role',1,545),(1,'HEAD','Users',1,546),(1,'HEAD','My Course',1,547),(1,'HEAD','Profile',1,548),(2,'HEAD','Course',0,559),(2,'HEAD','Role',0,560),(2,'HEAD','Users',0,561),(2,'HEAD','My Course',1,562),(2,'HEAD','Profile',1,563);
/*!40000 ALTER TABLE `role_privillage` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbloption`
--

DROP TABLE IF EXISTS `tbloption`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbloption` (
  `id` int(11) NOT NULL,
  `alias` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbloption`
--

LOCK TABLES `tbloption` WRITE;
/*!40000 ALTER TABLE `tbloption` DISABLE KEYS */;
INSERT INTO `tbloption` VALUES (1,'A'),(2,'B'),(3,'C'),(4,'D'),(5,'E'),(6,'F'),(7,'G'),(8,'H'),(9,'I'),(10,'J');
/*!40000 ALTER TABLE `tbloption` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `roleID` int(11) NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  `verification_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `password_reset_token` (`password_reset_token`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (1,'admin','admin',1,'ZcZzLVKw3R7wsz8Z5LapTLriPPWao9pf','$2y$13$qBaO3rMJzU1rH2mtXM7H1OkiLQaBR.Itd53WpWywbzolBk3.329SO',NULL,'admin@elearning.com',10,1578931114,1578931114,'J16Y_Mv4MHJDp5JfooZYQpDdkw6ngAnf_1578931114'),(5,'student','student 1',2,'xNqdY76SrYeZiX8zIKb7MFnGXncPAey3','$2y$13$G1C9V7sXqQpF66igJwEKdenAIhOkeG2MqcT3.c3P9hDj9HiiTq18K',NULL,'student@email.com',10,2147483647,2147483647,NULL),(6,'student2','student 2',2,'XMLfMSRrWUI9q-BhBbZlTPFfVk7tGNCH','$2y$13$i4S1JTWRZpSrLJUzP8sYq.jXrEKdJT4NLs65MV4uqcMGq0/JCNgk2',NULL,'student2@email.com',10,2147483647,2147483647,NULL),(8,'admin2','Admin 2',1,'skthHr2ebvWN5YKfOP6YzprKh4fcnBXb','$2y$13$PAZC6NMVrLRSb8u4DcegyujoTibDrzI0P.9FvNJxuzM/bf3jfcOVK',NULL,'admin2@elearning.com',10,2020050606,2020050606,NULL);
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `usercourse`
--

DROP TABLE IF EXISTS `usercourse`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `usercourse` (
  `userID` int(11) NOT NULL,
  `score` int(11) NOT NULL,
  `courseID` int(11) NOT NULL,
  `detailID` int(11) NOT NULL,
  `startDate` datetime NOT NULL,
  `endDate` datetime DEFAULT NULL,
  `duration` int(11) DEFAULT NULL,
  `isFinish` int(11) NOT NULL,
  `urutan` int(11) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`urutan`),
  KEY `FK_usercourse_course` (`courseID`),
  KEY `FK_usercourse_user` (`userID`),
  CONSTRAINT `FK_usercourse_course` FOREIGN KEY (`courseID`) REFERENCES `course` (`courseID`) ON DELETE CASCADE ON UPDATE CASCADE,
  CONSTRAINT `FK_usercourse_user` FOREIGN KEY (`userID`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `usercourse`
--

LOCK TABLES `usercourse` WRITE;
/*!40000 ALTER TABLE `usercourse` DISABLE KEYS */;
INSERT INTO `usercourse` VALUES (6,70,15,1,'2020-05-09 04:19:12','2020-05-09 04:20:25',0,1,93),(6,0,15,2,'2020-05-09 04:20:40','2020-05-09 04:20:40',0,0,94),(1,0,15,2,'2020-05-09 04:32:02','2020-05-09 04:32:02',0,0,95);
/*!40000 ALTER TABLE `usercourse` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2020-05-09  8:30:05
