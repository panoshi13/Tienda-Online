CREATE DATABASE black_fire;

USE black_fire;

--creacion de la tabla 

CREATE TABLE usuarios(
    id INT(9) AUTO_INCREMENT,
    nombre VARCHAR(60) NOT NULL,
    apellido VARCHAR(60) NOT NULL,
    correo VARCHAR(70) NOT NULL,
    contraseña VARCHAR(50) NOT NULL,
    rol VARCHAR(50),
    CONSTRAINT pk_id PRIMARY KEY (id),
    CONSTRAINT uc_correo UNIQUE (correo)
);


CREATE TABLE productos(
    id INT(9) AUTO_INCREMENT,
    nombre VARCHAR(60) NOT NULL,
    descripcion VARCHAR(120) NOT NULL,
    precio float(10,2) NOT NULL,
    imagen VARCHAR(60) NOT NULL,
    stock INT(5) NOT NULL,
    CONSTRAINT pk_id PRIMARY KEY (id)
);

CREATE TABLE pedidos(
    id INT(9) AUTO_INCREMENT,
    id_usuario INT(9) not null,
    id_producto INT(9) not null,
    direccion VARCHAR(60) NOT NULL,
    distrito VARCHAR(60) NOT NULL,
    departamento VARCHAR(60) NOT NULL,
    fecha DATE NOT NULL,
    cantidad INT(5) NOT NULL,
    CONSTRAINT pk_id PRIMARY key (id),
    CONSTRAINT fk_id_usuario_pedido FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
    CONSTRAINT fk_id_producto_pedido FOREIGN KEY (id_producto) REFERENCES productos(id)
);

INSERT INTO usuarios VALUES(null,'harold','alfaro','harold@gmail.com','harold123', 'admin');
INSERT INTO usuarios VALUES(null,'crisalida','alfaro','crisalida@gmail.com','crisa123', null);

