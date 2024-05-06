-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2024 at 09:04 PM
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
  `ubicacion` varchar(256) DEFAULT NULL,
  `capacidad` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `espacios`
--

INSERT INTO `espacios` (`espacioID`, `nombreEspacio`, `descripcion`, `tipoEspacio`, `disponibilidad`, `ubicacion`, `capacidad`) VALUES
(111, 'Salas de conferencias', 'Equipadas con tecnología de audio y video para presentaciones y videoconferencias.\r\n', 'Sala', 1, 'Edificio 1, piso 3.', 25),
(112, 'Salas de juntas', 'Espacios más pequeños para reuniones de equipos o discusiones más íntimas.\r\n', 'Sala', 1, 'Edificio 1, piso 3', 10),
(113, 'Salas de trabajo en equipo', 'Equipadas con pizarras, pantallas compartidas y muebles colaborativos para sesiones de lluvia de ideas y trabajo en grupo.\r\n', 'Sala', 1, 'Edificio 2, Piso 4', 50),
(114, 'Salas de entrevistas', 'Espacios discretos para entrevistas de trabajo con candidatos.\r\n', 'Sala', 1, 'Edificio 2, piso 2', 10),
(115, 'Salas de capacitación', 'Espacios equipados con tecnología audiovisual para sesiones de formación y desarrollo.', 'Sala', 1, 'Edificio 1, piso 4.', 30),
(116, 'Oficinas', 'Oficinas privadas para trabajadores que necesitan concentración o privacidad. La cual cuentan con monitor y todo el equipo necesario.', 'Oficina', 1, 'Edificio 3, Piso 3.', 30),
(117, 'Cubículos', 'Espacios semi-privados con divisiones para trabajadores que necesitan un espacio propio pero no una oficina cerrada.', 'Oficina', 0, 'Edifico 3, Piso 3.', 50);

--
-- Triggers `espacios`
--
DELIMITER $$
CREATE TRIGGER `agregar_evaluacion` AFTER INSERT ON `espacios` FOR EACH ROW BEGIN
    INSERT INTO evaluacion_espacio (espacioID_key, meGusta, noGusta)
    VALUES (NEW.espacioID, 0, 0);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `evaluacion_espacio`
--

CREATE TABLE `evaluacion_espacio` (
  `evaluacionID` int(255) NOT NULL,
  `espacioID_key` int(255) NOT NULL,
  `comentarios` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL CHECK (json_valid(`comentarios`)),
  `meGusta` int(255) NOT NULL,
  `noGusta` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `evaluacion_espacio`
--

INSERT INTO `evaluacion_espacio` (`evaluacionID`, `espacioID_key`, `comentarios`, `meGusta`, `noGusta`) VALUES
(1, 111, '[{\"cliente\": \"Maria\", \"comentario\": \"Esta Piola\"}, {\"cliente\": \"Mario\", \"comentario\": \"Esta Piola\"}, {\"cliente\": \"Pedro\", \"comentario\": \"Esta Feo!!!\"}]', 2, 0),
(2, 112, '[{\"cliente\": \"Pedro\", \"comentario\": \"Otro comentario\", \"sala\": \"Nombre de la sala\"}, {\"cliente\": \"Jose\", \"comentario\": \"Esta Piola\"}]', 0, 0),
(3, 113, '[{\"cliente\": \"Juan\", \"comentario\": \"Esta Bien\"}, {\"cliente\": \"Pepe\", \"comentario\": \"Esta Muy Mal\"}]', 0, 0),
(4, 114, '[{\"cliente\": \"Jesus\", \"comentario\": \"Esta buenardo\"}, {\"cliente\": \"Paco\", \"comentario\": \"Vaya si que le faltan cosas\"}, {\"cliente\": \"Russel\", \"comentario\": \"Esta pagina esta horrible\"}]', 0, 0),
(5, 115, '[{\"cliente\": \"OP\", \"comentario\": \"PRUEBA\"}, {\"cliente\": \"Fernando\", \"comentario\": \"Esta mejor que otras salas!!!!\"}]', 0, 0),
(6, 116, '[{\"cliente\": \"Osvaldo\", \"comentario\": \"No esta tan bien :c\"}, {\"cliente\": \"Leonardo\", \"comentario\": \"Esta regular\"}]', 0, 0),
(7, 117, '[{\"cliente\": \"Yes Man\", \"comentario\": \"gud\"}, {\"cliente\": \"Kimbal\", \"comentario\": \"RNC Rules!!\"}]', 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `espacios`
--
ALTER TABLE `espacios`
  ADD PRIMARY KEY (`espacioID`);

--
-- Indexes for table `evaluacion_espacio`
--
ALTER TABLE `evaluacion_espacio`
  ADD PRIMARY KEY (`evaluacionID`),
  ADD KEY `espacioID_key` (`espacioID_key`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `espacios`
--
ALTER TABLE `espacios`
  MODIFY `espacioID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT for table `evaluacion_espacio`
--
ALTER TABLE `evaluacion_espacio`
  MODIFY `evaluacionID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `evaluacion_espacio`
--
ALTER TABLE `evaluacion_espacio`
  ADD CONSTRAINT `evaluacion_espacio_ibfk_1` FOREIGN KEY (`espacioID_key`) REFERENCES `espacios` (`espacioID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
