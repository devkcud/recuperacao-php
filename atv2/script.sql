CREATE DATABASE jogos;
USE jogos;

CREATE TABLE jogos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    genero VARCHAR(50) NOT NULL,
    plataforma VARCHAR(50) NOT NULL,
    lancamento DATE NOT NULL,
    descricao TEXT
);
