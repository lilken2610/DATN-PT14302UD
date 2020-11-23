-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 23, 2020 lúc 07:11 AM
-- Phiên bản máy phục vụ: 10.4.14-MariaDB
-- Phiên bản PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `sneaker`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brands`
--

CREATE TABLE `brands` (
  `id_brand` int(11) NOT NULL,
  `name_brand` varchar(255) NOT NULL,
  `slug_brand` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `brands`
--

INSERT INTO `brands` (`id_brand`, `name_brand`, `slug_brand`, `created_at`, `updated_at`) VALUES
(3, 'Gang Shit', 'gang-shit', '2020-11-22 11:44:18', '2020-11-22 04:50:26'),
(4, 'Lil pump', 'lil-pump', '2020-11-22 12:20:38', '2020-11-22 12:20:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slug_cat` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_cat`, `name_cat`, `slug_cat`, `created_at`, `updated_at`) VALUES
(126, 'Người già', 'nguoi-gia', '2020-11-23 02:28:00', '2020-11-23 02:28:00'),
(127, 'Người trẻ', 'nguoi-tre', '2020-11-23 02:28:06', '2020-11-23 02:28:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `fullname` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `content` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `contact`
--

INSERT INTO `contact` (`id_contact`, `fullname`, `email`, `title`, `content`, `phone`, `updated_at`, `created_at`) VALUES
(1, 'Tôi là admin', 'parksaming@gmail.com', 'Column with drilldown', 'ádasdsadsa', 21312312, '2020-03-13 14:00:29', '2020-03-13 14:00:29'),
(2, 'Tôi là admin', 'daovanchieu77@gmail.com', 'Column with drilldown', 'ádsadsadas', 123123, '2020-03-13 14:14:03', '2020-03-13 14:14:03'),
(3, 'Tôi là admin', 'parksaming@gmail.com', '123123123123', '2sadasdasdas', 123123, '2020-03-13 14:14:26', '2020-03-13 14:14:26');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gift_code`
--

