-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19-Maio-2022 às 17:52
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `celke`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `alternativas`
--

CREATE TABLE `alternativas` (
  `id` int(11) NOT NULL,
  `resposta` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pergunta_id` int(11) NOT NULL,
  `val_resposta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `alternativas`
--

INSERT INTO `alternativas` (`id`, `resposta`, `pergunta_id`, `val_resposta`) VALUES
(1, 'sul', 1, 2),
(2, 'Norte', 1, 2),
(3, 'Sudeste', 1, 1),
(4, 'Nordeste', 1, 2),
(5, 'Brasília ', 2, 1),
(6, 'Rio de Janeiro', 2, 2),
(7, 'São Paulo', 2, 2),
(8, 'Valinhos', 2, 2),
(9, 'Verdadeiro', 3, 2),
(10, 'falso', 3, 1),
(26, 'Sim :)', 4, 1),
(27, 'Não :(', 4, 2),
(28, 'Vasco', 5, 2),
(29, 'Santos', 5, 1),
(30, 'Palmeiras', 5, 2),
(31, 'Real Madrid', 5, 2),
(32, 'França', 6, 2),
(33, 'Rússia', 6, 2),
(34, 'Itália ', 6, 1),
(35, 'Luan Santana', 8, 2),
(36, 'Michael Jackson', 8, 1),
(37, 'Michael Teló', 8, 2),
(38, 'Michael Jordan', 8, 2),
(39, 'Wesley Safadão', 8, 2),
(40, 'Péricles', 8, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `perguntas`
--

CREATE TABLE `perguntas` (
  `id` int(11) NOT NULL,
  `questao` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Extraindo dados da tabela `perguntas`
--

INSERT INTO `perguntas` (`id`, `questao`) VALUES
(1, 'Em que região fica localizado o estado de São Paulo?'),
(2, 'QUAL A CAPITAL DO BRASIL?'),
(3, '3 + 5 = 9'),
(4, 'Gostou desse Questionário?'),
(5, 'Em qual desses times o jogador Pelé jogou?'),
(6, 'País onde fica localizado a cidade \"Napoli\"'),
(8, 'Qual o cantor conhecido pelo movimento de \"andar para trás\"?');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `alternativas`
--
ALTER TABLE `alternativas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `perguntas`
--
ALTER TABLE `perguntas`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `alternativas`
--
ALTER TABLE `alternativas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `perguntas`
--
ALTER TABLE `perguntas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
