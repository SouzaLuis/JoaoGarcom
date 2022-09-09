-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.22-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.0.0.6468
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela jglogin.comanda
CREATE TABLE IF NOT EXISTS `comanda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `valor` float DEFAULT NULL,
  `data_comanda` datetime DEFAULT NULL,
  `id_estabelecimento` int(11) DEFAULT NULL,
  `id_usuario` int(11) DEFAULT NULL,
  `numero_mesa` int(11) DEFAULT NULL,
  `pagamento` tinyint(4) DEFAULT NULL,
  `forma_pagamento` tinyint(4) DEFAULT NULL,
  `aguardando_garcom` tinyint(4) DEFAULT NULL,
  `pedido_confirmado` tinyint(4) DEFAULT NULL,
  `doacao` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estabelecimento` (`id_estabelecimento`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `id_estabelecimento` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=82 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.comanda: ~72 rows (aproximadamente)
REPLACE INTO `comanda` (`id`, `valor`, `data_comanda`, `id_estabelecimento`, `id_usuario`, `numero_mesa`, `pagamento`, `forma_pagamento`, `aguardando_garcom`, `pedido_confirmado`, `doacao`) VALUES
	(1, 0, '0000-00-00 00:00:00', 2, 1, 10, 1, 0, 1, 1, 0),
	(2, 0, '0000-00-00 00:00:00', 1, 1, 1, 1, 0, 1, 1, 0),
	(3, 0, '2022-08-06 15:01:16', 2, 1, 2, 1, 0, 1, 1, 0),
	(4, 0, '2022-08-06 15:02:14', 1, 1, 2, 1, 0, 1, 1, 0),
	(5, 0, '2022-08-06 15:02:37', 1, 1, 3, 1, 0, 1, 1, 0),
	(6, 0, '2022-08-06 10:04:45', 1, 1, 4, 1, 0, 1, 1, 0),
	(7, 0, '2022-08-06 13:42:13', 1, 1, 25, 1, 0, 1, 1, 0),
	(8, 0, '2022-08-06 16:05:48', 1, 1, 2, 1, 0, 1, 1, 0),
	(9, 0, '2022-08-06 16:25:12', 1, 1, 10, 1, 0, 1, 1, 0),
	(10, 0, '2022-08-07 18:20:57', 1, 1, 12, 1, 0, 1, 1, 0),
	(11, 0, '2022-08-07 21:43:16', 2, 1, 2, 1, 0, 1, 1, 0),
	(12, 0, '2022-08-07 21:50:51', 4, 1, 1, 1, 0, 1, 1, 0),
	(13, 0, '2022-08-08 16:28:38', 1, 1, 1, 1, 0, 1, 1, 0),
	(14, 0, '2022-08-08 16:39:56', 1, 1, 12, 1, 0, 1, 1, 0),
	(15, 0, '2022-08-08 21:05:23', 1, 1, 12, 1, 0, 1, 1, 0),
	(16, 0, '2022-08-09 19:52:26', 1, 1, 12, 1, 0, 1, 1, 0),
	(17, 0, '2022-08-09 20:54:48', 1, 1, 14, 1, 0, 1, 1, 0),
	(18, 0, '2022-08-09 21:25:21', 1, 1, 15, 1, 0, 1, 1, 0),
	(19, 0, '2022-08-09 21:36:10', 1, 2, 7, 1, 0, 1, 1, 0),
	(20, 0, '2022-08-11 20:29:12', 1, 1, 15, 1, 0, 1, 1, 0),
	(21, 0, '2022-08-11 20:58:01', 1, 3, 12, 1, 0, 1, 1, 0),
	(25, 0, '2022-08-11 21:39:05', 1, 4, 12, 1, 0, 1, 1, 0),
	(26, 0, '2022-08-17 18:49:50', 1, 3, 13, 1, 0, 1, 1, 0),
	(27, 0, '2022-08-17 23:16:33', 1, 4, 11, 1, 0, 1, 1, 0),
	(28, 0, '2022-08-18 19:39:18', 1, 3, 12, 1, 0, 1, 1, 0),
	(29, 0, '2022-08-18 19:57:08', 1, 3, 12, 1, 0, 1, 1, 0),
	(30, 0, '2022-08-18 19:57:53', 1, 3, 1, 1, 0, 1, 1, 0),
	(31, 0, '2022-08-18 20:01:33', 1, 4, 1, 1, 0, 1, 1, 0),
	(32, 53.94, '2022-08-19 21:07:40', 1, 3, 1, 1, 0, 1, 1, 0),
	(33, 60.48, '2022-08-19 22:04:57', 2, 3, 1, 1, 0, 1, 1, 0),
	(34, 22.98, '2022-08-19 22:08:04', 1, 3, 2, 1, 0, 1, 1, 0),
	(35, 75.98, '2022-08-19 22:10:42', 2, 3, 2, 1, 0, 1, 1, 0),
	(36, 26.97, '2022-08-19 22:13:45', 1, 3, 1, 1, 0, 1, 1, 0),
	(37, 18.99, '2022-08-19 22:15:21', 1, 3, 1, 1, 0, 1, 1, 0),
	(38, 87.93, '2022-08-19 22:17:26', 1, 3, 1, 1, 0, 1, 1, 0),
	(39, 26.97, '2022-08-19 23:23:55', 1, 3, 15, 1, 0, 1, 1, 0),
	(40, 179.85, '2022-08-19 23:24:31', 1, 4, 1, 1, 0, 1, 1, 0),
	(41, 77.88, '2022-08-19 23:33:43', 1, 1, 1, 1, 0, 1, 1, 0),
	(42, 102.93, '2022-08-19 23:34:07', 1, 4, 12, 1, 0, 1, 1, 0),
	(43, 0, '2022-08-20 14:22:16', 1, 1, 1, 1, 0, 1, 1, 0),
	(44, 72.93, '2022-08-20 14:23:22', 1, 3, 12, 1, 0, 1, 1, 0),
	(45, 0, '2022-08-20 18:02:12', 1, 1, 1, 1, 0, 1, 1, 0),
	(46, 83.94, '2022-08-20 18:03:11', 1, 1, 25, 1, 0, 1, 1, 0),
	(47, 35.91, '2022-08-22 19:43:24', 1, 3, 11, 1, 0, 1, 1, 0),
	(48, 429.6, '2022-08-22 19:57:30', 1, 1, 12, 1, 0, 1, 1, 0),
	(49, 202.83, '2022-08-22 20:08:04', 1, 1, 1, 1, 0, 1, 1, 0),
	(50, 242.73, '2022-08-22 20:10:01', 1, 1, 1, 1, 0, 1, 1, 0),
	(51, 0, '2022-08-22 21:48:36', 1, 1, 1, 1, 0, 1, 1, 0),
	(52, 136.92, '2022-08-22 21:52:49', 1, 4, 1, 1, 0, 1, 1, 0),
	(53, 31.92, '2022-08-23 20:32:25', 1, 3, 15, 1, 0, 1, 1, 0),
	(54, 37.99, '2022-08-24 20:41:56', 2, 5, 2, 1, 0, 1, 1, 0),
	(55, 87.93, '2022-08-25 19:57:31', 1, 1, 15, 1, 0, 0, 1, 0),
	(56, 11.97, '2022-08-25 20:34:35', 1, 4, 13, 1, 0, 0, 1, 0),
	(57, 0, '2022-08-25 20:35:07', 1, 5, 1, 1, 0, 0, 0, 0),
	(58, 0, '2022-08-25 20:35:32', 1, 1, 1, 1, 0, 0, 0, 0),
	(59, 0, '2022-08-25 22:03:36', 1, 1, 1, 1, 0, 0, 0, 0),
	(60, 84.9, '2022-08-25 22:04:07', 1, 1, 1, 1, 0, 0, 1, 0),
	(61, 171.87, '2022-08-25 22:23:27', 1, 1, 1, 1, 0, 0, 1, 0),
	(62, 102.93, '2022-08-25 22:26:04', 1, 1, 12, 1, 0, 0, 1, 0),
	(63, 75.96, '2022-08-25 22:32:05', 1, 1, 12, 1, 0, 0, 1, 0),
	(64, 278.41, '2022-08-25 22:46:14', 1, 1, 12, 1, 0, 1, 1, 0),
	(65, 118.96, '2022-08-25 22:52:49', 1, 1, 10, 1, 0, 1, 1, 0),
	(66, 0, '2022-08-25 22:55:57', 1, 1, NULL, 1, 0, 0, 0, 0),
	(67, 102.46, '2022-08-27 11:46:19', 1, 1, 2, 1, 0, 1, 1, 0),
	(68, 88.95, '2022-08-27 11:50:13', 1, 1, 2, 1, 0, 1, 1, 0),
	(69, 148.89, '2022-08-27 11:50:42', 1, 4, 1, 1, 0, 0, 1, 0),
	(70, 0, '2022-08-27 11:51:53', 1, 1, NULL, 1, 0, 0, 0, 0),
	(71, 0, '2022-08-27 11:52:04', 1, 1, NULL, 1, 0, 0, 0, 0),
	(72, 87.93, '2022-09-01 19:49:26', 1, 1, 10, 1, 3, 1, 1, 1),
	(73, 0, '2022-09-01 20:51:34', 1, 1, NULL, 1, NULL, 0, 0, NULL),
	(74, 206, '2022-09-01 21:30:08', 1, 1, 1, 1, 0, 1, 1, 1),
	(75, 0, '2022-09-01 21:49:47', 1, 1, NULL, 1, NULL, 0, 0, NULL),
	(76, 355.92, '2022-09-01 21:56:47', 1, 1, 1, 1, NULL, 0, 1, NULL),
	(77, 223.94, '2022-09-08 20:40:47', 1, 3, 1, 1, 2, 0, 1, 1),
	(78, 335.95, '2022-09-08 20:57:22', 1, 3, 12, 1, 0, 0, 1, 0),
	(79, 0, '2022-09-08 21:06:12', 1, 3, NULL, 1, 0, 0, 0, 0),
	(80, 31, '2022-09-08 21:07:46', 1, 3, 1, 1, 3, 1, 1, NULL),
	(81, 38.5, '2022-09-08 21:39:52', 1, 3, 1, 1, 1, 1, 1, 0);

-- Copiando estrutura para tabela jglogin.estabelecimento
CREATE TABLE IF NOT EXISTS `estabelecimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(120) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(100) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.estabelecimento: ~4 rows (aproximadamente)
REPLACE INTO `estabelecimento` (`id`, `nome`, `telefone`, `cep`, `logradouro`, `bairro`, `cidade`, `uf`, `cnpj`, `email`, `senha`) VALUES
	(1, 'Teste', '123456789', '', 'Endereço Teste', '', '', '', '123456789123456', 'teste@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
	(2, 'Buteco do Dú', '16 991889999', '', 'Rua Bahia, n° 123456, Centro', '', '', '', '1212345678900178', 'buteco_du@teste.com', 'e10adc3949ba59abbe56e057f20f883e'),
	(3, 'Teste 2', '16 99999-9999', '', 'Rua testeq', '', '', '', '16949494916518232', 'teste2@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
	(4, 'Deck Chopperia', '16 3818-7899', '', 'Rua Paraná, n° 123, Centro', '', '', '', '16.327.498/0001-66', 'deck@chopperia.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
	(5, 'Bar do Zoom', '16 3899-4455', '14640-000', 'Rua da Salvação, 153', 'Centro', 'Morro Agudo', 'SP', '12456789000131', 'bar_zoom@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
	(6, 'Bar do Tobias', '16 3899-9999', '14640-000', 'Rua da Salvação, 153', 'Centro', 'Morro Agudo', 'SP', '124567890001312', 'tobiasbar@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

-- Copiando estrutura para tabela jglogin.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  `id_estabelecimento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_estabelecimento` (`id_estabelecimento`) USING BTREE,
  CONSTRAINT `mesa_ibfk_1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela jglogin.mesa: ~2 rows (aproximadamente)
REPLACE INTO `mesa` (`id`, `quantidade`, `id_estabelecimento`) VALUES
	(4, 1, 3),
	(10, 12, 1),
	(11, 150, 4);

-- Copiando estrutura para tabela jglogin.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `preco` float NOT NULL DEFAULT 0,
  `descricao` varchar(120) NOT NULL,
  `id_estabelecimento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estabelecimento` (`id_estabelecimento`),
  CONSTRAINT `estabelecimento` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.produtos: ~6 rows (aproximadamente)
REPLACE INTO `produtos` (`id`, `nome`, `imagem`, `preco`, `descricao`, `id_estabelecimento`) VALUES
	(2, 'Falafel', 'imagens/refeicoes/falafel.jpg', 15.5, 'Deliciosos falafels recheados com queijo!', 1),
	(3, 'Pizza', 'imagens/refeicoes/pizza.jpg', 7.5, 'Escolha seu sabor preferido.', 1),
	(5, 'Coxinha', 'imagens/refeicoes/coxinha.jpg', 3.99, 'Coxinhas recheadas com frango!', 1),
	(8, 'Refrigerantes', 'imagens/refeicoes/refrigerantes.jpg', 10, 'Coca-Cola, Guaraná e Pepsi', 1),
	(9, 'Caipirinha', 'imagens/refeicoes/caipirinha.jpg', 21.5, 'Caipirinha de vodka com limão.', 1),
	(16, 'Batata Frita', 'imagens/refeicoes/batata_frita.jpg', 18.99, 'Batata palito frita', 1);

-- Copiando estrutura para tabela jglogin.produto_comanda
CREATE TABLE IF NOT EXISTS `produto_comanda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `id_comanda` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  `entregue` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=118 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.produto_comanda: ~81 rows (aproximadamente)
REPLACE INTO `produto_comanda` (`id`, `quantidade`, `valor`, `id_comanda`, `id_produto`, `entregue`) VALUES
	(1, 1, 3.99, 7, 5, 1),
	(2, 3, 3.99, 7, 8, 1),
	(3, 1, 3.99, 9, 8, 1),
	(4, 3, 3.99, 9, 5, 1),
	(5, 2, 15.5, 11, 2, 1),
	(6, 2, 10, 12, 8, 1),
	(7, 3, 3.99, 16, 5, 1),
	(10, 8, 18.99, 16, 16, 1),
	(11, 8, 18.99, 16, 16, 1),
	(12, 2, 3.99, 16, 5, 1),
	(13, 1, 3.99, 17, 5, 1),
	(14, 2, 3.99, 19, 5, 1),
	(15, 1, 18.99, 19, 16, 1),
	(16, 1, 3.99, 20, 5, 1),
	(17, 4, 18.99, 20, 16, 1),
	(18, 4, 3.99, 20, 5, 1),
	(19, 6, 18.99, 21, 16, 1),
	(20, 9, 3.99, 25, 5, 1),
	(21, 8, 3.99, 26, 5, 1),
	(22, 2, 18.99, 26, 16, 1),
	(23, 1, 3.99, 27, 5, 1),
	(24, 8, 3.99, 26, 5, 1),
	(25, 6, 3.99, 26, 5, 1),
	(26, 9, 3.99, 26, 5, 1),
	(27, 13, 51.87, 31, 5, 1),
	(28, 7, 18.99, 31, 16, 1),
	(29, 2, 37.98, 32, 16, 1),
	(30, 4, 15.96, 32, 5, 1),
	(31, 2, 13.98, 33, 3, 1),
	(32, 3, 46.5, 33, 2, 1),
	(33, 1, 3.99, 34, 5, 1),
	(34, 2, 18.99, 34, 16, 1),
	(35, 2, 31, 35, 2, 1),
	(36, 2, 13.98, 35, 3, 1),
	(37, 2, 7.98, 36, 5, 1),
	(38, 1, 18.99, 36, 16, 1),
	(39, 1, 18.99, 37, 16, 1),
	(40, 3, 11.97, 38, 5, 1),
	(41, 4, 75.96, 38, 16, 1),
	(42, 1, 18.99, 39, 16, 1),
	(43, 2, 7.98, 39, 5, 1),
	(44, 7, 27.93, 40, 5, 1),
	(45, 8, 151.92, 40, 16, 1),
	(46, 1, 18.99, 41, 16, 1),
	(47, 5, 19.95, 41, 5, 1),
	(48, 2, 7.98, 42, 5, 1),
	(49, 5, 94.95, 42, 16, 1),
	(50, 3, 56.97, 44, 16, 1),
	(51, 4, 15.96, 44, 5, 1),
	(52, 0, 7.98, 46, 5, 1),
	(56, 13, 51.87, 48, 5, 1),
	(58, 6, 23.94, 49, 5, 1),
	(59, 8, 151.92, 49, 16, 1),
	(62, 9, 35.91, 50, 5, 1),
	(64, 9, 170.91, 50, 16, 1),
	(66, 2, 37.98, 52, 16, 1),
	(67, 1, 3.99, 52, 5, 1),
	(68, 8, 31.92, 53, 5, 1),
	(70, 1, 6.99, 54, 3, 1),
	(71, 2, 31, 54, 2, 1),
	(72, 3, 11.97, 55, 5, 1),
	(73, 4, 75.96, 55, 16, 1),
	(74, 3, 11.97, 56, 5, 1),
	(75, 7, 27.93, 60, 5, 1),
	(76, 3, 56.97, 60, 16, 1),
	(77, 5, 19.95, 61, 5, 1),
	(78, 8, 151.92, 61, 16, 1),
	(79, 2, 7.98, 62, 5, 1),
	(80, 5, 94.95, 62, 16, 1),
	(82, 4, 75.96, 63, 16, 1),
	(83, 5, 77.5, 64, 2, 1),
	(84, 9, 170.91, 64, 16, 1),
	(85, 3, 30, 64, 8, 1),
	(87, 2, 43, 65, 9, 1),
	(88, 4, 75.96, 65, 16, 1),
	(89, 3, 46.5, 67, 2, 1),
	(91, 2, 7.98, 67, 5, 1),
	(92, 4, 40, 67, 8, 1),
	(93, 3, 46.5, 68, 2, 1),
	(94, 3, 22.5, 68, 3, 1),
	(95, 5, 19.95, 68, 5, 1),
	(96, 4, 15.96, 69, 5, 1),
	(97, 7, 132.93, 69, 16, 1),
	(98, 8, 60, 72, 3, 1),
	(99, 7, 27.93, 72, 5, 1),
	(100, 7, 108.5, 74, 2, 1),
	(101, 6, 45, 74, 3, 1),
	(102, 3, 22.5, 76, 3, 1),
	(103, 9, 139.5, 76, 2, 1),
	(104, 8, 31.92, 76, 5, 1),
	(105, 3, 46.5, 77, 2, 1),
	(106, 1, 7.5, 77, 3, 1),
	(107, 1, 7.5, 77, 3, 1),
	(108, 3, 11.97, 77, 5, 1),
	(109, 3, 56.97, 77, 16, 1),
	(110, 4, 86, 77, 9, 1),
	(111, 3, 46.5, 78, 2, 1),
	(112, 3, 22.5, 78, 3, 1),
	(113, 8, 172, 78, 9, 1),
	(114, 5, 94.95, 78, 16, 1),
	(115, 2, 31, 80, 2, 1),
	(116, 2, 31, 81, 2, 1),
	(117, 1, 7.5, 81, 3, 0);

-- Copiando estrutura para tabela jglogin.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `logradouro` varchar(120) NOT NULL,
  `bairro` varchar(50) NOT NULL,
  `cidade` varchar(120) NOT NULL,
  `uf` varchar(20) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.usuario: ~5 rows (aproximadamente)
REPLACE INTO `usuario` (`id`, `nome`, `telefone`, `cep`, `logradouro`, `bairro`, `cidade`, `uf`, `cpf`, `email`, `senha`) VALUES
	(1, 'Luis Fernando', '16 991889999', '', 'Rua São Paulo, n° 123, Centro', '', '', '', '12345678912', 'luis@glv.com', 'e10adc3949ba59abbe56e057f20f883e'),
	(2, 'Thiago Souza', '16 99999-1455', '', 'Rua da Saudade 135', '', '', '', '12345678999', 'thiago@fafram.com', 'e10adc3949ba59abbe56e057f20f883e'),
	(3, 'Luis Fernando Alves de Souza', '16 99161-8839', '14600-000', 'Rua José Espanha, 381', 'João Paulo II', 'São Joaquim da Barra', 'SP', '12345678912', 'luisfernando@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
	(4, 'Gabriel Farias', '16 999981563', '14600-000', 'Rua José Espanha, 381', 'João Paulo II', 'São Joaquim da Barra', 'SP', '12345678912', 'gabriel@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
	(5, 'Ana Beatriz Santana Santos', '16 999981563', '14640-000', 'Rua José Espanha, 381', 'Baixada', 'São Joaquim da Barra', 'SP', '12345678912', 'anabeatriz@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
