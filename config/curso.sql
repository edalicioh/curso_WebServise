-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 21/09/2020 às 11:39
-- Versão do servidor: 5.7.31-0ubuntu0.18.04.1
-- Versão do PHP: 7.2.24-0ubuntu0.18.04.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `curso`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `curso`
--

INSERT INTO `curso` (`id`, `nome`, `descricao`) VALUES
(1, 'Tecnologia em Sistemas para Internet', 'O Curso Superior de Tecnologia em Sistemas para Internet tem uma duração total de 3 anos.');

-- --------------------------------------------------------

--
-- Estrutura para tabela `discipina`
--

CREATE TABLE `discipina` (
  `id` int(11) NOT NULL,
  `codigo` varchar(8) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `carga` int(11) NOT NULL,
  `ementa` text NOT NULL,
  `semestre` int(11) NOT NULL,
  `id_curso` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Fazendo dump de dados para tabela `discipina`
--

INSERT INTO `discipina` (`id`, `codigo`, `nome`, `carga`, `ementa`, `semestre`, `id_curso`) VALUES
(2, 'STB0301', 'Matemática Elementar', 60, 'Conjuntos Numéricos:  Conjunto dos números Naturais; Conjunto dos números Inteiros; Conjunto dos números Racionais: Frações e operações com frações.', 1, 1),
(3, 'STB0302', 'Inglês Instrumental', 60, 'Conscientização do processo de leitura. Estratégias de leitura. Gramática aplicada da língua inglesa. Reconhecimento de gêneros textuais e aquisição de vocabulário. Análise textual de um gênero. Leitura intensiva de diversos gêneros textuais da área de Informática. Redação acadêmica.', 1, 1),
(4, 'STB0303', 'Introdução à Computação', 30, 'Evolução da computação (tecnologias e usos). Modelos funcionais dos computadores. Sistemas de códigos e codecs. Sistemas operacionais. Linguagens de programação. Sistemas de rede e Internet. Open Source/Free Software. O estado da arte. TI x Sustentabilidade.', 1, 1),
(5, 'STB0304', 'Introdução à Programação Web', 60, 'Infraestrutura do Ambiente Web; Páginas Estáticas e Páginas Dinâmicas; Introdução a Linguagem de Marcação HTML e suas evoluções; Folhas de Estilos (CSS); Introdução a Programação Client-Side (JavaScript); Princípios para Web Design Responsivo.', 1, 1),
(6, 'STB0305', 'Algoritmos e Técnicas de Programação', 90, 'Introdução à lógica de programação. Conceitos básicos sobre  algoritmos.  Algoritmos  Estruturados: conceitos, estruturas de controle (seqüência, seleção e repetição)entrada  e  saída,  atribuição; Operadores Básicos (Aritméticos, Relacionais e Lógicos);  Resolução  de problemas usando algoritmos; Verificação e correção de algoritmos através de testes de mesa; Implementações de algoritmos  em  uma  linguagem  de  programação.Procedimentos  e  Funções.', 1, 1);

--
-- Índices de tabelas apagadas
--

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `discipina`
--
ALTER TABLE `discipina`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_curso` (`id_curso`);

--
-- AUTO_INCREMENT de tabelas apagadas
--

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de tabela `discipina`
--
ALTER TABLE `discipina`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restrições para dumps de tabelas
--

--
-- Restrições para tabelas `discipina`
--
ALTER TABLE `discipina`
  ADD CONSTRAINT `discipina_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
