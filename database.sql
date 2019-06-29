-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 28, 2019 at 01:01 PM
-- Server version: 5.6.43-cll-lve
-- PHP Version: 7.2.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ea_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE `admin_users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `username`, `email`, `password`) VALUES
(1, 'admin', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `assigns`
--

CREATE TABLE `assigns` (
  `id` int(11) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `assigns`
--

INSERT INTO `assigns` (`id`, `test_id`, `question_id`, `category_id`) VALUES
(1, 1, 3, 1),
(2, 1, 2, 1),
(3, 1, 5, 1),
(4, 1, 4, 1),
(5, 1, 8, 2),
(6, 1, 6, 2),
(7, 1, 10, 2),
(8, 1, 9, 2),
(9, 2, 5, 1),
(10, 2, 4, 1),
(11, 2, 1, 1),
(12, 2, 3, 1),
(13, 2, 2, 1),
(14, 2, 11, 3),
(15, 2, 12, 3),
(16, 2, 14, 3),
(17, 2, 15, 3),
(18, 2, 13, 3),
(19, 3, 2, 1),
(20, 3, 4, 1),
(21, 3, 3, 1),
(22, 3, 5, 1),
(23, 3, 1, 1),
(24, 3, 12, 3),
(25, 3, 15, 3),
(26, 3, 14, 3),
(27, 3, 13, 3);

-- --------------------------------------------------------

--
-- Table structure for table `candidates`
--

CREATE TABLE `candidates` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `candidates`
--

INSERT INTO `candidates` (`id`, `username`, `email`, `password`) VALUES
(1, 'won', 'won@gmail.com', '7b63d1cafe15e5edab88a8e81de794b5'),
(2, 'ming', 'mingming424224@gmail.com', '95c90aa47733b9023c318d9914606339');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `description` varchar(1024) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `description`) VALUES
(1, 'JAVA', 'this is for JAVA programming'),
(2, 'C++', 'this is for C programming'),
(3, 'PHP', 'this is for PHP programming');

-- --------------------------------------------------------

--
-- Table structure for table `invitations`
--

CREATE TABLE `invitations` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `test_id` int(11) DEFAULT NULL,
  `recruiter_id` int(11) DEFAULT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `content` text,
  `valid_days` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `score` float DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `token` varchar(50) DEFAULT NULL,
  `take_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `invitations`
--

INSERT INTO `invitations` (`id`, `email`, `test_id`, `recruiter_id`, `subject`, `content`, `valid_days`, `start_time`, `end_time`, `score`, `status`, `token`, `take_time`) VALUES
(1, 'mingming424224@gmail.com', 1, 1, 'skill test', 'Hi<div>please test your skills</div><div>thanks</div>', 5, '2019-06-28 19:21:57', '2019-07-03 19:21:57', 2.94, 1, 'i4DlGiVjR9fCmGP8hBzUZ20DuJuDYJShHMJfFkJy', '2019-06-28 19:23:19'),
(2, 'yyy', 2, 1, '(tyy', '<div class=\"row mt-4\" style=\"font-family: &quot;Nunito Sans&quot;, sans-serif;\"><div class=\"col-md-3\" style=\"width: 294.8px;\"><label class=\"form-label\">o Email Address :</label></div><div class=\"col-md-9\" style=\"width: 884.4px;\"><textarea class=\"form-control\" name=\"email\" placeholder=\"enter emails separated by commas(,)\" required=\"\" style=\"width: 860.4px;\"></textarea></div></div><div class=\"row mt-4\" style=\"font-family: &quot;Nunito Sans&quot;, sans-serif;\"><div class=\"col-md-3\" style=\"width: 294.8px;\"><label class=\"form-label\">Subject :</label></div><div class=\"col-md-9\" style=\"width: 884.4px;\"><input type=\"text\" class=\"form-control\" name=\"subject\" placeholder=\"subject\" required=\"\" style=\"width: 860.4px;\"></div></div><div class=\"row mt-4\" style=\"font-family: &quot;Nunito Sans&quot;, sans-serif;\"><div class=\"col-md-3\" style=\"width: 294.8px;\"><label class=\"form-label\">Text Message :</label></div></div>', 3, '2019-06-28 19:26:59', '2019-07-01 19:26:59', NULL, 0, 'lzveAV2FytzcyVKuww4LxmhqR1OAVXgFrpi1ipNz', NULL),
(3, 'zahiyousfi@yahoo.fr', 2, 1, 'invitation to take a tests', '<div>tteee</div>', 3, '2019-06-28 19:29:48', '2019-07-01 19:29:48', NULL, 0, 'b2dZMf3yKuyZIE2km9uCyPsjOCWmk038mMgErrNp', NULL),
(4, 'zahiyousfi@gmail', 2, 1, 'invitation to take a tests', '<div>tteee</div>', 3, '2019-06-28 19:29:48', '2019-07-01 19:29:48', NULL, 0, 'b2dZMf3yKuyZIE2km9uCyPsjOCWmk038mMgErrNp', NULL),
(5, 'zahiyousfi@yahoo.fr', 3, 1, 'invitation to take a tests', '<div>java php</div>', 2, '2019-06-28 19:33:33', '2019-06-30 19:33:33', 2.85, 1, 'XUBP8lhWcEeXt9UbZBkyJQSYjCb9FWTmSbM6b3gr', '2019-06-28 19:34:59'),
(6, 'mingming424224@gmail.com', 3, 1, 'skill test', '<div>sdfwefsdf</div><div>wefwefew</div>', 4, '2019-06-28 19:40:52', '2019-07-02 19:40:52', NULL, 0, 'hvqhnw4UgTO09zJINGI8kvsAwe3mj27xrK4CbkM4', NULL),
(7, 'wonvictory424@yahoo.com', 3, 1, 'skill test', '<div>sdfwefsdf</div><div>wefwefew</div>', 4, '2019-06-28 19:40:52', '2019-07-02 19:40:52', NULL, 0, 'hvqhnw4UgTO09zJINGI8kvsAwe3mj27xrK4CbkM4', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `question` varchar(255) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `res1` varchar(255) DEFAULT NULL,
  `res2` varchar(255) DEFAULT NULL,
  `res3` varchar(255) DEFAULT NULL,
  `res4` varchar(255) DEFAULT NULL,
  `correct` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `category_id`, `res1`, `res2`, `res3`, `res4`, `correct`) VALUES
