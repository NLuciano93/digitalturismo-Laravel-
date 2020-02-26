-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 26-02-2020 a las 02:55:24
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `digitalturismodb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id_comentario` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `comentario` text DEFAULT NULL,
  `puntuacion` tinyint(4) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id_comentario`, `id_usuario`, `id_destino`, `comentario`, `puntuacion`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'Gran Destino ', 5, '2020-02-25 00:00:00', '2020-02-25 00:00:00'),
(2, 5, 10, 'Vamoo Chaco!', 5, '2020-02-25 00:00:00', '2020-02-25 00:00:00'),
(3, 5, 1, 'Bariloo!', 4, '2020-02-25 00:00:00', '2020-02-25 00:00:00'),
(4, 1, 10, 'Chaco loco!', 3, '2020-02-25 00:00:00', '2020-02-25 00:00:00'),
(5, 1, 4, 'Vamo las cataratas', 3, '2020-02-25 18:36:14', '2020-02-25 18:36:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `destinos`
--

CREATE TABLE `destinos` (
  `id_destino` int(11) NOT NULL,
  `nombre_destino` varchar(100) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `promocion` tinyint(4) DEFAULT NULL,
  `avatar_destino` varchar(100) NOT NULL,
  `id_provincia` int(11) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `destinos`
--

INSERT INTO `destinos` (`id_destino`, `nombre_destino`, `precio`, `promocion`, `avatar_destino`, `id_provincia`, `created_at`, `updated_at`) VALUES
(1, 'BARILOCHE \"SKI\" 7 DIAS', '14500.00', 10, 'barilocheEsquiando.jpg', 1, NULL, '2020-02-18 15:52:03'),
(2, 'SALTA \"LA LINDA\"', '28900.00', 0, 'saltaMontañaAlpinista.jpg', 16, NULL, '0000-00-00 00:00:00'),
(3, 'MENDOZA CITY TOUR', '15000.00', 0, 'mendozaCiudad.jpg', 12, NULL, '0000-00-00 00:00:00'),
(4, 'CATARATAS EXTREM 10 DIAS', '8900.00', 10, 'cataratas-iguazu.jpg', 13, NULL, '0000-00-00 00:00:00'),
(5, 'MINA CLAVERO PURA AVENTURA', '10000.00', 0, 'paisaje1.jpg', 5, NULL, '0000-00-00 00:00:00'),
(6, 'SALTA ALPINISMO EXTREMO', '11000.00', 0, 'saltaMontañaAlpinista.jpg', 16, NULL, '0000-00-00 00:00:00'),
(8, 'USHUAIA \"EL FIN DEL MUNDO\"', '10000.00', 0, 'img_5e3827062232a.jpg', 22, NULL, '0000-00-00 00:00:00'),
(10, 'Chaco Love', '10000.00', 10, '1582034162foto.jpg', 3, '2020-02-18 13:56:02', '2020-02-18 13:56:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favoritos`
--

