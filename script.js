let pass1jour = document.getElementById('pass1jour')
pass1jour.addEventListener('change', function(){
    let section = document.getElementById('pass1jourDate');
    if(pass1jour.checked){
        section.style.display = 'flex';


            } else {
        section.style.display = 'none';       
    }
})

let pass2jours = document.getElementById('pass2jours')
pass2jours.addEventListener('change', function(){
    let section = document.getElementById('pass2joursDate');
    if(pass2jours.checked){
        section.style.display = 'block';
            } else {
        section.style.display = 'none';       
    }
})

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

function checkFormule() {
    // Vérification qu'au moins une case est cochée dans la section "Choisissez votre formule"
    var pass1jourChecked = document.getElementById('pass1jour').checked;
    var pass2joursChecked = document.getElementById('pass2jours').checked;
    var pass3joursChecked = document.getElementById('pass3jours').checked;

    if (pass1jourChecked) {
        document.getElementById('passSelection').value = 'pass1jour';
        if (!checkJours()) {
            // Handle the case where the chosen pass requires day selection, but no day is selected
            alert("Veuillez choisir au moins un jour pour le Pass 1 jour.");
            return false;
        }
    } else if (pass2joursChecked) {
        document.getElementById('passSelection').value = 'pass2jours';
        if (!checkJours()) {
            // Handle the case where the chosen pass requires day selection, but no day is selected
            alert("Veuillez choisir au moins un jour pour le Pass 2 jour.");
            return false;
        }
    } else if (pass3joursChecked) {
        document.getElementById('passSelection').value = 'pass3jours';
        // No need to check jours for pass3jours
    } else {
        // No pass selected, handle accordingly
        alert("n'oubliez pas de choisir au moins une formule");
        return false;
    }

    // Rest of your code

    return true;
}





function checkJours() {
    // Vérification qu'au moins une case est cochée dans la section "Choisissez le jour"
    var pass1jourChecked = document.getElementById('pass1jour').checked;
    var pass2joursChecked = document.getElementById('pass2jours').checked;

    var joursCheckboxes;

    if (pass1jourChecked) {
        joursCheckboxes = document.querySelectorAll('#pass1jourDate input[name="choixJour1"], #pass1jourDate input[name="choixJour2"], #pass1jourDate input[name="choixJour3"]');
    } else if (pass2joursChecked) {
        joursCheckboxes = document.querySelectorAll('#pass2joursDate input[name="choixJour12"], #pass2joursDate input[name="choixJour23"]');
    } else {
        // No pass selected, handle accordingly
        alert("n'oubliez pas de choisir au moins une formule");
        return false;
    }

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


