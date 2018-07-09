-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 24-Maio-2018 às 00:40
-- Versão do servidor: 10.1.30-MariaDB
-- PHP Version: 7.2.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bd_face`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_comentarios`
--

CREATE TABLE `tb_comentarios` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_comentario` datetime NOT NULL,
  `texto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo`
--

CREATE TABLE `tb_grupo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_posts`
--

CREATE TABLE `tb_posts` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `dt_criado` datetime NOT NULL,
  `tipo` varchar(32) NOT NULL,
  `texto` text NOT NULL,
  `url` varchar(50) DEFAULT NULL,
  `id_grupo` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_posts`
--

INSERT INTO `tb_posts` (`id`, `id_usuario`, `dt_criado`, `tipo`, `texto`, `url`, `id_grupo`) VALUES
(43, 1, '2018-05-18 19:13:33', 'foto', 'Firebase', '801753c1c82ec0672d1d943b5161e8a4.jpg', 0),
(44, 1, '2018-05-20 20:37:24', 'texto', 'Programar app Ã© muito bom', '', 0),
(45, 4, '2018-05-20 20:41:45', 'foto', 'Oceanografia Ã© uma ciÃªncia do ramo das geociÃªncias que se dedica ao estudo dos oceanos e zonas costeiras sob todos os aspectos, desde sua descriÃ§Ã£o fÃ­sica atÃ© a interpretaÃ§Ã£o dos fenÃ´meno que neles se verificam e de sua interaÃ§Ã£o com os continentes e com a atmosfera, bem como tambÃ©m no que diz respeito aos processos que atuam nestes ambientes.', '9cb2f7d36eb19974dc25e1d78be0e6bf.jpg', 0),
(46, 4, '2018-05-20 20:43:08', 'texto', 'Em oceanografia identificamos muitas coisas super interessantes e curiosas no fundo do mar, fora lindo peixes pequenos ou gigantes.', '', 0),
(47, 2, '2018-05-20 20:45:59', 'foto', 'Qual vcs mais curtem entre Dragon Ball e Sonic? Eu curtia muito quando mais novo, tudo era velocidade, logo mais conheci dragon ball e ta sendo super maneiro, os dois juntos sÃ£o demais.', '6b1fe28ea7a1aca14d1007cef9504567.jpg', 0),
(48, 2, '2018-05-20 20:48:39', 'texto', 'Estou dividido entre poderes e golpes:\r\n-Dragon Ball- kame hame ha\r\n-Street Figher- Hadow ken\r\n-Cavaleiros do zodiaco- meteoro de pegazu\r\n-Sonic - seu trovÃ£o na velocidade sÃ´nica\r\ne entre outros. Tudo Ã© poder.', '', 0),
(49, 3, '2018-05-20 20:49:53', 'texto', 'Hoje estou mais voltada para o mundo clÃ­nico, ciÃªncia hospitalar, anÃ¡lises clÃ­nicas e tudo mais. ', '', 0),
(50, 3, '2018-05-21 13:55:21', 'foto', 'No Bayer RJ indo almoÃ§ar e depois voltar pra monotonia e tÃ©dio!', '64ebd2b6655846a2c4924562b04a2464.jpg', 0),
(51, 1, '2018-05-23 17:22:55', 'foto', 'Ta com fome? Quer lanche? EntÃ£o PEÃ‡A JÃ !\r\nUse o app e encontre o restaurante prÃ³ximo e com o lanche ideal a entregar na sua casa.\r\nEntÃ£o PEÃ‡A JÃ !', 'ce614aec93dcd2932ab56836c262402c.jpg', 0),
(52, 1, '2018-05-23 17:27:15', 'foto', 'Ta com fome? Quer lanche? EntÃ£o PEÃ‡A JÃ ! Use o site e encontre o restaurante prÃ³ximo e com o lanche ideal a entregar na sua casa. EntÃ£o PEÃ‡A JÃ !\r\nhttps://pediucomprouchegou.com/', '14521b4aff33d30aca82c666ce6c7cc2.jpg', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_postslike`
--

CREATE TABLE `tb_postslike` (
  `id` int(11) NOT NULL,
  `id_post` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_postslike`
--

INSERT INTO `tb_postslike` (`id`, `id_post`, `id_usuario`) VALUES
(1, 50, 1),
(2, 47, 1),
(3, 47, 3),
(4, 43, 3),
(6, 48, 4),
(8, 48, 1),
(9, 46, 1),
(10, 45, 1),
(11, 52, 1),
(12, 51, 1),
(13, 52, 3),
(14, 51, 3),
(15, 52, 4),
(16, 51, 4);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_relacionamento`
--

CREATE TABLE `tb_relacionamento` (
  `id` int(11) NOT NULL,
  `usuario_origem` int(11) NOT NULL,
  `usuario_destino` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_relacionamento`
--

INSERT INTO `tb_relacionamento` (`id`, `usuario_origem`, `usuario_destino`, `status`) VALUES
(17, 1, 2, 1),
(18, 1, 3, 1),
(19, 4, 1, 1),
(20, 4, 2, 1),
(21, 3, 2, 1),
(22, 3, 4, 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_usuario`
--

CREATE TABLE `tb_usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `sexo` tinyint(1) NOT NULL,
  `bio` text NOT NULL,
  `senha` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_usuario`
--

INSERT INTO `tb_usuario` (`id`, `email`, `nome`, `sexo`, `bio`, `senha`) VALUES
(1, 'filipesouza2000@gmail.com', 'Filipe Souza', 1, 'Analista', '202cb962ac59075b964b07152d234b70'),
(2, 'henri@gmail.com', 'Henrique Miranda', 1, 'Cacaroto sÃ´nico', '202cb962ac59075b964b07152d234b70'),
(3, 'tchelle@gmail.com', 'Michelle Rangel', 0, 'TÃ©cnica em AnÃ¡lise Clinica', '202cb962ac59075b964b07152d234b70'),
(4, 'fernanda@gmail.com', 'Fernanda Aparecida', 0, 'GeÃ³loga', '202cb962ac59075b964b07152d234b70'),
(5, 'tiago@gmail.com', 'ThiagoGuedes', 1, 'I\'m game player on net', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_grupo`
--
ALTER TABLE `tb_grupo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_posts`
--
ALTER TABLE `tb_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_postslike`
--
ALTER TABLE `tb_postslike`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_relacionamento`
--
ALTER TABLE `tb_relacionamento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_comentarios`
--
ALTER TABLE `tb_comentarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_grupo`
--
ALTER TABLE `tb_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `tb_postslike`
--
ALTER TABLE `tb_postslike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_relacionamento`
--
ALTER TABLE `tb_relacionamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
