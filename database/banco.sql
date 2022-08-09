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
  PRIMARY KEY (`id`),
  KEY `id_estabelecimento` (`id_estabelecimento`),
  KEY `id_usuario` (`id_usuario`),
  CONSTRAINT `id_estabelecimento` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  CONSTRAINT `id_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.comanda: ~16 rows (aproximadamente)
REPLACE INTO `comanda` (`id`, `valor`, `data_comanda`, `id_estabelecimento`, `id_usuario`, `numero_mesa`, `pagamento`) VALUES
	(1, 0, '0000-00-00 00:00:00', 2, 1, 10, 1),
	(2, 0, '0000-00-00 00:00:00', 1, 1, 1, 1),
	(3, 0, '2022-08-06 15:01:16', 2, 1, 2, 1),
	(4, 0, '2022-08-06 15:02:14', 1, 1, 2, 1),
	(5, 0, '2022-08-06 15:02:37', 1, 1, 3, 1),
	(6, 0, '2022-08-06 10:04:45', 1, 1, 4, 1),
	(7, 0, '2022-08-06 13:42:13', 1, 1, 25, 1),
	(8, 0, '2022-08-06 16:05:48', 1, 1, 2, 1),
	(9, 0, '2022-08-06 16:25:12', 1, 1, 10, 1),
	(10, 0, '2022-08-07 18:20:57', 1, 1, 12, 1),
	(11, 0, '2022-08-07 21:43:16', 2, 1, 2, 1),
	(12, 0, '2022-08-07 21:50:51', 4, 1, 1, 1),
	(13, 0, '2022-08-08 16:28:38', 1, 1, 1, 1),
	(14, 0, '2022-08-08 16:39:56', 1, 1, 12, 1),
	(15, 0, '2022-08-08 21:05:23', 1, 1, 12, 1),
	(16, 0, '2022-08-09 19:52:26', 1, 1, 12, 0);

-- Copiando estrutura para tabela jglogin.estabelecimento
jgloginjgloginCREATE TABLE IF NOT EXISTS `estabelecimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.estabelecimento: ~4 rows (aproximadamente)
REPLACE INTO `estabelecimento` (`id`, `nome`, `telefone`, `endereco`, `cnpj`, `email`, `senha`) VALUES
	(1, 'Teste', '123456789', 'Endereço Teste', '123456789123456', 'teste@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
	(2, 'Buteco do Dú', '16 991889999', 'Rua Bahia, n° 123456, Centro', '1212345678900178', 'buteco_du@teste.com', 'e10adc3949ba59abbe56e057f20f883e'),
	(3, 'Teste 2', '16 99999-9999', 'Rua testeq', '16949494916518232', 'teste2@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
	(4, 'Deck Chopperia', '16 3818-7899', 'Rua Paraná, n° 123, Centro', '16.327.498/0001-66', 'deck@chopperia.com.br', 'e10adc3949ba59abbe56e057f20f883e');

-- Copiando estrutura para tabela jglogin.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  `id_estabelecimento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_estabelecimento` (`id_estabelecimento`) USING BTREE,
  CONSTRAINT `mesa_ibfk_1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela jglogin.mesa: ~2 rows (aproximadamente)
REPLACE INTO `mesa` (`id`, `quantidade`, `id_estabelecimento`) VALUES
	(4, 1, 3),
	(10, 12, 1);

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
	(16, 'Batata Frita', 'imagens/refeicoes/batata_frita.jpg', 18.99, 'Batata palito frita', 4);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.produto_comanda: ~7 rows (aproximadamente)
REPLACE INTO `produto_comanda` (`id`, `quantidade`, `valor`, `id_comanda`, `id_produto`) VALUES
	(1, 1, 3.99, 7, 5),
	(2, 3, 3.99, 7, 8),
	(3, 1, 3.99, 9, 8),
	(4, 3, 3.99, 9, 5),
	(5, 2, 15.5, 11, 2),
	(6, 2, 10, 12, 8),
	(7, 3, 3.99, 16, 5);

-- Copiando estrutura para tabela jglogin.usuario
CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `cpf` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.usuario: ~1 rows (aproximadamente)
REPLACE INTO `usuario` (`id`, `nome`, `telefone`, `endereco`, `cpf`, `email`, `senha`) VALUES
	(1, 'Luis Fernando', '16 991889999', 'Rua São Paulo, n° 123, Centro', '12345678912', 'luis@glv.com', 'e10adc3949ba59abbe56e057f20f883e');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
