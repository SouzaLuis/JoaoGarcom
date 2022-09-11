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
) ENGINE=InnoDB AUTO_INCREMENT=83 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.comanda: ~0 rows (aproximadamente)
DELETE FROM `comanda`;
INSERT INTO `comanda` (`id`, `valor`, `data_comanda`, `id_estabelecimento`, `id_usuario`, `numero_mesa`, `pagamento`, `forma_pagamento`, `aguardando_garcom`, `pedido_confirmado`, `doacao`) VALUES
	(82, 62.51, '2022-09-11 17:53:29', 7, 6, 3, 1, 1, 1, 1, 0);

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
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.estabelecimento: ~1 rows (aproximadamente)
DELETE FROM `estabelecimento`;
INSERT INTO `estabelecimento` (`id`, `nome`, `telefone`, `cep`, `logradouro`, `bairro`, `cidade`, `uf`, `cnpj`, `email`, `senha`) VALUES
	(7, 'Restaurante do Luis', '16 3988-1465', '14600-000', 'Rua São Paulo', 'Centro', 'São Joaquim da Barra', 'São Paulo', '10.123.456/0001-10', 'luis@restaurante.com.br', 'e10adc3949ba59abbe56e057f20f883e');

-- Copiando estrutura para tabela jglogin.mesa
CREATE TABLE IF NOT EXISTS `mesa` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quantidade` int(11) NOT NULL DEFAULT 0,
  `id_estabelecimento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE,
  KEY `id_estabelecimento` (`id_estabelecimento`) USING BTREE,
  CONSTRAINT `mesa_ibfk_1` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 ROW_FORMAT=DYNAMIC;

-- Copiando dados para a tabela jglogin.mesa: ~1 rows (aproximadamente)
DELETE FROM `mesa`;
INSERT INTO `mesa` (`id`, `quantidade`, `id_estabelecimento`) VALUES
	(12, 10, 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.produtos: ~12 rows (aproximadamente)
DELETE FROM `produtos`;
INSERT INTO `produtos` (`id`, `nome`, `imagem`, `preco`, `descricao`, `id_estabelecimento`) VALUES
	(17, 'Coca-Cola Zero Açúcar', 'imagens/refeicoes/coca_zero.png', 4.99, 'Coca-Cola zero açúcar', 7),
	(19, 'Guaraná Antártica', 'imagens/refeicoes/guarana.png', 4.99, 'Guaraná Antártica sabor original', 7),
	(20, 'Sprite', 'imagens/refeicoes/sprite.png', 4.99, 'Sprite', 7),
	(22, 'Coca Cola', 'imagens/refeicoes/coca.png', 4.99, 'Coca-Cola sabor original', 7),
	(24, 'Fanta', 'imagens/refeicoes/fanta.png', 4.99, 'Fanta sabor laranja', 7),
	(26, 'Calabresa Frita', 'imagens/refeicoes/calabresa.jpeg', 19.99, 'Calabresa cortada em rodelas frita', 7),
	(27, 'Isca de Frango', 'imagens/refeicoes/isca_frango.jpg', 27.99, 'Iscas de peito de frango empanadas e fritas', 7),
	(28, 'Frios', 'imagens/refeicoes/frios.jpg', 24.99, 'Salame, presunto e mussarela em cubinhos, palmito e azeitona', 7),
	(29, 'Hamburguer', 'imagens/refeicoes/hamburguer.jpg', 15.99, 'Pão de brioche, hambúrguer, queijo, bacon e salada', 7),
	(30, 'Falafel', 'imagens/refeicoes/falafel.jpg', 18.99, 'Bolinhos fritos de grão-de-bico', 7),
	(31, 'Fatia de Pizza', 'imagens/refeicoes/pizza.jpg', 13.55, 'Sabores: Calabresa, Presunto e Mussarela, Frango com Catupiry', 7),
	(32, 'Batata Frita', 'imagens/refeicoes/batata_frita.jpg', 25.99, 'Batata palito frita - 400g', 7);

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
) ENGINE=InnoDB AUTO_INCREMENT=123 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.produto_comanda: ~5 rows (aproximadamente)
DELETE FROM `produto_comanda`;
INSERT INTO `produto_comanda` (`id`, `quantidade`, `valor`, `id_comanda`, `id_produto`, `entregue`) VALUES
	(118, 2, 9.98, 82, 17, 1),
	(119, 1, 19.99, 82, 26, 1),
	(120, 1, 13.55, 82, 31, 1),
	(121, 1, 18.99, 82, 30, 1);

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
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.usuario: ~0 rows (aproximadamente)
DELETE FROM `usuario`;
INSERT INTO `usuario` (`id`, `nome`, `telefone`, `cep`, `logradouro`, `bairro`, `cidade`, `uf`, `cpf`, `email`, `senha`) VALUES
	(6, 'Luis Fernando Alves de Souza', '16 99161-8839', '14600-000', 'Rua José Espanha, 381', 'João Paulo II', 'São Joaquim da Barra', 'São Paulo', '12345678912', 'luisfernando@gmail.com', 'e10adc3949ba59abbe56e057f20f883e');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
