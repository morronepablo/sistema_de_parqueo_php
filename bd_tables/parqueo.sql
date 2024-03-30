-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-03-2024 a las 15:25:43
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
-- Base de datos: `parqueo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_clientes`
--

CREATE TABLE `tb_clientes` (
  `id_cliente` int(11) NOT NULL,
  `nombres_cliente` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `dni_cliente` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `placa_auto` varchar(50) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_clientes`
--

INSERT INTO `tb_clientes` (`id_cliente`, `nombres_cliente`, `dni_cliente`, `placa_auto`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'Diego trinidad', '20778777', 'A162SQL', '2024-03-11 00:00:00', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_informaciones`
--

CREATE TABLE `tb_informaciones` (
  `id_informacion` int(11) NOT NULL,
  `nombre_parqueo` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `actividad_empresa` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `sucursal` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `zona` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `provincia` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `pais` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_informaciones`
--

INSERT INTO `tb_informaciones` (`id_informacion`, `nombre_parqueo`, `actividad_empresa`, `sucursal`, `direccion`, `zona`, `telefono`, `provincia`, `pais`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'SISTEMA DE PARQUEO', 'SERVICIO DE PARQUEO', '1', 'EL ARREO 220', 'LA REJA', '01138669097', 'BUENOS AIRES', 'ARGENTINA', '2024-03-12 17:20:04', NULL, NULL, '1'),
(2, 'SISTEMA DE PARQUEO', 'SERVICIO DE PARQUEO', '1', 'EL ARREO 220', 'LA REJA', '01138669097', 'BUENOS AIRES', 'ARGENTINA', '2024-03-12 17:23:17', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_mapeos`
--

CREATE TABLE `tb_mapeos` (
  `id_map` int(11) NOT NULL,
  `nro_espacio` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `estado_espacio` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `obs` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_mapeos`
--

INSERT INTO `tb_mapeos` (`id_map`, `nro_espacio`, `estado_espacio`, `obs`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, '1', 'OCUPADO', '', '2024-03-11 14:55:17', NULL, NULL, '1'),
(2, '2', 'OCUPADO', '', '2024-03-11 14:55:20', NULL, NULL, '1'),
(3, '3', 'LIBRE', '', '2024-03-11 14:55:22', NULL, NULL, '1'),
(4, '4', 'LIBRE', '', '2024-03-11 14:55:24', NULL, NULL, '1'),
(5, '5', 'OCUPADO', '', '2024-03-11 14:55:26', NULL, NULL, '1'),
(6, '6', 'LIBRE', '', '2024-03-11 14:55:28', NULL, NULL, '1'),
(7, '7', 'LIBRE', '', '2024-03-11 14:55:30', NULL, NULL, '1'),
(8, '8', 'OCUPADO', '', '2024-03-11 14:55:32', NULL, NULL, '1'),
(9, '9', 'LIBRE', '', '2024-03-11 14:55:34', NULL, NULL, '1'),
(10, '10', 'LIBRE', '', '2024-03-11 14:55:36', NULL, NULL, '1'),
(11, '11', 'LIBRE', '', '2024-03-11 14:55:38', NULL, NULL, '1'),
(12, '12', 'LIBRE', '', '2024-03-11 14:55:40', NULL, NULL, '1'),
(13, '13', 'LIBRE', '', '2024-03-11 14:55:42', NULL, NULL, '1'),
(14, '14', 'OCUPADO', '', '2024-03-11 14:55:44', NULL, NULL, '1'),
(15, '15', 'LIBRE', '', '2024-03-11 14:55:46', NULL, NULL, '1'),
(16, '16', 'LIBRE', '', '2024-03-11 14:55:48', NULL, NULL, '1'),
(17, '17', 'LIBRE', '', '2024-03-11 14:55:50', NULL, NULL, '1'),
(18, '18', 'OCUPADO', '', '2024-03-11 14:55:52', NULL, NULL, '1'),
(19, '19', 'LIBRE', '', '2024-03-11 14:55:54', NULL, NULL, '1'),
(20, '20', 'LIBRE', '', '2024-03-11 14:55:56', NULL, NULL, '1'),
(21, '21', 'LIBRE', '', '2024-03-11 14:55:59', NULL, NULL, '1'),
(22, '22', 'LIBRE', '', '2024-03-11 14:56:01', NULL, NULL, '1'),
(23, '23', 'LIBRE', '', '2024-03-11 14:56:03', NULL, NULL, '1'),
(24, '24', 'LIBRE', '', '2024-03-11 14:56:05', NULL, NULL, '1'),
(25, '25', 'LIBRE', '', '2024-03-11 14:56:08', NULL, NULL, '1'),
(26, '26', 'LIBRE', '', '2024-03-11 14:56:10', NULL, NULL, '1'),
(27, '27', 'LIBRE', '', '2024-03-11 14:56:12', NULL, NULL, '1'),
(28, '28', 'LIBRE', '', '2024-03-11 14:56:14', NULL, NULL, '1'),
(29, '29', 'LIBRE', '', '2024-03-11 14:56:16', NULL, NULL, '1'),
(30, '30', 'LIBRE', '', '2024-03-11 14:56:30', NULL, NULL, '1'),
(31, '31', 'LIBRE', '', '2024-03-11 15:09:36', NULL, NULL, '1'),
(32, '32', 'LIBRE', '', '2024-03-11 15:09:42', NULL, NULL, '1'),
(33, '33', 'LIBRE', '', '2024-03-11 15:09:48', NULL, NULL, '1'),
(34, '34', 'LIBRE', '', '2024-03-11 15:54:06', NULL, NULL, '1'),
(35, '35', 'LIBRE', '', '2024-03-11 15:54:44', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_roles`
--

CREATE TABLE `tb_roles` (
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_roles`
--

INSERT INTO `tb_roles` (`id_rol`, `nombre`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'ADMINISTRADOR', '2024-02-28 18:48:24', NULL, NULL, '1'),
(2, 'CONTADOR', '2024-02-28 19:04:46', NULL, '2024-02-28 19:50:14', '0'),
(3, 'EMPLEADO', '2024-03-10 14:49:09', NULL, '2024-03-10 14:49:58', '0'),
(4, 'OPERADOR', '2024-03-10 14:50:16', NULL, NULL, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `rol` varchar(100) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `email_verificado` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `password_user` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `token` varchar(255) COLLATE utf8mb4_spanish_ci DEFAULT NULL,
  `fyh_creacion` datetime DEFAULT NULL,
  `fyh_actualizacion` datetime DEFAULT NULL,
  `fyh_eliminacion` datetime DEFAULT NULL,
  `estado` varchar(10) COLLATE utf8mb4_spanish_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`id`, `nombres`, `rol`, `email`, `email_verificado`, `password_user`, `token`, `fyh_creacion`, `fyh_actualizacion`, `fyh_eliminacion`, `estado`) VALUES
(1, 'Pablo Martin Morrone', 'ADMINISTRADOR', 'morronepablo@gmail.com', 'si', '12345678', NULL, '2024-02-28 00:00:00', NULL, NULL, '1'),
(2, 'Natalia Oduber', 'OPERADOR', 'nataliaoduber@gmail.com', NULL, '12345678', NULL, '2024-03-10 14:15:20', '2024-03-10 16:19:32', NULL, '1'),
(3, 'Diego Martin Trinidad', NULL, 'diegotrinidad@gmail.com', NULL, '12345678', NULL, '2024-03-10 16:48:23', NULL, NULL, '1');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `tb_informaciones`
--
ALTER TABLE `tb_informaciones`
  ADD PRIMARY KEY (`id_informacion`);

--
-- Indices de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  ADD PRIMARY KEY (`id_map`);

--
-- Indices de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_clientes`
--
ALTER TABLE `tb_clientes`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tb_informaciones`
--
ALTER TABLE `tb_informaciones`
  MODIFY `id_informacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tb_mapeos`
--
ALTER TABLE `tb_mapeos`
  MODIFY `id_map` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT de la tabla `tb_roles`
--
ALTER TABLE `tb_roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
