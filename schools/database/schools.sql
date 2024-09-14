-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2024 at 07:15 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `schools`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `aid` int(155) NOT NULL,
  `aname` varchar(255) NOT NULL,
  `apassword` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`aid`, `aname`, `apassword`) VALUES
(1, 'admin', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `class`
--

CREATE TABLE `class` (
  `cid` int(11) NOT NULL,
  `cname` varchar(150) NOT NULL,
  `csec` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `class`
--

INSERT INTO `class` (`cid`, `cname`, `csec`) VALUES
(1, 'II', 'B'),
(2, 'I', 'B'),
(3, 'IV', 'C'),
(8, 'III', 'C'),
(9, 'IV', 'A'),
(10, 'V', 'A'),
(11, 'II', 'C');

-- --------------------------------------------------------

--
-- Table structure for table `exam`
--

CREATE TABLE `exam` (
  `eid` int(15) NOT NULL,
  `ename` varchar(255) NOT NULL,
  `etype` varchar(255) NOT NULL,
  `edate` varchar(255) NOT NULL,
  `session` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `exam`
--

INSERT INTO `exam` (`eid`, `ename`, `etype`, `edate`, `session`, `class`, `sub`) VALUES
(2, 'Mid Sem Exam', 'I-Term', '02-04-2024', 'FN', 'II', 'Hindi'),
(4, 'Mid Sem Exam', 'II-Term', '08-04-2024', 'FN', 'I', 'Science'),
(5, 'Mid Sem Exam', 'I-Term', '09-04-2024', 'FN', 'I', 'Chemistry'),
(6, 'Mid Sem Exam', 'I-Term', '10-04-2024', 'FN', 'I', 'Physics');

-- --------------------------------------------------------

--
-- Table structure for table `hclass`
--

CREATE TABLE `hclass` (
  `hid` int(11) NOT NULL,
  `tid` int(11) NOT NULL,
  `cla` varchar(255) NOT NULL,
  `sec` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hclass`
--

INSERT INTO `hclass` (`hid`, `tid`, `cla`, `sec`, `sub`) VALUES
(1, 11, 'I', 'A', 'Gujarati'),
(2, 11, 'I', 'A', 'Gujarati'),
(4, 11, 'IV', 'A', 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `mark`
--

CREATE TABLE `mark` (
  `mid` int(11) NOT NULL,
  `regno` varchar(255) NOT NULL,
  `sub` varchar(255) NOT NULL,
  `mark` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mark`
--

INSERT INTO `mark` (`mid`, `regno`, `sub`, `mark`, `term`, `class`) VALUES
(1, '0101', '', '20', 'I-Term', 'I'),
(2, '0101', '', '20', 'I-Term', 'I'),
(3, '0101', 'Hindi', '202', 'I-Term', 'I'),
(4, '0101', 'Gujarati', '20', 'II-Term', 'I'),
(5, '0101', 'Gujarati', '20', 'II-Term', 'I'),
(6, '0101', 'Gujarati', '20', 'II-Term', 'I'),
(7, '0101', 'Gujarati', '20', 'II-Term', 'I'),
(8, '0101', 'Gujarati', '20', 'II-Term', 'I'),
(9, '0101', 'Gujarati', '20', 'II-Term', 'I'),
(10, '0101', 'Gujarati', '20', 'II-Term', 'I'),
(11, '0101', 'Gujarati', '20', 'II-Term', 'I'),
(12, '0101', 'Gujarati', '20', 'II-Term', 'I');

-- --------------------------------------------------------

--
-- Table structure for table `sid`
--

CREATE TABLE `sid` (
  `sid` int(15) NOT NULL,
  `sname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sid`
--

INSERT INTO `sid` (`sid`, `sname`) VALUES
(19, 'Gujarati'),
(20, 'Science'),
(21, 'Geography'),
(23, 'Physics'),
(24, 'Maths');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `tid` int(15) NOT NULL,
  `tname` varchar(255) NOT NULL,
  `tpass` varchar(255) NOT NULL,
  `qual` varchar(255) NOT NULL,
  `sal` varchar(255) NOT NULL,
  `pno` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `paddr` text NOT NULL,
  `img` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`tid`, `tname`, `tpass`, `qual`, `sal`, `pno`, `mail`, `paddr`, `img`) VALUES
(11, 'Hitesh', '5678', 'B.tech In CE', '25000', '9537094929', 'harshadvaru40@gmail.com', 'home', 'staff/wallpaperflare.com_wallpaper.jpg'),
(12, 'Shyam', '1234', 'B.tech in CSE', '10000', '', '', '', ''),
(14, 'Hitesh Sagathiya', '1234', 'B.tech', '100000', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `id` int(11) NOT NULL,
  `rno` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `dob` varchar(255) NOT NULL,
  `gen` varchar(255) NOT NULL,
  `pho` varchar(255) NOT NULL,
  `mail` varchar(255) NOT NULL,
  `addr` text NOT NULL,
  `sclass` varchar(255) NOT NULL,
  `ssec` varchar(250) NOT NULL,
  `simg` varchar(150) NOT NULL,
  `tid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`id`, `rno`, `name`, `fname`, `dob`, `gen`, `pho`, `mail`, `addr`, `sclass`, `ssec`, `simg`, `tid`) VALUES
(1, '0101', 'Harshad Varu', 'maheshbhai', '2002-aug-08', 'male', '9537094929', 'harshad@gmail.com', 'Surat', 'I', 'A', 'unable to found', 1),
(2, '0102', 'Shyam', 'Dineshbhai', '08-09-2001', 'Male', '9875896748', 'shyam@gmail.com', 'Morbi', 'I', 'A', 'Unable to load', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `class`
--
ALTER TABLE `class`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `exam`
--
ALTER TABLE `exam`
  ADD PRIMARY KEY (`eid`);

--
-- Indexes for table `hclass`
--
ALTER TABLE `hclass`
  ADD PRIMARY KEY (`hid`);

--
-- Indexes for table `mark`
--
ALTER TABLE `mark`
  ADD PRIMARY KEY (`mid`);

--
-- Indexes for table `sid`
--
ALTER TABLE `sid`
  ADD PRIMARY KEY (`sid`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `aid` int(155) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `class`
--
ALTER TABLE `class`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `exam`
--
ALTER TABLE `exam`
  MODIFY `eid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `hclass`
--
ALTER TABLE `hclass`
  MODIFY `hid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `mark`
--
ALTER TABLE `mark`
  MODIFY `mid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sid`
--
ALTER TABLE `sid`
  MODIFY `sid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `tid` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `student`
--
ALTER TABLE `student`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
