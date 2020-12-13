-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 13, 2020 lúc 02:44 PM
-- Phiên bản máy phục vụ: 10.4.11-MariaDB
-- Phiên bản PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
(2, 'Fashionista Việt đua nhau sống “ngược” theo trào lưu “ChucksFirst? Bạn dám không?”', 'Trước lời thách thức của Kaylee và Brian, giới trẻ Việt Nam nói chung hay còn được gọi là gen Z hiện nay và nhất là các đầu giày cũng như các fashionista/model mới nổi nói riêng đã đáp trả tích cực: #ChucksFirst?! Tôi dám!', '<p>Trước lời th&aacute;ch thức của Kaylee v&agrave; Brian, giới trẻ Việt Nam n&oacute;i chung hay c&ograve;n được gọi l&agrave; gen Z hiện nay v&agrave; nhất l&agrave; c&aacute;c đầu gi&agrave;y cũng như c&aacute;c fashionista/model mới nổi n&oacute;i ri&ecirc;ng đ&atilde; đ&aacute;p trả t&iacute;ch cực: #ChucksFirst?! T&ocirc;i d&aacute;m!</p>', 'UpHYSHvtCrlbFpKl1606900367.jpg', '2020-02-13 05:56:18', '2020-12-02 09:12:47'),
(4, 'Đế giày Converse có thiết kế rất đặc biệt, nhưng lý do thì chắc chắn bạn không tưởng tượng ra', 'Nếu chú ý, bạn sẽ thấy đế giày Converse có một lớp nỉ cao su sọc mờ, sần sùi. Nó để làm gì? Chống trơn trượt? Ồ không đâu.', '<p>Nếu ch&uacute; &yacute;, bạn sẽ thấy đế gi&agrave;y Converse c&oacute; một lớp nỉ cao su sọc mờ, sần s&ugrave;i. N&oacute; để l&agrave;m g&igrave;? Chống trơn trượt? Ồ kh&ocirc;ng đ&acirc;u.</p>', 'MJHzZUVrWrNO0YWo1606900374.jpg', '2020-02-13 06:25:03', '2020-12-02 09:12:54');

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
(2, 'Thanh toán qua Ví điện tử VNPAY');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_id` varchar(255) NOT NULL,
  `thanh_vien` varchar(100) NOT NULL COMMENT 'thành viên thanh toán',
  `money` float NOT NULL COMMENT 'số tiền thanh toán',
  `note` varchar(255) DEFAULT NULL COMMENT 'ghi chú thanh toán',
  `vnp_response_code` varchar(255) NOT NULL COMMENT 'mã phản hồi',
  `code_vnpay` varchar(255) NOT NULL COMMENT 'mã giao dịch vnpay',
  `code_bank` varchar(255) NOT NULL COMMENT 'mã ngân hàng',
  `time` datetime NOT NULL COMMENT 'thời gian chuyển khoản'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`id`, `order_id`, `thanh_vien`, `money`, `note`, `vnp_response_code`, `code_vnpay`, `code_bank`, `time`) VALUES
(1, '742874161', 'abc', 100000, 'chinh chuyển khoản', '00', '13401455', 'NCB', '2020-10-10 01:00:00'),
(2, '608324672', 'abc', 1000000, 'test chuyển khoản', '00', '13401811', 'NCB', '2020-10-11 21:00:00'),
(3, '1134065293', 'CT2', 150000, 'học phí', '00', '13407163', 'NCB', '2020-10-22 23:00:00'),
(4, '596509313', 'CT2', 5000000, 'học phí', '00', '13407176', 'NCB', '2020-10-23 00:00:00'),
(5, '70267166', 'CT2', 5000000, 'học phí', '00', '13407178', 'NCB', '2020-10-23 00:00:00'),
(6, '1672349048', 'CT1', 150000, 'học phí', '00', '13407729', 'NCB', '2020-10-23 21:00:00'),
(7, '80', '111', 260000, 'Thanh toán hóa đơn mua hàng tại shopshoe.com', '00', '13434362', 'NCB', '2020-12-12 17:00:00'),
(8, '82', '111', 1624000, 'Thanh toán hóa đơn mua hàng tại shopshoe.com', '00', '13434397', 'NCB', '2020-12-12 19:00:00'),
(9, '83', '111', 300000, 'Thanh toán hóa đơn mua hàng tại shopshoe.com', '00', '13434490', 'NCB', '2020-12-13 18:00:00'),
(10, '84', '111', 338000, 'Thanh toán hóa đơn mua hàng tại shopshoe.com', '00', '13434494', 'NCB', '2020-12-13 18:00:00'),
(11, '85', '29', 1624000, 'Thanh toán hóa đơn mua hàng tại shopshoe.com', '00', '13434496', 'NCB', '2020-12-13 18:00:00');

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
(78, 'UltraBoost 20 - Core Black', 'ultraboost-20-core-black-1607072668', -3, 608000, 0, 'ADIDAS - UltraBoost 20 - Core BlackADIDAS - UltraBoost 20 - Core BlackADIDAS - UltraBoost 20 - Core Black', '<p>ADIDAS - UltraBoost 20 - Core BlackADIDAS - UltraBoost 20 - Core BlackADIDAS - UltraBoost 20 - Core BlackADIDAS - UltraBoost 20 - Core Black</p>', '[\"oLQEyymiKhZ9EWg01607072666.jpg\",\"sTnVP2ngbxCoWCyJ1607072667.jpg\",\"SXASEG2ZkBuAMSDA1607072668.jpg\"]', 132, 5, NULL, NULL, '2020-12-05 08:07:27', '2020-12-05 08:07:27'),
(79, 'X PLR - Black Core White', 'x-plr-black-core-white-1607072734', -3, 544000, 0, 'ADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core White', '<p>ADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core WhiteADIDAS - X PLR - Black Core White</p>', '[\"huhlk1X2r64rNmy11607072733.jpg\",\"wQ9vz8gpCIEb0iBc1607072733.jpg\",\"lbDdApQKAI6x1EHs1607072734.jpg\"]', 132, 5, NULL, NULL, '2020-12-04 09:05:34', '2020-12-04 09:05:34'),
(80, 'UltraBoost 20 - Ash pearl', 'ultraboost-20-ash-pearl-1607073350', 1, 608000, 0, 'ADIDAS- UltraBoost 20 - Ash pearlADIDAS- UltraBoost 20 - Ash pearlADIDAS- UltraBoost 20 - Ash pearl', '<p>ADIDAS- UltraBoost 20 - Ash pearlADIDAS- UltraBoost 20 - Ash pearlADIDAS- UltraBoost 20 - Ash pearlADIDAS- UltraBoost 20 - Ash pearl</p>', '[\"SmOTURJLBxTchiyA1607073348.jpg\",\"NRGggpsLiyumhUPR1607073349.jpg\",\"LhvmtY7MfOGIXccG1607073349.jpg\"]', 132, 5, NULL, NULL, '2020-12-04 09:15:50', '2020-12-04 09:15:50'),
(81, 'X PLR - White core black', 'x-plr-white-core-black-1607073276', 1, 544000, 0, 'filenamefilenamefilenamefilenamefilenamefilenamefilename', '<p>filenamefilenamefilenamefilenamefilenamefilenamefilenamefilename</p>', '[\"b3Nr86IYYPDc9ROA1607073274.jpg\",\"xXiHXD3xBT93sZlH1607073275.jpg\",\"l7NEGzEqyNuGyKWt1607073276.jpg\"]', 132, 5, NULL, NULL, '2020-12-04 09:14:36', '2020-12-04 09:14:36'),
(82, 'Alphabounce Instinct M - Black Pink', 'alphabounce-instinct-m-black-pink-1607073366', 1, 784000, 5, 'ADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black Pink', '<p>ADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black PinkADIDAS-Alphabounce Instinct M - Black Pink</p>', '[\"IntyfWlrovrDKhq81607073364.jpg\",\"MvZwrC9BvcQUJyBn1607073365.jpg\",\"ukXu4nJTnYsHiEUp1607073365.jpg\"]', 132, 5, NULL, NULL, '2020-12-04 09:16:06', '2020-12-04 09:16:06'),
(83, 'AlphabounceBeyond - Violet', 'alphabouncebeyond-violet-1607073584', 1, 704000, 10, 'ADIDAS-AlphabounceBeyond - Violet- Giá 704,000ADIDAS-AlphabounceBeyond - Violet- Giá 704,000ADIDAS-AlphabounceBeyond - Violet- Giá 704,000', '<p>ADIDAS-AlphabounceBeyond - Violet- Gi&aacute; 704,000ADIDAS-AlphabounceBeyond - Violet- Gi&aacute; 704,000ADIDAS-AlphabounceBeyond - Violet- Gi&aacute; 704,000</p>', '[\"teHBsCN89BnnxJcq1607073582.jpg\",\"UEQDeXa2TFUGPK651607073583.jpg\",\"uOpROhrM0p7tJFxy1607073583.jpg\"]', 132, 5, NULL, NULL, '2020-12-04 09:19:44', '2020-12-04 09:19:44'),
(84, 'EQT ADV - White Core Black', 'eqt-adv-white-core-black-1607073622', 1, 624000, 10, 'ADIDAS-EQT ADV - White Core Black -Giá 624,000ADIDAS-EQT ADV - White Core Black -Giá 624,000ADIDAS-EQT ADV - White Core Black -Giá 624,000ADIDAS-EQT ADV - White Core Black -Giá 624,000', '<p>ADIDAS-EQT ADV - White Core Black -Gi&aacute; 624,000ADIDAS-EQT ADV - White Core Black -Gi&aacute; 624,000ADIDAS-EQT ADV - White Core Black -Gi&aacute; 624,000ADIDAS-EQT ADV - White Core Black -Gi&aacute; 624,000ADIDAS-EQT ADV - White Core Black -Gi&aacute; 624,000</p>', '[\"Y6FFyeHlxChIDSoH1607073620.jpg\",\"67IQQOZkN7oExNoa1607073620.jpg\",\"NWjnSeHtAYadFLTB1607073621.jpg\"]', 132, 5, NULL, NULL, '2020-12-04 09:20:22', '2020-12-04 09:20:22'),
(85, 'Stan Smith Rep - Black', 'stan-smith-rep-black-1607073658', 1, 544000, 5, 'ADIDAS-Stan Smith Rep - Black - Giá 544,000ADIDAS-Stan Smith Rep - Black - Giá 544,000ADIDAS-Stan Smith Rep - Black - Giá 544,000ADIDAS-Stan Smith Rep - Black - Giá 544,000', '<p>ADIDAS-Stan Smith Rep - Black - Gi&aacute; 544,000ADIDAS-Stan Smith Rep - Black - Gi&aacute; 544,000ADIDAS-Stan Smith Rep - Black - Gi&aacute; 544,000ADIDAS-Stan Smith Rep - Black - Gi&aacute; 544,000</p>', '[\"IAcOnR39dFTx61rw1607073656.jpg\",\"v5ZcGl4Xx2lYUIff1607073656.jpg\",\"DxtUslcIyujawFpL1607073657.jpg\"]', 132, 5, NULL, NULL, '2020-12-04 09:20:58', '2020-12-04 09:20:58'),
(86, 'Yeezy 350 V2 - Yecheil', 'yeezy-350-v2-yecheil-1607073691', 1, 704000, 5, 'ADIDAS-Yeezy 350 V2 - Yecheil-Giá 704,000ADIDAS-Yeezy 350 V2 - Yecheil-Giá 704,000ADIDAS-Yeezy 350 V2 - Yecheil-Giá 704,000', '<p>ADIDAS-Yeezy 350 V2 - Yecheil-Gi&aacute; 704,000ADIDAS-Yeezy 350 V2 - Yecheil-Gi&aacute; 704,000ADIDAS-Yeezy 350 V2 - Yecheil-Gi&aacute; 704,000ADIDAS-Yeezy 350 V2 - Yecheil-Gi&aacute; 704,000</p>', '[\"JjkdsDOChhQoSeLZ1607073689.jpg\",\"T5NVAJxgVfGNr5uP1607073690.jpg\",\"tchL5cdpVAq8yiGH1607073691.jpg\"]', 132, 5, NULL, NULL, '2020-12-04 09:21:31', '2020-12-04 09:21:31'),
(87, 'Triple S Rep - Black Grey', 'triple-s-rep-black-grey-1607073734', 1, 1475000, 5, 'Balenciaga Triple S Rep - Black Grey- Giá 1,147,500Balenciaga Triple S Rep - Black Grey- Giá 1,147,500Balenciaga Triple S Rep - Black Grey- Giá 1,147,500Balenciaga Triple S Rep - Black Grey- Giá 1,147,500', '<p>Balenciaga Triple S Rep - Black Grey- Gi&aacute; 1,147,500Balenciaga Triple S Rep - Black Grey- Gi&aacute; 1,147,500Balenciaga Triple S Rep - Black Grey- Gi&aacute; 1,147,500Balenciaga Triple S Rep - Black Grey- Gi&aacute; 1,147,500Balenciaga Triple S Rep - Black Grey- Gi&aacute; 1,147,500</p>', '[\"h6LmHHuF1yDCZEPl1607073734.jpg\",\"mTAE5awfecgrK5nI1607073734.jpg\",\"Aw4UJ4tv1DuW72UD1607073734.jpg\"]', 132, 6, NULL, NULL, '2020-12-04 09:22:14', '2020-12-04 09:22:14'),
(88, 'Triple S Rep - Grey', 'triple-s-rep-grey-1607073750', 1, 1147000, 0, 'balenciaga triple S Rep - Grey- Giá 1,147,000balenciaga triple S Rep - Grey- Giá 1,147,000balenciaga triple S Rep - Grey- Giá 1,147,000balenciaga triple S Rep - Grey- Giá 1,147,000', '<p>balenciaga triple S Rep - Grey- Gi&aacute; 1,147,000balenciaga triple S Rep - Grey- Gi&aacute; 1,147,000balenciaga triple S Rep - Grey- Gi&aacute; 1,147,000balenciaga triple S Rep - Grey- Gi&aacute; 1,147,000</p>', '[\"eWpJ39MDUm8aMz2j1607073750.jpg\",\"d8wl4QeCYEJf2r771607073750.jpg\",\"2DQAKlSCo5YxuWpi1607073750.jpg\"]', 132, 6, NULL, NULL, '2020-12-04 09:22:30', '2020-12-04 09:22:30'),
(89, 'Triple S Rep - Pink Grey', 'triple-s-rep-pink-grey-1607073829', 1, 1147500, 0, 'Balenciaga Triple S Rep - Pink Grey -Giá 1,147,500Balenciaga Triple S Rep - Pink Grey -Giá 1,147,500Balenciaga Triple S Rep - Pink Grey -Giá 1,147,500', '<p>Balenciaga Triple S Rep - Pink Grey -Gi&aacute; 1,147,500Balenciaga Triple S Rep - Pink Grey -Gi&aacute; 1,147,500Balenciaga Triple S Rep - Pink Grey -Gi&aacute; 1,147,500Balenciaga Triple S Rep - Pink Grey -Gi&aacute; 1,147,500</p>', '[\"fNPlIGIeKUElyRYZ1607073829.jpg\",\"4TW0Z8Un11HoFSlq1607073829.jpg\",\"yLykFvjUU1CVZXwH1607073829.jpg\"]', 132, 6, NULL, NULL, '2020-12-04 09:23:49', '2020-12-04 09:23:49'),
(90, 'Triple S Rep - Pink Orange', 'triple-s-rep-pink-orange-1607073840', 1, 1147000, 5, 'Balenciaga Triple S Rep - Pink Orange-Giá 1,147,000Balenciaga Triple S Rep - Pink Orange-Giá 1,147,000Balenciaga Triple S Rep - Pink Orange-Giá 1,147,000', '<p>Balenciaga Triple S Rep - Pink Orange-Gi&aacute; 1,147,000Balenciaga Triple S Rep - Pink Orange-Gi&aacute; 1,147,000Balenciaga Triple S Rep - Pink Orange-Gi&aacute; 1,147,000Balenciaga Triple S Rep - Pink Orange-Gi&aacute; 1,147,000</p>', '[\"tr9wGQMX9hkqAj4l1607073840.jpg\",\"t9FUl0WRypTlGvBu1607073840.jpg\",\"KpiWbUe5xSMfaugg1607073840.jpg\"]', 132, 6, NULL, NULL, '2020-12-04 09:24:00', '2020-12-04 09:24:00'),
(91, 'Triple S Rep - White Core Red', 'triple-s-rep-white-core-red-1607073860', 1, 1500000, 6, 'Balenciaga Triple S Rep - White Core Red - Giá 1,147,500Balenciaga Triple S Rep - White Core Red - Giá 1,147,500Balenciaga Triple S Rep - White Core Red - Giá 1,147,500', '<p>Balenciaga Triple S Rep - White Core Red - Gi&aacute; 1,147,500Balenciaga Triple S Rep - White Core Red - Gi&aacute; 1,147,500Balenciaga Triple S Rep - White Core Red - Gi&aacute; 1,147,500</p>', '[\"v4cQUWQE8OvdfeS31607073860.jpg\",\"ckv4L03WuJ3Ixue01607073860.jpg\",\"EBTpAR9FzaK66X201607073860.jpg\"]', 132, 6, NULL, NULL, '2020-12-04 09:24:20', '2020-12-04 09:24:20'),
(92, 'Triple S Rep - White Pink', 'triple-s-rep-white-pink-1607073881', 1, 1147000, 0, 'Balenciaga Triple S Rep - White Pink- Giá 1,147,000Balenciaga Triple S Rep - White Pink- Giá 1,147,000Balenciaga Triple S Rep - White Pink- Giá 1,147,000', '<p>Balenciaga Triple S Rep - White Pink- Gi&aacute; 1,147,000Balenciaga Triple S Rep - White Pink- Gi&aacute; 1,147,000Balenciaga Triple S Rep - White Pink- Gi&aacute; 1,147,000Balenciaga Triple S Rep - White Pink- Gi&aacute; 1,147,000</p>', '[\"SErtsoW5eHuUs5Sz1607073881.jpg\",\"7ENtM4ZmNMHwTrW81607073881.jpg\",\"F1GL21QIMuxBcoZ81607073881.jpg\"]', 132, 6, NULL, NULL, '2020-12-04 09:24:41', '2020-12-04 09:24:41'),
(93, 'Triple S Rep - Yellow Green', 'triple-s-rep-yellow-green-1607073895', 1, 1147000, 0, 'balenciaga triple S Rep - Yellow Green-Giá 1,147,000balenciaga triple S Rep - Yellow Green-Giá 1,147,000balenciaga triple S Rep - Yellow Green-Giá 1,147,000balenciaga triple S Rep - Yellow Green-Giá 1,147,000', '<p>balenciaga triple S Rep - Yellow Green-Gi&aacute; 1,147,000balenciaga triple S Rep - Yellow Green-Gi&aacute; 1,147,000balenciaga triple S Rep - Yellow Green-Gi&aacute; 1,147,000balenciaga triple S Rep - Yellow Green-Gi&aacute; 1,147,000</p>', '[\"2KD43FYoFMRfIUpT1607073895.jpg\",\"Py1EMdrDo4MOY8yO1607073895.jpg\",\"gTJrSD8YaYG8ScJM1607073895.jpg\"]', 132, 6, NULL, NULL, '2020-12-04 09:24:55', '2020-12-04 09:24:55'),
(94, 'Triple S Rep 11 - All Black', 'triple-s-rep-11-all-black-1607073929', 1, 1317000, 0, 'Balenciaga Triple S Rep 11 - All Black-Giá 1,317,000Balenciaga Triple S Rep 11 - All Black-Giá 1,317,000Balenciaga Triple S Rep 11 - All Black-Giá 1,317,000Balenciaga Triple S Rep 11 - All Black-Giá 1,317,000', '<p>Balenciaga Triple S Rep 11 - All Black-Gi&aacute; 1,317,000Balenciaga Triple S Rep 11 - All Black-Gi&aacute; 1,317,000Balenciaga Triple S Rep 11 - All Black-Gi&aacute; 1,317,000Balenciaga Triple S Rep 11 - All Black-Gi&aacute; 1,317,000</p>', '[\"jWvPHisj1YDzUeit1607073929.jpg\",\"toWJMdbNPb73vN1K1607073929.jpg\",\"iIbJjCfzIUMYnK7q1607073929.jpg\"]', 132, 6, NULL, NULL, '2020-12-04 09:25:29', '2020-12-04 09:25:29'),
(95, 'Chunky MLP Rep _ NY Silver', 'chunky-mlp-rep-ny-silver-1607073947', 1, 353637, 0, 'Chunky MLP Rep _ NY Silver size 35,36,37Chunky MLP Rep _ NY Silver size 35,36,37Chunky MLP Rep _ NY Silver size 35,36,37', '<p>Chunky MLP Rep _ NY Silver size 35,36,37Chunky MLP Rep _ NY Silver size 35,36,37Chunky MLP Rep _ NY Silver size 35,36,37Chunky MLP Rep _ NY Silver size 35,36,37</p>', '[\"0hoTAQMdCzfnvHdt1607073945.jpg\",\"CDAajcC2t4LBEBXd1607073945.jpg\",\"g98k6MteVT9UvBXA1607073946.jpg\"]', 132, 6, NULL, NULL, '2020-12-04 09:25:47', '2020-12-04 09:25:47'),
(96, 'Chuck Taylor 1970s Hi - Paranoise', 'chuck-taylor-1970s-hi-paranoise-1607073956', 1, 544000, 0, 'CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Giá 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Giá 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Giá 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Giá 544,000', '<p>CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Gi&aacute; 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Gi&aacute; 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Gi&aacute; 544,000CONVERSE- Chuck Taylor 1970s Hi - Paranoise - Gi&aacute; 544,000</p>', '[\"hRMTaYX5p3D9wRvK1607073954.jpg\",\"ZU0APLOuNzdkRNlh1607073955.jpg\",\"iA9JxhE4VNlgBL2i1607073956.jpg\"]', 132, 7, NULL, NULL, '2020-12-04 09:25:56', '2020-12-04 09:25:56'),
(97, 'Chuck Taylor 1970s Hi - Cream', 'chuck-taylor-1970s-hi-cream-1607073967', 1, 456000, 5, '- Giá 456,000- Giá 456,000- Giá 456,000- Giá 456,000- Giá 456,000- Giá 456,000', '<p>- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000- Gi&aacute; 456,000</p>', '[\"6JU0beYy4hDVrv6o1607073965.jpg\",\"2Z2xjvEwSL9X3VCw1607073965.jpg\",\"O5u3PhFVtPpqr4441607073966.jpg\"]', 132, 7, NULL, NULL, '2020-12-04 09:26:07', '2020-12-04 09:26:07'),
(98, 'Chuck Taylor 1970s Hi - White', 'chuck-taylor-1970s-hi-white-1607073982', 1, 456000, 0, 'Chuck Taylor 1970s Hi - White-Giá 456,000Chuck Taylor 1970s Hi - White-Giá 456,000Chuck Taylor 1970s Hi - White-Giá 456,000', '<p>Chuck Taylor 1970s Hi - White-Gi&aacute; 456,000Chuck Taylor 1970s Hi - White-Gi&aacute; 456,000Chuck Taylor 1970s Hi - White-Gi&aacute; 456,000Chuck Taylor 1970s Hi - White-Gi&aacute; 456,000Chuck Taylor 1970s Hi - White-Gi&aacute; 456,000</p>', '[\"nfW9Njwqm93YlTdm1607073982.jpg\",\"UeDU4ySdkGEUuYUf1607073982.jpg\",\"DmYNh7T2SeEUgDdO1607073982.jpg\"]', 132, 7, NULL, NULL, '2020-12-04 09:26:22', '2020-12-04 09:26:22'),
(99, 'Chuck Taylor 1970s Hi - Yellow', 'chuck-taylor-1970s-hi-yellow-1607073990', 1, 456000, 0, 'Chuck Taylor 1970s Hi - Yellow-Giá 456,000Chuck Taylor 1970s Hi - Yellow-Giá 456,000Chuck Taylor 1970s Hi - Yellow-Giá 456,000Chuck Taylor 1970s Hi - Yellow-Giá 456,000', '<p>Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000Chuck Taylor 1970s Hi - Yellow-Gi&aacute; 456,000</p>', '[\"aWz800VRMqA7AsIW1607073990.jpg\",\"8W2qetSgVSphXcO91607073990.jpg\",\"ZLp5ZG2xc3UHnvlD1607073990.jpg\"]', 132, 7, NULL, NULL, '2020-12-04 09:26:30', '2020-12-04 09:26:30'),
(100, 'Chuck Taylor 1970s Low - Trace Green', 'chuck-taylor-1970s-low-trace-green-1607074001', 1, 416000, 0, 'Chuck Taylor 1970s Low - Trace Green - giá 416,000Chuck Taylor 1970s Low - Trace Green - giá 416,000Chuck Taylor 1970s Low - Trace Green - giá 416,000', '<p>Chuck Taylor 1970s Low - Trace Green - gi&aacute; 416,000Chuck Taylor 1970s Low - Trace Green - gi&aacute; 416,000Chuck Taylor 1970s Low - Trace Green - gi&aacute; 416,000Chuck Taylor 1970s Low - Trace Green - gi&aacute; 416,000Chuck Taylor 1970s Low - Trace Green - gi&aacute; 416,000</p>', '[\"d6cLxIkUnOX6yt0a1607074001.jpg\",\"lb8xJ7O7Q0v1t5Z21607074001.jpg\",\"pGkpddZSDeZzmsh41607074001.jpg\"]', 132, 7, NULL, NULL, '2020-12-04 09:26:41', '2020-12-04 09:26:41'),
(101, 'Chuck Taylor 1970s PLAY Hi - White', 'chuck-taylor-1970s-play-hi-white-1607074015', 1, 472000, 0, 'Chuck Taylor 1970s PLAY Hi - White-Giá 472,000Chuck Taylor 1970s PLAY Hi - White-Giá 472,000Chuck Taylor 1970s PLAY Hi - White-Giá 472,000Chuck Taylor 1970s PLAY Hi - White-Giá 472,000Chuck Taylor 1970s PLAY Hi - White-Giá 472,000', '<p>Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000Chuck Taylor 1970s PLAY Hi - White-Gi&aacute; 472,000</p>', '[\"P0uxMHIx6kZxDrUJ1607074015.jpg\",\"L8PVqT5IfhjrY8lt1607074015.jpg\",\"UgjAVUNWtmx4Ozuy1607074015.jpg\"]', 132, 7, NULL, NULL, '2020-12-04 09:26:55', '2020-12-04 09:26:55'),
(102, 'Chuck Taylor 1970s PLAY Low - Black', 'chuck-taylor-1970s-play-low-black-1607074022', 1, 440000, 0, 'Chuck Taylor 1970s PLAY Low - Black-Giá 440,000Chuck Taylor 1970s PLAY Low - Black-Giá 440,000Chuck Taylor 1970s PLAY Low - Black-Giá 440,000', '<p>Chuck Taylor 1970s PLAY Low - Black-Gi&aacute; 440,000Chuck Taylor 1970s PLAY Low - Black-Gi&aacute; 440,000Chuck Taylor 1970s PLAY Low - Black-Gi&aacute; 440,000Chuck Taylor 1970s PLAY Low - Black-Gi&aacute; 440,000</p>', '[\"FeUrf2rdps82WV481607074022.jpg\",\"eT8PvppXrQYwkLE11607074022.jpg\",\"PG8xYRztVh9H3kOq1607074022.jpg\"]', 132, 7, NULL, NULL, '2020-12-04 09:27:02', '2020-12-04 09:27:02'),
(104, 'Jordan 1 - Bred', 'jordan-1-bred-1607074040', 1, 624000, 0, 'Jordan 1 - Bred - Giá 624,000Jordan 1 - Bred - Giá 624,000Jordan 1 - Bred - Giá 624,000Jordan 1 - Bred - Giá 624,000', '<p>Jordan 1 - Bred - Gi&aacute; 624,000Jordan 1 - Bred - Gi&aacute; 624,000Jordan 1 - Bred - Gi&aacute; 624,000Jordan 1 - Bred - Gi&aacute; 624,000</p>', '[\"hLRtvGQ4EAKMACzJ1607074037.jpg\",\"6VP5di7pgxZLMqpW1607074038.jpg\",\"p6fOaZtD5cWZoQqp1607074039.jpg\"]', 132, 8, NULL, NULL, '2020-12-04 09:27:20', '2020-12-04 09:27:20'),
(105, 'Jordan 1 Low - Core black', 'jordan-1-low-core-black-1607074237', 0, 624000, 0, 'Jordan 1 Low - Core black - Giá 624,00Jordan 1 Low - Core black - Giá 624,00Jordan 1 Low - Core black - Giá 624,00Jordan 1 Low - Core black - Giá 624,00Jordan 1 Low - Core black - Giá 624,00', '<p>Jordan 1 Low - Core black - Gi&aacute; 624,00Jordan 1 Low - Core black - Gi&aacute; 624,00Jordan 1 Low - Core black - Gi&aacute; 624,00Jordan 1 Low - Core black - Gi&aacute; 624,00</p>', '[\"B4NDI1ZfS1r51L8y1607074235.jpg\",\"U9Vut53QD8UqswxS1607074236.jpg\",\"OkWqKhAYR4sPHKSb1607074236.jpg\"]', 132, 8, NULL, NULL, '2020-12-04 09:30:37', '2020-12-04 09:30:37'),
(106, 'Jordan 1 Low - Cream', 'jordan-1-low-cream-1607074539', 1, 624000, 0, 'Jordan 1 Low - Cream - Giá 624,000Jordan 1 Low - Cream - Giá 624,000Jordan 1 Low - Cream - Giá 624,000Jordan 1 Low - Cream - Giá 624,000Jordan 1 Low - Cream - Giá 624,000', '<p>Jordan 1 Low - Cream - Gi&aacute; 624,000Jordan 1 Low - Cream - Gi&aacute; 624,000Jordan 1 Low - Cream - Gi&aacute; 624,000Jordan 1 Low - Cream - Gi&aacute; 624,000</p>', '[\"rnDuFySm8V7N5g0u1607074537.jpg\",\"hDfK0nBnwGhRK6OK1607074538.jpg\",\"6Kg94mO1UfPY27mo1607074539.jpg\"]', 132, 8, NULL, NULL, '2020-12-04 09:35:39', '2020-12-04 09:35:39'),
(107, 'Jordan 1 Low - Multicolor', 'jordan-1-low-multicolor-1607076416', 1, 624000, 0, 'Jordan 1 Low - Multicolor- giá 624,000Jordan 1 Low - Multicolor- giá 624,000Jordan 1 Low - Multicolor- giá 624,000Jordan 1 Low - Multicolor- giá 624,000', '<p>Jordan 1 Low - Multicolor- gi&aacute; 624,000Jordan 1 Low - Multicolor- gi&aacute; 624,000Jordan 1 Low - Multicolor- gi&aacute; 624,000Jordan 1 Low - Multicolor- gi&aacute; 624,000Jordan 1 Low - Multicolor- gi&aacute; 624,000</p>', '[\"k67JzbXDRAVWbvYX1607076411.jpg\",\"Jlie9vB00Bsocuad1607076413.jpg\",\"dfDI4KPaWn2ikLF51607076414.jpg\"]', 132, 8, NULL, NULL, '2020-12-04 10:06:56', '2020-12-04 10:06:56'),
(108, 'Jordan 1 Low - White Core Navy', 'jordan-1-low-white-core-navy-1607076508', -2, 624000, 0, 'Jordan 1 Low - White Core Navy- Giá 624,000Jordan 1 Low - White Core Navy- Giá 624,000Jordan 1 Low - White Core Navy- Giá 624,000Jordan 1 Low - White Core Navy- Giá 624,000', '<p>Jordan 1 Low - White Core Navy- Gi&aacute; 624,000Jordan 1 Low - White Core Navy- Gi&aacute; 624,000Jordan 1 Low - White Core Navy- Gi&aacute; 624,000Jordan 1 Low - White Core Navy- Gi&aacute; 624,000</p>', '[\"673bOP0ntMwZk7OL1607076505.jpg\",\"kwlZ29OjfmSwQJsJ1607076506.jpg\",\"gCXENVl9U2iVkj9T1607076507.jpg\"]', 132, 8, NULL, NULL, '2020-12-12 07:41:10', '2020-12-12 07:41:10'),
(109, 'Jordan 1 Low - White Core Red', 'jordan-1-low-white-core-red-1607076518', 1, 624000, 0, 'Jordan 1 Low - White Core Red-Giá 624,000Jordan 1 Low - White Core Red-Giá 624,000Jordan 1 Low - White Core Red-Giá 624,000Jordan 1 Low - White Core Red-Giá 624,000', '<p>Jordan 1 Low - White Core Red-Gi&aacute; 624,000Jordan 1 Low - White Core Red-Gi&aacute; 624,000Jordan 1 Low - White Core Red-Gi&aacute; 624,000Jordan 1 Low - White Core Red-Gi&aacute; 624,000</p>', '[\"tEGUruTRnXx8hvpU1607076514.jpg\",\"NFEuYEPJZdEA1Tkc1607076515.jpg\",\"TVz9VJHOrc763ClC1607076517.jpg\"]', 132, 8, NULL, NULL, '2020-12-04 10:08:38', '2020-12-04 10:08:38'),
(110, 'Nike Jordan 1 - Galaxy Blue', 'nike-jordan-1-galaxy-blue-1607076525', 1, 1624000, 0, 'Nike Jordan 1 - Galaxy Blue - Giá 624,000Nike Jordan 1 - Galaxy Blue - Giá 624,000Nike Jordan 1 - Galaxy Blue - Giá 624,000Nike Jordan 1 - Galaxy Blue - Giá 624,000', '<p>Nike Jordan 1 - Galaxy Blue - Gi&aacute; 624,000Nike Jordan 1 - Galaxy Blue - Gi&aacute; 624,000Nike Jordan 1 - Galaxy Blue - Gi&aacute; 624,000</p>', '[\"sPJDGuSV92DSXRJQ1607076522.jpg\",\"d9IM2zycshuujYxo1607076523.jpg\",\"wdfutpZL6jMazN491607076524.jpg\"]', 132, 8, NULL, 2, '2020-12-05 06:21:08', '2020-12-05 06:21:08'),
(111, 'NB80 - Be Nâu', 'nb80-be-nau-1607076545', 1, 330000, 0, 'NB80 - Be Nâu- Giá 330,000NB80 - Be Nâu- Giá 330,000NB80 - Be Nâu- Giá 330,000NB80 - Be Nâu- Giá 330,000', '<p>NB80 - Be N&acirc;u- Gi&aacute; 330,000NB80 - Be N&acirc;u- Gi&aacute; 330,000NB80 - Be N&acirc;u- Gi&aacute; 330,000NB80 - Be N&acirc;u- Gi&aacute; 330,000</p>', '[\"8ahiSXKayDoMY33i1607076543.jpg\",\"NgAXc3TeARap6Lzq1607076544.jpg\",\"lxrBlI4AaZt8Ekrp1607076545.jpg\"]', 133, 9, NULL, NULL, '2020-12-04 10:09:05', '2020-12-04 10:09:05'),
(112, 'NB80 - Đen', 'nb80-den-1607076555', 1, 330000, 0, 'NB80 - Đen- Giá 330,000NB80 - Đen- Giá 330,000NB80 - Đen- Giá 330,000NB80 - Đen- Giá 330,000NB80 - Đen- Giá 330,000', '<p>NB80 - Đen- Gi&aacute; 330,000NB80 - Đen- Gi&aacute; 330,000NB80 - Đen- Gi&aacute; 330,000NB80 - Đen- Gi&aacute; 330,000NB80 - Đen- Gi&aacute; 330,000NB80 - Đen- Gi&aacute; 330,000</p>', '[\"gys4Tsrx1oKL8kzP1607076553.jpg\",\"PrIsEr98V8VRaHEV1607076554.jpg\",\"6xLfzNGzhBNH20Wm1607076554.jpg\"]', 133, 9, NULL, NULL, '2020-12-04 10:09:15', '2020-12-04 10:09:15'),
(113, 'NB80 - Xanh Nhạt', 'nb80-xanh-nhat-1607076564', 1, 330000, 0, 'NB80 - Xanh Nhạt- Giá 330,000NB80 - Xanh Nhạt- Giá 330,000NB80 - Xanh Nhạt- Giá 330,000NB80 - Xanh Nhạt- Giá 330,000', '<p>NB80 - Xanh Nhạt- Gi&aacute; 330,000NB80 - Xanh Nhạt- Gi&aacute; 330,000NB80 - Xanh Nhạt- Gi&aacute; 330,000NB80 - Xanh Nhạt- Gi&aacute; 330,000NB80 - Xanh Nhạt- Gi&aacute; 330,000</p>', '[\"FWolazD6W4V1aQ681607076562.jpg\",\"fVYoinrsFWVNSfAO1607076563.jpg\",\"FUun507dImL4J2vb1607076564.jpg\"]', 133, 9, NULL, NULL, '2020-12-04 10:09:24', '2020-12-04 10:09:24'),
(114, 'NB81 - Nâu Xanh', 'nb81-nau-xanh-1607076576', 1, 300000, 0, 'NB81 - Nâu Xanh- Giá 300.000NB81 - Nâu Xanh- Giá 300.000NB81 - Nâu Xanh- Giá 300.000NB81 - Nâu Xanh- Giá 300.000NB81 - Nâu Xanh- Giá 300.000', '<p>NB81 - N&acirc;u Xanh- Gi&aacute; 300.000NB81 - N&acirc;u Xanh- Gi&aacute; 300.000NB81 - N&acirc;u Xanh- Gi&aacute; 300.000NB81 - N&acirc;u Xanh- Gi&aacute; 300.000NB81 - N&acirc;u Xanh- Gi&aacute; 300.000NB81 - N&acirc;u Xanh- Gi&aacute; 300.000</p>', '[\"KAY7BoA5tHbIlaSA1607076574.jpg\",\"DZKgv1TFvr7sW1291607076574.jpg\",\"VSYZbh4qT3dnTZMy1607076575.jpg\"]', 133, 9, NULL, NULL, '2020-12-04 10:09:36', '2020-12-04 10:09:36'),
(115, 'NB81 - Xanh Hồng', 'nb81-xanh-hong-1607076604', 1, 300000, 0, 'NB81 - Xanh Hồng- Giá 300,000NB81 - Xanh Hồng- Giá 300,000NB81 - Xanh Hồng- Giá 300,000NB81 - Xanh Hồng- Giá 300,000', '<p>NB81 - Xanh Hồng- Gi&aacute; 300,000NB81 - Xanh Hồng- Gi&aacute; 300,000NB81 - Xanh Hồng- Gi&aacute; 300,000NB81 - Xanh Hồng- Gi&aacute; 300,000</p>', '[\"dMg6tUGiSnwVUj1d1607076602.jpg\",\"TbhSM8xHBjSW8JZS1607076603.jpg\",\"CZ1m8okBZB8rRdpP1607076603.jpg\"]', 133, 9, NULL, NULL, '2020-12-04 10:10:04', '2020-12-04 10:10:04'),
(116, 'SD-9801 - Ghi', 'sd-9801-ghi-1607076615', 1, 260000, 0, 'SD-9801 - Ghi-Giá 260,000SD-9801 - Ghi-Giá 260,000SD-9801 - Ghi-Giá 260,000SD-9801 - Ghi-Giá 260,000SD-9801 - Ghi-Giá 260,000', '<p>SD-9801 - Ghi-Gi&aacute; 260,000SD-9801 - Ghi-Gi&aacute; 260,000SD-9801 - Ghi-Gi&aacute; 260,000SD-9801 - Ghi-Gi&aacute; 260,000SD-9801 - Ghi-Gi&aacute; 260,000</p>', '[\"7lBHnPxNZ7cvWZgR1607076613.jpg\",\"5yOwDlmFfJdmlRXl1607076614.jpg\",\"lL3FvatTcsaDNw8N1607076615.jpg\"]', 133, 9, NULL, NULL, '2020-12-04 10:10:15', '2020-12-04 10:10:15'),
(117, 'SD-NB59 - Full Black', 'sd-nb59-full-black-1607076627', -3, 338000, 0, 'SD-NB59 - Full Black -Giá 338,000SD-NB59 - Full Black -Giá 338,000SD-NB59 - Full Black -Giá 338,000SD-NB59 - Full Black -Giá 338,000', '<p>SD-NB59 - Full Black -Gi&aacute; 338,000SD-NB59 - Full Black -Gi&aacute; 338,000SD-NB59 - Full Black -Gi&aacute; 338,000SD-NB59 - Full Black -Gi&aacute; 338,000SD-NB59 - Full Black -Gi&aacute; 338,000SD-NB59 - Full Black -Gi&aacute; 338,000</p>', '[\"0VhLhNwtHgVwg8Zb1607076625.jpg\",\"npo4yAlpgaoEKwxV1607076625.jpg\",\"ceDUIdh3wORiMaSt1607076626.jpg\"]', 133, 9, NULL, NULL, '2020-12-04 10:10:27', '2020-12-04 10:10:27'),
(118, 'MARVEL ALL OVER PRINT NAM, NỮ', 'marvel-all-over-print-nam-nu-1607076650', 1, 552000, 0, 'MARVEL ALL OVER PRINT NAM, NỮ-Giá 552,000MARVEL ALL OVER PRINT NAM, NỮ-Giá 552,000MARVEL ALL OVER PRINT NAM, NỮ-Giá 552,000', '<p>MARVEL ALL OVER PRINT NAM, NỮ-Gi&aacute; 552,000MARVEL ALL OVER PRINT NAM, NỮ-Gi&aacute; 552,000MARVEL ALL OVER PRINT NAM, NỮ-Gi&aacute; 552,000MARVEL ALL OVER PRINT NAM, NỮ-Gi&aacute; 552,000</p>', '[\"E45sIgzeDj30xgyk1607076650.jpg\"]', 134, 10, NULL, NULL, '2020-12-04 10:10:50', '2020-12-04 10:10:50'),
(119, 'MARVEL TRẮNG ĐEN NAM, NỮ', 'marvel-trang-den-nam-nu-1607076658', 1, 595000, 0, 'MARVEL TRẮNG ĐEN NAM, NỮ-Giá 595,000MARVEL TRẮNG ĐEN NAM, NỮ-Giá 595,000MARVEL TRẮNG ĐEN NAM, NỮ-Giá 595,000', '<p>MARVEL TRẮNG ĐEN NAM, NỮ-Gi&aacute; 595,000MARVEL TRẮNG ĐEN NAM, NỮ-Gi&aacute; 595,000MARVEL TRẮNG ĐEN NAM, NỮ-Gi&aacute; 595,000MARVEL TRẮNG ĐEN NAM, NỮ-Gi&aacute; 595,000</p>', '[\"ZIZmoCEwcPpcta0g1607076658.jpg\"]', 134, 10, NULL, NULL, '2020-12-04 10:10:58', '2020-12-04 10:10:58'),
(120, 'OLD SKOOL - Black', 'old-skool-black-1607076668', 1, 360000, 0, 'OLD SKOOL - Black - Giá 360,000OLD SKOOL - Black - Giá 360,000OLD SKOOL - Black - Giá 360,000OLD SKOOL - Black - Giá 360,000', '<p>OLD SKOOL - Black - Gi&aacute; 360,000OLD SKOOL - Black - Gi&aacute; 360,000OLD SKOOL - Black - Gi&aacute; 360,000OLD SKOOL - Black - Gi&aacute; 360,000</p>', '[\"JhFO9BSMzpjFUNZZ1607076668.jpg\",\"gJs54sZZEeCAC4XI1607076668.jpg\",\"hE2AJO0imhEc49Pk1607076668.jpg\"]', 134, 10, NULL, NULL, '2020-12-04 10:11:08', '2020-12-04 10:11:08'),
(121, 'Old Skool REP 1;1 -REd Stripe', 'old-skool-rep-11-red-stripe-1607076677', 1, 408000, 0, 'Old Skool REP 1;1 -REd Stripe -giá 408,000Old Skool REP 1;1 -REd Stripe -giá 408,000Old Skool REP 1;1 -REd Stripe -giá 408,000Old Skool REP 1;1 -REd Stripe -giá 408,000', '<p>Old Skool REP 1;1 -REd Stripe -gi&aacute; 408,000Old Skool REP 1;1 -REd Stripe -gi&aacute; 408,000Old Skool REP 1;1 -REd Stripe -gi&aacute; 408,000Old Skool REP 1;1 -REd Stripe -gi&aacute; 408,000</p>', '[\"bn7yBOnA3vkCPp1C1607076676.jpg\",\"UCRTI6jIMqAWGMF31607076676.jpg\",\"i9iUp1pG6jALsO7p1607076676.jpg\"]', 134, 10, NULL, NULL, '2020-12-04 10:11:17', '2020-12-04 10:11:17'),
(122, 'Old Skool REP 11 - Black Stripe', 'old-skool-rep-11-black-stripe-1607076684', 1, 408000, 0, 'Old Skool REP 11 - Black Stripe - Giá 408,000Old Skool REP 11 - Black Stripe - Giá 408,000Old Skool REP 11 - Black Stripe - Giá 408,000Old Skool REP 11 - Black Stripe - Giá 408,000', '<p>Old Skool REP 11 - Black Stripe - Gi&aacute; 408,000Old Skool REP 11 - Black Stripe - Gi&aacute; 408,000Old Skool REP 11 - Black Stripe - Gi&aacute; 408,000Old Skool REP 11 - Black Stripe - Gi&aacute; 408,000Old Skool REP 11 - Black Stripe - Gi&aacute; 408,000</p>', '[\"9s20iZyGI998jntv1607076683.jpg\",\"5GpxoOdgaiVKRIiU1607076684.jpg\",\"grnn0NmKy4Z5lArW1607076684.jpg\"]', 134, 10, NULL, NULL, '2020-12-04 10:11:24', '2020-12-04 10:11:24'),
(123, 'SLIP ON HULK REPLICA NAM, NỮ', 'slip-on-hulk-replica-nam-nu-1607076691', 1, 425000, 0, 'SLIP ON HULK REPLICA NAM, NỮ-Giá 425,000SLIP ON HULK REPLICA NAM, NỮ-Giá 425,000SLIP ON HULK REPLICA NAM, NỮ-Giá 425,000SLIP ON HULK REPLICA NAM, NỮ-Giá 425,000', '<p>SLIP ON HULK REPLICA NAM, NỮ-Gi&aacute; 425,000SLIP ON HULK REPLICA NAM, NỮ-Gi&aacute; 425,000SLIP ON HULK REPLICA NAM, NỮ-Gi&aacute; 425,000SLIP ON HULK REPLICA NAM, NỮ-Gi&aacute; 425,000</p>', '[\"X285snvgVzESOj6x1607076691.jpg\"]', 134, 10, NULL, NULL, '2020-12-04 10:11:31', '2020-12-04 10:11:31'),
(127, 'ADIDAS giay the thao', 'adidas-giay-the-thao-1607155893', 1, 624, 5, 'DạASSSSSSHDHJDJXVCDSFAKSFADSVDSA VSAFSJF', '<p>Q&Ecirc;WGCSXACDSCHNFDBVSDFBVFB</p>', '[\"2M5m7yKI2gONAkDg1607155893.jpeg\"]', 132, 5, NULL, NULL, '2020-12-13 12:24:53', '2020-12-13 12:24:53');

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
(69, 78, 1, -3),
(70, 79, 1, -3),
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
(95, 104, 1, 1),
(96, 105, 1, 0),
(97, 106, 1, 1),
(98, 107, 1, 1),
(99, 108, 1, -2),
(100, 109, 1, 1),
(101, 110, 1, 1),
(102, 111, 1, 1),
(103, 112, 1, 1),
(104, 113, 1, 1),
(105, 114, 1, 1),
(106, 115, 1, 1),
(107, 116, 1, 1),
(108, 117, 1, -3),
(109, 118, 1, 1),
(110, 119, 1, 1),
(111, 120, 1, 1),
(112, 121, 1, 1),
(113, 122, 2, 1),
(114, 123, 1, 1),
(122, 127, 1, 1);

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

--
-- Đang đổ dữ liệu cho bảng `transaction`
--

INSERT INTO `transaction` (`id_transaction`, `totalPrice`, `tax`, `discount`, `id_pay`, `id_user`, `status`, `created_at`, `updated_at`) VALUES
(65, 2067200, 434112, 0, 1, 1, -1, '2020-12-01 16:14:59', '2020-12-01 16:14:59'),
(66, 608000, 127680, 0, 1, 1, -1, '2020-12-02 12:10:27', '2020-12-02 12:10:27'),
(67, 624000, 131040, 0, 1, 1, 1, '2020-12-02 12:11:07', '2020-12-02 14:40:25'),
(68, 1872000, 393120, 0, 1, 1, 1, '2020-12-02 12:19:39', '2020-12-12 07:41:17'),
(69, 1216000, 255360, 0, 1, 1, 1, '2020-12-02 12:20:58', '2020-12-02 14:49:50'),
(70, 2176000, 456960, 0, 1, 1, 1, '2020-12-02 12:24:15', '2020-12-02 14:42:53'),
(71, 2440000, 512400, 0, 1, 25, 1, '2020-12-02 14:41:31', '2020-12-02 14:43:04'),
(72, 3648000, 766080, 0, 1, 28, 1, '2020-12-05 08:06:09', '2020-12-05 08:07:31'),
(73, 1186, 249, 0, 1, 29, -1, '2020-12-12 07:51:19', '2020-12-12 07:51:19'),
(74, 353637, 74264, 0, 1, 29, -1, '2020-12-12 10:12:49', '2020-12-12 10:12:49'),
(75, 544000, 114240, 0, 2, 29, -1, '2020-12-12 10:19:35', '2020-12-12 10:19:35'),
(76, 300000, 63000, 0, 2, 29, -1, '2020-12-12 10:21:48', '2020-12-12 10:21:48'),
(77, 593, 124, 0, 2, 29, -1, '2020-12-12 10:29:22', '2020-12-12 10:29:22'),
(78, 338000, 70980, 0, 2, 29, -1, '2020-12-12 10:32:36', '2020-12-12 10:32:36'),
(79, 593, 124, 0, 2, 29, -1, '2020-12-12 10:35:25', '2020-12-12 10:35:25'),
(80, 260000, 54600, 0, 2, 29, 1, '2020-12-12 10:36:05', '2020-12-12 10:36:05'),
(81, 593, 124, 0, 2, 29, 1, '2020-12-12 12:43:50', '2020-12-13 12:24:58'),
(82, 1624000, 341040, 0, 2, 29, 1, '2020-12-12 12:44:45', '2020-12-12 12:44:45'),
(83, 300000, 63000, 0, 2, 29, 1, '2020-12-13 11:15:24', '2020-12-13 11:15:24'),
(84, 338000, 70980, 0, 2, 29, 1, '2020-12-13 11:24:34', '2020-12-13 11:24:34'),
(85, 1624000, 341040, 0, 2, 29, 1, '2020-12-13 11:46:22', '2020-12-13 11:46:22');

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

--
-- Đang đổ dữ liệu cho bảng `transaction_detail`
--

INSERT INTO `transaction_detail` (`id_transaction_dt`, `id_product`, `qty`, `size`, `totalproduct`, `id_transaction`, `updated_at`, `createad_at`) VALUES
(63, 85, 4, 2, 2067200, 65, '2020-12-01 16:14:59', '2020-12-01 16:14:59'),
(64, 80, 1, 2, 608000, 66, '2020-12-02 12:10:27', '2020-12-02 12:10:27'),
(65, 105, 1, 1, 624000, 67, '2020-12-02 12:11:07', '2020-12-02 12:11:07'),
(66, 108, 3, 1, 1872000, 68, '2020-12-02 12:19:40', '2020-12-02 12:19:40'),
(67, 78, 2, 1, 1216000, 69, '2020-12-02 12:20:58', '2020-12-02 12:20:58'),
(68, 79, 4, 1, 2176000, 70, '2020-12-02 12:24:15', '2020-12-02 12:24:15'),
(69, 117, 4, 1, 1352000, 71, '2020-12-02 14:41:31', '2020-12-02 14:41:31'),
(70, 81, 2, 1, 1088000, 71, '2020-12-02 14:41:31', '2020-12-02 14:41:31'),
(71, 78, 2, 1, 1216000, 72, '2020-12-05 08:06:09', '2020-12-05 08:06:09'),
(72, 80, 4, 2, 2432000, 72, '2020-12-05 08:06:09', '2020-12-05 08:06:09'),
(73, 127, 2, 1, 1186, 73, '2020-12-12 07:51:19', '2020-12-12 07:51:19'),
(74, 95, 1, 1, 353637, 74, '2020-12-12 10:12:49', '2020-12-12 10:12:49'),
(75, 79, 1, 1, 544000, 75, '2020-12-12 10:19:35', '2020-12-12 10:19:35'),
(76, 115, 1, 1, 300000, 76, '2020-12-12 10:21:48', '2020-12-12 10:21:48'),
(77, 127, 1, 1, 593, 77, '2020-12-12 10:29:22', '2020-12-12 10:29:22'),
(78, 117, 1, 1, 338000, 78, '2020-12-12 10:32:36', '2020-12-12 10:32:36'),
(79, 127, 1, 1, 593, 79, '2020-12-12 10:35:25', '2020-12-12 10:35:25'),
(80, 116, 1, 1, 260000, 80, '2020-12-12 10:36:05', '2020-12-12 10:36:05'),
(81, 127, 1, 1, 593, 81, '2020-12-12 12:43:50', '2020-12-12 12:43:50'),
(82, 110, 1, 1, 1624000, 82, '2020-12-12 12:44:45', '2020-12-12 12:44:45'),
(83, 115, 1, 1, 300000, 83, '2020-12-13 11:15:24', '2020-12-13 11:15:24'),
(84, 117, 1, 1, 338000, 84, '2020-12-13 11:24:34', '2020-12-13 11:24:34'),
(85, 110, 1, 1, 1624000, 85, '2020-12-13 11:46:22', '2020-12-13 11:46:22');

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
  `remember_token` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `address` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_level` int(11) NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `orders` int(11) DEFAULT NULL,
  `active` tinyint(1) NOT NULL,
  `email_code` varchar(255) COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `fullname`, `email`, `password`, `remember_token`, `address`, `phone`, `id_level`, `avatar`, `orders`, `active`, `email_code`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'Lê Trung Thịnh', 'trungthinh2610@gmail.com', '$2y$10$T55DJ.yLIivULAfN8bt4qekWJTIPXuye32G.bxvsKCWvH8Rq39s6S', 'L13MDZdSwQG8hy6fwhjgyMG3TiIhFzyaRHs8WPVmpXDRm9tiprJdthDwR2h3', 'Thôn Thi Thại, xã Duy Thành, huyện Duy Xuyên, tỉnh Quảng Nam', '0336751070', 1, 'admin-1607152373.jpg', 1, 1, '', '2020-02-14 05:51:07', '2020-12-05 07:12:53'),
