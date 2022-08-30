-- create database sistemaDB;
-- use sistemaDB;
-- estrutura da tabela de produtos
create table tbprodutos(
id_produto int(11) not null,
id_tipo_produto int  not null,
descri_produto varchar(100) not null,
resumo_produto varchar(1000) default null,
valor_produto decimal(10,2) default null,
imagem_produto varchar(50) default null,
destaque_produto enum('Sim', 'Não') not null
)engine=InnoDB default charset=utf8;

-- Extraindo dados da tabela `tbprodutos`
INSERT INTO `tbprodutos` (`id_produto`, `id_tipo_produto`, `descri_produto`, `resumo_produto`, `valor_produto`, `imagem_produto`, `destaque_produto`) VALUES
(1, 1, 'Picanha ao alho', ' Esta e a combinação do sabor inconfundível da picanha com o aroma acentuado do alho. Condimento que casa perfeitamente com este corte nobre', '29.90', 'picanha_alho.jpg', 'Sim'),
(2, 1, 'Fraldinha', 'Uma das carnes mais suculentas do cardápio. Requintada, com maciez particular e pouca gordura, e uma carne que chama atenção pela sua textura', '29.90', 'fraldinha.jpg', 'Não'),
(3, 1, 'Costela', 'A mais procurada! Feita na churrasqueira ou ao fogo de chão, e preparada por mais de 08 horas para atingir o ponto ideal e torna-la a referência de nossa churrascaria', '29.90', 'costelona.jpg', 'Sim'),
(4, 1, 'Cupim', 'Uma referência especial dos paulistas. Bastante gordurosa e macia, o cupim e uma carne fibrosa, que se desfia quando bem preparada ', '29.90', 'cupim.jpg', 'Sim'),
(5, 1, 'Picanha ', 'Considerada por muitos como a mais nobre e procurada carne de churrasco, a picanha pode ser servida ao ponto , mal passada ou bem passada. Suculenta e com sua característica capa de gordura', '29.90', 'picanha_sem.jpg', 'Não'),
(6, 2, 'Apfelstrudel', 'Sobremesa tradicional austro-germânica e um delicioso folhado de maça e canela com sorvete', '29.90', 'strudel.jpg', 'Não'),
(7, 1, 'Alcatra', 'Carne com muitas fibras, porém macia. Sua lateral apresenta uma boa parcela de gordura. Equilibrando de forma harmônica maciez e fibras.', '29.90', 'alcatra_pedra.jpg', 'Não'),
(8, 1, 'Maminha', 'Vem da parte inferior da Alcatra. E uma carne com fibras, porém macia e saborosa.', '29.90', 'maminha.jpg', 'Não'),
(9, 2, 'Abacaxi', 'Abacaxi assado com canela ao creme de leite condensado ', '29.90', 'abacaxi.jpg', 'Não'),
(10, 3, 'Cola-cola', 'Refrescar seu dia com uma dessas  ', '9.90', 'coquinha.jpg', 'Não');


select * from tbprodutos;
update tbprodutos set deletado = null where id_produto between 1 and 9;

-- estrutura tbclientes

create table tbcliente(
id_cliente int(11) primary key auto_increment not null,
nome_cliente varchar(60) not null,
cpf_cliente varchar(11) not null unique,
email_cliente varchar(32) not null unique,
telefone_cliente bigint(11) not null 
)engine=InnoDB default charset=utf8;

-- Inserindo dados da tabela `tbcliente`

insert into `tbcliente` (`id_cliente`, `nome_cliente`, `cpf_cliente`, `email_cliente`, `telefone_cliente`)
values (default,'cliente', 12345678910, 'cliente@gmail.com', 11921239865);

insert into `tbcliente` (`id_cliente`, `nome_cliente`, `cpf_cliente`, `email_cliente`, `telefone_cliente`)
values (default,'jose', 36985245863, 'jose@gmail.com', 34587356825),
(default,'wellington', 36515675268, 'well@gmail.com', 64851325985),
(default,'maria', 65486597526, 'maria@gmail.com', 35421597356);

select * from tbcliente order by nome_cliente asc;
select * from tbcliente;

-- estrutura tbreservas
create table tbreserva(
id_reserva int(11) primary key auto_increment not null,
id_cliente_reserva int(11) not null,
data_reserva date not null,
hora_reserva time not null,
numero_mesa_reserva int (11) not null,
numero_pessoas_reserva int (11) not null,
motivo_reserva varchar(100) null,
motivo_recusa varchar(100) null,
valor_reserva decimal(10,2) not null,
status_reserva varchar(20) null default 'Em análise',
parecer_reserva varchar(100) null
)engine=InnoDB default charset=utf8;

-- Inserindo dados da tabela `tbreserva`

