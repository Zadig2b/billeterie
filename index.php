<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de réservation Music Vercos Festival</title>
</head>
<body>

  <!-- Inclure le module de réservation -->
  <?php include 'components/reservation.php'; ?>

  <!-- Inclure le module d'options -->
  <?php include 'components/options.php'; ?>

  <!-- Inclure le module de coordonnées -->
  <?php include 'components/coordonnees.php'; ?>

  <form action="traitement_reservation.php" id="inscription" method="POST">
    <!-- ... Vos autres éléments du formulaire ... -->
  </form>

  <!-- Inclure vos scripts JavaScript -->
  <script>
    function suivant(section) {
      // Logique pour passer à la section suivante
    }
  </script>

</body>
</html>
