<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulaire de réservation Music Vercos Festival</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="traitement.php" id="inscription" method="POST">
    <fieldset id="reservation" class="active">
      <legend>Réservation</legend>
      <h3>Nombre de réservation(s) :</h3>
      <input type="number" name="nombrePlaces" id="NombrePlaces" required>
      <h3>Réservation(s) en tarif réduit</h3>
      <input type="checkbox" name="tarifReduit" id="tarifReduit">
      <label for="tarifReduit">Ma réservation sera en tarif réduit</label>

      <h3>Choisissez votre formule :</h3>
      <input type="checkbox" name="passSelection" id="pass1jour">
      <label for="pass1jour">Pass 1 jour : 40€</label>

      <script>
        let pass1jour = document.getElementById('pass1jour')
        pass1jour.addEventListener('change', function(){
            let section = document.getElementById('pass1jourDate');
            if(pass1jour.checked){
                section.style.display = 'flex';


                    } else {
                section.style.display = 'none';       
            }
        })
      </script>
      <!-- Si case cochée, afficher le choix du jour -->
      <section id="pass1jourDate">
        <input type="checkbox" name="passSelection" id="choixJour1">
        <label for="choixJour1">Pass pour la journée du 01/07</label>
        <input type="checkbox" name="passSelection" id="choixJour2">
        <label for="choixJour2">Pass pour la journée du 02/07</label>
        <input type="checkbox" name="passSelection" id="choixJour3">
        <label for="choixJour3">Pass pour la journée du 03/07</label>
      </section>

      <input type="checkbox" name="passSelection" id="pass2jours">
      <label for="pass2jours">Pass 2 jours : 70€</label>

      <script>
        let pass2jours = document.getElementById('pass2jours')
        pass2jours.addEventListener('change', function(){
            let section = document.getElementById('pass2joursDate');
            if(pass2jours.checked){
                section.style.display = 'block';
                    } else {
                section.style.display = 'none';       
            }
        })
      </script>

      <!-- Si case cochée, afficher le choix des jours -->
      <section id="pass2joursDate">
        <input type="checkbox" name="passSelection" id="choixJour12">
        <label for="choixJour12">Pass pour deux journées du 01/07 au 02/07</label>
        <input type="checkbox" name="passSelection" id="choixJour23">
        <label for="choixJour23">Pass pour deux journées du 02/07 au 03/07</label>
      </section>

      <input type="checkbox" name="passSelection" id="pass3jours">
      <label for="pass3jours">Pass 3 jours : 100€</label>

      <script>
    document.addEventListener('DOMContentLoaded', function () {
        // Add an event listener for "tarifReduit" checkbox change
        let tarifReduitCheckbox = document.getElementById('tarifReduit');
        tarifReduitCheckbox.addEventListener('change', function () {
            // Get the corresponding pass elements
            let pass1jour = document.getElementById('pass1jour');
            let pass2jours = document.getElementById('pass2jours');
            let pass3jours = document.getElementById('pass3jours');

            // Check the state of tarifReduit checkbox
            if (tarifReduitCheckbox.checked) {
                // Update prices if tarifReduit is checked
                pass1jour.nextElementSibling.textContent = 'Pass 1 jour : 25€';
                pass2jours.nextElementSibling.textContent = 'Pass 2 jours : 50€';
                pass3jours.nextElementSibling.textContent = 'Pass 3 jours : 65€';
            } else {
                // Reset prices if tarifReduit is not checked
                pass1jour.nextElementSibling.textContent = 'Pass 1 jour : 40€';
                pass2jours.nextElementSibling.textContent = 'Pass 2 jours : 70€';
                pass3jours.nextElementSibling.textContent = 'Pass 3 jours : 100€';
            }
        });
    });
</script>


      <section id= "tarifReduit-section">
      <!-- tarifs réduits : à n'afficher que si tarif réduit est sélectionné -->
      <input type="checkbox" name="passSelection" id="pass1jour">
      <label for="pass1jour">Pass 1 jour : 25€</label>
      <input type="checkbox" name="passSelection" id="pass2jours">
      <label for="pass2jours">Pass 2 jours : 50€</label>
      <input type="checkbox" name="passSelection" id="pass3jours">
      <label for="pass3jours">Pass 3 jours : 65€</label>
      </section>
      <!-- FACULTATIF : ajouter un pass groupe (5 adultes : 150€ / jour) uniquement pass 1 jour -->

      <p class="bouton" onclick="suivant('options')">Suivant</p>
    </fieldset>
    <fieldset id="options" class="inactive">
      <legend>Options</legend>
      <h3>Réserver un emplacement de tente : </h3>
      <input type="checkbox" id="tenteNuit1" name="tenteNuit1">
      <label for="tenteNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="tenteNuit2" name="tenteNuit2">
      <label for="tenteNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="tenteNuit3" name="tenteNuit3">
      <label for="tenteNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="tente3Nuits" name="tente3Nuits">
      <label for="tente3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Réserver un emplacement de camion aménagé : </h3>
      <input type="checkbox" id="vanNuit1" name="vanNuit1">
      <label for="vanNuit1">Pour la nuit du 01/07 (5€)</label>
      <input type="checkbox" id="vanNuit2" name="vanNuit2">
      <label for="vanNuit2">Pour la nuit du 02/07 (5€)</label>
      <input type="checkbox" id="vanNuit3" name="vanNuit3">
      <label for="vanNuit3">Pour la nuit du 03/07 (5€)</label>
      <input type="checkbox" id="van3Nuits" name="van3Nuits">
      <label for="van3Nuits">Pour les 3 nuits (12€)</label>

      <h3>Venez-vous avec des enfants ?</h3>
      <input type="checkbox" name="enfantsOui"><label for="enfantsOui">Oui</label>
      <input type="checkbox" name="enfantsNon"><label for="enfantsNon">Non</label>

      <!-- Si oui, afficher : -->
      <section>
        <h4>Voulez-vous louer un casque antibruit pour enfants* (2€ / casque) ?</h4>
        <label for="nombreCasquesEnfants">Nombre de casques souhaités :</label>
        <input type="number" name="nombreCasquesEnfants" id="nombreCasquesEnfants">
        <p>*Dans la limite des stocks disponibles.</p>
      </section>

      <h3>Profitez de descentes en luge d'été à tarifs avantageux !</h3>
      <label for="NombreLugesEte">Nombre de descentes en luge d'été :</label>
      <input type="number" name="NombreLugesEte" id="NombreLugesEte">

      <p class="bouton" onclick="suivant('coordonnees')">Suivant</p>
    </fieldset>

    <fieldset id="coordonnees" class="inactive">
      <legend>Coordonnées</legend>
        <label for="nom">Nom :</label>
        <input type="text" name="nom" id="nom" required>
        <label for="prenom">Prénom :</label>
        <input type="text" name="prenom" id="prenom" required>
        <label for="email">Email :</label>
        <input type="email" name="email" id="email" required>
        <label for="telephone">Téléphone :</label>
        <input type="text" name="telephone" id="telephone" required>
        <label for="adressePostale">Adresse Postale :</label>
        <input type="text" name="adressePostale" id="adressePostale" required>

        <input type="submit" name="soumission" class="bouton" value="Réserver">
    </fieldset>

  </form>
