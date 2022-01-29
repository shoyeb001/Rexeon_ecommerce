-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 29, 2022 at 05:03 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerceapp2`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `categories` int(11) DEFAULT NULL,
  `brands` int(11) DEFAULT NULL,
  `sliders` int(11) DEFAULT NULL,
  `products` int(11) DEFAULT NULL,
  `stocks` int(11) DEFAULT NULL,
  `orders` int(11) DEFAULT NULL,
  `returnorders` int(11) DEFAULT NULL,
  `allusers` int(11) DEFAULT NULL,
  `settings` int(11) DEFAULT NULL,
  `manage_admins` int(11) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `type`, `categories`, `brands`, `sliders`, `products`, `stocks`, `orders`, `returnorders`, `allusers`, `settings`, `manage_admins`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Admin2', 'admin@admin.com', '', '2021-10-11 22:39:00', 'admin', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, NULL, NULL, 'upload/admin_images/20211104070852367870.jpg', '2021-07-06 18:30:00', '2021-11-04 01:54:47'),
(2, 'Rahul Dey', 'rahul@gmail.com', '9756203598', NULL, 'rahul1234', 2, 1, 1, 1, NULL, NULL, NULL, 0, 0, NULL, NULL, NULL, NULL, 'upload/admin_images/61810ed370c5a.jpeg', '2021-11-02 05:52:03', '2021-11-02 05:52:03'),
(3, 'Sk Shoyeb', 'shoyebjio3398@gmail.com', '97492203', NULL, 'sk##3398', 2, NULL, 1, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'upload/admin_images/61e81a42ef9c5.jpg', '2022-01-19 08:33:47', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `brand_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `brand_name`, `brand_slug`, `brand_image`, `created_at`, `updated_at`) VALUES
(2, 'Huawai', 'huawai', 'upload/brand/616fe4941c222.png', NULL, '2021-10-20 04:37:06'),
(3, 'sumsung', 'sumsung', 'upload/brand/616fec6752041.png', NULL, NULL),
(4, 'appleX', 'applex', 'upload/brand/616fec808ed00.png', NULL, '2022-01-25 00:03:51'),
(5, 'oppo f9', 'oppo-f9', 'upload/brand/617274f61d164.png', NULL, '2021-10-22 02:53:18');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_icon` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `category_image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category_name`, `category_slug`, `category_icon`, `category_image`, `created_at`, `updated_at`) VALUES
(4, 'Electronic', 'electronic', 'fa fa-phone', 'upload/category/electronics.png', NULL, '2021-10-31 07:21:16'),
(5, 'clothing', 'clothing', 'fa fa-shirtsinbulk', 'upload/category/clothing.png', NULL, '2021-10-22 02:39:35'),
(7, 'Home & Garden', 'home-&-garden', 'fa fa-home', 'upload/category/garden.png', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `connection` text COLLATE utf8_unicode_ci NOT NULL,
  `queue` text COLLATE utf8_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2021_02_02_212221_create_admins_table', 1),
(6, '2021_02_09_111701_create_categories_table', 2),
(7, '2021_02_09_121910_create_sub_categories_table', 3),
(8, '2021_02_16_183944_create_sub_sub_categories_table', 4),
(9, '2021_02_20_204829_create_sliders_table', 5),
(10, '2021_02_09_054528_create_brands_table', 6),
(11, '2021_02_16_204006_create_products_table', 7),
(12, '2021_10_21_082234_create_products_table', 8),
(13, '2021_02_16_205349_create_multi_imgs_table', 9),
(14, '2021_03_24_223430_create_site_settings_table', 10),
(15, '2021_03_26_194141_create_seos_table', 11),
(16, '2021_03_14_203654_create_orders_table', 12),
(17, '2021_03_14_203901_create_order_items_table', 13),
(18, '2021_03_02_194613_create_wishlists_table', 14),
(19, '2021_12_05_154029_create_referitems_table', 15),
(20, '2021_12_28_162438_create_pickupcenter_table', 16);

-- --------------------------------------------------------

--
-- Table structure for table `multi_imgs`
--

CREATE TABLE `multi_imgs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` int(11) NOT NULL,
  `photo_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `multi_imgs`
--

