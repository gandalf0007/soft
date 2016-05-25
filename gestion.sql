-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 25-05-2016 a las 06:32:10
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `clie_nombres` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clie_direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clie_telefono` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clie_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clie_observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clie_localidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clie_iva` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clie_lista_precio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clie_cuit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clie_cp` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transp_des` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `clie_habilitado` int(11) NOT NULL,
  `clie_hab_cta` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `clie_nombres`, `clie_direccion`, `clie_telefono`, `clie_mail`, `clie_observacion`, `clie_localidad`, `clie_iva`, `clie_lista_precio`, `clie_cuit`, `clie_cp`, `transp_des`, `clie_habilitado`, `clie_hab_cta`, `created_at`, `updated_at`) VALUES
(7, 'matias', 'rondeau 1522', '4247875', '', '', '', '2', '', '', '', '2', 0, 0, '2016-05-16 04:34:13', '2016-05-17 02:05:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ivas`
--

CREATE TABLE `ivas` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ivas`
--

INSERT INTO `ivas` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'consumidor final', NULL, NULL),
(2, 'exento', NULL, NULL),
(3, 'monotributo', NULL, NULL),
(4, 'resp. inscripto', NULL, NULL),
(5, 'resp. no inscripto', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ivatipos`
--

CREATE TABLE `ivatipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `valor` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ivatipos`
--

INSERT INTO `ivatipos` (`id`, `descripcion`, `valor`, `created_at`, `updated_at`) VALUES
(1, '21%', '21', '2016-05-04 02:00:04', '2016-05-04 02:00:04'),
(2, '123123', '123123', '2016-05-15 22:27:35', '2016-05-15 22:27:35'),
(3, 'asd', 'asd', '2016-05-15 22:28:43', '2016-05-15 22:28:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(3, 'intel', '2016-05-03 01:39:15', '2016-05-03 01:39:15'),
(4, 'amd', '2016-05-03 01:44:35', '2016-05-03 01:44:35'),
(5, 'asd', '2016-05-03 02:33:30', '2016-05-03 02:33:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_100000_create_password_resets_table', 1),
('2016_04_30_051825_create_perfiles_table', 2),
('2016_04_30_193128_create_perfils_table', 3),
('2016_05_01_055334_Create_Users_table', 4),
('2016_05_01_062417_create_rubros_table', 5),
('2016_05_01_070829_create_ivatipos_table', 6),
('2016_05_03_030122_create_productos_table', 7),
('2016_05_03_032116_create_marcas_table', 8),
('2016_05_05_001312_create_provedores_table', 9),
('2016_05_16_060153_create_clientes_table', 10),
('2016_05_16_154207_create_ivas_table', 11),
('2016_05_16_155122_create_transportes_table', 12),
('2016_05_21_023630_create_ventas_table', 13),
('2016_05_21_024427_create_venta__items_table', 14),
('2015_03_06_000000_aimeos_users_table', 15),
('2015_08_10_000000_aimeos_users_label', 15),
('2016_05_22_224317_create_productos_adds_table', 16),
('2016_05_24_030229_create_transactions_table', 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `perfils`
--

CREATE TABLE `perfils` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `perfils`
--

INSERT INTO `perfils` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'admin', NULL, NULL),
(2, 'gerente', NULL, NULL),
(3, 'user', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_descrip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_preciocosto` double NOT NULL,
  `iva_id` int(11) NOT NULL,
  `pro_venta` double NOT NULL,
  `pro_precio2` double NOT NULL,
  `pro_precio3` double NOT NULL,
  `pro_rentabi1` double NOT NULL,
  `pro_rentabi2` double NOT NULL,
  `pro_rentabi3` double NOT NULL,
  `pro_atock_act` double NOT NULL,
  `pro_atock_cri` double NOT NULL,
  `pro_atock_ped` double NOT NULL,
  `rubro_id` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `pro_cod_alter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_ubicacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_cod_bulto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_cant_bulto` double NOT NULL,
  `provedor_id` int(11) NOT NULL,
  `pro_habilitado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_usar_rentabili` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `pro_descrip`, `path`, `pro_preciocosto`, `iva_id`, `pro_venta`, `pro_precio2`, `pro_precio3`, `pro_rentabi1`, `pro_rentabi2`, `pro_rentabi3`, `pro_atock_act`, `pro_atock_cri`, `pro_atock_ped`, `rubro_id`, `marca_id`, `pro_cod_alter`, `pro_ubicacion`, `pro_cod_bulto`, `pro_cant_bulto`, `provedor_id`, `pro_habilitado`, `pro_alerta`, `pro_observaciones`, `pro_usar_rentabili`, `fecha_alta`, `created_at`, `updated_at`) VALUES
(41, 'manzana', '', 10, 21, 15, 0, 0, 0, 0, 0, 10, 0, 0, 1, 3, '', '', '', 0, 2, '', '', '', '', '0000-00-00 00:00:00', '2016-05-22 22:24:51', '2016-05-22 22:24:51'),
(42, 'banana', '', 10, 21, 15, 0, 0, 0, 0, 0, 5, 0, 0, 1, 3, '', '', '', 0, 2, '', '', '', '', '0000-00-00 00:00:00', '2016-05-22 23:08:18', '2016-05-22 23:08:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_adds`
--

CREATE TABLE `productos_adds` (
  `id` int(10) UNSIGNED NOT NULL,
  `pro_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `user_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `pro_descrip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `pro_imagen` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_preciocosto` double NOT NULL,
  `iva_id` int(11) NOT NULL,
  `pro_precio1` double NOT NULL,
  `pro_precio2` double NOT NULL,
  `pro_precio3` double NOT NULL,
  `pro_rentabi1` double NOT NULL,
  `pro_rentabi2` double NOT NULL,
  `pro_rentabi3` double NOT NULL,
  `pro_atock_act` double NOT NULL,
  `pro_atock_cri` double NOT NULL,
  `pro_atock_ped` double NOT NULL,
  `rubro_id` int(11) NOT NULL,
  `marca_id` int(11) NOT NULL,
  `pro_cod_alter` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_ubicacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_cod_bulto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_cant_bulto` double NOT NULL,
  `provedor_id` int(11) NOT NULL,
  `pro_habilitado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_alerta` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_observaciones` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pro_usar_rentabili` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_alta` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provedores`
--

CREATE TABLE `provedores` (
  `id` int(10) UNSIGNED NOT NULL,
  `prov_razsoc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_contacto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_mail` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_skype` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_direccion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_diasvisita` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_cuit` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_observacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `prov_habilitado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `provedores`
--

INSERT INTO `provedores` (`id`, `prov_razsoc`, `prov_contacto`, `prov_mail`, `prov_skype`, `prov_direccion`, `prov_tel`, `prov_diasvisita`, `prov_cuit`, `prov_observacion`, `prov_habilitado`, `created_at`, `updated_at`) VALUES
(2, 'new bite', 'hector', 'newbite@hotmail.com', '', '', '', '', '', '', '', '2016-05-04 22:42:25', '2016-05-04 22:46:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rubros`
--

CREATE TABLE `rubros` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `rubros`
--

INSERT INTO `rubros` (`id`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'ferreteria', '2016-05-04 02:09:11', '2016-05-04 02:09:11'),
(2, 'qeqweqe', '2016-05-15 22:24:43', '2016-05-15 22:24:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `scaffoldinterfaces`
--

CREATE TABLE `scaffoldinterfaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `package` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `model` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `controller` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `views` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tablename` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `scaffoldinterfaces`
--

INSERT INTO `scaffoldinterfaces` (`id`, `package`, `migration`, `model`, `controller`, `views`, `tablename`, `created_at`, `updated_at`) VALUES
(4, 'Laravel', 'C:\\xampp\\htdocs\\soft/database/migrations/2016_05_16_053512_leandors.php', 'C:\\xampp\\htdocs\\soft/app/Leandor.php', 'C:\\xampp\\htdocs\\soft/app/Http/Controllers/LeandorController.php', 'C:\\xampp\\htdocs\\soft/resources/views/leandor', 'leandors', '2016-05-16 03:35:12', '2016-05-16 03:35:12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transactions`
--

CREATE TABLE `transactions` (
  `id` int(10) UNSIGNED NOT NULL,
  `venta_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `product_id` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `qty` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_price` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `transactions`
--

INSERT INTO `transactions` (`id`, `venta_id`, `product_id`, `user`, `qty`, `total_price`, `status`, `created_at`, `updated_at`) VALUES
(36, '1', '41', 'admin', '1', '15', 'pagado', '2016-05-24 20:53:51', '2016-05-24 20:53:51'),
(37, '1', '41', 'admin', '1', '15', 'pagado', '2016-05-24 20:53:51', '2016-05-24 20:53:51'),
(38, '1', '41', 'admin', '1', '15', 'pagado', '2016-05-24 20:54:12', '2016-05-24 20:54:12'),
(39, NULL, '41', 'admin', '1', '15', 'pagado', '2016-05-24 21:09:12', '2016-05-24 21:09:12'),
(40, NULL, '42', 'admin', '1', '15', 'pagado', '2016-05-24 21:10:47', '2016-05-24 21:10:47'),
(41, '1', '41', 'admin', '1', '15', 'pagado', '2016-05-24 21:11:31', '2016-05-24 21:11:31'),
(42, '2', '41', 'admin', '1', '15', 'pagado', '2016-05-24 21:11:59', '2016-05-24 21:11:59'),
(43, '2', '42', 'admin', '1', '15', 'pagado', '2016-05-24 21:11:59', '2016-05-24 21:11:59'),
(44, '3', '41', 'admin', '1', '15', 'pagado', '2016-05-24 21:45:48', '2016-05-24 21:45:48'),
(45, '3', '42', 'admin', '1', '15', 'pagado', '2016-05-24 21:45:48', '2016-05-24 21:45:48'),
(46, '3', '42', 'admin', '1', '15', 'pagado', '2016-05-24 21:45:48', '2016-05-24 21:45:48'),
(47, '4', '41', 'admin', '1', '15', 'pagado', '2016-05-24 22:04:36', '2016-05-24 22:04:36'),
(48, '5', '41', 'admin', '1', '15', 'pagado', '2016-05-24 22:05:37', '2016-05-24 22:05:37'),
(49, '6', '41', 'admin', '1', '15', 'pagado', '2016-05-25 00:24:10', '2016-05-25 00:24:10'),
(50, '6', '41', 'admin', '1', '15', 'pagado', '2016-05-25 00:24:10', '2016-05-25 00:24:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `transportes`
--

CREATE TABLE `transportes` (
  `id` int(10) UNSIGNED NOT NULL,
  `transp_descrip` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transp_direcc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `transp_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `transportes`
--

INSERT INTO `transportes` (`id`, `transp_descrip`, `transp_direcc`, `transp_tel`, `created_at`, `updated_at`) VALUES
(2, 'oca', 'santa 755', '4239585', '2016-05-16 14:26:54', '2016-05-16 14:26:54'),
(3, 'bisonte', 'talitas', 'asdasd', '2016-05-17 02:27:30', '2016-05-17 02:27:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `usu_nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usu_apellido` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `path` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `usu_direcc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usu_tel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `usu_perfil` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `usu_nombre`, `usu_apellido`, `email`, `password`, `path`, `usu_direcc`, `usu_tel`, `usu_perfil`, `remember_token`, `created_at`, `updated_at`) VALUES
(10, 'matias', 'gandalf007', 'admins@gmail.com', '619619619', NULL, '', '', '1', 'fqy7UD7TCkBOPahHOBbJzRFulfBZBZr54f9PgxCQMeq6e90R4QYxUSrKrOSw', '2016-05-24 00:27:34', '2016-05-24 03:18:10'),
(11, 'leandro', 'gandalf007', 'matias@gmail.com', '619619619', NULL, '', '', '1', '9pRxvdzNjgvDOsNZ16RfSec0l0IMj9jliC97KxVr2itKAm87HvgGVfEem01v', '2016-05-24 03:18:49', '2016-05-24 03:19:37'),
(12, 'admin', '', 'admin@gmail.com', '$2y$10$qA7Ui.RPIIMi7hFbGv7lcu58fIvz20GB.cCf47Ji.UGHcTMewncs.', NULL, '', '', '', NULL, '2016-05-24 03:20:04', '2016-05-24 03:20:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pago_tipo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `comentario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `cliente_id`, `user_id`, `pago_tipo`, `comentario`, `total`, `created_at`, `updated_at`) VALUES
(1, 0, 0, '', '', NULL, '2016-05-24 21:11:31', '2016-05-24 21:11:31'),
(2, 0, 0, '', '', NULL, '2016-05-24 21:11:59', '2016-05-24 21:11:59'),
(3, 0, 0, '', '', NULL, '2016-05-24 21:45:48', '2016-05-24 21:45:48'),
(4, 0, 0, '', '', NULL, '2016-05-24 22:04:36', '2016-05-24 22:04:36'),
(5, 0, 0, '', '', NULL, '2016-05-24 22:05:37', '2016-05-24 22:05:37'),
(6, 0, 0, '', '', NULL, '2016-05-25 00:24:10', '2016-05-25 00:24:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `venta_items`
--

CREATE TABLE `venta_items` (
  `id` int(10) UNSIGNED NOT NULL,
  `venta_id` int(11) NOT NULL,
  `producto_id` int(11) NOT NULL,
  `precio_costo` decimal(8,2) NOT NULL,
  `precio_venta` decimal(8,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `total_costo` decimal(8,2) NOT NULL,
  `total_venta` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ivas`
--
ALTER TABLE `ivas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ivatipos`
--
ALTER TABLE `ivatipos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `perfils`
--
ALTER TABLE `perfils`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos_adds`
--
ALTER TABLE `productos_adds`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `provedores`
--
ALTER TABLE `provedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `rubros`
--
ALTER TABLE `rubros`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `scaffoldinterfaces`
--
ALTER TABLE `scaffoldinterfaces`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `transportes`
--
ALTER TABLE `transportes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `venta_items`
--
ALTER TABLE `venta_items`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `ivas`
--
ALTER TABLE `ivas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `ivatipos`
--
ALTER TABLE `ivatipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `perfils`
--
ALTER TABLE `perfils`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `productos_adds`
--
ALTER TABLE `productos_adds`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `provedores`
--
ALTER TABLE `provedores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `rubros`
--
ALTER TABLE `rubros`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `scaffoldinterfaces`
--
ALTER TABLE `scaffoldinterfaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;
--
-- AUTO_INCREMENT de la tabla `transportes`
--
ALTER TABLE `transportes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `venta_items`
--
ALTER TABLE `venta_items`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
