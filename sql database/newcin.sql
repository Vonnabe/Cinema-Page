-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 18 Ιαν 2023 στις 12:47:36
-- Έκδοση διακομιστή: 10.4.25-MariaDB
-- Έκδοση PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Βάση δεδομένων: `newcin`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `films`
--

CREATE TABLE `films` (
  `film_id` int(11) NOT NULL,
  `film_name` varchar(100) NOT NULL,
  `film_year` int(11) NOT NULL,
  `film_type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `films`
--

INSERT INTO `films` (`film_id`, `film_name`, `film_year`, `film_type`) VALUES
(1, 'Berserk', 2017, 'animation'),
(2, 'The Shawshank Redemption', 1994, 'Drama'),
(3, 'John Wick', 2014, 'Action');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `provoles`
--

CREATE TABLE `provoles` (
  `prov_id` int(11) NOT NULL,
  `time_start` time NOT NULL,
  `time_end` time NOT NULL,
  `film_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `provoles`
--

INSERT INTO `provoles` (`prov_id`, `time_start`, `time_end`, `film_id`) VALUES
(1, '16:00:00', '20:00:00', 1),
(2, '20:00:00', '00:00:00', 2),
(3, '14:00:00', '18:00:00', 3);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `reservations`
--

CREATE TABLE `reservations` (
  `username` varchar(100) NOT NULL,
  `res_date` date NOT NULL,
  `prov_id` int(11) NOT NULL,
  `seat` int(11) NOT NULL,
  `approved` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `reservations`
--

INSERT INTO `reservations` (`username`, `res_date`, `prov_id`, `seat`, `approved`) VALUES
('pavlos', '2023-01-18', 1, 5, 0),
('pavlos', '2023-01-18', 3, 1, 0),
('pavlos', '2023-01-18', 2, 3, 0),
('von', '2023-01-18', 1, 1, 1),
('pavlos1', '2023-01-18', 1, 44, 0),
('von', '2023-01-18', 2, 10, 1),
('von', '2023-01-18', 2, 1, 0),
('Wiktoria', '2023-01-18', 3, 5, 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `settings`
--

CREATE TABLE `settings` (
  `name` varchar(100) NOT NULL,
  `date_limit` date NOT NULL,
  `seats_limit` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `settings`
--

INSERT INTO `settings` (`name`, `date_limit`, `seats_limit`) VALUES
('Cinema.exe', '2023-01-31', 50);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `utype` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`username`, `email`, `password`, `name`, `utype`) VALUES
('admin', 'admin@email.com', '111', 'admin', 1),
('maria', '1@gmail.com', '321', 'maria', 0),
('pavlos', 'aa', '123', 'q', 0),
('pavlos1', 'aaaa@gmail.com', '112233', 'paul', 0),
('Tasos', '123@gmail.com', '1234', 'Tasos', 0),
('von', 'a', '123', 'pa', 0),
('Wiktoria', 'wa@gmail.com', 'pl123', 'Wixy', 0);

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `films`
--
ALTER TABLE `films`
  ADD PRIMARY KEY (`film_id`);

--
-- Ευρετήρια για πίνακα `provoles`
--
ALTER TABLE `provoles`
  ADD PRIMARY KEY (`prov_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
