
# This is a fix for InnoDB in MySQL >= 4.1.x
# It "suspends judgement" for fkey relationships until are tables are set.
SET FOREIGN_KEY_CHECKS = 0;

-- ---------------------------------------------------------------------
-- autenticacao
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `autenticacao`;

CREATE TABLE `autenticacao`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `concentrador` VARCHAR(45),
    `inicio` VARCHAR(45),
    `termino` VARCHAR(45),
    `trafegoupload` FLOAT,
    `trafegodownload` FLOAT,
    `movitodesconexao` VARCHAR(45),
    `ipconexao` VARCHAR(15),
    `ipconcentrador` VARCHAR(15),
    `ipv6` VARCHAR(40),
    `mac` VARCHAR(17),
    `cliente_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `cliente_id` (`cliente_id`),
    CONSTRAINT `autenticacao_ibfk_1`
        FOREIGN KEY (`cliente_id`)
        REFERENCES `cliente` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- cliente
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `cliente`;

CREATE TABLE `cliente`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `nome` VARCHAR(60) NOT NULL,
    `documento` VARCHAR(30),
    `endereco` VARCHAR(120),
    `cidade` VARCHAR(30),
    `ip` VARCHAR(15),
    `concentrador` VARCHAR(45),
    `vlan` INTEGER,
    `pppoe` VARCHAR(45) NOT NULL,
    `senha` VARCHAR(45),
    `stcontrato` VARCHAR(45),
    `servico` VARCHAR(45),
    `velocidade` VARCHAR(45),
    `status` VARCHAR(45),
    `anotacoes` VARCHAR(500),
    `macroteador` VARCHAR(45),
    `maconu` VARCHAR(45),
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- log
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `log`;

CREATE TABLE `log`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `data` VARCHAR(45),
    `log` VARCHAR(250),
    `cliente_id` INTEGER,
    PRIMARY KEY (`id`),
    INDEX `cliente_id` (`cliente_id`),
    CONSTRAINT `log_ibfk_1`
        FOREIGN KEY (`cliente_id`)
        REFERENCES `cliente` (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- onu
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `onu`;

CREATE TABLE `onu`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `mac` TEXT NOT NULL,
    `olt` INTEGER NOT NULL,
    `slot` INTEGER NOT NULL,
    `pon` INTEGER NOT NULL,
    `onu` INTEGER NOT NULL,
    `modelo` TEXT,
    `nome` TEXT,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

-- ---------------------------------------------------------------------
-- usuario
-- ---------------------------------------------------------------------

DROP TABLE IF EXISTS `usuario`;

CREATE TABLE `usuario`
(
    `id` INTEGER NOT NULL AUTO_INCREMENT,
    `login` VARCHAR(45) NOT NULL,
    `senha` VARCHAR(32) NOT NULL,
    `permissao` INTEGER,
    PRIMARY KEY (`id`)
) ENGINE=InnoDB;

# This restores the fkey checks, after having unset them earlier
SET FOREIGN_KEY_CHECKS = 1;
