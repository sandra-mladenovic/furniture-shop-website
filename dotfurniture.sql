-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 07, 2020 at 02:54 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `flowerphp1`
--

-- --------------------------------------------------------

--
-- Table structure for table `answers`
--

CREATE TABLE `answers` (
  `idAnswer` int(255) NOT NULL,
  `answer` varchar(255) NOT NULL,
  `questionId` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `answers`
--

INSERT INTO `answers` (`idAnswer`, `answer`, `questionId`) VALUES
(1, 'Yes, i like all flowers', 1),
(2, 'Yes, but not all', 1),
(3, 'No', 1);

-- --------------------------------------------------------

--
-- Table structure for table `artical`
--

CREATE TABLE `artical` (
  `idArtical` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` int(255) NOT NULL,
  `src` varchar(200) NOT NULL,
  `idCat` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artical`
--

INSERT INTO `artical` (`idArtical`, `title`, `price`, `src`, `idCat`) VALUES
(6, 'Rialto Night Table', 180, 'bst1.jpg', 1),
(7, 'Rectangular Bedside Table', 159, 'bst2.jpg', 1),
(10, 'Wood And Glass Wordrobe', 529, 'w2.jpg', 1),
(11, 'Wooden Wordrobe ', 699, 'w3.jpg', 1),
(14, 'Farmhouse Lamp', 59, 'lamp.jpg', 2),
(15, 'Farmhouse Blue Lamp', 49, 'lamp1.jpg', 2),
(17, 'Wooden Lamp', 79, 'lamp2.jpg', 2),
(18, 'Gray Sofa ', 189, 'sofa.jpg', 2),
(19, 'Ektorp Sofa', 569, 'sofa1.jpg', 2),
(20, 'Hdmsund Sofa', 900, 'sofa2.jpg', 2),
(21, 'Black Leather Sofa', 1199, 'sofa3.jpg', 2),
(22, 'White Leather Sofa', 1299, 'sofa4.jpg', 2),
(24, 'Vase', 29, 'vase.jpg', 2),
(25, 'Wooden Chair ', 129, 'chair.jpg', 3),
(26, 'Rialto Chair ', 129, 'chair1.jpg', 3),
(27, 'Light White Chair', 119, 'chair2.jpg', 3),
(28, 'Dark wooden Chair', 179, 'chair3.jpg', 3),
(29, 'Rialto Wooden Chair', 159, 'chair4.jpg', 3),
(31, 'Black Chair', 99, 'chair6.jpg', 3),
(32, 'Wooden Dining Table', 599, 'pp1.jpg', 3),
(33, 'Farmhouse Dining Table', 659, 'pp2.jpg', 3),
(34, 'Maston Round Hazelnut', 899, 'pp3.jpg', 3),
(35, 'Bar Stool Oak', 149, 's1.jpg', 3),
(36, 'Danvers Bar Stool', 59, 's2.jpg', 3),
(37, 'Mani Plastic Bar Stool', 55, 's3.jpg', 3),
(38, 'Double Vanity Unit', 469, 'a1.jpg', 4),
(39, 'Double Wooden Vanity', 529, 'a2.jpg', 4),
(40, 'Wooden Vanity With Doors ', 359, 'a3.jpg', 4),
(41, 'Standing Bathtab', 499, 'm1.jpg', 4),
(42, 'Oval Bathtab', 699, 'm2.jpg', 4),
(43, 'Cast Iron Bathtab', 639, 'm3.jpg', 4),
(44, 'Eden Mirror', 219, 'n1.jpg', 4);

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `idCart` int(255) NOT NULL,
  `idArtical` int(255) NOT NULL,
  `idUser` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`idCart`, `idArtical`, `idUser`) VALUES
(27, 10, 14),
(32, 11, 14);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `idCat` int(10) NOT NULL,
  `catName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`idCat`, `catName`) VALUES
(1, 'Bedroom'),
(2, 'Living room'),
(3, 'Kitchen'),
(4, 'Bathroom');

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE `menu` (
  `idMenu` int(10) NOT NULL,
  `link` varchar(50) NOT NULL,
  `title` varchar(50) NOT NULL,
  `position` int(10) NOT NULL,
  `permission` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`idMenu`, `link`, `title`, `position`, `permission`) VALUES
(1, 'index.php', 'Home', 1, 0),
(2, 'articals.php', 'Shop', 2, 0),
(3, 'about.php', 'About us', 3, 0),
(4, 'contact.php', 'Contact', 4, 0),
(5, 'logout.php', 'Logout', 9, 1),
(6, 'admin.php', 'Admin', 6, 2),
(7, 'cart.php', 'Cart', 5, 4),
(9, 'login.php', 'Login', 8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `idQuestion` int(10) NOT NULL,
  `question` varchar(255) NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`idQuestion`, `question`, `active`) VALUES
(1, 'Do you like flowers?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `idRole` int(10) NOT NULL,
  `name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`idRole`, `name`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `idUser` int(10) NOT NULL,
  `firstName` varchar(50) NOT NULL,
  `lastName` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `passwordd` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL DEFAULT '2',
  `email` varchar(255) NOT NULL,
  `registerDate` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`idUser`, `firstName`, `lastName`, `username`, `passwordd`, `roleId`, `email`, `registerDate`) VALUES
