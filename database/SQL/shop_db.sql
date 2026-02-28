-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.4:3306
-- Час створення: Лют 28 2026 р., 14:11
-- Версія сервера: 8.4.7
-- Версія PHP: 8.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База даних: `shop_db`
--

-- --------------------------------------------------------

--
-- Структура таблиці `blog`
--

CREATE TABLE `blog` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blog_category_id` int DEFAULT NULL,
  `image_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `short_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_keywords` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `total_view` int NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `blog`
--

INSERT INTO `blog` (`id`, `title`, `slug`, `blog_category_id`, `image_name`, `short_description`, `description`, `meta_title`, `meta_description`, `meta_keywords`, `total_view`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(10, 'Unde veniam numquam', 'Unde veniam numquam', 1, 'e13qey3cdbujqnxowimg.png', 'The standard chunk of Lorem Ipsum uContrary to popular belief,', '<p>The standard chunk of Lorem Ipsum uContrary to popular belief, Lorem Ipsum is not simply random text. It \r\nhas roots in a piece of classical Latin literature from 45 BC, making it\r\n over 2000 years old. Richard McClintock, a Latin professor at \r\nHampden-Sydney College in Virginia, looked up one of the more obscure Lsed since the 1500s is reproduced \r\nbelow for those interested. </p>', 'Eos expedita molest', 'Aut eveniet quia co', 'Eligendi et expedita', 39, 0, 0, '2025-01-20 20:38:04', '2025-01-30 19:18:35'),
(11, 'Laborum Occaecat qu', 'laborum-occaecat-qu', 1, 'hn1y53nxjoybfb7wli8a.png', 'The standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested.', '<p>The standard chunk of Lorem Ipsum used since the 1500s is reproduced \r\nbelow for those interested. Sections 1.10.32 and 1.10.33 from \"de \r\nFinibus Bonorum et Malorum\" by Cicero are also reproduced in their exact\r\n original form, accompanied by English versions from the 1914 \r\ntranslation by H. Rackham.</p>', 'Sit duis dolor enim', 'Quia id repudiandae', 'Quis amet ullam ven', 12, 0, 0, '2025-01-20 20:42:44', '2025-01-30 19:49:37'),
(13, 'Blanditiis ea culpa', 'blanditiis-ea-culpa', 1, 'kghmeaa4wwnelfdsnlmd.png', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.', '<strong>Lorem Ipsum</strong> is simply dummy text of the printing and \r\ntypesetting industry. Lorem Ipsum has been the industry\'s standard dummy\r\n text ever since the 1500s, when an unknown printer took a galley of \r\ntype and scrambled it to make a type specimen book. It has survived not \r\nonly five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.', 'Repudiandae qui face', 'Neque rerum quod ani', 'Dignissimos rerum to', 47, 0, 0, '2025-01-20 21:13:38', '2026-02-28 10:23:19'),
(14, 'Molestiae voluptatem1', 'molestiae-voluptatem', 2, 'alhb6cw4tfszaahreblb.png', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'It is a long established fact that a reader will be distracted by the \r\nreadable content of a page when looking at its layout. The point of \r\nusing Lorem Ipsum is that it has a more-or-less normal distribution of \r\nletters, as opposed to using \'Content here, content here\', making it \r\nlook like readable English. Many desktop publishing packages and web \r\npage editors now use Lorem Ipsum as their default model text, and a \r\nsearch for \'lorem ipsum\' will uncover many web sites still in their \r\ninfancy. Various versions have evolved over the years, sometimes by \r\naccident, sometimes on purpose (injected humour and the like).', 'Minim dignissimos pl', 'Dolore rem sint con', 'Consectetur nemo vo', 95, 0, 0, '2025-01-20 21:26:08', '2025-02-14 17:35:21');

-- --------------------------------------------------------

--
-- Структура таблиці `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_keywords` varchar(1000) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `blog_category`
--

INSERT INTO `blog_category` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Fashion blog11', 'fashion-blog', 'fashion-blog', 'fashion-blog', 'fashion-blog', 0, 0, '2025-01-16 21:07:38', '2025-01-16 23:36:15'),
(2, 'Karina Drake Drake', 'karina-drake-drake', 'Et molestiae sunt se', 'Et duis reprehenderi', 'Et duis reprehenderi', 0, 0, '2025-01-16 21:40:36', '2025-01-18 22:19:20');

-- --------------------------------------------------------

--
-- Структура таблиці `blog_comment`
--

CREATE TABLE `blog_comment` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `blog_id` int DEFAULT NULL,
  `comment` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `blog_comment`
--

INSERT INTO `blog_comment` (`id`, `user_id`, `blog_id`, `comment`, `created_at`, `updated_at`) VALUES
(5, 1, 14, 'Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.', '2025-01-29 19:38:06', '2025-01-29 19:38:06'),
(6, 1, 14, 'Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. Suspendisse potenti.', '2025-01-29 19:39:14', '2025-01-29 19:39:14'),
(7, 1, 14, 'Sed pretium, ligula sollicitudin laoreet viverra, tortor libero sodales leo, eget blandit nunc tortor eu nibh. Nullam mollis. Ut justo. \r\n', '2025-01-30 19:39:14', '2025-01-29 21:12:00');

-- --------------------------------------------------------

--
-- Структура таблиці `brand`
--

CREATE TABLE `brand` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_description` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `brand`
--

INSERT INTO `brand` (`id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'bravomix', 'bravomix', 'bravomix', 'bravomix', 'bravomix', 1, 0, 0, '2024-09-06 14:23:28', '2024-09-06 14:32:35'),
(2, 'fts', 'fts', 'fts', 'fts', 'fts', 1, 0, 0, '2024-09-06 14:32:52', '2025-01-16 22:12:57');

-- --------------------------------------------------------

--
-- Структура таблиці `card_setting`
--

