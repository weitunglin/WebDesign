-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-04-06 14:18:04
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
-- 資料表結構 `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `login` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `log`
--

INSERT INTO `log` (`id`, `userid`, `time`, `status`) VALUES
(1, 2, '2018-03-29 10:57:39', 0),
(2, 4, '2018-04-03 05:41:25', 0),
(3, 2, '2018-03-29 10:59:53', 0),
(4, 2, '2018-03-29 11:08:03', 0),
(5, 2, '2018-03-29 11:23:24', 0),
(6, 1, '2018-03-29 11:25:39', 0),
(7, 1, '2018-03-29 11:33:48', 0),
(8, 1, '2018-03-29 11:35:39', 0),
(9, 2, '2018-03-29 13:54:54', 0),
(10, 1, '2018-03-29 14:11:14', 0),
(11, 4, '2018-04-03 05:20:56', 0),
(12, 1, '2018-03-29 14:31:54', 0),
(13, 4, '2018-04-03 05:41:30', 0),
(14, 2, '2018-03-29 14:35:27', 0),
(15, 2, '2018-03-29 15:05:38', 0),
(16, 2, '2018-03-30 00:38:00', 0),
(17, 3, '2018-03-29 17:15:08', 0),
(18, 3, '2018-03-30 00:36:36', 0),
(19, 1, '2018-03-30 00:37:45', 0),
(20, 2, '2018-03-30 00:38:00', 0),
(21, 2, '2018-03-30 00:52:38', 0),
(22, 2, '2018-03-30 02:48:00', 0),
(23, 2, '2018-03-30 12:17:01', 0),
(24, 2, '2018-04-03 03:01:29', 0),
(25, 1, '2018-04-03 02:33:17', 0),
(26, 2, '2018-04-03 05:56:04', 0),
(27, 1, '2018-04-03 05:55:31', 0),
(28, 2, '2018-04-03 05:56:04', 0),
(29, 2, '2018-04-03 05:56:04', 0),
(30, 1, '2018-04-03 05:55:31', 0),
(31, 1, '2018-04-03 05:55:31', 0),
(32, 2, '2018-04-03 05:56:04', 0),
(33, 2, '2018-04-03 14:48:25', 0),
(34, 2, '2018-04-04 01:04:31', 0),
(35, 2, '2018-04-04 01:04:31', 0),
(36, 1, '2018-04-04 08:43:46', 0),
(37, 2, '2018-04-04 08:42:54', 0),
(38, 1, '2018-04-04 08:43:46', 0),
(39, 1, '2018-04-04 08:43:46', 0),
(40, 2, '2018-04-06 06:07:29', 0),
(41, 2, '2018-04-06 06:07:29', 0),
(42, 4, '2018-04-06 06:10:37', 0),
(43, 2, '2018-04-06 06:07:29', 0),
(44, 2, '2018-04-06 06:07:29', 0),
(45, 4, '2018-04-06 06:10:37', 0),
(46, 4, '2018-04-06 06:10:55', 0),
(47, 2, '2018-04-06 06:59:09', 0),
(48, 4, '2018-04-06 06:59:24', 0),
(49, 3, '2018-04-06 06:59:57', 0),
(50, 1, '2018-04-06 09:24:38', 0),
(51, 2, '2018-04-06 09:22:57', 0),
(52, 6, '2018-04-06 09:22:10', 0),
(53, 2, '2018-04-06 09:22:57', 0),
(54, 1, '2018-04-06 09:24:38', 0),
(55, 1, '2018-04-06 09:31:29', 1);

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;