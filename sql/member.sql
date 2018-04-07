-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-04-07 12:55:51
-- 伺服器版本: 10.1.30-MariaDB
-- PHP 版本： 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `a1`
--

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `perm` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`id`, `acc`, `pwd`, `perm`, `name`) VALUES
(1, 'root', '1234', 's', 'root'),
(2, 'admin', '1234', 'r', 'admin'),
(3, 'allen', 'allen2001', 'c', '林韋彤'),
(4, 'benson', 'ben123', 'c', '何秉育'),
(5, 'john', 'john123', 'c', 'johnny'),
(6, 'jellykuo', 'jelly1234', 'c', '郭東岳'),
(7, 'test', '1234', 'c', 'TEST');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
