-- phpMyAdmin SQL Dump
-- version 5.1.4
-- https://www.phpmyadmin.net/
--
-- Host: mysql-chelsey.alwaysdata.net
-- Generation Time: Aug 12, 2022 at 05:45 PM
-- Server version: 10.6.7-MariaDB
-- PHP Version: 7.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chelsey_festiv_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `content` text NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `created`, `modified`, `content`, `user_id`, `post_id`) VALUES
(16, '2022-08-10 16:18:44', '2022-08-10 16:18:44', 'ca va être énorme !', 13, 24),
(5, '2022-08-06 15:37:37', '2022-08-06 15:37:37', 'belle photo', 19, 11),
(14, '2022-08-10 15:57:16', '2022-08-10 15:57:16', 'j\'ai hâte ! :)', 18, 24),
(9, '2022-08-10 12:24:52', '2022-08-10 12:24:52', '      salut      o   ', 13, 23),
(10, '2022-08-10 12:25:16', '2022-08-10 12:25:16', 'nice', 13, 23),
(11, '2022-08-10 12:29:17', '2022-08-10 12:29:17', 'oui', 13, 23),
(12, '2022-08-10 12:29:28', '2022-08-10 12:29:28', '      waaaaaw          ', 13, 23),
(13, '2022-08-10 12:30:02', '2022-08-10 12:30:02', '           niiiiice     ', 13, 23),
(17, '2022-08-12 14:44:47', '2022-08-12 14:44:47', 'je suis d\'accord', 13, 26);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `created`, `modified`, `user_id`, `post_id`) VALUES
(82, '2022-08-12 14:38:32', '2022-08-12 14:38:32', 13, 17),
(47, '2022-08-10 16:22:08', '2022-08-10 16:22:08', 15, 24),
(52, '2022-08-10 16:30:54', '2022-08-10 16:30:54', 15, 28),
(74, '2022-08-12 14:08:02', '2022-08-12 14:08:02', 13, 26),
(40, '2022-08-10 16:04:57', '2022-08-10 16:04:57', 19, 26),
(79, '2022-08-12 14:35:53', '2022-08-12 14:35:53', 13, 30),
(83, '2022-08-12 14:44:14', '2022-08-12 14:44:14', 13, 11),
(15, '2022-08-06 09:31:23', '2022-08-06 09:31:23', 14, 17),
(39, '2022-08-10 16:01:19', '2022-08-10 16:01:19', 19, 24),
(49, '2022-08-10 16:22:14', '2022-08-10 16:22:14', 15, 26),
(41, '2022-08-10 16:06:05', '2022-08-10 16:06:05', 19, 17),
(38, '2022-08-10 15:53:02', '2022-08-10 15:53:02', 18, 17),
(43, '2022-08-10 16:08:49', '2022-08-10 16:08:49', 13, 24),
(37, '2022-08-10 15:50:55', '2022-08-10 15:50:55', 18, 24),
(32, '2022-08-07 13:28:24', '2022-08-07 13:28:24', 13, 11),
(80, '2022-08-12 14:36:14', '2022-08-12 14:36:14', 13, 17),
(36, '2022-08-10 15:50:51', '2022-08-10 15:50:51', 18, 25),
(51, '2022-08-10 16:26:00', '2022-08-10 16:26:00', 15, 25),
(54, '2022-08-10 16:34:52', '2022-08-10 16:34:52', 20, 17),
(55, '2022-08-10 16:34:56', '2022-08-10 16:34:56', 20, 23),
(56, '2022-08-10 16:35:04', '2022-08-10 16:35:04', 20, 28),
(58, '2022-08-10 16:56:22', '2022-08-10 16:56:22', 21, 17),
(61, '2022-08-10 17:21:22', '2022-08-10 17:21:22', 21, 25),
(60, '2022-08-10 17:13:40', '2022-08-10 17:13:40', 21, 24),
(85, '2022-08-12 15:07:50', '2022-08-12 15:07:50', 23, 17),
(84, '2022-08-12 15:07:01', '2022-08-12 15:07:01', 23, 32);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `content` text NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `created`, `modified`, `content`, `receiver_id`, `sender_id`) VALUES
(2, '2022-08-06 18:11:45', '2022-08-06 18:11:45', 'salut', 13, 18),
(3, '2022-08-06 18:12:34', '2022-08-06 18:12:34', 'bonjour jules', 18, 13),
(4, '2022-08-06 19:34:32', '2022-08-06 19:34:32', 'juste un test', 15, 13),
(5, '2022-08-06 21:28:59', '2022-08-06 21:28:59', 'comment vas tu jules ? ', 18, 13),
(6, '2022-08-06 21:39:35', '2022-08-06 21:39:35', 'moi je vais bien ', 18, 13);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `content` varchar(250) NOT NULL,
  `description` text DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `created`, `modified`, `content`, `description`, `user_id`) VALUES
