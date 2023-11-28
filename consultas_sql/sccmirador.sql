-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 15:08:18
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `sscmirador`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `datos_inicio` ()   BEGIN

DECLARE totalUsuarios INT;
DECLARE totalProveedores INT;
DECLARE totalProductos INT;
DECLARE totalCategorias INT;
DECLARE totalPedidos INT;

SET totalUsuarios = (SELECT COUNT(*) FROM usuarios);
SET totalProveedores = (SELECT COUNT(*) FROM proveedores);
SET totalProductos = (SELECT COUNT(*) FROM productos);
SET totalCategorias = (SELECT COUNT(*) FROM categorias);
SET totalPedidos = (SELECT COUNT(*) FROM pedidos);

SELECT totalUsuarios AS totalUsuarios, 
	   totalProveedores AS totalProveedores,
       totalProductos AS totalProductos,
       totalCategorias AS totalCategorias,
       totalPedidos AS totalPedidos;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `datos_proveedores` ()   BEGIN

SELECT '' as detalles,
			prov.id_proveedor,
			prov.nombre_proveedor,
            prov.status_proveedor,
        '' as opciones

FROM proveedores prov;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_productos` ()   BEGIN

SELECT 
	p.id_producto,
	p.imagen,
	p.nombre_producto,
	p.cod_interno,
	p.cod_externo,
	c.id_categoria,
	c.nombre_categoria,
	pr.id_proveedor,
    pr.nombre_proveedor,
	p.status_producto,
	"" AS opciones
FROM productos p 
INNER JOIN categorias c ON p.id_categoria = c.id_categoria
INNER JOIN proveedores pr ON p.id_proveedor = pr.id_proveedor; 

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `listar_usuarios` ()   BEGIN

SELECT
	u.id_usuario,
	u.usuario,
    r.id_rol,
    r.rol,
    u.password_usuario,
    u.status_usuario,
	"" AS opciones
FROM usuarios u 
INNER JOIN roles r ON u.id_rol = r.id_rol;

END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `nombre_categoria` text NOT NULL,
  `status_categoria` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `nombre_categoria`, `status_categoria`) VALUES
(1, 'Bombas', 1),
(2, 'Tuberia PVC', 1),
(3, 'Jardinería', 1),
(4, 'Material de Construcción', 1),
(5, 'Tinacos', 1),
(8, 'Soldadura', 0),
(9, 'Pintura', 0),
(10, 'Tornilleria y clavos', 0),
(11, 'Electricidad2', 0),
(12, 'Discos de Corte', 0),
(13, 'Martillos', 0),
(14, 'Cable eléctrico', 0),
(18, 'Categoria Pruebas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modulos`
--

