CREATE TABLE `universidad` (
	`id` INT(11) NOT NULL AUTO_INCREMENT,
	`nombre` VARCHAR(50) NOT NULL,
	`municipio` VARCHAR(50) NOT NULL,
	`direccion` VARCHAR(50) NOT NULL,
	`telefono` VARCHAR(50) NOT NULL,
	PRIMARY KEY (`id`)
)
COLLATE='latin1_swedish_ci'
ENGINE=InnoDB
;
