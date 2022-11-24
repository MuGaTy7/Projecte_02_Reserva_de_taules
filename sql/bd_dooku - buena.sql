-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2022 a las 15:20:13
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_dooku`
--
CREATE DATABASE IF NOT EXISTS `bd_dooku` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish_ci;
USE `bd_dooku`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_incidencia`
--

CREATE TABLE IF NOT EXISTS `tbl_incidencia` (
  `id_inc` int(11) NOT NULL AUTO_INCREMENT,
  `desc_inc` varchar(200) COLLATE utf8mb4_spanish_ci NOT NULL,
  `id_man_fk` int(11) NOT NULL,
  `id_user_fk` int(11) NOT NULL,
  `id_mesa_fk` int(11) NOT NULL,
  PRIMARY KEY (`id_inc`),
  KEY `id_man_fk` (`id_man_fk`),
  KEY `id_user_fk` (`id_user_fk`),
  KEY `id_mesa_fk` (`id_mesa_fk`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_man`
--

CREATE TABLE IF NOT EXISTS `tbl_man` (
  `id_man` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_man` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` char(9) COLLATE utf8mb4_spanish_ci NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_man`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_man`
--

INSERT INTO `tbl_man` (`id_man`, `nombre_man`, `dni`, `username`, `password`) VALUES
(1, 'uiliam', '54987812X', 'luquitas11', '5d56fed4e243d657c6ae1af13adb709690cd7c51'),
(2, 'Alex', '46488089Y', 'alexm', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_mesa`
--

CREATE TABLE IF NOT EXISTS `tbl_mesa` (
  `id_mesa` int(11) NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `capacidad` int(2) NOT NULL,
  `disponibilidad` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_mesa`
--

INSERT INTO `tbl_mesa` (`id_mesa`, `ubicacion`, `capacidad`, `disponibilidad`) VALUES
(1, 'salon', 2, 'Libre'),
(2, 'salon', 2, 'Libre'),
(3, 'salon', 2, 'Libre'),
(4, 'salon', 4, 'Libre'),
(5, 'salon', 4, 'Libre'),
(6, 'salon', 6, 'Libre'),
(7, 'salon', 2, 'Libre'),
(8, 'salon', 4, 'Libre'),
(9, 'salon', 6, 'Libre'),
(10, 'terraza', 2, 'Libre'),
(11, 'terraza', 4, 'Libre'),
(12, 'terraza', 4, 'Libre'),
(13, 'terraza', 4, 'Libre'),
(14, 'terraza', 2, 'Libre'),
(15, 'sala_privada1', 12, 'Libre'),
(16, 'sala_privada1', 12, 'Libre'),
(17, 'sala_privada2', 10, 'Libre'),
(18, 'sala_privada2', 2, 'Libre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_reserva`
--

CREATE TABLE IF NOT EXISTS `tbl_reserva` (
  `id_reserva` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `id_mesa` int(11) NOT NULL,
  `nom_persona` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `apellido_persona` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `telefono_persona` char(9) COLLATE utf8mb4_spanish_ci NOT NULL,
  `hora_inici` datetime NOT NULL DEFAULT current_timestamp(),
  `hora_fi` datetime DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  PRIMARY KEY (`id_reserva`),
  KEY `id_user` (`id_user`),
  KEY `id_mesa` (`id_mesa`)
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_reserva`
--

INSERT INTO `tbl_reserva` (`id_reserva`, `id_user`, `id_mesa`, `nom_persona`, `apellido_persona`, `telefono_persona`, `hora_inici`, `hora_fi`, `duracion`) VALUES
(1, 1, 1, 'Pedro', '', '', '2022-11-07 18:19:14', '2022-11-10 19:40:57', '00:00:00'),
(2, 2, 1, 'Pedro', '', '', '2022-11-07 18:19:26', '2022-11-10 19:40:57', '00:00:00'),
(3, 1, 2, 'asdas', 'das', '654423432', '2022-11-09 18:36:55', '2022-11-10 19:36:28', '00:00:00'),
(4, 1, 1, 'Funcioan', 'profa', '543123121', '2022-11-09 18:37:44', '2022-11-10 19:40:57', '00:00:00'),
(5, 1, 3, 'Italo', 'Marques', '549878121', '2022-11-09 19:30:03', '2022-11-09 19:31:35', '00:00:00'),
(19, 1, 1, 'asd', 'asda', '123456789', '2022-11-11 15:20:46', '2022-11-11 18:16:21', '02:55:35'),
(20, 1, 2, 'Josejuan', 'asdad', '123456789', '2022-11-11 15:20:57', NULL, '00:00:00'),
(21, 1, 3, 'Manel', 'Garcia Moreno', '676272272', '2022-11-11 15:21:26', NULL, '00:00:00'),
(22, 1, 15, 'Alex', 'Garcia Moreno', '123123123', '2022-11-11 17:55:25', '2022-11-11 17:56:03', '00:00:38'),
(23, 1, 3, 'Manel', 'Muga Lopez', '123123123', '2022-11-11 17:58:57', NULL, '00:00:00'),
(24, 1, 5, 'Alex', 'Muga', '123123123', '2022-11-11 18:00:46', '2022-11-11 18:00:59', '00:00:13'),
(25, 1, 1, 'asdsa', 'assda', '123123123', '2022-11-11 18:10:53', '2022-11-11 18:16:21', '00:05:28'),
(26, 1, 1, 'asda', 'asd', '123123123', '2022-11-11 18:12:13', '2022-11-11 18:16:21', '00:04:08'),
(27, 1, 1, 'asda', 'asda', '123123123', '2022-11-11 18:16:38', NULL, NULL),
(28, 1, 1, 'Alex', 'Muga Lopez', '123321123', '2022-11-11 18:20:32', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tbl_user`
--

CREATE TABLE IF NOT EXISTS `tbl_user` (
  `id_user` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_user` varchar(20) COLLATE utf8mb4_spanish_ci NOT NULL,
  `dni` char(9) COLLATE utf8mb4_spanish_ci NOT NULL,
  `username` varchar(10) COLLATE utf8mb4_spanish_ci NOT NULL,
  `password` varchar(256) COLLATE utf8mb4_spanish_ci NOT NULL,
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nombre_user`, `dni`, `username`, `password`) VALUES
(1, 'uiliam', '54987812X', 'uiliam11', '5d56fed4e243d657c6ae1af13adb709690cd7c51'),
(2, 'alex', '63313410E', 'alex11', 'qweQWE123'),
(3, 'alejandro', '05389476R', 'alejandro1', 'qweQWE123'),
(4, 'pedro', '49841030F', 'pedro11', 'qweQWE123'),
(5, 'orlando', '93283549B', 'orlando11', 'qweQWE123');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tbl_incidencia`
--
ALTER TABLE `tbl_incidencia`
  ADD CONSTRAINT `tbl_incidencia_ibfk_1` FOREIGN KEY (`id_user_fk`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_incidencia_ibfk_2` FOREIGN KEY (`id_man_fk`) REFERENCES `tbl_man` (`id_man`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_incidencia_ibfk_3` FOREIGN KEY (`id_mesa_fk`) REFERENCES `tbl_mesa` (`id_mesa`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `tbl_reserva`
--
ALTER TABLE `tbl_reserva`
  ADD CONSTRAINT `tbl_reserva_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `tbl_user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `tbl_reserva_ibfk_2` FOREIGN KEY (`id_mesa`) REFERENCES `tbl_mesa` (`id_mesa`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
