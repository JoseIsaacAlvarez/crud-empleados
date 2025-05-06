-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 06-05-2025 a las 15:39:34
-- Versión del servidor: 11.3.2-MariaDB-1:11.3.2+maria~ubu2204
-- Versión de PHP: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `employee_manager`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `departments`
--

CREATE TABLE `departments` (
  `department_id` int(11) NOT NULL,
  `department_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `departments`
--

INSERT INTO `departments` (`department_id`, `department_name`) VALUES
(10, 'Administración'),
(6, 'Atención al Cliente'),
(2, 'Finanzas'),
(9, 'Investigación y Desarrollo'),
(7, 'Logística'),
(5, 'Marketing'),
(8, 'Producción'),
(1, 'Recursos Humanos'),
(3, 'Tecnología de la Información'),
(4, 'Ventas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `employees`
--

CREATE TABLE `employees` (
  `employee_id` int(11) NOT NULL,
  `employee_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `department_id` int(11) NOT NULL,
  `hiring_date` date NOT NULL,
  `role_id` int(11) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `employees`
--

INSERT INTO `employees` (`employee_id`, `employee_name`, `last_name`, `email`, `birthdate`, `department_id`, `hiring_date`, `role_id`, `password`) VALUES
(2, 'Admin21111555', 'Principal2111114444', 'admin@empresa2.com', '1987-05-02', 2, '2023-05-02', 2, '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9'),
(5, 'Admin5', 'Principal5', 'admin@empresa5.com', '1987-05-02', 5, '2023-05-02', 1, '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9'),
(7, 'Jose Isaac', 'Vergara', 'jose@example.com', '1986-11-18', 1, '2025-01-03', 2, '$2y$10$WsHszqZjIPGpcX9Kfiimt.mItd4V/PAkw5XKqbqO2.u1yWQcHucGS'),
(8, 'Carlos', 'H', 'carlos@example.com', '2007-01-20', 2, '0000-00-00', 2, '$2y$10$nwHMStH9qyT.ctpcxycg9u4pZ3xozkgcvxM7Mpz3MMz9.isZq9k4m'),
(9, 'Edwar', 'P', 'edwar@empresa.com', '2005-03-20', 4, '2024-06-20', 1, '$2y$10$Q9soq5TQTjfbWn0kp/I.PegsxG8EJXZZZvNStYLdF9ID2bIHuMscS'),
(11, 'juan', 'p', 'juan@example.com', '2006-03-15', 8, '2025-03-20', 2, '$2y$10$QnBZs1vlHPq3BxzL21cXC.5Z8tR/kNGMq/G0l2EuROFhzvLYQZ1TC'),
(12, 'leandro', 'r', 'leandro@example.com', '1992-03-21', 2, '2025-03-12', 1, '$2y$10$OFhINp5iWRdGvoaNDkcjOOryQNgl36A5dEq.PbBxG9rj5m6.rtWli'),
(13, 'admin', 'empresa', 'admin@empresa.com', '1985-05-20', 3, '2024-02-18', 1, '$2y$10$A3KYorqonD0w/EA3QOVS8eUU6jjADEBo4VTP5NldE2U9ICXd4sRx6'),
(14, 'Diego', 'daza', 'diego@example.com', '1996-03-14', 1, '2025-05-12', 2, '$2y$10$BLNLLUpBmwLXsUAYibJ.7.jfTmA2xgbn1CIQaTdK2iBlXjMjLZ7ba'),
(15, 'marcos', 'daza', 'marcos@example.com', '1988-11-11', 4, '2025-11-11', 2, '$2y$10$NlWQNLVXTsFGbhRAycxxYe6RB6nH/UqbhoSyS4fkfS4HmrP7perbK'),
(16, 'Lola', 'Vergara', 'lola@example.com', '1987-11-08', 6, '2025-11-11', 2, '$2y$10$kVATqtOKwWmUb7bGd.oQGeCQprbcZGou4t2ZKXjVPQmTJ2saZh60K');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'administrador'),
(2, 'empleado');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`department_id`),
  ADD UNIQUE KEY `department_name` (`department_name`);

--
-- Indices de la tabla `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employee_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `department_id` (`department_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `role_name` (`role_name`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `departments`
--
ALTER TABLE `departments`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `employees`
--
ALTER TABLE `employees`
  MODIFY `employee_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `employees`
--
ALTER TABLE `employees`
  ADD CONSTRAINT `employees_ibfk_1` FOREIGN KEY (`department_id`) REFERENCES `departments` (`department_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `employees_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
