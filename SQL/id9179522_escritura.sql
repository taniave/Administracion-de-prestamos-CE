-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 26-09-2019 a las 00:34:57
-- Versión del servidor: 10.3.16-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `id9179522_escritura`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `autor`
--

CREATE TABLE `autor` (
  `id_autor` smallint(32) NOT NULL,
  `nombre_autor` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `autor`
--

INSERT INTO `autor` (`id_autor`, `nombre_autor`) VALUES
(1, 'Jorge Luis Borges'),
(2, 'Tomas Melendo'),
(3, 'John Green'),
(4, 'John Kennedy Toole'),
(5, 'Pamela Morsi'),
(6, 'Dean Koontz'),
(7, 'Nora Roberts'),
(8, 'Jonathan Kellerman'),
(9, 'H. D.'),
(10, 'Leon Tolstoi'),
(11, 'Gorge R. R. Martin'),
(12, 'Patrick Rothfuss'),
(13, 'Alfredo Gorrichotegui'),
(14, 'Gisela Lopez'),
(15, 'Jimena Leizaola'),
(16, 'Adolfo Cordova'),
(17, 'Haroldo de Campos'),
(18, 'Juan Jose Arreola'),
(19, 'Chris Van Allsburg'),
(20, 'Joseph Conrad'),
(21, 'Gabriel Garcia Marquez'),
(22, 'Isabel Allende'),
(23, 'Noe Blancas Blancas'),
(24, 'Maria Eugenia Bear Sanz'),
(25, 'Mario Levrero'),
(26, 'Hermann Hesse'),
(27, 'Juan Rulfo'),
(28, 'Forrest Gander'),
(29, 'Sandol Stoddard'),
(30, 'Octavio Paz'),
(31, 'Susan Howe'),
(32, 'Alejandro Badillo'),
(33, 'Jorge Eduardo Eielson'),
(34, 'Juan Carlos Infante'),
(35, 'Abel Ibañez Galvan'),
(36, 'William Bronk'),
(37, 'Carlos Fuentes'),
(38, 'Guy Davenport'),
(39, 'Ana Rosa Gonzalez Matute'),
(40, 'Carol Kauffman'),
(41, 'Franz Kafka'),
(42, 'Gabriel Bernal Granados'),
(43, 'Mary Shelly'),
(44, 'Paul Metcalf'),
(45, 'Jean Luc Fromental'),
(46, ' Joëlle Jolivet'),
(47, 'Mardonio  Carballo'),
(48, ' Fabricio Vanden Broeck'),
(49, 'Angela Carter'),
(50, 'Haruki Murakami'),
(51, 'George Orwell'),
(52, 'Aldo'),
(53, 'Ricardo'),
(54, ' Migue');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion`
--

CREATE TABLE `devolucion` (
  `num_prestamo` smallint(6) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `devolucion`
--

INSERT INTO `devolucion` (`num_prestamo`, `id_alumno`, `fecha_prestamo`) VALUES
(1, 3362712, '2019-03-01'),
(2, 3357910, '2019-03-12'),
(3, 3382324, '2019-02-14'),
(4, 3382324, '2019-03-19'),
(5, 3384383, '2019-02-01'),
(6, 3332884, '2019-02-20'),
(7, 129153, '2019-02-22'),
(8, 3354268, '2019-03-15'),
(9, 3398238, '2019-03-10'),
(10, 3398238, '2019-01-13'),
(11, 3362712, '2019-04-01'),
(12, 3362712, '2019-04-18'),
(13, 3359684, '2019-04-19'),
(14, 3359684, '2019-04-22'),
(15, 33387694, '2019-04-25'),
(16, 129153, '2019-04-25'),
(17, 129153, '2019-04-26'),
(18, 3362712, '2019-05-05'),
(19, 7893546, '2019-05-05'),
(20, 937829, '2019-05-05'),
(21, 129153, '2019-01-01'),
(22, 3398238, '2019-01-02'),
(23, 3362712, '2019-01-23'),
(24, 967845, '2019-03-12'),
(25, 3362712, '2019-07-10'),
(26, 15639, '2019-05-08'),
(27, 937829, '2019-05-08'),
(28, 3398238, '2019-05-13'),
(30, 33387694, '2019-05-02'),
(31, 7893546, '2019-05-06'),
(32, 1236479, '2019-05-13'),
(33, 3362712, '2019-05-10'),
(36, 3384383, '2018-04-04'),
(39, 97884206, '2018-10-15'),
(40, 97884206, '2018-10-24'),
(42, 33589008, '2018-05-17'),
(44, 40957638, '2018-09-18'),
(47, 15221300, '2019-05-13'),
(49, 1236479, '2019-05-13'),
(50, 3104484, '2019-05-14'),
(51, 3354268, '2019-05-14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `devolucion_libro`
--

CREATE TABLE `devolucion_libro` (
  `num_prestamo` smallint(6) NOT NULL,
  `isbn` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `fecha_devolucion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `devolucion_libro`
--

INSERT INTO `devolucion_libro` (`num_prestamo`, `isbn`, `fecha_devolucion`) VALUES
(1, '84-8469-174-8-1-1', '2019-04-18'),
(2, '978-607-312-849-0-1', '2019-05-17'),
(3, '84-339-2042-1-1', '2019-03-01'),
(4, '0-308-78643-5-1', '2019-05-09'),
(5, '0-345-38437-7-1', '2019-03-05'),
(6, '0-515-14167-4-1', '2019-03-01'),
(7, '9788420633121-2', '2019-03-10'),
(8, '84-8469-174-8-1-1', '2019-04-17'),
(9, '978-607-415-469-6-1', '2019-04-16'),
(10, '0-515-14167-4-1', '2019-03-25'),
(10, '84-339-2042-1-1', '2019-01-15'),
(11, '84-8469-174-8-1-1', '2019-04-25'),
(12, '978-607-745-742-8-1', '2019-04-30'),
(13, '978-607-312-849-0-1', '2019-05-02'),
(14, '978-607-8314-08-9-1', '2019-05-02'),
(15, '978-607-525-293-3-1', '2019-05-07'),
(16, '978-607-16-4247-1', '2019-05-16'),
(17, '84-339-2042-1-1', '2019-05-15'),
(18, '84-206-3340-2', '2019-05-09'),
(19, '978-84-944942-0-8', '2019-05-07'),
(20, '9786074201703-1', '2019-05-22'),
(21, '978-607-7611-05-9', '2019-02-06'),
(22, '978-607-8314-00-3', '2019-02-04'),
(23, '978-607-8314-10-2', '2019-02-05'),
(24, '978-6070742255', '2019-05-07'),
(25, '978-607-16-5131-0', '2019-07-17'),
(26, '968-9215-01-9', '2019-05-15'),
(27, '968-9215-02-8', '2019-05-16'),
(28, '978-607-7611-20-2', '2019-05-15'),
(30, '978-607-400-997-2-1', '2019-05-13'),
(31, '978-607-8314-11-9', '2019-05-14'),
(32, '978-607-95655-9-6', '2019-06-04'),
(33, '978-607-7515-95-1-2', '2019-05-13'),
(36, '84-206-3340-2', '2018-09-04'),
(39, '978-607-95150-0-3', '2019-05-06'),
(40, '978-607-95655-2-7-1', '2019-05-14'),
(42, '978-607-8314-11-9-2', '2019-02-05'),
(44, '978-607-9436-20-9', '2018-10-10'),
(47, '978-607-8314-11-9-2', '2019-05-16'),
(49, '84-206-3340-2-2', '2019-05-21'),
(50, '978-607-429-444-6-1', '2019-05-24'),
(51, '0-308-78643-5-1', '2019-05-24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id` int(11) NOT NULL,
  `nombre` varchar(45) COLLATE latin1_spanish_ci NOT NULL,
  `ap_pat` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `correo` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id`, `nombre`, `ap_pat`, `correo`) VALUES
(33, 'ricardo', 'Vera', 'ricardo@upaep.mx'),
(15639, 'Carlos ', 'Vela', 'carlos.vela@upaep.edu.mx'),
(129153, 'Jonathan ', 'Reyes', 'jonathan.reyes@upaep.edu.mx'),
(937829, 'Maria', 'Rodriguez', 'maria.rodriguez@upaep.edu.mx'),
(967845, 'Pedro', 'Gonzalez', 'pedro.gonzalez@upaep.edu.mx'),
(1236479, 'Daniel', 'Barradas', 'daniel.barradas@upaep.edu.mx'),
(2128584, 'Cristal', 'Jimenez', 'cristal.jimenez@upaep.edu.mx'),
(3104484, 'Mariana', 'Aguilar', 'mariana.aguilar@upaep.edu.mx'),
(3332884, 'Ricardo', 'Ortiz', 'ricardojesus.ortiz@upaep.edu.mx'),
(3354268, 'Ana ', 'Soriano', 'anaimelda.soriano@upaep.edu.mx'),
(3357910, 'Elena', 'Aguirre', 'mariaelena.aguirre@upaep.edu.mx'),
(3359684, 'Alberto ', 'Rodriguez', 'alberto@upaep.edu.mx'),
(3362712, 'Tania', 'Vela', 'tania.vela@upaep.edu.mx'),
(3382324, 'Itzel', 'Reyes', 'itzel.reyes01@upaep.edu.mx'),
(3384383, 'Agustin', 'Salas', 'agustin.salas@upaep.edu.mx'),
(3398238, 'Diego', 'Sevilla', 'diegoaurelio.sevilla@upaep.edu.mx'),
(4569387, 'Laura', 'Taboada', 'laura.taboada@upaep.edu.mx'),
(7893546, 'Clara', 'Perez', 'clara.perez@upaep.edu.mx'),
(15221300, 'Cristina', 'Lara', 'cristina.lara@upaep.edu.mx'),
(33387694, 'Jorge', 'Rodriguez', 'jorge@upaep.edu.mx'),
(33589008, 'Dayra', 'Rosales', 'dayra.rosales@upaep.edu.mx'),
(40957638, 'Karla', 'Villa', 'karla.villa@upaep.edu.mx'),
(50884578, 'Jimena', 'Hernandez', 'jimena.hernandez@upaep.edu.mx'),
(72037550, 'Angel', 'Barbosa', 'angel.barbosa@upaep.edu.mx'),
(97884206, 'Guadalupe', 'Contreras', 'guadalupe.contreras@upaep.edu.mx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `isbn` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `nombre_libro` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `editorial` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `edicion` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `anio` year(4) NOT NULL,
  `pais_origen` varchar(100) COLLATE latin1_spanish_ci NOT NULL,
  `imagen` mediumblob NOT NULL,
  `estado` varchar(45) COLLATE latin1_spanish_ci DEFAULT 'Disponible'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`isbn`, `nombre_libro`, `editorial`, `edicion`, `anio`, `pais_origen`, `imagen`, `estado`) VALUES
('0-308-78643-5-1', 'No ordinary princess', 'Avon Books', 'First edition', 2004, 'United States of America', 0x2e2e2f494d472f7072696e636573612e6a7067, 'Disponible'),
('0-345-38437-7-1', 'Sole Survivor', 'Balllantine publishing books', 'First edition', 2001, 'United States of America', 0x2e2e2f494d472f736f6c652e6a7067, 'Disponible'),
('0-515-13287-X-1', 'Face the Fire', 'Jove Books', 'First edition', 2002, 'United States of America', 0x2e2e2f494d472f667565676f2e6a7067, 'Eliminado'),
('0-515-14167-4-1', 'Valley of silence', 'Jovel Novel: Penguin', 'First edition', 2000, 'United States of America', 0x2e2e2f494d472f76616c6c652e6a7067, 'Disponible'),
('0-553-56963-5-1', 'Blood Test', 'Bantam Books', 'First edition', 1995, 'United States of America', 0x2e2e2f494d472f626c6f6f642e6a7067, 'No disponible'),
('1234567891234', 'Como lidiar con ansiedad', 'Alumnos DWEB', 'Primera edición', 2019, 'Mécixo', 0x2e2e2f494d472f636f6d6f73657266656c697a2e6a7067, 'No disponible'),
('1234567891234-2', 'Como lidiar con ansiedad', 'Alumnos DWEB', 'Primera edición', 2019, 'Mécixo', 0x2e2e2f494d472f636f6d6f73657266656c697a2e6a7067, 'Disponible'),
('84-206-3340-2', 'Bajo las ruedas', 'Alianza editorial', 'Primera edición en \"Biblioteca de autor\"', 2001, 'España', 0x2e2e2f494d472f32303532373035342e6a7067, 'No disponible'),
('84-206-3340-2-2', 'Bajo las ruedas', 'Alianza editorial', 'Primera edición en \"Biblioteca de autor\"', 2001, 'España', 0x2e2e2f494d472f32303532373035342e6a7067, 'Disponible'),
('84-339-2042-1-1', 'La conjura de los necios', 'Anagrama', 'Vigesimo sexta edicion', 2006, 'Mexico', 0x2e2e2f494d472f6e6563696f732e6a7067, 'Disponible'),
('84-8469-174-8-1-1', 'El verdadero rostro del amor', 'Ediciones Internacionales Universitarias', 'Primera edicion', 2012, 'Mexico', 0x2e2e2f494d472f726f7374726f2e6a7067, 'Disponible'),
('968-9215-01-9', 'En medio de dos eternidades', 'Libros magenta', 'Primera edicion', 2007, 'Mexico', 0x2e2e2f494d472f34316d6c5372664c6d734c2e5f53583332375f424f312c3230342c3230332c3230305f2e6a7067, 'Disponible'),
('968-9215-01-9-2', 'En medio de dos eternidades', 'Libros magenta', 'Primera edicion', 2007, 'Mexico', 0x2e2e2f494d472f34316d6c5372664c6d734c2e5f53583332375f424f312c3230342c3230332c3230305f2e6a7067, 'No disponible'),
('968-9215-02-8', 'POE', 'Libros magenta', 'Primera edicion', 2007, 'Mexico', 0x2e2e2f494d472f36316a656f77345430684c2e6a7067, 'Disponible'),
('978-607-07-2046-1', 'Lo mejor de Octavio Paz', 'Seix Barral', 'Tercera Edicion', 2008, 'Mexico', 0x2e2e2f494d472f64657363617267612e6a7067, 'Disponible'),
('978-607-16-4247-1', 'El dragon blanco y otros personajes olvidados', 'Fondo de cultura economica', 'Primera Edicion', 2016, 'Mexico', 0x2e2e2f494d472f647261676f6e2e6a7067, 'Disponible'),
('978-607-16-5131-0', 'El misterio de huesopolis', 'Fondo de cultura economica', 'Primera edicion', 2017, 'Mexico', 0x2e2e2f494d472f696d6167655f31363436382e6a7067, 'Disponible'),
('978-607-16-5220-1-1', 'El jardi­n de Abdul Gasazi', 'Fondo de cultura economica', 'Primera Edicion', 2017, 'Mexico', 0x2e2e2f494d472f6a617264696e2e6a7067, 'Disponible'),
('978-607-310-594-1-1', 'El temor de un hombre sabio', 'Plaza Janes', 'Primera edicion', 2011, 'Mexico', 0x2e2e2f494d472f736162696f2e6a7067, 'Disponible'),
('978-607-312-849-0-1', 'Ciudades de Papel', 'Penguin Random House', 'primera edicion', 2010, 'Mexico', 0x2e2e2f494d472f63697564616465732e6a7067, 'Disponible'),
('978-607-316-618-8-1', 'Narrativa completa', 'Penguin Random House', 'Segunda Edicion', 2016, 'Mexico', 0x2e2e2f494d472f6e61727261746976612e6a7067, 'Disponible'),
('978-607-400-997-2-1', 'Wild Cards, el comienzo', 'Oceano', 'Primera edicion', 2010, 'Espana', 0x2e2e2f494d472f636f6d69656e7a6f2e6a7067, 'Disponible'),
('978-607-415-469-6-1', 'Ana Karenina', 'Tomo', 'Primera edicion', 2013, 'Mexico', 0x2e2e2f494d472f616e612e6a7067, 'Disponible'),
('978-607-429-444-6-1', 'El nombre del viento', 'Plaza Janes', 'Primera edicion', 2011, 'Mexico', 0x2e2e2f494d472f7669656e746f2e6a7067, 'Disponible'),
('978-607-525-293-3-1', 'Blanco roto', 'Benemerita Universidad Autonoma de Puebla', 'Primera edicion', 2017, 'Mexico', 0x2e2e2f494d472f3937383630373532353239332e474946, 'Disponible'),
('978-607-745-742-8-1', 'La hoguera de bronce', 'Secretaria de cultura', 'Primera Edicion', 2017, 'Mexico', 0x2e2e2f494d472f686f67756572612e706e67, 'Disponible'),
('978-607-7515-95-1-2', 'Cartas a Clara', 'CONACULTA', 'Primera edicion', 2012, 'México', 0x2e2e2f494d472f393738363037373531353935312e6a7067, 'Disponible'),
('978-607-7611-05-9', 'Peach Melba', 'Libros magenta', 'Primera ediciÃ³n', 2009, 'MÃ©xico', 0x2e2e2f494d472f6d656c62612e6a7067, 'Disponible'),
('978-607-7611-20-2', 'Cerdos', 'Libros magenta', 'Primera edicion', 2009, 'Mexico', 0x2e2e2f494d472f636572646f732e6a7067, 'Disponible'),
('978-607-8314-00-3', 'Armonia sexual', 'Libros magenta', 'Primera ediciÃ³n', 2013, 'Mexico', 0x2e2e2f494d472f73657875616c2e6a7067, 'Disponible'),
('978-607-8314-01-0', 'La inteligencia de Louis Agassiz', 'Libros magenta', 'Primera ediciÃ³n', 2013, 'MÃ©xico', 0x2e2e2f494d472f696e74656c6967656e6369612e676966, 'No disponible'),
('978-607-8314-08-9-1', 'Definicion hermetica', 'Libros magenta', 'Primera edicion', 2015, 'Mexico', 0x2e2e2f494d472f646566696e6963696f6e322e6a7067, 'Disponible'),
('978-607-8314-10-2', 'Nuevo mundo', 'Libros magenta', 'Primera ediciÃ³n', 2016, 'MÃ©xico', 0x2e2e2f494d472f626f6f6b2e706e67, 'Disponible'),
('978-607-8314-11-9', 'Eiko & Koma', 'Libros magenta', 'Primera edición', 2016, 'Mexico', 0x2e2e2f494d472f65696b6f2e6a7067, 'Disponible'),
('978-607-8314-11-9-2', 'Eiko & Koma', 'Libros magenta', 'Primera ediciÃ³n', 2016, 'Mexico', 0x2e2e2f494d472f65696b6f2e6a7067, 'Disponible'),
('978-607-8599-17-2-1', 'Pienso que pensaba', 'Ediciones Tecolote', 'Primera Edicion', 2018, 'Mexico', 0x2e2e2f494d472f7069656e736f2e6a7067, 'Disponible'),
('978-607-929-764-0', 'Piltlaijkuiloliamoch , el libro de las pequeñas letras', 'El dragón rojo', 'Primera edicion', 2017, 'México', 0x2e2e2f494d472f3937383630373734353637312e474946, 'No disponible'),
('978-607-9436-20-9', 'La cámara sangrienta', 'Sexto piso ', 'Segunda edición', 2016, 'Mexico', 0x2e2e2f494d472f393738383431353630313536322e6a7067, 'No disponible'),
('978-607-9436-21-6', 'Frankenstein', 'Sexto piso', 'Segunda Edicion', 2016, 'Mexico', 0x2e2e2f494d472f34314e4d35584f2b79554c2e6a7067, 'Disponible'),
('978-607-9436-97-1-1', 'El corazon de las tinieblas', 'Sexto piso', 'Primera Edicion', 2018, 'Mexico', 0x2e2e2f494d472f636f72617a6f6e2e6a7067, 'No disponible'),
('978-607-95150-0-3', 'El cuerpo de Giulia-no', 'Libros magenta', 'Primera ediciÃ³n', 2009, 'MÃ©xico', 0x2e2e2f494d472f656c63756572706f2e6a7067, 'Disponible'),
('978-607-95150-2-1', 'Mi Emily Dickinson', 'Libros magenta', 'Primera Edicion', 2010, 'Mexico', 0x2e2e2f494d472f656d696c792e6a7067, 'No disponible'),
('978-607-95655-2-7-1', 'Galaxias', 'Libros magenta', 'Primera Edicion', 2011, 'Mexico', 0x2e2e2f494d472f67616c61786961732e6a7067, 'Disponible'),
('978-607-95655-7-2', 'La gran cadena del ser', 'Libros magenta', 'Primera edicion', 2012, 'Mexico', 0x2e2e2f494d472f636164656e612e6a7067, 'No disponible'),
('978-607-95655-9-6', 'La mujer de los macacos', 'Libros Magenta', 'Primera Edicion', 2012, 'Mexico', 0x2e2e2f494d472f6c616d756a65722e6a7067, 'Disponible'),
('978-6070742255', 'La metamorfosis', 'Austral Mexico', 'Primera edicion', 2017, 'Mexico', 0x2e2e2f494d472f6d6574616d6f72666f7369732e6a7067, 'Disponible'),
('978-6074210040', 'Kafka en la orilla', 'Editorial planeta', 'Primera edicion', 2013, 'Mexico', 0x2e2e2f494d472f6d7572616b616d692e6a7067, 'Disponible'),
('978-84-8469-243-0-1', 'La pasion por lo real, clave del crecimiento humano', 'Ediciones Internacionales Universitarias', 'Primera edicion', 2008, 'Espana', 0x2e2e2f494d472f706173696f6e2e6a7067, 'Eliminado'),
('978-84-944942-0-8', 'Caza de conejos', 'Libros del zorro rojo', 'Primera ediciÃ³n', 2016, 'Polonia', 0x2e2e2f494d472f31363131373832332e6a7067, 'Disponible'),
('978-84-944942-0-8-2', 'Caza de conejos', 'Libros del zorro rojo', 'Primera ediciÃ³n', 2016, 'Polonia', 0x2e2e2f494d472f31363131373832332e6a7067, 'Disponible'),
('978-8499890944', '1984', 'DEBOLSILLO', 'Segunda Edicion', 2013, 'Mexico', 0x2e2e2f494d472f383157756e586f3067694c2e6a7067, 'No disponible'),
('978-968-411-181-3', 'Aura', 'Era', 'Primera ediciÃ³n', 1962, 'MÃ©xico', 0x2e2e2f494d472f617572612e6a7067, 'Disponible'),
('9786074201703-1', 'A la sombra del sombrero', 'Praxis', 'Primera edicion', 2016, 'Mexico', 0x2e2e2f494d472f6e6f652e4a5047, 'Disponible'),
('9788401022418-1', 'Largo petalo de mar', 'Plaza y Janes Editores', 'Primera edicion', 2019, 'EspaÃ±a', 0x2e2e2f494d472f69736162656c2e6a7067, 'Disponible'),
('9788420471839-1', 'Cien años de soledad', 'Alfaguara', 'Octava edicion', 2017, 'España', 0x2e2e2f494d472f3130302e6a7067, 'No disponible'),
('9788420633121-1', 'Ficciones', 'Alianza editorial', 'Primera edicion', 1994, 'Argentina', 0x2e2e2f494d472f66696363696f6e65732e6a7067, 'Disponible'),
('9788420633121-2', 'Ficciones', 'Alianza editorial', 'Primera edicion', 1994, 'Argentina', 0x2e2e2f494d472f66696363696f6e65732e6a7067, 'Eliminado'),
('9788466344227-1', 'Mas alla del invierno', 'DEBOLSILLO', 'Primera edicion', 2018, 'EspaÃ±a', 0x2e2e2f494d472f696e766965726e6f2e6a7067, 'Disponible'),
('9788466344227-2', 'Mas alla del invierno', 'DEBOLSILLO', 'Primera edicion', 2018, 'EspaÃ±a', 0x2e2e2f494d472f696e766965726e6f2e6a7067, 'Eliminado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libro_autor`
--

CREATE TABLE `libro_autor` (
  `isbn` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `num_autor` smallint(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `libro_autor`
--

INSERT INTO `libro_autor` (`isbn`, `num_autor`) VALUES
('0-308-78643-5-1', 5),
('0-345-38437-7-1', 6),
('0-515-13287-X-1', 7),
('0-515-14167-4-1', 7),
('0-553-56963-5-1', 8),
('1234567891234', 52),
('1234567891234', 53),
('1234567891234', 54),
('84-206-3340-2', 26),
('84-206-3340-2-2', 26),
('84-339-2042-1-1', 4),
('84-8469-174-8-1-1', 2),
('968-9215-01-9', 42),
('968-9215-01-9-2', 42),
('968-9215-02-8', 44),
('978-607-07-2046-1', 30),
('978-607-16-4247-1', 16),
('978-607-16-5131-0', 45),
('978-607-16-5131-0', 46),
('978-607-16-5220-1-1', 19),
('978-607-310-594-1-1', 12),
('978-607-312-849-0-1', 3),
('978-607-316-618-8-1', 18),
('978-607-400-997-2-1', 11),
('978-607-415-469-6-1', 10),
('978-607-429-444-6-1', 12),
('978-607-525-293-3-1', 24),
('978-607-745-742-8-1', 16),
('978-607-7515-95-1-2', 27),
('978-607-7611-05-9', 40),
('978-607-7611-20-2', 35),
('978-607-8314-00-3', 34),
('978-607-8314-01-0', 38),
('978-607-8314-08-9-1', 9),
('978-607-8314-10-2', 36),
('978-607-8314-11-9', 28),
('978-607-8314-11-9-2', 28),
('978-607-8599-17-2-1', 29),
('978-607-929-764-0', 47),
('978-607-929-764-0', 48),
('978-607-9436-20-9', 49),
('978-607-9436-21-6', 43),
('978-607-9436-97-1-1', 20),
('978-607-95150-0-3', 33),
('978-607-95150-2-1', 31),
('978-607-95655-2-7-1', 17),
('978-607-95655-7-2', 39),
('978-607-95655-9-6', 32),
('978-6070742255', 41),
('978-6074210040', 50),
('978-84-8469-243-0-1', 2),
('978-84-8469-243-0-1', 13),
('978-84-8469-243-0-1', 14),
('978-84-8469-243-0-1', 15),
('978-84-944942-0-8', 25),
('978-8499890944', 51),
('978-968-411-181-3', 37),
('9786074201703-1', 23),
('9788401022418-1', 22),
('9788420471839-1', 21),
('9788420633121-1', 1),
('9788420633121-2', 1),
('9788466344227-1', 22),
('9788466344227-2', 22);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `num_prestamo` smallint(6) NOT NULL,
  `id_alumno` int(11) NOT NULL,
  `fecha_prestamo` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`num_prestamo`, `id_alumno`, `fecha_prestamo`) VALUES
(1, 3362712, '2019-03-01'),
(2, 3357910, '2019-03-12'),
(3, 3382324, '2019-02-14'),
(4, 3382324, '2019-03-19'),
(5, 3384383, '2019-02-01'),
(6, 3332884, '2019-02-20'),
(7, 129153, '2019-02-22'),
(8, 3354268, '2019-03-15'),
(9, 3398238, '2019-03-10'),
(10, 3398238, '2019-01-13'),
(11, 3362712, '2019-04-01'),
(12, 3362712, '2019-04-18'),
(13, 3359684, '2019-04-19'),
(14, 3359684, '2019-04-22'),
(15, 33387694, '2019-04-25'),
(16, 129153, '2019-04-25'),
(17, 129153, '2019-04-26'),
(18, 3362712, '2019-05-05'),
(19, 7893546, '2019-05-05'),
(20, 937829, '2019-05-05'),
(21, 129153, '2019-01-01'),
(22, 3398238, '2019-01-02'),
(23, 3362712, '2019-01-23'),
(24, 967845, '2019-03-12'),
(25, 3362712, '2019-07-10'),
(26, 15639, '2019-05-08'),
(27, 937829, '2019-05-08'),
(28, 3398238, '2019-05-13'),
(29, 3382324, '2019-05-13'),
(30, 33387694, '2019-05-02'),
(31, 7893546, '2019-05-06'),
(32, 1236479, '2019-05-13'),
(33, 3362712, '2019-05-10'),
(34, 4569387, '2018-02-05'),
(35, 7893546, '2018-01-10'),
(36, 3384383, '2018-04-04'),
(37, 3384383, '2018-04-10'),
(38, 3384383, '2018-03-13'),
(39, 97884206, '2018-10-15'),
(40, 97884206, '2018-10-24'),
(41, 33589008, '2018-05-10'),
(42, 33589008, '2018-05-17'),
(43, 40957638, '2018-10-09'),
(44, 40957638, '2018-09-18'),
(45, 72037550, '2018-10-02'),
(46, 50884578, '2019-05-13'),
(47, 15221300, '2019-05-13'),
(48, 3362712, '2019-05-13'),
(49, 1236479, '2019-05-13'),
(50, 3104484, '2019-05-14'),
(51, 3354268, '2019-05-14'),
(52, 2128584, '2019-05-15'),
(53, 33, '2019-05-16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo_libro`
--

CREATE TABLE `prestamo_libro` (
  `num_prestamo` smallint(6) NOT NULL,
  `isbn` varchar(20) COLLATE latin1_spanish_ci NOT NULL,
  `estado` varchar(100) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `prestamo_libro`
--

INSERT INTO `prestamo_libro` (`num_prestamo`, `isbn`, `estado`) VALUES
(1, '84-8469-174-8-1-1', 'Devuelto'),
(2, '978-607-312-849-0-1', 'Devuelto'),
(3, '84-339-2042-1-1', 'Devuelto '),
(4, '0-308-78643-5-1', 'Devuelto'),
(5, '0-345-38437-7-1', 'Devuelto'),
(6, '0-515-14167-4-1', 'Devuelto'),
(7, '9788420633121-2', 'Devuelto'),
(8, '84-8469-174-8-1-1', 'Devuelto'),
(9, '978-607-415-469-6-1', 'Devuelto'),
(10, '0-515-14167-4-1', 'Devuelto'),
(10, '84-339-2042-1-1', 'Devuelto'),
(11, '84-8469-174-8-1-1', 'Devuelto'),
(11, '978-607-312-849-0-1', 'Devuelto'),
(11, '9788420633121-2', 'Devuelto'),
(12, '978-607-745-742-8-1', 'Devuelto'),
(13, '978-607-312-849-0-1', 'Devuelto'),
(14, '978-607-8314-08-9-1', 'Devuelto'),
(15, '978-607-525-293-3-1', 'Devuelto'),
(16, '978-607-16-4247-1', 'Devuelto'),
(17, '84-339-2042-1-1', 'Devuelto'),
(18, '84-206-3340-2', 'Devuelto'),
(19, '978-84-944942-0-8', 'Devuelto'),
(20, '9786074201703-1', 'Devuelto'),
(21, '978-607-7611-05-9', 'Devuelto'),
(22, '978-607-8314-00-3', 'Devuelto'),
(23, '978-607-8314-10-2', 'Devuelto'),
(24, '978-6070742255', 'Devuelto'),
(25, '978-607-16-5131-0', 'Devuelto'),
(26, '968-9215-01-9', 'Devuelto'),
(27, '968-9215-02-8', 'Devuelto'),
(28, '978-607-7611-20-2', 'Devuelto'),
(29, '978-607-8314-01-0', 'En prestamo'),
(30, '978-607-400-997-2-1', 'Devuelto'),
(31, '978-607-8314-11-9', 'Devuelto'),
(32, '978-607-95655-9-6', 'Devuelto'),
(33, '978-607-7515-95-1-2', 'Devuelto'),
(34, '978-607-929-764-0', 'En prestamo'),
(35, '968-9215-01-9-2', 'En prestamo'),
(36, '84-206-3340-2', 'Devuelto'),
(37, '978-607-95655-7-2', 'En prestamo'),
(38, '0-553-56963-5-1', 'En prestamo'),
(39, '978-607-95150-0-3', 'Devuelto'),
(40, '978-607-95655-2-7-1', 'Devuelto'),
(41, '978-607-95150-2-1', 'En prestamo'),
(42, '978-607-8314-11-9-2', 'Devuelto'),
(43, '978-607-9436-97-1-1', 'En prestamo'),
(44, '978-607-9436-20-9', 'Devuelto'),
(45, '978-607-9436-20-9', 'En prestamo'),
(46, '9788420471839-1', 'En prestamo'),
(47, '978-607-8314-11-9-2', 'Devuelto'),
(48, '84-206-3340-2', 'En prestamo'),
(49, '84-206-3340-2-2', 'Devuelto'),
(50, '978-607-429-444-6-1', 'Devuelto'),
(51, '0-308-78643-5-1', 'Devuelto'),
(52, '978-8499890944', 'En prestamo'),
(53, '1234567891234', 'En prestamo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario` varchar(255) COLLATE latin1_spanish_ci NOT NULL,
  `pswd` varchar(255) COLLATE latin1_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario`, `pswd`) VALUES
('admin', 'CE746');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`id_autor`);

--
-- Indices de la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD PRIMARY KEY (`num_prestamo`,`id_alumno`,`fecha_prestamo`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `devolucion_libro`
--
ALTER TABLE `devolucion_libro`
  ADD PRIMARY KEY (`num_prestamo`,`isbn`,`fecha_devolucion`),
  ADD KEY `isbn` (`isbn`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`isbn`);

--
-- Indices de la tabla `libro_autor`
--
ALTER TABLE `libro_autor`
  ADD PRIMARY KEY (`isbn`,`num_autor`),
  ADD KEY `num_autor` (`num_autor`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`num_prestamo`,`id_alumno`,`fecha_prestamo`),
  ADD KEY `id_alumno` (`id_alumno`);

--
-- Indices de la tabla `prestamo_libro`
--
ALTER TABLE `prestamo_libro`
  ADD PRIMARY KEY (`num_prestamo`,`isbn`),
  ADD KEY `isbn` (`isbn`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `autor`
--
ALTER TABLE `autor`
  MODIFY `id_autor` smallint(32) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `num_prestamo` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `devolucion`
--
ALTER TABLE `devolucion`
  ADD CONSTRAINT `devolucion_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `prestamo` (`id_alumno`),
  ADD CONSTRAINT `devolucion_ibfk_2` FOREIGN KEY (`num_prestamo`) REFERENCES `prestamo` (`num_prestamo`);

--
-- Filtros para la tabla `devolucion_libro`
--
ALTER TABLE `devolucion_libro`
  ADD CONSTRAINT `devolucion_libro_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `prestamo_libro` (`isbn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `devolucion_libro_ibfk_2` FOREIGN KEY (`num_prestamo`) REFERENCES `devolucion` (`num_prestamo`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `libro_autor`
--
ALTER TABLE `libro_autor`
  ADD CONSTRAINT `libro_autor_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `libro` (`isbn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `libro_autor_ibfk_2` FOREIGN KEY (`num_autor`) REFERENCES `autor` (`id_autor`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `prestamo_ibfk_2` FOREIGN KEY (`id_alumno`) REFERENCES `estudiante` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo_libro`
--
ALTER TABLE `prestamo_libro`
  ADD CONSTRAINT `prestamo_libro_ibfk_1` FOREIGN KEY (`isbn`) REFERENCES `libro` (`isbn`) ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamo_libro_ibfk_2` FOREIGN KEY (`num_prestamo`) REFERENCES `prestamo` (`num_prestamo`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
