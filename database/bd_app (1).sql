-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-10-2023 a las 19:56:11
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
-- Base de datos: `bd_app`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chapters`
--

CREATE TABLE `chapters` (
  `chapter_id` int(11) NOT NULL,
  `name` varchar(40) NOT NULL,
  `description` varchar(255) NOT NULL,
  `season_id_fk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `chapters`
--

INSERT INTO `chapters` (`chapter_id`, `name`, `description`, `season_id_fk`) VALUES
(4, 'The National Anthem', 'Prime Minister Michael Callow faces a shocking dilemma when Princess Susannah, a much-loved member of the royal family, is kidnapped and the kidnapper forces Callow to commit direct, no-deception suicide in exchange for the princess life.', 1),
(5, '15 Million Merits', 'A world where people earn merit by exercising to generate energy; merits are used to buy food, toiletries and skip unwanted advertisements. In this environment, people aspire to improve their lives by using their talents.', 1),
(6, 'The Entire History of You', 'En un futuro cercano, todo el mundo tendrá acceso a un implante de memoria que grabe todo lo que los humanos hagan, vean y oigan.\r\n', 1),
(7, 'Be right back', 'After learning about a new service that allows people to contact the dead, a lonely and grieving Martha connects with her late boyfriend.', 2),
(8, 'White Bear', 'Victoria wakes up and can not remember anything about her life. All the people she meets refuse to communicate with her while some people try to kill her.', 2),
(9, 'The Waldo Moment', 'A failed comedian who voices a cartoon bear is dragged into politics when executives want the bear to run for office.', 2),
(10, 'White Christmas', 'At a remote base isolated by snow, two men tell several stories about the havoc caused by technology during Christmas.', 3),
(11, 'Playtesting', 'An American traveler who is short of money signs up to be a tester for a new video game system. He will soon discover that fiction is sometimes too real.', 3),
(12, 'Shut up and dance', 'A virus has infected your computer and now you face a terrible decision: either follow the orders sent to you by SMS or your most intimate secrets will come to light.', 3),
(13, 'Saint Junipero', 'California coast, 1987. A shy young woman and a happy, outgoing girl seal a very strong bond, which seems to defy the laws of time and space.', 3),
(14, 'The science of a kill', 'After his first battle with an elusive enemy, a soldier begins to experience strange sensations and strange technical glitches.', 4),
(15, 'Hated in the Nation', 'A journalist dies involved in controversy on social networks. While investigating, a veteran police officer and her technology-savvy disciple discover something terrifying.', 4),
(16, 'USS Callister', 'Commander Robert Daly leads his crew with wisdom and courage, but a new recruit will discover that not everything is as it seems on the USS Callister.', 4),
(17, 'Arkangel', 'A single mother concerned about her daughters safety decides to implant a high-tech device that monitors her location. And many other things.', 5),
(18, 'Crocodile', 'Mia is an architect who must keep a terrible secret while an insurance investigator examines the memories of witnesses to an accident.', 5),
(19, 'Hang to the DJ', 'When Frank and Amy meet through a dating program that puts an expiration date on relationships, they soon begin to question the logic of the system.', 5),
(20, 'Metalhead', 'In an abandoned warehouse, some scavengers in search of supplies encounter an implacable enemy. If they want to survive, they must escape through an inhospitable wasteland.', 5),
(21, 'Black Museum', 'A young woman discovers a museum on the highway that contains supposedly authentic criminological objects... and that offers a disturbing main attraction.', 6),
(22, 'Striking Vipers', 'Two college friends meet again in the virtual reality version of their favorite video game and their late nights together bring unexpected consequences.', 6),
(23, 'Smithereens', 'A London rideshare driver sparks an international crisis when he kidnaps a worker for a social media company.', 6),
(24, 'Rachel, Jake and Ashley too', 'A lonely teenager becomes obsessed with a robotic doll inspired by Ashley O, a pop star. Meanwhile, the singers life begins to go off the rails.', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `seasons`
--

CREATE TABLE `seasons` (
  `season_id` int(11) NOT NULL,
  `seasonNumber` int(2) NOT NULL,
  `releaseYear` int(11) NOT NULL,
  `director` varchar(30) NOT NULL,
  `recordingCity` varchar(40) NOT NULL,
  `categoryGenre` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `seasons`
--

INSERT INTO `seasons` (`season_id`, `seasonNumber`, `releaseYear`, `director`, `recordingCity`, `categoryGenre`) VALUES
(1, 1, 2011, 'Charlie Brooker', 'Liverpool, United Kingdom', 'Futurism, fiction'),
(2, 2, 2013, 'Philipe Collins', 'London, United Kingdom', 'Drama, Futurism'),
(3, 3, 2016, 'Philipe Collins', 'Mánchester, United Kingdom', 'Fiction, futurism, thriller'),
(4, 4, 2017, 'Katerine Olsen', 'London, United Kingdom', 'Futurism, drama, romance'),
(5, 5, 2020, 'Philipe Collins', 'Edimburgo, United Kingdom', 'Futurism, drama, thriller'),
(6, 6, 2022, 'Noah Windsor', 'Sheffield, United Kingdom', 'Fiction, horror, futurism');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`user_id`, `name`, `password`) VALUES
(1, 'webadmin', '$2y$10$dK7Fj//V.gdvp/5ooK9aUeboP4TRHd/LqxtSYf1ITHc31Cgl6X87e');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`chapter_id`),
  ADD KEY `season_id_fk` (`season_id_fk`);

--
-- Indices de la tabla `seasons`
--
ALTER TABLE `seasons`
  ADD PRIMARY KEY (`season_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `chapters`
--
ALTER TABLE `chapters`
  MODIFY `chapter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `seasons`
--
ALTER TABLE `seasons`
  MODIFY `season_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_ibfk_1` FOREIGN KEY (`season_id_fk`) REFERENCES `seasons` (`season_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
