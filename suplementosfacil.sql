-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 15/12/2025 às 03:09
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
(1, 'Whey Protein'),
(2, 'Creatina');

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
(1, 'Carboidrato', 'macronutriente'),
(2, 'Proteina', 'macronutriente'),
(3, 'Gorduras', 'macronutriente'),
(4, 'Creatina', 'micronutriente'),
(5, 'Sódio', 'micronutriente'),
(6, 'Cálcio', 'micronutriente'),
(7, 'Ferro', 'micronutriente'),
(8, 'Vitamina C', 'micronutriente'),
(9, 'Vitamina D', 'micronutriente'),
(10, 'Vitamina B12', 'micronutriente'),
(11, 'Magnésio', 'micronutriente'),
(12, 'Cafeína', 'micronutriente');

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
  `link` varchar(255) DEFAULT NULL,
  `vegano` tinyint(1) NOT NULL DEFAULT 0,
  `gluten` tinyint(1) NOT NULL DEFAULT 0,
  `lactose` tinyint(1) NOT NULL DEFAULT 0,
  `quantidade_por_porcao_UM` varchar(7) NOT NULL,
  `quantidade_total_UM` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `suplemento`
--

INSERT INTO `suplemento` (`id`, `nome`, `marca`, `categoria_id`, `forma_apresentacao`, `quantidade_por_porcao`, `quantidade_total`, `calorias`, `sabor`, `preco`, `img`, `link`, `vegano`, `gluten`, `lactose`, `quantidade_por_porcao_UM`, `quantidade_total_UM`) VALUES
(1, '(TOP) Whey Protein Concentrado', 'Growth', 1, 'pó', '30', '1', '119', 'natural', 134.90, 'public/imagens/1.webp', 'https://www.gsuplementos.com.br/whey-protein-concentrado-1kg-growth-supplements-p985936?apwc=Y2FuYWxJbnRlZ3JhY2FvPTc1N3xwcm9kdXRvPTE4NQ%3D%3D&gad_source=1&gad_campaignid=22952957169&gbraid=0AAAAAD3gQWM2JYUpiKRQiGEtC-IebVt_M#item-4', 0, 0, 0, 'g', 'kg'),
(2, 'Whey Pro ', 'Max Titanium', 1, 'pó', '40', '900', '150', 'chocolate, morango, baunilha', 91.76, 'public/imagens/2.webp', 'https://www.maxtitanium.com.br/whey-pro-1kg/p?idsku=125&utm_source=googleads&utm_medium=cpc&utm_content=&utm_campaign=21', 0, 0, 0, 'g', 'g'),
(3, 'Nutri Whey Protein Pote', 'Integral Medica', 1, 'pó', '120', '900', '434', 'Baunilha, morango, chocolate, cookies', 66.41, 'public/imagens/3.png', 'https://www.integralmedica.com.br/nutri-whey-protein-pote-900g/p?skuId=1002102&utm_source=google&utm_medium=cpc&utm_campaign=23015225751_&utm_content=&utm_term=&nemu_source=google&nemu_campaign=23015225751&nemu_adset=&nemu_content=&nemu_term=&gad_source=1', 0, 0, 0, 'g', 'g'),
(4, 'Creatina', 'Max Titanium', 2, 'pó', '3', '300', '0', 'sem sabor', 72.85, 'public/imagens/4.webp', 'https://www.maxtitanium.com.br/creatine-pote-300g/p?skuid=31', 0, 1, 1, 'g', 'g'),
(5, 'Creatina 100% Pura', 'Integral Medica', 2, 'pó', '3', '300', '0', 'sem sabor', 57.00, 'public/imagens/5.png', 'https://www.integralmedica.com.br/creatina-100-pura-300g-integralmedica/p?skuId=1002347', 0, 1, 1, 'g', 'g'),
(6, 'Creatina Monohidratada', 'G', 2, 'pó', '3', '250', '0', 'sem sabor', 49.90, 'public/imagens/6.webp', 'https://www.gsuplementos.com.br/creatina-monohidratada-250gr-growth-supplements-p985931', 0, 1, 1, 'g', 'g');

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

--
-- Despejando dados para a tabela `suplemento_nutriente`
--

INSERT INTO `suplemento_nutriente` (`suplemento_id`, `nutriente_id`, `unidade_medida`, `quantidade`) VALUES
(1, 1, 'g', 2.300),
(1, 3, 'g', 2.300),
(1, 2, 'g', 24.000),
(1, 5, 'mg', 54.000),
(2, 1, 'g', 19.000),
(2, 3, 'g', 1.500),
(2, 2, 'g', 15.000),
(2, 5, 'mg', 149.000),
(3, 6, 'mg', 230.000),
(3, 1, 'g', 73.000),
(3, 7, 'mg', 2.700),
(3, 3, 'g', 2.200),
(3, 2, 'g', 30.000),
(3, 5, 'mg', 201.000),
(3, 8, 'mg', 14.000),
(3, 9, 'mcg', 3.000),
(4, 4, 'g', 3.000),
(5, 4, 'g', 3.000),
(6, 4, 'g', 3.000);

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
  `senha` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `sobrenome`, `email`, `telefone`, `senha`) VALUES
(2, 'Marcelo', 'Pinheiro da Silva', 'marcelomxm@gmail.com', '53984931111', '$2y$10$7pyoGpsrjogGQCW2yYx5PuRPPwCAGXAXHJm0JFugdsR.OZGrGTPZi'),
(3, 'marcelo', 'silva', 'marcelo@gmail.com', '53984111111', '$2y$10$h/IGPNjHcrVYttWhTSmTKOVuxWDRz43gbJdptFxljVHSwz7ybhlfS');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `nutriente`
--
ALTER TABLE `nutriente`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `suplemento`
--
ALTER TABLE `suplemento`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `nutriente`
--
ALTER TABLE `nutriente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de tabela `suplemento`
--
ALTER TABLE `suplemento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
