-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 08/12/2025 às 03:19
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

--
-- Despejando dados para a tabela `suplemento`
--

INSERT INTO `suplemento` (`id`, `nome`, `marca`, `categoria_id`, `forma_apresentacao`, `quantidade_por_porcao`, `quantidade_total`, `calorias`, `sabor`, `preco`, `img`, `vegano`, `gluten`, `lactose`, `quantidade_por_porcao_UM`, `quantidade_total_UM`) VALUES
(1, 'Whey Protein Isolado', 'Growth', 1, 'pó', '39', '1', '122', 'morango', 22.00, '', 1, 0, 0, 'g', 'Kg'),
(2, 'mill', 'Growth', 1, 'cápsulas', '22', '22', '122', 'morango', 11.00, '', 0, 0, 0, 'g', 'Kg');

-- --------------------------------------------------------

INSERT INTO `suplemento` (`id`, `nome`, `marca`, `categoria_id`, `forma_apresentacao`, `quantidade_por_porcao`, `quantidade_total`, `calorias`, `sabor`, `preco`, `img`, `link`, `vegano`, `gluten`, `lactose`, `quantidade_por_porcao_UM`, `quantidade_total_UM`) VALUES
(4, 'Creatina Creapure', 'Max Titanium', 2, 'pó', '3', '250', '0', 'sem sabor', 142.78, 'https://lojamaxtitanium.vtexassets.com/arquivos/ids/157977-1920-0/Creatina-Creapure-250g.png?v=638470625756800000', 'Max Titanium', 0, 0, 0, 'g', 'g'),
(5, 'Creatina Monohidratada', 'Growth', 2, 'pó', '3', '250', '0', 'sem sabor', 49.90, 'https://www.gsuplementos.com.br/upload/produto/layout/72/produto1-mono-250-v4.webp', 'Growth', 0, 0, 0, 'g', 'g'),
(6, 'Creatina 100% Pura', 'Integral Medica', 2, 'pó', '3', '300', '0', 'sem sabor', 54.00, 'https://integralmedica.vtexassets.com/arquivos/ids/168402-1600-auto?v=638987481255700000&width=1600&height=auto&aspect=true', 'Integral Medica', 0, 0, 0, 'g', 'g');

--

--
-- Estrutura para tabela `suplemento_nutriente`
--

CREATE TABLE `suplemento_nutriente` (
  `suplemento_id` int(11) NOT NULL,
  `nutriente_id` int(11) NOT NULL,
  `unidade_medida` varchar(30) DEFAULT NULL,
  `quantidade` decimal(10,3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `suplemento_nutriente`
--

INSERT INTO `suplemento_nutriente` (`suplemento_id`, `nutriente_id`, `unidade_medida`, `quantidade`) VALUES
(2, 1, 'g', 22.000);

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
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
