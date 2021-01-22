-- MySQL dump 10.13  Distrib 8.0.21, for Linux (x86_64)
--
-- Host: localhost    Database: laravel-shop
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `brands`
--

DROP TABLE IF EXISTS `brands`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `brands` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `active` tinyint NOT NULL DEFAULT '1',
  `img_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `brands_slug_index` (`slug`),
  KEY `brands_active_index` (`active`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `brands`
--

LOCK TABLES `brands` WRITE;
/*!40000 ALTER TABLE `brands` DISABLE KEYS */;
INSERT INTO `brands` VALUES (1,'Accessories','accessories','Đồng hồ',1,NULL,'2021-01-13 08:56:32','2021-01-13 09:36:11'),(2,'Beauty','beauty','Kem dưỡng da',1,NULL,'2021-01-13 08:56:58','2021-01-13 08:56:58'),(3,'Man Office Bag','man-office-bag','Túi sách',1,NULL,'2021-01-13 08:57:11','2021-01-13 08:57:11'),(4,'Decor','decor','Trang chí',1,NULL,'2021-01-13 08:57:28','2021-01-13 08:57:28'),(5,'CHANEL','chanel','Quần áo',1,NULL,'2021-01-13 08:58:04','2021-01-13 08:58:04'),(6,'DIOR','dior','Thời trang cao cấp',1,NULL,'2021-01-13 08:58:16','2021-01-13 08:58:16');
/*!40000 ALTER TABLE `brands` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (1,'Giày',0,'giay','2021-01-05 21:34:57','2021-01-05 21:34:57',NULL),(2,'Thời trang nam giới',0,'thoi-trang-nam-gioi','2021-01-05 21:35:10','2021-01-05 21:35:10',NULL),(3,'Áo con gái',0,'ao-con-gai','2021-01-05 21:35:19','2021-01-05 21:35:19',NULL),(4,'Balo',0,'balo','2021-01-05 21:35:24','2021-01-05 21:35:24',NULL),(5,'Túi',0,'tui','2021-01-05 21:35:33','2021-01-05 21:35:33',NULL);
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `failed_jobs`
--

LOCK TABLES `failed_jobs` WRITE;
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `menus`
--

DROP TABLE IF EXISTS `menus`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `menus` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `menus`
--

LOCK TABLES `menus` WRITE;
/*!40000 ALTER TABLE `menus` DISABLE KEYS */;
/*!40000 ALTER TABLE `menus` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `migrations`
--

LOCK TABLES `migrations` WRITE;
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` VALUES (47,'2014_10_12_000000_create_users_table',1),(48,'2014_10_12_100000_create_password_resets_table',1),(49,'2019_08_19_000000_create_failed_jobs_table',1),(50,'2020_10_20_144413_create_categories_table',1),(51,'2020_10_21_024057_add_column_deleted_at_table_categories',1),(52,'2020_10_21_025543_create_menus_table',1),(53,'2020_10_21_133847_create_products_table',1),(54,'2020_10_21_134149_create_product_images_table',1),(55,'2020_10_21_134309_create_tags_table',1),(56,'2020_10_21_134400_create_product_tags_table',1),(57,'2020_10_22_081947_add_column_feature_image_name__table_products',1),(58,'2020_10_22_122509_add_column_image_name_to_table_product_images',1),(59,'2020_10_24_081655_add_column_delete_at_to_table_product',1),(60,'2020_10_24_133955_create_sliders_table',1),(61,'2020_10_25_150538_add_column_delete_at_to_table_sliders',1),(62,'2020_10_25_152506_create_settings_table',1),(63,'2020_10_25_161529_add_column_type_setting__to_table_settings',1),(64,'2020_10_26_013528_create_roles_table',1),(65,'2020_10_26_013542_create_permissions_table',1),(66,'2020_10_26_013830_create_user_role_table',1),(67,'2020_10_26_013920_create_permission_role_table',1),(68,'2020_10_27_081445_add_column_parent_id__to_table_permission',1),(69,'2020_10_27_091222_add_column_key_permission_to_table_permission',1),(70,'2021_01_13_140608_add_column_hot_active',2),(78,'2021_01_13_153540_create_brand__table',4),(79,'2021_01_13_153556_add_column_brand_id',4),(80,'2021_01_14_140423_create_shop_table',5),(82,'2021_01_14_144604_add_column_description',6),(83,'2021_01_15_151008_create_shippings_table',7),(84,'2021_01_16_095708_add_column_shipping_id',8),(98,'2021_01_16_101309_create_orders_table',9),(99,'2021_01_21_072854_add_column_sale',9),(100,'2021_01_21_081916_create_transactions_table',9),(101,'2021_01_21_141009_add_column_pay',10);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `order_detail` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_sales_quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `order_detail`
--

