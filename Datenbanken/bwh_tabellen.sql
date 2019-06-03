--Achtung: Beim Kopieren in SQL dürfen die Kommentare nicht übernommen werden.
--Jede Tabelle bitte einzeln der Reihe nach einfügen.
----------------------------------------------------------

--Tabellen werden erstellt

CREATE TABLE Standort(
	SID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Straße varchar(50) NOT NULL,
	Hausnr varchar(5) NOT NULL,
	PLZ int(5) NOT NULL,
	Ort varchar(30) NOT NULL
)

CREATE TABLE Arbeitsgruppe(
	AGID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Name varchar(30) NOT NULL,
	Standort int(30) NOT NULL,
	FOREIGN KEY(Standort) REFERENCES Standort(SID)
)

CREATE TABLE Betreuer(
	BID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Vorname varchar(30) NOT NULL,
	Nachname varchar(30) NOT NULL,
	Email varchar(30) NOT NULL UNIQUE,
	TelNr int(15) NOT NULL UNIQUE,
	Zimmernr varchar(10) NOT NULL,
	Stellenzeichen varchar(10) NOT NULL UNIQUE,
	Vertretung int(30) NULL, --muss nach Erstellung aller Betreuer eingefügt werden
        AGID int(30) NOT NULL UNIQUE,
	FOREIGN KEY(Vertretung) REFERENCES Betreuer(BID) 
        FOREIGN KEY(AGID) REFERENCES Arbeitsgruppe(AGID)

)

CREATE TABLE Proband(
	PID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Vorname varchar(30) NOT NULL,
	Nachname varchar(30) NOT NULL,
	Email varchar(30) NOT NULL UNIQUE,
	TelNr int(15) NOT NULL UNIQUE,
	Aktenzeichen varchar(10) NOT NULL UNIQUE,
	Betreuungsende varchar(20) NOT NULL,
        BID int(30) NOT NULL,
        FOREIGN KEY(BID) REFERENCES Betreuer(BID)
)

CREATE TABLE Aktivität(
        Zeitstempel varchar(20) NOT NULL,
        PID int(30) NOT NULL 
        FOREIGN KEY (PID) REFERENCES Proband(PID),
        PRIMARY KEY (Zeitstempel, PID)
)


CREATE TABLE Termin(
	TID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Beginn DATETIME NOT NULL,
	Ende varchar(20) NOT NULL,
	Titel varchar(100) NOT NULL,
	Status varchar(20) NOT NULL,
	--Farbe als Hexadezimal oder als Text speichern?
	BID int(30) NOT NULL,
	PID int(30) NOT NULL,
	FOREIGN KEY(BID) REFERENCES Betreuer(BID),
	FOREIGN KEY(PID) REFERENCES Proband(PID)
)

CREATE TABLE Nachricht(
	NID int(30) NOT NULL PRIMARY KEY AUTO_INCREMENT,
	Zeitstempel varchar(20) NOT NULL,
	Text varchar(5000) NOT NULL,
        BezugsID int(30) NOT NULL,
        Status varchar(20) NOT NULL,
	SenderBID int(30) NULL,
	EmpfängerBID int(30) NULL,
	SenderPID int(30) NULL,
	EmpfängerPID int(30) NULL,
	FOREIGN KEY(SenderBID) REFERENCES Betreuer(BID),
	FOREIGN KEY(SenderPID) REFERENCES Proband(PID),
	FOREIGN KEY(EmpfängerBID) REFERENCES Betreuer(BID),
	FOREIGN KEY(EmpfängerPID) REFERENCES Proband(PID),
        FOREIGN KEY(BezugsID) REFERENCES Nachricht(PID) 
)





----------------------------------------------------------

--Trigger werden erstellt
--!!NICHT RELEVANT

DELIMITER //
CREATE TRIGGER trig_nachricht_check BEFORE INSERT ON Nachricht
	FOR EACH ROW    
BEGIN 
	
	IF new.SenderPID<>NULL AND new.SenderBID<>NULL THEN
		signal sqlstate '45000' set message_text = 
					'Es darf nur einen Sender geben.';
	END iF;
	
	IF new.SenderPID=NULL AND new.SenderBID=NULL THEN
		signal sqlstate '45000' set message_text = 
					'Es muss einen Sender geben.';
	END iF;
	
	IF new.EmpfängerPID<>NULL AND new.EmpfängerBID<>NULL THEN
		signal sqlstate '45000' set message_text = 
					'Es darf nur einen Empfänger geben.';
	END iF;
	
	IF new.EmpfängerPID=NULL AND new.EmpfängerBID=NULL THEN
		signal sqlstate '45000' set message_text = 
					'Es muss einen Empfänger geben.';
	END iF;
	
    
END//
DELIMITER ;


--Beispieldatensätze

INSERT INTO Proband(Vorname, Nachname, Email, TelNr,Aktenzeichen, Betreuungsende)
VALUES('Max', 'Maier', 'mm@gmail.com', 0174782839, 'MM163', '1970-01-01 00:00:01')

INSERT INTO Betreuer(Vorname, Nachname, Email, Telnr, Zimmernr, Vertretung, Stellenzeichen)
VALUES('Maria', 'Müller', 'mamue@gmail.com', 0175612839, '104', NULL, 'BWH Pers 2')




















