-- phpMyAdmin SQL Dump
-- version 5.2.3
-- https://www.phpmyadmin.net/
--
-- Хост: MySQL-8.4:3306
-- Час створення: Бер 05 2026 р., 08:40
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
(13, 'november_rain', 'Процент', '10', '2026-03-31', 0, 0, '2024-11-05 06:46:07', '2025-01-06 00:58:40');

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
-- Структура таблиці `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `queue` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `attempts` tinyint UNSIGNED NOT NULL,
  `reserved_at` int UNSIGNED DEFAULT NULL,
  `available_at` int UNSIGNED NOT NULL,
  `created_at` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(8, '2025_01_26_223338_add_is_super_admin_to_users_table', 4),
(9, '2026_03_01_163618_create_jobs_table', 5);

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
(202, 1, 'https://shop.test.ua/admin/orders/detail/264', 'Нове замовлення №769672039', 1, '2026-03-05 08:23:14', '2026-03-05 08:24:43'),
(203, 205, 'https://shop.test.ua/user/orders', 'Ваше замовлення №769672039 успішно оформлено', 1, '2026-03-05 08:23:14', '2026-03-05 08:23:52'),
(204, 205, 'https://shop.test.ua/user/orders', 'Замовлення №769672039<br> Статус оновлено', 1, '2026-03-05 08:25:45', '2026-03-05 08:26:15'),
(205, 1, 'https://shop.test.ua/admin/order/detail/264', 'Замовлення №769672039<br> Статус оновлено', 0, '2026-03-05 08:25:45', '2026-03-05 08:25:45'),
(206, 205, 'https://shop.test.ua/user/orders', 'Замовлення №769672039<br> Статус оновлено', 1, '2026-03-05 08:32:49', '2026-03-05 08:34:53'),
(207, 1, 'https://shop.test.ua/admin/orders/detail/264', 'Замовлення №769672039<br> Статус оновлено', 1, '2026-03-05 08:32:49', '2026-03-05 08:32:57'),
(208, 205, 'https://shop.test.ua/user/orders', 'Замовлення №769672039<br> Статус оновлено', 0, '2026-03-05 08:35:39', '2026-03-05 08:35:39'),
(209, 1, 'https://shop.test.ua/admin/orders/detail/264', 'Замовлення №769672039<br> Статус оновлено', 0, '2026-03-05 08:35:39', '2026-03-05 08:35:39'),
(210, 205, 'https://shop.test.ua/user/orders', 'Замовлення №769672039<br> Статус оновлено', 0, '2026-03-05 08:36:18', '2026-03-05 08:36:18'),
(211, 1, 'https://shop.test.ua/admin/orders/detail/264', 'Замовлення №769672039<br> Статус оновлено', 0, '2026-03-05 08:36:18', '2026-03-05 08:36:18');

-- --------------------------------------------------------

--
-- Структура таблиці `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
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

INSERT INTO `orders` (`id`, `order_number`, `first_name`, `last_name`, `company_name`, `phone`, `email`, `delivery_address`, `note`, `shipping_id`, `shipping_amount`, `discount_code`, `discount_amount`, `total_amount`, `payment_method`, `status`, `is_delete`, `is_payment`, `payment_data`, `created_at`, `updated_at`, `user_id`) VALUES
(264, '769672039', 'Ruth', 'Hopkins', 'Booker Flowers Associates', '+1 (757) 193-1601', 'wuloty@mailinator.com', 'Fugiat sint repudian', 'Culpa consequat Ni', 6, '70', '', '0', '416', 'Післяплата', 3, 0, 1, NULL, '2026-03-05 08:23:11', '2026-03-05 08:36:18', 205);

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
(270, 264, 8, 1, '346', 'Червоний', NULL, '0', '346', '2026-03-05 08:23:11', '2026-03-05 08:23:11');

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
(1, 'shop.test.ua', 'smtp', 'smtp.gmail.com', '587', 'kami74669@gmail.com', 'ueudbnapzlbwvvtz', 'tls', 'rostislavgritsyk@gmail.com', NULL, '2026-03-03 20:42:35');

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
(1, 'shop.test.ua/', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries,', 'вул. Українська, 2П /1, Нижній Вербіж, Івано-Франківська область, 78218', '+38 0123 456 790', '+38 0123 456 791', 'example1@gmail.com', 'example@gmail.com', 'example2@gmail.com', 'Пн-Пт: 8.00-17.00 Суб:8.00-15.00', 'https://www.facebook.com/1/', 'https://www.instagram.com/', 'https://www.youtube.com', 'https://www.tiktok.com', 'aen71apwsc.png', '9aqzdgq61a.ico', 'snig948neb.png', NULL, '2026-02-28 14:42:29.00');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verification_token` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
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

INSERT INTO `users` (`id`, `name`, `last_name`, `email`, `email_verification_token`, `email_verified_at`, `password`, `remember_token`, `company_name`, `phone`, `delivery_address`, `is_super_admin`, `is_admin`, `status`, `is_delete`, `created_at`, `updated_at`) VALUES
(1, 'Dallas', 'Brugie', 'e-mail@fts.ua', NULL, '2024-08-30 15:36:34', '$2y$12$Ehv8tbud.Wfoq1V7lXpN2eghhacnXv/pbqrMdkkj.poLqb11yupWK', 'ZICNtP0It1SJ0naExWU5MTjMzIGwlScOLg7j6zCyxecExVFm2uJlFxaD1w8b', 'Tran Torres Trading', '+1 (385) 764-7914', 'Praesentium in nisi', 1, 1, 0, 0, '2024-08-30 15:38:06', '2025-01-26 17:31:45'),
(205, 'Ruth Hopkins', NULL, 'jajaxozo@mailinator.com', NULL, '2026-03-04 16:52:50', '$2y$12$Sf4yAhAc2qn46tdSzGRnsOl2nSJkGmPjLBWCJZ7QJTa10cbwHbARC', NULL, NULL, NULL, NULL, 0, 0, 0, 0, '2026-03-04 16:52:27', '2026-03-04 16:52:27');

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
-- Індекси таблиці `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

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
-- AUTO_INCREMENT для таблиці `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT для таблиці `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT для таблиці `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=212;

--
-- AUTO_INCREMENT для таблиці `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=265;

--
-- AUTO_INCREMENT для таблиці `orders_item`
--
ALTER TABLE `orders_item`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=271;

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
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

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
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=206;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