CREATE TABLE `gift_code` (
  `id_code` int(11) NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `value` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_day` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `end_day` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `gift_code`
--

INSERT INTO `gift_code` (`id_code`, `code`, `value`, `qty`, `status`, `created_day`, `end_day`) VALUES
(2, 'FREESHIP', 5, 1, 1, '2020-03-11 07:40:55', '2020-02-28 17:00:00'),
(3, 'NOGIFT', 0, 7, 1, '2020-02-24 10:11:51', '2020-02-23 07:53:31');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `level`
--

CREATE TABLE `level` (
  `id_level` int(11) NOT NULL,
  `level` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `level`
--

INSERT INTO `level` (`id_level`, `level`) VALUES
(1, 'admin'),
(2, 'mod'),
(3, 'user');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id_new` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `preview` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `detail` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_ad` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id_new`, `title`, `preview`, `detail`, `picture`, `created_ad`, `updated_at`) VALUES
(2, 'Fashionista Việt đua nhau sống “ngược” theo trào lưu “ChucksFirst? Bạn dám không?”', 'Trước lời thách thức của Kaylee và Brian, giới trẻ Việt Nam nói chung hay còn được gọi là gen Z hiện nay và nhất là các đầu giày cũng như các fashionista/model mới nổi nói riêng đã đáp trả tích cực: #ChucksFirst?! Tôi dám!', '<p>Trước lời th&aacute;ch thức của Kaylee v&agrave; Brian, giới trẻ Việt Nam n&oacute;i chung hay c&ograve;n được gọi l&agrave; gen Z hiện nay v&agrave; nhất l&agrave; c&aacute;c đầu gi&agrave;y cũng như c&aacute;c fashionista/model mới nổi n&oacute;i ri&ecirc;ng đ&atilde; đ&aacute;p trả t&iacute;ch cực: #ChucksFirst?! T&ocirc;i d&aacute;m!</p>', 'msZICSetDHMvBgxjU7XPeNOXE5Q1zCo0AsfXnfrk.jpeg', '2020-02-13 05:56:18', '2020-02-13 17:00:00'),
(4, 'Đế giày Converse có thiết kế rất đặc biệt, nhưng lý do thì chắc chắn bạn không tưởng tượng ra', 'Nếu chú ý, bạn sẽ thấy đế giày Converse có một lớp nỉ cao su sọc mờ, sần sùi. Nó để làm gì? Chống trơn trượt? Ồ không đâu.', '<p>Nếu ch&uacute; &yacute;, bạn sẽ thấy đế gi&agrave;y Converse c&oacute; một lớp nỉ cao su sọc mờ, sần s&ugrave;i. N&oacute; để l&agrave;m g&igrave;? Chống trơn trượt? Ồ kh&ocirc;ng đ&acirc;u.</p>', '87cFcPPSylMugwMNI7T0KhxMSXVuJ3pTZAIH9450.jpeg', '2020-02-13 06:25:03', '2020-02-12 23:51:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `pay`
--

CREATE TABLE `pay` (
  `id_pay` int(11) NOT NULL,
  `pay` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `pay`
--

INSERT INTO `pay` (`id_pay`, `pay`) VALUES
(1, 'Thanh Toán Khi Nhận Hàng'),
(2, 'Thanh Toán PayPal');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id_product` int(11) NOT NULL,
  `name_product` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `slug_product` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `preview` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_cat` int(11) NOT NULL,
  `id_brand` int(11) NOT NULL,
  `hot_pay` int(11) DEFAULT NULL,
  `pro_rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `slug_product`, `qty`, `price`, `sale`, `preview`, `description`, `images`, `id_cat`, `id_brand`, `hot_pay`, `pro_rating`, `created_at`, `updated_at`) VALUES
(73, 'Jordan IV', 'jordan-iv-1606105105', 1, 150000, 0, 'idcatidcatidcatidcatidcatidcatidcatidcat', '<p>idcatidcatidcatidcatidcatidcatidcatidcatidcatidcat</p>', '[\"47939_01.jpg_e572b21672b74babb93e7dc447f66df8_master.jpeg\",\"408452-425_master.jpg\"]', 127, 4, NULL, NULL, '2020-11-23 04:18:25', '2020-11-22 21:18:25'),
(74, 'Nike Air Jordan 4 Retro', 'nike-air-jordan-4-retro-1606105087', 2, 150000, 10, 'id_catid_catid_catid_catid_catid_catid_catid_catid_cat', '<pre>\r\n<samp><samp>id_cat</samp></samp></pre>\r\n\r\n<pre>\r\n<samp><samp>id_cat</samp></samp></pre>\r\n\r\n<pre>\r\n<samp><samp>id_cat</samp></samp></pre>\r\n\r\n<pre>\r\n<samp><samp>id_cat</samp></samp></pre>\r\n\r\n<pre>\r\n<samp><samp>id_cat</samp></samp></pre>', '[\"2d0abf1e81efe5f2a962fe7824aebda1.jpg\",\"3fce3d09-08f5-41_3_normal_dump-of-my-favorite-snoots-to-boop@2x.jpg\"]', 126, 3, NULL, NULL, '2020-11-23 04:18:07', '2020-11-22 21:18:07'),
(75, 'Nike Air Jordan 4', 'nike-air-jordan-4-1606106925', 1, 150000, 0, 'name_productname_productname_product', '<p>name_productname_productname_productname_product</p>', '[\"air-jordan-iv-dunk-from-above-5-760x507_master.jpg\",\"air-jordan-iv-dunk-from-above-8-760x507_master.jpg\",\"photo-1_master.jpg\"]', 126, 3, NULL, NULL, '2020-11-23 04:48:45', '2020-11-22 21:48:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_size`
--

CREATE TABLE `product_size` (
  `id` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_size` int(11) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `product_size`
--

INSERT INTO `product_size` (`id`, `id_product`, `id_size`, `qty`) VALUES
(23, 52, 2, 14),
(26, 54, 4, 24),
(27, 55, 1, 10),
(28, 55, 2, 10),
(29, 55, 3, 10),
(33, 57, 2, 12),
(34, 57, 3, 15),
(35, 58, 1, 12),
(36, 58, 3, 15),
(37, 59, 1, 14),
(38, 59, 2, 12),
(39, 60, 3, 12),
(40, 60, 4, 11),
(41, 60, 5, 5),
(42, 61, 1, 25),
(43, 61, 2, 4),
(44, 62, 1, 12),
(45, 62, 2, 11),
(46, 63, 2, 8),
(47, 64, 4, 5),
(48, 64, 5, 15),
(49, 65, 1, 5),
(50, 65, 2, 15),
(51, 66, 1, 10),
(52, 66, 2, 12),
(53, 67, 1, 10),
(54, 68, 1, 10),
(55, 69, 1, 9),
(56, 70, 1, 1),
(57, 71, 1, 1),
(58, 72, 1, 1),
(59, 72, 2, 1),
(60, 73, 1, 1),
(61, 74, 1, 1),
(62, 74, 2, 1),
(63, 75, 1, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_product` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `rating`
--

INSERT INTO `rating` (`id_rating`, `rating`, `comment`, `id_product`, `id_user`, `created_at`, `updated_at`) VALUES
(3, 3, 'Tốt', 58, 3, '2020-02-26 13:48:30', '2020-02-26 13:48:30'),
(4, 3, 'sdasd', 58, 3, '2020-02-26 13:54:43', '2020-02-26 13:54:43'),
(6, 3, '123123', 66, 5, '2020-02-26 14:25:36', '2020-02-26 14:25:36'),
(7, 3, 'rádasdas', 66, 5, '2020-02-26 14:26:06', '2020-02-26 14:26:06'),
(8, 3, 'rádasdas', 66, 5, '2020-02-26 14:30:50', '2020-02-26 14:30:50'),
(9, 5, 'ádasdsa', 66, 5, '2020-02-26 14:31:30', '2020-02-26 14:31:30'),
(10, 4, 'Sản phẩm này rất tốt', 55, 6, '2020-02-27 06:10:03', '2020-02-27 06:10:03'),
(11, 5, 'ádsa', 55, 6, '2020-02-27 06:16:58', '2020-02-27 06:16:58'),
(12, 4, 'sdasd', 55, 6, '2020-02-27 06:19:10', '2020-02-27 06:19:10'),
(13, 4, 'sdsad', 55, 6, '2020-02-27 06:20:10', '2020-02-27 06:20:10'),
(14, 5, 'sad', 55, 6, '2020-02-27 06:20:40', '2020-02-27 06:20:40'),
(15, 5, 'sad', 55, 6, '2020-02-27 06:20:41', '2020-02-27 06:20:41'),
(16, 5, 'sadsd', 55, 6, '2020-02-27 06:20:44', '2020-02-27 06:20:44'),
(17, 5, 'ssd', 55, 6, '2020-02-27 06:21:35', '2020-02-27 06:21:35'),
(18, 3, 'sadas', 55, 6, '2020-02-27 06:22:23', '2020-02-27 06:22:23'),
(19, 4, 'sdasd', 55, 6, '2020-02-27 06:22:54', '2020-02-27 06:22:54'),
(20, 4, 'sdas', 55, 6, '2020-02-27 06:23:18', '2020-02-27 06:23:18'),
(21, 3, 'sdas', 55, 6, '2020-02-27 06:24:27', '2020-02-27 06:24:27'),
(22, 4, 'dsa', 55, 6, '2020-02-27 06:24:47', '2020-02-27 06:24:47'),
(23, 5, 'sd', 55, 6, '2020-02-27 06:25:09', '2020-02-27 06:25:09'),
(24, 5, 'sad', 55, 6, '2020-02-27 06:26:04', '2020-02-27 06:26:04'),
(25, 5, 'sadasdas', 55, 6, '2020-02-27 06:33:21', '2020-02-27 06:33:21'),
(26, 2, 'ádasdas', 55, 6, '2020-02-27 06:33:41', '2020-02-27 06:33:41'),
(27, 3, 'sd', 55, 6, '2020-02-27 06:35:25', '2020-02-27 06:35:25'),
(28, 3, 'saddasd', 55, 6, '2020-02-27 06:38:46', '2020-02-27 06:38:46'),
(29, 4, 'hay', 58, 6, '2020-02-27 06:44:48', '2020-02-27 06:44:48'),
(30, 5, 'Hay', 67, 6, '2020-02-27 06:47:07', '2020-02-27 06:47:07'),
(31, 3, 'rất tốt', 64, 3, '2020-02-28 02:31:10', '2020-02-28 02:31:10');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `size`
--

CREATE TABLE `size` (
  `id_size` int(11) NOT NULL,
  `size` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `size`
--

INSERT INTO `size` (`id_size`, `size`) VALUES
(1, 28),
(2, 29),
(3, 30),
(4, 31),
(5, 32);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id_slide` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `position_text` varchar(50) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `content` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `img` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id_slide`, `title`, `position_text`, `content`, `img`) VALUES
(2, 'Giày converse classic 1', 'left', 'Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử Converse 100 năm, và đang không ngừng phát triển lớn mạnh.', 'sL8JKyAB6kMbac8DubKyQ0nAKKWL5yZNxKrjSYJO.jpeg'),
(3, 'Giày converse classic 2', 'right', 'Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử Converse 100 năm, và đang không ngừng phát triển lớn mạnh.', 'oN50xHkvVFvtaFWLv2iTcC7KSy9sSiDIXVZDlzew.jpeg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction`
--

CREATE TABLE `transaction` (
  `id_transaction` int(11) NOT NULL,
  `totalPrice` int(11) NOT NULL,
  `tax` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  `id_pay` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transaction_detail`
--

CREATE TABLE `transaction_detail` (
  `id_transaction_dt` int(11) NOT NULL,
  `id_product` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `totalproduct` int(11) NOT NULL,
  `id_transaction` int(11) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `createad_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `fullname` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `address` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_level` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `orders` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `email_code` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `address`, `phone`, `id_level`, `avatar`, `orders`, `active`, `email_code`, `created_at`, `updated_at`) VALUES
(3, 'admin', 'Tôi là admin', 'climax@gmail.com', '$2y$10$yfyx8uT0Tp6t2SbyP2lOJ.28jkj.Ha0RUSrC0GH1N5UWxZwUwenV6', 'adc', '01236', 1, 'admin-1605945814.jpg', 1, 1, '', '2020-02-14 05:51:07', '2020-11-21 01:03:34'),
(5, 'user001', 'Tôi là user001', 'user001@gmail.com', '$2y$10$/y/MHgFjwTDhXSbPAYND4ejOrJXZADCK6n.EnOL8hXtiPyHouM63O', 'ABCD', '123123', 3, NULL, 13, 1, '', '2020-02-20 13:53:07', '2020-02-20 13:53:07'),
(6, 'user002', 'User 002', 'user002@gmail.com', '$2y$10$TVGgoLXt7D.fKs.gN.31EOT6BGUq5XuAlmu/y1Cz6y3.ogq40pA2m', 'abc', '12313', 3, '', 5, 1, '', '2020-02-19 03:55:39', '2020-02-19 03:55:39'),
(8, 'user003', 'Tôi là user003', 'lynguyen.pna@gmail.com', '$2y$10$BJ3AxseCgliexDAK8r9b1OHf9Gy8.PNy0D3DcmtVCiVlZ1G3JFmty', 'ẤCDSA', '123132', 3, 'etr0Bo5KWKIo7cUNUgYn6fllBM0NWt1F8iJ8E8Mk.jpeg', 7, 1, '', '2020-02-20 13:53:33', '2020-03-10 20:57:26'),
(9, 'user004', 'Tôi là user004', 'user004@gmail.com', '$2y$10$XWHs5F7WOMn7KvhFrSQwi.hcVZsUujiZ.IafMXkr2VHPYLNytsWP6', 'ádasdasdasdsa', '123132', 3, NULL, 7, 1, '', '2020-02-20 13:54:18', '2020-02-20 13:54:18'),
(19, 'vanchieu77', 'Đào Văn Chiểu', 'daovanchieu77@gmail.com', '$2y$10$yAuKpnTklU3kNbQMwQTJme5L8lGOpMVftXCbJen580t2I1VmaPaQ6', 'avc', '123123123', 3, NULL, 0, 1, '158391233515e68958fa3691', '2020-03-11 00:38:55', '2020-03-11 00:39:15'),
(20, 'user2020', 'Lê Trung Thịnh', 'lilken2610@gmail.com', '$2y$10$yfyx8uT0Tp6t2SbyP2lOJ.28jkj.Ha0RUSrC0GH1N5UWxZwUwenV6', 'Duy Thanh', '0336751070', 3, NULL, 0, 1, '160585247415fb75d3a69480', '2020-11-19 23:07:54', '2020-11-19 23:08:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id_brand`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id_cat`);

--
-- Chỉ mục cho bảng `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Chỉ mục cho bảng `gift_code`
--
ALTER TABLE `gift_code`
  ADD PRIMARY KEY (`id_code`);

--
-- Chỉ mục cho bảng `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id_new`);

--
-- Chỉ mục cho bảng `pay`
--
ALTER TABLE `pay`
  ADD PRIMARY KEY (`id_pay`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id_product`);

--
-- Chỉ mục cho bảng `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`);

--
-- Chỉ mục cho bảng `size`
--
ALTER TABLE `size`
  ADD PRIMARY KEY (`id_size`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id_slide`);

--
-- Chỉ mục cho bảng `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`id_transaction`);

--
-- Chỉ mục cho bảng `transaction_detail`
--
ALTER TABLE `transaction_detail`
  ADD PRIMARY KEY (`id_transaction_dt`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `brands`
--
ALTER TABLE `brands`
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `gift_code`
--
ALTER TABLE `gift_code`
  MODIFY `id_code` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id_new` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `pay`
--
ALTER TABLE `pay`
  MODIFY `id_pay` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `size`
--
ALTER TABLE `size`
  MODIFY `id_size` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id_transaction_dt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