LOCK TABLES `order_detail` WRITE;
/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `orders`
--

DROP TABLE IF EXISTS `orders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `orders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `transaction_id` int NOT NULL,
  `product_id` int NOT NULL DEFAULT '0',
  `sale` int NOT NULL DEFAULT '0',
  `qty` tinyint NOT NULL DEFAULT '0',
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `orders`
--

LOCK TABLES `orders` WRITE;
/*!40000 ALTER TABLE `orders` DISABLE KEYS */;
INSERT INTO `orders` VALUES (1,3,13,20,3,'375200','2021-01-21 04:27:59','2021-01-21 04:27:59'),(2,3,12,15,2,'841500','2021-01-21 04:27:59','2021-01-21 04:27:59'),(3,3,10,50,4,'12500','2021-01-21 04:27:59','2021-01-21 04:27:59'),(4,4,13,20,1,'375200','2021-01-21 07:27:03','2021-01-21 07:27:03'),(5,4,12,15,1,'841500','2021-01-21 07:27:03','2021-01-21 07:27:03');
/*!40000 ALTER TABLE `orders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `password_resets`
--

LOCK TABLES `password_resets` WRITE;
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `payments`
--

DROP TABLE IF EXISTS `payments`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `payments` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `payments`
--

LOCK TABLES `payments` WRITE;
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permission_role`
--

DROP TABLE IF EXISTS `permission_role`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permission_role` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `role_id` int NOT NULL,
  `permission_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permission_role`
--

LOCK TABLES `permission_role` WRITE;
/*!40000 ALTER TABLE `permission_role` DISABLE KEYS */;
INSERT INTO `permission_role` VALUES (3,1,5,NULL,NULL),(4,1,6,NULL,NULL),(5,1,3,NULL,NULL),(6,2,3,NULL,NULL),(7,2,4,NULL,NULL),(8,2,5,NULL,NULL),(9,2,6,NULL,NULL),(10,3,3,NULL,NULL),(11,3,4,NULL,NULL),(12,3,5,NULL,NULL),(13,3,6,NULL,NULL);
/*!40000 ALTER TABLE `permission_role` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `permissions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `key_code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `permissions`
--

LOCK TABLES `permissions` WRITE;
/*!40000 ALTER TABLE `permissions` DISABLE KEYS */;
INSERT INTO `permissions` VALUES (1,'menu','0','2021-01-05 21:21:59','2021-01-05 21:21:59',0,'menu'),(2,'category','0','2021-01-05 21:22:25','2021-01-05 21:22:25',0,'category'),(3,'List category','2','2021-01-05 21:23:43','2021-01-05 21:23:43',2,'category-list'),(4,'Add category','2','2021-01-05 21:24:13','2021-01-05 21:24:13',2,'category-add'),(5,'Edit category','2','2021-01-05 21:24:53','2021-01-05 21:24:53',2,'category-edit'),(6,'Deleted category','2','2021-01-05 21:25:24','2021-01-05 21:25:24',2,'category-deleted');
/*!40000 ALTER TABLE `permissions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_images`
--

DROP TABLE IF EXISTS `product_images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_images` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_images`
--

LOCK TABLES `product_images` WRITE;
/*!40000 ALTER TABLE `product_images` DISABLE KEYS */;
INSERT INTO `product_images` VALUES (1,'/storage/product/1/js2Ap01LyYA9IlL6GXhi.jpg',1,'2021-01-05 21:37:14','2021-01-05 21:37:14','anh2.jpg'),(2,'/storage/product/1/7vPgEMUvBarVJLSQdk3X.jpg',1,'2021-01-05 21:37:14','2021-01-05 21:37:14','anh3.jpg'),(3,'/storage/product/1/Eumiiah56uxQOKmchezx.jpg',1,'2021-01-05 21:37:14','2021-01-05 21:37:14','anh4.jpg'),(4,'/storage/product/1/defJx9ZRySIS6ua3vIkY.jpg',3,'2021-01-06 23:36:17','2021-01-06 23:36:17','anh2.jpg'),(5,'/storage/product/1/0v7YhglOUGheAAUM9MTo.jpg',3,'2021-01-06 23:36:17','2021-01-06 23:36:17','anh3.jpg'),(6,'/storage/product/1/kkgMXYRv5ytJ9Vsj4Lve.jpg',3,'2021-01-06 23:36:17','2021-01-06 23:36:17','anh4.jpg'),(7,'/storage/product/1/61st1i4XH7ZCjTEsRUsW.png',7,'2021-01-13 09:12:37','2021-01-13 09:12:37','product2.png'),(8,'/storage/product/1/ooSTM4rtEIlW9Vyy24lw.png',7,'2021-01-13 09:12:37','2021-01-13 09:12:37','product3.png'),(9,'/storage/product/1/NRr2RfIMFCgpjILNrnAB.png',7,'2021-01-13 09:12:37','2021-01-13 09:12:37','product4.png'),(10,'/storage/product/1/k8s2uLXjdtBuIGBoE8N6.png',8,'2021-01-14 01:09:56','2021-01-14 01:09:56','product5.png'),(11,'/storage/product/1/NqxbWtkNJzwRO4RzHLxG.png',8,'2021-01-14 01:09:56','2021-01-14 01:09:56','product7.png'),(12,'/storage/product/1/GMzmza17ceDpaw18AF8b.png',8,'2021-01-14 01:09:56','2021-01-14 01:09:56','product8.png'),(25,'/storage/product/2/xUW7jjonctoEuLAk5Fou.png',10,'2021-01-16 08:50:40','2021-01-16 08:50:40','product4.png'),(26,'/storage/product/2/uCvvBWc5iDmGPwWcaruK.png',10,'2021-01-16 08:50:40','2021-01-16 08:50:40','product5.png'),(27,'/storage/product/2/YN9hJHkL8aqeVWtv5qkk.png',10,'2021-01-16 08:50:40','2021-01-16 08:50:40','product6.png');
/*!40000 ALTER TABLE `product_images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `product_tags`
--

DROP TABLE IF EXISTS `product_tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `product_tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `product_id` int NOT NULL,
  `tag_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `product_tags`
--

LOCK TABLES `product_tags` WRITE;
/*!40000 ALTER TABLE `product_tags` DISABLE KEYS */;
INSERT INTO `product_tags` VALUES (1,3,1,'2021-01-06 23:36:17','2021-01-06 23:36:17'),(2,3,2,'2021-01-06 23:36:17','2021-01-06 23:36:17'),(3,4,2,'2021-01-06 23:37:44','2021-01-06 23:37:44'),(4,5,1,'2021-01-06 23:38:29','2021-01-06 23:38:29'),(5,5,3,'2021-01-06 23:38:29','2021-01-06 23:38:29'),(6,6,3,'2021-01-06 23:39:17','2021-01-06 23:39:17'),(7,7,4,'2021-01-13 09:12:37','2021-01-13 09:12:37'),(8,8,2,'2021-01-14 01:09:56','2021-01-14 01:09:56'),(9,9,3,'2021-01-14 01:10:53','2021-01-14 01:10:53'),(10,2,2,'2021-01-14 02:07:39','2021-01-14 02:07:39'),(11,10,2,'2021-01-14 03:33:50','2021-01-14 03:33:50'),(12,11,3,'2021-01-15 01:05:58','2021-01-15 01:05:58'),(13,12,3,'2021-01-15 01:07:10','2021-01-15 01:07:10'),(14,13,3,'2021-01-15 01:07:52','2021-01-15 01:07:52');
/*!40000 ALTER TABLE `product_tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `products`
--

DROP TABLE IF EXISTS `products`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `products` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `feature_image_path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int NOT NULL,
  `category_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `feature_image_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `active` tinyint NOT NULL DEFAULT '1',
  `hot` tinyint NOT NULL DEFAULT '0',
  `brand_id` int NOT NULL DEFAULT '1',
  `description` text COLLATE utf8mb4_unicode_ci,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sale` int NOT NULL DEFAULT '0',
  `pay` int NOT NULL DEFAULT '1',
  `product_number` int NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`),
  KEY `products_active_index` (`active`),
  KEY `products_slug_index` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `products`
--

LOCK TABLES `products` WRITE;
/*!40000 ALTER TABLE `products` DISABLE KEYS */;
INSERT INTO `products` VALUES (1,'Giày Ankle Strap Circe','100000','/storage/product/1/grKnJMGxwTzvaEzO65MT.png','<p>Beryl Cook is one of Britain&rsquo;s most talented and amusing artists .Beryl&rsquo;s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child&rsquo;s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named &lsquo;Hangover&rsquo; by Beryl&rsquo;s husband and</p>\r\n\r\n<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less</p>',1,1,'2021-01-05 21:37:14','2021-01-15 01:48:32','cart3.png',NULL,1,1,2,'<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>','giay-ankle-strap-circe',0,1,1),(2,'Áo khoác','250000','/storage/product/1/anh3.jpg','<p>Beryl Cook is one of Britain&rsquo;s most talented and amusing artists .Beryl&rsquo;s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child&rsquo;s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named &lsquo;Hangover&rsquo; by Beryl&rsquo;s husband and</p>\r\n\r\n<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less</p>',1,3,'2021-01-05 23:49:22','2021-01-14 08:16:42','anh3.jpg',NULL,1,1,1,'<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>','ao-khoac',0,1,1),(3,'Áo Nỉ Nam Thu Đông','2000000','/storage/product/1/PB7VC5NHZScFAYBswy3U.jpg','<p>Beryl Cook is one of Britain&rsquo;s most talented and amusing artists .Beryl&rsquo;s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child&rsquo;s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named &lsquo;Hangover&rsquo; by Beryl&rsquo;s husband and</p>\r\n\r\n<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less</p>',1,2,'2021-01-06 23:36:17','2021-01-15 01:48:06','c4.jpg',NULL,1,1,1,'<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>','ao-ni-nam-thu-dong',0,1,1),(4,'Áo hoodie nữ thời trang','250000','/storage/product/1/SpXMGfQCPHdpU4ChARpp.png','<p>Beryl Cook is one of Britain&rsquo;s most talented and amusing artists .Beryl&rsquo;s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child&rsquo;s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named &lsquo;Hangover&rsquo; by Beryl&rsquo;s husband and</p>\r\n\r\n<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less</p>',1,3,'2021-01-06 23:37:44','2021-01-15 07:22:24','product-sm-7.png',NULL,1,1,1,'<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>','ao-hoodie-nu-thoi-trang',0,1,1),(5,'Áo Sweater tay dài Hàn Quốc','100000','/storage/product/1/j5p0bJaMGTJgUdBHQ0il.png','<p>Beryl Cook is one of Britain&rsquo;s most talented and amusing artists .Beryl&rsquo;s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child&rsquo;s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named &lsquo;Hangover&rsquo; by Beryl&rsquo;s husband and</p>\r\n\r\n<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less</p>',1,2,'2021-01-06 23:38:29','2021-01-15 01:48:55','product-sm-8.png',NULL,1,1,2,'<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>','ao-sweater-tay-dai-han-quoc',0,1,1),(6,'LOT STORE TX660','250000','/storage/product/1/G3A4W7WaxVB5BNlSL4fZ.jpg','<p>Beryl Cook is one of Britain&rsquo;s most talented and amusing artists .Beryl&rsquo;s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child&rsquo;s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named &lsquo;Hangover&rsquo; by Beryl&rsquo;s husband and</p>\r\n\r\n<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less</p>\r\n\r\n<p>&nbsp;</p>',1,5,'2021-01-06 23:39:16','2021-01-15 01:46:32','c3.jpg',NULL,1,1,5,'<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>','lot-store-tx660',0,1,1),(7,'Room Flash Light','15000','/storage/product/1/hj2KIUF79oXkDwdnc9sS.png','<p>Beryl Cook is one of Britain&rsquo;s most talented and amusing artists .Beryl&rsquo;s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child&rsquo;s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named &lsquo;Hangover&rsquo; by Beryl&rsquo;s husband and</p>\r\n\r\n<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less</p>',1,5,'2021-01-13 09:12:37','2021-01-14 08:16:06','product4.png',NULL,1,1,4,'<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>','room-flash-light',0,1,1),(9,'Charging Car','46900','/storage/product/1/dX3f0qhAJa5eFrk12NOU.jpg','<p>Beryl Cook is one of Britain&rsquo;s most talented and amusing artists .Beryl&rsquo;s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child&rsquo;s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named &lsquo;Hangover&rsquo; by Beryl&rsquo;s husband and</p>\r\n\r\n<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less</p>',2,3,'2021-01-14 01:10:53','2021-01-21 07:17:34','50_Dam_om_du_tiec_duoi_ca_mau_den_c4117.jpg',NULL,1,1,1,'<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>','charging-car',35,1,1),(10,'Áo bông','25000','/storage/product/2/YfgX3Jy6u13smhVgD3an.png','<p>Beryl Cook is one of Britain&rsquo;s most talented and amusing artists .Beryl&rsquo;s pictures feature women of all shapes and sizes enjoying themselves .Born between the two world wars, Beryl Cook eventually left Kendrick School in Reading at the age of 15, where she went to secretarial school and then into an insurance office. After moving to London and then Hampton, she eventually married her next door neighbour from Reading, John Cook. He was an officer in the Merchant Navy and after he left the sea in 1956, they bought a pub for a year before John took a job in Southern Rhodesia with a motor company. Beryl bought their young son a box of watercolours, and when showing him how to use it, she decided that she herself quite enjoyed painting. John subsequently bought her a child&rsquo;s painting set for her birthday and it was with this that she produced her first significant work, a half-length portrait of a dark-skinned lady with a vacant expression and large drooping breasts. It was aptly named &lsquo;Hangover&rsquo; by Beryl&rsquo;s husband and</p>\r\n\r\n<p>It is often frustrating to attempt to plan meals that are designed for one. Despite this fact, we are seeing more and more recipe books and Internet websites that are dedicated to the act of cooking for one. Divorce and the death of spouses or grown children leaving for college are all reasons that someone accustomed to cooking for more than one would suddenly need to learn how to adjust all the cooking practices utilized before into a streamlined plan of cooking that is more efficient for one person creating less</p>',2,3,'2021-01-14 03:33:50','2021-01-21 07:17:25','product5.png',NULL,1,1,1,'<p>Mill Oil is an innovative oil filled radiator with the most modern technology. If you are looking for something that can make your interior look awesome, and at the same time give you the pleasant warm feeling during the winter.</p>','ao-bong',50,1,1),(11,'CHOÀNG NGẮN DẬP LI','840000','/storage/product/1/5tzespOn8deDplvT3uDy.jpg','<p>Sản phẩm nằm trong BST mới Miss Vintage của Emwear. Mẫu cho&agrave;ng ngắn mềm mại, nữ t&iacute;nh với chi tiết dập ly mới lạ ở cổ tay mang đến cho c&aacute;c n&agrave;ng vẻ quyến rũ, sang trọng.<br />\r\n<br />\r\nThe product is in the new Miss Vintage collection of Emwear. A soft, feminine short robe with novel pleated detail on the wrist gives her a seductive and luxurious look.</p>',2,3,'2021-01-15 01:05:58','2021-01-21 07:17:17','anh4.jpg',NULL,1,1,1,'<p>Sản phẩm nằm trong BST mới Miss Vintage của Emwear. Mẫu cho&agrave;ng ngắn mềm mại, nữ t&iacute;nh với chi tiết dập ly mới lạ ở cổ tay mang đến cho c&aacute;c n&agrave;ng vẻ quyến rũ, sang trọng.<br />\r\n<br />\r\nThe product is in the new Miss Vintage collection of Emwear. A soft, feminine short robe with novel pleated detail on the wrist gives her a seductive and luxurious look.</p>','choang-ngan-dap-li',30,1,1),(12,'VÁY BÈO CỔ REN HOA','990000','/storage/product/1/7MPfi7BbJWdaj6Pd87WF.jpg','<p>Sản phẩm nằm trong BST Miss Vintage của Emwear. Chi tiết b&egrave;o nh&uacute;n ở phần cổ phối c&ugrave;ng ren l&agrave; điểm nhấn, t&ocirc;n l&ecirc;n vẻ cổ điển quyến rũ cho c&aacute;c qu&yacute; c&ocirc;</p>\r\n\r\n<p>The product is in the Miss Vintage collection of Emwear. The details of the ruffles in the neck with lace are the highlight of the glamorous classic for ladies</p>',2,3,'2021-01-15 01:07:10','2021-01-21 07:17:09','anh4.jpg',NULL,1,1,1,'<p>Sản phẩm nằm trong BST Miss Vintage của Emwear. Chi tiết b&egrave;o nh&uacute;n ở phần cổ phối c&ugrave;ng ren l&agrave; điểm nhấn, t&ocirc;n l&ecirc;n vẻ cổ điển quyến rũ cho c&aacute;c qu&yacute; c&ocirc;</p>\r\n\r\n<p>The product is in the Miss Vintage collection of Emwear. The details of the ruffles in the neck with lace are the highlight of the glamorous classic for ladies</p>','vay-beo-co-ren-hoa',15,2,1),(13,'ÁO CỔ ĐỔ SÁT NÁCH','469000','/storage/product/1/EIDpnqVPLpsc78Tuwmpb.jpg','<p>Mẫu &aacute;o cổ đổ nằm trong bộ sưu tập Modern You của Emchic<br />\r\nThiết kế cổ đổ kh&ocirc;ng bao giờ l&agrave; hết hot, mỗi mẫu biến tấu 1 ch&uacute;t lại ra được những thiết kế ho&agrave;n to&agrave;n mới, nhưng vẫn mang lại sự sang trọng, thanh lịch v&agrave; hiện đại cho người mặc.<br />\r\nMẫu &aacute;o cổ đổ s&aacute;t n&aacute;ch dễ d&agrave;ng kết hợp với c&aacute;c loại quần v&agrave; ch&acirc;n v&aacute;y.&nbsp;<br />\r\nTh&iacute;ch hợp để mang đi l&agrave;m, đi dạo phố c&ugrave;ng bạn b&egrave; hay cả những chuyến du lịch đấy.&nbsp;<br />\r\n&Aacute;o freesize, vừa với size S v&agrave; M của bảng size Emchic nh&eacute;.</p>',2,3,'2021-01-15 01:07:52','2021-01-21 07:17:02','50_Dam_om_du_tiec_duoi_ca_mau_den_c4117.jpg',NULL,1,1,4,'<p>Mẫu &aacute;o cổ đổ nằm trong bộ sưu tập Modern You của Emchic<br />\r\nThiết kế cổ đổ kh&ocirc;ng bao giờ l&agrave; hết hot, mỗi mẫu biến tấu 1 ch&uacute;t lại ra được những thiết kế ho&agrave;n to&agrave;n mới, nhưng vẫn mang lại sự sang trọng, thanh lịch v&agrave; hiện đại cho người mặc.<br />\r\nMẫu &aacute;o cổ đổ s&aacute;t n&aacute;ch dễ d&agrave;ng kết hợp với c&aacute;c loại quần v&agrave; ch&acirc;n v&aacute;y.&nbsp;<br />\r\nTh&iacute;ch hợp để mang đi l&agrave;m, đi dạo phố c&ugrave;ng bạn b&egrave; hay cả những chuyến du lịch đấy.&nbsp;<br />\r\n&Aacute;o freesize, vừa với size S v&agrave; M của bảng size Emchic nh&eacute;.</p>','ao-co-do-sat-nach',20,2,1);
/*!40000 ALTER TABLE `products` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `role_user`
--

DROP TABLE IF EXISTS `role_user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `role_user` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_id` int NOT NULL,
  `role_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `role_user`
--

LOCK TABLES `role_user` WRITE;
/*!40000 ALTER TABLE `role_user` DISABLE KEYS */;
INSERT INTO `role_user` VALUES (1,1,1,'2021-01-05 21:29:46','2021-01-05 21:29:46'),(2,2,4,'2021-01-13 07:59:04','2021-01-13 07:59:04');
/*!40000 ALTER TABLE `role_user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `roles` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `roles`
--

LOCK TABLES `roles` WRITE;
/*!40000 ALTER TABLE `roles` DISABLE KEYS */;
INSERT INTO `roles` VALUES (1,'Admin','Quyền quản trị hệ thống','2021-01-05 21:27:15','2021-01-05 21:27:15'),(2,'Developer','Phát triển hệ thống','2021-01-06 23:31:58','2021-01-06 23:31:58'),(3,'Guest','Khách hàng','2021-01-06 23:32:25','2021-01-06 23:32:25'),(4,'User','user login web','2021-01-13 07:58:08','2021-01-13 07:58:08');
/*!40000 ALTER TABLE `roles` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `settings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `config_key` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `config_value` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `settings`
--

LOCK TABLES `settings` WRITE;
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` VALUES (1,'phone_contact','0945195563','2021-01-06 23:33:42','2021-01-06 23:33:42','Text');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shippings`
--

DROP TABLE IF EXISTS `shippings`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shippings` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shippings`
--

LOCK TABLES `shippings` WRITE;
/*!40000 ALTER TABLE `shippings` DISABLE KEYS */;
INSERT INTO `shippings` VALUES (1,1,'Nguyen Ba Nam','Cổ Nhuế','namnguyenba6298@gmail.com','0945195563','Giao hàng','2021-01-16 01:49:35','2021-01-16 01:49:35');
/*!40000 ALTER TABLE `shippings` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `shops`
--

DROP TABLE IF EXISTS `shops`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `shops` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `shipping_id` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `shops_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `shops`
--

LOCK TABLES `shops` WRITE;
/*!40000 ALTER TABLE `shops` DISABLE KEYS */;
INSERT INTO `shops` VALUES (1,'Nguyen Ba Nam','namnguyenba6298@gmail.com',NULL,'$2y$10$dVZ/hZXP0SQaQ80gpOOvvelGaG2sMD9VE.Yb6/4gcUdKPB/SK/ToC','1HpfDGpS8scWy6jXIPpYCDLbgCW7VwxULDVibljHOTAfmz2cXwMIjXgZv2N3','2021-01-14 07:21:11','2021-01-14 07:21:11',1);
/*!40000 ALTER TABLE `shops` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `sliders`
--

DROP TABLE IF EXISTS `sliders`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `sliders` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_path` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `sliders`
--

LOCK TABLES `sliders` WRITE;
/*!40000 ALTER TABLE `sliders` DISABLE KEYS */;
/*!40000 ALTER TABLE `sliders` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `tags`
--

DROP TABLE IF EXISTS `tags`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `tags` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `tags`
--

LOCK TABLES `tags` WRITE;
/*!40000 ALTER TABLE `tags` DISABLE KEYS */;
INSERT INTO `tags` VALUES (1,'Thời trang nam','thoi-trang-nam','2021-01-06 23:34:09','2021-01-06 23:34:09'),(2,'mùa đông','mua-dong','2021-01-06 23:34:17','2021-01-06 23:34:17'),(3,'mùa hè','mua-he','2021-01-06 23:34:22','2021-01-06 23:34:22'),(4,'balo','balo','2021-01-06 23:34:26','2021-01-06 23:34:26');
/*!40000 ALTER TABLE `tags` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `transactions`
--

DROP TABLE IF EXISTS `transactions`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `transactions` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `customer_id` int NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `total_money` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint NOT NULL DEFAULT '1',
  `type` tinyint NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `transactions_customer_id_index` (`customer_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `transactions`
--

LOCK TABLES `transactions` WRITE;
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` VALUES (3,1,'Nguyen Ba Nam','2887186','Cổ Nhuế','namnguyenba6298@gmail.com','0945195563','Hàng mới nhất',1,1,'2021-01-21 04:27:59','2021-01-21 04:27:59'),(4,1,'Nguyen Ba Nam','1228867','Cổ Nhuế','namnguyenba6298@gmail.com','0945195563','Hàng mới nhất',1,1,'2021-01-21 07:27:03','2021-01-21 07:27:03');
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `users`
--

LOCK TABLES `users` WRITE;
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` VALUES (1,'Nguyen Nam','admin@admin.com',NULL,'$2y$10$QGAKz3Bn5Qu/icVLPvOApuRMOrCAWVHFHZ4nPZaItTtaRySFtF.W2','6L3Ufda5lnT17JitX11WapW7EkOweupJEcXIk24cJdlKaGt5M3RkdsZuiLed',NULL,'2021-01-05 21:29:46'),(2,'Nguyễn Bá Nam','namnguyenba6298@gmail.com',NULL,'$2y$10$j6Un0loFXKLVQ2/cnZmgkuxAzx1Vr1WaBXmsdG1aaUc3rXpRWqdqK','KfEettTP0rqGNJZL80fes5Fvo32ddgffN1so0CBGj2vHT4JcunbVeEcsO4uv','2021-01-13 07:59:04','2021-01-13 07:59:04');
/*!40000 ALTER TABLE `users` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-01-22 14:55:38
