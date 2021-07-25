-- Exclusão de possivel banco existente

-- Drop database if exists ThunderSuplementos;

-- Banco de dados
-- create database ThunderSuplementos
-- default character set utf8
-- default collate utf8_general_ci;

use thunde19_ThunderSuplementos;

SET SQL_SAFE_UPDATES = 0;

-- Usuario de banco de dados

-- create user 'ThunderSuplementos'@'localhost' identified with mysql_native_password by '123456';
-- grant all privileges on ThunderSuplementos.* to 'ThunderSuplementos'@'localhost';

-- Tabelas

create table Marca(
	id int primary key auto_increment,
    marca varchar(100)
);

create table Objetivo(
	id int primary key auto_increment,
    objetivo varchar(100)
);

create table Categoria(
	id int primary key auto_increment,
    categoria varchar(100)
);

create table Catalogo(
	id int primary key auto_increment,
    idMarca int not null,
    idObjetivo int not null,
    idCategoria int not null,
    nomeProduto varchar(100) not null,
    capaProduto varchar (200),
    valorProduto decimal(6,2) not null,
    descricao mediumtext not null,
    exibir enum ('S','N') not null,
    promocao enum ('S','N') not null,
    constraint fk_Marca foreign key (idMarca) references Marca(id),
    constraint fk_Objetivo foreign key (idObjetivo) references Objetivo(id),
    constraint fk_Categoria foreign key (idCategoria) references Categoria(id)
);

create table Estoque(
	id int primary key auto_increment,
    idCatalogo int not null,
    validadeProduto date not null,
    quantidadeProduto int not null
);

create table FAQ(
	id int primary key auto_increment,
    pergunta longtext not null,
    resposta longtext not null
);

create table duvida(
	id int primary key auto_increment,
	nome varchar(100) not null,
    email varchar(300) not null,
    telefone varchar(16) not null,
    duvida longtext not null
);

create table vendaCancelada(
	id int primary key auto_increment,
    dataCancelamento date not null
);

   
create table Usuario(
	id int primary key auto_increment,
    nome varchar(50) not null,
    email varchar(200) not null,
    senha varchar(50) not null,
    adm int
);
    
create table Venda(
	id int(11) primary key auto_increment,
    ticket varchar(15) not null,
    idCliente int(11) not null,
    idProduto int(11) not null,
    quantidade int(11) not null,
    valorItem decimal(6,2) not null,
    valorTotalItem decimal(10,2) generated always as ((quantidade * valorItem)) virtual,
    dataVenda date not null,
    endereco varchar(500),
    cep varchar (12),
    telefone varchar(16),
	constraint fk_Cliente foreign key (idCliente) references Usuario(id),
    constraint fk_Produto foreign key (idProduto) references Catalogo(id)
);

create table slide(
	id int primary key auto_increment,
    imagem varchar(200)
);

-- Views

create view viewProduto
as select
	Catalogo.id,
    Catalogo.idMarca,
    Catalogo.idObjetivo,
    Catalogo.idCategoria,
    Marca.marca,
    Objetivo.objetivo,
    Categoria.categoria,
    Catalogo.nomeProduto,
    Catalogo.capaProduto,
    Catalogo.valorProduto,
    Catalogo.descricao,
    Catalogo.promocao
from Catalogo inner join Marca
	on Catalogo.idMarca = Marca.id
inner join Objetivo
	on Catalogo.idObjetivo = Objetivo.id
inner join Categoria
	on Catalogo.idCategoria = Categoria.id;
    
    select * from viewProduto;
       
create view viewEstoque
as select
	Estoque.id,
	Estoque.idCatalogo,
	Catalogo.nomeProduto,
    Estoque.validadeProduto,
    Estoque.quantidadeProduto
from Estoque inner join Catalogo
	on Estoque.idCatalogo = Catalogo.id;

create view viewVenda
as select
	venda.ticket,
    venda.idCliente,
    usuario.nome,
    usuario.email,
    catalogo.nomeProduto,
    catalogo.valorProduto,
    venda.quantidade,
    venda.valorTotalItem,
    venda.dataVenda,
    venda.endereco,
    venda.cep,
    venda.telefone
from venda join usuario
	on venda.idCliente = usuario.id
inner join catalogo
	on venda.idProduto = catalogo.id;

-- Inserts

Insert into Categoria(id, categoria)
values(default, 'Proteínas'),
	(default, 'Carboidratos'),
	(default, 'Aminoácidos'),
	(default, 'Vitaminas'),
	(default, 'Termogênicos'),
	(default, 'Outro');
    
Insert into Marca(id, marca)
values(default, 'Fitpharma'),
	(default, 'Integralmedica'),
	(default, 'Iridium labs'),
	(default, 'Max titaniun'),
	(default, 'Muscle pharm'),
	(default, 'Muscletech'),
	(default, 'Nutrata'),
	(default, 'Optimum nutrition'),
	(default, 'Proteína pura');
    
Insert into Objetivo(id, objetivo)
values(default, 'Massa muscular'),
	(default, 'Energia e resistência'),
	(default, 'Saúde e bem-estar'),
	(default, 'Emagrecimento');


insert into Usuario(nome, email, senha, adm)
	values('Rodrigo', 'rodrigo@gmail.com', '3i84cYZU', 1);

insert into slide(imagem)
values('primeiro.jpg'),
('segundo.jpg'),
('terceiro.jpg');
