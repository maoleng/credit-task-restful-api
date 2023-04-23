-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.32-0ubuntu0.20.04.2 - (Ubuntu)
-- Server OS:                    Linux
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for credit_task_restful_api
CREATE DATABASE IF NOT EXISTS `credit_task_restful_api` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `credit_task_restful_api`;

-- Dumping structure for table credit_task_restful_api.Agent0504
CREATE TABLE IF NOT EXISTS `Agent0504` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table credit_task_restful_api.Agent0504: ~0 rows (approximately)
INSERT INTO `Agent0504` (`id`, `name`, `address`) VALUES
	(1, 'Bùi Hữu Lộc', 'Tôn Đức Thắng'),
	(2, 'Agent 2', 'Address 2'),
	(3, 'Agent 3', 'Address 3'),
	(4, 'Agent 4', 'Address 4'),
	(5, 'Agent 5', 'Address 5'),
	(6, 'Agent 6', 'Address 6'),
	(7, 'Agent 7', 'Address 7'),
	(8, 'Agent 8', 'Address 8'),
	(9, 'Agent 9', 'Address 9'),
	(10, 'Agent 10', 'Address 10'),
	(11, 'Agent 11', 'Address 11'),
	(12, 'Agent 12', 'Address 12'),
	(13, 'Agent 13', 'Address 13'),
	(14, 'Agent 14', 'Address 14'),
	(15, 'Agent 15', 'Address 15');

-- Dumping structure for table credit_task_restful_api.Category0504
CREATE TABLE IF NOT EXISTS `Category0504` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `description` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table credit_task_restful_api.Category0504: ~5 rows (approximately)
INSERT INTO `Category0504` (`id`, `name`, `description`) VALUES
	(1, 'key', 'it is key'),
	(2, 'table', 'it is table'),
	(3, 'chair', 'it is chair'),
	(4, 'car', 'it is car'),
	(5, 'bike', 'it is bike');

