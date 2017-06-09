-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 09, 2017 at 09:07 AM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video_2`
--

-- --------------------------------------------------------

--
-- Table structure for table `catergory_tbl`
--

CREATE TABLE `catergory_tbl` (
  `catergory_ID` int(10) NOT NULL,
  `catergory_name` varchar(100) NOT NULL,
  `catergory_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `catergory_tbl`
--

INSERT INTO `catergory_tbl` (`catergory_ID`, `catergory_name`, `catergory_image`) VALUES
(1, 'Music', 'music-cat.jpg'),
(2, 'Gaming', 'gaming-cat.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `friend_tbl`
--

CREATE TABLE `friend_tbl` (
  `friend_request_key` int(10) NOT NULL,
  `user_action` int(10) NOT NULL,
  `user_recieve` int(10) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `friend_tbl`
--

INSERT INTO `friend_tbl` (`friend_request_key`, `user_action`, `user_recieve`, `status`) VALUES
(99, 83, 61, 2),
(101, 83, 84, 2),
(105, 84, 61, 2),
(134, 83, 81, 2),
(138, 83, 87, 1),
(169, 18, 61, 2),
(170, 18, 81, 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_ID` int(10) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_ID`, `user_name`, `email`, `password`, `is_admin`) VALUES
(18, 'silence', 'helloworld@live.com', 'asd', 1),
(61, 'updated', 'asd@live.com', 'asd', 0),
(81, 'foo', 'foo@live.com', 'asd', 0),
(83, 'lebron', 'Lebron@live.com', 'asd', 1),
(84, 'kyrie', 'kyrie@live.com', 'asd', 1),
(87, 'Mj', 'goat@legend.com', 'asd', 0),
(99, 'si', 'Zfuz3y@live.com', 'asd', 0),
(100, 'sd303sd', 'adasf@live.com', 'asd', 0);

-- --------------------------------------------------------

--
-- Table structure for table `video_tbl`
--

CREATE TABLE `video_tbl` (
  `video_ID` int(10) NOT NULL,
  `video_name` varchar(50) NOT NULL,
  `video_desc` varchar(250) NOT NULL,
  `video_file` varchar(100) NOT NULL,
  `video_image` varchar(100) NOT NULL,
  `views` int(255) NOT NULL,
  `catergory_ID` int(10) NOT NULL,
  `user_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_tbl`
--

INSERT INTO `video_tbl` (`video_ID`, `video_name`, `video_desc`, `video_file`, `video_image`, `views`, `catergory_ID`, `user_ID`) VALUES
(20, 'Migos T-shirt', 'Migos t-shirt song', 'childish_gambino_bonfire.mp4', 'migos.jpg', 46, 1, 61),
(22, 'childish_gambino_bonfire', 'childish_gambino', 'childish_gambino_bonfire.mp4', 'childish_gambino.jpg', 14, 2, 18),
(27, 'Migos T-shirt', 'Migos t-shirt song', 'childish_gambino_bonfire.mp4', 'migos.jpg', 3, 1, 61),
(30, 'drake_energy', 'drake', 'childish_gambino_bonfire.mp4', 'childish_gambino.jpg', 4, 1, 18),
(31, 'Migos T-shirt', 'Migos t-shirt song', 'childish_gambino_bonfire.mp4', 'migos.jpg', 1, 1, 61),
(32, 'Action Bronson', 'wowowow', 'childish_gambino_bonfire.mp4', 'migos.jpg', 12, 1, 18),
(33, 'childish_gambino_bonfire', 'childish_gambino', 'childish_gambino_bonfire.mp4', 'childish_gambino.jpg', 1, 2, 18),
(35, 'Migos T-shirt', 'Migos t-shirt song', 'childish_gambino_bonfire.mp4', 'migos.jpg', 1, 1, 61),
(36, 'Migos T-shirt', 'Migos t-shirt song', 'childish_gambino_bonfire.mp4', 'migos.jpg', 2, 1, 61),
(37, 'childish_gambino_bonfire', 'childish_gambino', 'childish_gambino_bonfire.mp4', 'childish_gambino.jpg', 0, 2, 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catergory_tbl`
--
ALTER TABLE `catergory_tbl`
  ADD PRIMARY KEY (`catergory_ID`);

--
-- Indexes for table `friend_tbl`
--
ALTER TABLE `friend_tbl`
  ADD PRIMARY KEY (`friend_request_key`),
  ADD KEY `user_action` (`user_action`),
  ADD KEY `user_recieve` (`user_recieve`);

--
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `video_tbl`
--
ALTER TABLE `video_tbl`
  ADD PRIMARY KEY (`video_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `catergory_ID` (`catergory_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catergory_tbl`
--
ALTER TABLE `catergory_tbl`
  MODIFY `catergory_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `friend_tbl`
--
ALTER TABLE `friend_tbl`
  MODIFY `friend_request_key` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=171;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;
--
-- AUTO_INCREMENT for table `video_tbl`
--
ALTER TABLE `video_tbl`
  MODIFY `video_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `friend_tbl`
--
ALTER TABLE `friend_tbl`
  ADD CONSTRAINT `user_1` FOREIGN KEY (`user_action`) REFERENCES `user_tbl` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_2` FOREIGN KEY (`user_recieve`) REFERENCES `user_tbl` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_tbl`
--
ALTER TABLE `video_tbl`
  ADD CONSTRAINT `catergory` FOREIGN KEY (`catergory_ID`) REFERENCES `catergory_tbl` (`catergory_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `video` FOREIGN KEY (`user_ID`) REFERENCES `user_tbl` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