INSERT INTO `multi_imgs` (`id`, `product_id`, `photo_name`, `created_at`, `updated_at`) VALUES
(4, 3, 'upload/products/multi-image/617128a377729.jpeg', '2021-10-21 03:15:23', NULL),
(5, 3, 'upload/products/multi-image/61713eb94e338.jpeg', '2021-10-21 03:15:24', '2021-10-21 04:49:37'),
(6, 4, 'upload/products/multi-image/617275e8edb40.jpeg', '2021-10-22 02:57:21', NULL),
(7, 4, 'upload/products/multi-image/617275e97cb16.jpeg', '2021-10-22 02:57:21', NULL),
(8, 5, 'upload/products/multi-image/61ef8c990baeb.jpg', '2021-10-22 03:16:04', '2022-01-25 00:07:29'),
(9, 6, 'upload/products/multi-image/6172dd04b626d.jpg', '2021-10-22 10:17:17', NULL),
(10, 6, 'upload/products/multi-image/6172dd05311d3.jpg', '2021-10-22 10:17:17', NULL),
(11, 7, 'upload/products/multi-image/6172de15094c5.jpeg', '2021-10-22 10:21:49', NULL),
(12, 8, 'upload/products/multi-image/617e933156c8c.jpeg', '2021-10-31 07:29:29', NULL),
(13, 8, 'upload/products/multi-image/617e9332003d0.jpeg', '2021-10-31 07:29:30', NULL),
(14, 8, 'upload/products/multi-image/617e93329baff.jpeg', '2021-10-31 07:29:31', NULL),
(15, 9, 'upload/products/multi-image/61f24f7b4f27a.jpg', '2022-01-27 02:23:31', NULL),
(16, 9, 'upload/products/multi-image/61f24f7bc3bdd.jpg', '2022-01-27 02:23:32', NULL),
(17, 9, 'upload/products/multi-image/61f24f7c2ebae.jpg', '2022-01-27 02:23:32', NULL),
(18, 9, 'upload/products/multi-image/61f24f7c9488e.jpg', '2022-01-27 02:23:32', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `division` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `state` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `post_code` int(11) DEFAULT NULL,
  `notes` text COLLATE utf8_unicode_ci,
  `payment_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `payment_method` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `transaction_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `currency` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `amount` double(8,2) NOT NULL,
  `pickup_center` int(11) NOT NULL,
  `order_number` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `invoice_no` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_date` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_month` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `order_year` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `confirmed_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `processing_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `picked_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `shipped_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `delivered_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cancel_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `return_date` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `return_reason` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `return_order` int(11) DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `division`, `district`, `state`, `name`, `email`, `phone`, `post_code`, `notes`, `payment_type`, `payment_method`, `transaction_id`, `currency`, `amount`, `pickup_center`, `order_number`, `invoice_no`, `order_date`, `order_month`, `order_year`, `confirmed_date`, `processing_date`, `picked_date`, `shipped_date`, `delivered_date`, `cancel_date`, `return_date`, `return_reason`, `return_order`, `status`, `created_at`, `updated_at`) VALUES
(27, 7, 'Puratanchawk', 'Bardhaman', 'WB', 'sk shoyeb', 'sakilak388@gmail.com', '9749220398', 713102, 'tjgytrh bhgurtjg hgfjk hbnj h', 'card_1KKdqLSIW2IngVqu0ImrPuMl', 'Stripe', 'txn_3KKdqNSIW2IngVqu0r0bNVrN', 'inr', 204.00, 1, '61ebafd13fe56', 'EOS23543465', '22 January 2022', 'January', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2022-01-22 01:48:43', NULL),
(28, 11, 'Puratanchawk', 'Bardhaman', 'west bengal', 'Kausik', 'keyditosta@vusra.com', '7121023654', 102301, 'this is notihing', 'card_1KLicbSIW2IngVqunE0KBr3D', 'Stripe', 'txn_3KLicdSIW2IngVqu09ussi1L', 'inr', 57.00, 1, '61ef9a9d4d025', 'EOS75785038', '25 January 2022', 'January', '2022', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'pending', '2022-01-25 01:07:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `price` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `color`, `size`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(26, 27, 8, 'red', 'large', '1', 169.00, '2022-01-22 01:48:50', NULL),
(27, 28, 6, NULL, NULL, '1', 47.00, '2022-01-25 01:07:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pickupcenters`
--

CREATE TABLE `pickupcenters` (
  `id` int(11) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pickupcenters`
--

INSERT INTO `pickupcenters` (`id`, `address`, `phone`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Burdwan, BC Road', '7417415623', 'Sk Shoyeb', '2021-12-29 01:23:11', '2022-01-22 01:28:29'),
(3, 'Dhanbad, 713105', '12346567890', 'Raj Kumar', '2021-12-29 01:52:04', '2022-01-22 01:28:58'),
(4, 'Mumbai, Mandar, 102475', '7567891245', 'Rabi Mathan', '2021-12-29 01:52:25', '2022-01-22 01:29:34'),
(5, 'Nutanganj 713102', '9749220398', 'Sk Shoyeb', '2022-01-22 01:27:19', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) DEFAULT NULL,
  `subsubcategory_id` int(11) DEFAULT NULL,
  `product_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_code` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_tags` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_size` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_color` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `purchase_price` int(11) NOT NULL,
  `selling_price` float NOT NULL,
  `discount_price` float DEFAULT NULL,
  `short_descp` varchar(300) COLLATE utf8_unicode_ci NOT NULL,
  `long_descp` varchar(2000) COLLATE utf8_unicode_ci NOT NULL,
  `product_thambnail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `hot_deals` int(11) DEFAULT NULL,
  `featured` int(11) DEFAULT NULL,
  `special_offer` int(11) DEFAULT NULL,
  `special_deals` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `brand_id`, `category_id`, `subcategory_id`, `subsubcategory_id`, `product_name`, `product_slug`, `product_code`, `product_qty`, `product_tags`, `product_size`, `product_color`, `purchase_price`, `selling_price`, `discount_price`, `short_descp`, `long_descp`, `product_thambnail`, `hot_deals`, `featured`, `special_offer`, `special_deals`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 4, 1, 1, 'man t-shirt', 'man-t-shirt', '1001', '100', 'Lorem,Ipsum,Amet', 'Small,Midium,Large', 'red,Black,Amet', 500, 1000, 750, 'thius hyibgbdf ghgb  gdhh byiherbg ruyfberjhgb jherb fyier ei ug bedruguerihg .', '<p><strong>Long Descriptirdgon</strong></p>\r\n\r\n<p>dfgydrgr erhgdfgb dr hbdf gbdf ghiudffgb nbjkdfbiufrhrgjb&nbsp; rugb ierg hurh gj fierje rgujhe rug erffh ufhierg hfj nsif herug heur g.&nbsp;</p>\r\n\r\n<p>iugiyugger guer ui erhdj bghriuer ui&nbsp; oiruhf hroui o uriu gh r oir hg r hgo erhgsekjfn errdu ru er.&nbsp;</p>', 'upload/products/thambnail/617125fe16e36.jpeg', 1, 1, 1, 1, 1, '2022-01-28 00:51:57', '2022-01-28 00:51:57'),
(3, 2, 5, 3, 2, 'man t-shirt New', 'man-t-shirt-new', '1003', '100', 'Lorem,Ipsum,Amet', 'Small,Midium,Large', 'red,Black,Amet', 600, 800, 670, 'njfnh rt jrt  oihrt digjtg roigjtrg droignrt tijen grtngjndg grtnh hnfh.', '<p><strong>Long Description</strong></p>\r\n\r\n<p>gyerger rhigbsf fb uifbef b ndfgniubggf gbg fghbdfg frrguirt guhbf gdfgbdfgbdfg dfgbrigdf gdbgdff g dfgdfbgjdfg ttgbdgbndfg.</p>', 'upload/products/thambnail/61713d6088231.jpeg', 1, 1, 1, 1, 1, '2022-01-28 00:51:14', '2022-01-28 00:51:14'),
(4, 4, 5, 3, 2, 'man t-shirt', 'man-t-shirt', '1005', '20', 'men,tshirt', 'Small,Midium,Large', 'red,Black,Amet', 400, 600, 510, 'this is man tshirt with various colors.', '<h2><strong>T-shirts for men</strong></h2>\r\n\r\n<p><strong>this is t-shirt for men. This t-shirt has some featuers</strong></p>\r\n\r\n<ol>\r\n	<li><strong>warm</strong></li>\r\n	<li><strong>good looking</strong></li>\r\n</ol>', 'upload/products/thambnail/617275e85095e.jpeg', 1, 1, 1, 1, 1, '2022-01-28 00:50:46', '2022-01-28 00:50:46'),
(5, NULL, 7, 8, NULL, 'Fresh Vegitable Gobi', 'fresh-vegitable-gobi', '2000', '60', 'vegitable', NULL, NULL, 0, 50, 49, 'get fresh vegetable.', '<p>get frewsh vegiatjhg rg hjbdfg dfug hdg dfgbdfg df gudfsbng jdf gd fgjbdfg&nbsp; dshgbkdg bktrsbg kjbdgb dk gbksr trbg bnkjg&nbsp; bntjieru ghse bjk bkjxdgbnguiosrt ng kjst bgjk snetg. jfh ui er hgjt biugb esujg iufd hug dhu jghdf kjg dku jghujd fhgoig oirstrjgoirtjho udlgjk tguoirth uogh roth.&nbsp;</p>', 'upload/products/thambnail/61727a4bafb6e.jpg', 1, 1, NULL, NULL, 1, '2022-01-25 00:06:43', '2022-01-25 00:06:43'),
(6, NULL, 7, 8, NULL, 'Floral Print Buttoned 1KG', 'floral-print-buttoned-1kg', '1010', '30', 'floral,vegitable', NULL, NULL, 30, 50, 47, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p><br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'upload/products/thambnail/6172dd041c9c3.jpg', NULL, 1, NULL, NULL, 1, '2022-01-28 00:50:12', '2022-01-28 00:50:12'),
(7, 3, 4, 4, 14, 'Sumsung 21 Inch Monitor', 'sumsung-21-inch-monitor', '1011', '35', 'monitor,sumsung,desktop', NULL, NULL, 17500, 22000, 19000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<p><br />\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>\r\n\r\n<p>Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 'upload/products/thambnail/61ef8dc4b47b9.jpeg', 1, NULL, 1, NULL, 1, '2022-01-28 00:48:36', '2022-01-28 00:48:36'),
(8, NULL, 4, 7, 9, 'man t-shirt', 'man-t-shirt', '1009', '18', 't-shirt', 'large,small', 'red,Black,Amet', 145, 200, 169, 'this is a t-shirt.', '<p><strong>this is a t-shirt. this is a t-shity.&nbsp;</strong></p>', 'upload/products/thambnail/617e933027d0d.jpeg', 1, 1, NULL, NULL, 1, '2022-01-28 00:49:14', '2022-01-28 00:49:14'),
(9, 3, 5, 3, 3, 'Full T-Shirt', 'full-t-shirt', '1010', '25', 'Lorem,Ipsum,Amet', 'Small,Midium,Large', 'red,Black,Amet', 300, 450, 450, 'this is the best vegitable in this area.', '<p>hjfghdf gjdfh bgdb hdbv uydrbgjndf vghbvnkbnduithdgbxfiygjrkegh uiodg nmcv bgjkb dfiogjdrogj oihrgoiuhdr rhgoirdhgis eruhfisdjg jfdhfkldsjhfoidsg jkdfhgdfngkjfhdb .&nbsp;</p>', 'upload/products/thambnail/61f24f7aaf79e.jpg', 1, NULL, NULL, 1, 1, '2022-01-27 02:23:31', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `referers`
--

CREATE TABLE `referers` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `payment_method` varchar(200) NOT NULL,
  `paytm` varchar(200) DEFAULT NULL,
  `gpay` varchar(200) DEFAULT NULL,
  `ac_no` varchar(200) DEFAULT NULL,
  `ifsc_code` varchar(200) DEFAULT NULL,
  `ac_name` varchar(200) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `referers`
--

INSERT INTO `referers` (`id`, `user_id`, `phone`, `payment_method`, `paytm`, `gpay`, `ac_no`, `ifsc_code`, `ac_name`, `created_at`, `updated_at`) VALUES
(1, 7, '9749220398', 'bank_transfer', NULL, NULL, '123456478552', 'UBI20315UBG', 'SK SHOYEB', '2021-12-09 07:32:32', '2021-12-09 02:02:32'),
(2, 9, '9749220398', 'bank_transfer', NULL, NULL, NULL, NULL, NULL, '2022-01-20 09:05:44', '2022-01-20 09:05:44'),
(3, 11, '1234568034', 'bank_transfer', NULL, NULL, NULL, NULL, NULL, '2022-01-25 01:08:01', '2022-01-25 01:08:01');

-- --------------------------------------------------------

--
-- Table structure for table `referitems`
--

CREATE TABLE `referitems` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `refer_id` int(11) NOT NULL,
  `comission` double(8,2) NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `referitems`
--

INSERT INTO `referitems` (`id`, `refer_id`, `comission`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 16.90, 'paid', '2021-12-06 09:57:20', '2021-12-10 09:11:45'),
(2, 1, 153.00, 'paid', '2021-12-10 08:48:23', '2021-12-10 09:11:45'),
(3, 1, 1900.00, 'paid', '2021-12-14 06:32:56', '2021-12-14 06:36:14'),
(4, 1, 919.60, 'unpaid', '2022-01-20 09:03:52', NULL),
(5, 2, 919.60, 'paid', '2022-01-20 09:13:45', '2022-01-21 00:26:14'),
(6, 2, 919.60, 'paid', '2022-01-20 09:31:13', '2022-01-21 00:26:14'),
(7, 2, 689.70, 'paid', '2022-01-20 09:31:13', '2022-01-21 00:26:14'),
(8, 2, 459.80, 'paid', '2022-01-20 09:31:13', '2022-01-21 00:26:14'),
(9, 2, 919.60, 'paid', '2022-01-20 09:45:51', '2022-01-21 00:26:14'),
(10, 1, 689.70, 'unpaid', '2022-01-20 09:45:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `seos`
--

CREATE TABLE `seos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `meta_title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_author` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_keyword` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `meta_description` text COLLATE utf8_unicode_ci,
  `google_analytics` text COLLATE utf8_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `seos`
--

INSERT INTO `seos` (`id`, `meta_title`, `meta_author`, `meta_keyword`, `meta_description`, `google_analytics`, `created_at`, `updated_at`) VALUES
(1, 'Myshop - Buy goods online from retail', 'MyShopEcommerce', 'ecommerce website, myshop, purchase goods online, purchase online', 'This is an ecommerce website of myshop. Here you can do shopping from any where you want to shop.', NULL, NULL, '2022-01-25 00:28:46');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `logo` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_one` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone_two` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `company_address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `twitter` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `linkedin` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `logo`, `phone_one`, `phone_two`, `email`, `company_name`, `company_address`, `facebook`, `twitter`, `linkedin`, `youtube`, `created_at`, `updated_at`) VALUES
(1, 'upload/logo/61cb35581dcd6.png', '01234567890', '0987654321', 'skemail@gmail.com', 'EShop', 'Puratanchwak', 'facebook.com', 'twitter.com', 'linkedin.com', 'youtube.com', NULL, '2021-12-28 10:33:36');

-- --------------------------------------------------------

--
-- Table structure for table `sliders`
--

CREATE TABLE `sliders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slider_img` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sliders`
--

INSERT INTO `sliders` (`id`, `slider_img`, `title`, `description`, `status`, `created_at`, `updated_at`) VALUES
(3, 'upload/slider/616fd5e21f3b9.jpg', 'slider 1', 'this is slider 1', 1, NULL, '2021-10-21 06:40:44'),
(4, 'upload/slider/61727469cc161.jpg', 'slider 2', 'This is slider 2', 1, NULL, NULL),
(5, 'upload/slider/61727485c6d75.jpg', 'slider 3', 'this is slider 3', 1, NULL, NULL),
(6, 'upload/slider/617274a1518a0.jpg', 'slider 4', 'this is slider 4', 1, NULL, NULL),
(7, 'upload/slider/617274b770889.jpg', 'slider 5', 'this is slider 5', 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subcategory_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `subcategory_name`, `subcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 4, 'Laptop', 'laptop', NULL, '2021-10-22 02:42:55'),
(3, 5, 'Men', 'men', NULL, NULL),
(4, 4, 'desktop', 'desktop', NULL, '2021-10-22 02:43:17'),
(5, 5, 'women', 'women', NULL, NULL),
(6, 5, 'kids', 'kids', NULL, NULL),
(7, 4, 'mobile', 'mobile', NULL, NULL),
(8, 7, 'vegitables', 'vegitables', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sub_sub_categories`
--

CREATE TABLE `sub_sub_categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` int(11) NOT NULL,
  `subcategory_id` int(11) NOT NULL,
  `subsubcategory_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `subsubcategory_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `sub_sub_categories`
--

INSERT INTO `sub_sub_categories` (`id`, `category_id`, `subcategory_id`, `subsubcategory_name`, `subsubcategory_slug`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 'gaming', 'gaming', NULL, '2021-10-22 02:46:43'),
(2, 5, 3, 'tshirt', 'tshirt', NULL, '2021-10-22 02:45:01'),
(3, 5, 3, 'shoes', 'shoes', NULL, '2021-10-22 02:45:27'),
(4, 5, 3, 'sunglass', 'sunglass', NULL, NULL),
(5, 4, 1, 'dell', 'dell', NULL, NULL),
(6, 4, 1, 'hp', 'hp', NULL, NULL),
(7, 4, 4, 'cpu', 'cpu', NULL, NULL),
(8, 4, 4, 'ram', 'ram', NULL, NULL),
(9, 4, 7, 'apple', 'apple', NULL, NULL),
(10, 4, 7, 'samsung', 'samsung', NULL, NULL),
(11, 4, 7, 'lg', 'lg', NULL, NULL),
(12, 4, 4, 'hp', 'hp', NULL, NULL),
(13, 4, 4, 'dell', 'dell', NULL, NULL),
(14, 4, 4, 'monitor', 'monitor', NULL, NULL),
(15, 5, 3, 'jeans', 'jeans', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referer_id` int(11) DEFAULT NULL,
  `is_buyer` text COLLATE utf8_unicode_ci NOT NULL,
  `profile_photo_path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `phone`, `email_verified_at`, `password`, `referer_id`, `is_buyer`, `profile_photo_path`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Sk Shoyeb', 'shoyebjio3398@gmail.com', NULL, '2021-10-11 22:39:00', 'sk##3398', 0, '', NULL, NULL, '2021-07-06 18:30:00', '2021-07-06 18:30:00'),
(7, 'sk shoyeb', 'sakilak388@gmail.com', '97492203986', '2021-10-26 06:15:01', 'sk1234', 0, 'yes', '20211027131852367870.jpg', NULL, '2021-10-26 05:30:34', '2022-01-25 00:27:32'),
(8, 'Coding', '10xcodinghindi@gmail.com', NULL, NULL, '1234', 1, 'no', NULL, NULL, NULL, NULL),
(9, 'Kamla', 'cirzebidre@vusra.com', NULL, '2022-01-19 20:58:13', '1234', 1, 'yes', NULL, NULL, NULL, '2022-01-20 09:01:11'),
(10, 'Vim', 'terturekni@vusra.com', NULL, '2022-01-19 21:11:58', '1234', 2, 'yes', NULL, NULL, NULL, '2022-01-20 09:13:44'),
(11, 'Kausik', 'keyditosta@vusra.com', NULL, '2022-01-25 00:59:46', '1234', NULL, 'yes', NULL, NULL, '2022-01-25 00:58:59', '2022-01-25 01:07:25'),
(12, 'Jaydeep', 'ruydomosti@vusra.com', '7410236589', NULL, '1234', NULL, 'no', NULL, NULL, '2022-01-27 00:06:04', '2022-01-27 00:06:04');

-- --------------------------------------------------------

--
-- Table structure for table `wishlists`
--

CREATE TABLE `wishlists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `wishlists`
--

INSERT INTO `wishlists` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(2, 7, 5, '2021-10-27 02:25:03', NULL),
(3, 7, 6, '2021-10-27 08:36:32', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `pickupcenters`
--
ALTER TABLE `pickupcenters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referers`
--
ALTER TABLE `referers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `referitems`
--
ALTER TABLE `referitems`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `seos`
--
ALTER TABLE `seos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sliders`
--
ALTER TABLE `sliders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `wishlists`
--
ALTER TABLE `wishlists`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `multi_imgs`
--
ALTER TABLE `multi_imgs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pickupcenters`
--
ALTER TABLE `pickupcenters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `referers`
--
ALTER TABLE `referers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `referitems`
--
ALTER TABLE `referitems`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `seos`
--
ALTER TABLE `seos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sliders`
--
ALTER TABLE `sliders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `sub_sub_categories`
--
ALTER TABLE `sub_sub_categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `wishlists`
--
ALTER TABLE `wishlists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
