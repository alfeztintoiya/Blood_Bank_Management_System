-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


CREATE TABLE `exchange_bb` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `age` int(20) DEFAULT NULL,
  `bgroup` varchar(20) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `mno` varchar(40) DEFAULT NULL,
  `ebgroup` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `exchange_bb` (`id`, `name`, `fname`, `address`, `city`, `age`, `bgroup`, `email`, `mno`, `ebgroup`) VALUES
(7, 'Het', 'xyz', 'Ug Hostel', 'Rajkot', 19, 'AB-', 'kartik07@gmail.com', '9807654321', 'AB+'),
(8, 'Haard', 'xyz', 'pdeu', 'surendrnagar', 19, 'O+', 'krish08@gmail.com', '9876543217', 'None');


ALTER TABLE `exchange_bb`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `exchange_bb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

