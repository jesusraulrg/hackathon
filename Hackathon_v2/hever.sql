CREATE TABLE `laboratorio` (
  `ID` INT NOT NULL AUTO_INCREMENT,
  `num_sede` VARCHAR(100) NOT NULL,
  `nombre` VARCHAR(50) NOT NULL,
  `certificacion` VARCHAR(100) NOT NULL,
  `numeroext` VARCHAR(100) NOT NULL,
  `calle` VARCHAR(50) NOT NULL,
  `colonia` VARCHAR(50) NOT NULL,
  `municipio` VARCHAR(50) NOT NULL,
  `cp` VARCHAR(50) NOT NULL,
  `estado` VARCHAR(50) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `medicamentos` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `detalle` VARCHAR(200) NOT NULL,
  `id_laboratorio` INT NOT NULL,
  PRIMARY KEY (`id`),
  FOREIGN KEY (`id_laboratorio`) REFERENCES `laboratorio`(`ID`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

CREATE TABLE `usuarios` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `nombre` VARCHAR(200) NOT NULL,
  `correo` VARCHAR(200) NOT NULL,
  `contra` VARCHAR(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