CREATE TABLE `favoritos` (
  `id_favorito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `favoritos`
--

INSERT INTO `favoritos` (`id_favorito`, `id_usuario`, `id_destino`) VALUES
(14, 1, 3),
(16, 1, 2),
(17, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formas_pagos`
--

CREATE TABLE `formas_pagos` (
  `id_forma_pago` int(11) NOT NULL,
  `nombre_pago` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_destinos`
--

CREATE TABLE `imagenes_destinos` (
  `id_imagen_dest` int(11) NOT NULL,
  `imagen_dest` varchar(50) DEFAULT NULL,
  `id_destino` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes_usuarios`
--

CREATE TABLE `imagenes_usuarios` (
  `id_imagen_usu` int(11) NOT NULL,
  `nombre_foto` varchar(100) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `localidad`
--

CREATE TABLE `localidad` (
  `id_localidad` int(11) NOT NULL,
  `nombre_localidad` varchar(50) DEFAULT NULL,
  `id_provincia` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pais`
--

CREATE TABLE `pais` (
  `id_pais` int(11) NOT NULL,
  `nombre_pais` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `pais`
--

INSERT INTO `pais` (`id_pais`, `nombre_pais`) VALUES
(1, 'ARGENTINA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provincia`
--

CREATE TABLE `provincia` (
  `id_provincia` int(11) NOT NULL,
  `nombre_provincia` varchar(50) DEFAULT NULL,
  `id_pais` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `provincia`
--

INSERT INTO `provincia` (`id_provincia`, `nombre_provincia`, `id_pais`) VALUES
(1, 'BUENOS AIRES', 1),
(2, 'CATAMARCA', 1),
(3, 'CHACO', 1),
(4, 'CHUBUT', 1),
(5, 'CÓRDOBA', 1),
(6, 'CORRIENTES', 1),
(7, 'ENTRE RÍOS', 1),
(8, 'FORMOSA', 1),
(9, 'JUJUY', 1),
(10, 'LA PAMPA', 1),
(11, 'LA RIOJA', 1),
(12, 'MENDOZA', 1),
(13, 'MISIONES', 1),
(14, 'NEUQUÉN', 1),
(15, 'RÍO NEGRO', 1),
(16, 'SALTA', 1),
(17, 'SAN JUAN', 1),
(18, 'SAN LUIS', 1),
(19, 'SANTA CRUZ', 1),
(20, 'SANTA FÉ', 1),
(21, 'SANTIAGO DEL ESTERO', 1),
(22, 'TIERRA DEL FUEGO', 1),
(23, 'TUCUMÁN', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre_rol` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre_rol`) VALUES
(1, 'usuario'),
(2, 'admin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `facebook` varchar(200) DEFAULT NULL,
  `twitter` varchar(200) DEFAULT NULL,
  `instagram` varchar(200) DEFAULT NULL,
  `avatar` varchar(200) DEFAULT NULL,
  `rol_id` int(11) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `facebook`, `twitter`, `instagram`, `avatar`, `rol_id`, `remember_token`, `updated_at`, `created_at`) VALUES
(1, 'Luciano', 'natielloluciano@gmail.com', '$2y$10$m6891nXhtw.kxveSHvtg5.8mhXclbwuAYH5RkVIJ0P3VUVlzsI7j2', NULL, NULL, NULL, '', 1, NULL, '2020-02-22 01:30:49', '2020-02-22 01:30:49'),
(2, 'admin', 'admin@admin.com', '$2y$10$BVBR04gXjPm8axnUbS6jGuzNlZU9VWa5hl3EUMYAWCQ6qkpLMVn/C', NULL, NULL, NULL, '', 2, NULL, '2020-02-22 01:37:48', '2020-02-22 01:37:48'),
(3, 'carla', 'carlos@asd.com', '$2y$10$4UiA2RVfdhpk2g2inL6C0ulaM2xX3zmb026UKvHDAoNKrhB407qFe', NULL, NULL, NULL, NULL, 1, NULL, '2020-02-23 02:41:52', '2020-02-23 02:41:52'),
(4, 'carla', 'carla@carla.com', '$2y$10$6GS8PdGnwRdnURmoGqI/gepqEi8xRHdVXiD5s5EsqsCjRGnQCfoTu', 'https://www.facebook.com/', 'https://twitter.com/home', 'https://www.instagram.com/?hl=es-la', '1582415124Foto.png', 1, NULL, '2020-02-23 02:45:24', '2020-02-23 02:45:24'),
(5, 'Fullmove', 'asd@asd.com', '$2y$10$xYEZi4UBePaZ4Qnmbw/jyOxrPFDXT7/BG2WTr0fMB1Q0qDOBQn8ge', 'facebook.com', NULL, NULL, 'user.png', 1, NULL, '2020-02-23 03:00:43', '2020-02-23 03:00:43'),
(6, 'Luciano', 'natielloluciano@gmail.co', '$2y$10$3YE7bUXj1z2E50eE/ALz4.s548S4Io7MPlJCO8L4lpeUMVSWJqbJi', 'https://www.facebook.com/', 'https://twitter.com/home', 'https://www.instagram.com/?hl=es-la', '1582459446Foto.png', 1, NULL, '2020-02-23 15:04:07', '2020-02-23 15:04:07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `facebook` varchar(100) DEFAULT NULL,
  `instagram` varchar(100) DEFAULT NULL,
  `twitter` varchar(100) DEFAULT NULL,
  `avatar` varchar(100) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre_usuario`, `email`, `password`, `facebook`, `instagram`, `twitter`, `avatar`, `created_at`, `updated_at`) VALUES
(5, 'Luciano Natiello', 'natielloluciano@gmail.com', '$2y$10$JdS1WZnL9ztP.7xkThWw6.3KLcXkU6OYqtz5NJsJENWL8uEfuCDo2', 'https://www.facebook.com/', 'https://www.instagram.com/?hl=es-la', 'https://twitter.com/home', 'img_5e322c738f8ab.png', '2020-01-29 22:08:03', '0000-00-00 00:00:00'),
(6, 'admin', 'admin@admin.com', '$2y$10$NDdk8Px.U0.htdVPkl0H4ublGKz4CZdJWPjJcdgnw6OBGLHBcbyj2', NULL, NULL, NULL, NULL, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `viajes_comprados`
--

CREATE TABLE `viajes_comprados` (
  `id_favorito` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_destino` int(11) NOT NULL,
  `fecha_compra` datetime DEFAULT NULL,
  `id_forma_pago` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_destino` (`id_destino`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD PRIMARY KEY (`id_destino`),
  ADD KEY `fk_provincia` (`id_provincia`);

--
-- Indices de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `id_destino` (`id_destino`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `formas_pagos`
--
ALTER TABLE `formas_pagos`
  ADD PRIMARY KEY (`id_forma_pago`);

--
-- Indices de la tabla `imagenes_destinos`
--
ALTER TABLE `imagenes_destinos`
  ADD PRIMARY KEY (`id_imagen_dest`),
  ADD KEY `id_destino` (`id_destino`);

--
-- Indices de la tabla `imagenes_usuarios`
--
ALTER TABLE `imagenes_usuarios`
  ADD PRIMARY KEY (`id_imagen_usu`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD PRIMARY KEY (`id_localidad`),
  ADD KEY `id_provincia` (`id_provincia`);

--
-- Indices de la tabla `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`id_pais`);

--
-- Indices de la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD PRIMARY KEY (`id_provincia`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `rol_id` (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `email_2` (`email`);

--
-- Indices de la tabla `viajes_comprados`
--
ALTER TABLE `viajes_comprados`
  ADD PRIMARY KEY (`id_favorito`),
  ADD KEY `id_destino` (`id_destino`),
  ADD KEY `id_forma_pago` (`id_forma_pago`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `destinos`
--
ALTER TABLE `destinos`
  MODIFY `id_destino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `favoritos`
--
ALTER TABLE `favoritos`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `formas_pagos`
--
ALTER TABLE `formas_pagos`
  MODIFY `id_forma_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_destinos`
--
ALTER TABLE `imagenes_destinos`
  MODIFY `id_imagen_dest` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes_usuarios`
--
ALTER TABLE `imagenes_usuarios`
  MODIFY `id_imagen_usu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `localidad`
--
ALTER TABLE `localidad`
  MODIFY `id_localidad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pais`
--
ALTER TABLE `pais`
  MODIFY `id_pais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `provincia`
--
ALTER TABLE `provincia`
  MODIFY `id_provincia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `viajes_comprados`
--
ALTER TABLE `viajes_comprados`
  MODIFY `id_favorito` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id_destino`),
  ADD CONSTRAINT `comentarios_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `destinos`
--
ALTER TABLE `destinos`
  ADD CONSTRAINT `fk_provincia` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`);

--
-- Filtros para la tabla `favoritos`
--
ALTER TABLE `favoritos`
  ADD CONSTRAINT `favoritos_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id_destino`),
  ADD CONSTRAINT `favoritos_ibfk_3` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `imagenes_destinos`
--
ALTER TABLE `imagenes_destinos`
  ADD CONSTRAINT `imagenes_destinos_ibfk_1` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id_destino`);

--
-- Filtros para la tabla `imagenes_usuarios`
--
ALTER TABLE `imagenes_usuarios`
  ADD CONSTRAINT `imagenes_usuarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `localidad`
--
ALTER TABLE `localidad`
  ADD CONSTRAINT `localidad_ibfk_1` FOREIGN KEY (`id_provincia`) REFERENCES `provincia` (`id_provincia`);

--
-- Filtros para la tabla `provincia`
--
ALTER TABLE `provincia`
  ADD CONSTRAINT `provincia_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `pais` (`id_pais`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);

--
-- Filtros para la tabla `viajes_comprados`
--
ALTER TABLE `viajes_comprados`
  ADD CONSTRAINT `viajes_comprados_ibfk_2` FOREIGN KEY (`id_destino`) REFERENCES `destinos` (`id_destino`),
  ADD CONSTRAINT `viajes_comprados_ibfk_3` FOREIGN KEY (`id_forma_pago`) REFERENCES `formas_pagos` (`id_forma_pago`),
  ADD CONSTRAINT `viajes_comprados_ibfk_4` FOREIGN KEY (`id_usuario`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
