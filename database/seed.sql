-- ==========================================
-- SEED: MAKERLAB
-- ==========================================

USE makerLab;

SET NAMES utf8mb4;


-- ==========================================
-- 1. USUARIOS
-- ==========================================

INSERT INTO Usuarios
(nome_usuario, email, senha, instituicao, telefone, perfil)
VALUES
('João Silva', 'joao@email.com', '$2y$10$6yHV4wHciFzpPxuX0gnidOfuBT28y3CTDJKIQUE650kBWnFi02Ws6', 'IFSP', '11999990001', 'admin'),
('Maria Oliveira', 'maria@email.com', '$2y$10$gj0mPwHmdj7QXVmcr0M67epxHJ8tiTdik3rXz9iWXjuwW01GX89mS', 'USP', '11999990002', 'normal'),
('Pedro Santos', 'pedro@email.com', '$2y$10$Iq8jOWeUvS8dNqYOhL/s7.PKCtlMkKXtklQ6AQCR4uzOUzv1tbrqe', 'UNICAMP', '11999990003', 'normal'),
('Ana Costa', 'ana@email.com', '$2y$10$0wUBkIiSv1N2VmRYKpJsVOnLqfzC1sjPDd2sxbpjqqQ.sui4HoQGq', 'IFSP', '11999990004', 'normal'),
('Lucas Ferreira', 'lucas@email.com', '$2y$10$9HJMMO/fUaHc57wW9pGpmOnQKYAxO6aNlqJeeUDT5IWXAx6s7wx1u', 'SENAI', '11999990005', 'normal'),
('Beatriz Lima', 'beatriz@email.com', '$2y$10$sryi8YxXzIE4wwBzXrDiDumvQxh0B3t1Cwi9zGQ5kGXo1NOdd.tiK', 'UNESP', '11999990006', 'normal'),
('Gabriel Souza', 'gabriel@email.com', '$2y$10$rhrT6q3c8Yb1n8hnJ9FJh.Qmf0QGc7qZ252gKpXduStwbeAthEu4e', 'USP', '11999990007', 'normal'),
('Camila Rocha', 'camila@email.com', '$2y$10$VJI2H9FgOcNihYC1SHjioefwqWHfICiA8RKfbMB8yCiC980q0WNZa', 'UFABC', '11999990008', 'admin'),
('Mateus Alves', 'mateus@email.com', '$2y$10$sMF.a9cqv9NiJAxnLClzxOxNue2MULX1HiCM2cfIBMiIYWWzmK.mG', 'IFSP', '11999990009', 'normal'),
('Juliana Mendes', 'juliana@email.com', '$2y$10$fgopIoAOmmZgtnt5qaPbIe/RHZl7U60pTNJ6NDtcBasmu7FxModoq', 'FATEC', '11999990010', 'normal'),
('Rafael Nunes', 'rafael@email.com', '$2y$10$WqCqsLjVMUUdpMHbxgvdqO7H63L/fus2NrrB4jZB00zc0CYV1Akji', 'SENAI', '11999990011', 'normal'),
('Larissa Campos', 'larissa@email.com', '$2y$10$xZ4uT4We2xHw5FyvSfWUw.bmMQe9V5nErKM7H8C/p.0NlTQsaFtqK', 'Mackenzie', '11999990012', 'normal'),
('Thiago Ribeiro', 'thiago@email.com', '$2y$10$4QiCtZvySY5JIyMhCRyKXu6MzsF24wnle85YChe8rvlkbmDsXHiFq', 'ETEC', '11999990013', 'normal'),
('Fernanda Duarte', 'fernanda@email.com', '$2y$10$SMUbHO8EpnqDt0Ssp9lGqu/XKjgWZwqGvbJEvwBw46vJ9fKZFXLfm', 'FEI', '11999990014', 'normal'),
('Bruno Carvalho', 'bruno@email.com', '$2y$10$KklqqOm3m1eQIPYPDhBm7uHSJe0hztyMYexD5yiApn5meHhHKr5Tq', 'Mauá', '11999990015', 'normal'),
('Isabela Martins', 'isabela@email.com', '$2y$10$J9XL3GUQp5/UN6g6CPwaA.ODrwvFVq1SGv5DNjpdbBVFoTjI1LAKK', 'USCS', '11999990016', 'normal'),
('Vinícius Barros', 'vinicius@email.com', '$2y$10$T5YkG4Q/qxDPcsz/KwPmUeZe97VVkMOaa7fgNgKV0EKpnh0n5dkfm', 'FATEC', '11999990017', 'normal'),
('Letícia Gomes', 'leticia@email.com', '$2y$10$LRwTtYB9Pm84WGu6jP3D/./Mkj4x20qjRqX3YoHNBSftkwNcrMX3O', 'UFABC', '11999990018', 'normal'),
('Diego Araújo', 'diego@email.com', '$2y$10$/PaEYXn6QRnUu/YOX.72g.3jJYD1AkjZBDMmdTlh0w0.rIg4fp1y.', 'SENAI', '11999990019', 'normal'),
('Mariana Teixeira', 'mariana@email.com', '$2y$10$aMljRPa.o0HqcR5bUj81I.BLoxBXUIXPa.p2kxg0PICAZBcJFM33q', 'USP', '11999990020', 'normal'),
('Felipe Moreira', 'felipe@email.com', '$2y$10$zf878dF3Oiz5E7GtmKU.lep1TsM0ivOHn.u8gP5N6mCJ.0ollNC0m', 'IFSP', '11999990021', 'normal'),
('Carolina Pires', 'carolina@email.com', '$2y$10$Rwf7RpfpWfvq6gGZEkosG.tidWrQ4wNUzvhFi07iQkFjjQZv7lMJu', 'UNIFESP', '11999990022', 'normal'),
('Eduardo Lopes', 'eduardo@email.com', '$2y$10$QgKeKIm01tClBLCs5qAiXuhTUogZKhi0Hr14.1qFX1w7u8ir/1QHq', 'ETEC', '11999990023', 'normal'),
('Sofia Cardoso', 'sofia@email.com', '$2y$10$W.h2JxDv.LTlvbJ9WdkvMOpAk1AyTWdJrRPUmR2hKAvbgPFEz59Bu', 'Mackenzie', '11999990024', 'normal');


