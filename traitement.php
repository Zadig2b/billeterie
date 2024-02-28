<?php
require_once './reservation.php';

class Traitement {
    public function traiterDonnees($donnees) {
        //  ici, faire le traitement des données avant de les enregistrer

        //récupération et nettoyage de chaque champ de "Réservation"
        $nombrePlaces = $_POST['nombrePlaces'];
        $tarifReduit = isset($_POST['tarifReduit']) && $_POST['tarifReduit'] === 'on' ? 'tarif réduit' : 'plein tarif';
        $passSelection = $_POST['passSelection'];
        $prix = $_POST['totalPrice2'] . "€";
        $choixJour = isset($_POST['choixJour']) ? htmlspecialchars($_POST['choixJour']) : '';


        //récupération et nettoyage de chaque champ de "Options"
        // $emplacementTente;
        // $emplacementCamion;
        // $enfants;
        // $casque;
        // $luges;


        //récupération et nettoyage de chaque champ de "Coordonnées"
        $nom = htmlspecialchars($donnees['nom']);
        $prenom = htmlspecialchars($donnees['prenom']);
        $email = htmlspecialchars($donnees['email']);
        $telephone = htmlspecialchars($donnees['telephone']);
        $adressePostale = htmlspecialchars($donnees['adressePostale']);




        $reservation = new Reservation();
        $reservation->enregistrerReservation(
            $nom, $prenom, $email, $telephone, $adressePostale, 
            $nombrePlaces, $tarifReduit, $passSelection, $prix, $choixJour);
        exit; 
    }
}

// Instancier la classe et appeler la méthode pour traiter les données
$traitement = new Traitement();
$traitement->traiterDonnees($_POST);

?>
