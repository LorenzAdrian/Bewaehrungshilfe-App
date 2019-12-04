INSERT INTO standort(Straße, Hausnr, PLZ, Ort)
VALUES
('Berliner Straße','55',12345,'Berlin'),
('Hamburger Straße','15',10555,'Berlin');

INSERT INTO arbeitsgruppe(Name, Standort)
VALUES
('Gruppe 1',1),
('Gruppe 2',2);

INSERT INTO Betreuer(Vorname, Nachname, UserName, Passwort, Email, Telnr, Stellenzeichen, Zimmernr, Vertretung, AGID)
VALUES
('Max','Miller','maxmiller','passwort1','max.miller@berlin.de',123456789,'STZ 123','ZNR 1',NULL,1),
('Susanne','Schmidt','susanneschmidt','passwort2','susanne.schmidt@berlin.de',987654321,'STZ 321','ZNR 2',NULL,2);

INSERT INTO Proband(Vorname, Nachname, UserName, Passwort, Email, Telnr, Aktenzeichen, Betreuungsanfang, Betreuungsende, BID)
VALUES
('Norbert','Meyer','norbertmeyer','passwort3','n.meyer@gmx.de',555666777,'AZ 123','2019-02-15','2019-08-15',1),
('Robert','Hansen','roberthansen','passwort4','roha@1und1.de',111222333,'AZ 467','2019-01-09','2019-07-03',1),
('Klaus','Schoppe','klausschoppe','passwort5','kschoppe@gmx.de',88225566,'AZ 890','2019-04-15','2019-10-10',2),
('Herbert','Kling','herbertkling','passwort6','hekli@googlemail.com',121255577,'AZ 135','2019-05-02','2019-11-20',2);

INSERT INTO Aktivität(Zeitstempel, PID)
VALUES
('2019-03-02',1),
('2019-01-27',1),
('2019-05-07',2),
('2019-02-25',3),
('2019-03-08',4),
('2019-04-21',4);

INSERT INTO Termin(Beginn, Ende, Titel, Status, BID, PID)
VALUES
('2019-02-05 15:15:00','2019-02-05 16:15:00','Besprechung Bewährungsauflagen','b',1,1),
('2019-03-17 10:00:00','2019-03-17 10:30:00','Besprechung Arbeitssuche','o',1,2),
('2019-05-03 09:30:00','2019-05-03 10:30:00','Besprechung Drogenentzug','b',2,3),
('2019-01-23 14:00:00','2019-01-23 14:30:00','Besprechung Arbeitsplatzwechsel','o',2,4);
-- o steht für offen (nicht bestätigter Termin)
-- b steht für bestätigter Termin

INSERT INTO Nachricht(Zeitstempel, Text, Status, BID, PID, BSender)
VALUES
('2019-01-17 09:37:12','Hallo, ich habe Probleme bei der Arbeitsplatzsuche',NULL,'neu',1,1,0),
('2019-01-17 10:54:23','Ich werde mit Ihrer Vermittlerin bei der Arbeitsagentur sprechen',1,'neu',1,1,1),
('2019-02-23 15:05:53','Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus.',NULL,'gelesen',1,2,1),
('2019-02-23 16:44:02','Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica',3,'neu',1,2,0);


INSERT INTO Admin(Vorname, Nachname, UserName, Passwort, Email, Telnr, Stellenzeichen, Zimmernr, Vertretung, AGID)
VALUES
('Moritz','Miller','moritzmiller','passwort1','moritz.miller@berlin.de',129456789,'STZ 121','ZNR 1',NULL,1),