-- ==========================================
-- 2. BANCADAS
-- ==========================================

INSERT INTO Bancadas
(nome_bancada, descricao_bancada, quantidade_bancada,
 primeira_vantagem, segunda_vantagem, imagens_bancada,
 preco_bancada, status_bancada, area_bancada)
VALUES
('Bancada de Eletrônica',
 'Espaço para projetos eletrônicos e circuitos.',
 6, 'Arduino e sensores', 'Ferros de solda',
 './img/bancadasPADRAO/eletronica.jpg', 25.00, 'disponivel', 'Eletrônica'),

('Bancada de Impressão 3D',
 'Espaço equipado para impressão 3D.',
 4, 'Impressoras 3D', 'Filamentos variados',
 './img/bancadasPADRAO/impressao3d.jpg', 35.00, 'disponivel', 'Prototipagem'),

('Bancada de Marcenaria',
 'Espaço para trabalhos com madeira.',
 8, 'Serras e lixadeiras', 'Bancada reforçada',
 './img/bancadasPADRAO/marcenaria.jpg', 30.00, 'disponivel', 'Marcenaria'),

('Bancada de Robótica',
 'Espaço para montagem e programação de robôs.',
 6, 'Kits de robótica', 'Notebooks',
 './img/bancadasPADRAO/robotica.jpg', 40.00, 'manutencao', 'Robótica'),

('Bancada de Prototipagem',
 'Espaço para desenvolvimento de protótipos.',
 5, 'Mesa ampla', 'Ferramentas manuais',
 './img/bancadasPADRAO/prototipagem.jpg', 28.00, 'disponivel', 'Prototipagem'),

('Bancada de Corte a Laser',
 'Espaço equipado para corte e gravação a laser.',
 3, 'Cortadora a laser', 'Exaustão',
 './img/bancadasPADRAO/corte_laser.jpg', 45.00, 'disponivel', 'Corte e Usinagem'),

