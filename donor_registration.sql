-- SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
-- START TRANSACTION;
-- SET time_zone = "+00:00";


CREATE TABLE `donor_registration` (
  `id` int(11) NOT NULL,
  `name` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `age` int(25) DEFAULT NULL,
  `bgroup` varchar(20) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mno` varchar(50) DEFAULT NULL,
  `doctor` varchar(50) DEFAULT NULL,
  `dob` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `donor_registration` (`id`, `name`, `fname`, `address`, `city`, `age`, `bgroup`, `email`, `mno`, `doctor`, `dob`) VALUES
(41, 'SAHIL ', 'NARAYAN', 'UG HOSTEL', 'Gandhinagar', 20, 'AB+', 'sonisahil099@gmail.com', '9428235545', 'D1', '27-02-2003'),
(44, 'Poojan', 'Paras', 'Desa Highway', 'Palanpur', 19, 'O+', 'poojan09@gmail.com', '9765432657', 'D2', '29-01-2004'),
(45, 'Gaurav', 'Manish', 'Daman', 'Dui', 19, 'AB-', 'gaurav2@gmail.com', '7898765432', 'D2', '06-07-2004'),
(46, 'asd', 'sdafd', 'asdf', 'dfds', 45, 'AB+', 'snucsahil18@gmail.com', '9876543209', 'D1', ''),
(47, 'het', 'sdafaud', 'ug hostel', 'Gandhinagar ', 19, 'AB+', 'strangechebyshev3@freethecookies.com', '4356435', 'D2', '34254532'),
(48, 'Lakshy', 'Jitendra Kumar', 'Ahmedabad', 'Gandhinagar ', 19, 'AB+', 'lakshy@gmail.com', '1234248123', 'D3', '28-07-2005');


ALTER TABLE `donor_registration`
  ADD PRIMARY KEY (`id`);


ALTER TABLE `donor_registration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;
COMMIT;
