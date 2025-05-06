<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    require_once("../src/users.php");

    if (isset($_POST['submit'])) {
      $voornaam = $_POST['voornaam'];
      $tussenvoegsel = $_POST['tussenvoegsel'];
      $achternaam = $_POST['achternaam'];
      $telefoonnummer = $_POST['telefoonnummer'];
      $email = $_POST['email'];
      $plaats = $_POST['plaats'];
      $postcode = $_POST['postcode'];
      $straat = $_POST['straat'];
      $huisnummer = $_POST['huisnummer'];
      $huisnummerToevoeging = $_POST['huisnummerToevoeging'];
    }
  ?>
  <form method="post">
    <label for="naam">Naam</label><br>
    <input type="text" autocomplete="off" name="voornaam" id="naam" placeholder="Voornaam" value="<?= $voornaam ?? null ?>">
    <input type="text" autocomplete="off" name="tussenvoegsel" id="tussenvoegsel" placeholder="Tussenvoegsel" value="<?= $tussenvoegsel ?? null ?>">
    <input type="text" autocomplete="off" name="achternaam" id="achternaam" placeholder="Achternaam" value="<?= $achternaam ?? null ?>"><br><br>

    <?php 
      if (isset($_POST['submit'])) {
        if ($_POST['voornaam'] == "") {
          echo "Voornaam is leeg<br><br>";
          unset($_POST['submit']);
        }
      }

      if (isset($_POST['submit'])) {
        if ($_POST['achternaam'] == "") {
          echo "Achternaam is leeg<br><br>";
          unset($_POST['submit']);
        }
      }
    ?>

    <label for="telefoonnummer">Telefoon</label><br>
    <input type="text" autocomplete="off" name="telefoonnummer" id="telefoonnummer" placeholder="Telefoonnummer" value="<?= $telefoonnummer ?? null ?>"><br><br>

    <?php 
      if (isset($_POST['submit'])) {
        if ($_POST['telefoonnummer'] == "") {
          echo "Telefoonnummer is leeg<br><br>";
          unset($_POST['submit']);
        }
      }
    ?>
    
    <label for="email">E-mailadres</label><br>
    <input type="email" name="email" id="email" placeholder="E-mailadres" value="<?= $email ?? null ?>"><br><br>

    <?php
       if (isset($_POST['submit'])) {
        if ($_POST['email'] == "") {
          echo "E-mailadres is leeg<br><br>";
          unset($_POST['submit']);
        }
      }
    ?>

    <label for="adres">Adres</label><br>
    <input type="text" autocomplete="off" name="plaats" id="plaat" placeholder="Plaats" value="<?= $plaats ?? null ?>">
    <input type="text" autocomplete="off" name="postcode" id="postcode" placeholder="Postcode" value="<?= $postcode ?? null ?>"><br>
    <input type="text" autocomplete="off" name="straat" id="straat" placeholder="Straat" value="<?= $straat ?? null ?>">
    <input type="text" autocomplete="off" name="huisnummer" id="Huisnummer" placeholder="Huisnummer" value="<?= $huisnummer ?? null ?>">
    <input type="text" autocomplete="off" name="huisnummerToevoeging" id="huisnummerToevoeging" placeholder="Toevoeging" value="<?= $huisnummerToevoeging ?? null ?>"><br><br>

    <?php 
       if (isset($_POST['submit'])) {
        if ($_POST['plaats'] == "") {
          echo "Plaats is leeg<br><br>";
          unset($_POST['submit']);
        }
      }
      if (isset($_POST['submit'])) {
        if ($_POST['straat'] == "") {
          echo "Straat is leeg<br><br>";
          unset($_POST['submit']);
        }
      }
      if (isset($_POST['submit'])) {
        if ($_POST['huisnummer'] == "") {
          echo "Huisnummer is leeg<br><br>";
          unset($_POST['submit']);
        }
      }
    ?>

    <input type="submit" name="submit" value="Toevoegen">
  </form>

  <?php 
    $user = new User();
    if (isset($_POST['submit'])) {
      $user->insertUser($voornaam, $tussenvoegsel, $achternaam, $telefoonnummer, $email, $plaats, $straat, $huisnummer, $huisnummerToevoeging, $postcode);


      unset($_POST['voornaam']);
      unset($_POST['tussenvoegsel']);
      unset($_POST['achternaam']);
      unset($_POST['email']);
      unset($_POST['plaats']);
      unset($_POST['postcode']);
      unset($_POST['straat']);
      unset($_POST['huisnummer']);
      unset($_POST['huisnummerToevoeging']);
      unset($_POST['submit']);
      header('refresh: 0');
    }
    
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