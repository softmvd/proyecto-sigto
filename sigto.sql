-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2024 at 11:03 PM
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
  `id_usuario` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cuentacliente`
--

INSERT INTO `cuentacliente` (`id_cuenta`, `telefono`, `genero`, `fechaNac`, `preferenciasComunicacion`, `fecha_registro`, `id_usuario`) VALUES
(1, '123456789', 'M', '1990-05-15', 'Email', '2024-10-26 22:52:15', 1),
(2, '987654321', 'F', '1985-10-10', 'SMS', '2024-10-26 22:52:15', 2),
(3, '456789123', 'M', '2000-01-01', 'Email', '2024-10-26 22:52:15', 3),
(4, '321654987', 'F', '1992-08-21', 'Llamada', '2024-10-26 22:52:15', 4),
(5, '159753468', 'M', '1995-12-10', 'Email', '2024-10-26 22:52:15', 5),
(6, '753159246', 'F', '1980-03-15', 'SMS', '2024-10-26 22:52:15', 6),
(7, '951753426', 'M', '1998-06-23', 'Llamada', '2024-10-26 22:52:15', 7),
(8, '789654123', 'F', '1993-11-25', 'Email', '2024-10-26 22:52:15', 8),
(9, '369258147', 'M', '1989-07-30', 'SMS', '2024-10-26 22:52:15', 9),
(10, '258369741', 'F', '1991-09-10', 'Email', '2024-10-26 22:52:15', 10);

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

--
-- Dumping data for table `cuentaempresa`
--

INSERT INTO `cuentaempresa` (`id_cuenta`, `telefono`, `direccion`, `id_usuario`, `fecha_registro`) VALUES
(1, '123456789', 'Calle Falsa 123, Ciudad A', 1, '2024-10-26 22:52:15'),
(2, '987654321', 'Avenida Siempre Viva 456, Ciudad B', 2, '2024-10-26 22:52:15'),
(3, '456789123', 'Calle Mayor 789, Ciudad C', 3, '2024-10-26 22:52:15'),
(4, '321654987', 'Calle Real 111, Ciudad D', 4, '2024-10-26 22:52:15'),
(5, '159753468', 'Calle Principal 222, Ciudad E', 5, '2024-10-26 22:52:15'),
(6, '753159246', 'Boulevard Norte 333, Ciudad F', 6, '2024-10-26 22:52:15'),
(7, '951753426', 'Avenida Central 444, Ciudad G', 7, '2024-10-26 22:52:15'),
(8, '789654123', 'Calle Sur 555, Ciudad H', 8, '2024-10-26 22:52:15'),
(9, '369258147', 'Avenida del Parque 666, Ciudad I', 9, '2024-10-26 22:52:15'),
(10, '258369741', 'Calle Sol 777, Ciudad J', 10, '2024-10-26 22:52:15');

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
  `direccionPrincipal` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `direccionenvio`
--

INSERT INTO `direccionenvio` (`id_direccion`, `direccion`, `ciudad`, `provincia`, `codigoPostal`, `pais`, `direccionPrincipal`) VALUES
(1, 'Calle Libertad 100', 'Ciudad A', 'Provincia A', '1000', 'Pais A', 1),
(2, 'Avenida Independencia 200', 'Ciudad B', 'Provincia B', '2000', 'Pais B', 1),
(3, 'Calle Central 300', 'Ciudad C', 'Provincia C', '3000', 'Pais C', 1),
(4, 'Boulevard Sur 400', 'Ciudad D', 'Provincia D', '4000', 'Pais D', 1),
(5, 'Avenida Norte 500', 'Ciudad E', 'Provincia E', '5000', 'Pais E', 1),
(6, 'Calle Este 600', 'Ciudad F', 'Provincia F', '6000', 'Pais F', 1),
(7, 'Avenida Oeste 700', 'Ciudad G', 'Provincia G', '7000', 'Pais G', 1),
(8, 'Calle del Sol 800', 'Ciudad H', 'Provincia H', '8000', 'Pais H', 1),
(9, 'Avenida Luna 900', 'Ciudad I', 'Provincia I', '9000', 'Pais I', 1),
(10, 'Calle Estrella 1000', 'Ciudad J', 'Provincia J', '10000', 'Pais J', 1);

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

--
-- Dumping data for table `metodopago`
--

INSERT INTO `metodopago` (`id_metodo_pago`, `tipo_pago`, `detalles_pago`, `fecha_expiracion`, `predeterminado`) VALUES
(1, 'Visa', '1234-5678-9876-5432', '12/25', 1),
(2, 'MasterCard', '9876-5432-1234-5678', '08/24', 0),
(3, 'Amex', '1111-2222-3333-4444', '11/23', 1),
(4, 'Diners', '5555-6666-7777-8888', '10/24', 0),
(5, 'Discover', '9999-0000-1111-2222', '09/26', 1),
(6, 'Maestro', '3333-4444-5555-6666', '07/27', 0),
(7, 'UnionPay', '2222-3333-4444-5555', '06/28', 1),
(8, 'JCB', '6666-7777-8888-9999', '05/29', 0),
(9, 'Interbank', '4444-5555-6666-7777', '04/30', 1),
(10, 'MasterCard', '8888-9999-0000-1111', '03/31', 0);

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
(2, 'Camiseta Blanca', 'Camiseta de algodón 100% para hombres', 19.99, NULL, 100, 'SKU67890', 'camiseta.jpg', '', 0.30, 'Mediano', '30x20x1', '2024-10-26 22:52:15', 'ACTIVO', 'NUEVO', 5.00, 2, 2),
(3, 'Mesa de Madera', 'Mesa de comedor de madera natural', 299.99, NULL, 20, 'SKU54321', 'mesa.jpg', '', 30.00, 'Grande', '150x90x75', '2024-10-26 22:52:15', 'ACTIVO', 'NUEVO', 0.00, 3, 3),
(4, 'Laptop Pro', 'Laptop de alto rendimiento', 999.99, NULL, 30, 'SKU00001', 'laptop.jpg', '', 1.50, 'Mediano', '35x24x2', '2024-10-26 22:52:15', 'ACTIVO', 'NUEVO', 15.00, 1, 1),
(5, 'Raqueta Tenis', 'Raqueta de tenis profesional', 199.99, NULL, 15, 'SKU00002', 'raqueta.jpg', '', 0.40, 'Grande', '27x10x1', '2024-10-26 22:52:15', 'ACTIVO', 'NUEVO', 10.00, 4, 4);

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
(1, 'Santiago', 'Torrens', 'santiago@gmail.com', 'clave123'),
(2, 'Maria', 'Lopez', 'maria.lopez@gmail.com', 'clave456'),
(3, 'Carlos', 'Martinez', 'carlos.m@gmail.com', 'clave789'),
(4, 'Ana', 'Gomez', 'ana.gomez@gmail.com', 'clave101'),
(5, 'Luis', 'Perez', 'luis.perez@gmail.com', 'clave102'),
(6, 'Laura', 'Suarez', 'laura.suarez@gmail.com', 'clave103'),
(7, 'Juan', 'Diaz', 'juan.diaz@gmail.com', 'clave104'),
(8, 'Patricia', 'Mejia', 'patricia.m@gmail.com', 'clave105'),
(9, 'Jorge', 'Rojas', 'jorge.rojas@gmail.com', 'clave106'),
(10, 'Sandra', 'Jimenez', 'sandra.j@gmail.com', 'clave107');

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
(1, 'TechStore', 'techstore@empresa.com', 'empresa123'),
(2, 'FashionWorld', 'fashion@empresa.com', 'empresa456'),
(3, 'HomeEssentials', 'home@empresa.com', 'empresa789'),
(4, 'GreenGarden', 'green.garden@empresa.com', 'empresa010'),
(5, 'AutoParts', 'autoparts@empresa.com', 'empresa011'),
(6, 'BookMania', 'bookmania@empresa.com', 'empresa012'),
(7, 'ElectroHouse', 'electrohouse@empresa.com', 'empresa013'),
(8, 'PetCare', 'petcare@empresa.com', 'empresa014'),
(9, 'ToyFactory', 'toyfactory@empresa.com', 'empresa015'),
(10, 'DigitalDreams', 'digitaldreams@empresa.com', 'empresa016');

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
  ADD PRIMARY KEY (`id_direccion`);

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
  MODIFY `id_cuenta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `usuariocliente`
--
ALTER TABLE `usuariocliente`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `usuarioempresa`
--
ALTER TABLE `usuarioempresa`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

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
  ADD CONSTRAINT `direccionenvio_ibfk_1` FOREIGN KEY (`id_direccion`) REFERENCES `usuariocliente` (`id_usuario`);

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
