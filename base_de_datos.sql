-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 08-08-2023 a las 21:54:09
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `university`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materia`
--

DROP TABLE IF EXISTS `materia`;
CREATE TABLE IF NOT EXISTS `materia` (
  `ma_id` int NOT NULL AUTO_INCREMENT,
  `ma_nombre` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `ma_profesor` int DEFAULT NULL,
  PRIMARY KEY (`ma_id`),
  KEY `cl_profesor` (`ma_profesor`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `materia`
--

INSERT INTO `materia` (`ma_id`, `ma_nombre`, `ma_profesor`) VALUES
(1, 'Matemáticas', 3),
(2, 'Historia', NULL),
(3, 'Ciencias Naturales', 3),
(4, 'Literatura', NULL),
(5, 'Educación Física 2', 2),
(6, 'Arte', 2),
(7, 'Geografía', 3),
(8, 'Inglés', 2),
(9, 'Informática', 3),
(10, 'Economía', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

DROP TABLE IF EXISTS `permisos`;
CREATE TABLE IF NOT EXISTS `permisos` (
  `pe_id` int NOT NULL AUTO_INCREMENT,
  `pe_descripcion` varchar(20) NOT NULL,
  PRIMARY KEY (`pe_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `permisos`
--

INSERT INTO `permisos` (`pe_id`, `pe_descripcion`) VALUES
(1, 'Administrador'),
(2, 'Maestro'),
(3, 'Alumno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seleccion`
--

DROP TABLE IF EXISTS `seleccion`;
CREATE TABLE IF NOT EXISTS `seleccion` (
  `se_id` int NOT NULL AUTO_INCREMENT,
  `se_alumno` int NOT NULL,
  `se_materia` int NOT NULL,
  `se_nota` int NOT NULL,
  `se_mensaje` text NOT NULL,
  PRIMARY KEY (`se_id`),
  KEY `se_alumno` (`se_alumno`),
  KEY `se_materia` (`se_materia`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `seleccion`
--

INSERT INTO `seleccion` (`se_id`, `se_alumno`, `se_materia`, `se_nota`, `se_mensaje`) VALUES
(1, 5, 5, 0, ''),
(2, 5, 10, 0, ''),
(3, 6, 5, 0, '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE IF NOT EXISTS `usuario` (
  `us_id` int NOT NULL AUTO_INCREMENT,
  `us_name` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `us_lastname` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `us_dni` varchar(11) NOT NULL,
  `us_addres` varchar(50) NOT NULL,
  `us_birth` date NOT NULL,
  `us_email` varchar(25) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `us_password` varchar(80) NOT NULL,
  `us_permiso` int NOT NULL,
  `us_status` bit(1) NOT NULL,
  PRIMARY KEY (`us_id`),
  KEY `us_permiso` (`us_permiso`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`us_id`, `us_name`, `us_lastname`, `us_dni`, `us_addres`, `us_birth`, `us_email`, `us_password`, `us_permiso`, `us_status`) VALUES
(1, 'Benjamin', 'Tavarez', '40211570867', 'c/ 23 #13 Los prados', '1998-03-13', 'benjamin@gmail.com', 'admin', 1, b'1'),
(2, 'Harold', 'Carazas', '541287451', 'Av. Circunvalacion #100 cala 81', '2000-08-09', 'harold@gmail.com', 'admin', 2, b'1'),
(3, 'Robienson', 'Martinez', '5463213', 'al lado de la mia', '2023-08-14', 'robinson@gmail.com', 'admin', 2, b'1'),
(4, 'pedro', 'Gutierrez', '63456942', 'arriva de la mia', '2023-08-04', 'pedro@gmail.com', 'admin', 2, b'1'),
(5, 'Brayan', 'Gutierrez', '6543213', 'Calle penetracion km 15', '2023-08-01', 'brayan@gmail.com', 'admin', 3, b'1'),
(6, 'kenin', 'egass', '65498765', 'bellin colorado 515', '2013-08-06', 'kevin@gmail.com', 'admin', 3, b'1');

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_materia_profe_alumno`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_materia_profe_alumno`;
CREATE TABLE IF NOT EXISTS `vista_materia_profe_alumno` (
`ma_id` int
,`ma_nombre` varchar(50)
,`ma_profesor_id` int
,`us_name` varchar(41)
,`cantidad` bigint
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vista_profesor_materia`
-- (Véase abajo para la vista actual)
--
DROP VIEW IF EXISTS `vista_profesor_materia`;
CREATE TABLE IF NOT EXISTS `vista_profesor_materia` (
`us_id` int
,`us_name` varchar(20)
,`us_email` varchar(25)
,`us_addres` varchar(50)
,`us_birth` date
,`materias` text
,`materia_id` text
);

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_materia_profe_alumno`
--
DROP TABLE IF EXISTS `vista_materia_profe_alumno`;

DROP VIEW IF EXISTS `vista_materia_profe_alumno`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_materia_profe_alumno`  AS SELECT `m`.`ma_id` AS `ma_id`, `m`.`ma_nombre` AS `ma_nombre`, `m`.`ma_profesor` AS `ma_profesor_id`, concat(`u`.`us_name`,' ',`u`.`us_lastname`) AS `us_name`, count(`s`.`se_materia`) AS `cantidad` FROM ((`materia` `m` left join `seleccion` `s` on((`m`.`ma_id` = `s`.`se_materia`))) left join `usuario` `u` on((`m`.`ma_profesor` = `u`.`us_id`))) GROUP BY `m`.`ma_id``ma_id`  ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vista_profesor_materia`
--
DROP TABLE IF EXISTS `vista_profesor_materia`;

DROP VIEW IF EXISTS `vista_profesor_materia`;
CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vista_profesor_materia`  AS SELECT `usuario`.`us_id` AS `us_id`, `usuario`.`us_name` AS `us_name`, `usuario`.`us_email` AS `us_email`, `usuario`.`us_addres` AS `us_addres`, `usuario`.`us_birth` AS `us_birth`, group_concat(`materia`.`ma_nombre` separator ', ') AS `materias`, group_concat(`materia`.`ma_id` separator ', ') AS `materia_id` FROM (`usuario` left join `materia` on((`materia`.`ma_profesor` = `usuario`.`us_id`))) WHERE (`usuario`.`us_permiso` = 2) GROUP BY `usuario`.`us_id``us_id`  ;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `seleccion`
--
ALTER TABLE `seleccion`
  ADD CONSTRAINT `seleccion_ibfk_1` FOREIGN KEY (`se_alumno`) REFERENCES `usuario` (`us_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `seleccion_ibfk_2` FOREIGN KEY (`se_materia`) REFERENCES `materia` (`ma_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`us_permiso`) REFERENCES `permisos` (`pe_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
