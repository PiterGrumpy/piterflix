-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: mysql
-- Tiempo de generación: 10-03-2023 a las 11:30:26
-- Versión del servidor: 8.0.32
-- Versión de PHP: 8.1.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `streaming`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actor`
--

CREATE TABLE `actor` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidad` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anoNacimiento` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apiPelis`
--

CREATE TABLE `apiPelis` (
  `id` bigint UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_original` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `apiPelis`
--

INSERT INTO `apiPelis` (`id`, `titulo`, `titulo_original`, `created_at`, `updated_at`) VALUES
(411, 'Las crónicas de Narnia: El león, la bruja y el armario', 'The Chronicles of Narnia: The Lion, the Witch and the Wardrobe', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(19995, 'Avatar', 'Avatar', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(32516, '金瓶梅2 愛的奴隸', '金瓶梅2 愛的奴隸', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(49046, 'Sin novedad en el frente', 'Im Westen nichts Neues', '2023-03-09 13:50:24', '2023-03-09 13:50:24'),
(67308, 'Sex and Zen Extreme Ecstasy', '3D肉蒲團之極樂寶鑑', '2023-03-09 13:50:24', '2023-03-09 13:50:24'),
(76600, 'Avatar: El sentido del agua', 'Avatar: The Way of Water', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(262743, 'オフィスラブ　真昼の禁猟区', 'オフィスラブ　真昼の禁猟区', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(267805, 'No hay santos', 'There Are No Saints', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(299536, 'Vengadores: Infinity War', 'Avengers: Infinity War', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(312221, 'Creed. La leyenda de Rocky', 'Creed', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(315162, 'El Gato con Botas: El último deseo', 'Puss in Boots: The Last Wish', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(361743, 'Top Gun: Maverick', 'Top Gun: Maverick', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(414906, 'The Batman', 'The Batman', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(436270, 'Black Adam', 'Black Adam', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(438551, 'Peach Girl', 'ピーチガール', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(480530, 'Creed II: La leyenda de Rocky', 'Creed II', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(497828, 'El triángulo de la tristeza', 'Triangle of Sadness', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(505642, 'Black Panther: Wakanda Forever', 'Black Panther: Wakanda Forever', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(507086, 'Jurassic World: Dominion', 'Jurassic World Dominion', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(536554, 'M3GAN', 'M3GAN', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(542196, 'Wolf hound: lobos de acero', 'Wolf Hound', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(551271, 'Medieval', 'Medieval', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(554447, '여직원의 맛', '여직원의 맛', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(555604, 'Pinocho de Guillermo del Toro', 'Guillermo del Toro\'s Pinocchio', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(573171, 'Huevitos Congelados', 'Huevitos Congelados', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(575322, 'Géminis: El Planeta Oscuro', 'Звёздный разум', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(587092, 'Unicorn Wars', 'Unicorn Wars', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(599019, 'Operación Bebé Oso', 'Большое путешествие. Специальная доставка', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(603692, 'John Wick 4', 'John Wick: Chapter 4', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(610150, 'Dragon Ball Super: Super Hero', 'ドラゴンボール超 スーパーヒーロー', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(615777, 'Babylon', 'Babylon', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(616037, 'Thor: Love and Thunder', 'Thor: Love and Thunder', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(631842, 'Llaman a la puerta', 'Knock at the Cabin', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(634649, 'Spider-Man: No Way Home', 'Spider-Man: No Way Home', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(635302, 'Guardianes de la Noche: Tren infinito', '劇場版「鬼滅の刃」無限列車編', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(640146, 'Ant-Man y la Avispa: Quantumanía', 'Ant-Man and the Wasp: Quantumania', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(646389, 'El piloto', 'Plane', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(653851, 'Devotion: una historia de héroes', 'Devotion', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(661374, 'Puñales por la espalda: El misterio de Glass Onion', 'Glass Onion: A Knives Out Mystery', '2023-03-09 13:50:24', '2023-03-09 13:50:24'),
(663712, 'Terrifier 2', 'Terrifier 2', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(668482, 'Matilda de Roald Dahl: El musical', 'Roald Dahl\'s Matilda the Musical', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(675353, 'Sonic 2: La película', 'Sonic the Hedgehog 2', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(676547, 'Reza por el diablo', 'Prey for the Devil', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(677179, 'Creed III', 'Creed III', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(724495, 'La mujer rey', 'The Woman King', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(736526, 'Trol', 'Troll', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(740952, 'El río de la ira', 'Savage Salvation', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(746524, 'Blood', 'Blood', '2023-03-09 13:50:24', '2023-03-09 13:50:24'),
(754452, 'La última cacería', 'The Last Manhunt', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(758009, 'Una boda explosiva', 'Shotgun Wedding', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(760204, 'La guarida', 'The Lair', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(766507, 'Predator: La presa', 'Prey', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(772515, 'Huesera', 'Huesera', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(782936, 'Efecto nocebo', 'Nocebo', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(785084, 'La ballena', 'The Whale', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(788752, 'Lobo vikingo', 'Vikingulven', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(810693, 'Jujutsu Kaisen 0', '劇場版 呪術廻戦 0', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(818422, 'Ritual', 'Ritueel', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(823999, 'Diabolik - Ginko all\'attacco!', 'Diabolik - Ginko all\'attacco!', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(826753, 'Candy Land', 'Candy Land', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(838484, 'Elige o muere', 'Choose or Die', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(840789, 'Matadero', 'Matadero', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(842544, 'Transfusion', 'Transfusion', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(842942, 'El atracador perfecto', 'Bandit', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(843794, 'JUNG_E', '정이', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(846433, 'El protector', 'The Enforcer', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(852096, 'Un fantasma anda suelto por casa', 'We Have a Ghost', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(873126, 'Me llamo Venganza', 'Il mio nome è vendetta', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(877269, 'Mundo extraño', 'Strange World', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(877703, 'Teen Wolf: La película', 'Teen Wolf: The Movie', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(887379, 'Luz Mala', 'Luz Mala', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(899112, 'Noche de paz', 'Violent Night', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(906221, 'El último baile de Magic Mike', 'Magic Mike\'s Last Dance', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(931954, 'Venus', 'Venus', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(934433, 'Scream VI', 'Scream VI', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(937278, 'El peor vecino del mundo', 'A Man Called Otto', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(943221, 'Mal de ojo', 'Mal de ojo', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(943822, 'La forja de un campeón', 'Prizefighter: The Life of Jem Belcher', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(947938, 'El niño delfín', 'Мальчик-дельфин', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(955991, 'The Offering', 'The Offering', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(965839, 'Lord of the Streets', 'Lord of the Streets', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(966220, 'El francotirador de Donbás', 'Снайпер. Білий ворон', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(980078, 'Winnie-the-Pooh: Blood and Honey', 'Winnie-the-Pooh: Blood and Honey', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(985939, 'Fall', 'Fall', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(988233, 'Hex', 'Hex', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(996727, 'El precio de la venganza', 'The Price We Pay', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(1003580, 'Legión de superhéroes', 'Legion of Super-Heroes', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(1003813, 'Deseo ardiente', 'Out of the Blue', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(1011679, 'Shark Side of the Moon', 'Shark Side of the Moon', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(1013860, 'R.I.P.D 2: La rebelión de los condenados', 'R.I.P.D. 2: Rise of the Damned', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(1013870, 'Kids vs. Aliens', 'Kids vs. Aliens', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(1035806, 'Detective Knight: Última misión', 'Detective Knight: Independence', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(1041513, 'Encanto en el Hollywood Bowl', 'Encanto at the Hollywood Bowl', '2023-03-09 13:50:13', '2023-03-09 13:50:13'),
(1045944, 'El extra navideño del Bebé Jefazo', 'The Boss Baby: Christmas Bonus', '2023-03-09 13:50:34', '2023-03-09 13:50:34'),
(1058732, 'Los Simpson conocen a los Bocelli en Feliz Navidad', 'The Simpsons Meet the Bocellis in Feliz Navidad', '2023-03-09 13:50:01', '2023-03-09 13:50:01'),
(1058949, 'Little Dixie', 'Little Dixie', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(1063422, 'Los extraños', 'The Strays', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(1077280, 'Duro de entrenar', 'Die Hart', '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(1081313, 'Esta noche duermes conmigo', 'Dzisiaj śpisz ze mną', '2023-03-09 13:50:23', '2023-03-09 13:50:23'),
(1086990, 'Malcriados', 'Malcriados', '2023-03-09 13:50:01', '2023-03-09 13:50:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `apiSeries`
--

CREATE TABLE `apiSeries` (
  `id` bigint UNSIGNED NOT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_original` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `apiSeries`
--

INSERT INTO `apiSeries` (`id`, `titulo`, `titulo_original`, `created_at`, `updated_at`) VALUES
(456, 'Los Simpson', 'The Simpsons', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(1100, 'Cómo conocí a vuestra madre', 'How I Met Your Mother', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(1396, 'Breaking Bad', 'Breaking Bad', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(1398, 'Los Soprano', 'The Sopranos', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(1399, 'Juego de tronos', 'Game of Thrones', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(1400, 'Seinfeld', 'Seinfeld', '2023-03-09 13:51:34', '2023-03-09 13:51:34'),
(1402, 'The Walking Dead', 'The Walking Dead', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(1408, 'House', 'House', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(1412, 'Arrow', 'Arrow', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(1413, 'American Horror Story', 'American Horror Story', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(1416, 'Anatomía de Grey', 'Grey\'s Anatomy', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(1418, 'Big Bang', 'The Big Bang Theory', '2023-03-09 13:51:34', '2023-03-09 13:51:34'),
(1419, 'Castle', 'Castle', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(1421, 'Modern Family', 'Modern Family', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(1429, 'Ataque a los Titanes', '進撃の巨人', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(1433, 'Padre Made in USA', 'American Dad!', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(1434, 'Padre de Familia', 'Family Guy', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(1620, 'CSI: Miami', 'CSI: Miami', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(1622, 'Sobrenatural', 'Supernatural', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(1668, 'Friends', 'Friends', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(1911, 'Bones', 'Bones', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(1973, '24', '24', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(2004, 'Malcolm', 'Malcolm in the Middle', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(2190, 'South Park', 'South Park', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(2288, 'Prison Break', 'Prison Break', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(2316, 'The Office', 'The Office', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(2691, 'Dos hombres y medio', 'Two and a Half Men', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(2734, 'Ley y orden: Unidad de Víctimas Especiales', 'Law & Order: Special Victims Unit', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(4057, 'Mentes criminales', 'Criminal Minds', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(4604, 'Smallville', 'Smallville', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(4607, 'Perdidos', 'Lost', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(4614, 'Navy: Investigación criminal', 'NCIS', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(4629, 'Stargate SG-1', 'Stargate SG-1', '2023-03-09 13:51:34', '2023-03-09 13:51:34'),
(5920, 'El Mentalista', 'The Mentalist', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(12637, 'Rebelde', 'Rebelde', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(12971, 'Dragon Ball Z', 'ドラゴンボールゼット', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(15260, 'Hora de aventuras', 'Adventure Time', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(16286, 'Yo soy Betty, la fea', 'Yo soy Betty, la fea', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(18165, 'Crónicas vampíricas', 'The Vampire Diaries', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(30984, 'Bleach', 'ブリーチ', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(31132, 'Historias Corrientes', 'Regular Show', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(31586, 'La Reina del Sur', 'La Reina del Sur', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(31910, 'Naruto Shippuden', 'ナルト 疾風伝', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(32798, 'Hawaii Five-0', 'Hawaii Five-0', '2023-03-09 13:51:34', '2023-03-09 13:51:34'),
(34307, 'Shameless', 'Shameless', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(34524, 'Teen Wolf', 'Teen Wolf', '2023-03-09 13:51:34', '2023-03-09 13:51:34'),
(37606, 'El asombroso mundo de Gumball', 'The Amazing World of Gumball', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(37680, 'Suits', 'Suits', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(39351, 'Grimm', 'Grimm', '2023-03-09 13:51:34', '2023-03-09 13:51:34'),
(43348, 'Pablo Escobar, el patrón del mal', 'Pablo Escobar: El Patrón del Mal', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(44006, 'Chicago Fire', 'Chicago Fire', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(44217, 'Vikingos', 'Vikings', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(44953, 'El señor de los cielos', 'El señor de los cielos', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(46260, 'Naruto', 'ナルト', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(46296, 'Spartacus', 'Spartacus', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(46952, 'The Blacklist', 'The Blacklist', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(48866, 'Los 100', 'The 100', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(52814, 'Halo', 'Halo', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(57243, 'Doctor Who', 'Doctor Who', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(58841, 'Chicago P.D.', 'Chicago P.D.', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(60572, 'Pokémon', 'ポケットモンスター', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(60574, 'Peaky Blinders', 'Peaky Blinders', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(60625, 'Rick y Morty', 'Rick and Morty', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(60735, 'The Flash', 'The Flash', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(62286, 'Fear the Walking Dead', 'Fear the Walking Dead', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(63174, 'Lucifer', 'Lucifer', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(63333, 'The Last Kingdom', 'The Last Kingdom', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(65334, 'Prodigiosa: Las aventuras de Ladybug', 'Miraculous, les aventures de Ladybug et Chat Noir', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(66732, 'Stranger Things', 'Stranger Things', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(69050, 'Riverdale', 'Riverdale', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(71712, 'The Good Doctor', 'The Good Doctor', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(71728, 'El joven Sheldon', 'Young Sheldon', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(71790, 'S.W.A.T.', 'S.W.A.T.', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(73586, 'Yellowstone', 'Yellowstone', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(75219, '9-1-1', '9-1-1', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(76479, 'The Boys', 'The Boys', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(76669, 'Élite', 'Élite', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(76773, 'Estación 19', 'Station 19', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(77169, 'Cobra Kai', 'Cobra Kai', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(78191, 'You', 'You', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(79460, 'Legacies', 'Legacies', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(79744, 'The Rookie', 'The Rookie', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(80020, 'Dragon Ball Heroes', 'スーパードラゴンボールヒーローズ', '2023-03-09 13:51:34', '2023-03-09 13:51:34'),
(82856, 'The Mandalorian', 'The Mandalorian', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(84773, 'El Señor de los Anillos: Los anillos de poder', 'The Lord of the Rings: The Rings of Power', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(85552, 'Euphoria', 'Euphoria', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(85949, 'Star Trek: Picard', 'Star Trek: Picard', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(86430, 'Your Honor', 'Your Honor', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(92685, 'Casa Búho', 'The Owl House', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(93405, 'El juego del calamar', '오징어 게임', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(94997, 'La Casa del Dragón', 'House of the Dragon', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(95479, 'Jujutsu Kaisen', '呪術廻戦', '2023-03-09 13:51:43', '2023-03-09 13:51:43'),
(99966, 'Estamos muertos', '지금 우리 학교는', '2023-03-09 13:51:25', '2023-03-09 13:51:25'),
(100088, 'The Last of Us', 'The Last of Us', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(104877, 'Love is in the Air', 'Sen Çal Kapımı', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(114868, 'Record of Ragnarok', '終末のワルキューレ', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(119051, 'Miércoles', 'Wednesday', '2023-03-09 13:51:08', '2023-03-09 13:51:08'),
(120089, 'SPY×FAMILY', 'SPY×FAMILY', '2023-03-09 13:51:33', '2023-03-09 13:51:33'),
(126280, 'Sexo/Vida', 'Sex/Life', '2023-03-09 13:51:16', '2023-03-09 13:51:16'),
(128839, 'La Brea', 'La Brea', '2023-03-09 13:51:16', '2023-03-09 13:51:16');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `capitulo`
--

CREATE TABLE `capitulo` (
  `n_capitulo` int UNSIGNED NOT NULL,
  `n_temporada` int UNSIGNED NOT NULL,
  `serie_id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `duracion` int DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuenta`
--

CREATE TABLE `cuenta` (
  `id` bigint UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `plan` enum('basico','premium','vip') COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'basico',
  `estado` tinyint(1) NOT NULL DEFAULT '0',
  `datos_de_pago` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descarga`
--

CREATE TABLE `descarga` (
  `id_usuario` bigint UNSIGNED NOT NULL,
  `id_producto_audiovisual` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE `direccion` (
  `id_producto_audiovisual` bigint UNSIGNED NOT NULL,
  `id_director` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `director`
--

CREATE TABLE `director` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nacionalidad` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `anoNacimiento` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_api` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `favorito`
--

CREATE TABLE `favorito` (
  `id_usuario` bigint UNSIGNED NOT NULL,
  `id_producto_audiovisual` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero`
--

CREATE TABLE `genero` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `id_api` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `genero`
--

INSERT INTO `genero` (`id`, `nombre`, `id_api`, `created_at`, `updated_at`) VALUES
(1, 'Action & Adventure', 10759, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(2, 'Animación', 16, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(3, 'Comedia', 35, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(4, 'Crimen', 80, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(5, 'Documental', 99, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(6, 'Drama', 18, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(7, 'Familia', 10751, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(8, 'Kids', 10762, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(9, 'Misterio', 9648, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(10, 'News', 10763, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(11, 'Reality', 10764, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(12, 'Sci-Fi & Fantasy', 10765, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(13, 'Soap', 10766, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(14, 'Talk', 10767, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(15, 'War & Politics', 10768, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(16, 'Western', 37, '2023-03-09 13:49:08', '2023-03-09 13:49:08'),
(17, 'Acción', 28, '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(18, 'Aventura', 12, '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(19, 'Fantasía', 14, '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(20, 'Historia', 36, '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(21, 'Terror', 27, '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(22, 'Música', 10402, '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(23, 'Romance', 10749, '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(24, 'Ciencia ficción', 878, '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(25, 'Película de TV', 10770, '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(26, 'Suspense', 53, '2023-03-09 13:49:09', '2023-03-09 13:49:09'),
(27, 'Bélica', 10752, '2023-03-09 13:49:09', '2023-03-09 13:49:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `genero_audiovisual`
--

CREATE TABLE `genero_audiovisual` (
  `id_producto_audiovisual` bigint UNSIGNED NOT NULL,
  `id_genero` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `interpretacion`
--

CREATE TABLE `interpretacion` (
  `id_producto_audiovisual` bigint UNSIGNED NOT NULL,
  `id_actor` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(2465, '2014_10_12_000000_create_users_table', 1),
(2466, '2014_10_12_100000_create_password_resets_table', 1),
(2467, '2019_08_19_000000_create_failed_jobs_table', 1),
(2468, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(2469, '2023_03_03_111150_create_productora_table', 1),
(2470, '2023_03_03_111528_create_producto_audiovisual_table', 1),
(2471, '2023_03_03_112817_create_pelicula_table', 1),
(2472, '2023_03_03_113120_create_serie_table', 1),
(2473, '2023_03_03_113245_create_temporada_table', 1),
(2474, '2023_03_03_123138_create_capitulo_table', 1),
(2475, '2023_03_03_124846_create_actor_table', 1),
(2476, '2023_03_03_125048_create_interpretacion_table', 1),
(2477, '2023_03_03_125951_create_director_table', 1),
(2478, '2023_03_03_130037_create_direccion_table', 1),
(2479, '2023_03_03_130220_create_cuenta_table', 1),
(2480, '2023_03_03_132038_create_usuario_table', 1),
(2481, '2023_03_03_132501_create_reproduccion_table', 1),
(2482, '2023_03_03_132517_create_favorito_table', 1),
(2483, '2023_03_03_132528_create_descarga_table', 1),
(2484, '2023_03_07_101529_create_genero_table', 1),
(2485, '2023_03_07_101545_create_genero_audiovisual_table', 1),
(2486, '2023_03_09_130909__create_apiSeries_table', 1),
(2487, '2023_03_09_134133__create_api_pelis_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pelicula`
--

CREATE TABLE `pelicula` (
  `id` bigint UNSIGNED NOT NULL,
  `duracion` int NOT NULL,
  `id_producto_audiovisual` bigint UNSIGNED DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productora`
--

CREATE TABLE `productora` (
  `id` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `api_id` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_audiovisual`
--

CREATE TABLE `producto_audiovisual` (
  `id` bigint UNSIGNED NOT NULL,
  `id_productora` bigint UNSIGNED DEFAULT NULL,
  `titulo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `titulo_original` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `idioma_original` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anoEstreno` int NOT NULL,
  `id_api` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reproduccion`
--

CREATE TABLE `reproduccion` (
  `id_usuario` bigint UNSIGNED NOT NULL,
  `id_producto_audiovisual` bigint UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `serie`
--

CREATE TABLE `serie` (
  `id` bigint UNSIGNED NOT NULL,
  `id_producto_audiovisual` bigint UNSIGNED DEFAULT NULL,
  `descripcion` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `temporada`
--

CREATE TABLE `temporada` (
  `n_temporada` int UNSIGNED NOT NULL,
  `serie_id` bigint UNSIGNED NOT NULL,
  `anoEstreno` int NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` bigint UNSIGNED NOT NULL,
  `id_cuenta` bigint UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `isAdmin` tinyint(1) NOT NULL DEFAULT '0',
  `anoNacimiento` int NOT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actor`
--
ALTER TABLE `actor`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `apiPelis`
--
ALTER TABLE `apiPelis`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `apiSeries`
--
ALTER TABLE `apiSeries`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD PRIMARY KEY (`n_capitulo`,`n_temporada`,`serie_id`),
  ADD KEY `capitulo_n_temporada_serie_id_foreign` (`n_temporada`,`serie_id`),
  ADD KEY `capitulo_serie_id_foreign` (`serie_id`);

--
-- Indices de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cuenta_email_unique` (`email`);

--
-- Indices de la tabla `descarga`
--
ALTER TABLE `descarga`
  ADD PRIMARY KEY (`id_usuario`,`id_producto_audiovisual`),
  ADD KEY `descarga_id_producto_audiovisual_foreign` (`id_producto_audiovisual`);

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD PRIMARY KEY (`id_producto_audiovisual`,`id_director`),
  ADD KEY `direccion_id_director_foreign` (`id_director`);

--
-- Indices de la tabla `director`
--
ALTER TABLE `director`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD PRIMARY KEY (`id_usuario`,`id_producto_audiovisual`),
  ADD KEY `favorito_id_producto_audiovisual_foreign` (`id_producto_audiovisual`);

--
-- Indices de la tabla `genero`
--
ALTER TABLE `genero`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `genero_id_api_unique` (`id_api`);

--
-- Indices de la tabla `genero_audiovisual`
--
ALTER TABLE `genero_audiovisual`
  ADD PRIMARY KEY (`id_producto_audiovisual`,`id_genero`),
  ADD KEY `genero_audiovisual_id_genero_foreign` (`id_genero`);

--
-- Indices de la tabla `interpretacion`
--
ALTER TABLE `interpretacion`
  ADD PRIMARY KEY (`id_producto_audiovisual`,`id_actor`),
  ADD KEY `interpretacion_id_actor_foreign` (`id_actor`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pelicula_id_producto_audiovisual_foreign` (`id_producto_audiovisual`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productora`
--
ALTER TABLE `productora`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `productora_api_id_unique` (`api_id`);

--
-- Indices de la tabla `producto_audiovisual`
--
ALTER TABLE `producto_audiovisual`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `producto_audiovisual_id_api_unique` (`id_api`),
  ADD KEY `producto_audiovisual_id_productora_foreign` (`id_productora`);

--
-- Indices de la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  ADD PRIMARY KEY (`id_usuario`,`id_producto_audiovisual`),
  ADD KEY `reproduccion_id_producto_audiovisual_foreign` (`id_producto_audiovisual`);

--
-- Indices de la tabla `serie`
--
ALTER TABLE `serie`
  ADD PRIMARY KEY (`id`),
  ADD KEY `serie_id_producto_audiovisual_foreign` (`id_producto_audiovisual`);

--
-- Indices de la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD PRIMARY KEY (`n_temporada`,`serie_id`),
  ADD KEY `temporada_serie_id_foreign` (`serie_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id_cuenta_foreign` (`id_cuenta`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actor`
--
ALTER TABLE `actor`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cuenta`
--
ALTER TABLE `cuenta`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `director`
--
ALTER TABLE `director`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `genero`
--
ALTER TABLE `genero`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2488;

--
-- AUTO_INCREMENT de la tabla `pelicula`
--
ALTER TABLE `pelicula`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productora`
--
ALTER TABLE `productora`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto_audiovisual`
--
ALTER TABLE `producto_audiovisual`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `serie`
--
ALTER TABLE `serie`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `capitulo`
--
ALTER TABLE `capitulo`
  ADD CONSTRAINT `capitulo_n_temporada_serie_id_foreign` FOREIGN KEY (`n_temporada`,`serie_id`) REFERENCES `temporada` (`n_temporada`, `serie_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `capitulo_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `serie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `descarga`
--
ALTER TABLE `descarga`
  ADD CONSTRAINT `descarga_id_producto_audiovisual_foreign` FOREIGN KEY (`id_producto_audiovisual`) REFERENCES `producto_audiovisual` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `descarga_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `direccion`
--
ALTER TABLE `direccion`
  ADD CONSTRAINT `direccion_id_director_foreign` FOREIGN KEY (`id_director`) REFERENCES `director` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `direccion_id_producto_audiovisual_foreign` FOREIGN KEY (`id_producto_audiovisual`) REFERENCES `producto_audiovisual` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `favorito`
--
ALTER TABLE `favorito`
  ADD CONSTRAINT `favorito_id_producto_audiovisual_foreign` FOREIGN KEY (`id_producto_audiovisual`) REFERENCES `producto_audiovisual` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favorito_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `genero_audiovisual`
--
ALTER TABLE `genero_audiovisual`
  ADD CONSTRAINT `genero_audiovisual_id_genero_foreign` FOREIGN KEY (`id_genero`) REFERENCES `genero` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `genero_audiovisual_id_producto_audiovisual_foreign` FOREIGN KEY (`id_producto_audiovisual`) REFERENCES `producto_audiovisual` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `interpretacion`
--
ALTER TABLE `interpretacion`
  ADD CONSTRAINT `interpretacion_id_actor_foreign` FOREIGN KEY (`id_actor`) REFERENCES `actor` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `interpretacion_id_producto_audiovisual_foreign` FOREIGN KEY (`id_producto_audiovisual`) REFERENCES `producto_audiovisual` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pelicula`
--
ALTER TABLE `pelicula`
  ADD CONSTRAINT `pelicula_id_producto_audiovisual_foreign` FOREIGN KEY (`id_producto_audiovisual`) REFERENCES `producto_audiovisual` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_audiovisual`
--
ALTER TABLE `producto_audiovisual`
  ADD CONSTRAINT `producto_audiovisual_id_productora_foreign` FOREIGN KEY (`id_productora`) REFERENCES `productora` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `reproduccion`
--
ALTER TABLE `reproduccion`
  ADD CONSTRAINT `reproduccion_id_producto_audiovisual_foreign` FOREIGN KEY (`id_producto_audiovisual`) REFERENCES `producto_audiovisual` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reproduccion_id_usuario_foreign` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `serie`
--
ALTER TABLE `serie`
  ADD CONSTRAINT `serie_id_producto_audiovisual_foreign` FOREIGN KEY (`id_producto_audiovisual`) REFERENCES `producto_audiovisual` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `temporada`
--
ALTER TABLE `temporada`
  ADD CONSTRAINT `temporada_serie_id_foreign` FOREIGN KEY (`serie_id`) REFERENCES `serie` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_id_cuenta_foreign` FOREIGN KEY (`id_cuenta`) REFERENCES `cuenta` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
