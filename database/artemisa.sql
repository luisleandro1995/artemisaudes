-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2024 a las 08:44:11
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
-- Base de datos: `artemisa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `answers`
--

CREATE TABLE `answers` (
  `id` int(10) UNSIGNED NOT NULL,
  `text` varchar(255) NOT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `answers`
--

INSERT INTO `answers` (`id`, `text`, `form_id`, `created_at`, `updated_at`) VALUES
(1, 'martes', 6, '2024-10-17 01:40:55', '2024-10-17 01:40:55'),
(2, 'Si', 6, '2024-10-17 01:40:55', '2024-10-17 01:40:55'),
(3, 'gato;pez', 6, '2024-10-17 01:40:55', '2024-10-17 01:40:55'),
(4, 'martes', 8, '2024-12-01 08:59:48', '2024-12-01 08:59:48'),
(5, 'martes', 8, '2024-12-01 08:59:48', '2024-12-01 08:59:48'),
(6, 'lunes', 8, '2024-12-01 08:59:48', '2024-12-01 08:59:48'),
(7, 'Si', 8, '2024-12-01 08:59:48', '2024-12-01 08:59:48'),
(8, 'Si', 8, '2024-12-01 08:59:48', '2024-12-01 08:59:48'),
(9, 'Superadmin;4;no;4;3', 8, '2024-12-01 08:59:48', '2024-12-01 08:59:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('josegonzalez@mail.udes.edu.co|127.0.0.1', 'i:2;', 1729024095),
('josegonzalez@mail.udes.edu.co|127.0.0.1:timer', 'i:1729024095;', 1729024095),
('luismonsavel13432@mail.udes.edu.co|127.0.0.1', 'i:2;', 1727986252),
('luismonsavel13432@mail.udes.edu.co|127.0.0.1:timer', 'i:1727986252;', 1727986252),
('mariana@mail.udes.edu.co|127.0.0.1', 'i:1;', 1727986323),
('mariana@mail.udes.edu.co|127.0.0.1:timer', 'i:1727986323;', 1727986323);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cities`
--

