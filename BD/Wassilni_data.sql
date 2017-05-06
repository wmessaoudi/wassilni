-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2017 at 08:31 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wassilni`
--

--
-- Dumping data for table `covoiturage`
--

INSERT INTO `covoiturage` (`id`, `img`, `prix`, `username`, `email`, `num_tel`, `info`, `places`, `date_p`, `dep`, `arr`) VALUES
(6, 'uploads/wissal.jpg', 10, 'wissal', 'test@gmail.com', '12345678', 'Test', 4, '2017-12-12', 'Ariana', 'Jendouba'),
(7, 'uploads/wissal.jpg', 10, 'wissal', 'test@gmail.com', '12345678', 'Test 2', 4, '2017-12-12', 'Jendouba', 'Tunis');

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`id`, `username`, `password`, `nom`, `prenom`, `img`) VALUES
(68, 'wissal', 'wissal', 'wissal', 'wissal', 'uploads/wissal.jpg');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
