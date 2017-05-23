-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 03, 2017 at 08:59 AM
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
-- Table structure for table `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `Admin_ID` int(10) NOT NULL,
  `Admin_username` varchar(25) NOT NULL,
  `Admin_password` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `catergory_tbl`
--

CREATE TABLE `catergory_tbl` (
  `catergory_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
-- Table structure for table `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_ID` int(10) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `email` varchar(30) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_tbl`
--

INSERT INTO `user_tbl` (`user_ID`, `user_name`, `email`, `password`) VALUES
(18, 'silence', 'helloworld@live.com', 'asd'),
(61, 'zs', 'asd@live.com', 'asd'),
(76, 'tits', 'Zfuz3y@live.com', 'aaa');

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
  `user_ID` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `video_tbl`
--

INSERT INTO `video_tbl` (`video_ID`, `video_name`, `video_desc`, `video_file`, `video_image`, `views`, `user_ID`) VALUES
(1, 'Action Bronson', 'wowowow', 'public_view/video/action_bronson.mp4', 'images/action-bronson.jpg', 0, 18),
(2, 'childish_gambino_bonfire', 'childish_gambino', 'public_view/video/childish_gambino_bonfire.mp4', 'images/childish_gambino.jpg', 0, 18),
(3, 'childish_gambino_sweatpants', 'childish_gambino', 'public_view/video/childish_gambino_sweatpants.mp4', 'images/childish_gambino.jpg', 0, 76),
(4, 'drake_energy', 'drake', 'video/drake_energy.mp4', 'images/childish_gambino.jpg', 0, 18),
(5, 'gorillaz', 'gorillaz', 'public_view/video/gorillaz.mp4', 'images/chance_the_rapper.jpg', 0, 76),
(6, 'kendrick_lamar_king_kunta', 'kendrick_lamar', 'public_view/video/kendrick_lamar_king_kunta.mp4', 'images/kendrick_lamar.jpg', 0, 76),
(20, 'Migos T-shirt', 'Migos t-shirt song', 'public_view/video/migos_tshirt.mp4', 'images/migos.jpg', 0, 61);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`Admin_ID`);

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
-- Indexes for table `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_ID`);

--
-- Indexes for table `video_tbl`
--
ALTER TABLE `video_tbl`
  ADD PRIMARY KEY (`video_ID`),
  ADD KEY `user_ID` (`user_ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `Admin_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `catergory_tbl`
--
ALTER TABLE `catergory_tbl`
  MODIFY `catergory_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  MODIFY `comment_ID` int(10) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user_tbl`
--
ALTER TABLE `user_tbl`
  MODIFY `user_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;
--
-- AUTO_INCREMENT for table `video_tbl`
--
ALTER TABLE `video_tbl`
  MODIFY `video_ID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `comment_tbl`
--
ALTER TABLE `comment_tbl`
  ADD CONSTRAINT `user_comment` FOREIGN KEY (`user_ID`) REFERENCES `user_tbl` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `video_tbl`
--
ALTER TABLE `video_tbl`
  ADD CONSTRAINT `video` FOREIGN KEY (`user_ID`) REFERENCES `user_tbl` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
