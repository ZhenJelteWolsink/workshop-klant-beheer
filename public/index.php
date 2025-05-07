<?php

include_once('../../src/klanten.php');
$customers = new User();
$alleCustomers = $customers->getAllCustomers();
?>  

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>beheerder pagina</title>
    <link rel="stylesheet" href="../../assets/css/styleHome.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/siimple-icons/siimple-icons.css"/>
<body>
    
</body>
</html>
<div class="sidenav">
    <a href="index.php"><i class="si-home"></i> HOME</a>
    <a href="klanten.php"><i class="si-address-book"></i> KLANTEN</a>
    <a href="#"><i class="si-clock"></i> AFSPRAKEN</a>
    <a href="#"><i class="si-clipboard"></i> FACTUREN</a>
    <a href="#"><i class="ingelogd si-circle"></i> @GEBRUIKER</a>
    <i><a href="#" class="ingelogd">Beheerder</a></i>
    <form method="POST" action="index.php">
        <input class="overzicht" type="submit" value="Uitloggen" name="overzicht"><br><br>
        </form>
</div>

<h2>Klanten overzicht</h2>
<table border=1>
  <thead>
    <th>Naam</td>
    <th>Telefoonnummer</td>
    <th>Email</td>
    <th>Adres</td>
    <th>Postcode</td>
  </thead>
  <?php if (!$customers) return; foreach ($customers as $customer): ?> 
    <tr>
      <td><?= $customer['voorNaam'], ' ', $customer['tussenVoegsel'], ' ', $customer['achterNaam'] ?></td>
      <td><?= $customer['telefoonnummer'] ?></td>
      <td><?= $customer['email'] ?></td>
      <td><?= $customer['plaats'], ', ', $customer['straat'], ' ', $customer['huisnummer'], $customer['huisnummerToevoeging'] ?></td>
      <td><?= $customer['postcode'] ?></td>
    </tr> 
  <?php endforeach; ?>