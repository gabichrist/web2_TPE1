-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-11-2021 a las 15:30:44
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `libreria`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios`
--

CREATE TABLE `comentarios` (
  `id` int(11) NOT NULL,
  `comentario` varchar(200) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_libro` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentarios`
--

INSERT INTO `comentarios` (`id`, `comentario`, `puntuacion`, `id_usuario`, `id_libro`) VALUES
(1, 'Es simplemente uno de los mejores libros que he leido, tiene la fantasia que estaba buscando, esa aventura infantil la cual le da toque a su vida. Amo a Harry,Ron y Hermione son simplemente el trio de', 5, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `escritores`
--

CREATE TABLE `escritores` (
  `id_escritor` int(11) NOT NULL,
  `nombre` varchar(20) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `biografia` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `escritores`
--

INSERT INTO `escritores` (`id_escritor`, `nombre`, `apellido`, `fecha_nacimiento`, `biografia`) VALUES
(2, 'Antoine', 'Antoine de Saint Exupery ', '1900-06-07', 'Antoine Marie Jean-Baptiste Roger Conde de Saint-Exupéry​, conocido como Antoine de Saint-Exupéry, fue un aviador y escritor francés, autor de la famosa obra El principito.\r\n    \r\n    \r\n    '),
(3, 'Joanne', 'Rowling', '1957-07-31', 'J.K. Rowling es la autora de los siete libros de la saga de Harry Potter, que han vendido más de 500 millones de ejemplares, se han traducido a más de ochenta idiomas y han inspirado ocho películas de gran éxito de taquilla. Rowling es coautora de Harry Potter y el legado maldito, una obra de teatro donde nos presenta a Harry ya adulto. También escribe los guiones de las películas de Animales fantásticos.\r\n\r\nEn 2020, J.K. Rowling volvió a escribir para niños con el cuento de hadas El ickabog, qu'),
(5, 'Stephen', 'King', '1947-09-24', 'Stephen Edwin King, más conocido como Stephen King y ocasionalmente por su seudónimo Richard Bachman, es un escritor estadounidense de novelas de terror, ficción sobrenatural, misterio, ciencia ficción y literatura fantástica'),
(6, 'Simone', 'de Beauvoir', '1908-01-09', 'Simone Lucie Ernestine Marie Bertrand de Beauvoir fue una filósofa, profesora y escritora francesa.​ Fue una luchadora por la igualdad de derechos de la mujer. Escribió novelas, ensayos, biografías y monografías sobre temas políticos, sociales y filosóficos.'),
(7, 'Eduardo', 'Galeano', '1987-02-10', 'a!'),
(11, 'Agatha ', 'Christie', '1980-09-15', ' más conocida por el pseudónimo de Agatha Christie, fue una escritora y dramaturga británica especializada en el género policial, por cuyo trabajo tuvo reconocimiento a nivel internacional.1​ A lo largo de su carrera, publicó 66 novelas policiales, 6 novelas rosas y 14 historias cortas —bajo el pseudónimo de Mary Westmacott—, además de incursionar como autora teatral en obras como La ratonera o T\r\n    ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `id_libro` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `sinopsis` varchar(500) NOT NULL,
  `genero` varchar(30) NOT NULL,
  `anio` year(4) NOT NULL,
  `id_escritor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`id_libro`, `titulo`, `sinopsis`, `genero`, `anio`, `id_escritor`) VALUES
(0, 'El principito', 'El principito es un cuento poético que viene acompañado de ilustraciones hechas con acuarelas por el mismo Saint-Exupéry.10 En él, un piloto se encuentra perdido en el desierto del Sahara luego de que su avión sufriera una avería, pero para su sorpresa, es allí donde conoce a un pequeño príncipe proveniente de otro planeta. La historia tiene una temática filosófica, donde se incluyen críticas sociales dirigidas a la «extrañeza» con la que los adultos ven las cosas. Estas críticas a las cosas «im', 'Ficción Literaria', 1933, 2),
(3, 'Harry Potter y la Piedra Filosofal', '«Con las manos temblorosas, Harry le dio la vuelta al sobre y vio un sello de lacre púrpura con un escudo de armas: un león, un águila, un tejón y una serpiente, que rodeaban una gran letra H.»\r\n\r\nHarry Potter nunca ha oído hablar de Hogwarts hasta que empiezan a caer cartas en el felpudo del número 4 de Privet Drive. Llevan la dirección escrita con tinta verde en un sobre de pergamino amarillento con un sello de lacre púrpura, y sus horripilantes tíos se apresuran a confiscarlas. Más tarde, el ', 'Fantasia', 1999, 3),
(6, 'El Resplandor', 'Jack Torrance se convierte en cuidador de invierno en el Hotel Overlook, en Colorado, con la esperanza de vencer su bloqueo con la escritura. Se instala allí junto con su esposa, Wendy, y su hijo, Danny, que está plagado de premoniciones psíquicas. Mientras la escritura de Jack no fluye y las visiones de Danny se vuelven más preocupantes, Jack descubre oscuros secretos del hotel y comienza a convertirse en un maníaco homicida, empeñado en aterrorizar a su familia.', 'Terror', 1977, 5),
(7, 'El Segundo Sexo', 'Se trata de un estudio totalizador donde se investiga el porqué de la situación en que se encuentra esa mitad de la humanidad que somos las mujeres. ... Pensadora y novelista francesa, representante del movimiento existencialista ateo y figura importante en la reivindicación de los derechos de la mujer.', 'ensayo', 1949, 6),
(23, 'Test', 'easf', 'saf', 2012, 5),
(24, '', '', '', 0000, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `mail` varchar(100) NOT NULL,
  `clave` varchar(100) NOT NULL,
  `rol` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `mail`, `clave`, `rol`) VALUES
(1, 'admin', 'admin@gmail.com', '$2a$12$PwKMSpX281sqINDPztJ0I.Jpp8awR3v2UKp/jn85PpC6TSfpMW82C', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_libro` (`id_libro`);

--
-- Indices de la tabla `escritores`
--
ALTER TABLE `escritores`
  ADD PRIMARY KEY (`id_escritor`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`id_libro`),
  ADD KEY `id_escritor` (`id_escritor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `comentarios`
--
ALTER TABLE `comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `escritores`
--
ALTER TABLE `escritores`
  MODIFY `id_escritor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `id_libro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentarios`
--
ALTER TABLE `comentarios`
  ADD CONSTRAINT `comentarios_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`),
  ADD CONSTRAINT `comentarios_ibfk_2` FOREIGN KEY (`id_libro`) REFERENCES `libros` (`id_libro`);

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`id_escritor`) REFERENCES `escritores` (`id_escritor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
