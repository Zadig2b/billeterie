// <--------------------------------START OF JS ANIMATION------------------------------------------->

document.addEventListener('DOMContentLoaded', function () {
    var firstSection = document.querySelector('fieldset');
    firstSection.classList.add('active');

    firstSection.addEventListener('animationend', function (event) {
        if (event.animationName === 'fadeIn') {
            firstSection.style.animation = 'colorFadeOut 2s forwards';
        }
    });
});
// <--------------------------------END OF JS ANIMATION ------------------------------------------->

document.addEventListener('DOMContentLoaded', function () {
    let nombrePlacesInput = document.getElementById('NombrePlaces');

    nombrePlacesInput.addEventListener('change', function () {
        let nombrePlaces = parseInt(nombrePlacesInput.value);

        if (nombrePlaces < 1) {
            nombrePlacesInput.value = 1;
            alert("Le nombre de réservations ne peut pas être inférieur à 1");
        }
    });

    let passRadioButtons = document.querySelectorAll('input[name="passRadio"]');
    let choixJourRadioButtons = document.querySelectorAll('input[name="choixJour"]');
    let radioLabels = document.querySelectorAll('input[type="radio"] + label');

    passRadioButtons.forEach(function (radioButton) {
        radioButton.addEventListener('click', function () {
            passRadioButtons.forEach(function (otherRadioButton) {
                let otherSectionId = otherRadioButton.id + 'Date';
                let otherSection = document.getElementById(otherSectionId);

                if (otherSection) {
                    if (otherRadioButton !== radioButton) {
                        otherSection.style.display = 'none';
                    }
                }

            });

        });
    });

    choixJourRadioButtons.forEach(function (choixJourRadioButton) {
        choixJourRadioButton.addEventListener('change', function () {
            passRadioButtons.forEach(function (passRadioButton) {
                passRadioButton.checked = false;
            });

            // Show or hide the section based on the checked state
            let sectionId = choixJourRadioButton.id.replace('choixJour', '');
            let section = document.getElementById(sectionId);

            if (section) {
                if (choixJourRadioButton.checked) {
                    section.style.display = 'block';
                } else {
                    section.style.display = 'none';
                }
            }
        });
    });

   radioLabels.forEach(label => {
    label.addEventListener("click", function () {
        console.log('Label clicked'); 

        radioLabels.forEach(label => {
            // Check if the label is associated with "choixJour" inputs
            if (label.getAttribute('for').includes('choixJour')) {
                label.classList.remove("selected");
            }
        });
        this.classList.add("selected");

        document.querySelectorAll('input[type="radio"]').forEach(input => {
            input.checked = false;
        });

        const radioId = this.getAttribute("for");
        const radio = document.getElementById(radioId);
        if (radio) {
            radio.checked = true;

            const sectionId = radioId + 'Date';
            const section = document.getElementById(sectionId);
            if (section) {
                section.style.display = 'block';
            }
        }
    });
});
});

document.addEventListener('DOMContentLoaded', function () {

    let tarifReduitCheckbox = document.getElementById('tarifReduit');
    let pass1jour = document.getElementById('pass1jour');
    let pass2jours = document.getElementById('pass2jours');
    let pass3jours = document.getElementById('pass3jours');
    let nombrePlacesInput = document.getElementById('NombrePlaces');
    let totalPriceElement = document.getElementById('totalPrice');
    let pass1jourlabel = document.querySelector('label[for="pass1jour"]');
    let pass2jourslabel = document.querySelector('label[for="pass2jours"]');
    let pass3jourslabel = document.querySelector('label[for="pass3jours"]');

    tarifReduitCheckbox.addEventListener('change', updatePrices);

    document.querySelector('label[for="tarifReduit"]').addEventListener('click', function () {
        tarifReduitCheckbox.checked = !tarifReduitCheckbox.checked; 
        updatePrices();
    });
    
[pass1jourlabel, pass2jourslabel, pass3jourslabel].forEach(function (passCheckbox) {
        passCheckbox.addEventListener('click', function () {
            updatePrixTotal();
        });
    });
    

    function updatePrices() {
        let prices;
    
        if (tarifReduitCheckbox.checked) {
            prices = [25, 50, 65];
        } else {
            prices = [40, 70, 100];
        }
    
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

        document.getElementById('totalPriceInput').value = totalPrice;
        console.log(totalPrice);
    }

    let allCheckboxes = document.querySelectorAll('input[type="checkbox"]');

    allCheckboxes.forEach(checkbox => {
        checkbox.style.display = 'none';
    });

    let checkboxLabels = document.querySelectorAll('input[type="checkbox"] + label');

    checkboxLabels.forEach(label => {
        label.addEventListener("click", function () {
            console.log('Checkbox label clicked'); 
            this.classList.toggle("selected");
            updatePrixTotal()

            let checkboxId = this.getAttribute("for");
            let checkbox = document.getElementById(checkboxId);

            if (checkbox) {
                checkbox.checked = !checkbox.checked;

                if (checkboxId === 'tarifReduit') {
                    updatePrices();
                }
            }
        });
    });


    nombrePlacesInput.addEventListener('change', function () {
        let nombrePlaces = parseInt(nombrePlacesInput.value);

        if (nombrePlaces < 1) {
            nombrePlacesInput.value = 1;
            alert("Le nombre de réservations ne peut pas être inférieur à 1 ou supérieur à 50.");
        }
        updatePrixTotal();
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


