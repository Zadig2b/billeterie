<?php 

    class Reservation {
    private $csvFile = 'database.csv';

    public function enregistrerReservation($nom, $prenom, $email, $telephone, $adressePostale, $nombrePlaces, $tarifReduit, $passSelection) {
        // Nettoyer les données si nécessaire

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
        );

        // Ajouter la réservation au fichier CSV
        $this->ajouterReservationAuCSV($reservationData);
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

// Exemple d'utilisation de la classe Reservation
$reservation = new Reservation();
