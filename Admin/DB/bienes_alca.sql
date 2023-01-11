-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2023 a las 07:51:42
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bienes_alca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_bienes`
--

CREATE TABLE `tab_bienes` (
  `ID_BIEN` int(20) NOT NULL COMMENT 'ID DEL BIEN E INMUEBLE',
  `CODIGO_BIEN` int(11) NOT NULL COMMENT 'CODIGO DEL BIEN E INMUEBLE',
  `NOMBRE_BIEN` varchar(80) NOT NULL COMMENT 'NOMBRE DEL BIEN E INMUEBLE',
  `STATUS_BIEN` varchar(11) NOT NULL COMMENT 'CONDICION DEL BIEN E INMUEBLE',
  `FOTO_BIEN` longblob NOT NULL COMMENT 'FOTO DEL BIEN E INMUEBLE',
  `FECHA_BIEN` timestamp NULL DEFAULT current_timestamp() COMMENT 'FEHCA DE REGISTRO DEL BIEN',
  `CODIGO_CAT` int(11) NOT NULL COMMENT 'CODIGO DE LA CATEGORIA',
  `CODIGO_USU` int(20) NOT NULL COMMENT 'CODIGO DEL USUARIO',
  `CODIGO_UBI` int(11) NOT NULL COMMENT 'CODIGO DE LA UBICACION DONDE SE ENCUENTRA EL BIEN E INMUEBLE'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='TABLA DE BIENES E INMUEBLES';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_catego`
--

CREATE TABLE `tab_catego` (
  `CODIGO_CAT` int(11) NOT NULL COMMENT 'CODIGO DE LA CATEGORIA',
  `NOMBRE_CAT` varchar(100) NOT NULL COMMENT 'NOMBRE DE LA CATEGORIA',
  `DESCRI_CAT` varchar(100) NOT NULL COMMENT 'DESCRIPCION DE LA CATEGORIA'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='TABLA DE CATEGORIAS DE BIENES';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_tipous`
--

CREATE TABLE `tab_tipous` (
  `CODIGO_TUS` int(11) NOT NULL COMMENT 'CODIGO DEL TIPO DE USUARIO',
  `NOMBRE_TUS` int(60) DEFAULT NULL COMMENT 'NOMBRE DEL TIPO DE USUARIO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='TABLA DE TIPO DE USUARIO';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_ubica`
--

CREATE TABLE `tab_ubica` (
  `CODIGO_UBI` int(11) NOT NULL COMMENT 'CODIGO DE UBICACION DEL BIEN',
  `NOMBRE_UBI` varchar(70) NOT NULL COMMENT 'NOMBRE DE LA UBICACION DONDE SE ENCUENTRA EL BIEN'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='TABLA DE UBICACION DEL BIEN';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tab_usuari`
--

CREATE TABLE `tab_usuari` (
  `CODIGO_USU` int(20) NOT NULL COMMENT 'ID DEL USUARIO',
  `CEDULA_USU` int(20) NOT NULL COMMENT 'CEDULA DEL USUARIO',
  `NOMBRE_USU` varchar(30) NOT NULL COMMENT 'NOMBRE DEL USUARIO',
  `APELLI_USU` varchar(30) NOT NULL COMMENT 'APELLIDO DEL USUARIO',
  `TELEFO_USU` int(90) NOT NULL COMMENT 'TELEFONO DEL USUARIO',
  `CORREO_USU` varchar(60) NOT NULL COMMENT 'CORREO DEL USUARIO',
  `DIRECC_USU` varchar(150) NOT NULL COMMENT 'DIRECCION DEL USUARIO',
  `CLAVE_USU` varchar(60) NOT NULL COMMENT 'CONTRASEÑA DEL USUARIO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci COMMENT='TABLA DATOS DE USUARIOS ';

--
-- Volcado de datos para la tabla `tab_usuari`
--

INSERT INTO `tab_usuari` (`CODIGO_USU`, `CEDULA_USU`, `NOMBRE_USU`, `APELLI_USU`, `TELEFO_USU`, `CORREO_USU`, `DIRECC_USU`, `CLAVE_USU`) VALUES
(0, 24645810, 'lender', 'parada', 412999936, 'lendereparada@gmail.com', 'fkkjddddd', 'Kike123$'),
(1, 27327917, 'MELVIS', 'FLORES', 426873553, 'melvisduliaska@gmail.com', 'Naranjales,12 de octubre, tachira', '123456Mf$');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tab_bienes`
--
ALTER TABLE `tab_bienes`
  ADD PRIMARY KEY (`ID_BIEN`),
  ADD KEY `CODIGO_CAT` (`CODIGO_CAT`),
  ADD KEY `CODIGO_USU` (`CODIGO_USU`),
  ADD KEY `CODIGO_UBI` (`CODIGO_UBI`);

--
-- Indices de la tabla `tab_catego`
--
ALTER TABLE `tab_catego`
  ADD PRIMARY KEY (`CODIGO_CAT`);

--
-- Indices de la tabla `tab_tipous`
--
ALTER TABLE `tab_tipous`
  ADD PRIMARY KEY (`CODIGO_TUS`);

--
-- Indices de la tabla `tab_ubica`
--
ALTER TABLE `tab_ubica`
  ADD PRIMARY KEY (`CODIGO_UBI`);

--
-- Indices de la tabla `tab_usuari`
--
ALTER TABLE `tab_usuari`
  ADD PRIMARY KEY (`CODIGO_USU`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tab_bienes`
--
ALTER TABLE `tab_bienes`
  MODIFY `ID_BIEN` int(20) NOT NULL AUTO_INCREMENT COMMENT 'ID DEL BIEN E INMUEBLE';

--
-- AUTO_INCREMENT de la tabla `tab_catego`
--
ALTER TABLE `tab_catego`
  MODIFY `CODIGO_CAT` int(11) NOT NULL AUTO_INCREMENT COMMENT 'CODIGO DE LA CATEGORIA';

--
-- AUTO_INCREMENT de la tabla `tab_tipous`
--
ALTER TABLE `tab_tipous`
  MODIFY `CODIGO_TUS` int(11) NOT NULL AUTO_INCREMENT COMMENT 'CODIGO DEL TIPO DE USUARIO';

--
-- AUTO_INCREMENT de la tabla `tab_ubica`
--
ALTER TABLE `tab_ubica`
  MODIFY `CODIGO_UBI` int(11) NOT NULL AUTO_INCREMENT COMMENT 'CODIGO DE UBICACION DEL BIEN';

--
-- AUTO_INCREMENT de la tabla `tab_usuari`
--
ALTER TABLE `tab_usuari`
  MODIFY `CODIGO_USU` int(20) NOT NULL AUTO_INCREMENT COMMENT 'ID DEL USUARIO', AUTO_INCREMENT=27327919;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `tab_bienes`
--
ALTER TABLE `tab_bienes`
  ADD CONSTRAINT `tab_bienes_ibfk_1` FOREIGN KEY (`CODIGO_USU`) REFERENCES `tab_usuari` (`CODIGO_USU`),
  ADD CONSTRAINT `tab_bienes_ibfk_2` FOREIGN KEY (`CODIGO_CAT`) REFERENCES `tab_catego` (`CODIGO_CAT`),
  ADD CONSTRAINT `tab_bienes_ibfk_3` FOREIGN KEY (`CODIGO_UBI`) REFERENCES `tab_ubica` (`CODIGO_UBI`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
