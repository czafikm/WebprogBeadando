CREATE TABLE `webprog_beadando`.`users` (
	
 `id` INT NOT NULL AUTO_INCREMENT ,
 `first_name` VARCHAR(200) NOT NULL ,
 `last_name` VARCHAR(200) NOT NULL ,
 `username` VARCHAR(24) NOT NULL ,
 `email` VARCHAR(200) NOT NULL ,
 `password` VARCHAR(200) NOT NULL ,

PRIMARY KEY (`id`)) ENGINE = InnoDB;
