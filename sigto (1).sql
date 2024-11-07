-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2024 at 12:57 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sigto`
--

-- --------------------------------------------------------

--
-- Table structure for table `carritocompras`
--

CREATE TABLE `carritocompras` (
  `id_carrito` int(11) NOT NULL,
  `cantidad` int(11) DEFAULT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombreCategoria` varchar(100) NOT NULL,
  `descripcionCategoria` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombreCategoria`, `descripcionCategoria`) VALUES
(1, 'Electrónica', 'Dispositivos electrónicos como móviles, tablets y ordenadores.'),
(2, 'Ropa', 'Ropa de moda para hombres y mujeres.'),
(3, 'Hogar', 'Artículos y accesorios para el hogar.'),
(4, 'Deportes', 'Equipamiento y ropa deportiva.'),
(5, 'Juguetes', 'Juguetes para niños de todas las edades.'),
(6, 'Automóvil', 'Accesorios y repuestos para automóviles.'),
(7, 'Libros', 'Libros de diversos géneros y autores.'),
(8, 'Jardinería', 'Herramientas y accesorios para jardín.'),
(9, 'Mascotas', 'Productos para el cuidado de mascotas.'),
(10, 'Electrodomésticos', 'Electrodomésticos para el hogar.');

-- --------------------------------------------------------

--
-- Table structure for table `cuentacliente`
--

CREATE TABLE `cuentacliente` (
  `id_cuenta` int(11) NOT NULL,
  `telefono` varchar(65) DEFAULT NULL,
  `genero` char(1) DEFAULT NULL,
  `fechaNac` varchar(10) DEFAULT NULL,
  `preferenciasComunicacion` varchar(100) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) DEFAULT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuentacliente`
--

INSERT INTO `cuentacliente` (`id_cuenta`, `telefono`, `genero`, `fechaNac`, `preferenciasComunicacion`, `fecha_registro`, `id_usuario`, `imagen`) VALUES
(13, NULL, NULL, NULL, NULL, '2024-11-02 20:24:50', 30, ''),
(14, NULL, NULL, NULL, NULL, '2024-11-02 21:16:59', 31, ''),
(15, '098547899', 'M', '1992-02-23', NULL, '2024-11-03 19:28:26', 32, 'img_6727ceda9c3917.73351621.png'),
(17, '0966666', 'M', '1997-05-25', NULL, '2024-11-06 02:25:43', 33, 'img_672ad3a71f1331.86568084.png');

-- --------------------------------------------------------

--
-- Table structure for table `cuentaempresa`
--

