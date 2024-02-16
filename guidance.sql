-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 17, 2024 at 11:45 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `guidance`
--

-- --------------------------------------------------------

--
-- Table structure for table `login_db`
--

CREATE TABLE `login_db` (
  `ID` int(11) NOT NULL,
  `emailaddress` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login_db`
--

INSERT INTO `login_db` (`ID`, `emailaddress`, `password`) VALUES
(1, '', ''),
(2, 'admin@gmail.com', 'admin'),
(3, '', ''),
(4, '', ''),
(5, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `_case_reports`
--

CREATE TABLE `_case_reports` (
  `case_id` int(11) NOT NULL,
  `victim_name` varchar(50) NOT NULL,
  `victim_birthdate` varchar(50) NOT NULL,
  `victim_age` varchar(50) NOT NULL,
  `victim_sex` varchar(50) NOT NULL,
  `victim_gryrsection` varchar(50) NOT NULL,
  `victim_adviser` varchar(50) NOT NULL,
  `victim_mother` varchar(50) NOT NULL,
  `victim_father` varchar(50) NOT NULL,
  `victim_address` varchar(50) NOT NULL,
  `victim_father_contact` int(20) NOT NULL,
  `victim_mother_contact` int(20) NOT NULL,
  `complain_name` varchar(50) NOT NULL,
  `relationship_to_victim` varchar(50) NOT NULL,
  `complain_address` varchar(50) NOT NULL,
  `complain_contact` int(20) NOT NULL,
  `respondent_type` varchar(50) NOT NULL,
  `type_info` varchar(50) NOT NULL,
  `respondent_name` varchar(50) NOT NULL,
  `respondent_age` int(11) NOT NULL,
  `respondent_sex` varchar(50) NOT NULL,
  `respondent_address` varchar(50) NOT NULL,
  `respondent_contact` int(20) NOT NULL,
  `details_case` varchar(200) NOT NULL,
  `action` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='1';

--
-- Dumping data for table `_case_reports`
--

INSERT INTO `_case_reports` (`case_id`, `victim_name`, `victim_birthdate`, `victim_age`, `victim_sex`, `victim_gryrsection`, `victim_adviser`, `victim_mother`, `victim_father`, `victim_address`, `victim_father_contact`, `victim_mother_contact`, `complain_name`, `relationship_to_victim`, `complain_address`, `complain_contact`, `respondent_type`, `type_info`, `respondent_name`, `respondent_age`, `respondent_sex`, `respondent_address`, `respondent_contact`, `details_case`, `action`) VALUES
(5, '3', '275760-03-31', '33333333', 'male', '3333333', '333333', '333333', '3333333333333', '33333333333333333333333333333333', 33333333, 2147483647, '333333333333333333', '333333333333', '33333333333333333333333333', 2147483647, 'Student', '333333333333333333', '3333333333', 33333, 'male', '33333333333333', 333, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget sem a turpis vestibulum consectetur eu in erat. Sed euismod, elit vitae tincidunt condimentum, elit elit facilisis tortor, non ferme', ''),
(6, 'Anna moreno', '2024-01-09', '2423', 'male', 'ss', 'dsd', 'd', 'sd', 'BLK 25 LOT 12 MOLAVE ST. SOLDIERS HILLS 4 bacoor c', 2147483647, 544545, '5', '555555555555', '555555555555', 55, 'Student', '5555555555', '555555555555', -2147483648, 'male', '5555', 555555555, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget sem a turpis vestibulum consectetur eu in erat. Sed euismod, elit vitae tincidunt condimentum, elit elit facilisis tortor, non ferme', ''),
(7, '3', '275760-03-31', '333333333333333333', 'female', '3333333333', '33333333333', '3333333', '33333333', '333333333', 333333333, 2147483647, '3333333333333', '333333333333', '333333333333333333333333333', 33333, 'Student', '33333333333333333333333333333', '33333333333333', 2147483647, 'female', '3333333333333333333333', 3333333, '	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget sem a	Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget sem a	Lorem ipsum dolor sit amet, consectetur adipiscing ', ''),
(8, '1111111', '111111-11-11', '11111111111111111', 'male', '11111111', '111111111111111111', '111111111', '11111111111', '1111111111', 111111111, 1111111, '1111111111', '1111111', '111111111111111111', 11111111, '1111111111', '1111', '1', 2147483647, 'female', '11111111111111111111111', 1111, '111111111111111111111111111111111111111111111111111', ''),
(9, 'Moreno, Andrei Kenneth A. ', '2003-06-11', '21', 'male', '2nd Year BSCS', 'Castillo', 'Anna Moreno', 'Alex Moreno', 'BLK 25 LOT 12 MOLAVE ST. SOLDIERS HILLS 4 bacoor c', 2147483647, 2147483647, 'Zachery Mendozaz', 'Classmate', 'BLK 25 LOT 12 MOLAVE ST. SOLDIERS HILLS 4 bacoor c', 2147483647, 'Student', 'BSCS 2-3', 'Dioren Glavez', 21, 'male', 'BLK 25 LOT 12 MOLAVE ST. SOLDIERS HILLS 4 bacoor c', 2147483647, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eget sem a turpis vestibulum consectetur eu in erat. Sed euismod, elit vitae tincidunt condimentum, elit elit facilisis tortor, non ferme', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login_db`
--
ALTER TABLE `login_db`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `_case_reports`
--
ALTER TABLE `_case_reports`
  ADD PRIMARY KEY (`case_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login_db`
--
ALTER TABLE `login_db`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `_case_reports`
--
ALTER TABLE `_case_reports`
  MODIFY `case_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
