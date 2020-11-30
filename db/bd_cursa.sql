-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 30-11-2020 a las 17:17:19
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_cursa`
--
CREATE DATABASE IF NOT EXISTS `bd_cursa` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;
USE `bd_cursa`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_categoria`
--

CREATE TABLE `tbl_categoria` (
  `id_categoria` int(11) NOT NULL,
  `nom_categoria` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `edad_categoria` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `sexe_categoria` enum('Home','Dona','Qualsevol') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_categoria`
--

INSERT INTO `tbl_categoria` (`id_categoria`, `nom_categoria`, `edad_categoria`, `sexe_categoria`) VALUES
(1, 'Nens', '8-13', 'Qualsevol'),
(2, 'Junior Masculíí', '14-17', 'Home'),
(3, 'Junior Femení', '14-17', 'Dona'),
(4, 'Senior Masculí', '18-34', 'Home'),
(5, 'Senior Femení', '18-34', 'Dona'),
(6, 'Veterà A Masculí', '35-44', 'Home'),
(7, 'Veterà A Femení', '35-44', 'Dona'),
(8, 'Veterà B Masculí', '45-54', 'Home'),
(9, 'Veterà B Femení', '45-54', 'Dona'),
(10, 'Veterà C Masculí', '55-64', 'Home'),
(11, 'Veterà C Masculí', '55-64', 'Dona'),
(12, 'Veterà D Masculí', '>=65', 'Home'),
(13, 'Veterà D Femení', '>=65', 'Dona'),
(14, 'Discapacitat Masculí', 'Qualsevol', 'Home'),
(15, 'Discapacitat Femení', 'Qualsevol', 'Dona');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_cursa`
--

CREATE TABLE `tbl_cursa` (
  `id_cursa` int(11) NOT NULL,
  `nom_cursa` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data_cursa` date DEFAULT NULL,
  `lloc_cursa` varchar(70) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_cursa`
--

INSERT INTO `tbl_cursa` (`id_cursa`, `nom_cursa`, `data_cursa`, `lloc_cursa`) VALUES
(1, 'Bellvitge', '2021-03-12', 'Parc de Bellvitge');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_inscripcio`
--

CREATE TABLE `tbl_inscripcio` (
  `dorsal_inscripcio` int(11) NOT NULL,
  `pagada_inscripcio` enum('Si','No') COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_cursa` int(11) NOT NULL,
  `dni_participant` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_inscripcio`
--

INSERT INTO `tbl_inscripcio` (`dorsal_inscripcio`, `pagada_inscripcio`, `id_cursa`, `dni_participant`, `id_categoria`) VALUES
(5, NULL, 1, '48067875Z', 15),
(6, NULL, 1, '24266219T', 8),
(11, NULL, 1, '21771148S', 4),
(17, NULL, 1, '45153526H', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_participant`
--

CREATE TABLE `tbl_participant` (
  `dni_participant` varchar(9) COLLATE utf8_unicode_ci NOT NULL,
  `nom_participant` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `cognom1_participant` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cognom2_participant` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `email_participant` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `data_naix_participant` date NOT NULL,
  `sexe_participant` enum('Home','Dona') COLLATE utf8_unicode_ci NOT NULL,
  `discapacitat_particiopant` enum('Si','No') COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tbl_participant`
--

INSERT INTO `tbl_participant` (`dni_participant`, `nom_participant`, `cognom1_participant`, `cognom2_participant`, `email_participant`, `data_naix_participant`, `sexe_participant`, `discapacitat_particiopant`) VALUES
('21771148S', 'Xavier', 'Barrios', 'Rodriguez', 'xavier@gmail.com', '1999-01-18', 'Home', 'No'),
('24266219T', 'Alex', 'DFEF', 'ERFRF', 'alex-rodri@hotmail.es', '1969-11-28', 'Home', 'No'),
('45153526H', 'Alex', 'fvfv', 'fvfv', 'alex-rodri@hotmail.es', '1999-03-13', 'Home', 'No'),
('48067875Z', 'Pablo', 'Rodriguez', 'Rodriguez', 'pablo@pablo.com', '1997-06-06', 'Dona', 'Si');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `tbl_cursa`
--
ALTER TABLE `tbl_cursa`
  ADD PRIMARY KEY (`id_cursa`);

--
-- Indices de la tabla `tbl_inscripcio`
--
ALTER TABLE `tbl_inscripcio`
  ADD PRIMARY KEY (`dorsal_inscripcio`),
  ADD KEY `id_cursa` (`id_cursa`),
  ADD KEY `dni_participant` (`dni_participant`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `tbl_participant`
--
ALTER TABLE `tbl_participant`
  ADD PRIMARY KEY (`dni_participant`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tbl_categoria`
--
ALTER TABLE `tbl_categoria`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `tbl_cursa`
--
ALTER TABLE `tbl_cursa`
  MODIFY `id_cursa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tbl_inscripcio`
--
ALTER TABLE `tbl_inscripcio`
  MODIFY `dorsal_inscripcio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_inscripcio`
--
ALTER TABLE `tbl_inscripcio`
  ADD CONSTRAINT `dni_participant` FOREIGN KEY (`dni_participant`) REFERENCES `tbl_participant` (`dni_participant`),
  ADD CONSTRAINT `id_categoria` FOREIGN KEY (`id_categoria`) REFERENCES `tbl_categoria` (`id_categoria`),
  ADD CONSTRAINT `id_cursa` FOREIGN KEY (`id_cursa`) REFERENCES `tbl_cursa` (`id_cursa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
