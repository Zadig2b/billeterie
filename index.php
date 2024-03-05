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

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de réservation Music Vercos Festival</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<p id="totalPrice">Prix Total : </p>

  <form action="traitement.php" id="inscription" method="POST">
  <input type="hidden" name="totalPrice2" id="totalPriceInput" value="">

    <fieldset id="reservation" class="active">
      <legend>Réservation</legend>
      <h3>Nombre de réservation(s) :</h3>
      <input type="number" min="1" max="50" name="nombrePlaces" id="NombrePlaces" required>
      <h3>Réservation(s) en tarif réduit</h3>
      <input type="checkbox" name="tarifReduit" id="tarifReduit">
      <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

      <input type="hidden" name="passSelection" id="passSelection">

      <h3>Choisissez votre formule :</h3>
      <input type="radio" name="passRadio" id="pass1jour" data-price="40">
      <label for="pass1jour">Pass 1 jour : 40€</label>

      <!-- Si case cochée, afficher le choix du jour -->
<section id="pass1jourDate">
    <input type="radio" name="choixJour" id="choixJour1" value="01/07">
    <label for="choixJour1">01/07</label>

    <input type="radio" name="choixJour" id="choixJour2" value="02/07" >
    <label for="choixJour2">02/07</label>

    <input type="radio" name="choixJour" id="choixJour3" value="03/07" >
    <label for="choixJour3">03/07</label>
</section>

      <input type="radio" name="passRadio" id="pass2jours" data-price="70">
      <label for="pass2jours">Pass 2 jours : 70€</label>



      <!-- Si case cochée, afficher le choix des jours -->
      <section id="pass2joursDate">
        <input type="radio" name="choixJour" id="choixJour12" value="01/07 et 02/07">
        <label for="choixJour12">du 01/07 au 02/07</label>
        <input type="radio" name="choixJour" id="choixJour23" value="02/07 et 03/07">
        <label for="choixJour23">du 02/07 au 03/07</label>
      </section>

      <input type="radio" name="passRadio" id="pass3jours" data-price="100">
      <label for="pass3jours">Pass 3 jours : 100€</label>
      <input type="hidden" name="choixJour" id="choixJour123" value="du 01/07 au 03/07">



      <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

      <p class="bouton" onclick="suivant('options')">Suivant</p>
    </fieldset>

    <!------------------------------------------- FIN DE LA SECTION RESERVATION  ------------------------------------------------>

<fieldset id="options" class="inactive">
<legend>Options</legend>
<h3>Réserver un emplacement de tente :</h3>
<input type="checkbox" id="tenteNuit1" name="options[tenteNuit][01/07]" data-price="5">
<label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
<input type="checkbox" id="tenteNuit2" name="options[tenteNuit][02/07]" data-price="5">
<label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
<input type="checkbox" id="tenteNuit3" name="options[tenteNuit][03/07]" data-price="5">
<label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
<input type="checkbox" id="tenteNuits4" name="options[tenteNuit][01/07,02/07,03/07]" data-price="12">
<label for="tenteNuit4">Pour les 3 nuits (12€)</label>

<h3>Réserver un emplacement de camion aménagé : </h3>
<input type="checkbox" id="vanNuit1" name="options[vanNuit][01/07]" value="01/07" data-price="5">
<label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
<input type="checkbox" id="vanNuit2" name="options[vanNuit][02/07]" value="02/07" data-price="5">
<label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
<input type="checkbox" id="vanNuit3" name="options[vanNuit][03/07]" value="03/07" data-price="5">
<label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
<input type="checkbox" id="vanNuits4" name="options[vanNuit][01/07,02/07,03/07]" value="01/07,02/07,03/07" data-price="12">
<label for="vanNuits4">Pour les 3 nuits (12€)</label>



    <h3>Venez-vous avec des enfants ?</h3>
    <input type="checkbox" name="options[enfantsOui]"><label for="enfantsOui">Oui</label>
    <input type="checkbox" name="options[enfantsNon]"><label for="enfantsNon">Non</label>

    <!-- Si oui, afficher : -->
    <section>
        <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
        <label for="options[nombreCasquesEnfants]">Nombre de casques souhaités :</label>
        <input type="number" name="options[nombreCasquesEnfants]" id="options[nombreCasquesEnfants]">
        <p>*Dans la limite des stocks disponibles.</p>
    </section>

    <h3>Profitez de descentes en luge d'été à tarifs avantageux !</h3>
    <label for="options[NombreLugesEte]">Nombre de descentes en luge d'été :</label>
    <input type="number" name="options[NombreLugesEte]" id="options[NombreLugesEte]">

    <p class="bouton" onclick="suivant('coordonnees')">Suivant</p>
</fieldset>


        <!------------------------------------------- FIN DE LA SECTION OPTIONS  ------------------------------------------------>

    <fieldset id="coordonnees" class="inactive">
      <legend>Coordonnées</legend>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" id="telephone" required>
        <label for="adressePostale">Adresse Postale :</label>
        <input type="text" name="adressePostale" id="adressePostale" required>

        <input type="submit" name="soumission" class="bouton" value="Réserver">
    </fieldset>

        <!------------------------------------------- FIN DE LA SECTION COORDONNEES  ------------------------------------------------>

  </form>
</body>
<script src="./script.js"></script>
</html>

<?php
?>
