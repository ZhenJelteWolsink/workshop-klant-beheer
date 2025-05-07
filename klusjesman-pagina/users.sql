
CREATE DATABASE users_klusjesman;

CREATE TABLE customers (
  id INTEGER NOT NULL AUTO_INCREMENT,
  voorNaam varchar(50) NOT NULL,
  tussenVoegsel varchar(20) NULL,
  achterNaam varchar(50) NOT NULL,
  telefoonnummer varchar(20) NOT NULL,
  email varchar(100) NOT NULL,
  notities varchar(2000) NULL,
  PRIMARY KEY (id)
);

CREATE TABLE adres (
  customerId INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
  plaats varchar(50) NOT NULL,
  straat varchar(50) NOT NULL,
  postcode varchar(20) NOT NULL,
  huisnummer INTEGER NOT NULL,
  huisnummerToevoeging varchar(10) NULL,
  huidigAdres TINYINT DEFAULT 1
);

ALTER TABLE adres ADD CONSTRAINT customer_adres FOREIGN KEY (customerId) REFERENCES customers (id);