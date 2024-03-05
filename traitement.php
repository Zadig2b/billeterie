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
        $options = isset($_POST['options']) ? $_POST['options'] : [];

$emplacementTente = isset($options['tenteNuit']) ? 'Tente: ' . implode(', ', array_keys($options['tenteNuit'])) : '';
$emplacementCamion = isset($options['vanNuit']) ? 'Van: ' . implode(', ', array_keys(array_filter($options['vanNuit']))) : '';
$enfants = isset($options['enfantsOui']) ? 'Enfants' : "Pas d'enfants";
$nombreCasquesEnfants = isset($options['nombreCasquesEnfants']) && !empty($options['nombreCasquesEnfants'])
    ? htmlspecialchars($options['nombreCasquesEnfants']) . " Casque(s)"
    : '';

$NombreLugesEte = isset($options['NombreLugesEte']) && !empty($options['NombreLugesEte'])
    ? htmlspecialchars($options['NombreLugesEte']) . " luge(s)"
    : '';


        //récupération et nettoyage de chaque champ de "Coordonnées"
        $nom = htmlspecialchars($donnees['nom']);
        $prenom = htmlspecialchars($donnees['prenom']);
        $email = htmlspecialchars($donnees['email']);
        $telephone = htmlspecialchars($donnees['telephone']);
        $adressePostale = htmlspecialchars($donnees['adressePostale']);




        $reservation = new Reservation();
        $reservation->enregistrerReservation(
            $nom, $prenom, $email, $telephone, $adressePostale, 
            $nombrePlaces, $tarifReduit, $passSelection, $prix, $choixJour,
            $emplacementTente, $emplacementCamion, $enfants, $nombreCasquesEnfants, $NombreLugesEte
        );
        
        exit; 
    }
}

// Instancier la classe et appeler la méthode pour traiter les données
$traitement = new Traitement();
$traitement->traiterDonnees($_POST);

?>
