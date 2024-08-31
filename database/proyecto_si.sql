
use db_aacb5a_propisc;
-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2023 a las 21:47:35
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `proyecto_si`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `anulaciones`
--

CREATE TABLE `anulaciones` (
  `idAnulacion` int(11) NOT NULL,
  `idMatricula` int(11) NOT NULL,
  `motivo` text NOT NULL,
  `fecha_a` date NOT NULL,
  `estado` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `anulaciones`
--

INSERT INTO `anulaciones` (`idAnulacion`, `idMatricula`, `motivo`, `fecha_a`, `estado`) VALUES
(2, 18, 'no envió voucher', '2022-08-28', 1),
(3, 17, 'Solicitud de retiro del cliente', '2022-08-29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `idcargo` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`idcargo`, `descripcion`, `estado`) VALUES
(1, 'DIRECTOR DE ACADEMIA', 1),
(2, 'AUXILIAR', 1),
(3, 'DOCENTE', 1),
(4, 'SECRETARIO GENERAL', 1),
(5, 'PERSONAL DE LIMPIEZA', 1),
(6, 'COORDINADOR ACADÉMICO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `direccion` varchar(120) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `nombres` varchar(60) NOT NULL,
  `sexo` varchar(9) NOT NULL,
  `documento` varchar(15) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `direccion`, `telefono`, `nombres`, `sexo`, `documento`, `tipo_documento`, `estado`) VALUES
(1, 'av 1234 calle 55 lote q', '456012456', 'Diego ManuelL', 'Masculino', '78945612', 'DNI', 1),
(2, 'Asent. humano la molina MZ4 Lt 10 #77', '953987654', 'Xiomara Dominguez Medina', 'Femenino', '85459655', 'DNI', 1),
(3, 'Calle Arevalo Av Sin 66 mz 4', '254556', 'Leopoldo Santander Emiliano Vargas', 'Masculino', '10164090588', 'RUC', 1),
(4, 'Av sIuT Calle La molina 456', '254565', 'Bernardo Casagrande de la Cruz', 'Masculino', '75758969', 'DNI', 1),
(5, 'Calle Arevalo Av Sin 66 mz 4', '254578', 'Marreros Julio', 'Masculino', '89589658', 'DNI', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_matriculas`
--

CREATE TABLE `detalle_matriculas` (
  `iddm` int(11) NOT NULL,
  `iddv` int(11) NOT NULL,
  `idMatricula` int(11) NOT NULL,
  `idMonto` int(11) NOT NULL,
  `idMontoD` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_matriculas`
--

INSERT INTO `detalle_matriculas` (`iddm`, `iddv`, `idMatricula`, `idMonto`, `idMontoD`, `estado`) VALUES
(13, 16, 17, 1, 2, 1),
(14, 17, 18, 2, 8, 1),
(15, 18, 18, 2, 8, 1),
(16, 19, 18, 3, 7, 1),
(17, 20, 20, 4, 7, 1),
(18, 19, 20, 4, 7, 1),
(19, 18, 21, 2, 2, 1),
(20, 19, 21, 3, 2, 1),
(21, 18, 22, 3, 2, 1),
(22, 19, 22, 3, 2, 1),
(23, 17, 23, 2, 2, 1),
(24, 23, 23, 3, 2, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_vacantes`
--

CREATE TABLE `detalle_vacantes` (
  `iddv` int(11) NOT NULL,
  `idVacante` int(11) NOT NULL,
  `idProgramacion` int(11) NOT NULL,
  `cupos_d` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `detalle_vacantes`
--

INSERT INTO `detalle_vacantes` (`iddv`, `idVacante`, `idProgramacion`, `cupos_d`, `estado`) VALUES
(16, 1, 9, 2, 1),
(17, 2, 9, 8, 1),
(18, 2, 10, 6, 1),
(19, 3, 10, 1, 1),
(20, 2, 11, 0, 1),
(21, 6, 11, 18, 1),
(22, 2, 12, 10, 1),
(23, 5, 12, 10, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dias`
--

CREATE TABLE `dias` (
  `iddia` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `dias`
--

INSERT INTO `dias` (`iddia`, `descripcion`, `estado`) VALUES
(1, 'LUN-MIE-VIE', 1),
(2, 'MAR-JUE', 1),
(3, 'SAB-DOM', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matriculas`
--

CREATE TABLE `matriculas` (
  `idMatricula` int(11) NOT NULL,
  `idCliente` int(11) NOT NULL,
  `idVoucher` int(11) NOT NULL DEFAULT 0,
  `fecha_matricula` date NOT NULL,
  `cantidad_personas` int(11) NOT NULL,
  `idPeriodo` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matriculas`
--

INSERT INTO `matriculas` (`idMatricula`, `idCliente`, `idVoucher`, `fecha_matricula`, `cantidad_personas`, `idPeriodo`, `estado`) VALUES
(17, 1, 9, '2022-08-28', 2, 1, 0),
(18, 2, 0, '2022-08-28', 3, 1, 0),
(19, 3, 0, '2022-08-29', 10, 1, 1),
(20, 3, 10, '2022-08-29', 10, 1, 1),
(21, 2, 11, '2022-08-29', 2, 1, 1),
(22, 4, 0, '2022-08-29', 2, 1, 1),
(23, 1, 12, '2022-08-29', 2, 1, 1);

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
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montos`
--

CREATE TABLE `montos` (
  `idMonto` int(11) NOT NULL,
  `descripcion` varchar(20) NOT NULL,
  `montoMes` int(11) NOT NULL,
  `montoClase` int(11) NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFinal` date NOT NULL,
  `tipo` varchar(20) NOT NULL,
  `idPeriodo` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `montos`
--

INSERT INTO `montos` (`idMonto`, `descripcion`, `montoMes`, `montoClase`, `fechaInicio`, `fechaFinal`, `tipo`, `idPeriodo`, `estado`) VALUES
(1, 'ENERO', 170, 10, '2022-01-03', '2022-01-31', 'M', 1, 1),
(2, 'FEBRERO', 170, 10, '2022-02-04', '2022-02-28', 'M', 1, 1),
(3, 'MARZO', 170, 10, '2022-03-01', '2022-03-29', 'M', 1, 1),
(4, 'DELEGACION', 200, 20, '2022-04-05', '2022-04-30', 'E', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `montosdescuento`
--

CREATE TABLE `montosdescuento` (
  `idMontoD` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `montoDescuento` float NOT NULL,
  `idPeriodo` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `montosdescuento`
--

INSERT INTO `montosdescuento` (`idMontoD`, `descripcion`, `montoDescuento`, `idPeriodo`, `estado`) VALUES
(1, 'DSCTO. AMBOS CICLOS', 40, 1, 1),
(2, 'DSCTO. POR HERMANO', 20, 1, 1),
(3, 'DSCTO. POR PERSONAL 1 MES', 45, 1, 1),
(4, 'DSCTO. POR PERSONAL 2 MESES', 55, 1, 1),
(5, 'OTRO', 15, 1, 1),
(6, 'DCTO. POR PERSONAL  MES DE MARZO', 70, 1, 1),
(7, 'DCTO. OFERTA MES', 30, 1, 1),
(8, 'DSCTO. OFERTA MES HERMANO', 50, 1, 1),
(9, 'DSCTO. OFERTA MES HIJOS PERSONAL', 100, 1, 1),
(11, 'DSCTO. POR HERMANOs', 30, 2, 1),
(12, 'DCTO. OFERTA MESs', 12, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `niveles`
--

CREATE TABLE `niveles` (
  `idNivel` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `abreviatura` char(5) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `niveles`
--

INSERT INTO `niveles` (`idNivel`, `descripcion`, `abreviatura`, `estado`) VALUES
(1, 'PATERA 1', 'PA-1', 1),
(2, 'PATERA 2', 'PA-2', 1),
(3, 'PRINCIPIANTES 1', 'PI-1', 1),
(4, 'PRINCIPIANTES 2', 'PI-2', 1),
(5, 'BASICO 1', 'BA-1', 1),
(6, 'BASICO 2', 'BA-2', 1),
(7, 'INTERMEDIO 1', 'IN-1', 1),
(8, 'INTERMEDIO 2', 'IN-2', 1),
(9, 'AVANZADO', 'AV-Z', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `periodos`
--

CREATE TABLE `periodos` (
  `idPeriodo` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `actividad` varchar(20) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `periodos`
--

INSERT INTO `periodos` (`idPeriodo`, `descripcion`, `actividad`, `estado`) VALUES
(1, '2022', 'ACTIVO', 1),
(2, '2023', 'INACTIVO', 1),
(3, '2024', 'INACTIVO', 1),
(4, '2025', 'INACTIVO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `idPersonal` int(11) NOT NULL,
  `dni` varchar(8) NOT NULL,
  `apellidos` varchar(40) NOT NULL,
  `nombres` varchar(40) NOT NULL,
  `direccion` varchar(40) NOT NULL,
  `telefono` varchar(9) NOT NULL,
  `sexo` char(1) NOT NULL,
  `idCargo` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`idPersonal`, `dni`, `apellidos`, `nombres`, `direccion`, `telefono`, `sexo`, `idCargo`, `estado`) VALUES
(1, '12345678', 'Mantilla Huingo', 'Marcelo Alejandro', 'Av. Capullos Nº 220', '999916888', 'M', 3, 1),
(2, '73440956', 'Samame Rodriguez', 'Carla Maria', 'Av. Flores Nº 128', '952975222', 'F', 2, 1),
(4, '74521136', 'Gonzales Castañeda', 'Luis Fernando', 'Av.  San Ignacio Nº 645', '956621330', 'M', 3, 1),
(5, '56565656', 'Sanchez Peres', 'Felipe Juan', 'Av Tupac Amaru Nicolas de pierola 444', '963639564', 'M', 1, 1),
(6, '78895689', 'Carrasco Lubina', 'Felimena Casandra', 'AV tupac amaru Cale valcarcel 567', '963965896', 'F', 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `piscinas`
--

CREATE TABLE `piscinas` (
  `idPiscina` int(11) NOT NULL,
  `descripcion` varchar(40) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `piscinas`
--

INSERT INTO `piscinas` (`idPiscina`, `descripcion`, `estado`) VALUES
(1, 'OLIMPICA', 1),
(2, 'SEMIOLIMPICA', 1),
(3, 'PATERAS', 1),
(4, 'RUSTICA', 1),
(5, 'MEDITERRANEA', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `programaciones`
--

CREATE TABLE `programaciones` (
  `idProgramacion` int(11) NOT NULL,
  `idPiscina` int(11) NOT NULL,
  `idTurno` int(11) NOT NULL,
  `idPersonal` int(11) NOT NULL,
  `idNivel` int(11) NOT NULL,
  `idPeriodo` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `programaciones`
--

INSERT INTO `programaciones` (`idProgramacion`, `idPiscina`, `idTurno`, `idPersonal`, `idNivel`, `idPeriodo`, `estado`) VALUES
(9, 1, 1, 6, 9, 1, 1),
(10, 5, 10, 4, 4, 1, 1),
(11, 5, 7, 1, 3, 1, 1),
(12, 1, 10, 6, 9, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `idTurno` int(11) NOT NULL,
  `iddia` int(11) DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `idPeriodo` int(11) DEFAULT NULL,
  `estado` tinyint(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`idTurno`, `iddia`, `descripcion`, `idPeriodo`, `estado`) VALUES
(1, 1, '9:00 am - 11:00 am', 1, 1),
(2, 1, '11:00 am - 13:00 pm', 1, 1),
(3, 1, '14:00 pm - 16:00 pm', 1, 1),
(4, 1, '16:00 pm - 18:00 pm', 1, 1),
(5, 2, '8:00 am - 11:00 am', 1, 1),
(6, 2, '11:00 am - 14:00 pm', 1, 1),
(7, 2, '15:00 pm - 18:00 pm', 1, 1),
(8, 3, '8:00 am - 11:00 am', 1, 1),
(9, 3, '11:00 am - 14:00 pm', 1, 1),
(10, 3, '15:00 pm - 18:00 pm', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `foto` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `dni` char(8) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `direccion` varchar(60) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `estado` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'No Verificado',
  `idcargo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `foto`, `dni`, `direccion`, `estado`, `idcargo`) VALUES
(1, 'Diego Acosta', 'diego@hotmail.com', NULL, '$2y$10$huk2gyh9Rv.tWWn1rhewLu4CJy1qgCpPUaaaFGDlROmjEBLdE.PH.', NULL, '2023-01-16 00:25:47', '2023-01-16 01:42:47', '1.jpg', '18122605', 'av 1234 calle 55 lote q', 'Verificado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacantes`
--

CREATE TABLE `vacantes` (
  `idVacante` int(11) NOT NULL,
  `mes` varchar(20) NOT NULL,
  `cupos` int(11) NOT NULL,
  `idPeriodo` int(11) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vacantes`
--

INSERT INTO `vacantes` (`idVacante`, `mes`, `cupos`, `idPeriodo`, `estado`) VALUES
(1, 'Enero', 2, 1, 1),
(2, 'Febrero', 10, 1, 1),
(3, 'Marzo', 15, 1, 1),
(4, 'Enero', 20, 1, 1),
(5, 'Marzo', 12, 1, 1),
(6, 'Marzo', 18, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vouchers`
--

CREATE TABLE `vouchers` (
  `idVoucher` int(11) NOT NULL,
  `banco` varchar(20) NOT NULL,
  `nroOperacion` varchar(20) NOT NULL,
  `imagen` varchar(60) NOT NULL,
  `observacion` text NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vouchers`
--

INSERT INTO `vouchers` (`idVoucher`, `banco`, `nroOperacion`, `imagen`, `observacion`, `estado`) VALUES
(9, 'BCP', '001', 'gg.jpg', 'Todo conforme', 1),
(10, 'INTERBANK', '5968', 'images.jpg', 'Todo conforme', 1),
(11, 'BCP', '5656', 'pagos.jpg', 'Datos conformes', 1),
(12, 'BBVA', '87984', 'pago2.jpg', 'Datos conformes', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `anulaciones`
--
ALTER TABLE `anulaciones`
  ADD PRIMARY KEY (`idAnulacion`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`idcargo`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `detalle_matriculas`
--
ALTER TABLE `detalle_matriculas`
  ADD PRIMARY KEY (`iddm`);

--
-- Indices de la tabla `detalle_vacantes`
--
ALTER TABLE `detalle_vacantes`
  ADD PRIMARY KEY (`iddv`);

--
-- Indices de la tabla `dias`
--
ALTER TABLE `dias`
  ADD PRIMARY KEY (`iddia`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  ADD PRIMARY KEY (`idMatricula`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `montos`
--
ALTER TABLE `montos`
  ADD PRIMARY KEY (`idMonto`);

--
-- Indices de la tabla `montosdescuento`
--
ALTER TABLE `montosdescuento`
  ADD PRIMARY KEY (`idMontoD`);

--
-- Indices de la tabla `niveles`
--
ALTER TABLE `niveles`
  ADD PRIMARY KEY (`idNivel`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `periodos`
--
ALTER TABLE `periodos`
  ADD PRIMARY KEY (`idPeriodo`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`idPersonal`),
  ADD KEY `personal_ibfk_1` (`idCargo`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `piscinas`
--
ALTER TABLE `piscinas`
  ADD PRIMARY KEY (`idPiscina`);

--
-- Indices de la tabla `programaciones`
--
ALTER TABLE `programaciones`
  ADD PRIMARY KEY (`idProgramacion`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`idTurno`),
  ADD KEY `iddia` (`iddia`),
  ADD KEY `idPeriodo` (`idPeriodo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  ADD PRIMARY KEY (`idVacante`);

--
-- Indices de la tabla `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`idVoucher`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `anulaciones`
--
ALTER TABLE `anulaciones`
  MODIFY `idAnulacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `idcargo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_matriculas`
--
ALTER TABLE `detalle_matriculas`
  MODIFY `iddm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `detalle_vacantes`
--
ALTER TABLE `detalle_vacantes`
  MODIFY `iddv` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `dias`
--
ALTER TABLE `dias`
  MODIFY `iddia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `matriculas`
--
ALTER TABLE `matriculas`
  MODIFY `idMatricula` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `montos`
--
ALTER TABLE `montos`
  MODIFY `idMonto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `montosdescuento`
--
ALTER TABLE `montosdescuento`
  MODIFY `idMontoD` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `niveles`
--
ALTER TABLE `niveles`
  MODIFY `idNivel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `periodos`
--
ALTER TABLE `periodos`
  MODIFY `idPeriodo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `idPersonal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `piscinas`
--
ALTER TABLE `piscinas`
  MODIFY `idPiscina` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `programaciones`
--
ALTER TABLE `programaciones`
  MODIFY `idProgramacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `idTurno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `vacantes`
--
ALTER TABLE `vacantes`
  MODIFY `idVacante` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `idVoucher` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `personal`
--
ALTER TABLE `personal`
  ADD CONSTRAINT `personal_ibfk_1` FOREIGN KEY (`idCargo`) REFERENCES `cargos` (`idcargo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD CONSTRAINT `turnos_ibfk_1` FOREIGN KEY (`iddia`) REFERENCES `dias` (`iddia`),
  ADD CONSTRAINT `turnos_ibfk_2` FOREIGN KEY (`idPeriodo`) REFERENCES `periodos` (`idPeriodo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
