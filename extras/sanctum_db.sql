-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 18, 2021 at 10:05 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sanctum_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator`
--

CREATE TABLE `administrator` (
  `ADMIN_ID` int(11) NOT NULL,
  `ADMIN_NAME` varchar(50) NOT NULL,
  `ADMIN_EMAIL` varchar(50) NOT NULL,
  `ADMIN_CONTACT_1` varchar(10) NOT NULL,
  `ADMIN_CONTACT_2` varchar(10) NOT NULL,
  `ADMIN_MESSAGE` text NOT NULL,
  `ADMIN_PASSWORD` varchar(50) NOT NULL,
  `ADMIN_PROFILE_PHOTO` varchar(200) NOT NULL,
  `ADMIN_USERNAME` varchar(50) NOT NULL,
  `ADMIN_RECOVERY_PIN` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `administrator`
--

INSERT INTO `administrator` (`ADMIN_ID`, `ADMIN_NAME`, `ADMIN_EMAIL`, `ADMIN_CONTACT_1`, `ADMIN_CONTACT_2`, `ADMIN_MESSAGE`, `ADMIN_PASSWORD`, `ADMIN_PROFILE_PHOTO`, `ADMIN_USERNAME`, `ADMIN_RECOVERY_PIN`) VALUES
(1, 'Dhruv Dani', 'dhruvbdani@gmail.com', '9845213784', '9956784129', 'carpediam', 'dhruv', '/admin/admin_profile/sanctum-default.png', 'dhruv.admin', '45'),
(2, 'Zena', 'zena@gmail.com', '9564789542', '9634257958', 'conspious', 'zena', '/admin/admin_profile/sanctum-default.png', 'Zena.admin', '50'),
(3, 'Nilay Thakkar', 'nilay2620@gmail.com', '9727945621', '9537505500', 'Hey There', 'nilay', '/admin/admin_profile/sanctum-default.png', 'Nilay.admin', '20');

-- --------------------------------------------------------

--
-- Table structure for table `client`
--

CREATE TABLE `client` (
  `CLIENT_ID` int(11) NOT NULL,
  `CLIENT_NAME` varchar(50) NOT NULL,
  `CLIENT_EMAIL` varchar(50) NOT NULL,
  `CLIENT_CONTACT` varchar(10) NOT NULL,
  `CLIENT_PASSWORD` varchar(50) NOT NULL,
  `CLIENT_STATUS` tinyint(1) NOT NULL,
  `CLIENT_PROFILE_PHOTO` varchar(200) NOT NULL,
  `CLIENT_SANCTUM_TOKEN` int(11) NOT NULL,
  `CLIENT_TOTAL_SCORE` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `client`
--

INSERT INTO `client` (`CLIENT_ID`, `CLIENT_NAME`, `CLIENT_EMAIL`, `CLIENT_CONTACT`, `CLIENT_PASSWORD`, `CLIENT_STATUS`, `CLIENT_PROFILE_PHOTO`, `CLIENT_SANCTUM_TOKEN`, `CLIENT_TOTAL_SCORE`) VALUES
(1, 'Jay gujarati', 'jay25@gmail.com', '9845732168', 'jaygujarati12', 1, '/client/client_images/sanctum-default.png', 200, 33350),
(2, 'vir patel', 'patel456@gmail.com', '9564237814', 'mindpatel98', 1, '/client/client_images/sanctum-default.png', 1000, 13880),
(3, 'gaurav patel', 'gauravp56@gmail.com', '9959837814', 'gauravio@gmail.com', 1, '/client/client_images/sanctum-default.png', 3000, 7000),
(4, 'Akshar surti', 'suratiak@gmail.com', '9834256178', 'akshar1254', 1, '/client/client_images/sanctum-default.png', 500, 26290),
(5, 'jill shukla', 'jill@gmail.com', '945123784', 'jillshukla', 1, '/client/client_images/sanctum-default.png', 3000, 12500),
(6, 'disha salian', 'dishas@gmail.com', '9564231456', 'khghf19842', 1, '/client/client_images/sanctum-default.png', 500, 2220),
(7, 'manushree patil', 'patil@gmail.com', '9865437841', 'mp8794patil', 1, '/client/client_images/sanctum-default.png', 5000, 25000),
(8, 'shruti amrute', 'shramru@gmail.com', '9865454641', 'shruti564amrute', 1, '/client/client_images/sanctum-default.png', 2500, 6500),
(9, 'mansi chiplunkar', 'mansi@gmail.com', '9995474641', 'mansichip', 1, '/client/client_images/sanctum-default.png', 1000, 23200),
(10, 'komal rathi', 'rathi@gmail.com', '9564111234', 'komalgovind', 1, '/client/client_images/sanctum-default.png', 3500, 21300),
(11, 'pathik patel', 'pathik@432', '9564278165', 'pathik', 1, '/client/client_images/sanctum-default.png', 5000, 0),
(12, 'Jaitra Patel', 'jaitra@987', '9854781165', 'jaitra@1', 1, '/client/client_images/sanctum-default.png', 2000, 6800),
(13, 'nafiya', 'nafi@25', '9564278956', 'naf', 1, '/client/client_images/sanctum-default.png', 1200, 0),
(14, 'fairy bhat', 'fairy@432', '9851915484', 'fairy', 1, '/client/client_images/sanctum-default.png', 2300, 4000),
(15, 'jaya kapoor', 'jayak@425', '9578465100', 'jayak123', 1, '/client/client_images/sanctum-default.png', 50, 5070),
(16, 'janvi chug', 'jani@24', '9584848156', 'jani', 1, '/client/client_images/sanctum-default.png', 4500, 3410),
(17, 'Janvi bhatt', 'janu@98', '998548165', 'jan', 1, '/client/client_images/sanctum-default.png', 5100, 2200),
(18, 'ireena kaif', 'ireenak@432', '9555578165', 'irru@', 1, '/client/client_images/sanctum-default.png', 9000, 2100),
(19, 'jay jaju', 'jay@54', '9854671241', 'jajo', 1, '/client/client_images/sanctum-default.png', 1000, 1650),
(20, 'parth verma', 'parth@78', '9998278165', 'parth v', 1, '/client/client_images/sanctum-default.png', 6000, 3250),
(21, 'pathik patel', 'pathik@432', '9564278165', 'pathik', 1, '/client/client_images/sanctum-default.png', 5000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `FEEDBACK_ID` int(11) NOT NULL,
  `FEEDBACK_NAME` varchar(50) NOT NULL,
  `FEEDBACK_EMAIL` varchar(50) NOT NULL,
  `FEEDBACK_CONTACT` varchar(20) NOT NULL,
  `FEEDBACK_MESSAGE` text NOT NULL,
  `FEEDBACK_TIME` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`FEEDBACK_ID`, `FEEDBACK_NAME`, `FEEDBACK_EMAIL`, `FEEDBACK_CONTACT`, `FEEDBACK_MESSAGE`, `FEEDBACK_TIME`) VALUES
(1, 'dhruv dani', 'dhruvbdani@gmail.com', '7621999436', 'We should add some multiplayer game, in which users can play from different devices.', '2021-06-10 01:19:43'),
(2, 'apal', 'apal@123', '9584623784', 'Site Issues', '2021-05-10 01:19:00'),
(3, 'ashwin', 'ashwin@564', '9584678484', 'SLow Processing of data', '2021-05-13 23:55:32'),
(4, 'Palak', 'Palak@9', '9584623784', 'bolt issues', '2021-04-06 23:56:15'),
(5, 'manu', 'manu@123', '9984623788', 'score not reflected in main game', '2021-06-02 09:50:50');

-- --------------------------------------------------------

--
-- Table structure for table `game`
--

CREATE TABLE `game` (
  `GAME_ID` int(11) NOT NULL,
  `GAME_NAME` varchar(50) NOT NULL,
  `GAME_STATUS` tinyint(1) NOT NULL,
  `GAME_DESCRIPTION` text NOT NULL,
  `GAME_PROFILE_IMAGE` varchar(200) NOT NULL,
  `GAME_CATEGORY` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `game`
--

INSERT INTO `game` (`GAME_ID`, `GAME_NAME`, `GAME_STATUS`, `GAME_DESCRIPTION`, `GAME_PROFILE_IMAGE`, `GAME_CATEGORY`) VALUES
(1, 'Tetris', 1, 'Tetris is a easy game which can be played by anyone.', '/backend assets/images/game/tetris.png', 'Fun loving'),
(2, 'Snake', 1, 'Snake is a very common game which is being played by everyone once in a lifetime.', '/backend assets/images/game/snake.png', 'Entertainment'),
(3, 'Memory game', 1, 'memory game is a game which test your memory.', '/backend assets/images/game/memory.jpg', 'mind game'),
(4, 'Tic Tac Toe', 1, 'Tic Tac Toe is a game where 2 players can play together and compete with each other', '/backend assets/images/game/tictactoe.jpg', '2D game');

-- --------------------------------------------------------

--
-- Table structure for table `pwdreset`
--

CREATE TABLE `pwdreset` (
  `PWDRESETID` int(11) NOT NULL,
  `PWDRESETEMAIL` text NOT NULL,
  `PWDRESETSELECTOR` text NOT NULL,
  `PWDRESETTOKEN` longtext NOT NULL,
  `PWDRESETEXPIRES` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `REGISTRATION_ID` int(11) NOT NULL,
  `CLIENT_ID` int(11) NOT NULL,
  `TOURNAMENT_ID` int(11) NOT NULL,
  `REGISTRATION_DATE` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`REGISTRATION_ID`, `CLIENT_ID`, `TOURNAMENT_ID`, `REGISTRATION_DATE`) VALUES
(1, 1, 3, '2021-03-12'),
(2, 1, 2, '2021-02-06'),
(3, 1, 4, '2021-04-09'),
(4, 1, 1, '2021-01-05'),
(5, 2, 5, '2021-05-09'),
(6, 2, 2, '2021-02-07'),
(7, 2, 1, '2021-01-04'),
(8, 2, 4, '2021-04-10'),
(9, 3, 3, '2021-03-11'),
(10, 3, 5, '2021-05-08'),
(11, 3, 6, '2021-06-01'),
(12, 3, 7, '2021-07-12'),
(13, 4, 6, '2021-06-09'),
(14, 4, 1, '2021-01-12'),
(15, 4, 3, '2021-03-08'),
(16, 4, 7, '2021-07-04'),
(17, 5, 3, '2021-03-10'),
(18, 5, 2, '2021-02-08'),
(19, 5, 4, '2021-04-12'),
(20, 6, 2, '2021-02-12'),
(21, 6, 5, '2021-05-13'),
(22, 7, 1, '2021-01-10'),
(23, 7, 2, '2021-02-09'),
(24, 7, 3, '2021-07-07'),
(25, 7, 4, '2021-04-06'),
(26, 7, 5, '2021-05-12'),
(27, 8, 7, '2021-07-10'),
(28, 8, 2, '2021-02-09'),
(29, 9, 1, '2021-01-07'),
(30, 9, 2, '2021-02-05'),
(31, 9, 4, '2021-04-12'),
(32, 9, 7, '2021-07-12'),
(33, 10, 2, '2021-02-13'),
(34, 10, 3, '2021-03-14'),
(36, 12, 4, '2021-04-13'),
(37, 12, 2, '2021-02-11'),
(38, 14, 1, '2021-01-10'),
(39, 14, 6, '2021-06-09'),
(40, 15, 6, '2021-06-09'),
(41, 16, 7, '2021-07-08'),
(42, 16, 1, '2021-01-11'),
(43, 16, 5, '2021-05-12'),
(44, 16, 3, '2021-03-12'),
(45, 17, 2, '2021-02-10'),
(46, 17, 3, '2021-03-10'),
(47, 17, 5, '2021-05-04'),
(48, 18, 4, '2021-04-03'),
(49, 18, 6, '2021-06-15'),
(50, 19, 2, '2021-02-13'),
(51, 19, 5, '2021-05-12'),
(52, 20, 1, '2021-01-12'),
(53, 20, 5, '2021-05-10'),
(54, 20, 4, '2021-04-02'),
(55, 20, 3, '2021-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--

CREATE TABLE `result` (
  `RESULT_ID` int(11) NOT NULL,
  `TOURNAMENT_ID` int(11) NOT NULL,
  `CLIENT_ID` int(11) NOT NULL,
  `REWARD_STATUS` tinyint(4) NOT NULL,
  `POSITION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`RESULT_ID`, `TOURNAMENT_ID`, `CLIENT_ID`, `REWARD_STATUS`, `POSITION`) VALUES
