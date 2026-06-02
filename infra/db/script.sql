-- Criar banco de dados chamado "sistema_simples"
CREATE DATABASE sistema_simples;

-- Selecionar o banco de dados
USE sistema_simples;

-- Criar tabela "users" com os campos "id", "username" e "password"
CREATE TABLE users (

-- campo "id" do tipo inteiro, auto-incrementável e chave primária
    id INT AUTO_INCREMENT PRIMARY KEY,

-- campo "username" do tipo varchar com tamanho máximo de 255 caracteres e não nulo
    username VARCHAR(255) NOT NULL,

-- campo "password" do tipo varchar com tamanho máximo de 255 caracteres e não nulo
    password VARCHAR(255) NOT NULL
);

-- Inserir um usuário de exemplo na tabela "users" com o nome de usuário "admin" e a senha "123"
INSERT INTO users (username, password) VALUES ('admin', '123');