('Bancada de Química e Materiais',
 'Espaço para testes com resinas, tintas e polímeros.',
 4, 'Capela de exaustão', 'Balanças de precisão',
 './img/bancadasPADRAO/quimica.jpg', 32.00, 'disponivel', 'Química'),

('Bancada de IoT & Sensores',
 'Espaço dedicado a automação residencial e redes sem fio.',
 6, 'Módulos Wi-Fi', 'Sensores variados',
 './img/bancadasPADRAO/iot.jpg', 38.00, 'disponivel', 'Eletrônica');


-- ==========================================
-- 3. FERRAMENTAS
-- ==========================================

INSERT INTO Ferramentas
(nome_ferramenta, area, estoque, id_bancada)
VALUES
('Ferro de Solda', 'Eletrônica', 10, 1),
('Multímetro Digital', 'Eletrônica', 8, 1),
('Osciloscópio', 'Eletrônica', 3, 1),
('Impressora 3D Ender 3', 'Prototipagem', 2, 2),
('SLA Resin Printer', 'Prototipagem', 1, 2),
('Serra Tico-Tico', 'Marcenaria', 5, 3),
('Lixadeira Orbital', 'Marcenaria', 4, 3),
('Tupia Manual', 'Marcenaria', 2, 3),
('Arduino Uno', 'Robótica', 15, 4),
('Kit Servomotores', 'Robótica', 10, 4),
('Raspberry Pi 4', 'Robótica', 6, 4),
('Chave de Fenda', 'Prototipagem', 20, 5),
('Micro Retífica', 'Prototipagem', 6, 5),
('Alicate de Corte', 'Eletrônica', 12, 1),
('Cortadora Laser CO2', 'Corte e Usinagem', 1, 6),
('Exaustor Industrial', 'Química', 2, 7),
('Módulo ESP32 Wi-Fi/Bluetooth', 'Eletrônica', 18, 8);



-- ==========================================
-- 4. PROJETOS
-- ==========================================

INSERT INTO Projetos
(nome_projeto, descricao_projeto, imagem_projeto, id_criador)
VALUES
(
 'Robô Seguidor de Linha',
 'Construção de um robô autônomo capaz de seguir trajetos utilizando sensores e programação.', './img/projetosPADRAO/robo_seguidor.jpg',
 1
),
(
 'Impressão 3D de Miniaturas',
 'Desenvolvimento de miniaturas personalizadas utilizando modelagem e impressão tridimensional.', './img/projetosPADRAO/miniaturas_3d.jpg',
 2
),
(
 'Circuito Eletrônico Inteligente',
 'Criação de um circuito eletrônico utilizando Arduino, sensores e componentes eletrônicos.', './img/projetosPADRAO/circuito_inteligente.jpg',
 3
),
(
 'Móvel Sustentável',
 'Construção de um pequeno móvel utilizando madeira reaproveitada e ferramentas de marcenaria.', './img/projetosPADRAO/movel_sustentavel.jpg',
 4
),
(
 'Estação Meteorológica',
 'Desenvolvimento de uma estação meteorológica para monitoramento de temperatura e umidade.', './img/projetosPADRAO/estacao_meteorologica.jpg',
 5
),
(
 'Sistema de Corte a Laser',
 'Criação de peças personalizadas utilizando equipamentos de corte e gravação a laser.', './img/projetosPADRAO/sistema_corte_laser.jpg',
 6
),
(
 'Experimentos com Polímeros',
 'Estudo e desenvolvimento de materiais utilizando resinas, tintas e diferentes polímeros.', './img/projetosPADRAO/experimentos_polimeros.jpg',
 7
),
(
 'Automação Residencial IoT',
 'Desenvolvimento de um sistema de automação residencial utilizando módulos Wi-Fi e sensores.', './img/projetosPADRAO/automacao_iot.jpg',
 8
),
(
 'Braço Robótico Automatizado',
 'Montagem e programação de um braço robótico utilizando motores e componentes eletrônicos.', './img/projetosPADRAO/braco_robotico.jpg',
 9
),
(
 'Mini Protótipo Mecânico',
 'Construção de um protótipo mecânico para testar soluções de engenharia e mecanismos.', './img/projetosPADRAO/prototipo_mecanico.jpg',
 10
),
(
 'Sensor de Umidade para Hortas',
 'Sistema que mede a umidade do solo e avisa pelo celular a hora certa de regar.', './img/projetosPADRAO/automacao_iot.jpg',
 11
),
(
 'Luminária Paramétrica em MDF',
 'Luminária com padrões geométricos cortados a laser em chapas de MDF.', './img/projetosPADRAO/sistema_corte_laser.jpg',
 12
),
(
 'Carrinho Controlado por Bluetooth',
 'Carrinho robótico montado com Arduino e controlado por um aplicativo de celular.', './img/projetosPADRAO/robo_seguidor.jpg',
 13
),
(
 'Prótese de Mão Impressa em 3D',
 'Modelagem e impressão de uma prótese de mão de baixo custo, acionada por tendões.', './img/projetosPADRAO/miniaturas_3d.jpg',
 14
),
(
 'Organizador Modular de Bancada',
 'Conjunto de caixas de madeira encaixáveis para organizar ferramentas.', './img/projetosPADRAO/movel_sustentavel.jpg',
 15
),
(
 'Medidor de Energia Residencial',
 'Circuito que mede o consumo de energia das tomadas e mostra os dados em tempo real.', './img/projetosPADRAO/circuito_inteligente.jpg',
 16
),
(
 'Garra Mecânica Didática',
 'Garra acionada por alavancas para ensinar princípios de mecânica em sala de aula.', './img/projetosPADRAO/prototipo_mecanico.jpg',
 17
),
(
 'Revestimento Biodegradável',
 'Testes com polímeros naturais para criar um revestimento que se decompõe rápido.', './img/projetosPADRAO/experimentos_polimeros.jpg',
 18
);



