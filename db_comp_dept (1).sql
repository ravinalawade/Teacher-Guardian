-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 06, 2019 at 05:00 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.3.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `computer_dept`
--
CREATE DATABASE IF NOT EXISTS `computer_dept` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `computer_dept`;

-- --------------------------------------------------------

--
-- Table structure for table `achivements`
--
-- Creation: Sep 03, 2019 at 08:04 AM
--

CREATE TABLE `achivements` (
  `student_id` int(11) NOT NULL,
  `Tech/NonTech` varchar(20) NOT NULL,
  `Description` varchar(300) NOT NULL,
  `Won/Lost` varchar(5) NOT NULL,
  `Certificate` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `achivements`:
--   `student_id`
--       `students` -> `student_id`
--

--
-- Dumping data for table `achivements`
--

INSERT INTO `achivements` (`student_id`, `Tech/NonTech`, `Description`, `Won/Lost`, `Certificate`) VALUES
(212, 'Tech', 'NPTEL C Certification', 'Won', 'link'),
(212, 'Tech', 'NPTEL Python Certification', 'Won', 'link'),
(212, 'T', 'abc', 'W', 'link'),
(111, 'T', 'CPl 2k19 won', 'W', 'https://www.kks123.com'),
(212, 'T', 'hackathon', 'W', 'https://www.kk.com'),
(212, 'T', 'hackathon2', 'W', 'https://www.kk.com'),
(212, 'T', 'cloud ', 'W', 'https://www.gcp.com'),
(456, 'T', 'Cracked Codevita', 'W', 'https://www.tcs.com'),
(456, 'T', 'Codechef Longchallenge', 'W', 'https://www.codechef.com'),
(456, 'T', 'Cracked Amdocs', 'W', 'https://www.amd.com'),
(456, 'T', 'hackathon', 'W', 'https://www.hack.com');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--
-- Creation: Oct 07, 2019 at 02:19 AM
--

CREATE TABLE `attendance` (
  `student_id` int(11) NOT NULL,
  `Semester` int(1) NOT NULL,
  `Year` int(1) NOT NULL,
  `Month` varchar(20) NOT NULL,
  `attend` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `attendance`:
--   `student_id`
--       `students` -> `student_id`
--

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`student_id`, `Semester`, `Year`, `Month`, `attend`) VALUES
(363, 5, 3, 'August', 70),
(111, 5, 3, 'August', 65),
(363, 5, 3, 'September', 65),
(454, 5, 3, 'August', 80),
(111, 5, 3, 'September', 70),
(212, 5, 2019, 'August', 80),
(212, 5, 2019, 'September', 85),
(212, 4, 2019, 'February', 81),
(212, 4, 2019, 'March', 87),
(212, 4, 2019, 'January', 82),
(212, 5, 2019, 'October', 75),
(111, 3, 2, 'October', 90),
(212, 5, 2019, 'November', 60),
(212, 5, 2019, 'December', 65),
(212, 4, 2019, 'April', 50),
(212, 3, 2018, 'July', 65),
(212, 3, 2018, 'August', 68),
(212, 3, 2018, 'Sepetember', 50),
(212, 3, 2018, 'October', 65),
(212, 2, 2018, 'February', 71);

-- --------------------------------------------------------

--
-- Table structure for table `parent_contact`
--
-- Creation: Sep 03, 2019 at 08:11 AM
--

CREATE TABLE `parent_contact` (
  `student_id` int(11) NOT NULL,
  `Mobile_no` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `parent_contact`:
--   `student_id`
--       `students` -> `student_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `parent_email`
--
-- Creation: Sep 03, 2019 at 08:12 AM
--

CREATE TABLE `parent_email` (
  `student_id` int(11) NOT NULL,
  `Email_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `parent_email`:
--   `student_id`
--       `students` -> `student_id`
--

--
-- Dumping data for table `parent_email`
--

INSERT INTO `parent_email` (`student_id`, `Email_id`) VALUES
(212, 'siddesh.pn23@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `professor`
--
-- Creation: Sep 18, 2019 at 01:16 PM
--

CREATE TABLE `professor` (
  `professor_id` int(11) NOT NULL,
  `First` varchar(50) NOT NULL,
  `Middle` varchar(50) NOT NULL,
  `Last` varchar(50) NOT NULL,
  `Date_of_Birth` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `professor`:
--

--
-- Dumping data for table `professor`
--

INSERT INTO `professor` (`professor_id`, `First`, `Middle`, `Last`, `Date_of_Birth`) VALUES
(112, 'Subodh', 'M', 'Karve', '1982-03-06'),
(258, 'Chandrashekar', 'M', 'Raut', '1960-05-05'),
(454, 'Johnson', 'P', 'Mathew', '1980-10-31'),
(512, 'Jyoti', 'M', 'Gaikwad', '1986-09-04'),
(789, 'Manoj', 'S', 'Patil', '1979-05-09'),
(1233, 'Amol', 'P', 'Pande', '1976-10-09');

-- --------------------------------------------------------

--
-- Table structure for table `professor_email`
--
-- Creation: Oct 11, 2019 at 04:12 AM
--

CREATE TABLE `professor_email` (
  `professor_id` int(11) DEFAULT NULL,
  `Email_id` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `professor_email`:
--   `professor_id`
--       `professor` -> `professor_id`
--

--
-- Dumping data for table `professor_email`
--

INSERT INTO `professor_email` (`professor_id`, `Email_id`) VALUES
(512, 'jyoti_dm@gmail.com'),
(258, 'cmraut@gmail.com'),
(112, 'karve_subodh@gmail.com'),
(789, 'mpatil@gmail.com'),
(454, 'mathew_552@gmail.com'),
(512, 'gaikwadyo@yahoo.in'),
(1233, 'amol_pande@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `prof_address`
--
-- Creation: Oct 11, 2019 at 04:12 AM
--

CREATE TABLE `prof_address` (
  `professor_id` int(11) NOT NULL,
  `Location` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `prof_address`:
--   `professor_id`
--       `professor` -> `professor_id`
--

--
-- Dumping data for table `prof_address`
--

INSERT INTO `prof_address` (`professor_id`, `Location`) VALUES
(512, 'A/3, Kaveri heights, Sainagar, Thane'),
(112, 'Rana Tower, Mulund'),
(1233, 'Kalyan'),
(258, '102, Paradise Tower, Tip Top Plaza, Thane'),
(454, 'Hiranandani Estate, Thane');

-- --------------------------------------------------------

--
-- Table structure for table `prof_rol`
--
-- Creation: Oct 11, 2019 at 04:13 AM
--

CREATE TABLE `prof_rol` (
  `professor_id` int(11) NOT NULL,
  `Role` varchar(20) NOT NULL,
  `Year` int(1) NOT NULL,
  `Division` varchar(1) NOT NULL,
  `Batch` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `prof_rol`:
--   `professor_id`
--       `professor` -> `professor_id`
--

--
-- Dumping data for table `prof_rol`
--

INSERT INTO `prof_rol` (`professor_id`, `Role`, `Year`, `Division`, `Batch`) VALUES
(258, 'Guardian', 2, 'A', '3'),
(789, 'Guardian', 2, 'A', '2'),
(454, 'Incharge', 3, 'A', NULL),
(512, 'Incharge', 3, 'A', NULL),
(512, 'Guardian', 3, 'A', '1'),
(112, 'Guardian', 3, 'A', '3');

-- --------------------------------------------------------

--
-- Table structure for table `prof_sub`
--
-- Creation: Sep 18, 2019 at 12:32 PM
--

CREATE TABLE `prof_sub` (
  `professor_id` int(11) NOT NULL,
  `Subject` varchar(20) NOT NULL,
  `Year` int(1) NOT NULL,
  `Division` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `prof_sub`:
--   `professor_id`
--       `professor` -> `professor_id`
--

--
-- Dumping data for table `prof_sub`
--

INSERT INTO `prof_sub` (`professor_id`, `Subject`, `Year`, `Division`) VALUES
(258, 'Computer Graphics', 2, 'A'),
(512, 'AOA', 3, 'A'),
(454, 'CN', 3, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `result`
--
-- Creation: Oct 02, 2019 at 03:08 PM
--

CREATE TABLE `result` (
  `student_id` int(11) NOT NULL,
  `Semester` int(1) NOT NULL,
  `Exam_date` date NOT NULL,
  `Subject` varchar(50) NOT NULL,
  `Pointer` int(5) NOT NULL,
  `Pass/Fail` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `result`:
--   `student_id`
--       `students` -> `student_id`
--

--
-- Dumping data for table `result`
--

INSERT INTO `result` (`student_id`, `Semester`, `Exam_date`, `Subject`, `Pointer`, `Pass/Fail`) VALUES
(454, 2, '2018-05-12', 'Applied Maths-2', 10, 'Pass'),
(212, 4, '2019-05-05', 'Applied Maths-4', 10, 'Pass'),
(212, 4, '2019-10-05', 'Computer Graphics', 9, 'Pass'),
(212, 4, '2019-12-05', 'Computer Organisation', 7, 'Pass'),
(212, 4, '2019-12-05', 'Python', 10, 'Pass'),
(212, 4, '2019-02-10', 'Operating System', 10, 'Pass'),
(212, 4, '2019-05-28', 'Algorithms', 9, 'Pass'),
(454, 4, '2019-05-15', 'Computer Organisation', 7, 'Pass'),
(454, 4, '2019-05-28', 'Algorithms', 9, 'Pass'),
(454, 3, '2019-05-13', 'AOA', 9, 'Pass'),
(111, 5, '2009-03-21', 'AOA', 9, 'Pass'),
(111, 3, '2019-05-13', 'DLDA', 9, 'Pass'),
(456, 5, '2019-05-05', 'DBMS', 9, 'Pass'),
(212, 5, '2019-05-05', 'DBMS', 9, 'Pass');

--
-- Triggers `result`
--
DELIMITER $$
CREATE TRIGGER `pratik` BEFORE INSERT ON `result` FOR EACH ROW UPDATE students SET Study_year=Study_year+1 WHERE student_id=NEW.student_id
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `skills`
--
-- Creation: Oct 08, 2019 at 04:30 PM
--

CREATE TABLE `skills` (
  `student_id` int(11) NOT NULL,
  `Type` varchar(2) NOT NULL,
  `Skill_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `skills`:
--   `student_id`
--       `students` -> `student_id`
--

--
-- Dumping data for table `skills`
--

INSERT INTO `skills` (`student_id`, `Type`, `Skill_name`) VALUES
(212, 'T', 'C++'),
(212, 'T', 'Python'),
(212, 'NT', 'Swimming'),
(212, 'T', 'Android'),
(212, 't', 'html'),
(454, 'T', 'Python'),
(111, 't', 'C++'),
(111, 't', 'Python'),
(212, 't', 'css'),
(212, 't', 'java');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--
-- Creation: Sep 16, 2019 at 07:14 PM
--

CREATE TABLE `students` (
  `student_id` int(11) NOT NULL,
  `First` varchar(100) NOT NULL,
  `Middle` varchar(100) NOT NULL,
  `Last` varchar(100) NOT NULL,
  `Mother` varchar(100) NOT NULL,
  `Date_of_birth` date NOT NULL,
  `Blood_grp` varchar(4) NOT NULL,
  `Study_year` int(4) NOT NULL,
  `Admission_year` int(255) NOT NULL,
  `Division` varchar(1) NOT NULL,
  `Roll_no` int(100) NOT NULL,
  `Batch` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `students`:
--

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`student_id`, `First`, `Middle`, `Last`, `Mother`, `Date_of_birth`, `Blood_grp`, `Study_year`, `Admission_year`, `Division`, `Roll_no`, `Batch`) VALUES
(111, 'Nishant', 'P', 'Das', 'S', '1999-12-27', 'A+', 3, 2017, 'A', 11, 1),
(212, 'Pratik', 'Deepak', 'Naik', 'Deepa', '1999-07-04', 'AB+', 3, 2017, 'A', 50, 3),
(363, 'Divya', 'S', 'Jain', 'P', '1999-02-12', 'A+', 3, 2017, 'A', 33, 2),
(454, 'Omkar', 'Dilip', 'dhawal', 'Seema', '1999-11-28', 'A+', 3, 2017, 'A', 19, 1),
(456, 'Ravi', 'Surendra', 'Nalawade', 'Sunita', '2000-03-13', 'B+', 3, 2017, 'A', 51, 3);

-- --------------------------------------------------------

--
-- Table structure for table `student_address`
--
-- Creation: Sep 18, 2019 at 10:31 AM
--

CREATE TABLE `student_address` (
  `student_id` int(11) NOT NULL,
  `Location` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `student_address`:
--   `student_id`
--       `students` -> `student_id`
--

--
-- Dumping data for table `student_address`
--

INSERT INTO `student_address` (`student_id`, `Location`) VALUES
(212, '304, A Wing, Shree Yashwant CHS, MAnisha Nagar, Kalwa'),
(454, 'Sai society, Budhaji Nagar, Kalwa'),
(111, 'Shree sai building Kalyan'),
(456, 'A4 Sanghavi valley Kalwa');

-- --------------------------------------------------------

--
-- Table structure for table `student_contact`
--
-- Creation: Oct 11, 2019 at 11:17 AM
--

CREATE TABLE `student_contact` (
  `id` int(11) NOT NULL,
  `Mobile_no` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `student_contact`:
--   `id`
--       `students` -> `student_id`
--

-- --------------------------------------------------------

--
-- Table structure for table `student_email`
--
-- Creation: Oct 10, 2019 at 05:18 PM
--

CREATE TABLE `student_email` (
  `student_id` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- RELATIONSHIPS FOR TABLE `student_email`:
--   `student_id`
--       `students` -> `student_id`
--

--
-- Dumping data for table `student_email`
--

INSERT INTO `student_email` (`student_id`, `Email`) VALUES
(212, 'pratiknaik4799@gmail.com'),
(363, 'jain_d@gmail.com'),
(454, 'omkardhawal21@gmail.com'),
(111, 'nishant@gmail.com'),
(456, 'ravi@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `achivements`
--
ALTER TABLE `achivements`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `parent_contact`
--
ALTER TABLE `parent_contact`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `parent_email`
--
ALTER TABLE `parent_email`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `professor`
--
ALTER TABLE `professor`
  ADD PRIMARY KEY (`professor_id`);

--
-- Indexes for table `professor_email`
--
ALTER TABLE `professor_email`
  ADD KEY `professor_email_ibfk_1` (`professor_id`);

--
-- Indexes for table `prof_address`
--
ALTER TABLE `prof_address`
  ADD KEY `prof_address_ibfk_2` (`professor_id`);

--
-- Indexes for table `prof_rol`
--
ALTER TABLE `prof_rol`
  ADD KEY `prof_rol_ibfk_1` (`professor_id`);

--
-- Indexes for table `prof_sub`
--
ALTER TABLE `prof_sub`
  ADD KEY `prof_sub_ibfk_1` (`professor_id`);

--
-- Indexes for table `result`
--
ALTER TABLE `result`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `skills`
--
ALTER TABLE `skills`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`student_id`);

--
-- Indexes for table `student_address`
--
ALTER TABLE `student_address`
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `student_contact`
--
ALTER TABLE `student_contact`
  ADD KEY `id` (`id`);

--
-- Indexes for table `student_email`
--
ALTER TABLE `student_email`
  ADD KEY `student_email_ibfk_1` (`student_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `achivements`
--
ALTER TABLE `achivements`
  ADD CONSTRAINT `achivements_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `attendance_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `parent_contact`
--
ALTER TABLE `parent_contact`
  ADD CONSTRAINT `parent_contact_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `parent_email`
--
ALTER TABLE `parent_email`
  ADD CONSTRAINT `parent_email_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `professor_email`
--
ALTER TABLE `professor_email`
  ADD CONSTRAINT `professor_email_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`professor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prof_address`
--
ALTER TABLE `prof_address`
  ADD CONSTRAINT `prof_address_ibfk_2` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`professor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prof_rol`
--
ALTER TABLE `prof_rol`
  ADD CONSTRAINT `prof_rol_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`professor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `prof_sub`
--
ALTER TABLE `prof_sub`
  ADD CONSTRAINT `prof_sub_ibfk_1` FOREIGN KEY (`professor_id`) REFERENCES `professor` (`professor_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `result`
--
ALTER TABLE `result`
  ADD CONSTRAINT `result_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `skills`
--
ALTER TABLE `skills`
  ADD CONSTRAINT `student_id` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `student_address`
--
ALTER TABLE `student_address`
  ADD CONSTRAINT `student_address_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE;

--
-- Constraints for table `student_contact`
--
ALTER TABLE `student_contact`
  ADD CONSTRAINT `student_contact_ibfk_1` FOREIGN KEY (`id`) REFERENCES `students` (`student_id`);

--
-- Constraints for table `student_email`
--
ALTER TABLE `student_email`
  ADD CONSTRAINT `student_email_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`student_id`) ON DELETE CASCADE ON UPDATE CASCADE;


--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table achivements
--

--
-- Metadata for table attendance
--

--
-- Metadata for table parent_contact
--

--
-- Metadata for table parent_email
--

--
-- Metadata for table professor
--

--
-- Metadata for table professor_email
--

--
-- Metadata for table prof_address
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'computer_dept', 'prof_address', '{\"sorted_col\":\"`prof_address`.`Location`  DESC\"}', '2019-12-05 17:50:51');

--
-- Metadata for table prof_rol
--

--
-- Metadata for table prof_sub
--

--
-- Metadata for table result
--

--
-- Metadata for table skills
--

--
-- Metadata for table students
--

--
-- Dumping data for table `pma__table_uiprefs`
--

INSERT INTO `pma__table_uiprefs` (`username`, `db_name`, `table_name`, `prefs`, `last_update`) VALUES
('root', 'computer_dept', 'students', '[]', '2019-09-18 10:37:28');

--
-- Metadata for table student_address
--

--
-- Metadata for table student_contact
--

--
-- Metadata for table student_email
--

--
-- Metadata for database computer_dept
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
