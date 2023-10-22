-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 22-10-2023 a las 22:06:00
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
-- Base de datos: `pt04_mario_flores`
--
CREATE DATABASE IF NOT EXISTS `pt04_mario_flores` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pt04_mario_flores`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articles`
--

CREATE TABLE `articles` (
  `id` int(10) NOT NULL,
  `article` text NOT NULL,
  `email` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `articles`
--

INSERT INTO `articles` (`id`, `article`, `email`) VALUES
(1, 'Bola de Drac:', NULL),
(2, 'Anem-la a buscar, la bola del drac.', NULL),
(3, 'Envoltada en un misteri, és un gran secret.', NULL),
(4, 'Anem-la a agafar, la bola del drac.', NULL),
(5, 'Entre tots els misteris, el més divertit.', NULL),
(6, 'És un món d\'encís, un país encantat', NULL),
(7, 'on, contents, tots nosaltres, ara hi farem cap.', NULL),
(8, 'En moltes coses precioses ara ens podrem transformar,', NULL),
(9, 'travessar l\'espai amb un núvol i, així, poder viatjar.', NULL),
(10, 'L\'aventura comença ara:', NULL),
(11, 'anem-la a buscar, anem, anem, anem, anem!', NULL),
(12, 'Anirem per mars i muntanyes, i per tot l\'univers,', NULL),
(13, 'intentant aconseguir la bola d\'un drac meravellós,', NULL),
(14, 'i, així, la bola del drac,', NULL),
(15, 'per fi serà nostra.', NULL),
(16, 'Intentem-ho sense cap por:', NULL),
(17, 'units a Goku no hi ha cap perill.', NULL),
(18, 'Els meus cops i el meu kame-hame', NULL),
(19, 'a tots impressionen sempre. Ara ho veureu.', NULL),
(20, 'Anem-la a caçar, la bola del drac.', NULL),
(21, 'Ens durà la sort: no es pot escapar.', NULL),
(22, 'Anem-la a trobar, la bola del drac.', NULL),
(23, 'Serà per a nosaltres si allarguem la mà.', NULL),
(24, 'És un món d\'encís, un país encantat', NULL),
(25, 'on, contents, tots nosaltres, ara hi farem cap.', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(30) NOT NULL,
  `contraseña` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `contraseña`) VALUES
('mflores@gmail.com', '$2y$10$wtoZfe9xwx2W5EwFLqU.x.fvYbumTZWTMAmoZ7rkepl/pnv3Yhhmy'),
('termineitor444xd@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_articles_email` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articles`
--
ALTER TABLE `articles`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articles`
--
ALTER TABLE `articles`
  ADD CONSTRAINT `fk_articles_email` FOREIGN KEY (`email`) REFERENCES `usuarios` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
