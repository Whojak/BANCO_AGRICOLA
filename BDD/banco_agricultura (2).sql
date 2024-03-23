-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-03-2024 a las 02:00:28
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `banco_agricultura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE `cuentas` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `num_cuenta` varchar(9) NOT NULL,
  `saldo` decimal(10,2) NOT NULL,
  `estado` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`id`, `id_usuario`, `num_cuenta`, `saldo`, `estado`, `fecha_creacion`) VALUES
(1, 10, '0123456', 10000.00, 'Activo', '2024-03-21 02:36:55'),
(2, 9, '1234567', 23000.00, 'Activo', '2024-03-21 02:36:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movimientos`
--

CREATE TABLE `movimientos` (
  `id` int(11) NOT NULL,
  `id_cuenta` int(11) NOT NULL,
  `movimiento` decimal(10,2) DEFAULT NULL,
  `tipo_trans` varchar(100) NOT NULL,
  `Estado` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp(),
  `fecha_caducacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `movimientos`
--

INSERT INTO `movimientos` (`id`, `id_cuenta`, `movimiento`, `tipo_trans`, `Estado`, `fecha_creacion`, `fecha_caducacion`) VALUES
(1, 1, 0.00, 'Abono', 'Aprobado', '2024-03-21 02:38:32', '2024-06-23'),
(2, 2, 0.00, 'Prestamo', 'Rechazado', '2024-03-21 02:38:32', '2024-03-29'),
(3, 1, 1000.00, 'Prestamo', 'Aprobado', '2024-03-21 02:40:11', '2024-06-23'),
(4, 2, 10000.00, 'Prestamo', 'Aprobado', '2024-03-21 02:40:11', '2024-03-29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `socursal`
--

CREATE TABLE `socursal` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `municipio` varchar(100) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `socursal`
--

INSERT INTO `socursal` (`id`, `nombre`, `municipio`, `fecha_creacion`) VALUES
(1, 'San Salvador', 'San Salvador', '2024-03-13 01:22:52'),
(2, 'Ilopango', 'San Salvador', '2024-03-14 01:12:00'),
(3, 'Soyapango', 'San Salvador', '2024-03-14 01:16:44');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id` int(11) NOT NULL,
  `tipo_usuario` varchar(100) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id`, `tipo_usuario`, `fecha_creacion`) VALUES
(1, 'Cliente', '2024-03-13 01:45:19'),
(2, 'Empleado', '2024-03-20 00:39:03'),
(3, 'Administrador', '2024-03-20 00:43:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `dui` varchar(10) NOT NULL,
  `numero_tel` int(11) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contrasena` varchar(15) NOT NULL,
  `estado` varchar(50) NOT NULL,
  `totem` varchar(6) DEFAULT NULL,
  `id_tipo` int(11) DEFAULT NULL,
  `rol` varchar(100) DEFAULT NULL,
  `id_socursal` int(11) DEFAULT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `dui`, `numero_tel`, `correo`, `usuario`, `contrasena`, `estado`, `totem`, `id_tipo`, `rol`, `id_socursal`, `fecha_creacion`) VALUES
