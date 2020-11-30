-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-11-2020 a las 08:55:57
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `citas`
--

CREATE TABLE `citas` (
  `id` int(255) NOT NULL,
  `propietario_id` int(255) NOT NULL,
  `nombre_mascota` varchar(255) NOT NULL,
  `edad` varchar(100) NOT NULL,
  `raza` varchar(255) NOT NULL,
  `tipo_mascota` varchar(255) NOT NULL,
  `hora_cita` varchar(155) NOT NULL,
  `fecha_cita` varchar(255) NOT NULL,
  `sexo_mascota` varchar(100) NOT NULL,
  `problematica` mediumtext NOT NULL,
  `doctor_asignado_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `citas`
--

INSERT INTO `citas` (`id`, `propietario_id`, `nombre_mascota`, `edad`, `raza`, `tipo_mascota`, `hora_cita`, `fecha_cita`, `sexo_mascota`, `problematica`, `doctor_asignado_id`) VALUES
(371, 1, 'REPTILIO', '2', 'DINOSAURIO', 'REPTIL', '13:00', '2020-11-18', 'M', 'NO COME', 1),
(375, 1, 'JACK DIQUELSON', '8', 'GATO', 'GATO', '12:00', '2020-11-27', 'M', 'DUERME MUCHO', 2),
(376, 1, 'BRUS', '4', 'PURA', 'CABALLO', '12:00', '2021-12-01', 'M', 'NO COME', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `doctor`
--

CREATE TABLE `doctor` (
  `doctor_asignado_id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `edad` int(20) NOT NULL,
  `cedula` varchar(100) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `especialidad` varchar(255) NOT NULL,
  `tiempo_experiencia` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `doctor`
--

INSERT INTO `doctor` (`doctor_asignado_id`, `nombre`, `edad`, `cedula`, `fecha_ingreso`, `sexo`, `especialidad`, `tiempo_experiencia`) VALUES
(1, 'Alberto Ponchito Ramos', 42, '2555785452121', '2020-09-15', 'masculino', 'mascotas domesticas', 10),
(2, 'Adal Mendoza Sanchez', 32, '25484521', '2020-11-02', 'masculino', 'aves', 3),
(3, 'Laura Hernandez Hernandez', 30, '245668774641', '2020-07-07', 'femenino', 'animales de granja', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE `noticias` (
  `id` int(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `contenido` mediumtext NOT NULL,
  `imagen_principal` varchar(255) NOT NULL,
  `imagenes_secundarias` varchar(255) NOT NULL,
  `noticias_semana` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `propietario`
--

CREATE TABLE `propietario` (
  `propietario_id` int(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `telefono_contacto` int(255) NOT NULL,
  `telefono_secundario` int(255) DEFAULT NULL,
  `direccion_general` mediumtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `propietario`
--

INSERT INTO `propietario` (`propietario_id`, `nombre`, `telefono_contacto`, `telefono_secundario`, `direccion_general`) VALUES
(1, 'Mauricio', 254554545, 552666868, 'callle lomito dorado numero 2 col del bosque mexico'),
(2, 'Edgar', 225823568, 23555236, 'calle del coral numero 72 col bajo del mar cdmx'),
(3, 'Lola', 255888, 25555, 'callle lomito dorado 3 numero 2 col del bosque mexico');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `citas`
--
ALTER TABLE `citas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_citas_propietario` (`propietario_id`),
  ADD KEY `fk_citas_doctor_asignado` (`doctor_asignado_id`);

--
-- Indices de la tabla `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`doctor_asignado_id`);

--
-- Indices de la tabla `noticias`
--
ALTER TABLE `noticias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `propietario`
--
ALTER TABLE `propietario`
  ADD PRIMARY KEY (`propietario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `citas`
--
ALTER TABLE `citas`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=378;

--
-- AUTO_INCREMENT de la tabla `doctor`
--
ALTER TABLE `doctor`
  MODIFY `doctor_asignado_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `noticias`
--
ALTER TABLE `noticias`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `propietario`
--
ALTER TABLE `propietario`
  MODIFY `propietario_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `citas`
--
ALTER TABLE `citas`
  ADD CONSTRAINT `fk_citas_doctor_asignado` FOREIGN KEY (`doctor_asignado_id`) REFERENCES `doctor` (`doctor_asignado_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fk_citas_propietario` FOREIGN KEY (`propietario_id`) REFERENCES `propietario` (`propietario_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
