-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 16-03-2021 a las 16:34:38
-- Versión del servidor: 10.4.15-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `u973724346_depi`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`u973724346_repomich`@`127.0.0.1` PROCEDURE `del_archivos` (IN `idArchivo` INT, IN `tipo` INT)  NO SQL
    SQL SECURITY INVOKER
BEGIN
START TRANSACTION;

IF tipo = 1 THEN 

DELETE FROM articulos WHERE idDoc = idArchivo; 
DELETE FROM docs WHERE idDoc = idArchivo;

ELSEIF tipo = 2 THEN

DELETE FROM tesis WHERE idDoc = idArchivo;
DELETE FROM docs WHERE idDoc = idArchivo;

ELSEIF tipo = 3 THEN

DELETE FROM proyectos WHERE idDoc = idArchivo;
DELETE FROM docs WHERE idDoc = idArchivo;

END IF;

COMMIT;
END$$

CREATE DEFINER=`u973724346_repomich`@`127.0.0.1` PROCEDURE `ins_articulo` (IN `titulo` VARCHAR(250) CHARSET utf8, IN `autores` VARCHAR(250) CHARSET utf8, IN `new_autores` VARCHAR(512), IN `revista` VARCHAR(250) CHARSET utf8, IN `volumen` VARCHAR(250) CHARSET utf8, IN `abstract` TEXT CHARSET utf8, IN `doi` VARCHAR(250) CHARSET utf8, IN `fecha` DATE, IN `url` VARCHAR(20) CHARSET utf8, IN `usuario` INT UNSIGNED)  NO SQL
    SQL SECURITY INVOKER
BEGIN
START TRANSACTION;

INSERT INTO docs(tipo,idUsuario,url) VALUES("articulo",usuario,url);
SET @iddoc := LAST_INSERT_ID();
INSERT INTO articulos(idDoc,titulo,autor,revista,volumen,abstract,doi,fecha,fechaSubida)
VALUES(@iddoc,titulo,autor,revista,volumen,abstract,doi,fecha,CURDATE());

create temporary table tempAutores
(
    doc int,
    autor int
);

IF new_autores <> '' THEN

create temporary table tempNewAutores
(
	nombre varchar(255),
    apellidos varchar(255),
    sexo varchar(255)
);


set @insnewautortemp = CONCAT("INSERT INTO tempNewAutores(nombre,apellidos,sexo) VALUES", new_autores);
set @insnewautor = CONCAT("INSERT INTO autores(nombre,apellidos,sexo) VALUES", new_autores);
PREPARE stmtautor FROM @insnewautortemp;
PREPARE stmtautortemp FROM @insnewautor;
EXECUTE stmtautor;
EXECUTE stmtautortemp;


INSERT INTO tempAutores(autor) SELECT idAutor FROM autores WHERE EXISTS (SELECT * FROM tempNewAutores WHERE autores.nombre=tempNewAutores.nombre AND autores.apellidos=tempNewAutores.apellidos); 
END IF;

IF autores <> '' THEN
   set @sql = concat("INSERT INTO tempAutores(autor) VALUES " , autores);
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
END IF;

UPDATE tempAutores SET doc=@iddoc;

INSERT INTO `docs-autores` (idDoc,idAutor) SELECT doc,autor FROM tempAutores;

COMMIT;
END$$

CREATE DEFINER=`u973724346_repomich`@`127.0.0.1` PROCEDURE `ins_proyecto` (IN `titulo` VARCHAR(255) CHARSET utf8, IN `lider` INT, IN `new_lider` VARCHAR(255) CHARSET utf8, IN `autores` VARCHAR(255) CHARSET utf8, IN `new_autores` VARCHAR(1024) CHARSET utf8, IN `var_financiado` BOOLEAN, IN `var_financiamiento` FLOAT, IN `fecha_ini` DATE, IN `fecha_fin` DATE, IN `descripcion` TEXT CHARSET utf8, IN `url` VARCHAR(20) CHARSET utf8, IN `usuario` INT)  NO SQL
    SQL SECURITY INVOKER
BEGIN
START TRANSACTION;

IF lider <> '' THEN
	SET @idlider = lider;
ELSE INSERT INTO autores(nombre,apellidos,sexo) VALUES(new_lider);
	SET @idlider = LAST_INSERT_ID();
END IF;


INSERT INTO docs(tipo,idUsuario,url) VALUES("proyecto",usuario,url);
SET @iddoc := LAST_INSERT_ID();


INSERT INTO proyectos(idDoc,titulo,encargado,financiado,financiamiento,fechaInicio,fechaFin,descripcion,fechaSubida) VALUES(@iddoc,titulo,@idlider,var_financiado,var_financiamiento,fecha_ini,fecha_fin,descripcion,CURDATE());

INSERT INTO `docs-autores` (idDoc,idAutor) VALUES(@iddoc,@idlider);

create temporary table tempAutores
(
    doc int,
    autor int
);

IF new_autores <> '' THEN

create temporary table tempNewAutores
(
	nombre varchar(255),
    apellidos varchar(255),
    sexo varchar(255)
);

set @insnewautortemp = CONCAT("INSERT INTO tempNewAutores(nombre,apellidos,sexo) VALUES", new_autores);
set @insnewautor = CONCAT("INSERT INTO autores(nombre,apellidos,sexo) VALUES", new_autores);
PREPARE stmtautor FROM @insnewautortemp;
PREPARE stmtautortemp FROM @insnewautor;
EXECUTE stmtautor;
EXECUTE stmtautortemp;

INSERT INTO tempAutores(autor) SELECT idAutor FROM autores WHERE EXISTS (SELECT * FROM tempNewAutores WHERE autores.nombre=tempNewAutores.nombre AND autores.apellidos=tempNewAutores.apellidos); 
END IF;

IF autores <> '' THEN
   set @sql = concat("INSERT INTO tempAutores(autor) VALUES " , autores);
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
END IF;

UPDATE tempAutores SET doc=@iddoc;

INSERT INTO `docs-autores` (idDoc,idAutor) SELECT doc,autor FROM tempAutores;

COMMIT;
END$$

CREATE DEFINER=`u973724346_repomich`@`127.0.0.1` PROCEDURE `ins_tesis` (IN `titulo` VARCHAR(250) CHARSET utf8, IN `autores` VARCHAR(250) CHARSET utf8, IN `new_autores` VARCHAR(512) CHARSET utf8, IN `asesor` VARCHAR(250) CHARSET utf8, IN `fecha` INT, IN `nivel` VARCHAR(250) CHARSET utf8, IN `isbn` VARCHAR(250) CHARSET utf8, IN `departamento` VARCHAR(250) CHARSET utf8, IN `abstract` TEXT CHARSET utf8, IN `url` VARCHAR(20) CHARSET utf8, IN `usuario` INT UNSIGNED)  NO SQL
    SQL SECURITY INVOKER
BEGIN
START TRANSACTION;

INSERT INTO docs(tipo,idUsuario,url) VALUES("tesis",usuario,url);
SET @iddoc := LAST_INSERT_ID();
INSERT INTO tesis(idDoc,titulo,autor,asesor,fecha,nivel,isbn,departamento,abstract,fechaSubida)
VALUES(@iddoc,titulo,autor,asesor,fecha,nivel,isbn,departamento,abstract,CURDATE());

create temporary table tempAutores
(
    doc int,
    autor int
);

IF new_autores <> '' THEN

create temporary table tempNewAutores
(
	nombre varchar(255),
    apellidos varchar(255),
    sexo varchar(255)
);


set @insnewautortemp = CONCAT("INSERT INTO tempNewAutores(nombre,apellidos,sexo) VALUES", new_autores);
set @insnewautor = CONCAT("INSERT INTO autores(nombre,apellidos,sexo) VALUES", new_autores);
PREPARE stmtautor FROM @insnewautortemp;
PREPARE stmtautortemp FROM @insnewautor;
EXECUTE stmtautor;
EXECUTE stmtautortemp;


INSERT INTO tempAutores(autor) SELECT idAutor FROM autores WHERE EXISTS (SELECT * FROM tempNewAutores WHERE autores.nombre=tempNewAutores.nombre AND autores.apellidos=tempNewAutores.apellidos); 
END IF;

IF autores <> '' THEN
   set @sql = concat("INSERT INTO tempAutores(autor) VALUES " , autores);
    PREPARE stmt FROM @sql;
    EXECUTE stmt;
END IF;

UPDATE tempAutores SET doc=@iddoc;

INSERT INTO `docs-autores` (idDoc,idAutor) SELECT doc,autor FROM tempAutores;

COMMIT;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `academicos`
--

