<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de réservation Music Vercos Festival</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
<?php
    $currentSection = isset($_GET['section']) ? $_GET['section'] : 'reservation';
    include 'components/' . $currentSection . '.php';
  ?>

  <form action="traitement_reservation.php" id="inscription" method="POST">
    
  <!-- Inclure le module d'options -->
  <?php include 'components/options.php'; ?>

  <!-- Inclure le module de coordonnées -->
  <?php include 'components/coordonnees.php'; ?>

</form>



  <script>
    function suivant(section) {
      // Récupérer toutes les sections du formulaire
      var sections = document.querySelectorAll('fieldset');

      // Cacher toutes les sections
      sections.forEach(function (s) {
        s.style.display = 'none';
      });

      // Afficher la section suivante
      var sectionSuivante = document.getElementById(section);
      if (sectionSuivante) {
        sectionSuivante.style.display = 'block';

        // Modifier l'URL
        window.history.pushState({}, '', section);
      } else {
        // Si la section suivante n'est pas trouvée, afficher un message d'erreur
        console.error("Section suivante introuvable");
      }
    }

  </script>

</body>
</html>