-- Dumping structure for table credit_task_restful_api.Item0504
CREATE TABLE IF NOT EXISTS `Item0504` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `size` varchar(20) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `Item0504_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `Category0504` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=36 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table credit_task_restful_api.Item0504: ~30 rows (approximately)
INSERT INTO `Item0504` (`id`, `name`, `size`, `price`, `category_id`) VALUES
	(1, 'Red Flower', 'M', 10.50, 1),
	(2, 'Yellow Chair', 'L', 15.00, 2),
	(3, 'Black Table', 'S', 5.25, 3),
	(4, 'Black Board', 'XL', 25.99, 1),
	(5, 'Black hair', 'M', 12.75, 2),
	(6, 'Star', 'L', 18.50, 3),
	(7, 'Bike II', 'S', 6.50, 1),
	(8, 'Motorbike XYZ', 'XL', 29.99, 2),
	(9, 'Cat', 'M', 8.25, 3),
	(10, 'Elephant PHP', 'L', 22.00, 1),
	(11, 'Shoes', 'S', 4.99, 2),
	(12, 'Sandle', 'XL', 35.50, 3),
	(13, 'Head and Shoulder', 'M', 9.75, 1),
	(14, 'Lion', 'L', 20.50, 2),
	(15, 'Coffee', 'S', 3.99, 3),
	(16, 'Egg in Singapore', 'XL', 40.99, 1),
	(17, 'Rice', 'M', 11.25, 2),
	(18, 'Card', 'L', 24.99, 3),
	(19, 'Figma', 'S', 2.50, 1),
	(20, 'Credit', 'XL', 49.99, 2),
	(21, 'Fan', 'M', 13.50, 3),
	(22, 'Short', 'L', 29.00, 1),
	(23, 'Browser', 'S', 1.99, 2),
	(24, 'Trousers', 'XL', 55.99, 3),
	(25, 'T-Shirt', 'M', 16.75, 1),
	(26, 'Shirt', 'L', 35.50, 2),
	(27, 'Hat', 'S', 1.50, 3),
	(28, 'Floor', 'XL', 65.99, 1),
	(29, 'Keyboard', 'M', 19.25, 2),
	(30, 'Laptop', 'L', 42.99, 3);

-- Dumping structure for table credit_task_restful_api.Order0504
CREATE TABLE IF NOT EXISTS `Order0504` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_date` date NOT NULL,
  `agent_id` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `agent_id` (`agent_id`),
  CONSTRAINT `Order0504_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `Agent0504` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table credit_task_restful_api.Order0504: ~0 rows (approximately)
INSERT INTO `Order0504` (`id`, `order_date`, `agent_id`) VALUES
	(1, '2023-04-01', 1),
	(2, '2023-04-02', 2),
	(3, '2023-04-03', 3),
	(4, '2023-04-04', 4),
	(5, '2023-04-05', 5),
	(6, '2023-04-06', 6),
	(7, '2023-04-07', 7),
	(8, '2023-04-08', 8),
	(9, '2023-04-09', 9),
	(10, '2023-04-10', 10),
	(11, '2023-04-11', 11),
	(12, '2023-04-12', 12),
	(13, '2023-04-13', 13),
	(14, '2023-04-14', 14),
	(15, '2023-04-15', 15);

-- Dumping structure for table credit_task_restful_api.OrderDetail0504
CREATE TABLE IF NOT EXISTS `OrderDetail0504` (
  `id` int NOT NULL AUTO_INCREMENT,
  `order_id` int NOT NULL,
  `item_id` int NOT NULL,
  `quantity` int NOT NULL,
  `unit_amount` decimal(10,2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  KEY `item_id` (`item_id`),
  CONSTRAINT `OrderDetail0504_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Order0504` (`id`),
  CONSTRAINT `OrderDetail0504_ibfk_2` FOREIGN KEY (`item_id`) REFERENCES `Item0504` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table credit_task_restful_api.OrderDetail0504: ~0 rows (approximately)
INSERT INTO `OrderDetail0504` (`id`, `order_id`, `item_id`, `quantity`, `unit_amount`) VALUES
	(1, 1, 1, 2, 10.50),
	(2, 1, 2, 1, 15.00),
	(3, 1, 3, 4, 5.25),
	(4, 2, 4, 3, 25.99),
	(5, 2, 5, 2, 12.75),
	(6, 2, 6, 1, 18.50),
	(7, 3, 7, 5, 6.50),
	(8, 3, 8, 2, 29.99),
	(9, 3, 9, 1, 8.25),
	(10, 4, 10, 2, 22.00),
	(11, 4, 11, 4, 4.99),
	(12, 4, 12, 1, 35.50),
	(13, 5, 13, 3, 9.75),
	(14, 5, 14, 2, 20.50),
	(15, 5, 15, 5, 3.99),
	(16, 6, 16, 1, 16.75),
	(17, 6, 17, 3, 11.25),
	(18, 6, 18, 2, 24.99),
	(19, 7, 19, 10, 2.50),
	(20, 7, 20, 1, 49.99),
	(21, 7, 21, 2, 13.50),
	(22, 8, 22, 3, 29.99),
	(23, 8, 23, 4, 8.50),
	(24, 8, 24, 1, 54.99),
	(25, 9, 25, 2, 16.75),
	(26, 9, 26, 3, 35.50),
	(27, 9, 27, 1, 1.50),
	(28, 10, 28, 1, 65.99),
	(29, 10, 29, 2, 19.25),
	(30, 10, 30, 1, 42.99);

-- Dumping structure for table credit_task_restful_api.Payment0504
CREATE TABLE IF NOT EXISTS `Payment0504` (
  `id` int NOT NULL AUTO_INCREMENT,
  `total` decimal(10,2) NOT NULL,
  `status` varchar(50) NOT NULL,
  `transaction_code` varchar(50) NOT NULL,
  `bank_code` varchar(50) NOT NULL,
  `order_id` int NOT NULL,
  `pay_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_id` (`order_id`),
  CONSTRAINT `Payment0504_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `Order0504` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- Dumping data for table credit_task_restful_api.Payment0504: ~0 rows (approximately)
INSERT INTO `Payment0504` (`id`, `total`, `status`, `transaction_code`, `bank_code`, `order_id`, `pay_date`) VALUES
	(1, 57.00, 'Payment successfully', 'VNP13996616', 'VNBANK', 1, '2023-04-22'),
	(2, 57000.00, 'Pending', '', 'VNBANK', 1, '2023-04-22'),
	(3, 57000000.00, 'Pending', '', 'VNBANK', 1, '2023-04-22'),
	(4, 57000000.00, 'Pending', '', 'VNBANK', 1, '2023-04-22'),
	(5, 57000.00, 'Pending', '', 'VNBANK', 1, '2023-04-22'),
	(6, 57000.00, 'Pending', '', 'VNBANK', 1, '2023-04-22'),
	(7, 57000.00, 'Payment successfully', 'VNP13996834', 'VNBANK', 1, '2023-04-23');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
