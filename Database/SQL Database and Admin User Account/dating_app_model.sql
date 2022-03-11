-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2022 at 01:22 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dating_app_model`
--
CREATE DATABASE IF NOT EXISTS `dating_app_model` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `dating_app_model`;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

DROP TABLE IF EXISTS `favorites`;
CREATE TABLE IF NOT EXISTS `favorites` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `favorite_persons_user_id` int(11) NOT NULL,
  `added` tinyint(1) NOT NULL,
  `removed` tinyint(1) NOT NULL,
  `is_read` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`id`, `user_id`, `favorite_persons_user_id`, `added`, `removed`, `is_read`) VALUES
(1, 2, 3, 1, 0, 0),
(2, 3, 2, 0, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

DROP TABLE IF EXISTS `message`;
CREATE TABLE IF NOT EXISTS `message` (
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `sent_time` datetime NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`from_user_id`, `to_user_id`, `message`, `sent_time`, `is_read`) VALUES
(1, 2, 'Hi Martha', '2022-03-07 02:42:42', 0),
(2, 1, 'Hello John', '2022-03-07 02:42:42', 1);

-- --------------------------------------------------------

--
-- Table structure for table `preferences`
--

DROP TABLE IF EXISTS `preferences`;
CREATE TABLE IF NOT EXISTS `preferences` (
  `user_id` int(11) NOT NULL,
  `age_upper_limit` int(11) NOT NULL,
  `age_lower_limit` int(11) NOT NULL,
  `interested_in_male` tinyint(1) NOT NULL,
  `interested_in_female` tinyint(1) NOT NULL,
  `smoker` tinyint(1) NOT NULL,
  `drinker` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `preferences`
--

INSERT INTO `preferences` (`user_id`, `age_upper_limit`, `age_lower_limit`, `interested_in_male`, `interested_in_female`, `smoker`, `drinker`) VALUES
(2, 50, 23, 1, 1, 1, 0),
(1, 30, 15, 0, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` enum('M','F','O') NOT NULL,
  `age` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(255) NOT NULL,
  `profile_pictures` varchar(255) NOT NULL,
  `images` varchar(500) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `smokes` tinyint(1) NOT NULL,
  `drinks` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `gender`, `age`, `email`, `password`, `mobile_number`, `profile_pictures`, `images`, `premium`, `smokes`, `drinks`) VALUES
(1, 'John', 'Matheau', 'M', 25, 'john.matheau19@gmail.com', 'John@123#', '5143835758', '', '', 0, 1, 0),
(2, 'Martha', 'Reddy', 'F', 30, 'martha.reddy34@gmail.com', 'Martha@123#', '5143835756', '', '', 1, 1, 1),
(3, 'Arturo', 'Danny', 'O', 45, 'arturo.danny22@gmail.com', 'Arturo@123#', '4533835756', '', '', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wink`
--

DROP TABLE IF EXISTS `wink`;
CREATE TABLE IF NOT EXISTS `wink` (
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `sent_time` datetime NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wink`
--

INSERT INTO `wink` (`from_user_id`, `to_user_id`, `sent_time`, `is_read`) VALUES
(3, 2, '2022-03-07 02:44:52', 0),
(2, 1, '2022-03-07 02:44:52', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
