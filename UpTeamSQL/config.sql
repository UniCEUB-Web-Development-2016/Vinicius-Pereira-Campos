-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 23-Jun-2016 às 13:55
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `dbupteam`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `config`
--

CREATE TABLE `config` (
  `idRelacionamento` int(11) NOT NULL,
  `tblOrigem` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tblRelacionamento` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL,
  `forKey` varchar(250) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `config`
--

INSERT INTO `config` (`idRelacionamento`, `tblOrigem`, `tblRelacionamento`, `forKey`) VALUES
(1, 'task', 'difficulty', 'difficulty'),
(3, 'task', 'user', 'owner'),
(4, 'task', 'project', 'project'),
(5, 'task', 'state', 'state'),
(6, 'project', 'team', 'team');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`idRelacionamento`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `idRelacionamento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;