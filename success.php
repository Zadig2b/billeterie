<?php
session_start(); // Start the session

?>
<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Reservation Successful</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="success-message">
    <h2>Thank you for your reservation!</h2>
    <?php
      // Check if reservation data is available
      if (isset($_SESSION['reservationData'])) {
        $reservationData = $_SESSION['reservationData'];

        // Display reservation details
        echo "<p>Name: {$reservationData[0]} {$reservationData[1]}</p>";
        echo "<p>Email: {$reservationData[2]}</p>";
        echo "<p>Nombre de places: {$reservationData[5]}</p>";
        echo "<p>Prix Total: {$reservationData[8]}</p>";
      } else {
        echo "<p>No reservation data available.</p>";
      }
    ?>
  </div>
</body>
</html>
