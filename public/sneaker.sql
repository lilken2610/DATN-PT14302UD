-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2020 lúc 05:47 PM
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
(5, 'ADIDAS', 'adidas', '2020-11-28 02:04:58', '2020-11-28 02:04:58'),
(6, 'BALENCIAGA', 'balenciaga', '2020-11-28 03:11:30', '2020-11-28 03:11:30'),
(7, 'CONVERSE', 'converse', '2020-11-28 03:25:07', '2020-11-28 03:25:07'),
(8, 'NIKE', 'nike', '2020-11-28 05:45:31', '2020-11-28 05:45:31'),
(9, 'VENTO', 'vento', '2020-11-28 05:55:08', '2020-11-28 05:55:08'),
(10, 'VANS', 'vans', '2020-11-28 06:01:50', '2020-11-28 06:01:50');

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
(132, 'Giày thể thao', 'giay-the-thao', '2020-11-28 02:20:36', '2020-11-28 02:20:36'),
(133, 'Sandal', 'sandal', '2020-11-28 05:55:21', '2020-11-28 05:55:21'),
(134, 'Giày đi chơi', 'giay-di-choi', '2020-11-28 06:01:23', '2020-11-28 06:01:23');

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
(2, 'Fashionista Việt đua nhau sống “ngược” theo trào lưu “ChucksFirst? Bạn dám không?”', 'Trước lời thách thức của Kaylee và Brian, giới trẻ Việt Nam nói chung hay còn được gọi là gen Z hiện nay và nhất là các đầu giày cũng như các fashionista/model mới nổi nói riêng đã đáp trả tích cực: #ChucksFirst?! Tôi dám!', '<p>Trước lời th&aacute;ch thức của Kaylee v&agrave; Brian, giới trẻ Việt Nam n&oacute;i chung hay c&ograve;n được gọi l&agrave; gen Z hiện nay v&agrave; nhất l&agrave; c&aacute;c đầu gi&agrave;y cũng như c&aacute;c fashionista/model mới nổi n&oacute;i ri&ecirc;ng đ&atilde; đ&aacute;p trả t&iacute;ch cực: #ChucksFirst?! T&ocirc;i d&aacute;m!</p>', 'Y1atQlo1kN0hCN5R4R4bodm73qi1oxqKunHECAoH.jpeg', '2020-02-13 05:56:18', '2020-11-23 08:30:30'),
(4, 'Đế giày Converse có thiết kế rất đặc biệt, nhưng lý do thì chắc chắn bạn không tưởng tượng ra', 'Nếu chú ý, bạn sẽ thấy đế giày Converse có một lớp nỉ cao su sọc mờ, sần sùi. Nó để làm gì? Chống trơn trượt? Ồ không đâu.', '<p>Nếu ch&uacute; &yacute;, bạn sẽ thấy đế gi&agrave;y Converse c&oacute; một lớp nỉ cao su sọc mờ, sần s&ugrave;i. N&oacute; để l&agrave;m g&igrave;? Chống trơn trượt? Ồ kh&ocirc;ng đ&acirc;u.</p>', '87cFcPPSylMugwMNI7T0KhxMSXVuJ3pTZAIH9450.jpeg', '2020-02-13 06:25:03', '2020-02-12 23:51:51');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expiration_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Đang đổ dữ liệu cho bảng `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `expiration_date`) VALUES
('trungthinh2610@gmail.com', 'VV1v3M0bNwDGhZymRPiOW8RehJtAS6r54XU5IwXbqHHdjkMFH8J8x9p44idNQp1ZHqHzdkfwPlBlNkkM', '2020-11-27 23:17:08'),
('trungthinh2610@gmail.com', 'OEyPKXjiM28BmfiYgc1UJKcvyjbXUwlqVFNDkeHCm7mNaHk81olYWSpL0in9jk5ZFrlww4ieM94XWlS7', '2020-11-28 09:03:47'),
('trungthinh2610@gmail.com', '0ikkcf0QzsXCHN7GfW79F4k2q2sWNfKPAVbvy6SEmPtuPT78BQLL52Nh8vgqnehhEuiNXltLBsMaRO05', '2020-11-28 09:03:57');

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
(78, 'UltraBoost 20 - Core Black', 'ultraboost-20-core-black-1606539397', 1, 608000, 0, 'ADIDAS - UltraBoost 20 - Core BlackADIDAS - UltraBoost 20 - Core BlackADIDAS - UltraBoost 20 - Core Black', '<p>ADIDAS - UltraBoost 20 - Core BlackADIDAS - UltraBoost 20 - Core BlackADIDAS - UltraBoost 20 - Core BlackADIDAS - UltraBoost 20 - Core Black</p>', '[\"1.jpg\",\"2.jpg\",\"3.jpg\"]', 132, 5, NULL, NULL, '2020-11-28 04:56:37', '2020-11-28 04:56:37'),
(79, 'X PLR - Black Core White', 'x-plr-black-core-white-1606539390', 1, 544000, 0, 'ADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core White', '<p>ADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core White</p>', '[\"1.jpg\",\"2.jpg\",\"3.jpg\"]', 132, 5, NULL, NULL, '2020-11-28 04:56:30', '2020-11-28 04:56:30'),
(80, 'UltraBoost 20 - Ash pearl', 'ultraboost-20-ash-pearl-1606539381', 1, 608000, 0, 'ADIDAS- UltraBoost 20 - Ash pearlADIDAS- UltraBoost 20 - Ash pearlADIDAS- UltraBoost 20 - Ash pearl', '<p>ADIDAS- UltraBoost 20 - Ash pearlADIDAS- UltraBoost 20 - Ash pearlADIDAS- UltraBoost 20 - Ash pearlADIDAS- UltraBoost 20 - Ash pearl</p>', '[\"2.jpg\",\"3.jpg\",\"z2093943676662_ccea6cdcb72e54a42ffef6b76f2068f0.jpg\"]', 132, 5, NULL, NULL, '2020-11-28 04:56:21', '2020-11-28 04:56:21'),
(81, 'X PLR - White core black', 'x-plr-white-core-black-1606539373', 1, 544000, 0, 'filenamefilenamefilenamefilenamefilenamefilenamefilename', '<p>filenamefilenamefilenamefilenamefilenamefilenamefilenamefilename</p>', '[\"1606531663.jpg\",\"1606531663.jpg\",\"1606531663.jpg\"]', 132, 5, NULL, NULL, '2020-11-28 04:56:13', '2020-11-28 04:56:13'),
(82, 'Alphabounce Instinct M - Black Pink', 'alphabounce-instinct-m-black-pink-1606539367', 1, 78400, 10, 'ADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black Pink', '<p>ADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black Pink</p>', '[\"1606531803.jpg\",\"1606531803.jpg\",\"1606531803.jpg\"]', 132, 5, NULL, NULL, '2020-11-28 04:56:07', '2020-11-28 04:56:07'),
(83, 'AlphabounceBeyond - Violet', 'alphabouncebeyond-violet-1606539344', 1, 704000, 10, 'ADIDAS-AlphabounceBeyond - Violet- Giá 704,000ADIDAS-AlphabounceBeyond - Violet- Giá 704,000ADIDAS-AlphabounceBeyond - Violet- Giá 704,000', '<p>ADIDAS-AlphabounceBeyond - Violet- Gi&aacute; 704,000ADIDAS-AlphabounceBeyond - Violet- Gi&aacute; 704,000ADIDAS-AlphabounceBeyond - Violet- Gi&aacute; 704,000</p>', '[\"1606532328.jpg\",\"1606532328.jpg\",\"1606532328.jpg\"]', 132, 5, NULL, NULL, '2020-11-28 04:55:44', '2020-11-28 04:55:44'),
(84, 'EQT ADV - White Core Black', 'eqt-adv-white-core-black-1606539336', 1, 624000, 10, 'ADIDAS-EQT ADV - White Core Black -Giá 624,000ADIDAS-EQT ADV - White Core Black -Giá 624,000ADIDAS-EQT ADV - White Core Black -Giá 624,000ADIDAS-EQT ADV - White Core Black -Giá 624,000', '<p>ADIDAS-EQT ADV - White Core Black -Gi&aacute; 624,000ADIDAS-EQT ADV - White Core Black -Gi&aacute; 624,000ADIDAS-EQT ADV - White Core Black -Gi&aacute; 624,000ADIDAS-EQT ADV - White Core Black -Gi&aacute; 624,000ADIDAS-EQT ADV - White Core Black -Gi&aacute; 624,000</p>', '[\"1606532452.jpg\",\"1606532452.jpg\",\"1606532452.jpg\"]', 132, 5, NULL, NULL, '2020-11-28 04:55:36', '2020-11-28 04:55:36'),
(85, 'Stan Smith Rep - Black', 'stan-smith-rep-black-1606539327', 1, 544000, 5, 'ADIDAS-Stan Smith Rep - Black - Giá 544,000ADIDAS-Stan Smith Rep - Black - Giá 544,000ADIDAS-Stan Smith Rep - Black - Giá 544,000ADIDAS-Stan Smith Rep - Black - Giá 544,000', '<p>ADIDAS-Stan Smith Rep - Black - Gi&aacute; 544,000ADIDAS-Stan Smith Rep - Black - Gi&aacute; 544,000ADIDAS-Stan Smith Rep - Black - Gi&aacute; 544,000ADIDAS-Stan Smith Rep - Black - Gi&aacute; 544,000</p>', '[\"1606532516.jpg\",\"1606532516.jpg\",\"1606532516.jpg\"]', 132, 5, NULL, NULL, '2020-11-28 04:55:27', '2020-11-28 04:55:27'),
(86, 'Yeezy 350 V2 - Yecheil', 'yeezy-350-v2-yecheil-1606539320', 1, 704000, 5, 'ADIDAS-Yeezy 350 V2 - Yecheil-Giá 704,000ADIDAS-Yeezy 350 V2 - Yecheil-Giá 704,000ADIDAS-Yeezy 350 V2 - Yecheil-Giá 704,000', '<p>ADIDAS-Yeezy 350 V2 - Yecheil-Gi&aacute; 704,000ADIDAS-Yeezy 350 V2 - Yecheil-Gi&aacute; 704,000ADIDAS-Yeezy 350 V2 - Yecheil-Gi&aacute; 704,000ADIDAS-Yeezy 350 V2 - Yecheil-Gi&aacute; 704,000</p>', '[\"1606533054.jpg\",\"1606533054.jpg\",\"1606533054.jpg\"]', 132, 5, NULL, NULL, '2020-11-28 04:55:20', '2020-11-28 04:55:20'),
(87, 'Triple S Rep - Black Grey', 'triple-s-rep-black-grey-1606539312', 1, 1475000, 5, 'Balenciaga Triple S Rep - Black Grey- Giá 1,147,500Balenciaga Triple S Rep - Black Grey- Giá 1,147,500Balenciaga Triple S Rep - Black Grey- Giá 1,147,500Balenciaga Triple S Rep - Black Grey- Giá 1,147,500', '<p>Balenciaga Triple S Rep - Black Grey- Gi&aacute; 1,147,500Balenciaga Triple S Rep - Black Grey- Gi&aacute; 1,147,500Balenciaga Triple S Rep - Black Grey- Gi&aacute; 1,147,500Balenciaga Triple S Rep - Black Grey- Gi&aacute; 1,147,500Balenciaga Triple S Rep - Black Grey- Gi&aacute; 1,147,500</p>', '[\"1606533162.jpg\",\"1606533162.jpg\",\"1606533162.jpg\"]', 132, 6, NULL, NULL, '2020-11-28 04:55:12', '2020-11-28 04:55:12'),
(88, 'Triple S Rep - Grey', 'triple-s-rep-grey-1606539287', 1, 1147000, 0, 'balenciaga triple S Rep - Grey- Giá 1,147,000balenciaga triple S Rep - Grey- Giá 1,147,000balenciaga triple S Rep - Grey- Giá 1,147,000balenciaga triple S Rep - Grey- Giá 1,147,000', '<p>balenciaga triple S Rep - Grey- Gi&aacute; 1,147,000balenciaga triple S Rep - Grey- Gi&aacute; 1,147,000balenciaga triple S Rep - Grey- Gi&aacute; 1,147,000balenciaga triple S Rep - Grey- Gi&aacute; 1,147,000</p>', '[\"1606533224.jpg\",\"1606533224.jpg\",\"1606533224.jpg\"]', 132, 6, NULL, NULL, '2020-11-28 04:54:47', '2020-11-28 04:54:47'),
(89, 'Triple S Rep - Pink Grey', 'triple-s-rep-pink-grey-1606539278', 1, 1147500, 0, 'Balenciaga Triple S Rep - Pink Grey -Giá 1,147,500Balenciaga Triple S Rep - Pink Grey -Giá 1,147,500Balenciaga Triple S Rep - Pink Grey -Giá 1,147,500', '<p>Balenciaga Triple S Rep - Pink Grey -Gi&aacute; 1,147,500Balenciaga Triple S Rep - Pink Grey -Gi&aacute; 1,147,500Balenciaga Triple S Rep - Pink Grey -Gi&aacute; 1,147,500Balenciaga Triple S Rep - Pink Grey -Gi&aacute; 1,147,500</p>', '[\"1606533342.jpg\",\"1606533342.jpg\",\"1606533342.jpg\"]', 132, 6, NULL, NULL, '2020-11-28 04:54:38', '2020-11-28 04:54:38'),
(90, 'Triple S Rep - Pink Orange', 'triple-s-rep-pink-orange-1606539271', 1, 1147000, 5, 'Balenciaga Triple S Rep - Pink Orange-Giá 1,147,000Balenciaga Triple S Rep - Pink Orange-Giá 1,147,000Balenciaga Triple S Rep - Pink Orange-Giá 1,147,000', '<p>Balenciaga Triple S Rep - Pink Orange-Gi&aacute; 1,147,000Balenciaga Triple S Rep - Pink Orange-Gi&aacute; 1,147,000Balenciaga Triple S Rep - Pink Orange-Gi&aacute; 1,147,000Balenciaga Triple S Rep - Pink Orange-Gi&aacute; 1,147,000</p>', '[\"1606533415.jpg\",\"1606533415.jpg\",\"1606533415.jpg\"]', 132, 6, NULL, NULL, '2020-11-28 04:54:31', '2020-11-28 04:54:31'),
(91, 'Triple S Rep - White Core Red', 'triple-s-rep-white-core-red-1606539254', 1, 1500000, 6, 'Balenciaga Triple S Rep - White Core Red - Giá 1,147,500Balenciaga Triple S Rep - White Core Red - Giá 1,147,500Balenciaga Triple S Rep - White Core Red - Giá 1,147,500', '<p>Balenciaga Triple S Rep - White Core Red - Gi&aacute; 1,147,500Balenciaga Triple S Rep - White Core Red - Gi&aacute; 1,147,500Balenciaga Triple S Rep - White Core Red - Gi&aacute; 1,147,500</p>', '[\"1606533473.jpg\",\"1606533473.jpg\",\"1606533473.jpg\"]', 132, 6, NULL, NULL, '2020-11-28 04:54:14', '2020-11-28 04:54:14'),
(92, 'Triple S Rep - White Pink', 'triple-s-rep-white-pink-1606539247', 1, 1147000, 0, 'Balenciaga Triple S Rep - White Pink- Giá 1,147,000Balenciaga Triple S Rep - White Pink- Giá 1,147,000Balenciaga Triple S Rep - White Pink- Giá 1,147,000', '<p>Balenciaga Triple S Rep - White Pink- Gi&aacute; 1,147,000Balenciaga Triple S Rep - White Pink- Gi&aacute; 1,147,000Balenciaga Triple S Rep - White Pink- Gi&aacute; 1,147,000Balenciaga Triple S Rep - White Pink- Gi&aacute; 1,147,000</p>', '[\"1606533676.jpg\",\"1606533676.jpg\",\"1606533676.jpg\"]', 132, 6, NULL, NULL, '2020-11-28 04:54:07', '2020-11-28 04:54:07'),
(93, 'Triple S Rep - Yellow Green', 'triple-s-rep-yellow-green-1606539224', 1, 1147000, 0, 'balenciaga triple S Rep - Yellow Green-Giá 1,147,000balenciaga triple S Rep - Yellow Green-Giá 1,147,000balenciaga triple S Rep - Yellow Green-Giá 1,147,000balenciaga triple S Rep - Yellow Green-Giá 1,147,000', '<p>balenciaga triple S Rep - Yellow Green-Gi&aacute; 1,147,000balenciaga triple S Rep - Yellow Green-Gi&aacute; 1,147,000balenciaga triple S Rep - Yellow Green-Gi&aacute; 1,147,000balenciaga triple S Rep - Yellow Green-Gi&aacute; 1,147,000</p>', '[\"1606533729.jpg\",\"1606533729.jpg\",\"1606533729.jpg\"]', 132, 6, NULL, NULL, '2020-11-28 04:53:44', '2020-11-28 04:53:44'),
(94, 'Triple S Rep 11 - All Black', 'triple-s-rep-11-all-black-1606539210', 1, 1317000, 0, 'Balenciaga Triple S Rep 11 - All Black-Giá 1,317,000Balenciaga Triple S Rep 11 - All Black-Giá 1,317,000Balenciaga Triple S Rep 11 - All Black-Giá 1,317,000Balenciaga Triple S Rep 11 - All Black-Giá 1,317,000', '<p>Balenciaga Triple S Rep 11 - All Black-Gi&aacute; 1,317,000Balenciaga Triple S Rep 11 - All Black-Gi&aacute; 1,317,000Balenciaga Triple S Rep 11 - All Black-Gi&aacute; 1,317,000Balenciaga Triple S Rep 11 - All Black-Gi&aacute; 1,317,000</p>', '[\"1606533800.jpg\",\"1606533800.jpg\",\"1606533800.jpg\"]', 132, 6, NULL, NULL, '2020-11-28 04:53:30', '2020-11-28 04:53:30'),
(95, 'Chunky MLP Rep _ NY Silver', 'chunky-mlp-rep-ny-silver-1606533865', 1, 353637, 0, 'Chunky MLP Rep _ NY Silver size 35,36,37Chunky MLP Rep _ NY Silver size 35,36,37Chunky MLP Rep _ NY Silver size 35,36,37', '<p>Chunky MLP Rep _ NY Silver size 35,36,37Chunky MLP Rep _ NY Silver size 35,36,37Chunky MLP Rep _ NY Silver size 35,36,37Chunky MLP Rep _ NY Silver size 35,36,37</p>', '[\"1606533865.jpg\",\"1606533865.jpg\",\"1606533865.jpg\"]', 132, 6, NULL, NULL, '2020-11-28 03:24:25', '2020-11-28 03:24:25'),
(96, 'Chuck Taylor 1970s Hi - Paranoise', 'chuck-taylor-1970s-hi-paranoise-1606539193', 1, 544000, 0, 'CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Giá 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Giá 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Giá 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Giá 544,000', '<p>CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Gi&aacute; 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Gi&aacute; 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Gi&aacute; 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Gi&aacute; 544,000</p>', '[\"1606533979.jpg\",\"1606533979.jpg\",\"1606533979.jpg\"]', 132, 7, NULL, NULL, '2020-11-28 04:53:13', '2020-11-28 04:53:13'),
(97, 'Chuck Taylor 1970s Hi - Cream', 'chuck-taylor-1970s-hi-cream-1606539162', 1, 456000, 5, '- Giá 456,000- Giá 456,000- Giá 456,000- Giá 456,000- Giá 456,000- Giá 456,000', '<p>- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000</p>', '[\"1606539162.jpg\",\"1606539162.jpg\",\"1606539162.jpg\"]', 132, 7, NULL, NULL, '2020-11-28 04:52:42', '2020-11-28 04:52:42'),
(98, 'Chuck Taylor 1970s Hi - White', 'chuck-taylor-1970s-hi-white-1606542063', 1, 456000, 0, 'Chuck Taylor 1970s Hi - White-Giá 456,000Chuck Taylor 1970s Hi - White-Giá 456,000Chuck Taylor 1970s Hi - White-Giá 456,000', '<p>Chuck Taylor 1970s Hi - White-Gi&aacute; 456,000Chuck Taylor 1970s Hi - White-Gi&aacute; 456,000Chuck Taylor 1970s Hi - White-Gi&aacute; 456,000Chuck Taylor 1970s Hi - White-Gi&aacute; 456,000Chuck Taylor 1970s Hi - White-Gi&aacute; 456,000</p>', '[\"1606542063.jpg\",\"1606542063.jpg\",\"1606542063.jpg\"]', 132, 7, NULL, NULL, '2020-11-28 05:41:03', '2020-11-28 05:41:03'),
(99, 'Chuck Taylor 1970s Hi - Yellow', 'chuck-taylor-1970s-hi-yellow-1606542130', 1, 456000, 0, 'Chuck Taylor 1970s Hi - Yellow-Giá 456,000Chuck Taylor 1970s Hi - Yellow-Giá 456,000Chuck Taylor 1970s Hi - Yellow-Giá 456,000Chuck Taylor 1970s Hi - Yellow-Giá 456,000', '<p>Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000</p>', '[\"1606542130.jpg\",\"1606542130.jpg\",\"1606542130.jpg\"]', 132, 7, NULL, NULL, '2020-11-28 05:42:10', '2020-11-28 05:42:10'),
(100, 'Chuck Taylor 1970s Low - Trace Green', 'chuck-taylor-1970s-low-trace-green-1606542187', 1, 416000, 0, 'Chuck Taylor 1970s Low - Trace Green - giá 416,000Chuck Taylor 1970s Low - Trace Green - giá 416,000Chuck Taylor 1970s Low - Trace Green - giá 416,000', '<p>Chuck Taylor 1970s Low - Trace Green - gi&aacute; 416,000Chuck Taylor 1970s Low - Trace Green - gi&aacute; 416,000Chuck Taylor 1970s Low - Trace Green - gi&aacute; 416,000Chuck Taylor 1970s Low - Trace Green - gi&aacute; 416,000Chuck Taylor 1970s Low - Trace Green - gi&aacute; 416,000</p>', '[\"1606542187.jpg\",\"1606542187.jpg\",\"1606542187.jpg\"]', 132, 7, NULL, NULL, '2020-11-28 05:43:07', '2020-11-28 05:43:07'),
(101, 'Chuck Taylor 1970s PLAY Hi - White', 'chuck-taylor-1970s-play-hi-white-1606542235', 1, 472000, 0, 'Chuck Taylor 1970s PLAY Hi - White-Giá 472,000Chuck Taylor 1970s PLAY Hi - White-Giá 472,000Chuck Taylor 1970s PLAY Hi - White-Giá 472,000Chuck Taylor 1970s PLAY Hi - White-Giá 472,000Chuck Taylor 1970s PLAY Hi - White-Giá 472,000', '<p>Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000</p>', '[\"1606542235.jpg\",\"1606542235.jpg\",\"1606542235.jpg\"]', 132, 7, NULL, NULL, '2020-11-28 05:43:55', '2020-11-28 05:43:55'),
(102, 'Chuck Taylor 1970s PLAY Low - Black', 'chuck-taylor-1970s-play-low-black-1606542300', 1, 440000, 0, 'Chuck Taylor 1970s PLAY Low - Black-Giá 440,000Chuck Taylor 1970s PLAY Low - Black-Giá 440,000Chuck Taylor 1970s PLAY Low - Black-Giá 440,000', '<p>Chuck Taylor 1970s PLAY Low - Black-Gi&aacute; 440,000Chuck Taylor 1970s PLAY Low - Black-Gi&aacute; 440,000Chuck Taylor 1970s PLAY Low - Black-Gi&aacute; 440,000Chuck Taylor 1970s PLAY Low - Black-Gi&aacute; 440,000</p>', '[\"1606542300.jpg\",\"1606542300.jpg\",\"1606542300.jpg\"]', 132, 7, NULL, NULL, '2020-11-28 05:45:00', '2020-11-28 05:45:00'),
(103, 'Air Force rep 11 - White Yellow', 'air-force-rep-11-white-yellow-1606542390', 1, 1740000, 0, 'air Force rep 11 - White Yellow-Giá 704,000air Force rep 11 - White Yellow-Giá 704,000air Force rep 11 - White Yellow-Giá 704,000air Force rep 11 - White Yellow-Giá 704,000', '<p>air Force rep 11 - White Yellow-Gi&aacute; 704,000air Force rep 11 - White Yellow-Gi&aacute; 704,000air Force rep 11 - White Yellow-Gi&aacute; 704,000</p>', '[\"1606542390.jpg\",\"1606542390.jpg\",\"1606542390.jpg\"]', 132, 8, NULL, NULL, '2020-11-28 05:46:30', '2020-11-28 05:46:30'),
(104, 'Jordan 1 - Bred', 'jordan-1-bred-1606542442', 1, 624000, 0, 'Jordan 1 - Bred - Giá 624,000Jordan 1 - Bred - Giá 624,000Jordan 1 - Bred - Giá 624,000Jordan 1 - Bred - Giá 624,000', '<p>Jordan 1 - Bred - Gi&aacute; 624,000Jordan 1 - Bred - Gi&aacute; 624,000Jordan 1 - Bred - Gi&aacute; 624,000Jordan 1 - Bred - Gi&aacute; 624,000</p>', '[\"1606542442.jpg\",\"1606542442.jpg\",\"1606542442.jpg\"]', 132, 8, NULL, NULL, '2020-11-28 05:47:22', '2020-11-28 05:47:22'),
(105, 'Jordan 1 Low - Core black', 'jordan-1-low-core-black-1606542486', 1, 624000, 0, 'Jordan 1 Low - Core black - Giá 624,00Jordan 1 Low - Core black - Giá 624,00Jordan 1 Low - Core black - Giá 624,00Jordan 1 Low - Core black - Giá 624,00Jordan 1 Low - Core black - Giá 624,00', '<p>Jordan 1 Low - Core black - Gi&aacute; 624,00Jordan 1 Low - Core black - Gi&aacute; 624,00Jordan 1 Low - Core black - Gi&aacute; 624,00Jordan 1 Low - Core black - Gi&aacute; 624,00</p>', '[\"1606542486.jpg\",\"1606542486.jpg\",\"1606542486.jpg\"]', 132, 8, NULL, NULL, '2020-11-28 05:48:06', '2020-11-28 05:48:06'),
(106, 'Jordan 1 Low - Cream', 'jordan-1-low-cream-1606542592', 1, 624000, 0, 'Jordan 1 Low - Cream - Giá 624,000Jordan 1 Low - Cream - Giá 624,000Jordan 1 Low - Cream - Giá 624,000Jordan 1 Low - Cream - Giá 624,000Jordan 1 Low - Cream - Giá 624,000', '<p>Jordan 1 Low - Cream - Gi&aacute; 624,000Jordan 1 Low - Cream - Gi&aacute; 624,000Jordan 1 Low - Cream - Gi&aacute; 624,000Jordan 1 Low - Cream - Gi&aacute; 624,000</p>', '[\"1606542592.jpg\",\"1606542592.jpg\",\"1606542592.jpg\"]', 132, 8, NULL, NULL, '2020-11-28 05:49:52', '2020-11-28 05:49:52'),
(107, 'Jordan 1 Low - Multicolor', 'jordan-1-low-multicolor-1606542639', 1, 624000, 0, 'Jordan 1 Low - Multicolor- giá 624,000Jordan 1 Low - Multicolor- giá 624,000Jordan 1 Low - Multicolor- giá 624,000Jordan 1 Low - Multicolor- giá 624,000', '<p>Jordan 1 Low - Multicolor- gi&aacute; 624,000Jordan 1 Low - Multicolor- gi&aacute; 624,000Jordan 1 Low - Multicolor- gi&aacute; 624,000Jordan 1 Low - Multicolor- gi&aacute; 624,000Jordan 1 Low - Multicolor- gi&aacute; 624,000</p>', '[\"1606542639.jpg\",\"1606542639.jpg\",\"1606542639.jpg\"]', 132, 8, NULL, NULL, '2020-11-28 05:50:39', '2020-11-28 05:50:39'),
(108, 'Jordan 1 Low - White Core Navy', 'jordan-1-low-white-core-navy-1606542793', 1, 624000, 0, 'Jordan 1 Low - White Core Navy- Giá 624,000Jordan 1 Low - White Core Navy- Giá 624,000Jordan 1 Low - White Core Navy- Giá 624,000Jordan 1 Low - White Core Navy- Giá 624,000', '<p>Jordan 1 Low - White Core Navy- Gi&aacute; 624,000Jordan 1 Low - White Core Navy- Gi&aacute; 624,000Jordan 1 Low - White Core Navy- Gi&aacute; 624,000Jordan 1 Low - White Core Navy- Gi&aacute; 624,000</p>', '[\"1606542793.jpg\",\"1606542793.jpg\",\"1606542793.jpg\"]', 132, 8, NULL, NULL, '2020-11-28 05:53:13', '2020-11-28 05:53:13'),
(109, 'Jordan 1 Low - White Core Red', 'jordan-1-low-white-core-red-1606542835', 1, 624000, 0, 'Jordan 1 Low - White Core Red-Giá 624,000Jordan 1 Low - White Core Red-Giá 624,000Jordan 1 Low - White Core Red-Giá 624,000Jordan 1 Low - White Core Red-Giá 624,000', '<p>Jordan 1 Low - White Core Red-Gi&aacute; 624,000Jordan 1 Low - White Core Red-Gi&aacute; 624,000Jordan 1 Low - White Core Red-Gi&aacute; 624,000Jordan 1 Low - White Core Red-Gi&aacute; 624,000</p>', '[\"1606542835.jpg\",\"1606542835.jpg\",\"1606542835.jpg\"]', 132, 8, NULL, NULL, '2020-11-28 05:53:55', '2020-11-28 05:53:55'),
(110, 'Nike Jordan 1 - Galaxy Blue', 'nike-jordan-1-galaxy-blue-1606542876', 1, 1624000, 0, 'Nike Jordan 1 - Galaxy Blue - Giá 624,000Nike Jordan 1 - Galaxy Blue - Giá 624,000Nike Jordan 1 - Galaxy Blue - Giá 624,000Nike Jordan 1 - Galaxy Blue - Giá 624,000', '<p>Nike Jordan 1 - Galaxy Blue - Gi&aacute; 624,000Nike Jordan 1 - Galaxy Blue - Gi&aacute; 624,000Nike Jordan 1 - Galaxy Blue - Gi&aacute; 624,000</p>', '[\"1606542876.jpg\",\"1606542876.jpg\",\"1606542876.jpg\"]', 132, 8, NULL, NULL, '2020-11-28 05:54:36', '2020-11-28 05:54:36'),
(111, 'NB80 - Be Nâu', 'nb80-be-nau-1606542963', 1, 330000, 0, 'NB80 - Be Nâu- Giá 330,000NB80 - Be Nâu- Giá 330,000NB80 - Be Nâu- Giá 330,000NB80 - Be Nâu- Giá 330,000', '<p>NB80 - Be N&acirc;u- Gi&aacute; 330,000NB80 - Be N&acirc;u- Gi&aacute; 330,000NB80 - Be N&acirc;u- Gi&aacute; 330,000NB80 - Be N&acirc;u- Gi&aacute; 330,000</p>', '[\"1606542963.jpg\",\"1606542963.jpg\",\"1606542963.jpg\"]', 133, 9, NULL, NULL, '2020-11-28 05:56:03', '2020-11-28 05:56:03'),
(112, 'NB80 - Đen', 'nb80-den-1606542999', 1, 330000, 0, 'NB80 - Đen- Giá 330,000NB80 - Đen- Giá 330,000NB80 - Đen- Giá 330,000NB80 - Đen- Giá 330,000NB80 - Đen- Giá 330,000', '<p>NB80 - Đen- Gi&aacute; 330,000NB80 - Đen- Gi&aacute; 330,000NB80 - Đen- Gi&aacute; 330,000NB80 - Đen- Gi&aacute; 330,000NB80 - Đen- Gi&aacute; 330,000NB80 - Đen- Gi&aacute; 330,000</p>', '[\"1606542999.jpg\",\"1606542999.jpg\",\"1606542999.jpg\"]', 133, 9, NULL, NULL, '2020-11-28 05:56:39', '2020-11-28 05:56:39'),
(113, 'NB80 - Xanh Nhạt', 'nb80-xanh-nhat-1606543034', 1, 330000, 0, 'NB80 - Xanh Nhạt- Giá 330,000NB80 - Xanh Nhạt- Giá 330,000NB80 - Xanh Nhạt- Giá 330,000NB80 - Xanh Nhạt- Giá 330,000', '<p>NB80 - Xanh Nhạt- Gi&aacute; 330,000NB80 - Xanh Nhạt- Gi&aacute; 330,000NB80 - Xanh Nhạt- Gi&aacute; 330,000NB80 - Xanh Nhạt- Gi&aacute; 330,000NB80 - Xanh Nhạt- Gi&aacute; 330,000</p>', '[\"1606543034.jpg\",\"1606543034.jpg\",\"1606543034.jpg\"]', 133, 9, NULL, NULL, '2020-11-28 05:57:14', '2020-11-28 05:57:14'),
(114, 'NB81 - Nâu Xanh', 'nb81-nau-xanh-1606543079', 1, 300000, 0, 'NB81 - Nâu Xanh- Giá 300.000NB81 - Nâu Xanh- Giá 300.000NB81 - Nâu Xanh- Giá 300.000NB81 - Nâu Xanh- Giá 300.000NB81 - Nâu Xanh- Giá 300.000', '<p>NB81 - N&acirc;u Xanh- Gi&aacute; 300.000NB81 - N&acirc;u Xanh- Gi&aacute; 300.000NB81 - N&acirc;u Xanh- Gi&aacute; 300.000NB81 - N&acirc;u Xanh- Gi&aacute; 300.000NB81 - N&acirc;u Xanh- Gi&aacute; 300.000NB81 - N&acirc;u Xanh- Gi&aacute; 300.000</p>', '[\"1606543079.jpg\",\"1606543079.jpg\",\"1606543079.jpg\"]', 133, 9, NULL, NULL, '2020-11-28 05:57:59', '2020-11-28 05:57:59'),
(115, 'NB81 - Xanh Hồng', 'nb81-xanh-hong-1606543117', 1, 300000, 0, 'NB81 - Xanh Hồng- Giá 300,000NB81 - Xanh Hồng- Giá 300,000NB81 - Xanh Hồng- Giá 300,000NB81 - Xanh Hồng- Giá 300,000', '<p>NB81 - Xanh Hồng- Gi&aacute; 300,000NB81 - Xanh Hồng- Gi&aacute; 300,000NB81 - Xanh Hồng- Gi&aacute; 300,000NB81 - Xanh Hồng- Gi&aacute; 300,000</p>', '[\"1606543117.jpg\",\"1606543117.jpg\",\"1606543117.jpg\"]', 133, 9, NULL, NULL, '2020-11-28 05:58:37', '2020-11-28 05:58:37'),
(116, 'SD-9801 - Ghi', 'sd-9801-ghi-1606543170', 1, 260000, 0, 'SD-9801 - Ghi-Giá 260,000SD-9801 - Ghi-Giá 260,000SD-9801 - Ghi-Giá 260,000SD-9801 - Ghi-Giá 260,000SD-9801 - Ghi-Giá 260,000', '<p>SD-9801 - Ghi-Gi&aacute; 260,000SD-9801 - Ghi-Gi&aacute; 260,000SD-9801 - Ghi-Gi&aacute; 260,000SD-9801 - Ghi-Gi&aacute; 260,000SD-9801 - Ghi-Gi&aacute; 260,000</p>', '[\"1606543170.jpg\",\"1606543170.jpg\",\"1606543170.jpg\"]', 133, 9, NULL, NULL, '2020-11-28 05:59:30', '2020-11-28 05:59:30'),
(117, 'SD-NB59 - Full Black', 'sd-nb59-full-black-1606543207', 1, 338000, 0, 'SD-NB59 - Full Black -Giá 338,000SD-NB59 - Full Black -Giá 338,000SD-NB59 - Full Black -Giá 338,000SD-NB59 - Full Black -Giá 338,000', '<p>SD-NB59 - Full Black -Gi&aacute; 338,000SD-NB59 - Full Black -Gi&aacute; 338,000SD-NB59 - Full Black -Gi&aacute; 338,000SD-NB59 - Full Black -Gi&aacute; 338,000SD-NB59 - Full Black -Gi&aacute; 338,000SD-NB59 - Full Black -Gi&aacute; 338,000</p>', '[\"1606543207.jpg\",\"1606543207.jpg\",\"1606543207.jpg\"]', 133, 9, NULL, NULL, '2020-11-28 06:00:07', '2020-11-28 06:00:07'),
(118, 'MARVEL ALL OVER PRINT NAM, NỮ', 'marvel-all-over-print-nam-nu-1606543346', 1, 552000, 0, 'MARVEL ALL OVER PRINT NAM, NỮ-Giá 552,000MARVEL ALL OVER PRINT NAM, NỮ-Giá 552,000MARVEL ALL OVER PRINT NAM, NỮ-Giá 552,000', '<p>MARVEL ALL OVER PRINT NAM, NỮ-Gi&aacute; 552,000MARVEL ALL OVER PRINT NAM, NỮ-Gi&aacute; 552,000MARVEL ALL OVER PRINT NAM, NỮ-Gi&aacute; 552,000MARVEL ALL OVER PRINT NAM, NỮ-Gi&aacute; 552,000</p>', '[\"1606543346.jpg\"]', 134, 10, NULL, NULL, '2020-11-28 06:02:26', '2020-11-28 06:02:26'),
(119, 'MARVEL TRẮNG ĐEN NAM, NỮ', 'marvel-trang-den-nam-nu-1606543385', 1, 595000, 0, 'MARVEL TRẮNG ĐEN NAM, NỮ-Giá 595,000MARVEL TRẮNG ĐEN NAM, NỮ-Giá 595,000MARVEL TRẮNG ĐEN NAM, NỮ-Giá 595,000', '<p>MARVEL TRẮNG ĐEN NAM, NỮ-Gi&aacute; 595,000MARVEL TRẮNG ĐEN NAM, NỮ-Gi&aacute; 595,000MARVEL TRẮNG ĐEN NAM, NỮ-Gi&aacute; 595,000MARVEL TRẮNG ĐEN NAM, NỮ-Gi&aacute; 595,000</p>', '[\"1606543385.jpg\"]', 134, 10, NULL, NULL, '2020-11-28 06:03:05', '2020-11-28 06:03:05'),
(120, 'OLD SKOOL - Black', 'old-skool-black-1606543421', 1, 360000, 0, 'OLD SKOOL - Black - Giá 360,000OLD SKOOL - Black - Giá 360,000OLD SKOOL - Black - Giá 360,000OLD SKOOL - Black - Giá 360,000', '<p>OLD SKOOL - Black - Gi&aacute; 360,000OLD SKOOL - Black - Gi&aacute; 360,000OLD SKOOL - Black - Gi&aacute; 360,000OLD SKOOL - Black - Gi&aacute; 360,000</p>', '[\"1606543421.jpg\",\"1606543421.jpg\",\"1606543421.jpg\"]', 134, 10, NULL, NULL, '2020-11-28 06:03:41', '2020-11-28 06:03:41'),
(121, 'Old Skool REP 1;1 -REd Stripe', 'old-skool-rep-11-red-stripe-1606543455', 1, 408000, 0, 'Old Skool REP 1;1 -REd Stripe -giá 408,000Old Skool REP 1;1 -REd Stripe -giá 408,000Old Skool REP 1;1 -REd Stripe -giá 408,000Old Skool REP 1;1 -REd Stripe -giá 408,000', '<p>Old Skool REP 1;1 -REd Stripe -gi&aacute; 408,000Old Skool REP 1;1 -REd Stripe -gi&aacute; 408,000Old Skool REP 1;1 -REd Stripe -gi&aacute; 408,000Old Skool REP 1;1 -REd Stripe -gi&aacute; 408,000</p>', '[\"1606543455.jpg\",\"1606543455.jpg\",\"1606543455.jpg\"]', 134, 10, NULL, NULL, '2020-11-28 06:04:15', '2020-11-28 06:04:15'),
(122, 'Old Skool REP 11 - Black Stripe', 'old-skool-rep-11-black-stripe-1606543488', 1, 408000, 0, 'Old Skool REP 11 - Black Stripe - Giá 408,000Old Skool REP 11 - Black Stripe - Giá 408,000Old Skool REP 11 - Black Stripe - Giá 408,000Old Skool REP 11 - Black Stripe - Giá 408,000', '<p>Old Skool REP 11 - Black Stripe - Gi&aacute; 408,000Old Skool REP 11 - Black Stripe - Gi&aacute; 408,000Old Skool REP 11 - Black Stripe - Gi&aacute; 408,000Old Skool REP 11 - Black Stripe - Gi&aacute; 408,000Old Skool REP 11 - Black Stripe - Gi&aacute; 408,000</p>', '[\"1606543488.jpg\",\"1606543488.jpg\",\"1606543488.jpg\"]', 134, 10, NULL, NULL, '2020-11-28 06:04:48', '2020-11-28 06:04:48'),
(123, 'SLIP ON HULK REPLICA NAM, NỮ', 'slip-on-hulk-replica-nam-nu-1606543525', 1, 425000, 0, 'SLIP ON HULK REPLICA NAM, NỮ-Giá 425,000SLIP ON HULK REPLICA NAM, NỮ-Giá 425,000SLIP ON HULK REPLICA NAM, NỮ-Giá 425,000SLIP ON HULK REPLICA NAM, NỮ-Giá 425,000', '<p>SLIP ON HULK REPLICA NAM, NỮ-Gi&aacute; 425,000SLIP ON HULK REPLICA NAM, NỮ-Gi&aacute; 425,000SLIP ON HULK REPLICA NAM, NỮ-Gi&aacute; 425,000SLIP ON HULK REPLICA NAM, NỮ-Gi&aacute; 425,000</p>', '[\"1606543525.jpg\"]', 134, 10, NULL, NULL, '2020-11-28 06:05:25', '2020-11-28 06:05:25');

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
(64, 76, 1, 10),
(65, 76, 2, 10),
(66, 76, 3, 10),
(67, 76, 4, 10),
(68, 76, 5, 10),
(69, 78, 1, 1),
(70, 79, 1, 1),
(71, 80, 2, 1),
(72, 81, 1, 1),
(73, 82, 1, 1),
(74, 83, 1, 1),
(75, 84, 1, 1),
(76, 85, 2, 1),
(77, 86, 1, 1),
(78, 87, 1, 1),
(79, 88, 1, 1),
(80, 89, 1, 1),
(81, 90, 2, 1),
(82, 91, 1, 1),
(83, 92, 2, 1),
(84, 93, 1, 1),
(85, 94, 2, 1),
(86, 95, 1, 1),
(87, 96, 1, 1),
(88, 97, 1, 1),
(89, 98, 1, 1),
(90, 99, 1, 1),
(91, 100, 1, 1),
(92, 101, 1, 1),
(93, 102, 1, 1),
(94, 103, 1, 1),
(95, 104, 1, 1),
(96, 105, 1, 1),
(97, 106, 1, 1),
(98, 107, 1, 1),
(99, 108, 1, 1),
(100, 109, 1, 1),
(101, 110, 1, 1),
(102, 111, 1, 1),
(103, 112, 1, 1),
(104, 113, 1, 1),
(105, 114, 1, 1),
(106, 115, 1, 1),
(107, 116, 1, 1),
(108, 117, 1, 1),
(109, 118, 1, 1),
(110, 119, 1, 1),
(111, 120, 1, 1),
(112, 121, 1, 1),
(113, 122, 2, 1),
(114, 123, 1, 1);

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
(3, 'admin', 'Tôi là admin', 'trungthinh2610@gmail.com', '$2y$10$XFE6GklUGtaf0BYVRn9mpOTu9PBD3lcH5h39tl33W1dZjqZk7HWMO', 'adc', '01236', 1, 'admin-1606650702.jpg', 1, 1, '', '2020-02-14 05:51:07', '2020-11-29 11:52:49'),
(5, 'user001', 'Tôi là user001', 'user001@gmail.com', '$2y$10$/y/MHgFjwTDhXSbPAYND4ejOrJXZADCK6n.EnOL8hXtiPyHouM63O', 'ABCD', '123123', 3, NULL, 13, 1, '', '2020-02-20 13:53:07', '2020-02-20 13:53:07'),
(6, 'user002', 'User 002', 'user002@gmail.com', '$2y$10$TVGgoLXt7D.fKs.gN.31EOT6BGUq5XuAlmu/y1Cz6y3.ogq40pA2m', 'abc', '12313', 3, '', 5, 1, '', '2020-02-19 03:55:39', '2020-02-19 03:55:39'),
(8, 'user003', 'Tôi là user003', 'lynguyen.pna@gmail.com', '$2y$10$BJ3AxseCgliexDAK8r9b1OHf9Gy8.PNy0D3DcmtVCiVlZ1G3JFmty', 'ẤCDSA', '123132', 3, 'etr0Bo5KWKIo7cUNUgYn6fllBM0NWt1F8iJ8E8Mk.jpeg', 7, 1, '', '2020-02-20 13:53:33', '2020-03-10 20:57:26'),
(9, 'user004', 'Tôi là user004', 'user004@gmail.com', '$2y$10$XWHs5F7WOMn7KvhFrSQwi.hcVZsUujiZ.IafMXkr2VHPYLNytsWP6', 'ádasdasdasdsa', '123132', 3, NULL, 7, 1, '', '2020-02-20 13:54:18', '2020-02-20 13:54:18'),
(19, 'vanchieu77', 'Đào Văn Chiểu', 'daovanchieu77@gmail.com', '$2y$10$yAuKpnTklU3kNbQMwQTJme5L8lGOpMVftXCbJen580t2I1VmaPaQ6', 'avc', '123123123', 3, NULL, 0, 1, '158391233515e68958fa3691', '2020-03-11 00:38:55', '2020-03-11 00:39:15'),
(20, 'user2020', 'Lê Trung Thịnh', 'lilken2610@gmail.com', '$2y$10$yfyx8uT0Tp6t2SbyP2lOJ.28jkj.Ha0RUSrC0GH1N5UWxZwUwenV6', 'Duy Thanh', '0336751070', 3, NULL, 0, 1, '160585247415fb75d3a69480', '2020-11-19 23:07:54', '2020-11-19 23:08:28'),
(21, 'lilken2k', 'Lee Trung thinh', 'trungthinh2610@gmail.comeqweqweqwe', '$2y$10$q0JeilIBVpyTvfEj/M/P1eQ3A9qyG07mRisD9Z24oUwmVNTcA8KfW', 'duy thành', '0336751070', 3, NULL, NULL, 0, '160636017715fbf1c71b514d', '2020-11-26 03:09:37', '2020-11-26 03:09:37'),
(22, 'lilken2610', 'Lee Trung thinh', 'lilken261s0d@gmail.com', '$2y$10$LTctWr24DnaOjhtVBtP0UeYwm2BN4FGUfCaGG7/EElEqc5UPiENyO', 'Duy Thanh', '0336751070', 3, NULL, NULL, 0, '160636529815fbf3072474aa', '2020-11-26 04:34:58', '2020-11-26 04:34:58'),
(23, 'adminqewqe', 'Lê Trung Thịnh', 'lilcowken@gmail.com', '$2y$10$SAEyA1NVXcGLb1R4CSqWZu5l3eIf1MYiZ8/VM35M3xwP14GR52IiO', 'Vai lon luon dau cat moi', '0336751070', 3, NULL, NULL, 0, '160649218215fc12016bddf7', '2020-11-27 15:49:42', '2020-11-27 15:49:42'),
(24, 'vailonluon', 'Lê Trung Thịnh', 'vailonluon@gmail.com', '$2y$10$tw/0h9jYVJcthfcJGpwRtOYIw4LsrvHvctRwLG7YAbgZIdWRTE/PK', 'Vai lon luon dau cat moi', '0336751070', 3, NULL, NULL, 0, '160649220015fc120286bd95', '2020-11-27 15:50:00', '2020-11-27 15:50:00');

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
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

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
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=115;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