-- ==========================================
-- 5. PROJETOS_USUARIOS
-- ==========================================

INSERT INTO Projetos_Usuarios
(id_projeto, id_usuario)
VALUES
(1, 1),
(1, 2),

(2, 3),

(3, 1),
(3, 4),

(4, 5),

(5, 2),

(6, 6),
(6, 7),

(7, 8),

(8, 9),
(8, 10),

(9, 3),
(9, 6),

(10, 4),
(11, 11),
(11, 19),
(12, 12),
(13, 13),
(13, 23),
(14, 14),
(14, 20),
(15, 15),
(16, 16),
(16, 21),
(17, 17),
(18, 18),
(18, 22);


-- ==========================================
-- 6. RESERVAS
-- ==========================================

INSERT INTO Reservas
(data_reserva, horas_reservadas, preco_total,
 id_usuario, id_bancada, id_projeto)
VALUES
('2026-11-02 09:00:00', 2, 50.00, 1, 1, 1),

('2026-11-03 14:00:00', 3, 105.00, 2, 2, 2),

('2026-11-04 10:00:00', 2, 60.00, 3, 3, 3),

('2026-11-05 13:00:00', 4, 112.00, 4, 5, 4),

('2026-11-06 08:00:00', 2, 50.00, 5, 1, 5),

('2026-11-07 11:00:00', 3, 135.00, 6, 6, 6),

('2026-11-08 15:00:00', 5, 160.00, 7, 7, 6),

('2026-11-09 09:30:00', 4, 152.00, 8, 8, 7),

('2026-11-10 14:00:00', 2, 70.00, 9, 2, 8),

('2026-11-11 10:00:00', 3, 90.00, 10, 3, 8),

('2026-11-12 16:00:00', 2, 90.00, 3, 6, 9),

('2026-11-13 08:30:00', 1, 28.00, 4, 5, 10),

('2026-11-28 09:00:00', 1, 28.00, 20, 5, NULL),

('2026-11-28 16:00:00', 1, 38.00, 9, 8, 9),

('2026-11-29 08:00:00', 4, 128.00, 21, 7, NULL),

