-- ==========================================
-- BANCO DE DADOS: MAKERLAB
-- ==========================================

CREATE DATABASE IF NOT EXISTS makerLab;

USE makerLab;


-- ==========================================
-- 1. TABELA: USUARIOS
-- ==========================================

CREATE TABLE IF NOT EXISTS Usuarios (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    nome_usuario VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    instituicao VARCHAR(100),
    telefone VARCHAR(20),
    perfil ENUM('normal', 'admin') NOT NULL DEFAULT 'normal',
    imagens_usuario VARCHAR(255) NOT NULL DEFAULT 'padrao',
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP
);


-- ==========================================
-- 2. TABELA: BANCADAS
-- ==========================================

CREATE TABLE IF NOT EXISTS Bancadas (
    id_bancada INT AUTO_INCREMENT PRIMARY KEY,
    nome_bancada VARCHAR(100) NOT NULL,
    descricao_bancada TEXT,
    quantidade_bancada INT NOT NULL,
    primeira_vantagem VARCHAR(30),
    segunda_vantagem VARCHAR(30),
    imagens_bancada VARCHAR(255),
    preco_bancada DECIMAL(10,2) NOT NULL,
    status_bancada ENUM(
        'disponivel',
        'manutencao',
        'indisponivel'
    ) NOT NULL DEFAULT 'disponivel',
    area_bancada VARCHAR(50)
);


-- ==========================================
-- 3. TABELA: FERRAMENTAS
-- ==========================================

CREATE TABLE IF NOT EXISTS Ferramentas (
    id_ferramenta INT AUTO_INCREMENT PRIMARY KEY,
    nome_ferramenta VARCHAR(100) NOT NULL,
    area VARCHAR(50),
    status_ferramenta ENUM(
        'disponivel',
        'manutencao',
        'indisponivel'
    ) NOT NULL DEFAULT 'disponivel',
    estoque INT NOT NULL DEFAULT 0,
    id_bancada INT,

    CONSTRAINT fk_bancada
        FOREIGN KEY (id_bancada)
        REFERENCES Bancadas(id_bancada)
);


-- ==========================================
-- 4. TABELA: PROJETOS
-- ==========================================

CREATE TABLE IF NOT EXISTS Projetos (
    id_projeto INT AUTO_INCREMENT PRIMARY KEY,
    nome_projeto VARCHAR(100) NOT NULL,
    descricao_projeto TEXT,
    imagem_projeto VARCHAR(255),
    data_criacao DATETIME DEFAULT CURRENT_TIMESTAMP,
    id_criador INT NOT NULL,

    CONSTRAINT fk_projeto_criador
        FOREIGN KEY (id_criador)
        REFERENCES Usuarios(id_usuario)
);


-- ==========================================
-- 5. TABELA: PROJETOS_USUARIOS
-- ==========================================

CREATE TABLE IF NOT EXISTS Projetos_Usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    id_projeto INT NOT NULL,
    id_usuario INT NOT NULL,

    CONSTRAINT fk_usuarios
        FOREIGN KEY (id_usuario)
        REFERENCES Usuarios(id_usuario),

    CONSTRAINT fk_projetos
        FOREIGN KEY (id_projeto)
        REFERENCES Projetos(id_projeto),

    CONSTRAINT uk_projeto_usuario
        UNIQUE (id_projeto, id_usuario)
);


-- ==========================================
-- 6. TABELA: RESERVAS
-- ==========================================

CREATE TABLE IF NOT EXISTS Reservas (
    id_reserva INT AUTO_INCREMENT PRIMARY KEY,
    data_reserva DATETIME NOT NULL,
    horas_reservadas INT NOT NULL,
    preco_total DECIMAL(10,2) NOT NULL DEFAULT 0.00,
    id_usuario INT NOT NULL,
    id_bancada INT NOT NULL,
    id_projeto INT NULL,
    criado_em DATETIME DEFAULT CURRENT_TIMESTAMP,

    CONSTRAINT fk_reservas_usuarios
        FOREIGN KEY (id_usuario)
        REFERENCES Usuarios(id_usuario),

    CONSTRAINT fk_reservas_bancadas
        FOREIGN KEY (id_bancada)
        REFERENCES Bancadas(id_bancada),

    CONSTRAINT fk_reservas_projetos
        FOREIGN KEY (id_projeto)
        REFERENCES Projetos(id_projeto)
);


-- ==========================================
-- 7. VIEW: FERRAMENTAS E BANCADAS
-- ==========================================

CREATE OR REPLACE VIEW vw_ferramentas_bancadas AS
SELECT f.id_ferramenta, f.nome_ferramenta, f.area, f.estoque,
       b.id_bancada, b.nome_bancada
FROM Ferramentas f INNER JOIN Bancadas b ON f.id_bancada = b.id_bancada;


-- ==========================================

-- 7. TABELA: RECOMENDACOES

-- ==========================================

  

CREATE TABLE IF NOT EXISTS Recomendacoes (

id_recomendacao INT AUTO_INCREMENT PRIMARY KEY,

estrelas INT NOT NULL CHECK (estrelas BETWEEN 1 AND 5),

texto TEXT NOT NULL,

autor VARCHAR(100) NOT NULL

);



-- ==========================================
-- FIM DO SCHEMA
-- ==========================================