-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3307
-- Tiempo de generación: 28-04-2025 a las 22:28:26
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
-- Base de datos: `subjectorganizer`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `careers`
--
-- Creación: 22-11-2024 a las 03:23:14
--

CREATE TABLE `careers` (
  `id` int(11) NOT NULL,
  `career_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `careers`
--

INSERT INTO `careers` (`id`, `career_name`, `created_at`, `updated_at`) VALUES
(1, 'Computer Science', NULL, NULL),
(753, 'INGENIERIA MULTIMEDIA', '2024-09-29 11:52:19', '2024-09-29 11:52:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `messenger_messages`
--
-- Creación: 22-11-2024 a las 03:23:14
--

CREATE TABLE `messenger_messages` (
  `id` bigint(20) NOT NULL,
  `body` longtext NOT NULL,
  `headers` longtext NOT NULL,
  `queue_name` varchar(190) NOT NULL,
  `created_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `available_at` datetime NOT NULL COMMENT '(DC2Type:datetime_immutable)',
  `delivered_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--
-- Creación: 22-11-2024 a las 03:23:14
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `schedules`
--
-- Creación: 22-11-2024 a las 03:23:14
--

CREATE TABLE `schedules` (
  `id` int(11) NOT NULL,
  `subject_id_id` int(11) DEFAULT NULL,
  `group_number` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `day` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `schedules`
--

INSERT INTO `schedules` (`id`, `subject_id_id`, `group_number`, `start_time`, `end_time`, `created_at`, `updated_at`, `day`) VALUES
(1, 1, 1, '07:30:00', '09:00:00', NULL, NULL, 'Miércoles'),
(2, 1, 2, '07:00:00', '09:00:00', NULL, NULL, 'Martes'),
(3, 1, 3, '07:00:00', '09:00:00', NULL, NULL, 'Lunes'),
(4, 2, 1, '07:30:00', '09:00:00', NULL, NULL, 'Viernes'),
(5, 2, 2, '08:00:00', '09:30:00', NULL, NULL, 'Jueves'),
(6, 2, 3, '07:00:00', '09:00:00', NULL, NULL, 'Jueves'),
(7, 3, 1, '09:00:00', '11:00:00', NULL, NULL, 'Sábado'),
(8, 3, 2, '08:00:00', '09:30:00', NULL, NULL, 'Viernes'),
(9, 3, 3, '08:30:00', '10:00:00', NULL, NULL, 'Viernes'),
(10, 4, 1, '09:00:00', '10:30:00', NULL, NULL, 'Martes'),
(11, 4, 2, '08:00:00', '10:00:00', NULL, NULL, 'Martes'),
(12, 4, 3, '07:00:00', '09:00:00', NULL, NULL, 'Lunes'),
(13, 5, 1, '07:30:00', '09:30:00', NULL, NULL, 'Sábado'),
(14, 5, 2, '08:00:00', '09:30:00', NULL, NULL, 'Lunes'),
(15, 5, 3, '07:00:00', '08:30:00', NULL, NULL, 'Miércoles'),
(16, 6, 1, '07:00:00', '08:30:00', NULL, NULL, 'Lunes'),
(17, 6, 2, '07:00:00', '08:30:00', NULL, NULL, 'Jueves'),
(18, 6, 3, '09:00:00', '11:00:00', NULL, NULL, 'Viernes'),
(19, 7, 1, '09:00:00', '10:30:00', NULL, NULL, 'Miércoles'),
(20, 7, 2, '07:30:00', '09:30:00', NULL, NULL, 'Lunes'),
(21, 7, 3, '09:00:00', '11:00:00', NULL, NULL, 'Martes'),
(22, 8, 1, '09:00:00', '11:00:00', NULL, NULL, 'Sábado'),
(23, 8, 2, '09:00:00', '10:30:00', NULL, NULL, 'Martes'),
(24, 8, 3, '09:00:00', '10:30:00', NULL, NULL, 'Lunes'),
(25, 9, 1, '09:00:00', '10:30:00', NULL, NULL, 'Martes'),
(26, 9, 2, '09:00:00', '10:30:00', NULL, NULL, 'Sábado'),
(27, 9, 3, '07:00:00', '09:00:00', NULL, NULL, 'Jueves'),
(28, 10, 1, '08:30:00', '10:00:00', NULL, NULL, 'Miércoles'),
(29, 10, 2, '08:30:00', '10:00:00', NULL, NULL, 'Miércoles'),
(30, 10, 3, '07:30:00', '09:30:00', NULL, NULL, 'Jueves'),
(31, 11, 1, '07:30:00', '09:30:00', NULL, NULL, 'Viernes'),
(32, 11, 2, '09:00:00', '11:00:00', NULL, NULL, 'Miércoles'),
(33, 11, 3, '09:00:00', '11:00:00', NULL, NULL, 'Sábado'),
(34, 12, 1, '07:30:00', '09:30:00', NULL, NULL, 'Jueves'),
(35, 12, 2, '08:00:00', '10:00:00', NULL, NULL, 'Jueves'),
(36, 12, 3, '07:00:00', '09:00:00', NULL, NULL, 'Lunes'),
(37, 13, 1, '09:00:00', '11:00:00', NULL, NULL, 'Sábado'),
(38, 13, 2, '07:30:00', '09:30:00', NULL, NULL, 'Viernes'),
(39, 13, 3, '07:30:00', '09:30:00', NULL, NULL, 'Sábado'),
(40, 14, 1, '08:00:00', '09:30:00', NULL, NULL, 'Miércoles'),
(41, 14, 2, '07:00:00', '09:00:00', NULL, NULL, 'Jueves'),
(42, 14, 3, '07:00:00', '08:30:00', NULL, NULL, 'Jueves'),
(43, 15, 1, '08:30:00', '10:30:00', NULL, NULL, 'Martes'),
(44, 15, 2, '07:00:00', '09:00:00', NULL, NULL, 'Viernes'),
(45, 15, 3, '08:30:00', '10:00:00', NULL, NULL, 'Miércoles'),
(46, 16, 1, '08:00:00', '09:30:00', NULL, NULL, 'Lunes'),
(47, 16, 2, '08:00:00', '09:30:00', NULL, NULL, 'Viernes'),
(48, 16, 3, '07:30:00', '09:30:00', NULL, NULL, 'Jueves'),
(49, 17, 1, '08:00:00', '10:00:00', NULL, NULL, 'Viernes'),
(50, 17, 2, '07:30:00', '09:30:00', NULL, NULL, 'Jueves'),
(51, 17, 3, '07:30:00', '09:00:00', NULL, NULL, 'Viernes'),
(52, 18, 1, '07:30:00', '09:00:00', NULL, NULL, 'Miércoles'),
(53, 18, 2, '07:00:00', '08:30:00', NULL, NULL, 'Jueves'),
(54, 18, 3, '07:30:00', '09:30:00', NULL, NULL, 'Viernes'),
(55, 19, 1, '08:30:00', '10:30:00', NULL, NULL, 'Miércoles'),
(56, 19, 2, '09:00:00', '11:00:00', NULL, NULL, 'Viernes'),
(57, 19, 3, '08:00:00', '09:30:00', NULL, NULL, 'Sábado'),
(58, 20, 1, '08:00:00', '09:30:00', NULL, NULL, 'Martes'),
(59, 20, 2, '07:30:00', '09:00:00', NULL, NULL, 'Miércoles'),
(60, 20, 3, '07:00:00', '09:00:00', NULL, NULL, 'Viernes'),
(61, 21, 1, '07:30:00', '09:30:00', NULL, NULL, 'Jueves'),
(62, 21, 2, '07:30:00', '09:30:00', NULL, NULL, 'Miércoles'),
(63, 21, 3, '08:00:00', '09:30:00', NULL, NULL, 'Jueves'),
(64, 22, 1, '07:00:00', '09:00:00', NULL, NULL, 'Sábado'),
(65, 22, 2, '09:00:00', '10:30:00', NULL, NULL, 'Miércoles'),
(66, 22, 3, '09:00:00', '10:30:00', NULL, NULL, 'Lunes'),
(67, 23, 1, '08:00:00', '10:00:00', NULL, NULL, 'Viernes'),
(68, 23, 2, '07:30:00', '09:00:00', NULL, NULL, 'Sábado'),
(69, 23, 3, '07:30:00', '09:30:00', NULL, NULL, 'Miércoles'),
(70, 24, 1, '07:30:00', '09:30:00', NULL, NULL, 'Martes'),
(71, 24, 2, '08:30:00', '10:00:00', NULL, NULL, 'Miércoles'),
(72, 24, 3, '07:00:00', '08:30:00', NULL, NULL, 'Viernes'),
(73, 25, 1, '09:00:00', '10:30:00', NULL, NULL, 'Martes'),
(74, 25, 2, '07:30:00', '09:30:00', NULL, NULL, 'Sábado'),
(75, 25, 3, '08:30:00', '10:00:00', NULL, NULL, 'Viernes'),
(76, 26, 1, '08:00:00', '10:00:00', NULL, NULL, 'Miércoles'),
(77, 26, 2, '07:30:00', '09:00:00', NULL, NULL, 'Viernes'),
(78, 26, 3, '07:00:00', '09:00:00', NULL, NULL, 'Viernes'),
(79, 27, 1, '09:00:00', '10:30:00', NULL, NULL, 'Lunes'),
(80, 27, 2, '07:00:00', '08:30:00', NULL, NULL, 'Jueves'),
(81, 27, 3, '07:30:00', '09:30:00', NULL, NULL, 'Martes'),
(82, 28, 1, '08:30:00', '10:00:00', NULL, NULL, 'Martes'),
(83, 28, 2, '07:30:00', '09:30:00', NULL, NULL, 'Miércoles'),
(84, 28, 3, '07:00:00', '08:30:00', NULL, NULL, 'Viernes'),
(85, 29, 1, '09:00:00', '10:30:00', NULL, NULL, 'Sábado'),
(86, 29, 2, '07:00:00', '09:00:00', NULL, NULL, 'Viernes'),
(87, 29, 3, '07:00:00', '09:00:00', NULL, NULL, 'Jueves'),
(88, 30, 1, '09:00:00', '10:30:00', NULL, NULL, 'Viernes'),
(89, 30, 2, '07:00:00', '09:00:00', NULL, NULL, 'Sábado'),
(90, 30, 3, '07:30:00', '09:00:00', NULL, NULL, 'Martes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subjects`
--
-- Creación: 22-11-2024 a las 03:23:14
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `career_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `credits` int(11) NOT NULL,
  `semester` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `prerequisites_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `subjects`
--

INSERT INTO `subjects` (`id`, `career_id`, `name`, `credits`, `semester`, `created_at`, `updated_at`, `prerequisites_id`) VALUES
(1, 753, 'LOGICA', 3, 1, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(2, 753, 'PRECALCULO', 3, 1, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(3, 753, 'INTRODUCCION A LA INGENIERIA', 3, 1, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(4, 753, 'EXPRESION ORAL Y ESCRITA', 2, 1, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(5, 753, 'IDENTIDAD INSTIT. Y FRANCISCANISMO', 1, 1, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(6, 753, 'PROYECTO DE VIDA', 2, 1, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(7, 753, 'TALLER DE MULTIMEDIA', 2, 1, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(8, 753, 'DISENO PARA MEDIOS DIGITALES', 2, 1, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(9, 753, 'ALGEBRA LINEAL', 3, 2, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(10, 753, 'CALCULO DIFERENCIAL', 3, 2, '2024-09-29 11:53:55', '2024-09-29 11:53:55', 2),
(11, 753, 'CONSTITUCION Y DEMOCRACIA', 2, 2, '2024-09-29 11:53:55', '2024-09-29 11:53:55', 6),
(12, 753, 'INGLES BASICO', 2, 2, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(13, 753, 'TALLER EN ANIMACION 2D', 2, 2, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(14, 753, 'GUION Y REDACCION MEDIOS DIGITALES', 2, 2, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(15, 753, 'INTRODUCCION A LA PROGRAMACION', 3, 2, '2024-09-29 11:53:55', '2024-09-29 11:53:55', 1),
(16, 753, 'FISICA MECANICA', 4, 3, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(17, 753, 'CALCULO INTEGRAL', 3, 3, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(18, 753, 'FRANCISCANISMO Y ECOLOGIA', 2, 3, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(19, 753, 'INGLES DE ACCESO', 2, 3, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(20, 753, 'DISEÑO DE SISTEMAS MULTIMEDIA', 3, 3, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(21, 753, 'PROGRAMACION AVANZADA', 4, 3, '2024-09-29 11:53:55', '2024-09-29 11:53:55', 15),
(22, 753, 'FISICA DE ELECTROMAGNETISMO', 4, 4, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(23, 753, 'CALCULO MULTIVARIADO', 3, 4, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(24, 753, 'ETICA', 2, 4, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(25, 753, 'DIBUJO PARA INGENIERIA', 2, 4, '2024-09-29 11:53:55', '2024-09-29 11:53:55', 8),
(26, 753, 'MODELADO Y ANIMACION 3D', 2, 4, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(27, 753, 'TALLER DE VIDEO Y FOTOGRAFIA', 2, 4, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(28, 753, 'ORGANIZACIONES', 3, 4, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(29, 753, 'ECUACIONES DIFERENCIALES', 3, 5, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(30, 753, 'PROBABILIDAD Y ESTADISTICA', 3, 5, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(31, 753, 'INGLES DE PLATAFORMA', 3, 5, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(32, 753, 'INTEGRA.Y COMPOS.MULTI.DESAR.VIDEOJUE 3D', 2, 5, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(33, 753, 'FUNDAMETOS DE BASES DE DATOS', 4, 5, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(34, 753, 'PROYECTO INTEGRADOR', 3, 5, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(35, 753, 'ELECT.COMPLEMENTARIA I', 3, 6, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(36, 753, 'ELECT. LIBRE HUMANISTICA I', 2, 6, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(37, 753, 'BASES DE DATOS MULTIMEDIA', 3, 6, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(38, 753, 'COMPUTACION GRAFICA Y R.VIRTUAL', 3, 6, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(39, 753, 'CIRCUITOS DIGITALES', 3, 6, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(40, 753, 'METODOS NUMERICOS', 3, 6, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(41, 753, 'ELECT.COMPLEMENTARIA II', 3, 7, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(42, 753, 'ELECT.PROFUNDIZACION I', 3, 7, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(43, 753, 'ELECT. LIBRE HUMANISTICA II', 2, 7, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(44, 753, 'REDES DE COMPUTADORES', 3, 7, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(45, 753, 'AUDIO DIGITAL', 3, 7, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(46, 753, 'PROCES DE SEÑALES DIGITALES', 3, 7, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(47, 753, 'ELECT. LIBRE I', 2, 8, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(48, 753, 'ELECT.PROFUNDIZACION II', 3, 8, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(49, 753, 'ELECT. LIBRE HUMANISTICA III', 2, 8, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(50, 753, 'TALLER DE EDICION VIDEO Y AUDIO', 2, 8, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(51, 753, 'REDES MULTIMEDIA', 3, 8, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(52, 753, 'VIDEO DIGITAL Y PROCES DE IMAGENES', 2, 8, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(53, 753, 'CATEDRA DE EMPRENDIMIENTO', 3, 8, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(54, 753, 'ELECT. LIBRE II', 2, 9, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(55, 753, 'ELECT.PROFUNDIZACION III', 3, 9, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(56, 753, 'LEGISLACION MULTIMEDIA', 2, 9, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(57, 753, 'PRACTICA PROFESIONAL', 4, 9, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL),
(58, 753, 'PROYECTO DE GRADO', 4, 9, '2024-09-29 11:53:55', '2024-09-29 11:53:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--
-- Creación: 22-11-2024 a las 03:23:14
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `career_id_id` int(11) NOT NULL,
  `name` varchar(180) NOT NULL,
  `roles` longtext NOT NULL COMMENT '(DC2Type:json)',
  `password` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `career_id_id`, `name`, `roles`, `password`, `last_name`, `email`, `created_at`, `updated_at`) VALUES
(1, 1, 'John', '[\"ROLE_USER\"]', '$2y$13$eVgFPxPsR59Fn7BdgVXj3eCs7kIwPFdxJNxTkJp1ff7PHhVg.ROTu', 'Doe', 'john.doe@example.com', NULL, NULL),
(2, 1, 'Jane', '[\"ROLE_ADMIN\"]', '$2y$10$lBAhNb9elK/IjIvNWn1fN.0mImQz9ZBFX8syJBPpzM.bApBbF9yC.', 'Doe', 'jane.doe@example.com', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_schedules`
--
-- Creación: 22-11-2024 a las 03:23:14
--

CREATE TABLE `users_schedules` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) NOT NULL,
  `schedule_id_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_subjects`
--
-- Creación: 22-11-2024 a las 03:23:14
--

CREATE TABLE `users_subjects` (
  `id` int(11) NOT NULL,
  `user_id_id` int(11) NOT NULL,
  `subject_id_id` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `created_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)',
  `updated_at` datetime DEFAULT NULL COMMENT '(DC2Type:datetime_immutable)'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users_subjects`
--

INSERT INTO `users_subjects` (`id`, `user_id_id`, `subject_id_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'pending', '2024-09-29 12:08:17', '2024-09-29 12:08:17'),
(2, 1, 1, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(3, 1, 2, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(4, 1, 3, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(5, 1, 4, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(6, 1, 5, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(7, 1, 6, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(8, 1, 7, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(9, 1, 8, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(10, 1, 9, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(11, 1, 10, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(12, 1, 11, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(13, 1, 12, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(14, 1, 13, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(15, 1, 14, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(16, 1, 15, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(17, 1, 16, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(18, 1, 17, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(19, 1, 18, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(20, 1, 19, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(21, 1, 20, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(22, 1, 21, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(23, 1, 22, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(24, 1, 23, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(25, 1, 24, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58'),
(26, 1, 25, '', '2024-09-29 13:27:58', '2024-09-29 13:27:58');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `careers`
--
ALTER TABLE `careers`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_75EA56E0FB7336F0` (`queue_name`),
  ADD KEY `IDX_75EA56E0E3BD61CE` (`available_at`),
  ADD KEY `IDX_75EA56E016BA31DB` (`delivered_at`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_313BDC8E6ED75F8F` (`subject_id_id`);

--
-- Indices de la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_AB2599173D366F0D` (`prerequisites_id`),
  ADD KEY `IDX_AB259917B58CDA09` (`career_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_IDENTIFIER_NAME` (`name`),
  ADD KEY `IDX_1483A5E9F6491C94` (`career_id_id`);

--
-- Indices de la tabla `users_schedules`
--
ALTER TABLE `users_schedules`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_5746A66F9D86650F` (`user_id_id`),
  ADD KEY `IDX_5746A66F831D5E0B` (`schedule_id_id`);

--
-- Indices de la tabla `users_subjects`
--
ALTER TABLE `users_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_D064B2CD9D86650F` (`user_id_id`),
  ADD KEY `IDX_D064B2CD6ED75F8F` (`subject_id_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `careers`
--
ALTER TABLE `careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=754;

--
-- AUTO_INCREMENT de la tabla `messenger_messages`
--
ALTER TABLE `messenger_messages`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `schedules`
--
ALTER TABLE `schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT de la tabla `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users_schedules`
--
ALTER TABLE `users_schedules`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users_subjects`
--
ALTER TABLE `users_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `schedules`
--
ALTER TABLE `schedules`
  ADD CONSTRAINT `FK_313BDC8E6ED75F8F` FOREIGN KEY (`subject_id_id`) REFERENCES `subjects` (`id`);

--
-- Filtros para la tabla `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `FK_AB2599173D366F0D` FOREIGN KEY (`prerequisites_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `FK_AB259917B58CDA09` FOREIGN KEY (`career_id`) REFERENCES `careers` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `FK_1483A5E9F6491C94` FOREIGN KEY (`career_id_id`) REFERENCES `careers` (`id`);

--
-- Filtros para la tabla `users_schedules`
--
ALTER TABLE `users_schedules`
  ADD CONSTRAINT `FK_5746A66F831D5E0B` FOREIGN KEY (`schedule_id_id`) REFERENCES `schedules` (`id`),
  ADD CONSTRAINT `FK_5746A66F9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `users_subjects`
--
ALTER TABLE `users_subjects`
  ADD CONSTRAINT `FK_D064B2CD6ED75F8F` FOREIGN KEY (`subject_id_id`) REFERENCES `subjects` (`id`),
  ADD CONSTRAINT `FK_D064B2CD9D86650F` FOREIGN KEY (`user_id_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
