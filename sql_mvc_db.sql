-- MySQL Script generated by MySQL Workbench
-- Fri Oct 11 16:52:56 2019
-- Model: New Model    Version: 1.0
-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';

-- -----------------------------------------------------
-- Schema mvc_bd
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema mvc_bd
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `mvc_bd` DEFAULT CHARACTER SET utf8 ;
USE `mvc_bd` ;

-- -----------------------------------------------------
-- Table `mvc_bd`.`tipo_documento`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`tipo_documento` (
  `id` VARCHAR(10) NOT NULL,
  `descripcion` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc_bd`.`aprendiz`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`aprendiz` (
  `documento` VARCHAR(20) NOT NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `fecha_exp_documento` DATE NOT NULL,
  `lugar_exp_documento` VARCHAR(255) NOT NULL,
  `fecha_nacimiento` DATE NOT NULL,
  `lugar_nacimiento` VARCHAR(255) NOT NULL,
  `direccion` VARCHAR(100) NOT NULL,
  `celular` VARCHAR(15) NOT NULL,
  `whatapps` TINYINT NOT NULL DEFAULT 0,
  `eps` VARCHAR(45) NOT NULL,
  `rh` VARCHAR(5) NOT NULL,
  `acudiente` VARCHAR(90) NOT NULL,
  `celular_acudiente` VARCHAR(15) NOT NULL,
  `tipo_documento_id` VARCHAR(10) NOT NULL,
  `estilos_aprendizaje` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`documento`, `tipo_documento_id`),
  INDEX `fk_aprendiz_tipo_documento1_idx` (`tipo_documento_id` ASC) ,
  CONSTRAINT `fk_aprendiz_tipo_documento1`
    FOREIGN KEY (`tipo_documento_id`)
    REFERENCES `mvc_bd`.`tipo_documento` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc_bd`.`instructor`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`instructor` (
  `documento` VARCHAR(20) NOT NULL,
  `nombres` VARCHAR(45) NOT NULL,
  `apellidos` VARCHAR(45) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `celular` VARCHAR(15) NOT NULL,
  `whatapps` TINYINT NOT NULL DEFAULT 0,
  PRIMARY KEY (`documento`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc_bd`.`ficha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`ficha` (
  `nroficha` VARCHAR(10) NOT NULL,
  `programa` VARCHAR(45) NULL,
  `fecha_ingreso` DATE NULL,
  `fecha_fin_lectiva` DATE NULL,
  `fecha_fin_practica` DATE NULL,
  PRIMARY KEY (`nroficha`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc_bd`.`sesion`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`sesion` (
  `jornada` VARCHAR(15) NOT NULL,
  `horas_directas` INT NOT NULL,
  `horas_autonomas` INT NOT NULL,
  PRIMARY KEY (`jornada`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc_bd`.`resultado_aprendizaje`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`resultado_aprendizaje` (
  `id` INT NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `horas_directas` INT NOT NULL,
  `instructor_documento` VARCHAR(20) NOT NULL,
  PRIMARY KEY (`id`, `instructor_documento`),
  INDEX `fk_resultado_aprendizaje_instructor1_idx` (`instructor_documento` ASC) ,
  CONSTRAINT `fk_resultado_aprendizaje_instructor1`
    FOREIGN KEY (`instructor_documento`)
    REFERENCES `mvc_bd`.`instructor` (`documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc_bd`.`evidencias`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`evidencias` (
  `id` INT NOT NULL,
  `numeracion` VARCHAR(45) NOT NULL,
  `nombre` VARCHAR(45) NOT NULL,
  `producto` TINYINT NULL,
  `desempenyo` TINYINT NULL,
  `conocimiento` TINYINT NULL,
  `fecha_inicio` DATE NULL,
  `fecha_fin` DATE NULL,
  `fecha_concertada` DATE NULL,
  `resultado_aprendizaje_id` INT NOT NULL,
  PRIMARY KEY (`id`, `resultado_aprendizaje_id`),
  INDEX `fk_evidencias_resultado_aprendizaje1_idx` (`resultado_aprendizaje_id` ASC) ,
  CONSTRAINT `fk_evidencias_resultado_aprendizaje1`
    FOREIGN KEY (`resultado_aprendizaje_id`)
    REFERENCES `mvc_bd`.`resultado_aprendizaje` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc_bd`.`horario_ficha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`horario_ficha` (
  `ficha_nroficha` VARCHAR(10) NOT NULL,
  `instructor_documento` VARCHAR(20) NOT NULL,
  `dia` VARCHAR(15) NOT NULL,
  `sesion_jornada` VARCHAR(15) NOT NULL,
  `hora_inicio` TIME NOT NULL,
  `hora_fin` TIME NOT NULL,
  `ambiente` VARCHAR(45) NOT NULL,
  PRIMARY KEY (`ficha_nroficha`, `instructor_documento`, `sesion_jornada`),
  INDEX `fk_horario_ficha_ficha1_idx` (`ficha_nroficha` ASC) ,
  INDEX `fk_horario_ficha_instructor1_idx` (`instructor_documento` ASC) ,
  INDEX `fk_horario_ficha_sesion1_idx` (`sesion_jornada` ASC) ,
  CONSTRAINT `fk_horario_ficha_ficha1`
    FOREIGN KEY (`ficha_nroficha`)
    REFERENCES `mvc_bd`.`ficha` (`nroficha`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_ficha_instructor1`
    FOREIGN KEY (`instructor_documento`)
    REFERENCES `mvc_bd`.`instructor` (`documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_horario_ficha_sesion1`
    FOREIGN KEY (`sesion_jornada`)
    REFERENCES `mvc_bd`.`sesion` (`jornada`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc_bd`.`aprendiz_ficha`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`aprendiz_ficha` (
  `ficha_nroficha` VARCHAR(10) NOT NULL,
  `aprendiz_documento` VARCHAR(20) NOT NULL,
  `fallas` INT NULL,
  PRIMARY KEY (`ficha_nroficha`, `aprendiz_documento`),
  INDEX `fk_aprendices_ficha_aprendiz1_idx` (`aprendiz_documento` ASC) ,
  CONSTRAINT `fk_aprendices_ficha_ficha1`
    FOREIGN KEY (`ficha_nroficha`)
    REFERENCES `mvc_bd`.`ficha` (`nroficha`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_aprendices_ficha_aprendiz1`
    FOREIGN KEY (`aprendiz_documento`)
    REFERENCES `mvc_bd`.`aprendiz` (`documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc_bd`.`control_asistencia`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`control_asistencia` (
  `aprendiz_documento` VARCHAR(20) NOT NULL,
  `instructor_documento` VARCHAR(20) NOT NULL,
  `fecha` DATE NULL,
  `excusa` TINYINT NULL,
  PRIMARY KEY (`aprendiz_documento`, `instructor_documento`),
  INDEX `fk_control_asistencia_instructor1_idx` (`instructor_documento` ASC) ,
  CONSTRAINT `fk_control_asistencia_aprendiz1`
    FOREIGN KEY (`aprendiz_documento`)
    REFERENCES `mvc_bd`.`aprendiz` (`documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_control_asistencia_instructor1`
    FOREIGN KEY (`instructor_documento`)
    REFERENCES `mvc_bd`.`instructor` (`documento`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `mvc_bd`.`user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `mvc_bd`.`user` (
  `username` VARCHAR(20) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(128) NOT NULL,
  `create_time` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP);


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
