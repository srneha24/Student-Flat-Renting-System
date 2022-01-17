-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 19, 2021 at 04:28 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `student_flat_renting_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `ad`
--

CREATE TABLE `ad` (
  `ad_no` varchar(5) NOT NULL,
  `heading` varchar(200) NOT NULL,
  `user_id` varchar(5) NOT NULL,
  `address_id` varchar(11) NOT NULL,
  `location` varchar(30) NOT NULL,
  `seats` int(1) NOT NULL,
  `gender_pref` varchar(6) DEFAULT NULL,
  `rent_id` varchar(11) NOT NULL,
  `description` varchar(200) NOT NULL,
  `post_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ad`
--

INSERT INTO `ad` (`ad_no`, `heading`, `user_id`, `address_id`, `location`, `seats`, `gender_pref`, `rent_id`, `description`, `post_date`) VALUES
('10000', 'Require two room-mates at close proximity to BUBT', '10000', 'A1000010000', 'Rupnagar', 2, 'Male', 'R1000010000', 'Very close to BUBT.', '2020-06-06'),
('10001', 'Spacious rooms with free WiFi', '10001', 'A1000110001', 'Rayer bazar', 3, 'Male', 'R1000110001', '', '2021-06-08'),
('10002', 'Room-mate required with preference to BUBT students', '10002', 'A1000210002', 'Mirpur - 2', 1, 'Female', 'R1000210002', 'Next to Mirpur-2 mosque market.', '2021-02-09'),
('10003', 'Room for rent at cheap price', '10000', 'A1000010003', 'Rupnagar', 1, 'Male', 'R1000010003', 'Very close to BUBT.', '2021-05-08'),
('10004', 'Rooms available at a decent area', '10002', 'A1000210004', 'Mirpur - 2', 3, 'Female', 'R1000210004', '', '2021-06-05'),
('10005', 'Two seats available near Mirpur - 2 water tank', '10005', 'A1000510005', 'Mirpur - 2', 2, 'Female', 'R1000510005', '', '2020-07-01'),
('10006', 'Flat available near Mirpur - 1 Eidgah', '10016', 'A1001610016', 'Mirpur - 1', 3, 'Female', 'R1001610016', 'Excellent Internet connection.', '2021-04-02'),
('10007', 'Flat for rent near BUBT', '10007', 'A1000710007', 'Rupnagar', 4, 'Male', 'R1000710007', 'The neighbourhood is calm and friendly. Very suitable for newcomers in Dhaka.', '2020-07-01'),
('10008', 'Looking for roommate near Mirpur - 1 Majar Road', '10014', 'A1001410014', 'Mirpur - 1', 1, 'Male', 'R1001410014', '', '2021-09-15'),
('10009', 'Two seats available for BUBT students', '10009', 'A1000910009', 'Rupnagar', 2, 'Male', 'R1000910009', '', '2021-12-03'),
('10010', 'Looking for roommates to share a flat with.', '10001', 'A1000210002', 'Dhanmondi - 27', 3, 'Male', 'R1000210002', 'Preference would go to students of UIU', '2021-01-05'),
('10011', 'Looking for BUBT students to share a flat with', '10011', 'A1001110011', 'Rupnagar', 3, 'Male', 'R1001110011', '', '2021-10-13'),
('10012', 'Seat available near Mirpur - 1 bazaar', '10020', 'A1001210012', 'Mirpur - 1', 1, 'Female', 'R1002010020', 'Great flat and very suitable for females', '2021-03-24'),
('10013', 'Flat available for university students', '10013', 'A1001310013', 'Dhanmondi - 27', 4, 'Female', 'R1001310013', 'Close to Daffodil University', '2020-07-07'),
('10014', 'Looking for students of ULAB to share a flat with', '10014', 'A1001410014', 'Rayer bazar', 2, 'Male', 'R1001410014', 'I am student of ULAB and I would prefer to have students from there as roommates.', '2021-08-02'),
('10015', 'Two seats available behind Rapa Plaza', '10015', 'A1001510015', 'Dhanmondi - 27', 2, 'Male', 'R1001510015', '', '2020-02-05'),
('10016', 'Roommates required behind Sony Square', '10016', 'A1001610016', 'Mirpur - 2', 2, 'Female', 'R1001610016', 'The environment is very calm and friendly.', '2020-06-09'),
('10017', 'Flat to rent to BUBT and Commerce College students', '10017', 'A1001710017', 'Mirpur - 2', 4, 'Male', 'R1001710017', 'Behind Mirpur - 2 water tank', '2020-07-08'),
('10018', 'Want to share a flat with new UIU students', '10018', 'A1001810018', 'Rayer bazar', 3, 'Female', 'R1001810018', 'I started at UIU this semester and I would like to share a flat with other newcomers', '2021-09-08'),
('10019', 'Looking for male roommates for four months', '10019', 'A1001910019', 'Rayer bazar', 2, 'Male', 'R1001910019', '', '2020-07-01'),
('10020', 'Seat available with preference to BUBT student', '10020', 'A1002010020', 'Mirpur-1', 1, 'Female', 'R1002010020', 'Behind Aarong', '2020-05-10');

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `address_id` varchar(11) NOT NULL,
  `house_no` varchar(3) NOT NULL,
  `road_no` varchar(3) NOT NULL,
  `block_no` varchar(1) NOT NULL,
  `section` varchar(3) NOT NULL,
  `floor_no` varchar(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `address`
--

INSERT INTO `address` (`address_id`, `house_no`, `road_no`, `block_no`, `section`, `floor_no`) VALUES
('A1000010000', '16', '2', 'A', '6', '2'),
('A1000010003', '16', '2', 'A', '6', '2'),
('A1000110001', '10', '3', 'F', '1', '3'),
('A1000210002', '4', '5', 'G', '6', '4'),
('A1000210004', '1', '8', 'C', '6', '1'),
('A1000510005', '5', '2', 'D', '2', '3'),
('A1000610006', '17', '3', 'C', '6', '1'),
('A1000710007', '6', '4', 'A', '1', '5'),
('A1000810008', '13', '5', 'B', '11', '2'),
('A1000910009', '2', '12', 'F', '2', '2'),
('A1001010010', '6', '3', 'A', '10', '3'),
('A1001110011', '1', '1', 'D', '6', '5'),
('A1001210012', '5', '1', 'B', '1', '2'),
('A1001310013', '8', '2', 'G', '10', '3'),
('A1001410014', '10', '1', 'F', '1', '4'),
('A1001510015', '5', '4', 'B', '2', '3'),
('A1001610016', '11', '12', 'G', '1', '5'),
('A1001710017', '14', '9', 'E', '6', '2'),
('A1001810018', '3', '6', 'B', '11', '6'),
('A1001910019', '10', '5', 'A', '2', '4'),
('A1002010020', '12', '2', 'C', '2', '2');

-- --------------------------------------------------------

--
-- Table structure for table `rent`
--

CREATE TABLE `rent` (
  `rent_id` varchar(11) NOT NULL,
  `rent` decimal(8,2) NOT NULL DEFAULT 0.00,
  `water_bill` decimal(6,2) NOT NULL DEFAULT 0.00,
  `electricity_bill` decimal(6,2) NOT NULL DEFAULT 0.00,
  `gas_bill` decimal(6,2) NOT NULL DEFAULT 0.00,
  `internet_bill` decimal(6,2) NOT NULL DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rent`
