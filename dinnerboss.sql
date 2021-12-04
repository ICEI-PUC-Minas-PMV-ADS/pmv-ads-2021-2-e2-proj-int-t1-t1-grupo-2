-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 30-Nov-2021 às 03:34
-- Versão do servidor: 10.4.11-MariaDB
-- versão do PHP: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `dinnerboss`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `avaliacao`
--

CREATE TABLE `avaliacao` (
  `id` int(11) NOT NULL,
  `sugestao` varchar(100) NOT NULL,
  `data` datetime NOT NULL,
  `estrela` int(11) NOT NULL,
  `data_horario_avaliacao` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estabelecimento_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cardapio`
--

CREATE TABLE `cardapio` (
  `id` int(11) NOT NULL,
  `estabelecimento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `cliente`
--

CREATE TABLE `cliente` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `email` varchar(45) NOT NULL,
  `cpf` varchar(14) NOT NULL,
  `data_nascimento` date NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto` mediumblob DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `tel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `email`, `cpf`, `data_nascimento`, `data_cadastro`, `foto`, `senha`, `usuario`, `tel`) VALUES
(81, 'Geovane Vinicius', 'geovane@hotmail.com', 'dsa', '0000-00-00', '2021-11-29 00:22:56', 0x62624242626243436363414163634242426161616143434343646464645353733332313132333535352e6a7067, '$2y$12$1m5SafARjagUyBbwluGI1ulOvGDfoMqhvuTvyC4COhy2vZcj1Zq/u', 'GeovaneVLG', NULL),
(82, 'luiz', 'luiz@hotmail.com', '140295444-05', '1999-04-29', '2021-11-29 21:59:50', 0x38303461396639336337653436313137313765383938656363313665343464612e6a7067, '$2y$12$a.gGeGE6laYYYlpGbH1Xu.4jyG1hts5fmUcv4M4/tdSMVhUaGXA7S', 'luizLG', '31992094350');

-- --------------------------------------------------------

--
-- Estrutura da tabela `empresario`
--

