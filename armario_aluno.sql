-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: 11-Mar-2019 às 23:48
-- Versão do servidor: 5.7.21
-- PHP Version: 7.0.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cimol2`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `armario_aluno`
--

DROP TABLE IF EXISTS `armario_aluno`;
CREATE TABLE IF NOT EXISTS `armario_aluno` (
  `armario_id` int(10) UNSIGNED NOT NULL,
  `aluno_id` int(10) UNSIGNED NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `data_entrega` date DEFAULT NULL,
  PRIMARY KEY (`armario_id`,`aluno_id`),
  KEY `fk_armario_has_aluno_aluno1_idx` (`aluno_id`),
  KEY `fk_armario_has_aluno_armario1_idx` (`armario_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `armario_aluno`
--

INSERT INTO `armario_aluno` (`armario_id`, `aluno_id`, `data_inicio`, `data_fim`, `data_entrega`) VALUES
(1, 1, '2018-12-10', '2018-12-12', '2018-12-10'),
(1, 3, '2018-12-04', '2018-12-25', NULL),
(1, 4, '2018-12-10', '2018-12-19', '2018-12-10'),
(1, 21, '2018-12-06', '2019-01-02', '2018-12-10'),
(1, 90, '2018-12-06', '2019-01-05', '2018-12-10'),
(2, 16, '2018-12-05', '2018-12-26', NULL),
(3, 1, '2018-12-11', '2018-12-27', NULL),
(3, 7, '2018-12-05', '2018-12-20', '2018-12-11'),
(3, 10, '2018-11-26', '2018-12-01', '2018-12-11'),
(3, 16, '2018-12-08', '2018-12-25', '2018-12-11'),
(4, 1, '2018-12-09', '2018-12-25', '2018-12-12'),
(4, 3, '2018-12-05', '2018-12-20', '2018-12-12'),
(4, 4, '2018-12-06', '2019-01-04', '2018-12-12'),
(4, 7, '2018-12-08', '2018-12-27', '2018-12-12'),
(4, 8, '2018-12-07', '2018-12-28', '2018-12-12'),
(4, 16, '2018-12-13', '2018-12-25', '2018-12-12'),
(5, 1, '2018-12-06', '2019-01-01', '2018-12-11'),
(5, 10, '2018-12-05', '2018-12-27', '2018-12-11'),
(5, 16, '2018-11-26', '2018-12-03', '2018-12-11'),
(5, 22, '2018-12-02', '2018-12-04', '2018-12-11'),
(15, 1, '2018-12-11', '2019-01-02', '2018-12-19'),
(15, 3, '2018-12-11', '2018-12-19', '2018-12-19'),
(16, 1, '2018-12-11', '2018-12-19', '2018-12-11'),
(17, 2, '2018-11-25', '2018-12-02', '2019-03-07'),
(17, 4, '2018-12-08', '2018-12-26', '2019-03-07'),
(17, 90, '2019-03-07', '2019-03-21', NULL),
(18, 1, '2018-12-03', '2018-12-09', '2018-12-26'),
(18, 22, '2018-12-06', '2019-01-30', '2018-12-26'),
(19, 1, '2018-12-03', '2018-12-04', '2018-12-11'),
(19, 4, '2018-11-27', '2018-12-04', '2018-12-11'),
(19, 5, '2018-12-08', '2019-01-03', '2018-12-11'),
(20, 1, '2018-12-04', '2018-12-19', NULL),
(20, 3, '2018-12-08', '2019-01-04', '2018-12-19'),
(20, 8, '2018-12-07', '2019-01-01', '2018-12-19'),
(20, 9, '2018-12-03', '2018-12-05', '2018-12-19'),
(20, 13, '2018-12-06', '2019-01-05', '2018-12-19'),
(20, 15, '2018-12-08', '2019-01-02', '2018-12-19'),
(21, 1, '2018-12-11', '2019-01-01', '2018-12-06'),
(21, 8, '2018-12-06', '2018-12-25', '2018-12-06'),
(22, 3, '2018-11-27', '2018-12-10', NULL),
(22, 20, '2018-12-06', '2018-12-27', '2018-12-19'),
(23, 4, '2018-12-08', '2018-12-26', '2018-12-19'),
(23, 8, '2018-11-25', '2018-11-28', '2018-12-19'),
(24, 2, '2018-12-06', '2018-12-23', '2018-12-19'),
(24, 10, '2018-12-08', '2018-12-27', '2018-12-19'),
(25, 1, '2018-12-11', '2018-12-20', '2019-04-02'),
(25, 3, '2018-12-11', '2019-01-01', '2019-04-02'),
(25, 90, '2019-03-12', '2019-03-14', NULL);

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `armario_aluno`
--
ALTER TABLE `armario_aluno`
  ADD CONSTRAINT `fk_armario_has_aluno_aluno1` FOREIGN KEY (`aluno_id`) REFERENCES `aluno` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_armario_has_aluno_armario1` FOREIGN KEY (`armario_id`) REFERENCES `armario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
