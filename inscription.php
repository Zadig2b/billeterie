<?php
session_start();

if (isset($_SESSION['connecté']) && !empty($_SESSION['user'])) {
  // abort
  header('location:tableau-de-bord.php');
  die;
}

$code_erreur = null;
if (isset($_GET['erreur'])) {
  $code_erreur = (int) $_GET['erreur'];
}


include "includes/header.php";
?>

<form action="src/traitement.php" method="post" onsubmit="return Validation();">
  <h1>Formulaire d'inscription à la Newsletter</h1>
  <label for="nom">Nom :</label>
  <input type="text" id="nom" name="nom" >
  <label for="prenom">Prénom :</label>
  <input type="text" id="prenom" name="prenom" >
  <label for="mail">Mail :</label>
  <input type="email" id="mail" name="mail" >
  <?php if ($code_erreur === 1) { ?>
    <div class="message echec">
      L'Email n'est pas valide.
    </div>
  <?php } ?>
  <label for="password">Mot de passe :</label>
  <input type="password" id="password" name="password" >
  <?php if ($code_erreur === 2) { ?>
    <div class="message echec">
      Le mot de passe doit contenir au moins 8 caractères.
    </div>
  <?php } ?>
  <label for="password2">Vérifier le Mot de passe :</label>
  <input type="password" id="password2" name="password2" >
  <?php if ($code_erreur === 3) { ?>
    <div class="message echec">
      Les mots de passes ne se correspondent pas.
    </div>
  <?php } ?>
  <?php if ($code_erreur === 4) { ?>
    <div class="message echec">
      Tous les champs doivent être remplis.
    </div>
  <?php } ?>
  <div id="message"></div>
  <input type="submit" name="submit" value="S'inscrire">
</form>

<?php
include "includes/footer.php";
?>
