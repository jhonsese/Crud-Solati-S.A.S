
CREATE DATABASE solatisas;


CREATE TABLE usuarios (
  id SERIAL PRIMARY KEY,
  nombre VARCHAR(50) NOT NULL,
  edad VARCHAR(3) NOT NULL
);

INSERT INTO usuarios (nombre, edad) VALUES ('Jhoan Sebastian', 18);
