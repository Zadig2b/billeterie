<?php
session_start();

// Vérifie si l'utilisateur est connecté, sinon redirige vers la page de connexion
if (!isset($_SESSION['connecté']) || empty($_SESSION['user'])) {
  header('location:connexion.php');
  exit;
}

// Lecture du fichier CSV et affichage des données
include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Liste des réservations - Page Admin</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Liste des réservations</h1>
  <table border="1">
    <tr>
      <th>Nom</th>
      <th>Prénom</th>
      <th>E-mail</th>
      <th>Téléphone</th>
      <th>Adresse</th>
      <th>Nombre de résérvations</th>
      <th>Tarif</th>
      <th>Pass</th>
      <th>Prix</th>
      <th>Date(s)</th>
      <!-- Ajoutez d'autres en-têtes de colonnes si nécessaire -->
    </tr>
    <?php
    // Lecture du fichier CSV
    $file = 'database.csv';
    if (($handle = fopen($file, 'r')) !== false) {
      while (($data = fgetcsv($handle, 1000, ',')) !== false) {
        echo '<tr>';
        foreach ($data as $value) {
          echo '<td>' . htmlspecialchars($value) . '</td>';
        }
        echo '</tr>';
      }
      fclose($handle);
    } else {
      echo '<tr><td colspan="3">Aucune réservation trouvée.</td></tr>';
    }
    ?>
  </table>
</body>
</html>

<?php
?>
