CREATE TABLE IF NOT EXISTS `users` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `username` VARCHAR(255) NOT NULL UNIQUE ,
  `password` VARCHAR(255) NOT NULL,
  `first_name` VARCHAR(255) NOT NULL,
  `last_name` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB
;

CREATE TABLE `categories` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(50) NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
)
  ENGINE=InnoDB
;

CREATE TABLE `tasks` (
  `id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` VARCHAR(50) NOT NULL,
  `description` TEXT NULL DEFAULT NULL,
  `location` VARCHAR(100) NULL DEFAULT NULL,
  `author_id` INT UNSIGNED NOT NULL,
  `category_id` INT UNSIGNED NOT NULL,
  `started_on` DATETIME NULL,
  `due_date` DATETIME NULL,
  PRIMARY KEY (`id`),
  INDEX `FK_tasks_users` (`author_id`),
  INDEX `FK_tasks_categories` (`category_id`),
  CONSTRAINT `FK_tasks_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  CONSTRAINT `FK_tasks_users` FOREIGN KEY (`author_id`) REFERENCES `users` (`id`)
)
  COLLATE='utf8_general_ci'
  ENGINE=InnoDB;