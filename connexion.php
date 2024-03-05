<?php
session_start();

// Vérifiez si l'utilisateur est déjà connecté, auquel cas redirigez-le vers la page admin
if (isset($_SESSION['connecté']) && !empty($_SESSION['user'])) {
  header('location:admin.php');
  exit;
}

// Vérifiez si le formulaire de connexion a été soumis
if (isset($_POST['password'])) {
  // Vérifiez le mot de passe
  $password = $_POST['password'];
  // Vérifiez si le mot de passe est correct
  if ($password == "macrondémission") {
    // Mot de passe correct, marquez l'utilisateur comme connecté
    $_SESSION['connecté'] = true;
    $_SESSION['user'] = 'admin'; // Vous pouvez stocker des informations supplémentaires sur l'utilisateur si nécessaire
    // Redirigez l'utilisateur vers la page admin
    header('location:admin.php');
    exit;
  } else {
    // Mot de passe incorrect
    $erreur = "Mot de passe incorrect";
  }
}

// Inclure le fichier d'en-tête
include "includes/header.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Connexion Admin</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <h1>Connexion Admin</h1>
  <?php if (isset($erreur)) { ?>
    <p style="color: red;"><?php echo $erreur; ?></p>
  <?php } ?>
  <form action="connexion.php" method="post">
    <label for="password">Mot de passe :</label>
    <input type="password" name="password" id="password" required>
    <button type="submit">Connexion</button>
  </form>
</body>
</html>

<?php
?>