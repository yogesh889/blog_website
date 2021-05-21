-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 05, 2020 at 03:14 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopsky_blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `bid` int(11) NOT NULL,
  `author` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL,
  `likes` int(100) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`bid`, `author`, `image`, `title`, `description`, `date`, `likes`) VALUES
(1, 'Shiva', 'proto.jpg', 'Comparison', 'This blog is for test purpose', '2020-12-05', 0),
(2, 'Shiva', 'apple-3840x2160-ios-10-4k-5k-live-wallpaper-live-photo-mount-macos-12000.jpg', 'web devlopement', 'Nature, in the broadest sense, is the natural, physical, or material world or universe. \"Nature\" can refer to the phenomena of the physical world, and also to life in general. The study of nature is a large, if not the only, part of science. Although humans are part of nature, human activity is often understood as a separate category from other natural phenomena', '2020-12-05', 2),
(3, 'Shiva', 'Free-dark-background-wallpaper.jpg', 'Prototype', 'Test!!', '2020-12-05', 1),
(4, 'Shiva', 'apple-3840x2160-ios-10-4k-5k-live-wallpaper-live-photo-mount-macos-12000.jpg', 'Title', 'Nature, in the broadest sense, is the natural, physical, or material world or universe. \"Nature\" can refer to the phenomena of the physical world, and also to life in general. The study of nature is a large, if not the only, part of science. Although humans are part of nature, human activity is often understood as a separate category from other natural phenomena', '2020-12-05', 0),
(5, 'Shiva', 'grp.jpg', 'Dev', 'Prototype only', '2020-12-05', 0),
(6, 'Shiva', 'person.jpeg', 'ML', '                Within the various uses of the word today             ', '2020-12-05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `coment`
--

CREATE TABLE `coment` (
  `id` varchar(100) NOT NULL,
  `bid` varchar(100) NOT NULL,
  `name` varchar(255) NOT NULL,
  `coment` varchar(1000) NOT NULL,
  `date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coment`
--

INSERT INTO `coment` (`id`, `bid`, `name`, `coment`, `date`) VALUES
('', '', '', '', '2020-12-05'),
('2', '6', 'Shiva', 'Awsm blog!!!', '2020-12-05'),
('3', '2', 'Shiva ', 'Test comment!!', '2020-12-05'),
('3', '3', 'Shiva', 'Cool!!\n', '2020-12-05');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('reader','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `name`, `email`, `password`, `role`) VALUES
(2, 'Shiva', 'abc@gmail.com', '$2y$10$RS8BV9biLVlofRgA3vveYOzWvPp/bKUxLVw7N1Jl6.8.Vaq1QyLIO', 'admin'),
(3, 'Shiva', 'xyz@gmail.com', '$2y$10$RS8BV9biLVlofRgA3vveYOzWvPp/bKUxLVw7N1Jl6.8.Vaq1QyLIO', 'reader');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` varchar(100) NOT NULL,
  `bid` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `bid`) VALUES
('2', '1'),
('3', '3');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`bid`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `bid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
