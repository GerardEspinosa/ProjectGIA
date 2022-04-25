-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-04-2022 a las 19:43:49
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyectogia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_Cliente` int(11) NOT NULL,
  `dni_Cliente` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_Cliente` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Apellido_Cliente` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Telefono_Cliente` int(9) NOT NULL,
  `Correo_Cliente` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_Usuario` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Contraseña_Cliente` varchar(20) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_Cliente`, `dni_Cliente`, `Nombre_Cliente`, `Apellido_Cliente`, `Telefono_Cliente`, `Correo_Cliente`, `Nombre_Usuario`, `Contraseña_Cliente`) VALUES
(1, '123456', 'Gerard', 'Espinosa', 431425, 'gerard@gmail.com', '', '12345'),
(2, '1293891Q', 'Usuario', 'Prueba', 701704653, 'correo@gmail.com', '', ''),
(23, '34819481Q', 'Gerard', 'Espinosa', 2943081, 'gerarde@gmail.com', '', ''),
(1234, '839193Q', 'Gerard', 'Espinosa', 0, '', '', ''),
(1235, '', '', '', 0, '', '', ''),
(1236, '235179Q', 'Ivan', 'Montoya', 666444555, 'ivan@gmail.com', '', ''),
(12345, '9123891Q', 'Gerard', 'Espinosa', 605701038, 'geymix@gmail.com', '', ''),
(1231534, '2319418Q', 'Prueba', '1', 239892391, 'prueba231@gmail.com', '', ''),
(1231535, '12345678Q', 'Marcos', 'Antonio', 2147483647, 'prueba@prueba.com', '', ''),
(1231536, '12314511', 'Prueba', 'Prueba', 3841741, 'Prueba@prueba.com', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_Empleado` int(11) NOT NULL,
  `dni_Empleado` varchar(9) COLLATE latin1_spanish_ci NOT NULL,
  `Nombre_Empleado` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `Apellidos_Empleado` varchar(30) COLLATE latin1_spanish_ci NOT NULL,
  `Cargo_Empleado` enum('Admin','SuperAdmin','Jefe') COLLATE latin1_spanish_ci NOT NULL,
  `Sueldo_Empleado` decimal(10,0) NOT NULL,
  `Fecha_Nacimiento_Empleado` date NOT NULL,
  `Usuario_Empleado` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Constraseña_Empleado` varchar(30) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas`
--

CREATE TABLE `tarifas` (
  `id_Tarifa` int(11) NOT NULL,
  `Nombre_Tarifa` varchar(15) COLLATE latin1_spanish_ci NOT NULL,
  `Descripcion_Tarifa` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `Precio_Tarifa` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifas_clientes`
--

CREATE TABLE `tarifas_clientes` (
  `id_Tarifas_Clientes` int(11) NOT NULL,
  `id_Tarifa` int(11) NOT NULL,
  `id_Cliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_Cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_Empleado`);

--
-- Indices de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  ADD PRIMARY KEY (`id_Tarifa`);

--
-- Indices de la tabla `tarifas_clientes`
--
ALTER TABLE `tarifas_clientes`
  ADD PRIMARY KEY (`id_Tarifas_Clientes`),
  ADD KEY `id_Cliente` (`id_Cliente`),
  ADD KEY `id_Tarifa` (`id_Tarifa`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_Cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1231537;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_Empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarifas`
--
ALTER TABLE `tarifas`
  MODIFY `id_Tarifa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarifas_clientes`
--
ALTER TABLE `tarifas_clientes`
  MODIFY `id_Tarifas_Clientes` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tarifas_clientes`
--
ALTER TABLE `tarifas_clientes`
  ADD CONSTRAINT `id_Cliente` FOREIGN KEY (`id_Cliente`) REFERENCES `clientes` (`id_Cliente`),
  ADD CONSTRAINT `id_Tarifa` FOREIGN KEY (`id_Tarifa`) REFERENCES `tarifas` (`id_Tarifa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
