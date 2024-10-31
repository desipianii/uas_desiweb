-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2024 at 05:24 PM
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
-- Database: `uas5a`
--

-- --------------------------------------------------------

--
-- Table structure for table `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `isi` varchar(255) NOT NULL,
  `kategori` enum('Technology','LifeStyle') NOT NULL,
  `author` varchar(255) NOT NULL,
  `tanggal_publikasi` date NOT NULL,
  `images` varchar(255) NOT NULL,
  `views` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `isi`, `kategori`, `author`, `tanggal_publikasi`, `images`, `views`) VALUES
(10, 'Curated Collection Post : 8 Examples of Evolution in Action', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur accusamus voluptas. Mollitia, natus ipsam maiores placeat elit.', 'Technology', 'Johnson Smith', '2024-10-31', 'uploads/1730385405_8.jpg', 15),
(11, 'The Key Benefits of Studying Online [Infographic]', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur accusamus voluptas. Mollitia, natus ipsam maiores beatae elit.', 'Technology', 'Johnson Smith', '2024-10-30', 'uploads/1730380924_9.jpg', 3),
(12, 'How to Write a Blog Post: A Step-by-Step Guide', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur accusamus voluptas. Mollitia, natus ipsam maiores beatae elit.', 'Technology', 'Johnson Smith', '2024-10-31', 'uploads/1730380973_16.jpg', 5),
(13, 'Ivy Goes Mobile With New App for Designers', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur accusamus voluptas. Mollitia, natus ipsam maiores beatae elit.', 'Technology', 'Johnson Smith', '2024-10-30', 'uploads/1730381031_14.jpg', 2),
(14, 'What I Wish I Had Known Before Writing My First Book', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Incidunt tenetur accusamus voluptas. Mollitia, natus ipsam maiores beatae elit.', 'Technology', 'Johnson Smith', '2024-10-31', 'uploads/1730382177_15.jpg', 1),
(15, 'Here are a few tips that will help you to get started about lifestyle', 'Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi vitae sit.', 'Technology', 'Johnson Smith', '2024-10-31', 'uploads/1730382280_p2.jpg', 1),
(16, 'Before you start writing first blog post, you should make a content plan.', 'Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi vitae sit.', 'LifeStyle', 'Johnson Smith', '2024-10-30', 'uploads/1730382391_p1.jpg', 1),
(17, 'Guidelines to help you decide what your blog post should be about.', 'Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi vitae sit.\r\n\r\n', 'LifeStyle', 'Johnson Smith', '2024-10-31', 'uploads/1730382557_p4.jpg', 4),
(18, 'Now, Make money from blogging in easy steps', 'Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi vitae sit.', 'LifeStyle', 'Johnson Smith', '2024-10-30', 'uploads/1730382611_p3.jpg', 1),
(19, 'Many ways by which your blog can earn passive income for you.', 'Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi vitae sit.', 'LifeStyle', 'Johnson Smith', '2024-10-30', 'uploads/1730382668_p7.jpg', 1),
(20, 'Keyword research for dummies using the Google Keyword tool', 'Lorem ipsum dolor sit amet consectetur ipsum adipisicing elit. Qui eligendi vitae sit.', 'LifeStyle', 'Johnson Smith', '2024-10-31', 'uploads/1730382726_p8.jpg', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