(1, 'Pera ', 'Peric', '', '32febac3ba99d5338ee5d91027dd484d', 1, 'pera@gmail.com', '2019-03-19 16:51:34.622504'),
(2, 'Mika ', 'Mikic', '', 'b1bc92878d9c2eab43ccc6400586e59d', 2, 'mika@gmail.com', '2019-03-19 16:51:34.622504'),
(14, 'Anja ', 'Filipovic', '', '95b76901541ea8f4f7795eec8ac63673', 2, 'aki1998@live.com', '2019-03-19 16:52:20.525725'),
(15, 'Laza ', 'Lazic', '', '95b76901541ea8f4f7795eec8ac63673', 2, 'laza@laza.com', '2019-03-20 23:40:10.929222'),
(16, 'Sandra', 'Mladenovic', 'sandra123', '3fc5586bed4fb9f745500c0605197924', 2, 'sandra@sandra.com', '0000-00-00 00:00:00.000000'),
(17, 'Sandra', 'Mladenovi?', 'sandra', 'b1bc92878d9c2eab43ccc6400586e59d', 2, 'sandra@gmail.com', '0000-00-00 00:00:00.000000'),
(18, 'Sandra', 'Mladenovi', '', '8c2bd7cfbfaabd18abe6007106181942', 2, 'mladenovic@gmail.com', '2020-03-11 16:20:52.236411'),
(19, 'Tijana', 'Milik', '', 'f1dc735ee3581693489eaf286088b916', 2, 'tijana@gmail.com', '2020-03-11 16:30:15.753204'),
(20, 'Sandra', 'Mladenovi', '', 'bc5e09ce78458983e0278a32526bacfb', 2, 'mladenovicsandra@gmail.com', '2020-03-28 10:28:31.905753'),
(21, 'Sandra', 'Mladenovic', '', 'bc5e09ce78458983e0278a32526bacfb', 2, 'mladenovicsandraa@gmail.com', '2020-05-12 07:02:59.089408'),
(22, 'Sandra', 'Mladenovi', '', 'bc5e09ce78458983e0278a32526bacfb', 2, 'mladenovicaa@gmail.com', '2020-05-12 07:03:23.085244'),
(23, 'Milena', 'Markovic', '', '73eb148792ecb0325f72a3cc7f23d218', 2, 'milenamarkovic@gmail.com', '2020-06-15 21:01:09.255175'),
(24, 'Milenica', 'Markovic', '', '67f419c1ae55898a1fa3e7acfb0e5130', 2, 'milenica@gmail.com', '2020-07-01 21:30:03.661585'),
(25, 'Micko', 'Micko', '', '35e2f34ac32ab3d6805ce1690f1bb304', 2, 'micko@gmail.com', '2020-07-04 20:59:15.166206');

-- --------------------------------------------------------

--
-- Table structure for table `vote`
--

CREATE TABLE `vote` (
  `answerId` int(255) NOT NULL,
  `userId` int(255) NOT NULL,
  `voteTime` timestamp(6) NOT NULL DEFAULT CURRENT_TIMESTAMP(6) ON UPDATE CURRENT_TIMESTAMP(6),
  `idQuestion` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `vote`
--

INSERT INTO `vote` (`answerId`, `userId`, `voteTime`, `idQuestion`) VALUES
(1, 1, '2019-03-20 14:54:53.050518', 1),
(3, 1, '2019-03-20 15:12:33.805314', 1),
(2, 1, '2019-03-20 15:13:47.532476', 1),
(2, 1, '2019-03-20 15:14:50.453238', 1),
(2, 1, '2019-03-20 15:33:35.041408', 1),
(1, 14, '2019-03-20 19:23:09.489336', 1),
(3, 15, '2019-03-20 23:56:56.464621', 1),
(2, 15, '2019-03-21 00:08:34.977155', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`idAnswer`),
  ADD KEY `questionId` (`questionId`);

--
-- Indexes for table `artical`
--
ALTER TABLE `artical`
  ADD PRIMARY KEY (`idArtical`),
  ADD KEY `idCat` (`idCat`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`idCart`),
  ADD KEY `idArtical` (`idArtical`),
  ADD KEY `idUser` (`idUser`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`idCat`);

--
-- Indexes for table `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`idMenu`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`idQuestion`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`idRole`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`idUser`),
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `vote`
--
ALTER TABLE `vote`
  ADD KEY `answerId` (`answerId`,`userId`),
  ADD KEY `userId` (`userId`),
  ADD KEY `idQuestion` (`idQuestion`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `answers`
--
ALTER TABLE `answers`
  MODIFY `idAnswer` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `artical`
--
ALTER TABLE `artical`
  MODIFY `idArtical` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `idCart` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `idCat` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `menu`
--
ALTER TABLE `menu`
  MODIFY `idMenu` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `idQuestion` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `idRole` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `idUser` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_ibfk_1` FOREIGN KEY (`questionId`) REFERENCES `questions` (`idQuestion`);

--
-- Constraints for table `artical`
--
ALTER TABLE `artical`
  ADD CONSTRAINT `artical_ibfk_1` FOREIGN KEY (`idCat`) REFERENCES `category` (`idCat`);

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`idArtical`) REFERENCES `artical` (`idArtical`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`idUser`) REFERENCES `user` (`idUser`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `role` (`idRole`);

--
-- Constraints for table `vote`
--
ALTER TABLE `vote`
  ADD CONSTRAINT `vote_ibfk_1` FOREIGN KEY (`answerId`) REFERENCES `answers` (`idAnswer`),
  ADD CONSTRAINT `vote_ibfk_2` FOREIGN KEY (`userId`) REFERENCES `user` (`idUser`),
  ADD CONSTRAINT `vote_ibfk_3` FOREIGN KEY (`idQuestion`) REFERENCES `questions` (`idQuestion`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
