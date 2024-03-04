<?php 
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
    class Reservation {
    private $csvFile = 'database.csv';

    public function enregistrerReservation(
        $nom, $prenom, $email, $telephone, $adressePostale, 
        $nombrePlaces, $tarifReduit, $passSelection, $prix, $choixJour,
        $emplacementTente, $emplacementCamion, $enfants, $nombreCasquesEnfants, $NombreLugesEte
    ) {
        // Créer un tableau avec les données de la réservation
        $reservationData = array(
            $nom,
            $prenom,
            $email,
            $telephone,
            $adressePostale,
            $nombrePlaces,
            $tarifReduit,
            $passSelection,
            $prix,
            $choixJour,
            $emplacementTente,
            $emplacementCamion,
            $enfants,
            $nombreCasquesEnfants,
            $NombreLugesEte
        );

        $_SESSION['reservationData'] = $reservationData;

        // Ajouter la réservation au fichier CSV
        $this->ajouterReservationAuCSV($reservationData);

          // Redirect to success.php
          header('Location: success.php');
          exit; 
    }

    public function getAllReservations()
{
    // Retrieve all reservations from the CSV file
    $reservations = $this->readAllReservations();

    if (empty($reservations)) {
        echo 'No reservations found.'; // Debugging statement
        return;
    }
    // Display the reservations in a table
    echo '<table class="tableau-reservations">';
    echo '<caption><h1>Liste des réservations</h1></caption>';
    echo '<thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Téléphone</th>
                <th>Adresse Postale</th>
                <th>Nombre de Places</th>
                <th>Tarif Réduit</th>
                <th>Pass Selection</th>
                <th>Prix</th>
                <th>Choix du Jour</th>
                <th>Emplacement Tente</th>
                <th>Emplacement Camion</th>
                <th>Enfants</th>
                <th>Nombre de Casques pour Enfants</th>
                <th>Nombre de Luges d\'Été</th>
            </tr>
        </thead>';
    echo '<tbody>';
    foreach ($reservations as $reservation) {
        echo '<tr>';
        foreach ($reservation as $data) {
            echo '<td>' . $data . '</td>';
        }
        echo '</tr>';
    }
    echo '</tbody>';
    echo '</table>';
}

    public function readAllReservations()
{
    // Open the CSV file for reading
    $file = fopen($this->csvFile, 'r');

    // Initialize an empty array to store reservations
    $reservations = [];

    if ($file) {
        // Read each line from the CSV file
        while (($data = fgetcsv($file)) !== false) {
            // Add the data to the reservations array
            $reservations[] = $data;
        }

        // Close the CSV file
        fclose($file);
    } else {
        echo 'Error opening CSV file for reading.'; // Debugging statement
    }
    // Return the array of reservations
    return $reservations;
}

    private function ajouterReservationAuCSV($reservationData) {
        // Ouvrir le fichier CSV en mode écriture
        $file = fopen($this->csvFile, 'a');

        // Verrouiller le fichier pour éviter les conflits d'écriture
        flock($file, LOCK_EX);

        // Écrire les données dans le fichier CSV
        fputcsv($file, $reservationData);

        // Déverrouiller le fichier
        flock($file, LOCK_UN);

        // Fermer le fichier
        fclose($file);


    }


}

$reservation = new Reservation();
