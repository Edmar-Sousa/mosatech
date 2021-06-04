-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Tempo de geração: 04-Jun-2021 às 02:53
-- Versão do servidor: 5.7.31
-- versão do PHP: 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `mosatech`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentariosproduto`
--

DROP TABLE IF EXISTS `comentariosproduto`;
CREATE TABLE IF NOT EXISTS `comentariosproduto` (
  `fkProduto` varchar(255) NOT NULL,
  `textoComentario` varchar(255) NOT NULL,
  KEY `fkProduto` (`fkProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `comentariossite`
--

DROP TABLE IF EXISTS `comentariossite`;
CREATE TABLE IF NOT EXISTS `comentariossite` (
  `fkUsuario` varchar(255) NOT NULL,
  `textoComentario` varchar(255) NOT NULL,
  KEY `fkUsuario` (`fkUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

DROP TABLE IF EXISTS `produtos`;
CREATE TABLE IF NOT EXISTS `produtos` (
  `idProduto` varchar(255) NOT NULL,
  `nomeProduto` varchar(100) NOT NULL,
  `cameraProduto` varchar(100) NOT NULL,
  `procesProduto` varchar(100) NOT NULL,
  `menRamProduto` varchar(100) NOT NULL,
  `telaDoProduto` varchar(100) NOT NULL,
  `armazeProduto` varchar(100) NOT NULL,
  `imgSrc` varchar(255) DEFAULT NULL,
  `precoProduto` varchar(10) NOT NULL,
  UNIQUE KEY `idProduto` (`idProduto`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

DROP TABLE IF EXISTS `usuarios`;
CREATE TABLE IF NOT EXISTS `usuarios` (
  `idUsuario` varchar(255) NOT NULL,
  `permissaoAdmin` tinyint(1) NOT NULL,
  `nomeUsuario` varchar(30) NOT NULL,
  `senhaUsuario` varchar(255) NOT NULL,
  `email` varchar(40) NOT NULL,
  `src` varchar(150) NOT NULL,
  UNIQUE KEY `idUsuario` (`idUsuario`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `permissaoAdmin`, `nomeUsuario`, `senhaUsuario`, `email`, `src`) VALUES
('60b52dbbb6784', 0, 'usuario', '1234', 'teste@gmail.com', ' '),
('60b52dbbb6796', 1, 'admin', '123', 'admin@gmail.com', ' ');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
