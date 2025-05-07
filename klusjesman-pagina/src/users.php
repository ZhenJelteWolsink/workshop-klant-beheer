<?php
require_once('database.php');

class User extends Database {
  public function insertUser($voornaam, $tussenvoegsel, $achternaam, $telefoonnummer, $email, $plaats, $straat, $huisnummer, $huisnummerToevoeging, $postcode) {
    $query = "SELECT * FROM adres WHERE straat = ? AND huisnummer = ? AND huidigAdres = 1;";
    $params = [$straat, $huisnummer];

    if (isset(parent::voerQueryUit($query, $params)[0])) return;

    $query = "START TRANSACTION;
    INSERT INTO customers (voornaam, tussenvoegsel, achternaam, telefoonnummer, email) VALUES (?, ?, ?, ?, ?);

    SET @lastCustomerId = LAST_INSERT_ID();

    INSERT INTO adres (customerId, plaats, straat, huisnummer, huisnummerToevoeging, postcode) VALUES (@lastCustomerId, ?, ?, ?, ?, ?);
    
    COMMIT;";

    $params = [$voornaam, $tussenvoegsel, $achternaam, $telefoonnummer, $email, $plaats, $straat, $huisnummer, $huisnummerToevoeging, $postcode];

    return parent::voerQueryUit($query, $params);
  }

  public function getAllCustomers() {
    $query = "SELECT * FROM customers c INNER JOIN adres a ON a.customerId = c.id;";

    return parent::voerQueryUit($query);
  }  

  public function searchUser($voornaam) {
    $query = "SELECT * FROM customers WHERE voorNaam = :voornaam";
    return parent::voerQueryUit($query, [':voornaam' => $voornaam]);
  }
}