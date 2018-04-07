-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-04-07 12:56:32
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
-- 資料表結構 `letter`
--

CREATE TABLE `letter` (
  `id` int(11) NOT NULL,
  `filename` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `file` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `link` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `style` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `letter`
--

INSERT INTO `letter` (`id`, `filename`, `title`, `content`, `file`, `link`, `author`, `time`, `style`) VALUES
(1, 'test', '&lt;h1&gt;hihi&lt;&#47;h1&gt;', '&lt;span&gt;testext&lt;&#47;span&gt;', '1.jpg\r\n2.png', 'www.google.com', 1, '2018-04-07 09:54:40', 'classic'),
(2, 'test', '&lt;h1&rt;hihi&lt;&#47;h1&gt;', '&lt;span&gt;testext&lt;&#47;span&gt;', '1.jpg\r\n2.png', 'www.google.com', 1, '2018-04-07 09:55:10', 'classic');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `letter`
--
ALTER TABLE `letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
