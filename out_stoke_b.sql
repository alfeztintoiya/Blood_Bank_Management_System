-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";

CREATE TABLE `out_stoke_b` (
  `id` int(11) NOT NULL,
  `bname` varchar(50) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `mno` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `out_stoke_b` (`id`, `bname`, `name`, `mno`) VALUES
(89, 'AB-', 'Het', '9807654321'),
(90, 'O+', 'Haard', '9876543217');


ALTER TABLE `out_stoke_b`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `out_stoke_b`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;
COMMIT;

