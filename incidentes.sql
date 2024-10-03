-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-09-2024 a las 20:16:53
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bomberos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidentes`
--

CREATE TABLE `incidentes` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `eliminado` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `incidentes`
--

INSERT INTO `incidentes` (`id`, `fecha`, `tipo`, `descripcion`, `eliminado`) VALUES
(1, '2024-09-06', 'Accidente Automovilístico', 'dhweioufj', 0),
(2, '2024-09-06', 'Accidente Automovilístico', 'dhweioufj', 0),
(3, '2024-09-06', 'Accidente Automovilístico', 'dhweioufj', 0),
(4, '2024-09-06', 'Accidente Automovilístico', 'dhweioufj', 0),
(5, '2024-09-11', 'Accidente Automovilístico', 'sjhd', 0),
(6, '2024-09-11', 'Accidente Automovilístico', 'sjhd', 0),
(7, '2024-09-03', 'Accidente Automovilístico', 'sjhd', 0),
(8, '2024-09-03', 'Accidente Automovilístico', 'sjhd', 0),
(9, '2024-09-03', 'Accidente Automovilístico', 'sjhd', 0),
(10, '2024-09-03', 'Accidente Automovilístico', 'sjhd', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `incidentes`
--
ALTER TABLE `incidentes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
