CREATE TABLE Standort(
	SID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Straße varchar(50) NOT NULL,
	Hausnr varchar(5) NOT NULL,
	PLZ varchar(5) NOT NULL,
	Ort varchar(30) NOT NULL
);

CREATE TABLE Arbeitsgruppe(
	AGID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Name varchar(30) NOT NULL,
	Standort int(30) NOT NULL,
	FOREIGN KEY(Standort) REFERENCES Standort(SID)
);

CREATE TABLE Betreuer(
	BID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Vorname varchar(30) NOT NULL,
	Nachname varchar(30) NOT NULL,
	Username varchar(30) NOT NULL UNIQUE,
	Passwort varchar(100) NOT NULL,
	Email varchar(30) NOT NULL UNIQUE,
	TelNr varchar(20) NOT NULL UNIQUE,
	Stellenzeichen varchar(30),
	Zimmernr varchar(10) NOT NULL,
	Vertretung int(30) NULL,
    AGID int(30) NOT NULL,
	FOREIGN KEY(Vertretung) REFERENCES Betreuer(BID),
    FOREIGN KEY(AGID) REFERENCES Arbeitsgruppe(AGID)
);

CREATE TABLE Proband(
	PID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Vorname varchar(30) NOT NULL,
	Nachname varchar(30) NOT NULL,
	Username varchar(30) NOT NULL UNIQUE,
	Passwort varchar(100) NOT NULL,
	Email varchar(30) NOT NULL UNIQUE,
	TelNr varchar(20) NOT NULL UNIQUE,
	Aktenzeichen varchar(10),
	Betreuungsanfang date,
	Betreuungsende date,
    BID int(30) NOT NULL,
    FOREIGN KEY(BID) REFERENCES Betreuer(BID)
);

CREATE TABLE Aktivität(
        Zeitstempel date NOT NULL,
        PID int(30) NOT NULL,
        FOREIGN KEY(PID) REFERENCES Proband(PID),
        PRIMARY KEY (Zeitstempel, PID)
);

CREATE TABLE Termin(
	TID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Beginn datetime NOT NULL,
	Ende datetime NOT NULL,
	Titel varchar(100) NOT NULL,
	Status varchar(1) NOT NULL,
	BID int(30) NOT NULL,
	PID int(30) NOT NULL,
	FOREIGN KEY(BID) REFERENCES Betreuer(BID),
	FOREIGN KEY(PID) REFERENCES Proband(PID)
);

CREATE TABLE Nachricht(
	NID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Zeitstempel datetime NOT NULL,
	Text text NOT NULL,
  BezugID int(30),
  Status varchar(20) NOT NULL,
	BID int(30) NULL,
	PID int(30) NULL,
	BSender tinyint(1) NOT NULL,
	FOREIGN KEY(BID) REFERENCES Betreuer(BID),
	FOREIGN KEY(PID) REFERENCES Proband(PID),
  FOREIGN KEY(BezugID) REFERENCES Nachricht(NID)
);

CREATE TABLE fileupload(
FID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
zeit datetime NOT NULL,
image mediumblob NOT NULL,
Status varchar(20) NOT NULL,
BID int(30) NOT NULL,
PID int(30) NOT NULL,
BSender tinyint(1) NOT NULL,
dateiname varchar(50) NOT NULL,
dateityp char(4) NOT NULL
);