CREATE TABLE `academicos` (
  `idAcad` int(11) NOT NULL,
  `expediente` varchar(50) NOT NULL,
  `cvu` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `academicos`
--

INSERT INTO `academicos` (`idAcad`, `expediente`, `cvu`) VALUES
(15, '', 'IT17B395'),
(17, '', ''),
(18, '38689', 'IT16B074'),
(20, '', ''),
(21, '75582', 'IT16B137'),
(22, '63719', 'IT16B576'),
(23, '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `idDoc` int(11) NOT NULL,
  `idArticulo` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `autor` varchar(250) NOT NULL,
  `revista` varchar(250) NOT NULL,
  `volumen` varchar(250) NOT NULL,
  `abstract` text NOT NULL,
  `doi` varchar(250) NOT NULL,
  `fecha` date NOT NULL,
  `fechaSubida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`idDoc`, `idArticulo`, `titulo`, `autor`, `revista`, `volumen`, `abstract`, `doi`, `fecha`, `fechaSubida`) VALUES
(222, 4, 'A novel probe design to study wetting front kinematics during forced convective quenching', 'H.J. Vergara-Hernández and Hernández-Morales, B. ', 'Experimental Thermal and Fluid Science', '33, 5', 'The kinematics of the wetting front, i.e., the loci of the boundary between stable vapor film and the presence of bubbles, during quenching operations largely determines the evolution of the microstructural and displacement fields which, in turn, control the properties of the quenched product. Thus, it is important to develop techniques that allow its precise characterization. To this end, a novel probe design (conical-end cylinder) was coupled with an experimental set-up that guarantees fully developed flow to study wetting front kinematics during forced convective quenching of AISI 304 stainless steel probes in water at 60 C, flowing at 0.20 and 0.60 m/s. Conventional probes (flat-end cylinder) were also quenched for comparison. The wetting front was not symmetric when flat-end cylindrical probes were quenched, even for fully developed flow and relatively low values of quenchant velocity. Computer simulation of the vorticity field near the probe base (considering an isothermal system at ambient temperature) showed that there is a significant vorticity gradient in that region which may favour the chaotic collapse of the vapor film. In contrast, a similar calculation did not show any noticeable vorticity gradient for the conical-end cylindrical probe even at high quenchant velocities. The conical-end cylindrical probe and a fully developed flow ensured that the vapor film collapsed uniformly around the probe due to the fact that the formation of the wetting front was concentrated, initially, at the probe tip. This condition permits a constant advance of the wetting front and a stable transition between boiling regimes, facilitating the study of the kinematics of the wetting front. For the experimental conditions studied the following parameters were derived: (1) wetting front velocity, (2) nucleate boiling length, (3) duration of the nucleate boiling stage and (4) width of the vapor film. The duration of the nucleate boiling stage could be estimated using existing equations, obtaining results that are comparable to the experimentally determined values. For the experimental conditions studied the different boiling regimes and its transitions could be precisely defined along the surface heat flux history curve during quenching, resulting in six different zones.', 'undefined', '2009-07-15', '2020-03-19'),
(249, 6, 'Metodología para el trabajo de desarrollo de software', '', 'Revista internacional de Software', '20', 'The kinematics of the wetting front, i.e., the loci of the boundary between stable vapor film and the presence of bubbles, during quenching operations largely determines the evolution of the microstructural and displacement fields which, in turn, control the properties of the quenched product. Thus, it is important to develop techniques that allow its precise characterization. To this end, a novel probe design (conical-end cylinder) was coupled with an experimental set-up that guarantees fully developed flow to study wetting front kinematics during forced convective quenching of AISI 304 stainless steel probes in water at 60 °C, flowing at 0.20 and 0.60 m/s. Conventional probes (flat-end cylinder) were also quenched for comparison.\n\nThe wetting front was not symmetric when flat-end cylindrical probes were quenched, even for fully developed flow and relatively low values of quenchant velocity. Computer simulation of the vorticity field near the probe base (considering an isothermal system at ambient temperature) showed that there is a significant vorticity gradient in that region which may favour the chaotic collapse of the vapor film. In contrast, a similar calculation did not show any noticeable vorticity gradient for the conical-end cylindrical probe even at high quenchant velocities. The conical-end cylindrical probe and a fully developed flow ensured that the vapor film collapsed uniformly around the probe due to the fact that the formation of the wetting front was concentrated, initially, at the probe tip. This condition permits a constant advance of the wetting front and a stable transition between boiling regimes, facilitating the study of the kinematics of the wetting front.\n\nFor the experimental conditions studied the following parameters were derived: (1) wetting front velocity, (2) nucleate boiling length, (3) duration of the nucleate boiling stage and (4) width of the vapor film. The duration of the nucleate boiling stage could be estimated using existing equations, obtaining results that are comparable to the experimentally determined values.\n\nFor the experimental conditions studied the different boiling regimes and its transitions could be precisely defined along the surface heat flux history curve during quenching, resulting in six different zones.', 'undefined', '2021-03-03', '2021-03-05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autores`
--

CREATE TABLE `autores` (
  `idAutor` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `apellidos` varchar(250) NOT NULL,
  `sexo` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `autores`
--

INSERT INTO `autores` (`idAutor`, `nombre`, `apellidos`, `sexo`) VALUES
(34, 'Rodrigo', 'Campos Vázquez', 'Hombre'),
(35, ' FRANCISCO ANDRÉS', 'ZEPEDA DÍAZ', 'Hombre'),
(36, 'Julio César', 'Huerta Orozco', 'Hombre'),
(37, ' SERGIO', 'MARTÍNEZ LÓPEZ', 'Hombre'),
(38, 'JOSÉ DE JESÚS', 'VILLELA AGUILAR', 'Hombre'),
(39, 'Ivon', 'Alanis Fuerte', 'Hombre'),
(40, 'Jesús Martín', 'Briceño Zuloaga ', 'Hombre'),
(41, 'José Said ', 'Reyes Bautista', 'Hombre'),
(42, 'Héctor Adrián', 'Duarte García ', 'Hombre'),
(43, ' José Antonio', 'Estrada Calderón', 'Hombre'),
(44, 'David', 'Jiménez Libreros ', 'Hombre'),
(45, 'Luz Ireri ', 'León Trigo', 'Mujer'),
(46, 'Luz Ireri ', 'León Trigo', 'Mujer'),
(47, ' Miguel Angel ', 'Mendoza Mendoza ', 'Hombre'),
(48, ' CARLOS HUMBERTO ', 'GONZÁLEZ GUZMÁN ', 'Hombre'),
(49, 'Beatriz ', 'Juárez Campos ', 'Mujer'),
(50, 'Abimael', 'Rangel Damián ', 'Hombre'),
(51, 'Jesús Miguel', 'Rangel Reyes', 'Hombre'),
(52, 'Cynthia Verónica ', 'Guzmán Martínez', 'Mujer'),
(53, ' BRANDON', 'FARRERA BUENROSTRO', 'Hombre'),
(54, 'SANDRA E. ', 'GARCÍA HERNÁNDEZ', 'Mujer'),
(55, 'José Guadalupe ', 'Barrera Valdés ', 'Hombre'),
(56, 'Oscar', 'Lobato Nostroza', 'Hombre'),
(57, 'Jalil Gibran', 'Cabrera Izazaga ', 'Hombre'),
(58, 'DANIEL', 'CARLOS ANDRADE', 'Hombre'),
(59, 'Jesus Arturo', 'Mendez Navarro', 'Hombre'),
(60, 'Alberto Ricardo', 'Rendón Tinoco', 'Hombre'),
(61, 'Arturo', 'Solorio Arzate', 'Hombre'),
(62, 'Clarissa Nallely', 'Acosta Campas', 'Mujer'),
(63, 'Gerardo Marx', 'Chávez Campos', 'Hombre'),
(64, 'Ruth', 'Doñán Ramírez', 'Mujer'),
(65, 'Fernando', 'Landeros Páramo', 'Hombre'),
(66, 'Julio César', 'Gallo Sánchez', 'Hombre'),
(67, ' JORGE DE JESÚS ', 'DÍAZ VILLASEÑOR', 'Hombre'),
(68, 'Estefany Nathaly', 'Hinojosa Sarabia', 'Mujer'),
(69, 'Miguel Roque ', 'Vasquez Hernández', 'Hombre'),
(70, 'Fernando', 'Molina Gutierrez', 'Hombre'),
(71, 'Sergio Armando', 'Galván Chávez', 'Hombre'),
(72, 'Luis Manuel ', 'Ruiz Farías', 'Hombre'),
(73, 'Yadira', 'Solana Reyes', 'Mujer'),
(74, 'Marcela', 'Morales Morfín', 'Mujer'),
(75, 'Jorge Alejandro', 'Osuna Villanueva', 'Hombre'),
(76, 'Emmanuel', 'Hernández Mayoral', 'Hombre'),
(77, 'Juan Carlos', 'Vargas Lira', 'Hombre'),
(78, 'Diana Celina', 'Ramírez Torres', 'Mujer'),
(79, 'Fernando', 'Landeros Páramo', 'Hombre'),
(80, 'Armando', 'Herrera Velázquez', 'Hombre'),
(81, 'Benjamin', 'Vidales Luna', 'Hombre'),
(82, 'Jorge Ernesto', 'Cota Félix', 'Hombre'),
(83, 'CHRISTOPHER ', 'RODRÍGUEZ AGUILAR', 'Hombre'),
(84, 'Martín', 'Zamudio Guzmán', 'Hombre'),
(85, 'Hugo Enrique', 'Parra López', 'Hombre'),
(86, 'Jorge Eduardo', 'Lara Reyes', 'Hombre'),
(87, 'Alejandro', 'Adame Ramírez', 'Hombre'),
(88, 'José Luis', 'Monroy Morales', 'Hombre'),
(89, 'RAÚL', 'REGALADO RAMÍREZ ', 'Hombre'),
(90, 'Aldo', 'Molina Moreno', 'Hombre'),
(91, 'Saúl', 'Calderón Fernández', 'Hombre'),
(92, 'Alejandro ', 'Romero López', 'Hombre'),
(93, 'Ricardo', 'Chávez Medina', 'Hombre'),
(94, 'Manuel Abraham', 'Caravantes Álvarez', 'Hombre'),
(95, 'Jorge ', 'Sosa Sales', 'Hombre'),
(96, 'José María', 'Lara Espinoza', 'Hombre'),
(97, 'Carlos Alejandro', 'Meléndez Ceja', 'Hombre'),
(98, 'Hugo', 'Garay Morales', 'Hombre'),
(99, 'Luis Marcos ', 'Cisneros Alejandre', 'Hombre'),
(100, 'Francisco', 'Rubio Calderón', 'Hombre'),
(101, 'Eric', 'Ruíz Melchor', 'Hombre'),
(102, ' José Raúl ', 'Ortiz Castillo', 'Hombre'),
(103, 'ADALBERTO ', 'OSEGUERA MÚJICA', 'Hombre'),
(104, 'Jesús Manuel', 'Rubio Meza', 'Hombre'),
(105, 'José Alfredo', 'Zaragoza Hernández', 'Hombre'),
(106, 'Manuel Antonio', 'Corona Sánchez', 'Hombre'),
(107, 'Gabriel Alejandro', 'Álvarez Ortuño', 'Hombre'),
(108, 'Israel', 'Molina Correa', 'Hombre'),
(109, 'Gaddi Othoniel', 'Caamal Puc', 'Hombre'),
(110, 'Angel Eduardo', 'Villafuerte Nuñez', 'Hombre'),
(111, 'Guillermo Adolfo', 'Anaya Ruíz', 'Hombre'),
(112, 'Fabián ', 'Ortega Vargas', 'Hombre'),
(113, 'Gabriel', 'Ramírez Tapia', 'Hombre'),
(114, 'César L.', 'Melchor Hernández', 'Hombre'),
(115, 'Alejandro ', 'Escamirosa Torres', 'Hombre'),
(116, 'Victor Hugo', 'Coria Díaz', 'Hombre'),
(117, 'Israel', 'Luna Reyes', 'Hombre'),
(118, 'Claudio ', 'Pérez Dorantes ', 'Hombre'),
(119, 'Beatriz', 'Orozco Onofre', 'Hombre'),
(120, 'Mauricio', 'Torrijos Chaparro', 'Hombre'),
(121, 'Juan Gabriel ', 'Marroquín Pimentel', 'Hombre'),
(122, 'Janet', 'Beltrán González', 'Mujer'),
(123, 'Christian Joan ', 'García Ramírez', 'Hombre'),
(124, 'José de Jesús', 'Heredia Velázquez', 'Hombre'),
(125, 'Rogelio Jr.', 'Macias Ambriz', 'Hombre'),
(126, 'Juan Francisco', 'Yrena Heredia', 'Hombre'),
(127, ' Juan Luis ', 'Valtierra Nuci', 'Hombre'),
(128, 'Luis', 'Rodriguez Vargas', 'Hombre'),
(129, 'Hugo', 'Trujillo Canales', 'Hombre'),
(130, 'Martin', 'Herrejón Escutia', 'Hombre'),
(131, 'José', 'Rosales Torres', 'Hombre'),
(132, 'Jesús', 'Avila Montes', 'Hombre'),
(133, 'ALEJANDRO ', 'ZAVALA BÁRCENAS', 'Hombre'),
(134, 'Froylan', 'Villa Villaseñor', 'Hombre'),
(135, 'Alejandro', 'Gonzáles Aragón', 'Hombre'),
(136, 'Rubén Andrés', 'Reyes Zamora', 'Hombre'),
(137, 'Carlos ', 'Castillo Arevalo', 'Hombre'),
(138, 'Alma', 'Pérez Felipe', 'Mujer'),
(139, 'Claudio ', 'Pérez Dorantes', 'Hombre'),
(140, 'Allen A.', 'Castillo Barrón', 'Hombre'),
(141, 'Ignacio Etzel ', 'Becerra Esquivel', 'Hombre'),
(142, 'Luis Fernando', 'Fuerte Ledezma', 'Hombre'),
(143, 'Ángel Andrés ', 'Espinosa Cazarín', 'Hombre'),
(144, 'Abelardo', 'González Aragón', 'Hombre'),
(145, 'Rubén ', 'Treviño Covarrubias', 'Hombre'),
(146, 'Fernando Alfonso', 'Ramírez Escudero', 'Hombre'),
(147, 'Raúl', ' Guzmán García', 'Hombre'),
(148, 'Iván Esaú', 'Jiménez Verduzco', 'Hombre'),
(149, 'Oscar', 'Fernández Muñoz', 'Hombre'),
(150, 'JORGE LUIS ', 'DÍAZ HUERTA', 'Hombre'),
(151, 'Luis Ricardo', 'Jacobo Cisneros', 'Hombre'),
(152, 'NOÉ ADRIÁN ', 'ACUÑA PRADO', 'Hombre'),
(153, 'Alejandro', 'Velázquez García', 'Hombre'),
(154, 'Genaro Rafael ', 'Gómez Pineda', 'Hombre'),
(155, 'Daniel', 'Hernández González', 'Hombre'),
(156, 'Héctor', 'Ascención Mestiza', 'Hombre'),
(157, ' Gerardo ', 'Hernández Molina', 'Hombre'),
(158, 'Jacob Eduardo', 'FARRERA BUENROSTRO', 'Hombre'),
(159, 'Pascual Neftalí', 'Chávez Campos', 'Hombre'),
(160, 'Alexis Iván', 'Gallegos Pérez', 'Hombre'),
(161, 'Guillermo', 'Chávez Ramirez', 'Hombre'),
(162, 'Luis Enrique', 'Gonzáles Abarca', 'Hombre'),
(163, 'Juan Manuel', 'Prado Lázaro', 'Hombre'),
(164, 'Antonio', 'Urióstegui Hernández', 'Hombre'),
(165, 'Luis', 'López Jiménez', 'Hombre'),
(166, 'Javier', 'Rangel Cortés', 'Hombre'),
(167, 'Jorge Javier', 'Ortiz Morado', 'Hombre'),
(168, 'Hugo', 'Arcos Gutierrez', 'Hombre'),
(169, 'Wendy', 'Barrera Moreno', 'Mujer'),
(170, 'Juan Carlos', 'Villaseñor Guillén', 'Hombre'),
(171, 'Olivia', 'Aguilar Yépez', 'Mujer'),
(172, 'Monserrat Sofía', 'López Cornejo', 'Mujer'),
(173, 'Orson Pavel', 'Ruíz Cortés', 'Hombre'),
(174, 'Guillermo', 'Magaña León', 'Hombre'),
(175, 'Néstor', 'González Cabrera', 'Hombre'),
(176, 'Agustín Bernabé', 'Álcantara Bonilla', 'Hombre'),
(177, 'José Armando', 'Lara González', 'Hombre'),
(178, 'Ana Catalina', 'Nuñez Ponce', 'Mujer'),
(179, 'Aron Brian', 'López Sierra', 'Hombre'),
(180, 'Fernando', 'Saldaña Salas', 'Hombre'),
(181, 'Eric', 'Galván Muñoz', 'Hombre'),
(182, 'Edgar Refugio', 'López Reynoso', 'Hombre'),
(183, 'Eduardo', 'Esquivel Alva', 'Hombre'),
(184, 'Jael Madaí', 'Ambriz Torres', 'Hombre'),
(185, 'Marisol', 'Larios López', 'Mujer'),
(186, 'Mario Salvador', 'Terrazas Carpio', 'Hombre'),
(187, 'Nereyda ', 'Alcantar Mondragón', 'Hombre'),
(188, 'Clemente Guillermo', 'Peña Munguía', 'Hombre'),
(189, 'Juan Adrian', 'Peréz Orozco', 'Hombre'),
(190, 'Diana Celina', 'Ramírez Torres', 'Mujer'),
(191, 'Daniel', 'Cahue Díaz', 'Hombre'),
(192, 'Luis Alberto', 'Salgado Salgado', 'Hombre'),
(193, 'Liza Gabriela', 'Zuñiga García', 'Mujer'),
(194, 'Baldemar', 'Gaitán Galván', 'Hombre'),
(195, 'Jaime Alejandro', 'Baeza Comparán', 'Hombre'),
(196, 'Jaime Alejandro', 'Baeza Comparán', 'Hombre'),
(197, 'Benjamin', 'Vidales Luna', 'Hombre'),
(198, 'José Salvador', 'Contreras Jiménez', 'Hombre'),
(199, 'Fernando', 'Hernández Lemuz', 'Hombre'),
(200, 'Jesús', 'Beyza Bravo', 'Hombre'),
(201, 'Eder', 'Hernández Ramírez', 'Hombre'),
(202, 'Carlos Eduardo', 'Guillén Nepita', 'Hombre'),
(203, 'Ricardo', 'Martínez Parrales', 'Hombre'),
(204, 'Iván', 'Luna Sánchez', 'Hombre'),
(205, 'Carlos Ángel', 'Pérez Barrios', 'Hombre'),
(206, 'Luís Ulises', 'Chávez Campos', 'Hombre'),
(207, 'Francisco Javier', 'Arcos Pardo', 'Hombre'),
(208, 'Omar Sinhue ', 'Delgado Ramírez', 'Hombre'),
(209, 'Omar Sinhue ', 'Delgado Ramírez', 'Hombre'),
(210, 'Eliuth Feliciana', 'Barrera Villatoro ', 'Mujer'),
(211, 'César Santiago ', 'Acevedo López', 'Hombre'),
(212, 'LUIS ABRAHAM ', 'ORTIZ VARGAS', 'Hombre'),
(213, 'TANIA ESTEPHANIA ', 'CASTILLO FLORES', 'Mujer'),
(214, 'JORGE ANTONIO ', 'NAVARRO FARFÁN', 'Hombre'),
(215, 'Salvador ', 'Magdaleno Adame', 'Hombre'),
(216, 'Antonio Enrique ', 'Salas Reyes', 'Hombre'),
(217, 'Mario Misael ', 'Machado López', 'Hombre'),
(218, 'Enrique ', 'Aparicio Barrera', 'Hombre'),
(219, 'FRANCISCO JAVIER ', 'AGUILAR GARIBAY', 'Hombre'),
(220, 'Karina', 'Mino Polanco', 'Mujer'),
(221, 'Carlos ', 'Orozco Corona', 'Hombre'),
(222, 'BERENICE', 'DIAZ', 'Mujer'),
(223, 'ANGEL', 'GUZMAN TORRES', 'Hombre'),
(224, 'ARON BRIAN', 'LOPEZ SIERRA', 'Hombre'),
(225, 'JUAN', 'ALVAREZ ARROLLO', 'Hombre'),
(226, 'SALVADOR', 'AVALOS LOZANO', 'Hombre'),
(227, 'ARMANDO', 'GARCIA MEJÍA', 'Hombre'),
(228, 'ANDRÉS ', 'CERVANTES HERNÁNDEZ', 'Hombre'),
(229, 'JUAN MANUEL', 'SANTAMARÍA FUENTES', 'Hombre'),
(230, 'MARIO ALBERTO', 'SANTOYO ANAYA', 'Hombre'),
(231, 'Brandon Gilberto', 'Ceja Cruz', 'Hombre'),
(232, 'Víctor Gabriel', 'Hernández Mendoza', 'Hombre'),
(233, 'Javier Iván', 'Madrigal Chávez', 'Hombre'),
(234, 'Alan Martin', 'Fuentes Pimentel', 'Hombre'),
(235, 'Carlos Fabian', 'Escudero García', 'Hombre'),
(236, 'Ricardo', 'Hernández Salgado', 'Hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docs`
--

CREATE TABLE `docs` (
  `idDoc` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL,
  `url` varchar(20) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docs`
--

INSERT INTO `docs` (`idDoc`, `tipo`, `url`, `idUsuario`) VALUES
(33, 'tesis', '3g0yfqhyfs.pdf', 16),
(34, 'tesis', 'h7b0rgvu4b.pdf', 16),
(35, 'tesis', '9y9x4lrngc.pdf', 16),
(36, 'tesis', 'p2v6ho93l8.pdf', 16),
(37, 'tesis', '3j6j2vjkqd.pdf', 16),
(38, 'tesis', 't04pj1ip8a.pdf', 16),
(39, 'tesis', 'gikgjjnb6j.pdf', 16),
(40, 'tesis', 'nknv8t5eom.pdf', 16),
(41, 'tesis', 'atgkr5l15a.pdf', 16),
(42, 'tesis', 't1tfoz22ga.pdf', 16),
(44, 'tesis', '0w4hcncbdd.pdf', 16),
(45, 'tesis', '8u8smfw1m6.pdf', 16),
(46, 'tesis', 'xa7aav6ezt.pdf', 16),
(47, 'tesis', 'z76jueq77t.pdf', 16),
(48, 'tesis', 'u96eufbu5b.pdf', 16),
(49, 'tesis', 'ueb5nvvjob.pdf', 16),
(50, 'tesis', 'oj0u0piq89.pdf', 16),
(51, 'tesis', 'xkat9f458m.pdf', 16),
(52, 'tesis', '9p21hhm3nx.pdf', 16),
(53, 'tesis', 'f993y8n37f.pdf', 16),
(54, 'tesis', 'opz18q1isx.pdf', 16),
(55, 'tesis', 'quu7fu6x5h.pdf', 16),
(56, 'tesis', 'uc0m4fyelu.pdf', 16),
(57, 'tesis', 'njf8qq0dds.pdf', 16),
(58, 'tesis', 'jeoqjqk1t8.pdf', 16),
(59, 'tesis', 'n7jsi0qt34.pdf', 16),
(60, 'tesis', 'fa1qvo786n.pdf', 16),
(61, 'tesis', 'eiyfoavjch.pdf', 16),
(62, 'tesis', 'k51ain57dh.pdf', 16),
(63, 'tesis', 'xk1i9ggq2u.pdf', 16),
(64, 'tesis', 'w1wmzkp9u0.pdf', 16),
(65, 'tesis', 'dxsqxm5rxy.pdf', 16),
(66, 'tesis', 'n1rn3c6d7j.pdf', 16),
(67, 'tesis', '6hwfhkbzpu.pdf', 16),
(68, 'tesis', 'sp1d5xzgrz.pdf', 16),
(69, 'tesis', 'qy6ueso55z.pdf', 16),
(70, 'tesis', 'w6hvt7zd3f.pdf', 16),
(71, 'tesis', '8zhnvidyxg.pdf', 16),
(72, 'tesis', '62td7vq5s9.pdf', 16),
(73, 'tesis', '2e3wl1fmjq.pdf', 16),
(74, 'tesis', '6hwbqde0m5.pdf', 16),
(75, 'tesis', '5mvfjeir6p.pdf', 16),
(76, 'tesis', 'p9oe2t8yhm.pdf', 16),
(77, 'tesis', 'ywkeslous1.pdf', 16),
(78, 'tesis', 'wc3dvw8530.pdf', 16),
(79, 'tesis', 'vfbkkdoqar.pdf', 16),
(80, 'tesis', '55jkjroz9o.pdf', 16),
(81, 'tesis', 'ek5xpwatjh.pdf', 16),
(82, 'tesis', 's36xhw5mg0.pdf', 16),
(83, 'tesis', '3i7nrnssb9.pdf', 16),
(84, 'tesis', 'zo00gj77tx.pdf', 16),
(85, 'tesis', '6k8kb5vmcl.pdf', 16),
(86, 'tesis', 'atcn1kulvc.pdf', 16),
(87, 'tesis', 'ybuveegz9z.pdf', 16),
(88, 'tesis', 'rmpdn6cwny.pdf', 16),
(89, 'tesis', 's1sflf2ktk.pdf', 16),
(90, 'tesis', '35knvfw4a5.pdf', 16),
(91, 'tesis', 'pt24n7dixr.pdf', 16),
(92, 'tesis', 'vg8xer7paw.pdf', 16),
(93, 'tesis', 'd9yvwvou4f.pdf', 16),
(94, 'tesis', 'zym6vhwgvn.pdf', 16),
(95, 'tesis', 'nyd1u6knu5.pdf', 16),
(96, 'tesis', 'l5vu2gf61n.pdf', 16),
(97, 'tesis', 'j2i92u2cyr.pdf', 16),
(98, 'tesis', 'hcmkxb0r05.pdf', 16),
(99, 'tesis', '61gk15o3ii.pdf', 16),
(100, 'tesis', 'uprc8755ho.pdf', 16),
(101, 'tesis', '0kzjt2udij.pdf', 16),
(102, 'tesis', 'ij7ehb2u8o.pdf', 16),
(103, 'tesis', 'nb4k9evvnq.pdf', 16),
(104, 'tesis', '50yimh2u0k.pdf', 16),
(105, 'tesis', '8tbu72k0t3.pdf', 16),
(106, 'tesis', 'hz9xqaahbd.pdf', 16),
(107, 'tesis', 'vlfjdsvesn.pdf', 16),
(108, 'tesis', '5oijuhzmb4.pdf', 16),
(109, 'tesis', 'qidvmaumdh.pdf', 16),
(110, 'tesis', 'i2m3vr4m47.pdf', 16),
(111, 'tesis', 'a22xdouvko.pdf', 16),
(112, 'tesis', '1mkmamfvge.pdf', 16),
(113, 'tesis', '9ru5hkka37.pdf', 16),
(114, 'tesis', '1g3pxezv0j.pdf', 16),
(115, 'tesis', 'fmajmv9f5a.pdf', 16),
(116, 'tesis', 'ih3juhzp3d.pdf', 16),
(117, 'tesis', '5j5gmhwau1.pdf', 16),
(118, 'tesis', '65kmcbdsro.pdf', 16),
(119, 'tesis', 'r9kzmr4dfd.pdf', 16),
(120, 'tesis', 'mqoddbtmuw.pdf', 16),
(121, 'tesis', 'whvtd9touv.pdf', 16),
(122, 'tesis', 'y5f66azcre.pdf', 16),
(123, 'tesis', '7n073v6c5u.pdf', 16),
(124, 'tesis', 'g0haplmbsn.pdf', 16),
(125, 'tesis', 'x24aoq58km.pdf', 16),
(126, 'tesis', '21xn0do9vy.pdf', 16),
(127, 'tesis', 'cnxic1ex8s.pdf', 16),
(128, 'tesis', 'bvlievj2qp.pdf', 16),
(129, 'tesis', 'mbcm6pj90o.pdf', 16),
(130, 'tesis', '6rl3ip5gan.pdf', 16),
(131, 'tesis', '25xluhoi1u.pdf', 16),
(132, 'tesis', 'nzya0zpboc.pdf', 16),
(133, 'tesis', 'dkv4hc8i5n.pdf', 16),
(134, 'tesis', 'bokbyak64j.pdf', 16),
(135, 'tesis', '7x48c9dxsm.pdf', 16),
(136, 'tesis', 'qczqhf7kly.pdf', 16),
(137, 'tesis', 'v0bowqi3c7.pdf', 16),
(138, 'tesis', 'ybl4yos5i2.pdf', 16),
(139, 'tesis', 'ip6stv4csj.pdf', 16),
(140, 'tesis', '7c95xj66uk.pdf', 16),
(141, 'tesis', 'kr2frr55ul.pdf', 16),
(142, 'tesis', 's6blgmnp83.pdf', 16),
(143, 'tesis', '8rrncoupgi.pdf', 16),
(144, 'tesis', 'rii7pmagjv.pdf', 16),
(145, 'tesis', '4rk1xu3itt.pdf', 16),
(146, 'tesis', 'xsstcrg8zz.pdf', 16),
(147, 'tesis', 'cv86s1n0yu.pdf', 16),
(148, 'tesis', 'd5nz9wax52.pdf', 16),
(149, 'tesis', 'hx3fo89l2e.pdf', 16),
(150, 'tesis', 'o4qjwd9nns.pdf', 16),
(151, 'tesis', 'brjhu9n3jj.pdf', 16),
(152, 'tesis', '49udluqkap.pdf', 16),
(153, 'tesis', '9r4em1dz7k.pdf', 16),
(154, 'tesis', 'kmtyltnrvv.pdf', 16),
(155, 'tesis', 'maqgfiw6ms.pdf', 16),
(156, 'tesis', '7ntdkq3sgy.pdf', 16),
(157, 'tesis', '78bxd4oxov.pdf', 16),
(159, 'tesis', 'ux8d3janaf.pdf', 16),
(160, 'tesis', '6cwhulzgb9.pdf', 16),
(161, 'tesis', '99b21gl3f2.pdf', 16),
(162, 'tesis', 'bvycph4ex6.pdf', 16),
(163, 'tesis', 'tjne41uwum.pdf', 16),
(164, 'tesis', 'jb2a7atjzn.pdf', 16),
(165, 'tesis', '78iy9yao31.pdf', 16),
(166, 'tesis', '8slt944iwy.pdf', 16),
(167, 'tesis', 'sdvnqz3y42.pdf', 16),
(168, 'tesis', '9ze6gjq8lu.pdf', 16),
(169, 'tesis', 'j0estmyc6w.pdf', 16),
(170, 'tesis', 'dcfcmiqg75.pdf', 16),
(171, 'tesis', '2a9uympzog.pdf', 16),
(172, 'tesis', 'n0idaweh2p.pdf', 16),
(173, 'tesis', 'z0n8tb7mqm.pdf', 16),
(174, 'tesis', 'mjltwmdzlz.pdf', 16),
(175, 'tesis', 'vf0aetzup2.pdf', 16),
(176, 'tesis', 'mncg21yt5x.pdf', 16),
(177, 'tesis', 'rwycn4jkd1.pdf', 16),
(178, 'tesis', '5n5elbl6cz.pdf', 16),
(179, 'tesis', 'vkac4a06z6.pdf', 16),
(180, 'tesis', '7swilabvij.pdf', 16),
(181, 'tesis', '1osu6hrxux.pdf', 16),
(182, 'tesis', '00cod4swiw.pdf', 16),
(183, 'tesis', 'wrppka9hgv.pdf', 16),
(184, 'tesis', 'nyovmgufdq.pdf', 16),
(185, 'tesis', '1grywpzf1s.pdf', 16),
(186, 'tesis', 'h50a7i1hq9.pdf', 16),
(187, 'tesis', '3psr8c0lmj.pdf', 16),
(188, 'tesis', 'uauwfo84fe.pdf', 16),
(189, 'tesis', 'nijp9avguy.pdf', 16),
(190, 'tesis', 'oby5qawdbr.pdf', 16),
(191, 'tesis', 'y7gubv5r4y.pdf', 16),
(192, 'tesis', 'ysge4d0zvj.pdf', 16),
(193, 'tesis', '4uuobrztlz.pdf', 16),
(194, 'tesis', 'u2k5km0tq5.pdf', 16),
(195, 'tesis', '0xqgteeb9y.pdf', 16),
(196, 'tesis', 'x5ejsc4adk.pdf', 16),
(197, 'tesis', '62wx42a5mr.pdf', 16),
(198, 'tesis', 'gjpyy3e70g.pdf', 16),
(199, 'tesis', '23a7qtyz7x.pdf', 16),
(200, 'tesis', '8mxik4fxxi.pdf', 16),
(201, 'tesis', 'f7e0v1w8c7.pdf', 16),
(202, 'tesis', 'soq8r9orjm.pdf', 16),
(203, 'tesis', 'zv3cmcwzhs.pdf', 16),
(204, 'tesis', 'jbb37k4epq.pdf', 16),
(205, 'tesis', 'mqo2fbx1p7.pdf', 16),
(206, 'tesis', 'g57pfstp69.pdf', 16),
(207, 'tesis', 'ym4rv4l5cb.pdf', 16),
(208, 'tesis', 'uwryw00j6g.pdf', 16),
(209, 'tesis', 'njak0mjiqp.pdf', 16),
(210, 'tesis', 'd6v0leixpo.pdf', 16),
(211, 'tesis', 'm9avmcbidm.pdf', 16),
(212, 'tesis', 'tmbih6wi7d.pdf', 16),
(213, 'tesis', 'hm62o2yt7m.pdf', 16),
(214, 'tesis', 'dzxysdlb13.pdf', 16),
(215, 'tesis', 'jiubspkvra.pdf', 16),
(216, 'tesis', 'e228b2v0mp.pdf', 16),
(217, 'tesis', 'dagenfyl42.pdf', 16),
(218, 'tesis', 'qt9vvigb96.pdf', 16),
(219, 'tesis', 's9tnjiy0zl.pdf', 16),
(220, 'tesis', '11ifgdgg8m.pdf', 16),
(222, 'articulo', 'cfnwe9.pdf', 18),
(224, 'tesis', 'ih7xgs3nlz.pdf', 22),
(225, 'tesis', 'kxc8fw5l0a.pdf', 22),
(226, 'tesis', '6rhrfj3f7c.pdf', 22),
(227, 'tesis', 'pq6ijui4ds.pdf', 22),
(228, 'tesis', 'bzxrgfjcf3.pdf', 22),
(229, 'tesis', 'fqd8ft6pjp.pdf', 22),
(230, 'tesis', 'n9fxi9eov9.pdf', 22),
(231, 'tesis', 'ti2oxzycia.pdf', 22),
(232, 'tesis', 'a808fg7k4k.pdf', 22),
(233, 'tesis', 't4xayb6ug4.pdf', 22),
(234, 'tesis', '2p9q87xc3u.pdf', 22),
(235, 'tesis', 'qy5bmawh8h.pdf', 22),
(236, 'tesis', 'qpbhb3k5gx.pdf', 22),
(237, 'tesis', 'uyi10cdaq4.pdf', 22),
(238, 'tesis', 'j2bfd1fgc8.pdf', 22),
(239, 'tesis', 'oadp2euqcw.pdf', 22),
(240, 'tesis', 'g5t440swk0.pdf', 22),
(241, 'tesis', 'ven3403dpx.pdf', 22),
(242, 'tesis', '24qnwjtt1k.pdf', 22),
(243, 'tesis', 'ia9przr3d9.pdf', 23),
(248, 'proyecto', '6m6r1qf58y.pdf', 23),
(249, 'articulo', 'gblh29795u.pdf', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `docs-autores`
--

CREATE TABLE `docs-autores` (
  `idDocsAutores` int(11) NOT NULL,
  `idDoc` int(11) NOT NULL,
  `idAutor` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `docs-autores`
--

INSERT INTO `docs-autores` (`idDocsAutores`, `idDoc`, `idAutor`) VALUES
(20, 33, 35),
(21, 34, 36),
(22, 35, 37),
(23, 36, 38),
(24, 37, 39),
(25, 38, 40),
(26, 39, 41),
(27, 40, 42),
(28, 41, 43),
(29, 42, 44),
(31, 44, 45),
(32, 44, 46),
(34, 45, 47),
(35, 46, 48),
(36, 47, 49),
(37, 48, 50),
(38, 49, 51),
(39, 50, 52),
(40, 51, 53),
(41, 52, 54),
(42, 53, 55),
(43, 54, 56),
(44, 55, 57),
(45, 56, 58),
(46, 57, 59),
(47, 58, 60),
(48, 59, 61),
(49, 60, 62),
(50, 61, 63),
(51, 62, 64),
(52, 63, 65),
(53, 64, 66),
(54, 65, 67),
(55, 66, 68),
(56, 67, 69),
(57, 68, 70),
(58, 69, 71),
(59, 70, 72),
(60, 71, 73),
(61, 72, 74),
(62, 73, 75),
(63, 74, 76),
(64, 75, 77),
(65, 76, 78),
(66, 77, 65),
(67, 77, 79),
(69, 78, 80),
(70, 79, 81),
(71, 80, 82),
(72, 81, 83),
(73, 82, 84),
(74, 83, 85),
(75, 84, 86),
(76, 85, 87),
(77, 86, 88),
(78, 87, 89),
(79, 88, 90),
(80, 89, 91),
(81, 90, 92),
(82, 91, 93),
(83, 92, 94),
(84, 93, 95),
(85, 94, 96),
(86, 95, 97),
(87, 96, 98),
(88, 97, 99),
(89, 98, 100),
(90, 99, 101),
(91, 100, 102),
(92, 101, 103),
(93, 102, 104),
(94, 103, 105),
(95, 104, 106),
(96, 105, 107),
(97, 106, 108),
(98, 107, 109),
(99, 108, 110),
(100, 109, 111),
(101, 110, 112),
(102, 111, 113),
(103, 112, 114),
(104, 113, 115),
(105, 114, 116),
(106, 115, 117),
(107, 116, 118),
(108, 117, 119),
(109, 118, 120),
(110, 119, 121),
(111, 120, 122),
(112, 121, 123),
(113, 122, 124),
(114, 123, 125),
(115, 124, 126),
(116, 125, 127),
(117, 126, 128),
(118, 127, 129),
(119, 128, 130),
(120, 129, 131),
(121, 130, 132),
(122, 131, 133),
(123, 132, 134),
(124, 133, 135),
(125, 134, 136),
(126, 135, 109),
(127, 136, 137),
(128, 137, 138),
(129, 138, 118),
(130, 138, 139),
(132, 139, 140),
(133, 140, 141),
(134, 141, 142),
(135, 142, 143),
(136, 143, 144),
(137, 144, 145),
(138, 145, 146),
(139, 146, 147),
(140, 147, 148),
(141, 148, 149),
(142, 149, 150),
(143, 150, 151),
(144, 151, 152),
(145, 152, 153),
(146, 153, 154),
(147, 154, 155),
(148, 155, 156),
(149, 156, 157),
(150, 157, 158),
(152, 159, 160),
(153, 160, 161),
(154, 161, 162),
(155, 162, 163),
(156, 163, 164),
(157, 164, 165),
(158, 165, 166),
(159, 166, 167),
(160, 167, 168),
(161, 168, 169),
(162, 169, 170),
(163, 170, 171),
(164, 171, 172),
(165, 172, 173),
(166, 173, 174),
(167, 174, 175),
(168, 175, 176),
(169, 176, 177),
(170, 177, 178),
(171, 178, 179),
(172, 179, 180),
(173, 180, 181),
(174, 181, 182),
(175, 182, 183),
(176, 183, 184),
(177, 184, 185),
(178, 185, 186),
(179, 186, 187),
(180, 187, 188),
(181, 188, 189),
(182, 189, 78),
(183, 189, 190),
(185, 190, 191),
(186, 191, 192),
(187, 192, 193),
(188, 193, 194),
(189, 194, 195),
(190, 195, 195),
(191, 195, 196),
(193, 196, 81),
(194, 196, 197),
(196, 197, 198),
(197, 198, 199),
(198, 199, 200),
(199, 200, 201),
(200, 201, 202),
(201, 202, 203),
(202, 203, 204),
(203, 204, 205),
(204, 205, 206),
(205, 206, 207),
(206, 207, 208),
(207, 208, 208),
(208, 208, 209),
(210, 209, 210),
(211, 210, 211),
(212, 211, 212),
(213, 212, 213),
(214, 213, 214),
(215, 214, 215),
(216, 215, 216),
(217, 216, 217),
(218, 217, 218),
(219, 218, 219),
(220, 219, 220),
(221, 220, 221),
(222, 224, 178),
(223, 225, 61),
(224, 226, 222),
(225, 227, 142),
(226, 228, 175),
(227, 229, 81),
(228, 230, 223),
(229, 231, 223),
(230, 232, 179),
(231, 232, 224),
(233, 233, 62),
(234, 234, 120),
(235, 235, 225),
(236, 236, 126),
(237, 237, 194),
(238, 238, 226),
(239, 239, 227),
(240, 240, 228),
(241, 241, 229),
(242, 242, 230),
(243, 243, 56),
(246, 248, 34),
(247, 248, 231),
(248, 248, 233),
(249, 248, 232),
(250, 248, 234),
(251, 249, 236);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `idIns` int(11) NOT NULL,
  `nombre` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`idIns`, `nombre`) VALUES
(1, 'Instituto Tecnologico de Morelia'),
(5, 'Instituto Tecnologico de Puruandiro'),
(6, 'Instituto Tecnologico  Superior de  Apatzingan'),
(7, 'Instituto Tecnologico de Estudios Superiores de Zamora'),
(8, 'Instituto Tecnologico  Superior de  Uruapan'),
(9, 'Instituto Tecnologico Superior Purhepecha'),
(10, 'Instituto Tecnologico  Superior de Ciudad Hidalgo'),
(11, 'Instituto Tecnologico  Superior de Los Reyes'),
(12, 'Instituto Tecnologico  Superior de Huetamo'),
(13, 'Instituto Tecnologico  Superior de Tacambaro'),
(14, 'Instituto Tecnologico  Superior de Patzcuaro'),
(15, 'Instito Tecnologico Superior de Coalcoman'),
(16, 'Instituto Tecnologico de Jiquilpan'),
(17, 'Instituto Tecnologico de La Piedad'),
(18, 'Instituto Tecnologico de Lazaro Cardenas'),
(19, 'Instituto Tecnologico de Valle de Morelia'),
(20, 'Instituto Tecnologico de Zitacuaro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectos`
--

CREATE TABLE `proyectos` (
  `idDoc` int(11) NOT NULL,
  `idProyecto` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `encargado` int(11) NOT NULL,
  `financiado` tinyint(1) NOT NULL,
  `financiamiento` float NOT NULL,
  `fechaInicio` date NOT NULL,
  `fechaFin` date NOT NULL,
  `descripcion` text NOT NULL,
  `fechaSubida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyectos`
--

INSERT INTO `proyectos` (`idDoc`, `idProyecto`, `titulo`, `encargado`, `financiado`, `financiamiento`, `fechaInicio`, `fechaFin`, `descripcion`, `fechaSubida`) VALUES
(248, 9, 'Creación del Repomich', 235, 1, 150000, '2019-11-10', '2020-09-01', 'Se llevó acabo la creación del repositorio institucional Repomich.', '2020-09-01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tesis`
--

CREATE TABLE `tesis` (
  `idDoc` int(11) NOT NULL,
  `idTesis` int(11) NOT NULL,
  `titulo` varchar(250) NOT NULL,
  `autor` varchar(250) NOT NULL,
  `asesor` varchar(250) NOT NULL,
  `fecha` int(11) NOT NULL,
  `nivel` varchar(100) NOT NULL,
  `isbn` varchar(250) NOT NULL,
  `departamento` varchar(100) NOT NULL,
  `abstract` text NOT NULL,
  `fechaSubida` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tesis`
--

INSERT INTO `tesis` (`idDoc`, `idTesis`, `titulo`, `autor`, `asesor`, `fecha`, `nivel`, `isbn`, `departamento`, `abstract`, `fechaSubida`) VALUES
(33, 27, 'MODELACIÓN MATEMÁTICA DE LA EMULSIFICACIÓN ACEROESCORIA EN EL DISTRIBUIDOR DE COLADA CONTINUA DURANTE EL CAMBIO DE OLL', '', ' SAÚL GARCÍA HERNÁNDEZ ', 2018, 'Maestria', 'undefined', 'METALURGIA', 'La limpieza del acero es un reto técnico que las industrias siderúrgicas han enfrentado desde su inicio, con la llegada de los aceros de ultra alta resistencia y de alta especificación (uso en condiciones amargas) la necesidad de disminuir en lo posible las inclusiones nometálicas se ha vuelto una necesidad de primer orden. Es bien conocido que controlar la cantidad de inclusiones en los periodos del cambio de olla en la máquina de colada continua es más complicado en comparación al estado estable. Sin embargo, ya sea en estado estable o en estado transitorio, los aceros deben de estar bajo especificación para que puedan ser aceptados por cliente. En la presente investigación se realizó una simulación matemática para evaluar el efecto de distintas buzas de alimentación al distribuidor en cuanto a la emulsión generada de escoria y arrastre de aire durante el periodo del cambio de olla. Inicialmente se realizó la simulación matemática en estado estable y posteriormente en un estado transitorio (donde se considera el periodo de cambio de olla en el distribuidor), con tres diseños de buzas, la primera es una buza convencional comúnmente empleada en la industria siderúrgica, y las otras dos son buzas disipadoras de energía las cuales cuentan con cambios de sección tipo cónica convergente-divergente variando únicamente las dimensiones de las recámaras entre estas dos buzas. Las tres buzas fueron evaluadas en cuanto a la cantidad de escoria emulsionada y aire atrapado durante el periodo de cambio de olla, la cantidad de escoria arrastrada hasta el molde de solidificación y la apertura de capa de escoria, en donde se encontró que con el uso de estas buzas disipadoras se consigue una menor emulsificación de escoria y arrastre de aire al baño de acero, así como una menor apertura de la capa de escoria.   ', '2020-03-06'),
(34, 28, 'MODELACIÓN FÍSICA DEL EFECTO DE LA PROFUNDIDAD DE INMERSIÓN DE LA BUZA SOBRE LA OSCILACIÓN DE LOS CHORROS DE DESCARGA Y MENISCO', '', 'Enrique Torres Alonso', 2014, 'Maestria', 'undefined', 'CIENCIAS EN METALURGIA ', 'En el presente trabajo de investigación se estudió el efecto de la profundidad de inmersión de la buza sobre la oscilación de los chorros de descarga en un molde para colar panchón de acero, mediante la utilización de un modelo físico con agua a escala 1:1. Se utilizó una velocidad de colada de 1 m/min así como tres profundidades de inmersión de la buza de: 200, 150 y 100 mm. El molde fue construido con material de acrílico trasparente con el fin de poder observar la dinámica de flujo en el interior, así mismo fue montado sobre un contenedor de aluminio con la finalidad de mantener el nivel del fluido. Se utilizó una buza de uso industrial con dos puertos de 70 mm de diámetro c/u, con un ángulo de inclinación de los puertos de 15 °. Para la experimentación se utilizó colorante trazador color azul con el objetivo de poder observar el patrón de flujo en el interior del molde, papel milimétrico y software para poder determinar las mediciones de las oscilaciones en la superficie libre, aceite vegetal con el fin de simular la capa de escoria en la superficie libre. Dentro de los resultados se observó que la superficie libre se mantiene más inestable a medida que la profundidad de inmersión de la buza disminuye, las recirculaciones en el interior del molde son asimétricas la mayor parte del tiempo, los chorros de descarga presentan deformaciones para cualquier profundidad, el ángulo de inclinación de los chorros a la salida de la buza es diferente para cualquier profundidad de inmersión de la buza, mientras que el punto de impacto sobre las caras angostas del molde es mayor a medida que la profundidad de inmersión de la buza aumenta. Para 200 mm de profundidad de inmersión de la buza la superficie libre oscila paralelamente al nivel de referencia, a 150 mm se da la presencia de pequeñas ondulaciones senoidales sobre la superficie libre, mientras que a 100 mm la superficie libre presenta mucha inestabilidad y ondas con valles y crestas asimétricos así como deformaciones en el menisco. A menor profundidad de inmersión de la buza se generan mayor número de vórtices con más tiempo de permanencia y longitud cerca de la buza. El número de periodos que generan los flujos de recirculación que impactan la superficie libre son mayores a medida que aumenta la profundidad de inmersión de la buza mientras que los ciclos disminuyen. ', '2020-03-06'),
(35, 29, 'EVALUAR EL CONTENIDO DE PLATA Y LA RAPIDEZ DE DEFORMACIÓN EN LA RESISTENCIA A LA RELAJACIÓN DE ESFUERZOS EN LA ALEACIÓN EUTECTOIDE Zn-Al A TEMPERATURA AMBIENTE', '', ' MARÍA DE LOURDES MONDRAGÓN SÁNCHEZ ', 2018, 'Maestria', 'undefined', 'CIENCIAS EN METALURGIA', 'En este estudio, se realizaron ensayos de relajación de esfuerzos en aleaciones eutectoides superplásticas de Zn-22%Al-XAg durante tiempos estimados de una semana de duración y variando sus contenidos de plata en 1 y 2%. Los ensayos se efectuaron a la temperatura de 27°C y la deformación inicial aplicada fue la correspondiente al 4% y 8% del esfuerzo máximo obtenido en ensayos de tensión de las aleaciones en estudio. También se variaron las rapideces de deformación para alcanzar las deformaciones que se mantuvieron constantes durante los ensayos de relajación, las cuales fueron: έ1= 2.0833x10-5s-1 y έ2= 8.333x10-3s-1. \nLa realización de los ensayos de relajación requirió de la fabricación de las probetas a partir de láminas de las aleaciones a ensayar. Los lingotes y las probetas, en sus diferentes etapas fueron caracterizadas química y microestructuralmente mediante microscopía electrónica de barrido y difracción de rayos X. Esta caracterización, se realizó también después de los ensayos de tensión y relajación de esfuerzos, en donde se pudo observar, que sí hay un cambio visible en la microestructura después de los ensayos de relajación de esfuerzos. Para todos los casos en estudio se muestra una microestructura homogénea en sus fases observándose el grano con cierta textura arriñonada. \nEn esta investigación se obtuvieron las gráficas de relajación de esfuerzo vs tiempo, lo que permitió establecer, la influencia de la plata y de la rapidez de deformación en la resistencia a la relajación de la aleación en estudio. Los resultados mostraron que a έ=8.33x 10-3 s-1 para Zinag con 1% de Ag, a mayor porcentaje de deformación, tiende a aumentar el porcentaje de relajación de esfuerzos, contrario a Zinag con 2% de Ag en donde a mayor porcentaje de deformación, tiende a disminuir el %R, y a έ= 2.0833x 10-5 s-1 para Zinag con 1% de Ag, aunque ligeramente, a menor porcentaje de deformación, tiende a aumentar el porcentaje de relajación de esfuerzos, al igual que en Zinag con 2% de Ag en donde a menor porcentaje de deformación, tiende a aumentar el porcentaje de relajación de esfuerzos, pero en este caso la diferencia es más significativa con respecto a Zinag con 1% de Ag. ', '2020-03-06'),
(36, 30, 'Estudio de la inyección de Ar en un horno olla utilizando dos inyectores con caudales diferentes y configuraciones  asimétricas mediante simulación numérica', '', 'José Ángel Ramos Banderas', 2018, 'Maestria', 'undefined', 'CIENCIAS EN METALURGIA', 'La metalurgia secundaria ha sido un detonante para incrementar la calidad y la productividad del acero desde que fue implementada (segunda mitad del siglo XIX). Las operaciones básicas de este reactor es el ajuste de temperatura y composición química del acero, así como la eliminación de impurezas (Inclusiones no-metálicas).  Este trabajo tuvo como propósito optimizar mediante el concepto de “tiempo de mezclado” la homogenización química de un Horno Olla (HO), el cual es empleado en la refinación secundaria del acero, y siendo este último agitado mediante inyección de gas Argón por el fondo. Para tal efecto, fue empleada la herramienta de simulación matemática, la cual fue realizada en un modelo tridimensional, estado transitorio y considerando un sistema de 4 fases (aire/acero/escoria/argón). Se emplearon técnicas de dinámica de fluidos computacional (CFD, por sus siglas en inglés), a través del programa comercial ANSYS-Fluent® V.15. Los modelos empleados en la simulación incluyen las ecuaciones de Navier-Stokes, la de continuidad en un sistema multifásico y que está incluida en el modelo Volumen de Fluido (VOF, por sus siglas en ingles), el modelo de Turbulencia K-e, y el modelo de Especies que permite dar seguimiento a un trazador, el cual es incorporado deliberadamente al sistema. Para la metodología se plantearon 9 casos para conocer el efecto de usar 2 inyectores con flujos de gas en cantidades diferentes, posiciones radiales no simétricas y diferentes ángulos de separación. Los experimentos fueron diseñados empleando la metodología de diseño de experimentos (DOE, por sus siglas en inglés), a través de un diseño factorial fraccionado 3k-p, lo que permitió reducir la experimentación a una fracción y poder estimar los efectos de estos factores y cómo influyen en el tiempo de mezclado. Los valores empleados para cada variable fueron tomados de los trabajos reportados en la literatura, tomando únicamente los mejores casos presentados. Los resultados indican, que sí es factible disminuir los tiempos de mezclado en el Horno Olla si se emplea la combinación de variables adecuadas (flujos de Ar, ángulos y posiciones radiales entre las toberas de inyección) como lo es para los casos 2 y 8 de esta investigación, donde la interacción entre las dos plumas generadas por el ascenso del gas es mínima, generando una estructura fluido-dinámica que permite disminuir los tiempos de mezclado.', '2020-03-06'),
(37, 31, 'EFECTO DEL PORCENTAJE DE DEFORMACIÓN EN FRÍO SOBRE LA CINÉTICA DE FORMACIÓN DE LA AUSTENITA EN UN ACERO DE BAJO CONTENIDO DE CARBONO', '', 'OCTAVIO VÁZQUEZ GÓMEZ ', 2018, 'Maestria', 'undefined', 'Metalurgia', 'El estudio de la cinética de formación de austenita en aceros al carbono es de suma importancia \ndebido a que, en la mayoría de los tratamientos industriales: tratamientos térmicos, \ntermoquímicos o termomecánicos, los aceros son tratados en el campo austenítico. Como se \nsabe, la formación de austenita en aceros de bajo contenido de carbono se desarrolla en dos \netapas: la primera involucra el proceso de descomposición de perlita a partir de la disolución de \ncementita y la segunda, la formación de austenita a partir de ferrita proeutectoide. Este proceso \na su vez, es susceptible a las condiciones iniciales de composición química, microestructura \ninicial y rapidez de calentamiento. Diversos estudios se han realizado tomando en consideración \nestas variables, no obstante, es posible analizar la cinética de formación de austenita tomando \nen consideración, dentro de la microestructura inicial, la morfología de grano como en un \nproceso de laminación en frío. En este trabajo se analizó la cinética de formación de austenita \nen un acero de bajo contenido de carbono (0.081C - 1.228Mn - 0.731Si –0.065Cr - 0.035Ni – \n0.0023S - 0.0006P % en peso) en un acero laminado en frío a diferente porcentaje de \ndeformación durante calentamiento continuo a distinta rapidez. Se encontró que el proceso de \ndeformación en frío no afecta las temperaturas críticas de formación de austenita, sin embargo, \nla rapidez de calentamiento sí modifica los valores de la primera etapa de formación a \ntemperaturas más elevadas a medida que ésta aumenta. El proceso de deformación en frío \nmodifica la microestructura inicial y esto, a su vez, afecta el mecanismo de transformación, \nocasionando que la primera etapa se vea retardada a medida que se aumenta el porcentaje de \ndeformación', '2020-03-06'),
(38, 32, 'ANÁLISIS DE LA RED ELÉCTRICA ANTE LA PÉRDIDA DE UN AUTOTRANSFORMADOR:  CASO DE LA SUBESTACIÓN ELÉCTRICA HERMOSILLO LOMA', '', 'Enrique Melgoza Vázquez ', 2017, 'Maestria', 'undefined', 'Eléctrica', 'En este trabajo de tesis se analiza la problemática que genera la pérdida de \nun equipo autotransformador, ya sea por falla o mantenimiento, en la red eléctrica \nde la Zona de Operación Transmisión Hermosillo (ZOTH) perteneciente a la \nComisión Federal de Electricidad, que es una de las tres zonas de operación con \nlas que se coordina la Gerencia de Control Regional Noroeste (GCRNO) para el \ncontrol físico de la red eléctrica de los estados de Sonora y Sinaloa, México. \nEl caso de estudio es la desconexión del autotransformador de la subestación \neléctrica Hermosillo Loma (HLM), para la demanda máxima de los años 2014, \n2015, 2016, 2017 y 2018 y considerando si se cuenta o no con generación \nhidroeléctrica en la zona. Los resultados indican que ante el disparo del \nautotransformador mencionado, en demanda máxima, se presenta una sobrecarga \nen la línea 73000 de un nivel de voltaje de 115 KV que conectan las subestaciones \nHermosillo IV (HLC) a Hermosillo VI (HLS), esta sobrecarga, para esta condición \nde demanda en la zona, puede provocar la pérdida de la confiabilidad y \ncontinuidad en el servicio de energía eléctrica de un sector. Los resultados se \nobtienen con la solución de flujos de potencia utilizando el software PSS®E \nmediante el análisis de contingencias (n - 1). \nSe presenta una propuesta de solución ante esta problemática, que es la \nimplementación de un esquema de acción remedial como lo es un disparo \nautomático de carga (DAC) y/o un disparo automático de interruptor (DAI), el cual \nrequeriría desconectar carga y/o seccionar la red de las subestaciones aledañas \nconectadas a la línea 73000 HLC-HLS para así quitarle la sobrecarga o llevarla a \nun nivel de transmisión menor que le dé más confiabilidad a la red eléctrica. Si \nbien la propuesta es la implementación de un esquema de acción remedial, si este \nno llega a implementarse o fallara, el operador del sistema eléctrico podría realizar \nestas acciones de manera manual ante la contingencia del disparo del \nautotransformador de HLM. ', '2020-03-06'),
(39, 33, 'Solución analítica de la ecuación de Kijima de mantenimiento correctivo imperfecto aplicado a sistemas eléctricos', '', 'Serguei Maximov', 2018, 'Maestria', 'undefined', 'INGENIERÍA ELÉCTRICA', 'En los últimos años con el aumento en la demanda del servicio de energía eléctrica y\nante una creciente competencia en el mercado eléctrico, han surgido nuevas presiones\nsobre las compañías eléctricas para que cumplan con las nuevas exigencias. Esto ha\nprovocado que la eﬁciencia en el servicio se haya convertido en algo prioritario y la\nconﬁabilidad del sistema se haya ligado directamente con la rentabilidad. Debido a es\nto, el mantenimiento adecuado aplicado a equipos eléctricos ha tomado cada vez mayor\nimportancia. Las acciones de mantenimiento afectan claramente la conﬁabilidad del sis\ntema, un mantenimiento excesivo producir´a un sistema altamente conﬁable a un costo\nmuy alto mientras que el caso contrario ocurrir´a si se aplica un nulo mantenimiento.\nPor esta razón es necesario implementar estrategias de mantenimiento que usen de manera eﬁciente los recursos del sistema. Esta investigación se centra en la optimización\nde las políticas de mantenimiento correctivo y reemplazo. Por lo tanto, se requiere del\ndesarrollo de modelos de conﬁabilidad que representen ﬁelmente el envejecimiento y las\nfallas del sistema.\nEl modelo de mantenimiento de Kijima, basado en la edad virtual de los componen\ntes de sistemas reparables, es uno de los modelos más importantes en la teoría de la\nconﬁabilidad. Sin embargo, debido a la complejidad de la ecuación integral impropia\nresultante, aún no ha sido posible obtener una expresión adecuada para calcular la tasa\nde riesgo para una amplia clase de distribuciones. Previamente, una solución asintótica\nde la ecuación de Kijima se ha obtenido solo para un número reducido de funciones\nde distribución, que no son apropiadas para describir el envejecimiento del sistema.\nEn esta tesis de investigación, la ecuación de Kijima se resuelve de manera asintótica\npara las distribuciones de tipo Weibull para un valor arbitrario del grado de reparación\n0 < a < 1, obteniendo buenos resultados al comparar esta solución aproximada con la\nsolución de la ecuación original del modelo de Kijima para la distribución de Weibull.\nEn base en esta solución, el periodo óptimo de reemplazo del equipo y el respectivo costo de reparación óptimo se estiman minimizando la tasa de costo. Se presentan varios\nejemplos numéricos para mostrar la eﬁcacia de la solución asintótica obtenida.', '2020-03-06'),
(40, 34, 'Análisis de la respuesta al barrido en frecuencia de transformadores eléctricos mediante modelos acoplados circuitocampo ', '', 'Enrique Melgoza Vázquez ', 2019, 'Maestria', 'undefined', 'Eléctrica', 'Existe una prueba realizada en transformadores de potencia para veriﬁcar su integridad eléctrica y mecánica a través de un equipo de medición especializado: la prueba del Análisis de la Respuesta en Frecuencia (SFRA, por sus siglas en inglés). En esta tesis se propone un métodoparasimulardichapruebaendevanadosdetransformadores.Paraelloseconstruyeun modeloacopladocircuito-campo,dondeseempleancomponentesdecircuitoparamodelarla fuente y las puntas del equipo de prueba, así como las capacitancias del devanado, mientras que para modelar la resistencia e inductancia del devanado se recurre a un modelo de campo basado en el método de elemento ﬁnito, con una formulación fasorial que toma en cuenta el fenómeno de corrientes inducidas en los materiales conductores. Mediante este esquema, se modelan intrínsicamente los efectos piel y proximidad en los devanados, así como el efecto de las inductancias propias y mutuas de cada vuelta del devanado. Las capacitancias se obtienen resolviendo el problema de campo electrostático mediante el método de elemento ﬁnito, y aplicando un método basado en la energía. Los modelos de circuito y de campo se resuelven simultáneamente, empleando para ello una formulación con acoplamiento fuerte. La respuesta a cada frecuencia se determina resolviendo el modelo acoplado circuito-campo. Se propone un método de ancho de paso adaptativo, con el objetivo de reducir el tiempo de cómputo sin perder ﬁdelidad en la respuesta obtenida. Se construyen dos modelos, para unoydosdiscos,conbaseenuntransformadordepotenciaaescala.Lasrespuestasobtenidas muestran el comportamiento típico observado en pruebas SFRA hechas a transformadores. Larespuestacalculadapuedeservirparaestablecerlarespuestaesperadadedevanadosde transformadores, así como para analizar el efecto de cambios en el devanado, cuando la realizacióndepruebasexperimentalesseapocoviable,contribuyendoalabasedeconocimiento sobre el efecto de distintos tipos de fallas o modiﬁcaciones al devanado sobre la respuesta en frecuencia.\n', '2020-03-06'),
(41, 35, 'PROGRAMAS DE RESPUESTA DE LA DEMANDA DESPACHABLE EN MERCADOS DE ELECTRICIDAD', '', 'José Horacio Tovar Hernández ', 2018, 'Maestria', 'undefined', 'INGENIERÍA ELÉCTRICA', 'En esta tesis, dos programas de respuesta de la demanda despachados por el operador independiente del sistema, y que además, son basados en incentivos son estudiados. Además, una clasificación de programas de respuesta de la demanda despachable es propuesta, con respecto al tipo de contratos que se ejerce entre los participantes del programa de respuesta de la demanda. Los programas de respuesta de la demanda despachable son divididos en programas de respuesta de la demanda despachable de un solo lado y programas de respuesta de la demanda despachable de doble lado. \nEl primer programa de respuesta de la demanda es de Mercado de Servicios Auxiliares, de esta forma, se incluye la participación de la demanda para obtener los requerimientos de reserva terciaria rodante y no-rodante. Además, la forma de contratación propuesta para este programa es de programas de respuesta de la demanda despachable de doble lado. Los resultados muestran que al incluir la participación de la demanda en el mercado de servicios de reserva se mejora la eficiencia global del mercado de electricidad, debido a la introducción de competencia entre generadores y demandas, y por tanto, el costo de operación del sistema se reduce. \nEl segundo programa es de respuesta de la demanda en emergencias. Los consumidores mantienen su capacidad de interrupción de demanda disponible al operador independiente del sistema para ser usada en condiciones de emergencia. La forma de contratación propuesta para este programa es de respuesta de la demanda despachable de un solo lado. La evaluación financiera de la instalación en planta de un generador que es usado en los periodos de interrupción es realizada. Los resultados muestran que bajo esta configuración de programas, el operador del sistema mantiene capacidad adicional para efectuar las labores de operación del sistema de potencia, y además, existen incentivos, y por tanto beneficios para los consumidores. ', '2020-03-06'),
(42, 36, 'ANALISIS DE RESPUESTA AL BARRIDO DE LA FRECUENCIA EN TRANSFORMADORES DE POTENCIA', '', 'Vicente Venegas Rebollar ', 2017, 'Maestria', 'undefined', 'Eléctrica', 'Este trabajo se enfoca al estudio y aplicación de la respuesta al barrido de la frecuencia (SFRA) para el diagnóstico y simulación de fallas en transformadores de potencia. \n \nPrimeramente, se describe la metodología para realizar la prueba de campo especificando las conexiones y recomendaciones para llevar a cabo la prueba correctamente en un transformador de potencia. Asociado a ello, también se explica la forma en la que se puede determinar la función de transferencia de un circuito eléctrico que contiene elementos resistivos, capacitivos e inductivos, lo cual conduce a una mejor comprensión de lo que sucede en un devanado de un transformador ante variaciones en la frecuencia.  Se desarrolla un circuito equivalente del devanado de un transformador de potencia para emular el comportamiento de su impedancia tanto en corto circuito como en circuito abierto. Para obtener este modelo se realizaron diversas pruebas tales como la de factor de potencia del aislamiento, corriente de excitación, reactancia de dispersión, impedancia de frecuencia cero, entre otras. Los datos obtenidos de las pruebas se utilizaron para obtener circuitos referidos tanto al lado de alta como al lado de baja del transformador de potencia. La respuesta de este circuito fue validada mediante una comparación con los resultados obtenidos de la prueba de respuesta en frecuencia mediante un equipo comercial de la marca DOBLE. Una vez validado el circuito equivalente, se utilizó para estudiar el comportamiento del devanado ante elongaciones axiales, movimientos localizados, resistencia de contacto y espiras en corto circuito. Los resultados obtenidos permiten determinar las distintas variaciones en el espectro de frecuencia que indicarían la presencia de alguna de las situaciones mencionadas. \n \nLos modelos y resultados obtenidos tienen utilidad en el diagnóstico de fallas y en el mantenimiento preventivo y correctivo de transformadores de potencia', '2020-03-06'),
(44, 38, 'SIMULACIÓN DE UNA MICRO RED ELÉCTRICA EN EL ENTORNO DE SMART GRID', '', 'Enrique Reyes Archundia', 2016, 'Maestria', 'undefined', 'Ingeniería Electrónica', 'El desarrollo industrial y la calidad de vida de un país dependen de la energía eléctrica. El avance\ntecnológico implica el uso de energía eléctrica mientras que el compromiso ambiental obliga el uso\nde fuentes de energía renovable, este es uno de los retos al que se enfrenta la red eléctrica\ntradicional, aunado a ello la necesidad del cliente de incursionar en la generación de energía. Para\nsolventar estas necesidades en México se tiene la reforma energética de 2014, la cual permite la\ngeneración distribuida de energía dentro del concepto de Micro Red eléctrica, la cual implementa el\nuso de fuentes de energía renovables en todos los niveles de la red eléctrica mexicana, obligando la\ntransición de la red tradicional a una a una red fiable, confiable y flexible como la Red Eléctrica\nInteligente, la cual se compone de muchas Micro Redes. Se espera que la energía solar fotovoltaica\nsea la principal fuente de energía renovable en la próxima década, es por ello que en este trabajo de\ninvestigación se realiza la simulación de una Micro Red basada en energía solar fotovoltaica\ninterconectada a la red eléctrica en la plataforma PSCAD. La Micro Red eléctrica está basada en una\ninstalación fotovoltaica real, interconectado a la red por medio de un medidor bidireccional o\ninteligente, de un usuario básico de CFE. En la plataforma PSCAD se realiza primero la\ncaracterización de un módulo fotovoltaico S60PC-250 basado en las especificaciones del fabricante,\nposteriormente se realiza la simulación de la Micro Red completa, sin incluir un sistema de\nalmacenamiento. Para validar la Micro Red se realizan diversos casos de estudio como:\ncomportamiento de la Micro Red de acuerdo a valores promedio anual en radiación y temperatura en\nla ciudad de Morelia, comportamiento en condiciones estándar de operación, variaciones en la\nradiación, variaciones en la temperatura, sombreado completo y sombreado parcial. La simulación\nde este tipo de Micro Redes es fundamental como primer paso para la simulación y estudio de una\nRed Eléctrica Inteligente.', '2020-03-06'),
(45, 39, 'INVESTIGACIÓN DE MÉTODOS DE RECONSTRUCCIÓN DE IMÁGENES DE TOMOGRAFÍA POR IMPEDANCIA ELÉCTRICA POR PROCESAMIENTO PARALELO', '', 'José Antonio Gutiérrez Gnecchi ', 2015, 'Maestria', 'undefined', 'Ingeniería Electrónica ', 'El presente documento aborda la descripción de la implementación, optimización y aceleración de la reconstrucción tomográfica basada en el algoritmo cuantitativo de Newton – Raphson, utilizada para la interrogación de medios basándose en el método de tomografía por impedancia eléctrica. Los resultados y avances del proyecto en cuestión forman parte de los esfuerzos de investigación en la reducción de distorsión armónica en señales de excitación para la reconstrucción de imágenes de tomografía de impedancia eléctrica desarrollados en el departamento de ingeniería electrónica del Instituto Tecnológico de Morelia.  \nLa inspección de tejidos biológicos en busca de tejido maligno, como método preventivo y de detección de cáncer, la detección y monitoreo de enfermedades respiratorias crónicas o la inspección hidromecánica de suelos cultivables son algunas de las aplicaciones prácticas en el basto número de campos donde la tecnología en cuestión puede aportar datos relevantes. Históricamente la implementación comercial a escala considerable del método de tomografía por impedancia eléctrica se ha visto frenado por los problemas inherentes del método y la calidad de los resultados obtenidos en comparación con otros métodos, sin embargo, se considera que el perfeccionamiento de sus partes impactaría positivamente el basto número de aplicaciones donde dicha tecnología es útil. \nMediante la implementación robusta y optimizada del algoritmo de reconstrucción cuantitativo de Newton – Raphson, algoritmo con problemas detectados de convergencia provocados por la contaminación de las señales adquiridas mediante el hardware, se pretende valorar la composición de medios utilizando un método no invasivo y libre de radiación conocido como tomografía de impedancia eléctrica, método de inspección de materiales que aprovecha la inyección de corrientes controladas e inofensivas en la superficie de un dominio desconocido para interrogar la composición del mismo con base en su conductancia o permitividad, por medio de las mediciones eléctricas de su periferia.  \nEl método de Newton – Raphson es una de las tantas metodologías matemáticas que son útiles en la reconstrucción de mapas de impedancia de un medio, metodologías de aproximación estadística también conocidas como metodologías cualitativas han sido exploradas a profundidad por varias instituciones de investigación a lo largo y ancho del planeta, en planteles de investigación reconocidos, e incluso en el plantel se tienen antecedentes de contribuciones importantes, sin embargo, estos métodos no obtienen resultados cuantificables representativos de la composición interna de los medios interrogados como los métodos cuantitativos, grupo al que pertenece el algoritmo de interés del proyecto aquí presentado', '2020-03-06'),
(46, 40, 'USO DE FRENOS ELECTROMAGNÉTICOS PARA EL CONTROL DE LA TURBULENCIA EN EL MOLDE DE PLANCHÓN DELGADO', '', 'DR. SAÚL GARCÍA HERNÁNDEZ', 2018, 'Maestria', 'undefined', ' METALURGIA ', 'La calidad de los productos de acero obtenidos por medio de la colada continua, está fuertemente relacionada con el flujo de fluidos al interior del molde, por lo que resulta de suma importancia controlar dicho flujo; una manera de controlar el flujo al interior del molde es empleando frenos electromagnéticos. Por lo cual, el presente trabajo estudia el efecto de los frenos electromagnéticos sobre el flujo de acero al interior de un molde de planchón delgado a través de un modelo matemático en tres dimensiones considerando el molde y la buza de alimentación. Se estudió el efecto de colocar el freno electromagnético de forma horizontal por debajo de la buza de alimentación y de forma vertical cerca de las paredes estrechas del molde usando en ambos casos intensidades de campo magnético de 0.1T, 0.2T, 0.3T, 0.4T y 0.5T. Los resultados muestran que el freno electromagnético vertical no logra reducir de manera significativa la turbulencia generada dentro del molde por lo que se generan la fluctuación constantemente en la superficie a cualquier intensidad de campo magnético. Por otro lado, el freno electromagnético horizontal permite disminuir mayormente las fluctuaciones de la superficie, ya que logra controlar significativamente la variación del flujo entregado por la buza de alimentación y con esto se logra reducir el surgimiento de las distorsiones dinámicas desde el interior de la buza, además de que se logra controlar completamente de la variación del flujo en los puertos, obteniéndose fluctuaciones del nivel del baño menores a 1 mm', '2020-03-06'),
(47, 41, 'MODELADO DE TRANSFERENCIA DE CALOR PARA EL DESARROLLO DEL SISTEMA DE ENFRIAMIENTO DE UN TRANSFORMADOR ELÉCTRICO', '', 'Héctor Francisco Ruiz Paredes ', 2016, 'Doctorado', 'undefined', 'Ingeniería Eléctrica ', 'En este trabajo, se desarrolló un modelo matemático a partir del análisis de diferentes puntos de calentamiento en el interior de un transformador eléctrico, con el objeto de optimizar el diseño y operación del sistema de enfriamiento.  El modelo está basado en la teoría de transferencia de calor, la analogía térmica-eléctrica y la definición de la resistencia térmica de contacto en diferentes puntos dentro del transformador de potencia. Además es validado usando resultados experimentales. Una significativa ventaja que sugiere este modelo térmico es que esta vinculado a parámetros de fácil acceso. Los componentes activos de un transformador eléctrico de potencia son los devanados y el núcleo magnético, los cuales generalmente están inmersos en aceite mineral. Las pérdidas en estos componentes originan calor, que si son mayor de lo normal aceleran el deterioro del aislamiento de los bobinados y de todo el dispositivo. El comportamiento térmico de los transformadores de potencia se puede representar mediante una analogía termo-eléctrica lograda a partir de la ecuación de balance de energía. En la refrigeración de un transformador de potencia, se distinguen dos procesos de transmisión de calor que se verifica desde: \n • Los	devanados	al	aceite.	• El	fluido	interior	al	ambiente.	\n	Cada uno tiene sus correspondientes parámetros circuitales, es decir, resistencia térmica y capacitancia térmica. En el interior de un transformador de potencia se tienen sectores más calientes (puntos calientes), ubicados en la región superior de los devanados.  La temperatura en ellos, es el factor principal que determina su vida útil al tomar carga eléctrica, constituyendo un parámetro importante relativo a su longevidad y al envejecimiento de los aislantes. Controlando este factor, ayuda a garantizar su vida útil cumpliendo las normas vigentes que establecen su rendimiento a temperaturas extremas de trabajo. ', '2020-03-06'),
(48, 42, 'Localización de fallas en sistemas eléctricos de distribución usando métodos basados en impedancia e información de sistemas  SCADA', '', 'Enrique Melgoza Vázquez ', 2018, 'Maestria', 'undefined', 'INGENIERÍA ELÉCTRICA', 'En este trabajo de tesis se realiza una revisión de metodologías que se han desarrollado para calcular y localizar fallas eléctricas en sistemas radiales de distribución. En general, estas metodologías requieren de información como voltajes y corrientes tanto de falla como de pre-falla, así como la impedancia de línea del sistema eléctrico. Para un circuito de distribución, la información de voltajes y corrientes puede obtenerse en tiempo real desde el sistema SCADA (sistema de control supervisorio y adquisición de datos) mediante el cual se opera la propia red eléctrica, mientras que la información del modelo del circuito se puede obtener de la base de datos del sistema.  \n \nTambién se presenta una metodología de simulación que combina el programa OpenDSS con hojas de cálculo, esto con la finalidad de ordenar la información de los datos de entrada para analizar varios casos de prueba, simulando la ocurrencia de distintos tipos de falla para evaluar la precisión en la distancia calculada a la falla mediante métodos de localización basados en la impedancia. Se determinan los requerimientos de información para implementar estos métodos como una función del sistema SCADA, y se determinan los factores que pueden afectar la precisión de la distancia calculada, como es el caso de la resistencia de falla. Finalmente, se consideran mecanismos para discriminar entre múltiples trayectorias posibles, para circuitos con múltiples ramas. ', '2020-03-06'),
(49, 43, 'CARACTERIZACIÓN MECÁNICA Y MICROESTRUCTURAL DE LA ALEACIÓN ZINAG SOMETIDA AL PROCESAMIENTO DE DEFORMACIÓN PLÁSTICA SEVERA POR EXTRUSIÓN EN CANAL ANGULAR CONSTANTE (ECAP)', '', 'María de Lourdes Mondragón Sánchez', 2019, 'Maestria', 'undefined', 'CIENCIAS EN METALURGIA', 'En el presente trabajo se estudió una aleación de Zn-Al-Ag sometida a deformación plástica severa por medio de la técnica extrusión en canal angular constante ECAP. Se realizó el diseño y la fabricación de los componentes, la matriz del dado con un ángulo interno de Φ= 90°, y un ángulo de Ψ= 37° que define el arco externo de curvatura donde los dos canales se interceptan. Se realizó una simulación del proceso ECAP utilizando un software de elemento finito, revelando la viabilidad del proceso en rangos no mayores de 10 t.  Los especímenes de Zn-22%Al-4% fueron procesados siguiendo la ruta Bc, que consiste en reintroducir dichos especímenes haciendo un giro de 90° en el mismo sentido para los diferentes números de pases (1, 2, 3 y 4). Para conocer la respuesta microestructural de los especímenes procesados por ECAP, se analizó la evolución microestructural mediante microscopia electrónica de barrido (MEB), el estudio microestructural reveló la refinación de grano conforme se incrementan el número de pases, así mismo una inhomogeneidad en la microestructura en todo el volumen de la pieza, mostrando zonas dendríticas (microestructura de colada inicial) después de 3 pases lo cual nos indica que no hay una deformación homogénea en el total de la pieza sometida por ECAP.   Para evaluar el comportamiento mecánico, se realizaron ensayos de tensión a temperatura ambiente con una rapidez de deformación de 2.0833x10−5?−1, encontrando esfuerzos máximos de hasta 60 MPa y una deformación de más del 80 %. Al final se comparó una probeta sometida por ECAP y una probeta sometida por laminación, se demostró que la probeta sometida por deformación plástica severa ECAP tiene menor resistencia y menor de deformación debido a que en solo en ciertas zonas se alcanza a obtener un refinamiento de grano, en la probeta laminada obteniendo un esfuerzo máximo de 83 MPa y una deformación mayor al 90 %.', '2020-03-06'),
(50, 44, 'INDICES DE CALIDAD DE LA ENERGÍA ELÉCTRICA ENFOCADOS A DEPRESIONES DE VOLTAJE EN SISTEMAS DE DISTRIBUCIÓN ', '', ' Manuel Madrigal Martínez', 2010, 'Maestria', 'undefined', ' Ingeniería Eléctrica', 'Actualmente la industria eléctrica tiene un régimen de competencia elevado a nivel mundial. Para mantener dicho nivel de competencia, se requiere llevar un registro detallado de diferentes índices que proporcionen información confiable del estado de operación del sistema eléctrico. Este registro ayuda a evaluar la calidad de la energía, sobre todo los índices enfocados a sags. Con esto es posible informar al cliente con datos concisos del estado actual del suministro de energía y de las pérdidas totales que ocasionan los disturbios en la red. La importancia del registro de los sags radica en que estos producen pérdidas monetarias muy altas en el cliente final. \nEsta tesis trata sobre índices de calidad de la energía enfocados a sags, los cuales dan un análisis del sistema de distribución, indicando el nivel de confiabilidad del sistema eléctrico y también, informan del nivel de calidad de la energía del sistema. Primeramente se muestran los conceptos básicos de confiabilidad y de calidad de la energía, se retoman los índices de confiabilidad utilizados actualmente, y se plantean nuevos índices, denominados índices de calidad de la energía. Posteriormente, estos índices son aplicados en dos diferentes sistemas de distribución, uno mayormente domestico y otro industrial. Finalmente, se realiza un análisis de los resultados obtenidos por los índices de calidad de la energía, indicando el estado actual del sistema de distribución; dando a conocer el nivel de confiabilidad y el nivel de calidad de la energía, de los sistemas estudiados. \nCon este trabajo, se obtuvo el costo ocasionado por los sags (depresiones de voltaje momentáneas), en los dos sistemas mencionados, y cómo estos afectan a la calidad y a la confiabilidad de los sistemas de distribución. También, se obtuvieron los datos necesarios, para el cálculo de índices de confiabilidad y de calidad de la energía eléctrica. ', '2020-03-06'),
(51, 45, 'RECONOCIMIENTO DE MATERIALES METÁLICOS MEDIANTE CLUSTERIZACIÓN DE ESPECTROS DE FRECUENCIA ACÚSTICA', '', ' ISRAEL AGUILERA NAVARRETE ', 2019, 'Maestria', 'undefined', 'CIENCIAS EN METALURGIA', 'Paraidentiﬁcaroreconocerlosmaterialesmet´alicosexistendiversast´ecnicasestandarizadas de an´alisis y caracterizaci´on de materiales. Pueden ser tanto destructivas como no destructivas. La selecci´on de la t´ecnica depende de las propiedades o caracter´ısticas de los materiales que se desean conocer. Por lo regular, para conocer el estado interno de un material, en la mayor´ıa de los casos es necesario recurrir a ensayos destructivos, los cuales tienen como desventaja de ser tardados y costosos.\nBas´andose en esta premisa surge la necesidad de un m´etodo de an´alisis de materiales que permitaobtenerinformaci´ondelaestructurainternasinafectarsuintegridad.Paraelloseproponerealizarpruebasyestudiosbasadosenelcomportamientoac´ustico-vibracionalenmateriales met´alicosconelﬁndeencontrarunacorrelaci´onentrelaspropiedadesac´usticasdelosmateriales y su estructura interna.\nEnestetrabajoproponeeldesarrollodeunat´ecnicadecaracterizaci´onvibracionalyac´ustica de materiales met´alicos, por medio del an´alisis Big Data de espectros de frecuencia ac´usticos. Estopermitiendoquepormediodealgoritmosdecomparaci´ondedatos,seestablezcaunprocedimiento de ensayo de materiales que sea capaz de identiﬁcar aspectos vibro-ac´usticos de estos de manera quese logre identiﬁcar diferentesmaterialespor mediodesuspropiedades vibracionales.\nEspec´ıﬁcamente se muestra un acero comercial AISI-SAE 1018 como caso de estudio. El material fue analizado metalogr´aﬁcamente en condici´on de llegada. Posteriormente se fabricaron probetas estandarizadas en base a la norma ASTM E1876-01 para ensayo de excitaci´on por impulso (Impulse Excitation Technique, IET), las cuales fueron probetas cil´ındricas de dimensiones de 200mmx10mm aproximadamente. Se consideraron dos probetas en condiciones de llegada as´ı como dos sometidas a tratamiento t´ermico de normalizado, con el objetivo de comparar las caracter´ısticas ac´usticas de un mismo material con diferentes estados de estructura interna.\nLa t´ecnica IET sirve para la caracterizaci´on de m´odulos el´asticos (E). Para este trabajo se utiliz´o como forma de excitaci´on de frecuencias naturales de vibraci´on para las probetas. Con ayuda de herramientas de procesamiento de se˜nales, como la Transformada r´apida de Fourier (FFT),seobtuvieronlosespectrosdefrecuenciaac´usticosquedescribenelcomportamientovibracional de las probetas. Por medio de software desarrollado en SciLab basado en algoritmos para el manejo de espectros de frecuencia ac´usticos, se realiz´o un an´alisis de clusterizaci´on, el cual permiti´o hacer una comparaci´on de los espectros de frecuencia generados, esto por medio de la construcci´on de un Dendrograma, el cual muestra el nivel de similitud, de los espectros de frecuencia obtenidos. A modo de veriﬁcar que la prueba es capaz de identiﬁcar diferentes materiales, se probaron dos materiales mas, para comparar con el material de caso de estudio. Estos materiales fueron obtenidos de barras comerciales de Al y Lat´on (CuZn).\nSe encontr´o que para el caso del acero AISI-SAE 1018, existen diferencias importantes en los espectros de frecuencia ac´usticos generados, mostrando que para el material analizado en condiciones de llegada, las diferencias en los espectros de las probetas son mayores que en las probetas tratadas termicamente, siendo que se encuentran diferencias entre cada una de las componentesdelespectroquevandesdelos 50Hz hastalos 230Hz aproximadamente.Porotro lado, para las probetas que se trataron termicamente, se encontraron diferencias signiﬁcativamente menores entre cada una de las componentes del espectro las cuales van desde los 12Hz hasta los 75Hz. Lo anterior se atribuye a la homogeneidad alcanzada para las probetas sometidas a tratamiento t´ermico, ya que este proceso se llev´o a cabo en condiciones de laboratorio de manera controlada, por lo que la homogeneidad entre las probetas es mayor que para el caso de las probetas en condiciones de llegada, que vienen de procesos industriales. Los resultados del acero en condiciones de llegada fueron comparados con los resultados obtenidos para el Al y CuZn. Se muestra que los espectros de frecuencia diﬁeren en mayor medida, por encima de los 100Hz para los diferentes materiales.\nEl estudio muestra resultados en los cuales se evidencia la sensibilidad de la prueba a los cambios estructurales de los materiales met´alicos, demostrando que la prueba IET es funcional como m´etodo alternativo para la identiﬁcaci´on de materiales.', '2020-03-06'),
(52, 46, 'MODELO DE INTERACCIÓN ENTRE LAS ORTOFOTOS DIGITALES Y LOS DATOS VECTORIALES EN UN SISTEMA DE INFORMACIÓN GEOGRÁFICA', '', 'JUAN MANUEL GARCÍA GARCÍA', 2010, 'Maestria', 'undefined', 'SISTEMAS COMPUTACIONALES CIENCIAS DE LA COMPUTACIÓN', 'Territorial representation in a Geographic Information System (GIS) is carried mainly on two kinds of data structures, vectorial and raster. There is few or almost null information about the correct integration of the geographic information and equivalence between different data formats. Then is necessary to create a general model that make easy the handling of vectorial data and digital ortophotos, pointing the steps to follow and which parameters take into account to make its integration. \n \nOnce that was detected the requirement of make homogeneous the source information, the model explores what considerations must be taken since the data generation itself, and about the issues of the coordinate systems choice. In the first place, about the coordinate system and in second place the projection chosen, both primordial for the correct interaction on the visualization, which is the basic form where data is related in a SIG. ', '2020-03-06'),
(53, 47, 'METODOLOGÍA PARA ASIGNACIÓN DE CARGOS POR USO DE REDES  DE TRANSMISIÓN DE ENERGÍA ELÉCTRICA EN MÉXICO', '', 'José Horacio Tovar Hernández', 2010, 'Maestria', 'undefined', 'INGENIERÍA  ELÉCTRICA', 'En esta tesis se hace una revisión del estado del arte de metodologías para la asignación de cargos por uso de redes de transmisión en mercados de electricidad, considerando aspectos conceptuales y de aplicación. En este sentido, un punto importante es lo concerniente a la definición de los costos en que se incurre por la prestación del servicio, así como en un reparto equitativo de ellos entre los usuarios de la red de transmisión. Posteriormente, se estudian las metodologías vigentes en México, la publicada originalmente en 1994 y la que fue publicada para permisionarios con fuentes de energía renovable y cogeneración eficiente, con el objeto de identificar sus ventajas y desventajas con respecto a los principios básicos con los que debe cumplir una metodología. Con base a los resultados obtenidos de este análisis, se observa la conveniencia de proponer una metodología única que aprovecha el hecho de que el mercado de electricidad en México está basado exclusivamente en contratos bilaterales de energía eléctrica. \n \nLa metodología propuesta esta basada en estudio de flujos de potencia de corriente directa (CD) y con la ayuda de  un método de flujo dominante se establecen los cargos por uso de la red. Los resultados muestran que la metodología resulta atractiva conceptualmente y es viable de aplicarse en la práctica.', '2020-03-06'),
(54, 48, 'Modelo de Previsión Mediano-plazo para un Sistema Fotovoltaico basado en Redes Neuronales', '', 'Gerardo Marx Chávez-Campos', 2019, 'Maestria', 'undefined', 'Ciencias en Ingeniería Electrónica', 'El incremento de la población demanda una mayor cantidad de recursos, y uno de los recursos más demandados es la energía eléctrica. Actualmente se está realizando esfuerzos para cubrir dicha demanda, en donde las energías renovables juegan un papel muy importante. De este tipo de energías, la que mas destaca debido a la popularidad que está adquiriendo en la actualidad es la energía solar. Este tipo de energía se basa en el principio fotoeléctrico del material semiconductor con el cuál se fabrican los paneles fotovoltaicos. Al ser dispositivos de respuesta rápida, pueden crear inestabilidades en el sistema de distribución actual. Es en este ámbito que se realiza investigaciones para estimar a futuro cómo se comporta la potencia eléctrica, con la ﬁnalidad de conocer bajo que condiciones se puede interconectar estos paneles. El presente trabajo desarrolla una metodología, que va desde la adquisición de datos y a través de la inteligencia artiﬁcial, determinar de qué manera se comporta el panel fotovoltaico, considerando las condiciones ambientales del entorno. Los resultados obtenidos de la red neuronal son comparados con los resultados de un modelo de regresión y los datos reales del panel, que permitirán entender la importancia de cómo algunas variables inﬂuyen en el desempeño del panel, además de determinar las características de una red neuronal que es capaz de prever el comportamiento del panel hasta en las siguientes 24 horas, lo cual puede ser usado para la toma de decisiones durante el proceso de interconexión de un sistema fotovoltaico a la red eléctrica.', '2020-03-10'),
(55, 49, 'Análisis, diseño y simulación de un convertidor Boost Multinivel-MMC de 21 niveles para la interconexión de plantas fotovoltaicas a redes eléctricas', '', 'Vicente Venegas Revollar ', 2017, 'Maestria', 'undefined', 'Ciencias en Ingeniería Eléctrica', 'En este trabajo se presenta una propuesta de un convertidor Boost Multinivel acoplado a un MMC de 21 niveles para la interconexión de plantas fotovoltaicas a las redes de distribución. El convertidor electrónico no utiliza transformador y se diseña de acuerdo a las características actuales de las plantas solares. El convertidor es capaz de controlar y minimizar el efecto de los cambios de voltaje en la planta solar debidos a la irradiación solar, manteniendo un voltaje de salida regulado a ±5% del valor nominal. \n \nCon la finalidad de analizar el comportamiento del Convertidor Boost Multinivel-MMC de 21 niveles ante distintas condiciones de operación, se consideran los siguientes casos de estudio, se indica voltaje y potencia de salida, estos son: 1) 13.8 kV a 1 MW; 2) 13.8 kV a 1.5 MW; 3) 34.5 kV a 1 MW; 4) 34.5 kV a 1.5 MW. \n \nEn los casos de estudio se consideraron las variaciones de voltaje en el bus de CD causadas por los efectos de la radiación solar. Con el convertidor se busca principalmente tener una opción atractiva para la interconexión de energías renovables a sistemas de distribución en los niveles de media tensión.  ', '2020-03-10');
INSERT INTO `tesis` (`idDoc`, `idTesis`, `titulo`, `autor`, `asesor`, `fecha`, `nivel`, `isbn`, `departamento`, `abstract`, `fechaSubida`) VALUES
(56, 50, 'EFECTO DEL MOLIBDENO Y LA DEFORMACIÓN EN FRÍO SOBRE LA MICROESTRUCTURA Y LAS PROPIEDADES MECÁNICAS EN ACEROS DP', '', 'PEDRO GARNICA GONZÁLEZ', 2019, 'Maestria', 'undefined', 'CIENCIAS EN METALURGIA', 'Con la finalidad de estudiar el efecto de agregar Mo y la deformación en frío durante fabricación de aceros Doble Fase, se prepararon dos lotes 1) sin Mo 2) con 0.5% Mo, cada uno de ellos con 10, 20 y 30% de deformación en frío. Las temperaturas críticas se simularon mediante el Software JMatPro®, así como los diagramas de transformación isotérmica y de enfriamiento continuo que se utilizaron para determinar los tiempos y temperaturas del tratamiento térmico intercrítico. Mediante microscopía óptica y electrónica de barrido se llevó acabo la caracterización microestructural de las probetas, con el fin de determinar el tamaño de grano y porcentaje de fases. Ademas se realizaron ensayos de tensión para determinar el esfuerzo máximo, esfuerzo de cedencia, y porcentaje de alargamiento. Después del procesamiento se obtuvieron aceros Doble Fase con porcentajes de martensita variable entre el 27 y 57%. Los valores de esfuerzo máximo (1055 MPa - 1355 MPa) y % de alargamiento (7%-11%) obtenidos ubican a los aceros en el intervalo de los aceros Doble Fase. Los resultados muestran un incremento de porcentaje de martensita a medida que se incrementa el porcentaje de deformación en frío y la adición de Mo, mientras que el refinamiento de grano se ve beneficiado a medida que se incrementa el porcentaje de deformación en frío debido al efecto que tiene ésta en el tratamiento térmico intercrítico. ', '2020-03-10'),
(57, 51, 'SOLUCIÓN DEL PROBLEMA DE FRONTERA EN ECUACIONES NO LINEALES DE WHITHAM CON APLICACIÓN AL ANÁLISIS DEL EFECTO CORONA EN LÍNEAS DE TRANSMISI', '', 'Elena Igorevna Kaikina ', 2012, 'Doctorado', 'undefined', 'Ciencias en Ingeniería Eléctrica', '  	\n  \n  	         \n\n\n          \n\Z 	\n    	      	    \n             \n             \n  \n !   \Z    \"    \n #      \n         	#     \n$\" %\n\n     $#   & \'  \Z  \n    (#      \'   \n      \n        	    \n \'    $ !    	 \n      \n\n 	   ', '2020-03-10'),
(58, 52, 'SELECCIÓN DE CIRCUITOS DE MEDIA TENSIÓN EFICIENTES USANDO EL MÉTODO DEA', '', ' Héctor Francisco Ruiz Paredes', 2017, 'Maestria', 'undefined', 'Ciencias en Ingeniería Eléctrica', 'En este trabajo de tesis se presenta una metodología para determinar las condiciones de operatividad eficiente de un circuito de media tensión de distribución. Lo anterior con el objeto de tomar decisiones para corregir circuitos considerados ineficientes, mejorando con ello la calidad de la energía suministrada y evitando costos muy altos de operación  \nAlgunos de los parámetros de los sistemas eléctricos de distribución que se usan para determinar si un alimentador es técnicamente eficiente son: energía vendida, pérdidas eléctricas, regulación de voltaje, factor de potencia, edad del alimentador, longitud del circuito, nivel de tensión, número de usuarios atendidos por ese alimentador, cantidad de equipo de seccionamiento, tipo de equipo de seccionamiento ya sea manual o telecontrolado, índice de calidad de servicio etc. \nEn esta tesis se utiliza la técnica de Análisis Envolvente de Datos (DEA) para analizar un grupo numeroso de circuitos eléctricos de distribución reales, con la finalidad de proporcionar información rápida y respaldada técnicamente con el objeto de identificar aquellos alimentadores que necesiten de implementar acciones correctivas para mantenerlos en una zona de eficiencia máxima. La investigación de campo requirió varias entrevistas con ingenieros conocedores del ramo, así como la inspección en sitio de diversos alimentadores. \nSe analizaron 30 circuitos con el método DEA, los cuales son circuitos que forman parte de la compañía suministradora de energía eléctrica Comisión Federal de Electricidad (CFE), específicamente la División Centro Occidente (DCO).', '2020-03-10'),
(59, 53, 'FLUJOS ÓPTIMOS DE POTENCIA CON RESTRICCIONES DE SEGURIDAD MEDIANTE MATRICES DE SENSIBILIDADES LINEALES', '', 'Guillermo Gutiérrez Alcaraz', 2017, 'Maestria', 'undefined', 'Ciencias en Ingeniería Eléctrica', 'Un estudio de Flujos Optimo de Potencia con restricciones de Seguridad (Security Constrained Optimal Power Flow, SCOPF) es un caso especial de flujos óptimos de potencia (Optimal Power Flow, OPF). Un SCOPF determina el valor óptimo de la función objetivo respetando restricciones bajo condiciones normales de operación y ante condiciones de interrupción. Estas restricciones, conocidas como restricciones de seguridad, permiten que el OPF determine la operación del sistema eléctrico de manera defensiva, es decir, el OPF obliga al sistema a funcionar de tal manera que incluso si una interrupción se presentase, la condición operativa resultante estará dentro de los límites establecidos. \n \nEn este trabajo se propone una formulación matemática simplificada del SCOPF que reduce el número de variables de decisión sin sacrificar la precisión de la solución al problema. Se parte de la formulación clásica en CD, donde las variables de decisión son las potencias de generación y los ángulos de fase de los voltajes complejos nodales, y las restricciones de balance nodal se transforman a una sola ecuación de equilibrio de balance global, mientras que las restricciones de límite máximo de transmisión se modelan utilizando la matriz de factores de distribución de transferencia de potencia, (Power Transfer Distribution Factor, PTDF). Las restricciones bajo un elemento en contingencia están en términos de la matriz de PTDF y de la matriz de factores de distribución de línea fuera (Line Outage Distribution Factor, LODF). La formulación matemática propuesta es implementada en el lenguaje de programación Python, dado a sus características de potencia y efectividad, vinculando herramientas computacionales como PyPower y el optimizador de Gurobi. Los resultados se validan utilizando simuladores de potencia comerciales como PowerWorld y PSS/E.', '2020-03-10'),
(60, 54, 'IMPACTO DE LA INTERCONEXIÓN DE SISTEMAS FOTOVOLTAICOS EN REDES ELÉCTRICAS DE DISTRIBUCIÓN', '', 'Manuel Madrigal Martínez', 2018, 'Maestria', 'undefined', 'Ciencias en Ingeniería Eléctrica', 'En el presente trabajo de investigación se estudia el efecto de la integración de generación distribuida sobre el factor de potencia, las pérdidas eléctricas, distorsión armónica y regulación de voltaje en los alimentadores de una subestación de distribución. Para ello se utiliza un método clásico de ujos de potencia y el método de inyección de corrientes armónicas ambos programados en MATLAB. Para ujos de potencia se emplea el método de Gauss-Seidel dado a que es el método que mas comúnmente se utiliza para la resolución de ujos de potencia en sistemas de distribución. Los métodos de estudios presentados se aplican a un sistema eléctrico de distribución trifásico que consta de 19 nodos perteneciente a la División Centro Occidente de la Comisión Federal de Electricidad. Al cual se le adiciona generación distribuida que puede concentrarse al inicio o nal del circuito o distribuirse a lo largo del circuito. Adicionalmente se coloca un alimentador cticio al nal del sistema eléctrico para simular circuitos con distintas longitudes, dado que es importante conocer el funcionamiento del sistema bajo ciertas condiciones de operación cuando se tiene generación distribuida conectada. Los resultados obtenidos indican que el efecto de integración de la generación distribuida depende mucho del lugar donde se encuentre la mayor cantidad de dicha generación, ya sea al inicio del alimentador, al nal, o distribuido en el alimentador. Los resultados mostraron que las pérdidas en los alimentadores se pueden incrementar considerablemente cuando la generación distribuida se concentra al nal del alimentador, así mismo se observaron condiciones de factor de potencia de cero en el transformador de distribución sin indicar un exceso de potencia reactiva, sino un decremento de potencia activa debido a la alta penetración de la generación distribuida.', '2020-03-10'),
(61, 55, 'DISEÑO Y CONSTRUCCIÓN DE UN INFILTRÓMETRO AUTOMATIZADO PARA MEDICIÓN DE CONDUCTIVIDAD HIDRÁULICA', '', 'José Antonio Gutiérrez Gnecchi', 2009, 'Maestria', 'undefined', 'Ciencias en Ingeniería Electrónica', 'La caracterización de variables hidráulicas como la conductividad hidráulica saturada de campo (Kfs), utilizando infiltrómetros de campo; es una labor altamente demandante en tiempo ya que los registros deben de realizarse en intervalos regulares de tiempo (1 a 5 min) durante periodos que van entre 0.5 hasta 2 horas o más (dependiendo del tipo de suelo).  \n \nEl objetivo técnico del proyecto es construir un sistema para caracterizar el proceso de infiltración del agua en suelo de cultivo y determinar la Kfs. El equipo consta de un infiltrómetro automatizado de anillo sencillo para determinar los valores de la conductividad hidráulica saturada de campo para estudiar, inicialmente; las características de suelos de la cuenca de Cuitzeo. \n \nEl dispositivo diseñado utiliza un sensor de presión de tipo diferencial, que registra las variaciones de altura de la columna de agua del contenedor principal. La señal obtenida por el sensor se acondiciona mediante un amplificador de instrumentación de tal forma que las variaciones de columna de agua se pueden registrar. A través de pruebas de laboratorio se calibra el sensor y se determina la sensibilidad del dispositivo. Pruebas de campo en distintos suelos del sur de la cuenca de Cuitzeo, Michoacán, permiten evaluar su funcionalidad. Se calculó la Kfs empleando el método de Wu2 con los datos obtenidos automáticamente y visualmente, se compararon los métodos mediante ANOVA de una vía y Tukey DSH para tamaño de muestra desigual. El sensor diferencial generó un voltaje que permite calcular la altura de la columna de agua. Las pruebas de campo indicaron que no hubo diferencias significativas entre las Kfs calculadas a partir de los datos obtenidos automáticamente y aquellos obtenidos visualmente. El dispositivo de automatización permite obtener datos con una supervisión mínima.  \n \nLa información recolectada, puede contribuir a la obtención y mejoramiento de modelos de conductividad hidráulica de suelos, así como facilitar la caracterización de suelo de cultivo para la elaboración de estrategias de riego y cultivo, mejorar el manejo de los recursos hidrológicos, ya que datos de la Subdirección General de Administración del Agua en el 2008 indican que el 77% de agua potable es destinada al sector agrícola; y se desperdicia aproximadamente un 50%.  \n \nA través de la vinculación del Instituto Tecnológico de Morelia con instituciones de Investigación como el INIFAP (Instituto Nacional de Investigaciones Forestales Agrícolas y Pecuarias) se espera hacer llegar el resultado de este trabajo a productores e investigadores, inicialmente, del estado de Michoacán. Además se espera lograr la participación de otras instituciones de Investigación como el INIRENA (Instituto Nacional de Investigaciones Sobre los Recursos Naturales). ', '2020-03-10'),
(62, 56, 'DISEÑO Y CONTRUCCIÓN DE UN EQUIPO PARA LA MEDICIÓN DE POTENCIALES EVOCADOS AUDITIVOS DEL TALLO CEREBRAL PARA LA DETECCIÓN DE HIPOACUSIA EN NEONATOS', '', 'José Antonio Gutiérrez Gnecchi', 2009, 'Maestria', 'undefined', 'Ciencias en Ingeniería Electrónica', 'El proceso de audición en el producto comienza a partir de las 20 semanas de la concepción cuando la cóclea está madura y se obtienen respuestas desde el útero. El sistema de audición coincide con el desarrollo del habla: sin audición no se puede desarrollar el lenguaje. Además, el lenguaje es la vía de entrada del aprendizaje y es fundamental en la comunicación.  \n \nEn Michoacán, en comunidades rurales, se ha reportado [25] que hay un 23.90% de incidencia de hipoacusia. Por otro lado, en general, y asumiendo un valor conservador, en promedio se estima que 3 de cada 1000 recién nacidos tienen problemas de hipoacusia severos. Sin embargo no existe una estadística representativa, ya que regularmente no se realizan pruebas de hipoacusia en recién nacidos como parte de labores de tamizaje, por falta de disponibilidad de equipo de diagnóstico dedicado. Como consecuencia, los problemas de hipoacusia son detectados en etapas muy tardías del desarrollo infantil, que impide lograr algún nivel de recuperación aceptable. Por ello es importante contar con un equipo dedicado, portátil y versátil que se utilice como parte de un programa rutinario de diagnóstico médico. Tomando en cuenta que el Instituto Nacional de Estadística, Geografía e Informatica (INEGI)  reporta una tasa de natalidad promedio de, aproximadamente, 100,000 bebés por año en el estado de Michoacán, la disponibilidad generalizada de un equipo que detecte hipoacusia justo después del nacimiento podría beneficiar más de 300 recién nacidos por año.  \n \nComo parte del proyecto aprobado en el 2008 por la Dirección General de Educación Superior Tecnológica (DGEST), con número 872.08-P, se construyó un prototipo para medición de potenciales evocados del tallo cerebral en sincronía con la generación de estímulos auditivos. El prototipo que se presenta en este trabajo presenta  modificaciones importantes con respecto a su predecesor, que mejoran la portabilidad del instrumento y proporciona autonomía, al no depender de una computadora personal (PC): \n1. Inclusión de los algoritmos de procesamiento de señales en el equipo. Aún cuando debe ser posible transferir los resultados de las pruebas a una computadora personal, el equipo procesa los datos para obtener la señal de Potenciales Evocados Auditivo del Tallo Cerebral (PEATC).  \n \n2. Incluir una pantalla LCD para mostrar los resultados de las pruebas. Para que el especialista o médico que efectúe el diagnóstico pueda revisar los resultados inmediatamente después la prueba, es necesario incluir una pantalla de cristal líquido (LCD) para mostrar los datos. Estas operaciones se deben realizar en forma simultánea a la prueba y en línea para poder independizar al equipo', '2020-03-10'),
(63, 57, 'EQUIPO MULTIMODAL PARA MEDICIÓN INALÁMBRICA DE VARIABLES AMBIENTALES Y DETECCIÓN DE FRENTE DE HUMEDAD', '', 'José Antonio Gutiérrez Gnecchi ', 2012, 'Maestria', 'undefined', 'Ciencias en Ingeniería Eléctrónica', 'La técnica de riego por goteo aplicada a los cultivos como en el caso de las fresas, ha demostrado ser una forma alternativa de riego que en los últimos años se ha aplicado en muchas culturas alrededor del mundo. A través del uso de esta técnica se han obtenido grandes beneficios, tales como el ahorro de agua y fertilizantes; recientes han demostrado que mediante la aplicación de los resultados de riego por goteo hay una disminución de la contaminación del suelo resultado de la lixiviación de riego fertilizante. La determinación del frente de humedad  ha demostrado ser una gran herramienta en el estudio de los cultivos donde se aplica riego por goteo. Puesto que es a través del estudio de la dinámica de la progresión de humedad frontal puede cuantificarse con mayor precisión la cantidad de agua necesaria para el crecimiento del cultivo. Además del desarrollo tecnológico se ha demostrado que la variabilidad del clima afecta a la mayoría de los procesos físicos y biológicos que determinan la calidad y cantidad de la producción agrícola. Utilizar adecuadamente datos meteorológicos en tiempo y determinar los beneficios significativos tales como el control de plagas mejora, la previsión de heladas o hacer un riego eficiente, y para identificar el momento y la cantidad de fertilizante que se aplica durante el desarrollo de la planta, que en términos finales representan mayor producción, menor costo de cultivo, tierras de cultivo o producto de mayor calidad. \n \nDebido a la importancia de la agricultura en la sociedad y el efecto del cambio climático en la agricultura y la necesidad de equipos automatizados de observación meteorológica accesible, razón por la cual, como trabajo de tesis en este artículo se presenta la medición de equipo de telefonía móvil multimodal de las variables ambientales y la detección del frente de humectación, lo que por la medición de la impedancia eléctrica del suelo mediante la técnica de la tomografía de impedancia eléctrica se puede determinar la progresión del frentede humedad a diferentes niveles de medición. Además de la medición de la temperatura, la temperatura del suelo, relatividad ambiente de humedad, así como la humedad del suelo volumétrica. El equipo tiene la característica incorporada para ser portátil, para ser accionado por baterías que se recargan con las células solares, también tiene la capacidad de almacenar los datos de medición de cada uno de memoria SD de riego, transmite de forma inalámbrica a la central de monitoreo para el estudio adicional de los datos recogidos. \n \nEl equipo también cuenta con una interfaz de usuario que permite al usuario a través de la pantalla LCD para ver los datos obtenidos de cada medición de los riesgos y el estado actual de la temperatura del aire, temperatura del suelo, humedad y ambiente de humedad del suelo relatividad volumétrica, además de que el usuario puede modificar los parámetros de la medición los tiempos a través de la navegación mediante el teclado en práctica. Con lo cual el usuario tendrá una herramienta práctica para la medición y el estudio de las variables ambientales y la dinámica de la progresión del frente de la humedad en los cultivos donde se aplica el riego por goteo. \n \nCon la construcción de este equipo se desea aportar algo al desarrollo tecnológico del campo y ayudar a aumentar la competitividad de la agricultura nacional, así como también en el cuidado del medio ambiente, permitiendo que el agua y el uso racional de menos contaminación del suelo. ', '2020-03-10'),
(64, 58, 'MOUSE ELECTROOCULOGRÁFICO', '', 'Julio César Herrera García', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(65, 59, 'ESTUDIO DEL COMPORTAMIENTO DE DOS ACEROS AHSS BAJO CONDICIONES DE DESGASTE ABRASIVO EN SECO', '', 'PEDRO GARNICA GONZÁLEZ', 2018, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(66, 60, '“EFECTO DE LA ANISOTROPÍA PLÁSTICA PRODUCIDA DURANTE LA SOLDADURA SOBRE LAS PROPIEDADES MECÁNICAS EN UN ACERO INOXIDABLE 12%Cr EMPLEADO EN DIAFRAGMAS TIPO BANDAS ALVEOLADAS PARA TURBINAS DE VAPOR', '', 'Francisco Reyes Calderón ', 2015, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(67, 61, 'Simulación y validación practica de un Sistema Fotovoltaico de pequeña escala interconectado a la red en baja tensión', '', 'Fernando Martínez Cárdenas; Enrique Reyes Archundia', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(68, 62, 'ANÁLISIS OSCILOMÉTRICO DE LA PRESIÓN   ARTERIAL PARA LA DETECCIÓN DE PATOLOGÍAS CARDIOVASCULARES ', '', 'Julio César Herrera García', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(69, 63, 'CONSTRUCCIÓN DE EQUIPO DE ENTRENAMIENTO BAJO TECHO PARA PRUEBAS DE ATLETISMO', '', 'Fernando Martínez Cárdenas', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(70, 64, 'ANALIZADOR DE VARIABILIDAD DE LA FRECUENCIA CARDIACA UTILIZANDO FOTOPLETISMOGRAFÍA (PPG)', '', 'Rodolfo Serafín González Garza', 2016, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(71, 65, 'ANÁLISIS DEL COMPORTAMIENTO MECÁNICO DE LA ALEACIÓN 77.5 %Zn-18.5 %Al- 4 %Ag BAJO CONDICIONES DE TERMOFLUENCIA', '', 'Guillermo Gutiérrez Gnechi', 2015, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(72, 66, 'DISEÑO Y CONSTRUCCIÓN DE UN RELEVADOR  DIGITAL DE SOBRECORRIENTE DE TIEMPO INVERSO', '', 'Fernando Martínez Cárdenas', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(73, 67, 'ALTERNATIVA PARA EL CONTROL DE INTENSIDAD LUMINOSA   EN SISTEMAS DE ILUMINACIÓN', '', 'Javier Correa Gómez', 2011, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(74, 68, 'Modelación y Análisis de la Máquina de Inducción Doblemente Alimentada Conectada a la Red Eléctrica para Estudios de Propagación de Armónicas', '', ' Manuel Madrigal Martínez', 2015, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(75, 69, 'Método de Optimización del Periodo de Mantenimiento de Equipos de Sistemas Eléctricos: Interruptores de Potencia.', '', 'Francisco Rivas Dávalos ', 2011, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(76, 70, 'DISEÑO Y CONSTRUCCIÓN DE UNA UNIDAD DE MEDICIÓN FASORIAL TRIFÁSICA', '', 'Fernando Martínez Cárdenas', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(77, 71, 'EQUIPO MULTIMODAL PARA MEDICIÓN INALÁMBRICA DE VARIABLES AMBIENTALES Y DETECCIÓN DE FRENTE DE HUMEDAD', '', 'José Antonio Gutiérrez Gnecchi ', 2012, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(78, 72, 'Controlador de sistema de alimentación conmutado para iluminación con diodos emisores de luz ', '', 'Gerardo Marx Chávez Campos', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(79, 73, 'Diseño,  Construcción  y  Caracterización  de  un  PEBB  tipo Medio Puente  H  de 23kW', '', 'Vicente Venegas Rebollar', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(80, 74, 'Administración de Recursos para la Optimización de Mantenimiento y Reemplazo de Equipos de Sistemas Eléctricos de Potencia', '', 'Francisco Rivas Dávalos ', 2010, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(81, 75, 'ESTUDIO COMPARATIVO DE UNA BUZA DISIPATIVA Y UNA CONVENCIONAL CON Y SIN INYECCIÓN DE GAS SOBRE LA FLUIDODINÁMICA Y REMOCIÓN DE INCLUSIONES EN UN DISTRIBUIDOR', '', 'JOSÉ ÁNGEL RAMOS BANDERAS;: CONSTANTIN ALBERTO HERNÁNDEZ BOCANEGRA', 2019, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(82, 76, 'Diagnóstico de Altas Vibraciones en el Generador Eléctrico de la Unidad 1 de la Central Hidroeléctrica Humaya ', '', 'Francisco Cisneros Torres', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(83, 77, 'DISEÑO Y CONSTRUCCIÓN DE UN  DATA LOGGER, PARA LA ADQUISICIÓN DE DATOS DE VARIABLES ATMOSFÉRICAS PARA LA PLANIFICACIÓN ÓPTIMA DE SISTEMAS DE GENERACIÓN EÓLICOS Y FOTOVOLTAICOS', '', 'Luis Eduardo Ugalde Caballero ', 2010, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(84, 78, 'Modelado de sistemas fotovoltaicos interconectados con la red para estudios de propagación de armónicas', '', 'Manuel Madrigal Martínez', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(85, 79, 'DISEÑO DE TARIFAS PARA EL SUMINISTRO DE ENERGÍA ELÉCTRICA EN MÉXICO ', '', 'José Horacio Tovar Hernández ', 2011, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(86, 80, 'Development of an active power filter for selective harmonic compensation using a three level converter and 3D-SV modulation', '', 'Máximo Hernández Ángeles', 2017, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(87, 81, 'Análisis del efecto de la velocidad de colada y de la inmersión de buza sumergida sobre la deposición de inclusiones en su pared interior', '', 'ENIF GUADALUPE GUTIÉRREZ GUERRERO; JOSÉ DE JESÚS BARRETO SANDOVAL;  SAÚL GARCÍA HERNÁNDEZ', 2017, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(88, 82, 'Diseño y Construcción de un Amplificador de Voltaje de Alta Potencia para Uso en Pruebas de Relevadores de Protección', '', 'Fernando Martínez Cárdenas ', 2011, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(89, 83, 'DISEÑO E IMPLEMENTACIÓN DE UN STATCOM CON CONTROL BASADO EN  UN OSCILADOR DE CONTROL DIGITAL', '', 'Máximo Hernández Ángeles', 2013, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(90, 84, 'PLATAFORMA COMPUTACIONAL PARA LA SUPERVISION Y CONTROL REMOTO DE RELEVADORES', '', 'Guillermo Gutiérrez Alcaraz', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(91, 85, 'EFECTO DEL TIPO DE DESCARGA SOBRE LA FLUIDODINÁMICA EN UN MOLDE DE PLANCHÓN', '', 'José de Jesús Barreto Sandoval ', 2011, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(92, 86, 'CONFIABILIDAD DE SISTEMAS ELÉCTRICOS DE POTENCIA  CON GENERACIÓN EÓLICA.', '', 'Francisco Rivas Dávalos', 2013, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(93, 87, 'Análisis de Confiabilidad de Sistemas Eléctricos de Distribución Considerando Tasa de Falla Constante y Variante en el Tiempo', '', 'Francisco Rivas Dávalos', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(94, 88, 'EMPRESAS DE DISTRIBUCIÓN: MÉTODOS PARA DETERMINAR SU EFICIENCIA ', '', 'Héctor Francisco Ruiz Paredes ', 2008, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(95, 89, 'Modelado del Envejecimiento y Mantenimiento de Equipos en Análisis de Confiabilidad de Sistemas Eléctricos de Potencia', '', 'Francisco Rivas Dávalos', 2012, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(96, 90, 'TÉCNICAS Y PROCEDIMIENTOS DE INTERCONEXIÓN DE SISTEMAS FOTOVOLTAICOS A LA RED ELÉCTRICA MENORES A 30 kW', '', 'Manuel Madrigal Martínez', 2011, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(97, 91, 'EFECTO DE LAS OFERTAS DE VENTA EN EL EQUILIBRIO DEL MERCADO DEL DÍA EN ADELANTO DE MÉXICO', '', 'Guillermo Gutiérrez Alcaraz', 2018, 'Licenciatura', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(98, 92, 'CÁLCULO Y ANÁLISIS DE INSTALACIONES  ELÉCTRICAS RESIDENCIALES EN CORRIENTE DIRECTA', '', 'Manuel Madrigal Martínez', 2011, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(99, 93, 'MÉTODOS PARA LA DETERMINACIÓN DE PARÁMETROS ELÉCTRICOS EN LÍNEAS DE TRANSMISIÓN', '', 'Rubén Villafuerte Díaz ', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(100, 94, 'INFLUENCIA DE LAS FUERZAS DE ARRASTRE Y NO-ARRASTRE SOBRE LA CINÉTICA DE DESULFURACIÓN EN UN HORNO OLLA', '', 'Constantin Alberto Hernández Bocanegra;  José Ángel Ramos Balderas', 2019, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(101, 95, 'REGISTRO DE IMÁGENES SATELITALES', '', 'FÉLIX CALDERÓN SOLORIO', 2008, 'Maestria', 'undefined', 'Sistemas computacionales', 'undefined', '2020-03-11'),
(102, 96, ' INVESTIGACIÓN DE LOS CONTROLES DE LA PLANTA DE GENERACIÓN HIDROELÉCTRICA EL HUMAYA CONECTADA A UN BUS INFINITO ', '', 'Máximo Hernández Ángeles ', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(103, 97, 'ESTUDIO DE LA CONTRIBUCIÓN DE LA DINÁMICA DE LOS VECTORES DE LA DENSIDAD DE CORRIENTE   Y LA POLARIZACIÓN DEL NÚCLEO EN LAS IMPEDANCIAS   DE TRANSFORMADORES CON LOS NÚCLEOS FERROMAGNÉTICOS NO UNIFORMES ', '', 'Serguei Maximov', 2011, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(104, 98, 'Formulación de elemento finito para configuraciones con campo magnético normal al plano', '', 'Enrique Melgoza Vázquez ', 2016, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(105, 99, 'DESARROLLO DE PLATAFORMA BÁSICA DE SIMULACIÓN EN TIEMPO REAL PARA LA IMPLEMENTACIÓN DE ESQUEMAS TIPO HARDWARE IN THE LOOK (HIL)', '', 'Fernando Martínez Cárdenas', 2011, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(106, 100, 'ESTUDIO DE LA INTERCONEXIÓN HVDC-VSC A CAM POS DE AEROGENERACIÓN DFIG: EVALUACIÓN EN ES TADO ESTABLE Y ANTE LA PRESENCIA DE FALLAS  ELÉCTRICAS', '', 'Edgar Lenymirko Moreno Goytia', 2011, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(107, 101, 'Metodología de localización de fallas de alta impedancia en líneas aéreas de transmisión', '', 'Héctor Francisco Ruíz Paredes', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(108, 102, 'Evaluación de edemas faciales empleando procesamiento de imágenes para medición de la eficacia de medicamentos antiinflamatorios', '', 'Adriana del Carmen Téllez Anguiano ', 2012, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(109, 103, 'Diseño y Simulación de una Estación CD-CD de Potencia Para la Construcción de un Enlace HVDC Modificado', '', 'Luis Eduardo Ugalde Caballero', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(110, 104, '“SISTEMA ADAPTATIVO EEG-ECG-EMG', '', 'José Antonio Gutiérrez Gnecchi; Víctor Hugo Olivares Peregrino', 2012, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(111, 105, 'Reajuste Gráfico de Coordinación de Relevadores Contra Sobrecorriente Utilizando Algoritmos Genéticos', '', 'Francisco Cisneros Torres', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(112, 106, 'Métodos analíticos para la estimación de vida útil y optimización de políticas de mantenimiento preventivo de sistemas, con aplicación en equipos de potencia', '', 'Francisco Rivas Dávalos', 2015, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(113, 107, 'Estación de monitoreo y control de calidad, aplicada a una columna de destilación empleando observadores', '', 'Adriana del Carmen Téllez Anguiano', 2016, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(114, 108, 'Estimación de vida media y optimización de mantenimiento de equipo eléctrico en redes inteligentes', '', 'Serguei Maximov', 2015, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(115, 109, 'DISEÑO Y CONSTRUCCIÓN DE UN EEG       GENÉRICO PARA   ESTUDIOS DE LA        ACTIVIDAD ELÉCTRICA CEREBRAL', '', 'Adriana del Carmen Téllez Anguiano ', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(116, 110, 'Metodología para la Identificación y Ajuste de los Parámetros de Sistemas de Excitación de Generadores Síncronos en Operación dentro del SEN', '', 'Máximo Hernández Ángeles', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(117, 111, 'Protección de Líneas de Transmisión Utilizando La Transformada Wavelets', '', 'José Leonardo Guardado Zavala', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(118, 112, 'INTERPRETACIÓN DEL COMPORTAMIENTO DINÁMICO DE LAS ARMÓNICAS EN CIRCUITOS ELÉCTRICOS', '', 'Manuel Madrigal Martínez ', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(119, 113, 'Diseño y Construcción Prototipo de un Inversor monofásico de Salida Sinusoidal con Reducción de Contenido Armónico para un Sistema de Generación Fotovoltaico', '', 'Domingo Torres Lucio', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(120, 114, 'ANÁLISIS DEL MECANISMO DE RELAJACIÓN DE ESFUERZOS  DE UNA ALEACIÓN  EUTECTOIDE Zn-Al-Ag CON 4% DE PESO EN PLATA  (ZINAG)', '', ' Lourdes Sánchez Mondragón', 2016, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(121, 115, 'DISEÑO Y CONSTRUCCIÓN DE UN EQUIPO DE ELECTROCIRUGÍA MONOPOLAR', '', 'Víctor Hugo Olivares Peregrino; Javier Correa Gómez', 2012, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(122, 116, 'DISEÑO DE CONTROLES DISCRETOS DE TIRO DE CARGA MANUAL Y/O AUTOMÁTICO POR ANÁLISIS DE SENSIBILIDADES', '', 'José Horacio Tovar Hernández ', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(123, 117, 'Evaluación del efecto de la porosidad con gradiente en la resistencia de materiales de Ti-6Al-4V', '', 'Pedro Garnica González; Luis Rafael Olmos Navarrete', 2018, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(124, 118, 'Algoritmos metaheurísticos aplicados al problema de despacho económico en sistemas eléctricos de potencia', '', 'Francisco Cisneros Torres ', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(125, 119, 'Modelo matemático de un aerogenerador basado en sus características mecánicas', '', 'Adriana del Carmen Téllez Anguiano;  José Antonio Gutiérrez Gnecchi', 2016, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(126, 120, 'METODOLOGÍA PARA REDUCIR LA RESONANCIA SUBSÍNCRONA EN UNIDADES DE GENERACIÓN TERMOELÉCTRICAS CON LÍNEAS DE TRANSMISIÓN CON COMPENSACIÓN SERIE', '', 'Máximo Hernández Ángeles ', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(127, 121, 'Control de Oscilaciones en SEP’S Mediante el Uso de Estabilizador de Sistemas de Potencia Sintonizado Utilizando Algoritmo Genético', '', 'Francisco Cisneros Torres', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(128, 122, 'EFECTO DE LA TURBULENCIA SOBRE LA ESTABILIDAD DEL RÉGIMEN DE CAPA DE VAPOR EN PROBETAS TEMPLADAS POR CONVECCIÓN FORZADA', '', 'HÉCTOR JAVIER VERGARA HERNÁNDEZ ', 2014, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(129, 123, 'Modelado del Cable de Potencia para Análisis Armónico en Estado Dinámico', '', 'José de Jesús Chávez Muro ', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(130, 124, 'DISEÑO Y CONSTRUCCIÓN DE UN REACTOR VARIABLE DE ENTREHIERRO VIRTUAL', '', ' Enrique Melgoza Vázquez', 2015, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(131, 125, 'TOPOLOGÍA DE UN CONVERTIDOR PARA SISTEMAS FOTOVOLTAICOS AISLADOS CON MPPT UTILIZANDO LA TÉCNICA P&O', '', 'DOMINGO TORRES LUCIO', 2018, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(132, 126, 'METODOLOGIA PARA LA SIMULACION DE CIRCUITOS ELECTRICOS Y MAGNETICOS ACOPLADOS ', '', 'Enrique Melgoza Vázquez ', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(133, 127, 'DISEÑO, SIMULACIÓN E IMPLEMENTACIÓN DE UN HVDC-B2B BASADO EN TOPOLOGÍA MMC', '', 'EDGAR LENYMIRKO MORENO GOYTIA', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(134, 128, 'Modelado y Análisis Dinámico de un PMU para Protección de Área Amplia en ATP/EMTP', '', ' José Leonardo Guardado Zavala ', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(135, 129, 'Metodología de localización de fallas de alta impedancia en líneas aéreas de transmisión', '', 'Héctor Francisco Ruíz Paredes', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(136, 130, 'SISTEMA DE POTENCIA APLICADO A LÁMPARA LED, PARA CULTIVOS URBANOS', '', 'José Antonio Gutiérrez Gnecchi; Enrique Reyes Archundia', 2019, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(137, 131, 'Análisis Comparativo de Medidas de Centralidad en Sistemas Eléctricos de Potencia', '', 'Francisco Rivas Dávalos', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(138, 132, 'SISTEMA HÍBRIDO PARA LA DETERMINACIÓN DE LOS AJUSTES DE SISTEMAS DE EXCITACIÓN DE GENERADORES SÍNCRONOS', '', 'Máximo Hernández Ángeles', 2011, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(139, 133, 'MÉTODOS ANALÍTICOS EN EL CÁLCULO DE IMPEDANCIAS DE TRANSFORMADORES A ALTAS FRECUENCIAS ', '', 'Serguei Maximov', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(140, 134, 'EFECTO EN EL NODO DE INTERCONEXIÓN DEBIDO A LA INTEGRACIÓN DE GENERACIÓN HÍBRIDA RENOVABLE', '', 'Manuel Madrigal Martínez', 2013, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(141, 135, 'PLANIFICACIÓN DE LA EXPANSIÓN DE LA TRANSMISIÓN EN SISTEMAS ELÉCTRICOS DE POTENCIA MEDIANTE UN ALGORITMO DE ENJAMBRES DE PARTÍCULAS', '', 'Guillermo Gutiérrez Alcaraz ', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(142, 136, 'Metodología para Reemplazo de Equipo Envejecido en Sistemas Eléctricos', '', 'Francisco Rivas Dávalos', 2010, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(143, 137, 'Modelo Multietapa para la Prestación y Remuneración del Servicio Auxiliar de Control de Voltaje y Potencia Reactiva en Mercados de Electricidad', '', 'José Horacio Tovar Hernández ', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(144, 138, 'MODELO HÍBRIDO PARA EL ANÁLISIS DE DESCARGAS ATMOSFÉRICAS DIRECTAS EN SUBESTACIONES ELÉCTRICAS', '', 'José Leonardo Guardado Zavala', 2019, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(145, 139, 'Modelo de mantenimiento correctivo con profundidad de reparación variable para equipos y sistemas eléctricos', '', 'Serguei Maximov', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(146, 140, 'REDISEÑO DE UN DISTRIBUIDOR TIPO DELTA PARA PALANQUILLA UTILIZANDO SIMULACIÓN FÍSICA Y SIMULACIÓN MATEMÁTICA', '', 'José Ángel Ramos Banderas ', 2011, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(147, 141, 'CONTROL DE LA TRANSMISIÓN DE POTENCIA EN SISTEMAS HVDC ', '', 'Máximo Hernández Ángeles', 2010, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(148, 142, 'Inversor Resonante para Horno de Inducción Magnética a 120A', '', 'Fernando Martínez Cárdenas', 2013, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(149, 143, 'PROCESAMIENTO DE IMÁGENES PARA IDENTIFICAR BAAR EN BACILOSCOPIAS DE DIAGNÓSTICO DE TUBERCULOSIS PULMONAR', '', 'ADRIANA DEL CARMEN TÉLLEZ ANGUIANO; MIGUELANGEL FRAGA AGUILAR', 2016, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(150, 144, 'ESTUDIO DEL ESTADO DE DEFORMACION EN ALUMINIO CON ENSAYOS DE  PUNZONADO EN CALIENTE POR EL METODO DE ELEMENTO FINITO', '', 'Pedro Garnica González', 2010, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-11'),
(151, 145, 'Diseño y Construcción de un Algoritmo de Detección y Localización de Fallas para Líneas de Transmisión Compensadas con TCSC, Basado en µC', '', 'Enrique Reyes Archundia; José Antonio Gutiérrez Gnecchi', 2016, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(152, 146, 'MITIGACIÓN DE TRANSITORIOS DE MANIOBRA EN BANCOS DE TRANSFORMADORES ', '', 'Enrique Melgoza Vázquez ', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(153, 147, 'EVALUACIÓN DE PÉRDIDAS ECONÓMICAS DEBIDO A DISTURBIOS QUE AFECTAN LA CALIDAD DE LA ENERGÍA ELÉCTRICA EN LA INDUSTRIA', '', 'Manuel Madrigal Martínez', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(154, 148, 'Modelo de Corto Plazo Bajo Incertidumbre para el Análisis de Oportunidades de Inversión de Compañías Generadoras de Electricidad', '', 'Guillermo Gutiérrez Alcaraz ', 2009, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(155, 149, 'Modelo din´amico de un sistema de anillo de thomson', '', 'Serguei Maximov', 2019, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-11'),
(156, 150, 'ANÁLISIS Y DISEÑO DE FUENTES DE ALIMENTACIÓN PARA SISTEMAS DE ILUMINACIÓN DE ESTADO SÓLIDO PARA POTENCIAS DE 25 A 50W', '', 'Javier Correa Gómez', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-11'),
(157, 151, 'ANÁLISIS DE LAS PÉRDIDAS DE TEMPERATURA EN EL ACERO LÍQUIDO DE UN HORNO OLLA DURANTE LA INYECCIÓN DE ARGÓN', '', ' CONSTANTIN ALBERTO HERNÁNDEZ BOCANEGRA ', 2018, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(159, 153, 'ESTUDIO CINÉTICO DE LA FORMACIÓN Y DESCOMPOSICIÓN DE AUSTENITA DURANTE EL CALENTAMIENTO Y ENFRIAMIENTO CONTINUO DE UN ACERO AWS', '', 'OCTAVIO VÁZQUEZ GÓMEZ ', 2017, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(160, 154, 'EFECTO DEL MATERIAL DE APORTE EMPLEADO EN EL PROCESO BRAZING SOBRE LAS PROPIEDADES MECÁNICAS DE LAS ALEACIONES DE COBRE PARA INDUCTORES ', '', 'FRANCISCO REYES CALDERÓN', 2017, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(161, 155, 'Estudio de la rapidez de calentamiento y contenido de cromo sobre la cinética de formación de austenita durante calentamiento continuo del acero', '', 'PEDRO GARNICA GONZÁLEZ', 2014, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(162, 156, 'FABRICACIÓN EN LABORATORIO DE UN ACERO EXPERIMENTAL DE MICROESTRUCTURA COMPLEJA (COMPLEX PHASE STEEL)', '', 'PEDRO GARNICA GONZALEZ', 2017, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(163, 157, 'ESTUDIO DE LA TRANSFERENCIA DE AZUFRE ENTRE EL ACERO Y LA ESCORIA DURANTE LA AGITACIÓN EN EL HORNO OLLA MEDIANTE SIMULACIÓN MATEMÁTICA', '', 'CONSTANTIN ALBERTO HERNÁNDEZ BOCANEGRA', 2017, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(164, 158, 'FABRICACIÓN DE MATERIALES DE REFERENCIA EN ACEROS DE MATRIZ ESPECÍFICA', '', 'EDUARDO HURTADO DELGADO', 2008, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(165, 159, 'OBTENCIÓN Y CARACTERIZACION DE PELÍCULAS DE Ti A PARTIR DE TETRAKIS(DIMETILAMINO)TITANIO, MEDIANTE MOCVD', '', 'MA. DE LOURDES MONDRAGÓN SÁNCHEZ', 2008, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(166, 160, 'EVOLUCIÓN MICROESTRUCTURAL DE UN ACERO MICROALEADO CON VTI-MO DURANTE LA DEFORMACIÓN EN CALIENTE POR EL MÉTODO DE ELEMENTOS FINITOS', '', 'PEDRO GARNICA GONZALEZ ', 2008, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(167, 161, 'ESTUDIO DE LA REMOCIÓN DE INCLUSIONES MEDIANTE LA INYECCIÓN DE GAS EN EL DISTRIBUIDOR DE COLADA CONTINUA DE ACERO', '', 'JOSÉ DE JESÚS BARRETO SANDOVAL', 2008, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(168, 162, 'MODELACIÓN MATEMÁTICA DE LA RADIACIÓN DEL ARCO ELÉCTRICO DE CORRIENTE ALTERNA EN UN HORNO DE ARCO ELÉCTRICO', '', 'GUILLERMO GUTIÉRREZ GNECHI', 2009, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(169, 163, 'CARACTERIZACIÓN MICROESTRUCTURAL Y MAGNÉTICA DE PELÍCULAS DE Fe-Co, OBTENIDAS POR LA TÉCNICA MOCVD', '', 'MA. DE LOURDES MONDRAGÓN SÁNCHEZ', 2009, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(170, 164, 'CARACTERIZACIÓN MICROESTRUCTURAL  Y DETERMINACIÓN DEL CICLO DE HISTÉRESIS Y PERMEABILIDAD MAGNÉTICA DE PELÍCULAS DELGADAS DE Fe-Ni OBTENIDAS POR LA TÉCNICA MOCVD ', '', 'MA. DE LOURDES MONDRAGÓN SÁNCHEZ', 2011, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(171, 165, 'MODELACIÓN MATEMÁTICA DE LA FUSIÓN DE FIERRO ESPONJA EN HEA BAJO CONDICIONES DE FLUJO MULTIFÁSICO', '', 'Alberto Conejo Nava', 2011, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(172, 166, 'TRATAMIENTO TÉRMICO DE RELEVADO DE ESFUERZOS EN UN ACERO INOXIDABLE AUSTENÍTICO 304L SOLDADO MEDIANTE EL PROCESO GTAW', '', 'FRANCISCO REYES CALDERÓN ', 2015, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(173, 167, 'OPTIMIZACIÓN DE CONTORNOS DE EQUIPO ELÉCTRICO BASADA EN UN ALGORITMO GENÉTICO ', '', 'Enrique Melgoza Vázquez ', 2012, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(174, 168, 'Pago de incentivo nodal basado en la máxima capacidad de entrega de energía nodal', '', 'Guillermo Gutiérrez Alcaraz ', 2017, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(175, 169, 'PROTECCIÓN DE SOBRECORRIENTE ADAPTABLE UTILIZANDO REDES NEURONALES', '', 'Héctor Francisco Ruiz Paredes; José Leonardo Guardado Zavala ', 2008, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(176, 170, 'SISTEMA DE MONITOREO DE VARIABLES ELÉCTRICAS   UTILIZANDO INSTRUMENTACIÓN VIRTUAL PARA SISTEMAS ELÉCTRICOS INDUSTRIALES ', '', 'Domingo Torres Lucio ', 2012, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(177, 171, 'Estrategias para la maximización del beneficio económico en una compañía de generación eléctrica bajo incertidumbre', '', 'Guillermo Gutiérrez Alcaraz ', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(178, 172, 'PROCEDIMIENTO DE INTERCONEXIÓN DE SISTEMAS FOTOVOLTAICOS A LA RED PARA PEQUEÑA, MEDIANA Y GRAN ESCALA', '', 'Manuel Madrigal Martínez ', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(179, 173, 'Simulación Matemática de las Oscilaciones Superficiales del Sistema Acero-Escoria-Aire del Molde de Colada Continua para Planchón', '', 'Enrique Torres Alonso ', 2016, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(180, 174, 'METODOLOGÍA DE DOS FASES PARA LA COORDINACIÓN A CORTO PLAZO DE FUENTES DE ENERGÍA RENOVABLES INTERMITENTES, SISTEMAS DE ALMACENAMIENTO Y FUENTES CONVENCIONALES ', '', 'Guillermo Gutiérrez Alcaraz ', 2013, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(181, 175, 'CUANTIFICACIÓN DE PRECIPITADOS NANOMÉTRICOS POR AFM EN MATRICES DE ACERO MICROALEADO DEFORMADO ISOTÉRMICAMENTE', '', 'PEDRO GARNICA GONZÁLEZ', 2012, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(182, 176, 'Cálculo del tiempo de vida del papel aislante de un transformador de potencia a través del cálculo de la temperatura del punto más caliente basado en el IEEE Standard C57.92-1981', '', 'Francisco Rivas Dávalos ', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(183, 177, 'SÍNTESIS Y CARACTERIZACIÓN DE NANOALAMBRES DE ÓXIDO DE ZINC (ZnO) OBTENIDOS MEDIANTE EL MÉTODO DE FASES: VAPOR-LÍQUIDO-SÓLIDO (VLS)', '', 'María de Lourdes Mondragón Sánchez ', 2015, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(184, 178, 'DISEÑO Y CONSTRUCCIÓN DE UN POTENCIOSTATO PORTÁTIL BASADO EN MICROCONTROLADOR', '', 'José Antonio Gutiérrez Gnecchi ', 2012, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-12'),
(185, 179, 'DIVISIÓN DE ESTUDIOS DE POSTGRADO E INVESTIGACIÓN PROGRAMA DE GRADUADOS EN METALURGIA', '', 'ALBERTO CONEJO NAVA ', 2014, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(186, 180, 'Efecto del tratamiento térmico post soldadura sobre la presencia de ferrita delta-δ en la zona parcialmente fundida de un acero inoxidable martensítico 12Cr-1Mo', '', 'FRANCISCO REYES CALDERÓN ', 2019, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(187, 181, 'INFLUENCIA DE LA RAPIDEZ DE DEFORMACIÓN SOBRE LA RESISTENCIA A LA RELAJACIÓN DE ESFUERZOS BAJO CONDICIONES DE TENSIÓN EN LA ALEACIÓN EUTECTOIDE SUPERPLÁSTICA Zn-22%Al-4%Ag', '', ' Guillermo Gutiérrez Gnechi ', 2018, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-12'),
(188, 182, 'UN MÉTODO MEJORADO DE DISEÑO DE  MOTORES DE CORRIENTE DIRECTA SIN ESCOBILLAS', '', 'Enrique Melgoza Vázquez', 2013, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(189, 183, 'Evaluación de Algoritmos de Estimación de Fasores en un Simulador Digital en Tiempo Real', '', 'Guillermo Gutiérrez Alcaraz ', 2019, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12');
INSERT INTO `tesis` (`idDoc`, `idTesis`, `titulo`, `autor`, `asesor`, `fecha`, `nivel`, `isbn`, `departamento`, `abstract`, `fechaSubida`) VALUES
(190, 184, 'Cálculo de perfiles de temperatura en las regiones de las boquillas en el tanque del transformador', '', 'Serguei Maximov', 2019, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(191, 185, 'ANÁLISIS TRANSITORIO DE SISTEMAS DE PUESTA A TIERRA CONSIDERANDO LA IONIZACIÓN DEL SUELO ', '', 'José Leonardo Guardado Zavala ', 2008, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(192, 186, 'Desarrollo de estrategias de modulacin para topologas de convertidores electrnicos de conmutacin forzada utilizando instrumentacin virtual y electrnica digital', '', 'Edgar Lenymirko Moreno Goytia ', 2012, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(193, 187, 'Algoritmo Genético Aplicado al Despacho Económico con Efecto de Apertura de Válvulas, Emisiones Contaminantes y la Penetración de Energías Renovables', '', 'Francisco Cisneros Torres', 2019, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(194, 188, 'DISEÑO Y CONSTRUCCIÓN DE UN MICROINVERSOR DOBLE BOOST PARA APLICACIONES FOTOVOLTAICAS ', '', 'Domingo Torres Lucio ', 2016, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(195, 189, 'DISEÑO Y CONSTRUCCIÓN DE UN MICROINVERSOR DOBLE BOOST PARA APLICACIONES FOTOVOLTAICAS ', '', 'Domingo Torres Lucio ', 2016, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(196, 190, 'Conception and Development of a Photovoltaic Inverter with  Novel Integrated Electric DC Arc Fault Detection Technique', '', 'Manuel Madrigal Martínez', 2019, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(197, 191, 'MÉTODO MATRICIAL PARA EL ANÁLISIS DE CONFIABILIDAD DE SISTEMAS DE TRANSMISIÓN HVDC', '', 'Francisco Rivas Dávalos', 2018, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(198, 192, 'COSTOS ASOCIADOS A LA COMERCIALIZACIÓN DE ENERGÍA ELÉCTRICA POR PARTE DE LOS SUMINISTRADORES EN EL MERCADO ELÉCTRICO MEXICANO', '', 'Héctor Francisco Ruiz Paredes', 2018, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(199, 193, 'Análisis de Vulnerabilidad de Sistemas de Potencia mediante Teoría de Redes Complejas', '', 'Héctor Francisco Ruiz Paredes', 2016, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-12'),
(200, 194, 'ANALIZADOR DE ONDA INCIDENTE Y REFLEJADA DE ONDA DE PULSO UTILIZANDO SEÑALES DE VOLUMEN Y PRESIÓN ARTERIALES', '', 'Rodolfo Serafín González Garza', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-12'),
(201, 195, 'DISEÑO Y CONSTRUCCIÓN DE UNA FUENTE DE CORRIENTE BASADA EN AMPLIFICADORES OPERACIONALES DE TRANSCONDUCTANCIA PARA MEDICIONES DE IMPEDANCIA', '', 'José Antonio Gutiérrez Gnecchi', 2015, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-12'),
(202, 196, 'DESARROLLO DE ELECTRÓNICA DE POTENCIA UTILIZANDO COMO FUENTE DE ENERGÍA LA BAT-GEN', '', 'Adriana del Carmen Téllez Anguiano', 2014, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-12'),
(203, 197, 'Sistema de Detección Mínimo de Fallas para Sistemas de Audio Dolby 5.1 Empleando Transformada Rápida de Fourier', '', 'Gerardo Marx Chávez Campos', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-12'),
(204, 198, 'Sistema de detección de fallas basado en observadores para un aerogenerador', '', 'Adriana del Carmen Téllez Anguiano', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-12'),
(205, 199, 'Modelo Termo-Eléctrico en SPICE para un LED de Tecnología Chip-On-Board', '', 'Gerardo Marx Chavez-Campos', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-12'),
(206, 200, 'ANÁLISIS Y DESARROLLO DE UN SISTEMA FOTOVOLTAICO CONECTADO A LA RED ELÉCTRICA BASADO EN UN INVERSOR MULTINIVEL PARA EL CONTROL DE POTENCIA ACTIVA Y REACTIVA', '', 'José Luis Monroy Morales', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-03-12'),
(207, 201, 'OPTIMIZACIÓN DE UN DISTRIBUIDOR ASÍMETRICO TIPO DELTA PARA COLADA CONTINUA MEDIANTE SIMULACIÓN MATEMÁTICA', '', 'Enrique Torres Alonso; Héctor Javier Vergara Hernández', 2016, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(208, 202, 'OPTIMIZACIÓN DE UN DISTRIBUIDOR ASÍMETRICO TIPO DELTA PARA COLADA CONTINUA MEDIANTE SIMULACIÓN MATEMÁTICA', '', 'Enrique Torres Alonso; Héctor Javier Vergara Hernández', 2016, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(209, 203, 'Caracterización Térmica y Microestructural de los Ciclos de Recalentamiento de Palanquillas 1080', '', 'Octavio Vázquez Gómez; Héctor Javier Vergara Hernández', 2016, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(210, 204, 'Desarrollo de pruebas de plasticidad en láminas metálicas de grado automotriz.', '', 'Israel Aguilera Navarrete; Francisco Reyes Calderón', 2016, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(211, 205, 'CUANTIFICACIÓN DEL RELEVADO DE ESFUERZOS POR TEMPER BEAD TECHNIQUE (TBT) EN UN ACERO INOXIDABLE AUSTENÍTICO AISI 304L', '', 'FRANCISCO REYES CALDERÓN; LEONEL CEJA CARDENAS', 2016, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(212, 206, 'CUANTIFICACIÓN DE FASES POR DIFRACCIÓN DE RAYOS X EN UN ACERO DE DOBLE FASE DF590', '', 'Pedro Garnica Gonzales; Juan José Uribe Galán', 2013, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(213, 207, 'Fabricación en laboratorio de un acero experimental de microestructura Doble Fase', '', 'PEDRO GARNICA GONZALÉZ', 2017, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(214, 208, 'METODOLOGÍA PARA COMBINAR ACEROS ELÉCTRICOS EN TRANSFORMADORES DE POTENCIA', '', 'Enrique Melgoza Vázquez; Juan Carlos Olivares Galván', 2013, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-03-19'),
(215, 209, 'ESTUDIO DEL ARRASTRE DE ESCORIA DURANTE LA OPERACIÓN DE VACIADO DE UNA OLLA', '', 'José Ángel Ramos Banderas; José de Jesús Barreto Sandoval', 2009, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(216, 210, 'ESTUDIO DEL COMPORTAMIENTO DEL FLUJO DE ACERO LÍQUIDO EN UN MOLDE PARA PALANQUILLA A CHORRO ABIERTO Y CON BUZA SUMERGIDA', '', 'José Ángel Ramos Banderas; José de Jesús Barreto Sandoval; Saúl García Hernández', 2009, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(217, 211, 'ESTUDIO DE LA FLUIDODINÁMICA DEL BAÑO METÁLICO  DURANTE LA INYECCIÓN DE ARGÓN EN LA OLLA EMPLEANDO  TAPONES POROSOS SIN Y CON DESGASTE', '', 'José Ángel Ramos Banderas; José de Jesús Barreto Sandoval ', 2010, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(218, 212, 'ESTUDIO DE LA INTERACCIÓN FE-NI CODEPOSITADOS POR CVD (DEPOSITACIÓN QUÍMICA EN FASE VAPOR)', '', 'LOURDES MONDRAGÓN SANCHEZ', 2011, 'Maestria', 'undefined', 'Ciencias en metalurgia', 'undefined', '2020-03-19'),
(219, 213, 'Multiagentes distribuidos programables vía web para minería de datos', '', 'Rogelio Ferreira Escutia', 2006, 'Maestria', 'undefined', 'Sistemas computacionales', 'undefined', '2020-03-19'),
(220, 214, 'MODELO MATEMÁTICO PARA LA DETECCIÓN DE ANOMALIAS EN UN SERVIDOR', '', 'JUAN MANUEL GARCÍA GARCÍA', 2006, 'Maestria', 'undefined', 'Sistemas computacionales', 'undefined', '2020-03-19'),
(224, 215, 'Estrategias para la maximización del beneficio económico en una compañía de generación eléctrica bajo incertidumbre', '', 'Guillermo Gutiérrez Alcaraz', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(225, 216, 'FLUJOS ÓPTIMOS DE POTENCIA CON RESTRICCIONES DE SEGURIDAD MEDIANTE MATRICES DE SENSIBILIDADES LINEALES', '', 'Guillermo Gutiérrez Alcaraz', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(226, 217, 'Asignación Preventiva de Unidades con Restricciones de Seguridad (PSCUC), Criterio de Seguridad N-k y Pérdidas por Transmisión', '', 'GUILLERMO GUTIÉRREZ ALCARAZ', 2019, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(227, 218, 'PLANIFICACIÓN DE LA EXPANSIÓN DE LA TRANSMISIÓN EN SISTEMAS ELÉCTRICOS DE POTENCIA MEDIANTE UN ALGORITMO DE ENJAMBRES DE PARTÍCULAS', '', 'Guillermo Gutiérrez Alcaraz', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(228, 219, 'Pago de incentivo nodal basado en la máxima capacidad de entrega de energía nodal', '', 'Guillermo Gutiérrez Alcaraz,  J. Horacio Tovar Hernández', 2017, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(229, 220, 'Conception and Development of a Photovoltaic Inverter with Novel Integrated Electric DC Arc Fault Detection Technique', '', 'Manuel Madrigal Martínez, Domingo Torres Lucio', 2019, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(230, 221, 'ANÁLISIS DEL BALANCE LOCAL DE ENERGÍA CON GENERACIÓN RENOVABLE EN EL SECTOR ELÉCTRICO MEXICANO', '', 'MANUEL MADRIGAL MARTINEZ', 2018, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(231, 222, 'ANÁLISIS DEL BALANCE LOCAL DE ENERGÍA CON GENERACIÓN RENOVABLE EN EL SECTOR ELÉCTRICO MEXICANO', '', 'MANUEL MADRIGAL MARTINEZ', 2018, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(232, 223, 'Procedimiento de interconexión de sistemas fotovoltaicos a la red', '', 'Manuel Madrigal Martínez', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(233, 224, 'IMPACTO DE LA INTERCONEXIÓN DE SISTEMAS FOTOVOLTAICOS EN REDES ELÉCTRICAS DE DISTRIBUCIÓN', '', 'Manuel Madrigal Martínez', 2018, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(234, 225, 'INTERPRETACIÓN DEL COMPORTAMIENTO DINÁMICO DE LAS ARMÓNICAS EN CIRCUITOS ELÉCTRICOS', '', 'Manuel Madrigal Martínez', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(235, 226, 'Analisis del consumo de energa electrica en edificios de educacion media superior del estado de Michoacan', '', 'Manuel Madrigal Martnez', 2020, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(236, 227, 'Algoritmos metaheurísticos aplicados al problema de despacho económico en sistemas eléctricos de potencia', '', 'Francisco Cisneros Torres,  Juan Carlos Silva Chávez', 2017, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(237, 228, 'ALGORITMO GENETICO APLICADO AL DESPACHO ECONOMICO CON EFECTO DE APERTURA DE VALVULAS, EMISIONES CONTAMINANTES Y LA PENETRACION DE ENERGIAS RENOVABLES', '', 'FRANCISCO CISNEROS TORRES, JUAN CARLOS SILVA CHAVEZ', 2019, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-12'),
(238, 229, 'RESPUESTA TÉRMICA DE TRANSFORMADORES ELÉCTRICOS CON ACEITES VEGETALES', '', 'ENRIQUE MELOGOZA VAZQUEZ', 2018, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-14'),
(239, 230, 'IMPLEMENTACIÓN DE MODELOS DE MÁQUINAS ELÉCTRICAS EN UN ENTORNO DE SIMULACIÓN MULTI-DOMINIO', '', 'ENRIQUE MELGOZA VAZQUEZ', 2019, 'Maestria', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-07-14'),
(240, 231, 'ESQUEMA DE GESTION DE CARGA DE VEHICULOS ELECTRICOS EN ESTACIONAMIENTOS INTELIGENTES UTILIZANDO LOGICA DIFUSA', '', 'EDGAR LENYMIRKO MORENO GOYTIA', 2019, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-14'),
(241, 232, 'DISEÑO Y EVALUACIÓN DE ESQUEMAS DE PROTECCIÓN AVANZADOS PARA SISTEMAS MTDC EN AMBIENTE PSCAD', '', 'EDGAR LENYMIRKO MORENO GOYTIA', 2020, 'Maestria', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-14'),
(242, 233, 'DESARROLLO E IMPLEMENTACION DE UNA ESTRATEGIA DE CONTROL APLICADA A ENLACES DE CD BACK TO BACK VSC OPERANDO BAJO CONDICIONES DESBALANCEADAS', '', 'Edgar Lenymirko Moreno Goytia,  Juan Ramon Rodriguez Rodriguez', 2018, 'Doctorado', 'undefined', 'Ciencias en ingenieria electrica', 'undefined', '2020-07-14'),
(243, 234, 'Metodología de localización de fallas de alta impedancia en líneas aéreas de transmisión', '', 'Francisco Rivas Dávalos', 2020, 'Licenciatura', 'undefined', 'Ciencias en ingenieria electronica', 'undefined', '2020-08-09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `fechaNac` date NOT NULL,
  `ncontrol` varchar(8) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `telefono` varchar(10) NOT NULL,
  `idIns` int(255) NOT NULL,
  `area` varchar(255) NOT NULL,
  `contrasena` varchar(255) NOT NULL,
  `estado` varchar(30) NOT NULL,
  `tipou` char(1) NOT NULL,
  `token` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idUsuario`, `nombre`, `apellidos`, `sexo`, `fechaNac`, `ncontrol`, `correo`, `telefono`, `idIns`, `area`, `contrasena`, `estado`, `tipou`, `token`) VALUES
(13, 'Javier Iván', 'Madrigal Chávez', 'Hombre', '1998-05-27', '16121046', 'javier_madrigalchvz@outlook.com', '2147483647', 1, 'Ingenieria en Sistemas Computacionales', 'e74bdf8a1877e7d7713040749b7eacaf', 'activo', 'E', NULL),
(14, 'Brandon Gilberto', 'Ceja Cruz', 'Hombre', '1998-01-17', '16121018', 'brandonceja1701@gmail.com', '2147483647', 1, 'Ingenieria en Sistemas Computacionales', 'c3f4b986b6f17d49cbd619ce4fa3ec5b', 'activo', 'E', NULL),
(15, 'Aurelio Amaury', 'Coria Ramírez', 'Hombre', '1975-05-28', '', 'amaury.coria@itmorelia.edu.mx', '2147483647', 1, 'Ingenieria en Sistemas Computacionales', '643d57b7a4f934c5132fdc3827e0867e', 'activo', 'A', NULL),
(16, 'Asistente', 'Depi', 'Hombre', '1999-10-15', '16121099', 'repomichitm@gmail.com', '2147483647', 1, 'Ingenieria en Sistemas Computacionales', 'cf57cd277c7cbb6e2876ef28899126cf', 'activo', 'E', NULL),
(17, 'Abel Alberto', 'Pintor Estrada', 'Hombre', '1978-03-21', '', 'abel.pe@morelia.tecnm.mx', '2147483647', 1, 'Maestría en Sistemas Computacionales', '485970100931b91b24780c1455dc24c3', 'activo', 'A', 'p1wm35o4h9'),
(18, 'Héctor Javier', 'Vergara Hernández', 'Hombre', '1975-04-21', '', 'hvergarah@gmail.com', '2147483647', 1, 'Maestría en Ciencias en Metalurgia', 'f5bca52351c98c5b1edd81b8fa08cdca', 'activo', 'A', NULL),
(19, 'Alan Martin', 'Fuentes Pimentel', 'Hombre', '1998-01-22', '16121029', 'alana.z.o@hotmail.com', '2147483647', 1, 'Ingenieria en Sistemas Computacionales', 'eec7e20e501c66a29b91d3ac561abaad', 'activo', 'E', 'o2cmyhpevb'),
(20, 'Alan', 'Fuentes Pimentel', 'Hombre', '1999-12-25', '', 'hvergara@gmail.com', '2147483647', 1, 'Ingenieria en Materiales', 'e60a5ceec48109eab43611041ccefe78', 'activo', 'A', NULL),
(21, 'Luis Eduardo', 'Ugalde Caballero', 'Hombre', '1971-10-29', '', 'leugalde@yahoo.com.mx', '2147483647', 1, 'Doctorado en Ciencias en Ingenieria Eléctrica', '6c113b4827e3ce994a4f555d0dc85ddf', 'activo', 'A', NULL),
(22, 'FRANCISCO', 'Cisneros Torres', 'Hombre', '1964-05-28', '', 'francisco.ct@morelia.tecnm.mx', '3121570', 1, 'Maestría en Ciencias en Ingenieria Eléctrica', '008fb5a74640f4ae6ddf7e891a3c976d', 'activo', 'A', NULL),
(23, 'Rodrigo', 'Campos Vazquez', 'Hombre', '1999-10-15', '', 'agnikai@live.com.mx', '2147483647', 1, 'Ingenieria Eléctrica', 'af2c13accd084b2248784d3bee223d7e', 'activo', 'A', NULL),
(24, 'Hector Javier', 'Vergara', 'Hombre', '2000-01-01', '', 'hectorv@repomichitm.com', '1234567890', 1, '', '4072094f5a1e91154f4a9a3026a12b37', 'activo', 'L', NULL),
(25, 'Carlos Fabian', 'Escudero', 'Hombre', '2000-01-01', '', 'subdirector@repomichitm.com', '2345678901', 1, '', '4072094f5a1e91154f4a9a3026a12b37', 'activo', 'L', NULL),
(26, 'José Luis', 'Gil Vazquez', 'Hombre', '2000-01-01', '', 'director@repomichitm.com', '3456789012', 1, '', '4072094f5a1e91154f4a9a3026a12b37', 'activo', 'L', NULL),
(27, 'Victor Gabrielu', 'Hernandez Mendoza', 'Hombre', '1998-10-22', '16121036', 'victor@gmail.com', '4567890123', 1, 'Ingenieria en Sistemas Computacionales', '15c9072bf700c302faac644a30f4189f', 'activo', 'E', NULL),
(28, 'Martin', 'Fuentes Torres', 'Hombre', '1998-01-22', '16121030', 'martinftorres@hotmail.com', '4433762357', 1, 'Ingenieria en Sistemas Computacionales', 'eec7e20e501c66a29b91d3ac561abaad', 'activo', 'E', NULL),
(29, 'JESUS JOEL', 'CRISPIN PEREZ', 'Hombre', '2002-12-24', '20121415', 'jesuscrsipin728@gmail.com', '4433609564', 1, 'Ingenieria en Materiales', '0ebd80df9a9071d0e3667e5562412769', 'activo', 'E', NULL),
(30, 'Leonardo', 'Zavala Carbajal', 'Hombre', '1999-09-14', '18120204', 'leololdrive@gmail.com', '4431722816', 1, 'Ingenieria en Sistemas Computacionales', '72c761666953a104448d6ee086460f62', 'activo', 'E', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `academicos`
--
ALTER TABLE `academicos`
  ADD PRIMARY KEY (`idAcad`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`idArticulo`),
  ADD KEY `idDoc` (`idDoc`);
ALTER TABLE `articulos` ADD FULLTEXT KEY `titulo_abstract` (`titulo`,`abstract`);

--
-- Indices de la tabla `autores`
--
ALTER TABLE `autores`
  ADD PRIMARY KEY (`idAutor`);
ALTER TABLE `autores` ADD FULLTEXT KEY `nombre,apellidos` (`nombre`,`apellidos`);

--
-- Indices de la tabla `docs`
--
ALTER TABLE `docs`
  ADD PRIMARY KEY (`idDoc`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `docs-autores`
--
ALTER TABLE `docs-autores`
  ADD PRIMARY KEY (`idDocsAutores`),
  ADD KEY `idDoc` (`idDoc`),
  ADD KEY `idAutor` (`idAutor`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`idIns`);
ALTER TABLE `instituciones` ADD FULLTEXT KEY `ins_nombre` (`nombre`);

--
-- Indices de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD PRIMARY KEY (`idProyecto`),
  ADD KEY `idDoc` (`idDoc`);
ALTER TABLE `proyectos` ADD FULLTEXT KEY `titulo_desc` (`titulo`,`descripcion`);

--
-- Indices de la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD PRIMARY KEY (`idTesis`),
  ADD KEY `idDoc` (`idDoc`);
ALTER TABLE `tesis` ADD FULLTEXT KEY `titulo_abstract` (`titulo`,`abstract`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idUsuario`),
  ADD KEY `idIns` (`idIns`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `academicos`
--
ALTER TABLE `academicos`
  MODIFY `idAcad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `idArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `autores`
--
ALTER TABLE `autores`
  MODIFY `idAutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT de la tabla `docs`
--
ALTER TABLE `docs`
  MODIFY `idDoc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;

--
-- AUTO_INCREMENT de la tabla `docs-autores`
--
ALTER TABLE `docs-autores`
  MODIFY `idDocsAutores` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=252;

--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `idIns` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `proyectos`
--
ALTER TABLE `proyectos`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tesis`
--
ALTER TABLE `tesis`
  MODIFY `idTesis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=235;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`idDoc`) REFERENCES `docs` (`idDoc`);

--
-- Filtros para la tabla `docs`
--
ALTER TABLE `docs`
  ADD CONSTRAINT `docs_ibfk_3` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`idUsuario`);

--
-- Filtros para la tabla `docs-autores`
--
ALTER TABLE `docs-autores`
  ADD CONSTRAINT `docs-autores_ibfk_1` FOREIGN KEY (`idDoc`) REFERENCES `docs` (`idDoc`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `docs-autores_ibfk_2` FOREIGN KEY (`idAutor`) REFERENCES `autores` (`idAutor`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `proyectos`
--
ALTER TABLE `proyectos`
  ADD CONSTRAINT `proyectos_ibfk_1` FOREIGN KEY (`idDoc`) REFERENCES `docs` (`idDoc`);

--
-- Filtros para la tabla `tesis`
--
ALTER TABLE `tesis`
  ADD CONSTRAINT `tesis_ibfk_1` FOREIGN KEY (`idDoc`) REFERENCES `docs` (`idDoc`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idIns`) REFERENCES `instituciones` (`idIns`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
