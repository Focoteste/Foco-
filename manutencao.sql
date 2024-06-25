CREATE DATABASE sistema_login;

USE sistema_login;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    email VARCHAR(255),
    genero ENUM('Masculino', 'Feminino', 'Outro'),
    funcao VARCHAR(255),
    salario_hora DECIMAL(10, 2)
);

CREATE TABLE maquinas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    numero_serie VARCHAR(255) NOT NULL,
    marca VARCHAR(255),
    nome VARCHAR(255),
    setor VARCHAR(255)
);

CREATE TABLE produtos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    produto VARCHAR(255) NOT NULL,
    marca VARCHAR(255),
    maquina VARCHAR(255),
    numero_serie_peca VARCHAR(255),
    quantidade_minima INT
);
