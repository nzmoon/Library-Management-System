-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 23, 2018 at 04:51 PM
-- Server version: 5.7.19
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `lbr_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `email` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `email`, `password`) VALUES
(1, 'admin@gmail.com', '1234');

-- --------------------------------------------------------

--
-- Stand-in structure for view `allcomments`
-- (See below for the actual view)
--
CREATE TABLE `allcomments` (
`id` int(11)
,`resource_id` int(11)
,`comment` text
,`time` datetime
,`full_name` varchar(200)
,`photo` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `book`
--

CREATE TABLE `book` (
  `id` int(11) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `sbn` varchar(200) NOT NULL,
  `book_cat` int(11) NOT NULL,
  `publisher_id` int(11) NOT NULL,
  `writer_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `publishing_year` varchar(20) NOT NULL,
  `description` text NOT NULL,
  `pdf_link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `book`
--

INSERT INTO `book` (`id`, `book_name`, `sbn`, `book_cat`, `publisher_id`, `writer_id`, `quantity`, `publishing_year`, `description`, `pdf_link`) VALUES
(1, 'PHP', '10102', 2, 1, 6, 2, '2017', 'Some Text', 'http://abc.com'),
(2, 'JavaScript', '10121', 2, 1, 4, 11, '2018', 'abc', 'urls;a'),
(3, 'Tin Goyenda', '10102', 1, 1, 6, 10, '2006', 'kkda dja kajsdf', 'fkdflak.cioab'),
(4, 'Pirates of the sea', '10102016', 6, 5, 2, 100, '2018', 'abcdefghijklmnopqrstuvwxyz', 'https:123abc.com'),
(5, 'abcd', '12356', 8, 5, 2, 100, '2018', 'nothing else metter', 'https://abcd.in'),
(6, 'new book', '102135', 2, 2, 2, 20, '2018', 'aldlkajsdlfk', 'https://link.'),
(7, 'Building Construction', '50045', 2, 2, 2, 499, '2018', 'aalka askdfjl asldfk as;dlffkl', 'alkasldkflkas.com'),
(8, 'kasjdlf', '3546546', 3, 1, 2, 220, '2018', '.aksdjfl', 'kalk');

-- --------------------------------------------------------

--
-- Table structure for table `books_category`
--

CREATE TABLE `books_category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books_category`
--

INSERT INTO `books_category` (`cat_id`, `cat_name`) VALUES
(1, 'Nobel'),
(2, 'Engineering'),
(3, 'History'),
(4, 'Biology'),
(5, 'Seince'),
(6, 'Documentery'),
(7, 'Programming'),
(8, 'Magicals');

-- --------------------------------------------------------

--
-- Table structure for table `borrow_books`
--

CREATE TABLE `borrow_books` (
  `borrow_id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `u_id` varchar(50) NOT NULL,
  `submitted_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `borrow_date` varchar(255) DEFAULT NULL,
  `return_date` varchar(255) DEFAULT NULL,
  `day_exceed` varchar(200) DEFAULT 'Not Exceed',
  `fine` varchar(200) NOT NULL DEFAULT '-/',
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `borrow_books`
--

INSERT INTO `borrow_books` (`borrow_id`, `book_id`, `u_id`, `submitted_date`, `borrow_date`, `return_date`, `day_exceed`, `fine`, `status`) VALUES
(1, 1, 'cse100018', '2018-03-23 16:29:21', '18-03-27 09:37:02', '18-04-01 09:37:02', 'Not Exceed', '-/', 2),
(5, 3, 'cse100018', '2018-03-23 16:34:01', '18-03-31 01:48:14', '18-04-05 01:48:14', 'Not Exceed', '-/', 2),
(6, 1, 'cse100018', '2018-03-23 16:46:41', '18-04-07 09:58:30', '18-04-12 09:58:30', '24', '240', 2),
(7, 2, 'Physics10352', '2018-03-24 05:34:01', '18-03-24 11:35:28', '18-03-29 11:35:28', '8', '80', 2),
(8, 1, 'Physics10352', '2018-03-24 07:53:10', '18-04-07 10:03:34', '18-04-12 10:03:34', 'Not Exceed', '-/', 2),
(9, 3, 'Physics10352', '2018-04-09 20:40:42', '18-04-10 02:56:41', '18-04-15 02:56:41', '22', '220', 2),
(10, 4, 'cse100018', '2018-04-10 19:02:35', '18-04-11 01:02:58', '18-04-16 01:02:58', 'Not Exceed', '-/', 2),
(11, 1, 'cse100018', '2018-04-10 19:42:45', '18-04-11 01:59:02', '18-04-16 01:59:02', 'Not Exceed', '-/', 2),
(12, 4, 'cse100018', '2018-04-10 19:43:25', '18-07-07 03:39:42', '18-07-12 03:39:42', 'Not Exceed', '-/', 2),
(13, 1, 'cse100018', '2018-04-10 19:44:41', '18-07-07 01:45:38', '18-07-12 01:45:38', '11', '110', 2),
(14, 2, 'cse100018', '2018-04-10 19:45:07', NULL, NULL, 'Not Exceed', '-/', 0),
(15, 4, 'cse100018', '2018-04-10 20:02:46', NULL, NULL, 'Not Exceed', '-/', 0),
(16, 1, 'cse100018', '2018-07-06 22:01:45', '18-07-07 02:50:58', '18-07-12 02:50:58', '11', '110', 2),
(17, 1, 'Physics10352', '2018-07-07 07:38:39', NULL, NULL, 'Not Exceed', '-/', 0),
(18, 2, 'cse100018', '2018-07-07 08:50:13', NULL, NULL, 'Not Exceed', '-/', 0),
(19, 2, 'cse100018', '2018-07-22 09:18:25', '18-07-22 03:22:12', '18-07-27 03:22:12', 'Not Exceed', '-/', 2),
(20, 7, 'Civil100022', '2018-07-23 14:53:48', '18-07-23 08:54:46', '18-07-28 08:54:46', '22', '220', 1),
(21, 2, 'TEC-CSE103517', '2018-07-23 16:08:21', '18-07-23 10:08:47', '18-07-28 10:08:47', 'Not Exceed', '-/', 2),
(22, 3, 'cse100018', '2018-07-23 16:36:33', '18-07-23 10:38:50', '18-07-28 10:38:50', '22', '220', 1);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `u_id` varchar(100) NOT NULL,
  `message` varchar(200) NOT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `u_id`, `message`, `time`, `status`) VALUES
(1, 'Physics10352', 'The book you requested is approved.', '2018-04-09 20:56:41', 1),
(2, 'Physics10352', 'Your Requisition book is approved.', '2018-04-10 15:23:56', 0),
(3, 'Physics10352', 'Your book has been returned', '2018-04-10 18:34:07', 0),
(4, 'cse100018', 'The book you requested is approved.', '2018-04-10 19:02:58', 0),
(5, 'cse100018', 'Your book has been returned', '2018-04-10 19:08:05', 0),
(6, 'cse100018', 'The book you requested is approved.', '2018-04-10 19:59:03', 0),
(7, 'cse100018', 'Your book has been returned', '2018-04-10 20:01:21', 0),
(8, 'cse100018', 'Your book has been returned', '2018-04-10 20:08:04', 1),
(9, 'cse100018', 'The book you requested is approved.', '2018-07-06 21:39:42', 0),
(10, 'cse100018', 'Your book has been returned', '2018-07-06 21:41:05', 0),
(11, 'Physics10352', 'Your book has been returned', '2018-07-06 21:57:48', 0),
(12, 'Physics10352', 'Your book has been returned', '2018-07-06 21:57:55', 0),
(13, 'cse100018', 'The book you requested is approved.', '2018-07-07 07:45:38', 0),
(14, 'cse100018', 'Your book has been returned', '2018-07-07 08:47:19', 0),
(15, 'cse100018', 'The book you requested is approved.', '2018-07-07 08:50:58', 0),
(16, 'cse100018', 'The book you requested is approved.', '2018-07-22 09:22:12', 0),
(17, 'cse100018', 'Your book has been returned', '2018-07-23 14:22:46', 0),
(18, 'cse100018', 'Your book has been returned', '2018-07-23 14:22:51', 0),
(19, 'cse100018', 'Your book has been returned', '2018-07-23 14:22:56', 1),
(20, 'Civil100022', 'The book you requested is approved.', '2018-07-23 14:54:47', 1),
(21, 'TEC-CSE103517', 'The book you requested is approved.', '2018-07-23 16:08:47', 1),
(22, 'cse100018', 'The book you requested is approved.', '2018-07-23 16:38:50', 1),
(23, 'TEC-CSE103517', 'Your book has been returned', '2018-07-23 16:39:22', 0);

-- --------------------------------------------------------

--
-- Stand-in structure for view `notify`
-- (See below for the actual view)
--
CREATE TABLE `notify` (
`borrow_id` bigint(20)
,`status` int(11)
,`requ` bigint(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `publisher`
--

CREATE TABLE `publisher` (
  `id` int(11) NOT NULL,
  `publisher_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `publisher`
