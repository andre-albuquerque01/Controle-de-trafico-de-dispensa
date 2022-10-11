-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Set-2022 às 00:40
-- Versão do servidor: 10.4.20-MariaDB
-- versão do PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sge3`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `nome_completo` varchar(255) DEFAULT NULL,
  `email_cliente` varchar(255) NOT NULL,
  `telefone_celular` varchar(17) DEFAULT NULL,
  `telefone_contato` varchar(17) DEFAULT NULL,
  `endereco_id_endereco` int(11) NOT NULL,
  `login_id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `nome_completo`, `email_cliente`, `telefone_celular`, `telefone_contato`, `endereco_id_endereco`, `login_id_login`) VALUES
(20, 'Vitoria\'', '003', '002', '', 34, 20),
(21, 'Corrida', '001@001', '001', '', 35, 20),
(22, 'Aline mendes ', 'andrealbuquerque2001@gmail.com', '61985261944', '', 36, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente_eletronico`
--

CREATE TABLE `cliente_eletronico` (
  `cliente_id_cliente` int(11) NOT NULL,
  `eletronico_id_eletronico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente_eletronico`
--

INSERT INTO `cliente_eletronico` (`cliente_id_cliente`, `eletronico_id_eletronico`) VALUES
(20, 17),
(21, 18),
(22, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `controle`
--

CREATE TABLE `controle` (
  `id_controle` int(11) NOT NULL,
  `nome_completo` varchar(250) NOT NULL,
  `email_controle` varchar(100) DEFAULT NULL,
  `senha_controle` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `controle`
--

INSERT INTO `controle` (`id_controle`, `nome_completo`, `email_controle`, `senha_controle`) VALUES
(1, 'andre', 'andregonsalves2011@gmail.com', '2');

-- --------------------------------------------------------

--
-- Estrutura da tabela `eletronico`
--

CREATE TABLE `eletronico` (
  `id_eletronico` int(11) NOT NULL,
  `modelo` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `numero` varchar(50) DEFAULT NULL,
  `descricao` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `eletronico`
--

INSERT INTO `eletronico` (`id_eletronico`, `modelo`, `marca`, `numero`, `descricao`) VALUES
(17, 'Moto g1', 'sam', '002', 'red'),
(18, 'j1', 'sam', '01', 'red'),
(19, 'j1', 'sam', 'a1', 'red');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id_endereco` int(11) NOT NULL,
  `cep` varchar(10) DEFAULT NULL,
  `cidade` varchar(255) DEFAULT NULL,
  `uf` varchar(2) DEFAULT NULL,
  `bairro` varchar(255) DEFAULT NULL,
  `rua` varchar(255) DEFAULT NULL,
  `complemento` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `endereco`
--

INSERT INTO `endereco` (`id_endereco`, `cep`, `cidade`, `uf`, `bairro`, `rua`, `complemento`) VALUES
(33, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '001'),
(34, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '003'),
(35, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '001'),
(36, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', 'as');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nome_completo_login` varchar(255) DEFAULT NULL,
  `nome_loja` varchar(250) NOT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL,
  `controle_id_controle` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `nome_completo_login`, `nome_loja`, `email_usuario`, `senha_usuario`, `controle_id_controle`) VALUES
(20, 'André', 'magazine', 'andregonsalves2011@gmail.com', '2', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `reparo`
--

CREATE TABLE `reparo` (
  `id_reparo` int(11) NOT NULL,
  `data_recebimento` date DEFAULT NULL,
  `data_previsao` date DEFAULT NULL,
  `data_entrega` date DEFAULT NULL,
  `observacao` varchar(255) DEFAULT NULL,
  `mao_obra` float DEFAULT NULL,
  `custo_peca` float DEFAULT NULL,
  `valor_total` float DEFAULT NULL,
  `status_id_status` int(11) NOT NULL,
  `tecnico_id_tecnico` int(11) NOT NULL,
  `eletronico_id_eletronico` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `reparo`
--

INSERT INTO `reparo` (`id_reparo`, `data_recebimento`, `data_previsao`, `data_entrega`, `observacao`, `mao_obra`, `custo_peca`, `valor_total`, `status_id_status`, `tecnico_id_tecnico`, `eletronico_id_eletronico`) VALUES
(13, '2022-01-04', '2022-01-13', '2022-01-13', 'troca de tela', 100, NULL, 200, 1, 4, 17),
(14, '2022-01-03', '2022-01-03', '2022-01-03', 'troca de tela', 12, NULL, 24, 1, 4, 18),
(15, '2022-01-03', '2022-01-03', '2022-01-03', 'troca de tela', 12, NULL, 24, 1, 4, 18),
(16, '2022-01-03', '2022-01-03', '2022-01-03', 'troca de tela', 12, 12, 24, 1, 4, 18),
(17, '2022-01-03', '2022-01-03', '2022-01-03', 'troca de tela', 12, 12, 24, 1, 4, 18),
(18, '2022-01-18', '2022-01-18', '2022-01-18', 'troca de tela', 100, 100, 200, 1, 4, 19);

-- --------------------------------------------------------

--
-- Estrutura da tabela `statu`
--

CREATE TABLE `statu` (
  `id_status` int(11) NOT NULL,
  `nome_status` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `statu`
--

INSERT INTO `statu` (`id_status`, `nome_status`) VALUES
(1, 'Aberto'),
(2, 'Concluído');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnico`
--

CREATE TABLE `tecnico` (
  `id_tecnico` int(11) NOT NULL,
  `nome_tecnico` varchar(255) DEFAULT NULL,
  `telefone_tecnico` varchar(17) DEFAULT NULL,
  `endereco_id_endereco` int(11) NOT NULL,
  `login_id_login` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tecnico`
--

INSERT INTO `tecnico` (`id_tecnico`, `nome_tecnico`, `telefone_tecnico`, `endereco_id_endereco`, `login_id_login`) VALUES
(4, 'marta silva', '001', 33, 20);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`),
  ADD KEY `fk_cliente_endereco_idx` (`endereco_id_endereco`),
  ADD KEY `fk_cliente_login1_idx` (`login_id_login`);

--
-- Índices para tabela `cliente_eletronico`
--
ALTER TABLE `cliente_eletronico`
  ADD PRIMARY KEY (`cliente_id_cliente`,`eletronico_id_eletronico`),
  ADD KEY `fk_cliente_has_eletronico_eletronico1_idx` (`eletronico_id_eletronico`),
  ADD KEY `fk_cliente_has_eletronico_cliente1_idx` (`cliente_id_cliente`);

--
-- Índices para tabela `controle`
--
ALTER TABLE `controle`
  ADD PRIMARY KEY (`id_controle`);

--
-- Índices para tabela `eletronico`
--
ALTER TABLE `eletronico`
  ADD PRIMARY KEY (`id_eletronico`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id_endereco`);

--
-- Índices para tabela `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`),
  ADD UNIQUE KEY `email_usuario_UNIQUE` (`email_usuario`),
  ADD KEY `fk_controle_login_idx` (`controle_id_controle`);

--
-- Índices para tabela `reparo`
--
ALTER TABLE `reparo`
  ADD PRIMARY KEY (`id_reparo`),
  ADD KEY `fk_reparo_eletronico1_idx` (`eletronico_id_eletronico`),
  ADD KEY `fk_reparo_status1_idx` (`status_id_status`),
  ADD KEY `fk_reparo_tecnico1_idx` (`tecnico_id_tecnico`);

--
-- Índices para tabela `statu`
--
ALTER TABLE `statu`
  ADD PRIMARY KEY (`id_status`);

--
-- Índices para tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD PRIMARY KEY (`id_tecnico`),
  ADD KEY `fk_tecnico_endereco1_idx` (`endereco_id_endereco`),
  ADD KEY `fk_tecnico_login1_idx` (`login_id_login`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `controle`
--
ALTER TABLE `controle`
  MODIFY `id_controle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `eletronico`
--
ALTER TABLE `eletronico`
  MODIFY `id_eletronico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
