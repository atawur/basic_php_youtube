-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2020 at 11:55 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(2) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_at` date NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated_at` date NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_by`, `created_at`, `updated_by`, `updated_at`, `status`) VALUES
(11, 'It', 20, '2020-03-01', 0, '0000-00-00', 1),
(12, 'Technology', 20, '2020-03-01', 0, '0000-00-00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sort_description` varchar(250) NOT NULL,
  `full_description` text NOT NULL,
  `feature_image` varchar(250) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `updated_by` int(11) NOT NULL,
  `updated` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `category_id`, `sort_description`, `full_description`, `feature_image`, `created_by`, `created`, `updated_by`, `updated`, `status`) VALUES
(1, 'test', 11, ' ddd', ' ddd', 'feature_image', 20, '0000-00-00 00:00:00', 0, '0000-00-00 00:00:00', 0),
(2, 'test', 11, ' rrr', ' rr', 'feature_image', 20, '2020-03-01 00:00:00', 0, '0000-00-00 00:00:00', 0),
(3, 'test', 11, ' this is sort des', ' rrr', 'feature_image', 20, '2020-03-01 00:00:00', 0, '0000-00-00 00:00:00', 0),
(4, 'new', 11, ' this is sort des', ' dddd', 'feature_image', 20, '2020-03-01 10:30:47', 0, '0000-00-00 00:00:00', 0),
(5, 'rrr', 11, ' rrr', ' rrr', 'feature_image', 20, '2020-03-01 15:33:42', 0, '0000-00-00 00:00:00', 0),
(6, '555', 11, ' 5665', ' 5656', 'feature_image', 20, '2020-03-01 15:35:05', 0, '0000-00-00 00:00:00', 0),
(7, 'eee', 11, ' erer', ' erer', 'Array', 20, '2020-03-01 15:37:48', 0, '0000-00-00 00:00:00', 0),
(8, 'test', 11, ' ', ' ', 'uploads/84186774_2424524931141695_7261698243266871296_n70373631.jpg', 20, '2020-03-01 15:39:49', 0, '0000-00-00 00:00:00', 0),
(9, 'test', 11, ' eee', ' eee', 'uploads/12038455_1606880109572852_3299830544788085796_n99968825.jpg', 20, '2020-03-01 15:42:00', 0, '0000-00-00 00:00:00', 3),
(10, 'test', 11, ' test', 'teeer', '', 20, '2020-03-01 15:56:35', 0, '0000-00-00 00:00:00', 3),
(11, 'eee', 11, ' this is sort des', 'eee', 'uploads/12038455_1606880109572852_3299830544788085796_n42880315.jpg', 20, '2020-03-01 15:57:06', 0, '0000-00-00 00:00:00', 3),
(12, 'ertert', 11, ' rrt', 'rtrtr', 'uploads/BBB21632534.jpg', 20, '2020-03-01 16:11:39', 0, '0000-00-00 00:00:00', 3),
(13, 'test', 11, ' ddd', ' ddd', 'uploads/74419832_463662427609629_8605329442711011328_n77873315.jpg', 22, '2020-03-01 17:01:09', 0, '0000-00-00 00:00:00', 3),
(14, 'new post', 11, ' ddd', ' dd', 'uploads/74419832_463662427609629_8605329442711011328_n34300783.jpg', 20, '2020-03-01 17:38:29', 0, '0000-00-00 00:00:00', 3),
(15, 'rrr', 11, ' this is sort des', ' rrr', 'uploads/74419832_463662427609629_8605329442711011328_n33068090.jpg', 20, '2020-03-01 17:40:42', 0, '0000-00-00 00:00:00', 3),
(16, 'rrr', 11, ' this is sort des', '  rrr', 'uploads/74419832_463662427609629_8605329442711011328_n47893616.jpg', 20, '2020-03-01 17:41:25', 0, '0000-00-00 00:00:00', 3),
(17, 'updated test', 11, '  this is sort des', '    rrr', 'uploads/12038455_1606880109572852_3299830544788085796_n32483797.jpg', 20, '2020-03-01 17:54:05', 0, '0000-00-00 00:00:00', 3),
(18, 'test', 11, '  eee', '   eee', 'uploads/12038455_1606880109572852_3299830544788085796_n54049513.jpg', 20, '2020-03-01 17:54:30', 0, '0000-00-00 00:00:00', 3),
(19, 'my updated post', 11, '  eee', '   eee', 'uploads/74419832_463662427609629_8605329442711011328_n25756133.jpg', 20, '2020-03-01 18:00:00', 0, '0000-00-00 00:00:00', 3),
(20, 'my updated post bb', 11, '   eee', '     eee', 'uploads/12038455_1606880109572852_3299830544788085796_n90645064.jpg', 20, '2020-03-01 18:06:50', 0, '0000-00-00 00:00:00', 3),
(21, 'test update vvv', 11, ' erere', '    erer', 'uploads/12038455_1606880109572852_3299830544788085796_n42569543.jpg', 20, '2020-03-01 18:07:07', 20, '2020-03-01 18:32:56', 3),
(22, 'test edited', 11, ' ddd', '  ddd', 'uploads/12038455_1606880109572852_3299830544788085796_n48248604.jpg', 20, '2020-03-01 18:33:30', 20, '2020-03-01 18:33:45', 3),
(23, 'This is test', 11, '   It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content h', '   It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using Content here, content here, making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/99116495_328852358087454_7364063669166014464_n15153225.jpg', 21, '2020-03-01 18:39:10', 21, '2020-05-30 01:29:13', 1),
(24, 'ss', 11, ' this is sort des', ' sss', 'uploads/MeatPoultryFish_ICHeader81576456.jpg', 20, '2020-04-27 02:35:10', 0, '0000-00-00 00:00:00', 1),
(25, 'test', 11, ' gg\'s', ' teet', 'uploads/MeatPoultryFish_ICHeader60399478.jpg', 20, '2020-04-27 02:41:55', 0, '0000-00-00 00:00:00', 2),
(26, 'test', 11, 'gg\'s', '     teet', 'uploads/MeatPoultryFish_ICHeader46984767.jpg', 20, '2020-04-27 02:49:48', 0, '0000-00-00 00:00:00', 1),
(27, 'Why do we use it?', 11, 'dd\'s\'s', '     It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).', 'uploads/MeatPoultryFish_ICHeader2220278.jpg', 20, '2020-04-27 02:50:36', 20, '2020-04-28 01:33:07', 1);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` tinyint(2) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `name`) VALUES
(1, 'Active'),
(2, 'Inactive'),
(3, 'Waiting For Approve');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `first_name` varchar(200) NOT NULL,
  `middle_name` varchar(200) NOT NULL,
  `last_name` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `password` varchar(255) NOT NULL,
  `mobile_number` varchar(20) NOT NULL,
  `profile_picture` varchar(250) NOT NULL,
  `user_type_id` tinyint(2) NOT NULL DEFAULT 2
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`users_id`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `mobile_number`, `profile_picture`, `user_type_id`) VALUES
(20, 'md', 'atawur', ' rahman', 'rahmanatawur@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1234567', 'uploads/nusaim96953065.jpg', 1),
(21, 'test', 'test', 'test', 'rahmanatawur1@gmail.com', '25d55ad283aa400af464c76d713c07ad', '1234567', 'uploads/pexels-photo-35529687294207.jpeg', 2),
(22, 'test', 'eet', 'etet', 'rahmanatawur2@gmail.com', '25d55ad283aa400af464c76d713c07ad', '01', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `user_type`
--

CREATE TABLE `user_type` (
  `id` tinyint(2) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_type`
--

INSERT INTO `user_type` (`id`, `name`) VALUES
(1, 'Admin'),
(2, 'Normal User');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Indexes for table `user_type`
--
ALTER TABLE `user_type`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `user_type`
--
ALTER TABLE `user_type`
  MODIFY `id` tinyint(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
