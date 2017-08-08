CREATE TABLE `phone_numbers` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`user_id` INT(11) UNSIGNED NOT NULL,
	`phone` VARCHAR(15) DEFAULT NULL,
	PRIMARY KEY (`id`)
);

CREATE TABLE `users` (
	`id` INT(11) UNSIGNED NOT NULL AUTO_INCREMENT,
	`name` VARCHAR(255) DEFAULT NULL,
	`gender` TINYINT(1) NOT NULL COMMENT '0 - не указан, 1 - мужчина, 2 - женщина.',
	`birth_date` DATE NOT NULL COMMENT 'Дата рождения.',
    PRIMARY KEY (`id`)
);

ALTER TABLE `obed`.`phone_numbers`
ADD INDEX `fk_phone_number_users_idx` (`user_id` ASC);
ALTER TABLE `obed`.`phone_numbers`
ADD CONSTRAINT `fk_phone_number_users`
  FOREIGN KEY (`user_id`)
  REFERENCES `obed`.`users` (`id`)
  ON DELETE NO ACTION
  ON UPDATE NO ACTION;

SELECT
`users`.`name`,
COUNT(`phone_numbers`.`id`)
FROM `users`
LEFT JOIN `phone_numbers` ON `users`.`id` = `phone_numbers`.`user_id`
WHERE gender = 2 AND TIMESTAMPDIFF(YEAR, birth_date, curdate()) BETWEEN 18 AND 22
GROUP BY `users`.`id`
;