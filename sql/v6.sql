-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- 主機: 127.0.0.1
-- 產生時間： 2018-04-18 10:17:36
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
-- 資料庫： `v6`
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
  `others` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `style` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `tag` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `letter`
--

INSERT INTO `letter` (`id`, `filename`, `title`, `content`, `file`, `link`, `others`, `author`, `time`, `style`, `tag`) VALUES
(1, 'test', 'hihi', 'testext', 'file/1.jpg', 'https://google.com', '', 1, '2018-04-07 09:54:40', 'classic', ''),
(2, 'test2', 'hihi', 'testexta', 'file/2.png', 'https://google.com', '', 1, '2018-04-07 09:55:10', 'classic', ''),
(3, 'test3', 'title', 'contetnietnainf osdhfmzso', 'file/3.jpeg', 'https://yahoo.com.tw', '', 2, '2018-04-13 03:55:23', 'classic', 'tag'),
(4, 'test4', 'hihihihi', 'aosdhfoasdhgboawev ', 'file/4.jpeg', 'https://www.google.com', '', 2, '2018-04-17 07:10:03', 'classic', 'tag'),
(5, 'test5', 'title ', 'afuawehvoawehtoadgzsha', 'file/5.jpeg', 'https://www.yahoo.com', '', 1, '2018-04-17 07:11:12', 'classic', 'tag'),
(6, '6', 'TTT', 'aasf ioadhf ohfobi asf', '', 'https://www.google.com', '', 3, '2018-04-18 02:31:36', 'normal', ''),
(7, '777', '林韋彤', 'szhtnobi ihrtba ritbawrt9an woiseys hosg hosknb lkklsndg rho nsrihgsoi dsoi ern oidfgio a oiahry', 'file/7.jpeg', 'https://www.amazon.com', '', 1, '2018-04-18 04:16:06', 'test', 'tung'),
(8, '888', 'rftfiufutc', 'yjfiubduitd7id ', 'file/8.jpeg', 'https://', '', 1, '2018-04-18 04:53:02', 'fff', ''),
(9, '5tfymset', 'snernysem', 'dzmremsemsr58m', 'file/9.jpeg', 'https://', '', 1, '2018-04-18 04:54:01', 'qqqq', ''),
(10, 'tawt', 'dtnserysene', 'fwiuegbrui auwyrbtuioanr yariuytaweranowr yawuryt9a8bwrynt uasyr9t8yabwnr98 asry 98arwyn98 ayre g89aryw9t8bawyr 9n8ayr98 ymaw98r yma98wery t98awrym 9a8wmy89awyr9 tape aouefn ue hauoehtou atoiu aoueht omuaegmo uhoa moei ytmoadyt oaie hmoai hoaiemth oiaeht oiaeh moiaeht opiaeth aioet hmaoipeur maiopeur maoipeur oiaeur mioaeu rpoai', 'file/10.jpeg', 'https://', '', 1, '2018-04-18 05:02:36', 'classic', ''),
(11, 'arfasf', 'asfasfasfbser', 'fwiuegbrui auwyrbtuioanr yariuytaweranowr yawuryt9a8bwrynt uasyr9t8yabwnr98 asry 98arwyn98 ayre g89aryw9t8bawyr 9n8ayr98 ymaw98r yma98wery t98awrym 9a8wmy89awyr9 tape aouefn ue hauoehtou atoiu aoueht omuaegmo uhoa moei ytmoadyt oaie hmoai hoaiemth oiaeht oiaeh moiaeht opiaeth aioet hmaoipeur maiopeur maoipeur oiaeur mioaeu rpoaifwiuegbrui auwyrbtuioanr yariuytaweranowr yawuryt9a8bwrynt uasyr9t8yabwnr98 asry 98arwyn98 ayre g89aryw9t8bawyr 9n8ayr98 ymaw98r yma98wery t98awrym 9a8wmy89awyr9 tape aouefn ue hauoehtou atoiu aoueht omuaegmo uhoa moei ytmoadyt oaie hmoai hoaiemth oiaeht oiaeh moiaeht opiaeth aioet hmaoipeur maiopeur maoipeur oiaeur mioaeu rpoaifwiuegbrui auwyrbtuioanr yariuytaweranowr yawuryt9a8bwrynt uasyr9t8yabwnr98 asry 98arwyn98 ayre g89aryw9t8bawyr 9n8ayr98 ymaw98r yma98wery t98awrym 9a8wmy89awyr9 tape aouefn ue hauoehtou atoiu aoueht omuaegmo uhoa moei ytmoadyt oaie hmoai hoaiemth oiaeht oiaeh moiaeht opiaeth aioet hmaoipeur maiopeur maoipeur oiaeur mioaeu rpoaifwiuegbrui auwyrbtuioanr yariuytaweranowr yawuryt9a8bwrynt uasyr9t8yabwnr98 asry 98arwyn98 ayre g89aryw9t8bawyr 9n8ayr98 ymaw98r yma98wery t98awrym 9a8wmy89awyr9 tape aouefn ue hauoehtou atoiu aoueht omuaegmo uhoa moei ytmoadyt oaie hmoai hoaiemth oiaeht oiaeh moiaeht opiaeth aioet hmaoipeur maiopeur maoipeur oiaeur mioaeu rpoaifwiuegbrui auwyrbtuioanr yariuytaweranowr yawuryt9a8bwrynt uasyr9t8yabwnr98 asry 98arwyn98 ayre g89aryw9t8bawyr 9n8ayr98 ymaw98r yma98wery t98awrym 9a8wmy89awyr9 tape aouefn ue hauoehtou atoiu aoueht omuaegmo uhoa moei ytmoadyt oaie hmoai hoaiemth oiaeht oiaeh moiaeht opiaeth aioet hmaoipeur maiopeur maoipeur oiaeur mioaeu rpoaifwiuegbrui auwyrbtuioanr yariuytaweranowr yawuryt9a8bwrynt uasyr9t8yabwnr98 asry 98arwyn98 ayre g89aryw9t8bawyr 9n8ayr98 ymaw98r yma98wery t98awrym 9a8wmy89awyr9 tape aouefn ue hauoehtou atoiu aoueht omuaegmo uhoa moei ytmoadyt oaie hmoai hoaiemth oiaeht oiaeh moiaeht opiaeth aioet hmaoipeur maiopeur maoipeur oiaeur mioaeu rpoaifwiuegbrui auwyrbtuioanr yariuytaweranowr yawuryt9a8bwrynt uasyr9t8yabwnr98 asry 98arwyn98 ayre g89aryw9t8bawyr 9n8ayr98 ymaw98r yma98wery t98awrym 9a8wmy89awyr9 tape aouefn ue hauoehtou atoiu aoueht omuaegmo uhoa moei ytmoadyt oaie hmoai hoaiemth oiaeht oiaeh moiaeht opiaeth aioet hmaoipeur maiopeur maoipeur oiaeur mioaeu rpoai', 'file/11.jpeg', 'https://www.google.com', '', 1, '2018-04-18 05:03:14', 'classic', ''),
(12, 'asf', 'asasbsedbe', 'awryebsenrysernaerynsernyseryserbyseruzerube', 'file/12.jpeg', 'https://', '', 1, '2018-04-18 05:39:47', 'a', ''),
(13, 'ad', '123', 'dw', '', 'https://google.com', '', 2, '2018-04-18 05:42:59', 'qqqq', '#has'),
(14, 'fff', 'test', 'aaa', '', 'https://fb.com', '', 2, '2018-04-18 05:44:36', 'fork', '123'),
(15, 'asdf', '1234', '1234', 'file/15.jpeg', 'https://www.google.com.tw', '', 5, '2018-04-18 06:10:31', 'normal', 'Tag'),
(16, 'NICO', 'Nico', 'HELLO NICO', 'file/16.jpeg', 'https://https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8', '', 1, '2018-04-18 06:12:23', 'GG', 'NNGG'),
(17, 'NICO', 'Nico', 'HELLO NICO', 'file/17.jpeg', 'https://https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8', '', 1, '2018-04-18 06:14:32', 'bang', 'BANG~~'),
(18, 'Nico 2nd', 'Nico', 'Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico Nico ', 'file/18.jpeg', 'https://www.nico.com', '', 5, '2018-04-18 06:15:09', 'JellyTemp3', 'Nico ROSNBSF'),
(19, 'SoSad', 'Nico', 'HELLO NICO', 'file/19.pdf', 'https://https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8', '', 1, '2018-04-18 06:16:37', 'classic', 'BANG~~'),
(20, 'dsfadf', 'testdgfdseawdfg', 'sdfgfdseaw', '', 'https://asf', '', 1, '2018-04-18 06:17:40', 'bang', 'fsas'),
(21, 'ashfaisfph', 'https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=Uhttps://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8TF-8', 'https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8', '', 'https://https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF-8', '', 1, '2018-04-18 06:18:24', 'normal', 'https://www.google.com.tw/search?q=nico&oq=nico&aqs=chrome..69i57j0l5.889j0j7&sourceid=chrome&ie=UTF'),
(22, '123456', '123456', '123456', 'file/22.vnd.openxmlformats-officedocument.wordprocessingml.document', 'https://123456', '', 1, '2018-04-18 06:22:25', 'a', '123456'),
(23, '123456', '123456', '123456', 'file/23.mp4', 'https://123456', '', 1, '2018-04-18 06:22:47', '', '123456'),
(24, 'SoSad', 'Nico', 'HELLO NICO', '', 'https://123456.com', '', 1, '2018-04-18 06:24:38', '', 'BANG~~'),
(26, 'cfdxgjhgcfgbhjk', 'fghjgfctyuhjb', 'gvfgthjbgfcdtyg', 'file/26.vnd.openxmlformats-officedocument.wordprocessingml.document', 'https://ghfchujbgfchjb', '', 1, '2018-04-18 06:26:38', 'gvfcdsewrdtfygjiokl;,', 'gfchjbgfchjnbgf');

