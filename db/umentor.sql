-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Tempo de geração: 06-Out-2023 às 02:24
-- Versão do servidor: 10.9.3-MariaDB
-- versão do PHP: 8.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `umentor`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `cadastros`
--

CREATE TABLE `cadastros` (
  `id` int(11) NOT NULL,
  `nome` varchar(200) NOT NULL,
  `email` varchar(100) NOT NULL,
  `dataadm` date NOT NULL,
  `datahcad` datetime NOT NULL,
  `datahupdt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresas`
--

CREATE TABLE `empresas` (
  `id_empresa` int(11) NOT NULL,
  `id_master` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `razaosocial` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `telefone` varchar(20) NOT NULL,
  `aceita_email` varchar(11) NOT NULL,
  `aceita_wats` varchar(11) NOT NULL,
  `acita_ligacao` varchar(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_projeto` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `wiki_menu` int(11) DEFAULT NULL,
  `id_wiki_sub_menu` int(11) DEFAULT NULL,
  `id_wiki_document` int(11) DEFAULT NULL,
  `qtd_projetos` int(11) NOT NULL,
  `qtd_usuarios` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nomeperfil` varchar(50) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projetos`
--

CREATE TABLE `projetos` (
  `id_projeto` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nome` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `status` varchar(10) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `criado_em` datetime NOT NULL DEFAULT current_timestamp(),
  `cliente` varchar(100) DEFAULT NULL,
  `responsavel` varchar(200) DEFAULT NULL,
  `membros` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tasks`
--

CREATE TABLE `tasks` (
  `id_task` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_projeto` int(11) NOT NULL,
  `id_user` text DEFAULT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` text NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_empresa` int(11) DEFAULT NULL,
  `id_projeto` int(11) DEFAULT NULL,
  `id_perfil` int(11) DEFAULT NULL,
  `login` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `nome` varchar(150) NOT NULL,
  `status` varchar(10) NOT NULL,
  `recebe_mail` int(11) DEFAULT NULL,
  `cadastrado_em` date DEFAULT NULL,
  `ultimoacesso` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_empresa`, `id_projeto`, `id_perfil`, `login`, `senha`, `nome`, `status`, `recebe_mail`, `cadastrado_em`, `ultimoacesso`) VALUES
(1, NULL, NULL, NULL, 'dreslei.g@umentor.com.br', 'MTIzNDU2', 'Administrador', 'Ativo', NULL, NULL, '2023-10-05 21:06:00');

-- --------------------------------------------------------

--
-- Estrutura da tabela `wiki_menu`
--

CREATE TABLE `wiki_menu` (
  `id_menu` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `menu` varchar(50) NOT NULL,
  `descricao` varchar(200) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `wiki_submenu`
--

CREATE TABLE `wiki_submenu` (
  `id_submenu` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `documento` longtext NOT NULL,
  `status` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `cadastros`
--
ALTER TABLE `cadastros`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `id_master` (`id_master`);

--
-- Índices para tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices para tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices para tabela `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices para tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_projeto` (`id_projeto`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices para tabela `wiki_menu`
--
ALTER TABLE `wiki_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_projeto` (`id_empresa`);

--
-- Índices para tabela `wiki_submenu`
--
ALTER TABLE `wiki_submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `cadastros`
--
ALTER TABLE `cadastros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `wiki_menu`
--
ALTER TABLE `wiki_menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `wiki_submenu`
--
ALTER TABLE `wiki_submenu`
  MODIFY `id_submenu` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
