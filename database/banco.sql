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
  `entregue` tinyint(4) DEFAULT NULL,
  `aguardando_garcom` tinyint(4) DEFAULT NULL,
  `pedido_confirmado` tinyint(4) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estabelecimento` (`id_estabelecimento`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `id_estabelecimento` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.comanda: ~53 rows (aproximadamente)
REPLACE INTO `comanda` (`id`, `valor`, `data_comanda`, `id_estabelecimento`, `id_usuario`, `numero_mesa`, `pagamento`, `entregue`, `aguardando_garcom`, `pedido_confirmado`) VALUES
	(1, 0, '0000-00-00 00:00:00', 2, 1, 10, 1, 1, 1, 1),
	(2, 0, '0000-00-00 00:00:00', 1, 1, 1, 1, 1, 1, 1),
	(3, 0, '2022-08-06 15:01:16', 2, 1, 2, 1, 1, 1, 1),
	(4, 0, '2022-08-06 15:02:14', 1, 1, 2, 1, 1, 1, 1),
	(5, 0, '2022-08-06 15:02:37', 1, 1, 3, 1, 1, 1, 1),
	(6, 0, '2022-08-06 10:04:45', 1, 1, 4, 1, 1, 1, 1),
	(7, 0, '2022-08-06 13:42:13', 1, 1, 25, 1, 1, 1, 1),
	(8, 0, '2022-08-06 16:05:48', 1, 1, 2, 1, 1, 1, 1),
	(9, 0, '2022-08-06 16:25:12', 1, 1, 10, 1, 1, 1, 1),
	(10, 0, '2022-08-07 18:20:57', 1, 1, 12, 1, 1, 1, 1),
	(11, 0, '2022-08-07 21:43:16', 2, 1, 2, 1, 1, 1, 1),
	(12, 0, '2022-08-07 21:50:51', 4, 1, 1, 1, 1, 1, 1),
	(13, 0, '2022-08-08 16:28:38', 1, 1, 1, 1, 1, 1, 1),
	(14, 0, '2022-08-08 16:39:56', 1, 1, 12, 1, 1, 1, 1),
	(15, 0, '2022-08-08 21:05:23', 1, 1, 12, 1, 1, 1, 1),
	(16, 0, '2022-08-09 19:52:26', 1, 1, 12, 1, 1, 1, 1),
	(17, 0, '2022-08-09 20:54:48', 1, 1, 14, 1, 1, 1, 1),
	(18, 0, '2022-08-09 21:25:21', 1, 1, 15, 1, 1, 1, 1),
	(19, 0, '2022-08-09 21:36:10', 1, 2, 7, 1, 1, 1, 1),
	(20, 0, '2022-08-11 20:29:12', 1, 1, 15, 1, 1, 1, 1),
	(21, 0, '2022-08-11 20:58:01', 1, 3, 12, 1, 1, 1, 1),
	(25, 0, '2022-08-11 21:39:05', 1, 4, 12, 1, 1, 1, 1),
	(26, 0, '2022-08-17 18:49:50', 1, 3, 13, 1, 1, 1, 1),
	(27, 0, '2022-08-17 23:16:33', 1, 4, 11, 1, 1, 1, 1),
	(28, 0, '2022-08-18 19:39:18', 1, 3, 12, 1, 1, 1, 1),
	(29, 0, '2022-08-18 19:57:08', 1, 3, 12, 1, 1, 1, 1),
	(30, 0, '2022-08-18 19:57:53', 1, 3, 1, 1, 1, 1, 1),
	(31, 0, '2022-08-18 20:01:33', 1, 4, 1, 1, 1, 1, 1),
	(32, 53.94, '2022-08-19 21:07:40', 1, 3, 1, 1, 1, 1, 1),
	(33, 60.48, '2022-08-19 22:04:57', 2, 3, 1, 1, 1, 1, 1),
	(34, 22.98, '2022-08-19 22:08:04', 1, 3, 2, 1, 1, 1, 1),
	(35, 75.98, '2022-08-19 22:10:42', 2, 3, 2, 1, 1, 1, 1),
	(36, 26.97, '2022-08-19 22:13:45', 1, 3, 1, 1, 1, 1, 1),
	(37, 18.99, '2022-08-19 22:15:21', 1, 3, 1, 1, 1, 1, 1),
	(38, 87.93, '2022-08-19 22:17:26', 1, 3, 1, 1, 1, 1, 1),
	(39, 26.97, '2022-08-19 23:23:55', 1, 3, 15, 1, 1, 1, 1),
	(40, 179.85, '2022-08-19 23:24:31', 1, 4, 1, 1, 1, 1, 1),
	(41, 77.88, '2022-08-19 23:33:43', 1, 1, 1, 1, 1, 1, 1),
	(42, 102.93, '2022-08-19 23:34:07', 1, 4, 12, 1, 1, 1, 1),
	(43, 0, '2022-08-20 14:22:16', 1, 1, 1, 1, 1, 1, 1),
	(44, 72.93, '2022-08-20 14:23:22', 1, 3, 12, 1, 1, 1, 1),
	(45, 0, '2022-08-20 18:02:12', 1, 1, 1, 1, 1, 1, 1),
	(46, 83.94, '2022-08-20 18:03:11', 1, 1, 25, 1, 1, 1, 1),
	(47, 35.91, '2022-08-22 19:43:24', 1, 3, 11, 1, 1, 1, 1),
	(48, 429.6, '2022-08-22 19:57:30', 1, 1, 12, 1, 1, 1, 1),
	(49, 202.83, '2022-08-22 20:08:04', 1, 1, 1, 1, 1, 1, 1),
	(50, 242.73, '2022-08-22 20:10:01', 1, 1, 1, 1, 1, 1, 1),
	(51, 0, '2022-08-22 21:48:36', 1, 1, 1, 1, 1, 1, 1),
	(52, 136.92, '2022-08-22 21:52:49', 1, 4, 1, 1, 1, 1, 1),
	(53, 31.92, '2022-08-23 20:32:25', 1, 3, 15, 1, 1, 1, 1),
	(54, 37.99, '2022-08-24 20:41:56', 2, 5, 2, 1, 1, 1, 1),
	(55, 87.93, '2022-08-25 19:57:31', 1, 1, 15, 1, 0, 0, 1),
	(56, 11.97, '2022-08-25 20:34:35', 1, 4, 13, 1, 0, 0, 1),
	(57, 0, '2022-08-25 20:35:07', 1, 5, 1, 1, 0, 0, 0),
	(58, 0, '2022-08-25 20:35:32', 1, 1, 1, 1, 0, 0, 0),
	(59, 0, '2022-08-25 22:03:36', 1, 1, 1, 1, 0, 0, 0),
	(60, 84.9, '2022-08-25 22:04:07', 1, 1, 1, 1, 1, 0, 1),
	(61, 171.87, '2022-08-25 22:23:27', 1, 1, 1, 1, 1, 0, 1),
	(62, 102.93, '2022-08-25 22:26:04', 1, 1, 12, 1, 1, 0, 1),
	(63, 75.96, '2022-08-25 22:32:05', 1, 1, 12, 1, 1, 0, 1);

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
	(2, 'Falafel', 'imagens/refeicoes/falafel.jpg', 15.5, 'Deliciosos falafels recheados com queijo!', 2),
	(3, 'Pizza', 'imagens/refeicoes/pizza.jpg', 6.99, 'Escolha seu sabor preferido.', 2),
	(5, 'Coxinha', 'imagens/refeicoes/coxinha.jpg', 3.99, 'Coxinhas recheadas com frango!', 1),
	(8, 'Refrigerantes', 'imagens/refeicoes/refrigerantes.jpg', 10, 'Coca-Cola, Guaraná e Pepsi', 4),
	(9, 'Caipirinha', 'imagens/refeicoes/caipirinha.jpg', 21.5, 'Caipirinha de vodka com limão.', 4),
	(16, 'Batata Frita', 'imagens/refeicoes/batata_frita.jpg', 18.99, 'Batata palito frita', 1);

-- Copiando estrutura para tabela jglogin.produto_comanda
CREATE TABLE IF NOT EXISTS `produto_comanda` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) DEFAULT NULL,
  `valor` float DEFAULT NULL,
  `id_comanda` int(11) DEFAULT NULL,
  `id_produto` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_produto` (`id_produto`),
  CONSTRAINT `id_produto` FOREIGN KEY (`id_produto`) REFERENCES `produtos` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.produto_comanda: ~57 rows (aproximadamente)
