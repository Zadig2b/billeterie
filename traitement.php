<?php
require_once './reservation.php';

class Traitement {
    public function traiterDonnees($donnees) {
        // Effectuez ici le traitement des données avant de les enregistrer
        // Par exemple, vous pouvez utiliser la fonction filter_input pour sanitiser les données
        // ou appliquer d'autres opérations de traitement nécessaires

        // Exemple de nettoyage pour chaque champ (utilisez la fonction appropriée selon le besoin)
        $nom = htmlspecialchars($donnees['nom']);
        $prenom = htmlspecialchars($donnees['prenom']);
        $email = htmlspecialchars($donnees['email']);
        $telephone = htmlspecialchars($donnees['telephone']);
        $adressePostale = htmlspecialchars($donnees['adressePostale']);
        $nombrePlaces = $_POST['nombrePlaces'];
        $tarifReduit = isset($_POST['tarifReduit']) ? $_POST['tarifReduit'] : 'plein tarif'; // Check if it's set
        $passSelection = $_POST['passSelection'];
        // Faites de même pour les autres champs...

        // Vous pouvez maintenant utiliser les variables $nom, $prenom, etc. pour enregistrer les données dans votre base de données
        // ou effectuer toute autre opération nécessaire

        var_dump($donnees);

        $reservation = new Reservation();
        $reservation->enregistrerReservation($nom, $prenom, $email, $telephone, $adressePostale, $nombrePlaces, $tarifReduit, $passSelection);

        // Vous pouvez rediriger l'utilisateur après le traitement
        // header("Location: reservation.php");
        exit; // Assurez-vous d'arrêter l'exécution du script après la redirection
    }
}

// Instanciez la classe et appelez la méthode pour traiter les données
$traitement = new Traitement();
$traitement->traiterDonnees($_POST);

?>
