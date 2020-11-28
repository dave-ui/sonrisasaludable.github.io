SET @OLD_UNIQUE_CHECKS = @@UNIQUE_CHECKS,
  UNIQUE_CHECKS = 0;
SET @OLD_FOREIGN_KEY_CHECKS = @@FOREIGN_KEY_CHECKS,
  FOREIGN_KEY_CHECKS = 0;
SET @OLD_SQL_MODE = @@SQL_MODE,
  SQL_MODE = 'ONLY_FULL_GROUP_BY,STRICT_TRANS_TABLES,NO_ZERO_IN_DATE,NO_ZERO_DATE,ERROR_FOR_DIVISION_BY_ZERO,NO_ENGINE_SUBSTITUTION';
-- -----------------------------------------------------
-- Schema mydb
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema alfa1
-- -----------------------------------------------------
-- -----------------------------------------------------
-- Schema alfa1
-- -----------------------------------------------------
CREATE database `alfa1` DEFAULT CHARACTER SET utf8;
USE `alfa1`;
-- -----------------------------------------------------
-- Table `category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `category` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(200) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `medic`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medic` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `image` VARCHAR(50) NULL DEFAULT NULL,
  `no` VARCHAR(50) NULL DEFAULT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `lastname` VARCHAR(50) NULL DEFAULT NULL,
  `gender` VARCHAR(1) NULL DEFAULT NULL,
  `day_of_birth` DATE NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `address` VARCHAR(255) NULL DEFAULT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `password` VARCHAR(60) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  `category_id` INT(11) NULL DEFAULT NULL,
  `time1_data` TEXT NULL DEFAULT NULL,
  `time2_data` TEXT NULL DEFAULT NULL,
  `time3_data` TEXT NULL DEFAULT NULL,
  `time4_data` TEXT NULL DEFAULT NULL,
  `time5_data` TEXT NULL DEFAULT NULL,
  `time6_data` TEXT NULL DEFAULT NULL,
  `time7_data` TEXT NULL DEFAULT NULL,
  `duration` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `category_id` (`category_id` ASC) VISIBLE,
  CONSTRAINT `medic_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 2 DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `medic_category`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `medic_category` (
  `medic_id` INT(11) NOT NULL,
  `category_id` INT(11) NOT NULL,
  INDEX `medic_id` (`medic_id` ASC) VISIBLE,
  INDEX `category_id` (`category_id` ASC) VISIBLE,
  CONSTRAINT `medic_category_ibfk_1` FOREIGN KEY (`medic_id`) REFERENCES `medic` (`id`),
  CONSTRAINT `medic_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `noquirurgicas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `noquirurgicas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `nom` VARCHAR(50) NULL DEFAULT NULL,
  `lastname` VARCHAR(50) NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  `motiv` VARCHAR(255) NULL DEFAULT NULL,
  `observ` VARCHAR(255) NULL DEFAULT NULL,
  `detall` VARCHAR(255) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `pacient`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `pacient` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `no` VARCHAR(50) NULL DEFAULT NULL,
  `image` VARCHAR(50) NULL DEFAULT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `lastname` VARCHAR(50) NULL DEFAULT NULL,
  `gender` VARCHAR(1) NULL DEFAULT NULL,
  `day_of_birth` DATE NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `address` VARCHAR(255) NULL DEFAULT NULL,
  `phone` VARCHAR(255) NULL DEFAULT NULL,
  `cp` VARCHAR(255) NULL DEFAULT NULL,
  `pob` VARCHAR(255) NULL DEFAULT NULL,
  `sick` VARCHAR(500) NULL DEFAULT NULL,
  `medicaments` VARCHAR(500) NULL DEFAULT NULL,
  `password` VARCHAR(60) NULL DEFAULT NULL,
  `alergy` VARCHAR(500) NULL DEFAULT NULL,
  `is_favorite` TINYINT(1) NOT NULL DEFAULT 0,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 3 DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `payment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `payment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `quirurgicas`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `quirurgicas` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `lastname` VARCHAR(50) NULL DEFAULT NULL,
  `fecha` DATE NULL DEFAULT NULL,
  `descrip` VARCHAR(255) NULL DEFAULT NULL,
  `observ` VARCHAR(255) NULL DEFAULT NULL,
  `detall` VARCHAR(255) NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 12 DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `status`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `status` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 5 DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `user`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `user` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(5) NULL DEFAULT NULL,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  `lastname` VARCHAR(50) NULL DEFAULT NULL,
  `email` VARCHAR(255) NULL DEFAULT NULL,
  `password` VARCHAR(60) NULL DEFAULT NULL,
  `is_active` TINYINT(1) NOT NULL DEFAULT 1,
  `is_admin` TINYINT(1) NOT NULL DEFAULT 0,
  `view_reports` TINYINT(1) NOT NULL DEFAULT 1,
  `view_users` TINYINT(1) NOT NULL DEFAULT 1,
  `edit_users` TINYINT(1) NOT NULL DEFAULT 1,
  `view_pacients` TINYINT(1) NOT NULL DEFAULT 1,
  `edit_pacients` TINYINT(1) NOT NULL DEFAULT 1,
  `view_medics` TINYINT(1) NOT NULL DEFAULT 1,
  `edit_medics` TINYINT(1) NOT NULL DEFAULT 1,
  `view_reservations` TINYINT(1) NOT NULL DEFAULT 1,
  `edit_reservations` TINYINT(1) NOT NULL DEFAULT 1,
  `created_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 4 DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `reservation`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `reservation` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `no` VARCHAR(100) NULL DEFAULT NULL,
  `title` VARCHAR(100) NULL DEFAULT NULL,
  `note` TEXT NULL DEFAULT NULL,
  `message` TEXT NULL DEFAULT NULL,
  `date_at` DATE NULL DEFAULT NULL,
  `time_at` TIME NULL DEFAULT NULL,
  `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP(),
  `pacient_id` INT(11) NULL DEFAULT NULL,
  `symtoms` TEXT NULL DEFAULT NULL,
  `sick` TEXT NULL DEFAULT NULL,
  `medicaments` TEXT NULL DEFAULT NULL,
  `user_id` INT(11) NULL DEFAULT NULL,
  `medic_id` INT(11) NULL DEFAULT NULL,
  `duration` INT(11) NULL DEFAULT NULL,
  `price` DOUBLE NULL DEFAULT NULL,
  `is_web` TINYINT(1) NOT NULL DEFAULT 0,
  `payment_id` INT(11) NOT NULL DEFAULT 1,
  `status_id` INT(11) NOT NULL DEFAULT 1,
  `quirur` INT(11) NULL DEFAULT 0,
  `descrip` VARCHAR(100) NULL DEFAULT NULL,
  `observ` VARCHAR(100) NULL DEFAULT NULL,
  `detall` VARCHAR(100) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `payment_id` (`payment_id` ASC) VISIBLE,
  INDEX `status_id` (`status_id` ASC) VISIBLE,
  INDEX `user_id` (`user_id` ASC) VISIBLE,
  INDEX `pacient_id` (`pacient_id` ASC) VISIBLE,
  INDEX `medic_id` (`medic_id` ASC) VISIBLE,
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`payment_id`) REFERENCES `payment` (`id`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`),
  CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`),
  CONSTRAINT `reservation_ibfk_4` FOREIGN KEY (`pacient_id`) REFERENCES `pacient` (`id`),
  CONSTRAINT `reservation_ibfk_5` FOREIGN KEY (`medic_id`) REFERENCES `medic` (`id`)
) ENGINE = InnoDB AUTO_INCREMENT = 28 DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `schedule`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `schedule` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `start_date_at` DATE NULL DEFAULT NULL,
  `finish_date_at` DATE NULL DEFAULT NULL,
  `start_time_at` TIME NULL DEFAULT NULL,
  `finish_time_at` TIME NULL DEFAULT NULL,
  `n_repeat` INT(11) NULL DEFAULT NULL,
  `k_repeat` VARCHAR(50) NULL DEFAULT NULL,
  `kind` INT(11) NULL DEFAULT NULL,
  `medic_id` INT(11) NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `medic_id` (`medic_id` ASC) VISIBLE,
  CONSTRAINT `schedule_ibfk_1` FOREIGN KEY (`medic_id`) REFERENCES `medic` (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `signs`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `signs` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `weight` VARCHAR(255) NULL DEFAULT NULL,
  `heart_rate` VARCHAR(255) NULL DEFAULT NULL,
  `blood_pressure` VARCHAR(255) NULL DEFAULT NULL,
  `temperature` VARCHAR(255) NULL DEFAULT NULL,
  `pacient_id` INT(11) NULL DEFAULT NULL,
  `medic_id` INT(11) NULL DEFAULT NULL,
  `create_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `medic_id` (`medic_id` ASC) VISIBLE,
  INDEX `pacient_id` (`pacient_id` ASC) VISIBLE,
  CONSTRAINT `signs_ibfk_1` FOREIGN KEY (`medic_id`) REFERENCES `medic` (`id`),
  CONSTRAINT `signs_ibfk_2` FOREIGN KEY (`pacient_id`) REFERENCES `pacient` (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;
-- -----------------------------------------------------
-- Table `treatment`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `treatment` (
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(255) NULL DEFAULT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `quantity` VARCHAR(100) NULL DEFAULT NULL,
  `start_at` DATE NULL DEFAULT NULL,
  `finish_at` DATE NULL DEFAULT NULL,
  `medic_id` INT(11) NULL DEFAULT NULL,
  `pacient_id` INT(11) NULL DEFAULT NULL,
  `create_at` DATETIME NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  INDEX `pacient_id` (`pacient_id` ASC) VISIBLE,
  INDEX `medic_id` (`medic_id` ASC) VISIBLE,
  CONSTRAINT `treatment_ibfk_1` FOREIGN KEY (`pacient_id`) REFERENCES `pacient` (`id`),
  CONSTRAINT `treatment_ibfk_2` FOREIGN KEY (`medic_id`) REFERENCES `medic` (`id`)
) ENGINE = InnoDB DEFAULT CHARACTER SET = utf8;
SET SQL_MODE = @OLD_SQL_MODE;
SET FOREIGN_KEY_CHECKS = @OLD_FOREIGN_KEY_CHECKS;
SET UNIQUE_CHECKS = @OLD_UNIQUE_CHECKS;
