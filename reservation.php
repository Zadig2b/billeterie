<?php 
session_start(); 

    class Reservation {
    private $csvFile = 'database.csv';

    public function enregistrerReservation(
    $nom, $prenom, $email, $telephone, $adressePostale, 
    $nombrePlaces, $tarifReduit, $passSelection, $prix) {


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
            $prix
        );

        $_SESSION['reservationData'] = $reservationData;

        // Ajouter la réservation au fichier CSV
        $this->ajouterReservationAuCSV($reservationData);

          // Redirect to success.php
          header('Location: success.php');
          exit; 
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
