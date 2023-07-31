-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2023 a las 21:05:48
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webzebra`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `idPedido` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idProducto` int(11) NOT NULL,
  `FechaPedido` datetime NOT NULL,
  `estado` int(11) NOT NULL,
  `dirPedido` varchar(100) NOT NULL,
  `telPedido` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`idPedido`, `idUsuario`, `idProducto`, `FechaPedido`, `estado`, `dirPedido`, `telPedido`) VALUES
(24, 1, 20, '2023-07-04 10:16:29', 3, 'Calle deanda', '123'),
(25, 1, 19, '2023-07-04 10:16:33', 2, 'Calle deanda', '123'),
(27, 1, 35, '2023-07-17 11:59:31', 3, 'Pugberto norbert', '123'),
(28, 1, 19, '2023-07-17 11:59:40', 3, 'Pugberto norbert', '123'),
(29, 1, 40, '2023-07-17 11:59:47', 3, 'Pugberto norbert', '123'),
(30, 1, 2, '2023-07-20 10:45:25', 2, 'Shi ', '123'),
(31, 1, 2, '2023-07-20 10:45:31', 2, 'Shi ', '123'),
(32, 1, 1, '2023-07-20 10:46:03', 2, 'Shi ', '123'),
(33, 1, 1, '2023-07-20 10:48:02', 2, 'Shi ', '123'),
(34, 1, 1, '2023-07-20 10:48:06', 2, 'Shi ', '123'),
(35, 1, 1, '2023-07-20 10:48:08', 2, 'Shi ', '123'),
(36, 1, 3, '2023-07-20 10:50:29', 2, 'Shi ', '123'),
(37, 1, 20, '2023-07-20 10:51:31', 2, 'Shi ', '123'),
(38, 1, 36, '2023-07-20 10:51:37', 2, 'Shi ', '123'),
(39, 1, 35, '2023-07-20 10:51:43', 3, 'Shi ', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `idProducto` int(11) NOT NULL,
  `nomProducto` varchar(40) NOT NULL,
  `desProducto` varchar(100) NOT NULL,
  `preProducto` decimal(10,2) NOT NULL,
  `estado` int(11) NOT NULL,
  `imgProducto` varchar(100) DEFAULT NULL,
  `tipoProducto` int(11) NOT NULL,
  `desLProducto` varchar(400) NOT NULL,
  `featured` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`idProducto`, `nomProducto`, `desProducto`, `preProducto`, `estado`, `imgProducto`, `tipoProducto`, `desLProducto`, `featured`) VALUES
