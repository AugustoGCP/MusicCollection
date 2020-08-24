-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Ago-2020 às 22:16
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `db_collection_music`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_albums`
--

CREATE TABLE `tb_albums` (
  `cod_album` int(11) NOT NULL,
  `album` varchar(70) NOT NULL,
  `artist` int(11) NOT NULL,
  `usr_album` int(11) DEFAULT NULL,
  `img_cover` varchar(120) DEFAULT NULL,
  `year_album` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_artists`
--

CREATE TABLE `tb_artists` (
  `cod_artist` int(11) NOT NULL,
  `artist` varchar(100) NOT NULL,
  `twitter` varchar(50) NOT NULL,
  `about` varchar(100) NOT NULL,
  `deactivate` tinyint(1) DEFAULT NULL,
  `usr` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_artists`
--

INSERT INTO `tb_artists` (`cod_artist`, `artist`, `twitter`, `about`, `deactivate`, `usr`) VALUES
(18, 'Charlie Brown Jr.', '@cbjroficial', 'sjdalskdjlaskjdalskjdlaksjdkask', 1, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_frienship`
--

CREATE TABLE `tb_frienship` (
  `cod_friendship` int(11) NOT NULL,
  `ordered_friendship` int(11) NOT NULL,
  `recived_friendship` int(11) NOT NULL,
  `accept` tinyint(1) DEFAULT NULL,
  `date_friendship` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_musics`
--

CREATE TABLE `tb_musics` (
  `cod_music` int(11) NOT NULL,
  `music` varchar(70) NOT NULL,
  `artist_msc` int(11) NOT NULL,
  `album` int(11) NOT NULL,
  `usr_msc` int(11) DEFAULT NULL,
  `path` varchar(120) NOT NULL,
  `deactive` tinyint(1) NOT NULL,
  `date_create` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_users`
--

CREATE TABLE `tb_users` (
  `cod_usr` int(11) NOT NULL,
  `usr` varchar(70) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `PASSWORD` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_users`
--

INSERT INTO `tb_users` (`cod_usr`, `usr`, `full_name`, `birth`, `PASSWORD`) VALUES
(2, 'Administrador', NULL, NULL, '123456');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `tb_albums`
--
ALTER TABLE `tb_albums`
  ADD PRIMARY KEY (`cod_album`),
  ADD KEY `artist` (`artist`),
  ADD KEY `usr_album` (`usr_album`);

--
-- Índices para tabela `tb_artists`
--
ALTER TABLE `tb_artists`
  ADD PRIMARY KEY (`cod_artist`),
  ADD KEY `usr` (`usr`);

--
-- Índices para tabela `tb_frienship`
--
ALTER TABLE `tb_frienship`
  ADD PRIMARY KEY (`cod_friendship`);

--
-- Índices para tabela `tb_musics`
--
ALTER TABLE `tb_musics`
  ADD PRIMARY KEY (`cod_music`),
  ADD KEY `album` (`album`),
  ADD KEY `artist_msc` (`artist_msc`),
  ADD KEY `usr_msc` (`usr_msc`);

--
-- Índices para tabela `tb_users`
--
ALTER TABLE `tb_users`
  ADD PRIMARY KEY (`cod_usr`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `tb_albums`
--
ALTER TABLE `tb_albums`
  MODIFY `cod_album` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `tb_artists`
--
ALTER TABLE `tb_artists`
  MODIFY `cod_artist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de tabela `tb_frienship`
--
ALTER TABLE `tb_frienship`
  MODIFY `cod_friendship` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tb_musics`
--
ALTER TABLE `tb_musics`
  MODIFY `cod_music` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `tb_users`
--
ALTER TABLE `tb_users`
  MODIFY `cod_usr` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `tb_albums`
--
ALTER TABLE `tb_albums`
  ADD CONSTRAINT `artist` FOREIGN KEY (`artist`) REFERENCES `tb_artists` (`cod_artist`),
  ADD CONSTRAINT `usr_album` FOREIGN KEY (`usr_album`) REFERENCES `tb_users` (`cod_usr`);

--
-- Limitadores para a tabela `tb_artists`
--
ALTER TABLE `tb_artists`
  ADD CONSTRAINT `usr` FOREIGN KEY (`usr`) REFERENCES `tb_users` (`cod_usr`);

--
-- Limitadores para a tabela `tb_musics`
--
ALTER TABLE `tb_musics`
  ADD CONSTRAINT `album` FOREIGN KEY (`album`) REFERENCES `tb_albums` (`cod_album`),
  ADD CONSTRAINT `artist_msc` FOREIGN KEY (`artist_msc`) REFERENCES `tb_artists` (`cod_artist`),
  ADD CONSTRAINT `usr_msc` FOREIGN KEY (`usr_msc`) REFERENCES `tb_users` (`cod_usr`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
