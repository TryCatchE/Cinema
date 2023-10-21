-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Εξυπηρετητής: 127.0.0.1
-- Χρόνος δημιουργίας: 21 Ιαν 2023 στις 13:07:28
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
-- Βάση δεδομένων: `cinema`
--

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `admins`
--

CREATE TABLE `admins` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `admins`
--

INSERT INTO `admins` (`admin_id`, `username`, `password`) VALUES
(1, 'demo', 'demo');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `no_tickets` int(11) NOT NULL,
  `seats` varchar(250) NOT NULL,
  `playingHour` varchar(50) NOT NULL,
  `movieName` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL,
  `total_amount` decimal(10,0) NOT NULL,
  `verified` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `no_tickets`, `seats`, `playingHour`, `movieName`, `date`, `total_amount`, `verified`) VALUES
(45, 14, 3, '00,01,02', '20:00-23:00', 'AVATAR', '', '24', 1);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `events`
--

CREATE TABLE `events` (
  `event_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `url` varchar(150) NOT NULL,
  `playinghours` varchar(250) NOT NULL,
  `description` varchar(100) NOT NULL,
  `startingDate` varchar(50) NOT NULL,
  `seat_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `events`
--

INSERT INTO `events` (`event_id`, `title`, `image`, `url`, `playinghours`, `description`, `startingDate`, `seat_count`) VALUES
(12, 'AVATAR', 'avatarTest.jpg', 'https://www.youtube.com/watch?v=4InRFMo3FM8', '17:00-20:00,20:00-23:00,23:00-02:00', 'A paraplegic Marine dispatched to the moon Pandora on a unique mission becomes torn between followin', '2023-01-15', 40);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `movies`
--

CREATE TABLE `movies` (
  `movies_id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `image` varchar(250) NOT NULL,
  `url` varchar(150) NOT NULL,
  `description` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `reservedseats`
--

CREATE TABLE `reservedseats` (
  `id` int(11) NOT NULL,
  `seatno` varchar(150) NOT NULL,
  `show_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `reservedseats`
--

INSERT INTO `reservedseats` (`id`, `seatno`, `show_id`) VALUES
(43, '00,01,02', 12);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `users`
--

CREATE TABLE `users` (
  `users_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `users`
--

INSERT INTO `users` (`users_id`, `username`, `password`) VALUES
(14, 'username', 'password');

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `workingdates`
--

CREATE TABLE `workingdates` (
  `id` int(11) NOT NULL,
  `date` varchar(15) NOT NULL,
  `closed` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `workingdates`
--

INSERT INTO `workingdates` (`id`, `date`, `closed`) VALUES
(1, 'monday', 1),
(2, 'tuesday', 1),
(3, 'wednesday', 1),
(4, 'thursday', 0),
(5, 'friday', 0),
(6, 'saturday', 0),
(7, 'sunday', 0);

-- --------------------------------------------------------

--
-- Δομή πίνακα για τον πίνακα `workinghours`
--

CREATE TABLE `workinghours` (
  `workingHours_id` int(11) NOT NULL,
  `closingHour` varchar(50) NOT NULL,
  `openingHour` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Άδειασμα δεδομένων του πίνακα `workinghours`
--

INSERT INTO `workinghours` (`workingHours_id`, `closingHour`, `openingHour`) VALUES
(3, '17:00', '12:00');

--
-- Ευρετήρια για άχρηστους πίνακες
--

--
-- Ευρετήρια για πίνακα `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`admin_id`);

--
-- Ευρετήρια για πίνακα `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Ευρετήρια για πίνακα `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`event_id`);

--
-- Ευρετήρια για πίνακα `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movies_id`);

--
-- Ευρετήρια για πίνακα `reservedseats`
--
ALTER TABLE `reservedseats`
  ADD PRIMARY KEY (`id`),
  ADD KEY `show_id` (`show_id`);

--
-- Ευρετήρια για πίνακα `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- Ευρετήρια για πίνακα `workingdates`
--
ALTER TABLE `workingdates`
  ADD PRIMARY KEY (`id`);

--
-- Ευρετήρια για πίνακα `workinghours`
--
ALTER TABLE `workinghours`
  ADD PRIMARY KEY (`workingHours_id`);

--
-- AUTO_INCREMENT για άχρηστους πίνακες
--

--
-- AUTO_INCREMENT για πίνακα `admins`
--
ALTER TABLE `admins`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT για πίνακα `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT για πίνακα `events`
--
ALTER TABLE `events`
  MODIFY `event_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT για πίνακα `movies`
--
ALTER TABLE `movies`
  MODIFY `movies_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT για πίνακα `reservedseats`
--
ALTER TABLE `reservedseats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT για πίνακα `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT για πίνακα `workingdates`
--
ALTER TABLE `workingdates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT για πίνακα `workinghours`
--
ALTER TABLE `workinghours`
  MODIFY `workingHours_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Περιορισμοί για άχρηστους πίνακες
--

--
-- Περιορισμοί για πίνακα `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Περιορισμοί για πίνακα `reservedseats`
--
ALTER TABLE `reservedseats`
  ADD CONSTRAINT `reservedseats_ibfk_1` FOREIGN KEY (`show_id`) REFERENCES `events` (`event_id`) ON DELETE CASCADE ON UPDATE CASCADE;
commitTransaction;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
