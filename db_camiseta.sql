-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 17-Jun-2026 às 14:30
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `db_camiseta`
--
CREATE DATABASE IF NOT EXISTS `db_camiseta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_camiseta`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_camiseta`
--

CREATE TABLE IF NOT EXISTS `tb_camiseta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cor` text NOT NULL,
  `tamanho` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `tb_camiseta`
--

INSERT INTO `tb_camiseta` (`id`, `cor`, `tamanho`) VALUES
(2, 'Vermelho', 'G'),
(3, 'Verde', 'M');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
