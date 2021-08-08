-- CREATE DATABASE `shop_laraver` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;

-- DROP DATABASE `shop_laraver`;

-- use shop_laraver;

CREATE TABLE IF NOT EXISTS `account` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL UNIQUE,
  `phone` VARCHAR(100) NOT NULL UNIQUE,
  `password` VARCHAR(100) NOT NULL,
  `address` VARCHAR(255) NULL,
  `role` VARCHAR(50) DEFAULT 'customer',
  `status` tinyint(1) DEFAULT '1',
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `category` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200),
  `status` tinyint(1) DEFAULT '1',
  `prioty` tinyint DEFAULT '0',
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `banner` (
  `id` INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `link` VARCHAR(255) DEFAULT '#',
  `description` VARCHAR(255),
  `status` tinyint(1) DEFAULT '1',
  `prioty` tinyint DEFAULT '0',
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NOW()
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `product` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `price` float(9,3) DEFAULT '0',
  `sale_price` float(9,3) DEFAULT '0',
  `description` text,
  `image_list` text,
  `status` tinyint(1) DEFAULT '1',
  `category_id` int NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NOW(),
  FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `blog` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `image` VARCHAR(255) NOT NULL,
  `sumary` VARCHAR(255),
  `description` text,
  `status` tinyint(1) DEFAULT '1',
  `account_id` int NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NOW(),
  FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `order` (
  `id` INT PRIMARY KEY AUTO_INCREMENT,
  `name` VARCHAR(100) NOT NULL,
  `email` VARCHAR(100) NOT NULL,
  `phone` VARCHAR(100) NOT NULL,
  `address` VARCHAR(255) NULL,
  `note` text,
  `status` tinyint(1) DEFAULT '1',
  `account_id` int NOT NULL,
  `created_at` date DEFAULT current_timestamp(),
  `updated_at` date DEFAULT NOW(),
  FOREIGN KEY (`account_id`) REFERENCES `account` (`id`)
) ENGINE = InnoDB;

CREATE TABLE IF NOT EXISTS `order_detail` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL,
  `price` float NOT NULL,
  FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  FOREIGN KEY (`product_id`) REFERENCES `product` (`id`)
) ENGINE = InnoDB;

