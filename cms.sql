-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 01:18 PM
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
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int(3) NOT NULL,
  `cat_title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `cat_title`) VALUES
(34, 'romance'),
(35, 'action'),
(36, 'fantasy');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(3) NOT NULL,
  `comment_post_id` int(3) NOT NULL,
  `comment_author` varchar(255) NOT NULL,
  `comment_email` varchar(255) NOT NULL,
  `comment_content` text NOT NULL,
  `comment_status` varchar(255) NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `comment_post_id`, `comment_author`, `comment_email`, `comment_content`, `comment_status`, `comment_date`) VALUES
(38, 71, 'raven', 'raven2999@gmail.com', '<p>Love this anime<br></p>', 'unapproved', '2024-09-10'),
(39, 74, 'raven', 'raven2999@gmail.com', '<p>good <br></p>', 'approved', '2024-09-10'),
(40, 72, 'raven', 'raven2999@gmail.com', '<p>good sao<br></p>', 'approved', '2024-09-10'),
(41, 73, 'Raven', 'raven2999@gmail.com', '<p>this is sick<br></p>', 'approved', '2024-09-10');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(3) NOT NULL,
  `post_category_id` int(3) NOT NULL,
  `post_title` varchar(255) NOT NULL,
  `post_author` varchar(255) NOT NULL,
  `post_user` varchar(225) NOT NULL,
  `post_date` date NOT NULL,
  `post_image` text NOT NULL,
  `post_content` text NOT NULL,
  `post_tags` varchar(255) NOT NULL,
  `post_comment_count` int(11) NOT NULL,
  `post_status` varchar(255) NOT NULL DEFAULT 'draft',
  `post_views_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_category_id`, `post_title`, `post_author`, `post_user`, `post_date`, `post_image`, `post_content`, `post_tags`, `post_comment_count`, `post_status`, `post_views_count`) VALUES
(71, 36, 'This is good anime', '', 'hentai', '2024-09-10', 'NARUTO.jpg', '<p>This is one of my favorate<br></p>', 'naruto', 0, 'published', 9),
(72, 34, 'Love for Romance', '', 'JOyHImapas', '2024-09-10', 'sao.jpg', '<p>The Love of Romance<br></p>', 'sao', 0, 'published', 4),
(73, 35, 'The Action that Change EveryThing', '', 'Demo1', '2024-09-10', 'bleach.jpg', '<p>The Action that will change everything<br></p>', 'bleach', 0, 'published', 3),
(74, 35, 'The new One', '', 'Demo1', '2024-09-10', 'One Piece .jpg', '<p>This the best anime<br></p>', 'one', 0, 'published', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(3) NOT NULL,
  `username` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL,
  `user_firstname` varchar(255) NOT NULL,
  `user_lastname` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_image` text NOT NULL,
  `user_role` varchar(255) NOT NULL,
  `user_randSalt` varchar(255) NOT NULL DEFAULT '$2y$12$iusesomecrazystrings22'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `user_password`, `user_firstname`, `user_lastname`, `user_email`, `user_image`, `user_role`, `user_randSalt`) VALUES
(6, 'Gogoanime', 'May102023', 'Ggoanime ', 'Gogoanime', 'nhinaguas2999@gmail.com', '', 'admin', ''),
(9, 'JOyHImapas', 'Gogoanime', 'JOy', 'Hinaguas', 'nhinaguas2999@gmail.com', '', 'admin', ''),
(10, 'Ranken', '123', 'kate', 'ranken', 'nhinaguas2999@gmail.com', '', 'subscriber', ''),
(30, 'Demo1', 'Y.wBJ1P2Kruc.', 'fdsf', '     sdfsdf', 'Demo1@gmail.com', '', 'admin', '$2y$12$iusesomecrazystrings22'),
(36, 'hentai', '$2y$10$A/VYg9tojBpzWelGGwqwaucTof.NrXGrOb7zhVFCtyq4F.DisXdJW', 'y', 'hentai', 'hentai2999@gmail.com', '', 'admin', '$2y$12$iusesomecrazystrings22'),
(37, 'y', '$2y$12$hiG/KHigznqzeyE49T.mju5Hzqlt1k2tDDEf/kC0fecDPJYTtoHnG', 'raven', '    joy', 'nhinaguas2999@gmail.com', '', 'admin', '$2y$12$iusesomecrazystrings22'),
(38, 'john', '$2y$12$TMNEq3Whv7PPFBTl3J67muZfjVL8M1GrWUpfNNG4hf29tC/PBNr8K', '', '', 'john2000@gmail.com', '', 'admin', '$2y$12$iusesomecrazystrings22');

-- --------------------------------------------------------

--
-- Table structure for table `users_onilne`
--

CREATE TABLE `users_onilne` (
  `online_id` int(11) NOT NULL,
  `session` varchar(255) NOT NULL,
  `time` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users_onilne`
--

INSERT INTO `users_onilne` (`online_id`, `session`, `time`) VALUES
(4, 'nnv1nrg2p1hc6j7eman13jub7b', 1724937531),
(5, 'dg3d5hrhvpk6uhj66ctkmg07hh', 1724939231),
(6, '8d494rghqgh151oa2nutlie0o3', 1724951945),
(7, 'n2faf6luqj93skis0nljivmk2j', 1725262404),
(8, '98f3hucqbrgihh49fmmtam72o3', 1725288195),
(9, 'jss41rlir5k85f2ra4euf8299u', 1725364859),
(10, '9pcvleom0ofvmdc5pqqf2lsgfj', 1725427318),
(11, 'r4md8inin1ccf388snrsck99n8', 1725554042),
(12, 'fjn4smn0nuniq3rovp7so3gkhf', 1725776845),
(13, 'a3ak6423p9qmldm1vpl9b7f681', 1725781072),
(14, 'au6uiap9u8bc4kaaalc946gukn', 1725895762),
(15, '9j7qdoim0bj5dbas0fci1tblii', 1725959493),
(16, '0vo893ae01ishf3oi3um76ma4t', 1725967120);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `users_onilne`
--
ALTER TABLE `users_onilne`
  ADD PRIMARY KEY (`online_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `users_onilne`
--
ALTER TABLE `users_onilne`
  MODIFY `online_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
