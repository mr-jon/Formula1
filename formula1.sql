-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Tempo de geração: 20/06/2019 às 13:50
-- Versão do servidor: 5.7.25
-- Versão do PHP: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Banco de dados: `formula1`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `equipe`
--

CREATE TABLE `equipe` (
  `codEquip` int(11) NOT NULL,
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `equipe`
--

INSERT INTO `equipe` (`codEquip`, `codPais`, `nome`) VALUES
(1, 1, 'Red Bull'),
(2, 3, 'Mercedes');

-- --------------------------------------------------------

--
-- Estrutura para tabela `gp`
--

CREATE TABLE `gp` (
  `codGp` int(11) NOT NULL,
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `gp`
--

INSERT INTO `gp` (`codGp`, `codPais`, `nome`) VALUES
(1, 1, 'GP Bahrein'),
(2, 2, 'GP Austrália'),
(3, 4, 'GP Monaco'),
(4, 3, 'GP Interlagos');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pais`
--

CREATE TABLE `pais` (
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `pais`
--

INSERT INTO `pais` (`codPais`, `nome`) VALUES
(1, 'Austrália'),
(2, 'Bahrain'),
(3, 'Brasil'),
(4, 'Canadá');

-- --------------------------------------------------------

--
-- Estrutura para tabela `piloto`
--

CREATE TABLE `piloto` (
  `codPiloto` int(11) NOT NULL,
  `codEquip` int(11) NOT NULL,
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `piloto`
--

INSERT INTO `piloto` (`codPiloto`, `codEquip`, `codPais`, `nome`) VALUES
(1, 2, 3, 'Felipe Massa'),
(2, 1, 3, 'Ayrton Senna'),
(3, 1, 1, 'Sergey Sirotkin'),
(4, 2, 1, 'José');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pilotogp`
--

CREATE TABLE `pilotogp` (
  `codPiloto` int(11) NOT NULL,
  `codEquip` int(11) NOT NULL,
  `codGp` int(11) NOT NULL,
  `pts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Despejando dados para a tabela `pilotogp`
--

INSERT INTO `pilotogp` (`codPiloto`, `codEquip`, `codGp`, `pts`) VALUES
(1, 2, 4, 10),
(2, 1, 2, 6),
(2, 1, 4, 18),
(3, 1, 4, 5);

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(32) NOT NULL,
  `admin` char(1) NOT NULL DEFAULT 'N'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `email`, `senha`, `admin`) VALUES
(1, 'Jeffery', 'jeffery@email.com', 'senh@123', 'N'),
(1, 'Leandro', 'leandro@email.com', 'senh@321', 'N'),
(2, 'admin', 'admin@admin', 'senh@123', 'S');

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`codEquip`),
  ADD KEY `pais_equipe_fk` (`codPais`);

--
-- Índices de tabela `gp`
--
ALTER TABLE `gp`
  ADD PRIMARY KEY (`codGp`),
  ADD KEY `pais_gp_fk` (`codPais`);

--
-- Índices de tabela `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`codPais`);

--
-- Índices de tabela `piloto`
--
ALTER TABLE `piloto`
  ADD PRIMARY KEY (`codPiloto`,`codEquip`),
  ADD KEY `pais_piloto_fk` (`codPais`),
  ADD KEY `equipe_piloto_fk` (`codEquip`);

--
-- Índices de tabela `pilotogp`
--
ALTER TABLE `pilotogp`
  ADD PRIMARY KEY (`codPiloto`,`codEquip`,`codGp`),
  ADD KEY `gp_pilotogp_fk` (`codGp`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `equipe`
--
ALTER TABLE `equipe`
  MODIFY `codEquip` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `gp`
--
ALTER TABLE `gp`
  MODIFY `codGp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `pais`
--
ALTER TABLE `pais`
  MODIFY `codPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `piloto`
--
ALTER TABLE `piloto`
  MODIFY `codPiloto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `pais_equipe_fk` FOREIGN KEY (`codPais`) REFERENCES `pais` (`codPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `gp`
--
ALTER TABLE `gp`
  ADD CONSTRAINT `pais_gp_fk` FOREIGN KEY (`codPais`) REFERENCES `pais` (`codPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `piloto`
--
ALTER TABLE `piloto`
  ADD CONSTRAINT `equipe_piloto_fk` FOREIGN KEY (`codEquip`) REFERENCES `equipe` (`codEquip`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pais_piloto_fk` FOREIGN KEY (`codPais`) REFERENCES `pais` (`codPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Restrições para tabelas `pilotogp`
--
ALTER TABLE `pilotogp`
  ADD CONSTRAINT `gp_pilotogp_fk` FOREIGN KEY (`codGp`) REFERENCES `gp` (`codGp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `piloto_pilotogp_fk` FOREIGN KEY (`codPiloto`,`codEquip`) REFERENCES `piloto` (`codPiloto`, `codEquip`) ON DELETE NO ACTION ON UPDATE NO ACTION;
