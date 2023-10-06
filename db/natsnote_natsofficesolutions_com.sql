-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 07/11/2022 às 11:56
-- Versão do servidor: 10.4.24-MariaDB-1:10.4.24+maria~stretch
-- Versão do PHP: 7.2.34-28+0~20211119.67+debian9~1.gbpf24e81

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `natsnote_natsofficesolutions_com`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `atendimento_bot`
--

CREATE TABLE `atendimento_bot` (
  `id_atend` int(11) NOT NULL,
  `telefone` varchar(30) COLLATE utf8mb4_swedish_ci NOT NULL,
  `mensagem` text COLLATE utf8mb4_swedish_ci NOT NULL,
  `data` date NOT NULL DEFAULT current_timestamp(),
  `id_empresa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_swedish_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `empresas`
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
-- Estrutura para tabela `perfil`
--

CREATE TABLE `perfil` (
  `id_perfil` int(11) NOT NULL,
  `id_empresa` int(11) NOT NULL,
  `nomeperfil` varchar(50) NOT NULL,
  `descricao` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `projetos`
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
-- Estrutura para tabela `tasks`
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
-- Estrutura para tabela `usuarios`
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
  `cadastrado_em` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura para tabela `wiki_menu`
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
-- Estrutura para tabela `wiki_submenu`
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
-- Índices de tabela `atendimento_bot`
--
ALTER TABLE `atendimento_bot`
  ADD PRIMARY KEY (`id_atend`);

--
-- Índices de tabela `empresas`
--
ALTER TABLE `empresas`
  ADD PRIMARY KEY (`id_empresa`),
  ADD KEY `id_master` (`id_master`);

--
-- Índices de tabela `perfil`
--
ALTER TABLE `perfil`
  ADD PRIMARY KEY (`id_perfil`);

--
-- Índices de tabela `projetos`
--
ALTER TABLE `projetos`
  ADD PRIMARY KEY (`id_projeto`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices de tabela `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id_task`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_projeto` (`id_projeto`),
  ADD KEY `id_perfil` (`id_perfil`),
  ADD KEY `id_empresa` (`id_empresa`);

--
-- Índices de tabela `wiki_menu`
--
ALTER TABLE `wiki_menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_projeto` (`id_empresa`);

--
-- Índices de tabela `wiki_submenu`
--
ALTER TABLE `wiki_submenu`
  ADD PRIMARY KEY (`id_submenu`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `atendimento_bot`
--
ALTER TABLE `atendimento_bot`
  MODIFY `id_atend` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `empresas`
--
ALTER TABLE `empresas`
  MODIFY `id_empresa` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `perfil`
--
ALTER TABLE `perfil`
  MODIFY `id_perfil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `projetos`
--
ALTER TABLE `projetos`
  MODIFY `id_projeto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id_task` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT;

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
