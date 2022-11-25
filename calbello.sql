-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 25, 2022 at 02:29 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calbello`
--
CREATE DATABASE IF NOT EXISTS `calbello` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `calbello`;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
--

CREATE TABLE `clientes` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `CONTRASEÑA` varchar(30) NOT NULL,
  `EMAIL` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `clientes`
--

INSERT INTO `clientes` (`ID`, `NOMBRE`, `CONTRASEÑA`, `EMAIL`) VALUES
(1, 'admin', 'admin', 'admin@admin.ad'),
(10, 'USER1', '123', 'USER@USER.e'),
(11, 'USER2', '1234', 'USER2@USER2.com'),
(16, 'jorge', '123', 'jorge@jorge.e');

-- --------------------------------------------------------

--
-- Table structure for table `reservas`
--

CREATE TABLE `reservas` (
  `ID` int(11) NOT NULL,
  `IDTRABAJADOR` int(11) NOT NULL,
  `IDCLIENTE` int(11) NOT NULL,
  `HORA` varchar(11) NOT NULL,
  `DIA` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `trabajadores`
--

CREATE TABLE `trabajadores` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `CONTRASEÑA` varchar(30) NOT NULL,
  `ESTADO` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `trabajadores`
--

INSERT INTO `trabajadores` (`ID`, `NOMBRE`, `CONTRASEÑA`, `ESTADO`) VALUES
(1, 'Carlos', 'work', 'ACTIVO'),
(2, 'Silvia', 'work', 'ACTIVO'),
(3, 'Jose', 'work', 'INACTIVO'),
(4, 'Luis', '1234', 'ACTIVO'),
(5, 'Josefina', '1234', 'ACTIVO'),
(6, 'Ignasi', 'work', 'ACTIVO'),
(7, 'Carlitos', 'work', 'ACTIVO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `reservas`
--
ALTER TABLE `reservas`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ID_con_clientes` (`IDCLIENTE`),
  ADD KEY `fk_ID_con_trabajadores` (`IDTRABAJADOR`);

--
-- Indexes for table `trabajadores`
--
ALTER TABLE `trabajadores`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `reservas`
--
ALTER TABLE `reservas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `trabajadores`
--
ALTER TABLE `trabajadores`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservas`
--
ALTER TABLE `reservas`
  ADD CONSTRAINT `fk_ID_con_clientes` FOREIGN KEY (`IDCLIENTE`) REFERENCES `clientes` (`ID`),
  ADD CONSTRAINT `fk_ID_con_trabajadores` FOREIGN KEY (`IDTRABAJADOR`) REFERENCES `trabajadores` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
