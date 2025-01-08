DROP DATABASE if EXISTS barche;
CREATE DATABASE barche;
USE barche;

CREATE TABLE Socio(
     num_tessera INT PRIMARY KEY AUTO_INCREMENT,
     nomeSc VARCHAR(255) NOT NULL,
     cognome VARCHAR(255) NOT NULL,
     eta INT  NOT NULL ,
     tipo VARCHAR(255) NOT NULL,
     esperienza INT NOT NULL,
      username  VARCHAR(255),
   
     pass VARCHAR(255) NOT NULL
);



CREATE TABLE Barca(
idBarca INT PRIMARY KEY AUTO_INCREMENT,
     nome VARCHAR(255) NOT NULL,
    
     colore VARCHAR(255) NOT NULL
     
      
);
CREATE TABLE Prenotazione(
     idPrenotazione INT PRIMARY KEY AUTO_INCREMENT,
     num_tessera INT,
     idBarca INT,
     data_prenotazioneIN DATE,
     data_prenotazioneFIN DATE,
     FOREIGN KEY (num_tessera) REFERENCES Socio(num_tessera),
     FOREIGN KEY (idBarca) REFERENCES Barca(idBarca)
     
);

INSERT INTO Socio(nomeSc,cognome,eta,esperienza,tipo,username,pass)
 VALUES
('esposita','cognome1',20,3,'user','TEE01',SHA('abcd.1234')),
('maura','cognome2',22,5,'admin','TEE02',SHA('abcd.1234')),
('maurio','cognome3',35,8,'user','TEE03',SHA('abcd.1234')),
('lucas','cognome4',18,10,'admin','TEE04',SHA('abcd.1234'))
;

INSERT INTO Barca(nome,colore)
 VALUES
('esposita','rosso'),
('maura','blu'),
('maurio','bianco'),
('lucas','viola')
;

INSERT INTO Prenotazione(num_tessera,idBarca,data_prenotazioneIN,data_prenotazioneFIN)
    VALUE (1,1,NULL,NULL),
    (2,2,NULL,NULL),
    (3,3,NULL,NULL),
    (4,4,NULL,NULL)
;



