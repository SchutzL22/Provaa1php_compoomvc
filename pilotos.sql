CREATE DATABASE IF NOT EXISTS pilotoskart_mvc;

USE pilotoskart_mvc;

CREATE TABLE IF NOT EXISTS pilotos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nomePiloto VARCHAR(100) NOT NULL UNIQUE,
    personagem VARCHAR(100) NOT NULL,
    kart VARCHAR(100) NOT NULL,
    numero INT NOT NULL
);