insert into tbreserva(id_reserva, id_cliente_reserva, data_reserva, hora_reserva, numero_mesa_reserva, 
numero_pessoas_reserva, motivo_reserva, motivo_recusa, valor_reserva, status_reserva)
values (6,8,"2022-09-10", "20:00:00", 4, 5, "Aniversário", "" ,70.90, "Confirmada"),
(9,1,"2022-10-09", "13:00:00", 10, 6, "Comemoração", "" ,89.90, default);

select * from tbreserva;

-- estrutura da tabela tbtipos

create table tbtipos(
id_tipo int(11) not null,
sigla_tipo varchar(3) not null,
rotulo_tipo varchar(15) not null
)engine=InnoDB default charset=utf8;

-- Extraindo dados da tabela `tbtipos`
INSERT INTO `tbtipos` (`id_tipo`, `sigla_tipo`, `rotulo_tipo`) VALUES
(1, 'chu', 'Churrasco'),
(2, 'sob', 'Sobremesa'),
(3,'beb','bebidas');

select * from tbtipos;

-- estrutura da tabela tbusuários

create table tbusuarios(
id_usuario int(11) primary key auto_increment not null,
login_usuario varchar(30) not null unique,
senha_usuario varchar(8) not null,
id_nivel_usuario int(11) not null
)engine=InnoDB default charset=utf8;

INSERT INTO `tbusuarios` (`id_usuario`, `login_usuario`, `senha_usuario`, `id_nivel_usuario`) VALUES
(1, 'senac', '1234', '1'),
(2, 'joao', '4568', '2'),
(4, 'well', '1234', '3');

INSERT INTO `tbusuarios` (`id_usuario`, `login_usuario`, `senha_usuario`, `id_nivel_usuario`) VALUES
(3, 'pepino', '12345', '2');


create table tbnivel(
id_nivel int(11) primary key auto_increment not null,
nome_nivel varchar(20) not null
)engine=InnoDB default charset=utf8;

-- Inserindo dados da tabela `tbnivel`

insert into tbnivel (id_nivel, nome_nivel)
values (1,'Supervisor'),(2,'Comercial'),(3,'Cliente'),(4,'Desligado');

select * from tbnivel;

select * from tbusuarios;
select * from tbusuarios order by login_usuario asc;

update tbprodutos set deletado = null where id_produto between 1 and 9;

select * from tbprodutos;
update tbprodutos set deletado = null where id_produto between 1 and 9;

select * from tbtipos;
update tbtipos set deletado = null where id_tipo between 1 and 2;

select * from tbtipos order by sigla_tipo asc;

select * from tbusuarios;
update tbusuarios set deletado = null where id_usuario between 1 and 2;


select * from vw_tbprodutos order by descri_produto asc;
select * from tbusuarios order by login_usuario asc;

select * from tbusuarios order by login_usuario asc;

-- índices da tabela tbprodutos

alter table tbprodutos
add primary key(id_produto),
add key id_tipo_produto_fk(id_tipo_produto);

-- índices da tabela tbtipos

alter table tbtipos
add primary key(id_tipo);

-- índices da tabela tbusuarios

alter table tbusuarios
add primary key(id_usuario);

-- auto incremento da  tbprodutos

alter table tbprodutos
modify id_produto int(11) not null auto_increment, auto_increment=10;

-- auto incremento da  tbtipos

alter table tbtipos
modify id_tipo int(11) not null auto_increment, auto_increment=3;

-- auto incremento da  tbusuarios

alter table tbusuarios
modify id_usuario int(11) not null auto_increment, auto_increment=5;

-- restrição (constraint) da tabela produtos

alter table tbprodutos
add constraint id_tipo_produto_fk foreign key (id_tipo_produto)
references tbtipos (id_tipo) on delete no action  on update no action;

create view vw_tbprodutos as 
select p.id_produto,
      p.id_tipo_produto,
      t.sigla_tipo,
      t.rotulo_tipo,
      p.descri_produto,
      p.resumo_produto,
      p.valor_produto, 
      p.imagem_produto, 
      p.destaque_produto
from tbprodutos p
join tbtipos t 
where p.id_tipo_produto = t.id_tipo;

select * from vw_tbprodutos order by descri_produto asc;

create view vw_tbreserva as
select r.id_reserva,
		c.id_cliente,
        r.data_reserva,
        r.hora_reserva,
        r.numero_mesa_reserva,
        r.numero_pessoas_reserva,
        r.motivo_reserva,
        r.motivo_recusa,
        r.valor_reserva,
        r.status_reserva,
        r.parecer_reserva
	from tbreserva r
    join tbcliente c
    where r.id_reserva = c.id_cliente;
        
	
select * from vw_tbreserva order by numero_mesa_reserva asc;
commit;