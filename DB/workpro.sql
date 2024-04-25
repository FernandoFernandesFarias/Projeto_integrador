-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 25-Abr-2024 às 18:46
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `workpro`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categoria`
--

CREATE TABLE `categoria` (
  `id_categ` int(11) NOT NULL,
  `nome` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `categoria`
--

INSERT INTO `categoria` (`id_categ`, `nome`) VALUES
(1, 'Eletricista'),
(2, 'Encanador'),
(3, 'Pedreiro'),
(4, 'Mecânico');

-- --------------------------------------------------------

--
-- Estrutura da tabela `cidades`
--

CREATE TABLE `cidades` (
  `id` int(11) NOT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `estados_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `cidades`
--

INSERT INTO `cidades` (`id`, `nome`, `estados_id`) VALUES
(1, 'Criciúma', 1),
(2, 'Forquilhinha', 1),
(3, 'Içara', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `estados`
--

INSERT INTO `estados` (`id`, `nome`) VALUES
(1, 'SC');

-- --------------------------------------------------------

--
-- Estrutura da tabela `pessoas`
--

CREATE TABLE `pessoas` (
  `id` int(11) NOT NULL,
  `data_criacao` date DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `nome` varchar(100) DEFAULT NULL,
  `senha` varchar(100) DEFAULT NULL,
  `tipo` enum('Cliente','Profissional') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `pessoas`
--

INSERT INTO `pessoas` (`id`, `data_criacao`, `email`, `nome`, `senha`, `tipo`) VALUES
(24, '2023-11-29', 'fabio@gmail.com', 'Fábio Oliveira', 'a53bd0415947807bcb95ceec535820ee', 'Profissional'),
(25, '2023-11-29', 'jorge@gmail.com', 'Jorge Cardoso', 'd67326a22642a324aa1b0745f2f17abb', 'Profissional'),
(26, '2023-11-29', 'mario@gmail.com', 'Mário Joaquim', '', 'Profissional'),
(27, '2023-11-29', 'carlos@gmail.com', 'Carlos Almeida', 'dc599a9972fde3045dab59dbd1ae170b', 'Profissional'),
(28, '2023-11-29', 'fagner@gmail.com', 'Fagner Da Silva', 'dd989dc91b2375c5a595082216eda09b', 'Profissional'),
(29, '2023-11-29', 'geraldo@gmail.com', 'Geraldo Ramos', '570bc0574501afcdc05200f4de6b25d3', 'Profissional'),
(30, '2023-11-29', 'andre@gmail.com', 'André Silveira', '19984dcaea13176bbb694f62ba6b5b35', 'Profissional'),
(31, '2023-11-29', 'silvio@gmail.com', 'Silvio Aguiar', '5292c121f120eb2322f99d8d4aad0db7', 'Profissional');

-- --------------------------------------------------------

--
-- Estrutura da tabela `profissionais`
--

CREATE TABLE `profissionais` (
  `id` int(11) NOT NULL,
  `path` varchar(100) NOT NULL,
  `contato` varchar(255) DEFAULT NULL,
  `data_nasc` date DEFAULT NULL,
  `descricao` text DEFAULT NULL,
  `pessoa_id` int(11) DEFAULT NULL,
  `cidade` int(11) DEFAULT NULL,
  `categoria` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `profissionais`
--

INSERT INTO `profissionais` (`id`, `path`, `contato`, `data_nasc`, `descricao`, `pessoa_id`, `cidade`, `categoria`) VALUES
(23, 'fotos/6567a5a173091.jpg', '+5548999887766', '1980-10-10', 'Eletricista dedicado e experiente, estou pronto para iluminar oportunidades e contribuir com minha expertise para projetos desafiadores.', 24, 1, 1),
(24, 'fotos/6567a6ee59d4a.jpg', '+5548988996677', '1985-03-12', 'Como eletricista apaixonado pela profissão, estou em busca de novos desafios que me permitam aplicar minha expertise e habilidades técnicas.', 25, 1, 1),
(26, 'fotos/6567a88a673d5.png', '+5548988776655', '1974-03-10', 'Encanador especializado em soluções eficientes para problemas hidráulicos.', 26, 2, 2),
(27, 'fotos/6567a91303b2a.jpg', '+5548955667744', '1981-11-06', 'Encanador experiente e dedicado, pronto para levar habilidades técnicas e profissionalismo a projetos desafiadores.', 27, 3, 2),
(28, 'fotos/6567a9adc7aa2.jpg', '+5548944553388', '1977-09-01', 'Pedreiro experiente, dedicado e apaixonado pela construção civil, pronto para transformar projetos em realidade.', 28, 1, 3),
(29, 'fotos/6567aababa757.png', '+5548988227748', '1965-09-09', 'Pedreiro experiente, dedicado e apaixonado pela construção civil, pronto para transformar projetos em realidade.', 29, 1, 3),
(30, 'fotos/6567abae009c9.jpg', '+5548988238482', '1984-05-07', 'Com vasta experiência e habilidades sólidas em mecânica, estou pronto para contribuir com minha expertise e dedicação para um ambiente de trabalho dinâmico.', 30, 1, 4),
(31, 'fotos/6567ac7380f49.jpg', '+5548977583823', '1978-12-29', 'Sou um mecânico apaixonado por desafios e dedicado à excelência em cada projeto.', 31, 1, 4);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categ`);

--
-- Índices para tabela `cidades`
--
ALTER TABLE `cidades`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estados_id` (`estados_id`);

--
-- Índices para tabela `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `pessoas`
--
ALTER TABLE `pessoas`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pessoa_id` (`pessoa_id`),
  ADD KEY `cidade` (`cidade`),
  ADD KEY `categoria` (`categoria`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categ` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `cidades`
--
ALTER TABLE `cidades`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `pessoas`
--
ALTER TABLE `pessoas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de tabela `profissionais`
--
ALTER TABLE `profissionais`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cidades`
--
ALTER TABLE `cidades`
  ADD CONSTRAINT `cidades_ibfk_1` FOREIGN KEY (`estados_id`) REFERENCES `estados` (`id`);

--
-- Limitadores para a tabela `profissionais`
--
ALTER TABLE `profissionais`
  ADD CONSTRAINT `profissionais_ibfk_1` FOREIGN KEY (`pessoa_id`) REFERENCES `pessoas` (`id`),
  ADD CONSTRAINT `profissionais_ibfk_2` FOREIGN KEY (`cidade`) REFERENCES `cidades` (`id`),
  ADD CONSTRAINT `profissionais_ibfk_3` FOREIGN KEY (`categoria`) REFERENCES `categoria` (`id_categ`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
