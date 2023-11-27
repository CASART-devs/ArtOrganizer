-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 17/10/2023 às 13:28
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET
SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET
time_zone = "+00:00";


  /*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
  /*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
  /*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
  /*!40101 SET NAMES utf8mb4 */;

  --
  -- Banco de dados: `artorganizer`
  --

  CREATE
DATABASE artorganizer;

  -- --------------------------------------------------------

  --
  -- Estrutura para tabela `artigos`
  --

CREATE TABLE `artigos`
(
    `ID`              int(11) NOT NULL,
    `Titulo`          varchar(255) DEFAULT NULL,
    `Autor`           varchar(255) DEFAULT NULL,
    `Data_Publicacao` datetime     DEFAULT NULL,
    `img-previw`      varchar(100) NOT NULL,
    `artigo-caminho`  varchar(100) NOT NULL,
    `ID_Tag`          int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `artigos`
--

INSERT INTO `artigos` (`ID`, `Titulo`, `Autor`, `Data_Publicacao`, `img-previw`, `artigo-caminho`, `ID_Tag`)
VALUES (26, 'Tecnicas de estudos', 'euzinho', '2023-10-12 18:51:37', '65286a690303e.jpg', '65286a6903040.pdf', NULL);

-- --------------------------------------------------------

--
-- Estrutura para tabela `artigo_pasta`
--

CREATE TABLE `artigo_pasta`
(
    `id`        int(11) NOT NULL,
    `id_pasta`  int(11) NOT NULL,
    `id_artigo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `artigo_pasta`
--

INSERT INTO `artigo_pasta` (`id`, `id_pasta`, `id_artigo`)
VALUES (22, 38, 26);

-- --------------------------------------------------------

--
-- Estrutura para tabela `pastas`
--

CREATE TABLE `pastas`
(
    `id`         int(11) NOT NULL,
    `nome_pasta` varchar(20) NOT NULL,
    `descricao`  text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pastas`
--

INSERT INTO `pastas` (`id`, `nome_pasta`, `descricao`)
VALUES (38, 'root', 'pasta pincipal'),
       (39, 'Estudos', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pasta_user`
--

CREATE TABLE `pasta_user`
(
    `id`       int(11) NOT NULL,
    `id_user`  int(11) NOT NULL,
    `id_pasta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pasta_user`
--

INSERT INTO `pasta_user` (`id`, `id_user`, `id_pasta`)
VALUES (16, 24, 38),
       (17, 24, 39);

-- --------------------------------------------------------

--
-- Estrutura para tabela `rec_senha`
--

CREATE TABLE `rec_senha`
(
    `id`             int(11) NOT NULL,
    `token`          varchar(8) NOT NULL,
    `id_user`        int(11) NOT NULL,
    `data_expiracao` datetime   NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `tags`
--

CREATE TABLE `tags`
(
    `id`       int(11) NOT NULL,
    `nome_tag` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuarios`
--

CREATE TABLE `usuarios`
(
    `ID`            int(11) NOT NULL,
    `Nome_Usuario`  varchar(255) NOT NULL,
    `Senha`         varchar(255) NOT NULL,
    `Nome_Completo` varchar(255)  DEFAULT NULL,
    `Email`         varchar(255)  DEFAULT NULL,
    `Data_Nasc`     date         NOT NULL,
    `telefone`      int(11) DEFAULT NULL,
    `img-perfil`    varchar(1000) DEFAULT NULL,
    `permissoes` set('1','2') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `usuarios`
--

INSERT INTO `usuarios` (`ID`, `Nome_Usuario`, `Senha`, `Nome_Completo`, `Email`, `Data_Nasc`, `telefone`, `img-perfil`,
                        `permissoes`)
VALUES (24, 'Goulart', '$2y$10$MRMkbqznOSj0zSDgbk3FH.QbMojv1K67DlXuw.BLeL7NdkZwyZx82', 'Vinícius De Araujo Goulart',
        'vinil115zv@gmail.com', '2006-04-18', NULL, NULL, NULL);

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `artigos`
--
ALTER TABLE `artigos`
    ADD PRIMARY KEY (`ID`),
    ADD KEY `ID_Tag` (`ID_Tag`);

--
-- Índices de tabela `artigo_pasta`
--
ALTER TABLE `artigo_pasta`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_pasta` (`id_pasta`),
    ADD KEY `fk_artigos_artigo_pasta` (`id_artigo`);

--
-- Índices de tabela `pastas`
--
ALTER TABLE `pastas`
    ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `pasta_user`
--
ALTER TABLE `pasta_user`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_user` (`id_user`),
    ADD KEY `id_pasta` (`id_pasta`);

--
-- Índices de tabela `rec_senha`
--
ALTER TABLE `rec_senha`
    ADD PRIMARY KEY (`id`),
    ADD KEY `id_user` (`id_user`);

--
-- Índices de tabela `tags`
--
ALTER TABLE `tags`
    ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `usuarios`
--
ALTER TABLE `usuarios`
    ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `artigos`
--
ALTER TABLE `artigos`
    MODIFY `ID` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de tabela `artigo_pasta`
--
ALTER TABLE `artigo_pasta`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `pastas`
--
ALTER TABLE `pastas`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT de tabela `pasta_user`
--
ALTER TABLE `pasta_user`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `rec_senha`
--
ALTER TABLE `rec_senha`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT de tabela `tags`
--
ALTER TABLE `tags`
    MODIFY `id` int (11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `usuarios`
--
ALTER TABLE `usuarios`
    MODIFY `ID` int (11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Restrições para tabelas despejadas
--

--
-- Restrições para tabelas `artigos`
--
ALTER TABLE `artigos`
    ADD CONSTRAINT `artigos_ibfk_1` FOREIGN KEY (`ID_Tag`) REFERENCES `tags` (`id`);

--
-- Restrições para tabelas `artigo_pasta`
--
ALTER TABLE `artigo_pasta`
    ADD CONSTRAINT `artigo_pasta_ibfk_1` FOREIGN KEY (`id_pasta`) REFERENCES `pastas` (`id`),
    ADD CONSTRAINT `artigo_pasta_ibfk_2` FOREIGN KEY (`id_artigo`) REFERENCES `artigos` (`ID`),
    ADD CONSTRAINT `fk_artigos_artigo_pasta` FOREIGN KEY (`id_artigo`) REFERENCES `artigos` (`ID`) ON
DELETE
CASCADE;

  --
  -- Restrições para tabelas `pasta_user`
  --
ALTER TABLE `pasta_user`
    ADD CONSTRAINT `pasta_user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`ID`),
    ADD CONSTRAINT `pasta_user_ibfk_2` FOREIGN KEY (`id_pasta`) REFERENCES `pastas` (`id`);

--
-- Restrições para tabelas `rec_senha`
--
ALTER TABLE `rec_senha`
    ADD CONSTRAINT `rec_senha_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `usuarios` (`ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
