SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS `csic3300_final_project` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `csic3300_final_project`;

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

CREATE TABLE IF NOT EXISTS `experiences` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_join` date NOT NULL,
  `date_leave` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO `experiences` (`id`, `title`, `location`, `designation`, `description`, `date_join`, `date_leave`) VALUES(4, 'Balyasny Asset Management', 'New York, NY', 'Macro Summer Associate', 'Developed Python tools for portfolio analysis and scenario modeling.\r\nRefactored Kubernetes and Airflow scripts to enhance scalability.\r\nImproved core libraries for better modularity and customizability.', '2023-06-01', '2023-08-31');
INSERT INTO `experiences` (`id`, `title`, `location`, `designation`, `description`, `date_join`, `date_leave`) VALUES(5, 'Balyasny Asset Management', 'New York, NY', 'Intern, Equity Technology', 'Built Python scripts to analyze trading factors affecting price movement.Integrated tools for visualizing intraday factor returns.Collaborated with Portfolio Managers and analysts for financial insights.', '2022-06-22', '2022-08-31');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