('2026-11-30 08:00:00', 4, 100.00, 10, 1, 10),

('2026-11-30 09:00:00', 2, 70.00, 21, 2, NULL),

('2026-11-30 10:00:00', 4, 152.00, 13, 8, 13),

('2026-11-30 13:00:00', 2, 60.00, 5, 3, 5),

('2026-11-30 13:00:00', 4, 112.00, 17, 5, 17),

('2026-11-30 13:00:00', 5, 225.00, 17, 6, 17),

('2026-11-30 14:00:00', 3, 105.00, 6, 2, 6),

('2026-11-30 17:00:00', 1, 25.00, 21, 1, NULL),

('2026-11-30 17:00:00', 2, 60.00, 3, 3, NULL),

('2026-11-30 19:00:00', 2, 56.00, 10, 5, 10),

('2026-12-01 08:00:00', 4, 100.00, 24, 1, NULL),

('2026-12-01 08:00:00', 2, 76.00, 18, 8, NULL),

('2026-12-01 09:00:00', 5, 175.00, 4, 2, NULL),

('2026-12-01 10:00:00', 3, 84.00, 16, 5, NULL),

('2026-12-01 10:00:00', 2, 64.00, 4, 7, 4),

('2026-12-01 13:00:00', 3, 75.00, 14, 1, 14),

('2026-12-01 13:00:00', 4, 180.00, 24, 6, NULL),

('2026-12-01 15:00:00', 4, 112.00, 4, 5, 4),

('2026-12-01 17:00:00', 2, 70.00, 5, 2, 5),

('2026-12-01 19:00:00', 1, 35.00, 12, 2, NULL),

('2026-12-01 20:00:00', 2, 50.00, 20, 1, NULL),

('2026-12-01 20:00:00', 2, 70.00, 12, 2, 12),

('2026-12-02 08:00:00', 4, 140.00, 9, 2, 9),

('2026-12-02 09:00:00', 2, 56.00, 13, 5, NULL),

('2026-12-02 09:00:00', 1, 45.00, 9, 6, NULL),

('2026-12-02 09:00:00', 5, 160.00, 5, 7, NULL),

('2026-12-02 11:00:00', 1, 38.00, 19, 8, NULL),

('2026-12-02 12:00:00', 3, 75.00, 2, 1, 2),

('2026-12-02 15:00:00', 1, 35.00, 24, 2, NULL),

('2026-12-02 15:00:00', 5, 190.00, 12, 8, 12),

('2026-12-02 16:00:00', 2, 56.00, 5, 5, NULL),

('2026-12-02 17:00:00', 3, 75.00, 21, 1, NULL),

('2026-12-02 18:00:00', 2, 90.00, 11, 6, NULL),

('2026-12-02 19:00:00', 2, 70.00, 19, 2, NULL),

('2026-12-03 08:00:00', 1, 35.00, 11, 2, 11),

('2026-12-03 09:00:00', 3, 114.00, 15, 8, 15),

('2026-12-03 11:00:00', 3, 75.00, 20, 1, NULL),

('2026-12-03 11:00:00', 2, 70.00, 5, 2, 5),

('2026-12-03 14:00:00', 2, 70.00, 10, 2, 10),

('2026-12-03 15:00:00', 2, 56.00, 22, 5, NULL),

('2026-12-03 15:00:00', 2, 64.00, 7, 7, 7),

('2026-12-03 16:00:00', 3, 75.00, 14, 1, NULL),

('2026-12-03 17:00:00', 2, 76.00, 17, 8, NULL),

('2026-12-03 18:00:00', 3, 105.00, 10, 2, NULL),

('2026-12-03 18:00:00', 3, 84.00, 4, 5, NULL),

('2026-12-03 19:00:00', 2, 50.00, 20, 1, NULL),

('2026-12-03 19:00:00', 2, 76.00, 7, 8, 7),

('2026-12-04 08:00:00', 2, 50.00, 2, 1, NULL),

('2026-12-04 08:00:00', 3, 114.00, 5, 8, 5),

('2026-12-04 09:00:00', 5, 140.00, 20, 5, NULL),

