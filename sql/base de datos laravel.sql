/*CREA BASE DE DATOS*/
CREATE DATABASE laravel;

/*HACE QUE SE USE LA BASE DE DATOS RECIÉN CREADA*/
USE laravel;

/*CREA TABLA PLAYER*/
CREATE TABLE player(
    id int NOT NULL AUTO_INCREMENT,
    username varchar(255) NOT NULL,
    email varchar(255) NOT NULL UNIQUE,
    password varchar(255) NOT NULL,
    role varchar(255) NOT NULL,
    steamUsername varchar(255),
    originUsername varchar(255),
    epicgamesUsername varchar(255),
    battlenetUsername varchar(255),
    riotUsername varchar(255),
    PRIMARY KEY (id)
);

/*INSERTA REGISTROS EN LA TABLA PLAYER*/
insert into player (username, email, password, role, steamUsername, originUsername, epicgamesUsername, battlenetUsername, riotUsername) values ('admin', 'admin@admin.com', '12345678', 'admin', 'admin01', 'admin01', 'admin01', 'admin01', 'admin01');
insert into player (username, email, password, role, steamUsername, originUsername, epicgamesUsername, battlenetUsername, riotUsername) values ('user', 'user@user.com', '12345678', 'user', 'user01', 'user01', 'user01', 'user01', 'user01');
insert into player (username, email, password, role, steamUsername, originUsername, epicgamesUsername, battlenetUsername, riotUsername) values ('armandohyeah', 'armandoramossanchez@gmail.com', '14651as5fg191a', 'user', 'armandohyeah', 'armandohyeah', 'armandohyeah', 'Armandohyeah-9856', 'armandohyeah');
insert into player (username, email, password, role, epicgamesUsername) values ('martin08', 'martin@gmail.com', 'adsf19qwer', 'user', 'Martin-08');
insert into player (username, email, password, role, steamUsername, originUsername, epicgamesUsername) values ('carmina90', 'carmina@gmail.com', 'asdd1519v1a9sd10f', 'user', 'Carmina-90', 'Carmina90', 'Carmina-90');
insert into player (username, email, password, role, riotUsername) values ('iria5', 'iria@gmail.com', 'er1g5d1fg890', 'user', 'IriA-005');
insert into player (username, email, password, role, steamUsername, riotUsername) values ('MarioRS', 'mrs@gmail.com', '0f98a01f8a18', 'user', 'MarioRS', 'MarioRS');
insert into player (username, email, password, role, battlenetUsername) values ('manolo60', 'manolo6060@gmail.com', 'a9f48e01f5a', 'user', 'Manolo60-8568');
insert into player (username, email, password, role, battlenetUsername, riotUsername) values ('carmen60', 'carmensanchezt@gmail.com', 'as1df91e981f', 'user', 'Carmen60-5542','Carmen-nemraC');
insert into player (username, email, password, role, riotUsername) values ('victorS', 'victor@gmail.com', '1ad9sf1091d', 'user', 'rotcivLITTLE');
insert into player (username, email, password, role, originUsername) values ('BlasLlario', 'blasllario@gmail.com', '1gh91g89h', 'user', 'blcrfe28');
insert into player (username, email, password, role, steamUsername, originUsername, epicgamesUsername, battlenetUsername) values ('sergio-gonzalez', 'sergiogonzalez@gmail.com', '1r4rt98d4s2f', 'user', 'erBilly', 'erBilly', 'erBilly', 'erBilly-8965');

/*CREA TABLA GAME*/
CREATE TABLE game(
    id int NOT NULL AUTO_INCREMENT,
    title varchar(255) NOT NULL,
    thumbnail_url varchar(255) NOT NULL,
    url varchar(255),
    PRIMARY KEY (id)
);

/*INSERTA REGISTROS EN LA TABLA GAME*/
insert into game (title, thumbnail_url, url) values ('Counter Strike', 'https://ih1.redbubble.net/image.1123456637.4226/flat,750x,075,f-pad,750x1000,f8f8f8.jpg', 'https://blog.counter-strike.net/');
insert into game (title, thumbnail_url, url) values ('Titanfall 2', 'https://m.media-amazon.com/images/I/51NdylVTJtL._AC_.jpg', 'https://www.origin.com/esp/es-es/store/titanfall/titanfall-2');
insert into game (title, thumbnail_url, url) values ('Fortnite', 'https://i.pinimg.com/474x/8c/e8/ab/8ce8aba0edcb78be32945243a3d9b4e6.jpg', 'https://www.epicgames.com/fortnite/es-ES/home');
insert into game (title, thumbnail_url, url) values ('Overwatch', 'https://static.wikia.nocookie.net/overwatch/images/c/ca/Overwatch_Portada.jpg/revision/latest?cb=20160523174229&path-prefix=es', 'https://playoverwatch.com/es-es/');
insert into game (title, thumbnail_url, url) values ('League of Legends', 'https://as01.epimg.net/meristation/imagenes/2019/08/07/cover/719414081565191040.jpg', 'https://www.leagueoflegends.com/es-es/');

