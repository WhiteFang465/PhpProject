-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2022 at 12:13 AM
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
CREATE TABLE `favorites` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `favorite_persons_user_id` int(11) NOT NULL,
  `added` tinyint(1) NOT NULL,
  `removed` tinyint(1) NOT NULL,
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
CREATE TABLE `message` (
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `message` varchar(500) NOT NULL,
  `sent_time` datetime NOT NULL DEFAULT current_timestamp(),
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
CREATE TABLE `preferences` (
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
CREATE TABLE `user` (
  `id` int(11) NOT NULL,
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
  `drinks` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `first_name`, `last_name`, `gender`, `age`, `email`, `password`, `mobile_number`, `profile_pictures`, `images`, `premium`, `smokes`, `drinks`) VALUES
(4, 'Aiony', 'Haust', 'F', 25, 'aiony_haust@gmail.com', '1234321', '5145625665', 'aiony-haust.jpg', 'aiony-haust.jpg', 1, 0, 1),
(5, 'Aleksandr', 'Minakov', 'F', 27, 'aleksandr-minakov@gmail.com', '1234321', '4534526154', 'aleksandr-minakov.jpg', 'aleksandr-minakov.jpg', 0, 1, 1),
(6, 'Alexander', 'Hipp', 'M', 23, 'alexander-hipp@gmail.com', '1234321', '3425146345', 'alexander-hipp.jpg', 'alexander-hipp.jpg', 1, 1, 0),
(7, 'Amir', 'Mohammad', 'M', 28, 'amir-mohammad@gmail.com', '1234321', '5645635625', 'amir-mohammad.jpg', 'amir-mohammad.jpg', 0, 1, 1),
(8, 'Christian', 'Buehner', 'O', 26, 'christian-buehner@gmail.com', '1234321', '5645635625', 'christian-buehner.jpg', 'christian-buehner.jpg', 0, 1, 1),
(9, 'Christina', 'Wocintechchat', 'F', 23, 'christina-wocintechchat@gmail.com', '1234321', '5455265282', 'christina-wocintechchat.jpg', 'christina-wocintechchat.jpg', 1, 0, 0),
(10, 'Courtney', 'Cook', 'O', 25, 'courtney-cook@gmail.com', '1234321', '5463546351', 'courtney-cook.jpg', 'courtney-cook.jpg', 1, 1, 1),
(11, 'Craig', 'Mckay', 'M', 36, 'craig-mckay@gmail.com', '1234321', '5645365463', 'craig-mckay.jpg', 'craig-mckay.jpg', 1, 0, 1),
(12, 'Dahiana', 'Waszaj', 'F', 27, 'dahiana-waszaj@gmail.com', '1234321', '4534534562', 'dahiana-waszaj.jpg', 'dahiana-waszaj.jpg', 1, 1, 1),
(13, 'Erik', 'Lucatero', 'O', 24, 'erik-lucatero@gmail.com', '1234321', '5645364536', 'erik-lucatero.jpg', 'erik-lucatero.jpg', 1, 0, 0),
(14, 'Jake', 'Nackos', 'F', 40, 'jake-nackos@gmail.com', '1234321', '5638764862', 'jake-nackos.jpg', 'jake-nackos.jpg', 0, 0, 0),
(15, 'Jimmy', 'Fermin', 'O', 29, 'jimmy-fermin@gmail.com', '1234321', '5463564563', 'jimmy-fermin.jpg', 'jimmy-fermin.jpg', 1, 1, 1),
(16, 'Joel', 'Mott', 'F', 56, 'joel-mott@gmail.com', '1234321', '6574657467', 'joel-mott.jpg', 'joel-mott.jpg', 0, 1, 1),
(17, 'Jonathan', 'Borba', 'O', 56, 'jonathan-borba@gmail.com', '1234321', '2453452453', 'jonathan-borba.jpg', 'jonathan-borba.jpg', 1, 1, 1),
(18, 'Joseph', 'Gonzalez', 'M', 31, 'joseph-gonzalez', '1234321', '6574657467', 'joseph-gonzalez.jpg', 'joseph-gonzalez.jpg', 0, 1, 1),
(19, 'Jota', 'Lao', 'O', 38, 'jota-lao@gmail.com', '1234321', '56456356745', 'jota-lao.jpg', 'jota-lao.jpg', 0, 0, 1),
(20, 'Juan', 'Encalada', 'M', 48, 'juan-encalada@gmail.com', '1234321', '5647637467', 'juan-encalada.jpg', 'juan-encalada.jpg', 1, 1, 1),
(21, 'Jurica', 'Koletic', 'O', 49, 'jurica-koletic@gmail.com', '1234321', '5463764767', 'jurica-koletic.jpg', 'jurica-koletic.jpg', 1, 1, 1),
(22, 'Leilani', 'Angel', 'M', 36, 'angel@gmail.com', '1234321', '5647637645', 'leilani-angel.jpg', 'leilani-angel.jpg', 1, 1, 1),
(23, 'Matheus', 'Ferrero', 'F', 21, 'matheus-ferrero@gmail.com', '1234321', '564736476', 'matheus-ferrero.jpg', 'matheus-ferrero.jpg', 0, 1, 1),
(24, 'Michael', 'Dam', 'O', 42, 'michael-dam@gmail.com', '1234321', '6536746732', 'michael-dam.jpg', 'michael-dam.jpg', 1, 1, 1),
(25, 'Nico', 'Marks', 'O', 39, 'nico-marks@gmail.com', '1234321', '5467365465', 'nico-marks.jpg', 'nico-marks.jpg', 0, 1, 1),
(26, 'Oliver', 'Johnson', 'F', 62, 'oliver-johnson@gmail.com', '1234321', '567676256', 'oliver-johnson.jpg', 'oliver-johnson.jpg', 1, 1, 1),
(27, 'Ospan', 'Ali', 'F', 16, 'ospan-ali@gmail.com', '1234321', '5647637648', 'ospan-ali.jpg', 'ospan-ali.jpg', 1, 1, 1),
(28, 'Radu', 'Florin', 'M', 26, 'radu-florin@gmail.com', '1234321', '5647638733', 'radu-florin.jpg', 'radu-florin.jpg', 0, 0, 1),
(29, 'Taylor', 'Hernandez', 'F', 36, 'hernandez@gmail.com', '1234321', '5645635645', 'taylor-hernandez.jpg', 'taylor-hernandez.jpg', 1, 1, 1),
(30, 'Vince', 'Fleming', 'M', 56, 'vince-fleming@gmail.com', '1234321', '4536473832', 'vince-fleming.jpg', 'vince-fleming.jpg', 1, 1, 1),
(31, 'Alyona', 'Grishina', 'O', 26, 'alyona-grishina@gmail.com', '1234321', '4565465376', 'alyona-grishina.jpg', 'alyona-grishina.jpg', 1, 1, 1),
(32, 'Austin', 'Wade', 'M', 36, 'austin-wade@gmail.com', '1234321', '4563762787', 'austin-wade.jpg', 'austin-wade.jpg', 0, 1, 1),
(33, 'Ayo', 'Ogunseinde', 'F', 25, 'ayo-ogunseinde@gmail.com', '1234321', '4563562563', 'ayo-ogunseinde.jpg', 'ayo-ogunseinde.jpg', 1, 0, 0),
(34, 'Christian', 'Buehner', 'M', 36, 'christian-buehne@gmail.com', '1234321', '6378467822', 'christian-buehne.jpg', 'christian-buehne.jpg', 1, 1, 1),
(35, 'Conor', 'Obrien', 'F', 27, 'conor-obrien@gmail.com', '1234321', '6478378476', 'conor-obrien.jpg', 'conor-obrien.jpg', 1, 1, 1),
(36, 'Jassir', 'Jonis', 'M', 38, 'jassir-jonis@gmail.com', '1234321', '5478376490', 'jassir-jonis.jpg', 'jassir-jonis.jpg', 1, 0, 0),
(37, 'Julian', 'Wan', 'M', 28, 'julian-wan@gmail.com', '1234321', '67368497267', 'julian-wan.jpg', 'julian-wan.jpg', 1, 1, 1),
(38, 'Ludvig', 'Wiese', 'M', 54, 'ludvig-wiese@gmsil.com', '1234321', '7467587493', 'ludvig-wiese.jpg', 'ludvig-wiese.jpg', 0, 1, 1),
(39, 'Mateus', 'Campos', 'O', 31, 'mateus-campos@gmail', '1234321', '5463547354', 'mateus-campos.jpg', 'mateus-campos.jpg', 1, 1, 1),
(40, 'Omid', 'Armin', 'F', 24, 'omid-armin@gmail.com', '1234321', '5463746378', 'omid-armin.jpg', 'omid-armin.jpg', 0, 1, 1),
(41, 'Reza', 'Biazar', 'M', 31, 'reza-biazar@gmail.com', '1234321', '4524615423', 'reza-biazar.jpg', 'reza-biazar.jpg', 1, 0, 1),
(42, 'Sam', 'Burriss', 'F', 26, 'sam-burriss@gmail.com', '1234321', '5647658723', 'sam-burriss.jpg', 'sam-burriss.jpg', 1, 1, 1),
(43, 'Stefan', 'Stefancik', 'F', 19, 'stefan-stefancik', '1234321', '564524127', 'stefan-stefancik.jpg', 'stefan-stefancik.jpg', 1, 1, 1),
(44, 'Timothy', 'Barlin', 'M', 29, 'timothy-barlin@gmail.com', '1234321', '5645676545', 'timothy-barlin.jpg', 'timothy-barlin.jpg', 1, 0, 0),
(45, 'Vinicius', 'Amnx', 'M', 28, 'vinicius-amnx@gmail.com', '1234321', '5656415432', 'vinicius-amnx.jpg', 'vinicius-amnx.jpg', 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `wink`
--

DROP TABLE IF EXISTS `wink`;
CREATE TABLE `wink` (
  `from_user_id` int(11) NOT NULL,
  `to_user_id` int(11) NOT NULL,
  `sent_time` datetime NOT NULL DEFAULT current_timestamp(),
  `is_read` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wink`
--

INSERT INTO `wink` (`from_user_id`, `to_user_id`, `sent_time`, `is_read`) VALUES
(3, 2, '2022-03-07 02:44:52', 0),
(2, 1, '2022-03-07 02:44:52', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