('2026-12-04 11:00:00', 2, 70.00, 2, 2, 2),

('2026-12-04 13:00:00', 5, 125.00, 6, 1, 6),

('2026-12-04 16:00:00', 2, 70.00, 6, 2, 6),

('2026-12-04 16:00:00', 4, 120.00, 6, 3, 6),

('2026-12-04 16:00:00', 2, 56.00, 3, 5, 3),

('2026-12-04 19:00:00', 1, 35.00, 14, 2, NULL),

('2026-12-04 20:00:00', 2, 70.00, 21, 2, NULL),

('2026-12-04 20:00:00', 1, 28.00, 6, 5, 6),

('2026-12-04 21:00:00', 1, 30.00, 17, 3, NULL),

('2026-12-05 15:00:00', 2, 90.00, 6, 6, 6),

('2026-12-05 16:00:00', 5, 150.00, 10, 3, NULL),

('2026-12-05 19:00:00', 2, 70.00, 11, 2, 11),

('2026-12-05 20:00:00', 1, 25.00, 4, 1, 4),

('2026-12-06 10:00:00', 3, 114.00, 11, 8, NULL),

('2026-12-06 14:00:00', 2, 60.00, 4, 3, 4),

('2026-12-07 09:00:00', 2, 70.00, 10, 2, NULL),

('2026-12-07 10:00:00', 5, 125.00, 24, 1, NULL),

('2026-12-07 10:00:00', 4, 152.00, 20, 8, NULL),

('2026-12-07 12:00:00', 3, 84.00, 3, 5, NULL),

('2026-12-07 13:00:00', 4, 140.00, 19, 2, NULL),

('2026-12-07 14:00:00', 2, 64.00, 24, 7, NULL),

('2026-12-07 16:00:00', 3, 75.00, 17, 1, 17),

('2026-12-07 19:00:00', 2, 50.00, 5, 1, 5),

('2026-12-07 20:00:00', 1, 38.00, 7, 8, 7),

('2026-12-08 08:00:00', 3, 75.00, 23, 1, NULL),

('2026-12-08 08:00:00', 2, 60.00, 19, 3, NULL),

('2026-12-08 08:00:00', 3, 96.00, 11, 7, 11),

('2026-12-08 09:00:00', 2, 56.00, 7, 5, 7),

('2026-12-08 11:00:00', 2, 56.00, 12, 5, NULL),

('2026-12-08 12:00:00', 2, 70.00, 5, 2, 5),

('2026-12-08 16:00:00', 3, 105.00, 16, 2, NULL),

('2026-12-08 16:00:00', 5, 140.00, 24, 5, NULL),

('2026-12-08 16:00:00', 2, 76.00, 18, 8, 18),

('2026-12-08 20:00:00', 2, 50.00, 11, 1, 11),

('2026-12-09 08:00:00', 3, 90.00, 17, 3, 17),

('2026-12-09 08:00:00', 5, 140.00, 11, 5, 11),

('2026-12-09 09:00:00', 1, 35.00, 23, 2, NULL),

('2026-12-09 11:00:00', 2, 50.00, 13, 1, 13),

('2026-12-09 13:00:00', 2, 90.00, 7, 6, 7),

('2026-12-09 14:00:00', 2, 50.00, 14, 1, NULL),

('2026-12-09 14:00:00', 3, 105.00, 7, 2, 7),

('2026-12-09 15:00:00', 2, 64.00, 11, 7, 11),

('2026-12-09 16:00:00', 4, 120.00, 24, 3, NULL),

('2026-12-09 16:00:00', 3, 84.00, 13, 5, 13),

('2026-12-09 16:00:00', 2, 76.00, 2, 8, 2),

('2026-12-09 18:00:00', 2, 50.00, 23, 1, NULL),

('2026-12-10 08:00:00', 2, 60.00, 19, 3, NULL),

('2026-12-10 09:00:00', 2, 56.00, 2, 5, 2),

('2026-12-10 12:00:00', 1, 25.00, 12, 1, NULL),

('2026-12-10 12:00:00', 2, 76.00, 10, 8, NULL),

