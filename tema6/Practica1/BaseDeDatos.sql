CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `password` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `regalos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idUsuario` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `destinatario` varchar(45) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `estado` varchar(45) DEFAULT NULL,
  `anio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_usuarios_idx` (`idUsuario`),
  CONSTRAINT `fk_usuarios` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `enlaces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idRegalo` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `web` varchar(45) DEFAULT NULL,
  `precio` int(11) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `prioridad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`),
  KEY `fk_regalo_idx` (`idRegalo`),
  CONSTRAINT `fk_regalo` FOREIGN KEY (`idRegalo`) REFERENCES `regalos` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4;