/*CREA TABLA PARTY*/
CREATE TABLE party(
    id int NOT NULL AUTO_INCREMENT,
    name varchar(255) NOT NULL,
    OwnerID int NOT NULL,
    GameID int NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_OwnerID_Party FOREIGN KEY (OwnerID) REFERENCES player (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_GameID_Party FOREIGN KEY (GameID) REFERENCES game (id) ON DELETE CASCADE ON UPDATE CASCADE
);

/*INSERTA REGISTROS EN LA TABLA PARTY*/
insert into party (name, OwnerID, GameID) values ('Vente a jugar al lolete', 1, 5);
insert into party (name, OwnerID, GameID) values ('lolillos', 6, 5);
insert into party (name, OwnerID, GameID) values ('titanes y parkour', 5, 2);

/*CREA TABLA MESSAGE*/
CREATE TABLE message(
    id int NOT NULL AUTO_INCREMENT,
    message varchar(255) NOT NULL,
    date DATE NOT NULL,
    FromPlayer int NOT NULL,
    PartyID int NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_FromPlayer_Message FOREIGN KEY (FromPlayer) REFERENCES player (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_PartyID_Message FOREIGN KEY (PartyID) REFERENCES party (id) ON DELETE CASCADE ON UPDATE CASCADE
);

/*INSERTA REGISTROS EN LA TABLA MESSAGE*/
insert into message (message, date, FromPlayer, PartyID) values ('¿Alguien para un 1 vs 1?', '2021-12-08', 1, 1);
insert into message (message, date, FromPlayer, PartyID) values ('Cuando quieras', '2021-12-08', 8, 1);
insert into message (message, date, FromPlayer, PartyID) values ('Busco duo en bot', '2021-12-08', 6, 2);
insert into message (message, date, FromPlayer, PartyID) values ('a farmear puntos de armas', '2021-12-08', 5, 3);
insert into message (message, date, FromPlayer, PartyID) values ('Cuenta conmigo.', '2021-12-08', 11, 3);

/*CREA TABLA MEMBER*/
CREATE TABLE member(
    id int NOT NULL AUTO_INCREMENT,
    PartyID int NOT NULL,
    PlayerID int NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_PartyID_Member FOREIGN KEY (PartyID) REFERENCES party (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_PlayerID_Member FOREIGN KEY (PlayerID) REFERENCES player (id) ON DELETE CASCADE ON UPDATE CASCADE
);

/*INSERTA REGISTROS EN LA TABLA MESSAGE*/
insert into member (PartyID, PlayerID) values (1, 1);
insert into member (PartyID, PlayerID) values (1, 4);
insert into member (PartyID, PlayerID) values (1, 5);
insert into member (PartyID, PlayerID) values (1, 7);
insert into member (PartyID, PlayerID) values (1, 8);

/*CREA TABLA FRIENDSHIP*/
CREATE TABLE friendship(
    id int NOT NULL AUTO_INCREMENT,
    Player1_ID int NOT NULL,
    Player2_ID int NOT NULL,
    PRIMARY KEY (id),
    CONSTRAINT FK_Player1ID_Friendship FOREIGN KEY (Player1_ID) REFERENCES player (id) ON DELETE CASCADE ON UPDATE CASCADE,
    CONSTRAINT FK_Player2ID_Friendship FOREIGN KEY (Player2_ID) REFERENCES player (id) ON DELETE CASCADE ON UPDATE CASCADE
);

/*INSERTA REGISTROS EN LA TABLA FRIENDSHIP*/
insert into friendship (Player1_ID, Player2_ID) values (1, 2);
insert into friendship (Player1_ID, Player2_ID) values (1, 3);
insert into friendship (Player1_ID, Player2_ID) values (2, 4);
insert into friendship (Player1_ID, Player2_ID) values (8, 9);
insert into friendship (Player1_ID, Player2_ID) values (1, 9);
insert into friendship (Player1_ID, Player2_ID) values (1, 8);
