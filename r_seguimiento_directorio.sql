-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-04-2018 a las 00:50:29
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `soporte`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `r_seguimiento_directorio`
--

CREATE TABLE `r_seguimiento_directorio` (
  `id` char(36) COLLATE utf8_spanish_ci NOT NULL,
  `id_usuario` varchar(36) COLLATE utf8_spanish_ci NOT NULL,
  `id_directorio` varchar(36) COLLATE utf8_spanish_ci NOT NULL,
  `comentario` longtext COLLATE utf8_spanish_ci NOT NULL,
  `archivo` longblob,
  `tipo` text COLLATE utf8_spanish_ci,
  `activo` tinyint(1) NOT NULL DEFAULT '1',
  `created` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `r_seguimiento_directorio`
--
ALTER TABLE `r_seguimiento_directorio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_directorio` (`id_directorio`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `r_seguimiento_directorio`
--
ALTER TABLE `r_seguimiento_directorio`
  ADD CONSTRAINT `r_seguimiento_directorio_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `r_seguimiento_directorio_ibfk_3` FOREIGN KEY (`id_directorio`) REFERENCES `directorio` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
