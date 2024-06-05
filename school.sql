-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 05-06-2024 a las 02:29:02
-- Versión del servidor: 8.0.36-0ubuntu0.20.04.1
-- Versión de PHP: 7.4.3-4ubuntu2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `school`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumnos`
--

CREATE TABLE `alumnos` (
  `id_alumno` int NOT NULL,
  `nombre_completo` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `genero` enum('Masculino','Femenino','Otro') DEFAULT NULL,
  `latitud` decimal(10,8) DEFAULT NULL,
  `longitud` decimal(11,8) DEFAULT NULL,
  `id_grado` int DEFAULT NULL,
  `id_seccion` int DEFAULT NULL,
  `id_school` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `alumnos`
--

INSERT INTO `alumnos` (`id_alumno`, `nombre_completo`, `direccion`, `telefono`, `email`, `foto`, `genero`, `latitud`, `longitud`, `id_grado`, `id_seccion`, `id_school`) VALUES
(26, 'joaquin ernesto rodriguez polanco', 'Calle San Luis La Planta Col Argentina Psj Catamarca Casa 13a', '75935776', 'joakinpolanco199726@gmail.com', '/school/public_html/fotos/WhatsApp Image 2024-01-05 at 1.44.24 PM.jpeg', 'Masculino', '13.36824325', '-88.63769531', 4, 2, 12),
(31, 'Melo Express', 'Calle San Luis La Planta Col Argentina Psj Catamarca Casa 13a', '75935776', 'MELO@gmail.com', '/school/public_html/fotos/1712280758.png', 'Masculino', '15.79225357', '-90.70312500', 1, 2, 21),
(32, 'UNICAES', 'Calle San Luis La Planta Col Argentina Psj Catamarca Casa 13a', '75935776', 'joakinpolanco199726@gmail.com', '/school/public_html/fotos/uni.jpg', 'Masculino', '14.77488251', '-87.16552734', 1, 2, 23),
(33, 'INSA ESTUDIANTE', 'Calle San Luis La Planta Col Argentina Psj Catamarca Casa 13a', '75935776', 'joakinpolanco199726@gmail.com', '/school/public_html/fotos/images.jpg', 'Masculino', '21.86149873', '-101.49169922', 1, 2, 12),
(34, 'UNICAES ESTUDIANTE', '13 Calle San Luis La Planta Col Argentina Psj Catamarca Casa', '75935776', 'UNI@gmail.com', '/school/public_html/fotos/uni.jpg', 'Masculino', '6.31529854', '-66.15966797', 1, 2, 23),
(35, 'MELO ESTUDIANTE', '13 Calle San Luis La Planta Col Argentina Psj Catamarca Casa', '75935776', 'MELO@gmail.com', '/school/public_html/fotos/1712280758.png', 'Masculino', '19.31114336', '-69.67529297', 1, 2, 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escuelas`
--