(5, 'user001', 'Tôi là user001', 'user001@gmail.com', '$2y$10$/y/MHgFjwTDhXSbPAYND4ejOrJXZADCK6n.EnOL8hXtiPyHouM63O', NULL, 'ABCD', '123123', 3, NULL, 13, 1, '', '2020-02-20 13:53:07', '2020-02-20 13:53:07'),
(6, 'user002', 'User 002', 'user002@gmail.com', '$2y$10$TVGgoLXt7D.fKs.gN.31EOT6BGUq5XuAlmu/y1Cz6y3.ogq40pA2m', NULL, 'abc', '12313', 3, '', 5, 1, '', '2020-02-19 03:55:39', '2020-02-19 03:55:39'),
(8, 'user003', 'Tôi là user003', 'lynguyen.pna@gmail.com', '$2y$10$BJ3AxseCgliexDAK8r9b1OHf9Gy8.PNy0D3DcmtVCiVlZ1G3JFmty', NULL, 'ẤCDSA', '123132', 3, 'etr0Bo5KWKIo7cUNUgYn6fllBM0NWt1F8iJ8E8Mk.jpeg', 7, 1, '', '2020-02-20 13:53:33', '2020-03-10 20:57:26'),
(9, 'user004', 'Tôi là user004', 'user004@gmail.com', '$2y$10$XWHs5F7WOMn7KvhFrSQwi.hcVZsUujiZ.IafMXkr2VHPYLNytsWP6', NULL, 'ádasdasdasdsa', '123132', 3, NULL, 7, 1, '', '2020-02-20 13:54:18', '2020-02-20 13:54:18'),
(19, 'vanchieu77', 'Đào Văn Chiểu', 'daovanchieu77@gmail.com', '$2y$10$yAuKpnTklU3kNbQMwQTJme5L8lGOpMVftXCbJen580t2I1VmaPaQ6', NULL, 'avc', '123123123', 3, NULL, 0, 1, '158391233515e68958fa3691', '2020-03-11 00:38:55', '2020-03-11 00:39:15'),
(28, 'user2020', 'Lê Trung Thịnh', 'lilken2610@gmail.com', '$2y$10$4OSkxyngt.7FcVQAcg2JU.3H1MDIVYMOUBK6wQHmysq24phgvdSd6', NULL, 'duy thanh', '0336751070', 3, 'user2020-1607155137.jpg', NULL, 1, '', '2020-12-05 07:57:10', '2020-12-05 08:00:50'),
(29, 'chauquangtam', 'Châu Quang Tâm', 'chauquangtam2000@gmail.com', '$2y$10$b2cp.LzzGD2Jb5Dq9MbepOtxkrE9xXkeAg97w435SJQQ1LMIREpfq', NULL, '286 Trần Cao Vân - Phường Tam Thuận -  Quận Thanh Khê - Đà Nẵng', '0377898307', 1, NULL, NULL, 1, '', '2020-12-12 04:35:00', '2020-12-12 04:35:17');

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
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id_brand` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=136;

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
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT cho bảng `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id_transaction_dt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
