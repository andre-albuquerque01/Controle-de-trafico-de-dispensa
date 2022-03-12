
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
	-- Despejando dados para a tabela `cliente`
	--

	INSERT INTO `cliente` (`id_cliente`, `nome_completo`, `email_cliente`, `telefone_celular`, `telefone_contato`, `endereco_id_endereco`, `login_id_login`) VALUES
	(20, 'Vitoria\'', '003', '002', '', 34, 20),
	(21, 'Corrida', '001@001', '001', '', 35, 20),
	(22, 'Aline mendes ', 'andrealbuquerque2001@gmail.com', '61985261944', '', 36, 20);

	-- --------------------------------------------------------

	--
	-- Estrutura para tabela `cliente_eletronico`
	--

	CREATE TABLE `cliente_eletronico` (
	  `cliente_id_cliente` int(11) NOT NULL,
	  `eletronico_id_eletronico` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

	--
	-- Despejando dados para a tabela `cliente_eletronico`
	--

	INSERT INTO `cliente_eletronico` (`cliente_id_cliente`, `eletronico_id_eletronico`) VALUES
	(20, 17),
	(21, 18),
	(22, 19);

	-- --------------------------------------------------------

	--
	-- Estrutura para tabela `eletronico`
	--

	CREATE TABLE `eletronico` (
	  `id_eletronico` int(11) NOT NULL,
	  `modelo` varchar(255) DEFAULT NULL,
	  `marca` varchar(255) DEFAULT NULL,
	  `numero` varchar(50) DEFAULT NULL,
	  `descricao` varchar(255) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

	--
	-- Despejando dados para a tabela `eletronico`
	--

	INSERT INTO `eletronico` (`id_eletronico`, `modelo`, `marca`, `numero`, `descricao`) VALUES
	(17, 'Moto g1', 'sam', '002', 'red'),
	(18, 'j1', 'sam', '01', 'red'),
	(19, 'j1', 'sam', 'a1', 'red');

	-- --------------------------------------------------------

	--
	-- Estrutura para tabela `endereco`
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
	-- Despejando dados para a tabela `endereco`
	--

	INSERT INTO `endereco` (`id_endereco`, `cep`, `cidade`, `uf`, `bairro`, `rua`, `complemento`) VALUES
	(33, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '001'),
	(34, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '003'),
	(35, '72316100', 'Brasília', 'AC', 'Samambaia Norte (Samambaia)', 'QR 208', '001'),
	(36, '72316100', 'Brasília', 'DF', 'Samambaia Norte (Samambaia)', 'QR 208', 'as');

	-- --------------------------------------------------------

	--
	-- Estrutura para tabela `login`
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
	-- Despejando dados para a tabela `login`
	--

	INSERT INTO `login` (`id_login`, `nome_completo_login`, `nome_loja`, `email_usuario`, `senha_usuario`) VALUES
	(20, 'André', 'magazine', 'andregonsalves2011@gmail.com', '2', '1');

	CREATE TABLE `controle` (
	  `id_controle` int(11) NOT NULL,
	  `email_controle` varchar(100) DEFAULT NULL,
	  `senha_controle` varchar(255) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

	INSERT INTO `controle` (`id_controle`, `email_controle`, `senha_controle`) VALUES
	(1, 'andregonsalves2011@gmail.com', '2');
	-- --------------------------------------------------------

	--
	-- Estrutura para tabela `reparo`
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
	-- Despejando dados para a tabela `reparo`
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
	-- Estrutura para tabela `statu`
	--

	CREATE TABLE `statu` (
	  `id_status` int(11) NOT NULL,
	  `nome_status` varchar(255) DEFAULT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

	--
	-- Despejando dados para a tabela `statu`
	--

	INSERT INTO `statu` (`id_status`, `nome_status`) VALUES
	(1, 'Aberto'),
	(2, 'Concluído');

	-- --------------------------------------------------------

	--
	-- Estrutura para tabela `tecnico`
	--

	CREATE TABLE `tecnico` (
	  `id_tecnico` int(11) NOT NULL,
	  `nome_tecnico` varchar(255) DEFAULT NULL,
	  `telefone_tecnico` varchar(17) DEFAULT NULL,
	  `endereco_id_endereco` int(11) NOT NULL,
	  `login_id_login` int(11) NOT NULL
	) ENGINE=InnoDB DEFAULT CHARSET=utf8;

	--
	-- Despejando dados para a tabela `tecnico`
	--

	INSERT INTO `tecnico` (`id_tecnico`, `nome_tecnico`, `telefone_tecnico`, `endereco_id_endereco`, `login_id_login`) VALUES
	(4, 'marta silva', '001', 33, 20);

	--
	-- Índices para tabelas despejadas
	--

	--
	-- Índices de tabela `cliente`
	--
	ALTER TABLE `cliente`
	  ADD PRIMARY KEY (`id_cliente`),
	  ADD KEY `fk_cliente_endereco_idx` (`endereco_id_endereco`),
	  ADD KEY `fk_cliente_login1_idx` (`login_id_login`);

	--
	-- Índices de tabela `cliente_eletronico`
	--
	ALTER TABLE `cliente_eletronico`
	  ADD PRIMARY KEY (`cliente_id_cliente`,`eletronico_id_eletronico`),
	  ADD KEY `fk_cliente_has_eletronico_eletronico1_idx` (`eletronico_id_eletronico`),
	  ADD KEY `fk_cliente_has_eletronico_cliente1_idx` (`cliente_id_cliente`);

	--
	-- Índices de tabela `eletronico`
	--
	ALTER TABLE `eletronico`
	  ADD PRIMARY KEY (`id_eletronico`);

	--
	-- Índices de tabela `endereco`
	--
	ALTER TABLE `endereco`
	  ADD PRIMARY KEY (`id_endereco`);

	--
	-- Índices de tabela `login`
	--
	ALTER TABLE `login`
	  ADD PRIMARY KEY (`id_login`),
	  ADD UNIQUE KEY `email_usuario_UNIQUE` (`email_usuario`),
	  ADD KEY `fk_controle_login_idx` (`controle_id_controle`);

	--
	-- Índices de tabela `reparo`
	--
	ALTER TABLE `reparo`
	  ADD PRIMARY KEY (`id_reparo`),
	  ADD KEY `fk_reparo_eletronico1_idx` (`eletronico_id_eletronico`),
	  ADD KEY `fk_reparo_status1_idx` (`status_id_status`),
	  ADD KEY `fk_reparo_tecnico1_idx` (`tecnico_id_tecnico`);

	--
	-- Índices de tabela `statu`
	--
	ALTER TABLE `statu`
	  ADD PRIMARY KEY (`id_status`);

	--
	-- Índices de tabela `tecnico`
	--
	ALTER TABLE `tecnico`
	  ADD PRIMARY KEY (`id_tecnico`),
	  ADD KEY `fk_tecnico_endereco1_idx` (`endereco_id_endereco`),
	  ADD KEY `fk_tecnico_login1_idx` (`login_id_login`);

	--
	-- AUTO_INCREMENT para tabelas despejadas
	--

	--
	-- AUTO_INCREMENT de tabela `cliente`
	--
	ALTER TABLE `cliente`
	  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
	  
	  ALTER TABLE `controle`
	  MODIFY `id_controle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

	--
	-- AUTO_INCREMENT de tabela `reparo`
	--
	ALTER TABLE `reparo`
	  MODIFY `id_reparo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

	--
	-- AUTO_INCREMENT de tabela `statu`
	--
	ALTER TABLE `statu`
	  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

	--
	-- AUTO_INCREMENT de tabela `tecnico`
	--
	ALTER TABLE `tecnico`
	  MODIFY `id_tecnico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

	--
	-- Restrições para tabelas despejadas
	--

	--
	-- Restrições para tabelas `cliente`
	--
	ALTER TABLE `cliente`
	  ADD CONSTRAINT `fk_cliente_endereco` FOREIGN KEY (`endereco_id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	  ADD CONSTRAINT `fk_cliente_login1` FOREIGN KEY (`login_id_login`) REFERENCES `login` (`id_login`) ON DELETE NO ACTION ON UPDATE NO ACTION;

	--
	-- Restrições para tabelas `cliente_eletronico`
	--
	ALTER TABLE `cliente_eletronico`
	  ADD CONSTRAINT `fk_cliente_has_eletronico_cliente1` FOREIGN KEY (`cliente_id_cliente`) REFERENCES `cliente` (`id_cliente`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	  ADD CONSTRAINT `fk_cliente_has_eletronico_eletronico1` FOREIGN KEY (`eletronico_id_eletronico`) REFERENCES `eletronico` (`id_eletronico`) ON DELETE NO ACTION ON UPDATE NO ACTION;

	--
	-- Restrições para tabelas `reparo`
	--
	ALTER TABLE `reparo`
	  ADD CONSTRAINT `fk_reparo_eletronico1` FOREIGN KEY (`eletronico_id_eletronico`) REFERENCES `eletronico` (`id_eletronico`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	  ADD CONSTRAINT `fk_reparo_status1` FOREIGN KEY (`status_id_status`) REFERENCES `statu` (`id_status`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	  ADD CONSTRAINT `fk_reparo_tecnico1` FOREIGN KEY (`tecnico_id_tecnico`) REFERENCES `tecnico` (`id_tecnico`) ON DELETE NO ACTION ON UPDATE NO ACTION;
	COMMIT;

	ALTER TABLE `tecnico`
	  ADD CONSTRAINT `fk_tecnico_endereco` FOREIGN KEY (`endereco_id_endereco`) REFERENCES `endereco` (`id_endereco`) ON DELETE NO ACTION ON UPDATE NO ACTION,
	  ADD CONSTRAINT `fk_tecnico_login1` FOREIGN KEY (`login_id_login`) REFERENCES `login` (`id_login`) ON DELETE NO ACTION ON UPDATE NO ACTION;
	  
	ALTER TABLE `tecnico`
	  ADD CONSTRAINT `fk_controle_login` FOREIGN KEY (`controle_id_controle`) REFERENCES `controle` (`id_controle`) ON DELETE NO ACTION ON UPDATE NO ACTION;
	/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
	/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
	/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
