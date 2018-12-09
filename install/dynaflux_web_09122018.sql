-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 09-12-2018 a las 13:10:52
-- Versión del servidor: 5.6.39-cll-lve
-- Versión de PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `dynaflux_new`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `id` varchar(10) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`id`, `name`, `description`) VALUES
('CAT1', 'Equipos', 'Supercategorias de los equipos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category_item`
--

CREATE TABLE `category_item` (
  `id` varchar(10) NOT NULL,
  `categoryId` varchar(10) NOT NULL,
  `parentId` varchar(10) DEFAULT NULL,
  `level` int(2) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `url` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `category_item`
--

INSERT INTO `category_item` (`id`, `categoryId`, `parentId`, `level`, `name`, `url`) VALUES
('CI1', 'CAT1', NULL, 1, 'Bombas Dosificadoras Walchem', 'bombas-dosificadoras/walchem-&-iwaki'),
('CI2', 'CAT1', NULL, 1, 'Bombas Dosificadoras OBL', 'bombas-dosificadoras/obl'),
('CI3', 'CAT1', NULL, 1, 'Bombas Peristálticas ALBIN', 'bombas-peristalticas/albin'),
('CI4', 'CAT1', NULL, 1, 'Bombas Centrífugas Panworld', 'bombas-centrifugas/panworld'),
('CI5', 'CAT1', NULL, 1, 'Bombas Centrífugas Affetti', 'bombas-centrifugas/affeti'),
('CI6', 'CAT1', NULL, 1, 'Bombas Portátiles Standard Pump', 'bombas-portatiles/standard-pump'),
('CI7', 'CAT1', NULL, 1, 'Controladores Walchem', 'controladores/walchem');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contact`
--

CREATE TABLE `contact` (
  `id` varchar(10) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `position` varchar(1000) NOT NULL,
  `email` varchar(1000) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `contact`
--

INSERT INTO `contact` (`id`, `name`, `position`, `email`, `phone`) VALUES
('CON1', 'Raul Chacaltana', 'Gerente de ventas', 'rchacaltana@dynaflux.com.pe', '99 680 0977'),
('CON2', 'Ever Diestra', 'Jefe de Ingeniería y Servicios', 'ediestra@dynaflux.com.pe', '99 680 0953'),
('CON3', 'Central', 'Recepción General', 'dynaflux@dynaflux.com.pe', '01 631 6868');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `content`
--

CREATE TABLE `content` (
  `id` varchar(10) NOT NULL,
  `title` varchar(500) NOT NULL,
  `contentFilePath` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `content`
--

INSERT INTO `content` (`id`, `title`, `contentFilePath`) VALUES
('CONT1', 'Bombas Dosificadoras Electrónicas Walchem', 'content/CONT1.html'),
('CONT10', 'Terminos y Condiciones', 'content/CONT10.html'),
('CONT11', 'Terms & Conditions', 'content/CONT11.html'),
('CONT12', 'Misión y Visión', 'content/CONT12.html'),
('CONT2', 'Bombas Dosificadoras Accionadas con Motor Eléctrico OBL', 'content/CONT2.html'),
('CONT3', 'Bombas Peristálticas ALBIN', 'content/CONT3.html'),
('CONT4', 'Bombas Centrífugas Panworld de Acople Magnético', 'content/CONT4.html'),
('CONT5', 'Bombas Centrífugas Affetti de Sello Mecánico', 'content/CONT5.html'),
('CONT6', 'Bombas Portátiles Standard Pump', 'content/CONT6.html'),
('CONT7', 'Controladores Walchem', 'content/CONT7.html'),
('CONT8', 'Equipos', 'content/CONT8.html'),
('CONT9', 'Sistemas', 'content/CONT9.html');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `department`
--

CREATE TABLE `department` (
  `id` varchar(10) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `content` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `department`
--

INSERT INTO `department` (`id`, `title`, `content`) VALUES
('DEP1', 'Área de Ventas', ''),
('DEP2', 'Área de Ingeniería', 'Profesionales encargados del desarrollo y ejecución a detalle de los proyectos comercializados por Dynaflux. Supervisan la instalación los equipos y sistemas, garantizando el óptimo funcionamiento de los mismos. Realiza la ingeniería de detalle: diseña a detalle planos del sistema, programación, elabora dossier de calidad, ejecuta proyectos'),
('DEP3', 'Área Técnica', 'DYNAFLUX cuenta con personal técnico altamente calificado, con amplia experiencia en el soporte en la instalación y manipulación de equipos y maquinarias para las diversas industrias. Brinda soporte técnico preventivo y correctivo de los equipos y sistemas comercializados por Dynaflux. Ejecuta los proyectos de acuerdo a los planos realizado por Ingeniería, realizando sus funciones en todo punto del país.'),
('DEP4', 'Área de Investigación y Desarrollo', 'Área encargada de desarrollar y brindar el soporte técnico adecuado en las propuestas planteadas por los ejecutivos comerciales. Son encargados de diseñar y elaborar productos que satisfaga las necesidades del cliente, generando nuevos producto acorde a los requerimientos de la empresa. Actualmente se desarrolló un skid de dosificación de alta precisión autocalibrable, ideal para trabajos de minería. Desarrolla P&ID (plano de distribución de equipos y accesorios).');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `download`
--

CREATE TABLE `download` (
  `id` varchar(10) NOT NULL,
  `title` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `download`
--

INSERT INTO `download` (`id`, `title`) VALUES
('DWNLD1', 'Brochure Dynaflux'),
('DWNLD2', 'Brochure EEC'),
('DWNLD3', 'Sistemas Dynaflux');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entity_creation`
--

CREATE TABLE `entity_creation` (
  `id` varchar(10) NOT NULL,
  `reference` varchar(10) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entity_creation`
--

INSERT INTO `entity_creation` (`id`, `reference`, `date`) VALUES
('EC1', 'NEWS1', '1406795470');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entity_file`
--

CREATE TABLE `entity_file` (
  `id` varchar(10) NOT NULL,
  `idEntity` varchar(10) NOT NULL,
  `idFile` varchar(10) NOT NULL,
  `group` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entity_file`
--

INSERT INTO `entity_file` (`id`, `idEntity`, `idFile`, `group`) VALUES
('EF1', 'DWNLD1', 'FILE1', 'file'),
('EF10', 'PROD11', 'FILE4', 'brochures'),
('EF11', 'PROD12', 'FILE6', 'brochures'),
('EF12', 'PROD13', 'FILE16', 'brochures'),
('EF13', 'PROD14', 'FILE18', 'brochures'),
('EF14', 'PROD15', 'FILE26', 'brochures'),
('EF15', 'PROD16', 'FILE20', 'brochures'),
('EF16', 'PROD17', 'FILE28', 'brochures'),
('EF17', 'PROD18', 'FILE39', 'brochures'),
('EF18', 'PROD19', 'FILE51', 'brochures'),
('EF19', 'PROD20', 'FILE53', 'brochures'),
('EF2', 'DWNLD2', 'FILE2', 'file'),
('EF20', 'PROD21', 'FILE8', 'brochures'),
('EF21', 'PROD22', 'FILE8', 'brochures'),
('EF22', 'PROD23', 'FILE11', 'brochures'),
('EF23', 'PROD24', 'FILE11', 'brochures'),
('EF24', 'PROD25', 'FILE46', 'brochures'),
('EF25', 'PROD50', 'FILE22', 'brochures'),
('EF26', 'PROD51', 'FILE30', 'brochures'),
('EF27', 'PROD52', 'FILE24', 'brochures'),
('EF28', 'PROD53', 'FILE15', 'brochures'),
('EF29', 'PROD53', 'FILE17', 'brochures'),
('EF3', 'PROD2', 'FILE21', 'brochures'),
('EF30', 'PROD54', 'FILE33', 'brochures'),
('EF31', 'PROD54', 'FILE37', 'brochures'),
('EF32', 'PROD55', 'FILE35', 'brochures'),
('EF33', 'PROD56', 'FILE7', 'manuals'),
('EF34', 'PROD57', 'FILE5', 'brochures'),
('EF35', 'PROD2', 'FILE14', 'manuals'),
('EF36', 'PROD4', 'FILE31', 'manuals'),
('EF37', 'PROD5', 'FILE45', 'manuals'),
('EF38', 'PROD8', 'FILE34', 'manuals'),
('EF39', 'PROD9', 'FILE36', 'manuals'),
('EF4', 'PROD4', 'FILE19', 'brochures'),
('EF40', 'PROD10', 'FILE40', 'manuals'),
('EF41', 'PROD11', 'FILE40', 'manuals'),
('EF42', 'PROD11', 'FILE38', 'manuals'),
('EF43', 'PROD12', 'FILE44', 'manuals'),
('EF5', 'PROD5', 'FILE43', 'brochures'),
('EF50', 'PROD53', 'FILE12', 'manuals'),
('EF51', 'PROD53', 'FILE13', 'manuals'),
('EF52', 'PROD54', 'FILE10', 'manuals'),
('EF53', 'PROD54', 'FILE9', 'manuals'),
('EF54', 'PROD54', 'FILE25', 'manuals'),
('EF55', 'PROD54', 'FILE27', 'manuals'),
('EF56', 'PROD55', 'FILE23', 'manuals'),
('EF57', 'PROD56', 'FILE29', 'manuals'),
('EF58', 'PROD57', 'FILE3', 'manuals'),
('EF59', 'DWNLD3', 'FILE55', 'file'),
('EF6', 'PROD6', 'FILE47', 'brochures'),
('EF60', 'DWNLD4', 'FILE56', 'file'),
('EF7', 'PROD8', 'FILE50', 'brochures'),
('EF8', 'PROD9', 'FILE52', 'brochures'),
('EF9', 'PROD10', 'FILE54', 'brochures');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entity_image`
--

CREATE TABLE `entity_image` (
  `id` varchar(10) NOT NULL,
  `idEntity` varchar(10) NOT NULL,
  `idImage` varchar(10) NOT NULL,
  `group` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `entity_image`
--

INSERT INTO `entity_image` (`id`, `idEntity`, `idImage`, `group`) VALUES
('EI1', 'SERV1', 'IMG33', 'icon'),
('EI10', 'SLI1', 'IMG67', 'photo'),
('EI100', 'PROJ4', 'IMG89', 'gallery'),
('EI101', 'PROJ5', 'IMG90', 'gallery'),
('EI102', 'PROJ6', 'IMG91', 'gallery'),
('EI103', 'PROJ7', 'IMG92', 'gallery'),
('EI104', 'PROJ8', 'IMG93', 'gallery'),
('EI105', 'PROJ9', 'IMG94', 'gallery'),
('EI106', 'PROJ10', 'IMG91', 'gallery'),
('EI107', 'TM1', 'IMG95', 'logo'),
('EI108', 'TM2', 'IMG96', 'logo'),
('EI109', 'TM3', 'IMG97', 'logo'),
('EI110', 'TM4', 'IMG98', 'logo'),
('EI111', 'TM5', 'IMG99', 'logo'),
('EI112', 'TM6', 'IMG100', 'logo'),
('EI113', 'TM7', 'IMG101', 'logo'),
('EI114', 'TM8', 'IMG102', 'logo'),
('EI115', 'TM9', 'IMG103', 'logo'),
('EI116', 'TM10', 'IMG104', 'logo'),
('EI117', 'PROJ1', 'IMG106', 'photo'),
('EI118', 'PROJ3', 'IMG18', 'photo'),
('EI119', 'PROJ4', 'IMG89', 'photo'),
('EI120', 'PROJ6', 'IMG91', 'photo'),
('EI121', 'PROJ8', 'IMG93', 'photo'),
('EI122', 'PROJ9', 'IMG94', 'photo'),
('EI15', 'DEP1', 'IMG1', 'image'),
('EI16', 'DEP2', 'IMG60', 'image'),
('EI17', 'DEP3', 'IMG61', 'image'),
('EI18', 'DEP4', 'IMG62', 'image'),
('EI19', 'CI1', 'IMG44', 'image'),
('EI2', 'SERV2', 'IMG34', 'icon'),
('EI20', 'CI2', 'IMG47', 'image'),
('EI21', 'CI3', 'IMG40', 'image'),
('EI22', 'CI4', 'IMG52', 'image'),
('EI23', 'CI5', 'IMG54', 'image'),
('EI24', 'CI6', 'IMG38', 'image'),
('EI25', 'CI7', 'IMG37', 'image'),
('EI27', 'SLI4', 'IMG63', 'photo'),
('EI29', 'SLI5', 'IMG18', 'photo'),
('EI3', 'SERV3', 'IMG35', 'icon'),
('EI31', 'SLI6', 'IMG65', 'photo'),
('EI33', 'SLI7', 'IMG64', 'photo'),
('EI35', 'SLI8', 'IMG66', 'photo'),
('EI36', 'PROD2', 'IMG68', 'image'),
('EI37', 'PROD4', 'IMG69', 'image'),
('EI38', 'PROD5', 'IMG39', 'image'),
('EI39', 'PROD6', 'IMG18', 'image'),
('EI4', 'SERV4', 'IMG36', 'icon'),
('EI40', 'PROD8', 'IMG18', 'image'),
('EI41', 'PROD9', 'IMG18', 'image'),
('EI42', 'PROD10', 'IMG18', 'image'),
('EI43', 'PROD11', 'IMG18', 'image'),
('EI44', 'PROD12', 'IMG18', 'image'),
('EI45', 'PROD13', 'IMG18', 'image'),
('EI46', 'PROD14', 'IMG18', 'image'),
('EI47', 'PROD15', 'IMG18', 'image'),
('EI48', 'PROD16', 'IMG18', 'image'),
('EI49', 'PROD17', 'IMG18', 'image'),
('EI5', 'SERV5', 'IMG33', 'icon'),
('EI50', 'PROD18', 'IMG51', 'image'),
('EI51', 'PROD19', 'IMG18', 'image'),
('EI52', 'PROD20', 'IMG52', 'image'),
('EI53', 'PROD21', 'IMG54', 'image'),
('EI54', 'PROD22', 'IMG18', 'image'),
('EI55', 'PROD23', 'IMG18', 'image'),
('EI56', 'PROD24', 'IMG18', 'image'),
('EI57', 'PROD25', 'IMG18', 'image'),
('EI58', 'PROD26', 'IMG18', 'image'),
('EI59', 'PROD27', 'IMG18', 'image'),
('EI6', 'SERV6', 'IMG105', 'icon'),
('EI60', 'PROD28', 'IMG18', 'image'),
('EI61', 'PROD29', 'IMG18', 'image'),
('EI62', 'PROD30', 'IMG18', 'image'),
('EI63', 'PROD31', 'IMG79', 'image'),
('EI64', 'PROD32', 'IMG18', 'image'),
('EI65', 'PROD33', 'IMG18', 'image'),
('EI66', 'PROD34', 'IMG18', 'image'),
('EI67', 'PROD35', 'IMG18', 'image'),
('EI68', 'PROD36', 'IMG18', 'image'),
('EI69', 'PROD37', 'IMG18', 'image'),
('EI7', 'SERV7', 'IMG35', 'icon'),
('EI70', 'PROD38', 'IMG18', 'image'),
('EI71', 'PROD39', 'IMG18', 'image'),
('EI72', 'PROD40', 'IMG18', 'image'),
('EI73', 'PROD41', 'IMG67', 'image'),
('EI74', 'PROD42', 'IMG9', 'image'),
('EI75', 'PROD43', 'IMG76', 'image'),
('EI76', 'PROD44', 'IMG63', 'image'),
('EI77', 'PROD45', 'IMG18', 'image'),
('EI78', 'PROD46', 'IMG65', 'image'),
('EI79', 'PROD47', 'IMG64', 'image'),
('EI8', 'NEWS4', 'IMG32', 'gallery'),
('EI80', 'PROD48', 'IMG66', 'image'),
('EI81', 'PROD49', 'IMG78', 'image'),
('EI82', 'PROD50', 'IMG18', 'image'),
('EI83', 'PROD51', 'IMG18', 'image'),
('EI84', 'PROD52', 'IMG18', 'image'),
('EI85', 'PROD53', 'IMG18', 'image'),
('EI86', 'PROD54', 'IMG71', 'image'),
('EI87', 'PROD55', 'IMG70', 'image'),
('EI88', 'PROD56', 'IMG18', 'image'),
('EI89', 'PROD57', 'IMG18', 'image'),
('EI90', 'DWNLD2', 'IMG72', 'portrait'),
('EI91', 'DWNLD3', 'IMG73', 'portrait'),
('EI92', 'DWNLD1', 'IMG74', 'portrait'),
('EI93', 'DWNLD4', 'IMG75', 'portrait'),
('EI94', 'PROJ1', 'IMG80', 'gallery'),
('EI95', 'PROJ3', 'IMG81', 'gallery'),
('EI96', 'PROJ2', 'IMG82', 'gallery'),
('EI97', 'PROJ1', 'IMG86', 'gallery'),
('EI99', 'PROJ1', 'IMG88', 'gallery');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `file`
--

CREATE TABLE `file` (
  `id` varchar(10) NOT NULL,
  `path` varchar(1000) NOT NULL,
  `name` varchar(5000) NOT NULL,
  `type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `file`
--

INSERT INTO `file` (`id`, `path`, `name`, `type`) VALUES
('FILE1', 'brochure_dynaflux.pdf', 'Brochure Dynaflux', 'pdf'),
('FILE10', '180335_wct400_manual_sp.pdf', 'Manual WCT 400/410', 'pdf'),
('FILE11', 'cgo-cmo.pdf', 'Brochure CGO/CMO', 'pdf'),
('FILE12', '180344_wbl400_manual_sp.pdf', 'Manual WBL 400', 'pdf'),
('FILE13', '180349_wdb400_manual_sp.pdf', 'Manual WDB 400', 'pdf'),
('FILE14', '180367_wdis410_manual.pdf', 'Manual WDIS 410', 'pdf'),
('FILE15', '180368_wbl400_brochure_sp.pdf', 'Brochure WBL 400', 'pdf'),
('FILE16', 'd_l_gb_it_0409.pdf', 'Brochure OBL Serie L', 'pdf'),
('FILE17', '180370_wdb400_brochure_sp.pdf', 'Brochure WDB 400', 'pdf'),
('FILE18', 'd_mb_c_gb_it_0409.pdf', 'Brochure OBL Serie MB', 'pdf'),
('FILE19', '180386_wec400_brochure_spanish.pdf', 'Brochure WEC 400', 'pdf'),
('FILE2', 'brochure_eec.pdf', 'Brochure EEC', 'pdf'),
('FILE20', 'd_md_gb_it_0309.pdf', 'Brochure OBL Serie MD', 'pdf'),
('FILE21', '180387_wdis400_brochure_spanish.pdf', 'Brochure Serie WDIS 400', 'pdf'),
('FILE22', 'd_rba_b_gb_it_0310.pdf', 'Brochure OBL Serie RBB', 'pdf'),
('FILE23', '180390_wph-wdp400_manual_spanish.pdf', 'Manual WPH/WDP 400', 'pdf'),
('FILE24', 'd_rcc_gb_it_0409.pdf', 'Brochure OBL Serie RCC', 'pdf'),
('FILE25', '180403_wect400_manual.pdf', 'Manual WECT 400/410', 'pdf'),
('FILE26', 'd_x9_gb_0211.pdf', 'Brochure OBL X9', 'pdf'),
('FILE27', '180404_wedt410_manual.pdf', 'Manual WEDT 410', 'pdf'),
('FILE28', 'd_xl_b_c_gb_0509.pdf', 'Brochure OBL Serie XL', 'pdf'),
('FILE29', '180413_wind_modbus_manual.pdf', 'Manual WIND ModBus', 'pdf'),
('FILE3', '180272_webone_manual-sp.pdf', 'Manual Web One', 'pdf'),
('FILE30', 'd_xrn_gb_it_0909.pdf', 'Brochure OBL Serie XRN', 'pdf'),
('FILE31', '180416_wec_wdec410__spanish.pdf', 'Manual WEC/WDEC410', 'pdf'),
('FILE32', 'ew_s01-2_Lg.swf', 'Walchem Flash Video', 'swf'),
('FILE33', '180462_wctwdt_brochure_sp.pdf', 'Brochure WCT/WDT', 'pdf'),
('FILE34', 'manual_serie_ehe_0.pdf', 'Manual Serie EHE', 'pdf'),
('FILE35', '180466_wphwdp_brochure_sp.pdf', 'Brochure WPH/WDP', 'pdf'),
('FILE36', 'manual_serie_ehhv_0.pdf', 'Manual Serie EHHV', 'pdf'),
('FILE37', '180468_wectwedt_brochure_sp.pdf', 'Brochure WECT/WEDT', 'pdf'),
('FILE38', 'manual_serie_ew-y.pdf', 'Manual Serie EW/Y', 'pdf'),
('FILE39', '180488_a_ix_brochure_sp.pdf', 'Brochure IX', 'pdf'),
('FILE4', 'brochure_serie_ew.pdf', 'Brochure Serie EW', 'pdf'),
('FILE40', 'manual_serie_ew_ek.pdf', 'Manual Serie EW/EK', 'pdf'),
('FILE41', 'affetti_catalog.pdf', 'Catalogo Affetti', 'pdf'),
('FILE43', 'alh_brochure_2011_0.pdf', 'Brochure ALH', 'pdf'),
('FILE44', 'manual_serie_ez_0.pdf', 'Manual Serie EZ', 'pdf'),
('FILE45', 'alh_instruction_manual_2011.pdf', 'Manual Instruccion ALH', 'pdf'),
('FILE46', 'msp-e-n-t.pdf', 'Brochure MSP-E/T', 'pdf'),
('FILE47', 'alp_brochure_es_rev03_10-2010.pdf', 'Brochure ALP', 'pdf'),
('FILE48', 'brochure_eec.pdf', 'Brochure EEC', 'pdf'),
('FILE49', 'r_s_0704_0.pdf', 'r_s', 'pdf'),
('FILE5', '180275-sp_webonebrochure.pdf', 'Brochure Web One', 'pdf'),
('FILE50', 'brochure_serie_ehe.pdf', 'Brochure Serie EHE', 'pdf'),
('FILE51', 'series_ps.pdf', 'Brochure Series PS/PS-F', 'pdf'),
('FILE52', 'brochure_serie_ehhv.pdf', 'Brochure Serie EHHV', 'pdf'),
('FILE53', 'series_pw.pdf', 'Brochure Series PW/PW-F', 'pdf'),
('FILE54', 'brochure_serie_ek.pdf', 'Brochure Serie EK', 'pdf'),
('FILE55', 'triptico_dynaflux.pdf', 'Triptico Dynaflux', 'pdf'),
('FILE56', 'flyer chemco.jpg', 'Flyer Chemco', 'jpg'),
('FILE6', 'brochure_serie_ez.pdf', 'Brochure Serie EZ', 'pdf'),
('FILE7', '180315_wind_manual.pdf', 'Manual WIND', 'pdf'),
('FILE8', 'cgd_cdm.pdf', 'Brochure CGD/CDM', 'pdf'),
('FILE9', '180331_wdt400manual.pdf', 'Manual WDT 400', 'pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `image`
--

CREATE TABLE `image` (
  `id` varchar(10) NOT NULL,
  `path` varchar(5000) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `image`
--

INSERT INTO `image` (`id`, `path`, `name`) VALUES
('IMG1', 'cuajone 1.jpg', 'Cuajone 1'),
('IMG10', 'Quellaveco 1.jpg', 'Quellaveco 1'),
('IMG100', 'standard_pump_logo.jpeg', 'Standard Pump'),
('IMG101', 'chemco_logo.jpg', 'Chemco Systems'),
('IMG102', 'sodimate_logo.jpg', 'Sodimate'),
('IMG103', 'eec_logo.jpg', 'EEC'),
('IMG104', 'vak_kimsa_logo.jpg', 'Vak Kimsa'),
('IMG105', 'ING3.jpg', 'Investigación y Desarrollo'),
('IMG106', 'Quimpac-1.jpg', 'Proyecto Quimpac'),
('IMG11', 'quellaveco 2 con color.jpg', 'Quellaveco 2'),
('IMG12', 'PESQUERA TASA.JPG', 'Pesquera Tasa'),
('IMG13', 'chemco 4.jpg', 'Chemco 4'),
('IMG14', 'CALETONES1.jpg', 'Caletones 1'),
('IMG15', 'SOQUIMICH.JPG', 'Soquimich'),
('IMG16', 'EEC 115 CON ARREGLO GENERAL-1.jpg', 'EEC 115 con arreglo general 1'),
('IMG17', 'responsabilidad ambiental 2.jpg', 'Responsabilidad ambiental 2'),
('IMG18', 'eec aqp 5.jpg', 'eec aqp 5'),
('IMG19', 'eec aqp 3.jpg', 'eec aqp 3'),
('IMG2', 'equipo en el cip.jpg', 'Equipo en el CIP'),
('IMG20', 'eec huacho 2.jpg', 'eec huacho 2'),
('IMG21', 'toquepala 3.jpg', 'toquepala 3'),
('IMG22', 'toquepala 2.jpg', 'toquepala 2'),
('IMG23', 'el brocal3.jpg', 'el brocal 3'),
('IMG24', 'quimpac 1.jpg', 'quimpac 1'),
('IMG25', 'sodimate outotec.jpg', 'sodimate outotec'),
('IMG26', 'sodimate alto cayma.jpg', 'sodimate alto cayma'),
('IMG27', 'el brocal4.jpg', 'el brocal 4'),
('IMG28', 'Outotec.jpg', 'Outotec'),
('IMG29', 'Alto Cayma.jpg', 'Alto Cayma'),
('IMG3', 'Skid Dosificacion Toquepala Acrilico.jpg', 'Dosificacion Toquepala Acrilico'),
('IMG30', 'vak_kimsa_3.jpg', 'Vak kimsa 3'),
('IMG31', 'Votorantim.JPG', 'Votorantin'),
('IMG32', 'huacho.jpg', 'huacho'),
('IMG33', 'ING1.jpg', 'Ing 1'),
('IMG34', 'ING2.jpg', 'Instalación'),
('IMG35', 'TEC1.jpg', 'Tec 1'),
('IMG36', 'TEC2.jpg', 'Tec 2'),
('IMG37', 'WIND.jpg', 'WIND'),
('IMG38', 'sp400.jpg', 'SP400'),
('IMG39', 'ALH2.gif', 'Albin ALH'),
('IMG4', 'gmp1.jpg', 'gmp 1'),
('IMG40', 'ALP2.jpg', 'Albin ALP'),
('IMG41', 'EHE_body.jpg', 'Walchem EHE'),
('IMG42', 'HV_Photo.jpg', 'Walchem EHHV'),
('IMG43', 'ek_body.jpg', 'Walchem EK'),
('IMG44', 'EW_photo.jpg', 'Walchem EW'),
('IMG45', 'ez_photo.jpg', 'Walchem EZ'),
('IMG46', 'lapi675.jpg', 'OBL L API 675'),
('IMG47', 'obl_mb.jpg', 'OBL MB/MC'),
('IMG48', 'x9api675.jpg', 'OBL X9 API 675'),
('IMG49', 'md.jpg', 'OBL MD'),
('IMG5', 'gmp4.jpg', 'gmp 4'),
('IMG50', 'xlapi675.jpg', 'OBL XL API 675'),
('IMG51', 'IXPump_Body.jpg', 'Walchem IX'),
('IMG52', 'PW_Body.jpg', 'Panworld PW'),
('IMG53', 'PW-F_Body.jpg', 'Panworld PW-F'),
('IMG54', 'CDM.jpg', 'Affetti CDM'),
('IMG55', 'CGD.jpg', 'Affetti CGD'),
('IMG56', 'CGO.jpg', 'Affetti CGO'),
('IMG57', 'CMO.jpg', 'Affetti CMO'),
('IMG58', 'mspe.jpg', 'Affetti MSP-E'),
('IMG59', 'area_ventas.jpg', 'Area de Ventas'),
('IMG6', 'vista gmp.jpg', 'Vista gmp'),
('IMG60', 'area_ingenieria.jpg', 'Area de Ingenieria'),
('IMG61', 'area_tecnica.jpg', 'Area Tecnica'),
('IMG62', 'area_investigacion.jpg', 'Area de Investigacion y Desarrollo'),
('IMG63', 'chemco.png', 'Sistema de apagado de cal'),
('IMG64', 'sodimate.png', 'Sistema de dosificación de reactivos sólidos'),
('IMG65', 'albin_lodos.png', 'Bombeo de lodos y pulpas de mineral'),
('IMG66', 'polisol.png', 'Preparación y dosificación de floculantes'),
('IMG67', 'skid.png', 'Skid de alta dosificación'),
('IMG68', 'WDIS410.jpg', 'Walchem WDIS 410'),
('IMG69', 'WDEC410.jpg', 'Walchem WDEC 410'),
('IMG7', 'dosificacion proyecto alpamarca.jpg', 'Dosificacion proyecto Alpamarca'),
('IMG70', 'WPH.jpg', 'Walchem WPH'),
('IMG71', 'WCT410.jpg', 'Walchem WCT410'),
('IMG72', 'Brochure_EEC_portrait.jpg', 'Brochure EEC'),
('IMG73', 'Brochure_Systems_portrait.jpg', 'Brochure EEC'),
('IMG74', 'Brochure_Dynaflux_portrait.jpg', 'Brochure EEC'),
('IMG75', 'Brochure_Chemco_portrait.jpg', 'Brochure EEC'),
('IMG76', 'aguas_acidas_2.jpg', 'Planta de Tratamiento de Aguas Acidas'),
('IMG77', 'vakimsa_1.jpg', 'Agitadores Vak Kimsa 1'),
('IMG78', 'vakimsa_2.jpg', 'Agitadores Vak Kimsa 2'),
('IMG79', 'sp8100sm.jpg', 'Tubos serie SP 8100'),
('IMG8', 'cuajone 2.jpg', 'Cuajone 2'),
('IMG80', 'quimpac_1.jpg', 'Quimpac: Sistema de llenado automático de cal'),
('IMG81', 'alto_cayma_3.jpg', 'Alto Cayma: Sistema de dosificación de reactivos PTAP'),
('IMG82', 'cormitoma.jpg', 'Cormitoma: Instalación de bombas peristálticas'),
('IMG83', 'alto_cayma_1.jpg', 'Alto Cayma: Sistema de dosificación de reactivos PTAP'),
('IMG84', 'alto_cayma_2.jpg', 'Alto Cayma: Sistema de dosificación de reactivos PTAP'),
('IMG85', 'alto_cayma_4.jpg', 'Alto Cayma: Sistema de dosificación de reactivos PTAP'),
('IMG86', 'quimpac_2.jpg', 'Quimpac: Sistema de llenado automático de cal'),
('IMG87', 'quimpac_3.jpg', 'Quimpac: Sistema de llenado automático de cal'),
('IMG88', 'quimpac_4.jpg', 'Quimpac: Sistema de llenado automático de cal'),
('IMG89', 'anglo_american.jpg', 'Anglo American'),
('IMG9', 'Dosificacion de Reactivos.JPG', 'Dosificacion de Reactivos MINERA CORONA'),
('IMG90', 'minera_antapaccay.jpg', 'Minera Antapaccay'),
('IMG91', 'minera_bateas.jpg', 'Minera Bateas'),
('IMG92', 'corporacion_lindley.jpg', 'Corporación Lindley'),
('IMG93', 'cemento_sur.jpg', 'Cemento Sur'),
('IMG94', 'aqualife.jpg', 'Aqualife'),
('IMG95', 'walchem_logo.jpeg', 'Walchem'),
('IMG96', 'obl_logo.png', 'OBL'),
('IMG97', 'albin_logo.jpeg', 'Albin'),
('IMG98', 'panworld_logo.jpg', 'Panworld'),
('IMG99', 'affetti_logo.jpeg', 'affetti');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `location`
--

CREATE TABLE `location` (
  `id` varchar(10) NOT NULL,
  `name` varchar(500) NOT NULL,
  `latitude` varchar(20) NOT NULL,
  `longitude` varchar(20) NOT NULL,
  `address` varchar(1000) NOT NULL,
  `phone` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `location`
--

INSERT INTO `location` (`id`, `name`, `latitude`, `longitude`, `address`, `phone`) VALUES
('LOC1', 'Oficina Principal', '-12.1012423', '-76.9485711', 'Calle Las Cascadas 325, Urb. La Encalada, La Molina', '01 631 6868'),
('LOC2', 'Área Técnica e Ingeniería', '-11.8419959', '-77.0905629', 'Calle Los Alisos Mz. A-2 Lt 25, Alameda del Norte, Puente Piedra', '01 631 6868');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu`
--

CREATE TABLE `menu` (
  `id` varchar(10) NOT NULL,
  `name` varchar(200) NOT NULL,
  `description` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu`
--

INSERT INTO `menu` (`id`, `name`, `description`) VALUES
('MENU1', 'Top', 'Menú del encabezado de la página con los links generales'),
('MENU2', 'Equipos y Controladores', 'Menú de la página \"Equipos\"'),
('MENU3', 'Sistemas', 'Menú de la página \"Sistemas\"');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menu_item`
--

CREATE TABLE `menu_item` (
  `id` varchar(10) NOT NULL,
  `menuId` varchar(10) NOT NULL,
  `parentId` varchar(10) DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `level` int(2) NOT NULL,
  `type` varchar(100) NOT NULL,
  `url` varchar(2000) DEFAULT NULL,
  `weight` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `menu_item`
--

INSERT INTO `menu_item` (`id`, `menuId`, `parentId`, `name`, `level`, `type`, `url`, `weight`) VALUES
('MI1', 'MENU1', NULL, 'Nosotros', 1, 'path', 'nosotros', 1),
('MI10', 'MENU2', NULL, 'Bombas Dosificadoras', 1, 'category', NULL, 1),
('MI11', 'MENU2', NULL, 'Bombas Peristálticas', 1, 'category', NULL, 2),
('MI12', 'MENU2', NULL, 'Bombas Centrìfugas', 1, 'category', NULL, 3),
('MI14', 'MENU2', NULL, 'Bombas Portátiles', 1, 'category', NULL, 4),
('MI15', 'MENU2', 'MI86', '¿Por qué Walchem?', 3, 'path', 'controladores/walchem', 1),
('MI16', 'MENU2', 'MI86', 'Serie W400', 3, 'category', NULL, 2),
('MI17', 'MENU2', 'MI86', 'Serie WDIS 410', 3, 'path', 'controladores/walchem/wdis410', 5),
('MI18', 'MENU2', 'MI86', 'Serie Webmaster', 3, 'category', NULL, 3),
('MI19', 'MENU2', 'MI86', 'Serie WEC 400', 3, 'path', 'controladores/walchem/wec400', 4),
('MI2', 'MENU1', NULL, 'Equipos', 1, 'path', 'equipos', 2),
('MI20', 'MENU2', 'MI10', 'Electrónicas Walchem', 2, 'category', NULL, 1),
('MI21', 'MENU2', 'MI10', 'Accionadas con Motor Eléctrico OBL', 2, 'category', NULL, 2),
('MI22', 'MENU2', 'MI85', '¿Por qúe ALBIN?', 3, 'path', 'bombas-peristalticas/albin', 1),
('MI23', 'MENU2', 'MI85', 'Serie ALH', 3, 'path', 'bombas-peristalticas/albin/serie-alh', 2),
('MI24', 'MENU2', 'MI85', 'Serie ALP', 3, 'path', 'bombas-peristalticas/albin/serie-alp', 3),
('MI25', 'MENU2', 'MI12', 'Panworld de Acople Magnético', 2, 'category', NULL, 1),
('MI26', 'MENU2', 'MI12', 'Affetti de Sello Mecánico o Prensaestopa', 2, 'category', NULL, 2),
('MI28', 'MENU2', 'MI87', '¿Por qué Standard Pump?', 3, 'path', 'bombas-portatiles/standard-pump', 1),
('MI29', 'MENU2', 'MI87', 'Serie Industrial Centrífugas', 3, 'category', NULL, 2),
('MI3', 'MENU1', NULL, 'Sistemas', 1, 'path', 'sistemas', 3),
('MI31', 'MENU2', 'MI87', 'Serie Industrial de Cavidad Progresiva', 3, 'category', NULL, 3),
('MI32', 'MENU2', 'MI87', 'Sanitarias de Cavidad Progresiva', 3, 'category', NULL, 5),
('MI33', 'MENU2', 'MI20', '¿Por qué Walchem?', 3, 'path', 'bombas-dosificadoras/walchem-&-iwaki', 1),
('MI34', 'MENU2', 'MI20', 'Serie EHE', 3, 'path', 'bombas-dosificadoras/walchem-&-iwaki/serie-ehe', 6),
('MI35', 'MENU2', 'MI20', 'Serie EHHV de Alta Viscosidad', 3, 'path', 'bombas-dosificadoras/walchem-&-iwaki/serie-ehhv', 3),
('MI36', 'MENU2', 'MI20', 'Serie EK', 3, 'path', 'bombas-dosificadoras/walchem-&-iwaki/serie-ek', 5),
('MI37', 'MENU2', 'MI20', 'Serie EW', 3, 'path', 'bombas-dosificadoras/walchem-&-iwaki/serie-ew', 4),
('MI38', 'MENU2', 'MI20', 'Serie EZ', 3, 'path', 'bombas-dosificadoras/walchem-&-iwaki/serie-ez', 2),
('MI39', 'MENU2', 'MI21', '¿Por qué OBL?', 3, 'path', 'bombas-dosificadoras/obl', 1),
('MI4', 'MENU1', NULL, 'Servicios', 1, 'path', 'servicios', 4),
('MI40', 'MENU2', 'MI21', 'Serie L API 675', 3, 'path', 'bombas-dosificadoras/obl/serie-l-api-675', 2),
('MI41', 'MENU2', 'MI21', 'Serie Black Line MB/MC', 3, 'path', 'bombas-dosificadoras/obl/serie-black-line-mb-mc', 5),
('MI42', 'MENU2', 'MI21', 'Serie X9 API 675', 3, 'path', 'bombas-dosificadoras/obl/serie-x9-api-675', 3),
('MI43', 'MENU2', 'MI21', 'Serie Black Plus MD', 3, 'path', 'bombas-dosificadoras/obl/serie-black-plus-md', 7),
('MI44', 'MENU2', 'MI21', 'Serie XL API 675', 3, 'path', 'bombas-dosificadoras/obl/serie-xl-api-675', 4),
('MI45', 'MENU2', 'MI84', 'Serie IX', 3, 'path', 'bombas-dosificadoras/walchem-&-iwaki/serie-ix', 10),
('MI46', 'MENU2', 'MI25', '¿Por qué Panworld?', 3, 'path', 'bombas-centrifugas/panworld', 1),
('MI47', 'MENU2', 'MI25', 'Serie PS/PS-F', 3, 'path', 'bombas-centrifugas/panworld/serie-ps-&-ps-f', 2),
('MI48', 'MENU2', 'MI25', 'Serie PW/PW-F', 3, 'path', 'bombas-centrifugas/panworld/serie-pw-&-pw-f', 3),
('MI49', 'MENU2', 'MI26', '¿Por qué Affetti?', 3, 'path', 'bombas-centrifugas/affeti', 1),
('MI5', 'MENU1', NULL, 'Casos de éxito', 1, 'path', 'casos-de-exito', 5),
('MI50', 'MENU2', 'MI26', 'Serie CDM', 3, 'path', 'bombas-centrifugas/affeti/serie-cdm', 2),
('MI51', 'MENU2', 'MI26', 'Serie CGD', 3, 'path', 'bombas-centrifugas/affeti/serie-cgd', 3),
('MI52', 'MENU2', 'MI26', 'Serie CGO', 3, 'path', 'bombas-centrifugas/affeti/serie-cgo', 4),
('MI53', 'MENU2', 'MI26', 'Serie CMO', 3, 'path', 'bombas-centrifugas/affeti/serie-cmo', 5),
('MI54', 'MENU2', 'MI26', 'Serie Autocebante MSP-E/T', 3, 'path', 'bombas-centrifugas/affeti/serie-msp-e-&-t', 6),
('MI55', 'MENU2', 'MI29', 'Tubos de Polipropileno', 4, 'path', 'bombas-portatiles/standard-pump/tubos-de-polipropileno', 1),
('MI56', 'MENU2', 'MI29', 'Tubos de PDVF', 4, 'path', 'bombas-portatiles/standard-pump/tubos-de-pdvf', 2),
('MI57', 'MENU2', 'MI29', 'Tubos de CPVC', 4, 'path', 'bombas-portatiles/standard-pump/tubos-de-cpvc', 3),
('MI58', 'MENU2', 'MI29', 'Tubos de Acero Inoxidable', 4, 'path', 'bombas-portatiles/standard-pump/tubos-de-acero-inoxidable', 4),
('MI59', 'MENU2', 'MI93', 'Motores Series SP ENC', 4, 'path', 'bombas-portatiles/standard-pump/motores-series-sp-enc', 1),
('MI60', 'MENU2', 'MI30', 'Tubos Serie SP 8100', 4, 'path', 'bombas-portatiles/standard-pump/tubos-serie-sp-8100', 1),
('MI61', 'MENU2', 'MI30', 'Tubos Serie SP 8200', 4, 'path', 'bombas-portatiles/standard-pump/tubos-serie-sp-8200', 2),
('MI62', 'MENU2', 'MI93', 'Motores Series SP 400-2', 4, 'path', 'bombas-portatiles/standard-pump/motores-series-sp400-2', 2),
('MI63', 'MENU2', 'MI31', 'Tubos Serie SP 700DD', 4, 'path', 'bombas-portatiles/standard-pump/tubos-serie-sp-700dd', 1),
('MI64', 'MENU2', 'MI31', 'Tubos Serie SP 700SR', 4, 'path', 'bombas-portatiles/standard-pump/tubos-serie-sp-700sr', 2),
('MI65', 'MENU2', 'MI93', 'Bomba de Motor Eléctrico TEFC Series SP 500', 4, 'path', 'bombas-portatiles/standard-pump/bomba-de-motor-electrico-series-sp-500', 3),
('MI66', 'MENU2', 'MI93', 'Motores Eléctricos TEFC Series SP 500', 4, 'path', 'bombas-portatiles/standard-pump/motores-electricos-tefc-series-sp-500', 4),
('MI67', 'MENU2', 'MI32', 'Tubos Serie SP 800DD', 4, 'path', 'bombas-portatiles/standard-pump/tubos-serie-sp-800dd', 1),
('MI68', 'MENU2', 'MI32', 'Tubos Serie SP 800SR', 4, 'path', 'bombas-portatiles/standard-pump/tubos-serie-sp-800sr', 2),
('MI69', 'MENU2', 'MI93', 'Motores Eléctricos Washdown Series SP 500', 4, 'path', 'bombas-portatiles/standard-pump/motores-electricos-washdown-series-sp-500', 5),
('MI7', 'MENU1', NULL, 'Contáctenos', 1, 'path', 'contacto', 7),
('MI70', 'MENU2', 'MI93', 'Motores Eléctricos Encapsulado Series SP 500', 4, 'path', 'bombas-portatiles/standard-pump/motores-electricos-encapsulado-series-sp-500', 6),
('MI72', 'MENU3', NULL, 'SKID de Dosificación de Alta Precisión', 1, 'path', 'skid-dosificacion-alta-precision', 1),
('MI73', 'MENU3', NULL, 'Sistema de Dosificación Automática', 1, 'path', 'sistema-dosificacion-automatica', 2),
('MI74', 'MENU3', NULL, 'Planta de Tratamiendo de Aguas Acidas', 1, 'path', 'planta-tratamiento-aguas-acidas', 3),
('MI76', 'MENU3', NULL, 'Planta Compacta de Tratamiento de Aguas Residuales EEC', 1, 'path', 'planta-compacta-tratamiento-aguas-residuales-eec', 5),
('MI77', 'MENU3', NULL, 'Bombeo de lodos y pulpas de mineral', 1, 'path', 'bombeo-lodos-&-pulpas-de-mineral', 6),
('MI78', 'MENU3', NULL, 'Sistema de Dosificación de Reactivos Sólidos', 1, 'path', 'sistema-dosificacion-reactivos-solidos', 7),
('MI79', 'MENU3', NULL, 'Planta Compacta de Preparación y Dosificación de Floculantes', 1, 'path', 'planta-compacta-preparacion-&-dosificacion-floculantes', 8),
('MI80', 'MENU3', NULL, 'Agitadores Vak Kimsa', 1, 'path', 'agitadores-vak-kimsa', 9),
('MI81', 'MENU2', 'MI21', 'Serie Black Line RBB', 3, 'path', 'bombas-dosificadoras/obl/serie-black-line-rbb', 6),
('MI82', 'MENU2', 'MI21', 'Serie Black Plus XRN', 3, 'path', 'bombas-dosificadoras/obl/serie-black-plus-xrn', 8),
('MI83', 'MENU2', 'MI21', 'Serie Black Plus RCC', 3, 'path', 'bombas-dosificadoras/obl/serie-black-plus-rcc', 9),
('MI84', 'MENU2', 'MI10', 'Accionadas con Motor Eléctrico Walchem', 2, 'category', NULL, 3),
('MI85', 'MENU2', 'MI11', 'ALBIN', 2, 'category', NULL, 1),
('MI86', 'MENU2', 'MI9', 'Walchem', 2, 'category', NULL, 1),
('MI87', 'MENU2', 'MI14', 'Standard Pump', 2, 'category', NULL, 1),
('MI88', 'MENU2', 'MI16', 'Calderos WBL400/WDB400', 4, 'path', 'controladores/walchem/serie-w400-calderos', 1),
('MI89', 'MENU2', 'MI16', 'Torres de Enfriamiento WCT400/WDT400', 4, 'path', 'controladores/walchem/serie-w400-torres-de-enfriamiento', 2),
('MI9', 'MENU2', NULL, 'Controladores', 1, 'category', NULL, 5),
('MI90', 'MENU2', 'MI16', 'PH-Redox WPH/WDP', 4, 'path', 'controladores/walchem/serie-w400-ph-redox', 3),
('MI91', 'MENU2', 'MI18', 'WIND Industrial', 4, 'path', 'controladores/walchem/serie-webmaster-wind-industrial', 1),
('MI92', 'MENU2', 'MI18', 'WM18', 4, 'path', 'controladores/walchem/serie-webmaster-wm18', 2),
('MI93', 'MENU2', 'MI87', 'Motores', 4, 'category', NULL, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news`
--

CREATE TABLE `news` (
  `id` varchar(10) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `contentFilePath` varchar(1000) NOT NULL,
  `summaryFilePath` varchar(1000) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `news`
--

INSERT INTO `news` (`id`, `title`, `contentFilePath`, `summaryFilePath`, `date`) VALUES
('NEWS1', 'Descarga nuestro nuevo brochure!', 'news/NEWS1.html', 'news/summary/NEWS1.html', '1406795470'),
('NEWS2', 'Download our new brochure!', 'news/NEWS2.html', 'news/summary/NEWS2.html', '1406795470'),
('NEWS3', 'Descarga el nuevo brochure de EEC South America!', 'news/NEWS3.html', 'news/summary/NEWS3.html', '1406795470'),
('NEWS4', 'Panorama de las plantas de tratamiento de aguas residuales', 'news/NEWS4.html', 'news/summary/NEWS4.html', '1406795470');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `news_tag`
--

CREATE TABLE `news_tag` (
  `id` varchar(10) NOT NULL,
  `newsId` varchar(10) NOT NULL,
  `tagId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `news_tag`
--

INSERT INTO `news_tag` (`id`, `newsId`, `tagId`) VALUES
('NT1', 'NEWS1', 'TAG1'),
('NT2', 'NEWS1', 'TAG2'),
('NT3', 'NEWS3', 'TAG3'),
('NT4', 'NEWS4', 'TAG4'),
('NT5', 'NEWS3', 'TAG2'),
('NT6', 'NEWS4', 'TAG1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `page`
--

CREATE TABLE `page` (
  `id` varchar(10) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `page`
--

INSERT INTO `page` (`id`, `name`) VALUES
('PAGE1', 'Nosotros'),
('PAGE2', 'Equipos'),
('PAGE3', 'Sistemas'),
('PAGE4', 'Servicios'),
('PAGE5', 'Proyectos'),
('PAGE6', 'Noticias'),
('PAGE7', 'Contactenos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `path`
--

CREATE TABLE `path` (
  `id` varchar(10) NOT NULL,
  `url` varchar(2000) NOT NULL,
  `type` varchar(500) NOT NULL,
  `reference` varchar(500) NOT NULL,
  `isContent` int(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `path`
--

INSERT INTO `path` (`id`, `url`, `type`, `reference`, `isContent`) VALUES
('PATH0', '', 'page', 'home', NULL),
('PATH10', 'bombas-dosificadoras/walchem-&-iwaki/serie-ehhv', 'equipment', 'PROD9', 0),
('PATH100', 'minera-bateas-medicion-de-flujos-de-agua-de-entrada-y-salida', 'project', 'PROJ10', 0),
('PATH101', 'bombas-portatiles/standard-pump/motores-series-sp400-2', 'equipment', 'PROD58', 0),
('PATH102', 'proyectos/control-de-ph', 'tag', 'TAG9', 0),
('PATH103', 'proyectos/piscinas', 'tag', 'TAG10', 0),
('PATH104', 'proyectos/aguas-residuales-domesticas', 'tag', 'TAG11', 0),
('PATH11', 'bombas-dosificadoras/walchem-&-iwaki/serie-ek', 'equipment', 'PROD10', 0),
('PATH12', 'bombas-dosificadoras/walchem-&-iwaki/serie-ew', 'equipment', 'PROD11', 0),
('PATH13', 'bombas-dosificadoras/obl/serie-l-api-675', 'equipment', 'PROD13', 0),
('PATH14', 'bombas-dosificadoras/obl/serie-xl-api-675', 'equipment', 'PROD17', 0),
('PATH15', 'bombas-dosificadoras/obl/serie-x9-api-675', 'equipment', 'PROD15', 0),
('PATH16', 'bombas-dosificadoras/obl/serie-black-line-mb-mc', 'equipment', 'PROD14', 0),
('PATH17', 'bombas-dosificadoras/obl/serie-black-line-rbb', 'equipment', 'PROD50', 0),
('PATH18', 'bombas-dosificadoras/obl/serie-black-plus-md', 'equipment', 'PROD16', 0),
('PATH19', 'bombas-dosificadoras/obl/serie-black-plus-xrn', 'equipment', 'PROD51', 0),
('PATH2', 'bombas-dosificadoras/walchem-&-iwaki', 'equipment', 'CONT1', 1),
('PATH20', 'bombas-dosificadoras/obl/serie-black-plus-rcc', 'equipment', 'PROD52', 0),
('PATH21', 'bombas-dosificadoras/walchem-&-iwaki/serie-ez', 'equipment', 'PROD12', 0),
('PATH29', 'bombas-peristalticas/albin/serie-alh', 'equipment', 'PROD5', 0),
('PATH3', 'bombas-dosificadoras/obl', 'equipment', 'CONT2', 1),
('PATH30', 'bombas-peristalticas/albin/serie-alp', 'equipment', 'PROD6', 0),
('PATH31', 'controladores/walchem/serie-w400-calderos', 'equipment', 'PROD53', 0),
('PATH32', 'controladores/walchem/serie-w400-torres-de-enfriamiento', 'equipment', 'PROD54', 0),
('PATH33', 'controladores/walchem/serie-w400-ph-redox', 'equipment', 'PROD55', 0),
('PATH34', 'controladores/walchem/serie-webmaster-wind-industrial', 'equipment', 'PROD56', 0),
('PATH35', 'controladores/walchem/serie-webmaster-wm18', 'equipment', 'PROD57', 0),
('PATH36', 'bombas-portatiles/standard-pump/tubos-de-polipropileno', 'equipment', 'PROD26', 0),
('PATH37', 'bombas-portatiles/standard-pump/tubos-de-pdvf', 'equipment', 'PROD27', 0),
('PATH38', 'bombas-portatiles/standard-pump/tubos-de-cpvc', 'equipment', 'PROD28', 0),
('PATH39', 'bombas-portatiles/standard-pump/tubos-de-acero-inoxidable', 'equipment', 'PROD29', 0),
('PATH4', 'bombas-peristalticas/albin', 'equipment', 'CONT3', 1),
('PATH40', 'bombas-portatiles/standard-pump/motores-series-sp-enc', 'equipment', 'PROD30', 0),
('PATH41', 'bombas-portatiles/standard-pump/tubos-serie-sp-8100', 'equipment', 'PROD31', 0),
('PATH42', 'bombas-portatiles/standard-pump/tubos-serie-sp-8200', 'equipment', 'PROD32', 0),
('PATH44', 'bombas-portatiles/standard-pump/tubos-serie-sp-700dd', 'equipment', 'PROD33', 0),
('PATH45', 'bombas-portatiles/standard-pump/tubos-serie-sp-700sr', 'equipment', 'PROD34', 0),
('PATH46', 'bombas-portatiles/standard-pump/bomba-de-motor-electrico-series-sp-500', 'equipment', 'PROD35', 0),
('PATH47', 'bombas-portatiles/standard-pump/motores-electricos-tefc-series-sp-500', 'equipment', 'PROD36', 0),
('PATH48', 'bombas-portatiles/standard-pump/tubos-serie-sp-800dd', 'equipment', 'PROD37', 0),
('PATH49', 'bombas-portatiles/standard-pump/tubos-serie-sp-800sr', 'equipment', 'PROD38', 0),
('PATH5', 'bombas-centrifugas/panworld', 'equipment', 'CONT4', 1),
('PATH50', 'bombas-portatiles/standard-pump/motores-electricos-washdown-series-sp-500', 'equipment', 'PROD39', 0),
('PATH51', 'bombas-portatiles/standard-pump/motores-electricos-encapsulado-series-sp-500', 'equipment', 'PROD40', 0),
('PATH52', 'skid-dosificacion-alta-precision', 'system', 'PROD41', 0),
('PATH53', 'sistema-de-dosificacion-automatica', 'system', 'PROD42', 0),
('PATH54', 'planta-de-tratamiento-de-aguas-acidas', 'system', 'PROD43', 0),
('PATH55', 'sistema-de-apagado-de-cal', 'system', 'PROD44', 0),
('PATH56', 'planta-compacta-de-tratamiento-de-aguas-residuales-eec', 'system', 'PROD45', 0),
('PATH57', 'bombeo-de-lodos-&-pulpas-de-mineral', 'system', 'PROD46', 0),
('PATH58', 'sistema-de-dosificacion-de-reactivos-solidos', 'system', 'PROD47', 0),
('PATH59', 'planta-compacta-de-preparacion-&-dosificacion-de-floculantes', 'system', 'PROD48', 0),
('PATH6', 'bombas-centrifugas/affeti', 'equipment', 'CONT5', 1),
('PATH60', 'agitadores-vak-kimsa', 'system', 'PROD49', 0),
('PATH61', 'nosotros', 'page', 'aboutus', NULL),
('PATH62', 'equipos', 'page', 'equipment', NULL),
('PATH63', 'sistemas', 'page', 'systems', NULL),
('PATH64', 'servicios', 'page', 'services', NULL),
('PATH65', 'casos-de-exito', 'page', 'projects', NULL),
('PATH66', 'noticias', 'page', 'news', NULL),
('PATH67', 'contacto', 'page', 'contact', NULL),
('PATH68', 'bombas-centrifugas/panworld/serie-ps-&-ps-f', 'equipment', 'PROD19', 0),
('PATH69', 'bombas-centrifugas/panworld/serie-pw-&-pw-f', 'equipment', 'PROD20', 0),
('PATH7', 'bombas-portatiles/standard-pump', 'equipment', 'CONT6', 1),
('PATH70', 'bombas-centrifugas/affeti/serie-cdm', 'equipment', 'PROD21', 0),
('PATH71', 'bombas-centrifugas/affeti/serie-cgd', 'equipment', 'PROD22', 0),
('PATH72', 'bombas-centrifugas/affeti/serie-cgo', 'equipment', 'PROD23', 0),
('PATH73', 'bombas-centrifugas/affeti/serie-cmo', 'equipment', 'PROD24', 0),
('PATH74', 'bombas-centrifugas/affeti/serie-msp-e-&-t', 'equipment', 'PROD25', 0),
('PATH75', 'descarga-nuevo-brochure-dynaflux', 'news', 'NEWS1', 0),
('PATH76', 'descarga-nuevo-brochure-eec', 'news', 'NEWS3', 0),
('PATH77', 'panorama-plantas-de-tratamiento-aguas-residuales', 'news', 'NEWS4', 0),
('PATH78', 'quimpac-sistema-de-llenado-automatico-de-cal', 'project', 'PROJ1', 0),
('PATH79', 'cormitoma-instalacion-bombas-peristalticas', 'project', 'PROJ2', 0),
('PATH8', 'controladores/walchem', 'equipment', 'CONT7', 1),
('PATH80', 'alto-cayma-sistema-de-dosificacion-de-reactivos-ptap', 'project', 'PROJ3', 0),
('PATH81', 'controladores/walchem/wec400', 'equipment', 'PROD4', 0),
('PATH82', 'controladores/walchem/wdis410', 'equipment', 'PROD2', 0),
('PATH83', 'proyectos/ptap', 'tag', 'TAG1', 0),
('PATH84', 'proyectos/dosificacion-de-reactivos', 'tag', 'TAG2', 0),
('PATH85', 'proyectos/llenado-de-cal', 'tag', 'TAG3', 0),
('PATH86', 'proyectos/aguas-acidas', 'tag', 'TAG4', 0),
('PATH87', 'proyectos/planta-de-tratamiento', 'tag', 'TAG5', 0),
('PATH88', 'proyectos/sistema-automatico', 'tag', 'TAG6', 0),
('PATH89', 'proyectos/molienda-y-rotacion', 'tag', 'TAG7', 0),
('PATH9', 'bombas-dosificadoras/walchem-&-iwaki/serie-ehe', 'equipment', 'PROD8', 0),
('PATH90', 'proyectos/control-de-cloro-libre', 'tag', 'TAG8', 0),
('PATH91', 'bombas-dosificadoras/walchem-&-iwaki/serie-ix', 'equipment', 'PROD18', 0),
('PATH92', 'terminos-&-condiciones', 'page', 'terms', NULL),
('PATH93', 'terms-&-conditions', 'page', 'terms', NULL),
('PATH94', 'anglo-american-planta-de-tratamiento-de-aguas-acidas', 'project', 'PROJ4', 0),
('PATH95', 'minera-antapaccay-sistema-de-almacenamiento-y-dosificacion-de-productos-nalco', 'project', 'PROJ5', 0),
('PATH96', 'minera-bateas-sistema-de-dosificacion-de-reactivos-para-molienda-y-rotacion', 'project', 'PROJ6', 0),
('PATH97', 'corporacion-lindley-sistema-automatico-de-control-de-oxigeno-disuelto-en-una-ptar', 'project', 'PROJ7', 0),
('PATH98', 'cemento-sur-planta-de-tratamiento-de-aguas-domesticas', 'project', 'PROJ8', 0),
('PATH99', 'aqualife-sistema-automatico-para-control-de-cloro-libre-y-ph-en-pisicinas', 'project', 'PROJ9', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `id` varchar(10) NOT NULL,
  `title` varchar(1000) NOT NULL,
  `detailFilePath` varchar(1000) NOT NULL,
  `type` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`id`, `title`, `detailFilePath`, `type`, `state`) VALUES
('PROD10', '[Walchem] Serie EK', 'products/PROD10.html', 'equipment', 'normal'),
('PROD11', '[Walchem] Serie EW', 'products/PROD11.html', 'equipment', 'normal'),
('PROD12', '[Walchem] Serie EZ', 'products/PROD12.html', 'equipment', 'normal'),
('PROD13', '[OBL] Serie L API 675', 'products/PROD13.html', 'equipment', 'normal'),
('PROD14', '[OBL] [Serie Black Line] MB/MC', 'products/PROD14.html', 'equipment', 'normal'),
('PROD15', '[OBL] Serie X9 API 675', 'products/PROD15.html', 'equipment', 'normal'),
('PROD16', '[OBL] [Serie Black Plus] MD', 'products/PROD16.html', 'equipment', 'normal'),
('PROD17', '[OBL] Serie XL API 675', 'products/PROD17.html', 'equipment', 'normal'),
('PROD18', '[Walchem] Serie IX', 'products/PROD18.html', 'equipment', 'oustanding'),
('PROD19', '[Panworld] Serie PS/PS-F', 'products/PROD19.html', 'equipment', 'normal'),
('PROD2', '[Walchem] Serie WDIS 410', 'products/PROD2.html', 'equipment', 'oustanding'),
('PROD20', '[Panworld] Serie PW/PW-F', 'products/PROD20.html', 'equipment', 'oustanding'),
('PROD21', '[Affetti] Serie CDM', 'products/PROD21.html', 'equipment', 'oustanding'),
('PROD22', '[Affetti] Serie CGD', 'products/PROD22.html', 'equipment', 'normal'),
('PROD23', '[Affetti] Serie CGO', 'products/PROD23.html', 'equipment', 'normal'),
('PROD24', '[Affetti] Serie CMO', 'products/PROD24.html', 'equipment', 'normal'),
('PROD25', '[Affetti] Serie Autocebante MSP-E/T', 'products/PROD25.html', 'equipment', 'normal'),
('PROD26', '[Standard Pump] Tubos de Polipropileno', 'products/PROD26.html', 'equipment', 'normal'),
('PROD27', '[Standard Pump] Tubos de PDVF', 'products/PROD27.html', 'equipment', 'normal'),
('PROD28', '[Standard Pump] Tubos de CPVC', 'products/PROD28.html', 'equipment', 'normal'),
('PROD29', '[Standard Pump] Tubos de Acero Inoxidable', 'products/PROD29.html', 'equipment', 'normal'),
('PROD30', '[Standard Pump] Motores Series SP ENC', 'products/PROD30.html', 'equipment', 'normal'),
('PROD31', '[Standard Pump] Tubos Serie SP 8100', 'products/PROD31.html', 'equipment', 'oustanding'),
('PROD32', '[Standard Pump] Tubos Serie SP 8200', 'products/PROD32.html', 'equipment', 'normal'),
('PROD33', '[Standard Pump] Tubos Serie SP 700DD', 'products/PROD33.html', 'equipment', 'normal'),
('PROD34', '[Standard Pump] Tubos Serie SP 700SR', 'products/PROD34.html', 'equipment', 'normal'),
('PROD35', '[Standard Pump] Bomba de Motor Eléctrico TEFC Series SP 500', 'products/PROD35.html', 'equipment', 'normal'),
('PROD36', '[Standard Pump] Motores Eléctricos TEFC Series SP 500', 'products/PROD36.html', 'equipment', 'normal'),
('PROD37', '[Standard Pump] Tubos Serie SP 800DD', 'products/PROD37.html', 'equipment', 'normal'),
('PROD38', '[Standard Pump] Tubos Serie SP 800SR', 'products/PROD38.html', 'equipment', 'normal'),
('PROD39', '[Standard Pump] Motores Eléctricos Washdown Series SP 500', 'products/PROD39.html', 'equipment', 'normal'),
('PROD4', '[Walchem] Serie WEC 400', 'products/PROD4.html', 'equipment', 'normal'),
('PROD40', '[Standard Pump] Motores Eléctricos Encapsulado Series SP 500', 'products/PROD40.html', 'equipment', 'normal'),
('PROD41', 'SKID de Dosificación de Alta Precisión', 'products/PROD41.html', 'system', 'normal'),
('PROD42', 'Sistema de Dosificación Automática', 'products/PROD42.html', 'system', 'normal'),
('PROD43', 'Planta de Tratamiendo de Aguas Acidas', 'products/PROD43.html', 'system', 'oustanding'),
('PROD45', 'Planta Compacta de Tratamiento de Aguas Residuales EEC', 'products/PROD45.html', 'system', 'normal'),
('PROD46', 'Bombeo de lodos y pulpas de mineral', 'products/PROD46.html', 'system', 'normal'),
('PROD47', 'Sistema de Dosificación de Reactivos Sólidos', 'products/PROD47.html', 'system', 'normal'),
('PROD48', 'Planta Compacta de Preparación y Dosificación de Floculantes', 'products/PROD48.html', 'system', 'normal'),
('PROD49', 'Agitadores Vak Kimsa', 'products/PROD49.html', 'system', 'oustanding'),
('PROD5', '[ALBIN] Serie ALH', 'products/PROD5.html', 'equipment', 'oustanding'),
('PROD50', '[OBL] [Serie Black Line] RBB', 'products/PROD50.html', 'equipment', 'normal'),
('PROD51', '[OBL] [Serie Black Plus] XRN', 'products/PROD51.html', 'equipment', 'normal'),
('PROD52', '[OBL] [Serie Black Plus] RCC', 'products/PROD52.html', 'equipment', 'normal'),
('PROD53', '[Walchem] [W400] Calderos WBL400/WDB400', 'products/PROD53.html', 'equipment', 'normal'),
('PROD54', '[Walchem] [W400] Torres de Enfriamiento WCT400/WDT400', 'products/PROD54.html', 'equipment', 'normal'),
('PROD55', '[Walchem] [W400] PH-Redox WPH/WDP', 'products/PROD55.html', 'equipment', 'normal'),
('PROD56', '[Walchem] [Webmaster] WIND Industrial', 'products/PROD56.html', 'equipment', 'normal'),
('PROD57', '[Walchem] [Webmaster] WM18', 'products/PROD57.html', 'equipment', 'normal'),
('PROD58', '[Standard Pump] Motores Series SP 400-2', 'products/PROD58.html', 'equipment', 'normal'),
('PROD6', '[ALBIN] Serie ALP', 'products/PROD6.html', 'equipment', 'normal'),
('PROD8', '[Walchem] Serie EHE', 'products/PROD8.html', 'equipment', 'normal'),
('PROD9', '[Walchem] Serie EHHV de Alta Viscosidad', 'products/PROD9.html', 'equipment', 'normal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project`
--

CREATE TABLE `project` (
  `id` varchar(10) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `descriptionFilePath` varchar(1000) NOT NULL,
  `summaryFilePath` varchar(1000) NOT NULL,
  `state` varchar(200) NOT NULL,
  `weight` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `project`
--

INSERT INTO `project` (`id`, `name`, `descriptionFilePath`, `summaryFilePath`, `state`, `weight`) VALUES
('PROJ1', 'Quimpac: Sistema de llenado automático de cal', 'projects/PROJ1.html', 'projects/summary/PROJ1.html', 'completed', 1),
('PROJ3', 'Alto Cayma: Sistema de dosificación de reactivos PTAP', 'projects/PROJ3.html', 'projects/summary/PROJ3.html', 'completed', 3),
('PROJ4', 'Anglo American Perú: Planta de tratamiento de aguas ácidas', 'projects/PROJ4.html', 'projects/summary/PROJ4.html', 'completed', 4),
('PROJ6', 'Minera Bateas: Sistema de dosificación de reactivos para molienda y rotación', 'projects/PROJ6.html', 'projects/summary/PROJ6.html', 'completed', 6),
('PROJ8', 'Cemento Sur: Planta de tratamiento de aguas residuales domésticas', 'projects/PROJ8.html', 'projects/summary/PROJ8.html', 'completed', 8),
('PROJ9', 'Aqualife SRL: Sistema automático para control de cloro libre y Ph en psicinas', 'projects/PROJ9.html', 'projects/summary/PROJ9.html', 'completed', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `project_tag`
--

CREATE TABLE `project_tag` (
  `id` varchar(10) NOT NULL,
  `projectId` varchar(10) NOT NULL,
  `tagId` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `project_tag`
--

INSERT INTO `project_tag` (`id`, `projectId`, `tagId`) VALUES
('PT1', 'PROJ1', 'TAG3'),
('PT10', 'PROJ8', 'TAG11'),
('PT11', 'PROJ9', 'TAG6'),
('PT12', 'PROJ9', 'TAG8'),
('PT13', 'PROJ9', 'TAG9'),
('PT14', 'PROJ9', 'TAG10'),
('PT2', 'PROJ1', 'TAG6'),
('PT3', 'PROJ3', 'TAG1'),
('PT4', 'PROJ3', 'TAG2'),
('PT5', 'PROJ4', 'TAG4'),
('PT6', 'PROJ4', 'TAG5'),
('PT7', 'PROJ6', 'TAG2'),
('PT8', 'PROJ6', 'TAG7'),
('PT9', 'PROJ8', 'TAG5');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `id` varchar(10) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `service`
--

INSERT INTO `service` (`id`, `name`, `description`) VALUES
('SERV1', 'Ingeniería', 'Desarrollo y ejecución de los proyectos a detalle'),
('SERV2', 'Instalación', 'Montaje de los equipos y sistemas garantizando su óptimo funcionamiento'),
('SERV3', 'Puesta en Marcha', 'Pre-comisionamiento y comosionamiento asegurando el correcto funcionamiento'),
('SERV4', 'Mantenimiento', 'Contratos de mantenimiento para asegurar el correcto funcionamiento las 24 horas del día, los 7 días de la semana'),
('SERV6', 'Investigación y Desarrollo', 'Innovación y desarrollo de nuevos productos a medida de las necesidades del cliente');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slider`
--

CREATE TABLE `slider` (
  `id` varchar(10) NOT NULL,
  `name` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `slider`
--

INSERT INTO `slider` (`id`, `name`) VALUES
('SLIDER1', 'Principal');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide_item`
--

CREATE TABLE `slide_item` (
  `id` varchar(10) NOT NULL,
  `sliderId` varchar(10) NOT NULL,
  `pagerTitle` varchar(2000) NOT NULL,
  `slideTitle` varchar(2000) NOT NULL,
  `summaryFilePath` varchar(1000) NOT NULL,
  `path` varchar(100) NOT NULL,
  `weight` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `slide_item`
--

INSERT INTO `slide_item` (`id`, `sliderId`, `pagerTitle`, `slideTitle`, `summaryFilePath`, `path`, `weight`) VALUES
('SLI1', 'SLIDER1', 'SKID WALCHEM', 'SKID de Dosificación de Alta Precisión', 'slides/SLI1.html', 'skid-dosificacion-alta-precision', 4),
('SLI5', 'SLIDER1', 'EEC', 'Planta Compacta de Tratamiento de Aguas Residuales EEC', 'slides/SLI5.html', 'planta-compacta-de-tratamiento-de-aguas-residuales-eec', 1),
('SLI6', 'SLIDER1', 'ALBIN', 'Bombeo de lodos y pulpas de mineral', 'slides/SLI6.html', 'bombeo-de-lodos-&-pulpas-de-mineral', 5),
('SLI7', 'SLIDER1', 'SODIMATE', 'Sistema de Dosificación de Reactivos Sólidos', 'slides/SLI7.html', 'sistema-de-dosificacion-de-reactivos-solidos', 6),
('SLI8', 'SLIDER1', 'POLISOL OBL', 'Planta Compacta de Preparación y Dosificación de Floculantes', 'slides/SLI8.html', 'planta-compacta-de-preparacion-&-dosificacion-de-floculantes', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tag`
--

CREATE TABLE `tag` (
  `id` varchar(10) NOT NULL,
  `name` varchar(1000) NOT NULL,
  `type` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tag`
--

INSERT INTO `tag` (`id`, `name`, `type`) VALUES
('TAG1', 'PTAP', 'project'),
('TAG10', 'Piscinas', 'project'),
('TAG11', 'Aguas residuales domésticas', 'project'),
('TAG2', 'Dosificación de reactivos', 'project'),
('TAG3', 'Llenado de cal', 'project'),
('TAG4', 'Aguas ácidas', 'project'),
('TAG5', 'Planta de tratamiento', 'project'),
('TAG6', 'Sistema automático', 'project'),
('TAG7', 'Molienda y rotación', 'project'),
('TAG8', 'Control de cloro libre', 'project'),
('TAG9', 'Control de Ph', 'project');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trademark`
--

CREATE TABLE `trademark` (
  `id` varchar(10) NOT NULL,
  `name` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `trademark`
--

INSERT INTO `trademark` (`id`, `name`) VALUES
('TM1', 'Walchem'),
('TM2', 'OBL'),
('TM3', 'Albin'),
('TM4', 'Panworld'),
('TM6', 'Standard Pump'),
('TM7', 'Chemco'),
('TM8', 'Sodimate'),
('TM9', 'EEC');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `traffic`
--

CREATE TABLE `traffic` (
  `id` varchar(10) NOT NULL,
  `reference` varchar(10) NOT NULL,
  `ip` varchar(20) NOT NULL,
  `date` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `traffic`
--

INSERT INTO `traffic` (`id`, `reference`, `ip`, `date`) VALUES
('TRFC1', 'NEWS1', '192.168.0.12', '1406795470');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `translation`
--

CREATE TABLE `translation` (
  `id` varchar(10) NOT NULL,
  `entityId` varchar(10) NOT NULL,
  `langCode` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `translation`
--

INSERT INTO `translation` (`id`, `entityId`, `langCode`) VALUES
('TRANS1', 'NEWS1', 'es'),
('TRANS1', 'NEWS2', 'en'),
('TRANS10', 'MI1', 'es'),
('TRANS100', 'PROD14', 'es'),
('TRANS101', 'PROD15', 'es'),
('TRANS102', 'PROD16', 'es'),
('TRANS103', 'PROD17', 'es'),
('TRANS104', 'PROD18', 'es'),
('TRANS105', 'PROD19', 'es'),
('TRANS106', 'PROD20', 'es'),
('TRANS107', 'PROD21', 'es'),
('TRANS108', 'PROD22', 'es'),
('TRANS109', 'PROD23', 'es'),
('TRANS11', 'MI2', 'es'),
('TRANS110', 'PROD24', 'es'),
('TRANS111', 'PROD25', 'es'),
('TRANS112', 'PROD26', 'es'),
('TRANS113', 'PROD27', 'es'),
('TRANS114', 'PROD28', 'es'),
('TRANS115', 'PROD29', 'es'),
('TRANS116', 'PROD30', 'es'),
('TRANS117', 'PROD31', 'es'),
('TRANS118', 'PROD32', 'es'),
('TRANS119', 'PROD33', 'es'),
('TRANS12', 'MI3', 'es'),
('TRANS120', 'PROD34', 'es'),
('TRANS121', 'PROD35', 'es'),
('TRANS122', 'PROD36', 'es'),
('TRANS123', 'PROD37', 'es'),
('TRANS124', 'PROD38', 'es'),
('TRANS125', 'PROD39', 'es'),
('TRANS126', 'PROD40', 'es'),
('TRANS127', 'PROD41', 'es'),
('TRANS128', 'PROD42', 'es'),
('TRANS129', 'PROD43', 'es'),
('TRANS13', 'MI4', 'es'),
('TRANS130', 'PROD44', 'es'),
('TRANS131', 'PROD45', 'es'),
('TRANS132', 'PROD46', 'es'),
('TRANS133', 'PROD47', 'es'),
('TRANS134', 'PROD48', 'es'),
('TRANS135', 'PROD49', 'es'),
('TRANS136', 'PROJ1', 'es'),
('TRANS137', 'PROJ2', 'es'),
('TRANS138', 'PROJ3', 'es'),
('TRANS139', 'SLI1', 'es'),
('TRANS14', 'MI5', 'es'),
('TRANS140', 'SLI2', 'es'),
('TRANS141', 'SLI3', 'es'),
('TRANS142', 'CONT1', 'es'),
('TRANS143', 'CONT2', 'es'),
('TRANS144', 'CONT3', 'es'),
('TRANS145', 'PROD50', 'es'),
('TRANS146', 'PROD51', 'es'),
('TRANS147', 'PROD52', 'es'),
('TRANS148', 'CONT4', 'es'),
('TRANS149', 'CONT5', 'es'),
('TRANS15', 'MI6', 'es'),
('TRANS150', 'CONT6', 'es'),
('TRANS151', 'CONT7', 'es'),
('TRANS152', 'MI81', 'es'),
('TRANS153', 'MI82', 'es'),
('TRANS154', 'MI83', 'es'),
('TRANS155', 'PROD53', 'es'),
('TRANS156', 'PROD54', 'es'),
('TRANS157', 'PROD55', 'es'),
('TRANS158', 'PROD56', 'es'),
('TRANS159', 'PROD57', 'es'),
('TRANS16', 'MI7', 'es'),
('TRANS160', 'MI84', 'es'),
('TRANS161', 'MI85', 'es'),
('TRANS162', 'MI86', 'es'),
('TRANS163', 'MI87', 'es'),
('TRANS164', 'MI88', 'es'),
('TRANS165', 'MI89', 'es'),
('TRANS166', 'MI90', 'es'),
('TRANS167', 'MI91', 'es'),
('TRANS168', 'CONT8', 'es'),
('TRANS168', 'CONT9', 'es'),
('TRANS168', 'MI92', 'es'),
('TRANS169', 'DWNLD1', 'es'),
('TRANS17', 'MI8', 'es'),
('TRANS170', 'DWNLD2', 'es'),
('TRANS171', 'LOC1', 'es'),
('TRANS172', 'LOC2', 'es'),
('TRANS173', 'CON1', 'es'),
('TRANS174', 'CON2', 'es'),
('TRANS175', 'SERV4', 'es'),
('TRANS176', 'SERV5', 'es'),
('TRANS177', 'SERV6', 'es'),
('TRANS179', 'DEP2', 'es'),
('TRANS18', 'MI9', 'es'),
('TRANS180', 'DEP3', 'es'),
('TRANS181', 'DEP4', 'es'),
('TRANS182', 'CI1', 'es'),
('TRANS183', 'CI2', 'es'),
('TRANS184', 'CI3', 'es'),
('TRANS185', 'CI4', 'es'),
('TRANS186', 'CI5', 'es'),
('TRANS187', 'CI6', 'es'),
('TRANS188', 'CI7', 'es'),
('TRANS189', 'DWNLD3', 'es'),
('TRANS19', 'MI10', 'es'),
('TRANS190', 'DWNLD4', 'es'),
('TRANS191', 'SLI4', 'es'),
('TRANS192', 'SLI5', 'es'),
('TRANS193', 'SLI6', 'es'),
('TRANS194', 'SLI7', 'es'),
('TRANS195', 'SLI8', 'es'),
('TRANS196', 'SLI9', 'es'),
('TRANS197', 'TAG1', 'es'),
('TRANS198', 'TAG2', 'es'),
('TRANS199', 'TAG3', 'es'),
('TRANS2', 'NEWS3', 'es'),
('TRANS20', 'MI11', 'es'),
('TRANS200', 'TAG4', 'es'),
('TRANS201', 'TAG5', 'es'),
('TRANS202', 'TAG6', 'es'),
('TRANS203', 'TAG7', 'es'),
('TRANS204', 'TAG8', 'es'),
('TRANS205', 'CON3', 'es'),
('TRANS206', 'CONT10', 'es'),
('TRANS206', 'CONT11', 'en'),
('TRANS207', 'PROJ4', 'es'),
('TRANS208', 'PROJ5', 'es'),
('TRANS209', 'PROJ6', 'es'),
('TRANS21', 'MI12', 'es'),
('TRANS210', 'PROJ7', 'es'),
('TRANS211', 'PROJ8', 'es'),
('TRANS212', 'PROJ9', 'es'),
('TRANS213', 'PROJ10', 'es'),
('TRANS214', 'CONT12', 'es'),
('TRANS215', 'MI93', 'es'),
('TRANS216', 'PROD58', 'es'),
('TRANS217', 'TAG9', 'es'),
('TRANS218', 'TAG10', 'es'),
('TRANS219', 'TAG11', 'es'),
('TRANS22', 'MI13', 'es'),
('TRANS23', 'MI14', 'es'),
('TRANS24', 'MI15', 'es'),
('TRANS25', 'MI16', 'es'),
('TRANS26', 'MI17', 'es'),
('TRANS27', 'MI18', 'es'),
('TRANS28', 'MI19', 'es'),
('TRANS29', 'MI20', 'es'),
('TRANS3', 'NEWS4', 'es'),
('TRANS30', 'MI21', 'es'),
('TRANS31', 'MI22', 'es'),
('TRANS32', 'MI23', 'es'),
('TRANS33', 'MI24', 'es'),
('TRANS34', 'MI25', 'es'),
('TRANS35', 'MI26', 'es'),
('TRANS36', 'MI28', 'es'),
('TRANS37', 'MI29', 'es'),
('TRANS38', 'MI30', 'es'),
('TRANS39', 'MI31', 'es'),
('TRANS4', 'SERV1', 'es'),
('TRANS4', 'SERV4', 'en'),
('TRANS40', 'MI32', 'es'),
('TRANS41', 'MI33', 'es'),
('TRANS42', 'MI34', 'es'),
('TRANS43', 'MI35', 'es'),
('TRANS44', 'MI36', 'es'),
('TRANS45', 'MI37', 'es'),
('TRANS46', 'MI38', 'es'),
('TRANS47', 'MI39', 'es'),
('TRANS48', 'MI40', 'es'),
('TRANS49', 'MI41', 'es'),
('TRANS5', 'SERV2', 'es'),
('TRANS5', 'SERV5', 'en'),
('TRANS50', 'MI42', 'es'),
('TRANS51', 'MI43', 'es'),
('TRANS52', 'MI44', 'es'),
('TRANS53', 'MI45', 'es'),
('TRANS54', 'MI46', 'es'),
('TRANS55', 'MI47', 'es'),
('TRANS56', 'MI48', 'es'),
('TRANS57', 'MI49', 'es'),
('TRANS58', 'MI50', 'es'),
('TRANS59', 'MI51', 'es'),
('TRANS6', 'SERV3', 'es'),
('TRANS6', 'SERV6', 'en'),
('TRANS60', 'MI52', 'es'),
('TRANS61', 'MI53', 'es'),
('TRANS62', 'MI54', 'es'),
('TRANS63', 'MI55', 'es'),
('TRANS64', 'MI56', 'es'),
('TRANS65', 'MI57', 'es'),
('TRANS66', 'MI58', 'es'),
('TRANS67', 'MI59', 'es'),
('TRANS68', 'MI60', 'es'),
('TRANS69', 'MI61', 'es'),
('TRANS70', 'MI62', 'es'),
('TRANS71', 'MI63', 'es'),
('TRANS72', 'MI64', 'es'),
('TRANS73', 'MI65', 'es'),
('TRANS74', 'MI66', 'es'),
('TRANS75', 'MI67', 'es'),
('TRANS76', 'MI68', 'es'),
('TRANS77', 'MI69', 'es'),
('TRANS78', 'MI70', 'es'),
('TRANS79', 'MI71', 'es'),
('TRANS80', 'MI72', 'es'),
('TRANS81', 'MI73', 'es'),
('TRANS82', 'MI74', 'es'),
('TRANS83', 'MI75', 'es'),
('TRANS84', 'MI76', 'es'),
('TRANS85', 'MI77', 'es'),
('TRANS86', 'MI78', 'es'),
('TRANS87', 'MI79', 'es'),
('TRANS88', 'MI80', 'es'),
('TRANS89', 'PROD1', 'es'),
('TRANS90', 'PROD2', 'es'),
('TRANS91', 'PROD3', 'es'),
('TRANS92', 'PROD4', 'es'),
('TRANS93', 'PROD5', 'es'),
('TRANS94', 'PROD6', 'es'),
('TRANS95', 'PROD8', 'es'),
('TRANS96', 'PROD9', 'es'),
('TRANS97', 'PROD10', 'es'),
('TRANS98', 'PROD11', 'es'),
('TRANS99', 'PROD13', 'es');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `category_item`
--
ALTER TABLE `category_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `content`
--
ALTER TABLE `content`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entity_creation`
--
ALTER TABLE `entity_creation`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entity_file`
--
ALTER TABLE `entity_file`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `entity_image`
--
ALTER TABLE `entity_image`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `file`
--
ALTER TABLE `file`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menu_item`
--
ALTER TABLE `menu_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `news_tag`
--
ALTER TABLE `news_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `path`
--
ALTER TABLE `path`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `project_tag`
--
ALTER TABLE `project_tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `slide_item`
--
ALTER TABLE `slide_item`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `trademark`
--
ALTER TABLE `trademark`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `traffic`
--
ALTER TABLE `traffic`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `translation`
--
ALTER TABLE `translation`
  ADD PRIMARY KEY (`id`,`entityId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
