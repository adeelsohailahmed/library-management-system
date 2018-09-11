-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 05, 2018 at 01:17 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library_users`
--

-- --------------------------------------------------------

--
-- Table structure for table `librarians`
--

DROP TABLE IF EXISTS `librarians`;
CREATE TABLE IF NOT EXISTS `librarians` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Auto generated unique user id',
  `user_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Name of user',
  `email` varchar(225) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Unique email addresses',
  `password_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'hashes of the passwords Entered by the users',
  `account_activated` tinyint(1) NOT NULL COMMENT 'Whether an account is active or not',
  `activation_hash` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'Activation Hash generated for activating account',
  PRIMARY KEY (`id`),
  UNIQUE KEY `EMAIL` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `librarians`
--

INSERT INTO `librarians` (`id`, `user_name`, `email`, `password_hash`, `account_activated`, `activation_hash`) VALUES
(1, 'Adeel', 'adeel@example.com', '$2y$10$XdNry6zqu4vcuSJDH.eev.VPgtrghUzmxuQdzfI9WOIdPBx5p81f.', 1, 'activated_by_default'),
(2, 'Muhammad Ali', 'info@example.com', '$2y$10$MSeVsE1NulxqGWOFr4J0lumtAGbAcw8XVT/iV5vcFHe3/0yXOGB1W', 1, 'activated_by_default'),
(23, 'Syed Ali', 'i_am_cool_boy@live.com', '$2y$10$PZurryJ3JgVd0JlGoxMShelpgBGLVm7Edfa.aWOs6J/5s3W1tDQY.', 1, 'e3c5450ffaf4b6ece6c69bbe42d57f05');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

DROP TABLE IF EXISTS `members`;
CREATE TABLE IF NOT EXISTS `members` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cnic` varchar(15) CHARACTER SET utf16 COLLATE utf16_unicode_ci NOT NULL,
  `registration_date` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `CNIC` (`cnic`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `cnic`, `registration_date`) VALUES
(1, 'Adeel Ahmed', '4220112342473', '2018-07-17'),
(2, 'Muhammad Ali', '4123805032692', '2012-05-03'),
(3, 'Muzammil Ahmed', '4220132658913', '2018-05-20'),
(5, 'Muzaffar Uddin', '5465421324657', '2018-05-30');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
