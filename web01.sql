-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主機： 127.0.0.1
-- 產生時間： 2021-12-27 03:26:05
-- 伺服器版本： 10.4.21-MariaDB
-- PHP 版本： 7.4.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫: `web01`
--

-- --------------------------------------------------------

--
-- 資料表結構 `ad`
--

CREATE TABLE `ad` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '流水號',
  `img` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '檔名/路徑',
  `text` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '文字',
  `sh` int(1) UNSIGNED DEFAULT 0 COMMENT '顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `ad`
--

INSERT INTO `ad` (`id`, `img`, `text`, `sh`) VALUES
(1, '', '轉知臺北教育大學與臺灣師大合辦第11屆麋研齋全國硬筆書法比賽活動', 0),
(2, '', '轉知:法務部辦理「第五屆法規知識王網路闖關競賽辦法', 0),
(3, '', '轉知2012年全國青年水墨創作大賽活動', 1),
(4, '', '121欣榮圖書館101年悅讀達人徵文比賽，歡迎全校師生踴躍投稿參加', 0),
(6, '', '轉知:教育是人類升沉的樞紐-2013教師生命成長營', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `admin`
--

CREATE TABLE `admin` (
  `id` int(11) UNSIGNED NOT NULL,
  `acc` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '帳號',
  `pw` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '密碼'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `admin`
--

INSERT INTO `admin` (`id`, `acc`, `pw`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- 資料表結構 `bottom`
--

CREATE TABLE `bottom` (
  `id` int(11) UNSIGNED NOT NULL,
  `bottom` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '頁尾版權一定要用文字'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `bottom`
--

INSERT INTO `bottom` (`id`, `bottom`) VALUES
(1, '2021科技大學頁尾版權:D');

-- --------------------------------------------------------

--
-- 資料表結構 `image`
--

CREATE TABLE `image` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '流水號',
  `img` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '檔名/路徑',
  `text` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '文字',
  `sh` int(1) UNSIGNED DEFAULT 0 COMMENT '顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `image`
--

INSERT INTO `image` (`id`, `img`, `text`, `sh`) VALUES
(1, '01D01.jpg', '', 1),
(2, '01D02.jpg', '', 0),
(3, '01D03.jpg', '', 0),
(4, '01D04.jpg', '', 1),
(5, '01D05.jpg', '', 1),
(6, '01D06.jpg', '', 1),
(7, '01D07.jpg', '', 1),
(8, '01D08.jpg', '', 0),
(9, '01D09.jpg', '', 0),
(10, '01D10.jpg', '', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `menu`
--

CREATE TABLE `menu` (
  `id` int(11) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '文字',
  `href` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '連結',
  `sh` int(1) UNSIGNED NOT NULL DEFAULT 1 COMMENT '顯示(預設1',
  `parent` int(11) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `menu`
--

INSERT INTO `menu` (`id`, `name`, `href`, `sh`, `parent`) VALUES
(1, '管理登入', '?do=login', 1, 0),
(2, '網站首頁', 'http://localhost/level_B_web/web01/index.php', 1, 0),
(5, 'ABE', 'ECC', 1, 1),
(15, 'wewe', 'weqe', 1, 3),
(18, '更多消息', '?do=news', 1, 2);

-- --------------------------------------------------------

--
-- 資料表結構 `mvim`
--

CREATE TABLE `mvim` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '流水號',
  `img` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '檔名/路徑',
  `text` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '文字',
  `sh` int(1) UNSIGNED DEFAULT 0 COMMENT '顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `mvim`
--

INSERT INTO `mvim` (`id`, `img`, `text`, `sh`) VALUES
(1, '01C01.gif', '', 0),
(2, '01C02.gif', '', 1),
(4, '01C04.gif', '', 1),
(5, '01C05.gif', '', 1),
(6, '01C06.gif', '', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `news`
--

CREATE TABLE `news` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '流水號',
  `img` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '檔名/路徑',
  `text` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '文字',
  `sh` int(1) UNSIGNED DEFAULT 0 COMMENT '顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `news`
--

INSERT INTO `news` (`id`, `img`, `text`, `sh`) VALUES
(1, '', '教師研習「世界公民生命園丁國內研習會」\r\n1.主辦單位：世界展望會\r\n2.研習日期：101年11月14日（三）～15日（四）\r\n3.詳情請參考：\r\nhttp://gc.worldvision.org.tw/seed.html。\r\n請線上報名。', 1),
(2, '', '公告綜合高中一年級英數補救教學時間\r\n上課日期:10/27.11/3.11/10.11/24共計四次\r\n上課時間:早上8:00~11:50半天\r\n費用:全程免費\r\n參加同學:綜合科一年級第一次段考成績需加強者\r\n已將名單送交各班及導師\r\n參加同學請帶紙筆.課本.第一次段考考卷\r\n並將家長通知單給家長\r\n若有任何疑問\r\n請洽綜合高中學程主任', 1),
(3, '', '102年全國大專校院運動會\r\n「主題標語及吉祥物命名」\r\n網路票選活動\r\n一、活動期間：自10月25日起至11月4日止。\r\n二、相關訊息請上宜蘭大學首頁連結「102全大運在宜大」\r\n活動網址：http://102niag.niu.edu.tw/', 1),
(4, '', 'QAQ', 1),
(5, '', '耶搂歐摟', 1),
(6, '', '瓜啦瓜他搭ˇ搭', 1),
(7, '', '國立故宮博物院辦理\r\n「商王武丁與后婦好 殷商盛世文化藝術特展」暨\r\n「赫赫宗周 西周文化特展」', 1),
(8, '', '財團法人漢光教育基金會\r\n辦理2012「舊愛新歡-古典詩詞譜曲創作暨歌唱表演競賽」\r\n參賽獎金豐厚!!', 1);

-- --------------------------------------------------------

--
-- 資料表結構 `title`
--

CREATE TABLE `title` (
  `id` int(11) UNSIGNED NOT NULL COMMENT '流水號',
  `img` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '檔名/路徑',
  `text` text COLLATE utf8mb4_unicode_520_ci NOT NULL COMMENT '文字',
  `sh` int(1) UNSIGNED DEFAULT 0 COMMENT '顯示'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `title`
--

INSERT INTO `title` (`id`, `img`, `text`, `sh`) VALUES
(1, '01B01.jpg', '科技大學校園資訊系統1', 0),
(2, '01B02.jpg', '科技大學校園資訊系統2', 0),
(3, '01B03.jpg', '科技大學校園資訊系統3', 1),
(4, '01B04.jpg', '科技大學校園資訊系統4', 0);

-- --------------------------------------------------------

--
-- 資料表結構 `total`
--

CREATE TABLE `total` (
  `id` int(11) UNSIGNED NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_520_ci;

--
-- 傾印資料表的資料 `total`
--

INSERT INTO `total` (`id`, `total`) VALUES
(1, 155);

--
-- 已傾印資料表的索引
--

--
-- 資料表索引 `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `bottom`
--
ALTER TABLE `bottom`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `mvim`
--
ALTER TABLE `mvim`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `title`
--
ALTER TABLE `title`
  ADD PRIMARY KEY (`id`);

--
-- 資料表索引 `total`
--
ALTER TABLE `total`
  ADD PRIMARY KEY (`id`);

--
-- 在傾印的資料表使用自動遞增(AUTO_INCREMENT)
--

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `ad`
--
ALTER TABLE `ad`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=10;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `bottom`
--
ALTER TABLE `bottom`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=11;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `menu`
--
ALTER TABLE `menu`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `mvim`
--
ALTER TABLE `mvim`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=15;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=9;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `title`
--
ALTER TABLE `title`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT '流水號', AUTO_INCREMENT=14;

--
-- 使用資料表自動遞增(AUTO_INCREMENT) `total`
--
ALTER TABLE `total`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
