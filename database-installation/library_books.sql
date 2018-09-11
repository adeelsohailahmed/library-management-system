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
-- Database: `library_books`
--

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE IF NOT EXISTS `book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `genre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `book_language` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `shelf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_copies` int(11) NOT NULL,
  `issued_copies` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `name`, `author`, `genre`, `book_language`, `shelf`, `total_copies`, `issued_copies`) VALUES
(1, 'Kuliyat e Patras', 'Patras Bokhari', 'Humour', 'Urdu', 'Literature / Fiction', 2, 2),
(2, 'Danny The Champion Of The World', 'Roald Dahl', 'Literature / Fiction', 'English', 'Literature / Fiction', 3, 3),
(3, 'Chalte Ho Toh Cheen Ko Chaliye', 'Ibne Insha', 'Humour / Satire', 'Urdu', 'Urdu Travelogues', 4, 2),
(4, 'Gone With The Wind', 'Margaret Mitchell', 'Literature / Fiction', 'English', 'English Classics', 8, 2),
(5, 'Aab e Gum', 'Mushtaq Ahmed Yusufi', 'Literature / Fiction', 'Urdu', 'Urdu Humour', 4, 2),
(6, 'War and Peace', 'Leo Tolstoy', 'Literature / Fiction', 'English', 'English Classics', 5, 2),
(7, '100 Lafzon Ki Kahani', 'Mubashir Ali Zaidi', 'Literature / Fiction', 'Urdu', 'Urdu Short Stories', 7, 0),
(8, 'Aap Se Kya Parda', 'Ibne Insha', 'Humour / Satire', 'Urdu', 'Urdu Travelogues', 12, 1);

-- --------------------------------------------------------

--
-- Table structure for table `issued`
--

DROP TABLE IF EXISTS `issued`;
CREATE TABLE IF NOT EXISTS `issued` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_id` int(11) NOT NULL,
  `book_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `author` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_520_ci NOT NULL,
  `shelf` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `issued_to` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `issued_to_cnic` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `return_date` date NOT NULL,
  `issued_by` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=32 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `issued`
--

INSERT INTO `issued` (`id`, `book_id`, `book_name`, `author`, `shelf`, `issued_to`, `issued_to_cnic`, `issue_date`, `return_date`, `issued_by`) VALUES
(10, 5, 'Aab e Gum', 'Mushtaq Ahmed Yusufi', 'Urdu Humour', 'Muhammad Ali', '4123805032692', '2018-07-03', '2018-07-10', 'Adeel'),
(12, 6, 'War and Peace', 'Leo Tolstoy', 'English Classics', 'Adeel Ahmed', '4220112342473', '2018-07-03', '2018-07-10', 'Adeel'),
(19, 6, 'War and Peace', 'Leo Tolstoy', 'English Classics', 'Muhammad Ali', '4123805032692', '2018-07-04', '2018-08-01', 'Adeel'),
(23, 3, 'Chalte Ho Toh Cheen Ko Chaliye', 'Ibne Insha', 'Urdu Travelogues', 'Muhammad Ali', '4123805032692', '2018-07-03', '2018-09-27', 'Adeel');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
