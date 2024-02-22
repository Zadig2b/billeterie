<?php
require_once './reservation.php';

class Traitement {
    public function traiterDonnees($donnees) {
        //  ici, faire le traitement des données avant de les enregistrer

        //nettoyage pour chaque champ 
        $nom = htmlspecialchars($donnees['nom']);
        $prenom = htmlspecialchars($donnees['prenom']);
        $email = htmlspecialchars($donnees['email']);
        $telephone = htmlspecialchars($donnees['telephone']);
        $adressePostale = htmlspecialchars($donnees['adressePostale']);
        $nombrePlaces = $_POST['nombrePlaces'];
        $tarifReduit = isset($_POST['tarifReduit']) ? $_POST['tarifReduit'] : 'plein tarif'; // Check if it's set
        $passSelection = $_POST['passSelection'];

        var_dump($donnees);

        $reservation = new Reservation();
        $reservation->enregistrerReservation($nom, $prenom, $email, $telephone, $adressePostale, $nombrePlaces, $tarifReduit, $passSelection);
        exit; 
    }
}

// Instancier la classe et appeler la méthode pour traiter les données
$traitement = new Traitement();
$traitement->traiterDonnees($_POST);

?>