REPLACE INTO `produto_comanda` (`id`, `quantidade`, `valor`, `id_comanda`, `id_produto`) VALUES
	(1, 1, 3.99, 7, 5),
	(2, 3, 3.99, 7, 8),
	(3, 1, 3.99, 9, 8),
	(4, 3, 3.99, 9, 5),
	(5, 2, 15.5, 11, 2),
	(6, 2, 10, 12, 8),
	(7, 3, 3.99, 16, 5),
	(10, 8, 18.99, 16, 16),
	(11, 8, 18.99, 16, 16),
	(12, 2, 3.99, 16, 5),
	(13, 1, 3.99, 17, 5),
	(14, 2, 3.99, 19, 5),
	(15, 1, 18.99, 19, 16),
	(16, 1, 3.99, 20, 5),
	(17, 4, 18.99, 20, 16),
	(18, 4, 3.99, 20, 5),
	(19, 6, 18.99, 21, 16),
	(20, 9, 3.99, 25, 5),
	(21, 8, 3.99, 26, 5),
	(22, 2, 18.99, 26, 16),
	(23, 1, 3.99, 27, 5),
	(24, 8, 3.99, 26, 5),
	(25, 6, 3.99, 26, 5),
	(26, 9, 3.99, 26, 5),
	(27, 13, 51.87, 31, 5),
	(28, 7, 18.99, 31, 16),
	(29, 2, 37.98, 32, 16),
	(30, 4, 15.96, 32, 5),
	(31, 2, 13.98, 33, 3),
	(32, 3, 46.5, 33, 2),
	(33, 1, 3.99, 34, 5),
	(34, 2, 18.99, 34, 16),
	(35, 2, 31, 35, 2),
	(36, 2, 13.98, 35, 3),
	(37, 2, 7.98, 36, 5),
	(38, 1, 18.99, 36, 16),
	(39, 1, 18.99, 37, 16),
	(40, 3, 11.97, 38, 5),
	(41, 4, 75.96, 38, 16),
	(42, 1, 18.99, 39, 16),
	(43, 2, 7.98, 39, 5),
	(44, 7, 27.93, 40, 5),
	(45, 8, 151.92, 40, 16),
	(46, 1, 18.99, 41, 16),
	(47, 5, 19.95, 41, 5),
	(48, 2, 7.98, 42, 5),
	(49, 5, 94.95, 42, 16),
	(50, 3, 56.97, 44, 16),
	(51, 4, 15.96, 44, 5),
	(52, 0, 7.98, 46, 5),
	(56, 13, 51.87, 48, 5),
	(58, 6, 23.94, 49, 5),
	(59, 8, 151.92, 49, 16),
	(62, 9, 35.91, 50, 5),
	(64, 9, 170.91, 50, 16),
	(66, 2, 37.98, 52, 16),
	(67, 1, 3.99, 52, 5),
	(68, 8, 31.92, 53, 5),
	(70, 1, 6.99, 54, 3),
	(71, 2, 31, 54, 2),
	(72, 3, 11.97, 55, 5),
	(73, 4, 75.96, 55, 16),
	(74, 3, 11.97, 56, 5),
	(75, 7, 27.93, 60, 5),
	(76, 3, 56.97, 60, 16),
	(77, 5, 19.95, 61, 5),
	(78, 8, 151.92, 61, 16),
	(79, 2, 7.98, 62, 5),
	(80, 5, 94.95, 62, 16),
	(82, 4, 75.96, 63, 16);

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
