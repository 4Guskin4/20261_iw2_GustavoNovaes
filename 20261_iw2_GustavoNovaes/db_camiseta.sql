-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Máquina: localhost
-- Data de Criação: 16-Jun-2026 às 11:30
-- Versão do servidor: 5.6.13
-- versão do PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


CREATE DATABASE IF NOT EXISTS `db_camiseta` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `db_camiseta`;


CREATE TABLE IF NOT EXISTS `tb_camiseta` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cor` text NOT NULL,
  `tamanho` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
