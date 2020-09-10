-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 21-08-2020 a las 04:19:42
-- Versión del servidor: 10.1.30-MariaDB
-- Versión de PHP: 7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sisventas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivo_cotizacions`
--

CREATE TABLE `archivo_cotizacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `archivo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden_id` int(10) UNSIGNED NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `archivo_cotizacions`
--

INSERT INTO `archivo_cotizacions` (`id`, `archivo`, `orden_id`, `status`, `created_at`, `updated_at`) VALUES
(3, '1-R-VT-002 V6 - FORMATO DE COTIZACIÓN DE SERVICIO (1) (1).pdf', 1, '1', '2020-08-18 07:19:02', '2020-08-18 07:19:02'),
(4, '1-LA TRINIDAD  Solin Soft.pdf', 1, '1', '2020-08-18 07:19:02', '2020-08-18 07:19:02'),
(5, '1-emp.PNG', 1, '1', '2020-08-19 01:44:57', '2020-08-19 01:44:57'),
(6, '1-Captura2.PNG', 1, '1', '2020-08-19 02:16:25', '2020-08-19 02:16:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria_id` int(10) UNSIGNED NOT NULL,
  `pvp` double(10,2) DEFAULT NULL,
  `codigo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `articulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `stock` double DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`id`, `categoria_id`, `pvp`, `codigo`, `articulo`, `descripcion`, `path`, `stock`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 161258.00, '123456', 'Medidor de Temperatura nuevo2', 'medidor 2', '2108200806000_1.jpg', NULL, '1', '2020-08-16 02:16:04', '2020-08-21 06:19:06'),
