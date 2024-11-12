-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";



CREATE TABLE `exchange_b` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `age` int(25) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `mno` varchar(50) DEFAULT NULL,
  `bgroup` int(50) DEFAULT NULL,
  `ebgroup` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


ALTER TABLE `exchange_b`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `exchange_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;


