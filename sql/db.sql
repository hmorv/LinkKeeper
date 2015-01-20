DROP DATABASE LinkKeeperDB;
CREATE DATABASE LinkKeeperDB;
USE LinkKeeperDB;

CREATE TABLE Users (
	Name VARCHAR(10) NOT NULL,
	Email VARCHAR(70) NOT NULL,
	Pass VARCHAR(40) NOT NULL,
	PRIMARY KEY (Email)
);

CREATE TABLE Categories (
	IDCategory MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	Owner VARCHAR(50) NOT NULL,
	CATName VARCHAR(25) NOT NULL,
	FOREIGN KEY (Owner) REFERENCES Users(Email) ON UPDATE NO ACTION ON DELETE NO ACTION,
	PRIMARY KEY (IDCategory)
);

CREATE TABLE Links (
	IDCategory MEDIUMINT UNSIGNED NOT NULL,
	LinkName VARCHAR(20) NOT NULL,
	URL VARCHAR(100) NOT NULL,
	FOREIGN KEY(IDCategory) REFERENCES Categories(IDCategory) ON UPDATE NO ACTION ON DELETE NO ACTION
);

CREATE TABLE Logs (
	idConnection MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	Email VARCHAR(70),
	Time datetime,
	IP VARCHAR(20),
	PRIMARY KEY(idConnection)
);
INSERT INTO Users (Name,Email,Pass) VALUES ('Hugo','hugo.moragues@gmail.com',SHA1('1234'));
INSERT INTO Users (Name,Email,Pass) VALUES ('David1','david1@gmail.com',SHA1('1234'));
INSERT INTO Users (Name,Email,Pass) VALUES ('David2','david2@gmail.com',SHA1('1234'));
INSERT INTO Categories (Owner, CATName) VALUES ('hugo.moragues@gmail.com','Noticias');
INSERT INTO Categories (Owner, CATName) VALUES ('hugo.moragues@gmail.com','Blogs');
INSERT INTO Categories (Owner, CATName) VALUES ('hugo.moragues@gmail.com','Juegos');
INSERT INTO Categories (Owner, CATName) VALUES ('hugo.moragues@gmail.com','Varios');
INSERT INTO Categories (Owner, CATName) VALUES ('david1@gmail.com','Blogs');
INSERT INTO Categories (Owner, CATName) VALUES ('david1@gmail.com','Juegos');
INSERT INTO Categories (Owner, CATName) VALUES ('david2@gmail.com','Lectura');
INSERT INTO Categories (Owner, CATName) VALUES ('david2@gmail.com','Cocina');


INSERT INTO Links (IDCategory,LinkName,URL) VALUES (1,'El Mundo','http://www.elmundo.es');
INSERT INTO Links (IDCategory,LinkName,URL) VALUES (1,'El Pais','http://www.elpais.es');
INSERT INTO Links (IDCategory,LinkName,URL) VALUES (1,'Mes3','http://mes3daixa.blogspot.com');
INSERT INTO Links (IDCategory,LinkName,URL) VALUES (2,'Un cientifico en el lado del Mal','http://www.elladodelmal.com');
INSERT INTO Links (IDCategory,LinkName,URL) VALUES (4,'Google','http://google.es');
INSERT INTO Links (IDCategory,LinkName,URL) VALUES (7,'Battle_net','http://www.battle.net');

INSERT INTO Links (IDCategory,LinkName,URL) VALUES (5,'Un cientifico en el lado del Mal','http://www.elladodelmal.com');
INSERT INTO Links (IDCategory,LinkName,URL) VALUES (6,'Google','http://google.es');
INSERT INTO Links (IDCategory,LinkName,URL) VALUES (8,'Battle_net','http://www.battle.net');

