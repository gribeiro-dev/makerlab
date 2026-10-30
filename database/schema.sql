CREATE DATABASE IF NOT EXISTS makerLab;

USE makerLab;

CREATE TABLE IF NOT EXISTS Usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    instituicao VARCHAR(100),
    telefone VARCHAR(20),
    perfil ENUM('normal', 'admin') NOT NULL DEFAULT 'normal',
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE IF NOT EXISTS Bancadas (
    id_bancada INT AUTO_INCREMENT PRIMARY KEY,
    nome_bancada VARCHAR(100) NOT NULL,
    descricao_bancada TEXT,
    imagens_bancada VARCHAR(255),
    preco_bancada DECIMAL(10,2) NOT NULL,
    status_bancada ENUM('disponivel', 'manutencao', 'indisponivel') NOT NULL DEFAULT 'disponivel',
    area_bancada VARCHAR(50)
);

CREATE TABLE IF NOT EXISTS Ferramentas (
    id_ferramenta INT AUTO_INCREMENT PRIMARY KEY,
    nome_ferramenta VARCHAR(100) NOT NULL,
    area VARCHAR(50),
    estoque INT NOT NULL DEFAULT 0,
    id_bancada INT,
    CONSTRAINT fk_bancada FOREIGN KEY (id_bancada) REFERENCES Bancadas(id_bancada)
    );

CREATE TABLE IF NOT EXISTS Projetos (
    id_projeto INT AUTO_INCREMENT PRIMARY KEY,
    duracao INT NOT NULL COMMENT 'Duração estimada'
);

-- para relacao muitos para muits é necessario criar uma tabela adicional
CREATE TABLE IF NOT EXISTS Projetos_Usuarios (
	id INT AUTO_INCREMENT PRIMARY KEY,
    id_projeto INT NOT NULL,
    id_usuario INT NOT NULL,
    CONSTRAINT fk_usuarios FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
    CONSTRAINT fk_projetos FOREIGN KEY (id_projeto) REFERENCES Projetos(id_projeto)
);



CREATE TABLE IF NOT EXISTS Reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    data_reserva DATETIME NOT NULL,
    horas_reservadas INT NOT NULL,
    preco_total DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    id_usuario INT NOT NULL,
    id_bancada INT NOT NULL,
    id_projeto INT NOT NULL,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,
    CONSTRAINT fk_reservas_usuarios FOREIGN KEY (id_usuario) REFERENCES Usuarios(id_usuario),
    CONSTRAINT fk_reservas_bancadas FOREIGN KEY (id_bancada) REFERENCES Bancadas(id_bancada),
    CONSTRAINT fk_reservas_projetos FOREIGN KEY (id_projeto) REFERENCES Projetos(id_projeto)
);



CREATE OR REPLACE VIEW vw_ferramentas_bancadas AS
SELECT
    f.id_ferramenta,
    f.nome_ferramenta,
    f.area,
    f.estoque,
    b.id_bancada,
    b.nome_bancada
FROM Ferramentas f
INNER JOIN Bancadas b
    ON f.id_bancada = b.id_bancada;