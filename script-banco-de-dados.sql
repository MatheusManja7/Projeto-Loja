create database db_Loja;

use db_Loja; 

create table Usuario(
	id_usuario int auto_increment primary key,
    nome varchar(150),
    email varchar(150),
    telefone char(11)
);

select * from Usuario;

create table Produto(
	id_produto int auto_increment primary key,
    nome varchar(150),
    categoria varchar(150),
    marca varchar(150),
    preco decimal(10, 2),
    qtd_estoque int
);

select * from Produto;