CREATE TABLE `cities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `cities`
--

INSERT INTO `cities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Bucaramanga', '2024-09-17 05:00:00', '2024-09-17 05:00:00'),
(2, 'Cúcuta', '2024-09-17 20:16:53', '2024-09-17 20:16:57'),
(3, 'Valledupar', '2024-09-17 20:17:02', '2024-09-17 20:17:05'),
(4, 'Bogotá', '2024-09-17 20:17:08', '2024-09-17 20:17:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `dependencies`
--

CREATE TABLE `dependencies` (
  `id` int(10) UNSIGNED NOT NULL,
  `city_id` int(10) UNSIGNED NOT NULL,
  `faculty_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `dependencies`
--

INSERT INTO `dependencies` (`id`, `city_id`, `faculty_id`, `created_at`, `updated_at`) VALUES
(5, 1, 1, '2024-09-17 05:00:00', '2024-09-17 05:00:00'),
(9, 1, 2, '2024-09-17 05:00:00', '2024-09-17 05:00:00'),
(10, 2, 1, NULL, NULL),
(11, 2, 2, NULL, NULL),
(12, 3, 1, NULL, NULL),
(13, 3, 2, NULL, NULL),
(14, 4, 1, NULL, NULL),
(15, 4, 2, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `faculties`
--

CREATE TABLE `faculties` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `faculties`
--

INSERT INTO `faculties` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Ingenieria de software ', '2024-09-17 05:00:00', '2024-09-17 05:00:00'),
(2, 'Medicina', '2024-09-17 05:00:00', '2024-09-17 05:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `forms`
--

CREATE TABLE `forms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `publication_date` varchar(255) NOT NULL,
  `end_date` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `habeas_data` int(11) DEFAULT 0,
  `user_id` int(10) UNSIGNED NOT NULL,
  `dependency_id` int(10) UNSIGNED NOT NULL,
  `work_space_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `forms`
--

INSERT INTO `forms` (`id`, `name`, `publication_date`, `end_date`, `state`, `habeas_data`, `user_id`, `dependency_id`, `work_space_id`, `created_at`, `updated_at`) VALUES
(2, 'Estudio social bogota', '2024-09-19', '2024-09-19', 'inactivo', 1, 1, 5, 1, NULL, '2024-10-15 01:36:15'),
(6, 'Formulario 5', '2024-10-15', '2024-10-22', 'activo', 0, 6, 5, 1, '2024-10-16 01:18:02', '2024-10-16 01:18:02'),
(7, 'Prueba piloto 1 nury', '2024-01-01', '2025-01-01', 'activo', 0, 1, 5, 1, '2024-11-08 08:47:47', '2024-11-08 08:47:47'),
(8, 'ARTEMISA USUARIO Y EXPERIENCIA', '2024-11-13', '2024-11-26', 'activo', 1, 1, 5, 1, '2024-11-27 12:57:32', '2024-11-28 20:13:59');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2024_08_30_000000_user_types_table', 1),
(2, '2024_08_30_000001_create_users_table', 1),
(3, '2024_08_30_000002_create_faculties_table', 1),
(4, '2024_08_30_000003_create_cities_table', 1),
(5, '2024_08_30_000004_dependencies_table', 1),
(6, '2024_08_30_000005_create_work_spaces_table', 1),
(7, '2024_08_30_000006_create_forms_table', 1),
(8, '2024_08_30_000007_create_work_space_user_table', 1),
(10, '2024_09_18_001912_create_cache_table', 2),
(11, '2024_08_30_000008_create_questions_table', 3),
(12, '2024_08_30_000009_create_answers_table', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `text_box` varchar(255) NOT NULL,
  `field_type` varchar(255) NOT NULL,
  `checkboxes` varchar(255) DEFAULT NULL,
  `form_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `questions`
--

INSERT INTO `questions` (`id`, `text_box`, `field_type`, `checkboxes`, `form_id`, `created_at`, `updated_at`) VALUES
(6, 'cual es su sicudad', 'select', NULL, 2, '2024-10-08 01:53:04', '2024-10-08 01:53:04'),
(7, 'que edad tienes', 'text', NULL, 2, '2024-10-15 01:36:15', '2024-10-15 01:36:15'),
(8, 'como se te llamas', 'text', NULL, 2, '2024-10-15 01:36:15', '2024-10-15 01:36:15'),
(10, 'que dia es hoy', 'text', NULL, 6, '2024-10-16 01:19:24', '2024-10-16 01:19:24'),
(11, 'te sientes bien', 'select', NULL, 6, '2024-10-16 01:19:24', '2024-10-16 01:19:24'),
(12, 'que tipo de mascota prefieres', 'checkbox', 'gato;perro;pez', 6, '2024-10-16 01:19:24', '2024-10-16 01:19:24'),
(13, 'Numero de ficha', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(14, 'Nombres de quien diligencia la ficha', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(15, 'Comuna', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(16, 'barrio', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(17, 'Nombre de la familia', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(18, 'Direccion de la familia', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(19, 'Correo electrónico', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(20, 'Teléfono de la familia:', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(21, 'Teléfono celular:', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(22, 'Fecha diligenciamiento', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(23, 'Departamento de origen', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(24, 'Familia en condición de desplazamiento', 'select', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(25, 'Tiene certificación por desplazamiento', 'select', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(26, 'Municipio de origen', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(27, 'Tiempo de vivir en el barrio (meses)', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(28, 'No de familias en vivienda', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(29, 'No de personas en la vivienda', 'text', NULL, 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(30, 'Estrato socio economico', 'checkbox', '1;2;3;4;5;6', 7, '2024-11-08 09:06:27', '2024-11-08 09:06:27'),
(31, 'a', 'text', NULL, 7, '2024-11-08 09:09:11', '2024-11-08 09:09:11'),
(32, 'tamano de la vivienda en m2', 'text', NULL, 7, '2024-11-08 09:09:11', '2024-11-08 09:09:11'),
(33, 'La vivienda es (Tenencia)', 'checkbox', 'apartamento;cemento;teja de eternit;etc;etc', 7, '2024-11-08 09:09:11', '2024-11-08 09:09:11'),
(34, 'a', 'text', NULL, 7, '2024-11-08 09:11:10', '2024-11-08 09:11:10'),
(35, 'Tipo de vivienda', 'checkbox', 'casa;apt;cuarto;otro', 7, '2024-11-08 09:11:10', '2024-11-08 09:11:10'),
(36, 'Existe percepción del jefe de hogar del riesgo de desplazamiento, inundación u otro peligro?', 'text', NULL, 7, '2024-11-08 09:11:56', '2024-11-08 09:11:56'),
(37, 'Material de paredes', 'checkbox', 'madera;cemento;ladrillo;otro', 7, '2024-11-08 09:11:56', '2024-11-08 09:11:56'),
(38, '24.Material del piso', 'text', NULL, 7, '2024-11-08 09:13:51', '2024-11-08 09:13:51'),
(39, '24.Material del piso', 'checkbox', 'madera;cemento;tierra', 7, '2024-11-08 09:13:51', '2024-11-08 09:13:51'),
(40, 'a', 'text', NULL, 7, '2024-11-08 09:20:46', '2024-11-08 09:20:46'),
(41, 'cocina independiente', 'checkbox', 'si', 7, '2024-11-08 09:20:46', '2024-11-08 09:20:46'),
(42, 'a', 'text', NULL, 7, '2024-11-08 09:21:32', '2024-11-08 09:21:32'),
(43, 'tipo de cocina', 'checkbox', 'electrica;gas;Lena', 7, '2024-11-08 09:21:32', '2024-11-08 09:21:32'),
(44, 'a', 'text', NULL, 7, '2024-11-08 09:23:59', '2024-11-08 09:23:59'),
(45, 'tiene equipo de computacion?', 'select', NULL, 7, '2024-11-08 09:23:59', '2024-11-08 09:23:59'),
(46, 'tiene servicio de internet', 'checkbox', 'si;no', 7, '2024-11-08 09:23:59', '2024-11-08 09:23:59'),
(47, 'a', 'text', NULL, 7, '2024-11-08 09:35:20', '2024-11-08 09:35:20'),
(48, '¿Hierve usted el agua de consumo?', 'select', NULL, 7, '2024-11-08 09:35:20', '2024-11-08 09:35:20'),
(49, '¿Dispone de tanque de agua en su casa?', 'select', NULL, 7, '2024-11-08 09:35:20', '2024-11-08 09:35:20'),
(50, '¿Ha recibido alguna vez capacitación sobre la manipulación de alimentos?', 'select', NULL, 7, '2024-11-08 09:35:20', '2024-11-08 09:35:20'),
(51, 'Disposición de excretas', 'checkbox', 'Alcantarillado;Hoyo Séptico;Campo abierto', 7, '2024-11-08 09:35:20', '2024-11-08 09:35:20'),
(52, 'Bienvenido a la encuesta de satisfaccion de artemisa', 'text', NULL, 8, '2024-11-27 12:58:33', '2024-11-27 12:58:33'),
(53, 'Cual fue tu rol en esta encuesta', 'checkbox', 'Superadmin;Profesor;Encuestador', 8, '2024-11-27 12:58:33', '2024-11-27 12:58:33'),
(54, 'hola', 'text', NULL, 8, '2024-11-27 13:00:48', '2024-11-27 13:00:48'),
(55, 'Como calificarias la facilidad de usuo de la aplicacion (1 facil, 5 dificil)', 'checkbox', '1;2;3;4;5', 8, '2024-11-27 13:00:48', '2024-11-27 13:00:48'),
(56, 'hola', 'text', NULL, 8, '2024-11-27 13:01:52', '2024-11-27 13:01:52'),
(57, 'Alguna dificultad al momento de registrarse los datos de los aspirantes?', 'checkbox', 'si;no', 8, '2024-11-27 13:01:52', '2024-11-27 13:01:52'),
(58, 'asdfsdf', 'text', NULL, 7, '2024-11-28 00:08:55', '2024-11-28 00:08:55'),
(59, 'asdfsdf', 'checkbox', '1;2', 7, '2024-11-28 00:08:55', '2024-11-28 00:08:55'),
(60, 'asdf', 'text', NULL, 7, '2024-11-28 00:09:28', '2024-11-28 00:09:28'),
(61, 'que raza eres', 'checkbox', 'sadf;asdf', 7, '2024-11-28 00:09:28', '2024-11-28 00:09:28'),
(62, 'asdfsadf', 'text', NULL, 7, '2024-11-28 00:17:40', '2024-11-28 00:17:40'),
(63, 'asdfasdfasd', 'checkbox', 'asdfasdf;asdfasdfasdf;asdfsadf;asdfsadf;asdfasdf;asdfasdf;asdfasdf', 7, '2024-11-28 00:17:40', '2024-11-28 00:17:40'),
(64, 'Hola probando 27 hnhoviembre', 'text', NULL, 7, '2024-11-28 00:19:40', '2024-11-28 00:19:40'),
(65, 'Hola probando 27 hnhoviembre', 'checkbox', 'Hola probando 27 hnhoviembre', 7, '2024-11-28 00:19:40', '2024-11-28 00:19:40'),
(66, 'probando 27 noviembre', 'text', NULL, 7, '2024-11-28 00:40:03', '2024-11-28 00:40:03'),
(67, 'probando13', 'checkbox', '1231;123123', 7, '2024-11-28 00:46:00', '2024-11-28 00:46:00'),
(68, 'Hola las instrucciones son>', 'title', NULL, 8, '2024-11-28 20:40:00', '2024-11-28 20:40:00'),
(69, 'las siguientes instruccinoes son', 'title', NULL, 8, '2024-11-28 20:40:56', '2024-11-28 20:40:56'),
(70, '¿Qué tan fácil fue para ti encontrar las funcionalidades que necesitabas?', 'checkbox', '1 (Muy facil);2;3;4;5 (Muy dificil)', 8, '2024-12-01 08:37:32', '2024-12-01 08:37:32'),
(71, '¿Cómo calificarías la estética y el diseño visual de la aplicación?', 'checkbox', '1 (Excelente);2;3;4;5 (Pobre)', 8, '2024-12-01 08:39:18', '2024-12-01 08:39:18'),
(72, '¿El proceso de registro de datos fue claro y sencillo de entender?', 'select', NULL, 8, '2024-12-01 08:41:40', '2024-12-01 08:41:40'),
(73, '¿Te resultó fácil realizar las tareas dentro de la aplicación (ejemplo: agregar datos, buscar información, completar formularios)?', 'select', NULL, 8, '2024-12-01 08:41:40', '2024-12-01 08:41:40');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `document_type` varchar(255) NOT NULL,
  `document_number` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `state` varchar(255) NOT NULL,
  `user_type_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `document_type`, `document_number`, `email`, `password`, `state`, `user_type_id`, `created_at`, `updated_at`) VALUES
(1, 'Jhon', 'Garcia', 'DNI', '124256', 'jhongarcia@gmial.com', '$2y$10$97CKgWgbHj4.HTt8un4Qpuuvl.qWzp97K1ABSXVeEy.kO7xSbQfyO\r\n', 'active', 1, '2024-09-09 20:50:30', '2024-09-09 20:50:30'),
(4, 'luis', 'monsalve', 'Codigo', '12314234234', 'luismonsavel13432@mail.udes.edu.co', '$2y$12$Ws3YUuGSp1cPDhrn6eWykOatCTyUgEG2ok9sv.nAzmNrBajHyiMHS', 'activo', 1, '2024-09-27 01:24:31', '2024-09-27 01:24:31'),
(5, 'Mariana', 'Sofia', 'Codigo', '1200372006', 'mariana@mail.udes.edu.co', '$2y$12$/5PxIZnGZ3TOemzzOYpl1.ivxC4GKtKw1Da059HjUTWDJ8x0.8YJi', 'activo', 10, '2024-09-27 01:30:22', '2024-09-27 01:30:22'),
(6, 'Test', 'Test4', 'Codigo', '1200374', 'test4test@mail.udes.edu.co', '$2y$12$q2eroK27JLrd0iGE97q/fOExaanA2c4NzzMC1QlCbk/Kz2F2XJuj2', 'activo', 1, '2024-10-04 01:11:39', '2024-10-04 01:11:39'),
(8, 'jose', 'gonzalez', 'Cedula', '134134123123', 'jsoegonzalez@mail.udes.edu.co', '$2y$12$RPPafst3ADmJCOVjCVKVb.qVZNEZ5sQCiQcddqtLzEREeXDYsja3C', 'activo', 11, '2024-10-16 01:27:48', '2024-10-16 01:27:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_types`
--

CREATE TABLE `user_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `level` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `user_types`
--

INSERT INTO `user_types` (`id`, `level`, `created_at`, `updated_at`) VALUES
(1, 'admin', '2024-09-09 20:49:16', '2024-09-09 20:49:16'),
(10, 'profesor2', '2024-09-13 01:50:49', '2024-09-13 01:50:49'),
(11, 'encuestado', '2024-10-15 20:22:04', '2024-10-15 20:22:04');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_spaces`
--

CREATE TABLE `work_spaces` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `work_spaces`
--

INSERT INTO `work_spaces` (`id`, `name`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Trabajo de grado', 1, '2024-09-18 20:22:23', '2024-09-18 20:22:26'),
(3, 'base daros', 1, '2024-12-02 11:24:34', '2024-12-02 11:24:34');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `work_space_user`
--

CREATE TABLE `work_space_user` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `work_space_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `work_space_user`
--

INSERT INTO `work_space_user` (`id`, `user_id`, `work_space_id`, `created_at`, `updated_at`) VALUES
(3, 1, 1, '2024-11-27 12:31:26', '2024-11-27 12:31:26'),
(4, 4, 3, '2024-12-02 11:25:00', '2024-12-02 11:25:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `answers_form_id_foreign` (`form_id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `dependencies`
--
ALTER TABLE `dependencies`
  ADD PRIMARY KEY (`id`),
  ADD KEY `dependencies_city_id_foreign` (`city_id`) USING BTREE,
  ADD KEY `dependencies_faculty_id_foreign` (`faculty_id`) USING BTREE;

--
-- Indices de la tabla `faculties`
--
ALTER TABLE `faculties`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `forms`
--
ALTER TABLE `forms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `forms_user_id_foreign` (`user_id`),
  ADD KEY `work_space_FK` (`work_space_id`),
  ADD KEY `dependency_id_foreign` (`dependency_id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_form_id_foreign` (`form_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_user_type_foreign` (`user_type_id`);

--
-- Indices de la tabla `user_types`
--
ALTER TABLE `user_types`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `work_spaces`
--
ALTER TABLE `work_spaces`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_spaces_user_id_foreign` (`user_id`);

--
-- Indices de la tabla `work_space_user`
--
ALTER TABLE `work_space_user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `work_space_user_user_id_foreign` (`user_id`),
  ADD KEY `work_space_user_work_space_id_foreign` (`work_space_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `dependencies`
--
ALTER TABLE `dependencies`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `faculties`
--
ALTER TABLE `faculties`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `forms`
--
ALTER TABLE `forms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `user_types`
--
ALTER TABLE `user_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `work_spaces`
--
ALTER TABLE `work_spaces`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `work_space_user`
--
ALTER TABLE `work_space_user`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `answers`
--
ALTER TABLE `answers`
  ADD CONSTRAINT `answers_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `forms`
--
ALTER TABLE `forms`
  ADD CONSTRAINT `dependency_id_foreign` FOREIGN KEY (`dependency_id`) REFERENCES `dependencies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `forms_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_space_FK` FOREIGN KEY (`work_space_id`) REFERENCES `work_spaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_form_id_foreign` FOREIGN KEY (`form_id`) REFERENCES `forms` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_user_type_foreign` FOREIGN KEY (`user_type_id`) REFERENCES `user_types` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `work_spaces`
--
ALTER TABLE `work_spaces`
  ADD CONSTRAINT `work_spaces_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `work_space_user`
--
ALTER TABLE `work_space_user`
  ADD CONSTRAINT `work_space_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `work_space_user_work_space_id_foreign` FOREIGN KEY (`work_space_id`) REFERENCES `work_spaces` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
