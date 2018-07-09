-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 26-Maio-2018 às 02:37
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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

--
-- Extraindo dados da tabela `tb_comentarios`
--

INSERT INTO `tb_comentarios` (`id`, `id_post`, `id_usuario`, `dt_comentario`, `texto`) VALUES
(1, 50, 1, '2018-05-24 20:58:59', 'Carinha de sono! Dormir entÃ£o Ã© monÃ³tono!? kkk'),
(2, 45, 1, '2018-05-24 21:09:30', 'Eles te jogam no fundo pelo cabo !?'),
(4, 50, 1, '2018-05-25 03:27:33', 'Por falar em dormir, ta na minha hora, fui!'),
(13, 51, 5, '2018-05-25 13:54:22', 'Falta os restaurantes atualizarem os produtos'),
(14, 61, 7, '2018-05-25 21:21:51', 'Eu curtindo a sombra da noite e vc me arroizano kkkk'),
(15, 61, 6, '2018-05-25 21:24:34', 'Mas eu prefiro em cima onde eu tava, vento gostoso.'),
(16, 61, 1, '2018-05-25 21:26:04', 'Vcs ficam dormindo o dia todo, estavam acordando pra depois mais anoite enfernizarem a casa.'),
(17, 63, 7, '2018-05-25 21:29:04', 'Vc quer Ã© aproveitar seu bobo barrigudo.'),
(18, 63, 3, '2018-05-25 21:30:12', 'Depois de enrolarem na cama, me unharem ta na hora da minha massagem tbm, vem Filipe.'),
(19, 63, 1, '2018-05-25 21:31:43', 'Deixa eu levar eles pra suas camas, vc ja ta quase dormindo vou dormir tbm.');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tb_grupo`
--

CREATE TABLE `tb_grupo` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tb_grupo`
--

INSERT INTO `tb_grupo` (`id`, `id_usuario`, `titulo`) VALUES
(2, 1, 'Sistemas'),
(3, 1, 'Metal');

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
(52, 1, '2018-05-23 17:27:15', 'foto', 'Ta com fome? Quer lanche? EntÃ£o PEÃ‡A JÃ ! Use o site e encontre o restaurante prÃ³ximo e com o lanche ideal a entregar na sua casa. EntÃ£o PEÃ‡A JÃ !\r\nhttps://pediucomprouchegou.com/', '14521b4aff33d30aca82c666ce6c7cc2.jpg', 0),
(61, 7, '2018-05-25 21:21:15', 'foto', 'Olha nÃ³is aÃ­ Dimmi curtindo o clima !', '9b2478ee5ff20e06cb77c690283bde56.jpg', 0),
(63, 6, '2018-05-25 21:27:44', 'foto', 'A cama ta quentinha e boa pra massagem.', 'ee1b3b6f3377eca7bafe2d84be14abc0.jpg', 0),
(64, 4, '2018-05-25 21:34:06', 'foto', 'Eu e BÃ¡rbara nos encontramos e curtimos o clima do oceano.', '8b43a357fb7ee878b89350f9324a3525.jpg', 0);

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
(16, 51, 4),
(17, 50, 1),
(18, 52, 5),
(19, 51, 5),
(20, 44, 5),
(21, 43, 5),
(22, 61, 6),
(23, 50, 6),
(24, 61, 1),
(25, 63, 7),
(26, 63, 3),
(27, 63, 1),
(28, 64, 1),
(29, 64, 2);

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
(26, 5, 1, 1),
(27, 4, 3, 0),
(28, 6, 3, 1),
(29, 6, 2, 0),
(30, 7, 1, 1),
(31, 7, 3, 1),
(32, 6, 7, 1),
(33, 4, 7, 0),
(34, 6, 1, 1),
(35, 4, 6, 0);

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
(5, 'tiago@gmail.com', 'ThiagoGuedes', 1, 'I''m game player on net', '202cb962ac59075b964b07152d234b70'),
(6, 'dimmi@gmail.com', 'Dimmi Newton', 1, '', '202cb962ac59075b964b07152d234b70'),
(7, 'shita@gmail.com', 'Shitara Thunder Cat', 0, '', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario_grupo`
--

CREATE TABLE `usuario_grupo` (
  `id_usuario` int(11) NOT NULL,
  `id_grupo` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `nivel` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuario_grupo`
--

INSERT INTO `usuario_grupo` (`id_usuario`, `id_grupo`, `status`, `nivel`) VALUES
(1, 2, 1, 1),
(1, 3, 1, 1);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `tb_grupo`
--
ALTER TABLE `tb_grupo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tb_posts`
--
ALTER TABLE `tb_posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;
--
-- AUTO_INCREMENT for table `tb_postslike`
--
ALTER TABLE `tb_postslike`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT for table `tb_relacionamento`
--
ALTER TABLE `tb_relacionamento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
--
-- AUTO_INCREMENT for table `tb_usuario`
--
ALTER TABLE `tb_usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
