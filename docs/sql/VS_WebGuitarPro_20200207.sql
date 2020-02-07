-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time:  7 фев 2020 в 06:28
-- Версия на сървъра: 5.7.29
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `VS_WebGuitarPro`
--

-- --------------------------------------------------------

--
-- Структура на таблица `APP_Tablatures`
--

CREATE TABLE `APP_Tablatures` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `artist` varchar(128) DEFAULT NULL,
  `song` varchar(128) DEFAULT NULL,
  `tablature` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `APP_Tablatures`
--

INSERT INTO `APP_Tablatures` (`id`, `userId`, `artist`, `song`, `tablature`) VALUES
(3, 5, 'Nightwish', 'The crow, the owl and the dove', 'nightwish-5e3c02c06ab7e.gp5'),
(4, 5, 'Slayer', 'South of Heaven', 'soundofheaven-5e3c04d1b9a5b.gp3');

-- --------------------------------------------------------

--
-- Структура на таблица `APP_Users`
--

CREATE TABLE `APP_Users` (
  `id` int(11) NOT NULL,
  `username` varchar(180) NOT NULL,
  `username_canonical` varchar(180) NOT NULL,
  `email` varchar(180) NOT NULL,
  `email_canonical` varchar(180) NOT NULL,
  `enabled` tinyint(1) NOT NULL,
  `salt` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` datetime DEFAULT NULL,
  `confirmation_token` varchar(180) DEFAULT NULL,
  `password_requested_at` datetime DEFAULT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:array)',
  `subscriptionId` int(11) DEFAULT NULL,
  `user_info_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `APP_Users`
--

INSERT INTO `APP_Users` (`id`, `username`, `username_canonical`, `email`, `email_canonical`, `enabled`, `salt`, `password`, `last_login`, `confirmation_token`, `password_requested_at`, `roles`, `subscriptionId`, `user_info_id`) VALUES
(5, 'admin', 'admin', 'admin@wgp.lh', 'admin@wgp.lh', 1, '9j9wvD3MQRQOInzh7d0.PyIx.asTdcVvtkiZOWKNWuc', '$2y$13$UHnIzNiKYkHdukzL/diSPu/mLYJeW5nX/2F8kQplVY.w8VW4oIZBS', '2020-02-07 05:45:19', NULL, NULL, 'a:0:{}', NULL, 4);

-- --------------------------------------------------------

--
-- Структура на таблица `APP_Users_Favorites`
--

CREATE TABLE `APP_Users_Favorites` (
  `userId` int(11) NOT NULL,
  `favoriteId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Схема на данните от таблица `APP_Users_Favorites`
--

INSERT INTO `APP_Users_Favorites` (`userId`, `favoriteId`) VALUES
(5, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `APP_Tablatures`
--
ALTER TABLE `APP_Tablatures`
  ADD PRIMARY KEY (`id`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `APP_Users`
--
ALTER TABLE `APP_Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `APP_Tablatures`
--
ALTER TABLE `APP_Tablatures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `APP_Users`
--
ALTER TABLE `APP_Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
