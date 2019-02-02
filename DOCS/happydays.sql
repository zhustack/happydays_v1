-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 31-Jan-2019 às 22:14
-- Versão do servidor: 5.7.19
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `happydays`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

DROP TABLE IF EXISTS `categories`;
CREATE TABLE IF NOT EXISTS `categories` (
  `idcategories` int(11) NOT NULL AUTO_INCREMENT,
  `ctgr_name` varchar(60) DEFAULT NULL,
  `users_idusers` int(11) NOT NULL,
  PRIMARY KEY (`idcategories`),
  KEY `fk_categories_users1_idx` (`users_idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`idcategories`, `ctgr_name`, `users_idusers`) VALUES
(1, 'Love', 1),
(2, 'Home', 1),
(3, 'aa', 1),
(4, 'Teste', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `memories`
--

DROP TABLE IF EXISTS `memories`;
CREATE TABLE IF NOT EXISTS `memories` (
  `idmemories` int(11) NOT NULL AUTO_INCREMENT,
  `memrs_title` varchar(100) DEFAULT NULL,
  `memrs_date` date DEFAULT NULL,
  `memrs_description` text,
  `categories_idcategories` int(11) NOT NULL,
  PRIMARY KEY (`idmemories`),
  KEY `fk_memories_categories1_idx` (`categories_idcategories`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `memories`
--

INSERT INTO `memories` (`idmemories`, `memrs_title`, `memrs_date`, `memrs_description`, `categories_idcategories`) VALUES
(1, 'Passei na facul', '2019-01-31', 'No description', 4),
(2, 'Passei na facul', '2019-01-31', 'No description', 4),
(3, 'Passei na facul', '2019-01-31', 'No description', 4),
(4, 'Passei na facul', '2019-01-31', 'No description', 4),
(5, 'Passei na facul', '2019-01-31', 'No description', 4),
(6, 'Passei na facul', '2019-01-31', 'No description', 4),
(7, 'Passei na facul', '2019-01-31', 'No description', 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idusers` int(11) NOT NULL AUTO_INCREMENT,
  `usr_name` varchar(80) DEFAULT NULL,
  `usr_lastname` varchar(150) DEFAULT NULL,
  `usr_birthday` date DEFAULT NULL,
  `usr_pass` varchar(45) DEFAULT NULL,
  `usr_email` varchar(150) DEFAULT NULL,
  `usr_nick` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`idusers`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`idusers`, `usr_name`, `usr_lastname`, `usr_birthday`, `usr_pass`, `usr_email`, `usr_nick`) VALUES
(1, 'teste', 'teste', '2001-12-10', '1234', 'fjejunior@gmail.com', NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categories_users1` FOREIGN KEY (`users_idusers`) REFERENCES `users` (`idusers`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `memories`
--
ALTER TABLE `memories`
  ADD CONSTRAINT `fk_memories_categories1` FOREIGN KEY (`categories_idcategories`) REFERENCES `categories` (`idcategories`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
