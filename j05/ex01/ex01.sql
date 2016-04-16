CREATE TABLE `mfroehly`.`ft_table`(
  `id` INT NOT NULL AUTO_INCREMENT,
  `login` VARCHAR(8) NOT NULL DEFAULT 'pnomdefa',
  `groupe` ENUM('staff', 'student', 'other') NOT NULL,
  `date_de_creation` DATE NOT NULL,
  PRIMARY KEY(`id`)
) ENGINE = InnoDB;