-- --------------------------------------------------------

--
-- 資料表結構 `log`
--

CREATE TABLE `log` (
  `id` int(11) NOT NULL,
  `userid` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `log`
--

INSERT INTO `log` (`id`, `userid`, `time`, `status`) VALUES
(1, 1, '2018-04-17 04:52:58', 1),
(2, 1, '2018-04-17 04:54:35', 0),
(3, 2, '2018-04-17 04:55:47', 1),
(4, 2, '2018-04-17 04:56:12', 0),
(5, 1, '2018-04-17 05:05:44', 1),
(6, 0, '2018-04-17 05:15:09', 0),
(7, 1, '2018-04-17 05:15:17', 1),
(8, 1, '2018-04-17 06:05:55', 1),
(9, 1, '2018-04-17 06:06:44', 0),
(10, 1, '2018-04-17 06:06:52', 1),
(11, 1, '2018-04-18 04:44:29', 0),
(12, 1, '2018-04-18 04:49:53', 1),
(13, 2, '2018-04-18 05:41:14', 1),
(14, 2, '2018-04-18 05:47:23', 0),
(15, 2, '2018-04-18 05:52:09', 1),
(16, 2, '2018-04-18 05:58:13', 0),
(17, 2, '2018-04-18 05:59:30', 1),
(18, 2, '2018-04-18 05:59:34', 0),
(19, 2, '2018-04-18 06:00:53', 1),
(20, 2, '2018-04-18 06:00:55', 0),
(21, 2, '2018-04-18 06:01:57', 1),
(22, 2, '2018-04-18 06:02:24', 0),
(23, 2, '2018-04-18 06:03:42', 1),
(24, 1, '2018-04-18 06:04:33', 1),
(25, 1, '2018-04-18 06:04:40', 1),
(26, 2, '2018-04-18 06:05:29', 0),
(27, 1, '2018-04-18 06:06:14', 1),
(28, 1, '2018-04-18 06:06:46', 1),
(29, 1, '2018-04-18 06:06:58', 0),
(30, 5, '2018-04-18 06:07:13', 1),
(31, 5, '2018-04-18 06:07:24', 0),
(32, 1, '2018-04-18 06:07:43', 1),
(33, 1, '2018-04-18 06:08:31', 0),
(34, 5, '2018-04-18 06:08:56', 1),
(35, 2, '2018-04-18 06:24:13', 1),
(36, 2, '2018-04-18 06:27:01', 0),
(37, 2, '2018-04-18 06:27:14', 1),
(38, 2, '2018-04-18 06:27:18', 0),
(39, 2, '2018-04-18 06:29:25', 1),
(40, 2, '2018-04-18 06:35:06', 1),
(41, 2, '2018-04-18 06:35:18', 1),
(42, 1, '2018-04-18 07:35:26', 0),
(43, 3, '2018-04-18 07:35:52', 1),
(44, 3, '2018-04-18 07:41:19', 0),
(45, 1, '2018-04-18 07:41:31', 1),
(46, 1, '2018-04-18 08:01:50', 0),
(47, 2, '2018-04-18 08:07:21', 1),
(48, 2, '2018-04-18 08:08:09', 0),
(49, 2, '2018-04-18 08:08:30', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `member`
--

CREATE TABLE `member` (
  `id` int(11) NOT NULL,
  `acc` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pwd` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `perm` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `member`
--

INSERT INTO `member` (`id`, `acc`, `pwd`, `name`, `perm`) VALUES
(1, 'admin', '1234', 'admin', 's'),
(2, 'root', '1234', 'ROOT', 'a'),
(3, 'allen', 'allen2001', '林韋彤', 'c'),
(4, 'a', 'a', 'a', 'c'),
(5, 'Jelly', '1234', 'Jelly', 'c');

-- --------------------------------------------------------

--
-- 資料表結構 `style`
--

CREATE TABLE `style` (
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT 'grid-area:title;',
  `content` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'grid-area:content;',
  `file` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'grid-area:file;',
  `link` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'grid-area:link;',
  `footer` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'grid-area:footer;'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 資料表的匯出資料 `style`
--

INSERT INTO `style` (`name`, `body`, `title`, `content`, `file`, `link`, `footer`) VALUES
('', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"file ....\"\".....\"\".....\"\"link content footer ..\"\".file title ..\";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('a', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\".title title title .\"\".content content content .\"\".content content content .\"\".file file link .\"\".file file footer .\";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('as', 'margin:0 auto;display:grid;grid-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\" .  .  .  .  . \"\"title title title  .  . \"\"content link file  .  . \"\"footer footer footer  .  . \"\" .  .  .  .  . \";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('bang', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"title title title title title \"\"content content content content content \"\"file file file file file \"\"link link link link link \"\"footer footer footer footer footer \";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('BBBBBBBANG', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"file ....\"\".....\"\".....\"\"link content footer ..\"\".file title ..\";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('classic', 'margin:0 auto;display:grid;grid-template-columns:400px 200px;grid-template-rows:80px 200px 100px 30px;grid-template-areas:\"title title\" \"content file\" \"content link\" \"footer footer\"; width:600px;', 'grid-area:title;text-align:center;font-size:50px;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;text-align:center;font-size:20px;'),
('fff', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\". . . . . \"\"title file file file . \"\"title file file file . \"\"title file file file . \"\". content content content link \";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('fork', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\".title title title .\"\"file content content content link \"\"file content content content link \"\"file content content content link \"\"footer footer footer footer footer \";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('GG', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"title file title title title \"\"title title title content title \"\"title title link title title \"\"footer title title title title \"\"title title title footer title \";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('gvfcdsewrdtfygjiokl;,', 'margin:0 auto;display:grid;grid-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"title title title  .  . \"\" .  .  .  .  . \"\"content content  . file file \"\"content content link file file \"\"content content footer footer  . \";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('JellyTemp', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"title title title file file \"\"...file file \"\"link ..content content \"\"...content content \"\"footer footer footer content content \";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('JellyTemp2', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"title title title file file \"\"...file file \"\".....\"\"link ..content content \"\"footer footer footer content content \";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('JellyTemp3', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"title title title file file \"\"...file file \"\"...content content \"\"link ..content content \"\"footer footer footer content content \";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('normal', 'margin:0 auto;display:grid;grid-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"title title title title title\"\"content content content file file\"\"content content content file file\"\"content content content link link\"\"content content content footer footer\";', 'grid-area:title;text-align:center;color:red;font-size:50px;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;text-align:center;font-size:20px;'),
('qqqq', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"title content content content content \"\"title content content content content \"\"title file file link link \"\"title file file link link \"\"title file file footer footer \";', 'grid-area:title;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;'),
('test', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"title title title title title \"\"content content content file file \"\"content content content file file \"\"content content content link link \"\"content content content footer footer \";', 'grid-area:title;text-align:center;color:red;font-size:50px;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;text-align:center;font-size:20px;'),
('testt', 'margin:0 auto;display:grid;gird-template-columns:120px 120px 120px 120px 120px;grid-template-rows:80px 80px 80px 80px 80px;grid-template-areas:\"title title title title title \"\"content content content file file \"\"content content content file file \"\"content content content link link \"\"content content content footer footer \";', 'grid-area:title;text-align:center;color:red;font-size:50px;', 'grid-area:content;', 'grid-area:file;', 'grid-area:link;', 'grid-area:footer;text-align:center;font-size:20px;');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `letter`
--
ALTER TABLE `letter`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `log`
--
ALTER TABLE `log`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `style`
--
ALTER TABLE `style`
  ADD PRIMARY KEY (`name`(100));

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `letter`
--
ALTER TABLE `letter`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- 使用資料表 AUTO_INCREMENT `log`
--
ALTER TABLE `log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- 使用資料表 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