CREATE TABLE `escuelas` (
  `id_school` int NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `latitud` decimal(10,8) DEFAULT NULL,
  `longitud` decimal(11,8) DEFAULT NULL,
  `id_usr` int DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `escuelas`
--

INSERT INTO `escuelas` (`id_school`, `nombre`, `direccion`, `email`, `foto`, `latitud`, `longitud`, `id_usr`, `fecha`) VALUES
(12, 'INSA', 'Calle San Luis La Planta Col Argentina Psj Catamarca Casa 13a', 'joakinpolanco199726@gmail.com', '/school/public_html/fotos/images.jpg', '14.87046904', '-86.85791016', 3, '2024-02-28'),
(21, 'melo express', 'Calle San Luis La Planta Col Argentina Psj Catamarca Casa 13a', 'joakinpolanco199726@gmail.com', '/school/public_html/fotos/1712280758.png', '35.46066995', '138.51562500', 22, '2024-05-21'),
(23, 'UNICAES', '13 Calle San Luis La Planta Col Argentina Psj Catamarca Casa', 'unicaes@catolica.edu.sv', '/school/public_html/fotos/uni.jpg', '13.99803654', '-89.56604004', 24, '2024-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grados`
--

CREATE TABLE `grados` (
  `id_grado` int NOT NULL,
  `nombre_grado` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `grados`
--

INSERT INTO `grados` (`id_grado`, `nombre_grado`) VALUES
(1, 'primer grado'),
(4, 'Segundo grado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padres`
--

CREATE TABLE `padres` (
  `id_padre` int NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `padres`
--

INSERT INTO `padres` (`id_padre`, `nombre`, `direccion`, `telefono`) VALUES
(11, 'Jaime polanco', 'Calle San Luis La Planta Col Argentina Psj Catamarca Casa 13a', '75935776'),
(12, 'Sandra polanco', 'Calle San Luis La Planta Col Argentina Psj Catamarca Casa 13a', '75935776'),
(13, 'Vilma Polanco', 'col las violetas cl san luis la planta pje 1 casa 21', '23456789');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `padresalumnos`
--

CREATE TABLE `padresalumnos` (
  `id_padre_alumno` int NOT NULL,
  `id_alumno` int DEFAULT NULL,
  `id_padre` int DEFAULT NULL,
  `parentesco` varchar(100) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `padresalumnos`
--

INSERT INTO `padresalumnos` (`id_padre_alumno`, `id_alumno`, `id_padre`, `parentesco`, `fecha`) VALUES
(7, 26, 11, 'padre', '2024-06-03'),
(8, 31, 12, 'Madre', '2024-06-04'),
(9, 33, 13, 'mama', '2024-06-04'),
(10, 34, 11, 'padre', '2024-06-04'),
(11, 35, 11, 'padre', '2024-06-04'),
(12, 32, 12, 'Madre', '2024-06-04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secciones`
--

CREATE TABLE `secciones` (
  `id_seccion` int NOT NULL,
  `nombre_seccion` varchar(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `secciones`
--

INSERT INTO `secciones` (`id_seccion`, `nombre_seccion`) VALUES
(2, 'A'),
(4, 'B');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usr` int NOT NULL,
  `usuario` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `password` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `nombres` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `tipo` enum('Administrador','Usuario') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usr`, `usuario`, `password`, `nombres`, `tipo`) VALUES
(3, 'admin', 'a1fc297f36fb8b831ada3a3db21eef6a0845b776', 'joaquin ernesto', 'Administrador'),
(22, 'vilma polanco', 'df9df7f9d531c751ec2560dfee6cc04e767aeaae', 'vilma polanco', 'Usuario'),
(24, 'jaime daniel', 'df9df7f9d531c751ec2560dfee6cc04e767aeaae', 'jaime daniel', 'Usuario'),
(25, 'school', 'b2e57c2bad366be5d2781bddc3adb5ef1b42f6f2', 'school', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD PRIMARY KEY (`id_alumno`),
  ADD KEY `id_grado` (`id_grado`),
  ADD KEY `id_seccion` (`id_seccion`),
  ADD KEY `id_school` (`id_school`);

--
-- Indices de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD PRIMARY KEY (`id_school`),
  ADD KEY `id_usr` (`id_usr`);

--
-- Indices de la tabla `grados`
--
ALTER TABLE `grados`
  ADD PRIMARY KEY (`id_grado`);

--
-- Indices de la tabla `padres`
--
ALTER TABLE `padres`
  ADD PRIMARY KEY (`id_padre`);

--
-- Indices de la tabla `padresalumnos`
--
ALTER TABLE `padresalumnos`
  ADD PRIMARY KEY (`id_padre_alumno`),
  ADD KEY `id_alumno` (`id_alumno`),
  ADD KEY `id_padre` (`id_padre`);

--
-- Indices de la tabla `secciones`
--
ALTER TABLE `secciones`
  ADD PRIMARY KEY (`id_seccion`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usr`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumnos`
--
ALTER TABLE `alumnos`
  MODIFY `id_alumno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `escuelas`
--
ALTER TABLE `escuelas`
  MODIFY `id_school` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `grados`
--
ALTER TABLE `grados`
  MODIFY `id_grado` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `padres`
--
ALTER TABLE `padres`
  MODIFY `id_padre` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `padresalumnos`
--
ALTER TABLE `padresalumnos`
  MODIFY `id_padre_alumno` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `secciones`
--
ALTER TABLE `secciones`
  MODIFY `id_seccion` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usr` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumnos`
--
ALTER TABLE `alumnos`
  ADD CONSTRAINT `alumnos_ibfk_1` FOREIGN KEY (`id_grado`) REFERENCES `grados` (`id_grado`),
  ADD CONSTRAINT `alumnos_ibfk_2` FOREIGN KEY (`id_seccion`) REFERENCES `secciones` (`id_seccion`),
  ADD CONSTRAINT `alumnos_ibfk_3` FOREIGN KEY (`id_school`) REFERENCES `escuelas` (`id_school`);

--
-- Filtros para la tabla `escuelas`
--
ALTER TABLE `escuelas`
  ADD CONSTRAINT `escuelas_ibfk_1` FOREIGN KEY (`id_usr`) REFERENCES `usuarios` (`id_usr`);

--
-- Filtros para la tabla `padresalumnos`
--
ALTER TABLE `padresalumnos`
  ADD CONSTRAINT `padresalumnos_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumnos` (`id_alumno`),
  ADD CONSTRAINT `padresalumnos_ibfk_2` FOREIGN KEY (`id_padre`) REFERENCES `padres` (`id_padre`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
