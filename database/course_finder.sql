-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2026 at 08:39 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `course_finder`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `user_name`, `password`) VALUES
(25, 'ko', 'ko', '202cb962ac59075b964b07152d234b70'),
(26, 'wunna', 'wunna', '81dc9bdb52d04dc20036dbd8313ed055'),
(27, 'aung', 'aung', '827ccb0eea8a706c4c34a16891f84e7b'),
(28, 'administrator', 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id` int(10) UNSIGNED NOT NULL,
  `course` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `booking_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id`, `course`, `price`, `qty`, `total`, `booking_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(1, 'English', 100.00, 1, 100.00, '2021-09-02 03:43:18', 'Booked', 'dfdf', '0444', ' dfdff@gmail.com', 'sssss'),
(6, 'Java Programming', 55.00, 2, 110.00, '2021-09-06 06:35:18', 'Booked', 'htoo', '09922222', ' htoo@gmail.com', 'tarmwe'),
(7, 'Swimming', 16.00, 2, 32.00, '2021-09-06 07:17:33', 'Booked', 'htoo', '02222', ' htoo@gmail.com', 'tarmwe');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(41, 'Language', 'Course_Category_937.jpg', 'Yes', 'Yes'),
(45, 'Sport', 'Course_Category_963.jpg', 'Yes', 'Yes'),
(46, 'Art', 'Course_Category_529.jpg', 'Yes', 'Yes'),
(47, 'Computer', 'Course_Category_252.jpg', 'No', 'Yes'),
(48, 'Music', 'Course_Category_119.jpg', 'No', 'Yes'),
(49, 'Baking', 'Course_Category_550.jpg', 'No', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_course`
--

CREATE TABLE `tbl_course` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_course`
--

INSERT INTO `tbl_course` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(9, 'English', 'description', 100.00, 'Course_Name_647.jpg', 41, 'Yes', 'Yes'),
(10, 'Japanese', 'description', 20.00, 'Course-Name-2304.png', 41, 'Yes', 'Yes'),
(11, 'Java Programming', '', 55.00, 'Course-Name-5810.jpg', 47, 'Yes', 'Yes'),
(12, 'Taekwondo', '', 25.00, 'Course-Name-8668.png', 45, 'Yes', 'Yes'),
(13, 'Swimming', '', 16.00, 'Course-Name-7900.png', 45, 'Yes', 'Yes'),
(14, 'Painting', 'description', 11.00, 'Course-Name-9039.jpg', 41, 'Yes', 'Yes'),
(15, 'Drawing', 'description', 30.00, 'Course-Name-9445.jpg', 46, 'No', 'Yes'),
(16, 'Computer Basic', 'description', 15.00, 'Course-Name-6777.png', 47, 'No', 'Yes'),
(17, 'Piano', '', 60.00, 'Course-Name-8276.jpg', 48, 'No', 'Yes'),
(18, 'Violin', '', 75.00, 'Course-Name-9107.jpg', 48, 'No', 'Yes'),
(19, 'Cake Decoration', '', 80.00, 'Course-Name-4167.jpg', 49, 'No', 'Yes');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT for table `tbl_course`
--
ALTER TABLE `tbl_course`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_course`
--
ALTER TABLE `tbl_course`
  ADD CONSTRAINT `tbl_course_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `tbl_category` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