('2026-12-10 13:00:00', 4, 140.00, 18, 2, 18),

('2026-12-10 14:00:00', 2, 50.00, 21, 1, NULL),

('2026-12-10 15:00:00', 4, 112.00, 20, 5, NULL),

('2026-12-10 15:00:00', 2, 76.00, 11, 8, 11),

('2026-12-10 16:00:00', 4, 120.00, 6, 3, NULL),

('2026-12-10 18:00:00', 2, 70.00, 22, 2, NULL),

('2026-12-10 19:00:00', 2, 76.00, 19, 8, NULL),

('2026-12-10 21:00:00', 1, 28.00, 24, 5, NULL),

('2026-12-11 08:00:00', 2, 60.00, 18, 3, 18),

('2026-12-11 09:00:00', 4, 100.00, 18, 1, NULL),

('2026-12-11 09:00:00', 2, 70.00, 22, 2, NULL),

('2026-12-11 11:00:00', 4, 152.00, 9, 8, 9),

('2026-12-11 13:00:00', 2, 70.00, 11, 2, NULL),

('2026-12-11 15:00:00', 3, 84.00, 17, 5, 17),

('2026-12-11 15:00:00', 2, 76.00, 2, 8, 2),

('2026-12-11 17:00:00', 1, 35.00, 23, 2, NULL),

('2026-12-11 17:00:00', 3, 90.00, 21, 3, NULL),

('2026-12-11 19:00:00', 2, 50.00, 23, 1, NULL),

('2026-12-11 19:00:00', 2, 56.00, 9, 5, NULL),

('2026-12-12 09:00:00', 3, 84.00, 14, 5, 14),

('2026-12-12 13:00:00', 3, 90.00, 6, 3, NULL),

('2026-12-13 14:00:00', 5, 140.00, 12, 5, NULL),

('2026-12-14 08:00:00', 2, 50.00, 24, 1, NULL),

('2026-12-14 10:00:00', 2, 60.00, 18, 3, 18),

('2026-12-14 10:00:00', 2, 90.00, 23, 6, NULL),

('2026-12-14 11:00:00', 2, 50.00, 2, 1, NULL),

('2026-12-14 11:00:00', 2, 70.00, 11, 2, 11),

('2026-12-14 12:00:00', 3, 84.00, 23, 5, NULL),

('2026-12-14 13:00:00', 2, 50.00, 2, 1, 2),

('2026-12-14 14:00:00', 3, 105.00, 2, 2, NULL),

('2026-12-14 15:00:00', 4, 120.00, 22, 3, NULL),

('2026-12-14 16:00:00', 5, 140.00, 24, 5, NULL),

('2026-12-14 16:00:00', 2, 76.00, 18, 8, 18),

('2026-12-14 19:00:00', 2, 70.00, 4, 2, 4),

('2026-12-15 08:00:00', 2, 70.00, 16, 2, 16),

('2026-12-15 09:00:00', 5, 225.00, 20, 6, NULL),

('2026-12-15 11:00:00', 2, 50.00, 4, 1, 4),

('2026-12-15 11:00:00', 3, 105.00, 15, 2, 15),

('2026-12-15 11:00:00', 2, 56.00, 6, 5, 6),

('2026-12-15 11:00:00', 2, 76.00, 21, 8, NULL),

('2026-12-15 12:00:00', 4, 120.00, 2, 3, 2),

('2026-12-15 13:00:00', 2, 50.00, 10, 1, 10),

('2026-12-15 14:00:00', 2, 70.00, 11, 2, 11),

('2026-12-15 15:00:00', 3, 75.00, 16, 1, 16),

('2026-12-15 17:00:00', 3, 105.00, 14, 2, 14),

('2026-12-15 17:00:00', 5, 140.00, 18, 5, 18),

('2026-12-15 19:00:00', 2, 90.00, 23, 6, NULL),

('2026-12-16 08:00:00', 1, 35.00, 20, 2, NULL),

('2026-12-16 08:00:00', 3, 96.00, 2, 7, 2),

('2026-12-16 09:00:00', 2, 70.00, 4, 2, 4),

