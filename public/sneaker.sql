-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 20, 2020 lúc 07:18 AM
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
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id_cat` int(11) NOT NULL,
  `name_cat` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id_cat`, `name_cat`, `parent_id`, `status`, `created_at`, `updated_at`) VALUES
(107, 'Giày Nam', 0, 1, '2020-02-21 12:42:11', '2020-02-21 05:42:11'),
(108, 'Giày Nữ', 0, 0, '2020-02-17 15:25:03', '2020-02-17 08:25:03'),
(109, 'Classic', 107, 1, '2020-02-08 14:08:36', '2020-02-08 07:08:36'),
(111, 'Sunbaked', 107, 1, '2020-02-14 10:45:32', '2020-02-14 10:45:32'),
(112, 'One Star', 107, 1, '2020-02-14 10:45:48', '2020-02-14 10:45:48'),
(113, 'Chuck 07S', 107, 1, '2020-02-14 10:46:08', '2020-02-14 10:46:08'),
(114, 'Classic', 108, 1, '2020-02-14 10:47:12', '2020-02-14 10:47:12'),
(115, 'Sunbaked', 108, 1, '2020-02-14 10:47:22', '2020-02-14 10:47:22'),
(116, 'One Star', 108, 1, '2020-02-14 10:47:30', '2020-02-14 10:47:30'),
(117, 'Chuck 07S', 108, 1, '2020-02-14 10:47:38', '2020-02-14 10:47:38'),
(118, 'Phụ Kiện Khác', 0, 1, '2020-02-14 10:47:59', '2020-02-14 10:47:59'),
(119, 'Trẻ Em', 0, 1, '2020-02-14 10:48:12', '2020-02-14 10:48:12');

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
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `sale` int(11) NOT NULL,
  `preview` varchar(255) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `description` text COLLATE utf8mb4_vietnamese_ci DEFAULT NULL,
  `images` text COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `id_cat` int(11) NOT NULL,
  `hot_pay` int(11) DEFAULT NULL,
  `pro_rating` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id_product`, `name_product`, `qty`, `price`, `sale`, `preview`, `description`, `images`, `id_cat`, `hot_pay`, `pro_rating`, `created_at`, `updated_at`) VALUES
(52, 'Giày converse 1', 14, 100000, 0, 'Giày converse classic 2020 đẹp', NULL, '[\"vNuXgkRTITUqB3abutHvG3rm90eQfi9lRfWck3y9.jpeg\"]', 109, 0, NULL, '2020-02-28 02:39:51', '2020-02-12 01:33:01'),
(54, 'Giày converse 3', 24, 100000, 0, 'lo4ewqeeeeeeeeeeeeeeeeeeeeeeeeeeeeeeee', NULL, '[\"neO9e4kdsf673qry361JbwhP7KJL88XR3dyKjFqz.jpeg\",\"TbXjJSsASgZ3dtVXvaq2gILLjHzsl43LlHV9c81S.jpeg\"]', 109, 0, NULL, '2020-02-28 02:39:58', '2020-02-12 01:37:44'),
(55, 'Chuck Taylor Classic', 30, 900000, 5, 'Giày Chuck Taylor Classic', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"IqbZ7ouSAkJ6jPtomPKguSShBS1bg5d0EoTY0rlk.jpeg\",\"FMfibeGmMQ98cjWwo6afSk5EzIxqwnv6HotIVmxW.jpeg\"]', 109, 0, 4, '2020-02-27 06:38:46', '2020-02-26 23:38:46'),
(57, 'Chuck Taylor Classic 3', 27, 124000, 0, 'Giày Chuck Taylor Classic 3', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"Jko8Ka6t94Q6JdhumUn0Su2nio7GsMG7leGkR5i6.jpeg\",\"FEABJkBdMisovaqFx5Y5qpQCPTXHRnUJO432RoB3.jpeg\"]', 109, 0, NULL, '2020-02-20 16:03:41', '2020-02-14 03:53:26'),
(58, 'One Star Chuck', 27, 120000, 5, 'Giày one star chuck 2020', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"sJR9XLWjVveSLQ9NF8ZvmQABAneznLL5MXE7USmg.jpeg\",\"CO8Ud4Dj0vJNbIdrO7xC8IuSUZekN1wQN2d9nZtn.jpeg\",\"cveAP8hnxGygh5h5NCWpnKksViJB0Pmn9SIVYVkU.jpeg\"]', 112, 4, 3, '2020-02-27 06:44:48', '2020-02-26 23:44:48'),
(59, 'One Star Chuck 2', 26, 200000, 0, 'Giày one star chuck 2020', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"gP5hpxZxtDm2zYB3vvCNVuoS2sQT3zaoloZS3ieU.jpeg\",\"TwT3sNpwWYwU6GCNORMgrLkKnJ4Btxysbo3O0ILZ.jpeg\",\"y46MWR0xZDfTH9qOusQIjGTGMPlT0hYjbJZd9M2C.jpeg\"]', 112, 0, NULL, '2020-02-20 16:03:41', '2020-02-14 03:57:24'),
(60, 'One Star Chuck 3', 28, 300000, 5, 'Giày one star chuck 2020', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"JWLB3slR8kaNjxhFLIKv8SAmvWFI7fu4ZqbzdHmM.jpeg\",\"8FmbBKaS74AIFKzuPurpNLyfCA98PwdkDDgaw7Xt.jpeg\",\"5lkzyW0LqZynzMGaFC5drHRFb1rtgzHci62CS8QM.jpeg\"]', 112, 1, NULL, '2020-02-21 13:52:56', '2020-02-14 20:52:30'),
(61, 'Converse Sunbaked', 29, 1230000, 20, 'Giày converse sunbaked 2020', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"pmmoRpwdbSIQTDaOA4rLg3hoJL9CiALeBFEl9wsM.jpeg\"]', 111, 0, NULL, '2020-03-11 06:38:00', '2020-03-10 23:38:00'),
(62, 'Converse Sunbaked 2', 23, 2300000, 15, 'Giày converse sunbaked 2020', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"yjJrUReLIVM2EKhces5sM7LmkFRSogb2AZaVAT0K.jpeg\",\"y8k9TcOeps5L8eI1Virax53uY1lnlGDlEiSGHKN3.jpeg\",\"pfPPmQfqBnAahrBaXOsyTzhyh1reGOcWkIOEM8Ia.jpeg\"]', 111, 0, NULL, '2020-02-24 09:52:14', '2020-02-24 02:52:14'),
(63, 'Converse  Chuck 07s', 8, 240000, 10, 'Giày converse chuck 07s 2020', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"pVlwoiIxFvFLEVcwcztfAql2Y3mvITFp1Lrl7tRk.jpeg\",\"YSxAD5zxcVfhWtANi4muECBEAVulWqb9pHMnL9i8.jpeg\",\"30SH4HTbSTzTZBfxIIuEjUHsjbliGef7xDdNWFpj.jpeg\"]', 113, 2, NULL, '2020-02-22 10:00:07', '2020-02-22 03:00:07'),
(64, 'Converse Chuck07S', 20, 150000, 5, 'Giày converse chuck 07s 2020', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"vwNmpOoO0XazQHTQ2zZNWr35nAPLWLMuIZ47zla5.jpeg\",\"3Hdv7ehMwq3gmBdfuDCI87LFL9cbw69YKk0fxNu1.jpeg\",\"PffXjnDuiuoEmRQe1IEUWln2DDH30Yy9qI3kCcgs.jpeg\"]', 113, 2, 3, '2020-02-28 02:31:10', '2020-02-27 19:31:10'),
(65, 'Classic 001', 20, 1240000, 12, 'Giày classic converse Nữ 2020', '<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using &#39;Content here, content here&#39;, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for &#39;lorem ipsum&#39; will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '[\"TowzpQJBm9uulLnj3DJCGvJowmEftBtpOQumvj9g.jpeg\",\"fqgYp404VU8S5obcLblb2eLNahiGWOnp5l03junR.jpeg\",\"Zwss9vZVN93JtE5sPgvVioyVizghsxZAM1rxKTsm.jpeg\"]', 114, 5, NULL, '2020-02-21 13:52:56', '2020-02-14 09:30:37'),
(66, 'Quần jogger 2020', 22, 200000, 5, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</blockquote>', '[\"Ik3PzDBV7VRPhciqx6P5FCxGnmgp7sw3PWiLPLxm.jpeg\"]', 118, 7, NULL, '2020-02-21 13:52:56', '2020-02-14 21:10:28'),
(67, 'Balo VIP 2020 siêu đẹp', 10, 200000, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</blockquote>', '[\"0EOhhYFFuFanSDoGYkOBl5wugX2ApYs2tje5cooh.jpeg\",\"pbaM3s16B2IU9SF4uwmwKc8xEtRq19mNOidE3efb.jpeg\"]', 118, 0, 5, '2020-02-27 06:47:07', '2020-02-26 23:47:07'),
(68, 'Balo VIP 2020 đẹp', 10, 100000, 0, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</blockquote>\r\n\r\n<div class=\"ddict_btn\" style=\"top: 30px; left: 807.636px;\"><img src=\"chrome-extension://bpggmmljdiliancllaapiggllnkbjocb/icon/16.png\" /></div>', '[\"kOXNC3IQWLmjMSJ5taWHAzCeS3T1Z1nK76Rvl1q5.jpeg\"]', 118, 0, NULL, '2020-02-20 16:03:41', '2020-02-14 21:18:51'),
(69, 'Balo đẹp 1 2020 VIP', 9, 20000, 10, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', '<blockquote>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</blockquote>', '[\"djyQV3ttwXId42ib0F8dqVnxP4uc3WczlAL2wylT.jpeg\",\"OiMVuXAYTLyG1hvFz2QrjJubXlZnpukD5VScHq5x.jpeg\",\"5LQ1q6DolYuHDc0FETiVKov2ZfBatesbm4Ys5ihJ.jpeg\"]', 118, 3, NULL, '2020-02-22 10:04:53', '2020-02-22 03:04:53');

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
(55, 69, 1, 9);

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
(3, 'Giày converse classic 2', 'right', 'Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử Converse 100 năm, và đang không ngừng phát triển lớn mạnh.', 'oN50xHkvVFvtaFWLv2iTcC7KSy9sSiDIXVZDlzew.jpeg'),
(4, 'Gifl code 001', 'left', 'Chào mừng bạn đến với ngôi nhà Converse! Tại đây, mỗi một dòng chữ, mỗi chi tiết và hình ảnh đều là những bằng chứng mang dấu ấn lịch sử Converse 100 năm, và đang không ngừng phát triển lớn mạnh.', 'T0E7xVgYdCn1utybpwLl1W9EPtGA4e3ecsBgfnLa.jpeg');

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
(31, 440640, 8640, 0, 0, 9, 1, '2019-07-20 20:45:03', '2020-02-22 03:00:07'),
(32, 36720, 720, 0, 0, 5, 1, '2019-07-20 20:48:48', '2020-02-20 20:48:48'),
(33, 290700, 5700, 0, 0, 5, 1, '2019-07-31 20:49:02', '2020-02-20 20:49:02'),
(34, 387600, 7600, 0, 0, 5, 1, '2019-08-01 17:00:00', '2020-02-20 20:49:13'),
(35, 2226048, 43648, 0, 0, 5, 1, '2019-08-14 20:49:24', '2020-02-20 20:49:24'),
(36, 348840, 6840, 0, 0, 6, 1, '2019-08-20 20:50:47', '2020-02-20 20:50:47'),
(37, 290700, 5700, 0, 0, 6, 1, '2019-09-13 20:50:57', '2020-02-20 20:50:57'),
(38, 387600, 7600, 0, 0, 6, 1, '2019-09-20 20:51:07', '2020-02-20 20:51:07'),
(39, 36720, 720, 0, 0, 6, 1, '2019-10-01 20:51:30', '2020-02-20 20:51:30'),
(40, 1345584, 26384, 0, 0, 6, 1, '2019-10-14 20:51:45', '2020-02-20 20:51:45'),
(41, 581400, 11400, 0, 0, 8, 1, '2019-11-20 20:52:39', '2020-02-20 20:52:39'),
(42, 387600, 7600, 0, 0, 8, 1, '2019-11-22 20:52:47', '2020-02-20 20:52:47'),
(43, 2226048, 43648, 0, 0, 8, 1, '2020-01-01 20:52:57', '2020-02-20 20:52:57'),
(44, 660960, 12960, 0, 0, 8, 1, '2020-01-11 17:00:00', '2020-02-20 20:53:06'),
(45, 405960, 7960, 0, 0, 8, 1, '2020-01-14 20:53:26', '2020-02-22 03:04:53'),
(46, 387600, 7600, 0, 0, 9, 1, '2020-01-20 20:53:50', '2020-02-20 20:53:50'),
(47, 2226048, 43648, 0, 0, 9, 1, '2020-02-02 20:54:00', '2020-02-20 20:54:00'),
(48, 387600, 7600, 0, 0, 9, 1, '2020-02-04 20:54:07', '2020-02-20 20:54:07'),
(49, 232560, 4560, 0, 0, 9, 1, '2020-02-06 20:54:16', '2020-02-20 20:54:16'),
(50, 2226048, 43648, 0, 0, 9, 1, '2020-02-14 17:00:00', '2020-02-20 20:54:27'),
(51, 193800, 3800, 0, 0, 9, 1, '2020-02-20 20:54:37', '2020-02-20 20:54:37'),
(52, 1113024, 21824, 0, 0, 3, -1, '2020-02-23 01:30:52', '2020-02-23 01:30:52'),
(53, 1744200, 34200, 0, 0, 5, -1, '2020-02-23 19:59:32', '2020-02-23 19:59:32'),
(54, 110466, 2166, 0, 0, 5, -1, '2020-02-23 22:43:07', '2020-02-23 22:43:07'),
(55, 290700, 5700, 0, 0, 5, -1, '2020-02-23 22:57:04', '2020-02-23 22:57:04'),
(56, 0, 0, 0, 1, 5, -1, '2020-02-23 23:12:35', '2020-02-23 23:12:35'),
(57, 984000, 19680, 0, 1, 5, -1, '2020-02-23 23:15:01', '2020-02-23 23:15:01'),
(58, 984000, 19680, 0, 1, 5, -1, '2020-02-23 23:15:01', '2020-02-23 23:15:01'),
(59, 1955000, 37145, 97750, 1, 5, -1, '2020-02-23 23:15:37', '2020-02-23 23:15:37'),
(60, 432000, 8640, 0, 2, 5, -1, '2020-02-23 23:39:42', '2020-02-23 23:39:42'),
(61, 1091200, 20733, 54560, 2, 5, -1, '2020-02-23 23:41:33', '2020-02-23 23:41:33'),
(62, 1955000, 37145, 97750, 1, 8, 1, '2020-02-24 02:28:28', '2020-02-24 02:52:14'),
(63, 984000, 18696, 49200, 2, 8, 1, '2020-02-24 02:29:23', '2020-03-10 23:38:04');

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
(27, 63, 2, 2, 432000, 31, '2020-02-21 03:45:03', '2020-02-21 03:45:03'),
(28, 69, 2, 1, 36000, 32, '2020-02-21 03:48:48', '2020-02-21 03:48:48'),
(29, 64, 2, 4, 285000, 33, '2020-02-21 03:49:03', '2020-02-21 03:49:03'),
(30, 66, 2, 2, 380000, 34, '2020-02-21 03:49:14', '2020-02-21 03:49:14'),
(31, 65, 2, 1, 2182400, 35, '2020-02-21 03:49:24', '2020-02-21 03:49:24'),
(32, 58, 1, 3, 114000, 36, '2020-02-21 03:50:47', '2020-02-21 03:50:47'),
(33, 58, 2, 1, 228000, 36, '2020-02-21 03:50:47', '2020-02-21 03:50:47'),
(34, 64, 2, 5, 285000, 37, '2020-02-21 03:50:57', '2020-02-21 03:50:57'),
(35, 66, 2, 1, 380000, 38, '2020-02-21 03:51:07', '2020-02-21 03:51:07'),
(36, 69, 2, 1, 36000, 39, '2020-02-21 03:51:30', '2020-02-21 03:51:30'),
(37, 65, 1, 1, 1091200, 40, '2020-02-21 03:51:46', '2020-02-21 03:51:46'),
(38, 58, 2, 1, 228000, 40, '2020-02-21 03:51:46', '2020-02-21 03:51:46'),
(39, 60, 2, 4, 570000, 41, '2020-02-21 03:52:39', '2020-02-21 03:52:39'),
(40, 66, 2, 2, 380000, 42, '2020-02-21 03:52:47', '2020-02-21 03:52:47'),
(41, 65, 2, 2, 2182400, 43, '2020-02-21 03:52:57', '2020-02-21 03:52:57'),
(42, 63, 3, 2, 648000, 44, '2020-02-21 03:53:07', '2020-02-21 03:53:07'),
(43, 69, 1, 1, 18000, 45, '2020-02-21 03:53:26', '2020-02-21 03:53:26'),
(44, 66, 2, 1, 380000, 45, '2020-02-21 03:53:26', '2020-02-21 03:53:26'),
(45, 66, 2, 2, 380000, 46, '2020-02-21 03:53:50', '2020-02-21 03:53:50'),
(46, 65, 2, 2, 2182400, 47, '2020-02-21 03:54:00', '2020-02-21 03:54:00'),
(47, 66, 2, 1, 380000, 48, '2020-02-21 03:54:08', '2020-02-21 03:54:08'),
(48, 58, 2, 1, 228000, 49, '2020-02-21 03:54:16', '2020-02-21 03:54:16'),
(49, 65, 2, 1, 2182400, 50, '2020-02-21 03:54:27', '2020-02-21 03:54:27'),
(50, 66, 1, 2, 190000, 51, '2020-02-21 03:54:37', '2020-02-21 03:54:37'),
(51, 65, 1, 1, 1091200, 52, '2020-02-23 08:30:52', '2020-02-23 08:30:52'),
(52, 55, 2, 1, 1710000, 53, '2020-02-24 02:59:32', '2020-02-24 02:59:32'),
(53, 58, 1, 1, 114000, 54, '2020-02-24 05:43:08', '2020-02-24 05:43:08'),
(54, 60, 1, 4, 285000, 55, '2020-02-24 05:57:04', '2020-02-24 05:57:04'),
(55, 61, 1, 2, 984000, 57, '2020-02-24 06:15:01', '2020-02-24 06:15:01'),
(56, 61, 1, 2, 984000, 58, '2020-02-24 06:15:01', '2020-02-24 06:15:01'),
(57, 62, 1, 1, 1955000, 59, '2020-02-24 06:15:37', '2020-02-24 06:15:37'),
(58, 63, 2, 2, 432000, 60, '2020-02-24 06:39:42', '2020-02-24 06:39:42'),
(59, 65, 1, 2, 1091200, 61, '2020-02-24 06:41:33', '2020-02-24 06:41:33'),
(60, 62, 1, 2, 1955000, 62, '2020-02-24 09:28:28', '2020-02-24 09:28:28'),
(61, 61, 1, 2, 984000, 63, '2020-02-24 09:29:23', '2020-02-24 09:29:23');

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
(3, 'admin', 'Tôi là admin', 'climax@gmail.com', '$2y$10$yfyx8uT0Tp6t2SbyP2lOJ.28jkj.Ha0RUSrC0GH1N5UWxZwUwenV6', 'adc', '01236', 1, '1hPEnVR0CmRPqfpGcquxSrIeTHq57SXfQyrO1ihY.jpeg', 1, 1, '', '2020-02-14 05:51:07', '2020-02-20 05:15:34'),
(5, 'user001', 'Tôi là user001', 'user001@gmail.com', '$2y$10$/y/MHgFjwTDhXSbPAYND4ejOrJXZADCK6n.EnOL8hXtiPyHouM63O', 'ABCD', '123123', 3, NULL, 13, 1, '', '2020-02-20 13:53:07', '2020-02-20 13:53:07'),
(6, 'user002', 'User 002', 'user002@gmail.com', '$2y$10$TVGgoLXt7D.fKs.gN.31EOT6BGUq5XuAlmu/y1Cz6y3.ogq40pA2m', 'abc', '12313', 3, '', 5, 1, '', '2020-02-19 03:55:39', '2020-02-19 03:55:39'),
(8, 'user003', 'Tôi là user003', 'lynguyen.pna@gmail.com', '$2y$10$BJ3AxseCgliexDAK8r9b1OHf9Gy8.PNy0D3DcmtVCiVlZ1G3JFmty', 'ẤCDSA', '123132', 3, 'etr0Bo5KWKIo7cUNUgYn6fllBM0NWt1F8iJ8E8Mk.jpeg', 7, 1, '', '2020-02-20 13:53:33', '2020-03-10 20:57:26'),
(9, 'user004', 'Tôi là user004', 'user004@gmail.com', '$2y$10$XWHs5F7WOMn7KvhFrSQwi.hcVZsUujiZ.IafMXkr2VHPYLNytsWP6', 'ádasdasdasdsa', '123132', 3, NULL, 7, 1, '', '2020-02-20 13:54:18', '2020-02-20 13:54:18'),
(19, 'vanchieu77', 'Đào Văn Chiểu', 'daovanchieu77@gmail.com', '$2y$10$yAuKpnTklU3kNbQMwQTJme5L8lGOpMVftXCbJen580t2I1VmaPaQ6', 'avc', '123123123', 3, NULL, 0, 1, '158391233515e68958fa3691', '2020-03-11 00:38:55', '2020-03-11 00:39:15'),
(20, 'user2020', 'Lê Trung Thịnh', 'lilken2610@gmail.com', '$2y$10$yfyx8uT0Tp6t2SbyP2lOJ.28jkj.Ha0RUSrC0GH1N5UWxZwUwenV6', 'Duy Thanh', '0336751070', 3, NULL, NULL, 1, '160585247415fb75d3a69480', '2020-11-19 23:07:54', '2020-11-19 23:08:28');

--
-- Chỉ mục cho các bảng đã đổ
--

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
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id_cat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=120;

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
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT cho bảng `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `id_slide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `transaction`
--
ALTER TABLE `transaction`
  MODIFY `id_transaction` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT cho bảng `transaction_detail`
--
ALTER TABLE `transaction_detail`
  MODIFY `id_transaction_dt` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
