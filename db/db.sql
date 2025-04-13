/* Lógico_1: */
DROP DATABASE dooararas;

CREATE DATABASE dooararas;

USE dooararas;

CREATE TABLE Usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    CPF CHAR(11) NOT NULL,
    telefone CHAR(11) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(150) NOT NULL,
    cargo CHAR(1) NOT NULL
);

CREATE TABLE Doacao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(32) NOT NULL,
    descricao VARCHAR(250) NOT NULL,
    quantidade INT NOT NULL,
    status CHAR(1) NOT NULL,
    imagem VARCHAR(2500) NOT NULL,
    fk_TipoDoacao_id INT NOT NULL,
    fk_Usuario_id INT NOT NULL,
    CEP CHAR(8) NOT NULL,
    numero VARCHAR(10) NOT NULL
);

CREATE TABLE TipoDoacao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR(50) NOT NULL
);
 
ALTER TABLE Doacao ADD CONSTRAINT FK_Doacao_2
    FOREIGN KEY (fk_TipoDoacao_id)
    REFERENCES TipoDoacao (id)
    ON DELETE CASCADE;
 
ALTER TABLE Doacao ADD CONSTRAINT FK_Doacao_3
    FOREIGN KEY (fk_Usuario_id)
    REFERENCES Usuario (id)
    ON DELETE CASCADE;