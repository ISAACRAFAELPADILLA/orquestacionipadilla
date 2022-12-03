-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 02, 2021 at 03:40 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";



-- Database: `formulario_cal`
--

USE `formulario_cal`;

-- --------------------------------------------------------

--
-- Table structure for table `registroCal`
--

DROP TABLE IF EXISTS `registroCal`;
CREATE TABLE `registroCal` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `materia` varchar(50) NOT NULL,
  `nombreProf` varchar(50) NOT NULL,
  `apellidoProf` varchar(50) NOT NULL,
  `completada` char(2) NOT NULL,
  `semestre` varchar(20) NOT NULL,
  `calificacion` int(30) NOT NULL,
);

--
-- Dumping data for table `registroCal`
--

INSERT INTO `registroCal` (`id`, `fecha`, `materia`, `nombreProf`, `apellidoProf`, `completada`, `semestre`, `calificacion`) VALUES
(2, '2022-12-02', 'CIENCIA DE DATOS', 'LAURA', 'GUERRA', 'SI', 'NOVENO', 90);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `registroCal`
--
ALTER TABLE `registroCal`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `registroCal`
--
ALTER TABLE `registroCal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