(19, 'Zebra ZT411 - Impresora Industrial', 'Recomendada para imprimir 3000 etiquetas por día', '41800.00', 1, '20230703203502.webp', 1, 'Ideal para la recolección de órdenes, envíos y operaciones diarias, armazón de metal reforzado con pantalla táctil de 4.3', 0),
(20, 'Zebra ZT421 - Impresora Industrial', 'Caballo de batalla Zebra veloz imprime hasta 12', '73040.00', 1, '20230703203643.webp', 1, 'Con una impresion de hasta 6 pulgadas de ancho, es una equipo poderoso que integra una pantalla LCD tactil, lo que le permitira operarla de manera sencilla e intuitiva. Adicionalmente integra multiples opciones de conectividad para que pueda elegir entre Serial, Paralelo, Wi-Fi, Bluetooth y Ethernet. ', 1),
(21, 'Zebra ZT510 - Impresora Industrial', 'Impresora de uso pesado, diseñada para uso 24/7.', '50138.00', 1, '20230703203917.webp', 1, 'Todos sus componentes internos y externos son de metal, la memoria mejorada procesa sus gráficos más complejos e imprime sus etiquetas más que super rápido, 512MB RAM/2GB Flash, interfaz USB, Serie, Ethernet y Bluetooth® LE.\n', 1),
(22, 'Zebra ZT610 - Impresora Industrial', 'La nueva generación de Zebra para usarse 24/7.', '68618.00', 1, '20230703204224.webp', 1, 'Satisface las necesidad de alto volumen con una gran calidad de impresión, memoria 8 veces mayor para imprimir gráficos complejos rápidamente, 1GB RAM/2GB Flash, armazón de metal reforzado con pantalla a todo color, interfaz USB, Serie, Ethernet y Bluetooth® LE.\n', 0),
(23, 'Zebra ZD 411 - Impresora de Escritorio', 'Económica para crear etiquetas para envíos o inventario.', '9504.00', 1, '20230703211016.webp', 1, 'Calidad de impresión 203 dpi, velocidad de impresión de 6 pulgadas/seg. impresión máxima de ancho x largo (pulgadas) 2.20 x 39, Memoria: 256MB SDRAM/512MB Flash, interfaz USB', 1),
(24, 'Zebra ZD 421D - Impresora de Escritorio', 'Diseño eficiente evita que se atoren las etiquetas.', '13200.00', 1, '20230703213903.webp', 1, 'Calidad de impresión 203 dpi, velocidad de impresión de 6 pulgadas/seg. impresión máxima de ancho x largo(pulgadas) 4.09 x 39, Memoria: 256MB SDRAM/512MB Flash, interfaz USB/Bluetooth® LE', 1),
(25, 'Zebra ZD 621D - Impresora de Escritorio', 'Impresión de etiquetas pequeñas de alta resolución.', '15576.00', 1, '20230705193646.webp', 1, 'Calidad de impresión 203 dpi, velocidad de impresión de 8 pulgadas/seg. impresión máxima de ancho x largo(pulgadas) 4.09 x 39, Memoria: 256MB SDRAM/512MB Flash, interfaz: Serie, USB, Bluetooth y Ethernet', 0),
(26, 'Zebra ZD 421T - Impresora de Escritorio', 'Imprima etiquetas de transferencia térmica y directas.', '15312.00', 1, '20230705194010.webp', 1, 'Calidad de impresión 203 dpi, velocidad de impresión de 6 pulgadas/seg. impresión máxima de ancho x largo(pulgadas) 4.09 x 39, Memoria: 256MB SDRAM/512MB Flash, interfaz: USB / Bluetooth®LE', 1),
(27, 'Zebra ZD 621T - Impresora de Escritorio', 'Imprime códigos de barra 2D, incluyendo códigos QR', '17160.00', 1, '20230705194301.webp', 1, 'Calidad de impresión 203 dpi, velocidad de impresión de 8 pulgadas/seg. impresión máxima de ancho x largo(pulgadas) 4.09 x 39	, Memoria: 256MB SDRAM/512MB Flash, interfaz: Serie, USB, Bluetooth®y Ethernet', 0),
(28, 'Zebra ZQ 620 - Impresoras portátiles', 'Imprima etiquetas al instante en almacene y departamentos de envíos', '36300.00', 1, '20230705194931.webp', 1, 'Recomendadas hasta por 250 etiquetas por día. Imprime etiquetas de hasta 3 pulgadas de ancho. Batería de iones de litio recargable incluida.', 0),
(29, 'Zebra ZQ 630 - Impresoras portátiles	', ' Optimice la producción de etiquetas en tiempo real en almacenes y oficinas ', '40700.00', 1, '20230705195427.webp', 1, 'Totalmente inalámbrica con conexiones de WiFi y Bluetooth®. Imprime etiquetas de hasta 4 pulgadas. Batería de iones de litio recargable incluida.', 0),
(30, 'Zebra ZQ 511 - Impresoras portátiles', 'Imprima recibos, facturas y boletos al momento.', '21912.00', 1, '20230705195856.webp', 1, 'Diseño resistente. Imprime etiquetas de hasta de 3\" de ancho. Totalmente inalámbrica con conexiones de WiFi y Bluetooth®. Batería de iones de litio recargable incluida.\r\n', 1),
(31, 'Zebra Symbol LS2208 - Escáneres de cable', 'Escanee rápidamente etiquetas para envíos y productos.', '4466.00', 1, '20230705201810.webp', 4, 'Recomendado para usos industriales ligeros o de menudeo. Siempre está encendido. No requiere baterías o recargas. Incluye soporte y cable USB.\n', 1),
(32, 'Zebra DS8108 - Escáneres de cable', 'Escanea etiquetas de código de barras tradicionales (1D) y con gráficos (2D)', '11594.00', 1, '20230705202117.webp', 4, 'Coordine procesos de envíos y recepción de materiales capturando toda la información. Incluye cable recto USB de 7 pies.\n', 0),
(33, 'Zebra LI3678 - Escáner Inalámbrico', 'Escáner resistente para áreas de envíos y almacenes, para códigos 1D', '25322.00', 1, '20230705202512.webp', 4, 'Para usar en almacenes y aplicaciones industriales.\nLee códigos de barras sucios y dañados.\nCompatible con Bluetooth.\nIncluye base, batería, cable adaptador para cargador y cable USB.\n', 0),
(34, 'Zebra DS8178 - Escáner Inalámbrico ', 'Escanea etiquetas de código de barras tradicionales (1D) y con gráficos (2D).', '26378.00', 1, '20230705203030.webp', 4, 'Coordine procesos de envíos y recepción de materiales capturando toda la información. Función inalámbrica conveniente. Incluye base, fuente de alimentación y cable USB.\n', 0),
(35, 'Bartender Profesional 2022 ', 'Combine rápidamente códigos de barras, texto y gráficos.', '18876.00', 1, '20230705203634.webp', 6, 'Imprime etiquetas para envíos, conformidad o inventario y etiquetas para repisas. Versión para 1 usuario, 1 impresora.', 0),
(36, 'Zebra ET40 - Tableta Empresarial Resiste', 'Mini tableta con pantalla de 8 pulgadas y S.O. Android 11.', '14179.00', 1, '20230711195831.webp', 3, 'Memoria interna: 4 GB, Resolución de la pantalla: 1280 x 800 Pixeles\nDiagonal de la pantalla: 20.3 cm (8', 0),
(37, 'Zebra ET80 - Tableta resistente 2 en 1', 'Permitirán llevar a cabo las actividades indispensables ', '74422.00', 1, '20230711200427.webp', 3, ' Esta nueva línea soporta avanzadas opciones de conectividad desde WIFI 6E, 4G/5G y mas lo que permitirá a sus empleados estar conectados en todo momento y en lugar que lo necesiten para acceder los datos críticos de procesos de negocio e información. ', 0),
(38, 'Zebra XPAD L10 - Tableta industrial', 'Una plataforma de tabletas versátil y completamente resistente', '28404.00', 1, '20230711200807.webp', 3, 'La plataforma resistente L10 de Zebra ofrece una variedad de configuraciones de tableta y un ecosistema de accesorios compartido que definen el nivel de las operaciones informáticas en oficinas, vehículos y exteriores.', 0),
(39, 'Zebra TC21 - Computadora móvil', 'Diseñada para empresas pequeñas y grandes a un buen costo', '13029.00', 1, '20230713214900.webp', 2, 'Memoria interna: 3 GB, Tarjetas de memoria: MicroSD(TransFlash),MicroSDHC,MicroSDXC, Resolución de la pantalla: 1280 x 720 Pixeles, Diagonal de la pantalla: 12.7 cm (5 pulgadas), Pantalla táctil: Si, Familia de procesador: Snapdragon, Bluetooth: Si , Wifi: Si\r\n', 0),
(40, 'Zebra TC15 - Computadora móvil', 'Computadora con productividad en la palma de tu mano', '11440.00', 1, '20230713215226.webp', 2, 'Memoria RAM: 4 GB, Sistema Operativo Instalado: Android, Resolución de la pantalla: 720 x 1600 Pixeles, Tamaño de pantalla: 16.5 cm (6.5 pulgadas), Procesador: Snapdragon\r\n', 0),
(41, 'Zebra ZT231 - Impresora Industrial', 'Excelente rendimiento a un precio excelente y económico', '28754.00', 1, '20230720193926.webp', 1, 'Impresora industrial de transferencia térmica, 203 dpi, ancho de impresión 4 pulgadas, USB, Serial, Ethernet, Bluetooth, USB Host y EZPL.', 1),
(42, 'Etiquetas Adhesivas Portatil - 2x1 1/4', 'Etiquetas adhesivas para impresora portatil  24 piezas', '154.00', 1, '20230727203654.webp', 5, 'Imprima etiquetas al instante en almacenes, departamentos de envíos y oficinas, aplique etiquetas de transferencia térmica directa en corrugado, metal o plástico.\r\nPerforadas entre cada etiqueta, solo para uso con Impresoras Portátiles Zebra.\r\n', 0),
(43, 'Etiquetas Adhesivas Portatil - 3x1', 'Etiqueta adhesiva para impresora portátil 24 piezas', '264.00', 1, '20230727203807.webp', 5, 'Imprima etiquetas al instante en almacenes, departamentos de envíos y oficinas, aplique etiquetas de transferencia térmica directa en corrugado, metal o plástico.\n', 0),
(44, 'Etiquetas Industriales térmicas - 1x1', ' Etiquetas Industriales térmica Blancas 1x1 pulgada 12 piezas', '528.00', 1, '20230727204114.webp', 5, 'Material térmico directo de calidad no requiere cinta, recomendadas para envíos, identificación de productos, código de barras y gavetas de partes, use con impresoras industriales de código de barras.\n', 0),
(45, 'Etiquetas Industriales Térmicas 1x1/2', 'Etiquetas Industriales térmica Blancas 1 1/2x1 pulgada 12 piezas', '682.00', 1, '20230727204248.webp', 5, 'Material térmico directo de calidad no requiere cinta, recomendadas para envíos, identificación de productos, código de barras y gavetas de partes, use con impresoras industriales de código de barras.', 0),
(46, ' Etiquetas Industriales Térmicas 2x1', 'Etiquetas Industriales térmica Blancas 2x1 pulgada 12 piezas', '660.00', 1, '20230727204455.webp', 5, 'Material térmico directo de calidad no requiere cinta, recomendadas para envíos, identificación de productos, código de barras y gavetas de partes, use con impresoras industriales de código de barras.', 0),
(47, 'Etiquetas Industriales Térmicas 2x2', 'Etiquetas Industriales térmica Blancas 2x2 pulgada 12 piezas', '770.00', 1, '20230727204653.webp', 5, 'Material térmico directo de calidad no requiere cinta, recomendadas para envíos, identificación de productos, código de barras y gavetas de partes, use con impresoras industriales de código de barras.', 0),
(48, 'Etiquetas Industriales Térmicas 3x2', 'Etiquetas Industriales térmica Blancas 3x2 pulgada 12 piezas', '1012.00', 1, '20230727204732.webp', 5, 'Material térmico directo de calidad no requiere cinta, recomendadas para envíos, identificación de productos, código de barras y gavetas de partes, use con impresoras industriales de código de barras.', 0),
(49, 'Etiquetas Industriales Térmicas 4x3', 'Etiquetas Industriales térmica Blancas 4x3 pulgada 12 piezas', '1034.00', 1, '20230727204808.webp', 5, 'Material térmico directo de calidad no requiere cinta, recomendadas para envíos, identificación de productos, código de barras y gavetas de partes, use con impresoras industriales de código de barras.', 0),
(50, 'Etiquetas Escritorio Térmicas 1x1', 'Etiquetas de escritorio térmicas Blancas 1 x 1 pulgada 24 piezas', '308.00', 1, '20230727205051.webp', 5, 'Use con impresoras de escritorio Zebra, etiquetas blancas brillosas brindan excelente capacidad de impresión para impresoras de velocidad baja a media.\r\n', 0),
(51, 'Etiquetas Escritorio Térmicas 1x1/2', ' Etiquetas de escritorio térmicas Blancas 1 x 1/2pulgada 24 piezas', '484.00', 1, '20230727205214.webp', 5, 'Use con impresoras de escritorio Zebra, etiquetas blancas brillosas brindan excelente capacidad de impresión para impresoras de velocidad baja a media.', 0),
(53, 'Cinta Industrial  Cera 1.57¨x1476´', 'Cintas industriales de transferencia Cera 12 piezas', '184.00', 1, '20230727205952.webp', 7, 'Recomendada para etiquetas de envíos, etiquetado de cajas y bolsas de menudeo, use con impresoras de alta velocidad.', 0),
(54, 'Cinta Industrial Cera 2.36¨x984´', 'Cintas industriales de transferencia Cera 12 piezas', '154.00', 1, '20230727210050.webp', 7, 'Recomendada para etiquetas de envíos, etiquetado de cajas y bolsas de menudeo, use con impresoras de alta velocidad.', 0),
(55, 'Cinta Industrial Cera 2.36¨x1476´', 'Cintas industriales de transferencia Cera 12 piezas', '286.00', 1, '20230727210238.webp', 7, 'Recomendada para etiquetas de envíos, etiquetado de cajas y bolsas de menudeo, use con impresoras de alta velocidad.', 0),
(56, 'Cinta Industrial Cera 3.14¨x984´', 'Cintas industriales de transferencia Cera 12 piezas', '264.00', 1, '20230727210428.webp', 7, 'Recomendada para etiquetas de envíos, etiquetado de cajas y bolsas de menudeo, use con impresoras de alta velocidad.', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuariosl`
--

CREATE TABLE `usuariosl` (
  `idUsuarios` int(11) NOT NULL,
  `userUsuario` varchar(100) NOT NULL,
  `passwordUsuario` varchar(100) NOT NULL,
  `NombreUsuario` varchar(100) NOT NULL,
  `ApellidoUsuario` varchar(100) NOT NULL,
  `emailUsuario` varchar(150) NOT NULL,
  `telefonoUsuario` varchar(50) NOT NULL,
  `ciudadUsuario` varchar(100) NOT NULL,
  `codposUsuario` varchar(100) NOT NULL,
  `Dirección` varchar(200) NOT NULL,
  `tipoUsuario` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `usuariosl`
--

INSERT INTO `usuariosl` (`idUsuarios`, `userUsuario`, `passwordUsuario`, `NombreUsuario`, `ApellidoUsuario`, `emailUsuario`, `telefonoUsuario`, `ciudadUsuario`, `codposUsuario`, `Dirección`, `tipoUsuario`) VALUES
(1, 'Joel11', '123456!', 'JoelArturo', 'Lopez Benitez', 'joelito11@gmail.com', '664-166-7531', 'Tijuanas', '222445', 'Calle Hermita 1456 Fraccionamiento el Señores', 'admin'),
(18, 'Panchito s', '123456s', 'Panchitos', 'Gonzaless', 'a@gmail.coms', '', '', '', '', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`idPedido`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`idProducto`);

--
-- Indices de la tabla `usuariosl`
--
ALTER TABLE `usuariosl`
  ADD PRIMARY KEY (`idUsuarios`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `idPedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `idProducto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT de la tabla `usuariosl`
--
ALTER TABLE `usuariosl`
  MODIFY `idUsuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
