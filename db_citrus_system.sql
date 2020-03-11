-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 11, 2020 at 12:31 AM
-- Server version: 5.7.26
-- PHP Version: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `citrus_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `comment_text` varchar(50) NOT NULL,
  `full_name` varchar(25) NOT NULL,
  `comment_status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `product_id`, `email`, `comment_text`, `full_name`, `comment_status`) VALUES
(1, 1, 'p@p.com', 'adsfdsaf', 'eee', 'unapproved'),
(2, 6, 'pepic_ervin@ervin.de', 'lorem ipsum', 'Ervin Pepic', 'unapproved'),
(3, 6, 'pepic_ervin@ervin.de', 'lorem ipsum', 'Ervin Pepic', 'approved'),
(4, 6, 'e@e.com', 'lksdf;kdafjlda;s', 'eras', 'approved'),
(5, 6, 'pppp@ppp.com', 'lksjhfkljadsf', 'N=Emel', 'approved'),
(6, 2, 'name@example.com', 'Hello World Comment', 'John Doe', 'approved'),
(7, 2, 'email@email.com', 'Hello', 'Another name', 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(5) NOT NULL,
  `product_title` varchar(25) NOT NULL,
  `short_product_description` varchar(50) NOT NULL,
  `product_image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_title`, `short_product_description`, `product_image`) VALUES
(1, 'Ervin Pepic', 'Lorem Ipsum is simply dummy text', 'images/citrus.png'),
(2, 'Emel Pepic', 'Grahovo', 'images/citrus.png'),
(3, 'Erna Pepic', 'Bosna', 'images/citrus.png'),
(4, 'Erna Pepic', 'Bosna', 'images/citrus.png'),
(5, 'Mati Brdjanin', 'Rozaje', 'images/citrus.png'),
(6, 'Neko', 'nesto', 'images/citrus.png'),
(7, 'heheh', 'okoko', 'images/citrus.png'),
(8, 'adsfsadf', 'asdfdsf', 'images/citrus.png'),
(9, 'lkjlkjj', 'ijnhjk', 'images/citrus.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
