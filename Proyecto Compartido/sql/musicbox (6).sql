-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-05-2017 a las 11:55:19
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `musicbox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artista`
--

CREATE TABLE IF NOT EXISTS `artista` (
  `id_artista` varchar(15) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `pais` varchar(40) DEFAULT NULL,
  `numero_visitas_artistas` int(11) DEFAULT NULL,
  `foto_artista` varchar(100) DEFAULT NULL,
  `fecha_nacimiento` varchar(50) DEFAULT NULL,
  `biografia` varchar(1000) DEFAULT NULL,
  `website` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `artista`
--

INSERT INTO `artista` (`id_artista`, `nombre`, `pais`, `numero_visitas_artistas`, `foto_artista`, `fecha_nacimiento`, `biografia`, `website`) VALUES
('1', 'Madonna', 'Bay City, Michigan, Estados Unidos', 443, 'img/fotos_artistas/1.jpg', '16 de agosto de 1958', 'Madonna, es una cantautora, actriz y empresaria estadounidense. Pasó sus primeros años en Bay City y en 1977 se mudó a la ciudad de Nueva York para realizar una carrera de danza contemporánea. Después de participar en dos grupos musicales, Breakfast Club y Emmy, en 1982 firmó con Sire Records (filial de Warner Bros. Records) y lanzó su álbum debut Madonna al año siguiente. Siguió lanzando una serie de álbumes en los que encontró una inmensa popularidad, superando los límites de contenido de las letras de sus canciones y explotando las imágenes en sus vídeos musicales, que a lo largo de su carrera se han convertido en piezas de arte.', 'madonna.com'),
('2', 'The Beatles', 'Reino Unido', 37, 'img/fotos_artistas/2.jpg', NULL, NULL, NULL),
('3', 'Michael Jackson', 'Glendale, California, Estados Unidos', NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificaciones`
--

CREATE TABLE IF NOT EXISTS `calificaciones` (
  `calificacion_usuario` int(11) DEFAULT NULL,
  `nombre_usuario` varchar(15) DEFAULT NULL,
  `id_disco` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `calificaciones`
--

INSERT INTO `calificaciones` (`calificacion_usuario`, `nombre_usuario`, `id_disco`) VALUES
(8, 'pier', '3'),
(8, 'pier2', '3'),
(4, 'pier2', '2'),
(3, 'pier2', '1'),
(10, 'pier', '1'),
(10, 'pier', '2'),
(7, 'pier', '4');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE IF NOT EXISTS `canciones` (
`id_cancion` int(11) NOT NULL,
  `nombre_cancion` varchar(300) DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `id_disco` varchar(30) DEFAULT NULL,
  `numero_cancion` int(11) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `canciones`
--

INSERT INTO `canciones` (`id_cancion`, `nombre_cancion`, `duracion`, `id_disco`, `numero_cancion`) VALUES
(1, 'Candy Shop', '00:03:21', '1', 1),
(2, 'Hard Candy', NULL, '1', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE IF NOT EXISTS `discos` (
  `id_disco` varchar(30) NOT NULL DEFAULT '',
  `titulo_disco` varchar(200) DEFAULT NULL,
  `portada` varchar(500) DEFAULT NULL,
  `numero_visitas` int(11) DEFAULT NULL,
  `id_artista` varchar(15) DEFAULT NULL,
  `generos` varchar(50) DEFAULT NULL,
  `discograficas` varchar(80) DEFAULT NULL,
  `fecha_lanzamiento` date DEFAULT NULL,
  `duracion` time DEFAULT NULL,
  `formato` varchar(10) DEFAULT NULL,
  `spotify_enlace` varchar(100) DEFAULT NULL,
  `texto` varchar(1000) DEFAULT NULL,
  `apple_enlace` varchar(100) DEFAULT NULL,
  `amazon_enlace` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id_disco`, `titulo_disco`, `portada`, `numero_visitas`, `id_artista`, `generos`, `discograficas`, `fecha_lanzamiento`, `duracion`, `formato`, `spotify_enlace`, `texto`, `apple_enlace`, `amazon_enlace`) VALUES
('1', 'Hard Candy', 'img/portadas_discos/1.jpg', 777, '1', 'Dance-pop', 'Warner Bros.', '0200-00-00', '00:00:00', NULL, 'https://open.spotify.com/album/7jgBVzMVZuuhaTG5zQ0Vgk', 'Hard Candy es el undécimo álbum de estudio de la cantante estadounidense Madonna. Fue lanzado por primera vez el 19 de abril de 2008 por Warner Bros. Records. Representó su último álbum de estudio con la discográfica, marcando fin a veinticinco años de historia de grabación. Madonna empezó a trabajar en el disco en el 2007, y colaboró con Justin Timberlake, Timbaland, Pharrell Williams y Nate «Danja» Hills. El álbum tiene, en general, un ambiente pop urbano, mientras mantiene un estilo dance pop en su núcleo.', 'https://itunes.apple.com/us/album/hard-candy-deluxe-version/id278674439?ign-mpt=uo%3D4', 'https://www.amazon.com/s?ie=UTF8&x=0&ref_=nb_sb_noss&y=0&field-keywords=madonna%20hard%20candy&url=search-alias%3Daps'),
('2', 'Confessions on a Dance Floor', 'img/portadas_discos/2.jpg', 106, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('3', 'American Life', 'img/portadas_discos/3.png', 133, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('4', 'Music', 'img/portadas_discos/4.png', 34, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('5', 'Ray of Light', 'img/portadas_discos/5.png', 45, '1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
('6', 'The White Album', NULL, 8, '2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `nombre_usuario` varchar(15) NOT NULL,
  `correo_electronico` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`nombre_usuario`, `correo_electronico`, `contrasena`) VALUES
('pier', 'piergotta@gmail.com', '123456'),
('pier2', 'piergotta@gmail.com', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `artista`
--
ALTER TABLE `artista`
 ADD PRIMARY KEY (`id_artista`);

--
-- Indices de la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
 ADD KEY `nombre_usuario` (`nombre_usuario`), ADD KEY `id_disco` (`id_disco`);

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
 ADD PRIMARY KEY (`id_cancion`), ADD KEY `id_disco` (`id_disco`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
 ADD PRIMARY KEY (`id_disco`), ADD KEY `id_artista` (`id_artista`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
 ADD PRIMARY KEY (`nombre_usuario`), ADD UNIQUE KEY `nombre_usuario` (`nombre_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
MODIFY `id_cancion` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificaciones`
--
ALTER TABLE `calificaciones`
ADD CONSTRAINT `calificaciones_ibfk_1` FOREIGN KEY (`nombre_usuario`) REFERENCES `usuario` (`nombre_usuario`),
ADD CONSTRAINT `calificaciones_ibfk_2` FOREIGN KEY (`id_disco`) REFERENCES `discos` (`id_disco`);

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
ADD CONSTRAINT `canciones_ibfk_1` FOREIGN KEY (`id_disco`) REFERENCES `discos` (`id_disco`);

--
-- Filtros para la tabla `discos`
--
ALTER TABLE `discos`
ADD CONSTRAINT `discos_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artista` (`id_artista`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
