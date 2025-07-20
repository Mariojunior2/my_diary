-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20/07/2025 às 03:42
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `my_diary`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `user`
--

CREATE TABLE `user` (
  `id_user` int(10) UNSIGNED NOT NULL,
  `nome` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `user`
--

INSERT INTO `user` (`id_user`, `nome`, `senha`, `email`) VALUES
(1, 'Ana Silva', 'senha123', 'ana@email.com'),
(2, 'Bruno Costa', 'bruno456', 'bruno@email.com'),
(3, 'Carla Mendes', 'carla789', 'carla@email.com'),
(4, 'Joao', '$2y$10$1z8eauxfBeY.mWWlwdO2IOFWtcAZmIGqJc.fqmeRkbQEVnfiR7Rke', 'ana1@email.com'),
(5, 'Mario Gonzales', '$2y$10$8we6TeTgyPKkB/S9l8.qUONx5S6eC.n/F9XEa8q4Iirhz2nApYT46', 'ana3@email.com'),
(6, '123', '$2y$10$9.W9lJeQjY7adUpo5/plaetfwEQZMReTV.khIXaLG.m3/Bd.2tKy2', '1@email.com'),
(7, '123', '$2y$10$XgyvKrIUiLY8BodX4W2oDuolsCGljeGKuarMseKdE1uoudaEqH2E2', '123@email.com'),
(8, '1234', '$2y$10$96Dfj1EwH7jdyUrsP..z7OI.nZ.DcP3DdhE/x9kGQ/E3IFj8rp/CK', '1234@email.com'),
(9, 'Joao', '$2y$10$XzCSJatCiaWwT9FvyFiJM.lLe/4XY/6CNEYL/ccTWIaaZIDtHz9Y2', '144444@email.com'),
(10, 'Joao', '$2y$10$NiPGny2Xa8.stIuAQ48TVun0D9sLJRfT62McX3WUGg7jL4c9OTiT2', '1000@email.com');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
