-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 10, 2020 at 12:05 PM
-- Server version: 8.0.21
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pdms`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`) VALUES
(1, 'admin', 'e8023f7986dda140bb5de0708e5e30f3');

-- --------------------------------------------------------

--
-- Table structure for table `booths`
--

CREATE TABLE `booths` (
  `booth_id` int NOT NULL,
  `booth_number` varchar(64) DEFAULT NULL,
  `booth_name` varchar(512) DEFAULT NULL,
  `booth_pass` varchar(32) NOT NULL DEFAULT '558992a7105235a58e0a07b928e6c020',
  `male_voters` int NOT NULL,
  `female_voters` int NOT NULL,
  `t_voters` int NOT NULL,
  `num_voters` int DEFAULT NULL,
  `subdist_id` int NOT NULL,
  `last_update` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `booths`
--

INSERT INTO `booths` (`booth_id`, `booth_number`, `booth_name`, `booth_pass`, `male_voters`, `female_voters`, `t_voters`, `num_voters`, `subdist_id`, `last_update`) VALUES
(1, '243', 'Karyakari Abhiyanta Sa.Ba.Vi.Parbhani, Yanche Kaksha,Room No.3,Parbhani\r\n', '558992a7105235a58e0a07b928e6c020', 905, 0, 0, 905, 5, '2020-11-10 10:10:53'),
(2, '244', 'Dr.Zakir Huassin Madhyamik wa Uchch Madhamik Mahavidyalaya,NortHighschool ide Khandoba Bazar Road,Room No.2,Parbhani', '558992a7105235a58e0a07b928e6c020', 831, 0, 0, 831, 5, '2020-11-10 09:08:23'),
(3, '245', ' Gandhi Vidyalaya,Room No.5,Krushi Sarthi Colony,Parbhani', '558992a7105235a58e0a07b928e6c020', 577, 0, 0, 577, 5, '2020-11-10 09:08:23'),
(4, '245 A', ' Gandhi Vidyalaya,Room No.2, Krushi Sarthi Colony,Parbhani', '558992a7105235a58e0a07b928e6c020', 388, 0, 0, 388, 5, '2020-11-10 09:08:23'),
(5, '246', 'Rajiv Gandhi Vidyalaya,Room No.2,Vikas Nagar,Karegaon Road,Parbhani.', '558992a7105235a58e0a07b928e6c020', 882, 0, 0, 882, 5, '2020-11-10 09:08:23'),
(6, '247', ' Bhartiya Balvidhya Mandir,Mamta Colony, Room No.2 Parbhani', '558992a7105235a58e0a07b928e6c020', 752, 0, 0, 752, 5, '2020-11-10 09:08:23'),
(7, '248', ' Sitaramji Mundada Marathwada Polytechnic Building No.1,Pravesh Dwar Sejari SoutHighschool ide Room No.4 Parbhani', '558992a7105235a58e0a07b928e6c020', 680, 0, 0, 680, 5, '2020-11-10 09:08:23'),
(8, '249', ' Udyashvar Prathamik Vidyalaya,Gandhi Park,Room No. 4, Parbhani', '558992a7105235a58e0a07b928e6c020', 698, 0, 0, 698, 5, '2020-11-10 09:08:23'),
(9, '250', ' Sharda MahavidyalayRoom No.3 Sarkari Davakhnyajaval,Parbhani', '558992a7105235a58e0a07b928e6c020', 675, 0, 0, 675, 5, '2020-11-10 09:08:23'),
(10, '251', 'Late Kamaltai Jamkar Mahila Mahavidyalaya,Room No.11, Jintur Road,Parbhani', '558992a7105235a58e0a07b928e6c020', 875, 0, 0, 875, 5, '2020-11-10 09:08:23'),
(11, '252', 'Late Raosaheb Jamkar Secenodary  and Higher Secondary School,Jintur Road,Room No.20 Parbhani', '558992a7105235a58e0a07b928e6c020', 455, 0, 0, 455, 5, '2020-11-10 09:08:23'),
(12, '253', 'Sumantai Gavhane Vidyalaya,Varma Nagar,Room No.4,Parbhani.', '558992a7105235a58e0a07b928e6c020', 483, 0, 0, 483, 5, '2020-11-10 09:08:23'),
(13, '254', 'Dnyanopasak College  Room No.1 ,Jintur Road Parbhani', '558992a7105235a58e0a07b928e6c020', 499, 0, 0, 499, 5, '2020-11-10 09:08:23'),
(14, '255', 'Kamgar Kalyan Kendra (Lalit Kala Bhavan),Kadrabad Plot Room No.2 Parbhani ', '558992a7105235a58e0a07b928e6c020', 417, 0, 0, 417, 5, '2020-11-10 09:08:23'),
(15, '256', 'Shivaji Mahavidyalaya,Room No.3 Vasmat Road,Parbhani', '558992a7105235a58e0a07b928e6c020', 691, 0, 0, 691, 5, '2020-11-10 09:08:23'),
(16, '256 A', 'Shivaji Mahavidyalaya,Room No.5 Vasmat Road,Parbhani', '558992a7105235a58e0a07b928e6c020', 630, 0, 0, 630, 5, '2020-11-10 09:08:23'),
(17, '257', 'Zilha Parshad Girls School,Station Road,Room No.3, Parbhani\r\n', '558992a7105235a58e0a07b928e6c020', 805, 0, 0, 805, 5, '2020-11-10 09:08:23'),
(18, '258', 'Zilha Parishad Primary School,Room No.2, Singnapur', '558992a7105235a58e0a07b928e6c020', 198, 0, 0, 198, 5, '2020-11-10 09:08:23'),
(19, '259', 'Zilha Parishad Primary School,Room No.2, Daithana', '558992a7105235a58e0a07b928e6c020', 365, 0, 0, 365, 5, '2020-11-10 09:08:23'),
(20, '260', 'Zilha Parishad Girls School,Room No.5,Zari', '558992a7105235a58e0a07b928e6c020', 237, 0, 0, 237, 5, '2020-11-10 09:08:23'),
(21, '261', 'Zilha Parishad Primary School,Room No.2, Pedgaon', '558992a7105235a58e0a07b928e6c020', 109, 0, 0, 109, 5, '2020-11-10 09:08:23'),
(22, '262', 'Zilha Parishad Primary School,Room No.4  Pingali', '558992a7105235a58e0a07b928e6c020', 253, 0, 0, 253, 5, '2020-11-10 09:08:23'),
(23, '263', 'Zilha Parishad Primary School,Room No.2, Takli Kumbhkarn', '558992a7105235a58e0a07b928e6c020', 191, 0, 0, 191, 5, '2020-11-10 09:08:23'),
(24, '264', 'Zilha Parishad Primary School,Room No.2,Jamb', '558992a7105235a58e0a07b928e6c020', 334, 0, 0, 334, 5, '2020-11-10 09:08:23'),
(25, '265', 'Tahesil Office , Meeting Hall-1 Palam', '558992a7105235a58e0a07b928e6c020', 457, 0, 0, 457, 4, '2020-11-10 09:08:23'),
(26, '266', 'Zilha Parishad H. Palam Room No. 1', '558992a7105235a58e0a07b928e6c020', 259, 0, 0, 259, 4, '2020-11-10 09:08:23'),
(27, '267', 'Swami  Vivekanad Jr.Colleg .Chatori Tq.Palam  Room no. 3', '558992a7105235a58e0a07b928e6c020', 248, 0, 0, 248, 4, '2020-11-10 09:08:23'),
(28, '268', 'ZP Highschool  PetHighschool hivani Room No. 1', '558992a7105235a58e0a07b928e6c020', 224, 0, 0, 224, 4, '2020-11-10 09:08:23'),
(29, '269', 'Zilha Parishad Primary School.Ravarajur Room no. 1', '558992a7105235a58e0a07b928e6c020', 188, 0, 0, 188, 4, '2020-11-10 09:08:23'),
(30, '270', 'Zilha Parishad Primary School.Banavas Room no. 2', '558992a7105235a58e0a07b928e6c020', 199, 0, 0, 199, 4, '2020-11-10 09:08:23'),
(31, '271', 'Tahsil Office, Purna Room No.1', '558992a7105235a58e0a07b928e6c020', 475, 0, 0, 475, 7, '2020-11-10 09:08:23'),
(32, '272', 'Tahsil Office, Purna Room No.2', '558992a7105235a58e0a07b928e6c020', 702, 0, 0, 702, 7, '2020-11-10 09:08:23'),
(33, '273', 'Zilha Parishad Primary School. Tadkalas Room No. 01', '558992a7105235a58e0a07b928e6c020', 213, 0, 0, 213, 7, '2020-11-10 09:08:23'),
(34, '274', 'Zilha Parishad Primary School. Chudawa Room No. 01', '558992a7105235a58e0a07b928e6c020', 219, 0, 0, 219, 7, '2020-11-10 09:08:23'),
(35, '275', 'Zilha Parishad Primary School. Limla Room No. 01', '558992a7105235a58e0a07b928e6c020', 194, 0, 0, 194, 7, '2020-11-10 09:08:23'),
(36, '276', 'Zilha Parishad Primary School. Kawalgaon Room No. 01', '558992a7105235a58e0a07b928e6c020', 280, 0, 0, 280, 7, '2020-11-10 09:08:23'),
(37, '277', 'Zilha Parishad Primary School. Katneshwar Room No. 01', '558992a7105235a58e0a07b928e6c020', 266, 0, 0, 266, 7, '2020-11-10 09:08:23'),
(38, '278', 'Tahsildar Room-1 Tahsil Office, Gangakhed', '558992a7105235a58e0a07b928e6c020', 851, 0, 0, 851, 1, '2020-11-10 09:08:23'),
(39, '279', 'Kai.Vankatrao (Patil) Shinde Pet Pimpalgavkar Sabhagrah.-1 Panchayet Samiti, Gangakhed ', '558992a7105235a58e0a07b928e6c020', 676, 0, 0, 676, 1, '2020-11-10 09:08:23'),
(40, '280', 'Tahsil Office Sabhagrah -1 Gangakhed', '558992a7105235a58e0a07b928e6c020', 502, 0, 0, 502, 1, '2020-11-10 09:08:23'),
(41, '281', 'Zilha Parishad Prashala Ranisavargaon  Room No.01', '558992a7105235a58e0a07b928e6c020', 365, 0, 0, 365, 1, '2020-11-10 09:08:23'),
(42, '282', 'Zilha Parishad Primary Schoolchool Makhani  Room No.01', '558992a7105235a58e0a07b928e6c020', 306, 0, 0, 306, 1, '2020-11-10 09:08:23'),
(43, '283', 'Zilha Parishad Primary School Pimapldari  Room No.01', '558992a7105235a58e0a07b928e6c020', 310, 0, 0, 310, 1, '2020-11-10 09:08:23'),
(44, '284', 'Zilha Parishad Primary Schoolchool  Mahatpuri   Room No.01', '558992a7105235a58e0a07b928e6c020', 402, 0, 0, 402, 1, '2020-11-10 09:08:23'),
(45, '285', 'Tahsil Office Room No 1 Sonpeth', '558992a7105235a58e0a07b928e6c020', 822, 0, 0, 822, 9, '2020-11-10 09:08:23'),
(46, '286', 'Zilha Parishad PRA.Shalgaon Room No.01', '558992a7105235a58e0a07b928e6c020', 117, 0, 0, 117, 9, '2020-11-10 09:08:23'),
(47, '287', 'Zilha Parishad PRA.Wadgaon Room No.01', '558992a7105235a58e0a07b928e6c020', 161, 0, 0, 161, 9, '2020-11-10 09:08:23'),
(48, '288', 'Zilha Parishad PRA.Awalgaon Room No.01', '558992a7105235a58e0a07b928e6c020', 149, 0, 0, 149, 9, '2020-11-10 09:08:23'),
(49, '289', 'Nutan Mahavidhyal Selu Room No.01', '558992a7105235a58e0a07b928e6c020', 673, 0, 0, 673, 8, '2020-11-10 09:08:23'),
(50, '290', 'Minority Government Girl\'s hostel Gulmohar Colony Selu Room No.01', '558992a7105235a58e0a07b928e6c020', 599, 0, 0, 599, 8, '2020-11-10 09:08:23'),
(51, '291', 'Tehsil Office Meeting Hall  Room No 01, Selu', '558992a7105235a58e0a07b928e6c020', 572, 0, 0, 572, 8, '2020-11-10 09:08:23'),
(52, '292', 'Zilha Parishad Primary School. School Deulgaon Gat Room No. 01', '558992a7105235a58e0a07b928e6c020', 239, 0, 0, 239, 8, '2020-11-10 09:08:23'),
(53, '293', 'Dnyanouasak Vidhylay Kupta Room No. 01', '558992a7105235a58e0a07b928e6c020', 120, 0, 0, 120, 8, '2020-11-10 09:08:23'),
(54, '294', 'Zilha Parishad Primary School. SchoolWalur Room No. 01', '558992a7105235a58e0a07b928e6c020', 188, 0, 0, 188, 8, '2020-11-10 09:08:23'),
(55, '295', 'Zilha Parishad Primary School. School Moregaon  Room No. 01', '558992a7105235a58e0a07b928e6c020', 102, 0, 0, 102, 8, '2020-11-10 09:08:23'),
(56, '296', 'Zilha Parishad Primary School. School Chikhalathana Bk. Room No. 01', '558992a7105235a58e0a07b928e6c020', 171, 0, 0, 171, 8, '2020-11-10 09:08:23'),
(57, '297', 'G. P. Pra. Shala Devanandra Sakhar Karakhana vasahat Room no.1', '558992a7105235a58e0a07b928e6c020', 321, 0, 0, 321, 6, '2020-11-10 09:08:23'),
(58, '298', 'Jilha Parishad ,madhyamik Shala purv baju  Room No.6  Pathari', '558992a7105235a58e0a07b928e6c020', 510, 0, 0, 510, 6, '2020-11-10 09:08:23'),
(59, '299', 'Netaji Subhash Chandra Vidhyalay Navin Imarat ,purv Baju Pathari  Room no.1', '558992a7105235a58e0a07b928e6c020', 338, 0, 0, 338, 6, '2020-11-10 09:08:23'),
(60, '300', 'Jilha Parishad Prathamik Dakshin Baju 1 Shala Babhalagav', '558992a7105235a58e0a07b928e6c020', 307, 0, 0, 307, 6, '2020-11-10 09:08:23'),
(61, '301', 'G. P. Pra. Shala Dakshin Baju KasapuriRoom no.1', '558992a7105235a58e0a07b928e6c020', 211, 0, 0, 211, 6, '2020-11-10 09:08:23'),
(62, '302', 'Zilha Parishad Primary School. WestPart Hadgaon Bu. Room no.2', '558992a7105235a58e0a07b928e6c020', 202, 0, 0, 202, 6, '2020-11-10 09:08:23'),
(63, '303', 'Revenue Hall-1  Tahsil Office Jintur', '558992a7105235a58e0a07b928e6c020', 421, 0, 0, 421, 2, '2020-11-10 09:08:23'),
(64, '304', 'Meeting Hall-1 Tahsil Office Jintur', '558992a7105235a58e0a07b928e6c020', 578, 0, 0, 578, 2, '2020-11-10 09:08:23'),
(65, '305', 'Panchayat Samiti Hall-1 Jintur', '558992a7105235a58e0a07b928e6c020', 390, 0, 0, 390, 2, '2020-11-10 09:08:23'),
(66, '306', 'Zilha Parishad Primary School Sawangi Mhalsa Room No. 1', '558992a7105235a58e0a07b928e6c020', 350, 0, 0, 350, 2, '2020-11-10 09:08:23'),
(67, '307', 'Zilha Parishad Kendriya Primary Girls  School Bori Room No. 1', '558992a7105235a58e0a07b928e6c020', 351, 0, 0, 351, 2, '2020-11-10 09:08:23'),
(68, '308', 'Zilha Parishad Highschool Chaarthana Room No. 1', '558992a7105235a58e0a07b928e6c020', 275, 0, 0, 275, 2, '2020-11-10 09:08:23'),
(69, '309', 'Zilha Parishad Primary School Aadgaon Bazar Room No. 1', '558992a7105235a58e0a07b928e6c020', 190, 0, 0, 190, 2, '2020-11-10 09:08:23'),
(70, '310', 'Zilha Parishad Primary School Dudhgaon Room No. 1', '558992a7105235a58e0a07b928e6c020', 364, 0, 0, 364, 2, '2020-11-10 09:08:23'),
(71, '311', 'Zilha Parishad Primary School Waghi Dhanora Room No. 1', '558992a7105235a58e0a07b928e6c020', 140, 0, 0, 140, 2, '2020-11-10 09:08:23'),
(72, '312', 'Zilha Parishad Primary School Bamani bu. Room No. 1', '558992a7105235a58e0a07b928e6c020', 218, 0, 0, 218, 2, '2020-11-10 09:08:23'),
(73, '313', 'Muncipal Council Building Room No. 1, Manwat', '558992a7105235a58e0a07b928e6c020', 604, 0, 0, 604, 3, '2020-11-10 09:08:23'),
(74, '400', 'Tahsil Office,Meeting Hall No. 1, Manwat', '558992a7105235a58e0a07b928e6c020', 400, 0, 0, 400, 3, '2020-11-10 09:08:23'),
(75, '315', 'Zilha Parishad Primary School.school Kekarjavala Room No.1', '558992a7105235a58e0a07b928e6c020', 136, 0, 0, 136, 3, '2020-11-10 09:08:23'),
(76, '316', 'Zilha Parishad Primary School.school Tadborgaon Room No.1', '558992a7105235a58e0a07b928e6c020', 125, 0, 0, 125, 3, '2020-11-10 09:08:23'),
(77, '317', 'Zilha Parishad Primary School.school Rampuri Bu Room No.1', '558992a7105235a58e0a07b928e6c020', 123, 0, 0, 123, 3, '2020-11-10 09:08:23'),
(78, '318', 'Zilha Parishad Primary School.school Kolha Room No.1', '558992a7105235a58e0a07b928e6c020', 204, 0, 0, 204, 3, '2020-11-10 09:08:23');

-- --------------------------------------------------------

--
-- Table structure for table `slot_1`
--

CREATE TABLE `slot_1` (
  `rp_id` int UNSIGNED NOT NULL,
  `booth_id` int NOT NULL,
  `male_voters` int NOT NULL,
  `fmale_voters` int NOT NULL,
  `t_voters` int NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slot_2`
--

CREATE TABLE `slot_2` (
  `rp_id` int UNSIGNED NOT NULL,
  `booth_id` int NOT NULL,
  `male_voters` int NOT NULL,
  `fmale_voters` int NOT NULL,
  `t_voters` int NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slot_3`
--

CREATE TABLE `slot_3` (
  `rp_id` int UNSIGNED NOT NULL,
  `booth_id` int NOT NULL,
  `male_voters` int NOT NULL,
  `fmale_voters` int NOT NULL,
  `t_voters` int NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slot_4`
--

CREATE TABLE `slot_4` (
  `rp_id` int UNSIGNED NOT NULL,
  `booth_id` int NOT NULL,
  `male_voters` int NOT NULL,
  `fmale_voters` int NOT NULL,
  `t_voters` int NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `slot_5`
--

CREATE TABLE `slot_5` (
  `rp_id` int UNSIGNED NOT NULL,
  `booth_id` int NOT NULL,
  `male_voters` int NOT NULL,
  `fmale_voters` int NOT NULL,
  `t_voters` int NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subdistricts`
--

CREATE TABLE `subdistricts` (
  `subdist_id` int NOT NULL,
  `name` varchar(45) NOT NULL,
  `password` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subdistricts`
--

INSERT INTO `subdistricts` (`subdist_id`, `name`, `password`) VALUES
(1, 'Gangakhed', 'd05deb9570ca05f1d0c210186acfe008'),
(2, 'Jintur', 'd05deb9570ca05f1d0c210186acfe008'),
(3, 'Manwath', 'd05deb9570ca05f1d0c210186acfe008'),
(4, 'Palam', 'd05deb9570ca05f1d0c210186acfe008'),
(5, 'Parbhani', '8524ba264cf7d83c2695487bd1ab5be3'),
(6, 'Pathari', 'd05deb9570ca05f1d0c210186acfe008'),
(7, 'Purna', 'd05deb9570ca05f1d0c210186acfe008'),
(8, 'Selu', 'd05deb9570ca05f1d0c210186acfe008'),
(9, 'Sonpeth', 'd05deb9570ca05f1d0c210186acfe008');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`),
  ADD UNIQUE KEY `username_UNIQUE` (`username`),
  ADD UNIQUE KEY `password_UNIQUE` (`password`);

--
-- Indexes for table `booths`
--
ALTER TABLE `booths`
  ADD PRIMARY KEY (`booth_id`,`subdist_id`),
  ADD UNIQUE KEY `booth_number` (`booth_number`,`booth_name`),
  ADD KEY `fk_booths_subdistricts_idx` (`subdist_id`);

--
-- Indexes for table `slot_1`
--
ALTER TABLE `slot_1`
  ADD PRIMARY KEY (`rp_id`),
  ADD UNIQUE KEY `booth_id` (`booth_id`);

--
-- Indexes for table `slot_2`
--
ALTER TABLE `slot_2`
  ADD PRIMARY KEY (`rp_id`),
  ADD UNIQUE KEY `booth_id` (`booth_id`);

--
-- Indexes for table `slot_3`
--
ALTER TABLE `slot_3`
  ADD PRIMARY KEY (`rp_id`),
  ADD UNIQUE KEY `booth_id` (`booth_id`);

--
-- Indexes for table `slot_4`
--
ALTER TABLE `slot_4`
  ADD PRIMARY KEY (`rp_id`),
  ADD UNIQUE KEY `booth_id` (`booth_id`);

--
-- Indexes for table `slot_5`
--
ALTER TABLE `slot_5`
  ADD PRIMARY KEY (`rp_id`),
  ADD UNIQUE KEY `booth_id` (`booth_id`);

--
-- Indexes for table `subdistricts`
--
ALTER TABLE `subdistricts`
  ADD PRIMARY KEY (`subdist_id`),
  ADD UNIQUE KEY `idtable1_UNIQUE` (`subdist_id`),
  ADD UNIQUE KEY `name_UNIQUE` (`name`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booths`
--
ALTER TABLE `booths`
  MODIFY `booth_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `slot_1`
--
ALTER TABLE `slot_1`
  MODIFY `rp_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slot_2`
--
ALTER TABLE `slot_2`
  MODIFY `rp_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slot_3`
--
ALTER TABLE `slot_3`
  MODIFY `rp_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slot_4`
--
ALTER TABLE `slot_4`
  MODIFY `rp_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `slot_5`
--
ALTER TABLE `slot_5`
  MODIFY `rp_id` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subdistricts`
--
ALTER TABLE `subdistricts`
  MODIFY `subdist_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booths`
--
ALTER TABLE `booths`
  ADD CONSTRAINT `fk_booths_subdistricts` FOREIGN KEY (`subdist_id`) REFERENCES `subdistricts` (`subdist_id`);

--
-- Constraints for table `slot_1`
--
ALTER TABLE `slot_1`
  ADD CONSTRAINT `slot_1_ibfk_1` FOREIGN KEY (`booth_id`) REFERENCES `booths` (`booth_id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
