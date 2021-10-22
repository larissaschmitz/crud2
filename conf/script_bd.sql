create schema 'ifc';


create table vendedor(
id int not null auto_increment,
nome varchar(45),
usuario varchar(45),
senha varchar(45),
primary key (id)); 

INSERT INTO vendedor VALUES (0234, 'Liz', 'Liz_Webber', '32489');
INSERT INTO vendedor VALUES (0354, 'Erin', 'ErinP', '45983');
INSERT INTO vendedor VALUES (1235, 'Carina', 'LeoneCarina', '35632');
INSERT INTO vendedor VALUES (6503, 'Artemis', 'Art.mis', '37457');
INSERT INTO vendedor VALUES (6392, 'Beatrice', 'BeaTrice_', '46673');


create table atleta(
id int not null auto_increment,
nome varchar(45),
peso float,
altura float,
primary key (id)); 

INSERT INTO atleta VALUES (2952, 'Arthur', '78.9', '1.65');
INSERT INTO atleta VALUES (6382, 'Samuel', '70.3', '1.75');
INSERT INTO atleta VALUES (2952, 'Liz', '65.7', '1.70');
INSERT INTO atleta VALUES (2952, 'Gabi', '71', '1.73');
INSERT INTO atleta VALUES (2952, 'Triz', '60.5', '1.67');


create table pessoa(
id int not null auto_increment,
nome varchar(45),
horaEntrada time,
horaSaida time,
idade int,
primary key (id)); 

INSERT INTO pessoa VALUES (3021, 'Beatrice', '12:08:02', '13:30:20', 21);
INSERT INTO pessoa VALUES (3931, 'Liz', '19:35:13', '21:33:40', 50);
INSERT INTO pessoa VALUES (2401, 'Gilmara', '08:00:22', '18:00:20', 40);
INSERT INTO pessoa VALUES (0149, 'Jade', '14:09:12', '16:39:23', 17);
INSERT INTO pessoa VALUES (9452, 'Ivete', '07:13:04', '07:15:20', 54);


create table time(
id int not null auto_increment,
nome varchar(45),
cidade varchar(45),
pontos int,
dataFundacao date,
primary key (id)); 

INSERT INTO time VALUES (2041, 'São Paulo', 'São Paulo', 27, '1930-01-25');
INSERT INTO time VALUES (9329, 'Flamengo', 'Rio de Janeiro', 32, '1895-11-17');
INSERT INTO time VALUES (3492, 'Corinthians', 'São Paulo', 19, '1910-09-01');
INSERT INTO time VALUES (2945, 'Atletico Mineiro', 'Belo Horizonte', 21, '1908-03-25');
INSERT INTO time VALUES (0429, 'Fluminense', 'Rio de Janeiro', 18, '1902-07-21');


create table peca(
id int not null auto_increment,
descricao varchar(45),
valor double,
fornecedor varchar(45),
garantia date,
primary key (id)); 

INSERT INTO peca VALUES (1929, 'Wicked, uma história do Mágico de Oz.', '250.00', 'Broadway', '2010-08-27');
INSERT INTO peca VALUES (0139, 'Frozen, a história de duas irmãs e neve.', '200.00', 'Disney Musical', '2021-12-27');
INSERT INTO peca VALUES (4603, 'Hamilton, vida de Alexander Hamilton', '600.00', 'Broadway', '2023-08-29');
INSERT INTO peca VALUES (7022, 'O Rei do Show, a criação do Circo do Barnum', '150.00', 'SP Musical', '2022-03-16');
INSERT INTO peca VALUES (9281, 'Hamlet', '200.00', 'Shakesperare Theatre', '2022-08-20');