</body>
<script>
function checkFormule() {
    // Vérification qu'au moins une case est cochée dans la section "Choisissez votre formule"
    var formuleCheckboxes = document.querySelectorAll('#reservation input[name="passSelection"]');
    var formuleChecked = Array.from(formuleCheckboxes).some(function (checkbox) {
        return checkbox.checked;
    });

    // Vérification supplémentaire pour les pass 1 et 2 jours
    if (formuleChecked) {
        var pass1jourChecked = document.getElementById('pass1jour').checked;
        var pass2joursChecked = document.getElementById('pass2jours').checked;

        if ((pass1jourChecked || pass2joursChecked) && !checkJours()) {
            // Si pass 1 jour ou 2 jours est coché mais les jours ne sont pas sélectionnés
            alert("Veuillez choisir au moins un jour pour les Pass 1 jour et 2 jours.");
            return false;
        }
    } else {
        
    }

    return formuleChecked;
}

function checkJours() {
    // Vérification qu'au moins une case est cochée dans la section "Choisissez le jour"
    var joursCheckboxes = document.querySelectorAll('#pass1jourDate input[name="passSelection"], #pass2joursDate input[name="passSelection"]');
    return Array.from(joursCheckboxes).some(function (checkbox) {
        return checkbox.checked;
    });
}


document.addEventListener('DOMContentLoaded', function () {
            // Au chargement de la page, get 1st section et appliquer fadeIn animation
            var firstSection = document.querySelector('fieldset');
            firstSection.classList.add('active');

            // Ajouter event listener pour animationend pour appliquer colorFadeOut après fadeIn
            firstSection.addEventListener('animationend', function (event) {
                if (event.animationName === 'fadeIn') {
                    firstSection.style.animation = 'colorFadeOut 2s forwards';
                }
            });
        });

function suivant(section) {
    // Récupérer la section actuelle
    var currentSection = document.querySelector('fieldset.active');
    // Vérification des champs requis dans la section "Réservation"
    var fieldsReservation = currentSection.querySelectorAll('input[required]');
    var validReservation = true;
    //La condition if (!field.value.trim()) vérifie si la valeur du champ (accessible via field.value) 
    //est vide après avoir supprimé les espaces en début et en fin de chaîne avec trim(). 
    //Si le champ est vide, cela signifie qu'il n'est pas rempli, et la variable validReservation est définie sur false.
    fieldsReservation.forEach(function (field) {
        if (!field.value.trim()) {
            validReservation = false;
        }
    });

    // Si la section actuelle est "Réservation", vérifier la formule
    if (currentSection.id === 'reservation') {
        var formuleValid = checkFormule();
        if (!validReservation && !formuleValid) {
            alert("Entrez un nombre de réservation, et n'oubliez pas de choisir au moins une formule");
            return;
        } else if (!formuleValid && validReservation){
            alert("n'oubliez pas de choisir au moins une formule")
            return;
        } else if (!validReservation && formuleValid){
            alert("Entrez un nombre de réservation")
            return;
        }


    } else if (!validReservation) {
        // Si la section actuelle n'est pas "Réservation", vérifier uniquement les champs requis
        alert('Veuillez remplir tous les champs obligatoires.');
        return;
    }

    // Récupérer toutes les sections du formulaire
    var sections = document.querySelectorAll('fieldset');

    // Ajouter/retirer les classes pour gérer l'opacité et la transition
    sections.forEach(function (s) {
        s.classList.remove('active');
        s.classList.add('inactive');
    });

    // Afficher la section suivante
    var sectionSuivante = document.getElementById(section);
    if (sectionSuivante) {
        sectionSuivante.classList.remove('inactive');
        sectionSuivante.classList.add('active');
        sectionSuivante.addEventListener('animationend', function () {
        sectionSuivante.style.animation = 'colorFadeOut 2s forwards';
     });  
        
    } else {
        // Si la section suivante n'est pas trouvée, afficher un message d'erreur
        console.error("Section suivante introuvable");
    }
}


  </script>
</html>