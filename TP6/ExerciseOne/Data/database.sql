create database cellphonesDB;
use cellphonesDB;

create table Cellphones
(
    id_cellphone int auto_increment,
    code int not null unique,
    brand varchar(30),
    model varchar(30),
    price int,
    CONSTRAINT pk_id_cellphone PRIMARY KEY (id_cellphone)
);

INSERT INTO Cellphones (code, brand, model, price) VALUES 
(666, 'Samsung', 'Galaxy', 800),
(888, 'Nokia', 'Lumia', 500),
(656, 'Huawei', 'P9', 600);