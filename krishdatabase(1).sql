-- --------------------------------------------------------
-- Database: `krishdatabase_laravel`
-- --------------------------------------------------------

CREATE DATABASE IF NOT EXISTS `krishdatabase_laravel`;
USE `krishdatabase_laravel`;

-- --------------------------------------------------------
-- Table structure for `admin_users`
-- --------------------------------------------------------
CREATE TABLE `admin_users` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(200) NOT NULL UNIQUE,
  `password` varchar(255) NOT NULL,
  `fullname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(50),
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample admin user with bcrypt hash for password "admin123"
INSERT INTO `admin_users` (`username`, `password`, `fullname`, `email`, `contact`) VALUES
('krishna80', '$2y$10$V4Wb8ZVZLz1h5c7s7Wx2cuH/Cp9v4G7i5yJYcMzF/3wx0Fxn1gk8K', 'Krishna Karki', 'carki.80.creeshna@gmail.com', '+9779813528099');

-- --------------------------------------------------------
-- Table structure for `categories`
-- --------------------------------------------------------
CREATE TABLE `categories` (
  `id` int(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) NOT NULL UNIQUE,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample categories
INSERT INTO `categories` (`name`) VALUES
('Sports'), ('Crime'), ('Politics'), ('Economics'), ('Lifestyle'), ('National'), ('Technology');

-- --------------------------------------------------------
-- Table structure for `articles`
-- --------------------------------------------------------
CREATE TABLE `articles` (
  `artid` int(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `podate` date NOT NULL,
  `category_id` int(20) NOT NULL,
  `content` longtext NOT NULL,
  `author` varchar(200) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`artid`),
  KEY `category_id` (`category_id`),
  CONSTRAINT `articles_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Sample article
INSERT INTO `articles` (`title`, `podate`, `category_id`, `content`, `author`, `image`) VALUES
('The tree of life: Moringa Oleifera', '2017-11-29', 5, 'Yes, it is a tree highly spoken of as the Tree of Life or the Miracle Tree...', 'Man Singh Ravi', NULL),
('My life my story', '2016-02-17', 2, 'I had gone for long ride. I got an accident and I fall asleep for whole life.', 'Prayash', NULL),
('Two Indians captured for creating counterfeit Nepali money', '2018-01-12', 6, 'A group of Far-Western Provincial Examination Agency of Police on Thursday captured...', 'Kathmandu Post', NULL);
