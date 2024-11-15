CREATE DATABASE IF NOT EXISTS cadastro_cidadao CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;

USE cadastro_cidadao;

CREATE TABLE IF NOT EXISTS cidadaos (
                                        id INT AUTO_INCREMENT PRIMARY KEY,
                                        nome VARCHAR(255) NOT NULL,
    nis VARCHAR(11) NOT NULL
    );