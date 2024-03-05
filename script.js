// <--------------------------------START OF RADIO LOGIC------------------------------------------->

document.addEventListener('DOMContentLoaded', function () {
    // Récupérer l'élément input pour le nombre de réservations
    let nombrePlacesInput = document.getElementById('NombrePlaces');

    // Ajouter un écouteur d'événements sur le changement de la valeur du champ
    nombrePlacesInput.addEventListener('change', function () {
        // Récupérer la valeur saisie par l'utilisateur
        let nombrePlaces = parseInt(nombrePlacesInput.value);


        if ( nombrePlaces <0 ) {
            nombrePlacesInput.value = 1;
            alert("Le nombre de réservations ne peut pas être inférieur à 0");
        }
    });
});

let passRadioButtons = document.querySelectorAll('input[name="passRadio"]');
let choixJourRadioButtons = document.querySelectorAll('input[name="choixJour"]');

passRadioButtons.forEach(function (radioButton) {
    radioButton.addEventListener('change', function () {
        passRadioButtons.forEach(function (otherRadioButton) {
            let otherSectionId = otherRadioButton.id + 'Date';
            let otherSection = document.getElementById(otherSectionId);

            if (otherSection) {
                if (otherRadioButton !== radioButton) {
                    otherSection.style.display = 'none';
                }
            }
        });

        choixJourRadioButtons.forEach(function (childRadioButton) {
            childRadioButton.checked = false;
        });

        let sectionId = radioButton.id + 'Date';
        let section = document.getElementById(sectionId);

        if (section) {
            if (radioButton.checked) {
                section.style.display = 'block';
            } else {
                section.style.display = 'none';
            }
        }
    });
});
// <--------------------------------END OF RADIO LOGIC------------------------------------------->




// <--------------------------------START OF JS ANIMATION------------------------------------------->

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
// <--------------------------------END OF JS ANIMATION ------------------------------------------->


// <--------------------------------DYNAMIC PRICE MANAGEMENT------------------------------------------->

document.addEventListener('DOMContentLoaded', function () {
    let tarifReduitCheckbox = document.getElementById('tarifReduit');
    let pass1jour = document.getElementById('pass1jour');
    let pass2jours = document.getElementById('pass2jours');
    let pass3jours = document.getElementById('pass3jours');
    let nombrePlacesInput = document.getElementById('NombrePlaces');
    let totalPriceElement = document.getElementById('totalPrice');

    tarifReduitCheckbox.addEventListener('change', updatePrices);

    [pass1jour, pass2jours, pass3jours].forEach(function (passCheckbox) {
        passCheckbox.addEventListener('change', function () {
            updatePrixTotal();
            updateCheckboxVisibility(getSelectedDay());
        });
    });

    function updatePrices() {
        let prices = tarifReduitCheckbox.checked ? [25, 50, 65] : [40, 70, 100];
    
        [pass1jour, pass2jours, pass3jours].forEach(function (pass, index) {
            let price = prices[index];
    
            pass.setAttribute('data-price', price);
    
            pass.nextElementSibling.textContent = `Pass ${index + 1} jour(s) : ${price}€`;
        });
    
        updatePrixTotal();
    }

    function updatePrixTotal() {
        console.log('updatePrixTotal called'); 

        let nombrePlaces = parseInt(nombrePlacesInput.value) || 0;

        let selectedPass = [pass1jour, pass2jours, pass3jours].find(pass => pass.checked);

        if (!selectedPass) {
            return;
        }

        let currentPrice = parseInt(selectedPass.getAttribute('data-price'));
        console.log(currentPrice); 

        let totalPrice = nombrePlaces * currentPrice;

        totalPriceElement.textContent = `Prix Total : ${totalPrice}€`;

        // Set the calculated total price in the hidden input field
        document.getElementById('totalPriceInput').value = totalPrice;
        console.log(totalPrice);
    }


});
// <--------------------------------END OF DYNAMIC PRICE MANAGEMENT------------------------------------------->





function checkFormule() {
    // Vérification qu'au moins une case est cochée dans la section "Choisissez votre formule"
    var pass1jourChecked = document.getElementById('pass1jour').checked;
    var pass2joursChecked = document.getElementById('pass2jours').checked;
    var pass3joursChecked = document.getElementById('pass3jours').checked;

    if (pass1jourChecked) {
        document.getElementById('passSelection').value = 'pass1jour';
        if (!checkJours()) {
            alert("Veuillez choisir au moins un jour pour le Pass 1 jour.");
            return false;
        }
    } else if (pass2joursChecked) {
        document.getElementById('passSelection').value = 'pass2jours';
        if (!checkJours()) {
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

    var joursRadioButtons;

    if (pass1jourChecked) {
        joursRadioButtons = document.querySelectorAll('#pass1jourDate input[name="choixJour"]');
    } else if (pass2joursChecked) {
        joursRadioButtons = document.querySelectorAll('#pass2joursDate input[name="choixJour"]');
    } else {
        alert("n'oubliez pas de choisir au moins une formule");
        return false;
    }

    var atLeastOneDaySelected = Array.from(joursRadioButtons).some(function (radio) {
        return radio.checked;
    });
    
    
    console.log("At least one day selected:", atLeastOneDaySelected);
    

    return atLeastOneDaySelected;
}


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