--

INSERT INTO `rent` (`rent_id`, `rent`, `water_bill`, `electricity_bill`, `gas_bill`, `internet_bill`) VALUES
('R1000010000', '20000.00', '500.00', '0.00', '0.00', '1000.00'),
('R1000010003', '12000.00', '200.00', '1100.00', '800.00', '500.00'),
('R1000110001', '10000.00', '200.00', '1000.00', '800.00', '0.00'),
('R1000210002', '17300.00', '0.00', '0.00', '0.00', '0.00'),
('R1000210004', '9000.00', '300.00', '500.00', '800.00', '500.00'),
('R1000510005', '21000.00', '0.00', '0.00', '0.00', '0.00'),
('R1000610006', '12000.00', '200.00', '500.00', '500.00', '0.00'),
('R1000710007', '17400.00', '0.00', '0.00', '0.00', '0.00'),
('R1000810008', '13500.00', '0.00', '0.00', '800.00', '500.00'),
('R1000910009', '18000.00', '0.00', '0.00', '0.00', '0.00'),
('R1001010010', '15200.00', '0.00', '0.00', '0.00', '0.00'),
('R1001110011', '18500.00', '0.00', '0.00', '0.00', '1000.00'),
('R1001210012', '12500.00', '200.00', '1000.00', '500.00', '0.00'),
('R1001310013', '10000.00', '400.00', '800.00', '550.00', '500.00'),
('R1001410014', '14500.00', '0.00', '0.00', '0.00', '0.00'),
('R1001510015', '18500.00', '0.00', '1000.00', '0.00', '0.00'),
('R1001610016', '9500.00', '500.00', '500.00', '0.00', '500.00'),
('R1001710017', '13500.00', '0.00', '850.00', '500.00', '0.00'),
('R1001810018', '18500.00', '0.00', '0.00', '0.00', '0.00'),
('R1001910019', '17500.00', '0.00', '0.00', '0.00', '500.00'),
('R1002010020', '13500.00', '0.00', '0.00', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` varchar(5) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_pwd` varchar(50) NOT NULL,
  `phone` varchar(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `district` varchar(30) DEFAULT NULL,
  `institute` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `user_pwd`, `phone`, `email`, `gender`, `district`, `institute`) VALUES
('10000', 'Rofik Uddin', '1111', '01745654879', 'rofik@gmail.com', 'Male', 'Dhaka', 'Bangladesh University of Business and Technology (BUBT)'),
('10001', 'Sofik Chowdhury', '2222', '01965487899', 'sofik@gmail.com', 'Male', 'Dhaka', 'United International University (UIU)'),
('10002', 'Mitu Sultana', '3333', '01965487896', 'mitu@gmail.com', 'Female', 'Dhaka', 'Bangladesh University of Business and Technology (BUBT)'),
('10003', 'Setu Akter', '4444', '01759875489', 'setu@gmail.com', 'Female', 'Dhaka', NULL),
('10004', 'Kobir Khan', '5555', '01451742152', 'kabir@gmail.com', 'Male', 'Dhaka', NULL),
('10005', 'Tahseen Sharika Anzum', '6666', '01927478621', 'sharika@gmail.com', 'Female', 'Barisal', 'National University'),
('10006', 'Nijhum', '6666', '01455742152', 'nijhum@gmail.com', 'Female', 'Dhaka', 'Bangla collage'),
('10007', 'Ratul Deb', '7777', '01759858489', 'Ratul@gmail.com', 'male', 'Dhaka', 'BMC collage'),
('10008', 'Mredul Reja', '8888', '01959875489', 'mredul@gmail.com', 'male', 'Dhaka', NULL),
('10009', 'Md.Tusar', '9999', '01859875489', 'tusar@gmail.com', 'male', 'Dhaka', 'BUBT'),
('10010', 'Mst Shanta ', '101010', '01754856958', 'shanta@gmail.com', 'Female', 'Dhaka', 'Commerce collage '),
('10011', 'Ashik Mondol', '111111', '01759846489', 'ashik@gmail.com', 'male', 'Dhaka', 'BUBT'),
('10012', 'Mahmuda Khanom', '121212', '0175878480', 'mahmuda@gmail.com', 'Female', 'Dhaka', 'Bangla collage'),
('10013', 'Nargis Begom', '131313', '01512457896', 'nargis@gmail.com', 'Female', 'Dhaka', ''),
('10014', 'Ruhul Trepati', '141414', '01789564215', 'ruhul@gmail.com', 'Male', 'Dhaka', 'Mirpur Collage'),
('10015', 'Sumon Hok', '151515', '01545856987', 'sumon@gmail.com', 'Male', 'Dhaka', 'BMC collage'),
('10016', 'Nitu Pramanik', '161616', '01745854789', 'nitu@gmail.com', 'Female', 'Dhaka', 'BUBT'),
('10017', 'Rokibul Alam', '171717', '01754856987', 'rokibul@gmail.com', 'Male', 'Dhaka', 'BUBT'),
('10018', 'Jahanara Begom', '181818', '01545865789', 'jahanara@gmail.com', 'Female', 'Dhaka', 'Mirpur collage'),
('10019', 'MK.Sajib', '191919', '01740399739', 'sajib@gmail.com', 'Male', 'Dhaka', 'Commerce collage'),
('10020', 'Nadia Parvin', '202020', '01854569875', 'nadia@gmail.com', 'Female', 'Dhaka', 'BUBT');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ad`
--
ALTER TABLE `ad`
  ADD PRIMARY KEY (`ad_no`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `rent_id` (`rent_id`),
  ADD KEY `address_id` (`address_id`);

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`address_id`);

--
-- Indexes for table `rent`
--
ALTER TABLE `rent`
  ADD PRIMARY KEY (`rent_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `phone` (`phone`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ad`
--
ALTER TABLE `ad`
  ADD CONSTRAINT `ad_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`),
  ADD CONSTRAINT `ad_ibfk_2` FOREIGN KEY (`rent_id`) REFERENCES `rent` (`rent_id`),
  ADD CONSTRAINT `ad_ibfk_3` FOREIGN KEY (`address_id`) REFERENCES `address` (`address_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
