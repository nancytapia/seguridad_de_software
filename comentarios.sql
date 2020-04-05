CREATE TABLE IF NOT EXISTS comentarios (
  id_comentario int(11) NOT NULL AUTO_INCREMENT,
  usuario varchar(50) NOT NULL,
  titulo varchar(100) NOT NULL,
  comentario text NOT NULL,
  PRIMARY KEY (id_comentario)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
