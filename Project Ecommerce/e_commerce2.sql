-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Värd: localhost
-- Tid vid skapande: 25 jun 2020 kl 11:31
-- Serverversion: 8.0.18
-- PHP-version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `e_commerce2`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `orders`
--

CREATE TABLE `orders` (
  `id` int(9) NOT NULL,
  `user_id` int(9) NOT NULL,
  `total_price` int(6) NOT NULL,
  `billing_full_name` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_street` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_postal_code` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_city` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `billing_country` varchar(90) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_price`, `billing_full_name`, `billing_street`, `billing_postal_code`, `billing_city`, `billing_country`, `created_at`) VALUES
(33, 41, 475, '  a a', 'asdf', ' 123', 'asdf', 'asdf', '2020-06-24 11:57:41'),
(34, 41, 132, '  a a', 'asdf', ' 123', 'asdf', 'asdf', '2020-06-24 11:58:51'),
(35, 39, 150, 'asr kh', 'asdf', '234', 'asdf', 'adf', '2020-06-24 12:06:07'),
(36, 42, 198, ' asr  kh', 'asdf', '234 ', 'asdf', 'adf', '2020-06-24 12:08:05'),
(37, 45, 44, 'matthanaporn OAN', 'Tingshusvägen 19', '74652', 'Uppsala', 'Sverige', '2020-06-25 10:08:23'),
(38, 47, 146, 'matthanaporn OAN', 'Tingshusvägen 19', '74652', 'Uppsala', 'Sverige', '2020-06-25 10:28:22');

-- --------------------------------------------------------

--
-- Tabellstruktur `order_items`
--

CREATE TABLE `order_items` (
  `id` int(9) NOT NULL,
  `order_id` int(9) NOT NULL,
  `product_id` int(9) NOT NULL,
  `quantity` int(9) NOT NULL,
  `unit_price` int(9) NOT NULL,
  `product_title` varchar(150) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumpning av Data i tabell `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_id`, `quantity`, `unit_price`, `product_title`, `created_at`) VALUES
(40, 33, 166, 5, 95, 'Russin ECOs', '2020-06-24 11:57:41'),
(41, 34, 161, 3, 44, 'GrapeFruit', '2020-06-24 11:58:51'),
(42, 35, 162, 3, 50, 'Hamburgur', '2020-06-24 12:06:07'),
(43, 36, 163, 3, 66, 'Mango', '2020-06-24 12:08:05'),
(44, 37, 161, 1, 44, 'GrapeFruit', '2020-06-25 10:08:23'),
(45, 38, 163, 1, 66, 'Mango', '2020-06-25 10:28:22'),
(46, 38, 165, 1, 80, 'Red Gala apple', '2020-06-25 10:28:22');

-- --------------------------------------------------------

--
-- Tabellstruktur `products`
--

CREATE TABLE `products` (
  `id` int(9) NOT NULL,
  `title` varchar(90) NOT NULL,
  `description` text NOT NULL,
  `price` int(9) NOT NULL,
  `img_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumpning av Data i tabell `products`
--

INSERT INTO `products` (`id`, `title`, `description`, `price`, `img_url`) VALUES
(161, 'GrapeFruit', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ipsam, corporis minima facere deleniti facilis ipsum eveniet tempore.', 44, 'product-4.jpg'),
(162, 'Hamburgur', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ipsam, corporis minima facere deleniti facilis ipsum eveniet tempore.', 50, 'product-5.jpg'),
(163, 'Mango', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ipsam, corporis minima facere deleniti facilis ipsum eveniet tempore.', 66, 'product-6.jpg'),
(165, 'Red Gala apple', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ipsam, corporis minima facere deleniti facilis ipsum eveniet tempore.', 80, 'product-8.jpg'),
(166, 'Russin ECOs', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ipsam, corporis minima facere deleniti facilis ipsum eveniet tempore.', 95, 'product-9.jpg'),
(167, 'Fried chicken', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ipsam, corporis minima facere deleniti facilis ipsum eveniet tempore.', 10, 'product-10.jpg'),
(168, 'Orange juice', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ipsam, corporis minima facere deleniti facilis ipsum eveniet tempore.', 22, 'product-11.jpg'),
(169, 'asdfasdf', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Vel ipsam, corporis minima facere deleniti facilis ipsum eveniet tempore.', 99, 'product-12.jpg');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE `users` (
  `id` int(9) NOT NULL,
  `first_name` varchar(60) NOT NULL,
  `last_name` varchar(60) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(60) NOT NULL,
  `phone` varchar(60) NOT NULL,
  `street` varchar(255) NOT NULL,
  `postal_code` varchar(255) NOT NULL,
  `city` varchar(90) NOT NULL,
  `country` varchar(90) NOT NULL,
  `register_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumpning av Data i tabell `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `phone`, `street`, `postal_code`, `city`, `country`, `register_date`) VALUES
(42, ' asr ', 'kh', 'gogo@hotmail.com', '$2y$10$x67XC7fg/6SmjnDOLz6jf.hDwUUiX.7Oaia2l3Bzirzc7hnhB6lGC', '123', 'asdf', '234 ', 'asdf', 'adf', '2020-06-24 10:08:05'),
(43, 'asdf', 'asdf', 'aaaa@yahoo.com', '$2y$10$6rlYOK69gJYW68uyb.a0F.MLh/LPi9XK3lZXOKkA66gvCVroFVp2a', '23423', 'asdf', '234', 'asdf', 'asdf', '2020-06-24 12:14:04'),
(44, 'asdfasdf', 'asdfasdf', 'ddddd@hotmai.com', '$2y$10$PvNSkqxK14Km0ctMcWPPpumhhbol3hgr9iKReyaomATn3TPk4emJ.', '234234', 'asdfasdf', '234234', 'asdfasdf', 'asdfasdf', '2020-06-24 12:15:25'),
(45, 'matthanaporn', 'OAN', 'admin3@admin.admin', '$2y$10$G.JbXF2qPDSmjMUj7k8X3.XsGAAqBqREIGA4XMqH4U1yQjymoYcEu', '+46761700102', 'Tingshusvägen 19', '74652', 'Uppsala', 'Sverige', '2020-06-25 08:08:03'),
(47, 'matthanaporn', 'OAN', 'admin5@admin.admin', '$2y$10$v6mPCAqDVey3ecgqkFLKleMJPeZJnvoYz229HBxQveqiWdN2FCAbS', '+46761700102', 'Tingshusvägen 19', '74652', 'Uppsala', 'Sverige', '2020-06-25 08:22:59'),
(48, 'Julia', 'Olsson', 'admin6@admin.admin', '$2y$10$VkSEbtp8T7CCzFY1Ev7hueJtcPeCU6ABUeMbZFX/eh3fUwbaBFJR2', '0761700102', 'Tingshusvägen', '74652', 'Bålsta', 'asda', '2020-06-25 08:24:01');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT för tabell `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT för tabell `products`
--
ALTER TABLE `products`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT för tabell `users`
--
ALTER TABLE `users`
  MODIFY `id` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
