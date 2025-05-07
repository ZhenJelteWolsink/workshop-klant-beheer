<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>klanten</title>
    <link rel="stylesheet" href="../../assets/css/styleBeheerderpagina.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>

<body>
    

<div class="sidenav">
    <a href="home.html"><i class="fa fa-home" aria-hidden="true"></i> Home</a>
    <hr>
    <a href="klanten.html"><i class="fa fa-users" aria-hidden="true"></i> Klanten</a>
    <a href="afspraken.php"><i class="fa fa-calendar" aria-hidden="true"></i> Afspraken</a>
    <a href="facturen.html"><i class="fa fa-file-text-o" aria-hidden="true"></i> Facturen</a>
    <div class="gebruiker">
        <hr>
        <i class="fa fa-user-circle-o" aria-hidden="true"></i>
      </div>
</div>
<?php
  require_once('../../klusjesman-pagina/src/user.php');
  $user = new User();
  $customers = $user->getAllCustomers();
?>
<table border=1>
    <thead>
      <td>Naam</td>
      <td>Telefoonnummer</td>
      <td>Email</td>
      <td>Adres</td>
      <td>Postcode</td>
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
  </table>

</body>
</html>