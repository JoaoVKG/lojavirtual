SET SESSION FOREIGN_KEY_CHECKS=0;

/* Drop Tables */

DROP TABLE IF EXISTS produto;
DROP TABLE IF EXISTS usuario;




/* Create Tables */

CREATE TABLE produto
(
	id_produto int NOT NULL AUTO_INCREMENT,
	nome varchar(255) NOT NULL,
	descricao text NOT NULL,
	preco double NOT NULL,
	PRIMARY KEY (id_produto)
);


CREATE TABLE usuario
(
	id_usuario int NOT NULL AUTO_INCREMENT,
	nome varchar(255) NOT NULL,
	email varchar(255) NOT NULL,
	senha varchar(255) NOT NULL,
	PRIMARY KEY (id_usuario),
	UNIQUE (email)
);



