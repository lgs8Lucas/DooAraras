/* Lógico_1: */
CREATE DATABASE dooararas;

USE dooararas;

CREATE TABLE Usuario (
    id INT PRIMARY KEY AUTO_INCREMENT,
    nome VARCHAR(50) NOT NULL,
    CPF CHAR(11) NOT NULL,
    telefone CHAR(11) NOT NULL,
    email VARCHAR(50) NOT NULL,
    senha VARCHAR(32) NOT NULL,
    cargo CHAR(1) NOT NULL
);

CREATE TABLE Endereco (
    CEP CHAR(8) PRIMARY KEY,
    logradouro VARCHAR(50) NOT NULL,
    localidade VARCHAR(25) NOT NULL,
    uf CHAR(2) NOT NULL,
    categoria CHAR(1) NOT NULL
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
    fk_Endereco_CEP CHAR(8) NOT NULL
);

CREATE TABLE TipoDoacao (
    id INT PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR(50) NOT NULL
);

CREATE TABLE Servico (
    id INT PRIMARY KEY AUTO_INCREMENT,
    titulo VARCHAR(50) NOT NULL,
    descricao VARCHAR(250) NOT NULL,
    status CHAR(1) NOT NULL,
    contato VARCHAR(50) NOT NULL,
    imagem VARCHAR(2500) NOT NULL,
    fk_TipoServico_id INT NOT NULL,
    fk_Usuario_id INT NOT NULL
);

CREATE TABLE TipoServico (
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
 
ALTER TABLE Doacao ADD CONSTRAINT FK_Doacao_4
    FOREIGN KEY (fk_Endereco_CEP)
    REFERENCES Endereco (CEP)
    ON DELETE CASCADE;
 
ALTER TABLE Servico ADD CONSTRAINT FK_Servico_2
    FOREIGN KEY (fk_TipoServico_id)
    REFERENCES TipoServico (id)
    ON DELETE CASCADE;
 
ALTER TABLE Servico ADD CONSTRAINT FK_Servico_3
    FOREIGN KEY (fk_Usuario_id)
    REFERENCES Usuario (id)
    ON DELETE CASCADE;