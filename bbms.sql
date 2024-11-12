SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `bbms` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bbms`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,  -- Changed to accommodate hashed passwords
  `role` ENUM('admin', 'doctor', 'staff') NOT NULL DEFAULT 'staff',
  `email` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `last_login` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `blood_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(5) NOT NULL,
  `rh_factor` ENUM('positive', 'negative') NOT NULL,
  `can_donate_to` varchar(50) NOT NULL,
  `can_receive_from` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `blood_type` (`name`, `rh_factor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `donors` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `date_of_birth` date NOT NULL,
  `age` int(3) GENERATED ALWAYS AS (YEAR(CURRENT_DATE) - YEAR(date_of_birth)) STORED,
  `blood_group_id` int(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `address` varchar(255) NOT NULL,
  `city` varchar(100) NOT NULL,
  `last_donation_date` date DEFAULT NULL,
  `medical_conditions` text DEFAULT NULL,
  `is_eligible` boolean GENERATED ALWAYS AS (
    DATEDIFF(CURRENT_DATE, last_donation_date) >= 90 OR last_donation_date IS NULL
  ) STORED,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `blood_group_id` (`blood_group_id`),
  FOREIGN KEY (`blood_group_id`) REFERENCES `blood_groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `blood_inventory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_group_id` int(11) NOT NULL,
  `units_available` int(11) NOT NULL DEFAULT 0,
  `last_updated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `blood_group_id` (`blood_group_id`),
  FOREIGN KEY (`blood_group_id`) REFERENCES `blood_groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `blood_requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requester_name` varchar(100) NOT NULL,
  `patient_name` varchar(100) NOT NULL,
  `blood_group_id` int(11) NOT NULL,
  `units_required` int(11) NOT NULL,
  `hospital_name` varchar(200) DEFAULT NULL,
  `doctor_name` varchar(100) DEFAULT NULL,
  `urgency_level` ENUM('normal', 'urgent', 'critical') NOT NULL DEFAULT 'normal',
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` ENUM('pending', 'approved', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
  `contact_phone` varchar(20) NOT NULL,
  `contact_email` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `blood_group_id` (`blood_group_id`),
  FOREIGN KEY (`blood_group_id`) REFERENCES `blood_groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


CREATE TABLE `blood_exchanges` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `requester_name` varchar(100) NOT NULL,
  `requester_contact` varchar(20) NOT NULL,
  `requested_group_id` int(11) NOT NULL,
  `offered_group_id` int(11) NOT NULL,
  `status` ENUM('pending', 'completed', 'cancelled') NOT NULL DEFAULT 'pending',
  `request_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `completion_date` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `requested_group_id` (`requested_group_id`),
  KEY `offered_group_id` (`offered_group_id`),
  FOREIGN KEY (`requested_group_id`) REFERENCES `blood_groups` (`id`),
  FOREIGN KEY (`offered_group_id`) REFERENCES `blood_groups` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;



CREATE TABLE `inventory_logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `blood_group_id` int(11) NOT NULL,
  `action` ENUM('donation', 'request', 'exchange', 'expired') NOT NULL,
  `units` int(11) NOT NULL,
  `reference_id` int(11) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `logged_by` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `blood_group_id` (`blood_group_id`),
  KEY `logged_by` (`logged_by`),
  FOREIGN KEY (`blood_group_id`) REFERENCES `blood_groups` (`id`),
  FOREIGN KEY (`logged_by`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `blood_groups` (`name`, `rh_factor`, `can_donate_to`, `can_receive_from`) VALUES
('A', 'positive', 'A+, AB+', 'A+, A-, O+, O-'),
('A', 'negative', 'A+, A-, AB+, AB-', 'A-, O-'),
('B', 'positive', 'B+, AB+', 'B+, B-, O+, O-'),
('B', 'negative', 'B+, B-, AB+, AB-', 'B-, O-'),
('AB', 'positive', 'AB+', 'All'),
('AB', 'negative', 'AB+, AB-', 'All negative'),
('O', 'positive', 'All positive', 'O+, O-'),
('O', 'negative', 'All', 'O-');


INSERT INTO `users` (`username`, `password`, `role`, `email`) VALUES
('admin', '$2y$10$YourHashedPasswordHere', 'admin', 'admin@bbms.local');

COMMIT;

