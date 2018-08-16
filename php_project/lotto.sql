-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 18-07-31 01:55
-- 서버 버전: 10.1.31-MariaDB
-- PHP 버전: 5.6.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `lotto`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `bet`
--

CREATE TABLE `bet` (
  `idx` int(11) NOT NULL,
  `id` varchar(200) NOT NULL,
  `turn` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `num` int(11) NOT NULL,
  `result` varchar(200) NOT NULL,
  `point` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `bet`
--

INSERT INTO `bet` (`idx`, `id`, `turn`, `name`, `num`, `result`, `point`, `date`) VALUES
(5, 'user1', 1, '독거노인돕기', 1, '1,2,3,4,7,8', 10000, '2018-07-26 11:34:24'),
(6, 'user1', 1, '독거노인돕기', 1, '1,2,3,4,6,9', 10000, '2018-07-26 11:34:31'),
(7, 'user1', 1, '독거노인돕기', 1, '2,4,13,14,23,24', 10000, '2018-07-26 11:34:37'),
(8, 'user1', 1, '불우아동돕기', 1, '1,2,3,4,6,9', 20000, '2018-07-26 11:34:51'),
(9, 'user1', 1, '불우아동돕기', 1, '1,2,3,4,7,8', 20000, '2018-07-26 11:34:57'),
(10, 'user1', 1, '불우아동돕기', 1, '3,4,12,13,21,22', 20000, '2018-07-26 11:35:02');

-- --------------------------------------------------------

--
-- 테이블 구조 `donate`
--

CREATE TABLE `donate` (
  `idx` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `donate`
--

INSERT INTO `donate` (`idx`, `name`, `total`) VALUES
(1, '독거노인돕기', 100000),
(2, '불우아동돕기', 200000);

-- --------------------------------------------------------

--
-- 테이블 구조 `lotto`
--

CREATE TABLE `lotto` (
  `idx` int(11) NOT NULL,
  `turn` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `num` int(11) NOT NULL,
  `point` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `img` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `lotto`
--

INSERT INTO `lotto` (`idx`, `turn`, `name`, `num`, `point`, `total`, `img`) VALUES
(3, 1, '독거노인돕기', 1, 10000, 10, 'old_man'),
(4, 1, '불우아동돕기', 1, 20000, 5, 'child');

-- --------------------------------------------------------

--
-- 테이블 구조 `member`
--

CREATE TABLE `member` (
  `idx` int(11) NOT NULL,
  `id` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `pw` varchar(200) NOT NULL,
  `point` int(11) NOT NULL,
  `n_point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 테이블의 덤프 데이터 `member`
--

INSERT INTO `member` (`idx`, `id`, `name`, `pw`, `point`, `n_point`) VALUES
(1, 'user1', '유저1', '*A4B6157319038724E3560894F7F932C8886EBFCF', 700000, 160000),
(2, 'admin', '관리자', '*A4B6157319038724E3560894F7F932C8886EBFCF', 1000000, 0),
(3, 'user2', '유저2', '*A4B6157319038724E3560894F7F932C8886EBFCF', 1000000, 0);

-- --------------------------------------------------------

--
-- 테이블 구조 `message`
--

CREATE TABLE `message` (
  `idx` int(11) NOT NULL,
  `id` varchar(200) NOT NULL,
  `writer` varchar(200) NOT NULL DEFAULT '관리자',
  `title` text NOT NULL,
  `con` text NOT NULL,
  `date` datetime NOT NULL,
  `view` varchar(200) NOT NULL DEFAULT 'X'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- 테이블 구조 `result`
--

CREATE TABLE `result` (
  `idx` int(11) NOT NULL,
  `turn` int(11) NOT NULL,
  `result` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `bet`
--
ALTER TABLE `bet`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `donate`
--
ALTER TABLE `donate`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `lotto`
--
ALTER TABLE `lotto`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`idx`);

--
-- 테이블의 인덱스 `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `bet`
--
ALTER TABLE `bet`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- 테이블의 AUTO_INCREMENT `donate`
--
ALTER TABLE `donate`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- 테이블의 AUTO_INCREMENT `lotto`
--
ALTER TABLE `lotto`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- 테이블의 AUTO_INCREMENT `member`
--
ALTER TABLE `member`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 테이블의 AUTO_INCREMENT `message`
--
ALTER TABLE `message`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;

--
-- 테이블의 AUTO_INCREMENT `result`
--
ALTER TABLE `result`
  MODIFY `idx` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