CREATE TABLE `card_setting` (
  `id` int NOT NULL,
  `card_number` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `name_owner` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `surname` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `bank` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `card_setting`
--

INSERT INTO `card_setting` (`id`, `card_number`, `name_owner`, `surname`, `bank`, `created_at`, `updated_at`) VALUES
(1, '177467908234', 'Nayda', 'Carney', 'Монобанк', '2025-02-14 21:03:34', '2025-02-14 21:05:01');

-- --------------------------------------------------------

--
-- Структура таблиці `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `button_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_home` tinyint NOT NULL DEFAULT '0',
  `is_menu` tinyint NOT NULL DEFAULT '0',
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `category`
--

INSERT INTO `category` (`id`, `name`, `slug`, `image_name`, `button_name`, `is_home`, `is_menu`, `meta_title`, `meta_description`, `meta_keywords`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Lifestyle', 'Lifestyle', 'bvs15z1nlzjwjf8xedsp.jpg', '', 1, 1, 'Lifestyle is a great category', 'Lifestyle Lifestyle', 'Lifestyle Lifestyle', 1, 0, 0, '2024-09-03 13:46:19', '2025-02-02 19:00:25'),
(2, 'Tatum Morrow', 'Tatum-Morrow-2', 'mrcgzjzpqprzui4bnzga.jpg', 'its oke4', 1, 1, 'Laborum quia molliti', 'Consectetur proiden', 'Consectetur proiden', 1, 0, 0, '2024-09-04 05:43:07', '2025-02-02 19:00:19'),
(3, 'Shopping', 'Shopping', 'e3zwcvv0lphamdq1p4lm.jpg', 'its okey3', 1, 1, 'Shopping', 'Shopping', 'Shopping', 1, 0, 0, '2024-09-04 07:42:15', '2025-02-02 19:00:13'),
(4, 'Fashion', 'Fashion', 'jidnqeyvd17ing5khyh1.jpg', 'its okey2', 0, 1, 'Fashion', 'Fashion', 'Fashion', 1, 0, 0, '2024-09-04 07:42:37', '2025-02-02 23:07:37'),
(5, 'Myles Allen 23', 'myles-allen-23', 'zabbk9dhb0fnwjdlqdc4.jpg', 'its okey', 0, 0, 'Quae praesentium', 'Quae praes', 'Quae praes', 1, 0, 0, '2024-09-04 13:16:10', '2025-01-16 22:09:26');

-- --------------------------------------------------------

--
-- Структура таблиці `color`
--

CREATE TABLE `color` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `color`
--

INSERT INTO `color` (`id`, `name`, `code`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(6, 'Червоний', '#ff0000', 1, 0, 0, '2024-09-09 08:21:52', '2024-09-09 08:32:07'),
(7, 'Pantone 116C', '#ffcc00', 1, 0, 0, '2024-09-09 08:29:07', '2024-09-09 08:29:07'),
(8, 'Black', '#000000', 1, 0, 0, '2024-09-10 13:41:12', '2024-09-10 13:41:12'),
(9, 'Cyan', '#00e1ff', 1, 0, 0, '2024-09-10 13:41:26', '2024-09-10 13:41:26');

-- --------------------------------------------------------

--
-- Структура таблиці `contact_us`
--

CREATE TABLE `contact_us` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `subject` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `contact_us`
--

INSERT INTO `contact_us` (`id`, `user_id`, `name`, `email`, `phone`, `subject`, `message`, `created_at`, `updated_at`) VALUES
(6, 1, 'Georgia Park', 'vecofucuw@mailinator.com', '+1 (628) 376-3176', 'Enim facere omnis es', 'Voluptate sunt sunt', '2025-01-02 21:47:24', '2025-01-02 21:47:24'),
(7, 1, 'Neve Hudson', 'fivi@mailinator.com', '+1 (873) 645-5916', 'Adipisci nemo blandi', 'Est sunt accusantium', '2025-01-02 21:58:59', '2025-01-02 21:58:59'),
(8, 1, 'Xander Sykes', 'qudijuhag@mailinator.com', '+1 (105) 301-9466', 'Sint sed porro ex t', 'Aut ullamco repellen', '2025-01-02 21:59:24', '2025-01-02 21:59:24'),
(9, 1, 'Hollee Chandler', 'suwij@mailinator.com', '+1 (736) 572-5448', 'Doloribus dolore ull', 'Earum sint minim sun', '2025-01-02 22:18:54', '2025-01-02 22:18:54'),
(13, 1, 'Bianca Ashley', 'locyvucixi@mailinator.com', '+1 (234) 902-7182', 'Animi a sed ut magn', 'Cupidatat exercitati', '2025-02-10 22:16:49', '2025-02-10 22:16:49'),
(14, 1, 'Isadora Wallace', 'xymofoba@mailinator.com', '+1 (479) 632-6841', 'Enim non sed vel tem', 'Ex cupiditate lorem', '2025-02-10 22:20:29', '2025-02-10 22:20:29'),
(15, 1, 'Isadora Wallace', 'xymofoba@mailinator.com', '+1 (479) 632-6841', 'Enim non sed vel tem', 'Ex cupiditate lorem', '2025-02-10 22:32:34', '2025-02-10 22:32:34'),
(16, 1, 'Malcolm Barton', 'zerobi@mailinator.com', '+1 (458) 647-7014', 'Ut quis sapiente ius', 'Vel quod eveniet ma', '2025-02-10 22:34:48', '2025-02-10 22:34:48'),
(17, NULL, 'Athena Lamb', 'lixewytyk@mailinator.com', '+1 (601) 192-7823', 'Enim sed nostrum vol', 'Cillum non dolor con', '2025-02-11 17:30:09', '2025-02-11 17:30:09'),
(18, 1, 'Derek Sweet', 'cufubowedo@mailinator.com', '+1 (732) 579-6742', 'Tenetur corporis qui', 'Vero ut possimus do', '2025-02-13 22:11:56', '2025-02-13 22:11:56'),
(19, 1, 'Gil Lucas', 'medehome@mailinator.com', '+1 (694) 608-9939', 'Laudantium pariatur', 'Amet laboris enim s', '2025-02-13 23:56:26', '2025-02-13 23:56:26'),
(20, 1, 'Gil Lucas', 'medehome@mailinator.com', '+1 (694) 608-9939', 'Laudantium pariatur', 'Amet laboris enim s', '2025-02-14 00:11:42', '2025-02-14 00:11:42'),
(21, 1, 'Gil Lucas', 'medehome@mailinator.com', '+1 (694) 608-9939', 'Laudantium pariatur', 'Amet laboris enim s', '2025-02-14 00:11:56', '2025-02-14 00:11:56'),
(22, 1, 'Gil Lucas', 'medehome@mailinator.com', '+1 (694) 608-9939', 'Laudantium pariatur', 'Amet laboris enim s', '2025-02-14 00:20:42', '2025-02-14 00:20:42'),
(23, 1, 'Ariel Christian', 'wimumyran@mailinator.com', '+1 (491) 471-7851', 'Voluptatem qui eum m', 'Velit fugiat expedit', '2025-02-14 00:21:13', '2025-02-14 00:21:13'),
(24, 1, 'Ariel Christian', 'wimumyran@mailinator.com', '+1 (491) 471-7851', 'Voluptatem qui eum m', 'Velit fugiat expedit', '2025-02-14 00:25:40', '2025-02-14 00:25:40'),
(25, 1, 'Ariel Christian', 'wimumyran@mailinator.com', '+1 (491) 471-7851', 'Voluptatem qui eum m', 'Velit fugiat expedit', '2025-02-14 00:38:17', '2025-02-14 00:38:17'),
(26, 1, 'Blythe Chen', 'paqycog@mailinator.com', '+1 (967) 154-7942', 'Qui placeat eius no', 'Exercitationem nulla', '2025-02-14 00:41:05', '2025-02-14 00:41:05'),
(27, 1, 'Callie Castaneda', 'bypidoco@mailinator.com', '+1 (114) 585-8898', 'Sint architecto recu', 'Recusandae Velit qu', '2025-02-14 00:44:07', '2025-02-14 00:44:07'),
(28, 1, 'Geoffrey Leonard', 'vicyw@mailinator.com', '+1 (124) 631-7666', 'Facilis cupidatat ve', 'Et et anim maiores d', '2025-02-14 00:46:39', '2025-02-14 00:46:39'),
(29, 1, 'Kendall Eaton', 'rahihoc@mailinator.com', '+1 (616) 808-1716', 'Voluptatem sint mini', 'In molestiae nihil s', '2025-02-15 22:09:32', '2025-02-15 22:09:32');

-- --------------------------------------------------------

--
-- Структура таблиці `discount_code`
--

CREATE TABLE `discount_code` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `type` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `percent_amount` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `expire_date` date DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `discount_code`
--

INSERT INTO `discount_code` (`id`, `name`, `type`, `percent_amount`, `expire_date`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(13, 'november_rain', 'Процент', '10', '2025-01-10', 0, 0, '2024-11-05 06:46:07', '2025-01-06 00:58:40');

-- --------------------------------------------------------

--
-- Структура таблиці `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `home_setting`
--

CREATE TABLE `home_setting` (
  `id` int NOT NULL,
  `trendy_product_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `shop_category_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `recent_arival_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `blog_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_delivery_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_delivery_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `payment_delivery_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `refind_delivery_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `refind_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `refind_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `support_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `signup_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `signup_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `signup_image` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `home_setting`
--

INSERT INTO `home_setting` (`id`, `trendy_product_title`, `shop_category_title`, `recent_arival_title`, `blog_title`, `payment_delivery_title`, `payment_delivery_description`, `payment_delivery_image`, `refind_delivery_title`, `refind_description`, `refind_image`, `support_title`, `support_description`, `support_image`, `signup_title`, `signup_description`, `signup_image`, `created_at`, `updated_at`) VALUES
(1, 'Трендові продукти', 'Купуйте за категоріями', 'Останні надходження', 'Наш блог', 'Оплата та доставка', 'Безкоштовна доставка для замовлень на суму понад', 'b3su6r3zr8.png', 'Повернення та відшкодування', 'Безкоштовна 100% гарантія повернення грошей', '0xz3ipcqxo.png', 'Підтримка якості', 'Завжди онлайн-зворотній зв\'язок 24/7', 'q55elpyggj.png', 'Зареєструйтесь', 'отримайте знижку 10%', 'ydxcwzesi9.jpg', NULL, '2025-02-01 23:14:07');

-- --------------------------------------------------------

--
-- Структура таблиці `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2025_01_26_214725_add_role_to_users_table', 2),
(6, '2025_01_26_215222_add_role_to_users_table', 3),
(8, '2025_01_26_223338_add_is_super_admin_to_users_table', 4);

-- --------------------------------------------------------

--
-- Структура таблиці `notification`
--

CREATE TABLE `notification` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `url` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_read` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `notification`
--

INSERT INTO `notification` (`id`, `user_id`, `url`, `message`, `is_read`, `created_at`, `updated_at`) VALUES
(96, 1, 'https://site.virtual/user/orders', 'Замовлення №618180380<br> Статус оновлено', 1, '2025-02-19 01:14:14', '2025-02-19 01:14:25'),
(97, 1, 'https://site.virtual/admin/customer/list', 'Новий користувач зареєстрований #test', 1, '2025-02-19 01:22:55', '2025-02-19 01:29:16'),
(98, 1, 'https://shop.test.ua/admin/orders/detail/157', 'Нове замовлення №796761245', 1, '2026-02-28 10:10:19', '2026-02-28 10:16:49'),
(99, 1, 'https://shop.test.ua/admin/orders/detail/158', 'Нове замовлення №488697933', 1, '2026-02-28 10:12:08', '2026-02-28 10:24:46'),
(100, 1, 'https://shop.test.ua/admin/orders/detail/159', 'Нове замовлення №428388901', 1, '2026-02-28 10:13:54', '2026-02-28 10:24:50'),
(101, 1, 'https://shop.test.ua/admin/orders/detail/160', 'Нове замовлення №673102942', 1, '2026-02-28 10:22:05', '2026-02-28 10:24:52');

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `stripe_session_id` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_number` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `first_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `last_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `delivery_address` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `note` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `shipping_id` int DEFAULT NULL,
  `shipping_amount` varchar(255) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `discount_code` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `discount_amount` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `total_amount` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `payment_method` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0 = Pending 1 = Inprogress 2 = Delivered 3 = Completed 4 = Cancelled',
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `is_payment` tinyint NOT NULL DEFAULT '0',
  `payment_data` text COLLATE utf8mb4_general_ci,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `user_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `orders`
--

INSERT INTO `orders` (`id`, `stripe_session_id`, `order_number`, `first_name`, `last_name`, `company_name`, `phone`, `email`, `delivery_address`, `note`, `shipping_id`, `shipping_amount`, `discount_code`, `discount_amount`, `total_amount`, `payment_method`, `status`, `is_delete`, `is_payment`, `payment_data`, `created_at`, `updated_at`, `user_id`) VALUES
(66, NULL, NULL, 'Moana', 'Gould', 'Alford Wilkerson Traders', '+1 (955) 787-8077', 'pukutibe@mailinator.com', 'Sed optio ut aut fa', 'Sequi necessitatibus', 6, '70', 'november_rain', '10', '140', 'Післяплата', 3, 0, 1, NULL, '2024-11-15 13:52:14', '2024-12-23 19:39:40', 1),
(69, NULL, NULL, 'Ramona', 'Dejesus', 'Sexton Rodgers Co', '+1 (547) 287-7732', 'zukyc@mailinator.com', 'Tenetur minus iste e', 'Sit magna non aut ve', 5, '0', 'november_rain', '10', '600.5', 'Платіжна картка', 0, 0, 1, NULL, '2024-11-15 14:07:37', '2024-11-15 14:07:37', 90),
(70, NULL, NULL, 'Vincent', 'Kennedy', 'Moreno and Oneil Inc', '+1 (173) 189-2465', 'pytubocuv@mailinator.com', 'Ut quibusdam sed cil', 'Adipisci facilis dig', 6, '70', '', '0', '1901.5', 'Платіжна картка', 0, 0, 1, NULL, '2024-11-15 14:14:40', '2024-11-15 14:14:41', 91),
(71, NULL, NULL, 'Nero', 'Richard', 'Pruitt and Levine Trading', '+1 (755) 279-4895', 'roqono@mailinator.com', 'Sint eum deleniti l', 'Architecto quidem ma', 5, '0', 'november_rain', '10', '1564', 'Платіжна картка', 0, 0, 1, NULL, '2024-11-15 14:34:57', '2024-11-15 14:34:57', 92),
(72, NULL, NULL, 'Kaseem', 'Ware', 'Reynolds Pickett Trading', '+1 (733) 946-9756', 'cosi@mailinator.com', 'Recusandae Illo vol', 'Reiciendis sit eius', 5, '0', '', '0', '80', 'Платіжна картка', 0, 0, 1, NULL, '2024-11-18 10:28:24', '2024-11-18 10:28:24', 93),
(73, NULL, NULL, 'Grant', 'Munoz', 'Patrick and Baird LLC', '+1 (384) 934-8693', 'syrovojyf@mailinator.com', 'Consequatur asperior', 'Aliquid ea et vel ne', 6, '70', '', '0', '110', 'Післяплата', 0, 0, 1, NULL, '2024-11-19 07:26:06', '2024-11-19 07:26:07', 94),
(74, NULL, '452151733', 'Taylor', 'Fisher', 'Flowers and Pope Trading', '+1 (991) 955-9159', 'lohanykox@mailinator.com', 'Consequatur sunt en', 'Reiciendis debitis a', 6, '70', '', '0', '161', 'Післяплата', 0, 0, 1, NULL, '2024-11-19 10:20:15', '2024-11-19 10:20:16', NULL),
(75, NULL, '333946622', 'Isaac', 'Green', 'Rollins and Cruz Associates', '+1 (309) 692-5864', 'vacose@mailinator.com', 'Consequatur fugiat e', 'Deserunt natus minus', 5, '0', 'november_rain', '10', '172', 'Післяплата', 0, 0, 1, NULL, '2024-11-19 10:28:29', '2024-11-19 10:28:29', 95),
(76, NULL, '359100696', 'Isaac', 'Green', 'Rollins and Cruz Associates', '+1 (309) 692-5864', 'vae@mailinator.com', 'Consequatur fugiat e', 'Deserunt natus minus', 6, '70', 'november_rain', '10', '242', 'Післяплата', 0, 0, 1, NULL, '2024-11-19 10:29:46', '2024-11-19 10:29:46', 96),
(77, NULL, '275824007', 'Nathaniel', 'Palmer', 'Oneill Dunlap Inc', '+1 (231) 878-5389', 'puqax@mailinator.com', 'Ea omnis autem dolor', 'Est et cum sunt qui', 6, '70', '', '0', '252', 'Післяплата', 0, 0, 1, NULL, '2024-11-19 10:42:43', '2024-11-19 10:42:43', NULL),
(78, NULL, '319622668', 'Anika', 'Wall', 'Nixon Greene Traders', '+1 (203) 541-8981', 'vasux@mailinator.com', 'Nostrud necessitatib', 'Sint quis fugiat na', 6, '70', 'november_rain', '10', '151', 'Післяплата', 0, 0, 1, NULL, '2024-11-19 12:44:19', '2024-11-19 12:44:19', NULL),
(79, NULL, '680396939', 'Kieran', 'Chapman', 'Spence Cabrera Traders', '+1 (739) 236-4407', 'povyboqi@mailinator.com', 'Sed dolorem ea offic', 'Non velit duis rerum', 5, '0', '', '0', '91', 'Платіжна картка', 0, 0, 1, NULL, '2024-11-19 12:49:18', '2024-11-19 12:49:18', NULL),
(80, NULL, '919915538', 'Kieran', 'Chapman', 'Spence Cabrera Traders', '+1 (739) 236-4407', 'povyboqi@mailinator.com', 'Sed dolorem ea offic', 'Non velit duis rerum', 5, '0', '', '0', '0', 'Післяплата', 0, 0, 0, NULL, '2024-11-19 12:49:32', '2024-11-19 12:49:32', NULL),
(81, NULL, '237142730', 'Germaine', 'Berg', 'York Hull LLC', '+1 (144) 759-2399', 'vezuquwan@mailinator.com', 'Eu quas sed dolor ne', 'Amet accusamus qui', 5, '0', '', '0', '91', 'Післяплата', 0, 0, 1, NULL, '2024-11-19 12:50:16', '2024-11-19 12:50:16', NULL),
(82, NULL, '761473328', 'Germaine', 'Berg', 'York Hull LLC', '+1 (144) 759-2399', 'vezuquwan@mailinator.com', 'Eu quas sed dolor ne', 'Amet accusamus qui', 5, '0', 'november_rain', '10', '81', 'Платіжна картка', 0, 0, 1, NULL, '2024-11-19 12:52:16', '2024-11-19 12:52:16', NULL),
(83, NULL, '359392668', 'Declan', 'Rios', 'Nichols Barnett Traders', '+1 (273) 434-1848', 'ryba@mailinator.com', 'Vitae officia ab cum', 'Dolorem amet enim p', 5, '0', '', '0', '0', 'Післяплата', 0, 0, 0, NULL, '2024-11-19 12:57:48', '2024-11-19 12:57:48', 1),
(84, NULL, '506746924', 'Wynter', 'Cohen', 'Garrison Stone Trading', '+1 (506) 577-8328', 'dobijavedi@mailinator.com', 'Aut nisi deleniti pe', 'Quis aut ullamco ver', 6, '70', 'november_rain', '10', '1116.5', 'Післяплата', 0, 0, 1, NULL, '2024-11-19 13:02:48', '2024-11-19 13:02:48', 1),
(85, NULL, '290490360', 'Paul', 'Carrillo', 'Cannon and Huffman Plc', '+1 (142) 877-3455', 'luwih@mailinator.com', 'Atque porro elit la', 'Ullam tempora fugiat', 6, '70', 'november_rain', '10', '1116.5', 'Платіжна картка', 0, 0, 1, NULL, '2024-11-19 14:27:18', '2024-11-19 14:27:18', 1),
(86, NULL, '307646824', 'Barrett', 'Sutton', 'Hull and Whitney Trading', '+1 (941) 533-3172', 'rorozene@mailinator.com', 'Dolor cum nostrud do', 'Vel a veritatis dist', 5, '0', '', '0', '1221', 'Платіжна картка', 2, 0, 1, NULL, '2024-11-28 13:34:43', '2024-12-10 14:37:01', 97),
(87, NULL, '735910523', 'Nero', 'Donaldson', 'Baldwin and Mcmillan Traders', '+1 (478) 116-5549', 'gejinokeg@mailinator.com', 'Ut quis vitae volupt', 'Nobis adipisci odit', 5, '0', '', '0', '45', 'Платіжна картка', 4, 0, 1, NULL, '2024-12-11 08:45:52', '2024-12-11 10:24:59', 1),
(88, NULL, '516148303', 'Tyler', 'King', 'Gilliam Keller Co', '+1 (404) 892-2488', 'mozice@mailinator.com', 'Tempor qui voluptas', 'Quis sunt obcaecati', 6, '70', '', '0', '110', 'Післяплата', 3, 0, 1, NULL, '2024-12-12 12:01:52', '2024-12-29 18:37:26', 1),
(89, NULL, '606246421', 'Tyler', 'King', 'Gilliam Keller Co', '+1 (404) 892-2488', 'mozice@mailinator.com', 'Tempor qui voluptas', 'Quis sunt obcaecati', 6, '70', '', '0', '110', 'Післяплата', 0, 0, 1, NULL, '2024-12-12 12:02:18', '2024-12-12 12:02:18', 1),
(90, NULL, '694022531', 'Tyler', 'King', 'Gilliam Keller Co', '+1 (404) 892-2488', 'mozice@mailinator.com', 'Tempor qui voluptas', 'Quis sunt obcaecati', 6, '70', '', '0', '110', 'Післяплата', 0, 0, 1, NULL, '2024-12-12 12:03:39', '2024-12-12 12:03:40', 1),
(91, NULL, '447081150', 'Ria', 'Conner', 'Pennington and Larsen Traders', '+1 (723) 587-6419', 'gewaluguja@mailinator.com', 'Voluptatibus in repe', 'Praesentium quas qui', 5, '0', '', '0', '91', 'Платіжна картка', 3, 0, 1, NULL, '2024-12-12 13:50:11', '2024-12-23 19:34:34', 98),
(92, NULL, '722017845', 'Medge Frost', 'Frost', 'Medge Frost Company', '+12345678', 'nasixanipu@mailinator.com', 'Нова пошта, Коломия, Відділення №3,пл. Старий ринок, 2Б ', 'sfASFafAFSasfASFsa', 5, '0', '', '0', '1131', 'Післяплата', 3, 0, 1, NULL, '2024-12-25 11:57:15', '2024-12-29 18:33:31', 100),
(93, NULL, '991809963', 'Lunea', 'Lloyd', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '1494', 'Платіжна картка', 0, 0, 1, NULL, '2025-01-05 18:41:38', '2025-01-05 18:41:38', 1),
(94, NULL, '423195992', 'Lunea', 'Lloyd', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '182', 'Платіжна картка', 0, 0, 1, NULL, '2025-01-05 18:45:11', '2025-01-05 18:45:11', 1),
(95, NULL, '460389389', 'Lunea', 'Lloyd', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '273', 'Післяплата', 0, 0, 1, NULL, '2025-01-05 18:53:06', '2025-01-05 18:53:06', 1),
(96, NULL, '260681059', 'Lunea', 'Lloyd', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '160', 'Післяплата', 0, 0, 1, NULL, '2025-01-05 19:04:58', '2025-01-05 19:04:59', 1),
(97, NULL, '756378019', 'Lunea', 'Lloyd', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '611', 'Післяплата', 0, 0, 1, NULL, '2025-01-05 19:42:54', '2025-01-05 19:42:54', 1),
(98, NULL, '350837368', 'Lunea', 'Lloyd', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '921', 'Платіжна картка', 0, 0, 1, NULL, '2025-01-05 19:49:32', '2025-01-05 19:49:32', 1),
(99, NULL, '128743156', 'Lunea', 'Lloyd', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '305.5', 'Післяплата', 0, 0, 1, NULL, '2025-01-05 22:26:00', '2025-01-05 22:26:00', 1),
(100, NULL, '498541006', 'Lunea', 'Lloyd', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '864', 'Платіжна картка', 0, 0, 1, NULL, '2025-01-05 22:27:33', '2025-01-05 22:27:34', 1),
(101, NULL, '216251332', 'Lunea', 'Lloyd', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '195', 'Післяплата', 1, 0, 1, NULL, '2025-01-05 23:01:34', '2025-02-11 22:55:04', 1),
(102, NULL, '431327790', 'Lunea', 'Lloyd', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', 'november_rain', '32.5', '362.5', 'Платіжна картка', 1, 0, 1, NULL, '2025-01-06 00:59:19', '2025-02-11 22:53:05', 1),
(103, NULL, '331445307', 'Iris', 'Alvarez', 'Norris Olson Trading', '+1 (251) 842-9708', 'nureg@mailinator.com', 'Natus voluptas tempo', 'Natus dolor commodi', 5, '0', '', '0', '0', 'Післяплата', 0, 0, 0, NULL, '2025-01-22 11:22:36', '2025-01-22 11:22:36', NULL),
(104, NULL, '841909726', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '400', 'Післяплата', 2, 0, 1, NULL, '2025-02-03 23:59:57', '2025-02-11 23:07:46', 1),
(105, NULL, '218324297', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '342', 'Післяплата', 3, 0, 1, NULL, '2025-02-04 00:04:31', '2025-02-14 00:48:54', 1),
(106, NULL, '823026292', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '741', 'Післяплата', 3, 0, 1, NULL, '2025-02-07 22:01:59', '2025-02-11 23:08:13', 1),
(107, NULL, '561883369', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '344', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-07 22:07:04', '2025-02-11 23:11:41', 1),
(108, NULL, '536838877', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '470', 'Післяплата', 0, 0, 1, NULL, '2025-02-11 23:16:09', '2025-02-11 23:16:09', 1),
(109, NULL, '843817730', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '365', 'Післяплата', 3, 0, 1, NULL, '2025-02-13 22:13:46', '2025-02-14 00:54:10', 1),
(110, NULL, '757676930', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '440', 'Післяплата', 0, 0, 1, NULL, '2025-02-14 00:58:43', '2025-02-14 00:58:44', 1),
(111, NULL, '275775401', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '414', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 01:00:36', '2025-02-14 01:00:37', 1),
(112, NULL, '373961171', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '341', 'Післяплата', 1, 0, 1, NULL, '2025-02-14 01:02:15', '2025-02-14 02:35:33', 1),
(113, NULL, '534633049', 'Edan', 'Woodard', 'Bass and Oneill LLC', '+1 (789) 613-6017', 'covagakita@mailinator.com', 'Consectetur aut eu m', 'Quia aut excepteur o', 5, '0', '', '0', '400', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 17:52:05', '2025-02-14 17:52:05', NULL),
(114, NULL, '522181176', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '344', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 21:25:58', '2025-02-14 21:25:58', 1),
(115, NULL, '943332454', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '341', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 21:38:07', '2025-02-14 21:38:07', 1),
(116, NULL, '389667027', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '510', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 21:41:26', '2025-02-14 21:41:26', 1),
(117, NULL, '370998462', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '341', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 21:43:25', '2025-02-14 21:43:26', 1),
(118, NULL, '116844633', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '411', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 21:44:58', '2025-02-14 21:44:58', 1),
(119, NULL, '366506472', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '412', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 22:19:03', '2025-02-14 22:19:03', 1),
(120, NULL, '922407160', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '412', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 22:23:34', '2025-02-14 22:23:35', 1),
(121, NULL, '730998349', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '342', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 22:33:26', '2025-02-14 22:33:26', 1),
(122, NULL, '924151842', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '510', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 22:37:10', '2025-02-14 22:37:10', 1),
(123, NULL, '786028449', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '440', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 22:41:04', '2025-02-14 22:41:04', 1),
(124, NULL, '247149666', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '414', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 22:44:54', '2025-02-14 22:44:54', 1),
(125, NULL, '260616469', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '414', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 22:55:02', '2025-02-14 22:55:02', 1),
(126, NULL, '222550618', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '470', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 22:55:47', '2025-02-14 22:55:47', 1),
(127, NULL, '311026465', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '470', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 22:56:27', '2025-02-14 22:56:27', 1),
(128, NULL, '979551898', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '411', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 23:01:43', '2025-02-14 23:01:43', 1),
(129, NULL, '831616849', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '342', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 23:03:48', '2025-02-14 23:03:49', 1),
(130, NULL, '285270069', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '412', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-14 23:06:09', '2025-02-14 23:06:09', 1),
(131, NULL, '980354086', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '470', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 14:27:45', '2025-02-15 14:27:46', 1),
(132, NULL, '969258682', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '414', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 14:31:48', '2025-02-15 14:31:48', 1),
(133, NULL, '132085429', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '784', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 17:56:05', '2025-02-15 17:56:05', 1),
(134, NULL, '920403260', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '784', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 18:04:11', '2025-02-15 18:04:11', 1),
(135, NULL, '198031471', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '784', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 18:13:10', '2025-02-15 18:13:11', 1),
(136, NULL, '422142327', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '682', 'Післяплата', 0, 0, 1, NULL, '2025-02-15 18:15:07', '2025-02-15 18:15:07', 1),
(137, NULL, '394340933', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '400', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 18:17:16', '2025-02-15 18:17:17', 1),
(138, NULL, '689908247', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '414', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 18:33:00', '2025-02-15 18:33:01', 1),
(139, NULL, '223014574', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '854', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 18:41:38', '2025-02-15 18:41:38', 1),
(140, NULL, '452087795', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '854', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 18:43:20', '2025-02-15 18:43:20', 1),
(141, NULL, '988134487', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '854', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 18:45:51', '2025-02-15 18:45:52', 1),
(142, NULL, '112577876', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '784', 'Післяплата', 0, 0, 1, NULL, '2025-02-15 19:00:15', '2025-02-15 19:00:15', 1),
(143, NULL, '660891282', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '510', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 19:04:27', '2025-02-15 19:04:27', 1),
(144, NULL, '298866226', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '510', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 19:06:53', '2025-02-15 19:06:53', 1),
(145, NULL, '683614444', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '344', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 19:15:16', '2025-02-15 19:15:17', 1),
(146, NULL, '920327655', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '416', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 20:38:49', '2025-02-15 20:38:49', 1),
(147, NULL, '750357021', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '341', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 21:49:21', '2025-02-15 21:49:21', 1),
(148, NULL, '850694161', 'Mary', 'Duffy', 'Underwood Bryant Plc', '+1 (218) 594-8837', 'capykume@mailinator.com', 'Ullamco non voluptat', 'Eum aute adipisicing', 6, '70', '', '0', '414', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 21:54:24', '2025-02-15 21:54:25', 110),
(149, NULL, '152289471', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '854', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 22:18:12', '2025-02-15 22:18:12', 1),
(150, NULL, '730011879', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 6, '70', '', '0', '414', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-15 22:19:43', '2025-02-15 22:19:43', 1),
(151, NULL, '578350408', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '784', 'Платіжна картка', 1, 0, 1, NULL, '2025-02-15 22:24:33', '2025-02-15 23:13:51', 1),
(152, NULL, '766032692', 'Kiayada', 'Guerra', 'Davenport Blackwell Plc', '+1 (118) 237-9318', 'hysuk@mailinator.com', 'Impedit nobis ullam', 'Obcaecati placeat v', 5, '0', '', '0', '344', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-18 21:20:37', '2025-02-18 21:20:37', NULL),
(153, NULL, '878210089', 'Fallon', 'Mooney', 'Hopkins and Gould Co', '+1 (903) 483-1983', 'lezok@mailinator.com', 'Voluptatum aspernatu', 'In laboriosam elit', 6, '70', '', '0', '854', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-18 21:27:45', '2025-02-18 21:27:46', NULL),
(154, NULL, '829152205', 'Morgan', 'Blackburn', 'Morse and Harrell Trading', '+1 (952) 436-1277', 'nibikugoc@mailinator.com', 'Provident eveniet', 'Iusto sequi molestia', 5, '0', '', '0', '784', 'Платіжна картка', 0, 0, 1, NULL, '2025-02-18 21:35:13', '2025-02-18 21:35:14', NULL),
(155, NULL, '618180380', 'Adam', 'Blevins', 'Decker Daniel Traders', '+1 (202) 779-9969', 'cebodo@mailinator.com', 'Harum eaque culpa ev', 'Quia ullamco quia no', 6, '70', '', '0', '1734', 'Платіжна картка', 1, 0, 1, NULL, '2025-02-18 21:41:53', '2025-02-19 01:14:14', 111),
(156, NULL, '231542616', 'Gail', 'Richards', 'Watson and Ferrell Inc', '+1 (431) 358-2447', 'jyqibynyto@mailinator.com', 'Quia proident qui c', 'Omnis et assumenda t', 6, '70', '', '0', '910', 'Платіжна картка', 3, 0, 1, NULL, '2025-02-18 21:46:14', '2025-02-19 01:12:52', 112),
(157, NULL, '796761245', 'Zachary', 'Dyer', 'Harmon Wooten Co', '+1 (397) 783-7176', 'fydyfyqahy@mailinator.com', 'Voluptas consequat', 'Sint aperiam quo num', 5, '0', '', '0', '1730', 'Платіжна картка', 0, 0, 1, NULL, '2026-02-28 10:10:17', '2026-02-28 10:10:17', NULL),
(158, NULL, '488697933', 'Ian', 'Sawyer', 'Ross Briggs Associates', '+1 (156) 951-8895', 'wydy@mailinator.com', 'Architecto velit vel', 'Libero reprehenderit', 6, '70', '', '0', '470', 'Післяплата', 0, 0, 1, NULL, '2026-02-28 10:12:05', '2026-02-28 10:12:06', 114),
(159, NULL, '428388901', 'Blake', 'Richard', 'Stevens and Hanson Associates', '+1 (908) 313-8088', 'mivejugad@mailinator.com', 'Ad exercitation quis', 'Delectus eligendi m', 5, '0', '', '0', '400', 'Платіжна картка', 0, 0, 1, NULL, '2026-02-28 10:13:54', '2026-02-28 10:13:54', 115),
(160, NULL, '673102942', 'Dallas', 'Brugie', 'Tran Torres Trading', '+1 (385) 764-7914', 'e-mail@fts.ua', 'Praesentium in nisi', '', 5, '0', '', '0', '684', 'Післяплата', 0, 0, 1, NULL, '2026-02-28 10:22:05', '2026-02-28 10:22:05', 1);

-- --------------------------------------------------------

--
-- Структура таблиці `orders_item`
--

CREATE TABLE `orders_item` (
  `id` int NOT NULL,
  `order_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `quantity` int NOT NULL DEFAULT '0',
  `price` varchar(25) COLLATE utf8mb4_general_ci DEFAULT '0',
  `color_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `size_amount` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `total_price` varchar(25) COLLATE utf8mb4_general_ci NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `orders_item`
--

INSERT INTO `orders_item` (`id`, `order_id`, `product_id`, `quantity`, `price`, `color_name`, `size_name`, `size_amount`, `total_price`, `created_at`, `updated_at`) VALUES
(65, 66, 3, 2, '40', 'Cyan', NULL, '0', '40', '2024-11-15 13:52:14', '2024-11-15 13:52:14'),
(66, 67, 5, 3, '610.5', 'Pantone 116C', 'LM', '305', '610.5', '2024-11-15 14:03:35', '2024-11-15 14:03:35'),
(67, 68, 5, 3, '610.5', 'Pantone 116C', 'LM', '305', '610.5', '2024-11-15 14:04:24', '2024-11-15 14:04:24'),
(68, 69, 5, 1, '610.5', 'Black', 'LM', '305', '610.5', '2024-11-15 14:07:37', '2024-11-15 14:07:37'),
(69, 70, 5, 3, '610.5', 'Pantone 116C', 'LM', '305', '610.5', '2024-11-15 14:14:40', '2024-11-15 14:14:40'),
(70, 71, 7, 3, '91', 'Cyan', '1.4', '46', '91', '2024-11-15 14:34:57', '2024-11-15 14:34:57'),
(71, 71, 1, 5, '34', 'Pantone 116C', NULL, '0', '34', '2024-11-15 14:34:57', '2024-11-15 14:34:57'),
(72, 71, 6, 1, '1131', 'Червоний', '1.8', '337', '1131', '2024-11-15 14:34:57', '2024-11-15 14:34:57'),
(73, 72, 3, 2, '40', 'Cyan', NULL, '0', '40', '2024-11-18 10:28:24', '2024-11-18 10:28:24'),
(74, 73, 3, 1, '40', 'Cyan', NULL, '0', '40', '2024-11-19 07:26:06', '2024-11-19 07:26:06'),
(75, 74, 7, 1, '91', 'Cyan', '1.4', '46', '91', '2024-11-19 10:20:15', '2024-11-19 10:20:15'),
(76, 75, 7, 2, '91', 'Cyan', '1.4', '46', '91', '2024-11-19 10:28:29', '2024-11-19 10:28:29'),
(77, 76, 7, 2, '91', 'Cyan', '1.4', '46', '91', '2024-11-19 10:29:46', '2024-11-19 10:29:46'),
(78, 77, 7, 2, '91', 'Cyan', '1.4', '46', '91', '2024-11-19 10:42:43', '2024-11-19 10:42:43'),
(79, 78, 7, 1, '91', 'Pantone 116C', '1.4', '46', '91', '2024-11-19 12:44:19', '2024-11-19 12:44:19'),
(80, 79, 7, 1, '91', 'Pantone 116C', '1.4', '46', '91', '2024-11-19 12:49:18', '2024-11-19 12:49:18'),
(81, 81, 7, 1, '91', 'Cyan', '1.4', '46', '91', '2024-11-19 12:50:16', '2024-11-19 12:50:16'),
(82, 82, 7, 1, '91', 'Cyan', '1.4', '46', '91', '2024-11-19 12:52:16', '2024-11-19 12:52:16'),
(83, 84, 7, 2, '91', 'Cyan', '1.4', '46', '91', '2024-11-19 13:02:48', '2024-11-19 13:02:48'),
(84, 84, 5, 1, '610.5', 'Black', 'LM', '305', '610.5', '2024-11-19 13:02:48', '2024-11-19 13:02:48'),
(85, 84, 4, 1, '264', 'Cyan', '1.7', '56', '264', '2024-11-19 13:02:48', '2024-11-19 13:02:48'),
(86, 85, 7, 2, '91', 'Cyan', '1.4', '46', '91', '2024-11-19 14:27:18', '2024-11-19 14:27:18'),
(87, 85, 5, 1, '610.5', 'Black', 'LM', '305', '610.5', '2024-11-19 14:27:18', '2024-11-19 14:27:18'),
(88, 85, 4, 1, '264', 'Cyan', '1.7', '56', '264', '2024-11-19 14:27:18', '2024-11-19 14:27:18'),
(89, 86, 5, 2, '610.5', 'Cyan', 'LM', '305', '610.5', '2024-11-28 13:34:43', '2024-11-28 13:34:43'),
(90, 87, 7, 1, '45', 'Cyan', NULL, '0', '45', '2024-12-11 08:45:52', '2024-12-11 08:45:52'),
(91, 88, 3, 1, '40', 'Cyan', NULL, '0', '40', '2024-12-12 12:01:52', '2024-12-12 12:01:52'),
(92, 89, 3, 1, '40', 'Cyan', NULL, '0', '40', '2024-12-12 12:02:18', '2024-12-12 12:02:18'),
(93, 90, 3, 1, '40', 'Cyan', NULL, '0', '40', '2024-12-12 12:03:39', '2024-12-12 12:03:39'),
(94, 91, 7, 1, '91', 'Cyan', '1.4', '46', '91', '2024-12-12 13:50:11', '2024-12-12 13:50:11'),
(95, 92, 6, 1, '1131', 'Червоний', '1.8', '337', '1131', '2024-12-25 11:57:15', '2024-12-25 11:57:15'),
(96, 93, 5, 2, '610.5', 'Black', 'LM', '305', '1221', '2025-01-05 18:41:38', '2025-01-05 18:41:38'),
(97, 93, 4, 1, '273', 'Cyan', '1.5', '65', '273', '2025-01-05 18:41:38', '2025-01-05 18:41:38'),
(98, 94, 7, 2, '91', 'Pantone 116C', '1.4', '46', '182', '2025-01-05 18:45:11', '2025-01-05 18:45:11'),
(99, 95, 7, 3, '91', 'Cyan', '1.4', '46', '273', '2025-01-05 18:53:06', '2025-01-05 18:53:06'),
(100, 96, 7, 2, '45', 'Cyan', NULL, '0', '90', '2025-01-05 19:04:58', '2025-01-05 19:04:58'),
(101, 97, 5, 2, '305.5', 'Black', NULL, '0', '611', '2025-01-05 19:42:54', '2025-01-05 19:42:54'),
(102, 98, 5, 2, '305.5', 'Pantone 116C', NULL, '0', '611', '2025-01-05 19:49:32', '2025-01-05 19:49:32'),
(103, 98, 4, 1, '208', 'Cyan', NULL, '0', '208', '2025-01-05 19:49:32', '2025-01-05 19:49:32'),
(104, 98, 1, 3, '34', 'Pantone 116C', NULL, '0', '102', '2025-01-05 19:49:32', '2025-01-05 19:49:32'),
(105, 99, 5, 1, '305.5', 'Червоний', NULL, '0', '305.5', '2025-01-05 22:26:00', '2025-01-05 22:26:00'),
(106, 100, 6, 1, '794', 'Червоний', NULL, '0', '794', '2025-01-05 22:27:33', '2025-01-05 22:27:33'),
(107, 101, 7, 3, '65', 'Black', 'XL', '20', '195', '2025-01-05 23:01:34', '2025-01-05 23:01:34'),
(108, 102, 7, 5, '65', 'Cyan', 'XL', '20', '325', '2025-01-06 00:59:19', '2025-01-06 00:59:19'),
(109, 104, 9, 1, '400', NULL, NULL, '0', '400', '2025-02-03 23:59:57', '2025-02-03 23:59:57'),
(110, 105, 4, 1, '342', NULL, NULL, '0', '342', '2025-02-04 00:04:31', '2025-02-04 00:04:31'),
(111, 106, 9, 1, '400', NULL, NULL, '0', '400', '2025-02-07 22:01:59', '2025-02-07 22:01:59'),
(112, 106, 3, 1, '341', NULL, NULL, '0', '341', '2025-02-07 22:01:59', '2025-02-07 22:01:59'),
(113, 107, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-07 22:07:04', '2025-02-07 22:07:04'),
(114, 108, 9, 1, '400', NULL, NULL, '0', '400', '2025-02-11 23:16:09', '2025-02-11 23:16:09'),
(115, 109, 7, 1, '365', 'Pantone 116C', 'XL', '20', '365', '2025-02-13 22:13:46', '2025-02-13 22:13:46'),
(116, 110, 1, 1, '440', 'Червоний', '100cm', '100', '440', '2025-02-14 00:58:43', '2025-02-14 00:58:43'),
(117, 111, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-14 01:00:36', '2025-02-14 01:00:36'),
(118, 112, 3, 1, '341', NULL, NULL, '0', '341', '2025-02-14 01:02:15', '2025-02-14 01:02:15'),
(119, 113, 9, 1, '400', NULL, NULL, '0', '400', '2025-02-14 17:52:05', '2025-02-14 17:52:05'),
(120, 114, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-14 21:25:58', '2025-02-14 21:25:58'),
(121, 115, 3, 1, '341', NULL, NULL, '0', '341', '2025-02-14 21:38:07', '2025-02-14 21:38:07'),
(122, 116, 1, 1, '440', 'Червоний', '100cm', '100', '440', '2025-02-14 21:41:26', '2025-02-14 21:41:26'),
(123, 117, 3, 1, '341', NULL, NULL, '0', '341', '2025-02-14 21:43:25', '2025-02-14 21:43:25'),
(124, 118, 3, 1, '341', NULL, NULL, '0', '341', '2025-02-14 21:44:58', '2025-02-14 21:44:58'),
(125, 119, 4, 1, '342', NULL, NULL, '0', '342', '2025-02-14 22:19:03', '2025-02-14 22:19:03'),
(126, 120, 4, 1, '342', NULL, NULL, '0', '342', '2025-02-14 22:23:34', '2025-02-14 22:23:34'),
(127, 121, 4, 1, '342', NULL, NULL, '0', '342', '2025-02-14 22:33:26', '2025-02-14 22:33:26'),
(128, 122, 1, 1, '440', 'Червоний', '100cm', '100', '440', '2025-02-14 22:37:10', '2025-02-14 22:37:10'),
(129, 123, 1, 1, '440', 'Червоний', '100cm', '100', '440', '2025-02-14 22:41:04', '2025-02-14 22:41:04'),
(130, 124, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-14 22:44:54', '2025-02-14 22:44:54'),
(131, 125, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-14 22:55:02', '2025-02-14 22:55:02'),
(132, 126, 9, 1, '400', NULL, NULL, '0', '400', '2025-02-14 22:55:47', '2025-02-14 22:55:47'),
(133, 127, 9, 1, '400', NULL, NULL, '0', '400', '2025-02-14 22:56:27', '2025-02-14 22:56:27'),
(134, 128, 3, 1, '341', NULL, NULL, '0', '341', '2025-02-14 23:01:43', '2025-02-14 23:01:43'),
(135, 129, 4, 1, '342', NULL, NULL, '0', '342', '2025-02-14 23:03:48', '2025-02-14 23:03:48'),
(136, 130, 4, 1, '342', NULL, NULL, '0', '342', '2025-02-14 23:06:09', '2025-02-14 23:06:09'),
(137, 131, 9, 1, '400', NULL, NULL, '0', '400', '2025-02-15 14:27:45', '2025-02-15 14:27:45'),
(138, 132, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-15 14:31:48', '2025-02-15 14:31:48'),
(139, 133, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-15 17:56:05', '2025-02-15 17:56:05'),
(140, 134, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-15 18:04:11', '2025-02-15 18:04:11'),
(141, 135, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-15 18:13:10', '2025-02-15 18:13:10'),
(142, 136, 3, 2, '341', NULL, NULL, '0', '682', '2025-02-15 18:15:07', '2025-02-15 18:15:07'),
(143, 137, 9, 1, '400', NULL, NULL, '0', '400', '2025-02-15 18:17:16', '2025-02-15 18:17:16'),
(144, 138, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-15 18:33:00', '2025-02-15 18:33:00'),
(145, 139, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-15 18:41:38', '2025-02-15 18:41:38'),
(146, 140, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-15 18:43:20', '2025-02-15 18:43:20'),
(147, 141, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-15 18:45:51', '2025-02-15 18:45:51'),
(148, 142, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-15 19:00:15', '2025-02-15 19:00:15'),
(149, 143, 1, 1, '440', 'Червоний', '100cm', '100', '440', '2025-02-15 19:04:27', '2025-02-15 19:04:27'),
(150, 144, 1, 1, '440', 'Червоний', '100cm', '100', '440', '2025-02-15 19:06:53', '2025-02-15 19:06:53'),
(151, 145, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-15 19:15:16', '2025-02-15 19:15:16'),
(152, 146, 8, 1, '346', 'Червоний', NULL, '0', '346', '2025-02-15 20:38:49', '2025-02-15 20:38:49'),
(153, 147, 3, 1, '341', NULL, NULL, '0', '341', '2025-02-15 21:49:21', '2025-02-15 21:49:21'),
(154, 148, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-15 21:54:24', '2025-02-15 21:54:24'),
(155, 149, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-15 22:18:12', '2025-02-15 22:18:12'),
(156, 150, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-15 22:19:43', '2025-02-15 22:19:43'),
(157, 151, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-15 22:24:33', '2025-02-15 22:24:33'),
(158, 152, 6, 1, '344', NULL, NULL, '0', '344', '2025-02-18 21:20:37', '2025-02-18 21:20:37'),
(159, 153, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-18 21:27:45', '2025-02-18 21:27:45'),
(160, 154, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-18 21:35:13', '2025-02-18 21:35:13'),
(161, 155, 4, 1, '784', 'Cyan', 'XXl', '442', '784', '2025-02-18 21:41:53', '2025-02-18 21:41:53'),
(162, 155, 1, 2, '440', 'Червоний', '100cm', '100', '880', '2025-02-18 21:41:53', '2025-02-18 21:41:53'),
(163, 156, 9, 1, '400', 'Pantone 116C', NULL, '0', '400', '2025-02-18 21:46:14', '2025-02-18 21:46:14'),
(164, 156, 1, 1, '440', 'Червоний', '100cm', '100', '440', '2025-02-18 21:46:14', '2025-02-18 21:46:14'),
(165, 157, 8, 5, '346', 'Червоний', NULL, '0', '1730', '2026-02-28 10:10:17', '2026-02-28 10:10:17'),
(166, 158, 9, 1, '400', 'Pantone 116C', NULL, '0', '400', '2026-02-28 10:12:05', '2026-02-28 10:12:05'),
(167, 159, 9, 1, '400', 'Pantone 116C', NULL, '0', '400', '2026-02-28 10:13:54', '2026-02-28 10:13:54'),
(168, 160, 4, 2, '342', 'Pantone 116C', NULL, '0', '684', '2026-02-28 10:22:05', '2026-02-28 10:22:05');

-- --------------------------------------------------------

--
-- Структура таблиці `page`
--

CREATE TABLE `page` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `image_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `page`
--

INSERT INTO `page` (`id`, `name`, `slug`, `title`, `description`, `image_name`, `meta_title`, `meta_description`, `meta_keywords`, `created_at`, `updated_at`) VALUES
(1, 'FAQ', 'faq', 'FAQ', '<p>Autem enim totam ali.</p>', '1bbfa85im8zirpfojn3ur.jpg', 'FAQ', 'FAQ', 'FAQ', NULL, '2025-01-26 20:03:50'),
(2, 'Способи оплати', 'payment-method', 'Способи оплати', '<p>\r\n\r\n</p><div align=\"center\" data-freestar-ad=\"__300x600 __400x225\" id=\"lipsumcom_left_siderail_2\" name=\"lipsumcom_left_siderail_2\">\r\n  \r\n</div>\r\n<div id=\"bannerR\">\r\n<div align=\"center\" data-freestar-ad=\"__300x600 __400x225\" id=\"lipsumcom_right_siderail_1\" name=\"lipsumcom_right_siderail_1\">\r\n  \r\n</div>\r\n\r\n<div align=\"center\" data-freestar-ad=\"__300x600 __400x225\" id=\"lipsumcom_right_siderail_2\" name=\"lipsumcom_right_siderail_2\">\r\n  \r\n</div></div>\r\n<div>\r\n<h2>What is Lorem Ipsum?</h2>\r\n<p><strong>Lorem Ipsum</strong> is simply dummy text of the printing and\r\n typesetting industry. Lorem Ipsum has been the industry\'s standard \r\ndummy text ever since the 1500s, when an unknown printer took a galley \r\nof type and scrambled it to make a type specimen book. It has survived \r\nnot only five centuries, but also the leap into electronic typesetting, \r\nremaining essentially unchanged. It was popularised in the 1960s with \r\nthe release of Letraset sheets containing Lorem Ipsum passages, and more\r\n recently with desktop publishing software like Aldus PageMaker \r\nincluding versions of Lorem Ipsum.</p>\r\n</div>', '24bpvlprgygtwdrnunczb.jpg', 'What is Lorem Ipsum?', 'What is Lorem Ipsum?\r\n\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', 'What is Lorem Ipsum', NULL, '2024-12-31 17:54:15'),
(3, 'Повернення коштів', 'money-back', 'Повернення коштів', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(4, 'Контакти', 'contacts', 'Контакти', '<p>There are many variations of passages of Lorem Ipsum available, but the \r\nmajority have suffered alteration in some form, by injected humour, or \r\nrandomised words which don\'t look even slightly believable. If you are \r\ngoing to use a passage of Lorem Ipsum, you need to be sure there isn\'t \r\nanything embarrassing hidden in the middle of text.</p><p><br></p>', '4srrfbrlgvlzyt0dfwzwp.jpg', 'Контакти', 'Контакти', 'Контакти', NULL, '2024-12-31 19:04:34'),
(5, 'Про нас', 'pro-nas', 'Про нас', '<p>Про насIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>', '5quhjwxso3rotql8hy1t0.jpg', 'It is a long established fact that', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.', 'It is a long established fact that', NULL, '2024-12-31 18:21:41'),
(6, 'Повернення товару', 'return-policy', 'Повернення товару', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(7, 'Способи Доставки', 'shipping-method', 'Способи Доставки', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(8, 'Правила та умови', 'terms-and-condition', 'Правила та умови', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-30 23:54:14'),
(9, 'Політика конфіденційності', 'privacy-policy', 'Політика конфіденційності', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 'Головна', 'home', 'Головна', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', NULL, 'Інтернет-магазин', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', 'Інтернет-магазин', NULL, '2024-12-31 19:20:48'),
(11, 'Блог', 'blog', 'Блог', 'Блог', NULL, 'Блог', 'Блог', 'Блог', NULL, '2025-01-21 21:12:47');

-- --------------------------------------------------------

--
-- Структура таблиці `partner`
--

CREATE TABLE `partner` (
  `id` int NOT NULL,
  `image_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `partner`
--

INSERT INTO `partner` (`id`, `image_name`, `button_link`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(1, 'c7ku9eoxuiqs9jysozqf.png', 'https://site.virtual', 0, 0, '2025-01-06 18:31:08', '2025-01-06 18:33:36'),
(2, 'ygunp46hiud36lzs9bre.png', 'https://site.virtual', 0, 0, '2025-01-06 18:44:25', '2025-01-18 22:17:38'),
(3, 'xuq3vjkqorsabrsud1jx.png', 'https://site.virtual', 0, 0, '2025-01-06 18:44:40', '2025-01-18 22:32:15');

-- --------------------------------------------------------

--
-- Структура таблиці `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблиці `product`
--

CREATE TABLE `product` (
  `id` int NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `sku` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `sub_category_id` int DEFAULT NULL,
  `brand_id` int DEFAULT NULL,
  `old_price` double NOT NULL DEFAULT '0',
  `price` double NOT NULL DEFAULT '0',
  `short_description` text COLLATE utf8mb4_general_ci,
  `description` longtext COLLATE utf8mb4_general_ci,
  `additional_information` text COLLATE utf8mb4_general_ci,
  `shipping_returns` text COLLATE utf8mb4_general_ci,
  `is_trendy` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0:active, 1:inactive',
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0:not delete,1: delete',
  `created_by` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `product`
--

INSERT INTO `product` (`id`, `title`, `slug`, `sku`, `category_id`, `sub_category_id`, `brand_id`, `old_price`, `price`, `short_description`, `description`, `additional_information`, `shipping_returns`, `is_trendy`, `status`, `is_delete`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Yellow lace cut out swing dress222', 'yellow-lace-cut-out-swing-dress', 'wewew45', 4, 12, 1, 44, 340, 'Praesent quis orci sit amet ante facilisis suscipit. Integer in eros molestie, ultricies arcu ac, cursus quam. Nulla facilisi. Ut egestas semper magna ac condimentum. Aliquam erat volutpat. Sed bibendum sollicitudin orci, at viverra metus vehicula sed.', '<p>Praesent quis orci sit amet ante facilisis suscipit. Integer in eros molestie, ultricies arcu ac, cursus quam. Nulla facilisi. Ut egestas semper magna ac condimentum. Aliquam erat volutpat. Sed bibendum sollicitudin orci, at viverra metus vehicula sed.</p>\r\n<p>Nullam vehicula magna sit amet magna ullamcorper, at dictum est gravida. Morbi nec magna at quam malesuada accumsan. Suspendisse potenti. Vivamus feugiat massa ut tortor scelerisque, non dapibus nulla consectetur. Aliquam erat volutpat.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>\r\n<p>Fusce at nisi arcu. Quisque sed dolor nec dui scelerisque dapibus. Sed at purus at sem aliquet luctus. Sed non massa sit amet sapien porttitor ornare. Vivamus pretium, tortor at tempus ullamcorper, diam ligula lobortis quam, at scelerisque libero lectus ut risus.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Praesent quis orci sit amet ante facilisis suscipit. Integer in eros molestie, ultricies arcu ac, cursus quam. Nulla facilisi. Ut egestas semper magna ac condimentum. Aliquam erat volutpat. Sed bibendum sollicitudin orci, at viverra metus vehicula sed.</p>\r\n<p>Nullam vehicula magna sit amet magna ullamcorper, at dictum est gravida. Morbi nec magna at quam malesuada accumsan. Suspendisse potenti. Vivamus feugiat massa ut tortor scelerisque, non dapibus nulla consectetur. Aliquam erat volutpat.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>\r\n<p>Fusce at nisi arcu. Quisque sed dolor nec dui scelerisque dapibus. Sed at purus at sem aliquet luctus. Sed non massa sit amet sapien porttitor ornare. Vivamus pretium, tortor at tempus ullamcorper, diam ligula lobortis quam, at scelerisque libero lectus ut risus.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', '<p>Praesent quis orci sit amet ante facilisis suscipit. Integer in eros molestie, ultricies arcu ac, cursus quam. Nulla facilisi. Ut egestas semper magna ac condimentum. Aliquam erat volutpat. Sed bibendum sollicitudin orci, at viverra metus vehicula sed.</p>\r\n<p>Nullam vehicula magna sit amet magna ullamcorper, at dictum est gravida. Morbi nec magna at quam malesuada accumsan. Suspendisse potenti. Vivamus feugiat massa ut tortor scelerisque, non dapibus nulla consectetur. Aliquam erat volutpat.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>\r\n<p>Fusce at nisi arcu. Quisque sed dolor nec dui scelerisque dapibus. Sed at purus at sem aliquet luctus. Sed non massa sit amet sapien porttitor ornare. Vivamus pretium, tortor at tempus ullamcorper, diam ligula lobortis quam, at scelerisque libero lectus ut risus.</p>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>', 1, 0, 0, 1, '2024-09-05 08:23:33', '2025-01-13 23:52:53'),
(3, '356t3', 'dark-yellow-lace-cut-out-swing-dress-2', '87ouyi', 1, 3, 1, 45, 341, 'Curabitur at felis non libero suscipit fermentum. Duis volutpat, ante et scelerisque luctus, sem nulla placerat leo, at aliquet libero justo id nulla. Integer at dui nec magna posuere fringilla. Nunc euismod bibendum augue. Cras nec ligula velit. Donec in laoreet leo.', '<p>Curabitur at felis non libero suscipit fermentum. Duis volutpat, ante et scelerisque luctus, sem nulla placerat leo, at aliquet libero justo id nulla. Integer at dui nec magna posuere fringilla. Nunc euismod bibendum augue. Cras nec ligula velit. Donec in laoreet leo.</p>', '<p>Curabitur at felis non libero suscipit fermentum. Duis volutpat, ante et scelerisque luctus, sem nulla placerat leo, at aliquet libero justo id nulla. Integer at dui nec magna posuere fringilla. Nunc euismod bibendum augue. Cras nec ligula velit. Donec in laoreet leo.</p>', '<p>Curabitur at felis non libero suscipit fermentum. Duis volutpat, ante et scelerisque luctus, sem nulla placerat leo, at aliquet libero justo id nulla. Integer at dui nec magna posuere fringilla. Nunc euismod bibendum augue. Cras nec ligula velit. Donec in laoreet leo.</p>', 1, 0, 0, 1, '2024-09-05 08:38:19', '2025-01-10 02:55:33'),
(4, 'Facere et neque nisi 3536t3', 'brown-paperbag-waist-pencil-skirt', 'Illum34', 4, 12, 2, 220, 342, 'Ullam aliquip aliqua', '<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque sodales, velit nec euismod scelerisque, lectus est interdum eros, sit amet bibendum eros sapien in magna. Quisque suscipit ligula eu turpis dignissim, a eleifend ipsum cursus.</p>', '<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque sodales, velit nec euismod scelerisque, lectus est interdum eros, sit amet bibendum eros sapien in magna. Quisque suscipit ligula eu turpis dignissim, a eleifend ipsum cursus.</p>', '<p>Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia curae; Pellentesque sodales, velit nec euismod scelerisque, lectus est interdum eros, sit amet bibendum eros sapien in magna. Quisque suscipit ligula eu turpis dignissim, a eleifend ipsum cursus.</p>', 1, 0, 0, 1, '2024-09-06 07:27:19', '2025-01-13 00:21:03'),
(5, 'Testova produktsia_1  wew324323', 'testova-produktsia-1', 'SACA', 5, 4, 1, 320, 343, 'Ullam aliquip aliqua', '<p>Ullam aliquip aliqua</p>', '<p>Ullam aliquip aliqua</p>', '<p>Ullam aliquip aliqua</p>', 1, 0, 0, 1, '2024-10-08 03:11:53', '2025-01-10 02:55:33'),
(6, 'testova productsia 278787', 'testova-productsia-2', 'Lorem et fugit nequ', 1, 3, 1, 790, 344, 'Sed velit minim culp', '<p>Sed velit minim culp Sed velit minim culpSed velit minim culpSed velit minim culp</p>', '<p>Sed velit minim culp Sed velit minim culp Sed velit minim culp</p>', '<p>Sed velit minim culp Sed velit minim culp&nbsp;</p>', 1, 0, 0, 1, '2024-10-08 03:12:37', '2025-01-10 02:55:33'),
(7, 'Odit aliquip est min909', 'odit-aliquip-est-min', '45rt6u', 5, 8, 1, 55, 345, 'Phasellus ac eros at urna condimentum lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed bibendum, sapien a venenatis fermentum, mauris augue cursus turpis, vitae elementum massa orci sit amet massa. In hac habitasse platea dictumst.', '<p>Etiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>', '<p>Etiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>', '<p>Etiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>', 1, 0, 0, 1, '2024-10-15 06:10:58', '2025-02-13 22:13:14'),
(8, 'Odit aliquip est min910-2345', 'odit-aliquip-est-min-2345', '45rt6u2345', 5, 8, 1, 56, 346, 'Phasellus ac eros at urna condimentum lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed bibendum, sapien a venenatis fermentum, mauris augue cursus turpis, vitae elementum massa orci sit amet massa. In hac habitasse platea dictumst.', '<p>Etiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>', '<p>Etiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>', '<p>Etiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>', 1, 0, 0, 1, '2024-10-15 06:10:58', '2025-02-15 20:38:24'),
(9, 'Odit aliquip est min910-2345', 'odit-aliquip-est-min-239', '45rt6u2345', 1, 3, 1, 56, 400, 'Phasellus ac eros at urna condimentum lacinia. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Sed bibendum, sapien a venenatis fermentum, mauris augue cursus turpis, vitae elementum massa orci sit amet massa. In hac habitasse platea dictumst.', '<p>Etiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>', '<p>Etiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>', '<p>Etiam accumsan urna a mauris dapibus, nec aliquet nunc convallis. Phasellus eget justo et libero ultrices posuere. Cras euismod, arcu nec congue convallis, ipsum nunc cursus nibh, vel condimentum sapien orci non libero. Integer ullamcorper felis sit amet felis placerat, eu convallis lorem iaculis.</p>\r\n<p>Donec et urna vel risus feugiat pharetra. Proin id lacus vitae velit accumsan venenatis. Aenean non mi vel nisi lacinia maximus. Duis efficitur, sapien quis bibendum auctor, lectus risus feugiat sapien, ac pulvinar orci est a arcu. Integer id augue vitae urna tristique tempus.</p>', 1, 0, 0, 1, '2025-01-10 02:56:54', '2025-01-13 23:44:48');

-- --------------------------------------------------------

--
-- Структура таблиці `product_color`
--

CREATE TABLE `product_color` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `color_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `product_color`
--

INSERT INTO `product_color` (`id`, `product_id`, `color_id`, `created_at`, `updated_at`) VALUES
(295, 1, 6, '2025-02-11 18:21:16', '2025-02-11 18:21:16'),
(296, 7, 7, '2025-02-13 22:13:14', '2025-02-13 22:13:14'),
(297, 4, 9, '2025-02-15 17:55:29', '2025-02-15 17:55:29'),
(298, 4, 7, '2025-02-15 17:55:29', '2025-02-15 17:55:29'),
(299, 8, 6, '2025-02-15 20:38:24', '2025-02-15 20:38:24'),
(300, 9, 7, '2025-02-15 20:38:33', '2025-02-15 20:38:33');

-- --------------------------------------------------------

--
-- Структура таблиці `product_image`
--

CREATE TABLE `product_image` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `image_name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_extension` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `order_by` int NOT NULL DEFAULT '100',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `product_image`
--

INSERT INTO `product_image` (`id`, `product_id`, `image_name`, `image_extension`, `order_by`, `created_at`, `updated_at`) VALUES
(4, 4, '4kpecm3cdvj60wsmimew0.png', 'png', 1, '2024-10-07 14:01:22', '2024-10-09 09:26:08'),
(6, 4, '4urdqe2xlm8pjhzvirnin.png', 'png', 2, '2024-10-07 14:01:22', '2024-10-09 09:26:08'),
(7, 6, '6n5kydt7d0bpqpxdhexmz.png', 'png', 3, '2024-10-08 09:18:14', '2024-10-08 09:18:40'),
(8, 6, '6delw5rbellnavmxmjdkn.png', 'png', 1, '2024-10-08 09:18:14', '2024-10-08 09:18:36'),
(9, 6, '6wv5idmftp5rxim63hr3r.png', 'png', 2, '2024-10-08 09:18:14', '2024-10-08 09:18:40'),
(12, 3, '3j2cr6u5nixrp9omz4iff.png', 'png', 100, '2024-10-10 09:16:19', '2024-10-10 09:16:19'),
(13, 3, '3sfdyuoenwdzrmr8zis4k.png', 'png', 100, '2024-10-10 09:16:19', '2024-10-10 09:16:19'),
(14, 1, '1zlcayum8nfo7of2bttx4.png', 'png', 100, '2024-10-10 09:16:42', '2024-10-10 09:16:42'),
(15, 1, '1rmkexd5qieh5tz3ghgek.png', 'png', 100, '2024-10-10 09:16:42', '2024-10-10 09:16:42'),
(16, 1, '1qcwfo6wadsngqezfw0ct.png', 'png', 100, '2024-10-10 09:16:42', '2024-10-10 09:16:42'),
(17, 7, '7u8esvar6ui3csiozlwqu.png', 'png', 3, '2024-10-15 12:12:14', '2024-12-28 20:26:08'),
(18, 7, '75lpx5seychya6smuv5q8.png', 'png', 1, '2024-10-15 12:12:15', '2024-12-28 20:26:06'),
(19, 7, '78mt53sgya4ptfzb2rboi.png', 'png', 2, '2024-10-15 12:12:15', '2024-12-28 20:26:08'),
(20, 5, '5ohvcdb1goslotj2xxua2.jpg', 'jpg', 100, '2024-10-18 08:22:47', '2024-10-18 08:22:47'),
(21, 5, '5hlqqhzg0upsdjqvavyvn.jpg', 'jpg', 100, '2024-10-18 08:22:47', '2024-10-18 08:22:47'),
(22, 5, '5eiynqrxksoa0jnr7crhk.jpg', 'jpg', 100, '2024-10-18 08:22:47', '2024-10-18 08:22:47'),
(23, 5, '5mlltqqttfpbkxekk8ee4.jpg', 'jpg', 100, '2024-10-18 08:22:47', '2024-10-18 08:22:47'),
(25, 8, '830hjkylszpydr3m7zhaa.jpg', 'jpg', 100, '2025-01-08 00:11:37', '2025-01-08 00:11:37'),
(27, 9, '830hjkylszpydr3m7zhaa.jpg', 'jpg', 100, '2025-01-10 02:56:54', '2025-01-10 02:56:54');

-- --------------------------------------------------------

--
-- Структура таблиці `product_review`
--

CREATE TABLE `product_review` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `order_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `rating` int NOT NULL DEFAULT '0',
  `review` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0:not delete,1: delete',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `product_review`
--

INSERT INTO `product_review` (`id`, `product_id`, `order_id`, `user_id`, `rating`, `review`, `is_delete`, `created_at`, `updated_at`) VALUES
(4, 3, 66, 1, 1, 'Lorem Ipsum є псевдо- латинський текст використовується у веб - дизайні, типографіка, верстка, і друку замість англійської підкреслити елементи дизайну над змістом. Це також називається заповнювач ( або наповнювач) текст. Це зручний інструмент для макетів. Це допомагає намітити візуальні елементи в документ або презентацію, наприклад, друкарня, шрифт, або макет. Lorem Ipsum в основному частиною латинського тексту за класичною автор і філософа Цицерона. Це слова і букви були змінені додаванням або видаленням, так навмисно роблять його зміст безглуздо, це не є справжньою, правильно чи зрозумілою Латинської більше. У той час як Lorem Ipsum все ще нагадує класичну латину, він насправді не має ніякого значення.', 0, '2024-12-27 20:37:21', '2024-12-29 02:06:28'),
(8, 3, 88, 1, 5, 'Cool product real!', 0, '2024-12-29 18:37:59', '2024-12-29 18:37:59');

-- --------------------------------------------------------

--
-- Структура таблиці `product_size`
--

CREATE TABLE `product_size` (
  `id` int NOT NULL,
  `product_id` int DEFAULT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `price` float NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `product_size`
--

INSERT INTO `product_size` (`id`, `product_id`, `name`, `price`, `created_at`, `updated_at`) VALUES
(78, 1, '100cm', 100, '2025-02-11 18:21:16', '2025-02-11 18:21:16'),
(79, 7, 'XL', 20, '2025-02-13 22:13:14', '2025-02-13 22:13:14'),
(80, 4, 'XXl', 442, '2025-02-15 17:55:29', '2025-02-15 17:55:29');

-- --------------------------------------------------------

--
-- Структура таблиці `product_wishlist`
--

CREATE TABLE `product_wishlist` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `product_id` int DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `product_wishlist`
--

INSERT INTO `product_wishlist` (`id`, `user_id`, `product_id`, `created_at`, `updated_at`) VALUES
(53, 1, NULL, '2024-12-26 00:39:54', '2024-12-26 00:39:54');

-- --------------------------------------------------------

--
-- Структура таблиці `shipping_charge`
--

CREATE TABLE `shipping_charge` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` varchar(25) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` tinyint DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `shipping_charge`
--

INSERT INTO `shipping_charge` (`id`, `name`, `price`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(5, 'Безкоштовна доставка', '0', 0, 0, '2024-11-15 13:25:01', '2024-11-15 13:25:01'),
(6, 'Доставка по місту', '70', 0, 0, '2024-11-15 13:25:48', '2024-11-15 13:26:52');

-- --------------------------------------------------------

--
-- Структура таблиці `slider`
--

CREATE TABLE `slider` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `button_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `button_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `is_delete` tinyint NOT NULL DEFAULT '0',
  `status` tinyint NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `slider`
--

INSERT INTO `slider` (`id`, `title`, `image_name`, `button_name`, `button_link`, `is_delete`, `status`, `created_at`, `updated_at`) VALUES
(3, 'Living Room 2', 'd6cnmnu4tcabzr6uabm2.jpg', 'Shop Easy', 'https://site.virtual', 0, 0, '2025-01-03 23:33:59', '2025-01-04 00:01:45'),
(4, 'Living Room', 'j2xppeztdqsk5lom3old.jpg', 'Shop Now', 'https://site.virtual', 0, 0, '2025-01-04 00:13:46', '2025-01-04 00:13:46'),
(5, 'Living Room 3', 'i5pqfsvtzsdg5wxprujy.jpg', 'Shop Now Easy', 'https://site.virtual', 0, 0, '2025-01-04 00:14:19', '2025-01-04 00:20:42'),
(6, 'Living Room 4', 'bas4votdzvnmeelcfvet.jpg', 'Shop Now', 'https://site.virtual', 0, 0, '2025-01-04 00:26:24', '2025-01-04 00:26:24');

-- --------------------------------------------------------

--
-- Структура таблиці `smtp`
--

CREATE TABLE `smtp` (
  `id` int NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_mailer` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_host` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_port` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_encryption` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `mail_from_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `smtp`
--

INSERT INTO `smtp` (`id`, `name`, `mail_mailer`, `mail_host`, `mail_port`, `mail_username`, `mail_password`, `mail_encryption`, `mail_from_address`, `created_at`, `updated_at`) VALUES
(1, 'site1.virtua', 'smtp', 'sandbox.smtp.mailtrap.io', '2525', '6c74a169272921', '1bfa3ca6f9d7e4', 'tls', 'from@example.com', NULL, '2025-02-15 19:14:46');

-- --------------------------------------------------------

--
-- Структура таблиці `sub_category`
--

CREATE TABLE `sub_category` (
  `id` int NOT NULL,
  `category_id` int DEFAULT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `meta_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `meta_keywords` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_by` int DEFAULT NULL,
  `status` tinyint NOT NULL DEFAULT '0',
  `is_delete` int NOT NULL DEFAULT '0',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `sub_category`
--

INSERT INTO `sub_category` (`id`, `category_id`, `name`, `slug`, `meta_title`, `meta_description`, `meta_keywords`, `created_by`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 1, 'SUB_Lifestyle', 'SUB_Lifestyle', 'SUB_Lifestyle is a great category', 'SUB_Lifestyle is a great category for all', 'SUB_Lifestyle is a great category for all', 1, 0, 1, '2024-09-03 13:46:19', '2024-09-20 12:58:40'),
(3, 1, 'Shopping', 'Shopping', 'Shopping', 'Shopping', 'Shopping', 1, 0, 0, '2024-09-04 07:42:15', '2024-09-20 12:57:46'),
(4, 5, 'Fashion3', 'Fashion3', 'Fashion', 'Fashion', 'Fashion', 1, 0, 0, '2024-09-04 07:42:37', '2024-09-20 12:57:49'),
(7, 3, 'Isabella Puckett', 'Labore provident au', 'Aut qui in proident', 'Laboriosam magni ac', 'Laboriosam magni ac', 1, 0, 0, '2024-09-05 12:14:43', '2024-10-09 07:10:21'),
(8, 5, 'Sawyer Leblanc', 'sawyer-leblanc', 'Vel eligendi ad comm', 'Officia unde dicta s', 'Consequatur debitis', 1, 0, 0, '2024-10-09 07:21:59', '2024-10-09 07:21:59'),
(9, 3, 'Riley Ryan', 'rileyryan', 'Eaque ut ullamco sin', 'Qui velit aperiam b', 'Velit minus pariatu', 1, 0, 0, '2024-10-09 07:22:32', '2024-10-09 07:22:32'),
(10, 2, 'Odysseus Clements', 'odysseus-clements', 'Quia deserunt ipsum', 'Irure cumque volupta', 'Harum qui aute quod', 1, 0, 0, '2024-10-09 07:23:06', '2024-10-09 07:23:06'),
(11, 3, 'Autumn Pittman', 'autumn-pittman', 'Voluptate unde sit', 'Totam hic placeat a', 'Facilis ad architect', 1, 0, 0, '2024-10-09 07:23:44', '2024-10-09 07:23:44'),
(12, 4, 'Ursa Edwards', 'Est in dignissimos i', 'Pariatur Consequunt', 'Eveniet qui sed asp', 'Eveniet qui sed asp', 1, 0, 0, '2024-10-09 07:24:20', '2025-01-13 00:01:56');

-- --------------------------------------------------------

--
-- Структура таблиці `system_setting`
--

CREATE TABLE `system_setting` (
  `id` int NOT NULL,
  `website_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `footer_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `phone_two` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `submit_email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `email_two` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `working_hours` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `facebook_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `instagram_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `youtube_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `tiktok_link` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `logo` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `favicon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `footer_payment_icon` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп даних таблиці `system_setting`
--

INSERT INTO `system_setting` (`id`, `website_name`, `footer_description`, `address`, `phone`, `phone_two`, `submit_email`, `email`, `email_two`, `working_hours`, `facebook_link`, `instagram_link`, `youtube_link`, `tiktok_link`, `logo`, `favicon`, `footer_payment_icon`, `created_at`, `updated_at`) VALUES
(1, 'Test2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'вул. Українська, 2П /1, Нижній Вербіж, Івано-Франківська область, 78218', '+38 0123 456 790', '+38 0123 456 791', 'example1@gmail.com', 'example@gmail.com', 'example2@gmail.com', 'Пн-Пт: 8.00-17.00 Суб:8.00-15.00', 'https://www.facebook.com/1/', 'https://www.instagram.com/', 'https://www.youtube.com', 'https://www.tiktok.com', 'aen71apwsc.png', '9aqzdgq61a.ico', 'snig948neb.png', NULL, '2025-02-14 02:52:08.00');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `company_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `delivery_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `is_super_admin` tinyint(1) NOT NULL DEFAULT '0',
  `is_admin` tinyint NOT NULL DEFAULT '0' COMMENT '0:customer, 1:admin',
  `status` tinyint NOT NULL DEFAULT '0' COMMENT '0:active, 1: inactive',
  `is_delete` tinyint NOT NULL DEFAULT '0' COMMENT '0:not, 1: deleted',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verified_at`, `password`, `remember_token`, `company_name`, `phone`, `delivery_address`, `is_super_admin`, `is_admin`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Dallas', 'Brugie', 'e-mail@fts.ua', '2024-08-30 15:36:34', '$2y$12$Ehv8tbud.Wfoq1V7lXpN2eghhacnXv/pbqrMdkkj.poLqb11yupWK', 'pJSZnKeaU2TyOhgpQyYpwR1Lp0lfVj628Dwkp7ZbCXw3fAzwQRTTr0p6dXWU', 'Tran Torres Trading', '+1 (385) 764-7914', 'Praesentium in nisi', 1, 1, 0, 0, '2024-08-30 15:38:06', '2025-01-26 17:31:45'),
(88, 'Oliver', NULL, 'jafubavehi@mailinator.com', '2025-02-03 23:24:44', '$2a$12$mYqVjEHKnEfHMS31QX6hIupIQx488DtRVJXE6Fo80N/H1l2Y/VZp6', NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2024-11-15 12:03:35', '2024-12-11 10:13:17'),
(89, 'Oliver', NULL, 'bavehi@mailinator.com', NULL, '$2y$12$2X3pFH2dseWgJvWuuO/XguUACmJ2FwnGG3.wTzclWc1LS1fycugea', NULL, NULL, NULL, NULL, 0, 1, 0, 1, '2024-11-15 12:04:24', '2025-01-26 20:41:34'),
(90, 'Ramona', NULL, 'zukyc@mailinator.com', NULL, '$2y$12$S7VJVuOXw02Os22aEcRgA.bAxBnmYjvwgsxB1XWWp2ZWYOun8xQc2', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-11-15 12:07:37', '2024-11-15 12:07:37'),
(91, 'Vincent', NULL, 'pytubocuv@mailinator.com', NULL, '$2y$12$JieHAPl/aFvDKOJu/bfdkeVmvtYRxBiAnrzNYvqXI8dFOREWoiWnG', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-11-15 12:14:40', '2024-11-15 12:14:40'),
(92, 'Nero', NULL, 'roqono@mailinator.com', NULL, '$2y$12$hmFefdmpPm0I/B3uipqT9.82vsiDLvq98Ackpmi2jVj8grg18FIzy', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-11-15 12:34:57', '2024-11-15 12:34:57'),
(93, 'Kaseem', NULL, 'cosi@mailinator.com', NULL, '$2y$12$y4AKAHAUxs0reRjVPvGt7uT5l4HO6qFdGNdvFf0WCwv4qwHqsY.pu', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-11-18 08:28:24', '2024-11-18 08:28:24'),
(94, 'Grant', NULL, 'syrovojyf@mailinator.com', NULL, '$2y$12$DLSuut0Pueb58py7/DXcmO2Nd6MjizqkLW2hCIqpPBOxPylpRQtPe', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-11-19 05:26:06', '2024-11-19 05:26:06'),
(95, 'Isaac', NULL, 'vacose@mailinator.com', NULL, '$2y$12$zaJfK5Ct5S1swRVuFlYVb.xptt6X4g8AH4QuRu4UxS0MeQ3VezLei', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-11-19 08:28:29', '2024-11-19 08:28:29'),
(96, 'Isaac', NULL, 'vae@mailinator.com', NULL, '$2y$12$T6V06A4Bt7.Zhe.jt2pRy.ltXWZ0hAQlk/KkbySL.lHipb6lZETQm', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-11-19 08:29:46', '2024-11-19 08:29:46'),
(97, 'Barrett', NULL, 'rorozene@mailinator.com', NULL, '$2y$12$Wzb69gu3/M9.3ZIRuq9Xhuz7gRwzsNFJtNzY1CxZNZtyyR8gN8PMu', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-11-28 11:34:43', '2024-11-28 11:34:43'),
(98, 'Ria', NULL, 'gewaluguja@mailinator.com', NULL, '$2y$12$wg9WKeOeRpTt6dJIowurn.8lzx.gsfGunJ9crt3iWUjvQ1Yxntiou', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-12-12 11:50:11', '2024-12-12 11:50:11'),
(99, 'May Vaughn', NULL, 'qeqi@mailinator.com', '2024-12-25 09:51:16', '$2y$12$d.NSJC4ogjGYRqN8rNyzVeVvX4bpnHYfWKy6Q5U8BGvJQivtcec8K', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-12-25 09:51:01', '2024-12-25 09:51:16'),
(100, 'Medge Frost', NULL, 'nasixanipu@mailinator.com', '2024-12-25 09:53:03', '$2y$12$TGJYtq1BFsQwdHxpcc7/SOkSOomAjlGPZ6Fnq.enetPj7v1Wo5I.K', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2024-12-25 09:52:55', '2024-12-25 09:53:03'),
(101, 'Stuart Wilkins', NULL, 'tuqybiwinu@mailinator.com', '2025-01-26 20:43:35', '$2y$12$jncoVdY8rVdCnWi7aNcI6.HmZ/FhW5Ov8EYrnZkzUCn38FjGyVstC', 'YuN2FpKiTWeouKL2RUFh0Zw2ResrfGwdD2uLjxLpsr7cNCdSVCrVFhbV6xIO', NULL, NULL, NULL, 0, 1, 0, 0, '2025-01-26 20:42:37', '2025-01-26 20:43:35'),
(102, 'Caleb Frank', NULL, 'jutyrijapi@mailinator.com', NULL, '$2y$12$SqkAp2Mm8KdJJSvBvxm2Q.f0IHYpGWsC9Gmn7RWPKgFwEXETm2786', NULL, NULL, NULL, NULL, 0, 1, 0, 0, '2025-01-26 21:02:13', '2025-01-26 21:02:13'),
(103, 'Roanna Rodriguez', NULL, 'xixazyweme@mailinator.com', '2025-02-05 17:46:48', '$2y$12$RZnlXa4Ra4/VLNMGCcGa8uW9Q.rqSrBKif1xT5dMQbk9hpQv.yRTi', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2025-02-05 17:44:13', '2025-02-05 17:46:48'),
(104, 'Camille Welch', NULL, 'revatavy@mailinator.com', '2025-02-05 18:01:03', '$2y$12$AfUs82tWJBX8qQ1ehP5u1eghGdPwsUhsuqloqFrXVyiq8feB6JmYW', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2025-02-05 17:59:07', '2025-02-05 18:01:03'),
(105, 'Athena Bean', NULL, 'cobawy@mailinator.com', '2025-02-05 18:01:08', '$2y$12$ICRFvcs/rjfOWh9LBLCKvu039dSwR/XoG/GoL/3INNxc5/0Ug2RqW', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2025-02-05 17:59:40', '2025-02-05 18:01:08'),
(106, 'Harlan Frazier', NULL, 'rumu@mailinator.com', NULL, '$2y$12$IBbi0MgodWOwnGFwjvIJOOo.3DnSD5oROWoSoKQh9Q7LhBflB8YGa', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2025-02-07 22:03:37', '2025-02-07 22:03:37'),
(107, 'Dylan Hayden', NULL, 'xarerypoc@mailinator.com', NULL, '$2y$12$jZL4.2bnbtDnoMZnrfcSvee5LYXeihEp8OH7INcdy6cnpg66IcRga', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2025-02-07 22:06:33', '2025-02-07 22:06:33'),
(108, 'Ignacia Craig', NULL, 'soxobyxuh@mailinator.com', NULL, '$2y$12$ns69Rt5/1UYXLH.x78lU0.rcHGbDbSENslB.hjfBr/P410A/zGziG', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2025-02-14 00:17:16', '2025-02-14 00:17:16'),
(109, 'Catherine', 'Atkins', 'vibagot@mailinator.com', '2025-02-14 00:25:54', '$2y$12$eBKDrzV4k9bO92ZbTo6ZVOBTfQLL3IM0qfY1IqYxctIeWjQVeggym', 'wH1mDiI2ofZvdfo8Ko29TLniHwEF8V', 'Jarvis and Dejesus Associates', '+1 (524) 105-4104', 'Consectetur sed err', 0, 0, 0, 0, '2025-02-14 00:21:49', '2025-02-14 00:27:21'),
(110, 'Mary', NULL, 'capykume@mailinator.com', NULL, '$2y$12$JRoDukp/3IvVycMpJY9Rqexnj5rxuQi8c5IYcq/fUTZv8KPbM1fqW', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2025-02-15 19:54:24', '2025-02-15 19:54:24'),
(111, 'Adam', NULL, 'cebodo@mailinator.com', NULL, '$2y$12$AynIJ78dAL.2AwfYAjPvmeoH2uS1R7pEufEx9qJS.P8ZHauUv.kGu', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2025-02-18 19:41:53', '2025-02-18 19:41:53'),
(112, 'Gail', NULL, 'jyqibynyto@mailinator.com', NULL, '$2y$12$YLAEWAMewC0EKjMSauGMcObfqINHanQ.w.rBen4bajlX/WZnbdHk2', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2025-02-18 19:46:14', '2025-02-18 19:46:14'),
(113, 'test', NULL, 'test@test.eu', NULL, '$2y$12$lwizpZxK/oQlfWmpw1Ks8uK.n7XW03uJz0kpOo86DKfn2Jmky39Ru', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2025-02-18 23:22:53', '2025-02-18 23:22:53'),
(114, 'Ian', NULL, 'wydy@mailinator.com', NULL, '$2y$12$9B4kZVDMAU9zShae0DClV.A5/P7zVF92CBvzSi6/v7iirslJukT2.', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2026-02-28 08:12:05', '2026-02-28 08:12:05'),
(115, 'Blake', NULL, 'mivejugad@mailinator.com', NULL, '$2y$12$7Ta/ec0m29W4IudMUR6wg.IC3l.5vloif7PeH.yehq9VRVgcrV6LC', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2026-02-28 08:13:54', '2026-02-28 08:13:54');

--
-- Індекси збережених таблиць
--

--
-- Індекси таблиці `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `blog_comment`
--
ALTER TABLE `blog_comment`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `card_setting`
--
ALTER TABLE `card_setting`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `color`
--
ALTER TABLE `color`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `contact_us`
--
ALTER TABLE `contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `discount_code`
--
ALTER TABLE `discount_code`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Індекси таблиці `home_setting`
--
ALTER TABLE `home_setting`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `orders_item`
--
ALTER TABLE `orders_item`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_order_item` (`order_id`,`product_id`,`color_name`,`size_name`);

--
-- Індекси таблиці `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `partner`
--
ALTER TABLE `partner`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Індекси таблиці `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Індекси таблиці `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product_color`
--
ALTER TABLE `product_color`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product_image`
--
ALTER TABLE `product_image`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product_review`
--
ALTER TABLE `product_review`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product_size`
--
ALTER TABLE `product_size`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `product_wishlist`
--
ALTER TABLE `product_wishlist`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `shipping_charge`
--
ALTER TABLE `shipping_charge`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `smtp`
--
ALTER TABLE `smtp`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `sub_category`
--
ALTER TABLE `sub_category`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `system_setting`
--
ALTER TABLE `system_setting`
  ADD PRIMARY KEY (`id`);

--
-- Індекси таблиці `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для збережених таблиць
--

--
-- AUTO_INCREMENT для таблиці `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT для таблиці `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `blog_comment`
--
ALTER TABLE `blog_comment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблиці `brand`
--
ALTER TABLE `brand`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблиці `card_setting`
--
ALTER TABLE `card_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT для таблиці `color`
--
ALTER TABLE `color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `contact_us`
--
ALTER TABLE `contact_us`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT для таблиці `discount_code`
--
ALTER TABLE `discount_code`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT для таблиці `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `home_setting`
--
ALTER TABLE `home_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT для таблиці `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=169;

--
-- AUTO_INCREMENT для таблиці `page`
--
ALTER TABLE `page`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT для таблиці `partner`
--
ALTER TABLE `partner`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблиці `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `product`
--
ALTER TABLE `product`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT для таблиці `product_color`
--
ALTER TABLE `product_color`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT для таблиці `product_image`
--
ALTER TABLE `product_image`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT для таблиці `product_review`
--
ALTER TABLE `product_review`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT для таблиці `product_size`
--
ALTER TABLE `product_size`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT для таблиці `product_wishlist`
--
ALTER TABLE `product_wishlist`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT для таблиці `shipping_charge`
--
ALTER TABLE `shipping_charge`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблиці `smtp`
--
ALTER TABLE `smtp`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `sub_category`
--
ALTER TABLE `sub_category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT для таблиці `system_setting`
--
ALTER TABLE `system_setting`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблиці `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=116;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
