DROP DATABASE LinkKeeperDB;
CREATE DATABASE LinkKeeperDB;
USE LinkKeeperDB;

CREATE TABLE Users (
	-- Name es en realidad nickname, por eso debe ser único
	Name VARCHAR(20) NOT NULL UNIQUE,
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
	IDLink MEDIUMINT UNSIGNED NOT NULL AUTO_INCREMENT,
	LinkName VARCHAR(100) NOT NULL,
	URL VARCHAR(100) NOT NULL,
	CATParent MEDIUMINT UNSIGNED NOT NULL,
	PRIMARY KEY(IDLink),
	FOREIGN KEY(CATParent) REFERENCES Categories(IDCategory) ON UPDATE NO ACTION ON DELETE NO ACTION
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
INSERT INTO Categories (Owner, CATName) VALUES ('hugo.moragues@gmail.com','Buscadores');
INSERT INTO Categories (Owner, CATName) VALUES ('david1@gmail.com','Blogs');
INSERT INTO Categories (Owner, CATName) VALUES ('david1@gmail.com','Juegos');
INSERT INTO Categories (Owner, CATName) VALUES ('david1@gmail.com','Películas');
INSERT INTO Categories (Owner, CATName) VALUES ('david1@gmail.com','Foros');
INSERT INTO Categories (Owner, CATName) VALUES ('david2@gmail.com','Lectura');
INSERT INTO Categories (Owner, CATName) VALUES ('david2@gmail.com','Cocina');
INSERT INTO Categories (Owner, CATName) VALUES ('david2@gmail.com','Juegos - Steam');
INSERT INTO Categories (Owner, CATName) VALUES ('david2@gmail.com','Programación');

-- inserts hugo
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('El Mundo','http://www.elmundo.es',1);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('El Pais','http://www.elpais.es',1);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('ABC','http://www.abc.es',1);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Público','http://www.publico.es',1);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Mes3','http://mes3daixa.blogspot.com',2);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Un cientifico en el lado del Mal','http://www.elladodelmal.com',2);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Google','http://google.es',4);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Battle_net','http://www.battle.net',3);


-- inserts david1
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Un cientifico en el lado del Mal','http://www.elladodelmal.com',5);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('series.ly','http://series.ly/',7);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Battle_net','http://www.battle.net',6);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Hacking Ético','http://hacking-etico.com/',5);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('forocoches','http://www.forocoches.com/',8);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Battle_net','http://www.battle.net',6);

-- inserts david2
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Wordpress IAW','http://andreurigo.eu/wp/xerrada-sobre-wordpress-a-sant-josep-obrer/',12);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Zinio','http://es.zinio.com/',9);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('canal cocina','http://canalcocina.es/',10);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Counter Strike GO - Steam','http://store.steampowered.com/app/10/?l=spanish',11);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('Jami Oliver','http://www.jamieoliver.com/',9);
INSERT INTO Links (LinkName,URL,CATParent) VALUES ('CodeCademy','http://www.codecademy.com/learn',12);

