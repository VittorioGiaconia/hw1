create database motorline;

use motorline;

create table users(
    nome char(255) not null,
    cognome char(255) not null,
    username char(255) primary key,
    email char(255) not null,
    password char(255) not null
) Engine='InnoDB';

create table posts (
    autore varchar(255) ,
    titolo varchar(255) primary key,
    contenuto varchar(255) not null,
    url_img varchar(255) not null
    ) Engine='InnoDB';

create table collegamento(
    username varchar(255),
    titolo varchar(255), 
    index usernamex(username),
    index titolox(titolo), 
    foreign key(username) references users(username) on update cascade,
    foreign key(titolo) references posts(titolo) on update cascade, 
    primary key(username,titolo)
    ) engine='Innodb';

    