CREATE TABLE `empresario` (
  `id` int(11) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `cnpj` varchar(20) NOT NULL,
  `email` varchar(45) NOT NULL,
  `data_nascimento` date NOT NULL,
  `data_cadastro` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `foto` mediumblob DEFAULT NULL,
  `senha` varchar(255) NOT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `empresario`
--

INSERT INTO `empresario` (`id`, `nome`, `cnpj`, `email`, `data_nascimento`, `data_cadastro`, `foto`, `senha`, `usuario`, `tel`) VALUES
(5, 'Geovane', '18595595/0001-20', 'geo@geo.com', '1999-04-29', '2021-11-29 21:51:07', 0x66646437623963623632393363616330636266636332353535383736623432372e6a7067, '$2y$12$/7rDaqE3Mi2XRfErl.wiSeQQTYZy0ag5rmuH1hRITAl0jZXpZ.9T2', 'GeovaneVLG', '31992094350');

-- --------------------------------------------------------

--
-- Estrutura da tabela `endereco`
--

CREATE TABLE `endereco` (
  `id` int(11) NOT NULL,
  `cep` varchar(9) NOT NULL,
  `rua` varchar(45) NOT NULL,
  `numero` varchar(10) NOT NULL,
  `bairro` varchar(45) NOT NULL,
  `cidade` varchar(45) NOT NULL,
  `estado` char(2) NOT NULL,
  `estabelecimento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `estabelecimento`
--

CREATE TABLE `estabelecimento` (
  `id` int(11) NOT NULL,
  `cnpj` varchar(18) NOT NULL,
  `nome` varchar(45) NOT NULL,
  `tel` varchar(16) NOT NULL,
  `redeSocial` varchar(255) DEFAULT NULL,
  `email` varchar(100) NOT NULL,
  `logradouro` varchar(100) DEFAULT NULL,
  `bairro` varchar(50) DEFAULT NULL,
  `cidade` varchar(50) DEFAULT NULL,
  `cep` varchar(12) DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `horarioAbrir` varchar(10) DEFAULT NULL,
  `horarioFechar` varchar(10) DEFAULT NULL,
  `diasDaSemana` varchar(255) DEFAULT NULL,
  `formasDePagamento` varchar(255) DEFAULT NULL,
  `logo` mediumblob DEFAULT NULL,
  `site` varchar(255) DEFAULT NULL,
  `empresario_id` int(11) NOT NULL,
  `qtdMesa` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `estabelecimento`
--

INSERT INTO `estabelecimento` (`id`, `cnpj`, `nome`, `tel`, `redeSocial`, `email`, `logradouro`, `bairro`, `cidade`, `cep`, `estado`, `horarioAbrir`, `horarioFechar`, `diasDaSemana`, `formasDePagamento`, `logo`, `site`, `empresario_id`, `qtdMesa`) VALUES
(36, '18123456/0001-20', 'Lekinha HotDog', '(31) 99209-4350', 'fsd', 'lekinha@gmail.com', 'Rua Dalila 678', 'Regina', 'Belo Horizonte', '30692560', 'MG', '20h00', '23h30', 'Terça-feira,Quarta-feira,Quinta-feira,Sábado,', 'Dinheiro,Crédito,Débito,', 0x616161617676767676762e6a7067, 'www', 5, 0),
(37, '10.000.000/0001-00', 'Pizzaria', '31992094350', 'fsd', 'pizzaria@pizzaria.com.br', 'Aguas de Lindoia 678', 'Petropolis', 'Belo Horizonte/MG', '30692-560', 'MG', '18h30', '22h00', 'Terça-feira,Quarta-feira,Quinta-feira,Domingo,', 'Pix,Débito,', 0x616161617676767676762e6a7067, 'www', 5, 20);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `descricao` varchar(100) NOT NULL,
  `valor` decimal(5,2) NOT NULL,
  `cardapio_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `reserva`
--

CREATE TABLE `reserva` (
  `id` int(11) NOT NULL,
  `data_horario_feito_reserva` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `cliente_id` int(11) NOT NULL,
  `mesa_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `estabelecimento_id` int(11) NOT NULL,
  `horario` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone`
--

CREATE TABLE `telefone` (
  `id` int(11) NOT NULL,
  `numero` varchar(17) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `telefone`
--

INSERT INTO `telefone` (`id`, `numero`) VALUES
(1, '33825658');

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_cliente`
--

CREATE TABLE `telefone_cliente` (
  `telefone_id` int(11) NOT NULL,
  `cliente_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_empresario`
--

CREATE TABLE `telefone_empresario` (
  `telefone_id` int(11) NOT NULL,
  `empresario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `telefone_estabelecimento`
--

CREATE TABLE `telefone_estabelecimento` (
  `telefone_id` int(11) NOT NULL,
  `estabelecimento_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estabelecimento_id` (`estabelecimento_id`),
  ADD KEY `cliente_id` (`cliente_id`);

--
-- Índices para tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estabelecimento_id` (`estabelecimento_id`);

--
-- Índices para tabela `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `empresario`
--
ALTER TABLE `empresario`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `endereco`
--
ALTER TABLE `endereco`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estabelecimento_id` (`estabelecimento_id`);

--
-- Índices para tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `produto`
--
ALTER TABLE `produto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `cardapio_id` (`cardapio_id`);

--
-- Índices para tabela `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `telefone`
--
ALTER TABLE `telefone`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `telefone_cliente`
--
ALTER TABLE `telefone_cliente`
  ADD KEY `cliente_id` (`cliente_id`),
  ADD KEY `telefone_id` (`telefone_id`);

--
-- Índices para tabela `telefone_empresario`
--
ALTER TABLE `telefone_empresario`
  ADD KEY `empresario_id` (`empresario_id`),
  ADD KEY `telefone_id` (`telefone_id`);

--
-- Índices para tabela `telefone_estabelecimento`
--
ALTER TABLE `telefone_estabelecimento`
  ADD KEY `estabelecimento_id` (`estabelecimento_id`),
  ADD KEY `telefone_id` (`telefone_id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cardapio`
--
ALTER TABLE `cardapio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT de tabela `empresario`
--
ALTER TABLE `empresario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `endereco`
--
ALTER TABLE `endereco`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `estabelecimento`
--
ALTER TABLE `estabelecimento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de tabela `produto`
--
ALTER TABLE `produto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de tabela `reserva`
--
ALTER TABLE `reserva`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de tabela `telefone`
--
ALTER TABLE `telefone`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `avaliacao`
--
ALTER TABLE `avaliacao`
  ADD CONSTRAINT `avaliacao_ibfk_1` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimento` (`id`),
  ADD CONSTRAINT `avaliacao_ibfk_2` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`);

--
-- Limitadores para a tabela `cardapio`
--
ALTER TABLE `cardapio`
  ADD CONSTRAINT `cardapio_ibfk_1` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimento` (`id`);

--
-- Limitadores para a tabela `endereco`
--
ALTER TABLE `endereco`
  ADD CONSTRAINT `endereco_ibfk_1` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimento` (`id`);

--
-- Limitadores para a tabela `produto`
--
ALTER TABLE `produto`
  ADD CONSTRAINT `produto_ibfk_1` FOREIGN KEY (`cardapio_id`) REFERENCES `cardapio` (`id`);

--
-- Limitadores para a tabela `telefone_cliente`
--
ALTER TABLE `telefone_cliente`
  ADD CONSTRAINT `telefone_cliente_ibfk_1` FOREIGN KEY (`cliente_id`) REFERENCES `cliente` (`id`),
  ADD CONSTRAINT `telefone_cliente_ibfk_2` FOREIGN KEY (`telefone_id`) REFERENCES `telefone` (`id`);

--
-- Limitadores para a tabela `telefone_empresario`
--
ALTER TABLE `telefone_empresario`
  ADD CONSTRAINT `telefone_empresario_ibfk_1` FOREIGN KEY (`empresario_id`) REFERENCES `empresario` (`id`),
  ADD CONSTRAINT `telefone_empresario_ibfk_2` FOREIGN KEY (`telefone_id`) REFERENCES `telefone` (`id`);

--
-- Limitadores para a tabela `telefone_estabelecimento`
--
ALTER TABLE `telefone_estabelecimento`
  ADD CONSTRAINT `telefone_estabelecimento_ibfk_1` FOREIGN KEY (`estabelecimento_id`) REFERENCES `estabelecimento` (`id`),
  ADD CONSTRAINT `telefone_estabelecimento_ibfk_2` FOREIGN KEY (`telefone_id`) REFERENCES `telefone` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
