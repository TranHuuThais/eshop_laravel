-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 28, 2024 lúc 12:32 PM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `eshop2`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`, `img`, `description`, `created_at`, `updated_at`) VALUES
(2, 'Áo quần nam', '/images/vest-1.png', 'YOU?\' said the Cat. \'Do you take me for a minute or two sobs choked his voice. \'Same as if it likes.\' \'I\'d rather finish my tea,\' said the Mock Turtle persisted. \'How COULD he turn them out of the.', '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(3, 'Áo quần nữ', '', 'Women pacatana', NULL, NULL),
(4, 'Balo', '', 'Women pacatana', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(2, '2019_08_19_000000_create_failed_jobs_table', 1),
(3, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(4, '2024_01_17_074955_create_categories_table', 1),
(5, '2024_01_17_075026_create_products_table', 1),
(6, '2024_01_17_075317_create_users_table', 1),
(7, '2024_01_17_082129_create_orders_table', 1),
(8, '2024_01_17_082133_create_order_items_table', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `code`, `status`, `user_id`, `created_at`, `updated_at`) VALUES
(1, '3', 'And the muscular strength, which it gave to my boy, I beat him when he finds out who I am! But I\'d better take him his fan and a long time with the edge with each hand. \'And now which is which?\' she.', 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(2, '3', 'Alice went on again: \'Twenty-four hours, I THINK; or is it twelve? I--\' \'Oh, don\'t talk about cats or dogs either, if you cut your finger VERY deeply with a pair of gloves and the moon, and memory.', 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(3, '9', 'Lizard, who seemed to have the experiment tried. \'Very true,\' said the King. The White Rabbit cried out, \'Silence in the wood, \'is to grow to my boy, I beat him when he sneezes; For he can.', 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(4, '7', 'Majesty!\' the Duchess was VERY ugly; and secondly, because they\'re making such VERY short remarks, and she tried hard to whistle to it; but she knew the meaning of half an hour or so, and giving it.', 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(5, '7', 'It was as steady as ever; Yet you balanced an eel on the ground near the house till she was going a journey, I should think!\' (Dinah was the White Rabbit cried out, \'Silence in the pool was getting.', 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(6, '0', 'How puzzling all these changes are! I\'m never sure what I\'m going to begin at HIS time of life. The King\'s argument was, that you have of putting things!\' \'It\'s a mineral, I THINK,\' said Alice. \'It.', 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(7, '3', 'Alice, as the door and found that her idea of the Mock Turtle said: \'advance twice, set to work at once took up the fan and gloves. \'How queer it seems,\' Alice said very politely, feeling quite.', 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(8, '6', 'I do wonder what was going to begin lessons: you\'d only have to beat time when I got up this morning? I almost wish I hadn\'t begun my tea--not above a week or so--and what with the next witness. It.', 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(9, '8', 'Gryphon said to herself \'Suppose it should be like then?\' And she squeezed herself up closer to Alice\'s side as she could, and waited to see how he can thoroughly enjoy The pepper when he sneezes.', 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(10, '1', 'Alice was not here before,\' said the Mock Turtle, who looked at Alice. \'It must have got altered.\' \'It is wrong from beginning to think that will be much the same thing, you know.\' \'I don\'t think.', 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_items`
--

INSERT INTO `order_items` (`id`, `product_id`, `order_id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(2, 1, 1, 8, 4, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(3, 1, 1, 4, 6, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(4, 1, 1, 2, 6, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(5, 1, 1, 6, 1, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(6, 1, 1, 0, 0, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(7, 1, 1, 2, 8, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(8, 1, 1, 7, 4, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(9, 1, 1, 3, 5, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(10, 1, 1, 9, 8, '2024-04-15 00:17:38', '2024-04-15 00:17:38');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `img` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) DEFAULT NULL,
  `category_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `img`, `name`, `description`, `price`, `quantity`, `category_id`, `created_at`, `updated_at`) VALUES
(1, '/images/product-1.jpg', 'Schmidt', 'Canterbury, found it so quickly that the meeting adjourn, for the pool as it was the fan and gloves. \'How queer it seems,\' Alice said very humbly; \'I won\'t have any rules in particular; at least, if.', 1, 3, 2, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(2, '/images/product-1.jpg', 'dass', 'dass', 2, NULL, 2, NULL, NULL),
(23, '/images/product-1.jpg', 'Schmidt1', 'Canterbury, found it so quickly that the meeting adjourn, for the pool as it was the fan and gloves. \'How queer it seems,\' Alice said very humbly; \'I won\'t have any rules in particular; at least, if.', 3, 3, 2, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(24, '/images/product-1.jpg', 'Schmidt12', 'Canterbury, found it so quickly that the meeting adjourn, for the pool as it was the fan and gloves. \'How queer it seems,\' Alice said very humbly; \'I won\'t have any rules in particular; at least, if.', 4, 3, 2, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(25, '/images/product-1.jpg', 'Schmidt123', 'Canterbury, found it so quickly that the meeting adjourn, for the pool as it was the fan and gloves. \'How queer it seems,\' Alice said very humbly; \'I won\'t have any rules in particular; at least, if.', 5, 3, 2, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(26, '/images/product-1.jpg', 'Schmidt1234', 'Canterbury, found it so quickly that the meeting adjourn, for the pool as it was the fan and gloves. \'How queer it seems,\' Alice said very humbly; \'I won\'t have any rules in particular; at least, if.', 6, 3, 2, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(27, '/images/product-1.jpg', 'Schmidt1234', 'Canterbury, found it so quickly that the meeting adjourn, for the pool as it was the fan and gloves. \'How queer it seems,\' Alice said very humbly; \'I won\'t have any rules in particular; at least, if.', 7, 3, 2, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(28, '/images/product-2.jpg', 'Schmidtrata', 'Canterbury, found it so quickly that the meeting adjourn, for the pool as it was the fan and gloves. \'How queer it seems,\' Alice said very humbly; \'I won\'t have any rules in particular; at least, if.', 8, 3, 2, '2024-04-15 00:17:38', '2024-04-15 00:17:38'),
(29, '/images/product-4.jpg', 'mats', 'dass', 11, NULL, 2, NULL, NULL),
(30, '/images/product-4.jpg', 'dassta', 'dass', 9, NULL, 2, NULL, NULL),
(31, '/images/product-4.jpg', 'Rommer', 'dass', 10, NULL, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `role`, `remember_token`, `created_at`, `updated_at`) VALUES
(12, 'thai1', 'huuthai10@gmail.com', NULL, '$2y$12$6atKEhI5Blcl4N4CxBv9Nec851TVNinzaRO8TIc4KIESKwPVDNos2', NULL, NULL, '2024-05-07 20:52:33', '2024-05-07 20:52:33'),
(14, 'thai', 'huuthai10052004@gmail.com', NULL, '$2y$12$by7RzGVQY/LXVQs9DD5La.bs1xd.zftTEX.OAK8EMpRnZvTd4/LSW', NULL, NULL, '2024-05-24 03:31:06', '2024-05-24 03:31:06');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_product_id_foreign` (`product_id`),
  ADD KEY `order_items_order_id_foreign` (`order_id`);

--
-- Chỉ mục cho bảng `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT cho bảng `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`);

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
