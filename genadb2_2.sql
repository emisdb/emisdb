-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1:3306
-- Время создания: Июл 20 2016 г., 16:21
-- Версия сервера: 5.5.41-log
-- Версия PHP: 5.5.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База данных: `genadb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `account`
--

CREATE TABLE IF NOT EXISTS `account` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `city`
--

CREATE TABLE IF NOT EXISTS `city` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `client`
--

CREATE TABLE IF NOT EXISTS `client` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `country_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`country_id`),
  KEY `country_id_2` (`country_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Дамп данных таблицы `client`
--

INSERT INTO `client` (`id`, `name`, `country_id`) VALUES
(1, 'ООО "Норд Трейдинг"', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `client_id`
--

CREATE TABLE IF NOT EXISTS `client_id` (
  `ckey` varchar(15) NOT NULL,
  `db` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`ckey`,`db`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `client_prop`
--

CREATE TABLE IF NOT EXISTS `client_prop` (
  `id` int(11) NOT NULL,
  `_key` varchar(8) NOT NULL,
  `_value` varchar(128) DEFAULT NULL,
  PRIMARY KEY (`id`,`_key`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `concert`
--

CREATE TABLE IF NOT EXISTS `concert` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `constants`
--

CREATE TABLE IF NOT EXISTS `constants` (
  `_key` varchar(8) NOT NULL,
  `_value` varchar(64) NOT NULL,
  PRIMARY KEY (`_key`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `constants`
--

INSERT INTO `constants` (`_key`, `_value`) VALUES
('cli_1', '1'),
('dep_1', '2'),
('expa_1', '0'),
('expf_1', '2015-10-01'),
('expt_1', '2015-10-31'),
('invf_1', '2015-10-01'),
('invt_1', '2015-10-09'),
('nart_1', '2'),
('nfin_1', '27'),
('nnom_1', '1'),
('nprice_1', '12'),
('nquant_1', '13'),
('nstr_1', '10'),
('paya_1', '0'),
('payf_1', '2015-10-01'),
('payt_1', '2015-10-08');

-- --------------------------------------------------------

--
-- Структура таблицы `country`
--

CREATE TABLE IF NOT EXISTS `country` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `country`
--

INSERT INTO `country` (`id`, `name`) VALUES
(1, 'Россия'),
(2, 'Китай');

-- --------------------------------------------------------

--
-- Структура таблицы `country_id`
--

CREATE TABLE IF NOT EXISTS `country_id` (
  `ckey` varchar(15) NOT NULL,
  `db` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`ckey`,`db`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `currency`
--

CREATE TABLE IF NOT EXISTS `currency` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(4) NOT NULL,
  `longname` varchar(16) NOT NULL,
  `rate` float(10,2) NOT NULL DEFAULT '1.00',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `department`
--

CREATE TABLE IF NOT EXISTS `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `department`
--

INSERT INTO `department` (`id`, `name`) VALUES
(1, 'ООО "КонсенсусГрупп"'),
(2, 'ООО «Фаворитлайн»');

-- --------------------------------------------------------

--
-- Структура таблицы `department_id`
--

CREATE TABLE IF NOT EXISTS `department_id` (
  `ckey` varchar(15) NOT NULL,
  `db` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`ckey`,`db`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `department_prop`
--

CREATE TABLE IF NOT EXISTS `department_prop` (
  `id` int(11) NOT NULL,
  `_key` varchar(8) NOT NULL,
  `_value` varchar(64) NOT NULL,
  PRIMARY KEY (`id`,`_key`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `exp`
--

CREATE TABLE IF NOT EXISTS `exp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pub` tinyint(1) NOT NULL DEFAULT '1',
  `name` varchar(64) NOT NULL,
  `client_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `amount` decimal(12,3) DEFAULT NULL,
  `dateinserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `pay` tinyint(1) NOT NULL DEFAULT '0',
  `link` varchar(128) DEFAULT NULL,
  `account_id` int(11) DEFAULT NULL,
  `transport` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `client_id` (`client_id`),
  KEY `department_id` (`department_id`),
  KEY `users_id` (`users_id`),
  KEY `currency_id` (`currency_id`),
  KEY `account_id` (`account_id`),
  KEY `exp_transport` (`transport`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `expence`
--

CREATE TABLE IF NOT EXISTS `expence` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `type` (`type`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `expexp`
--

CREATE TABLE IF NOT EXISTS `expexp` (
  `exp_id` int(11) NOT NULL,
  `exp_expid` int(11) NOT NULL,
  PRIMARY KEY (`exp_id`,`exp_expid`),
  KEY `exp_expid` (`exp_expid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `exp_d`
--

CREATE TABLE IF NOT EXISTS `exp_d` (
  `exp` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `product` int(11) DEFAULT NULL,
  `amount` decimal(12,3) DEFAULT NULL,
  `price` decimal(12,3) DEFAULT NULL,
  `vat` decimal(12,3) DEFAULT NULL,
  `total` decimal(12,3) DEFAULT NULL,
  PRIMARY KEY (`exp`,`id`),
  KEY `product` (`product`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `inc`
--

CREATE TABLE IF NOT EXISTS `inc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `client_id` int(11) NOT NULL,
  `department_id` int(11) NOT NULL,
  `users_id` int(11) NOT NULL,
  `concert_id` int(11) DEFAULT NULL,
  `expence_id` int(11) NOT NULL,
  `currency_id` int(11) NOT NULL,
  `amount` float DEFAULT NULL,
  `dateinserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `link` varchar(128) DEFAULT NULL,
  `city_id` int(11) DEFAULT NULL,
  `account_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `country_id` (`client_id`),
  KEY `client_id` (`client_id`),
  KEY `department_id` (`department_id`),
  KEY `users_id` (`users_id`),
  KEY `concert_id` (`concert_id`),
  KEY `expence_id` (`expence_id`),
  KEY `currency_id` (`currency_id`),
  KEY `city_id` (`city_id`),
  KEY `account_id` (`account_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `inv`
--

CREATE TABLE IF NOT EXISTS `inv` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `exp_id` int(11) NOT NULL,
  `amount` decimal(12,3) DEFAULT NULL,
  `dateinserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date NOT NULL,
  `client_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expence_id` (`exp_id`),
  KEY `inv_client` (`client_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `inv_d`
--

CREATE TABLE IF NOT EXISTS `inv_d` (
  `inv` int(11) NOT NULL DEFAULT '0',
  `id` int(11) NOT NULL DEFAULT '0',
  `product` int(11) DEFAULT NULL,
  `amount` decimal(12,3) DEFAULT NULL,
  `price` decimal(12,3) DEFAULT NULL,
  `vat` decimal(12,3) DEFAULT NULL,
  `total` decimal(12,3) DEFAULT NULL,
  PRIMARY KEY (`inv`,`id`),
  KEY `product` (`product`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `id` int(11) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `sh_name` varchar(8) DEFAULT NULL,
  `okei` varchar(3) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `pay`
--

CREATE TABLE IF NOT EXISTS `pay` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) DEFAULT NULL,
  `exp_id` int(11) NOT NULL,
  `amount` decimal(12,3) DEFAULT NULL,
  `dateinserted` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `date` date DEFAULT NULL,
  `date_f` date DEFAULT NULL,
  `date_g` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `expence_id` (`exp_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `product`
--

CREATE TABLE IF NOT EXISTS `product` (
  `ckey` int(11) NOT NULL AUTO_INCREMENT,
  `tnam` varchar(102) DEFAULT NULL,
  `cgr` int(11) DEFAULT NULL,
  `it` int(11) DEFAULT NULL,
  PRIMARY KEY (`ckey`),
  KEY `cgr` (`cgr`),
  KEY `it` (`it`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `productgroup_id`
--

CREATE TABLE IF NOT EXISTS `productgroup_id` (
  `ckey` varchar(15) NOT NULL,
  `db` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`ckey`,`db`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `product_group`
--

CREATE TABLE IF NOT EXISTS `product_group` (
  `ckey` int(11) NOT NULL AUTO_INCREMENT,
  `tnam` varchar(32) NOT NULL,
  `cgr` int(11) DEFAULT NULL,
  `lf_key` int(11) DEFAULT NULL,
  `rg_key` int(11) DEFAULT NULL,
  `level` int(11) DEFAULT NULL,
  PRIMARY KEY (`ckey`),
  KEY `cgr` (`cgr`),
  KEY `lf_key` (`lf_key`),
  KEY `rg_key` (`rg_key`),
  KEY `level` (`level`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Структура таблицы `product_id`
--

CREATE TABLE IF NOT EXISTS `product_id` (
  `ckey` varchar(15) NOT NULL,
  `db` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  PRIMARY KEY (`ckey`,`db`),
  KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tbl_migration`
--

CREATE TABLE IF NOT EXISTS `tbl_migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL,
  PRIMARY KEY (`version`)
) ENGINE=MyISAM DEFAULT CHARSET=cp1251;

-- --------------------------------------------------------

--
-- Структура таблицы `tmp_doc`
--

CREATE TABLE IF NOT EXISTS `tmp_doc` (
  `id` int(11) NOT NULL,
  `ckey` varchar(15) DEFAULT NULL,
  `ctype` tinyint(4) NOT NULL DEFAULT '0',
  `tnum` varchar(15) DEFAULT NULL,
  `cfir` varchar(15) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `ddat` date DEFAULT NULL,
  `ccli` varchar(15) DEFAULT NULL,
  `bsum` decimal(12,3) DEFAULT NULL,
  `tonum` varchar(15) DEFAULT NULL,
  `dodat` date DEFAULT NULL,
  `docid` int(11) DEFAULT NULL,
  `docinfo` varchar(255) DEFAULT NULL,
  `cliname` varchar(255) DEFAULT NULL,
  `firname` varchar(255) DEFAULT NULL,
  `expid` int(11) DEFAULT NULL,
  `expinfo` varchar(255) DEFAULT NULL,
  `transport` varchar(15) DEFAULT NULL,
  `man` varchar(15) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ckey` (`ckey`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `tmp_docd`
--

CREATE TABLE IF NOT EXISTS `tmp_docd` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ckey` int(11) DEFAULT NULL,
  `cnom` varchar(15) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `bsum` decimal(12,3) DEFAULT NULL,
  `bqua` decimal(12,3) DEFAULT NULL,
  `bvat` decimal(12,3) DEFAULT NULL,
  `bpri` decimal(12,3) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ckey` (`ckey`),
  KEY `ckey_2` (`ckey`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=106 ;

--
-- Дамп данных таблицы `tmp_docd`
--

INSERT INTO `tmp_docd` (`id`, `ckey`, `cnom`, `state`, `bsum`, `bqua`, `bvat`, `bpri`, `user`) VALUES
(1, 0, '123', NULL, '90.000', '2.000', NULL, '45.000', NULL),
(88, 1, '1', NULL, '518.820', '3.000', NULL, '172.940', 1),
(89, 2, '2', NULL, '468.580', '2.400', NULL, '195.240', 1),
(90, 3, '3', NULL, '533.420', '2.700', NULL, '197.560', 1),
(91, 4, '4', NULL, '486.300', '2.500', NULL, '194.520', 1),
(92, 5, '5', NULL, '428.390', '2.200', NULL, '194.720', 1),
(93, 6, '6', NULL, '434.990', '1.900', NULL, '228.940', 1),
(94, 7, '7', NULL, '1531.780', '4.800', NULL, '319.120', 1),
(95, 8, '8', NULL, '412.510', '2.700', NULL, '152.780', 1),
(96, 9, '9', NULL, '381.850', '2.500', NULL, '152.740', 1),
(97, 10, '10', NULL, '425.580', '2.800', NULL, '151.990', 1),
(98, 11, '11', NULL, '1263.520', '5.700', NULL, '221.670', 1),
(99, 12, '12', NULL, '1161.060', '5.200', NULL, '223.280', 1),
(100, 13, '13', NULL, '1083.150', '5.000', NULL, '216.630', 1),
(101, 14, '14', NULL, '1426.890', '5.700', NULL, '250.330', 1),
(102, 15, '15', NULL, '1322.800', '5.000', NULL, '264.560', 1),
(103, 16, '16', NULL, '1224.200', '4.800', NULL, '255.040', 1),
(104, 17, '17', NULL, '1189.430', '4.600', NULL, '258.570', 1),
(105, 18, '18', NULL, '922.360', '3.600', NULL, '256.210', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `tmp_xml`
--

CREATE TABLE IF NOT EXISTS `tmp_xml` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `ckey` varchar(15) DEFAULT NULL,
  `ctype` tinyint(4) DEFAULT NULL,
  `cname` varchar(255) DEFAULT NULL,
  `lid` int(11) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `state` tinyint(4) DEFAULT NULL,
  `cgr` varchar(15) DEFAULT NULL,
  `user` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ckey` (`ckey`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=236 ;

--
-- Дамп данных таблицы `tmp_xml`
--

INSERT INTO `tmp_xml` (`id`, `ckey`, `ctype`, `cname`, `lid`, `lname`, `state`, `cgr`, `user`) VALUES
(1, '123', NULL, 'the day', NULL, NULL, NULL, NULL, NULL),
(218, '1', NULL, 'fabric/ткань (100% полиэстер); напечатанная\0', NULL, NULL, NULL, 'PI-4739', 1),
(219, '2', NULL, 'fabric/ткань (100% полиэстер), напечатанная\0', NULL, NULL, NULL, 'K-1559', 1),
(220, '3', NULL, 'fabric/ткань (100% полиэстер), напечатанная\0', NULL, NULL, NULL, 'K-1560', 1),
(221, '4', NULL, 'fabric/ткань (100% полиэстер), напечатанная\0', NULL, NULL, NULL, 'K-1568', 1),
(222, '5', NULL, 'fabric/ткань (100% полиэстер), напечатанная\0', NULL, NULL, NULL, 'K-1557', 1),
(223, '6', NULL, 'fabric/ткань (100% полиэстер), напечатанная\0', NULL, NULL, NULL, 'MF-10946_10960', 1),
(224, '7', NULL, 'fabric/ткань (100% хлопок), окрашенная\0', NULL, NULL, NULL, '13940', 1),
(225, '8', NULL, 'fabric/ткань (90% полиэстер 10% вискоза) окрашенная\0', NULL, NULL, NULL, 'D1501', 1),
(226, '9', NULL, 'fabric/ткань (90% полиэстер 10% вискоза) окрашенная\0', NULL, NULL, NULL, 'D1539', 1),
(227, '10', NULL, 'fabric/ткань (90% полиэстер 10% вискоза) окрашенная\0', NULL, NULL, NULL, 'D1550', 1),
(228, '11', NULL, 'fabric/ткань (90% полиэстер 10% вискоза), окрашенная\0', NULL, NULL, NULL, 'DC7750', 1),
(229, '12', NULL, 'fabric/ткань (90% полиэстер 10% вискоза), окрашенная\0', NULL, NULL, NULL, 'DC7765', 1),
(230, '13', NULL, 'fabric/ткань (90% полиэстер 10% вискоза), окрашенная\0', NULL, NULL, NULL, 'DC7069', 1),
(231, '14', NULL, 'fabric/ткань (90% полиэстер 10% вискоза), окрашенная\0', NULL, NULL, NULL, 'DC7426', 1),
(232, '15', NULL, 'fabric/ткань (90% полиэстер 10% вискоза), окрашенная\0', NULL, NULL, NULL, 'DC7429', 1),
(233, '16', NULL, 'fabric/ткань (90% полиэстер 10% вискоза), окрашенная\0', NULL, NULL, NULL, 'DC7445', 1),
(234, '17', NULL, 'fabric/ткань (90% полиэстер 10% вискоза), окрашенная\0', NULL, NULL, NULL, 'DC7335', 1),
(235, '18', NULL, 'fabric/ткань (90% полиэстер 10% вискоза), окрашенная\0', NULL, NULL, NULL, 'DC7707', 1);

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(10) NOT NULL,
  `pwd` varchar(10) NOT NULL,
  `email` varchar(128) NOT NULL,
  `perm` enum('superadmin','admin','superuser','user','buh') DEFAULT NULL,
  `title` varchar(32) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `login` (`login`),
  KEY `pwd` (`pwd`)
) ENGINE=InnoDB  DEFAULT CHARSET=cp1251 AUTO_INCREMENT=3 ;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pwd`, `email`, `perm`, `title`) VALUES
(1, 'denis', '123', '', 'superadmin', 'Денис'),
(2, 'buh', '123', '', 'buh', 'Бухгалтерия');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