CREATE TABLE `modulos` (
  `id_modulo` int(11) NOT NULL,
  `modulo` varchar(45) NOT NULL,
  `vista` varchar(45) NOT NULL,
  `icon_menu` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `modulos`
--

INSERT INTO `modulos` (`id_modulo`, `modulo`, `vista`, `icon_menu`) VALUES
(1, 'Inicio', 'inicio.php', 'nav-icon fas fa-home'),
(2, 'Usuarios', 'usuarios.php', 'nav-icon fas fa-users'),
(3, 'Proveedores', 'proveedores.php', 'nav-icon fas fa-truck-moving'),
(4, 'Productos', 'productos.php', 'nav-icon fas fa-shopping-bag'),
(5, 'Categorias', 'categorias.php', 'nav-icon fas fa-tags'),
(6, 'Carga de Productos', 'cargaproductos.php', 'nav-icon fas fa-file-upload'),
(7, 'Pedidos', 'pedidos.php', 'nav-icon fas fa-clipboard-list');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id_pedido` int(11) NOT NULL,
  `fecha_pedido` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre_producto` varchar(50) NOT NULL,
  `cod_interno` bigint(20) NOT NULL,
  `cod_externo` varchar(20) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `status_producto` int(11) NOT NULL,
  `imagen` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre_producto`, `cod_interno`, `cod_externo`, `id_categoria`, `id_proveedor`, `status_producto`, `imagen`) VALUES
(2, 'Disco de Corte de Metal', 2147483647, 'DICOF-T', 12, 2, 1, 'abc'),
(4, 'Pala Cuadrada Truper', 2147483647, 'PA-CUT', 11, 2, 1, 'abc'),
(5, 'Zapapico', 7500000045, 'ZA-PI5', 4, 2, 1, 'abc'),
(10, 'Pala Cuadrada Truper', 2147483647, 'PA-CUT', 4, 2, 0, NULL),
(37, 'Cople PVC C-40 2\" ', 2147483647, 'PVC-561', 2, 2, 0, NULL),
(38, 'Cople PVC C-40 1\"', 2147483647, 'PVC-563', 2, 2, 0, NULL),
(39, 'Codo PVC C-40 1 1/2\"', 750000049, 'PVC-845', 2, 2, 0, NULL),
(40, 'Soldadura 6013 1/8', 750000048, 'SOL6013-1/8', 8, 2, 0, NULL),
(41, 'Soldadura 7018 3/32', 750000047, 'SOL-7018-3/32', 8, 2, 0, NULL),
(42, 'Tee PVC C-40 1/2\"', 750000010000, 'PVC-245', 2, 2, 0, NULL),
(43, 'Tee PVC C-40 2\"', 214748362, 'PVC-635', 2, 2, 0, NULL),
(44, 'Pintura Aerosol Verde Lima', 750000000078, 'PA-VL', 9, 2, 0, NULL),
(45, 'Tee PVC C-40 2 1/2', 75000004585, 'PVC-754', 2, 2, 0, NULL),
(46, 'Pintura Aerosol Amarillo', 750000000002, 'PA-AM', 9, 2, 1, 'abc'),
(47, 'Pintura Aerosol Azul', 750000000003, 'PA-AZ', 9, 2, 1, 'abc'),
(48, 'Pintura Aerosol Azul Cielo', 750000000004, 'PA-AC', 9, 2, 1, 'abc'),
(49, 'Pintura Aerosol Verde', 750000000004, 'PA-VE', 9, 2, 1, 'abc'),
(50, 'Pintura Aerosol Negro', 750000000006, 'PA-NE', 9, 2, 1, 'abc'),
(51, 'Pintura Aerosol Rosa', 750000000007, 'PA-RO', 9, 2, 1, 'abc'),
(52, 'Pintura Aerosol Blanco', 750000000008, 'PA-BA', 9, 2, 1, 'abc'),
(53, 'Pintura Aerosol Gris', 750000000009, 'PA-GR', 9, 2, 1, 'abc');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id_proveedor` int(11) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `status_proveedor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id_proveedor`, `nombre_proveedor`, `status_proveedor`) VALUES
(2, 'Truper', 1),
(3, 'Abastecedora de Soldadura y Herrajes', 1),
(4, 'Aceros Nacionales', 1),
(5, 'Anbec', 1),
(6, 'Proveedora Industrial de Myt', 0),
(7, 'Ferreaceros', 0),
(10, 'Proveedor Pruebas', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(15) NOT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`, `estado`) VALUES
(1, 'Administrador', 1),
(2, 'Operador', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_modulo`
--

CREATE TABLE `rol_modulo` (
  `id_rolmodulo` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `id_modulo` int(11) NOT NULL,
  `vista_modulo` tinyint(4) DEFAULT NULL,
  `estado` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol_modulo`
--

INSERT INTO `rol_modulo` (`id_rolmodulo`, `id_rol`, `id_modulo`, `vista_modulo`, `estado`) VALUES
(1, 1, 1, 1, 1),
(2, 1, 2, NULL, 1),
(3, 1, 3, NULL, 1),
(4, 1, 4, NULL, 1),
(5, 1, 5, NULL, 1),
(6, 1, 6, NULL, 1),
(7, 1, 7, NULL, 1),
(8, 2, 1, 1, 1),
(9, 2, 3, NULL, 1),
(10, 2, 4, NULL, 1),
(11, 2, 5, NULL, 1),
(12, 2, 6, NULL, 1),
(13, 2, 7, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `status_usuario` tinyint(1) NOT NULL,
  `password_usuario` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `usuario`, `id_rol`, `status_usuario`, `password_usuario`) VALUES
(3, 'Admin', 1, 1, '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq'),
(5, 'Operador', 2, 1, '$2a$07$azybxcags23425sdg23sdeanQZqjaf6Birm2NvcYTNtJw24CsO5uq');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indices de la tabla `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id_modulo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `id_proveedor` (`id_proveedor`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `rol_modulo`
--
ALTER TABLE `rol_modulo`
  ADD PRIMARY KEY (`id_rolmodulo`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_modulo` (`id_modulo`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id_modulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `rol_modulo`
--
ALTER TABLE `rol_modulo`
  MODIFY `id_rolmodulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedores` (`id_proveedor`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`);

--
-- Filtros para la tabla `rol_modulo`
--
ALTER TABLE `rol_modulo`
  ADD CONSTRAINT `rol_modulo_ibfk_2` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`),
  ADD CONSTRAINT `rol_modulo_ibfk_3` FOREIGN KEY (`id_modulo`) REFERENCES `modulos` (`id_modulo`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `roles` (`id_rol`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