--

INSERT INTO `publisher` (`id`, `publisher_name`) VALUES
(1, 'AB Prokashoni'),
(2, 'Gazi Publisher'),
(3, 'Hoque Publication'),
(4, 'KSl Publication'),
(5, 'New Market Publication'),
(6, 'anando publication');

-- --------------------------------------------------------

--
-- Table structure for table `resource_comment`
--

CREATE TABLE `resource_comment` (
  `id` int(11) NOT NULL,
  `resource_id` int(11) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `comment` text NOT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `resource_comment`
--

INSERT INTO `resource_comment` (`id`, `resource_id`, `u_id`, `comment`, `time`) VALUES
(1, 1, 'Physics10352', 'abcdasdklflajsdfhp\r\n', '2018-04-07 11:17:22'),
(2, 2, 'Physics10352', 'wjkgvkgedhjhalsd bcviedgbcuwvb egbugggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggggg', '2018-04-07 11:17:22'),
(3, 2, 'Physics10352', 'sff', '2018-04-07 11:17:22'),
(4, 1, 'Physics10352', 'this is great', '2018-04-07 11:17:22'),
(5, 1, 'Physics10352', 'asdfkjaldfj', '2018-04-07 11:17:22'),
(6, 1, 'Physics10352', 'kasdfkl akjsdfhl asdfjkh laksdjfh aksdjf laskdfh ', '2018-04-07 11:17:22'),
(7, 1, 'cse100018', 'now show the data', '2018-04-07 11:17:22'),
(8, 1, 'cse100018', 'text field er pase username ta thakbe...', '2018-04-07 11:17:22'),
(9, 1, 'cse100018', 'asdxxxxxxxxxxxxxx', '2018-04-07 11:17:22'),
(10, 1, 'cse100018', 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', '2018-04-07 11:17:22'),
(11, 1, 'cse100018', 'what is this?\n', '2018-04-07 11:17:22'),
(12, 1, 'Physics10352', 'whats wrong with it?\n', '2018-04-07 14:44:19'),
(13, 2, 'cse100018', 'i dont know', '2018-04-07 14:45:13'),
(14, 1, 'cse100018', 'nothing sir', '2018-04-07 14:45:41'),
(15, 1, 'cse100018', 'kl', '2018-04-07 15:14:17'),
(16, 1, 'Physics10352', 'al;sdkfj', '2018-04-07 20:07:56'),
(17, 1, 'Physics10352', 'alksd', '2018-04-07 20:08:15'),
(18, 1, 'Physics10352', 'jjdka', '2018-04-08 22:01:47'),
(19, 1, 'Physics10352', 'lkjhiu\n', '2018-04-09 13:22:03'),
(20, 1, 'Physics10352', 'hgjihu', '2018-04-09 13:23:03'),
(21, 1, 'Physics10352', 'adksfjh', '2018-04-09 13:43:46'),
(22, 1, 'Physics10352', 'sdfsd\n', '2018-04-09 13:45:15'),
(23, 1, 'Physics10352', 'dfgasdf', '2018-04-09 14:07:22'),
(24, 1, 'Physics10352', 'kl;asdjfl', '2018-04-09 14:15:24'),
(25, 1, 'cse100018', 'guygu', '2018-04-18 14:13:28'),
(26, 1, 'cse100018', 'how are you?\n', '2018-05-17 14:38:11'),
(27, 1, 'cse100018', 'i dont know\n', '2018-07-07 04:05:56'),
(28, 2, 'cse100018', 'abde;a\n', '2018-07-07 04:06:38'),
(29, 1, 'cse100018', 'how are \n', '2018-07-07 13:04:35'),
(30, 1, 'cse100018', 'nnn\\\n', '2018-07-07 14:23:47'),
(31, 1, 'cse100018', 'al;ksdjf;lk \n', '2018-07-23 22:43:56');

-- --------------------------------------------------------

--
-- Stand-in structure for view `show_borrow_books`
-- (See below for the actual view)
--
CREATE TABLE `show_borrow_books` (
`borrow_id` int(11)
,`u_id` varchar(50)
,`borrow_date` varchar(255)
,`return_date` varchar(255)
,`submitted_date` timestamp
,`day_exceed` varchar(200)
,`fine` varchar(200)
,`full_name` varchar(200)
,`email` varchar(200)
,`book_name` varchar(200)
);

-- --------------------------------------------------------

--
-- Table structure for table `student_info`
--

CREATE TABLE `student_info` (
  `id` int(11) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `mobile_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `batch` varchar(200) NOT NULL,
  `session` varchar(200) NOT NULL,
  `shift` varchar(200) NOT NULL,
  `program` varchar(200) NOT NULL,
  `photo` varchar(200) NOT NULL,
  `reg_date` date DEFAULT NULL,
  `creation_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student_info`
--

INSERT INTO `student_info` (`id`, `u_id`, `full_name`, `mobile_no`, `email`, `password`, `dept`, `batch`, `session`, `shift`, `program`, `photo`, `reg_date`, `creation_date`, `status`) VALUES
(2, 'Physics10002', 'Tareq Aziz', '01756943251', 'abc@gmail.com', '23456', 'Physics', '12', '14-15', '2nd', 'Diploma', '1520062131johnny-depp-9542522-1-402.jpg', NULL, '2018-03-03 07:28:51', '0'),
(3, 'EEE10003', 'Karim ', '01845621457', 'karimulla@gmail.com', '23456', 'EEE', '30', '17-18', '1st', 'B.Sc', '1520179906gettyimages-530708802.jpg', NULL, '2018-03-04 16:11:46', '0'),
(11, 'Physics100011', 'abul', '01817241063', 'abul@gmail.com', '23456', 'Physics', '50', '17-18', '2nd', 'B.Sc', '1520187839Dwayne-The-Rock-Johnson-1.jpg', NULL, '2018-03-04 18:23:59', '0'),
(12, 'tt100012', 'tt', '343', 'admin@g', '23456', 'tt', '50', '17-18', '1st', 'B.Sc', '1520843614cester.jpg', NULL, '2018-03-12 08:33:34', '0'),
(13, 'Mechanical100013', 'Abdul', '01856497115', 'abdul@gmail.com', '23456', 'Mechanical', '25', '12-13', '2nd', 'B.Sc', '1520958675robert-downey-jr-9542052-1-402.jpg', NULL, '2018-03-13 16:31:15', '0'),
(14, 'cse100014', 'Tareq Aziz', '0154682365', 'aziztareq95@gmail.com', '23456', 'cse', '2', '14', '1', 'diploma', '1521576558trainerprofile.PNG', NULL, '2018-03-20 20:09:18', '0'),
(15, 'abc100015', 'ace', '0154682365', 'aziztareq25@gmail.com', '23456', 'abc', '2', '14', '1', 'diploma', '1521576880shanto.jpg', NULL, '2018-03-20 20:14:40', '0'),
(16, 'cse100016', 'jja', '0213546', 'aziztare295@gmail.com', '23456', 'cse', '2', '14', '1', 'diploma', '1521576995ksl.PNG', NULL, '2018-03-20 20:16:35', '0'),
(17, 'cse100017', 'kkg', '0154682365', 'aziztareq29@gmail.com', '23456', 'cse', '2', '14', '1', 'diploma', '1521577688shanto.jpg', NULL, '2018-03-20 20:28:08', '0'),
(18, 'cse100018', 'jkg', '0154682365', 'aziztareq295@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'cse', '2', '14', '1', 'diploma', '1521577808ksl.PNG', '2018-03-23', '2018-03-20 20:30:08', '1'),
(19, 'cse100019', 'sukkur', '0354685468', 'sukkur@gmail.com', '23456', 'cse', '14', '14-15', '2', 'diploma', '1530913887test.PNG', NULL, '2018-07-06 21:51:27', '0'),
(20, '100020', '', '', '', '23456', '', '', '', '', '', '1530949281', NULL, '2018-07-07 07:41:21', '0'),
(21, 'Civil100021', 'Ananda Sarkar Akash', '01845624624', 'anandasarkarakash@gmail.com', '23456', 'Civil', '420', 'Spring', 'Day', 'B.sc', '1532355144IMG_20180708_174524.jpg', NULL, '2018-07-23 14:12:24', '0'),
(22, 'Civil100022', 'Ananda', '01845624624', 'anandasarkerakaash@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Civil', '421', 'Spring', 'Day', 'B.sc', '1532355607IMG_20180708_174405.jpg', '2018-07-23', '2018-07-23 14:20:07', '1');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_info`
--

CREATE TABLE `teachers_info` (
  `id` int(11) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `mobile_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `dept` varchar(200) NOT NULL,
  `joining_date` date NOT NULL,
  `photo` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers_info`
--

INSERT INTO `teachers_info` (`id`, `u_id`, `full_name`, `mobile_no`, `email`, `password`, `dept`, `joining_date`, `photo`, `status`) VALUES
(1, 'Physics10352', 'MD Kuddus Ali', '01756943251', 'mdkuddus@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Physics', '2018-02-28', '1519761653johnny-depp-9542522-1-402.jpg', '0'),
(2, 'tt103512', 'ABC', '2323', 'abc@gm', '123456', 'tt', '2018-03-13', '1520843701cester.jpg', '0'),
(3, 'Cse103513', 'Tarequl Islam', '01824625340', 'tarequl@gmail.com', '123456', 'Cse', '2018-03-14', '1520958977Dwayne-The-Rock-Johnson-1.jpg', '0'),
(4, 'cse103514', 'Tareq Aziz', '0154682365', 'aziztareq295@gmail.com', '123456', 'cse', '2018-03-21', '1521579193cester.jpg', '0'),
(5, 'CSE103515', 'MD Sukkur Ali', '0123464985', 'ctgsukkur112@gmail.com', '123456', 'CSE', '2018-03-21', '1521606937cester.jpg', '0'),
(6, 'cse103516', 'sukkur', '035468', 'sukkur@gmail.com', '123456', 'cse', '2018-07-07', '1530913976test1.PNG', '0'),
(7, 'TEC-CSE103517', 'Kamrul Hasan', '014879568', 'kamrul122.bd@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'CSE', '2018-07-23', '1532361709IMG_20180709_183606.jpg', '0');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_requisition`
--

CREATE TABLE `teachers_requisition` (
  `requisition_id` int(11) NOT NULL,
  `u_id` varchar(200) NOT NULL,
  `book_name` varchar(200) NOT NULL,
  `book_category` varchar(200) NOT NULL,
  `publisher_name` varchar(200) NOT NULL,
  `writer_name` varchar(200) NOT NULL,
  `publishing_year` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers_requisition`
--

INSERT INTO `teachers_requisition` (`requisition_id`, `u_id`, `book_name`, `book_category`, `publisher_name`, `writer_name`, `publishing_year`, `description`, `status`) VALUES
(1, 'Physics10352', 'PHP 7', 'Programming', 'New Market Publication', 'Sukkur Ali Mamun', '2016-03-23', 'Please Add This', 1),
(2, 'Physics10352', 'a;lkdsjfl', 'kjahfk', 'klsajakd', 's,dkaj', '2018-07-23', 'oisadfpi', 0);

-- --------------------------------------------------------

--
-- Table structure for table `teachers_resource_tab`
--

CREATE TABLE `teachers_resource_tab` (
  `resource_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `resource` varchar(200) NOT NULL,
  `upload_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `uploader_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teachers_resource_tab`
--

INSERT INTO `teachers_resource_tab` (`resource_id`, `title`, `resource`, `upload_date`, `uploader_id`) VALUES
(1, 'abcde', '1522009768Routing Information Protocol.docx', '2018-03-25 20:29:28', 'Physics10352'),
(2, 'First Page', '8th_Irr_result_book.pdf', '2018-03-25 20:32:12', 'Physics10352'),
(4, 'nameless', 'Prodip Chemical sale view mixup with Shahjalal perfumery.pdf', '2018-07-06 22:17:31', 'Physics10352'),
(5, 'kabd', 'Prodip Chemical sale view mixup with Shahjalal perfumery.pdf', '2018-07-23 16:47:02', 'Physics10352');

-- --------------------------------------------------------

--
-- Table structure for table `writer`
--

CREATE TABLE `writer` (
  `id` int(11) NOT NULL,
  `writer_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `writer`
--

INSERT INTO `writer` (`id`, `writer_name`) VALUES
(1, 'Humayn Ahmed'),
(2, 'Parves PL'),
(3, 'Erik Keller'),
(4, 'John Bunyan'),
(5, 'Daniel Defoe'),
(6, 'Jafar Iqbal'),
(7, 'Daniel Defoe');

-- --------------------------------------------------------

--
-- Structure for view `allcomments`
--
DROP TABLE IF EXISTS `allcomments`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `allcomments`  AS  select `resource_comment`.`id` AS `id`,`resource_comment`.`resource_id` AS `resource_id`,`resource_comment`.`comment` AS `comment`,`resource_comment`.`time` AS `time`,`student_info`.`full_name` AS `full_name`,`student_info`.`photo` AS `photo` from (`resource_comment` join `student_info`) where (`resource_comment`.`u_id` = `student_info`.`u_id`) union select `resource_comment`.`id` AS `id`,`resource_comment`.`resource_id` AS `resource_id`,`resource_comment`.`comment` AS `comment`,`resource_comment`.`time` AS `time`,`teachers_info`.`full_name` AS `full_name`,`teachers_info`.`photo` AS `photo` from (`resource_comment` join `teachers_info`) where (`resource_comment`.`u_id` = `teachers_info`.`u_id`) ;

-- --------------------------------------------------------

--
-- Structure for view `notify`
--
DROP TABLE IF EXISTS `notify`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `notify`  AS  select `borrow_books`.`borrow_id` AS `borrow_id`,`borrow_books`.`status` AS `status`,0 AS `requ` from `borrow_books` where (`borrow_books`.`status` = 2) union all select 0 AS `borrow_id`,`teachers_requisition`.`status` AS `requ_status`,`teachers_requisition`.`requisition_id` AS `requ` from `teachers_requisition` where (`teachers_requisition`.`status` = 0) ;

-- --------------------------------------------------------

--
-- Structure for view `show_borrow_books`
--
DROP TABLE IF EXISTS `show_borrow_books`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `show_borrow_books`  AS  select `borrow_books`.`borrow_id` AS `borrow_id`,`borrow_books`.`u_id` AS `u_id`,`borrow_books`.`borrow_date` AS `borrow_date`,`borrow_books`.`return_date` AS `return_date`,`borrow_books`.`submitted_date` AS `submitted_date`,`borrow_books`.`day_exceed` AS `day_exceed`,`borrow_books`.`fine` AS `fine`,`student_info`.`full_name` AS `full_name`,`student_info`.`email` AS `email`,`book`.`book_name` AS `book_name` from ((`borrow_books` join `student_info`) join `book`) where ((`borrow_books`.`u_id` = `student_info`.`u_id`) and (`borrow_books`.`book_id` = `book`.`id`) and (`borrow_books`.`status` = 1)) union select `borrow_books`.`borrow_id` AS `borrow_id`,`borrow_books`.`u_id` AS `u_id`,`borrow_books`.`borrow_date` AS `borrow_date`,`borrow_books`.`return_date` AS `return_date`,`borrow_books`.`submitted_date` AS `submitted_date`,`borrow_books`.`day_exceed` AS `day_exceed`,`borrow_books`.`fine` AS `fine`,`teachers_info`.`full_name` AS `full_name`,`teachers_info`.`email` AS `email`,`book`.`book_name` AS `book_name` from ((`borrow_books` join `teachers_info`) join `book`) where ((`borrow_books`.`u_id` = `teachers_info`.`u_id`) and (`borrow_books`.`book_id` = `book`.`id`) and (`borrow_books`.`status` = 1)) ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books_category`
--
ALTER TABLE `books_category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `borrow_books`
--
ALTER TABLE `borrow_books`
  ADD PRIMARY KEY (`borrow_id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `publisher`
--
ALTER TABLE `publisher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `resource_comment`
--
ALTER TABLE `resource_comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `student_info`
--
ALTER TABLE `student_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_info`
--
ALTER TABLE `teachers_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teachers_requisition`
--
ALTER TABLE `teachers_requisition`
  ADD PRIMARY KEY (`requisition_id`);

--
-- Indexes for table `teachers_resource_tab`
--
ALTER TABLE `teachers_resource_tab`
  ADD PRIMARY KEY (`resource_id`);

--
-- Indexes for table `writer`
--
ALTER TABLE `writer`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `book`
--
ALTER TABLE `book`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `books_category`
--
ALTER TABLE `books_category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `borrow_books`
--
ALTER TABLE `borrow_books`
  MODIFY `borrow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `publisher`
--
ALTER TABLE `publisher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `resource_comment`
--
ALTER TABLE `resource_comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT for table `student_info`
--
ALTER TABLE `student_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `teachers_info`
--
ALTER TABLE `teachers_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `teachers_requisition`
--
ALTER TABLE `teachers_requisition`
  MODIFY `requisition_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `teachers_resource_tab`
--
ALTER TABLE `teachers_resource_tab`
  MODIFY `resource_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `writer`
--
ALTER TABLE `writer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
