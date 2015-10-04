-- MySQL Workbench Forward Engineering

SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0;
SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0;
SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='TRADITIONAL,ALLOW_INVALID_DATES';

-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema application
-- -----------------------------------------------------

-- -----------------------------------------------------
-- Schema application
-- -----------------------------------------------------
CREATE SCHEMA IF NOT EXISTS `application` DEFAULT CHARACTER SET utf8 ;
USE `application` ;

-- -----------------------------------------------------
-- Table `application`.`buildings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`buildings` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `name` VARCHAR(255) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `name` (`name` ASC)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 3
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`building_levels`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`building_levels` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `building_id` INT(11) NOT NULL COMMENT '',
  `level` INT(11) NOT NULL COMMENT '',
  `gold` INT(11) NOT NULL COMMENT '',
  `food` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  INDEX `building_id` (`building_id` ASC)  COMMENT '',
  INDEX `level` (`level` ASC)  COMMENT '',
  CONSTRAINT `building_levels_ibfk_1`
    FOREIGN KEY (`building_id`)
    REFERENCES `application`.`buildings` (`id`))
ENGINE = InnoDB
AUTO_INCREMENT = 11
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`users`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`users` (
  `id` INT(11) NOT NULL AUTO_INCREMENT COMMENT '',
  `username` VARCHAR(255) NOT NULL COMMENT '',
  `password` VARCHAR(255) NOT NULL COMMENT '',
  `gold` INT(11) NOT NULL COMMENT '',
  `food` INT(11) NOT NULL COMMENT '',
  `gold_income` INT(11) NOT NULL DEFAULT '500' COMMENT '',
  `food_income` INT(11) NOT NULL DEFAULT '500' COMMENT '',
  `last_log` DATETIME NOT NULL COMMENT '',
  PRIMARY KEY (`id`)  COMMENT '',
  UNIQUE INDEX `username` (`username` ASC)  COMMENT '')
ENGINE = InnoDB
AUTO_INCREMENT = 6
DEFAULT CHARACTER SET = utf8;


-- -----------------------------------------------------
-- Table `application`.`users_buildings`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `application`.`users_buildings` (
  `user_id` INT(11) NOT NULL COMMENT '',
  `building_id` INT(11) NOT NULL COMMENT '',
  PRIMARY KEY (`user_id`, `building_id`)  COMMENT '',
  INDEX `buildings_table_idx` (`building_id` ASC)  COMMENT '',
  CONSTRAINT `buildings_table`
    FOREIGN KEY (`building_id`)
    REFERENCES `application`.`buildings` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `users_table`
    FOREIGN KEY (`user_id`)
    REFERENCES `application`.`users` (`id`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION)
ENGINE = InnoDB
DEFAULT CHARACTER SET = utf8;


SET SQL_MODE=@OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS;
