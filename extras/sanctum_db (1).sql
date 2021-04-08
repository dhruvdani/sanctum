-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 08, 2021 at 09:02 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

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
(1, 'dhruv dani', 'dhruvbdani@gmail.com', '7621999436', '9320099436', 'dhruv is my name', 'dhruv123', '/admin/admin_profile/20181021_004055.jpg', 'dhruv.admin', '12abcd'),
(2, 'Zaneta Bhagwagar', 'zanetabhagwagar@gmail.com', '7433005558', '', 'Zaneta', 'zaneta123', '/images/t3.jpg', 'zaneta.admin', '123abc');

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
(1, 'DHRUV DANI', 'DHRUVBDANI@GMAIL.COM', '7621999436', 'dhruv@2000', 1, '/images/t2.jpg', 0, 200),
(2, 'ZANETA ', 'ZANETA@GMAIL.COM', '98765432S1', 'zena', 0, '/images/t3.jpg', 0, 0),
(3, 'NILAY', 'NILAY@GMAIL.COM', '98765432S1', 'NILAY', 1, '/images/t4.jpg', 0, 0),
(5, 'alpha', 'ALPHA@GMAIL.COM', '', 'alpha', 1, '\\backend assets\\images\\favicon.ico', 0, 0);

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
(1, 'dhruv', 'dhruvbdani@gmail.com', 'd', 'hi', '2021-03-14 21:24:08'),
(2, 'd', 's@gmail.com', '', 'sdsdsdsd', '2021-03-14 21:24:08'),
(3, 'dani dhruv', 'dhruvbdani@gmail.com', '', 'this is a latest feedback', '2021-03-14 21:28:29');

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
(1, 'TETRIS', 1, 'Tetris® is the addictive puzzle game that started it all, embracing our universal desire to create order out of chaos.', 'images\\tetris.png', 'DUMMY'),
(2, 'SNAKE', 1, 'Snake is the common name for a video game concept where the player maneuvers a line which grows in length, with the line itself being a primary obstacle.', 'images\\snake.png', 'DUMMY');

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
(2, 2, 3, 0, 2),
(3, 2, 2, 0, 3),
(5, 3, 1, 0, 1),
(10, 3, 3, 0, 3),
(12, 3, 2, 0, 2),
(14, 1, 3, 0, 1),
(15, 1, 2, 0, 2),
(16, 1, 1, 0, 3);

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
(1, 1, 1, 1, 50),
(2, 1, 2, 1, 100),
(3, 1, 1, 2, 50),
(4, 3, 1, 1, 1000),
(5, 1, 1, 1, 5000),
(6, 1, 1, 1, 5000),
(7, 3, 1, 1, 4000),
(8, 2, 1, 1, 6000),
(9, 2, 1, 1, 5000),
(10, 3, 1, 1, 7000);

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
(1, 'APRIL SEASON', '2021-03-02', '2021-03-31', 1, 0, 10, 'OUR VERY FIRST TOURNAMENT.ENJOY PEOPLE!!!', 100, 70, 40, 'THE ONLY CONDITION IS THAT THERE IS NO CONDITION.', '2021-02-28'),
(2, 'CWL', '2021-02-01', '2021-02-28', 1, 0, 0, '', 0, 0, 0, '0K', '2021-03-31'),
(3, 'JAN SEASON', '2021-01-01', '2021-01-31', 1, 0, 0, '', 0, 0, 0, 'LOL PPL THIS IS A DUMMY TEXT', '2020-12-31');

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
  MODIFY `ADMIN_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `client`
--
ALTER TABLE `client`
  MODIFY `CLIENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `FEEDBACK_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game`
--
ALTER TABLE `game`
  MODIFY `GAME_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pwdreset`
--
ALTER TABLE `pwdreset`
  MODIFY `PWDRESETID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `result`
--
ALTER TABLE `result`
  MODIFY `RESULT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `scoreboard`
--
ALTER TABLE `scoreboard`
  MODIFY `SCOREBOARD_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tournament`
--
ALTER TABLE `tournament`
  MODIFY `TOURNAMENT_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

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