CREATE TABLE `cuentaempresa` (
  `id_cuenta` int(11) NOT NULL,
  `telefono` varchar(65) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `direccionenvio`
--

CREATE TABLE `direccionenvio` (
  `id_direccion` int(11) NOT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `provincia` varchar(100) DEFAULT NULL,
  `codigoPostal` varchar(20) DEFAULT NULL,
  `pais` varchar(50) DEFAULT NULL,
  `direccionPrincipal` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `direccionenvio`
--

INSERT INTO `direccionenvio` (`id_direccion`, `direccion`, `ciudad`, `provincia`, `codigoPostal`, `pais`, `direccionPrincipal`, `id_usuario`) VALUES
(6, 'Senen Rodriguez 4883 Esq Lord Byron', 'Montevideo', 'Montevideo', '12000', 'Uruguay', 1, 32);

-- --------------------------------------------------------

--
-- Table structure for table `historialbusqueda`
--

CREATE TABLE `historialbusqueda` (
  `id_producto` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `historialcompra`
--

CREATE TABLE `historialcompra` (
  `id_pedido` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `metodopago`
--

CREATE TABLE `metodopago` (
  `id_metodo_pago` int(11) NOT NULL,
  `tipo_pago` varchar(40) DEFAULT NULL,
  `detalles_pago` varchar(40) DEFAULT NULL,
  `fecha_expiracion` varchar(10) DEFAULT NULL,
  `predeterminado` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `notificaciones`
--

CREATE TABLE `notificaciones` (
  `id_notificacion` int(11) NOT NULL,
  `tipo_notificacion` enum('Descuentos','Actualizacion de pedido') DEFAULT NULL,
  `fecha_envio` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `leido` tinyint(1) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `opinionesproductos`
--

CREATE TABLE `opinionesproductos` (
  `id_opinion` int(11) NOT NULL,
  `calificacion` int(11) DEFAULT NULL,
  `opinion` varchar(255) DEFAULT NULL,
  `fechaOpinion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) DEFAULT NULL,
  `id_producto` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `fecha_pedido` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `totalPagar` varchar(8) DEFAULT NULL,
  `estado_pedido` enum('En Proceso','Enviado','Entregado') DEFAULT NULL,
  `id_carrito` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  `marca` varchar(100) DEFAULT NULL,
  `stock` int(11) DEFAULT NULL CHECK (`stock` >= 0),
  `codigo_sku` varchar(100) DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL,
  `email_vendedor` varchar(64) NOT NULL,
  `peso` decimal(5,2) DEFAULT NULL,
  `tamaño` enum('Chico','Mediano','Grande') DEFAULT NULL,
  `dimensiones` varchar(120) DEFAULT NULL,
  `fecha_agregado` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `disponibilidad` enum('ACTIVO','INACTIVO') DEFAULT NULL,
  `estado_producto` enum('NUEVO','USADO') DEFAULT NULL,
  `descuento` decimal(5,2) DEFAULT NULL,
  `id_cuenta` int(11) DEFAULT NULL,
  `id_categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `descripcion`, `precio`, `marca`, `stock`, `codigo_sku`, `imagen`, `email_vendedor`, `peso`, `tamaño`, `dimensiones`, `fecha_agregado`, `disponibilidad`, `estado_producto`, `descuento`, `id_cuenta`, `id_categoria`) VALUES
(9, 'ADIDAS RUNNING', 'Championes para deporte', 100.00, 'ADIDAS', 12, NULL, 'img_6723ffc4420230.38388050.jpg', 'Lacasadeldeporte@gmail.com', NULL, NULL, NULL, '2024-10-31 22:08:04', 'ACTIVO', NULL, NULL, NULL, NULL),
(11, 'Bicicleta electrica', 'Biciclete electrica 20kw', 999.00, 'Go-Bike', 5, NULL, 'img_67240624c6d043.50902746.jpg', 'TodoTecno@gmail.com', NULL, NULL, NULL, '2024-10-31 22:35:16', '', NULL, NULL, NULL, NULL),
(13, 'CUBIERTOS', 'Set 11cubiertos', 15.00, 'tramontina', 12, NULL, 'img_67255674523385.15520712.jpeg', 'TodoTecno@gmail.com', NULL, NULL, NULL, '2024-11-01 22:30:12', 'ACTIVO', NULL, NULL, NULL, NULL),
(15, 'CELULAR', 'Telefono Apple 12 pro max 128 gb', 899.00, 'APPLE', 10, NULL, 'img_67256eda025197.15047060.jpg', 'TodoTecno@gmail.com', NULL, NULL, NULL, '2024-11-02 00:14:18', 'ACTIVO', NULL, NULL, NULL, NULL),
(16, 'Taza', 'Taza para cafe 10cm', 50.00, 'Tacita', 1, NULL, 'img_672698b22f7c10.41039665.jpg', 'TodoTecno@gmail.com', NULL, NULL, NULL, '2024-11-02 21:25:06', 'ACTIVO', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuariocliente`
--

CREATE TABLE `usuariocliente` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(35) DEFAULT NULL,
  `apellido` varchar(35) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuariocliente`
--

INSERT INTO `usuariocliente` (`id_usuario`, `nombre`, `apellido`, `email`, `clave`) VALUES
(30, 'mate', 'yerba', 'mate@gmail.com', '$2y$10$kgdiaOBhS5rHk3eZSmBT7uhdCDuOvzbd8h/Y47wcwnAPUJr2KSQcG'),
(31, 'juan', 'ks', 'jk@gmail.com', '$2y$10$yr5ky58RHDATlTomMrp7Qe5.6OBAbQlXOMNrRyZPJBXiREVfnZx46'),
(32, 'Santiago ', 'Santiago Torrens', 'stc.enprend@gmail.com', '$2y$10$QprHYvW3w0aW9dAIgzQwGuYwWSPi.NHbYn6lJcUffSVYvqLlcYvGK'),
(33, 'Mauricio', 'MAU', 'Mauricio@gmail.com', '$2y$10$ip/mnpPlgkeA4zNz5KKXgOawX.F4QtwslFG4ukyJVgjw6/qFFbcti');

-- --------------------------------------------------------

--
-- Table structure for table `usuarioempresa`
--

CREATE TABLE `usuarioempresa` (
  `id_usuario` int(11) NOT NULL,
  `nombreEmpresa` varchar(100) DEFAULT NULL,
  `email` varchar(45) NOT NULL,
  `clave` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarioempresa`
--

INSERT INTO `usuarioempresa` (`id_usuario`, `nombreEmpresa`, `email`, `clave`) VALUES
(13, 'TodoTecno', 'TodoTecno@gmail.com', '$2y$10$z1jC786OdmjA1erBl3CmrOIS9UgV/lQgueCxm/XdnZmIWczaBwV/i');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `carritocompras`
--
ALTER TABLE `carritocompras`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD UNIQUE KEY `nombreCategoria` (`nombreCategoria`);

--
-- Indexes for table `cuentacliente`
--
ALTER TABLE `cuentacliente`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `cuentaempresa`
--
ALTER TABLE `cuentaempresa`
  ADD PRIMARY KEY (`id_cuenta`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `direccionenvio`
--
ALTER TABLE `direccionenvio`
  ADD PRIMARY KEY (`id_direccion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `historialbusqueda`
--
ALTER TABLE `historialbusqueda`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `historialcompra`
--
ALTER TABLE `historialcompra`
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_pedido` (`id_pedido`);

--
-- Indexes for table `metodopago`
--
ALTER TABLE `metodopago`
  ADD PRIMARY KEY (`id_metodo_pago`);

--
-- Indexes for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `opinionesproductos`
--
ALTER TABLE `opinionesproductos`
  ADD PRIMARY KEY (`id_opinion`),
  ADD KEY `id_usuario` (`id_usuario`),
  ADD KEY `id_producto` (`id_producto`);

--
-- Indexes for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_carrito` (`id_carrito`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_cuenta` (`id_cuenta`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `usuariocliente`
--
ALTER TABLE `usuariocliente`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usuarioempresa`
--
ALTER TABLE `usuarioempresa`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `carritocompras`
--
ALTER TABLE `carritocompras`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `cuentacliente`
--
ALTER TABLE `cuentacliente`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `cuentaempresa`
--
ALTER TABLE `cuentaempresa`
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `direccionenvio`
--
ALTER TABLE `direccionenvio`
  MODIFY `id_direccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `metodopago`
--
ALTER TABLE `metodopago`
  MODIFY `id_metodo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `notificaciones`
--
ALTER TABLE `notificaciones`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `opinionesproductos`
--
ALTER TABLE `opinionesproductos`
  MODIFY `id_opinion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `usuariocliente`
--
ALTER TABLE `usuariocliente`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `usuarioempresa`
--
ALTER TABLE `usuarioempresa`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `carritocompras`
--
ALTER TABLE `carritocompras`
  ADD CONSTRAINT `carritocompras_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuariocliente` (`id_usuario`),
  ADD CONSTRAINT `carritocompras_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `cuentacliente`
--
ALTER TABLE `cuentacliente`
  ADD CONSTRAINT `cuentacliente_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuariocliente` (`id_usuario`);

--
-- Constraints for table `cuentaempresa`
--
ALTER TABLE `cuentaempresa`
  ADD CONSTRAINT `cuentaempresa_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuarioempresa` (`id_usuario`);

--
-- Constraints for table `direccionenvio`
--
ALTER TABLE `direccionenvio`
  ADD CONSTRAINT `direccionenvio_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuariocliente` (`id_usuario`) ON DELETE CASCADE;

--
-- Constraints for table `historialbusqueda`
--
ALTER TABLE `historialbusqueda`
  ADD CONSTRAINT `historialbusqueda_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuariocliente` (`id_usuario`),
  ADD CONSTRAINT `historialbusqueda_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `historialcompra`
--
ALTER TABLE `historialcompra`
  ADD CONSTRAINT `historialcompra_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuariocliente` (`id_usuario`),
  ADD CONSTRAINT `historialcompra_ibfk_2` FOREIGN KEY (`id_pedido`) REFERENCES `pedidos` (`id_pedido`);

--
-- Constraints for table `metodopago`
--
ALTER TABLE `metodopago`
  ADD CONSTRAINT `metodopago_ibfk_1` FOREIGN KEY (`id_metodo_pago`) REFERENCES `usuariocliente` (`id_usuario`);

--
-- Constraints for table `notificaciones`
--
ALTER TABLE `notificaciones`
  ADD CONSTRAINT `notificaciones_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuariocliente` (`id_usuario`);

--
-- Constraints for table `opinionesproductos`
--
ALTER TABLE `opinionesproductos`
  ADD CONSTRAINT `opinionesproductos_ibfk_1` FOREIGN KEY (`id_usuario`) REFERENCES `usuariocliente` (`id_usuario`),
  ADD CONSTRAINT `opinionesproductos_ibfk_2` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`);

--
-- Constraints for table `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_ibfk_1` FOREIGN KEY (`id_carrito`) REFERENCES `carritocompras` (`id_carrito`),
  ADD CONSTRAINT `pedidos_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuariocliente` (`id_usuario`);

--
-- Constraints for table `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_cuenta`) REFERENCES `cuentaempresa` (`id_cuenta`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
