-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Апр 01 2019 г., 09:06
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `genadb2`
--

-- --------------------------------------------------------

--
-- Структура таблицы `academ_bases`
--

CREATE TABLE IF NOT EXISTS `academ_bases` (
  `id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `base_id` varchar(10) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `base_id` (`base_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `academ_product`
--

CREATE TABLE IF NOT EXISTS `academ_product` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `base` int(11) NOT NULL,
  `id_out` text NOT NULL,
  `name` text NOT NULL,
  `number` float NOT NULL,
  `sum` float NOT NULL,
  PRIMARY KEY (`id`),
  KEY `basefk` (`base`),
  KEY `id_outix` (`id_out`(20))
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `languages`
--

CREATE TABLE IF NOT EXISTS `languages` (
  `id_languages` int(11) NOT NULL AUTO_INCREMENT,
  `shortname` varchar(3) DEFAULT NULL,
  `germanname` varchar(45) DEFAULT NULL,
  `englishname` varchar(45) DEFAULT NULL,
  `flagpic` varchar(45) NOT NULL,
  PRIMARY KEY (`id_languages`),
  UNIQUE KEY `id_languages_UNIQUE` (`id_languages`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=17 ;

--
-- Дамп данных таблицы `languages`
--

INSERT INTO `languages` (`id_languages`, `shortname`, `germanname`, `englishname`, `flagpic`) VALUES
(1, 'ge', 'deutsch', 'german', 'Germany.jpg'),
(2, 'en', 'englisch', 'english', 'United_Kingdom.jpg'),
(3, 'fr', 'franzÃ¶sisch', 'french', 'France.jpg'),
(4, 'es', 'spanisch', 'spanish', 'Spain.jpg'),
(5, 'pl', 'polnisch', 'polish', 'Poland.jpg'),
(6, 'by', 'bayrisch', 'bavarian', 'bayern.png'),
(8, 'ru', 'russisch', 'russian', 'Russia.jpg'),
(9, 'pt', 'portugalisch', 'portugese', 'Portugal.jpg'),
(10, 'jp', 'japonisch', 'japanese', 'Japan.jpg'),
(11, 'sw', 'swedisch', 'swedesh', 'Sweden.jpg'),
(12, 'wal', 'walisisch', 'welsh', 'Wales.jpg'),
(13, 'tur', 'turkisch', 'turkish', 'Turkey.jpg'),
(14, 'chi', 'Chinese', 'Chinese', 'China.jpg'),
(15, 'dn', 'danisch', 'danish', 'Denmark.jpg'),
(16, 'fi', 'finisch', 'finnish', 'Finland.jpg');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE IF NOT EXISTS `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1446718923),
('m130524_201442_init', 1446718931);

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '10',
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 'denis', '5Ur2oVJKosGpSZf2UfzdizXR6mSHjCY9', '$2y$13$SGdYTvP45L/BeFwM7VVihuHIUmntxbH6MC3dExyOna7hrDi6x5Cny', NULL, 'dentsi@yahoo.com', 10, 1446719003, 1446719003);

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `academ_product`
--
ALTER TABLE `academ_product`
  ADD CONSTRAINT `academ_product_ibfk_1` FOREIGN KEY (`base`) REFERENCES `academ_bases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