(2, 2, 110122.00, 'polar ligth', 'zapatos', 'Huawei y9 2019', 'articulo_2.jpg', 500, '1', '2020-08-20 00:26:20', '2020-08-20 00:26:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asesors`
--

CREATE TABLE `asesors` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento_id` int(10) UNSIGNED NOT NULL,
  `cargo_id` int(10) UNSIGNED NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `asesors`
--

INSERT INTO `asesors` (`id`, `nombre`, `departamento_id`, `cargo_id`, `status`, `created_at`, `updated_at`) VALUES
(2, 'Pedro Perez', 1, 1, '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bancos`
--

CREATE TABLE `bancos` (
  `id` int(10) UNSIGNED NOT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id` int(10) UNSIGNED NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id`, `cargo`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asesor', '1', NULL, NULL),
(2, 'Facturador\r\n', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `categoria` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `categoria`, `descripcion`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Electronica moderna', 'productos Electricos modernos', '1', NULL, '2020-08-16 02:12:11'),
(2, 'Textiles', 'todo en textil', '1', '2020-08-16 02:11:37', '2020-08-17 00:33:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `asesor_id` int(10) UNSIGNED DEFAULT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `tipoPersona` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nombres` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipoDocumento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numDocumento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `actPpal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `asesor_id`, `user_id`, `tipoPersona`, `nombres`, `tipoDocumento`, `numDocumento`, `actPpal`, `email`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 19, 'PRIVADA', 'Anthony Araujo Peroza', 'NIT', '123456', '2342', 'martha.peroza77@gmail.com', '1', '2020-08-21 06:06:35', '2020-08-21 06:07:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente_bancos`
--

CREATE TABLE `cliente_bancos` (
  `id` int(10) UNSIGNED NOT NULL,
  `banco` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_cuenta` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `cliente_bancos`
--

INSERT INTO `cliente_bancos` (`id`, `banco`, `cliente_id`, `cuenta`, `tipo_cuenta`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BANCO DE BOGOTA', 1, '213123123123123', '1', '1', '2020-08-21 06:06:35', '2020-08-21 06:06:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clt_dir_facturas`
--

CREATE TABLE `clt_dir_facturas` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `correo_fact` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion_recib` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clt_dir_facturas`
--

INSERT INTO `clt_dir_facturas` (`id`, `cliente_id`, `correo_fact`, `direccion_recib`, `fecha`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'aasdasd@gmail.com', 'mata palo carretera nacional via arauca casa s/n', '2020-08-27', '1', '2020-08-21 06:06:35', '2020-08-21 06:07:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clt_i_es`
--

CREATE TABLE `clt_i_es` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `activo` double NOT NULL,
  `pasivo` double NOT NULL,
  `patrimonio` double NOT NULL,
  `ingreso` double NOT NULL,
  `egreso` double NOT NULL,
  `otros` double NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clt_i_es`
--

INSERT INTO `clt_i_es` (`id`, `cliente_id`, `activo`, `pasivo`, `patrimonio`, `ingreso`, `egreso`, `otros`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 2423423423, 234234234, 23423423, 42342, 3423423, 4234234, '1', '2020-08-21 06:06:35', '2020-08-21 06:06:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clt_monedas`
--

CREATE TABLE `clt_monedas` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `moneda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clt_monedas`
--

INSERT INTO `clt_monedas` (`id`, `cliente_id`, `moneda`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Pesos', '1', '2020-08-21 06:06:36', '2020-08-21 06:06:36'),
(2, 1, 'Dolares', '1', '2020-08-21 06:06:36', '2020-08-21 06:06:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clt_regimens`
--

CREATE TABLE `clt_regimens` (
  `id` int(10) UNSIGNED NOT NULL,
  `regimen` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `resolucion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clt_regimens`
--

INSERT INTO `clt_regimens` (`id`, `regimen`, `resolucion`, `ciu`, `cliente_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 'NO RESPONSABLE DE IVA', '234234', '5062', 1, '1', '2020-08-21 06:06:35', '2020-08-21 06:06:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `condicion_pagos`
--

CREATE TABLE `condicion_pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `condicion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descriptcion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `condicion_pagos`
--

INSERT INTO `condicion_pagos` (`id`, `condicion`, `descriptcion`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Contado', 'El cliente Debe Pagar de contado', '1', NULL, NULL),
(2, 'Credito 5 dias', 'El cliente debe cancelar dentro de 5 dias', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `configs`
--

CREATE TABLE `configs` (
  `id` int(10) UNSIGNED NOT NULL,
  `empresa` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_documento` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `num_documento` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `moneda` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `simbolo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nombre_impuesto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `monto_inpuesto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `configs`
--

INSERT INTO `configs` (`id`, `empresa`, `tipo_documento`, `num_documento`, `direccion`, `email`, `telefono`, `path`, `ciudad`, `moneda`, `simbolo`, `nombre_impuesto`, `monto_inpuesto`, `status`, `created_at`, `updated_at`) VALUES
(1, 'SET Y GAD S.A.S', 'NIT', '830065092-8', 'CARRERA. 48 101A 69', '', '7559277', NULL, 'BOGOTA DC', 'PESOS COP', '$', 'IVA', '19', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto_comercials`
--

CREATE TABLE `contacto_comercials` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `nombreComercial` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `emailContacto` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlfOficina` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tlfPersonal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contacto_comercials`
--

INSERT INTO `contacto_comercials` (`id`, `cliente_id`, `nombreComercial`, `emailContacto`, `tlfOficina`, `tlfPersonal`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Javier Solis', 'martha.peroza77@gmail.com', '04162733648', '04162733648', '1', '2020-08-21 06:06:35', '2020-08-21 06:06:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizacions`
--

CREATE TABLE `cotizacions` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `articulo_id` int(10) UNSIGNED NOT NULL,
  `orden_id` int(10) UNSIGNED DEFAULT NULL,
  `cantidad` double NOT NULL,
  `pvp` double NOT NULL,
  `descuento` double NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `departamento`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Asesores\r\n', '1', NULL, NULL),
(2, 'Facturacion', '1', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direcion_clientes`
--

CREATE TABLE `direcion_clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `departamento` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ciudad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cod_postal` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `direcion_clientes`
--

INSERT INTO `direcion_clientes` (`id`, `cliente_id`, `direccion`, `pais`, `departamento`, `ciudad`, `cod_postal`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'RAul leonis II, Casa 100', 'Venezuela', 'Aragua', 'El amparo', '5062', '1', '2020-08-21 06:06:35', '2020-08-21 06:06:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2018_11_17_001658_create_configs_table', 1),
(4, '2020_08_08_210124_create_categorias_table', 1),
(5, '2020_08_08_210125_create_articulos_table', 1),
(6, '2020_08_09_020517_create_cargos_table', 1),
(7, '2020_08_09_020517_create_departamentos_table', 1),
(8, '2020_08_09_020518_create_asesors_table', 1),
(9, '2020_08_09_020519_create_clientes_table', 1),
(10, '2020_08_09_182155_create_telf_clientes_table', 1),
(11, '2020_08_09_183732_create_direcion_clientes_table', 1),
(12, '2020_08_09_184226_create_contacto_comercials_table', 1),
(13, '2020_08_10_153307_create_condicion_pagos_table', 1),
(14, '2020_08_10_153308_create_ordens_table', 1),
(15, '2020_08_10_153309_create_cotizacions_table', 1),
(16, '2020_08_13_153009_create_archivo_cotizacions_table', 1),
(17, '2020_08_13_155149_create_user_clientes_table', 1),
(18, '2020_08_16_004854_create_bancos_table', 2),
(19, '2020_08_16_005029_create_cliente_bancos_table', 2),
(20, '2020_08_16_005753_create_clt_dir_facturas_table', 2),
(21, '2020_08_16_005833_create_clt_i_es_table', 2),
(22, '2020_08_16_010403_create_clt_monedas_table', 2),
(23, '2020_08_16_010816_create_clt_regimens_table', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordens`
--

CREATE TABLE `ordens` (
  `id` int(10) UNSIGNED NOT NULL,
  `condicion_id` int(10) UNSIGNED NOT NULL,
  `asesor_id` int(10) UNSIGNED DEFAULT NULL,
  `fecha` date NOT NULL,
  `impuesto` double NOT NULL,
  `serie` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comentario` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `telf_clientes`
--

CREATE TABLE `telf_clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `tipoTlf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numero` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `telf_clientes`
--

INSERT INTO `telf_clientes` (`id`, `cliente_id`, `tipoTlf`, `numero`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '1', '04162733648', '1', '2020-08-21 06:06:35', '2020-08-21 06:06:35');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `usuario` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo_documento` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `num_documento` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `path` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `nivel` char(1) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombres`, `usuario`, `tipo_documento`, `num_documento`, `direccion`, `email`, `telefono`, `password`, `cargo`, `path`, `status`, `nivel`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Desarrollador', 'admin', NULL, NULL, NULL, NULL, NULL, '$2y$10$X7BzkyQkgP6rwI6LixyQkeZtFGSKSS8MF2Bm8/dHexiidZq6V6df.', '1', NULL, '1', '1', 'hq9D6QU5enwWNBiQmMZk9ni1ainA1ZOkJn0Ne0LDRdezpGO62y8jnHK9BPRa', NULL, NULL),
(19, 'Anthony Araujo Peroza', '123456', NULL, NULL, NULL, NULL, NULL, '$2y$10$obRR7LUqQToUav0NNdmvgeQuOTp/LDUg1sfmBAsesD2C0qi1OseEK', NULL, NULL, '1', '0', 'QAWrdkv6nW6XMgGbDhJR0gR31KLrFWLk57SXbowbcVV28HGJEA9Xbeqe5oZ6', '2020-08-21 06:06:35', '2020-08-21 06:07:48');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivo_cotizacions`
--
ALTER TABLE `archivo_cotizacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `archivo_cotizacions_orden_id_foreign` (`orden_id`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `articulos_categoria_id_foreign` (`categoria_id`);

--
-- Indices de la tabla `asesors`
--
ALTER TABLE `asesors`
  ADD PRIMARY KEY (`id`),
  ADD KEY `asesors_departamento_id_foreign` (`departamento_id`),
  ADD KEY `asesors_cargo_id_foreign` (`cargo_id`);

--
-- Indices de la tabla `bancos`
--
ALTER TABLE `bancos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_user_id_foreign` (`user_id`),
  ADD KEY `clientes_asesor_id_foreign` (`asesor_id`);

--
-- Indices de la tabla `cliente_bancos`
--
ALTER TABLE `cliente_bancos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cliente_bancos_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `clt_dir_facturas`
--
ALTER TABLE `clt_dir_facturas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clt_dir_facturas_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `clt_i_es`
--
ALTER TABLE `clt_i_es`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clt_i_es_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `clt_monedas`
--
ALTER TABLE `clt_monedas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clt_monedas_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `clt_regimens`
--
ALTER TABLE `clt_regimens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clt_regimens_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `condicion_pagos`
--
ALTER TABLE `condicion_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contacto_comercials`
--
ALTER TABLE `contacto_comercials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contacto_comercials_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `cotizacions`
--
ALTER TABLE `cotizacions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cotizacions_cliente_id_foreign` (`cliente_id`),
  ADD KEY `cotizacions_orden_id_foreign` (`orden_id`),
  ADD KEY `cotizacions_articulo_id_foreign` (`articulo_id`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `direcion_clientes`
--
ALTER TABLE `direcion_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `direcion_clientes_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ordens`
--
ALTER TABLE `ordens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordens_asesor_id_foreign` (`asesor_id`),
  ADD KEY `ordens_condicion_id_foreign` (`condicion_id`);

--
-- Indices de la tabla `telf_clientes`
--
ALTER TABLE `telf_clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `telf_clientes_cliente_id_foreign` (`cliente_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivo_cotizacions`
--
ALTER TABLE `archivo_cotizacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `asesors`
--
ALTER TABLE `asesors`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `bancos`
--
ALTER TABLE `bancos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cliente_bancos`
--
ALTER TABLE `cliente_bancos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clt_dir_facturas`
--
ALTER TABLE `clt_dir_facturas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clt_i_es`
--
ALTER TABLE `clt_i_es`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `clt_monedas`
--
ALTER TABLE `clt_monedas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clt_regimens`
--
ALTER TABLE `clt_regimens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `condicion_pagos`
--
ALTER TABLE `condicion_pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `configs`
--
ALTER TABLE `configs`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contacto_comercials`
--
ALTER TABLE `contacto_comercials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `cotizacions`
--
ALTER TABLE `cotizacions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `direcion_clientes`
--
ALTER TABLE `direcion_clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `ordens`
--
ALTER TABLE `ordens`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `telf_clientes`
--
ALTER TABLE `telf_clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivo_cotizacions`
--
ALTER TABLE `archivo_cotizacions`
  ADD CONSTRAINT `archivo_cotizacions_orden_id_foreign` FOREIGN KEY (`orden_id`) REFERENCES `ordens` (`id`);

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `asesors`
--
ALTER TABLE `asesors`
  ADD CONSTRAINT `asesors_cargo_id_foreign` FOREIGN KEY (`cargo_id`) REFERENCES `cargos` (`id`),
  ADD CONSTRAINT `asesors_departamento_id_foreign` FOREIGN KEY (`departamento_id`) REFERENCES `departamentos` (`id`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_asesor_id_foreign` FOREIGN KEY (`asesor_id`) REFERENCES `asesors` (`id`),
  ADD CONSTRAINT `clientes_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `cliente_bancos`
--
ALTER TABLE `cliente_bancos`
  ADD CONSTRAINT `cliente_bancos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `clt_dir_facturas`
--
ALTER TABLE `clt_dir_facturas`
  ADD CONSTRAINT `clt_dir_facturas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `clt_i_es`
--
ALTER TABLE `clt_i_es`
  ADD CONSTRAINT `clt_i_es_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `clt_monedas`
--
ALTER TABLE `clt_monedas`
  ADD CONSTRAINT `clt_monedas_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `clt_regimens`
--
ALTER TABLE `clt_regimens`
  ADD CONSTRAINT `clt_regimens_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `contacto_comercials`
--
ALTER TABLE `contacto_comercials`
  ADD CONSTRAINT `contacto_comercials_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `cotizacions`
--
ALTER TABLE `cotizacions`
  ADD CONSTRAINT `cotizacions_articulo_id_foreign` FOREIGN KEY (`articulo_id`) REFERENCES `articulos` (`id`),
  ADD CONSTRAINT `cotizacions_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `cotizacions_orden_id_foreign` FOREIGN KEY (`orden_id`) REFERENCES `ordens` (`id`);

--
-- Filtros para la tabla `direcion_clientes`
--
ALTER TABLE `direcion_clientes`
  ADD CONSTRAINT `direcion_clientes_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);

--
-- Filtros para la tabla `ordens`
--
ALTER TABLE `ordens`
  ADD CONSTRAINT `ordens_asesor_id_foreign` FOREIGN KEY (`asesor_id`) REFERENCES `asesors` (`id`),
  ADD CONSTRAINT `ordens_condicion_id_foreign` FOREIGN KEY (`condicion_id`) REFERENCES `condicion_pagos` (`id`);

--
-- Filtros para la tabla `telf_clientes`
--
ALTER TABLE `telf_clientes`
  ADD CONSTRAINT `telf_clientes_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
