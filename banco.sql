
CREATE DATABASE IF NOT EXISTS estudo CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;

USE estudo;

CREATE TABLE IF NOT EXISTS montadoras (
	codigo INT AUTO_INCREMENT NOT NULL PRIMARY KEY,
	nome VARCHAR(30) NOT NULL
	);
	
INSERT INTO montadoras (nome) VALUES
('Volkswagen'),
('Ford'),
('Fiat'),
('Chevrolet');

CREATE TABLE IF NOT EXISTS automoveis(
    codigo INT AUTO_INCREMENT NOT NULL PRIMARY KEY, 
    nome VARCHAR(150) NOT NULL,
    placa VARCHAR(7) NOT NULL,
    chassi VARCHAR(17) NOT NULL,
    montadora INT NOT NULL,
    FOREIGN KEY (montadora) REFERENCES montadoras(codigo)
);
