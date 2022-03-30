-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           10.4.22-MariaDB - mariadb.org binary distribution
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              11.3.0.6295
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando estrutura para tabela jglogin.estabelecimento
CREATE TABLE IF NOT EXISTS `estabelecimento` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `telefone` varchar(30) NOT NULL,
  `endereco` varchar(120) NOT NULL,
  `cnpj` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `senha` varchar(32) NOT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.estabelecimento: ~2 rows (aproximadamente)
/*!40000 ALTER TABLE `estabelecimento` DISABLE KEYS */;
INSERT IGNORE INTO `estabelecimento` (`id`, `nome`, `telefone`, `endereco`, `cnpj`, `email`, `senha`) VALUES
	(1, 'Teste', '123456789', 'Endereço Teste', '123456789123456', 'teste@teste.com.br', 'e10adc3949ba59abbe56e057f20f883e'),
	(2, 'Buteco do Du', '16 991889999', 'Rua Bahia, n° 123456, Centro', '1212345678900178', 'buteco_du@teste.com', 'e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `estabelecimento` ENABLE KEYS */;

-- Copiando estrutura para tabela jglogin.produtos
CREATE TABLE IF NOT EXISTS `produtos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(80) NOT NULL,
  `imagem` varchar(100) NOT NULL,
  `preco` float NOT NULL,
  `descricao` varchar(120) NOT NULL,
  `codigo` int(11) NOT NULL,
  `id_estabelecimento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `id_estabelecimento` (`id_estabelecimento`),
  CONSTRAINT `estabelecimento` FOREIGN KEY (`id_estabelecimento`) REFERENCES `estabelecimento` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

-- Copiando dados para a tabela jglogin.produtos: ~8 rows (aproximadamente)
/*!40000 ALTER TABLE `produtos` DISABLE KEYS */;
INSERT IGNORE INTO `produtos` (`id`, `nome`, `imagem`, `preco`, `descricao`, `codigo`, `id_estabelecimento`) VALUES
	(1, 'Hamburguer', 'imagens/refeicoes/hamburguer.jpg', 9.99, 'Pão, Hamburguer 100g, salada e fritas.', 100, 2),
	(2, 'Falafel', 'imagens/refeicoes/falafel.jpg', 15.5, 'Deliciosos falafels recheados com queijo!', 101, 2),
	(3, 'Pizza', 'imagens/refeicoes/pizza.jpg', 6.99, 'Escolha seu sabor preferido.', 102, 2),
	(4, 'Burrito', 'imagens/refeicoes/burritos.jpg', 8.99, 'Delicioso Burrito!', 103, 2),
	(5, 'Coxinha', 'imagens/refeicoes/coxinha.jpg', 3.99, 'Coxinhas recheadas com frango!', 104, 2),
	(6, 'Isca de Frango', 'imagens/refeicoes/isca_frango.jpg', 10.99, 'Deliciosas iscas de peito de frango.', 105, 2),
	(7, 'Tábua de Frios', 'imagens/refeicoes/frios.jpg', 21.99, 'Presunto e mussarela em cubinhos, azeitona e palmito picado.', 106, 2),
	(8, 'Refrigerantes', 'imagens/refeicoes/refrigerantes.jpg', 3.99, 'Coca-Cola, Guaraná e Pepsi', 110, 2);
/*!40000 ALTER TABLE `produtos` ENABLE KEYS */;

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

-- Copiando dados para a tabela jglogin.usuario: ~0 rows (aproximadamente)
/*!40000 ALTER TABLE `usuario` DISABLE KEYS */;
INSERT IGNORE INTO `usuario` (`id`, `nome`, `telefone`, `endereco`, `cpf`, `email`, `senha`) VALUES
	(1, 'Luis Fernando', '16 991889999', 'Rua São Paulo, n° 123, Centro', '12345678912', 'luis@glv.com', 'e10adc3949ba59abbe56e057f20f883e');
/*!40000 ALTER TABLE `usuario` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
