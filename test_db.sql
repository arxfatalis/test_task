-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Мар 27 2020 г., 17:26
-- Версия сервера: 10.3.13-MariaDB-log
-- Версия PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `test_db`
--

-- --------------------------------------------------------

--
-- Структура таблицы `publication`
--

DROP TABLE IF EXISTS `publication`;
CREATE TABLE `publication` (
  `id` int(11) UNSIGNED NOT NULL,
  `region` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `sity` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `make` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `model` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `volume` int(11) UNSIGNED DEFAULT NULL,
  `mileage` int(11) UNSIGNED DEFAULT NULL,
  `num_of_owners` int(11) UNSIGNED DEFAULT NULL,
  `photo` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(1) UNSIGNED DEFAULT NULL,
  `user_id` int(11) UNSIGNED DEFAULT NULL,
  `price` int(11) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `publication`
--

INSERT INTO `publication` (`id`, `region`, `sity`, `make`, `model`, `volume`, `mileage`, `num_of_owners`, `photo`, `status`, `user_id`, `price`) VALUES
(7, 'region1', 'sity2', 'make3', 'model4', 5, 6, 7, 'data/fs/1585317420images14.jfif', 1, 9, 1111111),
(8, 'region1', 'sity1', 'make4', 'model2', 123, 321, 219, 'data/fs/1585317483images13.jfif', 1, 10, 183),
(9, 'region4', 'sity2', 'make3', 'model1', 3, 654754, 54, 'data/fs/1585317543images12.jfif', 1, 11, 5467588),
(10, 'region1', 'sity1', 'make3', 'model1', 23, 4567, 8, 'data/fs/1585317584images11.jfif', 1, 12, 5648945),
(11, 'region2', 'sity1', 'make4', 'model4', 31245, 165191, 156, 'data/fs/1585317685images10.jfif', 1, 13, 1897589),
(12, 'region4', 'sity4', 'make3', 'model1', 45, 589, 498, 'data/fs/1585317762images9.jfif', 1, 14, 99987),
(13, 'region3', 'sity1', 'make2', 'model3', 123, 456, 980, 'data/fs/1585317794images8.jfif', 1, 15, 777888),
(14, 'region4', 'sity1', 'make1', 'model2', 492, 298, 166, 'data/fs/1585317821images7.jfif', 1, 16, 220231),
(15, 'region1', 'sity1', 'make1', 'model1', 11, 111, 109, 'data/fs/1585317907images6.jfif', 1, 17, 33221),
(16, 'region3', 'sity3', 'make1', 'model2', 798, 156, 419, 'data/fs/1585318221images5.jfif', 1, 18, 245648),
(17, 'region3', 'sity1', 'make2', 'model2', 5, 654, 1, 'data/fs/1585318359images4.jfif', 1, 19, 1998),
(18, 'region3', 'sity2', 'make1', 'model4', 432, 6511, 57, 'data/fs/1585318562images3.jfif', 1, 20, 123456),
(19, 'region2', 'sity2', 'make1', 'model1', 789, 444, 32, 'data/fs/1585318595images2.jfif', 1, 21, 999966),
(20, 'region1', 'sity4', 'make2', 'model3', 56, 90, 81, 'data/fs/1585318624images.jfif', 1, 22, 33399),
(21, 'region4', 'sity4', 'make3', 'model2', 54, 65, 135, 'data/fs/1585318730index.jfif', 1, 23, 123);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(11) UNSIGNED NOT NULL,
  `login` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `avatat` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `login`, `password`, `avatat`, `email`) VALUES
(2, 'admin', '$2y$10$Eda3msN8iixgdyjE02QAQeNYgNUEmRmL/1r1Z5nuCtYT7V7RRrn2y', 'data/fs1585078959WIN_20190605_08_52_24_Pro.jpg', 'admin@admin.com'),
(3, NULL, NULL, NULL, NULL),
(4, NULL, NULL, NULL, NULL),
(5, NULL, NULL, NULL, NULL),
(6, NULL, NULL, NULL, NULL),
(7, NULL, NULL, NULL, NULL),
(8, NULL, NULL, NULL, NULL),
(9, NULL, NULL, NULL, NULL),
(10, NULL, NULL, NULL, NULL),
(11, NULL, NULL, NULL, NULL),
(12, NULL, NULL, NULL, NULL),
(13, NULL, NULL, NULL, NULL),
(14, NULL, NULL, NULL, NULL),
(15, NULL, NULL, NULL, NULL),
(16, NULL, NULL, NULL, NULL),
(17, NULL, NULL, NULL, NULL),
(18, NULL, NULL, NULL, NULL),
(19, NULL, NULL, NULL, NULL),
(20, NULL, NULL, NULL, NULL),
(21, NULL, NULL, NULL, NULL),
(22, NULL, NULL, NULL, NULL),
(23, NULL, NULL, NULL, NULL);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `publication`
--
ALTER TABLE `publication`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_foreignkey_publication_user` (`user_id`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `publication`
--
ALTER TABLE `publication`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `publication`
--
ALTER TABLE `publication`
  ADD CONSTRAINT `c_fk_publication_user_id` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE SET NULL ON UPDATE SET NULL;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
