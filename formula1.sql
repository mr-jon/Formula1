-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 13-Jun-2019 às 00:50
-- Versão do servidor: 10.1.38-MariaDB
-- versão do PHP: 7.3.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `formula1`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `equipe`
--

CREATE TABLE `equipe` (
  `codEquip` int(11) NOT NULL,
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `gp`
--

CREATE TABLE `gp` (
  `codGp` int(11) NOT NULL,
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pais`
--

CREATE TABLE `pais` (
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `pais`
--

INSERT INTO `pais` (`codPais`, `nome`) VALUES
(1, 'Austrália'),
(2, 'Bahrain'),
(3, 'Brasil'),
(4, 'Canadá');

-- --------------------------------------------------------

--
-- Estrutura da tabela `piloto`
--

CREATE TABLE `piloto` (
  `codPiloto` int(11) NOT NULL,
  `codEquip` int(11) NOT NULL,
  `codPais` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `pilotogp`
--

CREATE TABLE `pilotogp` (
  `codPiloto` int(11) NOT NULL,
  `codEquip` int(11) NOT NULL,
  `codGp` int(11) NOT NULL,
  `pts` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `equipe`
--
ALTER TABLE `equipe`
  ADD PRIMARY KEY (`codEquip`),
  ADD KEY `pais_equipe_fk` (`codPais`);

--
-- Indexes for table `gp`
--
ALTER TABLE `gp`
  ADD PRIMARY KEY (`codGp`),
  ADD KEY `pais_gp_fk` (`codPais`);

--
-- Indexes for table `pais`
--
ALTER TABLE `pais`
  ADD PRIMARY KEY (`codPais`);

--
-- Indexes for table `piloto`
--
ALTER TABLE `piloto`
  ADD PRIMARY KEY (`codPiloto`,`codEquip`),
  ADD KEY `pais_piloto_fk` (`codPais`),
  ADD KEY `equipe_piloto_fk` (`codEquip`);

--
-- Indexes for table `pilotogp`
--
ALTER TABLE `pilotogp`
  ADD PRIMARY KEY (`codPiloto`,`codEquip`,`codGp`),
  ADD KEY `gp_pilotogp_fk` (`codGp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `equipe`
--
ALTER TABLE `equipe`
  MODIFY `codEquip` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gp`
--
ALTER TABLE `gp`
  MODIFY `codGp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pais`
--
ALTER TABLE `pais`
  MODIFY `codPais` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `piloto`
--
ALTER TABLE `piloto`
  MODIFY `codPiloto` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `equipe`
--
ALTER TABLE `equipe`
  ADD CONSTRAINT `pais_equipe_fk` FOREIGN KEY (`codPais`) REFERENCES `pais` (`codPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `gp`
--
ALTER TABLE `gp`
  ADD CONSTRAINT `pais_gp_fk` FOREIGN KEY (`codPais`) REFERENCES `pais` (`codPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `piloto`
--
ALTER TABLE `piloto`
  ADD CONSTRAINT `equipe_piloto_fk` FOREIGN KEY (`codEquip`) REFERENCES `equipe` (`codEquip`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `pais_piloto_fk` FOREIGN KEY (`codPais`) REFERENCES `pais` (`codPais`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `pilotogp`
--
ALTER TABLE `pilotogp`
  ADD CONSTRAINT `gp_pilotogp_fk` FOREIGN KEY (`codGp`) REFERENCES `gp` (`codGp`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `piloto_pilotogp_fk` FOREIGN KEY (`codPiloto`,`codEquip`) REFERENCES `piloto` (`codPiloto`, `codEquip`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
