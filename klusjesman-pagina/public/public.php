<?php
 require_once("../src/users.php");
 $user = new User();
 $customers = $user->getAllCustomers();
 ?>

<div class="search">
  <form method="get">
    <input type="text" name="nameOfCustomer">
    <input type="button" value="Zoek" name="search">
  </form>
</div>

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


  <?php
  if (isset($_GET['naam'])) {
    $voornaam = $_GET['nameOfCustomer'];

    $result = $user->searchUser($voornaam);

    if ($result) {
      $users = [];
        echo "<table>";
        foreach ($result as $user) {
            echo "<tr><td>{$user['voorNaam']}</td><td>{$user['achternaam']}</td></tr>";
        }
        echo "</table>";
    } else {
        echo "Geen resultaten gevonden.";
    }
}

  
  ?>