(1, 'what is JAVA?', 1, 'program language', 'country name', 'Person name', 'nothing', 1),
(2, 'When an object’s retainCount reaches 0 which message is automatically sent to that Object?', 1, 'Dealloc', 'Alloc', 'Automated', 'Object', 1),
(3, 'Where is a MKAnnotationView used?', 1, 'On a Map View', 'On a pinView', 'On a GeoLocation View', 'None of the above', 1),
(4, 'Which of the following is a Singleton?', 1, '[NSFileManager defaultManager]', '[NSFileManager* objects]', '{NSFileManager defaultManager}', '(NSFileManager defaultManager* objects)', 1),
(5, 'Which of the following is not a main property of NSException class?', 1, 'Name', 'Code', 'Reason', 'userInfo', 1),
(6, 'Which of the following is correct (legal) floating-point literal?', 2, '314159E-5L', '510E', '210f', 'e55', 1),
(7, 'Which is the most proper answer about the difference between nil and NULL?', 2, 'Nil is a constant and NULL is an object', 'Nil and NULL both are constants', 'Nil and 	NULL IS SAME IN THEIR PURPOSE AND USING', 'Nil is an object that can receive messages bu NULL is a constant', 4),
(8, 'It’s possible add a (…) to the standard NSString class, for example, to extend its functionality', 2, 'Protocol', 'Category', 'Interface', 'Class', 2),
(9, 'If you start a class definition that conforms to a specified (…), you will not need to relist all the methods you will implement for that protocol in the @interface section.', 2, 'Category', 'Protocol', 'Method', 'instance', 2),
(10, 'Name a property attribute that synthesizes accessors that are not thread safe?', 2, 'Automated', 'Interface Builder', 'Nonatomic', 'Deprecated', 1),
(11, 'Which directive determines how the session information will be stored?', 3, 'save_data', 'session_save', 'session.save_data', 'session.save_handler', 4),
(12, 'Which of the following function is used to read the content of a file?', 3, 'fopen()', 'fread()', 'filesize()', 'file_exists()', 2),
(13, 'How do you throw an exception in PHP?', 3, 'throw Exception(message);', 'throws new Exception(message);', 'None of these', 'throw new Exception(message);', 4),
(14, 'Which MIME type need to be used to send an attachment in mail?', 3, 'text/html', 'text/plain', 'application/mixed', 'multipart/mixed', 4),
(15, 'Which of the following is used to pick one or more random entries out of an array?', 3, 'array_random()', 'array_rand()', 'shuffle()', 'rand()', 2);

-- --------------------------------------------------------

--
-- Table structure for table `recruiters`
--

CREATE TABLE `recruiters` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `recruiters`
--

INSERT INTO `recruiters` (`id`, `username`, `email`, `password`) VALUES
(1, 'test', 'test@gmail.com', '098f6bcd4621d373cade4e832627b4f6');

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `recruiter_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `name`, `recruiter_id`) VALUES
(1, 'my testing', 1),
(2, 'java & php', 1),
(3, 'java phph', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assigns`
--
ALTER TABLE `assigns`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `candidates`
--
ALTER TABLE `candidates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invitations`
--
ALTER TABLE `invitations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `recruiters`
--
ALTER TABLE `recruiters`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `assigns`
--
ALTER TABLE `assigns`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `candidates`
--
ALTER TABLE `candidates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invitations`
--
ALTER TABLE `invitations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `recruiters`
--
ALTER TABLE `recruiters`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
