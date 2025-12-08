-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/12/2025 às 02:08
-- Versão do servidor: 10.4.32-MariaDB
-- Versão do PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `suplementosfacil`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `nome`) VALUES
(1, 'Whey Protein');

-- --------------------------------------------------------

--
-- Estrutura para tabela `nutriente`
--

CREATE TABLE `nutriente` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `tipo` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `nutriente`
--

INSERT INTO `nutriente` (`id`, `nome`, `tipo`) VALUES
(1, 'Carboidrato', 'Carboidrato'),
(2, 'Proteina', 'Proteina');

-- --------------------------------------------------------

--
-- Estrutura para tabela `suplemento`
--

CREATE TABLE `suplemento` (
  `id` int(11) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `marca` varchar(120) DEFAULT NULL,
  `categoria_id` int(11) NOT NULL,
  `forma_apresentacao` varchar(50) NOT NULL,
  `quantidade_por_porcao` varchar(80) DEFAULT NULL,
  `quantidade_total` varchar(80) DEFAULT NULL,
  `calorias` varchar(60) DEFAULT NULL,
  `sabor` varchar(80) DEFAULT NULL,
  `preco` decimal(10,2) DEFAULT 0.00,
  `img` varchar(255) DEFAULT NULL,
  `vegano` tinyint(1) NOT NULL DEFAULT 0,
  `gluten` tinyint(1) NOT NULL DEFAULT 0,
  `lactose` tinyint(1) NOT NULL DEFAULT 0,
  `quantidade_por_porcao_UM` varchar(7) NOT NULL,
  `quantidade_total_UM` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `suplemento_nutriente`
--

CREATE TABLE `suplemento_nutriente` (
  `suplemento_id` int(11) NOT NULL,
  `nutriente_id` int(11) NOT NULL,
  `unidade_medida` varchar(30) DEFAULT NULL,
  `quantidade` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `sobrenome` varchar(100) DEFAULT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(30) DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `img` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `telefone`, `senha`, `img`) VALUES
(2, 'Marcelo', 'Pinheiro da Silva', 'marcelomxm26@gmail.com', '53984931123', '12345', ''),
(4, 'a', 'Pinheiro da Silva', 'marcelomxm@gmail.com', '5398491111', '123456', '');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `nutriente`
--
ALTER TABLE `nutriente`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nome` (`nome`);

--
-- Índices de tabela `suplemento`
--
ALTER TABLE `suplemento`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_suplemento_categoria` (`categoria_id`);

--
-- Índices de tabela `suplemento_nutriente`
--
ALTER TABLE `suplemento_nutriente`
  ADD PRIMARY KEY (`suplemento_id`,`nutriente_id`),
  ADD KEY `fk_sn_nutriente` (`nutriente_id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `nutriente`
--
ALTER TABLE `nutriente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `suplemento`
--
ALTER TABLE `suplemento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `suplemento`
--
ALTER TABLE `suplemento`
  ADD CONSTRAINT `fk_suplemento_categoria` FOREIGN KEY (`categoria_id`) REFERENCES `categoria` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_suplemento_forma` FOREIGN KEY (`forma_apresentacao`) REFERENCES `forma_apresentacao` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_suplemento_restricao` FOREIGN KEY (`restricao_id`) REFERENCES `restricao_alimentar` (`id`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Restrições para tabelas `suplemento_nutriente`
--
ALTER TABLE `suplemento_nutriente`
  ADD CONSTRAINT `fk_sn_nutriente` FOREIGN KEY (`nutriente_id`) REFERENCES `nutriente` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_sn_suplemento` FOREIGN KEY (`suplemento_id`) REFERENCES `suplemento` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
