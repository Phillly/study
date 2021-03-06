-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2017 at 11:46 PM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `video`
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
-- Table structure for table `comment_tbl`
--

CREATE TABLE `comment_tbl` (
  `comment_ID` int(10) NOT NULL,
  `comment` varchar(250) NOT NULL,
  `date` date NOT NULL,
  `user_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(60, 18, 84, 2),
(61, 84, 81, 1),
(62, 18, 82, 2),
(63, 18, 83, 1),
(64, 81, 61, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_ID` int(10) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL,
  `is_admin` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_ID`, `user_name`, `email`, `password`, `is_admin`) VALUES
(18, 'silence', 'helloworld@live.com', 'asd', 1),
(61, 'updated', 'asd@live.com', 'asd', 0),
(79, 'silenc', 'zfuz3y@live.co', 'ss', 0),
(80, 'yo', 'zfuz3y@live.com', '123', 0),
(81, 'foo', 'foo@live.com', 'asd', 0),
(82, 'fighter', 'fighter@live.com', 'asd', 0),
(83, 'lebron', 'Lebron@live.com', 'asd', 0),
(84, 'kyrie', 'kyrie@live.com', 'asd', 0),
(85, 'james harden', 'james@live.com', 'asd', 0),
(86, 'Steph', 'steph@live.com', 'asd', 0),
(87, 'Mj', 'goat@legend.com', 'asd', 0);

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
(1, 'Action Bronson', 'wowowow', 'action_bronson.mp4', 'action-bronson.jpg', 5, 1, 18),
(2, 'childish_gambino_bonfire', 'childish_gambino', 'childish_gambino_bonfire.mp4', 'childish_gambino.jpg', 9, 2, 18),
(4, 'drake_energy', 'drake', 'drake_energy.mp4', 'childish_gambino.jpg', 0, 1, 18),
(20, 'Migos T-shirt', 'Migos t-shirt song', 'migos_tshirt.mp4', 'migos.jpg', 0, 1, 61),
(22, 'childish_gambino_bonfire', 'childish_gambino', 'childish_gambino_bonfire.mp4', 'childish_gambino.jpg', 0, 2, 18),
(24, 'drake_energy', 'drake', 'drake_energy.mp4', 'childish_gambino.jpg', 0, 2, 18),
(27, 'Migos T-shirt', 'Migos t-shirt song', 'migos_tshirt.mp4', 'migos.jpg', 0, 1, 61),
(28, 'Action Bronson', 'wowowow', 'action_bronson.mp4', 'action-bronson.jpg', 0, 1, 18),
(29, 'childish_gambino_bonfire', 'childish_gambino', 'childish_gambino_bonfire.mp4', 'childish_gambino.jpg', 0, 2, 18),
(30, 'drake_energy', 'drake', 'drake_energy.mp4', 'childish_gambino.jpg', 0, 1, 18),
(31, 'Migos T-shirt', 'Migos t-shirt song', 'migos_tshirt.mp4', 'migos.jpg', 0, 1, 61),
(32, 'Action Bronson', 'wowowow', 'action_bronson.mp4', 'migos.jpg', 0, 1, 18),
(33, 'childish_gambino_bonfire', 'childish_gambino', 'childish_gambino_bonfire.mp4', 'childish_gambino.jpg', 0, 2, 18),
(34, 'drake_energy', 'drake', 'drake_energy.mp4', 'childish_gambino.jpg', 0, 2, 18),
(35, 'Migos T-shirt', 'Migos t-shirt song', 'migos_tshirt.mp4', 'migos.jpg', 1, 1, 61);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catergory_tbl`
--
ALTER TABLE `catergory_tbl`
  ADD PRIMARY KEY (`catergory_ID`);

--
-- Indexes for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  ADD PRIMARY KEY (`comment_ID`),
  ADD KEY `user_ID` (`user_ID`);

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
-- AUTO_INCREMENT for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  MODIFY `comment_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `friend_tbl`
--
ALTER TABLE `friend_tbl`
  MODIFY `friend_request_key` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;
--
-- AUTO_INCREMENT for table `video_tbl`
--
ALTER TABLE `video_tbl`
  MODIFY `video_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  ADD CONSTRAINT `user_comment` FOREIGN KEY (`user_ID`) REFERENCES `user_tbl` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `friend_tbl`
--
ALTER TABLE `friend_tbl`
  ADD CONSTRAINT `user_1` FOREIGN KEY (`user_action`) REFERENCES `user_tbl` (`user_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `user_2` FOREIGN KEY (`user_recieve`) REFERENCES `user_tbl` (`user_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `video_tbl`
--
ALTER TABLE `video_tbl`
  ADD CONSTRAINT `catergory` FOREIGN KEY (`catergory_ID`) REFERENCES `catergory_tbl` (`catergory_ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `video` FOREIGN KEY (`user_ID`) REFERENCES `user_tbl` (`user_ID`) ON DELETE CASCADE ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
