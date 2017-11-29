-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 29-11-2017 a las 19:13:32
-- Versión del servidor: 5.7.14
-- Versión de PHP: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gi_file`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargo`
--

CREATE TABLE `cargo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `id_institucion` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargo`
--

INSERT INTO `cargo` (`id`, `nombre`, `descripcion`, `estado`, `id_institucion`) VALUES
(8, 'Administrador General', 'Administrador General', 1, NULL),
(9, 'Administrador', 'Administrador', 1, NULL),
(10, 'Cliente', 'Usuario Final del Sistema', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `descripcion`, `id_institucion`, `created_at`, `updated_at`) VALUES
(3, 'contrato', 2, NULL, NULL),
(4, 'prestamo', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `contenido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cu`
--

CREATE TABLE `cu` (
  `id` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` bit(1) NOT NULL,
  `id_institucion` int(10) UNSIGNED DEFAULT NULL,
  `ruta` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cu`
--

INSERT INTO `cu` (`id`, `id_modulo`, `nombre`, `estado`, `id_institucion`, `ruta`) VALUES
(1, 1, 'Gestionar Institucion', b'1', NULL, 'GestionarInstitucion'),
(2, 1, 'Gestionar Administrador', b'1', NULL, 'GestionarAdministrador'),
(4, 9, 'Consultar Bitacora', b'1', NULL, 'ConsultarBitacora'),
(5, 9, 'Generar Reporte', b'1', NULL, 'GenerarReporte'),
(6, 2, 'Gestionar Documento', b'1', NULL, '#'),
(7, 2, 'Gestionar Workflow', b'1', NULL, 'GestionarWorkflow'),
(9, 2, 'Gestionar Directorio', b'1', NULL, '#'),
(10, 2, 'Consultar Historial', b'1', NULL, '#'),
(13, 2, 'Realizar Suscripcion', b'1', NULL, '#'),
(14, 2, 'Gestionar Categoria', b'1', NULL, '#'),
(15, 3, 'Gestionar Sitio', b'1', NULL, 'GestionarSitio'),
(16, 3, 'Gestionar Departamento', b'1', NULL, 'GestionarDepartamento'),
(17, 3, 'Subir Contenido', b'1', NULL, '#'),
(20, 3, 'Gestionar Contenido-Sitio', b'1', NULL, '#'),
(22, 3, 'Realizar Comentario', b'1', NULL, '#'),
(23, 4, 'Gestionar Usuario', b'1', NULL, 'GestionarUsuario'),
(24, 4, 'Gestionar Grupo', b'1', NULL, 'GestionarGrupo'),
(28, 9, 'Backup', b'1', NULL, 'backup'),
(30, 1, 'Gestionar Admin', b'1', NULL, 'UsuarioG');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departamentos`
--

CREATE TABLE `departamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departamentos`
--

INSERT INTO `departamentos` (`id`, `nombre`, `id_institucion`, `created_at`, `updated_at`) VALUES
(1, 'Control-Brecha', 4, '2017-10-19 10:00:00', '2017-10-19 10:00:00'),
(2, 'Admin-Muruchi', 3, NULL, NULL),
(3, 'Admin-Cooperativa', 6, '2017-10-25 18:44:44', '2017-10-25 18:44:44'),
(4, 'admin-Abogados', 7, '2017-10-25 19:04:22', '2017-10-25 19:04:22'),
(5, 'Contabilidad', 7, '2017-10-25 19:07:07', '2017-10-25 19:07:07'),
(6, 'Finanzas', 7, '2017-10-25 19:12:04', '2017-10-25 19:12:04'),
(7, 'admin-Cybers', 9, '2017-10-25 20:44:46', '2017-10-25 20:44:46'),
(8, 'Contabilidad', 9, '2017-10-25 20:46:42', '2017-10-25 20:46:42'),
(10, 'admin-Telphi', 11, '2017-10-25 21:18:55', '2017-10-25 21:18:55'),
(11, 'Soporte', 11, '2017-10-25 21:22:00', '2017-10-25 21:22:00'),
(12, 'Soporte Tecnico', 6, '2017-10-25 21:50:44', '2017-10-25 21:50:44'),
(13, 'admin-EduSoft', 12, '2017-10-25 21:57:38', '2017-10-25 21:57:38'),
(14, 'Documentadores', 12, '2017-10-25 22:43:05', '2017-10-25 22:43:05'),
(15, 'Administradores-MovilSoft', 13, '2017-10-26 08:00:39', '2017-10-26 08:00:39'),
(16, 'Desarrollo', 13, '2017-10-26 08:06:22', '2017-10-26 08:06:22'),
(17, 'CARTERPILLAR-ADMIN', 14, '2017-11-23 19:09:17', '2017-11-23 19:09:17'),
(18, 'Contabilidad', 14, '2017-11-23 19:12:14', '2017-11-23 19:12:14'),
(19, 'Prueba-Soft-Admin', 15, '2017-11-25 20:01:51', '2017-11-25 20:01:51'),
(20, 'Documentos', 15, '2017-11-25 20:06:29', '2017-11-25 20:06:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_contenidos`
--

CREATE TABLE `detalle_contenidos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_documento` int(10) UNSIGNED NOT NULL,
  `id_directorio` int(10) UNSIGNED NOT NULL,
  `id_sitio` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_sitios`
--

CREATE TABLE `detalle_sitios` (
  `id` int(10) UNSIGNED NOT NULL,
  `cargo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estadoU` int(11) NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_comentario` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `id_sitio` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_suscripcions`
--

CREATE TABLE `detalle_suscripcions` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_suscripcion` int(10) UNSIGNED NOT NULL,
  `id_documento` int(10) UNSIGNED NOT NULL,
  `path` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `detalle_suscripcions`
--

INSERT INTO `detalle_suscripcions` (`id`, `estado`, `id_institucion`, `id_suscripcion`, `id_documento`, `path`, `created_at`, `updated_at`) VALUES
(11, '1', 13, 6, 1, 'shares/folder free', '2017-11-30 04:09:43', '2017-11-30 04:09:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorios`
--

CREATE TABLE `directorios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_directorio` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `directorio_documentos`
--

CREATE TABLE `directorio_documentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_directorio` int(10) UNSIGNED NOT NULL,
  `id_documento` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documentos`
--

CREATE TABLE `documentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `extension` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_documento` int(10) UNSIGNED DEFAULT NULL,
  `id_categoria` int(10) UNSIGNED NOT NULL,
  `id_estado` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `documentos`
--

INSERT INTO `documentos` (`id`, `descripcion`, `extension`, `id_institucion`, `id_documento`, `id_categoria`, `id_estado`, `id_users`, `created_at`, `updated_at`) VALUES
(1, ' Contrato de Proyecto Nacional', '.docx', 2, NULL, 3, 1, 8, NULL, NULL),
(2, 'Contrato Anual de Proveedor', '.docx', 2, 1, 3, 1, 8, NULL, NULL),
(3, 'Tratimes de App Nuevas', '.docx', 2, NULL, 3, 1, 8, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `descripcion`, `id_institucion`, `created_at`, `updated_at`) VALUES
(1, 'en proceso', 2, NULL, NULL),
(2, 'terminado', 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`id`, `descripcion`, `id_institucion`, `created_at`, `updated_at`) VALUES
(1, 'ADMGENERAL', NULL, '2017-10-19 10:00:00', '2017-10-19 10:00:00'),
(2, 'ADMINISTRADORES', 2, NULL, NULL),
(3, 'USUARIOS', 2, NULL, NULL),
(5, 'Nerds', 4, '2017-10-24 11:35:00', '2017-10-24 11:35:00'),
(6, 'Prueba', NULL, '2017-10-24 13:06:46', '2017-10-24 13:06:46'),
(7, 'Privilegios Abogados', 7, '2017-10-25 19:32:11', '2017-10-25 19:32:11'),
(8, 'Contadores', 9, '2017-10-25 20:47:29', '2017-10-25 20:47:29'),
(9, 'Operadores', 11, '2017-10-25 21:22:20', '2017-10-25 21:22:20'),
(10, 'Operadores', 6, '2017-10-25 21:51:04', '2017-10-25 21:51:04'),
(11, 'Doc-Privilegios', 12, '2017-10-25 22:43:37', '2017-10-25 22:43:37'),
(12, 'Dep-Desarrollo', 13, '2017-10-26 08:08:49', '2017-10-26 08:08:49'),
(13, 'Contabilidad_CATER', 14, '2017-11-23 19:11:35', '2017-11-23 19:11:35'),
(14, 'Documentadores', 15, '2017-11-25 20:05:09', '2017-11-25 20:05:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupo_privilegios`
--

CREATE TABLE `grupo_privilegios` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED DEFAULT NULL,
  `id_grupo` int(10) UNSIGNED DEFAULT NULL,
  `id_cu` int(10) DEFAULT NULL,
  `INSERTAR` int(11) NOT NULL,
  `MODIFICAR` int(11) NOT NULL,
  `ELIMINAR` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `grupo_privilegios`
--

INSERT INTO `grupo_privilegios` (`id`, `estado`, `id_institucion`, `id_grupo`, `id_cu`, `INSERTAR`, `MODIFICAR`, `ELIMINAR`, `created_at`, `updated_at`) VALUES
(1, '1', NULL, 1, 1, 1, 1, 1, NULL, NULL),
(4, '1', NULL, 1, 4, 1, 1, 1, '2017-10-19 10:00:00', '2017-10-19 10:00:00'),
(5, '1', NULL, 1, 5, 1, 1, 1, NULL, NULL),
(16, '1', NULL, 1, 16, 1, 1, 1, NULL, NULL),
(24, '1', NULL, 1, 24, 1, 1, 1, NULL, NULL),
(28, '1', NULL, 1, 28, 1, 1, 1, NULL, NULL),
(59, '1', NULL, 1, 30, 1, 1, 1, NULL, NULL),
(65, '1', NULL, 2, 5, 1, 1, 0, '2017-10-25 08:09:58', '2017-10-25 08:09:58'),
(67, '1', NULL, 2, 23, 1, 1, 1, '2017-10-25 08:09:58', '2017-10-25 08:09:58'),
(68, '1', NULL, 2, 7, 1, 1, 1, '2017-10-25 08:09:58', '2017-10-25 08:09:58'),
(69, '1', NULL, 2, 16, 1, 1, 1, '2017-10-25 08:09:58', '2017-10-25 08:09:58'),
(70, '1', NULL, 2, 24, 1, 1, 1, '2017-10-25 08:09:58', '2017-10-25 08:09:58'),
(71, '1', NULL, 5, 5, 1, 1, 0, '2017-10-25 12:22:59', '2017-10-25 12:22:59'),
(72, '1', NULL, 7, 6, 1, 1, 1, '2017-10-25 19:39:05', '2017-10-25 19:39:05'),
(74, '1', NULL, 8, 6, 1, 1, 1, '2017-10-25 20:48:25', '2017-10-25 20:48:25'),
(75, '1', NULL, 8, 9, 1, 1, 1, '2017-10-25 20:48:25', '2017-10-25 20:48:25'),
(76, '1', NULL, 8, 13, 1, 1, 1, '2017-10-25 20:48:25', '2017-10-25 20:48:25'),
(77, '1', NULL, 2, 28, 1, 1, 1, '2017-10-25 21:06:44', '2017-10-25 21:06:44'),
(78, '1', NULL, 9, 6, 1, 1, 1, '2017-10-25 21:23:22', '2017-10-25 21:23:22'),
(80, '1', NULL, 9, 28, 1, 0, 0, '2017-10-25 21:23:22', '2017-10-25 21:23:22'),
(81, '1', NULL, 10, 4, 1, 1, 1, '2017-10-25 21:52:43', '2017-10-25 21:52:43'),
(82, '1', NULL, 10, 28, 1, 1, 1, '2017-10-25 21:52:43', '2017-10-25 21:52:43'),
(84, '1', NULL, 11, 16, 1, 0, 0, '2017-10-25 22:46:59', '2017-10-25 22:46:59'),
(85, '1', NULL, 2, 4, 1, 1, 1, '2017-10-26 00:38:32', '2017-10-26 00:38:32'),
(86, '1', NULL, 12, 5, 1, 0, 1, '2017-10-26 08:15:31', '2017-10-26 08:15:31'),
(87, '1', NULL, 12, 22, 1, 1, 1, '2017-10-26 08:15:31', '2017-10-26 08:15:31'),
(88, '1', NULL, 12, 7, 0, 1, 0, '2017-10-26 08:15:32', '2017-10-26 08:15:32'),
(89, '1', NULL, 12, 16, 0, 1, 0, '2017-10-26 11:42:24', '2017-10-26 11:42:24'),
(90, '1', NULL, 13, 5, 1, 1, 1, '2017-11-23 19:14:41', '2017-11-23 19:14:41'),
(91, '1', NULL, 13, 9, 1, 1, 1, '2017-11-23 19:14:41', '2017-11-23 19:14:41'),
(92, '1', NULL, 14, 5, 1, 1, 1, '2017-11-25 20:06:03', '2017-11-25 20:06:03'),
(93, '1', NULL, 14, 6, 1, 1, 1, '2017-11-25 20:06:04', '2017-11-25 20:06:04'),
(94, '1', NULL, 14, 7, 1, 1, 1, '2017-11-25 20:06:04', '2017-11-25 20:06:04'),
(95, '1', NULL, 14, 9, 1, 1, 1, '2017-11-25 20:06:04', '2017-11-25 20:06:04'),
(96, '1', NULL, 14, 16, 1, 1, 1, '2017-11-25 20:06:04', '2017-11-25 20:06:04'),
(97, '1', NULL, 14, 28, 1, 1, 1, '2017-11-25 20:06:04', '2017-11-25 20:06:04'),
(98, '1', NULL, 14, 1, 1, 1, 1, '2017-11-25 20:47:44', '2017-11-25 20:47:44'),
(99, '1', NULL, 14, 2, 1, 1, 1, '2017-11-25 20:47:44', '2017-11-25 20:47:44'),
(102, '1', NULL, 14, 10, 1, 0, 0, '2017-11-25 20:47:44', '2017-11-25 20:47:44'),
(103, '1', NULL, 14, 20, 1, 0, 0, '2017-11-25 20:47:44', '2017-11-25 20:47:44'),
(104, '1', NULL, 14, 24, 1, 0, 0, '2017-11-25 20:47:44', '2017-11-25 20:47:44'),
(107, '1', NULL, 14, 30, 1, 0, 1, '2017-11-25 20:47:44', '2017-11-25 20:47:44'),
(108, '1', NULL, 14, 4, 0, 1, 0, '2017-11-25 20:47:44', '2017-11-25 20:47:44'),
(110, '1', NULL, 14, 13, 0, 1, 0, '2017-11-25 20:47:44', '2017-11-25 20:47:44'),
(111, '1', NULL, 14, 15, 0, 1, 0, '2017-11-25 20:47:44', '2017-11-25 20:47:44'),
(112, '1', NULL, 14, 17, 0, 1, 0, '2017-11-25 20:47:44', '2017-11-25 20:47:44'),
(115, '1', NULL, 14, 23, 0, 1, 0, '2017-11-25 20:47:45', '2017-11-25 20:47:45'),
(118, '1', NULL, 14, 14, 0, 0, 1, '2017-11-25 20:47:45', '2017-11-25 20:47:45'),
(120, '1', NULL, 14, 22, 0, 0, 1, '2017-11-25 20:47:45', '2017-11-25 20:47:45'),
(121, '1', NULL, 2, 15, 1, 1, 1, '2017-11-26 21:52:47', '2017-11-26 21:52:47'),
(122, '1', NULL, 3, 15, 1, 1, 1, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `historials`
--

CREATE TABLE `historials` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `descripcionM` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_documento` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `institucions`
--

CREATE TABLE `institucions` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nit` int(11) NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `institucions`
--

INSERT INTO `institucions` (`id`, `nombre`, `nit`, `estado`, `tipo`, `created_at`, `updated_at`) VALUES
(2, 'institucion1', 6789, '1', '1', '2017-10-19 10:00:00', '2017-10-19 10:00:00'),
(3, 'Muruchi', 465841, 'Activa', 'Publica', '2017-10-24 07:19:27', '2017-10-24 12:38:23'),
(4, 'Mantenimiento', 456789, '1', '1', NULL, NULL),
(5, 'FICCT', 1234875, 'Activa', 'Privada', '2017-10-25 12:50:41', '2017-10-25 12:50:41'),
(6, 'Cooperativa Jesus Nazareno', 123456789, 'Activa', 'Privada', '2017-10-25 18:35:41', '2017-10-25 18:35:41'),
(7, 'Buffet de Abogados', 65487268, 'Activa', 'Privada', '2017-10-25 19:03:32', '2017-10-25 19:03:32'),
(9, 'Cybers', 56798, 'Activa', 'Privada', '2017-10-25 20:42:08', '2017-10-25 20:42:08'),
(11, 'Telphi', 451236, 'Activa', 'Publica', '2017-10-25 21:18:23', '2017-10-25 21:18:23'),
(12, 'EduSoft', 1234845, 'Activa', 'Privada', '2017-10-25 21:57:22', '2017-10-25 21:57:22'),
(13, 'MovilSoft', 324987, 'Activa', 'Privada', '2017-10-26 08:00:13', '2017-10-26 08:00:13'),
(14, 'CATERPILLAR', 123467, 'Activa', 'Privada', '2017-11-23 19:09:02', '2017-11-23 19:09:02'),
(15, 'Prueba-Soft', 23587, 'Activa', 'Privada', '2017-11-25 20:01:34', '2017-11-25 20:01:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2017_10_14_033600_create_institucions_table', 1),
(2, '2017_10_14_042404_create_categorias_table', 1),
(3, '2017_10_14_042428_create_estados_table', 1),
(5, '2017_10_14_042506_create_grupos_table', 1),
(6, '2017_10_14_042523_create_privilegios_table', 1),
(9, '2017_10_14_052919_create_permisos_table', 2),
(10, '2017_10_14_055507_create_departamentos_table', 3),
(11, '2017_10_14_060642_create_permiso_departamentos_table', 4),
(12, '2017_10_14_061858_create_historials_table', 5),
(13, '2017_10_14_062252_create_directorios_table', 6),
(15, '2017_10_14_063218_create_detalle_suscripcions_table', 8),
(16, '2017_10_14_063219_create_users_table', 8),
(17, '2017_10_14_063220_create_password_resets_table', 8),
(18, '2017_10_14_071035_create_workflows_table', 9),
(22, '2017_10_14_071851_create_sitios_table', 11),
(23, '2017_10_14_075905_create_comentarios_table', 12),
(24, '2017_10_14_080439_create_detalle_sitios_table', 13),
(25, '2017_10_14_080624_create_detalle_contenidos_table', 14),
(26, '2017_10_14_082347_create_documentos_table', 15),
(27, '2017_10_15_035012_create_grupo_privilegios_table', 16),
(28, '2017_10_15_041839_create_suscripcions_table', 17),
(29, '2017_10_15_043405_create_directorio_documentos_table', 18),
(30, '2017_10_17_125341_create_workflow_usuarios_table', 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulo`
--

CREATE TABLE `modulo` (
  `id` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_institucion` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `modulo`
--

INSERT INTO `modulo` (`id`, `nombre`, `estado`, `id_institucion`) VALUES
(1, 'Administracion General', 1, NULL),
(2, 'Documento', 1, NULL),
(3, 'Sitios Compartidos', 1, NULL),
(4, 'Usuario', 1, NULL),
(9, 'Herramienta', 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permisos`
--

CREATE TABLE `permisos` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_documento` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permiso_departamentos`
--

CREATE TABLE `permiso_departamentos` (
  `id` int(10) UNSIGNED NOT NULL,
  `estado` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_departamento` int(10) UNSIGNED NOT NULL,
  `id_permiso` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `privilegio`
--

CREATE TABLE `privilegio` (
  `id` int(11) NOT NULL,
  `id_cu` int(11) NOT NULL,
  `id_cargo` int(11) NOT NULL,
  `insertar` int(11) NOT NULL,
  `modificar` int(11) NOT NULL,
  `eliminar` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_institucion` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `privilegio`
--

INSERT INTO `privilegio` (`id`, `id_cu`, `id_cargo`, `insertar`, `modificar`, `eliminar`, `estado`, `id_institucion`) VALUES
(2, 1, 8, 1, 1, 1, 1, NULL),
(3, 2, 8, 1, 1, 1, 1, NULL),
(4, 3, 8, 1, 1, 1, 1, NULL),
(5, 4, 8, 1, 1, 1, 1, NULL),
(6, 5, 8, 1, 1, 1, 1, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sitios`
--

CREATE TABLE `sitios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `suscripcions`
--

CREATE TABLE `suscripcions` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `suscripcions`
--

INSERT INTO `suscripcions` (`id`, `descripcion`, `id_institucion`, `id_users`, `created_at`, `updated_at`) VALUES
(6, 'activo', 13, 33, '2017-11-30 04:09:43', '2017-11-30 04:09:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ci` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '1',
  `online` tinyint(4) NOT NULL DEFAULT '0',
  `id_dpto` int(10) UNSIGNED DEFAULT NULL,
  `id_grupo` int(10) UNSIGNED DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tema` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'light_theme',
  `cbarra` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'yellow_thm',
  `letra` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'arial_f',
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `nombre`, `apellido`, `genero`, `ci`, `estado`, `online`, `id_dpto`, `id_grupo`, `email`, `password`, `token`, `tema`, `cbarra`, `letra`, `remember_token`, `created_at`, `updated_at`) VALUES
(7, 'jose', 'montaño', 'M', '8954', '1', 0, NULL, 1, 'admin2@gmail.com', '', NULL, 'light_theme', 'green_thm', 'courier_f', NULL, '2017-10-20 21:08:07', '2017-10-24 19:32:35'),
(8, 'Fernando', 'Montero', 'M', '54687', '1', 0, 1, 2, 'fer@gmail.com', '', NULL, 'light_theme', 'green_thm', 'courier_f', NULL, '2017-10-21 06:52:48', '2017-10-21 00:32:39'),
(10, 'Emanuel', 'Espinoza', 'M', '98572', '1', 0, 1, 2, 'Emanuel@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-24 09:50:58', '2017-10-24 09:50:58'),
(11, 'Ivan', 'Callizaya', 'M', '6589', '1', 0, 1, 2, 'bola8@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-24 10:11:02', '2017-10-24 10:11:02'),
(12, 'Gonzalo Aguilar', 'Perez', 'M', '654987', '1', 0, 1, 2, 'Ganzo@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-24 10:15:17', '2017-10-24 10:15:17'),
(13, 'Isaias', 'Morochi', 'M', '657', '1', 0, 1, 2, 'escalvo@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-24 10:22:22', '2017-10-24 10:22:22'),
(14, 'leo', 'ayala', 'M', '9933938', '1', 0, 1, 3, 'leo@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-24 11:12:09', '2017-10-24 11:12:09'),
(15, 'ivan', 'Callizaya', 'M', '8383738', '1', 0, 1, 3, 'ivan@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-24 11:14:10', '2017-10-24 11:14:10'),
(16, 'Isaias', 'Muruchi Martinez', 'M', '457689', '1', 0, 2, 2, 'Marmutiadmin@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-24 19:40:32', '2017-10-24 19:40:32'),
(17, 'Maritza', 'Yupanqui', 'F', '5648', '1', 0, 1, 2, 'mary@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-25 12:08:27', '2017-10-25 12:08:27'),
(18, 'Gonzalo Ulises', 'Aguilar', 'M', '6375221', '1', 0, 3, 2, 'adminGonzalo@gmail.com', '', NULL, 'light_theme', 'green_thm', 'arial_f', NULL, '2017-10-25 18:47:55', '2017-10-25 18:48:50'),
(19, 'Leonardo', 'Ayala Cayo', 'M', '11385389', '1', 0, 4, 2, 'adminLeo@gmail.com', '', NULL, 'light_theme', 'blue_thm', 'arial_f', NULL, '2017-10-25 19:05:18', '2017-10-25 19:06:25'),
(20, 'Richard', 'Lopez', 'M', '548963', '1', 0, 6, 3, 'richi@gmail.com', '$2y$10$1cgVAb0RiWUg.Sptj8PgfulIb1jBSXc5FqlYi9fwy8Ijp/SFV6nSS', 'eZBYvC9P2UA:APA91bEptHfVlhWvjAzim0BpLyOAs2XERj8S-6YlB7cSnB4Qp3uy-z83_9BTfWLkcQrSmnjF17eeqadrVZd_Jv0idnn_ANY6qqzm3Q_ueCwDPllA_HJTgBRrg81mRGGwL2FQuhaqnydf', 'light_theme', 'yellow_thm', 'arial_f', 'u39StZF4hv0PDuDhOpKevPuUiRcFf7JFrQFgdyyk7sPQXZ3RwZ299Ia7cClg', '2017-10-25 19:19:22', '2017-10-25 19:19:22'),
(21, 'Nuevo', 'limachi', 'M', '123456', '1', 0, 6, 7, 'li@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-25 19:44:24', '2017-10-25 19:44:24'),
(22, 'Leonela', 'Montaño Vargas', 'M', '549864', '1', 0, 5, 7, 'Leonelita@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-25 20:17:43', '2017-10-25 20:17:43'),
(23, 'Ivan', 'Callisaya', 'M', '65497', '1', 0, 7, 2, 'adminIvan@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-25 20:45:27', '2017-10-25 20:45:27'),
(24, 'Armando', 'Casas', 'M', '782146', '1', 0, 8, 8, 'userArmando@gmail.com', '', NULL, 'light_theme', 'blue_thm', 'timesNewRoman_f', NULL, '2017-10-25 21:02:15', '2017-10-25 21:03:22'),
(25, 'Isaias', 'Morochi', 'M', '5421789', '1', 0, 10, 2, 'adminIsaias@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-25 21:19:57', '2017-10-25 21:19:57'),
(26, 'user1', 'Cayo', 'M', '223423', '1', 0, 11, 9, 'user1@gmail.com', '', NULL, 'light_theme', 'red_thm', 'courier_f', NULL, '2017-10-25 21:24:30', '2017-10-25 21:26:02'),
(27, 'Grettel', 'Montaño', 'M', '657', '1', 0, 6, 7, 'Gret@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-25 21:42:30', '2017-10-25 21:42:30'),
(28, 'Juan', 'Jose', 'M', '456125', '1', 0, 12, 10, 'Juan@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-25 21:51:44', '2017-10-25 21:51:44'),
(29, 'Jose Eduardo', 'Montaño Banegas', 'M', '9827218', '1', 0, 13, 2, 'adminEduardo@gmail.com', '', NULL, 'dark_theme', 'red_thm', 'courier_f', NULL, '2017-10-25 21:58:23', '2017-11-25 19:13:42'),
(30, 'Pepito', 'Perez', 'M', '5648', '1', 0, 14, 11, 'pepe@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-25 22:44:14', '2017-10-25 22:44:14'),
(31, 'Andrea', 'Castellon', 'F', '985642', '1', 0, 14, 11, 'Andy@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-26 00:54:02', '2017-10-26 00:54:02'),
(33, 'Isaias', 'Morochi Sanca', 'M', '985647', '1', 0, 15, 2, 'adminmorochi@gmail.com', '$2y$10$1cgVAb0RiWUg.Sptj8PgfulIb1jBSXc5FqlYi9fwy8Ijp/SFV6nSS', 'token prro', 'light_theme', 'yellow_thm', 'arial_f', 'f0iAf98KHYaRlZRfpa59zRpeKpWki2rAbiKQ6bXReqhDxtUwOBDuXdR27JiD', '2017-10-26 08:04:33', '2017-10-26 08:04:33'),
(34, 'Ivan', 'Limachi Callisaya', 'M', '654/78', '1', 0, 16, 12, 'userivan@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-26 08:09:52', '2017-10-26 08:09:52'),
(35, 'Leonardo', 'Ayala', 'M', '6579', '1', 0, 15, 3, 'userleo@gmail.com', '$2y$10$1cgVAb0RiWUg.Sptj8PgfulIb1jBSXc5FqlYi9fwy8Ijp/SFV6nSS', 'pinche token', 'light_theme', 'yellow_thm', 'arial_f', 'liDHS6SO4NhcsG5wCFXzOPP8hp3e6DEmX6sQvHXn8m4xunWZHYam19j1D1bE', '2017-10-26 08:29:31', '2017-10-26 08:29:31'),
(36, 'Fernando', 'Montero', 'M', '5765', '1', 0, 16, 12, 'userfernando@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-26 08:30:29', '2017-10-26 08:30:29'),
(37, 'Eduardo', 'Montaño', 'M', '354874', '1', 0, 16, 12, 'usereduardo@gmail.com', '', NULL, 'light_theme', 'red_thm', 'courier_f', NULL, '2017-10-26 08:31:08', '2017-10-26 11:44:10'),
(38, 'Gonzalo', 'Aguilar', 'M', '354985', '1', 0, 16, 12, 'usergonzalo@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-10-26 08:31:59', '2017-10-26 08:31:59'),
(39, 'Francisco', 'Moscoso', 'M', '654587', '1', 0, 17, 2, 'frans@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-11-23 19:09:48', '2017-11-23 19:09:48'),
(40, 'Roxana', 'Pardo Mamani', 'F', '457815', '1', 0, 18, 13, 'Roxa@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-11-23 19:12:56', '2017-11-23 19:12:56'),
(41, 'Jose Eduardo', 'Montaño Banegas', 'M', '9827218', '1', 0, 19, 2, 'adminEdu@gmail.com', '', NULL, 'dark_theme', 'red_thm', 'courier_f', NULL, '2017-11-25 20:02:36', '2017-11-25 20:03:37'),
(42, 'Manuel', 'Vargas', 'M', '548721', '1', 0, 20, 14, 'manu@gmail.com', '', NULL, 'light_theme', 'yellow_thm', 'arial_f', NULL, '2017-11-25 20:07:11', '2017-11-25 20:07:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workflows`
--

CREATE TABLE `workflows` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porcentaje` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fechaI` date NOT NULL,
  `fechaF` date NOT NULL,
  `prioridad` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_documento` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `workflows`
--

INSERT INTO `workflows` (`id`, `descripcion`, `porcentaje`, `fechaI`, `fechaF`, `prioridad`, `id_institucion`, `id_documento`, `id_users`, `created_at`, `updated_at`) VALUES
(3, 'Workflow Semanal', '10', '2017-10-28', '2017-12-29', 'alta', 13, 1, 33, '2017-11-29 21:29:53', '2017-11-29 21:29:53'),
(4, 'Workflow de Contaduria', '10', '2017-12-29', '2018-01-28', 'alta', 13, 1, 33, '2017-11-30 00:01:31', '2017-11-30 00:01:31');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `workflow_usuarios`
--

CREATE TABLE `workflow_usuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fecha` date NOT NULL,
  `id_institucion` int(10) UNSIGNED NOT NULL,
  `id_workflow` int(10) UNSIGNED NOT NULL,
  `id_users` int(10) UNSIGNED NOT NULL,
  `path` varchar(1024) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `workflow_usuarios`
--

INSERT INTO `workflow_usuarios` (`id`, `descripcion`, `fecha`, `id_institucion`, `id_workflow`, `id_users`, `path`, `created_at`, `updated_at`) VALUES
(6, 'inicio', '2017-11-29', 13, 3, 35, 'Workflow Semanal', '2017-11-29 21:46:17', '2017-11-29 21:46:17'),
(7, 'inicializacion', '2017-11-29', 13, 4, 35, 'Workflow de Contaduria', '2017-11-30 00:06:36', '2017-11-30 00:06:36'),
(8, 'finalizacion', '2017-11-29', 13, 4, 34, 'Workflow de Contaduria', '2017-11-30 00:06:37', '2017-11-30 00:06:37'),
(9, 'asdas', '2017-11-29', 13, 3, 34, 'Workflow Semanal', '2017-11-30 05:11:31', '2017-11-30 05:11:31');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categorias_id_institucion_foreign` (`id_institucion`);

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `comentarios_id_institucion_foreign` (`id_institucion`),
  ADD KEY `comentarios_id_users_foreign` (`id_users`);

--
-- Indices de la tabla `cu`
--
ALTER TABLE `cu`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_modulo` (`id_modulo`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indices de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departamentos_id_institucion_foreign` (`id_institucion`);

--
-- Indices de la tabla `detalle_contenidos`
--
ALTER TABLE `detalle_contenidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_contenidos_id_institucion_foreign` (`id_institucion`),
  ADD KEY `detalle_contenidos_id_documento_foreign` (`id_documento`),
  ADD KEY `detalle_contenidos_id_directorio_foreign` (`id_directorio`),
  ADD KEY `detalle_contenidos_id_sitio_foreign` (`id_sitio`);

--
-- Indices de la tabla `detalle_sitios`
--
ALTER TABLE `detalle_sitios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_sitios_id_institucion_foreign` (`id_institucion`),
  ADD KEY `detalle_sitios_id_comentario_foreign` (`id_comentario`),
  ADD KEY `detalle_sitios_id_users_foreign` (`id_users`),
  ADD KEY `detalle_sitios_id_sitio_foreign` (`id_sitio`);

--
-- Indices de la tabla `detalle_suscripcions`
--
ALTER TABLE `detalle_suscripcions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `detalle_suscripcions_id_institucion_foreign` (`id_institucion`),
  ADD KEY `detalle_suscripcions_id_suscripcion_foreign` (`id_suscripcion`),
  ADD KEY `detalle_suscripcions_id_documento_foreign` (`id_documento`);

--
-- Indices de la tabla `directorios`
--
ALTER TABLE `directorios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `directorios_id_institucion_foreign` (`id_institucion`),
  ADD KEY `directorios_id_directorio_foreign` (`id_directorio`);

--
-- Indices de la tabla `directorio_documentos`
--
ALTER TABLE `directorio_documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `directorio_documentos_id_institucion_foreign` (`id_institucion`),
  ADD KEY `directorio_documentos_id_directorio_foreign` (`id_directorio`),
  ADD KEY `directorio_documentos_id_documento_foreign` (`id_documento`);

--
-- Indices de la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `documentos_id_institucion_foreign` (`id_institucion`),
  ADD KEY `documentos_id_documento_foreign` (`id_documento`),
  ADD KEY `documentos_id_categoria_foreign` (`id_categoria`),
  ADD KEY `documentos_id_estado_foreign` (`id_estado`),
  ADD KEY `documentos_id_users_foreign` (`id_users`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estados_id_institucion_foreign` (`id_institucion`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupos_id_institucion_foreign` (`id_institucion`);

--
-- Indices de la tabla `grupo_privilegios`
--
ALTER TABLE `grupo_privilegios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `grupo_privilegios_id_institucion_foreign` (`id_institucion`),
  ADD KEY `grupo_privilegios_id_grupo_foreign` (`id_grupo`),
  ADD KEY `grupo_privilegios_id_privilegio_foreign` (`id_cu`);

--
-- Indices de la tabla `historials`
--
ALTER TABLE `historials`
  ADD PRIMARY KEY (`id`),
  ADD KEY `historials_id_institucion_foreign` (`id_institucion`),
  ADD KEY `historials_id_documento_foreign` (`id_documento`);

--
-- Indices de la tabla `institucions`
--
ALTER TABLE `institucions`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modulo`
--
ALTER TABLE `modulo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permisos`
--
ALTER TABLE `permisos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permisos_id_institucion_foreign` (`id_institucion`),
  ADD KEY `permisos_id_documento_foreign` (`id_documento`);

--
-- Indices de la tabla `permiso_departamentos`
--
ALTER TABLE `permiso_departamentos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permiso_departamentos_id_institucion_foreign` (`id_institucion`),
  ADD KEY `permiso_departamentos_id_departamento_foreign` (`id_departamento`),
  ADD KEY `permiso_departamentos_id_permiso_foreign` (`id_permiso`);

--
-- Indices de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  ADD PRIMARY KEY (`id`,`id_cu`),
  ADD KEY `id_cu` (`id_cu`),
  ADD KEY `id_cargo` (`id_cargo`),
  ADD KEY `id_institucion` (`id_institucion`);

--
-- Indices de la tabla `sitios`
--
ALTER TABLE `sitios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sitios_id_institucion_foreign` (`id_institucion`),
  ADD KEY `sitios_id_users_foreign` (`id_users`);

--
-- Indices de la tabla `suscripcions`
--
ALTER TABLE `suscripcions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `suscripcions_id_institucion_foreign` (`id_institucion`),
  ADD KEY `suscripcions_id_users_foreign` (`id_users`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `userss_id_dpto_foreign` (`id_dpto`),
  ADD KEY `userss_id_grupo_foreign` (`id_grupo`);

--
-- Indices de la tabla `workflows`
--
ALTER TABLE `workflows`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workflows_id_institucion_foreign` (`id_institucion`),
  ADD KEY `workflows_id_documento_foreign` (`id_documento`),
  ADD KEY `workflows_id_users_foreign` (`id_users`);

--
-- Indices de la tabla `workflow_usuarios`
--
ALTER TABLE `workflow_usuarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `workflow_usuarios_id_institucion_foreign` (`id_institucion`),
  ADD KEY `workflow_usuarios_id_workflow_foreign` (`id_workflow`),
  ADD KEY `workflow_usuarios_id_users_foreign` (`id_users`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cargo`
--
ALTER TABLE `cargo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `cu`
--
ALTER TABLE `cu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `departamentos`
--
ALTER TABLE `departamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT de la tabla `detalle_contenidos`
--
ALTER TABLE `detalle_contenidos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_sitios`
--
ALTER TABLE `detalle_sitios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `detalle_suscripcions`
--
ALTER TABLE `detalle_suscripcions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `directorios`
--
ALTER TABLE `directorios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `directorio_documentos`
--
ALTER TABLE `directorio_documentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `documentos`
--
ALTER TABLE `documentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT de la tabla `grupo_privilegios`
--
ALTER TABLE `grupo_privilegios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT de la tabla `historials`
--
ALTER TABLE `historials`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `institucions`
--
ALTER TABLE `institucions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT de la tabla `modulo`
--
ALTER TABLE `modulo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT de la tabla `permisos`
--
ALTER TABLE `permisos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `permiso_departamentos`
--
ALTER TABLE `permiso_departamentos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `privilegio`
--
ALTER TABLE `privilegio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `sitios`
--
ALTER TABLE `sitios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `suscripcions`
--
ALTER TABLE `suscripcions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT de la tabla `workflows`
--
ALTER TABLE `workflows`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `workflow_usuarios`
--
ALTER TABLE `workflow_usuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cargo`
--
ALTER TABLE `cargo`
  ADD CONSTRAINT `cargo_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `categorias_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comentarios_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `cu`
--
ALTER TABLE `cu`
  ADD CONSTRAINT `cu_ibfk_1` FOREIGN KEY (`id_modulo`) REFERENCES `modulo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `cu_ibfk_2` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `departamentos`
--
ALTER TABLE `departamentos`
  ADD CONSTRAINT `departamentos_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_contenidos`
--
ALTER TABLE `detalle_contenidos`
  ADD CONSTRAINT `detalle_contenidos_id_directorio_foreign` FOREIGN KEY (`id_directorio`) REFERENCES `directorios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_contenidos_id_documento_foreign` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_contenidos_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_contenidos_id_sitio_foreign` FOREIGN KEY (`id_sitio`) REFERENCES `sitios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_sitios`
--
ALTER TABLE `detalle_sitios`
  ADD CONSTRAINT `detalle_sitios_id_comentario_foreign` FOREIGN KEY (`id_comentario`) REFERENCES `comentarios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_sitios_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_sitios_id_sitio_foreign` FOREIGN KEY (`id_sitio`) REFERENCES `sitios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_sitios_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `detalle_suscripcions`
--
ALTER TABLE `detalle_suscripcions`
  ADD CONSTRAINT `detalle_suscripcions_id_documento_foreign` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_suscripcions_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `detalle_suscripcions_id_suscripcion_foreign` FOREIGN KEY (`id_suscripcion`) REFERENCES `suscripcions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `directorios`
--
ALTER TABLE `directorios`
  ADD CONSTRAINT `directorios_id_directorio_foreign` FOREIGN KEY (`id_directorio`) REFERENCES `directorios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `directorios_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `directorio_documentos`
--
ALTER TABLE `directorio_documentos`
  ADD CONSTRAINT `directorio_documentos_id_directorio_foreign` FOREIGN KEY (`id_directorio`) REFERENCES `directorios` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `directorio_documentos_id_documento_foreign` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `directorio_documentos_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `documentos`
--
ALTER TABLE `documentos`
  ADD CONSTRAINT `documentos_id_categoria_foreign` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_id_documento_foreign` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_id_estado_foreign` FOREIGN KEY (`id_estado`) REFERENCES `estados` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `documentos_id_users_foreign` FOREIGN KEY (`id_users`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `estados`
--
ALTER TABLE `estados`
  ADD CONSTRAINT `estados_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD CONSTRAINT `grupos_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `grupo_privilegios`
--
ALTER TABLE `grupo_privilegios`
  ADD CONSTRAINT `grupo_privilegios_ibfk_1` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grupo_privilegios_ibfk_2` FOREIGN KEY (`id_grupo`) REFERENCES `grupos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `grupo_privilegios_ibfk_3` FOREIGN KEY (`id_cu`) REFERENCES `cu` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `historials`
--
ALTER TABLE `historials`
  ADD CONSTRAINT `historials_id_documento_foreign` FOREIGN KEY (`id_documento`) REFERENCES `documentos` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `historials_id_institucion_foreign` FOREIGN KEY (`id_institucion`) REFERENCES `institucions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
