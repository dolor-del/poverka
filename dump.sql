-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Апр 24 2024 г., 08:09
-- Версия сервера: 8.0.36-0ubuntu0.22.04.1
-- Версия PHP: 8.2.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `poverka`
--

-- --------------------------------------------------------

--
-- Структура таблицы `meters`
--

CREATE TABLE `meters` (
  `id` bigint UNSIGNED NOT NULL,
  `doc_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state_register` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `meter_number` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `modification` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `temperature` double(8,2) NOT NULL,
  `date_contract` date NOT NULL,
  `date_expire` date NOT NULL,
  `order_id` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `meters`
--

INSERT INTO `meters` (`id`, `doc_number`, `state_register`, `meter_number`, `modification`, `temperature`, `date_contract`, `date_expire`, `order_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Г 7689', '16078-05', '35678493', 'СГВ-15', 60.70, '2024-04-24', '2030-04-23', 4, '2024-04-18 08:06:09', '2024-04-23 10:44:47', NULL),
(2, 'Г 7690', '26382-07', '11 046785', 'VLF-R-U 15/1,5', 12.00, '2024-04-24', '2030-04-23', 4, '2024-04-18 08:25:42', '2024-04-23 10:47:25', NULL),
(3, 'Г 7691', '16078-05', '24567389', 'СГВ-15', 6.50, '2024-04-24', '2030-04-23', 15, '2024-04-18 08:26:01', '2024-04-23 10:47:12', NULL),
(4, 'Г 7692', '24568-05', 'М187620610', 'СВ-15Г', 62.40, '2024-04-24', '2030-04-23', 5, '2024-04-23 10:50:48', '2024-04-23 10:51:07', NULL),
(5, 'Г 7693', '37584-08', '2283468', 'ITELMA', 15.00, '2024-04-24', '2030-04-23', 5, '2024-04-23 10:52:35', '2024-04-23 10:52:35', NULL),
(6, 'Г 7694', '16078-05', '35678492', 'СГВ-15', 62.30, '2024-04-24', '2030-04-23', 2, '2024-04-23 10:53:28', '2024-04-23 10:53:28', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '2024_03_18_182418_create_orders_table', 1),
(3, '2024_03_18_183949_create_meters_table', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `orders`
--

CREATE TABLE `orders` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `declared` tinyint NOT NULL DEFAULT '1',
  `status` enum('FORMED','AWAIT','COMPLETED') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'FORMED',
  `date` datetime NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `orders`
--

INSERT INTO `orders` (`id`, `name`, `address`, `phone`, `description`, `declared`, `status`, `date`, `user_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 'Левсковская ГА', 'ул. Королева, д. 5, кв. 4', '+79037859486', '5 этаж', 3, 'AWAIT', '2024-04-24 10:00:00', 25, '2024-03-20 10:37:47', '2024-04-23 10:16:35', NULL),
(4, 'Беленко ЛВ', 'ул. Ленина, д. 118, кв. 79', '+79037859486', NULL, 2, 'COMPLETED', '2024-04-24 09:00:00', 27, '2024-03-20 10:41:55', '2024-04-23 10:48:05', NULL),
(5, 'Камышева НА', 'ул. Кирова, д. 50, кв. 67', '47-86-50', NULL, 4, 'COMPLETED', '2024-04-24 09:00:00', 25, '2024-03-20 10:58:13', '2024-04-23 10:52:52', NULL),
(6, 'Иванов ИС', 'ул. Карбышева, д. 55, кв. 40', '25-67-82', 'Глухонемой', 5, 'AWAIT', '2024-04-24 11:00:00', 27, '2024-04-18 01:43:18', '2024-04-23 10:22:47', NULL),
(7, 'Федорович ОВ', 'ул. Медведева, д. 10, кв. 5', '45-75-47', NULL, 2, 'AWAIT', '2024-04-24 12:00:00', 27, '2024-04-18 01:45:48', '2024-04-23 10:23:06', NULL),
(8, 'Герцев ВВ', 'ул. Мира, д. 60, кв. 10', '+79367894673', NULL, 1, 'FORMED', '2024-04-26 10:00:00', NULL, '2024-04-18 01:49:21', '2024-04-23 10:30:14', NULL),
(9, 'Ходырева ОА', 'ул. Пионерская, д. 15, кв. 42', '+79367894673', '3 этаж', 1, 'FORMED', '2024-04-26 12:00:00', NULL, '2024-04-18 01:51:37', '2024-04-23 10:30:31', NULL),
(10, 'Малова ЛФ', 'ул. Карбышева, д. 55, кв. 42', '+79678298374', NULL, 1, 'AWAIT', '2024-04-24 14:00:00', 27, '2024-04-18 01:58:07', '2024-04-23 10:39:52', NULL),
(11, 'Галкина НП', 'ул. Карбышева, д. 66, кв. 78', '+79037859486', '4 этаж', 1, 'AWAIT', '2024-04-24 12:00:00', 25, '2024-04-18 01:58:28', '2024-04-23 10:17:15', NULL),
(12, 'Черячукина ВИ', 'ул. 40 Лет Победы, д. 16, кв. 78', '+79367894673', NULL, 4, 'AWAIT', '2024-04-24 13:00:00', 27, '2024-04-18 06:46:59', '2024-04-23 10:23:32', NULL),
(13, 'Красильникова ЛЮ', 'ул. 87 Гвардейская, д. 67, кв. 60', '+79037859486', NULL, 1, 'AWAIT', '2024-04-24 13:00:00', 25, '2024-04-19 08:36:48', '2024-04-23 10:17:03', NULL),
(14, 'Манаева ТА', 'ул. Дружбы, д. 115, кв. 24', '+79037859486', '7 этаж, налево', 2, 'FORMED', '2024-04-25 13:00:00', NULL, '2024-04-19 08:37:08', '2024-04-23 10:29:57', NULL),
(15, 'Кельцова ЛА', 'ул. Пушкина, д. 46, кв. 48', '46-17-54', NULL, 3, 'AWAIT', '2024-04-24 10:00:00', 27, '2024-04-23 04:38:50', '2024-04-23 10:20:43', NULL),
(16, 'Батурин ВС', 'ул. Медведева, д. 15, кв. 54', '45-75-47', NULL, 2, 'FORMED', '2024-04-25 10:00:00', NULL, '2024-04-23 09:51:04', '2024-04-23 10:29:32', NULL),
(17, 'Панова АВ', 'ул. Ленина, д. 55, кв. 41', '25-67-82', NULL, 1, 'AWAIT', '2024-04-24 14:00:00', 25, '2024-04-23 09:51:50', '2024-04-23 10:17:46', NULL),
(18, 'Пилютин ВИ', 'ул. Королева, д. 46, кв. 48', '+79037859486', NULL, 2, 'AWAIT', '2024-04-24 11:00:00', 25, '2024-04-23 09:53:28', '2024-04-23 10:54:37', '2024-04-23 10:54:37');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` enum('ADMIN','DISPATCHER','WORKER') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'WORKER',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `created_at`, `updated_at`) VALUES
(17, 'Федоров ИС', 'fedorov@gmail.com', '$2y$10$KgsgCpQqu/niIc2VDcEgjeU1An1K9fO4bTd1YYPxPa6H2xmiut2qK', 'ADMIN', '2024-03-21 07:57:30', '2024-04-23 10:55:54'),
(24, 'Синицына СА', 'sinitsyna.sveta1984@mail.ru', '$2y$10$M5aDYtcbsfmYG7vHp4JJluOS5J/hnGWXNbSvZdFNYGL49O.qiyLYm', 'DISPATCHER', '2024-04-23 07:27:19', '2024-04-23 10:31:59'),
(25, 'Павлюченко АЕ', 'pavluchenko@gmail.com', '$2y$10$W5Llq1HD.lHM5SLiXzhXeO4kGeDDiwWCz.copm1PUdZMjPMeI1af6', 'WORKER', '2024-04-23 07:30:19', '2024-04-23 10:31:53'),
(26, 'Давыдов АЕ', 'davydov.ae@mail.ru', '$2y$10$oCTOYnW5SggxdOplbk/AeuizSRx5cREoxauAPPhH1NieQ0kpX9Jfu', 'ADMIN', '2024-04-23 09:58:57', '2024-04-23 10:31:48'),
(27, 'Степанов ПА', 'stepa.stepa@gmail.com', '$2y$10$R6bvUWa4hWO.cSnHy0xxfeFmXhT8G/bqV93w1RkCyhwIDm9gwo/hy', 'WORKER', '2024-04-23 09:59:40', '2024-04-23 10:32:05');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `meters`
--
ALTER TABLE `meters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `meters_order_id_foreign` (`order_id`);

--
-- Индексы таблицы `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_user_id_foreign` (`user_id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `meters`
--
ALTER TABLE `meters`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT для таблицы `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `meters`
--
ALTER TABLE `meters`
  ADD CONSTRAINT `meters_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE;

--
-- Ограничения внешнего ключа таблицы `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