(11, '2022-08-02 15:20:37', '2022-08-10 16:10:08', 'user-1659453637.jpg', 'super soirée passée au festival Lollapalooza', 13),
(27, '2022-08-10 16:25:49', '2022-08-10 16:25:49', 'user-1660148749.jpg', 'On vous attend ! Venez vite ;)', 15),
(28, '2022-08-10 16:30:50', '2022-08-10 16:30:50', 'user-1660149050.jpg', 'J\'espere que vous avez bien aimé l\'échauffement  les amis', 15),
(29, '2022-08-10 16:33:24', '2022-08-10 16:33:24', 'user-1660149204.jpg', 'On espère que vous avez kiffé ! ;)', 15),
(30, '2022-08-10 16:33:52', '2022-08-10 16:33:52', 'user-1660149232.jpg', 'Il faisait tres chaud hier ! Les artistes ont tout déchiré', 15),
(17, '2022-08-05 09:30:02', '2022-08-10 15:52:58', 'user-1659691802.jpg', 'Souvenir 2022 à un festival aux Etats-Unis !! ', 18),
(26, '2022-08-10 16:04:49', '2022-08-10 16:04:49', 'user-1660147489.jpg', 'Nous allons envoyer du lourd cette année ! ', 19),
(23, '2022-08-07 16:57:43', '2022-08-07 16:57:43', 'user-1659891463.jpg', 'trop trop trop trop trop cool', 14),
(24, '2022-08-10 15:36:00', '2022-08-10 15:36:00', 'user-1660145760.jpg', 'Tenez-vous prêts le festival solidays va bientôt ouvrir ses portes', 21),
(25, '2022-08-10 15:50:25', '2022-08-10 15:50:25', 'user-1660146625.jpg', '/!\\ ALERTE  /!\\ \r\nSolidays ouvrent ses portes dans 10jours !', 21),
(31, '2022-08-12 14:46:53', '2022-08-12 14:46:53', 'user-1660315613.jpg', '#joie', 13),
(32, '2022-08-12 15:00:51', '2022-08-12 15:00:51', 'user-1660316451.jpg', 'le meilleur pour la fin', 13),
(33, '2022-08-12 15:22:06', '2022-08-12 15:22:06', 'user-1660317726.jpg', 'mon tout premier festival ! ', 23);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `festival` tinyint(1) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `password` varchar(150) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `photo` varchar(250) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `email` varchar(150) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `created`, `modified`, `festival`, `pseudo`, `password`, `firstname`, `lastname`, `photo`, `description`, `email`) VALUES
(19, '2022-08-06 15:33:01', '2022-08-10 16:05:50', 1, 'lollapalooza', '$2y$10$EY7Tqv.ksHUDslWRo97SiOe/WFdnFdDXSEZzPqAID5MGTTPDQomXq', 'lollapalooza', 'lollapalooza', 'user-19-1660147333.png', 'Lollapalooza Paris revient à l\'hippodrome ParisLongchamp les samedi 16 et dimanche 17 aout 2022 ', 'lollapalooza@gmail.com'),
(18, '2022-08-05 06:34:59', '2022-08-10 16:00:21', 0, 'jules', '$2y$10$w98sY8FYLAQG2H3okPGIiu3sZa5/ipfDCysXmi85DCwzqztk61ch6', 'jules', 'jules', NULL, 'Salut je suis jules :)', 'jules@gmail.fr'),
(17, '2022-08-04 08:02:36', '2022-08-04 08:02:36', 0, 'bob', '$2y$10$pP4.Z1EM4MU.EByp5szJeO3yjpeTXXtRy55Ny/E16eGlf.TyO4qs2', 'bob', 'bob', NULL, NULL, 'bob@gmail.com'),
(15, '2022-08-03 08:02:13', '2022-08-10 16:24:23', 1, 'garorock', '$2y$10$3H77aTfUC/Kl1qwD3HL00uBSV08xe16X7FNhdxvcDtEwLZbJ6Lkfe', 'garorock', 'garorock', 'user-15-1660148579.jpg', 'Garorock est l\'un des plus gros festivals de l\'hexagone! Un mélange entre la musique pop, rock, electro et techno !!', 'garorock@gmail.com'),
(14, '2022-08-03 07:49:24', '2022-08-07 15:46:58', 0, 'paul', '$2y$10$ISV7CTvi7WlzWbg1/ZIXAepFHJEVt4uSvjPD6W6n/pTg1yv2nF6P2', 'paul', 'paul', 'user-14-1659887218.jpg', '', 'paul@gmail.com'),
(13, '2022-08-02 13:39:43', '2022-08-12 14:45:40', 0, 'luc', '$2y$10$zN9qfQcLXl9weM1w9wDJUuBL1q4ZceYonedH5kJTHNW/SuzzyxjaO', 'luc', 'luc', 'user-13-1659878201.jpg', 'salut je suis lucas !', 'luc@gmail.com'),
(20, '2022-08-10 11:58:35', '2022-08-10 16:34:34', 0, 'lola', '$2y$10$Q.EXLSoBpfG2HEGBcY.mjeCeScRnR/TevsHsC7mhS3uOmedSqKh6O', 'lola', 'lola', 'user-20-1660149274.jpg', NULL, 'lola@gmail.com'),
(21, '2022-08-10 15:06:38', '2022-08-10 16:56:09', 1, 'solidays', '$2y$10$nd3jbsAKJ57q8IVxdXotSOJf5u6dHq2OPZQut/MeNKnAGwcD63OSC', 'solidays', 'solidays', 'user-21-1660144450.webp', 'Solidays est un festival de musique organisé par l’association Solidarité sida ', 'solidays@gmail.com'),
(22, '2022-08-12 11:53:11', '2022-08-12 11:53:11', 0, 'rilbo', '$2y$10$/UE9nIM5pxBTzrB2bVooGOdFCv3hx4a3yI5qRIxG.LjpHRYqBPuoG', 'Muller', 'Valentin', NULL, NULL, 'valmuller14@gmail.com'),
(23, '2022-08-12 15:06:31', '2022-08-12 15:22:52', 0, 'jean', '$2y$10$5L1ixlilIV0XuxNw3vZmQuRxk4PWaaXF9jpab36bcPVERf6WidSaC', 'jean', 'jean', NULL, 'salut c\'est Jean ! :)', 'jean@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
