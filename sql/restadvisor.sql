SET SQL_MODE
= "NO_AUTO_VALUE_ON_ZERO";
SET time_zone
= "+01:00";

CREATE TABLE `restadvisor`.`restaurantes`
(
  `id_restaurante` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR
(75) NOT NULL,
  `localidad` VARCHAR
(75) NOT NULL,
  `direccion` VARCHAR
(100) NOT NULL,
  `cp` VARCHAR
(7) NOT NULL,
  `telefono` VARCHAR
(13) NOT NULL,
  `precio` TINYINT
(1) NOT NULL,
  `valoracion` DECIMAL NOT NULL,
  `email` VARCHAR
(75) NOT NULL,
  `web` VARCHAR
(75) NULL,
  `horario` VARCHAR
(75) NULL,
  `tipo_cocina` VARCHAR
(75) NOT NULL,
  `longitud` VARCHAR
(20) NULL,
  `latitud` VARCHAR
(20) NULL,
  `imagen_principal` VARCHAR
(75) NOT NULL,
`creacion` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY
(`id_restaurante`));

CREATE TABLE `restadvisor`.`usuarios`
(
  `id_usuario` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR
(75) NOT NULL,
  `email` VARCHAR
(100) NOT NULL,
  `pass` VARCHAR
(255) NOT NULL,
  `tipo` TINYINT
(1) NOT NULL,
  `creacion` TIMESTAMP NOT NULL,
  PRIMARY KEY
(`id_usuario`),
  UNIQUE INDEX `email_UNIQUE`
(`email` ASC));


CREATE TABLE `restadvisor`.`comentarios`
(
  `id_comentario` INT NOT NULL AUTO_INCREMENT,
  `id_restaurante` INT NOT NULL,
  `id_usuario` INT NOT NULL,
  `valoracion` TINYINT
(1) NOT NULL,
  `comentario` MEDIUMTEXT NOT NULL,
  `creacion` TIMESTAMP NOT NULL,
  PRIMARY KEY
(`id_comentario`),
  INDEX `fk_restaurante_idx`
(`id_restaurante` ASC),
  INDEX `fk_usuario_idx`
(`id_usuario` ASC),
  CONSTRAINT `fk_restaurante`
    FOREIGN KEY
(`id_restaurante`)
    REFERENCES `restadvisor`.`restaurantes`
(`id_restaurante`)
    ON
DELETE CASCADE
    ON
UPDATE CASCADE,
  CONSTRAINT `fk_usuario`
    FOREIGN KEY
(`id_usuario`)
    REFERENCES `restadvisor`.`usuarios`
(`id_usuario`)
    ON
DELETE CASCADE
    ON
UPDATE CASCADE);