-- MySQL dump 10.14  Distrib 5.5.56-MariaDB, for Linux (x86_64)
--
-- Host: localhost    Database: cis_aplog
-- ------------------------------------------------------
-- Server version	5.5.56-MariaDB

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
-- Table structure for table `log_tracking_item`
--

DROP TABLE IF EXISTS `log_tracking_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `log_tracking_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateinsert` varchar(50) CHARACTER SET utf8 NOT NULL,
  `id_item` int(11) NOT NULL,
  `posisi_item` int(11) NOT NULL,
  `id_officer` int(11) NOT NULL,
  `posisi` varchar(8) CHARACTER SET utf8 NOT NULL,
  `status` varchar(16) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_item` (`id_item`),
  KEY `id_officer` (`id_officer`),
  KEY `posisi` (`posisi`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `log_tracking_item`
--

LOCK TABLES `log_tracking_item` WRITE;
/*!40000 ALTER TABLE `log_tracking_item` DISABLE KEYS */;
INSERT INTO `log_tracking_item` VALUES (2,'2018-07-01 15:04:38',1,0,39,'ra',''),(3,'2018-07-01 15:06:34',1,0,40,'tko',''),(4,'2018-07-01 15:19:06',1,0,45,'st_on',''),(5,'2018-07-01 15:23:02',1,0,45,'st_off',''),(6,'2018-07-01 15:29:37',1,0,41,'tki',''),(7,'2018-07-01 15:32:04',1,0,39,'ra',''),(8,'2018-07-01 15:32:04',1,1,39,'ra',''),(9,'2018-07-01 23:56:14',1,0,39,'ra',''),(10,'2018-07-01 23:56:14',1,1,39,'ra',''),(11,'2018-07-03 16:52:35',2,0,39,'ra',''),(12,'2018-07-03 16:52:35',2,1,39,'ra',''),(13,'2018-07-03 17:08:41',2,0,40,'tko',''),(14,'2018-07-03 17:17:41',2,0,45,'st_on',''),(15,'2018-07-03 17:19:13',2,0,45,'st_off',''),(16,'2018-07-03 21:03:30',3,0,39,'ra',''),(17,'2018-07-03 21:03:30',3,1,39,'ra',''),(18,'2018-07-03 21:03:30',3,2,39,'ra',''),(19,'2018-07-03 21:04:48',3,0,40,'tko',''),(20,'2018-07-03 21:04:48',3,1,40,'tko',''),(21,'2018-07-03 21:04:48',3,2,40,'tko',''),(22,'2018-07-03 21:05:47',3,0,45,'st_on',''),(23,'2018-07-03 21:05:47',3,1,45,'st_on',''),(24,'2018-07-03 21:05:47',3,2,45,'st_on',''),(25,'2018-07-03 21:06:29',3,0,45,'st_off',''),(26,'2018-07-03 21:06:29',3,1,45,'st_off',''),(27,'2018-07-03 21:06:29',3,2,45,'st_off',''),(28,'2018-07-03 21:07:32',3,0,41,'tki',''),(29,'2018-07-03 21:07:32',3,1,41,'tki',''),(30,'2018-07-03 21:07:32',3,2,41,'tki',''),(31,'2018-07-03 22:12:50',6,0,39,'ra','');
/*!40000 ALTER TABLE `log_tracking_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_bandara`
--

DROP TABLE IF EXISTS `tbl_bandara`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_bandara` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bandara` varchar(255) NOT NULL,
  `kode_data` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `kota_kabupaten` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=297 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_bandara`
--

LOCK TABLES `tbl_bandara` WRITE;
/*!40000 ALTER TABLE `tbl_bandara` DISABLE KEYS */;
INSERT INTO `tbl_bandara` VALUES (1,'Sultan Iskandar Muda','BTJ','Internasional','Banda Aceh'),(2,'Alas Leuser','–','Domestik','Kutacane'),(3,'Bireun','–','Domestik','Bireun'),(4,'Blangkejeran','–','Domestik','Gayo Lues'),(5,'Cut Nyak Dhien','MEQ','Domestik','Nagan Raya'),(6,'Kuala Batu','–','Domestik','Blang Pidie'),(7,'Lasikin','SNB','Domestik','Sinabang'),(8,'Maimun Saleh','SBG','Domestik','Sabang'),(9,'Malikus Saleh','LSW','Domestik','Lhokseumawe'),(10,'Rembele','–','Domestik','Bener Meriah'),(11,'Hamzah Fansuri','SKL','Domestik','Singkil'),(12,'Teuku Cut Ali','TPK','Domestik','Tapaktuan'),(13,'Kuala Namu','KNO','Internasional','Deli Serdang'),(14,'Aek Godang','AEG','Domestik','Padang Lawas Utara'),(15,'Binaka','GNS','Domestik','Gunung Sitoli'),(16,'Bukit Malintang','–','Domestik TNI','Mandailing Natal'),(17,'Dr. F. L. Tobing / Pinangsori','SIX','Domestik','Tapanuli Tengah'),(18,'Lasondre','LSO','Domestik','Nias Selatan'),(19,'Sibisa','SIW','Domestik','Toba Samosir'),(20,'Silangit','SQT','Domestik','Tapanuli Utara'),(21,'Simalungun','–','Domestik TNI','Simalungun'),(22,'Teluk Dalam','–','Domestik TNI','Nias Selatan'),(23,'Minangkabau International Airport','PDG','Internasional','Padang'),(24,'Pasaman Barat','–','Domestik TNI','Pasaman Barat'),(25,'Rokot','RKI','Domestik','Kep. Mentawai'),(26,'Sultan Syarif Kasim II','PKU','Internasional','Pekanbaru'),(27,'Teluk Bano I','–','Domestik TNI',' Bagansiapiapi'),(28,'Japura, Rengat','RGT','Domestik','Indragiri Hulu'),(29,'Pasir Pengaraian','PPR','Domestik','Rokan Hulu'),(30,'Pinang Kampai','–','Domestik','Riau'),(31,'Tempuling','–','Domestik','Indragiri Hilir'),(32,'Kep. Meranti / Bengkalis','–','Domestik','Kep. Meranti'),(33,'Raja Haji Fisabilillah','TNJ','Internasional','Tanjungpinang'),(34,'Hang Nadim','BTH','Internasional','Batam'),(35,'Dabo','SIG','Domestik TNI','Singkep, Lingga'),(36,'Letung','–','Domestik','Kab. Anambas'),(37,'Ranai','–','Domestik','Natuna'),(38,'Raja Haji Abdullah','TJB','Domestik TNI','Karimun'),(39,'Tambelan','–','Domestik','Bintan'),(40,'Sultan Mahmud Badaruddin II','PLM','Internasional','Palembang'),(41,'Pagar Alam','–','Domestik','Pagar Alam'),(42,'Silampari','LLG','Domestik','Lubuklinggau'),(43,'Enggano','–','Domestik','Bengkulu Utara'),(44,'Fatmawati Soekarno','BKS','Domestik','Kota Bengkulu'),(45,'Muko-muko','MPC','Domestik','Muko-muko'),(46,'Depati Parbo','KRC','Domestik','Kerinci'),(47,'Muara Bungo','MRB','Domestik','Bungo'),(48,'Sultan Thaha','DJB','Domestik','Kota Jambi'),(49,'Pekonserai','–','Domestik','Pesisir Barat'),(50,'Radin Inten II','TKG','Domestik','Lampung Selatan'),(51,'Depati Amir','PGK','Domestik','Pangkal Pinang'),(52,'H.A.S. Hanandjoeddin','TJQ','Domestik','Belitung'),(53,'Halim Perdana Kusuma','HLP','Internasional','Jakarta Timur'),(54,'Husein Sastranegara','BDO','Internasional','Bandung'),(55,'Cakrabhuwanan','CBN','Domestik','Cirebon'),(56,'Karawang (rencana)','–','Domestik','Karawang'),(57,'Nusawiru','–','Domestik','Jawa Barat'),(58,'Adi Sumarno','SOC','Internasional','Boyolali'),(59,'Ahmad Yani','SRG','Internasional','Semarang'),(60,'Dewadaru','KWB','Domestik','Jepara'),(61,'Dewadaru-Karimunjawa','KWB','Domestik','Jepara'),(62,'Tunggul Wulung','CXP','Domestik','Cilacap'),(63,'Adi Sutjipto','JOG','Internasional','Sleman'),(64,'Abdurrahman Saleh','MLG','Domestik','Malang'),(65,'Bawean – Harun Thohir','BWN','Domestik','Gresik'),(66,'Blimbingsari','BWX','Domestik','Banyuwangi'),(67,'Juanda','SUB','Internasional','Sidoarjo'),(68,'Noto Hadinegoro','–','Domestik TNI','Jember'),(69,'Trunojoyo','SUP','Domestik','Sumenep'),(70,'Budiarto','BTO','Domestik','Tangerang'),(71,'Soekarno Hatta','CKG','Internasional','Tangerang'),(72,'Tanjung Lesung','–','Domestik TNI','Pandeglang'),(73,'Bali Baru (rencana)','–','Domestik','Bali Utara'),(74,'Ngurah Rai','DPS','Internasional','Denpasar'),(75,'Nangapinoh','NPO','Domestik','Melawi'),(76,'Paloh','–','Domestik','Sambas'),(77,'Pangsuma','PSU','Domestik','Kapuas Hulu'),(78,'Rahadi Oesman','KTG','Domestik','Ketapang'),(79,'Singkawang','–','Domestik TNI','Singkawang'),(80,'Supadio','PNK','Internasional','Kubu Raya'),(81,'Susilo','SQG','Domestik','Sintang'),(82,'Bersujud / Batu Licin','BTW','Domestik','Tanah Bambu'),(83,'Gusti Sjamsir Alam','KBU','Domestik','Kotabaru'),(84,'Kota Bangun','TJG','Domestik','Tabalong'),(85,'Syamsudin Noor','BDJ','Internasional','Banjarbaru'),(86,'Beringin','MTW','Domestik','Barito Utara'),(87,'H. Asan','SMQ','Domestik','Kotawaringin Timur'),(88,'Iskandar','PKN','Domestik','Kotawaringin Barat'),(89,'Kuala Kurun','KLK','Domestik','Gunung Mas'),(90,'Kuala Pembuang','KLP','Domestik','Seruyan'),(91,'Nanga Bulik','–','Domestik','Lamandau'),(92,'Sanggu','BTK','Domestik','Barito Selatan'),(93,'Tira Tangka Balang','–','Domestik','Murung Raya'),(94,'Tjilik Riwut','PKY','Domestik','Palangkaraya'),(95,'Samba','TMB','Domestik','Katingan'),(96,'Bontang','–','Domestik TNI','Bontang'),(97,'Datah Dawai','DTD','Domestik','Kutai Barat'),(98,'Kalimarau','BEJ','Domestik','Berau'),(99,'Kota Bangun','KOD','Domestik','Kutai Kertanegara'),(100,'Long Apari','–','Domestik TNI','Kutai Barat'),(101,'Maratua','–','Domestik TNI','Berau'),(102,'Melalan Melak','MLK','Domestik','Kutai Barat'),(103,'Muara Wahau','–','Domestik','Kutai Timur'),(104,'Paser','–','Domestik TNI','Paser'),(105,'Sultan Aji Muhammad Sulaiman Sepinggan','BPN','Internasional','Balikpapan'),(106,'Binuang','–','Domestik','Nunukan'),(107,'Juwata','TRX','Internasional','Tarakan'),(108,'Long Layu','–','Domestik','Nunukan'),(109,'Nunukan','NNX','Domestik','Nunukan'),(110,'Seluwung/Malinau','MLN','Domestik','Malinau'),(111,'Tanjung Harapan','TJS','Domestik','Bulungan'),(112,'Yuvai Semaring','LBW','Domestik','Nunukan'),(113,'Melongguane','MNA','Domestik','Kep. Talaud'),(114,'Miangas','–','Domestik TNI','Kep. Talaud'),(115,'Naha','NAH','Domestik','Kep. Sangihe'),(116,'Sam Ratulangi','MDC','Internasional','Manado'),(117,'Sitaro','–','Domestik TNI','Kep. Sitaro'),(118,'Kasiguncu','PSJ','Domestik','Poso'),(119,'Morowali','–','Domestik','Morowali'),(120,'Mutiara Sis-Al Jufri','PLW','Domestik','Palu'),(121,'Pogogul Buol','UDL','Domestik','Buol'),(122,'Sultan Bantilan','TLI','Domestik','Toli-toli'),(123,'Syukuran Aminuddin Amir','LUW','Domestik','Banggai'),(124,'Tanjung Api Ampana','–','Domestik','Tojo Una-una'),(125,'Beto Ambari','BUW','Domestik','Bau-bau'),(126,'Buton Utara / Lantagi','–','Domestik TNI','Buton Utara'),(127,'Haluoleo','KDI','Domestik','Konawe Selatan'),(128,'Matahora','WNI','Domestik','Wakatobi'),(129,'Sangia Nibandera','PUM','Domestik','Kolaka'),(130,'Sugimanuru Muna','RAQ','Domestik','Muna'),(131,'Andi Jemma','MXB','Domestik','Luwu Utara'),(132,'Arung Palakka / Bone','BXE','Domestik','Bone'),(133,'Bua','LLO','Domestik','Luwu'),(134,'H. Aroeppala Selayar','SLY','Domestik','Selayar'),(135,'Pongtiku','TTR','Domestik','Tana Toraja'),(136,'Rampi','RPI','Domestik','Luwu Utara'),(137,'Seko','SKO','Domestik','Luwu Utara'),(138,'Sultan Hasanuddin','UPG','Internasional','Maros'),(139,'Djalaluddin','GTO','Domestik','Gorontalo'),(140,'Pohuwato','–','Domestik TNI','Pahuwato'),(141,'Sumarorong','MSA','Domestik','Mamasa'),(142,'Tampa Padang','MJU','Domestik','Mamuju'),(143,'Lombok Praya','LOP','Internasional','Lombok Tengah'),(144,'Lunyuk','LYP','Domestik','Sumbawa'),(145,'Sultan Muhammad Kaharuddin','SWQ','Domestik','Sumbawa'),(146,'Sultan Muhammad Salahuddin','BMU','Domestik','Bima'),(147,'A.A Bere Tallo / Atambua','ABU','Domestik','Belu'),(148,'David Constantijn Saudale','RTI','Domestik','Rote Ndao'),(149,'El Tari','KOE','Internasional','Kupang'),(150,'Frans Sales Lega','RTG','Domestik','Manggarai'),(151,'Fransiskus Xaverius Seda','MOF','Domestik','Sikka'),(152,'Gewayantana','LKA','Domestik','Flores Timur'),(153,'H. Hasan Aroeboesman','ENE','Domestik','Ende'),(154,'Kabir','–','Domestik TNI','Alor'),(155,'Labuhan Bajo – Komodo','LBJ','Domestik','Manggarai Barat'),(156,'Mali','ARD','Domestik','Alor'),(157,'Mbay','–','Domestik TNI','Nagekeo'),(158,'SOA','BJW','Domestik','Ngada'),(159,'Tambolaka','TMC','Domestik','Sumba Barat Daya'),(160,'Tardamu','SAU','Domestik','Sabu Raijua'),(161,'Umbu Mehang Kunda','WGP','Domestik','Sumba Timur'),(162,'Wonopito','LWE','Domestik','Lembata'),(163,'Amahai','AHI','Domestik','Maluku Tengah'),(164,'Bandaneira','NDA','Domestik','Maluku Tengah'),(165,'Bula/Kufar','–','Domestik TNI','Seram bagian Timur'),(166,'Dobo','DOB','Domestik','Kepulauan Aru'),(167,'John Becker','KSX','Domestik','Maluku Barat Daya'),(168,'Karel Sadsuitubun','–','Domestik','Maluku Tenggara'),(169,'Karel Sadsuitubun - Langgur','LUV','Domestik','Maluku Tenggara'),(170,'Liwur Bunga (Larat)','–','Domestik','Maluku Tenggara Barat'),(171,'Mathilda Batlayeri','SXK','Domestik','Maluku Tenggara Barat'),(172,'Moa','–','Domestik TNI','Maluku Barat Daya'),(173,'Namlea / Namniwel','NAM','Domestik','Buru'),(174,'Namrole','NRE','Domestik','Buru Selatan'),(175,'Pattimura','AMQ','Internasional','Ambon'),(176,'Tepa Moa','–','Domestik TNI','Maluku Barat Daya'),(177,'Wahai','WHI','Domestik','Maluku Tengah'),(178,'Bobong','–','Domestik TNI','Kepulauan Sula'),(179,'Buli','BLI','Domestik','Halmahera Timur'),(180,'Dofa Benjina Falabisahaya','–','Domestik','Kepulauan Sula'),(181,'Emalamo','SQN','Domestik','Kepulauan Sula'),(182,'Gamar Malamo','GLX','Domestik','Halmahera Utara'),(183,'Gebe','–','Domestik','Halmahera Tengah'),(184,'Kuabang Kao','KAZ','Domestik','Halmahera Utara'),(185,'Oesman Sadik','LAH','Domestik','Halmahera Selatan'),(186,'Pitu Morotai','–','Domestik','Pulau Morotai'),(187,'Sultan Babullah','TTE','Domestik','Ternate'),(188,'Tepelo','–','Domestik TNI','Halmahera Tengah'),(189,'Weda','–','Domestik TNI','Halmahera Tengah'),(190,'Aboge','–','Domestik','Mappi'),(191,'Aboy','ABY','Domestik','Pengunungan Bintang'),(192,'Aboyaga','–','Domestik','Nabire'),(193,'Akimuga','–','Domestik','Mimika'),(194,'Alama','–','Domestik','Pengunungan Bintang'),(195,'Ambisibil','–','Domestik TNI','Pengunungan Bintang'),(196,'Apalapsili','–','Domestik','Yalimo'),(197,'Bede','BXD','Domestik','Mappi'),(198,'Batom','BXM','Domestik','Pengunungan Bintang'),(199,'Benawa','–','Domestik TNI','Yahukimo'),(200,'Beoga','BXD','Domestik','Puncak Jaya'),(201,'Bilai','–','Domestik','Intan Jaya'),(202,'Bilorai','UGU','Domestik','Intan Jaya'),(203,'Bime','–','Domestik TNI','Pengunungan Bintang'),(204,'Bokondini','BUI','Domestik','Tolikara'),(205,'Bomakia','BXG','Domestik','Boven Digoel'),(206,'Borome','–','Domestik','Yalimo'),(207,'Botawa','–','Domestik','Waropen'),(208,'Dabra','DRH','Domestik','Mamberamo Raya'),(209,'Douw Aturure - Nabire','NBX','Domestik','Nabire'),(210,'Elelim','ELR','Domestik','Yalmo'),(211,'Enarotali','EWI','Domestik','Paniai'),(212,'Ewer','EWE','Domestik','Asmat'),(213,'Fawi','–','Domestik','Puncak Jaya'),(214,'Frans Kaisiepo','BIK','Internasional','Biak Numfor'),(215,'Ilaga','ILA','Domestik','Puncak'),(216,'Ilu','–','Domestik','Puncak Jaya'),(217,'Jila','–','Domestik','Mimika'),(218,'Jita','–','Domestik','Mimika'),(219,'Kamur','KMR','Domestik','Asmat'),(220,'Karubaga','KBF','Domestik','Tolikara'),(221,'Kebo','–','Domestik','Papua'),(222,'Kelila','LLN','Domestik','Pegunungan Bintang'),(223,'Kenyam','–','Domestik','Nduga'),(224,'Kepi','KEI','Domestik','Mappi'),(225,'Kimaam','KMM','Domestik','Merauke'),(226,'Kirihi','–','Domestik TNI','Waropen'),(227,'Kiwirok','–','Domestik','Pegunungan Bintang'),(228,'Kobakma','–','Domestik','Tolikara'),(229,'Kokonao','KOX','Domestik','Mimika'),(230,'Koroway Batu','–','Domestik','Boven Digoel'),(231,'Koroway Batu','–','Domestik','Boven Digoel'),(232,'Lereh','LHI','Domestik','Keerom'),(233,'Mambramo Raya A','–','Domestik','Mamberamo Raya'),(234,'Mambramo Raya B','–','Domestik','Mamberamo Raya'),(235,'Manggelum','–','Domestik','Boven Digoel'),(236,'Mapanduma','–','Domestik','Nduga'),(237,'Mararena – Sarmi','ZRM','Domestik','Sami'),(238,'Mindiptana','MDP','Domestik','Boven Digoel'),(239,'Mindiptana','MDP','Domestik','Boven Digoel'),(240,'Moanamani','ONI','Domestik','Nabire'),(241,'Molof','–','Domestik','Keerom'),(242,'Mopah','MKQ','Internasional','Merauke'),(243,'Mozes Kilangin Timika','TIM','Domestik','Mimika'),(244,'Mugi','–','Domestik','Nduga'),(245,'Mulia','LII','Domestik','Puncak Jaya'),(246,'Nop Goliat Dekai Yahukimo','DEX','Domestik','Yahukimo'),(247,'Numfoor/Biak Numfoor','FOO','Domestik','Biak Numfor'),(248,'Okaba','OKQ','Domestik','Merauke'),(249,'Oksibil','OKL','Domestik TNI','Pengunungan Bintang'),(250,'Oktoneng','–','Domestik TNI','Pengunungan Bintang'),(251,'Paro','–','Domestik','Nduga'),(252,'Potowai','–','Domestik','Mimika'),(253,'Senggeh','–','Domestik','Keerom'),(254,'Senggo','ZEG','Domestik','Mappi'),(255,'Sentani','DJJ','Domestik','Jayapura'),(256,'Seradala','–','Domestik TNI','Yahukimo'),(257,'Sinak','–','Domestik','Puncak'),(258,'Sinilak','–','Domestik TNI','Mimika'),(259,'Stevanus Rumbewas Serui','ZRI','Domestik','Kep. Yapen'),(260,'Sudjarwo Tjondronegoro Serui','ZRI','Domestik','Kep. Yapen'),(261,'Taive II','–','Domestik TNI','Tolikara'),(262,'Tanah Merah','TMH','Domestik','Boven Digoel'),(263,'Teraplu','–','Domestik TNI','Pengunungan Bintang'),(264,'Tiom','TMY','Domestik','Lanny Jaya'),(265,'Tsinga','–','Domestik','Mimika'),(266,'Ubrub','UBR','Domestik','Keerom'),(267,'Waghete','WET','Domestik','Deiyai'),(268,'Wamena','WMX','Domestik','Jayawijaya'),(269,'Wangbe','–','Domestik','Puncak'),(270,'Waris Baru / Towe Hitam','WAR','Domestik','Keerom'),(271,'Yaniruma','–','Domestik','Boven Digoel'),(272,'Yuruf','RUF','Domestik','Keerom'),(273,'Anggi','AGD','Domestik','Papua Barat'),(274,'Ayawasi','AYW','Domestik','Maybrat'),(275,'Babo','BXB','Domestik','Teluk Bintuni'),(276,'Bintuni','NTI','Domestik','Teluk Bintuni'),(277,'Domine Eduard Osok','SOQ','Domestik','Sorong'),(278,'Dorekar','–','Domestik','Raja Ampat'),(279,'Ijahabra','–','Domestik','Papua Barat'),(280,'Inanwatan','INX','Domestik','Sorong Selatan'),(281,'Kabare','–','Domestik','Raja Ampat'),(282,'Kambuaya','KBX','Domestik','Maybrat'),(283,'Kebar','KEQ','Domestik','Tambrauw'),(284,'Marinda','–','Domestik','Raja Ampat'),(285,'Meididga','–','Domestik','Manokwari'),(286,'Merdey','RDE','Domestik','Teluk Bintuni'),(287,'Misool / Limalas','–','Domestik TNI','Raja Ampat'),(288,'Ransiki','RSK','Domestik','Manokwari'),(289,'Rendani','MKW','Domestik','Manokwari'),(290,'Reni','–','Domestik','Raja Ampat'),(291,'Segun','–','Domestik','Sorong'),(292,'Teminabuan','TMX','Domestik','Sorong Selatan'),(293,'Torea','FKQ','Domestik','Fakfak'),(294,'Utarom','KNG','Domestik','Kaimana'),(295,'Wasior','WSR','Domestik','Teluk Wondama'),(296,'Werur','WRR','Domestik','Papua Barat');
/*!40000 ALTER TABLE `tbl_bandara` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_flight_number`
--

DROP TABLE IF EXISTS `tbl_flight_number`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_flight_number` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_pesawat` varchar(100) NOT NULL,
  `nama_pesawat` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=44 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_flight_number`
--

LOCK TABLES `tbl_flight_number` WRITE;
/*!40000 ALTER TABLE `tbl_flight_number` DISABLE KEYS */;
INSERT INTO `tbl_flight_number` VALUES (1,'MV / VIT','Aviastar Mandiri'),(2,'FS / AFE','Airfast Indonesia'),(3,'CA / CCA','Air China'),(4,'AK / AXM','AirAsia (internasional)'),(5,'QZ / AWQ','AirAsia (Indonesia)'),(6,'NH / ANA','All Nippon Airways'),(7,'ID / BTK','Batik Air'),(8,'CX / CPA','Cathay Pacific'),(9,'5J / CEB','Cebu Pacific'),(10,'CI / CAL','China Airlines'),(11,'CZ / CSN','China Southern'),(12,'QG / CTV','Citilink'),(13,'BR / EVA','EVA Air'),(14,'XN / XAR','Express Air'),(15,'EK / UAE','Emirates'),(16,'EY / ETD','Etihad Airways'),(17,'GA / GIA','Garuda Indonesia'),(18,'JL / JAL','Japan Airlines'),(19,'JQ / JST','Jetstar Airways'),(20,'KD / KLS','Kal Star Aviation'),(21,'KL / KLM','KLM'),(22,'KE / KAL','Korean Air'),(23,'KU / KAC','Kuwait Airways'),(24,'JT / LNI','Lion Air'),(25,'MH / MAS','Malaysia Airlines'),(26,'MJ / MLR','Mihin Lanka'),(27,'RI / MDL','Mandala Airlines'),(28,'PR / PAL','Philipphine Airlines'),(29,'QF / QFA','Qantas'),(30,'QR / QTR','Qatar Airways'),(31,'BI / RBA','Royal Brunei Airlines'),(32,'SJ / SJY','Sriwijaya Air'),(33,'SV / SVA','Saudi Arabian Airlines'),(34,'3U / CSC','Sichuan Airlines'),(35,'SQ / SIA','Singapore Airlines'),(36,'TN / 3R','Trigana Air'),(37,'TG / THA','Thai Airways'),(38,'TR / TGW','Tiger Airways'),(39,'TK / THY','Turkish Airlines'),(40,'VF / VLU','Valuair'),(41,'VN / HVN','Vietnam Airlines'),(42,'IW / WON','Wings Air'),(43,'IY / IYE','Yemenia');
/*!40000 ALTER TABLE `tbl_flight_number` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_item`
--

DROP TABLE IF EXISTS `tbl_item`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateinsert` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET utf8 NOT NULL,
  `id_officer` int(11) NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `no_telp` varchar(50) CHARACTER SET utf8 NOT NULL,
  `qty` int(3) NOT NULL,
  `origin` int(8) NOT NULL,
  `destination` varchar(16) CHARACTER SET utf8 NOT NULL,
  `kategori` varchar(255) CHARACTER SET utf8 NOT NULL,
  `panjang` varchar(255) CHARACTER SET utf8 NOT NULL,
  `lebar` varchar(255) CHARACTER SET utf8 NOT NULL,
  `tinggi` varchar(255) CHARACTER SET utf8 NOT NULL,
  `berat` varchar(255) CHARACTER SET utf8 NOT NULL,
  `nama_item` varchar(255) NOT NULL,
  `harga` varchar(512) CHARACTER SET utf8 NOT NULL,
  `total_harga` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `origin` (`origin`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_item`
--

LOCK TABLES `tbl_item` WRITE;
/*!40000 ALTER TABLE `tbl_item` DISABLE KEYS */;
INSERT INTO `tbl_item` VALUES (1,'2018-07-01 10:36:38','Angkasa Pura',27,'jony@ap.com','0987876678',2,11,'1','1|1','100|200','100|70','50|50','10000|10000','Baju|Buku','830000|1170000',2000000),(2,'2018-07-03 12:45:32','PT. Fedex',38,'office.fedex@gmail.com','082114565515',2,1,'1','1|1','50|50','20|20','15|25','2000|3500','tas|koper','30000|40000',70000),(3,'2018-07-03 21:00:15','PT. Fedex',38,'office.fedex@gmail.com','082114565515',3,53,'67','1|2|1','50|20|60','50|20|60','20|10|120','5|1|1','koper|ransel|kursi','50000|10000|48000',108000),(6,'2018-07-03 21:25:10','PT. Fedex',38,'office.fedex@gmail.com','082114565515',1,1,'1','1','500','500','500','4','test','300000',300000),(7,'2018-07-04 00:14:41','PT. Fedex',38,'office.fedex@gmail.com','082114565515',1,147,'67','1','10','20','30','7','10','70000',70000);
/*!40000 ALTER TABLE `tbl_item` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_kategori`
--

DROP TABLE IF EXISTS `tbl_kategori`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_kategori` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kategori` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_kategori`
--

LOCK TABLES `tbl_kategori` WRITE;
/*!40000 ALTER TABLE `tbl_kategori` DISABLE KEYS */;
INSERT INTO `tbl_kategori` VALUES (1,'Bisa Ditumpuk'),(2,'Barang Beresiko Tinggi');
/*!40000 ALTER TABLE `tbl_kategori` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_partner`
--

DROP TABLE IF EXISTS `tbl_partner`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_partner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_perusahaan` varchar(4) CHARACTER SET utf8 NOT NULL,
  `nama_perusahaan` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(32) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `session` varchar(255) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_partner`
--

LOCK TABLES `tbl_partner` WRITE;
/*!40000 ALTER TABLE `tbl_partner` DISABLE KEYS */;
INSERT INTO `tbl_partner` VALUES (9,'JNE','Jenaka Negara Eta','jnepusat@jne.com','U2FsdGVkX19TZXzBgGtisSc5ogve6dsaQaI2Ly1JIiI=','U2FsdGVkX1 scU4Blj78zvMHuYStnWRJ4/tGSYxh c6GvGPChr3RaRRm/C01 10Shw2ZXkigBYRUe22iYYUmWQ=='),(12,'TIKI','Titipan Kilat','tikipusat@tiki.com','U2FsdGVkX18v8aMQN/j7fAFnhZe4NVIhqMPZy8zR1j0=','U2FsdGVkX1 MbIrAXzUcfKKkTGwKeSKg4BF4ABYxwtfPjmxvTrT0yrzFYzjz/I8FD LDwRqlOR9bvIaZBEFUNg==');
/*!40000 ALTER TABLE `tbl_partner` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_ref_posisi`
--

DROP TABLE IF EXISTS `tbl_ref_posisi`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_ref_posisi` (
  `kode` varchar(8) CHARACTER SET utf8 NOT NULL,
  `nama` varchar(50) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_ref_posisi`
--

LOCK TABLES `tbl_ref_posisi` WRITE;
/*!40000 ALTER TABLE `tbl_ref_posisi` DISABLE KEYS */;
INSERT INTO `tbl_ref_posisi` VALUES ('rq','Request'),('ra','Related Agent'),('tko','Terminal Cargo Out'),('tki','Terminal Cargo In'),('',''),('off','Off Board'),('on','On board');
/*!40000 ALTER TABLE `tbl_ref_posisi` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_regulated_agent`
--

DROP TABLE IF EXISTS `tbl_regulated_agent`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_regulated_agent` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateinsert` varchar(50) NOT NULL,
  `id_item` int(11) NOT NULL,
  `posisi_item` int(3) NOT NULL,
  `destination` varchar(8) NOT NULL,
  `kategori` int(3) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `flight` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`)
) ENGINE=InnoDB AUTO_INCREMENT=217 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_regulated_agent`
--

LOCK TABLES `tbl_regulated_agent` WRITE;
/*!40000 ALTER TABLE `tbl_regulated_agent` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_regulated_agent` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_terminal_cargo_in`
--

DROP TABLE IF EXISTS `tbl_terminal_cargo_in`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_terminal_cargo_in` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateinsert` datetime NOT NULL,
  `id_item` int(11) NOT NULL,
  `qty` int(3) NOT NULL,
  `destination` int(3) NOT NULL,
  `kategori` int(3) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `flight` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_item` (`id_item`),
  KEY `flight` (`flight`),
  KEY `kategori` (`kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_terminal_cargo_in`
--

LOCK TABLES `tbl_terminal_cargo_in` WRITE;
/*!40000 ALTER TABLE `tbl_terminal_cargo_in` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_terminal_cargo_in` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_terminal_cargo_out`
--

DROP TABLE IF EXISTS `tbl_terminal_cargo_out`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_terminal_cargo_out` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateinsert` datetime NOT NULL,
  `id_item` int(11) NOT NULL,
  `qty` int(3) NOT NULL,
  `destination` varchar(8) NOT NULL,
  `kategori` int(3) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `flight` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_item` (`id_item`),
  KEY `flight` (`flight`),
  KEY `kategori` (`kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_terminal_cargo_out`
--

LOCK TABLES `tbl_terminal_cargo_out` WRITE;
/*!40000 ALTER TABLE `tbl_terminal_cargo_out` DISABLE KEYS */;
/*!40000 ALTER TABLE `tbl_terminal_cargo_out` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_tracking`
--

DROP TABLE IF EXISTS `tbl_tracking`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_tracking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateinsert` varchar(50) NOT NULL,
  `id_item` int(11) NOT NULL,
  `posisi_item` int(3) NOT NULL,
  `destination` varchar(8) NOT NULL,
  `kategori` int(3) NOT NULL,
  `panjang` int(11) NOT NULL,
  `lebar` int(11) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `berat` int(11) NOT NULL,
  `barcode` varchar(255) NOT NULL,
  `flight` varchar(100) NOT NULL,
  `posisi` varchar(8) NOT NULL,
  `harga` bigint(20) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `barcode` (`barcode`),
  KEY `posisi` (`posisi`),
  KEY `flight` (`flight`),
  KEY `kategori` (`kategori`),
  KEY `destination` (`destination`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_tracking`
--

LOCK TABLES `tbl_tracking` WRITE;
/*!40000 ALTER TABLE `tbl_tracking` DISABLE KEYS */;
INSERT INTO `tbl_tracking` VALUES (11,'2018-07-03 22:12:50',6,0,'1',1,500,500,500,4,'6-0','1','ra',300000);
/*!40000 ALTER TABLE `tbl_tracking` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `kode_perusahaan` varchar(16) CHARACTER SET utf8 NOT NULL,
  `nama_perusahaan` varchar(255) CHARACTER SET utf8 NOT NULL,
  `fname` varchar(32) CHARACTER SET utf8 NOT NULL,
  `lname` varchar(32) CHARACTER SET utf8 NOT NULL,
  `id_parent` smallint(4) NOT NULL,
  `level` smallint(4) NOT NULL,
  `category` varchar(16) CHARACTER SET utf8 NOT NULL,
  `posisi` varchar(16) CHARACTER SET utf8 NOT NULL,
  `area` smallint(4) NOT NULL,
  `address` varchar(500) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `no_telp` varchar(50) CHARACTER SET utf8 NOT NULL,
  `password` varchar(500) CHARACTER SET utf8 NOT NULL,
  `session` varchar(500) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id_parent` (`id_parent`),
  KEY `level` (`level`),
  KEY `area` (`area`),
  KEY `category` (`category`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_user`
--

LOCK TABLES `tbl_user` WRITE;
/*!40000 ALTER TABLE `tbl_user` DISABLE KEYS */;
INSERT INTO `tbl_user` VALUES (7,'APLOG','Angkasa Pura','','',0,1,'admin','',0,'','aplog@ap.com','','U2FsdGVkX19DzsS1onTiTFiQgRhLrxo3Cd36gcYva7k=','U2FsdGVkX19WD/q0r 80JosUyDfY1T4Wjssq7nyWcDH4sFJZ4LE9kT9 kYQGf9ZUaro1qSq BE3ekxVizGQYJg=='),(27,'','','Jony','Iskandar',7,1,'officer','rq',11,'Desa 1','jony@ap.com','0987876678','U2FsdGVkX18uF29JKqVYXd4qsdlBbVIViNIfqE3z9aI=','U2FsdGVkX1 /E9lYv0QQSUKl0mjGZSW8DYQafCXcCeL0qJax0AXp CwKBJN7dn v4mcZr0gECkRw WKyixrQ/A=='),(28,'','','Darto','Samudera',7,1,'officer','ra',11,'Desa 1','darto@ap.com','0987876656','U2FsdGVkX18Y0UIhbMYiH1b69pdXGaKEu7g1Etw6Qmk=','U2FsdGVkX18xF2tVfg8OlRYvX/bOnNusDl7V7KuKD0oe709/gacfcsWCM4D61FCa3JI1tV42I/yHcEUfCuUbXg=='),(29,'','','Kiki','Kusnandar',7,1,'officer','ra',12,'Desa 2','kikin@ap.com','2189778689','U2FsdGVkX181iQa3doYJPQKDm5xM1hWCtc+JEfWcPbc=','U2FsdGVkX19UlrJ6eup7A0WywIcx882Xro9Q6PlrPHAIAQfKPJgHws00h P 3Ge5iWpzWDoVE7FfTJfASsh1HQ=='),(30,'','','Nana','Suryani',7,1,'officer','tko',11,'Desa 1','nana@ap.com','6789778689','U2FsdGVkX1/jJGahXRXmLAHK0kNSILvvU3l7j9iYC3E=','U2FsdGVkX1 ZexCf9ohJ1o8dWg18 qNCiGebPKls HdoogecRJNuzfGjY8u7f3gDmIaRKXfVfps77B0wTeZq1g=='),(31,'','','James','Gunarto',7,1,'officer','tki',15,'Desa 3','james.g@ap.com','6723421356','U2FsdGVkX18XzUrqDBGsLy1hmtFlwI4b8njaw+12pV4=','U2FsdGVkX1 petKTU5JPJ6NJ2d7V0SXbDE8uCUXHv8oEQm503GI 6WwoBO6Lb2Y5KybRAfb OwmEPEsnM/xM6A=='),(32,'JNE','PT Tiki Jalur Nugraha Ekakurir','','',7,2,'admin','',0,'','admin@jne.com','','U2FsdGVkX1+rjCScTmExNFYG9DbppHJ00hFaoDXfCmM=','U2FsdGVkX1/f4UluE7PTL0V9XCao9SKBDtinhAC GSL28uUIWPK4LIpqLFHWICvQdRj4PHcgcJZpZKAh RhTBg=='),(33,'','','ahdian','rawuli',32,2,'officer','rq',13,'Jl. pasar kecapi no 22 A','officer@jne.com','082114565515','U2FsdGVkX18K59XQWov3kFNADvFcv464R+AfFyetAEM=','U2FsdGVkX18Sh6DeCx 7tg8am7w7/y/bdtJN97In/36FfiP/n7N6MXCSCwRlTXUQ0tj2Txw2ZbOTIilJ/VUCWQ=='),(35,'LTA','PT. Lintas Arta','','',7,2,'admin','',0,'','lintasarta@gmail.com','','U2FsdGVkX1+yzZJ0PBUGcuH0gHkmAkWUnQpdpXjU9eo=','U2FsdGVkX19n7flXMDJ4eQZA0C41T5J/l8GzVyWZwN8PtgsyMzdDTk8F wxuvOW2VNjLRlmq4IpGQpWEeZFeXA=='),(36,'','','mayong','eyato',35,2,'officer','rq',11,'Jl. pasar kecapi','office.lintasarta@gmail.com','082114565515','U2FsdGVkX1+VHge52tvXTctgda+aVKCK7e1tbv4Rh/8=','U2FsdGVkX1/mLsrTKmlNb0 fIqHSquRl4HkgcMQ0FiutfQ4sRzkVrEHF7gbnww4sR7hMAR4A1eEu1HXLJQrxQg=='),(37,'FDC','PT. Fedex','','',7,2,'admin','',0,'','fedex@gmail.com','','U2FsdGVkX189dtO9rcpF0hqvuEf11TmX7CdKYEVtQXc=','U2FsdGVkX18DTU/RALw/j3ASQRIXKQwOtJCKmt40JymuGoq/zYKT/o/k0K0 UAYMaVBjqh4t4OWY8/qy5FOH5Q=='),(38,'','','Bagus','Setiawan',37,2,'officer','rq',35,'Jl. Pasuruan Surabaya','office.fedex@gmail.com','082114565515','U2FsdGVkX1+LnqqSs+PF4eftiLQIDOZ+DDtZJhsuGgo=','U2FsdGVkX18dbQqT k4Ww/0 dacPaOaGOxb4CznTwgSLA35Huz96JL PhKO49hADClXVeQu265Dt 7Cun1l1Mg=='),(39,'','','Adi','Kurniawan',7,1,'officer','ra',35,'Jl Juanda','ra@aplog.com','082114565515','U2FsdGVkX18PhVV8o5HRSQNBuBahCXsHWSbKj2ZwpYw=','U2FsdGVkX18IgIX0Tp6ykUs55enJkr0n32rpTV/25BgqTLvt64F63ghUd3Lvn2K1B/KC9 U0b2zxr6z0EY3vxw=='),(40,'','','Agus','Darmaji',7,1,'officer','tko',35,'Jl. Juanda','tko@aplog.com','082114565515','U2FsdGVkX19GqwI9JZaGcA+tYRw1eenv7W/kCLVfHZE=','U2FsdGVkX1/ZoE23Q5s/UfExvhyRrvxRTZjM KhpiqM6PukLpYqRxwku5lh JFpTvXevD15eiwcBNDeGknk2fg=='),(41,'','','Surya','Susilo',7,1,'officer','tki',31,'Jl. Halim','tki@aplog.com','082114565515','U2FsdGVkX19cKloNrek/dtpagRi3RlWcxXgsnQ8AS8I=','U2FsdGVkX1 ELdq/OF60gFrA27SyrevGjUXdYzTUbvuxyyfcyiOIj1zuXJKe1BqWNcKb0J2e3o2HuXcRj5mKiA=='),(42,'','','ali','muhamad',37,2,'officer','rq',31,'tes','office2.fedex@gmail.com','082114565515','U2FsdGVkX18lAPO+pyrRlZa2Hh/GdU9OGiqhfTyl12Q=','U2FsdGVkX1/vEP xK97I mj3vugll1f4CC1fNQQ7roe/ wYXzbXgztRJfMTGxy4aZW29PcIqjwNC9ZzeDuyoPA=='),(43,'DHL','PT. DHL','','',7,2,'admin','',0,'','dhl@gmail.com','','U2FsdGVkX19OZCNu0lqOy8Isyo0q2C1qKYeFkQAoodA=','U2FsdGVkX18XLLpN/8N8lxC6VpA BrE4riOtOjgaKSPaqTM7MN8wpZ24SriTqbvOtfLj5i7CMtO3Ej/oHI3kZQ=='),(44,'','','Muham','ali',43,2,'officer','rq',31,'Jl. Kemayoran','office.dhl@gmail.com','08888881','U2FsdGVkX1/LhEIV/p2jCg1mOBt0NvFQXEe8NJTZ07E=','U2FsdGVkX1 9gUBufe vzM9r4XwCJRNyVr79WfN9n18QFnki7Hopptx1cdsZTBKWAj9HXm7byUGSBVa59rBMCA=='),(45,'','','Ahmad','Rifqi',7,1,'officer','sto',71,'Jakarta','sto@aplog.com','0821890099900','U2FsdGVkX1+kdAubI+Qziq+7bvLA35sPYJ4sqyC38WU=','U2FsdGVkX1 GjfcUyEa8pGEg8qZ0v1KBUCRZP4PiAjzWq9gu408pGzEXJm85tEHXZh1UwKGtWXGAp5PjZFSF/g==');
/*!40000 ALTER TABLE `tbl_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tbl_wilayah`
--

DROP TABLE IF EXISTS `tbl_wilayah`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `tbl_wilayah` (
  `id` int(2) NOT NULL,
  `nama_prov` char(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tbl_wilayah`
--

LOCK TABLES `tbl_wilayah` WRITE;
/*!40000 ALTER TABLE `tbl_wilayah` DISABLE KEYS */;
INSERT INTO `tbl_wilayah` VALUES (11,'Aceh\r'),(12,'Sumatera Utara\r'),(13,'Sumatera Barat\r'),(14,'Riau\r'),(15,'Jambi\r'),(16,'Sumatera Selatan\r'),(17,'Bengkulu\r'),(18,'Lampung\r'),(19,'Kepulauan Bangka Belitung\r'),(21,'Kepulauan Riau\r'),(31,'DKI Jakarta'),(32,'Jawa Barat\r'),(33,'Jawa Tengah\r'),(34,'DI Yogyakarta'),(35,'Jawa Timur\r'),(36,'Banten\r'),(51,'Bali\r'),(52,'Nusa Tenggara Barat\r'),(53,'Nusa Tenggara Timur\r'),(61,'Kalimantan Barat\r'),(62,'Kalimantan Tengah\r'),(63,'Kalimantan Selatan\r'),(64,'Kalimantan Timur\r'),(71,'Sulawesi Utara\r'),(72,'Sulawesi Tengah\r'),(73,'Sulawesi Selatan\r'),(74,'Sulawesi Tenggara\r'),(75,'Gorontalo\r'),(76,'Sulawesi Barat\r'),(81,'Maluku\r'),(82,'Maluku Utara\r'),(91,'Papua Barat\r'),(94,'Papua\r');
/*!40000 ALTER TABLE `tbl_wilayah` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_reg`
--

DROP TABLE IF EXISTS `user_reg`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `user_reg` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(500) NOT NULL,
  `session` varchar(500) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_reg`
--

LOCK TABLES `user_reg` WRITE;
/*!40000 ALTER TABLE `user_reg` DISABLE KEYS */;
INSERT INTO `user_reg` VALUES (11,'ahdian','rawuli','ahdian.rawuli4@gmail.com','U2FsdGVkX19DzsS1onTiTFiQgRhLrxo3Cd36gcYva7k=','U2FsdGVkX1/cGH2HoHHAFBajs9C17hUAbHytKyCTEHsgzogKEAjCNh8GwSdkNP/jlSfh6xY8veeeEHt ttYCag=='),(15,'Mayong','Eyato','mayong@gmail.com','U2FsdGVkX1/ItcSTqbgDM8xlqhrr31SRRIxnlP7CitE=','U2FsdGVkX1/nG0 nK5WqzUJbD2cCkwAnzRRc1Jl97R95oZo7dOduKathyBWhGpBl/HLEYTPgG/qP/XXlRoE5/Q=='),(16,'Ahmad','Rifqi','ahmad.rifqi19@gmail.com','U2FsdGVkX18joE2sKy0Z6qE4XxKSDgRZTkcsVk1hQig=','U2FsdGVkX19E4pYDwk rBBUfzw5D5sHv8/rH Pkc1VC1s40gB9i4aJUaWF5d6cw2pcp1gbMALhcCfJd8uo44ZQ==');
/*!40000 ALTER TABLE `user_reg` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2018-07-04  0:41:31
