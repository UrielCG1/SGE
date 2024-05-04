-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2024 at 11:11 PM
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
-- Database: `db_test`
--

-- --------------------------------------------------------

--
-- Table structure for table `espacios`
--

CREATE TABLE `espacios` (
  `espacioID` int(255) NOT NULL,
  `nombreEspacio` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `tipoEspacio` varchar(50) NOT NULL,
  `disponibilidad` tinyint(1) NOT NULL,
  `ESPACIOScol` varchar(45) NOT NULL,
  `EVALUACION` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `espacios`
--

INSERT INTO `espacios` (`espacioID`, `nombreEspacio`, `descripcion`, `tipoEspacio`, `disponibilidad`, `ESPACIOScol`, `EVALUACION`) VALUES
(103, 'Salas de conferencias', 'Equipadas con tecnología de audio y video para presentaciones y videoconferencias.\r\n', 'Sala', 1, 'uwu', 10),
(104, 'Salas de juntas', 'Espacios más pequeños para reuniones de equipos o discusiones más íntimas.\r\n', 'Sala', 1, 'uwu', 10),
(105, 'Salas de trabajo en equipo', 'Equipadas con pizarras, pantallas compartidas y muebles colaborativos para sesiones de lluvia de ideas y trabajo en grupo.\r\n', 'Sala', 1, 'UWU', 8),
(106, 'Salas de entrevistas', 'Espacios discretos para entrevistas de trabajo con candidatos.\r\n', 'Sala', 1, 'uwu', 7),
(107, 'Salas de capacitación', 'Espacios equipados con tecnología audiovisual para sesiones de formación y desarrollo.\r\n', 'Sala', 1, 'xd', 9),
(108, 'Oficinas', 'Oficinas privadas para trabajadores que necesitan concentración o privacidad. La cual cuentan con monitor y todo el equipo necesario.\r\n', 'Oficina', 1, 'AMLO', 8),
(109, 'Cubículos', 'Espacios semi-privados con divisiones para trabajadores que necesitan un espacio propio pero no una oficina cerrada.', 'Cubículos', 0, 'lol', 10);

-- --------------------------------------------------------

--
-- Table structure for table `evaluacion_espacio`
--

CREATE TABLE `evaluacion_espacio` (
  `evaluacionID` int(255) NOT NULL,
  `puntuacion` int(255) NOT NULL,
  `comentario` varchar(1024) NOT NULL,
  `fechaHora` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `evaluacionEspacioCol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `espacios`
--
ALTER TABLE `espacios`
  ADD PRIMARY KEY (`espacioID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `espacios`
--
ALTER TABLE `espacios`
  MODIFY `espacioID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
