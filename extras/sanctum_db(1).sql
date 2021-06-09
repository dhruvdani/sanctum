-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2021 at 09:27 PM
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
(1, 'Dhruv Dani', 'dhruvbdani@gmail.com', '9845213784', '9956784129', 'carpediam', 'dhruv', '/admin/admin_profile/sanctum_default.png', 'Dhruv', '45'),
(2, 'Zena', 'zena@gmail.com', '9564789542', '9634257958', 'conspious', 'zena', '/admin/admin_profile/sanctum_default.png', 'Zena', '50'),
(3, 'Nilay Thakkar', 'nilay2620@gmail.com', '9727945621', '9537505500', 'Hey There', 'nilay', '/admin/admin_profile/sanctum_default.png', 'Nilay', '20');

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
(1, 'Jay n gujarati', 'jay25@gmail.com', '9845732168', 'jaygujarati12', 1, '/client/client_images/sanctum_default.png', 200, 20000),
(2, 'vir patel', 'patel456@gmail.com', '9564237814', 'mindpatel98', 1, '/client/client_images/sanctum_default.png', 1000, 8000),
(3, 'gaurav patel', 'gauravp56@gmail.com', '9959837814', 'gauravio@gmail.com', 1, '/client/client_images/sanctum_default.png', 3000, 15000),
(4, 'Akshar surti', 'suratiak@gmail.com', '9834256178', 'akshar1254', 1, '/client/client_images/sanctum-default.png', 500, 14000),
(5, 'jill shukla', 'jill@gmail.com', '945123784', 'jillshukla', 1, '/client/client_images/sanctum_default.png', 3000, 8500),
(6, 'disha salian', 'dishas@gmail.com', '9564231456', 'khghf19842', 1, '/client/client_images/sanctum_default.png', 500, 900),
(7, 'manushree patil', 'patil@gmail.com', '9865437841', 'mp8794patil', 1, '/client/client_images/sanctum_default.png', 5000, 17500),
(8, 'shruti amrute', 'shramru@gmail.com', '9865454641', 'shruti564amrute', 1, '/client/client_images/sanctum_default.png', 2500, 10000),
(9, 'mansi chiplunkar', 'mansi@gmail.com', '9995474641', 'mansichip', 1, '/client/client_images/sanctum_default.png', 1000, 19000),
(10, 'komal rathi', 'rathi@gmail.com', '9564111234', 'komalgovind', 1, '/client/client_images/sanctum_default.png', 3500, 21000);

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
(1, 'Tetris', 1, 'Tetris is a easy game which can be played by anyone.', '', 'Fun loving'),
(2, 'Snake', 1, 'Snake is a very common game which is being played by everyone once in a lifetime.', '', 'Entertainment'),
(3, 'Memory game', 1, 'memory game is a game which test your memory.', '', 'mind game'),
(4, 'Tic Tac Toe', 1, 'Tic Tac Toe is a game where 2 players can play together and compete with each other', '', '2D game');

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
(1, 5, 1, '2021-04-12'),
(2, 1, 2, '2021-05-06'),
(3, 10, 3, '2021-06-09'),
(4, 9, 1, '2021-04-05'),
(5, 2, 3, '2021-06-09'),
(6, 7, 2, '2021-06-07'),
(7, 8, 1, '2021-04-04'),
(8, 3, 2, '2021-05-10'),
(9, 6, 3, '2021-06-11'),
(10, 4, 2, '2021-05-08'),
(11, 5, 3, '2021-06-01'),
(12, 1, 1, '2021-04-12'),
(13, 8, 3, '2021-06-09'),
(14, 10, 1, '2021-04-12'),
(15, 4, 3, '2021-06-08');

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
(15, 4, 1, 1, 4000);

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
(1, 'April Season', '2021-04-22', '2021-04-29', 1, 5, 2000, 'This tournament is organized for fun.Even participants can win prizes.', 5000, 3000, 2000, 'you must register yourself before last registration date.', '2021-06-17'),
(2, 'May Season', '2021-05-15', '2021-05-20', 1, 6, 1500, 'This tournament is not a normal tornament.It is a very big tournament.Even participants can win prizes.', 4000, 2000, 1500, 'you must register yourself before last registration date.', '2021-05-08'),
(3, 'June Season', '2021-06-19', '2021-06-25', 1, 10, 2400, 'This tournament is organized by us for the sole purpose of enjoyment.Even participants can win prizes.', 3500, 1000, 800, 'you must register yourself before last registration date.', '2021-05-16');

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
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FEEDBACK_ID` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `REGISTRATION_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `RESULT_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `scoreboard`
--
ALTER TABLE `scoreboard`
  MODIFY `SCOREBOARD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `TOURNAMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
