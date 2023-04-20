  -- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 25, 2020 at 06:07 AM
-- Server version: 5.7.24
-- PHP Version: 7.2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `task_allocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_project_work`
--

DROP TABLE IF EXISTS `tbl_project_work`;
CREATE TABLE IF NOT EXISTS `tbl_project_work` (
  `project_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `added_date` varchar(10) NOT NULL,
  `month` int(11) NOT NULL,
  PRIMARY KEY (`project_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_project_work`
--

INSERT INTO `tbl_project_work` (`project_id`, `title`, `description`, `added_date`, `month`) VALUES
(2, 'Design Application Of Online Shopping ', 'Application For T-Shirt Shopping', '2020/06/04', 7),
(3, 'Design Website For Booking', 'Booking Website For Venue And Event', '2020/06/04', 20),
(4, 'SRS Of Application', 'Software Requirement Specification Of Application', '2020/06/06', 11),
(5, 'Design Employee Management System', 'Design Employee Management System For Admin', '2020/06/06', 15);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_take_task`
--

DROP TABLE IF EXISTS `tbl_take_task`;
CREATE TABLE IF NOT EXISTS `tbl_take_task` (
  `task_id` int(11) NOT NULL AUTO_INCREMENT,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `task_complete_date` varchar(10) NOT NULL,
  `status` varchar(15) NOT NULL,
  `complete_task` varchar(5) NOT NULL COMMENT 'Yes / No',
  PRIMARY KEY (`task_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_take_task`
--

INSERT INTO `tbl_take_task` (`task_id`, `project_id`, `user_id`, `task_complete_date`, `status`, `complete_task`) VALUES
(1, 2, 2, '2021/01/06', 'Complete', 'Yes'),
(3, 3, 4, '2022/02/06', 'Complete', 'Yes'),
(4, 4, 8, '2021/06/06', 'Pending', '');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

DROP TABLE IF EXISTS `tbl_user`;
CREATE TABLE IF NOT EXISTS `tbl_user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(32) NOT NULL,
  `role` varchar(10) NOT NULL,
  `salary` int(11) NOT NULL,
  `status` varchar(1) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `name`, `username`, `password`, `role`, `salary`, `status`) VALUES
(1, 'Dhruv Ambaliya', 'Admin', 'Admin1234', 'Manager', 0, 'A'),
(2, 'Man Patel', 'Emp_Man_109', 'Manpatel90', 'Employee', 22000, 'A'),
(4, 'Hetal Patel', 'Emp_Hetal_112', 'Hetal112', 'Employee', 18500, 'A'),
(8, 'Manasvi Thakkar', 'Emp_Manasvi_106', 'Manasvi106', 'Employee', 18000, 'A'),
(9, 'Priya Gojariya', 'Emp_Pilu_093', 'Priya093', 'Employee', 25000, 'A');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
