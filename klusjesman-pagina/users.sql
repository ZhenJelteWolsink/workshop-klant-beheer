CREATE DATABASE users_klusjesman;

CREATE TABLE customers (
  id INTEGER NOT NULL AUTO_INCREMENT,
  voorNaam varchar(20) NOT NULL,
  tussenVoegsel varchar(5) NULL,
  achterNaam varchar(20) NOT NULL,
  telefoonnummer varchar(15) NOT NULL,
  email varchar(40) NOT NULL,
  PRIMARY KEY (id)
);

CREATE TABLE adres (
  customerId INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  plaats varchar(30) NOT NULL,
  straat varchar(30) NOT NULL,
  postcode varchar(10) NOT NULL,
  huisnummer INTEGER NOT NULL,
  huisnummerToevoeging varchar(3) NULL,
  huidigAdres TINYINT DEFAULT 1
);

ALTER TABLE adres ADD CONSTRAINT customer_adres FOREIGN KEY (customerId) REFERENCES customers (id);