CREATE DATABASE desafiophp;

CREATE TABLE `desafiophp`.`categoria` (
    id_categoria INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    descricao VARCHAR(100), 
    PRIMARY KEY (id_categoria)
);

CREATE TABLE `desafiophp`.`associado` (
    id_associado INT NOT NULL AUTO_INCREMENT,
    nome VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    cpf VARCHAR(11) NOT NULL,
    data_filiacao DATE,
    id_categoria INT,
    PRIMARY KEY (id_associado),
    FOREIGN KEY (id_categoria) REFERENCES `desafiophp`.`categoria`(id_categoria)
);

CREATE TABLE `desafiophp`.`anuidade` (
    id_anuidade INT NOT NULL AUTO_INCREMENT,
    titulo VARCHAR(100) NOT NULL,
    data_vencimento VARCHAR(100) NOT NULL,
    status_pagamento BOOLEAN,
    id_associado INT,
    PRIMARY KEY (id_anuidade),
    FOREIGN KEY (id_associado) REFERENCES `desafiophp`.`associado`(id_associado)
);
