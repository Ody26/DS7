-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2024 a las 02:05:06
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- --------------------------------------------------------



CREATE TABLE `marca` (
  `id_marca` int(11) NOT NULL,
  `nombre_marca` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `marca` (`id_marca`, `nombre_marca`) VALUES
(1, 'Hyundai'),
(2, 'Toyota'),
(3, 'Honda'),
(4, 'Ford'),
(5, 'Volkswagen'),
(6, 'Chevrolet'),
(7, 'Nissan'),
(8, 'Kia'),
(9, 'Mazda'),
(10, 'Subaru'),
(11, 'Peugeot'),
(12, 'Renault'),
(13, 'Fiat'),
(14, 'Dodge'),
(15, 'Chrysler'),
(16, 'GMC'),
(17, 'Hyundai'),
(18, 'Toyota'),
(19, 'Honda'),
(20, 'Ford'),
(21, 'Volkswagen'),
(22, 'Chevrolet'),
(23, 'Nissan'),
(24, 'Kia'),
(25, 'Mazda'),
(26, 'Subaru'),
(27, 'Peugeot'),
(28, 'Renault'),
(29, 'Fiat'),
(30, 'Dodge'),
(31, 'Chrysler'),
(32, 'GMC'),
(33, 'Hyundai'),
(34, 'Toyota'),
(35, 'Honda'),
(36, 'Ford'),
(37, 'Volkswagen'),
(38, 'Chevrolet'),
(39, 'Nissan'),
(40, 'Kia'),
(41, 'Mazda'),
(42, 'Subaru'),
(43, 'Peugeot'),
(44, 'Renault'),
(45, 'Fiat'),
(46, 'Dodge'),
(47, 'Chrysler'),
(48, 'GMC'),
(49, 'Hyundai'),
(50, 'Toyota'),
(51, 'Honda'),
(52, 'Ford'),
(53, 'Volkswagen'),
(54, 'Chevrolet'),
(55, 'Nissan'),
(56, 'Kia'),
(57, 'Mazda'),
(58, 'Subaru'),
(59, 'Peugeot'),
(60, 'Renault'),
(61, 'Fiat'),
(62, 'Dodge'),
(63, 'Chrysler'),
(64, 'GMC');

-- --------------------------------------------------------



CREATE TABLE `modelo` (
  `id_modelo` int(11) NOT NULL,
  `nombre_modelo` varchar(35) NOT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_tipo_vehiculo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



INSERT INTO `modelo` (`id_modelo`, `nombre_modelo`, `id_marca`, `id_tipo_vehiculo`) VALUES
(97, 'Sonata', 1, 1),
(98, 'Tucson', 1, 2),
(99, 'Corolla', 2, 1),
(100, 'RAV4', 2, 2),
(101, 'Civic', 3, 1),
(102, 'CR-V', 3, 2),
(103, 'Fiesta', 4, 1),
(104, 'Explorer', 4, 2),
(105, 'Golf', 5, 1),
(106, 'Tiguan', 5, 2),
(107, 'Sonic', 6, 1),
(108, 'Equinox', 6, 2),
(109, 'Altima', 7, 1),
(110, 'Rogue', 7, 2),
(111, 'Sportage', 8, 1),
(112, 'Soul', 8, 4),
(113, 'Mazda3', 9, 1),
(114, 'CX-5', 9, 2),
(115, 'Outback', 10, 2),
(116, 'Impreza', 10, 1),
(117, '308', 11, 1),
(118, '3008', 11, 2),
(119, 'Clio', 12, 1),
(120, 'Captur', 12, 2),
(121, 'Punto', 13, 1),
(122, '500', 13, 4),
(123, 'Charger', 14, 1),
(124, 'Durango', 14, 2),
(125, '300', 15, 1),
(126, 'Pacifica', 15, 2),
(127, 'Sierra', 16, 2),
(128, 'Terrain', 16, 1);

-- --------------------------------------------------------

CREATE TABLE `propietario` (
  `id_propietario` varchar(15) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `tipo_propietario` enum('natural','jurídico') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `propietario` (`id_propietario`, `nombre`, `apellido`, `telefono`, `direccion`, `tipo_propietario`) VALUES
('', '', '', NULL, NULL, 'natural'),
('10', 'hola', '', NULL, NULL, 'natural'),
('11', 'hola', '', NULL, NULL, 'natural'),
('12', 'nose', '', NULL, NULL, 'natural'),
('12345', 'gera', 'vasquez', '2344567', 'panama', 'jurídico'),
('13', 'buuu', '', NULL, NULL, 'natural'),
('14', 'buuu', '', NULL, NULL, 'natural'),
('15', 'juaquin', '', NULL, NULL, 'natural'),
('16', 'yani', '', NULL, NULL, 'natural'),
('17', 'juan', '', NULL, NULL, 'natural'),
('2', 'Empresa S.A.', 'Acme', '87654321', 'Avenida Siempre Viva 742', 'jurídico'),
('20-34-111', 'pepito', 'perez', '2344567', 'panama', 'natural'),
('20-34-20', 'pepito', 'perez', '2344567', 'panama', 'natural'),
('20-34-23', 'pepito', 'perez', '2344567', 'panama', 'natural'),
('20-34-33', 'pepe', 'nuñez', '2344567', 'panama', 'natural'),
('3', 'Juan', 'Pérez', '12345678', 'Calle Falsa 123', 'natural'),
('4', 'Empresa S.A.', 'Acme', '87654321', 'Avenida Siempre Viva 742', 'jurídico'),
('5', 'juana', '', NULL, NULL, 'natural'),
('6', 'Gabriel', '', NULL, NULL, 'natural'),
('7', 'juan', '', NULL, NULL, 'natural'),
('8', 'Federico', '', NULL, NULL, 'natural'),
('9', 'hihi', '', NULL, NULL, 'natural');


CREATE TABLE `tipovehiculo` (
  `id_tipo_vehiculo` int(11) NOT NULL,
  `nombre_tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `tipovehiculo` (`id_tipo_vehiculo`, `nombre_tipo`) VALUES
(1, 'Sedán'),
(2, 'SUV'),
(3, 'Camión'),
(4, 'Hatchback'),
(5, 'Pickup'),
(6, 'Deportivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vehiculo`
--

CREATE TABLE `vehiculo` (
  `placa` varchar(30) NOT NULL,
  `anio` int(11) NOT NULL,
  `color` varchar(20) NOT NULL,
  `motor` varchar(30) NOT NULL,
  `chasis` int(11) NOT NULL,
  `id_marca` int(11) DEFAULT NULL,
  `id_modelo` int(11) DEFAULT NULL,
  `id_tipo_vehiculo` int(11) DEFAULT NULL,
  `id_propietario` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `vehiculo`
--

INSERT INTO `vehiculo` (`placa`, `anio`, `color`, `motor`, `chasis`, `id_marca`, `id_modelo`, `id_tipo_vehiculo`, `id_propietario`) VALUES
('000000000', 2023, '12331', '555534', 555455, 1, 97, 1, '20-34-33'),
('AA0', 2023, 'Blanco', '4435qw', 234353, NULL, NULL, NULL, '8'),
('AA010', 2014, 'Negro', '4435', 46464, NULL, NULL, NULL, '6'),
('AA01011', 2023, 'rosado', '4435qw', 43874, NULL, NULL, NULL, '7'),
('AA020000', 234, 'negro', 'wwrew', 0, NULL, NULL, NULL, '10'),
('AA030', 2023, 'Blanco', '23521', 43874, NULL, NULL, NULL, '5'),
('AA0311', 2023, 'Negro', '4435qw', 4387424, NULL, NULL, NULL, '9'),
('AA031111', 2023, '12331', '555534', 555455, 1, 97, 1, '20-34-33'),
('AA03111112', 2023, '12331', '555534', 555455, 1, 97, 1, '20-34-33'),
('AA0315', 2022, 'azul', '98982332', 4323, NULL, NULL, NULL, '13'),
('AB456', 2023, 'Blanco', '4435qw', 234353, 1, 97, NULL, '15'),
('abcd', 2015, 'rosado', '4435qw', 4387424, NULL, NULL, NULL, '12'),
('abcdefg', 2024, 'gris', '989uy3', 43874, 4, 103, NULL, '16'),
('DEDO', 2021, 'dorado', '2345', 46464, 1, 98, 2, '17'),
('q111', 123, '12331', '5667', 555455, 3, 101, 1, '12345'),
('qqqq', 123, '12331', '5667', 555455, 3, 101, 1, '12345');


ALTER TABLE `marca`
  ADD PRIMARY KEY (`id_marca`);


ALTER TABLE `modelo`
  ADD PRIMARY KEY (`id_modelo`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_tipo_vehiculo` (`id_tipo_vehiculo`);


ALTER TABLE `propietario`
  ADD PRIMARY KEY (`id_propietario`);


ALTER TABLE `tipovehiculo`
  ADD PRIMARY KEY (`id_tipo_vehiculo`);

ALTER TABLE `vehiculo`
  ADD PRIMARY KEY (`placa`),
  ADD KEY `id_marca` (`id_marca`),
  ADD KEY `id_modelo` (`id_modelo`),
  ADD KEY `id_tipo_vehiculo` (`id_tipo_vehiculo`),
  ADD KEY `fk_id_propietario` (`id_propietario`);

ALTER TABLE `marca`
  MODIFY `id_marca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;


ALTER TABLE `modelo`
  MODIFY `id_modelo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=129;


ALTER TABLE `tipovehiculo`
  MODIFY `id_tipo_vehiculo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

ALTER TABLE `modelo`
  ADD CONSTRAINT `modelo_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `modelo_ibfk_2` FOREIGN KEY (`id_tipo_vehiculo`) REFERENCES `tipovehiculo` (`id_tipo_vehiculo`);

ALTER TABLE `vehiculo`
  ADD CONSTRAINT `fk_id_propietario` FOREIGN KEY (`id_propietario`) REFERENCES `propietario` (`id_propietario`),
  ADD CONSTRAINT `vehiculo_ibfk_1` FOREIGN KEY (`id_marca`) REFERENCES `marca` (`id_marca`),
  ADD CONSTRAINT `vehiculo_ibfk_2` FOREIGN KEY (`id_modelo`) REFERENCES `modelo` (`id_modelo`),
  ADD CONSTRAINT `vehiculo_ibfk_3` FOREIGN KEY (`id_tipo_vehiculo`) REFERENCES `tipovehiculo` (`id_tipo_vehiculo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
