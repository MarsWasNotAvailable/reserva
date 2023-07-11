-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jul 11, 2023 at 11:05 AM
-- Server version: 5.7.40
-- PHP Version: 8.0.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `reserva`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

DROP TABLE IF EXISTS `reservations`;
CREATE TABLE IF NOT EXISTS `reservations` (
  `id_reservation` int(11) NOT NULL AUTO_INCREMENT,
  `fk_user` int(11) NOT NULL,
  `fk_room` int(11) NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  PRIMARY KEY (`id_reservation`),
  KEY `room_constraint` (`fk_room`),
  KEY `user_constraint` (`fk_user`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id_reservation`, `fk_user`, `fk_room`, `date_begin`, `date_end`) VALUES
(1, 2, 1, '2023-07-01', '2023-07-31'),
(2, 3, 2, '2023-07-19', '2023-09-21'),
(3, 3, 1, '2023-07-11', '2023-07-11');

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

DROP TABLE IF EXISTS `rooms`;
CREATE TABLE IF NOT EXISTS `rooms` (
  `id_room` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) NOT NULL,
  `image` varchar(120) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id_room`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id_room`, `name`, `image`, `description`) VALUES
(1, 'Australia', 'australia.jpg', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi itaque possimus modi beatae porro qui, ducimus, tenetur, delectus eos quis optio fugit perferendis provident! Voluptatem odit molestias rerum natus nemo!'),
(2, 'Georgia', 'georgia.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Doloremque voluptates rerum fuga ratione similique, distinctio quibusdam reprehenderit fugit quas fugiat! Sit ea ducimus rerum obcaecati itaque cum! Excepturi, quo soluta?'),
(3, 'Brazil', 'brazil.jpg', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Blanditiis odio est dolorem earum beatae nulla officiis fugiat iure, dolores praesentium enim maiores dicta voluptatem consequatur officia quo nobis rem dolorum.'),
(4, 'China', 'china.jpg', 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus, enim quibusdam fugit dignissimos aliquid molestiae? Aspernatur, rerum obcaecati eos ratione autem eaque sit ducimus pariatur dolor tempore repellendus soluta voluptatibus!');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nickname` varchar(45) DEFAULT NULL,
  `role` varchar(30) NOT NULL DEFAULT 'EndUser',
  `current_ip` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `mail`, `password`, `nickname`, `role`, `current_ip`) VALUES
(1, 'superadmin@local', 'pass', 'Super', 'Admin', 'localhost'),
(2, 'wile@acme', 'acme', 'Coyote', 'EndUser', '127.0.0.1'),
(3, 'marge@20', 'homer', 'Marge', 'EndUser', '127.0.0.1'),
(13, 'casejustin@notthefbi.gov', 'secret', 'Justin', 'EndUser', '127.0.0.1'),
(21, 'root', 'root', 'root', 'EndUser', '127.0.0.1'),
(24, 'deleteme@account', 'ok', 'ok', 'EndUser', '127.0.0.1');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `room_constraint` FOREIGN KEY (`fk_room`) REFERENCES `rooms` (`id_room`) ON UPDATE CASCADE,
  ADD CONSTRAINT `user_constraint` FOREIGN KEY (`fk_user`) REFERENCES `users` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