(1, 2, 1, 0, 1),
(2, 2, 9, 0, 2),
(3, 2, 2, 0, 3),
(4, 1, 4, 0, 1),
(5, 1, 9, 0, 2),
(6, 1, 7, 0, 3);

-- --------------------------------------------------------

--
-- Table structure for table `scoreboard`
--

CREATE TABLE `scoreboard` (
  `SCOREBOARD_ID` int(11) NOT NULL,
  `CLIENT_ID` int(11) NOT NULL,
  `GAME_ID` int(11) NOT NULL,
  `TOURNAMENT_ID` int(11) NOT NULL,
  `SCORE_TOTAL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `scoreboard`
--

INSERT INTO `scoreboard` (`SCOREBOARD_ID`, `CLIENT_ID`, `GAME_ID`, `TOURNAMENT_ID`, `SCORE_TOTAL`) VALUES
(1, 5, 1, 2, 500),
(2, 6, 3, 2, 900),
(3, 1, 3, 3, 5000),
(4, 9, 1, 2, 9000),
(5, 1, 1, 2, 15000),
(6, 5, 2, 3, 8000),
(7, 9, 3, 1, 10000),
(8, 7, 2, 1, 4000),
(9, 10, 3, 2, 3000),
(10, 10, 1, 3, 18000),
(11, 4, 3, 1, 10000),
(12, 2, 2, 2, 8000),
(13, 7, 1, 2, 7500),
(14, 7, 2, 3, 6000),
(15, 4, 1, 1, 4000),
(16, 7, 3, 5, 200),
(17, 9, 2, 4, 300),
(18, 2, 1, 5, 100),
(19, 1, 3, 4, 500),
(20, 6, 2, 5, 420),
(21, 17, 1, 2, 800),
(22, 20, 2, 1, 900),
(23, 16, 3, 7, 1800),
(24, 18, 2, 4, 1200),
(25, 20, 1, 5, 1400),
(26, 15, 3, 6, 5000),
(27, 14, 2, 1, 2100),
(28, 9, 3, 2, 2300),
(29, 8, 3, 7, 4000),
(30, 7, 3, 4, 2000),
(31, 1, 1, 1, 850),
(32, 4, 1, 6, 740),
(33, 3, 2, 6, 900),
(34, 5, 1, 2, 1400),
(35, 5, 2, 4, 1100),
(36, 8, 3, 7, 400),
(37, 10, 3, 3, 300),
(38, 17, 2, 3, 900),
(39, 14, 2, 1, 1100),
(40, 12, 1, 4, 1700),
(41, 6, 1, 5, 900),
(42, 3, 3, 5, 600),
(43, 5, 3, 2, 400),
(44, 20, 3, 4, 700),
(45, 17, 2, 5, 500),
(46, 19, 3, 2, 950),
(47, 4, 2, 3, 50),
(48, 2, 2, 5, 80),
(49, 15, 2, 6, 70),
(50, 16, 3, 1, 10),
(51, 1, 3, 1, 5000),
(52, 2, 3, 4, 4000),
(53, 3, 1, 3, 300),
(54, 7, 1, 1, 200),
(55, 8, 2, 2, 100),
(56, 14, 1, 6, 800),
(57, 16, 2, 5, 700),
(58, 18, 3, 6, 900),
(59, 19, 1, 5, 700),
(60, 20, 1, 3, 250),
(61, 12, 1, 2, 100),
(62, 12, 2, 2, 5000),
(63, 1, 2, 3, 7000),
(64, 3, 3, 7, 3000),
(65, 4, 3, 7, 5500),
(66, 7, 1, 4, 3300),
(67, 8, 1, 2, 2000),
(68, 4, 1, 6, 5000),
(69, 3, 2, 7, 2200),
(70, 9, 2, 7, 1600),
(71, 7, 2, 4, 1800),
(72, 2, 3, 1, 1700),
(73, 5, 3, 2, 1100),
(74, 4, 1, 1, 1000),
(75, 16, 1, 3, 900);

-- --------------------------------------------------------

--
-- Table structure for table `tournament`
--

CREATE TABLE `tournament` (
  `TOURNAMENT_ID` int(11) NOT NULL,
  `TOURNAMENT_NAME` varchar(50) NOT NULL,
  `TOURNAMENT_START` date NOT NULL,
  `TOURNAMENT_END` date NOT NULL,
  `TOURNAMENT_STATUS` tinyint(1) NOT NULL,
  `TOURNAMENT_SUBSCRIBERS` bigint(20) NOT NULL,
  `TOURNAMENT_TOKEN_PRICE` int(11) NOT NULL,
  `TOURNAMENT_DETAILS` text NOT NULL,
  `TOURNAMENT_FIRST_PRIZE` int(11) NOT NULL,
  `TOURNAMENT_SECOND_PRIZE` int(11) NOT NULL,
  `TOURNAMENT_THIRD_PRIZE` int(11) NOT NULL,
  `TOURNAMENT_TREMS` text NOT NULL,
  `TOURNAMENT_REGISTRATION_TILL` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tournament`
--

INSERT INTO `tournament` (`TOURNAMENT_ID`, `TOURNAMENT_NAME`, `TOURNAMENT_START`, `TOURNAMENT_END`, `TOURNAMENT_STATUS`, `TOURNAMENT_SUBSCRIBERS`, `TOURNAMENT_TOKEN_PRICE`, `TOURNAMENT_DETAILS`, `TOURNAMENT_FIRST_PRIZE`, `TOURNAMENT_SECOND_PRIZE`, `TOURNAMENT_THIRD_PRIZE`, `TOURNAMENT_TREMS`, `TOURNAMENT_REGISTRATION_TILL`) VALUES
(1, 'Jan Season', '2021-01-12', '2021-01-30', 1, 5, 2000, 'This tournament is organized for fun.Even participants can win prizes.', 5000, 3000, 2000, 'you must register yourself before last registration date.', '2021-01-10'),
(2, 'Feb Season', '2021-02-11', '2021-02-18', 1, 6, 1500, 'This tournament is not a normal tornament.It is a very big tournament.Even participants can win prizes.', 4000, 2000, 1500, 'you must register yourself before last registration date.', '2021-02-08'),
(3, 'March Season', '2021-03-20', '2021-03-30', 1, 10, 2400, 'This tournament is organized by us for the sole purpose of enjoyment.Even participants can win prizes.', 3500, 1000, 800, 'you must register yourself before last registration date.', '2021-03-16'),
(4, 'April Season', '2021-04-15', '2021-04-22', 1, 5, 2100, 'This tournament is organized by us in the month of January.Even participants can win prizes in the tournament.', 2000, 600, 200, 'you must register yourself before last registration date.', '2021-04-14'),
(5, 'May Season', '2021-05-12', '2021-05-18', 1, 4, 1400, 'This tournament is specially for kids to have fun in summer vacation', 3000, 2000, 1000, 'you must register yourself before last registration date.', '2021-05-09'),
(6, 'June Season', '2021-06-18', '2021-06-25', 1, 7, 2800, 'This tournament is designed so that various players can compete with each other.\r\n', 4000, 3500, 3000, 'you must register yourself before last registration date.', '2021-06-15'),
(7, 'July Season', '2021-07-15', '2021-07-22', 1, 3, 2400, 'This tournament is designed so that various players can compete with each other.\r\n', 3500, 2000, 1000, 'you must register yourself before last registration date.', '2021-07-10');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrator`
--
ALTER TABLE `administrator`
  ADD PRIMARY KEY (`ADMIN_ID`);

--
-- Indexes for table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`CLIENT_ID`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`FEEDBACK_ID`);

--
-- Indexes for table `game`
--
ALTER TABLE `game`
  ADD PRIMARY KEY (`GAME_ID`);

--
-- Indexes for table `pwdreset`
--
ALTER TABLE `pwdreset`
  ADD PRIMARY KEY (`PWDRESETID`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`REGISTRATION_ID`),
  ADD KEY `CLIENT_ID` (`CLIENT_ID`),
  ADD KEY `TOURNAMENT_ID` (`TOURNAMENT_ID`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD PRIMARY KEY (`RESULT_ID`),
  ADD KEY `CLIENT_ID` (`CLIENT_ID`),
  ADD KEY `TOURNAMENT_ID` (`TOURNAMENT_ID`);

--
-- Indexes for table `scoreboard`
--
ALTER TABLE `scoreboard`
  ADD PRIMARY KEY (`SCOREBOARD_ID`),
  ADD KEY `CLIENT_ID` (`CLIENT_ID`),
  ADD KEY `GAME_ID` (`GAME_ID`),
  ADD KEY `TOURNAMENT_ID` (`TOURNAMENT_ID`);

--
-- Indexes for table `tournament`
--
ALTER TABLE `tournament`
  ADD PRIMARY KEY (`TOURNAMENT_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrator`
--
ALTER TABLE `administrator`
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FEEDBACK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `GAME_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `PWDRESETID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `REGISTRATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `RESULT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `scoreboard`
--
ALTER TABLE `scoreboard`
  MODIFY `SCOREBOARD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `TOURNAMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`CLIENT_ID`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`TOURNAMENT_ID`) REFERENCES `tournament` (`TOURNAMENT_ID`);

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`CLIENT_ID`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `result_ibfk_2` FOREIGN KEY (`TOURNAMENT_ID`) REFERENCES `tournament` (`TOURNAMENT_ID`);

--
-- Constraints for table `scoreboard`
--
ALTER TABLE `scoreboard`
  ADD CONSTRAINT `scoreboard_ibfk_1` FOREIGN KEY (`CLIENT_ID`) REFERENCES `client` (`CLIENT_ID`),
  ADD CONSTRAINT `scoreboard_ibfk_2` FOREIGN KEY (`GAME_ID`) REFERENCES `game` (`GAME_ID`),
  ADD CONSTRAINT `scoreboard_ibfk_3` FOREIGN KEY (`TOURNAMENT_ID`) REFERENCES `tournament` (`TOURNAMENT_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
