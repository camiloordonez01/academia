
USE academia;

CREATE TABLE temas (
  id INT NOT NULL AUTO_INCREMENT,
  tema VARCHAR(45) NOT NULL UNIQUE,
  categoria INT(5),
  PRIMARY KEY (id)
);
CREATE TABLE preguntas (
  id INT NOT NULL AUTO_INCREMENT,
  pregunta TEXT NULL,
  tipo INT NULL,
  temas_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_temas FOREIGN KEY (temas_id) REFERENCES temas(id) ON DELETE CASCADE
);


CREATE TABLE respuestas (
  id INT NOT NULL AUTO_INCREMENT,
  respuesta TEXT NULL,
  preguntas_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_preguntas FOREIGN KEY (preguntas_id) REFERENCES preguntas(id) ON DELETE CASCADE
);


CREATE TABLE correctas (
  id INT NOT NULL AUTO_INCREMENT,
  preguntas_id INT NOT NULL,
  respuestas_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_preguntas2 FOREIGN KEY (preguntas_id) REFERENCES preguntas(id) ON DELETE CASCADE,
  CONSTRAINT fk_respuestas FOREIGN KEY (respuestas_id) REFERENCES respuestas(id) ON DELETE CASCADE
);

CREATE TABLE resultados (
  id INT NOT NULL AUTO_INCREMENT,
  correctas INT NULL,
  incorrectas INT NULL,
  temas_id INT NOT NULL,
  users_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_temas2 FOREIGN KEY (temas_id) REFERENCES temas(id) ON DELETE CASCADE,
  CONSTRAINT fk_users FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE
);


CREATE TABLE falladas (
  id INT NOT NULL AUTO_INCREMENT,
  preguntas_id INT NOT NULL,
  users_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_preguntas3 FOREIGN KEY (preguntas_id) REFERENCES preguntas(id) ON DELETE CASCADE,
  CONSTRAINT fk_users2 FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE impugnadas (
  id INT NOT NULL AUTO_INCREMENT,
  preguntas_id INT NOT NULL,
  users_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_preguntas4 FOREIGN KEY (preguntas_id) REFERENCES preguntas(id) ON DELETE CASCADE,
  CONSTRAINT fk_users3 FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE

);

CREATE TABLE comentarios (
  id INT NOT NULL AUTO_INCREMENT,
  comentario TEXT NULL,
  orden INT NULL,
  estado VARCHAR(45) NULL,
  impugnadas_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_impugnadas FOREIGN KEY (impugnadas_id) REFERENCES impugnadas(id) ON DELETE CASCADE

);

CREATE TABLE documentos (
  id INT NOT NULL AUTO_INCREMENT,
  nombre TEXT NULL,
  tipo INT NULL,
  categoria INT NULL,
  urlDocumento VARCHAR(255) NULL,
  PRIMARY KEY (id)
);

CREATE TABLE dudas (
  id INT NOT NULL,
  mensaje TEXT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE solucion (
  id INT NOT NULL,
  contenido TEXT NULL,
  estado INT NULL,
  dudas_id INT NOT NULL,
  users_id INT NOT NULL,
  PRIMARY KEY (id),
  CONSTRAINT fk_dudas FOREIGN KEY (dudas_id) REFERENCES dudas(id) ON DELETE CASCADE,
  CONSTRAINT fk_users4 FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE configuracion_users(
  id INT NOT NULL,
  plan_suscripcion INT,
  activo BOOLEAN,
  users_id BIGINT(20);
  PRIMARY KEY (id),
  CONSTRAINT fk_users5 FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE resultado_diario (
  id INT NOT NULL,
  correctas INT NULL,
  incorrectas INT NULL,
  fecha DATATIME,
  PRIMARY KEY (users_id),
  CONSTRAINT fk_users5 FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE
);

CREATE TABLE resultado_mensual (
  id INT NOT NULL,
  correctas INT NULL,
  incorrectas INT NULL,
  mes VARCHAR,
  PRIMARY KEY (users_id),
  CONSTRAINT fk_users5 FOREIGN KEY (users_id) REFERENCES users(id) ON DELETE CASCADE
);