('2026-12-16 09:00:00', 4, 152.00, 11, 8, 11),

('2026-12-16 10:00:00', 3, 75.00, 23, 1, NULL),

('2026-12-16 12:00:00', 5, 150.00, 13, 3, NULL),

('2026-12-16 13:00:00', 4, 152.00, 10, 8, 10),

('2026-12-16 14:00:00', 2, 70.00, 11, 2, 11),

('2026-12-16 16:00:00', 3, 75.00, 23, 1, NULL),

('2026-12-16 16:00:00', 5, 140.00, 10, 5, 10),

('2026-12-16 19:00:00', 3, 114.00, 16, 8, 16),

('2026-12-17 08:00:00', 2, 50.00, 12, 1, NULL),

('2026-12-17 08:00:00', 5, 190.00, 12, 8, NULL),

('2026-12-17 10:00:00', 2, 64.00, 23, 7, NULL),

('2026-12-17 11:00:00', 2, 50.00, 18, 1, NULL),

('2026-12-17 11:00:00', 1, 35.00, 2, 2, NULL),

('2026-12-17 13:00:00', 5, 140.00, 5, 5, NULL),

('2026-12-17 13:00:00', 4, 152.00, 13, 8, 13),

('2026-12-17 15:00:00', 2, 50.00, 10, 1, 10),

('2026-12-17 15:00:00', 2, 70.00, 16, 2, NULL),

('2026-12-17 17:00:00', 2, 70.00, 18, 2, NULL),

('2026-12-17 19:00:00', 1, 28.00, 3, 5, 3),

('2026-12-17 19:00:00', 1, 38.00, 18, 8, 18),

('2026-12-18 08:00:00', 3, 75.00, 22, 1, NULL),

('2026-12-18 11:00:00', 5, 125.00, 13, 1, 13),

('2026-12-18 11:00:00', 2, 70.00, 16, 2, 16),

('2026-12-18 11:00:00', 5, 140.00, 7, 5, 7),

('2026-12-18 13:00:00', 5, 175.00, 22, 2, NULL),

('2026-12-18 13:00:00', 3, 90.00, 11, 3, NULL),

('2026-12-18 13:00:00', 2, 64.00, 4, 7, 4),

('2026-12-18 17:00:00', 2, 50.00, 10, 1, 10),

('2026-12-18 18:00:00', 2, 76.00, 5, 8, NULL),

('2026-12-18 19:00:00', 2, 50.00, 4, 1, NULL),

('2026-12-18 19:00:00', 2, 70.00, 20, 2, NULL),

('2026-12-18 20:00:00', 2, 60.00, 12, 3, 12);

-- ==========================================
-- 7. RECOMENDACOES
-- ==========================================

INSERT INTO Recomendacoes
(estrelas, texto, autor)
VALUES
(5,
    'O MakerLab é uma plataforma muito bem organizada e facilita bastante o desenvolvimento de projetos. Gostei da praticidade de encontrar as bancadas e ferramentas necessárias para colocar minhas ideias em prática.',
    'Ana Clara'),
(5,
    'A proposta do MakerLab é muito interessante. Ter tudo organizado em um só lugar, desde as ferramentas até o gerenciamento dos projetos e reservas, torna a experiência muito mais prática.',
    'Lucas Almeida'),
(5,
    'Achei incrível a possibilidade de desenvolver projetos e ter acesso a diferentes áreas de criação. O MakerLab incentiva muito a criatividade e torna mais fácil transformar ideias em algo real.',
    'Mariana Souza'),
(4,
    'Uma plataforma muito útil para quem gosta de tecnologia, criação e inovação. A organização das ferramentas e das bancadas facilita bastante na hora de planejar e desenvolver um projeto.',
    'Pedro Henrique'),
(5,
    'O MakerLab tem uma proposta excelente, principalmente para quem está começando a desenvolver projetos. A plataforma é intuitiva, organizada e incentiva as pessoas a aprenderem, experimentarem e criarem coisas novas.',
    'Carolina Martins');

-- ==========================================
-- FIM DA SEED
-- ==========================================