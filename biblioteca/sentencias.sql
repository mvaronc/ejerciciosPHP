--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `idAutor` int UNSIGNED NOT NULL,
  `Nombre` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Apellidos` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Pais` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla de autores ';

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `idLibro` int UNSIGNED NOT NULL COMMENT 'Clave primaria de la tabla',
  `titulo` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `genero` enum('Narrativa','Lírica','Teatro','Científico-Técnico') COLLATE utf8mb4_unicode_ci NOT NULL,
  `idAutor` int UNSIGNED DEFAULT NULL COMMENT 'Será una clave foránea de la tabla auores',
  `numeroPaginas` int UNSIGNED NOT NULL,
  `numeroEjemplares` int UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci COMMENT='Tabla de libros de nuestra biblioteca';

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`idAutor`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`idLibro`),
  ADD KEY `idAutor` (`idAutor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `idAutor` int UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `libros`
--
ALTER TABLE `libros`
  MODIFY `idLibro` int UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'Clave primaria de la tabla';

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`idAutor`) REFERENCES `autor` (`idAutor`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;
