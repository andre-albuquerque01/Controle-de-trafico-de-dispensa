SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `sge2`
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
(14, 'Ana', 'andrealbuquerque2001@gmail.com', '615231654789', '', 14, 20),
(15, 'maria', 'mariaalves@gmail.com', '8954654488', '', 26, 20),
(16, 'luiza', 'luizasousa@ham', '4587454654', '', 27, 20),
(17, 'martinha', 'cabeluda@ma', '61594236', '', 28, 20);

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
(14, 7),
(14, 8),
(14, 9),
(14, 10),
(14, 11),
(15, 12),
(16, 13),
(17, 14);

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
(7, 'Moto g1', 'motorola', 'a1', 'blue'),
(8, 'm3', 'lg', '6', 'pink'),
(9, 'k6', 'lenovo', '3', 'grafite'),
(10, 'j1', 'sam', '23', 'red'),
(11, 'j1', 'sam', 'a1', 'red'),
(12, 'a2', 'sam', '1a2', 'black'),
(13, 'tijolo', 'nokia', '1323', 'antigo'),
(14, 'k10', 'lg', '12', 'purple');

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
(2, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(13, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(14, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(15, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(16, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(17, '8523697410', '', 'df', 'sd', 'sd', 'sd'),
(18, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(19, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(20, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(21, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(22, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(23, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(24, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(25, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(26, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(27, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1'),
(28, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '1');

-- --------------------------------------------------------

--
-- Estrutura da tabela `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `nome_completo_login` varchar(255) DEFAULT NULL,
  `nome_loja` varchar(250) NOT NULL,
  `email_usuario` varchar(100) DEFAULT NULL,
  `senha_usuario` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `login`
--

INSERT INTO `login` (`id_login`, `nome_completo_login`, `nome_loja`, `email_usuario`, `senha_usuario`) VALUES
(20, 'Ana alves', 'magazine', 'ana@teste', '2');

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
(6, '2021-12-30', NULL, NULL, 'troca de tela', 100, 200, 300, 1, 1, 7),
(7, '2021-12-13', NULL, NULL, 'troca de tela', 100, 100, 200, 2, 1, 7),
(8, '2021-12-18', NULL, NULL, 'troca de tela', 12, 23, 35, 1, 1, 12),
(9, '2021-12-31', '2021-12-31', '2021-12-31', 'troca de bateria', 50, 1000, 1050, 1, 1, 13),
(10, '2021-12-30', '2021-12-30', '2021-12-30', 'troca de tela', 10, NULL, 10, 1, 1, 14);

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

INSERT INTO `tecnico` (`id_tecnico`, `nome_tecnico`, `telefone_tecnico`, `endereco_id_endereco`) VALUES
(1, 'luana', '4512546787', 2);

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
  ADD UNIQUE KEY `email_usuario_UNIQUE` (`email_usuario`);

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
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `eletronico`
--
ALTER TABLE `eletronico`
  MODIFY `id_eletronico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id_endereco` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de tabela `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de tabela `reparo`
--
ALTER TABLE `reparo`
  MODIFY `id_reparo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de tabela `statu`
--
ALTER TABLE `statu`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `tecnico`
--
ALTER TABLE `tecnico`
  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `cliente`
--
ALTER TABLE `cliente`
  ADD CONSTRAINT `fk_cliente_endereco` FOREIGN KEY (`endereco_id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_login1` FOREIGN KEY (`login_id_login`) REFERENCES `login` (`id_login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `cliente_eletronico`
--
ALTER TABLE `cliente_eletronico`
  ADD CONSTRAINT `fk_cliente_has_eletronico_cliente1` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_cliente_has_eletronico_eletronico1` FOREIGN KEY (`eletronico_id_eletronico`) REFERENCES `eletronico` (`id_eletronico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `reparo`
--
ALTER TABLE `reparo`
  ADD CONSTRAINT `fk_reparo_eletronico1` FOREIGN KEY (`eletronico_id_eletronico`) REFERENCES `eletronico` (`id_eletronico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reparo_status1` FOREIGN KEY (`status_id_status`) REFERENCES `statu` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_reparo_tecnico1` FOREIGN KEY (`tecnico_id_tecnico`) REFERENCES `tecnico` (`id_tecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `tecnico`
--
ALTER TABLE `tecnico`
  ADD CONSTRAINT `fk_tecnico_endereco1` FOREIGN KEY (`endereco_id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tecnico_login1` FOREIGN KEY (`login_id_login`) REFERENCES `login` (`id_login`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
