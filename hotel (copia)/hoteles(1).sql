-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost
-- Tiempo de generación: 14-01-2022 a las 17:17:09
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `hoteles`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_hoteles`
--

CREATE TABLE `datos_hoteles` (
  `id` int(11) NOT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `video` varchar(255) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `datos_hoteles`
--

INSERT INTO `datos_hoteles` (`id`, `imagen`, `video`, `descripcion`) VALUES
(1, 'img/GPRO.jpg', '<iframe src=\"https://www.youtube.com/embed/LnbIPRE_0-s\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Este hotel de lujo se encuentra en el barrio exclusivo de la Bonanova, una zona aislada de Palma de Mallorca. Cuenta con el spa más grande de Mallorca, jardines preciosos y vistas impresionantes.'),
(2, 'img/Bella.jpg', '<iframe src=\"https://www.youtube.com/embed/D1_CMM1Y_jw\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Las habitaciones del hotel Bella Colina están decoradas de forma individual, con obras de arte exclusivas, e incluyen cama con dosel moderna, aire acondicionado y TV de pantalla plana con canales vía satélite. El baño privado dispone de bañera, bidet y se'),
(3, 'img/Salles.jpg', '<iframe src=\"https://www.youtube.com/embed/hK7EHGv35Dk\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Estilo tradicional, se halla a solo 7 minutos a pie de la playa y ofrece vistas impresionantes al mar Mediterráneo. Cuenta con piscina y spa. Las habitaciones tienen aire acondicionado y TV vía satélite.'),
(4, 'img/Visa.jpg', '<iframe src=\"https://www.youtube.com/embed/EjB_0ngDcug\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Estos amplios apartamentos independientes cuentan con instalaciones de spa, gimnasio y vistas a las playas de Magaluf y Palma Nova. Se encuentran junto a varios centros de ocio y a 100 metros de la playa.'),
(5, 'img/Jaki.jpg', '<iframe src=\"https://www.youtube.com/embed/3uSBbRClyuI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Las habitaciones del Jakiton presentan una decoración sencilla y elegante. Todas tienen el suelo de baldosas, un ventilador de techo y un baño privado.'),
(6, 'img/Martha.jpg', '<iframe src=\"https://www.youtube.com/embed/vyHHHcFA94w\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Podrá pasar el día tomando el sol en la piscina, o, si lo prefiere, disfrutar de las 2 playas de arena, rodeadas de colinas y pinedas, situadas a 150 m de la propiedad.'),
(7, 'img/Barcelo.jpg', '<iframe src=\"https://www.youtube.com/embed/VOQ19GU81v0\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Este elegante hotel solo para adultos está situado frente al mar y ofrece vistas impresionantes a la bahía de Palma y acceso directo a una cala natural. El Barceló Albatros ofrece spa, piscina al aire libre y bañera de hidromasaje.'),
(8, 'img/Elba.jpg', '<iframe src=\"https://www.youtube.com/embed/mhv_sW5ECHU\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'El establecimiento Elba Sunset Mallorca Thalasso Spa está ubicado en Palmanova, a 300 metros de la playa de Magaluf, y dispone de restaurante, aparcamiento privado, bar y terraza.'),
(9, 'img/Hospes.jpg', '<iframe src=\"https://www.youtube.com/embed/cACNSIuTkMs\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'El Hotel Hospes Maricel y Spa es un hotel impresionante situado a solo 10 minutos en coche de Palma de Mallorca. Combina la arquitectura moderna con la arquitectura de los siglos XVI y XVII y cuenta con un spa bien equipado y una piscina de borde infinito'),
(10, 'img/Lis.jpg', '<iframe src=\"https://www.youtube.com/embed/fJXmh3hT_YE\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', 'Los apartamentos del Hotel Lis tienen una decoración sencilla y disponen de zona de cocina con microondas, hervidor de agua y nevera. La mayoría de apartamentos tienen un balcón privado.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoteles`
--

CREATE TABLE `hoteles` (
  `id` int(11) NOT NULL,
  `nombre_hotel` varchar(255) DEFAULT NULL,
  `ubicacion` varchar(255) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `puntuacion` int(11) DEFAULT NULL,
  `id_datos` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `hoteles`
--

INSERT INTO `hoteles` (`id`, `nombre_hotel`, `ubicacion`, `precio`, `puntuacion`, `id_datos`) VALUES
(1, 'GPRO Valparaiso Palace & Spa', 'Francisco Vidal Sureda 23', 133, 8, 1),
(2, 'Bella Colina I Vintage Hotel 1953', 'Carrer de Talaia', 99, 9, 2),
(3, 'Salles Hotels Marina Portals', 'Carrer de Andratx 10', 91, 8, 3),
(4, 'Apartamentos Vistasol', 'Alta 5 Magalluf', 63, 7, 4),
(5, 'Hostal Jakiton', 'San Miguel de Liria 8', 40, 8, 5),
(6, 'Apartamentos Martha', 'Jardiel Porcela', 55, 6, 6),
(7, 'Barcelo Illetas Albatros Adults Only', 'Paseo de illetas', 136, 8, 7),
(8, 'Elba Sunset Mallorca Thalasso Spa', 'Carrer Torrenova 25', 400, 9, 8),
(9, 'Hotel Hospes Maricel y Spa', 'Carretera Andratx 11', 292, 9, 9),
(10, 'Hotel Lis Mallorca', 'Margaluz 13', 89, 7, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `datos_hoteles`
--
ALTER TABLE `datos_hoteles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_datos` (`id_datos`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `hoteles`
--
ALTER TABLE `hoteles`
  ADD CONSTRAINT `hoteles_ibfk_1` FOREIGN KEY (`id_datos`) REFERENCES `datos_hoteles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