(7, 'Alejandro', 'Domínguez', '543212', 22654578, 'ddominguezjuegos@gmail.com', 'admin', 'Ip3Z4dkI', 'activo', '389102', 1, 'cliente', 1, '2024-03-13 07:38:47'),
(8, 'David', 'Domínguez', '5434567', 22654578, 'ddominguezjuegos@gmail.com', 'admin2', 'Ip3Z4dkI', 'activo', NULL, 2, 'Gerente socursal', 1, '2024-03-13 23:20:50'),
(9, 'Moises', 'Domínguez', '234421', 22654578, 'ddominguezjuegos@gmail.com', 'admin3', 'Ip3Z4dkI', 'activo', NULL, 2, 'Gerente banco', 1, '2024-03-13 23:23:22'),
(10, 'Valeria', 'Gonzales', '2', 22654578, 'ddominguezjuegos@gmail.com', 'admin6', 'Ip3Z4dkI', 'Inactivo', NULL, 2, 'cajero', 1, '2024-03-13 23:47:16'),
(11, 'Valeria', 'Gonzales', '1', 22654578, 'ddominguezjuegos@gmail.com', 'admin7', 'Ip3Z4dkI', 'Espera de aprobacion', NULL, 2, 'Limpieza', 1, '2024-03-13 23:55:55'),
(12, 'Valeria', 'Gonzales', '000000001', 22654578, 'ddominguezjuegos@gmail.com', 'admin8', 'Ip3Z4dkI', 'activo', NULL, 2, 'Secretario', 1, '2024-03-13 23:57:25'),
(13, 'Valeria', 'Gonzales', '000000000', 22654578, 'ddominguezjuegos@gmail.com', 'admin10', 'Ip3Z4dkI', 'Espera de aprobacion', NULL, 2, 'Personal mesa', 1, '2024-03-13 23:57:44'),
(14, 'Alejandro', 'Domínguez', '00000000-', 22654578, 'ddominguezjuegos@gmail.com', 'admin11', 'Ip3Z4dkI', 'inactivo', '945438', 1, 'cliente', 1, '2024-03-14 00:52:12'),
(15, 'Alejandro', 'Domínguez', '02345', 22654578, 'ddominguezjuegos@gmail.com', 'admin12', 'Ip3Z4dkI', 'inactivo', '552991', 1, 'cliente', 1, '2024-03-14 09:36:40'),
(17, 'Rodrigo', 'Waterson', '12334678', 12345678, 'rodrigo@gmail.com', 'who234k', '$2y$10$v.NCykE2', 'Espera de aprobacion', NULL, 2, 'Limpieza', 1, '2024-03-21 18:24:04'),
(18, 'Raul', 'Waterson', '123346222', 2147483647, 'rodrigo@gmail.com', 'who234567898765ak', '$2y$10$UWsaPemJ', 'Espera de aprobacion', NULL, 2, 'Cajero', 1, '2024-03-21 18:28:11'),
(19, 'Rodrigo', 'whojak12', '122323346', 123456, 'rodrigo@gmail.com', 'whojak344442211', 'deadpul22332234', 'Espera de aprobacion', NULL, 2, 'Limpieza', 1, '2024-03-21 18:35:39'),
(20, 'Sujetouno', 'Sujetodos', '01234567-', 2345, 'rodrigo@gmail.com', 'user23', '@dead123S', 'Espera de aprobacion', NULL, 2, 'Cajero', 1, '2024-03-23 00:02:12'),
(21, '1234567', '23456', '23456', 23456, 'rodrigo@gmail.com', '23456', '3456', 'Espera de aprobacion', NULL, 2, 'Cajero', 1, '2024-03-23 00:06:38'),
(22, 'rodrigo', 'Waterson', '12345', 2345, 'rodrigo@gmail.com', 'wer', 'erioXD1', 'Espera de aprobacion', NULL, 2, 'Limpieza', 1, '2024-03-23 00:10:51'),
(23, '12345', '234', '1234678', 23456, 'rodrigo@gmail.com', '234', 'd34oXD1', 'Espera de aprobacion', NULL, 2, 'Recepcion', 1, '2024-03-23 00:13:23');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_cuenta` (`id_cuenta`);

--
-- Indices de la tabla `socursal`
--
ALTER TABLE `socursal`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `usuario` (`usuario`),
  ADD UNIQUE KEY `dui` (`dui`),
  ADD KEY `id_tipo` (`id_tipo`),
  ADD KEY `id_socursal` (`id_socursal`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cuentas`
--
ALTER TABLE `cuentas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `movimientos`
--
ALTER TABLE `movimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `socursal`
--
ALTER TABLE `socursal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cuentas`
--
ALTER TABLE `cuentas`
  ADD CONSTRAINT `cuentas_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `movimientos`
--
ALTER TABLE `movimientos`
  ADD CONSTRAINT `movimientos_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentas` (`id`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_tipo`) REFERENCES `tipo_usuario` (`id`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_socursal`) REFERENCES `socursal` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
